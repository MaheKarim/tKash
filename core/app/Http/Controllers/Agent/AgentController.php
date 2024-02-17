<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function dashboard()
    {
        return 'Hello Dashboard';
        return view($this->activeTemplate . "agent.dashboard");
    }
}
