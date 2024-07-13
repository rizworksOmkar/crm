@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>
                            @if ($category == 1)
                                ALL International Pacakges
                            @elseif ($category == 0)
                                ALL Domestic Pacakges
                            @else
                                ALL Pacakges
                            @endif

                        </h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Package</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form Area -->
    <section id="theme_search_form_tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tour_search_form">
                                    <form action="#!">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="flight_Search_boxed">
                                                    <p>Destination</p>
                                                    <input type="text" placeholder="Where are you going?" value="">
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
                                                        <button class="dropdown-toggle final-count" data-toggle="dropdown"
                                                            type="button" id="dropdownMenuButton1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
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
                                                                                <button type="button" class="btn-add">
                                                                                    <i class="fas fa-plus"></i>
                                                                                </button>
                                                                                <button type="button" class="btn-subtract">
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
                                                                                <button type="button" class="btn-add-c">
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
                                                                                <button type="button" class="btn-add-in">
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
                                                <button class="btn btn_theme btn_md">Search</button>
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

    <!-- Flight Search Areas -->
    <section id="explore_area" class="section_padding_50">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>{{ $pacakageCount }} Packages found</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="left_side_search_area">                            
                        <!-- Trip Duration-->
                        <form id="filterForm">
                            {{ csrf_field() }}
                            {{-- <input type="hidden" name="destinationId" value="{{ $destId }}"> --}}
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Trip Duration</h5>
                                </div>
                                <div class="tour_search_type">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="0,2" id="flexCheckDefaultf1">
                                        <label class="form-check-label" for="flexCheckDefaultf1">
                                            <span class="area_flex_one">
                                                <span>Up to 2 Nights</span>

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="3,7" id="flexCheckDefaultf2">
                                        <label class="form-check-label" for="flexCheckDefaultf2">
                                            <span class="area_flex_one">
                                                <span> 3 to 7 Nights</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="8,14" id="flexCheckDefaultaf3">
                                        <label class="form-check-label" for="flexCheckDefaultaf3">
                                            <span class="area_flex_one">
                                                <span> 8 to 14 Nights</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="for_number_of_nights"
                                            value="15,0" id="flexCheckDefaultaf4">
                                        <label class="form-check-label" for="flexCheckDefaultaf4">
                                            <span class="area_flex_one">
                                                <span> 15 Nights and Above</span>

                                            </span>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <!-- Budget-->
                            <div class="left_side_search_boxed">
                                <div class="left_side_search_heading">
                                    <h5>Budget Per Person</h5>
                                </div>
                                <div class="tour_search_type">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="0,3000" id="flexBudget1">
                                        <label class="form-check-label" for="flexBudget1">
                                            <span class="area_flex_one">
                                                <span>Upto - <i class="fas fa-rupee-sign fa-xs"></i> 3000</span>

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="3001,5000" id="flexBudget2">
                                        <label class="form-check-label" for="flexBudget2">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 3,001 - 5,000</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="5001,10000" id="flexBudget3">
                                        <label class="form-check-label" for="flexBudget3">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 5,001 - 10,000</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="10001,25000" id="flexBudget4">
                                        <label class="form-check-label" for="flexBudget4">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 10,001 - 25,000</span>

                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="25001,50000" id="flexBudget5">
                                        <label class="form-check-label" for="flexBudget5">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 25,001 - 50,000</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="50001,100000" id="flexBudget6">
                                        <label class="form-check-label" for="flexBudget6">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 50,001 - 1,00,000</span>

                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdoBudget"
                                            value="1000001,0" id="flexBudget7">
                                        <label class="form-check-label" for="flexBudget7">
                                            <span class="area_flex_one">
                                                <span><i class="fas fa-rupee-sign fa-xs"></i> 1,00,001 And Above</span>

                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- Hotel Rating-->
                        <div class="left_side_search_boxed">
                            <div class="left_side_search_heading">
                                <h5>Hotel Rating</h5>
                            </div>
                            <div class="tour_search_type">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rdoHotelRating"
                                        value="2" id="flexHotelRating2">
                                    <label class="form-check-label" for="flexHotelRating2">
                                        <span class="area_flex_one">
                                            <span>Up To 2 Star </span>

                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rdoHotelRating"
                                        value="3" id="flexHotelRating3">
                                    <label class="form-check-label" for="flexHotelRating3">
                                        <span class="area_flex_one">
                                            <span>3 Star</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rdoHotelRating"
                                        value="4" id="flexHotelRating4">
                                    <label class="form-check-label" for="flexHotelRating4">
                                        <span class="area_flex_one">
                                            <span>4 Star </span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rdoHotelRating"
                                        value="5" id="flexHotelRating5">
                                    <label class="form-check-label" for="flexHotelRating5">
                                        <span class="area_flex_one">
                                            <span>5 Star</span>

                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <!-- Activities-->
                        <div class="left_side_search_boxed">
                            <div class="left_side_search_heading">
                                <h5>Activities</h5>
                            </div>
                            <div class="tour_search_type">
                                @if (count($activity) > 0)
                                    @foreach ($activity as $activityitem)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $activityitem->id }}"
                                                id="flexCheckDefaultf{{ $activityitem->id }}">
                                            <label class="form-check-label"
                                                for="flexCheckDefaultf{{ $activityitem->id }}">
                                                <span class="area_flex_one">
                                                    <span>{{ $activityitem->package_activity }} </span>
                                                    {{-- <span>14</span> --}}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                @endif

                            </div>
                            {{-- <div class="text-center">
                                <button class="apply" type="button">Apply</button>
                            </div> --}}
                        </div>


                        <!-- Cities Inclusion-->
                        {{-- <div class="left_side_search_boxed d-none">
                            <div class="left_side_search_heading">
                                <h5>Cities Inclusion</h5>
                            </div>
                            <div class="tour_search_type">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultf1">
                                    <label class="form-check-label" for="flexCheckDefaultf1">
                                        <span class="area_flex_one">
                                            <span>Sightseeing </span>
                                           
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultf2">
                                    <label class="form-check-label" for="flexCheckDefaultf2">
                                        <span class="area_flex_one">
                                            <span>Breakfast</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf3">
                                    <label class="form-check-label" for="flexCheckDefaultaf3">
                                        <span class="area_flex_one">
                                            <span>Meals</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf4">
                                    <label class="form-check-label" for="flexCheckDefaultaf4">
                                        <span class="area_flex_one">
                                            <span>Airport Pickup-Drop</span>
                                           
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf4">
                                    <label class="form-check-label" for="flexCheckDefaultaf4">
                                        <span class="area_flex_one">
                                            <span>City Tours</span>
                                           
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf4">
                                    <label class="form-check-label" for="flexCheckDefaultaf4">
                                        <span class="area_flex_one">
                                            <span>Cruise </span>
                                           
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf4">
                                    <label class="form-check-label" for="flexCheckDefaultaf4">
                                        <span class="area_flex_one">
                                            <span>Adventure Activity</span>
                                           
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefaultaf4">
                                    <label class="form-check-label" for="flexCheckDefaultaf4">
                                        <span class="area_flex_one">
                                            <span>Flights</span>
                                           
                                        </span>
                                    </label>
                                </div>

                            </div>
                            <div class="text-center">
                                <button class="apply" type="button">Apply</button>
                            </div>
                        </div> --}}

                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cruise_search_result_wrapper">
                                @if ($pacakageCount > 0)
                                    @foreach ($pacakages as $key => $item)
                                        <div class="cruise_search_item">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="cruise_item_img">
                                                        <img src="/{{ $item->package_image }}" alt="img"
                                                            class="small-image rounded">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cruise_item_inner_content">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left cruise_content_w_100">
                                                                <h4>{{ $item->package_name }}</h4>
                                                                <ul>
                                                                    <li>{{ $item->for_number_of_nights }} nights /
                                                                        {{ $item->for_number_of_days }} days tour
                                                                        {{-- <i class="fas fa-circle"></i> --}}
                                                                    </li>

                                                                </ul>
                                                                <div class="duration">
                                                                    @if ($item->noofdaysbycity)
                                                                        <p class="cruise_duration text_ellipsis">
                                                                            {!! $item->noofdaysbycity !!}
                                                                            {{-- Bukit Batok(2 days) 
                                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Bukit Panjang(1days) --}}
                                                                        </p>
                                                                        <p class="cruise_duration_hbr">
                                                                            {!! $item->noofdaysbycity !!}
                                                                            {{-- Bukit Batok(2 days) 
                                                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Bukit Panjang(1days) --}}
                                                                        </p>
                                                                    @else
                                                                    @endif
                                                                </div>
                                                                <p><small>
                                                                        {{ getPackagetype($item->package_type_id) }}</small>
                                                                </p>
                                                                {{-- <ul>
                                                            @foreach ($pacakageType as $pt)
                                                                <li>
                                                                    @if ($pt == 0)
                                                                        Family
                                                                    @elseif($pt == 1)
                                                                        Couple
                                                                    @elseif($pt == 2)
                                                                        Corporate
                                                                    @elseif($pt == 3)
                                                                        Solo
                                                                    @elseif($pt == 4)
                                                                        Group
                                                                    @elseif($pt == 5)
                                                                        Honeymoon
                                                                    @elseif($pt == 6)
                                                                        Friends
                                                                    @endif

                                                                </li>
                                                            @endforeach

                                                        </ul> --}}

                                                                <p class="cuntry_sec text_ellipsis">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    {{ getCountryName($item->country_id) }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_middel_wrapper ">
                                                            <div class="cruise_content_middel_left">
                                                                <div class="cruise_content_middel-cancel">
                                                                    <h5>Free cancellation,</h5>
                                                                    <p>Cancel your booking at any time</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cruise_content_bottom_wrapper">
                                                            <div class="cruise_content_bottom_left">
                                                                {{-- <ul>
                                                            @foreach ($activity as $act)
                                                                <li>
                                                                    @if ($act == 0)
                                                                    River Rafting
                                                                    @elseif($act == 1)
                                                                    Camping
                                                                    @elseif($act == 2)
                                                                    Hiking
                                                                    @elseif($act == 3)
                                                                    Off Road Biking/Cycling
                                                                    @elseif($act == 4)
                                                                    Paragliding
                                                                    @elseif($act == 5)
                                                                    Rock Climbing
                                                                    @elseif($act == 6)
                                                                    Skiing
                                                                    @elseif($act == 7)
                                                                    Jungle Safari
                                                                    @elseif($act == 8)
                                                                    Trekking
                                                                    @elseif($act == 9)
                                                                    Water Activities
                                                                    @elseif($act == 10)
                                                                    Temple & Heritage

                                                                    @endif

                                                                </li>
                                                            @endforeach
                                                        </ul> --}}
                                                                <p class="cruise_content_bottom_activity">
                                                                    <small class="text_ellipsis">
                                                                        {{ getPackageActivity($item->activity_type_id) }}
                                                                    </small>
                                                                    <span class="cruise_content_bottom_box">
                                                                        {{ getPackageActivity($item->activity_type_id) }}
                                                                    </span>
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="cruise_content_rate">
                                                        <div class="prtnr-exclusive">
                                                            <h5>Partner Exclusive Rate</h5>
                                                        </div>
                                                        <div class="cruise_content_box_btm">
                                                            <div class="cruise_content_top_right">
                                                                <h5>4.8/5 Excellent</h5>
                                                                {{-- <h4>(1214 reviewes)</h4> --}}
                                                            </div>
                                                            <div class="cruise_content_middel_right">
                                                                <p><i
                                                                        class="fas fa-rupee-sign fa-xs"></i><strike>{{ $item->rack_price }}</strike>
                                                                </p>
                                                                <h3><i class="fas fa-rupee-sign fa-xs"></i>
                                                                    {{ $item->off_season_price_pp }}
                                                                    <sup><span>/</span> Per person</sup>
                                                                </h3>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="cruise_content_bottom_right br-n text-center cruise_content_w_100">
                                                            {{-- <a href="tour-details.html" class="btn btn_theme btn_md">View
                                                        details</a> --}}
                                                            <a href="/package-details/{{ $item->id }}"
                                                                class="btn btn_theme btn_md">View
                                                                details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                @endif
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
                                    type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')
@endsection
