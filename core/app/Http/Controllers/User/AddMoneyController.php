<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\GatewayCurrency;
use Illuminate\Http\Request;

class AddMoneyController extends Controller
{
    public function addMoney(): \Illuminate\Contracts\View\View
    {
        $pageTitle = 'Add Money';
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();

        return view($this->activeTemplate . 'user.add_money.add_money', compact('pageTitle', 'gatewayCurrency'));
    }
}
