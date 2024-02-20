<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";

        return view($this->activeTemplate . "agent.dashboard", compact('pageTitle'));
    }

    public function transactions()
    {
        $pageTitle = 'Transaction Logs';

        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions = Transaction::searchable(['trx', 'agent:username'])->filter(['trx_type', 'remark'])
            ->dateFilter()->orderBy('id', 'desc')->with('agent')->paginate(getPaginate());

        return view($this->activeTemplate . "agent.transactions", compact('pageTitle', 'transactions', 'remarks'));
    }
}
