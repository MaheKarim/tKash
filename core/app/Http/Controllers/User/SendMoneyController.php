<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SendMoney;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SendMoneyController extends Controller
{
    public function sendMoneyStore(Request $request)
    {
        $minLimit = getAmount(gs('min_send_money_limit'));
        $maxLimit = getAmount(gs('max_send_money_limit'));

        $request->validate([
            'username' => 'required',
            'amount' => "required|numeric|min:$minLimit|max:$maxLimit",
        ]);

        $sender = auth()->user();

        if ($request->username == $sender->username) {
            $notify[] = ['error', 'You can not send money to yourself'];
            return back()->withNotify($notify);
        }

        $receiver = User::where('username', $request->username)->active()->first();

        if (!$receiver) {
            $notify[] = ['error', 'No user found with this username'];
            return back()->withNotify($notify);
        }

        $amount = $request->amount;

        $charge = gs()->send_money_fixed_charge + ($request->amount * gs()->send_money_percent_charge / 100);
        $finalAmount = $amount + $charge;

        if ($sender->balance < $finalAmount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }

        $this->checkDailyLimit($amount);
        $this->checkMonthlyLimit($amount);

        $trx = getTrx();
        $sendMoney = new SendMoney();
        $sendMoney->user_id = $sender->id;
        $sendMoney->receiver_id = $receiver->id;
        $sendMoney->amount = $amount;
        $sendMoney->charge = $charge;
        $sendMoney->trx = $trx;
        $sendMoney->save();

        $sender->balance -= $finalAmount;
        $sender->save();

        // Transaction Save For Sender
        $sendMoney = new Transaction();
        $sendMoney->user_id = $sender->id;
        $sendMoney->amount = $amount;
        $sendMoney->charge = $charge;
        $sendMoney->post_balance = getAmount($sender->balance);
        $sendMoney->trx_type = '-';
        $sendMoney->details = 'Send money to ' . $receiver->username;
        $sendMoney->trx = $trx;
        $sendMoney->remark = 'send_money';
        $sendMoney->save();

        $receiver->balance += $amount;
        $receiver->save();

        // Transaction Save For Sender
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

        notify($receiver, 'SEND_MONEY', [
            'amount' => showAmount($amount),
            'final_amount' => showAmount($request->amount),
            'receiver' => $receiver->username,
            'trx' => $sendMoney->trx,
        ]);

        $notify[] = ['success', 'Sent money completed successfully'];
        return to_route('user.transactions')->withNotify($notify);
    }

    /**
     * @throws ValidationException
     */
    private function checkDailyLimit($amount)
    {
        $user = auth()->user();

        $todaysTotal = $user->sendMoney()->whereDate('created_at', today())->sum('amount');

        if ($amount + $todaysTotal > gs('daily_send_money_limit')) {
            throw ValidationException::withMessages(['error' => ['Sorry! You have exceeded the daily limit']]);
        }
    }

    public function sendMoney(): View
    {
        $pageTitle = 'Send Money';
        $totalToday = SendMoney::where('user_id', auth()->id())->whereDate('created_at', today())->sum('amount');
        $availableLimit = showAmount(gs('daily_send_money_limit') - $totalToday);
        return view($this->activeTemplate . 'user.send_money.form', compact('pageTitle', 'availableLimit'));
    }

    private function checkMonthlyLimit($amount)
    {
        $user = auth()->user();
        $lastThirtyDay = now()->subDays(30);
        $thisMonthTotal = $user->sendMoney()->whereBetween('created_at', [$lastThirtyDay, today()])->sum('amount');

        if ($amount + $thisMonthTotal > gs('monthly_send_money_limit')) {
            throw ValidationException::withMessages(['error' => ['Sorry! You have exceeded the monthly limit']]);
        }
    }

    public function history()
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions =
            Transaction::where('user_id', auth()->id())->filter(['trx_type', 'remark'])->dateFilter()->with('user')
                ->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.send_money.history', compact('pageTitle', 'transactions', 'remarks'));
    }
}
