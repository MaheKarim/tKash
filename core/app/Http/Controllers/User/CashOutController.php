<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TkashMethod;
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
        return redirect()->route('user.transactions');
    }
}
