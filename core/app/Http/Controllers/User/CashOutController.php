<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\TkashMethod;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    public function cashOut()
    {
        $pageTitle = 'Cash Out';
        $data = TkashMethod::find(2);
        return view($this->activeTemplate . 'user.cash-out.index', compact('pageTitle', 'data'));
    }

    public function cashOutStore(Request $request)
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

        $receiver = Agent::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'Receiver not found'];
            return back()->withNotify($notify);
        }

        $receiverId = $receiver->id;
        $user = auth()->user();
        $amount = $request->amount;

        if ($user->balance < $amount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }

        $cashOutCharge = TkashMethod::find(2);
        $charge = $cashOutCharge->fixed_charge + ($request->amount * $cashOutCharge->percent_charge) / 100;
        $finalAmount = $amount - $charge;

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
        $sendMoney->details = 'Cash Out to ' . $receiver->username;
        $sendMoney->trx = getTrx();
        $sendMoney->remark = 'cash_out';
        $sendMoney->save();

        // Transaction Save For Receiver
        $transaction = new Transaction();
        $transaction->agent_id = $receiverId;
        $transaction->amount = $finalAmount;
        $transaction->charge = 0;
        $transaction->post_balance = getAmount($receiver->balance);
        $transaction->trx_type = '+';
        $transaction->details = 'Received money from ' . $user->username;
        $transaction->trx = $sendMoney->trx;
        $transaction->remark = 'received_money';
        $transaction->save();


        $notify[] = ['success', 'Cash out to ' . $receiver->username . ' successfully'];
        return to_route('user.transactions')->withNotify($notify);
    }
}
