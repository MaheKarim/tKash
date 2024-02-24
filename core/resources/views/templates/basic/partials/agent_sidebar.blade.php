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

            <li class="sidebar-item {{ menuActive('agent.ticket.index') }}">
                <a class="sidebar-link" href="{{ route('agent.ticket.index') }}">
                    <i class="align-middle" data-feather="square"></i> <span
                        class="align-middle">@lang('Support')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('agent.transactions') }}">
                <a class="sidebar-link" href="{{ route('agent.transactions') }}">
                    <i class="align-middle" data-feather="list"></i> <span
                        class="align-middle">@lang('Transactions')</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
