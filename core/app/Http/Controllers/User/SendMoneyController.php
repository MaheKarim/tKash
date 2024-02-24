<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\SendMoney;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SendMoneyController extends Controller
{

    public function sendMoney(): View
    {
        $pageTitle = 'Send Money';
        return view($this->activeTemplate . 'user.send_money.index', compact('pageTitle'));
    }

    public function sendMoneyStore(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'amount' => 'required|numeric|gt:0',
            'remark' => 'nullable',
        ]);
        $checkUser = User::where('username', '=', auth()->user()->username)->first();
        if ($request->username == $checkUser->username) {
            $notify[] = ['error', 'You can not send money to yourself'];
            return back()->withNotify($notify);
        }
        /* 1. Check Username  */
        $receiver = User::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'Receiver not found'];
            return back()->withNotify($notify);
        }

        $receiverId = $receiver->id;
        $user = auth()->user();
        $amount = $request->amount;

        /* 2. Check Limit Monthly */
        if (!dailyLimitCheck($user, $amount)) {
            $notify[] = ['error', 'You have exceeded your daily transaction limit'];
            return back()->withNotify($notify);
        }

        /* 3. Check Limit Monthly */
        if (!monthlyLimitCheck($user, $amount)) {
            $notify[] = ['error', 'You have exceeded your monthly transaction limit'];
            return back()->withNotify($notify);
        }

        /* 4. Check Balance  */
        if ($user->balance < $amount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }
        /* 5. Check Final Amount  */
        if ($amount < gs()->min_trx_amount) {
            $notify[] = ['error', 'Your requested amount is smaller than minimum amount.'];
            return back()->withNotify($notify);
        }

        if ($amount > gs()->max_trx_amount) {
            $notify[] = ['error', 'Your requested amount is larger than maximum amount.'];
            return back()->withNotify($notify);
        }
        // Charge
        $charge = gs()->send_money_fixed_charge + ($request->amount * gs()->send_money_percent_charge / 100);
        $finalAmount = $amount - $charge;

        /* 6. Update Balance  */
        $user->balance -= $amount;
        $user->save();
        $receiver->balance += $finalAmount;
        $receiver->save();

        // Transaction Save For Sender
        $sendMoney = new Transaction();
        $sendMoney->user_id = $user->id;
        $sendMoney->amount = $finalAmount;
        $sendMoney->charge = $charge;
        $sendMoney->post_balance = getAmount($user->balance);
        $sendMoney->trx_type = '-';
        $sendMoney->details = 'Send money to ' . $receiver->username;
        $sendMoney->trx = getTrx();
        $sendMoney->remark = 'send_money';
        $sendMoney->save();

        // Transaction Save For Receiver
        $transaction = new Transaction();
        $transaction->user_id = $receiverId;
        $transaction->amount = $finalAmount;
        $transaction->charge = 0;
        $transaction->post_balance = getAmount($receiver->balance);
        $transaction->trx_type = '+';
        $transaction->details = 'Received money from ' . $user->username;
        $transaction->trx = $sendMoney->trx;
        $transaction->remark = 'received_money';
        $transaction->save();


        /* 7. Send Email  */
        notify($user, 'SEND_MONEY', [
            'amount' => showAmount($amount),
            'final_amount' => showAmount($request->final_amount),
            'receiver' => $receiver->username,
            'trx' => $sendMoney->trx,
        ]);

        $notify[] = ['success', 'Sent money to ' . $receiver->username . ' successfully'];
        return to_route('user.transactions')->withNotify($notify);
    }

    public function history(): View
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions =
            Transaction::where('user_id', auth()->id())->filter(['trx_type', 'remark'])->dateFilter()->with('user')
                ->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.send_money.history', compact('pageTitle', 'transactions', 'remarks'));
    }
}
