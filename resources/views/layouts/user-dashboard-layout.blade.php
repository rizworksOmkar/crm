<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>{{ isset($title) ? $title : $companyName->company_name }}</title>
    {{-- <title>Dashboard - TRAVELHOSTONLINE </title> --}}
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.min.css') }}" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">

    <!-- Slick css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/slick.min.css') }}" />
    <!--slick-theme.css-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/slick-theme.min.css') }}" />
    <!-- Rangeslider css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/nouislider.css') }}" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.min.css') }}" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.theme.default.min.css') }}" />
    <!-- navber css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/navber.css') }}" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/meanmenu.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}" />
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/user/img/favicon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    @yield('styles')
</head>

<body>
    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area -->
    <header class="main_header_arae">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                                <a href="#!"><i class="fab fa-facebook"></i></a>
                                <a href="#!"><i class="fab fa-twitter-square"></i></a>
                                <a href="#!"><i class="fab fa-instagram"></i></a>
                                <a href="#!"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li>
                                @if ($companyName->company_phone_number_1)
                                    <a href="#!">
                                        <span>{!! $companyName->company_phone_number_1 !!}</span>
                                    </a>
                                @else
                                @endif

                            </li>
                            <li>
                                @if ($companyName->company_email_id_1)
                                    <a href="#!">
                                        <span>{!! $companyName->company_email_id_1 !!}</span>
                                    </a>
                                @else
                                @endif

                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            {{-- @if (Auth::check())
                            <li>
                                <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                    class="rolltype">Go to dashboard</a>                                
                            </li>
                            <li><a href="{{ route('logout') }}">Sign Out</a></li>                                  
                            @else
                                <li><a href="{{ route('user.login') }}">Login</a></li>
                                <li><a href="{{ route('user.register') }}">Sign up</a></li>
                            @endif --}}

                            <li>
                                <div class="dropdown language-option">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="lang-name"></span>
                                    </button>
                                    <div class="dropdown-menu language-dropdown-menu">
                                        <a class="dropdown-item" href="#">English</a>
                                        <a class="dropdown-item" href="#">Arabic</a>
                                        <a class="dropdown-item" href="#">French</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown language-option">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="lang-name"></span>
                                    </button>
                                    <div class="dropdown-menu language-dropdown-menu">
                                        <a class="dropdown-item" href="#">INR</a>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Bar -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a class="travel-img" href="{{ route('user.home') }}">
                                {{-- <h3>TRAVORIZ</h3> --}}
                                @if ($companyName->company_logo_1)
                                    <img src="/{{ $companyName->company_logo_1 }}"
                                        alt="{{ $companyName->company_name }}">
                                @else
                                @endif

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand travel-img" href="{{ route('user.home') }}">
                            {{-- <h3>TRAVORIZ</h3> --}}
                            @if ($companyName->company_logo_1)
                                <img src="/{{ $companyName->company_logo_1 }}" alt="{{ $companyName->company_name }}">
                            @else
                            @endif
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a href="{{ route('user.home') }}" class="nav-link active">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Packages
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('AllInternationalPacakages') }}"
                                                class="nav-link">International</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AllDomesticPacakages') }}"
                                                class="nav-link">Domestic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Fixed Departure
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('AllInternationalPacakagesFD') }}"
                                                class="nav-link">International</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AllDomesticPacakagesFD') }}"
                                                class="nav-link">Domestic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">
                                        Destinations
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('AllInternationlaldestination') }}"
                                                class="nav-link">International</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AllDomesticdestination') }}"
                                                class="nav-link">Domestic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">
                                        Pages
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('user.about') }}" class="nav-link">
                                                About Us
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('user.services') }}" class="nav-link">Services</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{ route('user-sub-services') }}" class="nav-link">Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.privacy&policy') }}" class="nav-link">Privacy &
                                                Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.terms&conditions') }}" class="nav-link">Terms &
                                                Conditions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.refundPolicy') }}" class="nav-link">Refund
                                                Policy</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a href="/user/reviews" class="nav-link">Client's Review</a>
                                        </li> --}}
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">Blog</a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.contact') }}" class="nav-link">Contact </a>

                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">

                                <ul class="navbar-nav">
                                    <li class="nav-item aftr_ntf">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-bell" aria-hidden="true"></i>
                                            {{-- Notifications --}}
                                        </a>
                                        <ul class=" dropdown-menu ntf_psn">
                                            <li class="nav-item"><a href=""><p><i class="fas fa-bell" aria-hidden="true"></i> Notifications</p></a></li>
                                        </ul>
                                    </li>
                                    <li class=" nav-item">
                                        <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                            class="rolltype nav-link d_flex">
                                            <div class="usr_img ">
                                                <img src="/assets/user/img/common/mane.png" alt="">
                                            </div>
                                            Hi ! {{ Auth::User()->first_name }}
                                        </a>
                                        <ul class=" dropdown-menu ps-right">
                                            <p class="usr_wlcm">Welcome {{ Auth::User()->first_name }}
                                                {{ Auth::User()->middle_name }} {{ Auth::User()->last_name }}</p>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                                    Dashboard
                                                </a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    My profile
                                                </a>
                                            </li>
                                            {{-- <li class="nav-item usr_bking">
                                                <a class="nav-link" onclick="usrSubMenuOpn()" href="#">
                                                    <i class="fas fa-address-card" aria-hidden="true"></i>
                                                    My bookings
                                                    <span class="opn_mnu"> <a href="#"
                                                            onclick="usrSubMenuCloss()">
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                    </span>

                                                </a>
                                                <ul class="usr_sub_menu" id="mySidenav">
                                                    <li class="nav-item">
                                                        <a class="rolltype nav-link" href="#"><i
                                                                class="fas fa-hotel"></i>Hotel
                                                            booking</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="rolltype nav-link" href="#"><i
                                                                class="fas fa-paper-plane"></i>Flight
                                                            booking</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="rolltype nav-link" href="#">
                                                            <i class="fas fa-map"></i>Tour booking
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="rolltype nav-link" href="#">
                                                            <i class="fas fa-history"></i>Booking history</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fas fa-wallet" aria-hidden="true"></i>
                                                    Wallet
                                                </a>
                                            </li> --}}
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <i class="fas fa-bell" aria-hidden="true"></i>
                                                    Notifications
                                                </a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                    Logout
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                                <div class="option-item">
                                    <a href="#" class="search-box">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </div>
                                {{-- <div class="option-item">
                                    @if (Auth::check())                                    
                                        <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                            class="btn btn_navber rolltype ">Go to dashboard</a>                                                               
                                    @else
                                        <a href="{{ route('user.login') }}" class="btn  btn_navber">Sign In</a>
                                    @endif
                                    
                                </div> --}}
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            {{-- <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div> --}}
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="{{ route('user.contact') }}" class="btn  btn_navber">Get free quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mob_collapse" id="">
                        <ul class="navbar-nav">
                            {{-- <li class="nav-item aftr_ntf">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-bell" aria-hidden="true"></i>
                                        </a>
                                        <ul class=" dropdown-menu ntf_psn">
                                            <li class="nav-item"><a href=""><p><i class="fas fa-bell" aria-hidden="true"></i> Notifications</p></a></li>
                                        </ul>
                                    </li> --}}
                            <li class=" nav-item">
                                <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                    class="rolltype nav-link d_flex mob_usr_right">
                                    <div class="usr_img ">
                                        <img src="/assets/user/img/common/mane.png" alt="">
                                    </div>
                                    Hi ! {{ Auth::User()->first_name }}
                                </a>
                                <ul class=" dropdown-menu mob__ps_right">
                                    <p class="usr_wlcm">Welcome {{ Auth::User()->first_name }}
                                        {{ Auth::User()->middle_name }} {{ Auth::User()->last_name }}</p>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                            Dashboard
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            My profile
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item usr_bking mob_usr_bking">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-address-card" aria-hidden="true"></i>
                                            My bookings
                                            <span class="mob_opn_mnu">

                                                <i class="fas fa-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="usr_sub_menu mob_usr_sub_menu" id="mySidenav">
                                            <li class="nav-item">
                                                <a class="rolltype nav-link" href="#"><i
                                                        class="fas fa-hotel"></i>Hotel
                                                    booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="rolltype nav-link" href="#"><i
                                                        class="fas fa-paper-plane"></i>Flight
                                                    booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="rolltype nav-link" href="#">
                                                    <i class="fas fa-map"></i>Tour booking
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="rolltype nav-link" href="#">
                                                    <i class="fas fa-history"></i>Booking history</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-wallet" aria-hidden="true"></i>
                                            Wallet
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-bell" aria-hidden="true"></i>
                                            Notifications
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            Logout
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Part-->
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Customer dashboard</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span>Customer dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Area -->
    <section id="dashboard_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="dashboard_sidebar">
                        <div class="dashboard_sidebar_user">
                            <img src="{{ asset('assets/user/img/common/dashboard-user-blank.png') }}" alt="img">
                            <h3> {{ Auth::user()->first_name }}
                                {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</h3>
                            <p><a href="tel:{{ Auth::user()->phonenumber }}">{{ Auth::user()->phonenumber }}</a></p>
                            <p><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
                        </div>
                        <div class="dashboard_menu_area">
                            <ul>
                                <li><a href="{{ route('User-dashboard') }}" class="active"><i
                                            class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                                {{-- <li><a href="#"><i class="fas fa-user-circle"></i>My profile</a></li> --}}
                                <li class="dashboard_dropdown_button" id="dashboard_dropdowns"><i
                                        class="fas fa-address-card"></i>My bookings
                                    <span> <i class="fas fa-angle-down"></i></span>
                                    <div class="booing_sidebar_dashboard" id="show_dropdown_item"
                                        style="display: none;">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-hotel"></i>Hotel
                                                    booking</a></li>
                                            <li><a href="#"><i class="fas fa-paper-plane"></i>Flight
                                                    booking</a></li>
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-map"></i>Tour booking
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <i class="fas fa-history"></i>Booking history</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li><a href="#"><i class="fas fa-wallet"></i>Wallet</a></li>
                                <li><a href="/user/writReviews"><i class="fas fa-wallet"></i>Write Review</a></li>
                                {{-- <li><a href="#"><i class="fas fa-bell"></i>Notifications</a></li>
                                <li>
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-sign-out-alt"></i>Logout
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <!-- Content Part-->

    <!-- Footer  -->
    <footer id="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Need any help?</h5>
                    </div>
                    <div class="footer_first_area">
                        @if ($companyName->company_phone_number_1)
                            <div class="footer_inquery_area">
                                <h5>Call 24/7 for any help</h5>
                                <h3> <a href="tel:{!! $companyName->company_phone_number_1 !!}">{!! $companyName->company_phone_number_1 !!}</a></h3>
                            </div>
                        @else
                        @endif
                        @if ($companyName->company_email_id_1)
                            <div class="footer_inquery_area">
                                <h5>Mail to our support team</h5>
                                <h3><a href="mailto:{!! $companyName->company_email_id_1 !!}">{!! $companyName->company_email_id_1 !!}</a></h3>
                            </div>
                        @else
                        @endif

                        <div class="footer_inquery_area">
                            <h5>Follow us on</h5>
                            <ul class="soical_icon_footer">
                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Company</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="{{ route('user.about') }}">About Us</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Rewards</a></li>
                            <li><a href="#">Work with Us</a></li>
                            <li><a href="#">Meet the Team </a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Support</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="{{ route('user.privacy&policy') }}">Privacy Policy</a></li>
                            <li>
                                <a href="{{ route('user.terms&conditions') }}">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="{{ route('user.refundPolicy') }}">Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Other Services</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="#">Community program</a></li>
                            <li><a href="#">Investor Relations</a></li>
                            <li><a href="#">Rewards Program</a></li>
                            <li><a href="#">PointsPLUS</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">List My Hotel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Top cities</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="#">Chicago</a></li>
                            <li><a href="#">New York</a></li>
                            <li><a href="#">San Francisco</a></li>
                            <li><a href="#">California</a></li>
                            <li><a href="#">Ohio </a></li>
                            <li><a href="#">Alaska</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        @if ($companyName->company_name)
                            © 2023 All Rights Reserved {!! $companyName->company_name !!}.
                        @else
                        @endif
                    </div>
                </div>
                {{-- <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="assets/user/img/common/cards.png" alt="img">
                    </div>
                </div> --}}
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        Design And Developed by riz software consultancy.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>
    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <h3>
                        Are you sure? <br>
                        you want to log out.
                    </h3>
                    <div class="logout_approve_button">
                        <a href="{{ route('logout') }}" class="btn btn_theme btn_md">Yes Confirm</a>
                        <button data-bs-dismiss="modal" class="btn btn_border btn_md">No Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/user/js/bootstrap.bundle.js') }}"></script>
    <!-- Meanu js -->
    <script src="{{ asset('assets/user/js/jquery.meanmenu.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/user/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/slick-slider.js') }}"></script>
    <!-- wow.js -->
    <script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/user/js/custom.js') }}"></script>
    <script src="{{ asset('assets/user/js/add-form.js') }}"></script>
    <script src="{{ asset('assets/user/js/form-dropdown.js') }}"></script>

    <script src="https://code.tidio.co/jkmzvzqupiv8cfbq8g77qbrtpf4bknkz.js" async></script>

    @yield('scripts')

    <script>
        function usrSubMenuOpn() {
            document.getElementById("mySidenav").style.display = "block";
        }


        function usrSubMenuCloss() {
            document.getElementById("mySidenav").style.display = "none";
        }
    </script>

</body>

</html>
