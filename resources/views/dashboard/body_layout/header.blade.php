<header id="page-topbar" style=" background: #09745c;">
    <div class="navbar-header">
        @if($route != 'application')
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{url('admin/dashboard')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png')}}" alt="logo-sm" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png')}}" alt="logo-dark" height="20">
                        </span>
                    </a>

                    <a href="{{url('admin/dashboard')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png')}}" alt="logo-sm-light" height="25">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png')}}" alt="logo-light" height="22">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                </div>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="" src="{{ asset('backend/dashb_assets/images/flags/language.png ') }}" alt="Header Language" height="16">
                        <span class="align-middle"> @if(session()->get('language') == 'english') Language @else Langue @endif</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @if(session()->get('language') == 'french')       
                            <a href="{{ route('english.language') }}" class="dropdown-item notify-item">
                                <img src="{{ asset('backend/dashb_assets/images/flags/us.jpg ') }}" alt="user-image" class="me-1" height="12"> 
                                <span class="align-middle">English</span>
                            </a>
                        @else
                        <a href="{{ route('french.language') }}" class="dropdown-item notify-item">
                            <img src="{{ asset('backend/dashb_assets/images/flags/french.jpg ') }}" alt="user-image" class="me-1" height="16"> 
                            <span class="align-middle">Francais</span>
                        </a>
                        @endif
                    </div>
                </div>

                

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>

                

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset('backend/dashb_assets/images/users/no_image.png') }}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('user.profile')}}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('user.edit_profile', Auth::user()->id)}}"><i class="ri-user-line align-middle me-1"></i> Edit Profile</a>
                        <a class="dropdown-item" href="{{route('user.change_password')}}"><i class="ri-user-line align-middle me-1"></i> Change Password</a>
                        {{-- <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a> --}}
                        {{-- <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a> --}}
                        {{-- <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('user.logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                    </div>
                </div>

    

            </div>
        @endif
    </div>
</header>

