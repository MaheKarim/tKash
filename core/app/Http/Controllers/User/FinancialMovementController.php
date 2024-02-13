<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $this->validate($request, [
            'amount' => 'required|numeric',
            'currency' => 'required',
            'method' => 'required',
            'note' => 'required',
        ]);
    }
}
