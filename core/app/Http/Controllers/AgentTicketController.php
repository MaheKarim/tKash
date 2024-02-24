<?php

namespace App\Http\Controllers;

use App\Traits\SupportTicketManager;

class AgentTicketController extends Controller
{
    use SupportTicketManager;

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'frontend';

        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            if ($this->user) {
                $this->layout = 'app';
            }
            return $next($request);
        });

        $this->redirectLink = 'ticket.view';
        $this->userType = 'agent';
        $this->column = 'agent_id';
    }
}
