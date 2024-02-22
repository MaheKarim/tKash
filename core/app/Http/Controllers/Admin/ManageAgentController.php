<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Agent;
use App\Models\AgentLogin;
use App\Models\Deposit;
use App\Models\NotificationLog;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Withdrawal;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ManageAgentController extends Controller
{
    public function index()
    {
        $pageTitle = 'Manage Agent';
        $agents = $this->agentData();

        return view('admin.agent.index', compact('agents', 'pageTitle'));
    }

    protected function agentData($scope = null)
    {
        if ($scope) {
            $agents = Agent::$scope();
        } else {
            $agents = Agent::query();
        }
        return $agents->searchable(['username', 'email'])->orderBy('id', 'desc')->paginate(getPaginate());
    }

    public function detail($id)
    {
        $agent = Agent::findOrFail($id);
        $pageTitle = 'Agent Detail - ' . $agent->username;

        $totalDeposit = Deposit::where('agent_id', $agent->id)->where('status', Status::PAYMENT_SUCCESS)->sum('amount');
        $totalWithdrawals = Withdrawal::where('agent_id', $agent->id)->where('status', Status::PAYMENT_SUCCESS)->sum('amount');
        $totalTransaction = Transaction::where('agent_id', $agent->id)->count();
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view('admin.agent.detail', compact('pageTitle', 'agent', 'totalDeposit', 'totalWithdrawals', 'totalTransaction', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);
        $countryData = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countryArray = (array)$countryData;
        $countries = implode(',', array_keys($countryArray));

        $countryCode = $request->country;
        $country = $countryData->$countryCode->country;
        $dialCode = $countryData->$countryCode->dial_code;

        $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'email' => 'required|email|string|max:40|unique:agents,email,' . $agent->id,
            'mobile' => 'required|string|max:40|unique:agents,mobile,' . $agent->id,
            'country' => 'required|in:' . $countries,
        ]);
        $agent->mobile = $dialCode . $request->mobile;
        $agent->country_code = $countryCode;
        $agent->firstname = $request->firstname;
        $agent->lastname = $request->lastname;
        $agent->email = $request->email;
        $agent->address = [
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => @$country,
        ];
        $agent->ev = $request->ev ? Status::VERIFIED : Status::UNVERIFIED;
        $agent->sv = $request->sv ? Status::VERIFIED : Status::UNVERIFIED;
        $agent->ts = $request->ts ? Status::ENABLE : Status::DISABLE;
        if (!$request->kv) {
            $agent->kv = 0;
            if ($agent->kyc_data) {
                foreach ($agent->kyc_data as $kycData) {
                    if ($kycData->type == 'file') {
                        fileManager()->removeFile(getFilePath('verify') . '/' . $kycData->value);
                    }
                }
            }
            $agent->kyc_data = null;
        } else {
            $agent->kv = 1;
        }
        $agent->save();

        $notify[] = ['success', 'Agent details updated successfully'];
        return back()->withNotify($notify);
    }

    public function addSubBalance(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'act' => 'required|in:add,sub',
            'remark' => 'required|string|max:255',
        ]);

        $agent = Agent::findOrFail($id);
        $amount = $request->amount;
        $trx = getTrx();

        $transaction = new Transaction();

        if ($request->act == 'add') {
            $agent->balance += $amount;

            $transaction->trx_type = '+';
            $transaction->remark = 'balance_add';

            $notifyTemplate = 'BAL_ADD';

            $notify[] = ['success', gs('cur_sym') . $amount . ' added successfully'];

        } else {
            if ($amount > $agent->balance) {
                $notify[] = ['error', $agent->username . ' doesn\'t have sufficient balance.'];
                return back()->withNotify($notify);
            }

            $agent->balance -= $amount;

            $transaction->trx_type = '-';
            $transaction->remark = 'balance_subtract';

            $notifyTemplate = 'BAL_SUB';
            $notify[] = ['success', gs('cur_sym') . $amount . ' subtracted successfully'];
        }

        $agent->save();

        $transaction->agent_id = $agent->id;
        $transaction->amount = $amount;
        $transaction->post_balance = $agent->balance;
        $transaction->charge = 0;
        $transaction->trx = $trx;
        $transaction->details = $request->remark;
        $transaction->save();

        notify($agent, $notifyTemplate, [
            'trx' => $trx,
            'amount' => showAmount($amount),
            'remark' => $request->remark,
            'post_balance' => showAmount($agent->balance)
        ]);

        return back()->withNotify($notify);
    }

    public function loginHistory(Request $request)
    {
        $pageTitle = 'Agent Login History';
        $loginLogs = AgentLogin::orderBy('id', 'desc')->searchable(['agent:username'])->with('agent')->paginate(getPaginate());

        return view('admin.reports.agent_logins', compact('pageTitle', 'loginLogs'));
    }

    public function loginIpHistory($ip)
    {
        $pageTitle = 'Login by - ' . $ip;
        $loginLogs = AgentLogin::where('agent_ip', $ip)->orderBy('id', 'desc')->with('agent')->paginate(getPaginate());
        return view('admin.reports.agent_logins', compact('pageTitle', 'loginLogs', 'ip'));
    }

    public function notificationLog($id)
    {
        $agent = Agent::findOrFail($id);
        $pageTitle = 'Notifications Sent to ' . $agent->username;
        $logs = NotificationLog::where('agent_id', $id)->with('agent')->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.reports.agent_notification_history', compact('pageTitle', 'logs', 'agent'));
    }

    public function kycDetails($id)
    {
        $pageTitle = 'KYC Details';
        $agent = Agent::findOrFail($id);
        return view('admin.agent.kyc_detail', compact('pageTitle', 'agent'));
    }

    public function status(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);
        if ($agent->status == Status::USER_ACTIVE) {
            $request->validate([
                'reason' => 'required|string|max:255'
            ]);
            $agent->status = Status::USER_BAN;
            $agent->ban_reason = $request->reason;
            $notify[] = ['success', 'Agent banned successfully'];
        } else {
            $agent->status = Status::USER_ACTIVE;
            $agent->ban_reason = null;
            $notify[] = ['success', 'Agent unbanned successfully'];
        }
        $agent->save();
        return back()->withNotify($notify);
    }

    public function transaction(Request $request)
    {
        $pageTitle = 'Transaction Logs';

        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions = Transaction::searchable(['trx', 'agent:username'])->filter(['trx_type', 'remark'])
            ->dateFilter()->orderBy('id', 'desc')->with('agent')->paginate(getPaginate());

        return view('admin.reports.agent_transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if (preg_match("/[^a-z0-9_]/", trim($request->username))) {
            $notify[] = ['info', 'Username can contain only small letters, numbers and underscore.'];
            $notify[] = ['error', 'No special character, space or capital letters in username.'];
            return back()->withNotify($notify)->withInput($request->all());
        }

        $exist = Agent::where('mobile', $request->mobile_code . $request->mobile)->first();
        if ($exist) {
            $notify[] = ['error', 'The mobile number already exists'];
            return back()->withNotify($notify)->withInput();
        }

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        $general = gs();
        $passwordValidation = Password::min(6);
        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $countryData = (array)json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countryCodes = implode(',', array_keys($countryData));
        $mobileCodes = implode(',', array_column($countryData, 'dial_code'));
        $countries = implode(',', array_column($countryData, 'country'));
        $validate = Validator::make($data, [
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'username' => 'required|unique:agents|min:6',
            'email' => 'required|string|email|unique:agents',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'password' => ['required', $passwordValidation],
            'mobile_code' => 'required|in:' . $mobileCodes,
            'country_code' => 'required|in:' . $countryCodes,
            'country' => 'required|in:' . $countries,
        ]);
        return $validate;
    }

    protected function create(array $data)
    {
        $general = gs();

        $referBy = session()->get('reference');
        if ($referBy) {
            $referUser = Agent::where('username', $referBy)->first();
        } else {
            $referUser = null;
        }
        //User Create
        $user = new Agent();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = strtolower($data['email']);
        $user->password = Hash::make($data['password']);
        $user->username = $data['username'];
        $user->ref_by = $referUser ? $referUser->id : 0;
        $user->country_code = $data['country_code'];
        $user->mobile = $data['mobile_code'] . $data['mobile'];
        $user->address = [
            'address' => '',
            'state' => '',
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => ''
        ];
        $user->kv = $general->kv ? Status::NO : Status::YES;
        $user->ev = $general->ev ? Status::NO : Status::YES;
        $user->sv = $general->sv ? Status::NO : Status::YES;
        $user->ts = 0;
        $user->tv = 1;
        $user->status = Status::ENABLE;
        $user->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url = urlPath('admin.users.detail', $user->id);
        $adminNotification->save();


        //Login Log Create
        $ip = getRealIP();
        $exist = AgentLogin::where('agent_ip', $ip)->first();
        $userLogin = new AgentLogin();

        //Check exist or not
        if ($exist) {
            $userLogin->longitude = $exist->longitude;
            $userLogin->latitude = $exist->latitude;
            $userLogin->city = $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country = $exist->country;
        } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude = @implode(',', $info['long']);
            $userLogin->latitude = @implode(',', $info['lat']);
            $userLogin->city = @implode(',', $info['city']);
            $userLogin->country_code = @implode(',', $info['code']);
            $userLogin->country = @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->agent_id = $user->id;
        $userLogin->agent_ip = $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

        return $user;
    }

    public function registered()
    {
        $notify[] = ['success', 'Agent created successfully'];
        return to_route('admin.agents.index')->withNotify($notify);
    }

    public function login($id)
    {
        Auth::loginUsingId($id);
        return to_route('agent.login');
    }

    public function showRegisterForm()
    {
        $pageTitle = "Agent Create";
        $info = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));

        return view('admin.agent.create', compact('pageTitle', 'countries', 'mobileCode'));
    }

    public function checkUser(Request $request)
    {
        $exist['data'] = false;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = Agent::where('email', $request->email)->exists();
            $exist['type'] = 'email';
        }
        if ($request->mobile) {
            $exist['data'] = Agent::where('mobile', $request->mobile)->exists();
            $exist['type'] = 'mobile';
        }
        if ($request->username) {
            $exist['data'] = Agent::where('username', $request->username)->exists();
            $exist['type'] = 'username';
        }
        return response($exist);
    }

}
