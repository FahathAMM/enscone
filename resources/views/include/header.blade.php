<div class="nav-header" style="position: fixed">
    <div class="brand-logo">
        <a href="index.html">
            {{-- <b class="logo-abbr"><img src="images/logo.png" alt=""> </b> --}}
            {{-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> --}}
            <span class="brand-title">
                {{-- <img src="images/logo-text.png" alt=""> --}}
            </span>
        </a>
    </div>
</div>

<div class="header">
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            {{-- <div class="input-group icons">
                <a href="{{ route('home', ['username' => Auth::user()->name, 'userid' => Auth::user()->id]) }}"
                    target="_blank" class="btn btn-success mt-2">
                    My Website
                </a>
                <div class="drop-down animated flipInX d-md-none">
                </div>
            </div> --}}
        </div>
        <div class="header-right">
            <ul class="clearfix">
                {{-- <livewire:admin.message.message-livewire /> --}}
                {{-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2">3</span>
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class="">2 New Notifications</span>
                            <a href="
                                javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-2">5</span>
                            </a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Events near you</h6>
                                            <span class="notification-text">Within next 5 days</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Event Started</h6>
                                            <span class="notification-text">One hour ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Event Ended Successfully</h6>
                                            <span class="notification-text">One hour ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Events to Join</h6>
                                            <span class="notification-text">After two days</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </li> --}}
                <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        @if (Auth::user()->google_id)
                            <img src="{{ Auth::user()->avatar }}" height="40" width="40" alt="">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" height="40" width="40" alt="">
                        @endif
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('Portfolio.settings') }}"><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void()">
                                        <i class="icon-envelope-open"></i> <span>Inbox</span>
                                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                    </a>
                                </li> --}}
                                <hr class="my-2">
                                {{-- <li>
                                    <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('logout') }}"><i class="icon-key"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
