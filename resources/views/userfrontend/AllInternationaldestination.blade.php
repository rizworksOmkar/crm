@extends('layouts.front')

@section('content')

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Top destinations</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Top destinations</li>
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
                                                <div class="flight_Search_boxed ">
                                                    {{-- <p>Destination</p>
                                                    <input type="text" placeholder="Where are you going?"> --}}
                                                    <div class="date_flex_area">
                                                        <div class="frm_allCity width_100">
                                                            <label for="" class="m_5">Depart From (City) </label>
                                                            <select class="slct_fmTo" name="" id="">
                                                                <option value="AllCity">All City</option>
                                                                <option value="1">Cox’s Bazar</option>
                                                            </select>
                                                            {{-- <input type="text" placeholder="All City" class="m_5"> --}}
                                                        </div>
                                                        <div class="frm_allCity width_100">
                                                            <label for="" class="m_5">Going to (City) </label>
                                                            <select class="slct_fmTo" name="" id="">
                                                                <option value="AllCity">All City</option>
                                                                <option value="1">Cox’s Bazar</option>
                                                            </select>
                                                            {{-- <input type="text" placeholder="All City" class="m_5"> --}}
                                                        </div>
                                                    </div>
                                                    <span>Where are you going?</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
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
    </section>

    <!-- Destinations Areas -->
    <section id="top_testinations" class="section_padding">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>{{ $destinationCount }} destinations found</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        @if ($destinationCount > 0)
                            @foreach ($destination as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="top_destinations_box img_hover">
                                        <div class="top_rvws">
                                            <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p>
                                        </div>
                                        <div class="heart_destinations">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <a href="/international-package/{{ $item->id }}"><img
                                                src="{{ getDestiThumb_image($item->id) }}" alt="img"></a>
                                        <div class="top_destinations_box_content">
                                            <div class="ellps_hvr_box">
                                                <h4><a
                                                        href="/international-package/{{ $item->id }}">{{ $item->destination_name }}</a>
                                                </h4>
                                                <p class="ellipsis_aftr"><a
                                                        href="/international-package/{{ $item->id }}">{{ $item->destination_name }}</a>
                                                </p>
                                            </div>
                                            <div class="ellps_hvr_box">
                                                <p class="text_ellipsis"><i class="fas fa-map-marker-alt"></i>
                                                    {{ getCountryName($item->country_id) }}</p>
                                                <p class="ellipsis_aftr"><i class="fas fa-map-marker-alt"></i>
                                                    {{ getCountryName($item->country_id) }}</p>
                                            </div>
                                            <div class="ellps_hvr_box">
                                                <p class="text_ellipsis"><small
                                                        style="color: #fff">{{ getCityName($item->city_id) }}</small></p>
                                                <p class="ellipsis_aftr"><small
                                                        style="color: #fff">{{ getCityName($item->city_id) }}</small></p>
                                            </div>
                                            {{-- <p><span class="review_rating">4.8/5 Excellent</span> <span
                                                    class="review_count">(1214
                                                    reviewes)</span></p> --}}
                                            {{-- <h6 class="text_ellipsis">$99.00 <span>Price starts from</span></h6> --}}
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
    </section>

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

@endsection
