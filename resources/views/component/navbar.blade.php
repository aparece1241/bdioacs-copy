<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i
                        data-feather="align-justify"></i></a></li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        @auth
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                        src="{{ Auth::user()->profile ?? asset('images/user-profile.png') }}"
                        class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                    <div class="dropdown-title">{{ Auth::user()->name }}</div>
                    <a href="{{ route('users.profile', Auth::user()) }}" class="dropdown-item has-icon"> <i
                            class="far
										fa-user"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/login" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout').submit()"> <i
                            class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth

    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/"> <img alt="image" src="{{ asset('images/logo.jpg') }}" class="header-logo" />
                <span class="logo-name">{{ config('app.name') }} </span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            @role('Admin')
                <li class="dropdown @if (Route::is('dashboard')) active @endif">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i
                            data-feather="monitor"></i><span>Dashboard</span></a>
                </li>
            @endrole
            <li class="dropdown @if (Route::is('doctors.*')) active @endif">
                <a href="{{ route('doctors.index') }}" class="nav-link"><i
                        data-feather="users"></i><span>Doctors</span></a>
            </li>
            @role('Admin')
                <li class="dropdown @if (Route::is('secretaries.*')) active @endif">
                    <a href="{{ route('patients.index') }}" class="nav-link"><i
                            data-feather="users"></i><span>Secretaries</span></a>
                </li>
            @endrole
            <li class="dropdown @if (Route::is('diseases.*')) active @endif">
                <a href="{{ route('diseases.index') }}" class="nav-link">
                    <i data-feather="cpu"></i><span>Diseases</span>
                </a>
            </li>
            @role('Admin')
                <li class="dropdown @if (Route::is('patients.*')) active @endif">
                    <a href="{{ route('patients.index') }}" class="nav-link"><i
                            data-feather="users"></i><span>Patients</span></a>
                </li>
            @endrole
            @role('Admin')
                <li class="dropdown @if (Route::is('schedules.*')) active @endif">
                    <a href="{{ route('schedules.index') }}" class="nav-link"><i
                            data-feather="list"></i><span>Schedules</span></a>
                </li>
            @endrole
        </ul>
    </aside>
</div>
