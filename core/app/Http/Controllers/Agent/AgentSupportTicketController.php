<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Traits\SupportTicketManager;

class AgentSupportTicketController extends Controller
{
    use SupportTicketManager;

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'frontend';

        $this->middleware(function ($request, $next) {
            $this->user = auth()->guard('agent')->user();
            $this->userType = 'agent';
//            dd($this->user);
            if ($this->user) {
                $this->layout = 'app';
//                dd($this->layout);
            }
            return $next($request);
        });

        $this->redirectLink = 'agent.ticket.view';
        $this->userType = 'agent';
        $this->column = 'agent_id';
    }
}
