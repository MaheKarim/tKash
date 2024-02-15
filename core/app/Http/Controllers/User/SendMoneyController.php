<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\SendMoney;
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
        /** Total Steps
         * 1. Check Username
         * 2. Check Minimum
         * 3. Check Maximum
         * 4. Check Balance
         * 5. Check Final Amount
         * 6. Update Balance
         * 7. Send Email
         * 8. Send Notification
         * 9. Save History
         * 10. Save Transaction
         */

        $request->validate([
            'username' => 'required',
            'amount' => 'required|numeric',
            'remark' => 'nullable',
        ]);
        // Check User First
        $checkUser = User::where('username', '=', auth()->user()->username)->first();
        if ($checkUser) {
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

        if ($request->final_amount < gs()->min_trx_amount) {
            $notify[] = ['error', 'Your requested amount is smaller than minimum amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > gs()->max_trx_amount) {
            $notify[] = ['error', 'Your requested amount is larger than maximum amount.'];
            return back()->withNotify($notify);
        }

        /* 6. Update Balance  */
        $user->balance -= $request->amount;
        $receiver->balance += $amount;

        /* Transaction Model */
        $sendMoney = new SendMoney();
        $sendMoney->user_id = $user->id;
        $sendMoney->amount = $amount;
        $sendMoney->final_amount = $amount;
        $sendMoney->receiver_id = $receiverId;
        $sendMoney->status = Status::PAYMENT_SUCCESS;
        $sendMoney->remark = $request->remark;
        $sendMoney->trx = getTrx();
        $sendMoney->save();


        /* 7. Send Email  */
        notify($user, 'SEND_MONEY', [
            'amount' => showAmount($amount),
            'final_amount' => showAmount($request->final_amount),
            'receiver' => $receiver->username,
            'trx' => $sendMoney->trx,
        ]);

        $notify[] = ['success', 'Sent money to ' . $receiver->username . ' successfully'];
        return to_route('user.send.history')->withNotify($notify);
    }

    public function history(): View
    {
        $pageTitle = 'Send Money History';
        $dispatchHistory = SendMoney::where('user_id', auth()->id())
            ->with('receiver')
            ->where('status', Status::PAYMENT_SUCCESS)
            ->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.send_money.history', compact('pageTitle', 'dispatchHistory'));
    }
}
