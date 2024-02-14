<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ siteLogo() }}" alt="" width="100%">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu - Features
            </li>

            <li class="sidebar-item {{ menuActive('user.home') }}">
                <a class="sidebar-link" href="{{ route('user.home') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ menuActive('user.send.money') }}" href="{{ route('user.send.money') }}">
                    <i class="align-middle" data-feather="navigation"></i> <span
                        class="align-middle">Send Money</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ menuActive('user.send.history') }}" href="{{ route('user.send.history') }}">
                    <i class="align-middle" data-feather="list"></i> <span
                        class="align-middle">Send History</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
