<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\TkashMethod;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class CashInController extends Controller
{
    public function index()
    {
        $pageTitle = 'Cash In';
        return view($this->activeTemplate . 'agent.cash-in.index', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'username' => 'required',
        ]);
        $checkAgent = Agent::where('username', '=', auth()->guard('agent')->user()->username)->first();
        if ($request->username == $checkAgent->username) {
            $notify[] = ['error', 'You can not Cash In to yourself'];
            return back()->withNotify($notify);
        }

        $receiver = User::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'Receiver not found'];
            return back()->withNotify($notify);
        }

        $receiverId = $receiver->id;
        $agent = auth()->guard('agent')->user();
        $amount = $request->amount;

        if ($agent->balance < $amount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }

        $cashOutCharge = TkashMethod::findOrFail(1);
        $charge = $cashOutCharge->fixed_charge + ($request->amount * $cashOutCharge->percent_charge) / 100;
//        dd($charge);
        $finalAmount = $amount - $charge;

        $agent->balance -= $amount;
        $agent->save();

        $receiver->balance += $amount;
        $receiver->save();

        // Transaction Save For Sender
        $sendMoney = new Transaction();
        $sendMoney->agent_id = $agent->id;
        $sendMoney->amount = $amount;
        $sendMoney->charge = $charge;
        $sendMoney->post_balance = getAmount($agent->balance);
        $sendMoney->trx_type = '-';
        $sendMoney->details = 'Cash In to ' . $receiver->username;
        $sendMoney->trx = getTrx();
        $sendMoney->remark = 'cash_out';
        $sendMoney->save();

        $agent->balance += $charge;
        $agent->save();
        // Transaction Save For Sender
        $agentCommission = new Transaction();
        $agentCommission->agent_id = $agent->id;
        $agentCommission->amount = $charge;
        $agentCommission->charge = 0;
        $agentCommission->post_balance = getAmount($agent->balance);
        $agentCommission->trx_type = '+';
        $agentCommission->details = 'Cash In Commission For ' . $sendMoney->trx;
        $agentCommission->trx = $sendMoney->trx;
        $agentCommission->remark = 'cash_in';
        $agentCommission->save();

        // Transaction Save For Receiver
        $transaction = new Transaction();
        $transaction->user_id = $receiverId;
        $transaction->amount = $amount;
        $transaction->charge = 0;
        $transaction->post_balance = getAmount($receiver->balance);
        $transaction->trx_type = '+';
        $transaction->details = 'Received money from ' . $agent->username;
        $transaction->trx = $sendMoney->trx;
        $transaction->remark = 'received_money';
        $transaction->save();


        $notify[] = ['success', 'Cash in request send to ' . $request->username . ' successfully'];
        return to_route('agent.transactions')->withNotify($notify);
    }
}
