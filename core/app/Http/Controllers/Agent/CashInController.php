<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\TkashMethod;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CashInController extends Controller
{
    public function index()
    {
        $pageTitle = 'Cash In';
        return view($this->activeTemplate . 'agent.cash_in.form', compact('pageTitle'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $minLimit = getAmount(gs('min_cash_in_limit'));
        $maxLimit = getAmount(gs('max_cash_in_limit'));
        $request->validate([
            'username' => 'required',
            'amount' => 'required|numeric|min:$minLimit|max:$maxLimit',
        ]);

        $sender = auth()->guard('agent')->user();
        if ($request->username == $sender->username) {
            $notify[] = ['error', 'You can not cash in to yourself'];
            return back()->withNotify($notify);
        }

        $receiver = User::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'Receiver not found'];
            return back()->withNotify($notify);
        }

        $amount = $request->amount;

        $charge = gs()->cash_in_fixed_commission + ($amount * gs()->cash_in_percent_commission) / 100;
        $finalAmount = $amount + $charge;

        if ($sender->balance < $finalAmount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }

        $this->checkDailyLimit($amount, $sender);
        $this->checkMonthlyLimit($amount, $sender);

        $sender->balance -= $finalAmount;
        $sender->save();

        $receiver->balance += $amount;
        $receiver->save();

        $trx = getTrx();
        // Transaction Save For Sender
        $cashIn = new Transaction();
        $cashIn->agent_id = $sender->id;
        $cashIn->amount = $amount;
        $cashIn->charge = $charge;
        $cashIn->post_balance = getAmount($sender->balance);
        $cashIn->trx_type = '-';
        $cashIn->details = 'Cash In to ' . $receiver->username;
        $cashIn->trx = $trx;
        $cashIn->remark = 'cash_out';
        $cashIn->save();

        $sender->commission_balance += $charge;
        $sender->save();
        // Commission Balance For Agent
        $agentCommission = new Transaction();
        $agentCommission->agent_id = $sender->id;
        $agentCommission->amount = $charge;
        $agentCommission->charge = 0;
        $agentCommission->post_balance = getAmount($sender->balance);
        $agentCommission->trx_type = '+';
        $agentCommission->details = 'Cash In Commission For ' . $cashIn->trx;
        $agentCommission->trx = $trx;
        $agentCommission->remark = 'cash_in';
        $agentCommission->save();

        // Transaction Save For Receiver
        $transaction = new Transaction();
        $transaction->user_id = $receiver->id;
        $transaction->amount = $amount;
        $transaction->charge = 0;
        $transaction->post_balance = getAmount($receiver->balance);
        $transaction->trx_type = '+';
        $transaction->details = 'Received money from ' . $sender->username;
        $transaction->trx = $trx;
        $transaction->remark = 'received_money';
        $transaction->save();

        $notify[] = ['success', 'Cash in request send to ' . $request->username . ' successfully'];
        return to_route('agent.transactions')->withNotify($notify);
    }

    /**
     * @throws ValidationException
     */
    private function checkDailyLimit($amount, $sender): void
    {
        $todayTotal = $sender->transactions()->where('trx_type', '-')->whereDate('created_at', today())->sum('amount');
        if ($todayTotal + $amount >= gs('daily_cash_in_limit')) {
            throw ValidationException::withMessages(['error' => 'Daily cash in limit exceeded']);
        }
    }

    /**
     * @throws ValidationException
     */
    private function checkMonthlyLimit($amount, $sender): void
    {
        $lastThirtyDay = now()->subDays(30);
        $monthlyTotal = $sender->transactions()->where('trx_type', '-')->whereDate('created_at', [$lastThirtyDay, now()])->sum('amount');
        if ($monthlyTotal + $amount >= gs('monthly_cash_in_limit')) {
            throw ValidationException::withMessages(['error' => 'Monthly cash in limit exceeded']);
        }
    }
}
