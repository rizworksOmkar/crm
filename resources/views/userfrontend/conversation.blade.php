<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>{{ isset($title) ? $title : 'TRAVORIZ' }}</title>
    {{-- <title>Home - TRAVELHOSTONLINE </title> --}}
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
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/favicon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
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
                            @if (Auth::check())
                                <li class="hvr_blk">
                                    <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                        class="rolltype ">Hi ! {{ Auth::User()->first_name }}</a>

                                    {{-- <div class="usr_dtls_box ">
                                          <a class="" href="#">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                            Dashboard
                                          </a>
                                          <a class="" href="#">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            My profile
                                          </a>
                                          <a class="" href="#">
                                            <i class="fas fa-address-card" aria-hidden="true"></i>
                                            My bookings
                                          </a>
                                          <a class="" href="#">
                                            <i class="fas fa-wallet" aria-hidden="true"></i>
                                            Wallet
                                          </a>
                                          <a class="" href="#">
                                            <i class="fas fa-bell" aria-hidden="true"></i>
                                            Notifications
                                          </a>
                                          <a class="" href="#">
                                            <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            Logout
                                          </a>
  
                                      </div> --}}
                                </li>
                                <li><a href="{{ route('logout') }}">Sign Out</a></li>
                            @else
                                {{-- <li><a href="{{ route('user.login') }}">Login</a></li> --}}
                                <li><a data-bs-toggle="modal" data-bs-target="#loginModal"
                                        href="jaavascript:void(0);">Login</a></li>
                                <li><a href="{{ route('user.register') }}">Sign up</a></li>
                            @endif

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
                            <a class=" travel-img" href="{{ route('user.home') }}">
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
                                <img src="/{{ $companyName->company_logo_1 }}"
                                    alt="{{ $companyName->company_name }}">
                            @else
                            @endif
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('user.home') }}" class="nav-link">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/hotel" class="nav-link">Hotels</a>

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
                                        <li class="nav-item">
                                            <a href="{{ route('user.services') }}" class="nav-link">Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user-sub-services') }}" class="nav-link">Sub
                                                Services</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/user/reviews" class="nav-link">Client's Review</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a href="#" class="nav-link">Blog</a>

                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user.contact') }}" class="nav-link">Contact Us</a>

                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </div>
                                <div class="option-item">
                                    @if (Auth::check())
                                        <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                            class="btn btn_navber rolltype ">Go to Dashboard</a>
                                    @else
                                        {{-- <a href="{{ route('user.login') }}" class="btn  btn_navber">Sign In</a> --}}
                                        <a data-bs-toggle="modal" data-bs-target="#loginModal"
                                            class="btn  btn_navber">Sign In</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu hm_psn">
                        <div class="inner">
                            <!-- <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div> -->
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            @if (Auth::check())
                                <li>
                                    <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                        class="rolltype">Hi ! {{ Auth::User()->first_name }} </a>
                                </li>
                                <li><a href="{{ route('logout') }}">Sign Out</a></li>
                            @else
                                <li><a data-bs-toggle="modal" data-bs-target="#loginModal"
                                        href="jaavascript:void(0);">Login</a></li>
                                <li><a href="{{ route('user.register') }}">Sign up</a></li>
                            @endif
                            <!-- <li> <a href=""><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Sort</a> </li> -->
                            <li> <a href=""><i class="fa fa-filter" aria-hidden="true"></i> Filter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="{{ route('user.contact') }}" class="btn  btn_navber">Get free
                                        quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="class="col-lg-6 col-md-6"">
                    <ul class="topbar-others-options">
                        <li> <a href=""><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Sort</a> </li>
                        <li> <a href=""><i class="fa fa-filter" aria-hidden="true"></i> Filter</a> </li>
                    </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
    <section id="common_banner" class="mob_bnr_none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Conversation</h2>
                        {{-- <ul>
                        <li><a href="/">Home</a></li>
                        <li><span><i class="fas fa-circle"></i></span><a href="tour-search.html">Tours</a></li>
                        <li><span><i class="fas fa-circle"></i></span> Tours Details</li>
                    </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cnvr">
        <div class="container-fluid">
            <div class="cnvrtn_content">
                <div class="cnv-title">
                    <h4>Spectactucular Singapure</h4>
                    <div class="mob_cht_hide">
                        <div class="mob_rsposv_teb">
                            <ul id="tabs">
                                <li>
                                    <a href="javascript:void(0)" class="cht_itnr_teb" id="chat">Chats</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="cht_itnr_teb " id="itinerary">Customize
                                        Itinerary</a>
                                </li>

                            </ul>
                            {{-- <button class="cht_itnr_teb chtItnrTabBtn" id="itinerary">Customize Itinerary
                            </button>
                            <button class="cht_itnr_teb chtItnrTabBtn" id="chat">Chats</button> --}}
                        </div>
                    </div>
                </div>
                {{-- **** only dec version **** --}}
                <div class="dec_design_chat">
                    <div class="row">
                        <div class="col-lg-3" id="">
                            <div class="conversation_itnr">
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 1 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>

                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            {{-- <a href=""><i class="fa fa-plus"
                                                            aria-hidden="true"></i></a> --}}
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                {{-- <div class="set_btn">
                                                <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 2 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>
                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                {{-- <div class="set_btn">
                                                <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 3 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>
                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                {{-- <div class="set_btn">
                                                <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 px-0 m-auto">
                            <div class="set_btn">
                                <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-8 " id="">
                            <div class="conversation">

                                <div class="cnvrstion_box">
                                    <div class="cnvrtn_chart">
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">

                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cnvrtn_text_box">
                                        <div class="cnvrtn_row">
                                            <div class="imogi_side">
                                                <a href="javascript:void(0)" id="ajntSendGallery"><i class="fa fa-paperclip"
                                                        aria-hidden="true"></i></a>
                                                        <div class="usr_ajnt_file">
                                                            <ul>
                                                                <li><a href="">Document</a></li>
                                                                <li><a href="">Photos</a></li>
                                                                <li><a href="">Contact</a></li>
                                                                {{-- <li><a href="">Delete</a></li> --}}
                                                            </ul>
                                                        </div>
                                                        {{-- <a href=""><i class="fa fa-smile-o" aria-hidden="true"></i></a> --}}
                                            </div>
                                            <div class="cnvrtn_text">
                                                {{-- <input type="text" name="" id="" cols="40"
                                            rows="5" placeholder="Type a massage"> --}}
                                                <p class="msg_text " contenteditable="true"
                                                    aria-placeholder="Type a massage"></p>
                                            </div>
                                            <div class="all_type_send">
                                                <a href=""><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- **** only mob version **** --}}
                <div class="mob_design_chat">
                    <div class="row">
                        <div class="col-lg-8 chateAnditnr " id="chat_C">
                            <div class="conversation">

                                <div class="cnvrstion_box">
                                    <div class="cnvrtn_chart">
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">

                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_left">
                                            <div class="agnt_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Ayush</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:30</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cnvrtn_right">
                                            <div class="usr_convrtn_box">
                                                <div class="usr_dtls">
                                                    <div class="cnvrtn_chack">
                                                        <p class="usr_name">Anish</p>
                                                        <span class="dt-tm">
                                                            <small>10-08-23</small>
                                                            <small>11:20</small>
                                                        </span>
                                                    </div>
                                                    <div class="rply_box">
                                                        <span class="cnvrtn_rply"><i class="fa fa-chevron-down"
                                                                aria-hidden="true"></i></span>
                                                        <div class="usr_ajnt_rply">
                                                            <ul>
                                                                <li><a href="">Reple</a></li>
                                                                <li><a href="">React</a></li>
                                                                <li><a href="">Forward</a></li>
                                                                <li><a href="">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="usr_cnvrtn">
                                                    <p>I need to throw a dinner party for 6 people who are vegetarian.
                                                        Can
                                                        you
                                                        suggest a
                                                        3-course menu with
                                                        a chocolate dessert?</p>
                                                    <div class="imogi">
                                                        <span><i class="fa fa-thumbs-up"
                                                                aria-hidden="true"></i></span>
                                                        {{-- <span><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cnvrtn_text_box">
                                        <div class="cnvrtn_row">
                                            <div class="imogi_side">
                                                <a href=""><i class="fa fa-paperclip"
                                                        aria-hidden="true"></i></a>
                                                {{-- <a href=""><i class="fa fa-smile-o" aria-hidden="true"></i></a> --}}
                                            </div>
                                            <div class="cnvrtn_text">
                                                {{-- <input type="text" name="" id="" cols="40"
                                                rows="5" placeholder="Type a massage"> --}}
                                                <p class="msg_text " contenteditable="true"
                                                    aria-placeholder="Type a massage"></p>
                                            </div>
                                            <div class="all_type_send">
                                                <a href=""><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 chateAnditnr" id="itinerary_C">
                            <div class="conversation_itnr">
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 1 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>

                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            {{-- <a href=""><i class="fa fa-plus"
                                                                aria-hidden="true"></i></a> --}}
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                {{-- <div class="set_btn">
                                                    <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 2 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>
                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                {{-- <div class="set_btn">
                                                    <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <h4 class="cnvrtn_itnr">
                                        Day 3 schedule
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#id01"><i
                                                class="fa fa-plus schedule" aria-hidden="true"></i></a>
                                    </h4>
                                    <div id="" class="">
                                        <div class="convrtn-body">
                                            <div class="convrtn_itinerary_list ">
                                                <ul>
                                                    <li>
                                                        <p><i class="fas fa-walking"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            At 12:00: we will start from Bukit Batok</p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02"><i
                                                                    class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i></a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-car" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Travel: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02"><i class="fa fa-refresh"
                                                                    aria-hidden="true"></i></a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-building" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Hotel: ABC
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Sight: Sight Cine 1
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Note: truck
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                            <i class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Meal: Thali
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <i class="fa fa-comments-o" aria-hidden="true"></i><i
                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                aria-hidden="true"></i>
                                                            Fligh
                                                        </p>
                                                        <div class="cnvrtn_itnr_add">
                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                data-target="#id02">
                                                                <i class="fa fa-refresh schedulee"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                            <a href=""><i class="fa fa-minus"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="set_btn">
                                    <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-1 px-0 m-auto">
                            <div class="set_btn">
                                <button><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal box --}}

    <div class="modal fade cnvstn_modal" id="id01" tabindex="-1" aria-labelledby="id01"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id01">Day 1 schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="form-check">
                    <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                        Day 1 schedule
                    </label>
                </div> --}}
                <div class="modal-body">
                    <div class="form-check">
                        <input type="hidden" id="pacakage_type_modal_id" name="pacakage_type_modal_id">
                        <h6 class="new_itnr_add"> Add New Itinerary</h6>
                        <div class="new_itnr row">
                            <div class="form-check col-lg-6">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                                    Time
                                </label>
                                <input type="time" class="form-control cnvrtn_tm_sz" name="txtTime"
                                    id="txtTime">

                                {{-- <input class="form-check-input" type="radio" name="PacakageTypecategory"
                            id="rdoTypeInternational" value="1"> --}}
                            </div>
                            <div class="form-check col-lg-6">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                                    City
                                </label>
                                <select class="form-select select2 slct_ct" id="newCity" name="newCity">
                                    <option value="0">Choose City</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-5">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Mode
                                </label>
                                <select class="form-select select2 slct_ct" id="newMode" name="newMode">
                                    <option value="0">Choose Mode</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Sight">Sight</option>
                                    <option value="Meal">Meal</option>
                                    <option value="Note">Note</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-5">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Mode Details
                                </label>
                                <select class="form-select select2 slct_ct" id="dtlsMode" name="dtlsMode">
                                    <option value="0">Choose Details</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-2">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    A/D
                                </label>
                                <select class="form-select select2 slct_ct" id="ADSelect" name="ADSelect">
                                    <option value="A" selected="">A</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-12">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Remarks
                                </label>
                                <textarea class="form-control" id="cnvstnRemarks" name="cnvstnRemarks"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <h6 class="new_itnr_add">
                            Existing Itinerary
                        </h6>
                        <div class="extng_itnr_box">
                            <div class="exstng_itnr">
                                <p> At 12:00: we will start from Bukit Batok</p><input type="checkbox">
                            </div>
                            <div class="exstng_itnr">
                                <p> Travel: truck</p><input type="checkbox">
                            </div>
                            <div class="exstng_itnr">
                                <p> Hotel: ABC</p><input type="checkbox">
                            </div>
                            <div class="exstng_itnr">
                                <p> Sight: Sight Cine 1</p><input type="checkbox">
                            </div>
                            <div class="exstng_itnr">
                                <p> Note: truck</p><input type="checkbox">
                            </div>
                            <div class="exstng_itnr">
                                <p> Meal: Thali</p><input type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary pacakgeType_proceed_id_btn"
                        data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cnvstn_modal" id="id02" tabindex="-1" aria-labelledby="id02"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id02">Edit Itinerary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="pacakage_type_modal_id" name="pacakage_type_modal_id">
                    <div class="form-check">
                        <input type="hidden" id="pacakage_type_modal_id" name="pacakage_type_modal_id">
                        <h6 class="new_itnr_add">Edit Itinerary</h6>
                        <div class="new_itnr row">
                            <div class="form-check col-lg-12">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                                    Itinerary Name
                                </label>
                                <input type="text" class="form-control cnvrtn_tm_sz" id="EditItinerary" placeholder="Itinerary Name">
                            </div>
                            <div class="form-check col-lg-6">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                                    Time
                                </label>
                                <input type="time" class="form-control cnvrtn_tm_sz" name="editTime"
                                    id="editTime">

                                {{-- <input class="form-check-input" type="radio" name="PacakageTypecategory"
                            id="rdoTypeInternational" value="1"> --}}
                            </div>
                            <div class="form-check col-lg-6">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="rdoTypeInternational">
                                    City
                                </label>
                                <select class="form-select select2 slct_ct" id="editCity" name="editCity">
                                    <option value="0">Choose City</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-5">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Mode
                                </label>
                                <select class="form-select select2 slct_ct" id="editMode" name="editMode">
                                    <option value="0">Choose Mode</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Sight">Sight</option>
                                    <option value="Meal">Meal</option>
                                    <option value="Note">Note</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-5">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Mode Details
                                </label>
                                <select class="form-select select2 slct_ct" id="editDtlsMode" name="editDtlsMode">
                                    <option value="0">Choose Details</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-2">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    A/D
                                </label>
                                <select class="form-select select2 slct_ct" id="editADSelect" name="editADSelect">
                                    <option value="A" selected="">A</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="form-check col-lg-12">
                                <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                                    Remarks
                                </label>
                                <textarea class="form-control" id="editRemarks" name="editRemarks"></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-check">
                        <label class="form-check-label mb-2 mt-2 schdl_itnr_lbl" for="">
                            Itinerary
                        </label>
                        <select class="form-select select2 slct_ct" name="selectItineraryI" id="selectItineraryI">
                            <option value="">At 12:00: we will start from Bukit Batok</option>
                            <option value="">Travel: truck</option>
                            <option value="">Hotel: ABC</option>
                            <option value="">Sight: Sight Cine 1</option>
                            <option value="">Note: truck</option>
                            <option value="">Meal: Thali</option>
                        </select>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary pacakgeType_proceed_id_btn"
                        data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div  class="modal fade" id="id01" tabindex="-1" aria-labelledby="avtivitymodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header add_itnr_mdl">
                    <h5 class="modal-title" id="avtivitymodal">Add Your Itinerary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="activity_modal_id" name="activity_modal_id">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory" id="selectScheduled"
                            value="1">
                        <label class="form-check-label" for="rdoInternational">
                            International
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory" id="selectItenary "
                            value="0">
                        <label class="form-check-label" for="rdoDomestic">
                            Domestic
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary activity_proceed_id_btn" data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div id="id02" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header add_itnr_mdl">
                    <h5 class="modal-title" id="avtivitymodal">Add Your Itinerary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="activity_modal_id" name="activity_modal_id">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory"
                            id="selectScheduled" value="1">
                        <label class="form-check-label" for="rdoInternational">
                            International
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory"
                            id="selectItenary " value="0">
                        <label class="form-check-label" for="rdoDomestic">
                            Domestic
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary activity_proceed_id_btn"
                        data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- modal box end --}}

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
    <script src="{{ asset('assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>


    <script src="https://code.tidio.co/jkmzvzqupiv8cfbq8g77qbrtpf4bknkz.js" async></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/user/js/toastr-my.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
    </script>


    <script>
        @if (session('status'))
            toastrerr();
            toastr.success("{{ session('status') }}");
        @endif
        $(document).ready(function() {

            $('#tabs li a:first').addClass('chteActive');
            $('.chateAnditnr').hide();
            $('.chateAnditnr:first').show();

            $('#tabs li a').click(function() {
                var id = $(this).attr('id');
                if (id == "chat") {
                    $('#chat').addClass('chteActive');
                    $('#itinerary').removeClass('chteActive');
                    $('.chateAnditnr').hide();
                    $('#' + id + '_C').fadeIn('slow');
                } else {
                    $('#itinerary').addClass('chteActive');
                    $('#chat').removeClass('chteActive');
                    $('.chateAnditnr').hide();
                    $('#' + id + '_C').fadeIn('slow');
                }
            });

            $(".rolltype").click(function() {

                var rolltype = $(this).attr('rolltype');
                //alert(rolltype);
                if (rolltype == 'admin') {
                    window.location.replace("/landing-page");
                } else {
                    window.location.replace("/user/dashboard");
                }
            });

            var email = $("#email").val();
            var password = $("#password").val();
            $('#email').keyup(function() {

                if ($('#email').val() != "") {
                    $('#email').removeClass('error_input');
                    $('#invalid-feedback-email').hide();
                } else {
                    $('#email').addClass('error_input');
                    $('#invalid-feedback-email').show();
                }
            });
            $('#password').keyup(function() {
                if ($('#password').val() != "") {
                    $('#password').removeClass('error_input');
                    $('#invalid-feedback-pass').hide();
                } else {
                    $('#password').addClass('error_input');
                    $('#invalid-feedback-pass').show();
                }
            });
            $("#loginbutton").click(function(e) {
                e.preventDefault();

                var email = $("#email").val();
                var password = $("#password").val();
                const re = /^[a-zA-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
                var emailValid = re.test(String(email).toLowerCase());
                if (!email && !password) {
                    toastrerr();
                    toastr.error("Please enter email and password", "");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter email and password',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    $('#password').addClass('error_input');
                    return false;
                }
                if (!email.trim()) {
                    toastrerr();
                    toastr.error('Please enter your email', '');
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter your email',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    return false;
                }
                if (!emailValid) {
                    toastrerr();
                    toastr.error("Please enter proper email");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter proper email',
                    //     position: 'topRight'
                    // });
                    $('#email').addClass('error_input');
                    return false;
                }
                if (!password.trim()) {
                    toastrerr();
                    toastr.error("Please enter password");
                    // iziToast.error({
                    //     title: 'Error!',
                    //     message: 'Please enter password',
                    //     position: 'topRight'
                    // });
                    $('#password').addClass('error_input');
                    return false;
                } else {
                    // var loginform = $("#login_form").val();
                    $.ajax({
                        type: "POST",
                        url: '/admin-check-email-password',
                        data: {
                            email: email,
                            password: password,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success == true) {
                                $('#userRegister').submit();


                            } else {
                                toastrerr();
                                toastr.error(
                                    'These credentials aren\'t in our system. Please try again',
                                    '');
                                // iziToast.error({
                                //     title: 'Error!',
                                //     message: 'These credentials aren\'t in our system. Please try again',
                                //     position: 'topRight'
                                // });
                                if (response.message == 'email-error') {
                                    $('#email').addClass('error_input');
                                    toastrerr();
                                    toastr.error(
                                        'Your Email-id Not Matched',
                                        '');
                                } else {
                                    $('#password').addClass('error_input');
                                    toastrerr();
                                    toastr.error(
                                        'Your Password Not Matched',
                                        '');
                                }
                            }
                        }
                    });
                }

            });

            $("#toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));

                if (input.attr("type") == "password") {

                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });

        // Get the modal

        $(document).on('click', '.schedule', function(e) {
            e.preventDefault();
            // var id = $(this).attr('typesubmitid');
            // $('#pacakage_type_modal_id').val(id);
            $('#id01').modal('show');
            // $("input[name='PacakageTypecategory']").prop('checked', false);;
        });
        $(document).on('click', '.close', function(e) {
            e.preventDefault();
            // $('#avtivitymodal').modal('hide');
            // *******Pacakage type Modal Clase
            $('#id01').modal('hide');
        });

        $(document).on('click', '.schedulee', function(e) {
            e.preventDefault();
            // var id = $(this).attr('typesubmitid');
            // $('#pacakage_type_modal_id').val(id);
            $('#id02').modal('show');
            // $("input[name='PacakageTypecategory']").prop('checked', false);;
        });
        $(document).on('click', '.close', function(e) {
            e.preventDefault();
            // $('#avtivitymodal').modal('hide');
            // *******Pacakage type Modal Clase
            $('#id02').modal('hide');
        });


        // $('#ajntSendGallery').on('click', function() {
        //     document.getElementsByClassName("usr_ajnt_file").style.display="block";
        // });

        // var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
        // Get the modal
        // var modal1 = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal1) {
        //         modal1.style.display = "none";
        //     }
        // }

        // chate teb

        // function chateAnditnrbox(event, contentName) {
        //     var i, chateAnditnr, chtItnrTabBtn;
        //     chateAnditnr = document.getElementsByClassName("chateAnditnr");
        //     for (i = 0; i < chateAnditnr.length; i++) {
        //         chateAnditnr[i].style.display = "none";
        //     }
        //     chtItnrTabBtn = document.getElementsByClassName("chtItnrTabBtn");
        //     for (i = 0; i < chtItnrTabBtn.length; i++) {
        //         chtItnrTabBtn[i].className = chtItnrTabBtn[i].className.replace(" chtActive", "");
        //     }

        //     document.getElementById(contentName).style.display = "block";
        //     event.currentTarget.className += " chtActive";
        // }
    </script>
</body>

</html>
