<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\FinancialMovement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FinancialMovementController extends Controller
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

        /* 1. Check Username  */
        $receiver = User::where('username', $request->username)->first();
        if (!$receiver) {
            $notify[] = ['error', 'User not found'];
            return back()->withNotify($notify);
        }

        $receiverId = $receiver->id;
        $user = auth()->user();
        $amount = $request->amount;

        /* 2. Check Limit  */
        if (!dailyLimitCheck($user, $amount)) {
            $notify[] = ['error', 'You have exceeded your daily transaction limit'];
            return back()->withNotify($notify);
        }

        /* 4. Check Balance  */
        if ($user->balance < $amount) {
            $notify[] = ['error', 'Insufficient balance'];
            return back()->withNotify($notify);
        }

        /* 5. Check Final Amount  */


        /* 6. Update Balance  */
        $user->balance -= $request->amount;
        $receiver->balance += $amount;

        /* Transaction Model */
        $financialTransaction = new FinancialMovement();
        $financialTransaction->user_id = $user->id;
        $financialTransaction->amount = $amount;
        $financialTransaction->final_amount = $amount;
        $financialTransaction->receiver_id = $receiverId;
        $financialTransaction->status = Status::PAYMENT_SUCCESS;
        $financialTransaction->remark = $request->remark;
        $financialTransaction->trx = getTrx();

        if ($financialTransaction->save()) {
            $receiver->save();
            $user->save();
        }

        $notify[] = ['success', 'Money sent successfully'];
        return to_route('user.send.history')->withNotify($notify);
    }

    public function history(): View
    {
        $pageTitle = 'Send Money History';
        $dispatchHistory = FinancialMovement::where('user_id', auth()->id())
            ->with('receiver')
            ->where('status', Status::PAYMENT_SUCCESS)
            ->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.send_money.history', compact('pageTitle', 'dispatchHistory'));
    }
}
