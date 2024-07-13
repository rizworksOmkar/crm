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
                                {{-- <li class="nav-item">
                                    <a href="/flight-booking-process" class="nav-link">
                                        Flight
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/hotel" class="nav-link">Hotels</a>

                                </li>
                                <li class="nav-item">
                                    <a href="/hotelApi" class="nav-link">Hotels Api</a>

                                </li> --}}
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
                                            class="btn  btn_navber navbar-aris-sign">Sign In</a>
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
                            <li class="fltr_box"> <a href="javascript:void(0)"><i class="fa fa-filter"
                                        aria-hidden="true"></i> Filter</a>
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

    @yield('content')

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
                        <p>
                            @if ($companyName->company_name)
                                © 2023 All Rights Reserved {!! $companyName->company_name !!}.
                            @else
                            @endif
                        </p>
                    </div>
                </div>
                {{-- <div class="co-lg-4 col-md-6 col-sm-12 col-12">
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
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="modal_login_boxed">
                        <div class="modal_login_heading">
                            <h3>Login your account</h3>
                            <h6>Logged in to stay in touch</h6>
                            <div class="btn_modal_closed">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="modal_login_form">
                            <form autocomplete="off" action="/login" method="post" id="userRegister">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" name="email" class="form-control"
                                        placeholder="Enter Email Id" />
                                    <div class="invalid-feedback" id="invalid-feedback-email">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pass-icon">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter password" />
                                        <i class="fa fa-eye" aria-hidden="true" id="toggle-password"
                                            toggle="#password"></i>

                                    </div>
                                    <a href="#">Forgot password?</a>
                                    <div class="invalid-feedback" id="invalid-feedback-pass">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="common_form_submit">
                                    <button class="btn btn_theme btn_md" id="loginbutton">Log in</button>
                                </div>
                                <div class="have_acount_area">
                                    <p>Dont have an account? <a href="{{ route('user.register') }}">Register now</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="logout_approve_button">
                        <a href="#" class="btn btn_theme btn_md">Yes I DO</a>

                    </div> --}}
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/user/js/toastr-my.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
    </script>
    @yield('scripts')

    <script>
        @if (session('status'))
            toastrerr();
            toastr.success("{{ session('status') }}");
        @endif
        $(document).ready(function() {
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
                                // toastrerr();
                                // toastr.error(
                                //     'These credentials aren\'t in our system. Please try again',
                                //     '');
                                // iziToast.error({
                                //     title: 'Error!',
                                //     message: 'These credentials aren\'t in our system. Please try again',
                                //     position: 'topRight'
                                // });
                                if (response.message == 'email-error') {
                                    $('#email').addClass('error_input');
                                    toastrerr();
                                    toastr.error(
                                        'These credentials aren\'t in our system. Please try again',
                                        '');
                                } else if (response.message == 'verifid-error') {
                                    toastrerr();
                                    toastr.error(
                                        'These credentials aren\'t verified at our system. Please try again',
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
    </script>

    {{-- filter box --}}
    <script>
        $('.fltr_box').click(function() {
            $('.left_side_search_area').slideToggle({
                direction: "up"
            }, 300);
            $(this).toggleClass('clientsClose');
        });
    </script>
</body>

</html>
