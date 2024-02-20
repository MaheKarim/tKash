<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="indicator">4</span>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown"
                   data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-square"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                     aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            4 New Messages
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <img src="{{ asset('assets/adminkit/img/avatars/avatar-5.jpg')}}"
                                         class="avatar img-fluid rounded-circle"
                                         alt="Vanessa Tucker">
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">Vanessa Tucker</div>
                                    <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
                                        tortor.
                                    </div>
                                    <div class="text-muted small mt-1">15m ago</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <img src="{{ asset('assets/adminkit/img/avatars/avatar-2.jpg') }}"
                                         class="avatar img-fluid rounded-circle"
                                         alt="William Harris">
                                </div>
                                <div class="col-10 ps-2">
                                    <div class="text-dark">William Harris</div>
                                    <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                        vitae.
                                    </div>
                                    <div class="text-muted small mt-1">2h ago</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all messages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                   data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                   data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/adminkit/img/avatars/avatar.jpg') }}"
                         class="avatar img-fluid rounded me-1"
                         alt="Charles Hall"/>
                    <span class="text-dark">
                        @if(auth()->guard('agent')->check())
                            {{ auth()->guard('agent')->user()->fullName }}
                        @else
                            {{ Auth::user()->fullName }}
                        @endif
                    </span>
                </a>
                {{--  <div class="dropdown-menu dropdown-menu-end"> --}}
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                                                          data-feather="user"></i>
                        Profile</a>

                    <div class="dropdown-divider"></div>

                    <div class="dropdown-divider"></div>

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
