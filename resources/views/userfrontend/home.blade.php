@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .intrntn-destinations .slick-list {
            height: 100%;
        }

        .intrntn-destinations .slick-track {
            height: 93%;
        }

        .dmstc_desntion .slick-track {
            height: 100%;
        }

        .tab_destinations_boxed {
            flex-direction: column;
    
        }
        .tab_destinations_conntent {
            padding-top: 20px;
            padding-left: 20px;
            text-align: center;
        }

        .tab_destinations_img a img {
    width: 100%;
    
}
    </style>
@endsection

@section('content')
    <!-- Banner Area -->
    <section id="home_two_banner">
        <div class="home_two_banner_slider_wrapper owl-carousel owl-theme">
            @foreach ($bannerimage as $item)
                <div class="banner_two_slider_item fadeInUp" data-wow-duration="2s"
                    style="background-image: url({!! $item->slider_image !!});">
                    {{-- <div class="img-overlay bdr-30"> --}}
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner_two_text ">
                                    <div class="slider-sttle__left img-overlay bdr-20">
                                        <h3 class="title">{{ $item->slider_title_1 }}</h3>
                                        <h1 class="slider-sttle">{{ $item->slider_title_2 }}</h1>
                                        <h2 class="slider-pararp">{{ $item->slider_paragraph_1 }}</h2>
                                        <h4 class="slider-pararp">{{ $item->slider_paragraph_2 }}</h4>
                                        @if ($item->mode == 'destination')
                                            <div class="home_two_button btn-animation">
                                                <a href={{ route('AllInternationlaldestination') }}"
                                                    class="btn btn_theme_transparent btn_md">International Destination</a>
                                                <a href="{{ route('AllDomesticdestination') }}"
                                                    class="btn btn_theme_white btn_md">Domestic Destination</a>
                                            </div>
                                        @elseif ($item->mode == 'package')
                                            <div class="home_two_button btn-animation">
                                                <a href={{ route('AllInternationalPacakages') }}
                                                    class="btn btn_theme_transparent btn_md">International Pacakages</a>
                                                <a href="{{ route('AllDomesticPacakages') }}"
                                                    class="btn btn_theme_white btn_md">Domestic Pacakages</a>
                                            </div>
                                        @elseif ($item->mode == 'hotel')
                                            <div class="home_two_button btn-animation">
                                                {{-- <a href="#" class="btn btn_theme_white btn_md">Discover</a> --}}
                                                <a href="#" class="btn btn_theme_transparent btn_md">Know
                                                    more Hotel</a>
                                            </div>
                                        @elseif ($item->mode == 'sight')
                                            <div class="home_two_button btn-animation">
                                                <a href="#" class="btn btn_theme_white btn_md">Discover</a>
                                                <a href="#" class="btn btn_theme_transparent btn_md">Know
                                                    more</a>
                                            </div>
                                        @elseif ($item->mode == 'offbeatpackages')
                                            <div class="home_two_button btn-animation">
                                                <a href="#" class="btn btn_theme_white btn_md">Discover</a>
                                                <a href="#" class="btn btn_theme_transparent btn_md">Know
                                                    more</a>
                                            </div>
                                        @elseif ($item->mode == 'infopage')
                                            <div class="home_two_button btn-animation">
                                                {{-- <a href="#" class="btn btn_theme_white btn_md">Discover</a> --}}
                                                <a href="{{ route('user.about') }}"
                                                    class="btn btn_theme_transparent btn_md">Know
                                                    more</a>
                                            </div>
                                        @elseif ($item->mode == 'services1')
                                            <div class="home_two_button btn-animation">
                                                {{-- <a href="#" class="btn btn_theme_white btn_md">Discover</a> --}}
                                                <a href="{{ route('user.services') }}"
                                                    class="btn btn_theme_transparent btn_md">Know
                                                    more</a>
                                            </div>
                                        @elseif ($item->mode == 'services2')
                                            <div class="home_two_button btn-animation">
                                                <a href="#" class="btn btn_theme_white btn_md">Discover</a>
                                                <a href="#" class="btn btn_theme_transparent btn_md">Know
                                                    more</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="banner_two_slider_item fadeInUp" data-wow-duration="2s"
                style="background-image: url(assets/user/img/banner/banner-two-bg-2.png);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner_two_text">
                                <h3 class="title">BEST TRAVEL AGENCY</h3>
                                <h1 class="slider-sttle">EXPLORE</h1>
                                <h2 class="slider-pararp">The world with us!</h2>
                                <h4 class="slider-pararp">Find awesome flights, hotel, tour, car and packages</h4>
                                <div class="home_two_button btn-animation">
                                    <a href="top-destinations.html" class="btn btn_theme_white btn_md">Discover</a>
                                    <a href="top-destinations.html" class="btn btn_theme_transparent btn_md">Know
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_two_slider_item fadeInUp" data-wow-duration="2s"
                style="background-image: url(assets/user/img/banner/banner-two-bg-3.png);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner_two_text">
                                <h3 class="title">BEST TRAVEL AGENCY</h3>
                                <h1 class="slider-sttle">EXPLORE</h1>
                                <h2 class="slider-pararp">The world with us!</h2>
                                <h4 class="slider-pararp">Find awesome flights, hotel, tour, car and packages</h4>
                                <div class="home_two_button btn-animation">
                                    <a href="top-destinations.html" class="btn btn_theme_white btn_md">Discover</a>
                                    <a href="top-destinations.html" class="btn btn_theme_transparent btn_md">Know
                                        more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- Form Area -->
    <section id="theme_search_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="theme_search_form_tabbtn active_psn">
                            <ul class="nav nav-tabs " role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="flights-tab" data-bs-toggle="tab"
                                        data-bs-target="#flights" type="button" role="tab" aria-controls="flights"
                                        aria-selected="true"><i class="fas fa-plane-departure"></i>Flights</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tours-tab" data-bs-toggle="tab" data-bs-target="#tours"
                                        type="button" role="tab" aria-controls="tours" aria-selected="false"><i
                                            class="fas fa-globe"></i>Tours</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="hotels-tab" data-bs-toggle="tab" data-bs-target="#hotels"
                                        type="button" role="tab" aria-controls="hotels" aria-selected="false"><i
                                            class="fas fa-hotel"></i>Hotels</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="visa-tab" data-bs-toggle="tab"
                                        data-bs-target="#visa-application" type="button" role="tab"
                                        aria-controls="visa" aria-selected="false"><i class="fas fa-passport"></i>
                                        Visa</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="bus-tab" data-bs-toggle="tab" data-bs-target="#bus"
                                        type="button" role="tab" aria-controls="bus" aria-selected="false"><i
                                            class="fas fa-bus"></i> Transport</button>
                                </li>


                            </ul>
                        </div>
                        <div class="tab-content res_tb_cnt" id="myTabContent">
                            <div class="tab-pane fade show active" id="flights" role="tabpanel"
                                aria-labelledby="flights-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="flight_categories_search">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="oneway-tab" data-bs-toggle="tab"
                                                        data-bs-target="#oneway_flight" type="button" role="tab"
                                                        aria-controls="oneway_flight" aria-selected="true">One
                                                        Way</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="roundtrip-tab" data-bs-toggle="tab"
                                                        data-bs-target="#roundtrip" type="button" role="tab"
                                                        aria-controls="roundtrip" aria-selected="false">Roundtrip</button>
                                                </li>
                                                {{-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="multi_city-tab" data-bs-toggle="tab"
                                                        data-bs-target="#multi_city" type="button" role="tab"
                                                        aria-controls="multi_city" aria-selected="false">Multi
                                                        city</button>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent1">
                                    <div class="tab-pane fade show active" id="oneway_flight" role="tabpanel"
                                        aria-labelledby="oneway-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!" id="booking_form">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>From</p>
                                                                    {{-- <input type="text" value="New York"> --}}
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectcity">
                                                                        <option value="0">----- Select City -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    {{-- <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select> --}}
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-departure"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>To</p>
                                                                    {{-- <input type="text" value="New York"> --}}
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectcity">
                                                                        <option value="0">----- Select City -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    {{-- <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select> --}}
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>

                                                                    <div class="range_plan">
                                                                        <i class="fas fa-exchange-alt"></i>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="London">London</option>
                                                                        <option value="1">New York</option>
                                                                    </select>
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Departure Date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Return Date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>Flight Cabin Class</p>
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectCabin">
                                                                        <option value="0">----- Select Cabin -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    {{-- <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12 ">
                                                                <div class="flight_Search_boxed dropdown_passenger_area">
                                                                    <p>Guests & Rooms</p>
                                                                    {{-- <p>Passenger, Class </p> --}}
                                                                    <div class="dropdown">
                                                                        <button class="dropdown-toggle final-count acir_sz"
                                                                            data-toggle="dropdown" type="button"
                                                                            id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            0 Adults | 0 Child | 0 Infant
                                                                            {{-- 0 Passenger --}}
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown_passenger_info"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <div class="traveller-calulate-persons">
                                                                                <div class="passengers">
                                                                                    {{-- <h6>Passengers</h6> --}}
                                                                                    <div class="passengers-types">
                                                                                        {{-- <div class="passengers-type">
                                                                                            <div class="text"><span
                                                                                                    class="count rcount">0</span>
                                                                                                <div class="type-label d_flx">
                                                                                                    <p class="fz14 mb-xs-0 mr-1">
                                                                                                        1 Room
                                                                                                    </p><span>(Max 8)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="button-set">
                                                                                                <button type="button"
                                                                                                    class="btn-add-rm">
                                                                                                    <i class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-rm">
                                                                                                    <i class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                        <div class="passengers-type">
                                                                                            <div class="text">
                                                                                                <div
                                                                                                    class="type-label d_flx">
                                                                                                    <p class="mr-1">Adult
                                                                                                    </p>
                                                                                                    <span>(12+ yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count pcount">2</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">

                                                                                            <div class="text">
                                                                                                <div
                                                                                                    class="type-label d_flx ">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0 mr-1">
                                                                                                        Children</p>
                                                                                                    <span>(2 - Less than 12
                                                                                                        yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count ccount">0</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text">

                                                                                                <div
                                                                                                    class="type-label d_flx">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0 mr-1">
                                                                                                        Infant</p>
                                                                                                    <span>(Less than 2
                                                                                                        yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count ccount">0</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                            {{-- <div class="button-set">
                                                                                                <select name=""
                                                                                                    id=""
                                                                                                    class="slct_gst_rm">
                                                                                                    <option value="0">
                                                                                                        01
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        02
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        03
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        04
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        05
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        06
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        07
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        08
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        09
                                                                                                    </option>
                                                                                                    <option value="0">
                                                                                                        10
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div> --}}
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="cabin-selection">
                                                                                    <div class="chld_box">
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 1</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 2</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 3</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span>Business</span> --}}
                                                                </div>
                                                            </div>
                                                            <div class="top_form_search_button ">
                                                                <button
                                                                    class="btn btn_theme btn_md btn_psn">Search</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="roundtrip" role="tabpanel"
                                        aria-labelledby="roundtrip-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!" id="booking_form">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>From</p>
                                                                    {{-- <input type="text" value="New York"> --}}
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectcity">
                                                                        <option value="0">----- Select City -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    {{-- <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select> --}}
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-departure"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>To</p>
                                                                    {{-- <input type="text" value="New York"> --}}
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectcity">
                                                                        <option value="0">----- Select City -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    {{-- <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select> --}}
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>

                                                                    <div class="range_plan">
                                                                        <i class="fas fa-exchange-alt"></i>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="London">London</option>
                                                                        <option value="1">New York</option>
                                                                    </select>
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Departure Date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div class="form_search_date">
                                                                    <div class="flight_Search_boxed date_flex_area">
                                                                        <div class="Journey_date">
                                                                            <p>Return Date</p>
                                                                            <input type="date" value="2022-05-05">
                                                                            <span>Thursday</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed flt_gos">
                                                                    <p>Flight Cabin Class</p>
                                                                    <select class="form-select select2 slct_ct"
                                                                        name="selectcity" id="selectCabin">
                                                                        <option value="0">----- Select Cabin -----
                                                                        </option>
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select>
                                                                    <span class="">JFK - John F. Kennedy
                                                                        International...</span>
                                                                    {{-- <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                <div class="flight_Search_boxed dropdown_passenger_area">
                                                                    <p>Passenger, Class </p>
                                                                    <div class="dropdown">
                                                                        <button class="dropdown-toggle final-count acir_sz"
                                                                            data-toggle="dropdown" type="button"
                                                                            id="dropdownMenuButton1"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            0 Adults | 0 Child | 0 Infant
                                                                            {{-- 0 Passenger --}}
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown_passenger_info"
                                                                            aria-labelledby="dropdownMenuButton1">
                                                                            <div class="traveller-calulate-persons">
                                                                                <div class="passengers">
                                                                                    {{-- <h6>Passengers</h6> --}}
                                                                                    <div class="passengers-types">
                                                                                        <div class="passengers-type">
                                                                                            <div class="text">
                                                                                                <div
                                                                                                    class="type-label d_flx">
                                                                                                    <p class="mr-1">Adult
                                                                                                    </p>
                                                                                                    <span>(12+ yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add-rm">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count rcount">0</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-rm">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text">
                                                                                                <div
                                                                                                    class="type-label d_flx ">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0 mr-1">
                                                                                                        Children</p>
                                                                                                    <span>(2 - Less than 12
                                                                                                        yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count ccount">0</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="passengers-type">
                                                                                            <div class="text">
                                                                                                {{-- <span
                                                                                                    class="count incount">0</span> --}}
                                                                                                <div
                                                                                                    class="type-label d_flx">
                                                                                                    <p
                                                                                                        class="fz14 mb-xs-0 mr-1">
                                                                                                        Infant</p>
                                                                                                    <span>(Less than 2
                                                                                                        yrs)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="button-set guest_nom">
                                                                                                <button type="button"
                                                                                                    class="btn-add-c">
                                                                                                    <i
                                                                                                        class="fas fa-plus"></i>
                                                                                                </button>
                                                                                                <span
                                                                                                    class="count ccount">0</span>
                                                                                                <button type="button"
                                                                                                    class="btn-subtract-c">
                                                                                                    <i
                                                                                                        class="fas fa-minus"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cabin-selection">
                                                                                    <div class="chld_box">
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 1</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 2</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div id="content_1"
                                                                                            class="chldSlct">
                                                                                            <p>Age of child 3</p>
                                                                                            <select name=""
                                                                                                id="slctChldOptn">
                                                                                                <option value="0">0
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="1">1
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="2">2
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="3">3
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="4">4
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="5">5
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="6">6
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="7">7
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="8">8
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="9">9
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="10">10
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="11">11
                                                                                                    Year
                                                                                                </option>
                                                                                                <option value="12">12
                                                                                                    Year
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div class="cabin-selection">
                                                                                    <h6>Cabin Class</h6>
                                                                                    <div class="cabin-list">
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="muiButton-label">Economy
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn active">
                                                                                            <span class="muiButton-label">
                                                                                                Business
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="MuiButton-label">First
                                                                                                Class </span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <span>Business</span> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top_form_search_button">
                                                            <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="multi_city" role="tabpanel"
                                        aria-labelledby="multi_city-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="oneway_search_form">
                                                    <form action="#!" id="booking_form">
                                                        <div class="multi_city_form_wrapper">
                                                            <div class="multi_city_form">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>From</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select>
                                                                            {{-- <input type="text" value="New York"> --}}
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select> --}}
                                                                            <span>DAC, Hazrat Shahajalal
                                                                                International...</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>To</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select>
                                                                            {{-- <input type="text" value="London "> --}}
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="London">London</option>
                                                                                <option value="1">New York</option>
                                                                            </select> --}}
                                                                            <span>LCY, London city airport </span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-10">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-2  col-md-6 col-sm-12 col-12 d-none">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown" type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div
                                                                                        class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div class="passengers-types">
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less
                                                                                                                than 12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count incount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="multi_city_form">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>From</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select>
                                                                            {{-- <input type="text" value="New York"> --}}
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select> --}}
                                                                            <span>DAC, Hazrat Shahajalal
                                                                                International...</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>To</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="NewYork">New York</option>
                                                                                <option value="1">London</option>
                                                                            </select>
                                                                            {{-- <input type="text" value="London "> --}}
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="London">London</option>
                                                                                <option value="1">New York</option>
                                                                            </select> --}}
                                                                            <span>LCY, London city airport </span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-12">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-2  col-md-6 col-sm-12 col-12 d-none">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown" type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div
                                                                                        class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div class="passengers-types">
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less
                                                                                                                than 12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count incount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="add_multy_form multy_flight">
                                                                    <button type="button" id="addMulticityRow">+ Add
                                                                        another
                                                                        flight</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="top_form_search_button">
                                                            <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tours" role="tabpanel" aria-labelledby="tours-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!" id="booking_form">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed flt_gos">
                                                            {{-- <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span> --}}
                                                            <p>From</p>
                                                            {{-- <input type="text" value="New York"> --}}
                                                            <select class="form-select select2 slct_ct" name="selectcity"
                                                                id="selectcity">
                                                                <option value="0">----- Select City -----
                                                                </option>
                                                                <option value="NewYork">New York</option>
                                                                <option value="1">London</option>
                                                            </select>
                                                            <span class="">JFK - John F. Kennedy
                                                                International...</span>
                                                            <div class="plan_icon_posation">
                                                                <i class="fas fa-plane-arrival"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed flt_gos">
                                                            <p>To</p>
                                                            {{-- <input type="text" value="New York"> --}}
                                                            <select class="form-select select2 slct_ct" name="selectcity"
                                                                id="selectcity">
                                                                <option value="0">----- Select City -----
                                                                </option>
                                                                <option value="NewYork">New York</option>
                                                                <option value="1">London</option>
                                                            </select>
                                                            <span class="">JFK - John F. Kennedy
                                                                International...</span>
                                                            <div class="plan_icon_posation">
                                                                <i class="fas fa-plane-arrival"></i>
                                                            </div>

                                                            <div class="range_plan">
                                                                <i class="fas fa-exchange-alt"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Return date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12 d-none">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Passenger
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Passengers</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hotels" role="tabpanel" aria-labelledby="hotels-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            {{-- <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span> --}}
                                                            {{-- <div class="htl_typeBox">
                                                                <div class="htl_typeBox_radioBtn">
                                                                    <input type="radio" class="">
                                                                    <label for="">Domestic</label>
                                                                </div>
                                                                <div class="htl_typeBox_radioBtn">
                                                                    <input type="radio" class="">
                                                                    <label for="">International</label>
                                                                </div>
                                                            </div> --}}
                                                            <div class="flt_gos">
                                                                <p class="htl_ttl_city">COUNTRY OR LOCATION</p>
                                                                <select class="form-select select2 slct_ct"
                                                                    name="selectcity" id="selectcity">
                                                                    <option value="0">Landmark or Property Name
                                                                    </option>
                                                                    <option value="NewYork">New York</option>
                                                                    <option value="1">London</option>
                                                                </select>
                                                                <span class="">JFK - John F. Kennedy
                                                                    International...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <div class="flt_gos">
                                                                <p class="htl_ttl_city">CITY OR LOCATION</p>
                                                                <select class="form-select select2 slct_ct"
                                                                    name="selectcity" id="selectcity">
                                                                    <option value="0">Landmark or Property Name
                                                                    </option>
                                                                    <option value="NewYork">New York</option>
                                                                    <option value="1">London</option>
                                                                </select>
                                                                <span class="">JFK - John F. Kennedy
                                                                    International...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Check-in</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Check-out</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3  col-md-6 col-sm-12 col-12 ">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            {{-- <p>Guests & Rooms</p> --}}
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count acir_sz"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Adults | 0 Child | 0 Room
                                                                    {{-- 0 Passenger --}}
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            {{-- <h6>Passengers</h6> --}}
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text">
                                                                                        <div class="type-label d_flx">
                                                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                                                Room</p>
                                                                                            <span>(Max 8)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set guest_nom">
                                                                                        <button type="button"
                                                                                            class="btn-add-rm">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <span class="count rcount">0</span>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-rm">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                        {{-- <select name=""
                                                                                            id=""
                                                                                            class="slct_gst_rm">
                                                                                            <option value="0">01
                                                                                            </option>
                                                                                            <option value="0">02
                                                                                            </option>
                                                                                            <option value="0">03
                                                                                            </option>
                                                                                            <option value="0">04
                                                                                            </option>
                                                                                            <option value="0">05
                                                                                            </option>
                                                                                            <option value="0">06
                                                                                            </option>
                                                                                            <option value="0">07
                                                                                            </option>
                                                                                            <option value="0">08
                                                                                            </option>
                                                                                            <option value="0">09
                                                                                            </option>
                                                                                            <option value="0">10
                                                                                            </option>
                                                                                        </select> --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text">
                                                                                        <div class="type-label d_flx">
                                                                                            <p class="mr-1">Adult</p>
                                                                                            <span>(12+ yrs)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set guest_nom">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <span class="count pcount">2</span>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                        {{-- <select name=""
                                                                                            id=""
                                                                                            class="slct_gst_rm">
                                                                                            <option value="0">01
                                                                                            </option>
                                                                                            <option value="0">02
                                                                                            </option>
                                                                                            <option value="0">03
                                                                                            </option>
                                                                                            <option value="0">04
                                                                                            </option>
                                                                                            <option value="0">05
                                                                                            </option>
                                                                                            <option value="0">06
                                                                                            </option>
                                                                                            <option value="0">07
                                                                                            </option>
                                                                                            <option value="0">08
                                                                                            </option>
                                                                                            <option value="0">09
                                                                                            </option>
                                                                                            <option value="0">10
                                                                                            </option>
                                                                                        </select> --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">

                                                                                    <div class="text">
                                                                                        <div class="type-label d_flx ">
                                                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                                                Children</p>
                                                                                            <span>(2 - Less than 12
                                                                                                yrs)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set guest_nom">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <span class="count ccount">0</span>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type d-none">
                                                                                    <div class="text">
                                                                                        <span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label d_flx">
                                                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                                                Infant</p>
                                                                                            <span>(Less than 2 yrs)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set guest_nom">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <span class="count ccount">0</span>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                        {{-- <select name=""
                                                                                            id=""
                                                                                            class="slct_gst_rm">
                                                                                            <option value="0">01
                                                                                            </option>
                                                                                            <option value="0">02
                                                                                            </option>
                                                                                            <option value="0">03
                                                                                            </option>
                                                                                            <option value="0">04
                                                                                            </option>
                                                                                            <option value="0">05
                                                                                            </option>
                                                                                            <option value="0">06
                                                                                            </option>
                                                                                            <option value="0">07
                                                                                            </option>
                                                                                            <option value="0">08
                                                                                            </option>
                                                                                            <option value="0">09
                                                                                            </option>
                                                                                            <option value="0">10
                                                                                            </option>
                                                                                        </select> --}}
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <div class="chld_box">
                                                                                <div id="content_1" class="chldSlct">
                                                                                    <p>Age of child 1</p>
                                                                                    <select name=""
                                                                                        id="slctChldOptn">
                                                                                        <option value="0">0 Year
                                                                                        </option>
                                                                                        <option value="1">1 Year
                                                                                        </option>
                                                                                        <option value="2">2 Year
                                                                                        </option>
                                                                                        <option value="3">3 Year
                                                                                        </option>
                                                                                        <option value="4">4 Year
                                                                                        </option>
                                                                                        <option value="5">5 Year
                                                                                        </option>
                                                                                        <option value="6">6 Year
                                                                                        </option>
                                                                                        <option value="7">7 Year
                                                                                        </option>
                                                                                        <option value="8">8 Year
                                                                                        </option>
                                                                                        <option value="9">9 Year
                                                                                        </option>
                                                                                        <option value="10">10 Year
                                                                                        </option>
                                                                                        <option value="11">11 Year
                                                                                        </option>
                                                                                        <option value="12">12 Year
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div id="content_1" class="chldSlct">
                                                                                    <p>Age of child 2</p>
                                                                                    <select name=""
                                                                                        id="slctChldOptn">
                                                                                        <option value="0">0 Year
                                                                                        </option>
                                                                                        <option value="1">1 Year
                                                                                        </option>
                                                                                        <option value="2">2 Year
                                                                                        </option>
                                                                                        <option value="3">3 Year
                                                                                        </option>
                                                                                        <option value="4">4 Year
                                                                                        </option>
                                                                                        <option value="5">5 Year
                                                                                        </option>
                                                                                        <option value="6">6 Year
                                                                                        </option>
                                                                                        <option value="7">7 Year
                                                                                        </option>
                                                                                        <option value="8">8 Year
                                                                                        </option>
                                                                                        <option value="9">9 Year
                                                                                        </option>
                                                                                        <option value="10">10 Year
                                                                                        </option>
                                                                                        <option value="11">11 Year
                                                                                        </option>
                                                                                        <option value="12">12 Year
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div id="content_1" class="chldSlct">
                                                                                    <p>Age of child 3</p>
                                                                                    <select name=""
                                                                                        id="slctChldOptn">
                                                                                        <option value="0">0 Year
                                                                                        </option>
                                                                                        <option value="1">1 Year
                                                                                        </option>
                                                                                        <option value="2">2 Year
                                                                                        </option>
                                                                                        <option value="3">3 Year
                                                                                        </option>
                                                                                        <option value="4">4 Year
                                                                                        </option>
                                                                                        <option value="5">5 Year
                                                                                        </option>
                                                                                        <option value="6">6 Year
                                                                                        </option>
                                                                                        <option value="7">7 Year
                                                                                        </option>
                                                                                        <option value="8">8 Year
                                                                                        </option>
                                                                                        <option value="9">9 Year
                                                                                        </option>
                                                                                        <option value="10">10 Year
                                                                                        </option>
                                                                                        <option value="11">11 Year
                                                                                        </option>
                                                                                        <option value="12">12 Year
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            {{-- <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <span>Business</span> --}}
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="visa-application" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Select country</p>
                                                            <input type="text" value="United states">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Your nationality</p>
                                                            <input type="text" value="Bangladesh">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Entry date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Exit date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Traveller, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Traveller
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Traveller</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="apartments" role="tabpanel"
                                aria-labelledby="apartments-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                                <div class="Journey_date">
                                                                    <p>Return date</p>
                                                                    <input type="date" value="2022-05-05">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed dropdown_passenger_area">
                                                            <p>Passenger, Class </p>
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle final-count"
                                                                    data-toggle="dropdown" type="button"
                                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    0 Traveler
                                                                </button>
                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <div class="traveller-calulate-persons">
                                                                        <div class="passengers">
                                                                            <h6>Passengers</h6>
                                                                            <div class="passengers-types">
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count pcount">2</span>
                                                                                        <div class="type-label">
                                                                                            <p>Adult</p>
                                                                                            <span>12+
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count ccount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Children
                                                                                            </p><span>2
                                                                                                - Less than 12
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-c">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-c">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="passengers-type">
                                                                                    <div class="text"><span
                                                                                            class="count incount">0</span>
                                                                                        <div class="type-label">
                                                                                            <p class="fz14 mb-xs-0">
                                                                                                Infant
                                                                                            </p><span>Less
                                                                                                than 2
                                                                                                yrs</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="button-set">
                                                                                        <button type="button"
                                                                                            class="btn-add-in">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="btn-subtract-in">
                                                                                            <i class="fas fa-minus"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cabin-selection">
                                                                            <h6>Cabin Class</h6>
                                                                            <div class="cabin-list">
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="muiButton-label">Economy
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn active">
                                                                                    <span class="muiButton-label">
                                                                                        Business
                                                                                    </span>
                                                                                </button>
                                                                                <button type="button"
                                                                                    class="label-select-btn">
                                                                                    <span class="MuiButton-label">First
                                                                                        Class </span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span>Business</span>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bus" role="tabpanel" aria-labelledby="bus-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="oneway_search_form">
                                                            <form action="#!" id="booking_form">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>From</p>
                                                                            {{-- <input type="text" value="Dhaka"> --}}
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="0">Cox’s Bazar
                                                                                </option>
                                                                                <option value="1">Dhaka</option>
                                                                            </select>
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="Dhaka">Dhaka</option>
                                                                                <option value="1">Cox’s Bazar</option>
                                                                            </select> --}}
                                                                            <span>Bus Trtminal</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>To</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="selectcity" id="selectcity">
                                                                                <option value="0">----- Select City
                                                                                    -----
                                                                                </option>
                                                                                <option value="0">Dhaka</option>
                                                                                <option value="1">Cox’s Bazar
                                                                                </option>
                                                                            </select>
                                                                            {{-- <input type="text" value="Cox’s Bazar "> --}}
                                                                            {{-- <select class="slct_ct" name=""
                                                                                id="">
                                                                                <option value="Cox’sBazar">Cox’s Bazar
                                                                                </option>
                                                                                <option value="1">Dhaka</option>
                                                                            </select> --}}
                                                                            <span>Bus Trtminal</span>
                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>
                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4  col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Journey date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-05">
                                                                                    <span>Thursday</span>
                                                                                </div>
                                                                                <div class="Journey_date">
                                                                                    <p>Return date</p>
                                                                                    <input type="date"
                                                                                        value="2022-05-08">
                                                                                    <span>Saturday</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-2  col-md-6 col-sm-12 col-12 d-none">
                                                                        <div
                                                                            class="flight_Search_boxed dropdown_passenger_area">
                                                                            <p>Passenger, Class </p>
                                                                            <div class="dropdown">
                                                                                <button
                                                                                    class="dropdown-toggle final-count"
                                                                                    data-toggle="dropdown"
                                                                                    type="button"
                                                                                    id="dropdownMenuButton1"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    0 Passenger
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown_passenger_info"
                                                                                    aria-labelledby="dropdownMenuButton1">
                                                                                    <div
                                                                                        class="traveller-calulate-persons">
                                                                                        <div class="passengers">
                                                                                            <h6>Passengers</h6>
                                                                                            <div class="passengers-types">
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count pcount">2</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p>Adult</p>
                                                                                                            <span>12+
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count ccount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Children
                                                                                                            </p><span>2
                                                                                                                - Less than
                                                                                                                12
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-c">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-c">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="passengers-type">
                                                                                                    <div class="text">
                                                                                                        <span
                                                                                                            class="count incount">0</span>
                                                                                                        <div
                                                                                                            class="type-label">
                                                                                                            <p
                                                                                                                class="fz14 mb-xs-0">
                                                                                                                Infant
                                                                                                            </p><span>Less
                                                                                                                than 2
                                                                                                                yrs</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="button-set">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-add-in">
                                                                                                            <i
                                                                                                                class="fas fa-plus"></i>
                                                                                                        </button>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn-subtract-in">
                                                                                                            <i
                                                                                                                class="fas fa-minus"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="cabin-selection">
                                                                                            <h6>Cabin Class</h6>
                                                                                            <div class="cabin-list">
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="muiButton-label">Economy
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn active">
                                                                                                    <span
                                                                                                        class="muiButton-label">
                                                                                                        Business
                                                                                                    </span>
                                                                                                </button>
                                                                                                <button type="button"
                                                                                                    class="label-select-btn">
                                                                                                    <span
                                                                                                        class="MuiButton-label">First
                                                                                                        Class </span>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span>Business</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="top_form_search_button">
                                                                        <button
                                                                            class="btn btn_theme btn_md btn_psn">Search</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cruise" role="tabpanel" aria-labelledby="cruise-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tour_search_form">
                                            <form action="#!">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Destination</p>
                                                            <input type="text" placeholder="Where are you going?">
                                                            <span>Where are you going?</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                        <div class="flight_Search_boxed">
                                                            <p>Cruise line</p>
                                                            <input type="text" placeholder="American line">
                                                            <span>Choose your cruise</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                        <div class="form_search_date">
                                                            <div class="flight_Search_boxed date_flex_area">
                                                                <div class="Journey_date">
                                                                    <p>Journey date</p>
                                                                    <input type="date" value="2022-05-03">
                                                                    <span>Thursday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="top_form_search_button">
                                                        <button class="btn btn_theme btn_md btn_psn">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- imagination Area -->
    <section id="go_beyond_area" class="section_padding_top ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="heading_left_area">
                        <h2>Go beyond your <span>imagination</span></h2>
                        <h5> Exploare our International packages</h5>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class=" owl-carousel" id="explr_intrntn">
                        <div class="item">
                            <div class="imagination_boxed">
                                <a href="#">
                                    <img src="assets/user/img/imagination/imagination1.png" alt="img">
                                </a>
                                <h3><a href="#">Explore our exciting <span>Himalayan Package</span></a></h3>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imagination_boxed">
                                <a href="#">
                                    <img src="assets/user/img/imagination/imagination2.png" alt="img">
                                </a>
                                <h3><a href="#!">Travel around<span>the world</span></a></h3>
                            </div>
                        </div>
                        <div class="item">
                            <div class="imagination_boxed">
                                <a href="#">
                                    <img src="assets/user/img/imagination/imagination3.png" alt="img">
                                </a>
                                <h3><a href="#">Luxury Stays<span>top deals</span></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top destinations -->
    <section id="top_destinations" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Top International destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 intrntn-destinations">
                    <div class="destinations_content_box  height_100 hm-imgwt inner">
                        <a href="" class="img_animation">
                            <img src="assets/user/img/destination/big-img.png" alt="img" class="height_100">
                        </a>
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>50</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Holiday packages</h2>
                            <a href="#" class="btn btn_theme btn_md">Book now</a>
                        </div>
                    </div>
                    <div class="destinations_content_box  height_100 hm-imgwt inner">
                        <a href="" class="img_animation">
                            <img src="assets/user/img/destination/home-two-des-1.png" alt="img"
                                class="height_100">
                        </a>
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>50</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Holiday packages</h2>
                            <a href="#" class="btn btn_theme btn_md">Book now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            {{-- <div class="destinations_content_box img_animation"> --}}
                            <div class="destinations_content_box">
                                @if (isset($tiles[1]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[1]['selected_destination']->id }}"
                                        class=" img_animation ">

                                        <img src="{{ getDestiThumb_image($tiles[1]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[1]['selected_destination']->id }}">
                                                @if (isset($tiles[1]['selected_destination']))
                                                    {{ $tiles[1]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[1]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                        {{-- <p> {{ getCountryName($tiles[1]['selected_destination_country']->country_id) }}</p> --}}
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box">
                                @if (isset($tiles[2]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[2]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[2]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[2]['selected_destination']->id }}">
                                                @if (isset($tiles[2]['selected_destination']))
                                                    {{ $tiles[2]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[2]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>

                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box  thumble-long">
                                @if (isset($tiles[3]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[3]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[3]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[3]['selected_destination']->id }}">
                                                @if (isset($tiles[3]['selected_destination']))
                                                    {{ $tiles[3]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[3]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box  thumble-long">
                                @if (isset($tiles[4]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[4]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[4]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[4]['selected_destination']->id }}">
                                                @if (isset($tiles[4]['selected_destination']))
                                                    {{ $tiles[4]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[4]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box ">
                                @if (isset($tiles[5]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[5]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[5]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[5]['selected_destination']->id }}">
                                                @if (isset($tiles[5]['selected_destination']))
                                                    {{ $tiles[5]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[5]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box ">
                                @if (isset($tiles[6]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[6]['selected_destination']->id }}"
                                        class=" img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[6]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[6]['selected_destination']->id }}">
                                                @if (isset($tiles[6]['selected_destination']))
                                                    {{ $tiles[6]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[6]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box  thumble-mid-long">
                                @if (isset($tiles[7]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[7]['selected_destination']->id }}"
                                        class=" img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[7]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[7]['selected_destination']->id }}">
                                                @if (isset($tiles[7]['selected_destination']))
                                                    {{ $tiles[7]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[7]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box  thumble-mid-long">
                                @if (isset($tiles[8]['selected_destination']))
                                    <a href="/international-package/{{ $tiles[8]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tiles[8]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>

                                    <div class="destinations_content_inner">
                                        <h3>
                                            <a href="/international-package/{{ $tiles[8]['selected_destination']->id }}">
                                                @if (isset($tiles[8]['selected_destination']))
                                                    {{ $tiles[8]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ getCountryName($tiles[8]['selected_destination_country']->country_id) }}
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box">
                                <a href="{{ route('AllInternationlaldestination') }}"
                                    class="btn btn_theme btn_md w-100">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="top_destinations" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Top Domestic destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination7.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[7]['selected_destination']))
                                                {{ $tiles[7]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination8.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[8]['selected_destination']))
                                                {{ $tiles[8]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box">
                                <a href="#" class="btn btn_theme btn_md w-100">View all</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination1.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[1]['selected_destination']))
                                                {{ $tiles[1]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination2.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[2]['selected_destination']))
                                                {{ $tiles[2]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination3.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[3]['selected_destination']))
                                                {{ $tiles[3]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination4.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[4]['selected_destination']))
                                                {{ $tiles[4]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination5.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[5]['selected_destination']))
                                                {{ $tiles[5]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="destinations_content_box img_animation">
                                <a href="#">
                                    <img src="assets/user/img/destination/destination6.png" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3>
                                        <a href="#">
                                            @if (isset($tiles[6]['selected_destination']))
                                                {{ $tiles[6]['selected_destination']->destination_name }}
                                            @endif
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="d-flex flex-column">
                        <div class="p-0">
                            <div class="destinations_content_box img_animation domestic_container_height">
                                <img src="assets/user/img/destination/big-img.png" alt="img" class="domestic_img">
                                <div class="destinations_content_inner">
                                    <h2>Up to</h2>
                                    <div class="destinations_big_offer">
                                        <h1>50</h1>
                                        <h6><span>%</span> <span>Off</span></h6>
                                    </div>
                                    <h2>Holiday packages</h2>
                                    <a href="#" class="btn btn_theme btn_md">Book now</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-0">
                            <div class="destinations_content_box img_animation domestic_container_height">
                                <img src="assets/user/img/destination/big-img.png" alt="img" class="domestic_img">
                                <div class="destinations_content_inner">
                                    <h2>Up to</h2>
                                    <div class="destinations_big_offer">
                                        <h1>50</h1>
                                        <h6><span>%</span> <span>Off</span></h6>
                                    </div>
                                    <h2>Holiday packages</h2>
                                    <a href="#" class="btn btn_theme btn_md">Book now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                </div>
                
            </div>
        </div>
    </section> --}}
    <section id="top_destinations" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Top Domestic <span>destinations</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            {{-- <div class="destinations_content_box img_animation"> --}}
                            <div class="destinations_content_box">
                                @if (isset($tilesDomestic[1]['selected_destination']))
                                    <a href="/domestic-package/{{ $tilesDomestic[1]['selected_destination']->id }}"
                                        class=" img_animation ">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[1]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        {{-- <h3>
                                            <a href="/international-package/{{ $tiles[1]['selected_destination']->id }}">
                                                @if (isset($tiles[1]['selected_destination']))
                                                    {{ $tiles[1]['selected_destination']->destination_name }}
                                                @endif
                                            </a>
                                        </h3> --}}
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                @if (isset($tilesDomestic[1]['selected_destination']))
                                                    {{ $tilesDomestic[1]['selected_destination']->destination_name }}
                                                @endif
                                            </p>

                                        </div>
                                        {{-- <p> {{ getCountryName($tiles[1]['selected_destination_country']->country_id) }}</p> --}}
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box">
                                @if (isset($tilesDomestic[2]['selected_destination']))
                                    <a href="/domestic-package/{{ $tilesDomestic[2]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[2]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        {{-- <h3>
                                            <a href="/international-package/{{ $tiles[2]['selected_destination']->id }}"
                                                        class="img_animation">
                                                        @if (isset($tiles[2]['selected_destination']))
                                                            {{ $tiles[2]['selected_destination']->destination_name }}
                                                        @endif
                                                    </a>
                                        </h3> --}}
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                @if (isset($tilesDomestic[2]['selected_destination']))
                                                    {{ $tilesDomestic[2]['selected_destination']->destination_name }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box  thumble-long">
                                @if (isset($tilesDomestic[3]['selected_destination']))
                                    <a href="/domestic-package/{{ $tilesDomestic[3]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[3]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        {{-- <h3>
                                                    <a href="/international-package/{{ $tiles[3]['selected_destination']->id }}">
                                                        @if (isset($tiles[3]['selected_destination']))
                                                            {{ $tiles[3]['selected_destination']->destination_name }}
                                                        @endif
                                                    </a>
                                                </h3> --}}
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                @if (isset($tilesDomestic[3]['selected_destination']))
                                                    {{ $tilesDomestic[3]['selected_destination']->destination_name }}
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="destinations_content_box  thumble-long">
                                @if (isset($tilesDomestic[4]['selected_destination']))
                                    <a href="/domestic-package/{{ $tilesDomestic[4]['selected_destination']->id }}"
                                        class="img_animation">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[4]['selected_destination']->id) }}"
                                            alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        {{-- <h3>
                                                    <a href="/international-package/{{ $tiles[4]['selected_destination']->id }}">
                                                        @if (isset($tiles[4]['selected_destination']))
                                                            {{ $tiles[4]['selected_destination']->destination_name }}
                                                        @endif
                                                    </a>
                                                </h3> --}}
                                        <div class="ellps_hvr_box">
                                            <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                @if (isset($tilesDomestic[4]['selected_destination']))
                                                    {{ $tilesDomestic[4]['selected_destination']->destination_name }}
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="destinations_content_box ">
                                @if (isset($tilesDomestic[5]['selected_destination']))
                                        <a href="/domestic-package/{{ $tilesDomestic[5]['selected_destination']->id }}"
                                            class="img_animation">
                                            <img src="{{ getDestiThumb_image($tilesDomestic[5]['selected_destination']->id) }}"
                                                alt="img">
                                        </a>
                                        <div class="destinations_content_inner">
                                            {{-- <h3>
                                                    <a href="/international-package/{{ $tiles[5]['selected_destination']->id }}">
                                                        @if (isset($tiles[5]['selected_destination']))
                                                            {{ $tiles[5]['selected_destination']->destination_name }}
                                                        @endif
                                                    </a>
                                                </h3> --}}
                                            <div class="ellps_hvr_box">
                                                <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                        class="fas fa-map-marker-alt"></i>
                                                    @if (isset($tilesDomestic[5]['selected_destination']))
                                                        {{ $tilesDomestic[5]['selected_destination']->destination_name }}
                                                    @endif
                                                </p>

                                            </div>
                                        </div>
                                @endif
                            </div>

                            <div class="destinations_content_box ">
                                @if (isset($tilesDomestic[6]['selected_destination']))
                                        <a href="/domestic-package/{{ $tilesDomestic[6]['selected_destination']->id }}"
                                            class="img_animation">
                                            <img src="{{ getDestiThumb_image($tilesDomestic[6]['selected_destination']->id) }}"
                                                alt="img">
                                        </a>
                                        <div class="destinations_content_inner">
                                            {{-- <h3>
                                                    <a href="/international-package/{{ $tiles[6]['selected_destination']->id }}">
                                                        @if (isset($tiles[6]['selected_destination']))
                                                            {{ $tiles[6]['selected_destination']->destination_name }}
                                                        @endif
                                                    </a>
                                                </h3> --}}
                                            <div class="ellps_hvr_box">
                                                <p class="text_ellipsis" style="font-size: 13px; color: #eeedff"><i
                                                        class="fas fa-map-marker-alt"></i>
                                                    @if (isset($tilesDomestic[6]['selected_destination']))
                                                        {{ $tilesDomestic[6]['selected_destination']->destination_name }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">

                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 intrntn-destinations dmstc_desntion mb-0">
                    <div class="destinations_content_box  height_100 hm-imgwt inner">
                        <a href="" class="img_animation">
                            <img src="assets/user/img/destination/big-img.png" alt="img" class="height_100">
                        </a>
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>50</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Holiday packages</h2>
                            <a href="#" class="btn btn_theme btn_md">Book now</a>
                        </div>
                    </div>
                    <div class="destinations_content_box  height_100 hm-imgwt inner">
                        <a href="" class="img_animation">
                            <img src="assets/user/img/destination/home-two-des-1.png" alt="img"
                                class="height_100">
                        </a>
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>50</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Holiday packages</h2>
                            <a href="#" class="btn btn_theme btn_md">Book now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-4">
                    <div class="destinations_content_box">
                        <a href="{{ route('AllDomesticdestination') }}"
                            class="btn btn_theme btn_md w-100">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section id="holiday_destinations" class="section_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="holiday_left_heading">
                                <div class="heading_left_area">
                                    <h2>Top Domestic <span>destinations</span></h2>
                                    <h5>Discover your ideal experience with us
                                        <a href="{{ route('AllDomesticdestination') }}"><small>... View all</small> </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if (isset($tilesDomestic[1]['selected_destination']))
                                <div class="holiday_small_boxed small-length">
                                    <a href="/domestic-package/{{ $tilesDomestic[1]['selected_destination']->id }}">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[1]['selected_destination']->id) }}"
                                            alt="img">
                                        <div class="holiday_small_box_content">
                                            <div class="holiday_inner_content">
                                             <div class="rating_outof">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <h5>5 Out of 5</h5>
                                            </div>
                                                <h3>
                                                    @if (isset($tilesDomestic[1]['selected_destination']))
                                                        {{ $tilesDomestic[1]['selected_destination']->destination_name }}
                                                    @endif
                                                </h3>
                                                <h4>8 days 7 nights</h4>
                                            <p>Cupidatat consectetur ea cillum nt
                                                consectetur excepteur.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if (isset($tilesDomestic[2]['selected_destination']))
                                <div class="holiday_small_boxed small-length">
                                    <a href="/domestic-package/{{ $tilesDomestic[2]['selected_destination']->id }}">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[2]['selected_destination']->id) }}"
                                            alt="img">
                                        <div class="holiday_small_box_content">
                                            <div class="holiday_inner_content">
                                            
                                                <h3>
                                                    @if (isset($tilesDomestic[2]['selected_destination']))
                                                        {{ $tilesDomestic[2]['selected_destination']->destination_name }}
                                                    @endif
                                                </h3>
                                               
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            @if (isset($tilesDomestic[3]['selected_destination']))
                                <div class="holiday_small_boxed long-length">
                                    <a href="/domestic-package/{{ $tilesDomestic[3]['selected_destination']->id }}">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[3]['selected_destination']->id) }}"
                                            alt="img">
                                        <div class="holiday_small_box_content">
                                            <div class="holiday_inner_content">
                                            
                                                <h3>
                                                    @if (isset($tilesDomestic[3]['selected_destination']))
                                                        {{ $tilesDomestic[3]['selected_destination']->destination_name }}
                                                    @endif
                                                </h3>
                                               
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (isset($tilesDomestic[4]['selected_destination']))
                                <div class="holiday_small_boxed largebox_height">
                                    <a href="/domestic-package/{{ $tilesDomestic[4]['selected_destination']->id }}">
                                        <img src="{{ getDestiThumb_image($tilesDomestic[4]['selected_destination']->id) }}"
                                            alt="img">
                                        <div class="holiday_small_box_content">
                                            <div class="holiday_inner_content">
                                            
                                                <h3>
                                                    @if (isset($tilesDomestic[4]['selected_destination']))
                                                        {{ $tilesDomestic[4]['selected_destination']->destination_name }}
                                                    @endif
                                                </h3>
                                               
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    @if (isset($tilesDomestic[5]['selected_destination']))
                                        <div class="holiday_small_boxed small-length">
                                            <a
                                                href="/domestic-package/{{ $tilesDomestic[5]['selected_destination']->id }}">
                                                <img src="{{ getDestiThumb_image($tilesDomestic[5]['selected_destination']->id) }}"
                                                    alt="img">
                                                <div class="holiday_small_box_content">
                                                    <div class="holiday_inner_content">
                                                       
                                                        <h3>
                                                            @if (isset($tilesDomestic[5]['selected_destination']))
                                                                {{ $tilesDomestic[5]['selected_destination']->destination_name }}
                                                            @endif
                                                        </h3>
                                                        
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                    @if (isset($tilesDomestic[6]['selected_destination']))
                                        <div class="holiday_small_boxed small-length">
                                            <a
                                                href="/domestic-package/{{ $tilesDomestic[6]['selected_destination']->id }}">
                                                <img src="{{ getDestiThumb_image($tilesDomestic[6]['selected_destination']->id) }}"
                                                    alt="img">
                                                <div class="holiday_small_box_content">
                                                    <div class="holiday_inner_content">
                                                      
                                                        <h3>
                                                            @if (isset($tilesDomestic[6]['selected_destination']))
                                                                {{ $tilesDomestic[6]['selected_destination']->destination_name }}
                                                            @endif
                                                        </h3>
                                                       
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Promotional Tours Area -->
    {{-- <section id="promotional_tours" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Our Top Domestic Destinations</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="promotional_tour_slider owl-theme owl-carousel dot_style">
                        @foreach ($domestic_destinations as $dd)
                            <div class="theme_common_box_two img_hover">
                                <div class="theme_two_box_img">
                                    <a href="#"><img src="assets/user/img/tab-img/dom-d.png" alt="img"></a>
                                    <p><i class="fas fa-map-marker-alt"></i>{{ getStateName($dd->state_id) }}</p>
                                </div>
                                <div class="theme_two_box_content">
                                    <h4><a href="#">{{ $dd->destination_name }}</a></h4>
                                    <p><span class="review_rating">4.8/5 Excellent</span> <span
                                            class="review_count">(1214
                                            reviewes)</span></p>
                                    <p style="color: rgb(16, 9, 9)">{{ $dd->short_description }}</p>

                                    <h3 style="color: #8B3EEA"><span style="color: rgb(16, 9, 9)">Price starts
                                            from</span> <i class="fas fa-rupee-sign fa-xs"></i>{{ $dd->price_range_1 }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    {{-- Internatonal Package --}}
    @if (count($ruleengine_interpacakge_result) > 0)
        <section id="explore_area" class="section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section_heading_center">
                            <h2>Our International Packages</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="promotional_tour_slider owl-theme owl-carousel dot_style">
                            @foreach ($ruleengine_interpacakge_result as $ruliteminner)
                                <div class="theme_common_box_two img_hover">
                                    <div class="theme_two_box_img">
                                        <a href="/package-details/{{ $ruliteminner->id }}">
                                            <img src="{{ $ruliteminner->image }}" alt="img">
                                        </a>
                                        <p>{{ $ruliteminner->nights }}N | {{ $ruliteminner->days }}D</p>
                                    </div>
                                    {{-- <div class="theme_two_box_content" style="height: 20rem;"> --}}
                                    <div class="theme_two_box_content">
                                        <h6 class="mb-2"><a href="/package-details/{{ $ruliteminner->id }}"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                {{ $ruliteminner->name }}</a></h6>
                                        <div class="d-flex justify-content-start mb-2">
                                            <div class="p-2 bd-highlight"><i class="fas fa-hotel"></i><small> 2
                                                    Hotel</small>
                                            </div>
                                            <div class="p-2 bd-highlight"><i class="fas fa-walking"></i><small> 4
                                                    Activities
                                                </small></div>
                                            <div class="p-2 bd-highlight"><i class="fas fa-car"></i><small>
                                                    2
                                                    Transport
                                                </small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between ">
                                            <div class="p-2 bd-highlight">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">An item</li>
                                                    <li class="list-group-item">A second item</li>
                                                    <li class="list-group-item">A third item</li>
                                                    <li class="list-group-item">A fourth item</li>
                                                    <li class="list-group-item">And a fifth one</li>
                                                </ul>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <small class="small"><i
                                                        class="fas fa-rupee-sign fa-xs"></i>{{ $ruliteminner->off_price }}</small>
                                                <h3><b><i
                                                            class="fas fa-rupee-sign fa-xs"></i>{{ $ruliteminner->rack_price }}</b>
                                                </h3>
                                                <small>Per Person</small>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Internatonal Package --}}
    @else
    @endif
    {{-- Domestic Package --}}
    @if (count($ruleengine_domespacakge_result) > 0)
        <section id="explore_area" class="section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section_heading_center">
                            <h2>Explore Our Domestic Packages</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promotional_tour_slider owl-theme owl-carousel dot_style">
                            @foreach ($ruleengine_domespacakge_result as $ruliteminnerD)
                                <div class="choose_desti_wrapper">
                                    <div class="choose_des_inner_wrap">
                                        <div class="choose_boxed_inner">
                                            <img src="{{ $ruliteminnerD->image }}" alt="img">
                                            <div class="choose_img_text">
                                                <h2>{{ $ruliteminnerD->name }} </h2>
                                                <small>{{ getStateName($ruliteminnerD->state_id) }} | <i
                                                        class="fas fa-rupee-sign fa-xs"></i>
                                                    {{ $ruliteminnerD->off_price }}</small>
                                                <h3>{{ $ruliteminnerD->nights }}N | {{ $ruliteminnerD->days }}D
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="flep_choose_box">
                                            <div class="flep_choose_box_inner">
                                            
                                                <h2>{{ $ruliteminnerD->name }} </h2>
                                                <small>{{ getStateName($ruliteminnerD->state_id) }} | <i
                                                        class="fas fa-rupee-sign fa-xs"></i>
                                                    {{ $ruliteminnerD->off_price }}</small>
                                                <h3>{{ $ruliteminnerD->nights }}N | {{ $ruliteminnerD->days }}D
                                                </h3>
                                                <p>{!! $ruliteminnerD->short_description !!}</p>
                                                <a href="/package-details/{{ $ruliteminnerD->id }}">Tour details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif
    {{-- End Domestic Package --}}

    <!-- Offer Area -->
    {{-- <section id="offer_area" class="section_padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="offer_area_box d-none-phone img_animation">
                        <img src="assets/user/img/offer/offer1.png" alt="img">
                        <div class="offer_area_content">
                            <h2>Special Offers</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et ea rebum. Stet clita kasd dolor sit amet. Lorem ipsum
                                dolor sit amet.</p>
                            <a href="#!" class="btn btn_theme btn_md">Holiday deals</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="offer_area_box img_animation">
                        <img src="assets/user/img/offer/offer2.png" alt="img">
                        <div class="offer_area_content">
                            <h2>News letter</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>
                            <a href="#!" class="btn btn_theme btn_md">Subscribe now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="offer_area_box img_animation">
                        <img src="assets/user/img/offer/offer3.png" alt="img">
                        <div class="offer_area_content">
                            <h2>Travel tips</h2>
                            <p>Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>
                            <a href="#!" class="btn btn_theme btn_md">Get tips</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- Domestic Destinations --}}
    <section id="promotional_tours" class="section_padding_top d-none">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Our Hotels Across World</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="promotional_tour_slider owl-theme owl-carousel dot_style">
                        @foreach ($hotels as $hotel)
                            <div class="theme_common_box_two img_hover">
                                <div class="theme_two_box_img">
                                    <a href="#"><img src="assets/user/img/tab-img/hotel1.png"
                                            alt="img"></a>
                                    <p><i class="fas fa-map-marker-alt"></i>{{ getCityName($hotel->city_id) }}</p>
                                    <div class="discount_tab">
                                        <span>{{ $hotel->hotel_star }} star</span>
                                    </div>
                                </div>
                                <div class="theme_two_box_content">
                                    <h4><a href="#">{{ $hotel->hotel_name }}</a></h4>
                                    <p><span class="review_rating">4.8/5 Excellent</span> <span
                                            class="review_count">(1214
                                            reviewes)</span></p>
                                    <h3> <span>Price starts from</span></h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Destinations Area -->
    {{-- <section id="destinations_area" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Package Types</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="theme_nav_tab">
                        <nav class="theme_nav_tab_item">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-nepal-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-nepal" type="button" role="tab"
                                    aria-controls="nav-nepal" aria-selected="true">Family</button>
                                <button class="nav-link" id="nav-malaysia-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-malaysia" type="button" role="tab"
                                    aria-controls="nav-malaysia" aria-selected="false">Corporate</button>
                                <button class="nav-link" id="nav-indonesia-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-indonesia" type="button" role="tab"
                                    aria-controls="nav-indonesia" aria-selected="false">Honeymoon</button>
                                <button class="nav-link" id="nav-turkey-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-turkey" type="button" role="tab"
                                    aria-controls="nav-turkey" aria-selected="false">Solo</button>
                                <button class="nav-link" id="nav-china-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-china" type="button" role="tab"
                                    aria-controls="nav-china" aria-selected="false">Friends</button>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="nav-tabContent1">
                        <div class="tab-pane fade show active" id="nav-nepal" role="tabpanel"
                            aria-labelledby="nav-nepal-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small1.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Everest trek to Base Camp</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small2.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Kathmundu tour</a></h3>
                                            <p>Price starts at <span>$85.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small5.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Chitwan national park</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-malaysia" role="tabpanel"
                            aria-labelledby="nav-malaysia-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small2.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Kathmundu tour</a></h3>
                                            <p>Price starts at <span>$85.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#">
                                                <img src="assets/user/img/destination/destination-small4.png"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-indonesia" role="tabpanel"
                            aria-labelledby="nav-indonesia-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-turkey" role="tabpanel" aria-labelledby="nav-turkey-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small2.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Kathmundu tour</a></h3>
                                            <p>Price starts at <span>$85.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-china" role="tabpanel" aria-labelledby="nav-china-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-darjeeling" role="tabpanel"
                            aria-labelledby="nav-darjeeling-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-italy" role="tabpanel" aria-labelledby="nav-italy-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @if (count($package_type) > 0)
        <section id="popular_tours_four" class="section_padding_top">
            <div class="container">
                <!-- Section Heading -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section_heading_center">
                            <h2>Package Types</h2>
                            <p>Nostrud aliqua ipsum dolore velit labore nulla fugiat.</p>
                        </div>
                    </div>
                </div>
                <!-- inner content -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="tour_type_slider button_style_top_left owl-theme owl-carousel">
                            @foreach ($package_type as $type)
                                <a href="javascript:void(0)" typesubmitid="{{ $type->id }}"
                                    class="pacakageTypeID" data-toggle="modal" data-target="#pacakagetypeModal">
                                    <div class="tour_type_boxed">
                                        <img src="{{ $type->icone_image }}" alt="icon">
                                        <h3>{{ $type->package_type }}</h3>
                                        {{-- <p>Package starts from $120</p> --}}
                                    </div>
                                </a>
                            @endforeach

                            {{-- <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/bag.png" alt="icon">
                            <h3>Lone Travel</h3>
                            
                        </div>
                        <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/tour.png" alt="icon">
                            <h3>Adventure Tour</h3>
                           
                        </div>
                        <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/family.png" alt="icon">
                            <h3>Family Tour</h3>
                           
                        </div>
                        <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/beach.png" alt="icon">
                            <h3>Beach Tour</h3>
                            
                        </div>
                        <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/bag.png" alt="icon">
                            <h3>Lone Travel</h3>
                           
                        </div>
                        <div class="tour_type_boxed">
                            <img src="assets/user/img/icon/tour.png" alt="icon">
                            <h3>Adventure Tour</h3>
                           
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif

    {{-- Activities --}}
    @if (count($activity) > 0)
        <section id="destinations_area" class="section_padding_top">
            <div class="container">
                <!-- Section Heading -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section_heading_center">
                            <h2>Activities</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content" id="nav-tabContent1">
                            <div class="tab-pane fade show active" id="nav-nepal" role="tabpanel"
                                aria-labelledby="nav-nepal-tab">
                                <div class="row">
                                    @foreach ($activity as $item)
                                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                            <div class="tab_destinations_boxed">
                                                <div class="tab_destinations_img">
                                                    @if ($item->activity_images)
                                                        <a href="javascript:void(0)" submitid="{{ $item->id }}"
                                                            class="activityID" data-toggle="modal"
                                                            data-target="#avtivitymodal"><img
                                                                src="/{{ $item->activity_images }}"
                                                                alt="img"></a>
                                                    @else
                                                        <a href="javascript:void(0)" submitid="{{ $item->id }}"
                                                            class="activityID" data-toggle="modal"
                                                            data-target="#avtivitymodal"><img
                                                                src="assets/user/img/blank_photo.png"
                                                                alt="img"></a>
                                                    @endif

                                                </div>
                                                <div class="tab_destinations_conntent ">
                                                    <h3><a href="javascript:void(0)" submitid="{{ $item->id }}"
                                                            class="activityID" data-toggle="modal"
                                                            data-target="#avtivitymodal">{{ $item->package_activity }}</a>
                                                    </h3>
                                                    {{-- <p>Price starts at <span>INR 2000.00</span></p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- @endforeach --}}

                            {{-- <div class="tab-pane fade" id="nav-malaysia" role="tabpanel"
                            aria-labelledby="nav-malaysia-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small2.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Kathmundu tour</a></h3>
                                            <p>Price starts at <span>$85.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#">
                                                <img src="assets/user/img/destination/destination-small4.png"
                                                    alt="img">
                                            </a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-indonesia" role="tabpanel"
                            aria-labelledby="nav-indonesia-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-turkey" role="tabpanel" aria-labelledby="nav-turkey-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small2.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Kathmundu tour</a></h3>
                                            <p>Price starts at <span>$85.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small3.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Beautiful pokhara</a></h3>
                                            <p>Price starts at <span>$100.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-china" role="tabpanel" aria-labelledby="nav-china-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-darjeeling" role="tabpanel"
                            aria-labelledby="nav-darjeeling-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-italy" role="tabpanel" aria-labelledby="nav-italy-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small4.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Annapurna region</a></h3>
                                            <p>Price starts at <span>$75.00</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="tab_destinations_boxed">
                                        <div class="tab_destinations_img">
                                            <a href="#"><img
                                                    src="assets/user/img/destination/destination-small6.png"
                                                    alt="img"></a>
                                        </div>
                                        <div class="tab_destinations_conntent">
                                            <h3><a href="#">Langtang region</a></h3>
                                            <p>Price starts at <span>$105.00</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif
    {{-- End --}}
    <!-- News Area -->
    {{-- <section id="home_news" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Latest travel news</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="home_news_left_wrapper">
                        <div class="home_news_item">
                            <div class="home_news_img">
                                <a href="news-details.html"><img src="assets/user/img/news/small1.png" alt="img"></a>
                            </div>
                            <div class="home_news_content">
                                <h3><a href="news-details.html">Revolutionising the travel industry,
                                        one partnership at a time</a></h3>
                                <p><a href="news.html">26 Oct 2021</a> <span> <i class="fas fa-circle"></i>5min
                                        read</span> </p>
                            </div>
                        </div>
                        <div class="home_news_item">
                            <div class="home_news_img">
                                <a href="news-details.html"><img src="assets/user/img/news/small2.png" alt="img"></a>
                            </div>
                            <div class="home_news_content">
                                <h3><a href="news-details.html">t is a long established fact that a reader will be
                                        distracted.</a></h3>
                                <p><a href="news.html">26 Oct 2021</a> <span> <i class="fas fa-circle"></i>5min
                                        read</span> </p>
                            </div>
                        </div>
                        <div class="home_news_item">
                            <div class="home_news_img">
                                <a href="news-details.html"><img src="assets/user/img/news/small3.png" alt="img"></a>
                            </div>
                            <div class="home_news_content">
                                <h3><a href="#!">There are many variations of passages of sum available</a></h3>
                                <p><a href="news.html">26 Oct 2021</a> <span> <i class="fas fa-circle"></i>5min
                                        read</span> </p>
                            </div>
                        </div>
                        <div class="home_news_item">
                            <div class="home_news_img">
                                <a href="news-details.html"><img src="assets/user/img/news/small4.png" alt="img"></a>
                            </div>
                            <div class="home_news_content">
                                <h3><a href="news-details.html">Contrary to popular belief, Lorem Ipsum is not
                                        simply.</a></h3>
                                <p><a href="news.html">26 Oct 2021</a> <span> <i class="fas fa-circle"></i>5min
                                        read</span> </p>
                            </div>
                        </div>
                        <div class="home_news_item">
                            <div class="seeall_link">
                                <a href="news.html">See all article <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_news_big">
                        <div class="news_home_bigest img_hover">
                            <a href="news-details.html"><img src="assets/user/img/news/new-big.png" alt="img"></a>
                        </div>
                        <h3><a href="news-details.html">There are many variations of passages available but</a> </h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of.
                            The point of using Lorem Ipsum is that it has a more</p>
                        <p>It is a long established fact that a reader will be distracted by the readable long
                            established fact that a reader will be distracted content of a
                            page when looking at its layout.</p>
                        <a href="news-details.html">Read full article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Our partners Area -->
    {{-- <section id="our_partners" class="section_padding">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Our partners</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="partner_slider_area owl-theme owl-carousel">
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/1.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/2.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/3.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/4.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/5.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/6.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/7.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/8.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/5.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/3.png" alt="logo"></a>
                        </div>
                        <div class="partner_logo">
                            <a href="#!"><img src="assets/user/img/partner/2.png" alt="logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="assets/user/img/common/email.png" alt="icon">
                        </div>
                        <div class="cta_content">
                            <h4>Get the latest news and offers</h4>
                            <h2>Subscribe to our newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group"><input type="text" class="form-control"
                                    placeholder="Enter your mail address"><button class="btn btn_theme btn_md"
                                    type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade cnvstn_modal" id="avtivitymodal" tabindex="-1" aria-labelledby="avtivitymodal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avtivitymodal">Choose Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="activity_modal_id" name="activity_modal_id">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory" id="rdoInternational"
                            value="1">
                        <label class="form-check-label" for="rdoInternational">
                            International
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activitycategory" id="rdoDomestic"
                            value="0">
                        <label class="form-check-label" for="rdoDomestic">
                            Domestic
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary activity_proceed_id_btn" data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cnvstn_modal" id="pacakagetypeModal" tabindex="-1" aria-labelledby="pacakagetypeModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pacakagetypeModal">Choose Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="pacakage_type_modal_id" name="pacakage_type_modal_id">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="PacakageTypecategory"
                            id="rdoTypeInternational" value="1">
                        <label class="form-check-label" for="rdoTypeInternational">
                            International
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="PacakageTypecategory"
                            id="rdoTypeDomestic" value="0">
                        <label class="form-check-label" for="rdoTypeDomestic">
                            Domestic
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary pacakgeType_proceed_id_btn" data-dismiss="modal">Yes
                        Proceed</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }

        $(document).ready(function() {
            // $('#avtivitymodal').modal('toggle');

        });
        $(document).on('click', '.activityID', function(e) {
            e.preventDefault();
            var id = $(this).attr('submitid');
            $('#activity_modal_id').val(id);
            $('#avtivitymodal').modal('show');
            $("input[name='activitycategory']").prop('checked', false);;
        });

        // *******Pacakage type Search click Function
        $(document).on('click', '.pacakageTypeID', function(e) {
            e.preventDefault();
            var id = $(this).attr('typesubmitid');
            $('#pacakage_type_modal_id').val(id);
            $('#pacakagetypeModal').modal('show');
            $("input[name='PacakageTypecategory']").prop('checked', false);;
        });


        $(document).on('click', '.close', function(e) {
            e.preventDefault();
            $('#avtivitymodal').modal('hide');
            // *******Pacakage type Modal Clase
            $('#pacakagetypeModal').modal('hide');
        });

        $('.activity_proceed_id_btn').on('click', function(e) {
            e.preventDefault();
            var id = $('#activity_modal_id').val();
            var category = $("input[name='activitycategory']:checked").val();
            window.location = '/allpacakages/' + id + '/' + category;

        });

        // *******Pacakage type Search
        $('.pacakgeType_proceed_id_btn').on('click', function(e) {
            e.preventDefault();
            var packageTypeid = $('#pacakage_type_modal_id').val();
            var packageTypecategory = $("input[name='PacakageTypecategory']:checked").val();
            window.location = '/allpacakagesbyType/' + packageTypeid + '/' + packageTypecategory;

        });

        // slider
        jQuery("#explr_intrntn").owlCarousel({
            autoplay: true,
            rewind: false,
            /* use rewind if you don't want loop */
            margin: 20,
            loop: true,
            /*
              animateOut: 'fadeOut',
              animateIn: 'fadeIn',
              */
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 7000,
            smartSpeed: 800,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },

                600: {
                    items: 2
                },

                1024: {
                    items: 3
                },

                1366: {
                    items: 3
                }
            }
        });

        $('.intrntn-destinations').slick({
            dots: false,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
