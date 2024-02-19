<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function dashboard()
    {
        $pageTitle = "Dashboard";
//        return dd(auth()->guard('agent')->check());
        return view($this->activeTemplate . "agent.dashboard", compact('pageTitle'));
    }
}
