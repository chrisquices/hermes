<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="{{ route('dashboard.index') }}" class="header-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
                </a>
            </div>
            <div class="iq-search-bar-header device-search">
            </div>
            <div class="d-flex align-items-center">
                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                    <li class="nav-item nav-icon search-content">
                        <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="las la-search bg-light font-size-20 iq-card-icon-small"></i>
                        </a>
                        <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                            <form action="#" class="searchbox device">
                                <div class="form-group mb-0 position-relative">
                                    <input type="text" class="text search-input font-size-12 bg-light"
                                           placeholder="type here to search...">
                                    <a href="#" class="search-link"><i class="las la-search"></i></a>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item nav-icon dropdown caption-content">
                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ auth()->user()->photo_url }}" class="img-fluid rounded" alt="user">
                        </a>
                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="card shadow-none m-0">
                                <div class="card-body p-0 text-center">
                                    <div class="media-body profile-detail text-center">
                                        <img src="{{ auth()->user()->photo_url }}" alt="profile-img"
                                             class="rounded profile-img img-fluid avatar-70">
                                    </div>
                                    <div class="p-3">
                                        <h6 class="mb-1">{{ auth()->user()->name }}</h6>
                                        <h6 class="mb-1">{{ auth()->user()->email }}</h6>
                                        <div class="d-flex align-items-center justify-content-center mt-3">
                                            <a href="{{ route('profile.index') }}" class="btn btn-primary border mr-2">Profile</a>
                                            <a href="javascript:void(0);" class="btn btn-primary border"
                                               onclick="$('#form-sign-out').submit();">Sign Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="chat-mobile-header">
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard.index') }}" class="header-logo">
                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
                    </a>
                </div>
                <div class="iq-search-bar-header device-search">
                    <form action="#" class="searchbox">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        <input type="text" class="text search-input bg-light" placeholder="Search here...">
                    </form>
                </div>
                <div class="d-flex align-items-center" wire:ignore>
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ auth()->user()->photo_url }}" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 text-center">
                                        <div class="media-body profile-detail text-center">
                                            <img src="{{ auth()->user()->photo_url }}" alt="profile-img"
                                                 class="rounded profile-img img-fluid avatar-70">
                                        </div>
                                        <div class="p-3">
                                            <h6 class="mb-1">{{ auth()->user()->name }}</h6>
                                            <h6 class="mb-1">{{ auth()->user()->email }}</h6>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <a href="{{ route('profile.index') }}" class="btn btn-primary border mr-2">Profile</a>
                                                <a href="javascript:void(0);" class="btn btn-primary border"
                                                   onclick="$('#form-sign-out').submit();">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="small-saidbar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu open">
                    <div class="main-circle"><i class="ri-close-line"></i></div>
                </div>
            </div>
        </div>
    </div>
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li @if(Request::is('/') || Request::is('dashboard')) class="active" @endif >
                <a href="{{ route('dashboard.index') }}" class="">
                    <i class="las la-home iq-arrow-left"></i><span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li @if(Request::is('chat'))) class="active" @endif >
                <a href="{{ route('chat.index') }}" class="collapsed">
                    <i class="las la-check-square iq-arrow-left"></i><span class="menu-text">Chat</span>
                </a>
            </li>

            <li @if(Request::is('profile')) class="active" @endif >
                <a href="{{ route('profile.index') }}" class="collapsed">
                    <i class="las la-user-check iq-arrow-left"></i><span class="menu-text">My Profile</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<form action="{{ route('logout') }}" method="POST" hidden id="form-sign-out">
    @csrf
</form>
