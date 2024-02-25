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
                         alt="Charles Hall"/>
                    <span class="text-dark">
                            {{ Auth::user()->fullName }}
                    </span>
                </a>
                {{--  <div class="dropdown-menu dropdown-menu-end"> --}}
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    @if(auth()->guard('agent')->check())
                        <a class="dropdown-item" href="{{ route('agent.logout') }}">@lang('Log out')</a>
                    @else
                        <a class="dropdown-item" href="{{ route('user.logout') }}">@lang('Log out')</a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
