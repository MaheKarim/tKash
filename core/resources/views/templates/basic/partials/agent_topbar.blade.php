<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                   data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/adminkit/img/avatars/avatar.jpg') }}"
                         class="avatar img-fluid rounded me-1"
                         alt="Agent Charles"/>
                    <span class="text-dark">
                            {{ auth()->guard('agent')->user()->fullName }}
                    </span>
                </a>
                {{--  <div class="dropdown-menu dropdown-menu-end"> --}}
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('agent.logout') }}">@lang('Log out')</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
