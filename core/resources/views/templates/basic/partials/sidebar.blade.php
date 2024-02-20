<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ siteLogo() }}" alt="" width="100%">
        </a>

        <ul class="sidebar-nav">

            @if(!auth()->guard('agent')->check())
                <li class="sidebar-header">
                    Menu - Features
                </li>

                <li class="sidebar-item {{ menuActive('user.home') }}">
                    <a class="sidebar-link" href="{{ route('user.home') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span
                            class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ menuActive('user.send.money') }}">
                    <a class="sidebar-link" href="{{ route('user.send.money') }}">
                        <i class="align-middle" data-feather="navigation"></i> <span
                            class="align-middle">Send Money</span>
                    </a>
                </li>

                <li class="sidebar-item {{ menuActive('user.add.money') }}">
                    <a class="sidebar-link" href="{{ route('user.add.money') }}">
                        <i class="align-middle" data-feather="corner-down-left"></i> <span
                            class="align-middle">Add Money</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Transactions Log
                </li>

                <li class="sidebar-item {{ menuActive('user.send.history') }}">
                    <a class="sidebar-link" href="{{ route('user.send.history') }}">
                        <i class="align-middle" data-feather="list"></i> <span
                            class="align-middle">Transactions</span>
                    </a>
                </li>

            @elseif(!auth()->guard('web')->check())
                <li class="sidebar-header">
                    Agent Dashboard
                </li>

                <li class="sidebar-item {{ menuActive('agent.dashboard') }}">
                    <a class="sidebar-link" href="{{ route('agent.dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span
                            class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ menuActive('agent.transactions') }}">
                    <a class="sidebar-link" href="{{ route('agent.transactions') }}">
                        <i class="align-middle" data-feather="list"></i> <span
                            class="align-middle">Transactions</span>
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>
