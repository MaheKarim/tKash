<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ siteLogo() }}" alt="" width="100%">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                @lang('Menu')
            </li>

            <li class="sidebar-item {{ menuActive('user.home') }}">
                <a class="sidebar-link" href="{{ route('user.home') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">@lang('Dashboard')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('user.send.money') }}">
                <a class="sidebar-link" href="{{ route('user.send.money') }}">
                    <i class="align-middle" data-feather="navigation"></i> <span
                        class="align-middle">@lang('Send Money')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('user.add.money') }}">
                <a class="sidebar-link" href="{{ route('user.add.money') }}">
                    <i class="align-middle" data-feather="corner-down-left"></i> <span
                        class="align-middle">@lang('Add Money')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('user.cashOut.money') }}">
                <a class="sidebar-link" href="{{ route('user.cashOut.money') }}">
                    <i class="align-middle" data-feather="grid"></i> <span
                        class="align-middle">@lang('Cash Out')</span>
                </a>
            </li>

            <li class="sidebar-item {{ menuActive('ticket.index') }}">
                <a class="sidebar-link" href="{{ route('ticket.index') }}">
                    <i class="align-middle" data-feather="globe"></i> <span
                        class="align-middle">@lang('Create New Ticket')</span>
                </a>
            </li>

            <li class="sidebar-header">
                @lang('My Transactions')
            </li>

            <li class="sidebar-item {{ menuActive('user.transactions') }}">
                <a class="sidebar-link" href="{{ route('user.transactions') }}">
                    <i class="align-middle" data-feather="database"></i> <span
                        class="align-middle">@lang('All Transactions')</span>
                </a>
            </li>

        </ul>

    </div>
</nav>
