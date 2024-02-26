<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ siteLogo() }}" alt="" width="100%">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                @lang('Agent Dashboard')
            </li>

            <li class="sidebar-item {{ menuActive('agent.dashboard') }}">
                <a class="sidebar-link" href="{{ route('agent.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Dashboard')</span>
                </a>
            </li>
            <li class="sidebar-item {{ menuActive('agent.cashIn.index') }}">
                <a class="sidebar-link" href="{{ route('agent.cashIn.index') }}">
                    <i class="align-middle" data-feather="navigation"></i> <span
                        class="align-middle">@lang('Cash In')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('agent.addMoney.deposit') }}">
                <a class="sidebar-link" href="{{ route('agent.addMoney.deposit') }}">
                    <i class="align-middle" data-feather="arrow-left"></i> <span
                        class="align-middle">@lang('Add Money')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('agent.withdraw.index') }}">
                <a class="sidebar-link" href="{{ route('agent.withdraw.index') }}">
                    <i class="align-middle" data-feather="chevrons-down"></i> <span
                        class="align-middle">@lang('Withdraw Money')</span>
                </a>
            </li>

            <li class="sidebar-header">
                @lang('Transactions')
            </li>
            <li class="sidebar-item {{ menuActive('agent.transactions') }}">
                <a class="sidebar-link" href="{{ route('agent.transactions') }}">
                    <i class="align-middle" data-feather="list"></i> <span
                        class="align-middle">@lang('Transactions')</span>
                </a>
            </li>
            <li class="sidebar-header">
                @lang('Support')
            </li>
            <li class="sidebar-item {{ menuActive('agent.ticket.index') }}">
                <a class="sidebar-link" href="{{ route('agent.ticket.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span
                        class="align-middle">@lang('Support')</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
