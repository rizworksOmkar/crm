@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>All Hotel Api</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Hotel</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Area -->
    <section id="theme_search_form_tour">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tour_search_form">
                                    <form action="#!" id="booking_form">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                                <div class="flight_Search_boxed flt_gos">
                                                    <p>Depart From (City)</p>
                                                    <select class="form-select select2 slct_ct" name="selectcity"
                                                        id="selectcity">
                                                        {{-- <option value="0">----- Select City -----</option> --}}
                                                        <option value="1">Kolkata</option>
                                                        <option value="2">Delhi</option>
                                                    </select>
                                                    <span>JFK - John F. Kennedy International...</span>
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
                                            <div class="col-lg-4  col-md-6 col-sm-12 col-12 ">
                                                <div class="flight_Search_boxed dropdown_passenger_area">
                                                    <p>Guests & Rooms</p>
                                                    {{-- <p>Passenger, Class </p> --}}
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle final-count acir_sz"
                                                            data-toggle="dropdown" type="button" id="dropdownMenuButton1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            0 Adults | 0 Child | 0 Infant | 0 Room
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
                                                                                        1 Room
                                                                                    </p><span>(Max 8)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="button-set d_flx align-items-center">
                                                                                <button type="button" class="btn-add-rm">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button>
                                                                                <span class="count rcount">0</span>
                                                                                <button type="button"
                                                                                    class="btn-subtract-rm">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="passengers-type">
                                                                            <div class="text">

                                                                                <div class="type-label d_flx">
                                                                                    <p class="mr-1">Adult</p>
                                                                                    <span>(12+ yrs)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="button-set d_flx align-items-center">
                                                                                <button type="button" class="btn-add">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button>
                                                                                <span class="count pcount">2</span>
                                                                                <button type="button" class="btn-subtract">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
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
                                                                            <div
                                                                                class="button-set d_flx align-items-center">
                                                                                <button type="button" class="btn-add-c">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button>
                                                                                <span class="count ccount">0</span>
                                                                                <button type="button"
                                                                                    class="btn-subtract-c">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                                                {{-- <select name="" id="slctGuest"
                                                                                    class="slct_gst_rm">
                                                                                    <option value="0">00
                                                                                    </option>
                                                                                    <option value="01">01
                                                                                    </option>
                                                                                    <option value="02">02
                                                                                    </option>
                                                                                    <option value="03">03
                                                                                    </option>
                                                                                    <option value="04">04
                                                                                    </option>
                                                                                    <option value="05">05
                                                                                    </option>
                                                                                    <option value="06">06
                                                                                    </option>
                                                                                    <option value="07">07
                                                                                    </option>
                                                                                    <option value="08">08
                                                                                    </option>
                                                                                    <option value="09">09
                                                                                    </option>
                                                                                    <option value="10">10
                                                                                    </option>
                                                                                </select> --}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="passengers-type d-none">
                                                                            <div class="text">
                                                                                <div class="type-label d_flx">
                                                                                    <p class="fz14 mb-xs-0 mr-1">
                                                                                        Infant</p>
                                                                                    <span>(Less than 2 yrs)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="button-set d_flx align-items-center">
                                                                                <button type="button" class="btn-add-in">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button>
                                                                                <span class="count incount">0</span>

                                                                                <button type="button"
                                                                                    class="btn-subtract-in">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                                                {{-- <select name="" id=""
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
                                                                            <select name="" id="slctChldOptn">
                                                                                <option value="0">0 Year</option>
                                                                                <option value="1">1 Year</option>
                                                                                <option value="2">2 Year</option>
                                                                                <option value="3">3 Year</option>
                                                                                <option value="4">4 Year</option>
                                                                                <option value="5">5 Year</option>
                                                                                <option value="6">6 Year</option>
                                                                                <option value="7">7 Year</option>
                                                                                <option value="8">8 Year</option>
                                                                                <option value="9">9 Year</option>
                                                                                <option value="10">10 Year</option>
                                                                                <option value="11">11 Year</option>
                                                                                <option value="12">12 Year</option>
                                                                            </select>
                                                                        </div>
                                                                        <div id="content_1" class="chldSlct">
                                                                            <p>Age of child 2</p>
                                                                            <select name="" id="slctChldOptn">
                                                                                <option value="0">0 Year</option>
                                                                                <option value="1">1 Year</option>
                                                                                <option value="2">2 Year</option>
                                                                                <option value="3">3 Year</option>
                                                                                <option value="4">4 Year</option>
                                                                                <option value="5">5 Year</option>
                                                                                <option value="6">6 Year</option>
                                                                                <option value="7">7 Year</option>
                                                                                <option value="8">8 Year</option>
                                                                                <option value="9">9 Year</option>
                                                                                <option value="10">10 Year</option>
                                                                                <option value="11">11 Year</option>
                                                                                <option value="12">12 Year</option>
                                                                            </select>
                                                                        </div>
                                                                        <div id="content_1" class="chldSlct">
                                                                            <p>Age of child 3</p>
                                                                            <select name="" id="slctChldOptn">
                                                                                <option value="0">0 Year</option>
                                                                                <option value="1">1 Year</option>
                                                                                <option value="2">2 Year</option>
                                                                                <option value="3">3 Year</option>
                                                                                <option value="4">4 Year</option>
                                                                                <option value="5">5 Year</option>
                                                                                <option value="6">6 Year</option>
                                                                                <option value="7">7 Year</option>
                                                                                <option value="8">8 Year</option>
                                                                                <option value="9">9 Year</option>
                                                                                <option value="10">10 Year</option>
                                                                                <option value="11">11 Year</option>
                                                                                <option value="12">12 Year</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <h6>Cabin Class</h6>
                                                                    <div class="cabin-list">
                                                                        <button type="button" class="label-select-btn">
                                                                            <span class="muiButton-label">Economy
                                                                            </span>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="label-select-btn active">
                                                                            <span class="muiButton-label">
                                                                                Business
                                                                            </span>
                                                                        </button>
                                                                        <button type="button" class="label-select-btn">
                                                                            <span class="MuiButton-label">First
                                                                                Class </span>
                                                                        </button>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span>Business</span>
                                                </div>
                                            </div>
                                            <div class="top_form_search_button">
                                                <button class="btn btn_theme btn_md btn_psn"
                                                    id="btnSearch">Search</button>
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
    </section>


    <section id="explore_area" class="section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center" id="kolkataHeader">
                        <div id="packCount">
                            <h2>Hotel Packages For Kolkata</h2>
                        </div>

                    </div>
                    <div class="section_heading_center" id="delhiHeader">
                        <div id="packCount">
                            <h2>Hotel Packages For Delhi</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                {{-- ---------- Filter ----------- --}}
                <div class="col-lg-2">
                    <div class="left_side_search_area">
                        <form id="filterForm">
                            <div class="htl_dbgt">
                                <p>Your budget <br> <span>(per night)</span></p>
                                <div class="ctgr_htl_dbgt">
                                    <div class="htl-rng-type">
                                        <label for="">MIN</label>
                                        <input type="text" placeholder="Rs">
                                    </div>
                                    <div class="htl-rng-type">
                                        <label for="">MAX</label>
                                        <input type="text" placeholder="Rs">
                                    </div>
                                </div>
                            </div>
                            <div class="left_side_search_boxed d-none">
                                <div class="left_side_search_heading">
                                    <h5>Price range</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Upto ₹2000</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>₹2001 - ₹4000</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>₹4000 - ₹6000</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>₹6000 +</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Star Rating</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="0,2" id="flexCheckDefaultf1">
                                        <label class="form-check-label" for="flexCheckDefaultf1">
                                            <span class="htl_str_rting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="3,7" id="flexCheckDefaultf2">
                                        <label class="form-check-label" for="flexCheckDefaultf2">
                                            <span class="htl_str_rting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="8,14" id="flexCheckDefaultaf3">
                                        <label class="form-check-label" for="flexCheckDefaultaf3">
                                            <span class="htl_str_rting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="15,0" id="flexCheckDefaultaf4">
                                        <label class="form-check-label" for="flexCheckDefaultaf4">
                                            <span class="htl_str_rting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="15,0" id="flexCheckDefaultaf4">
                                        <label class="form-check-label" for="flexCheckDefaultaf4">
                                            <span class="htl_str_rting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Customer Rating</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>5.0</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>4.5 +</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>4.0</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>3.75</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>3.0</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>2.75 +</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Property Type</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget" value="0,3000"
                                            id="flexBudget1">
                                        <label class="form-check-label" for="flexBudget1">
                                            <span class="area_flex_one">
                                                <span>Apartment</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="3001,5000" id="flexBudget2">
                                        <label class="form-check-label" for="flexBudget2">
                                            <span class="area_flex_one">
                                                <span>Guest House</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="5001,10000" id="flexBudget3">
                                        <label class="form-check-label" for="flexBudget3">
                                            <span class="area_flex_one">
                                                <span>Villa</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="10001,25000" id="flexBudget4">
                                        <label class="form-check-label" for="flexBudget4">
                                            <span class="area_flex_one">
                                                <span>Hotel</span>

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="25001,50000" id="flexBudget5">
                                        <label class="form-check-label" for="flexBudget5">
                                            <span class="area_flex_one">
                                                <span>Villa</span>

                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Amenities</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Wi-Fi </span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Spa</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Swimming Pool </span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Airport Transfers</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Balcony/Terrace</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Bar</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Barbeque</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Cafe</span>

                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Food and Drink</h5>
                                </div>
                                <div class="tour_search_type htl_fltr_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Jain Food Available</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>Pure Veg Restaurant</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefaultf" name="activity_type_id[]">
                                        <label class="form-check-label" for="flexCheckDefaultf">
                                            <span class="area_flex_one">
                                                <span>24 Hours Restaurant</span>

                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- ---------- Hotel Listing ----------- --}}
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="kolkata">
                                <div class="cruise_search_result_wrapper">
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png" alt="img"
                                                            class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                            class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content  pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>

                                                                </div>

                                                                <h4>Hotel Crestwood</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Park circus - <span class="ct_cl">Kolkata</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Kolkata railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type_str ">
                                                                        <span class="htl_ctgr_str">
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star" aria-hidden="true"></i>

                                                                        </span>
                                                                        <p> HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>

                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav" aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child" aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>2500</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>2000
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="/hotelDetails"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png" alt="img"
                                                            class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                            class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content  pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                    <p>5 STAR</p>
                                                                </div>
                                                                <div class="htl_type">
                                                                    <p>GUEST HOUSE</p>
                                                                </div> --}}
                                                                </div>

                                                                <h4>JW Marriott Hotel</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Science City - <span class="ct_cl">Kolkata</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Kolkata railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav" aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child" aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>1500</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>1200
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="/hotelDetails"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png" alt="img"
                                                            class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                            class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                    <p>5 STAR</p>
                                                                </div>
                                                                <div class="htl_type">
                                                                    <p>GUEST HOUSE</p>
                                                                </div> --}}
                                                                </div>

                                                                <h4>ITC Sonar, a Luxury Collection Hotel</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Kolkata City Center - <span
                                                                            class="ct_cl">Kolkata</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Kolkata railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav" aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child" aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>1300</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>1000
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="/hotelDetails"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png" alt="img"
                                                            class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                            class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                        <p>5 STAR</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div> --}}
                                                                </div>

                                                                <h4>Hyatt Regency Kolkata</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Salt Lake City - <span
                                                                            class="ct_cl">Kolkata</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Kolkata railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav"
                                                                                aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child"
                                                                                aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>3100</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>2800
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="/hotelDetails"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="delhi">
                                <div class="cruise_search_result_wrapper">
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png"
                                                            alt="img" class="small-image rounded rveImg_hvrnn"
                                                            id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png"
                                                            alt="img" class="small-image rounded rveImg_hvr"
                                                            id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All
                                                                View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content  pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>

                                                                </div>

                                                                <h4>Pride Plaza Hotel Aerocity </h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        {{-- Park circus -  --}}
                                                                        <span class="ct_cl">Delhi</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Delhi railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type_str ">
                                                                        <span class="htl_ctgr_str">
                                                                            <i class="fa fa-star"
                                                                                aria-hidden="true"></i>
                                                                            <i class="fa fa-star"
                                                                                aria-hidden="true"></i>
                                                                            <i class="fa fa-star"
                                                                                aria-hidden="true"></i>
                                                                            <i class="fa fa-star"
                                                                                aria-hidden="true"></i>
                                                                            <i class="fa fa-star"
                                                                                aria-hidden="true"></i>

                                                                        </span>
                                                                        <p> HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>

                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav"
                                                                                aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child"
                                                                                aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>2500</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>2000
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="javascript:void(0);"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png"
                                                            alt="img" class="small-image rounded rveImg_hvrnn"
                                                            id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png"
                                                            alt="img" class="small-image rounded rveImg_hvr"
                                                            id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All
                                                                View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content  pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                    <p>5 STAR</p>
                                                                </div>
                                                                <div class="htl_type">
                                                                    <p>GUEST HOUSE</p>
                                                                </div> --}}
                                                                </div>

                                                                <h4>The Grand New Delhi</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        {{-- Science City - --}}
                                                                         <span class="ct_cl">Delhi</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Delhi railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav"
                                                                                aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child"
                                                                                aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>1500</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>1200
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="javascript:void(0);"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png"
                                                            alt="img" class="small-image rounded rveImg_hvrnn"
                                                            id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png"
                                                            alt="img" class="small-image rounded rveImg_hvr"
                                                            id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All
                                                                View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                    <p>5 STAR</p>
                                                                </div>
                                                                <div class="htl_type">
                                                                    <p>GUEST HOUSE</p>
                                                                </div> --}}
                                                                </div>

                                                                <h4>The Ashok</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        {{-- Kolkata City Center -  --}}
                                                                        <span class="ct_cl">Delhi</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Delhi railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav"
                                                                                aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child"
                                                                                aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>1300</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>1000
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="javascript:void(0);"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
                                        </div>
                                    </div>
                                    <div id="packages" class="pckf_mb">
                                        <div class="cruise_search_item bdr_btm mb-0">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img hotel_item_img">
                                                        <img src="/assets/user/img/hotel/hotel-list-4.png"
                                                            alt="img" class="small-image rounded rveImg_hvrnn"
                                                            id="rveImg_hvrnn">
                                                        <img src="/assets/user/img/hotel/hotel-list-1.png"
                                                            alt="img" class="small-image rounded rveImg_hvr"
                                                            id="rveImg_hvr">
                                                    </div>
                                                    <div class="imgThumbList htl_subImg d-none">
                                                        <span class="imgThumbCont all_vw" id="all_vw"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-1.png"
                                                                alt="hotel_image_1">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw2"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-2.png"
                                                                alt="hotel_image_2">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw3"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-3.png"
                                                                alt="hotel_image_3">
                                                        </span>
                                                        <span class="imgThumbCont all_vw" id="all_vw4"><img
                                                                class="imgThumb"
                                                                src="/assets/user/img/hotel/hotel-list-4.png"
                                                                alt="hotel_image_4">
                                                            <a href="/user/ReviewPhotos" class="allImg_page">All
                                                                View</a>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content pstin_rlltv">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <div class="htl_ctgr_rtng">
                                                                    <div class="htl_ctgr">
                                                                        <p class="htl_rtng_box">4.0</p>
                                                                        <p class="htl_ctgr_tp">Very Good</p>
                                                                        <span>(99 Ratings)</span>
                                                                    </div>
                                                                    {{-- <div class="htl_type">
                                                                        <p>5 STAR</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div> --}}
                                                                </div>

                                                                <h4>Hotel Trans International</h4>
                                                                <div class="duration">
                                                                    <p class="cruise_duration text_ellipsis">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        {{-- Salt Lake City -  --}}
                                                                        <span
                                                                            class="ct_cl">Delhi</span>
                                                                    </p>
                                                                    <div class=" htl_lctnW">
                                                                        <span class="lctn_head">Nearest transporttion
                                                                            option</span>
                                                                        <div class="htl-loctn">
                                                                            <p>Main bust stop is within 5 km</p>
                                                                            <p>Delhi railway station within 6km</p>
                                                                        </div>
                                                                        {{-- Park circus - <span>Kolkata</span> --}}
                                                                    </div>
                                                                </div>

                                                                <div class="htl_ct_tp">
                                                                    <div class="htl_type">
                                                                        <p>5 STAR HOTEL</p>
                                                                    </div>
                                                                    <div class="htl_type">
                                                                        <p>GUEST HOUSE</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <p><small>
                                                                    Honeymoon-> Family-> Friends-></small>
                                                            </p> --}}

                                                                {{-- <p class="cuntry_sec text_ellipsis"><i
                                                                    class="fas fa-map-marker-alt"></i>
                                                                Singapore</p> --}}
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">

                                                                <div class="package_details_top_bottom d-none">
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-plane"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Flight</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Transfer</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Hotel</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-binoculars"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Sightseeing</h5>

                                                                        </div>
                                                                    </div>

                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Meals</h5>

                                                                        </div>
                                                                    </div>
                                                                    <div class="package_details_top_bottom_item">
                                                                        <div class="package_details_top_bottom_icon">
                                                                            <i class="fa fa-train"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="package_details_top_bottom_text">
                                                                            <h5>Train</h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="cruise_content_bottom_wrapper amnt_box_pstion">
                                                            <div class="cruise_content_bottom_left amnt_box">
                                                                <p class="amnt">
                                                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                                                    breakfast
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-grav" aria-hidden="true"></i>
                                                                    gym entry
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                                    indoor sports
                                                                </p>
                                                                <p class="amnt">
                                                                    <i class="fa fa-child" aria-hidden="true"></i>
                                                                    kids section
                                                                </p>
                                                                <span class="amnt_more">
                                                                    More
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </span>
                                                                <div class=" amnt_box_hover">
                                                                    <h5><i class="fa fa-american-sign-language-interpreting"
                                                                            aria-hidden="true"></i>
                                                                        Amenities</h5>
                                                                    <div class="all_amnt">
                                                                        <p class="">
                                                                            <i class="fa fa-cutlery"
                                                                                aria-hidden="true"></i>
                                                                            breakfast
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-grav"
                                                                                aria-hidden="true"></i>
                                                                            gym entry
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-industry"
                                                                                aria-hidden="true"></i>
                                                                            indoor sports
                                                                        </p>
                                                                        <p class="">
                                                                            <i class="fa fa-child"
                                                                                aria-hidden="true"></i>
                                                                            kids section
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="free_cncl">
                                                            <h5>Free Cancellation Till 13 Jul'23</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm pTB_0">
                                                            {{-- <div class="cruise_content_top_right">
                                                            <h5>4.8/5 Excellent</h5>

                                                        </div> --}}
                                                            <div class="cruise_content_middel_right">
                                                                <p><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    <strike>3100</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>2800
                                                                    <sub><span>/</span> Per
                                                                        Night</sub>
                                                                </h3>
                                                                <span class="tx_rm">+ ₹55 TAXES & FEES</span><br>
                                                                <span class="tx_rm">1 room per night</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">

                                                            <a href="javascript:void(0);"
                                                                class="btn btn_theme btn_md mb_15">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="persuasion__item"><i class="fa fa-exclamation-circle"
                                                aria-hidden="true"></i></span><span>Exclusive Offer on Amex Cards.
                                                Get INR 585 Off</span>
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

    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="/assets/user/img/common/email.png" alt="icon">
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
                                    type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var selectCity = $('#selectcity').val();
            if (selectCity == 1) {
                $('#kolkata').show();
                $('#delhi').hide();
                $('#kolkataHeader').show();
                $('#delhiHeader').hide();
            } else {
                $('#kolkata').hide();
                $('#delhi').show();
                $('#kolkataHeader').hide();
                $('#delhiHeader').show();
            }
        });
        if (jQuery().select2) {
            $(".select2").select2();
        }

        var img = document.getElementById('all_vw');
        var img2 = document.getElementById('all_vw2');
        var img3 = document.getElementById('all_vw3');
        var img4 = document.getElementById('all_vw4');

        img.addEventListener('mouseenter', function() {
            document.getElementById("rveImg_hvr").style.display = "block";
            document.getElementById("rveImg_hvr").style.transition = "0.3s";
            document.getElementById("rveImg_hvrnn").style.display = "none";
        });

        img.addEventListener('mouseleave', function() {
            document.getElementById("rveImg_hvr").style.display = "none";
            document.getElementById("rveImg_hvrnn").style.display = "block";
            document.getElementById("rveImg_hvrnn").style.transition = "0.3s";
        });

        img2.addEventListener('mouseenter', function() {
            document.getElementById("rveImg_hvr").style.display = "block";
            document.getElementById("rveImg_hvr").style.transition = "0.3s";
            document.getElementById("rveImg_hvrnn").style.display = "none";
        });

        img2.addEventListener('mouseleave', function() {
            document.getElementById("rveImg_hvr").style.display = "none";
            document.getElementById("rveImg_hvrnn").style.display = "block";
            document.getElementById("rveImg_hvrnn").style.transition = "0.3s";
        });

        img3.addEventListener('mouseenter', function() {
            document.getElementById("rveImg_hvr").style.display = "block";
            document.getElementById("rveImg_hvr").style.transition = "0.3s";
            document.getElementById("rveImg_hvrnn").style.display = "none";
        });

        img3.addEventListener('mouseleave', function() {
            document.getElementById("rveImg_hvr").style.display = "none";
            document.getElementById("rveImg_hvrnn").style.display = "block";
            document.getElementById("rveImg_hvrnn").style.transition = "0.3s";
        });

        img4.addEventListener('mouseenter', function() {
            document.getElementById("rveImg_hvr").style.display = "block";
            document.getElementById("rveImg_hvr").style.transition = "0.3s";
            document.getElementById("rveImg_hvrnn").style.display = "none";
        });

        img4.addEventListener('mouseleave', function() {
            document.getElementById("rveImg_hvr").style.display = "none";
            document.getElementById("rveImg_hvrnn").style.display = "block";
            document.getElementById("rveImg_hvrnn").style.transition = "0.3s";
        });

        $('#btnSearch').on('click', function(e) {
            e.preventDefault();
            var selectCity = $('#selectcity').val();
            if (selectCity == 1) {
                $('#kolkata').show();
                $('#delhi').hide();
                $('#kolkataHeader').show();
                $('#delhiHeader').hide();
            } else {
                $('#kolkata').hide();
                $('#delhi').show();
                $('#kolkataHeader').hide();
                $('#delhiHeader').show();
            }
        });
    </script>
@endsection
