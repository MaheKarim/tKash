<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentLogin;
use App\Models\Deposit;
use App\Models\NotificationLog;
use App\Models\Transaction;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email|string|max:40|unique:$agents,email,' . $agent->id,
            'mobile' => 'required|string|max:40|unique:$agents,mobile,' . $agent->id,
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

    public function login($id)
    {
        Auth::loginUsingId($id);
        return to_route('agent.login');
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

    public function create()
    {
        $pageTitle = "Agent Create";

        return view('admin.agent.create', compact('pageTitle'));
    }


}
