@extends('layouts.front')
@section('styles')
    @if ($bannerPackage)
        <style>
            #common_banner {
                background-image: url({{ $bannerPackage }});
                /* padding: 200px 0 130px 0; */
                padding: 237px 0 220px 0;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                        <h2>{{ $nameofthePackage }}</h2>
                        <input type="hidden" name="pacakgeID" id="pacakgeID" value="{{ $pacakgeID }}">
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

    {{-- <section id="">
        <div class="bnner_img_intDms">
            @if ($bannerPackage)
                <img src="/{{ $bannerPackage }}" alt="">
            @else
                <img src="/assets/user/img/banner/common-banner.png" alt="">
            @endif
        </div>
        <div class="container cntnt_rltv">
            <div class="row">
                <div class="col-lg-12 pckg_intrn_dmstc">
                    <div class="common_bannner_text">
                        <h2>{{ $nameofthePackage }}</h2>
                        <input type="hidden" name="pacakgeID" id="pacakgeID" value="{{ $pacakgeID }}">
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> ALl Package</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Tour Search Areas -->
    <section id="tour_details_main" class="section_padding">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="tour_details_leftside_wrapper">
                        @foreach ($packDetails as $item)
                            <div class="tour_details_heading_wrapper">
                                <div class="tour_details_top_heading">
                                    <input type="hidden" id="hdnPacakageID" value="{{ $item->id }}">
                                    <h2>{{ $item->package_name }}</h2>
                                    <h5><i class="fas fa-map-marker-alt"></i> {{ getCountryName($item->country_id) }}</h5>
                                </div>
                                <div class="tour_details_top_heading_right">
                                    <h4>Excellent</h4>
                                    <h6>4.8/5
                                        <div class="review_star_all ml-1">
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </h6>
                                    {{-- <p>(1214 reviewes)</p> --}}
                                </div>
                            </div>
                            <div class="tour_details_top_bottom">

                                @if ($item->pcakage_flight == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Flight</h5>
                                            {{-- <p>10 days</p> --}}
                                        </div>
                                    </div>
                                @else
                                @endif
                                @if ($item->pcakage_transfer == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-bus" aria-hidden="true"></i>

                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Transfer</h5>
                                            {{-- <p>Group tour</p> --}}
                                        </div>
                                    </div>
                                @else
                                @endif
                                @if ($item->pcakage_hotel == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Hotel</h5>
                                            {{-- <p>50 people</p> --}}
                                        </div>
                                    </div>
                                @else
                                @endif
                                @if ($item->pcakage_sightseeing == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Sightseeing</h5>

                                        </div>
                                    </div>
                                @else
                                @endif
                                @if ($item->pcakage_meals == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Meals</h5>

                                        </div>
                                    </div>
                                @else
                                @endif
                                @if ($item->pcakage_train == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-train" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Train</h5>

                                        </div>
                                    </div>
                                @else
                                @endif

                                @if ($item->pcakage_visa == 1)
                                    <div class="toru_details_top_bottom_item">
                                        <div class="tour_details_top_bottom_icon">
                                            <i class="fa fa-cc-visa" aria-hidden="true"></i>
                                        </div>
                                        <div class="tour_details_top_bottom_text">
                                            <h5>Visa</h5>

                                        </div>
                                    </div>
                                @else
                                @endif

                            </div>
                        @endforeach

                        <div class="tour_details_img_wrapper">
                            <div class="slider slider-for">
                                @foreach ($gallery as $gitem)
                                    <div>
                                        <img src="/{{ $gitem->gallery_image }}" alt="img">
                                    </div>
                                @endforeach
                                {{-- <div>
                                        <img src="/assets/user/img/tour/big-img2.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/big-img3.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/big-img4.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/big-img5.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/big-img6.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/big-img7.png" alt="img">
                                    </div> --}}
                            </div>
                            <div class="slider slider-nav">
                                @foreach ($gallery as $gitem)
                                    <div class="small-gallety-images">
                                        <img src="/{{ $gitem->gallery_image }}" alt="img">
                                    </div>
                                @endforeach
                                {{-- <div>
                                        <img src="/assets/user/img/tour/small2-img.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/small3-img.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/small4-img.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/small5-img.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/small6-img.png" alt="img">
                                    </div>
                                    <div>
                                        <img src="/assets/user/img/tour/small7-img.png" alt="img">
                                    </div> --}}
                            </div>
                        </div>

                        @foreach ($packDetails as $item)
                            <div class="tour_details_boxed">
                                <h3 class="heading_theme">Overview</h3>
                                <div class="tour_details_boxed_inner text_scl" id="textScrolBox">
                                    {!! $item->long_description !!}

                                    {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                        takimata sanctus est.
                                    </p>
                                    <p>
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                    </p>
                                    <ul>
                                        <li><i class="fas fa-circle"></i>Buffet breakfast as per the Itinerary</li>
                                        <li><i class="fas fa-circle"></i>Visit eight villages showcasing Polynesian culture
                                        </li>
                                        <li><i class="fas fa-circle"></i>Complimentary Camel safari, Bonfire, and Cultural
                                            Dance at Camp</li>
                                        <li><i class="fas fa-circle"></i>All toll tax, parking, fuel, and driver allowances
                                        </li>
                                        <li><i class="fas fa-circle"></i>Comfortable and hygienic vehicle (SUV/Sedan) for
                                            sightseeing on all days as per the itinerary.</li>
                                    </ul> --}}
                                </div>
                                <a href="javascript:void(0);" id="addToOvrtxt" class="txt_more">More
                                    <i class="fa fa-plus" aria-hidden="true"></i></a>
                                <a href="javascript:void(0);" id="clossToOvrtxt" class="txt_more">Less
                                    <i class="fa fa-minus" aria-hidden="true"></i></a>
                            </div>
                        @endforeach

                        {{-- @if (count($itenary) > 0)
                            <div class="tour_details_boxed">
                                <h3 class="heading_theme">Itinerary</h3>
                                <div class="tour_details_boxed_inner">
                                    <div class="accordion" id="accordionExample">
                                        @php $i = 0 @endphp
                                        @foreach ($itenary as $itemitenary)
                                            @php $i ++ @endphp
                                            <div class="accordion_flex_area">
                                                <div class="accordion_left_side">
                                                    <h5>{!! $itemitenary->day !!}</h5>

                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $i }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $i }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{ $i }}">
                                                            At {!! date('h:i a', strtotime($itemitenary->time . ':00')) !!} we will started from
                                                            {!! getCityNamewithoutcomma($itemitenary->city) !!}

                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $i }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $i }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="accordion_itinerary_list">
                                                                <ul>
                                                                    <li class="">
                                                                        <i class="fas fa-circle"></i>
                                                                        At {!! $itemitenary->time !!} : we will started from
                                                                        {!! getCityNamewithoutcomma($itemitenary->city) !!}
                                                                    </li>
                                                                    <li class="">
                                                                        <i class="fas fa-circle"></i>
                                                                        {!! $itemitenary->mode !!} : {!! $itemitenary->sight_name !!}
                                                                    </li>
                                                                    @if ($itemitenary->remarks)
                                                                        <li class="">
                                                                            <i class="fas fa-circle"></i>
                                                                            {!! $itemitenary->remarks !!}
                                                                        </li>
                                                                    @else
                                                                    @endif


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>

                        @endif --}}

                        @if (count($itenary) > 0)
                            <div class="tour_details_boxed">
                                <div class="itnr_change">
                                    <h3 class="heading_theme">Itinerary</h3>
                                    <div class="tour_detail_right_sidebar itnr_cstmz_btn">
                                        <div class="tour_select_offer_bar_bottom">
                                            <a href="javascript:void(0);" class="btn btn_theme btn_md w-100 ">Want To
                                                Customize Itinerary </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tour_details_boxed_inner overflow-hidden">
                                    <div class="accordion" id="accordionExample">
                                        @php $i = 0 @endphp
                                        @foreach ($itenary as $day => $details)
                                            @php $i++ @endphp
                                            <div class="accordion_flex_area">
                                                <div class="accordion_left_side">
                                                    <h5>Day {{ $day }}</h5>
                                                </div>
                                                <div class="accordion-item itnr_bar_line">
                                                    <div class="itnr_bdr_hrj"></div>
                                                    <h2 class="accordion-header itnr_header"
                                                        id="heading{{ $i }}">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $i }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $i }}">
                                                            Day {{ $day }} schedule
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $i }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $i }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="accordion_itinerary_list ">
                                                                <ul>
                                                                    @foreach ($details as $detail)
                                                                        <li>
                                                                            <i class="fas fa-walking"></i><i
                                                                                class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                aria-hidden="true"></i>
                                                                            At {{ $detail['time'] }}: we will start from
                                                                            {!! getCityNamewithoutcomma($detail['city']) !!}
                                                                        </li>
                                                                        <li>
                                                                            @if ($detail['mode'] == 'Travel')
                                                                                <i class="fa fa-car"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($detail['mode'] == 'Hotel')
                                                                                <i class="fa fa-building"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($detail['mode'] == 'Sight')
                                                                                <i class="fa fa-binoculars"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($detail['mode'] == 'Meal')
                                                                                <i class="fa fa-cutlery"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                            @else
                                                                                <i class="fa fa-sticky-note"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                            @endif
                                                                            {{ $detail['mode'] }}:
                                                                            {{ $detail['sight_name'] }}
                                                                        </li>
                                                                        @if ($detail['remarks'])
                                                                            <li>
                                                                                <i class="fa fa-comments-o"
                                                                                    aria-hidden="true"></i><i
                                                                                    class="fa fa-ellipsis-v itnr_lst_icn"
                                                                                    aria-hidden="true"></i>
                                                                                {{ $detail['remarks'] }}
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($chckpacakgeavail > 0)
                            <div class="tour_details_boxed">
                                <h3 class="heading_theme">Availability</h3>
                                <table class="avlblt_box">
                                    <tr class="tbl_head">
                                        <th>Departure Date</th>
                                    </tr>
                                    @foreach ($pacakgeavail as $item)
                                        @if ($item->availability_date >= $todaysDate)
                                            <tr class="tbl_tr">
                                                <td>

                                                    {{ date('d-M-Y', strtotime($item->availability_date)) }}


                                                </td>
                                            </tr>
                                        @else
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        @endif

                        @foreach ($packDetails as $pd)
                            @if ($pd->pacakage_inclusion)
                                <div class="tour_details_boxed">
                                    <h3 class="heading_theme">Included</h3>
                                    <div class="tour_details_boxed_inner text_scl" id="INtextScrolBox">
                                        {!! $pd->pacakage_inclusion !!}
                                    </div>
                                    <a href="javascript:void(0);" id="INaddToOvrtxt" class="txt_more">More
                                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" id="INclossToOvrtxt" class="txt_more">Less
                                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                            @else
                            @endif
                            @if ($pd->pacakage_exclusions)
                                <div class="tour_details_boxed">
                                    <h3 class="heading_theme">Excluded</h3>
                                    <div class="tour_details_boxed_inner text_scl" id="EXtextScrolBox">
                                        {!! $pd->pacakage_exclusions !!}
                                    </div>
                                    <a href="javascript:void(0);" id="EXaddToOvrtxt" class="txt_more">More
                                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" id="EXclossToOvrtxt" class="txt_more">Less
                                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                            @else
                            @endif

                            @if ($pd->payment_policy)
                                <div class="tour_details_boxed">
                                    <h3 class="heading_theme">Payment Policy</h3>
                                    <div class="tour_details_boxed_inner text_scl" id="PPtextScrolBox">

                                        {!! $pd->payment_policy !!}
                                    </div>
                                    <a href="javascript:void(0);" id="PPaddToOvrtxt" class="txt_more">More
                                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" id="PPclossToOvrtxt" class="txt_more">Less
                                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                            @else
                            @endif

                            @if ($pd->cancelation_policy)
                                <div class="tour_details_boxed">
                                    <h3 class="heading_theme">Cancellation Policy</h3>
                                    <div class="tour_details_boxed_inner text_scl" id="CPtextScrolBox">

                                        {!! $pd->cancelation_policy !!}
                                    </div>
                                    <a href="javascript:void(0);" id="CPaddToOvrtxt" class="txt_more">More
                                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" id="CPclossToOvrtxt" class="txt_more">Less
                                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                            @else
                            @endif
                            @if ($pd->terms_conditions)
                                <div class="tour_details_boxed">
                                    <h3 class="heading_theme">Terms & Conditions</h3>
                                    <div class="tour_details_boxed_inner text_scl" id="TCtextScrolBox">
                                        {!! $pd->terms_conditions !!}
                                    </div>
                                    <a href="javascript:void(0);" id="TCaddToOvrtxt" class="txt_more">More
                                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0);" id="TCclossToOvrtxt" class="txt_more">Less
                                        <i class="fa fa-minus" aria-hidden="true"></i></a>
                                </div>
                            @else
                            @endif
                        @endforeach



                        {{-- <div class="tour_details_boxed">
                            <h3 class="heading_theme">Tours location</h3>
                            <div class="map_area">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6962663570607!2d89.56355961427838!3d22.813715829827952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff901efac79b59%3A0x5be01a1bc0dc7eba!2sAnd+IT!5e0!3m2!1sen!2sbd!4v1557901943656!5m2!1sen!2sbd"></iframe>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tour_details_right_sidebar_wrapper pstn_stck">
                        @foreach ($packDetails as $item)
                            <div class="tour_detail_right_sidebar">
                                <div class="tour_details_right_boxed">
                                    <div class="tour_details_right_box_heading">
                                        <h3>Enter journey summary</h3>
                                    </div>
                                    <div class="tour_package_details_bar_list">
                                        <div class="d-flex flex-row fn-13 tour_package_dt_ct bd-highlight mb-1">
                                            <div class="p-0 bd-highlight w-50">Preferable Start Date :</div>
                                            <input type="hidden" name="groupdipartureflag" id="groupdipartureflag"
                                                value="{{ $item->groupdepartureflag }}">
                                            @if ($item->groupdepartureflag > 0)
                                                <div class="p-0 bd-highlight w-50 p-rltive">

                                                    <select class="form-select fn-13 form-select-sm" name="ddlstratDate"
                                                        id="ddlstratDate">
                                                        @foreach ($pacakgeavail as $avail)
                                                            @if ($avail->availability_date >= $todaysDate)
                                                                <option value="{{ $avail->availability_date }}">
                                                                    {{ date('d-M-Y', strtotime($avail->availability_date)) }}
                                                                </option>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="date" class="form-control fn-13 small-control "
                                                        id="fromdate" name="fromdate"> --}}
                                                    {{-- <small class="p-abst"> <label for="" id="offsesson"> Off
                                                            Season
                                                        </label></small> --}}
                                                </div>
                                            @else
                                                <div class="p-0 bd-highlight w-50 p-rltive">
                                                    <input type="date" class="form-control fn-13 small-control "
                                                        id="fromdate" name="fromdate">
                                                    <small class="p-abst"> <label for="" id="offsesson"> {{$item->season_name}}
                                                        </label></small>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="d-flex flex-row fn-13 tour_package_dt_ct bd-highlight mt-2">
                                            <div class="p-0 bd-highlight  w-50">Start City :</div>
                                            <div class="p-0 bd-highlight  w-50">
                                                <select class="form-select fn-13 form-select-sm" name="selectcity"
                                                    id="selectcity">
                                                    <option value="0">----- Select City -----</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grp">
                                            <p class="gp_if mt-2">Group Info :-</p>
                                            <div class="grp-info">
                                                <div
                                                    class="d-flex flex-row gp_ifCnt fn-13 tour_package_dt_ct bd-highlight mt-2">
                                                    <div class="p-0 bd-highlight grpng w-50">Adults :</div>
                                                    <div class="p-0 bd-highlight  w-45">
                                                        <input type="text" id="selectAdult" class="grf_cnt_input"
                                                            placeholder="Adults count">
                                                        {{-- <select class="form-select fn-13 form-select-sm"
                                                            name="selectAdult" id="selectAdult">
                                                            <option value="">00</option>
                                                            <option value="">01</option>
                                                            <option value="">02</option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                        </select> --}}
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-row gp_ifCnt fn-13 tour_package_dt_ct bd-highlight mt-2">
                                                    <div class="p-0 bd-highlight grpng w-50">Children (2 - 12) :</div>
                                                    <div class="p-0 bd-highlight  w-45">
                                                        <input type="text" id="selectChild" class="grf_cnt_input"
                                                            placeholder="Children count">
                                                        {{-- <select class="form-select fn-13 form-select-sm"
                                                            name="selectChild" id="selectChild">
                                                            <option value="">00</option>
                                                            <option value="">01</option>
                                                            <option value="">02</option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                        </select> --}}
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-row gp_ifCnt fn-13 tour_package_dt_ct bd-highlight mt-2">
                                                    <div class="p-0 bd-highlight grpng w-50">Infant (0 - 2) :</div>
                                                    <div class="p-0 bd-highlight  w-45">
                                                        <input type="text" id="selectInfant" class="grf_cnt_input"
                                                            placeholder="Infant count">
                                                        {{-- <select class="form-select fn-13 form-select-sm"
                                                            name="selectInfant" id="selectInfant">
                                                            <option value="">00</option>
                                                            <option value="">01</option>
                                                            <option value="">02</option>
                                                            <option value="">03</option>
                                                            <option value="">04</option>
                                                            <option value="">05</option>
                                                        </select> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tour_detail_right_sidebar">
                                <div class="tour_details_right_boxed">

                                    <div class="tour_details_right_box_heading">
                                        <h3>Package Summary Information</h3>
                                    </div>
                                    <div class="tour_package_details_bar_list">

                                        <div class="select_person_item">
                                            <div class="select_person_left">
                                                <h6 class="p-0 bd-highlight grpng ">Package Rate</h6>
                                                {{-- <p><del><i class="fas fa-rupee-sign fa-xs"></i> <b>
                                                            {{ $item->rack_price }} </b></del></p> --}}
                                                <div class="tour_package_bar_price">
                                                    <h6 class="pckg_prce"><del><i class="fas fa-rupee-sign fa-xs"></i>
                                                            {{ $item->rack_price }}</del>
                                                    </h6>
                                                    <h3><i class="fas fa-rupee-sign fa-xs"></i>
                                                        @if ($item->groupdepartureflag > 0)
                                                        {{ $item->off_season_price_pp }}
                                                        
                                                        @else
                                                        {{ $item->season_price }}
                                                        @endif
                                                        <sub>/Per serson</sub>
                                                    </h3>
                                                    @if ($item->groupdepartureflag > 0)
                                                    <input type="hidden" name="hdnPriceperperson" id="hdnPriceperperson" value="{{ $item->off_season_price_pp }}">   
                                                    @else
                                                    <input type="hidden" name="hdnPriceperperson" id="hdnPriceperperson" value="{{ $item->season_price }}">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if ($item->groupdepartureflag > 0)
                                        @else
                                            <div class="pckgSmr_strtPnt">
                                                <h6 class="p-0 bd-highlight grpng w-50">Start Point :</h6>

                                                <div class="p-0 bd-highlight w-50 strtpnt">

                                                    {{-- <input type="text" id="txtstrt_point" name="txtstrt_point" class="grf_cnt_input" placeholder="Enter Start Point"> --}}

                                                    <p class="strt_point">{{ $item->arrival_at }}</p>

                                                </div>
                                            </div>
                                        @endif
                                        <div class="select_person_item d-none">
                                            <div class="select_person_left">
                                                <h6>On Season Rate</h6>
                                                {{-- <p><i class="fas fa-rupee-sign fa-xs"></i> <b>
                                                        {{ $item->on_season_price_pp }} </b></p> --}}
                                            </div>
                                            
                                        </div>

                                        <div class="select_person_item d-none">
                                            <div class="select_person_left">
                                                <h6>Mid season Rate</h6>
                                                {{-- <p><i class="fas fa-rupee-sign fa-xs"></i> <b>
                                                        {{ $item->mid_season_price_pp }} </b></p> --}}
                                            </div>
                                           
                                        </div>

                                        <div class="select_person_item d-none">
                                            <div class="select_person_left">
                                                <h6>Off season Rate</h6>
                                                {{-- <p><i class="fas fa-rupee-sign fa-xs"></i> <b>
                                                        {{ $item->off_season_price_pp }} </b></p> --}}
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="tour_package_details_bar_price d-none">
                                        <h5>Final Rate</h5>
                                        {{-- <div class="tour_package_bar_price">
                                            <h6><del><i class="fas fa-rupee-sign fa-xs"></i> {{ $item->rack_price }}</del>
                                            </h6>
                                            <h3><i class="fas fa-rupee-sign fa-xs"></i> {{ $item->off_season_price_pp }}
                                                <sub>/Per serson</sub>
                                            </h3>
                                        </div> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="tour_detail_right_sidebar">
                                <div class="tour_select_offer_bar_bottom">
                                    @if (Auth::check())
                                        <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                            userid={{ Auth::User()->id }}
                                            class="btn btn_theme btn_md w-100 rolltype2">Confirm &amp; Proceed Next</a>
                                    @else
                                        {{-- <a href="{{ route('user.login') }}"
                                            class="btn btn_theme btn_md w-100 rolltype2">Proceed
                                            &amp; Next</a> --}}
                                        <a data-bs-toggle="modal" data-bs-target="#loginModal" href="javascript:void(0);"
                                            class="btn btn_theme btn_md w-100 rolltype2">Confirm Package &amp; Proceed
                                            Next</a>
                                    @endif
                                    {{-- <button class="btn btn_theme btn_md w-100" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Proceed &amp;
                                        Next</button> --}}
                                </div>
                            </div>
                            {{-- <div class="tour_detail_right_sidebar">
                                <div class="tour_select_offer_bar_bottom">
                                        <a href="javascript:void(0);"
                                            class="btn btn_theme btn_md w-100 ">Want To Customize Itinerary </a>
                                </div>
                            </div> --}}
                            <div class="tour_detail_right_sidebar">
                                <div class="tour_select_offer_bar_bottom">
                                    <a href="javascript:void(0)" class="btn btn_theme btn_md w-100 "
                                        id="tranferConversation">Create My Own Itinerary
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="tour_detail_right_sidebar">
                                <div class="tour_details_right_boxed">
                                    <div class="tour_details_right_box_heading">
                                        <h3>Preferable Journey Date</h3>
                                    </div>
                                    <div class="valid_date_area">
                                        <div class="valid_date_area_one">
                                            <h5>Start Date</h5>

                                            <input type="date" class="form-control" id="fromdate" name="fromdate">
                                        </div>
                                        <div class="valid_date_area_one">
                                            <label for="" id="offsesson"> Off Season</label>

                                        </div>
                                    </div>

                                    <div class="tour_toru_details_bar_price pt-2">
                                        <h5>Price</h5>
                                        <div class="tour_package_bar_price">
                                            <h3 id="h3offprice"><i class="fas fa-rupee-sign fa-xs"></i>
                                                {{ $item->off_season_price_pp }} <sub>/Per person</sub> </h3>
                                            <h3 id="h3onprice"><i class="fas fa-rupee-sign fa-xs"></i>
                                                {{ $item->on_season_price_pp }} <sub>/Per person</sub> </h3>
                                            <h3 id="h3midprice"><i class="fas fa-rupee-sign fa-xs"></i>
                                                {{ $item->mid_season_price_pp }} <sub>/Per person</sub> </h3>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-8">
                    <div class="write_your_review_wrapper">
                        <h3 class="heading_theme">Write your review</h3>
                        <div class="write_review_inner_boxed">
                            <form action="https://andit.co/projects/html/and-tour/!#" id="news_comment_form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-froup">
                                            <input type="text" class="form-control bg_input"
                                                placeholder="Enter full name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-froup">
                                            <input type="text" class="form-control bg_input"
                                                placeholder="Enter email address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-froup">
                                            <textarea rows="6" placeholder="Write your comments" class="form-control bg_input"></textarea>
                                        </div>
                                        <div class="comment_form_submit">
                                            <button class="btn btn_theme btn_md">Post comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="all_review_wrapper">
                        <h3 class="heading_theme">All review</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="all_review_box">
                        <div class="all_review_date_area">
                            <div class="all_review_date">
                                <h5>08 Dec, 2021</h5>
                            </div>
                            <div class="all_review_star">
                                <h5>Excellent</h5>
                                <div class="review_star_all">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="all_review_text">
                            <img src="/assets/user/img/review/review1.png" alt="img">
                            <h4>Manresh Chandra</h4>
                            <p>" Loved the overall tour for all 6 days covering jaipur jodhpur and jaisalmer. worth ur
                                money for sure. thanks. Driver was very good and polite and safe driving for all 6 days.
                                on time pickup and drop overall. Thanks for it. "</p>
                        </div>
                        <div class="all_review_small_img">
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small1.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small2.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small3.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small4.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small5.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <h5>+5</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="all_review_box">
                        <div class="all_review_date_area">
                            <div class="all_review_date">
                                <h5>08 Dec, 2021</h5>
                            </div>
                            <div class="all_review_star">
                                <h5>Excellent</h5>
                                <div class="review_star_all">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="all_review_text">
                            <img src="/assets/user/img/review/review2.png" alt="img">
                            <h4>Michel falak</h4>
                            <p>" Loved the overall tour for all 6 days covering jaipur jodhpur and jaisalmer. worth ur
                                money for sure. thanks. Driver was very good and polite and safe driving for all 6 days.
                                on time pickup and drop overall. Thanks for it. "</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="all_review_box">
                        <div class="all_review_date_area">
                            <div class="all_review_date">
                                <h5>08 Dec, 2021</h5>
                            </div>
                            <div class="all_review_star">
                                <h5>Excellent</h5>
                                <div class="review_star_all">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="all_review_text">
                            <img src="/assets/user/img/review/review3.png" alt="img">
                            <h4>Chester dals</h4>
                            <p>" Loved the overall tour for all 6 days covering jaipur jodhpur and jaisalmer. worth ur
                                money for sure. thanks. Driver was very good and polite and safe driving for all 6 days.
                                on time pickup and drop overall. Thanks for it. "</p>
                        </div>
                        <div class="all_review_small_img">
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small1.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small2.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small5.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <h5>+15</h5>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="all_review_box">
                        <div class="all_review_date_area">
                            <div class="all_review_date">
                                <h5>08 Dec, 2021</h5>
                            </div>
                            <div class="all_review_star">
                                <h5>Excellent</h5>
                                <div class="review_star_all">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="all_review_text">
                            <img src="/assets/user/img/review/review4.png" alt="img">
                            <h4>Casper mike</h4>
                            <p>" Loved the overall tour for all 6 days covering jaipur jodhpur and jaisalmer. worth ur
                                money for sure. thanks. Driver was very good and polite and safe driving for all 6 days.
                                on time pickup and drop overall. Thanks for it. "</p>
                        </div>
                        <div class="all_review_small_img">
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small4.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <img src="/assets/user/img/review/review-small5.png" alt="img">
                            </div>
                            <div class="all_review_small_img_item">
                                <h5>+19</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="all_review_box">
                        <div class="all_review_date_area">
                            <div class="all_review_date">
                                <h5>08 Dec, 2021</h5>
                            </div>
                            <div class="all_review_star">
                                <h5>Excellent</h5>
                                <div class="review_star_all">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="all_review_text">
                            <img src="/assets/user/user/img/review/review5.png" alt="img">
                            <h4>Jason bruno</h4>
                            <p>" Loved the overall tour for all 6 days covering jaipur jodhpur and jaisalmer. worth ur
                                money for sure. thanks. Driver was very good and polite and safe driving for all 6 days.
                                on time pickup and drop overall. Thanks for it. "</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Cta Area -->
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
    <script src="{{ asset('assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);

            $('#fromdate').attr('min', maxDate);
        });


        $("#addToOvrtxt").click(function() {
            document.getElementById("textScrolBox").style.height = "auto";
            document.getElementById("addToOvrtxt").style.display = "none";
            document.getElementById("clossToOvrtxt").style.display = "block";
        });
        $("#clossToOvrtxt").click(function() {
            document.getElementById("textScrolBox").style.height = "135px";
            document.getElementById("textScrolBox").style.transition = "height 200ms ease 0.2s";
            document.getElementById("addToOvrtxt").style.display = "block";
            document.getElementById("clossToOvrtxt").style.display = "none";
        });
        $("#INaddToOvrtxt").click(function() {
            document.getElementById("INtextScrolBox").style.height = "100%";
            document.getElementById("INaddToOvrtxt").style.display = "none";
            document.getElementById("INclossToOvrtxt").style.display = "block";
        });
        $("#INclossToOvrtxt").click(function() {
            document.getElementById("INtextScrolBox").style.height = "135px";
            document.getElementById("INaddToOvrtxt").style.display = "block";
            document.getElementById("INclossToOvrtxt").style.display = "none";
        });
        $("#EXaddToOvrtxt").click(function() {
            document.getElementById("EXtextScrolBox").style.height = "100%";
            document.getElementById("EXaddToOvrtxt").style.display = "none";
            document.getElementById("EXclossToOvrtxt").style.display = "block";
        });
        $("#EXclossToOvrtxt").click(function() {
            document.getElementById("EXtextScrolBox").style.height = "135px";
            document.getElementById("EXaddToOvrtxt").style.display = "block";
            document.getElementById("EXclossToOvrtxt").style.display = "none";
        });
        $("#TCaddToOvrtxt").click(function() {
            document.getElementById("TCtextScrolBox").style.height = "100%";
            document.getElementById("TCaddToOvrtxt").style.display = "none";
            document.getElementById("TCclossToOvrtxt").style.display = "block";
        });
        $("#TCclossToOvrtxt").click(function() {
            document.getElementById("TCtextScrolBox").style.height = "135px";
            document.getElementById("TCaddToOvrtxt").style.display = "block";
            document.getElementById("TCclossToOvrtxt").style.display = "none";
        });
        $("#PPaddToOvrtxt").click(function() {
            document.getElementById("PPtextScrolBox").style.height = "100%";
            document.getElementById("PPaddToOvrtxt").style.display = "none";
            document.getElementById("PPclossToOvrtxt").style.display = "block";
        });
        $("#PPclossToOvrtxt").click(function() {
            document.getElementById("PPtextScrolBox").style.height = "135px";
            document.getElementById("PPaddToOvrtxt").style.display = "block";
            document.getElementById("PPclossToOvrtxt").style.display = "none";
        });
        $("#CPaddToOvrtxt").click(function() {
            document.getElementById("CPtextScrolBox").style.height = "100%";
            document.getElementById("CPaddToOvrtxt").style.display = "none";
            document.getElementById("CPclossToOvrtxt").style.display = "block";
        });
        $("#CPclossToOvrtxt").click(function() {
            document.getElementById("CPtextScrolBox").style.height = "135px";
            document.getElementById("CPaddToOvrtxt").style.display = "block";
            document.getElementById("CPclossToOvrtxt").style.display = "none";
        });


        $(document).on('change', '#selectcity', function() {
            var choice = $(this).val();
            document.cookie = "option=" + choice;
        });
        $(document).on('change', '#fromdate', function() {
            var date = $(this).val();
            document.cookie = "changeFromDate=" + date;

        });
        $("#fromdate").keypress(function() {
            var fdate = $(this).val();
            document.cookie = "startDate=" + fdate;
        });
        $(document).ready(function() {
            checkCookie();
            // $('#offsesson').html('');
            // $('#h3offprice').show();
            // $('#h3onprice').hide();
            // $('#h3midprice').hide();
            // $('#fromdate').change(function() {
            //     var value = $('#fromdate').val();
            //     if (value == '2023-06-01') {
            //         $('#offsesson').html('Off Season');
            //         $('#h3offprice').show();
            //         $('#h3onprice').hide();
            //         $('#h3midprice').hide();
            //     } else if (value == '2023-08-01') {
            //         $('#offsesson').html('On Season');
            //         $('#h3offprice').hide();
            //         $('#h3onprice').show();
            //         $('#h3midprice').hide();
            //     } else if (value == '2023-10-01') {
            //         $('#offsesson').html('Mid Season');
            //         $('#h3offprice').hide();
            //         $('#h3onprice').hide();
            //         $('#h3midprice').show();
            //     } else {
            //         $('#offsesson').html('');
            //         $('#h3offprice').hide();
            //         $('#h3onprice').hide();
            //         $('#h3midprice').hide();
            //     }
            // });


            $(".rolltype2").click(function() {

                var rolltype = $(this).attr('rolltype');
                var userid = $(this).attr('userid');
                var groupdepartureflag = $('#groupdipartureflag').val();
                var dateslection = $('#ddlstratDate').val();
                var txtstartdate = $('#fromdate').val();
                var startdate = "";

                var adultsText = $('#selectAdult').val();
                var adults = 0;
                if(adultsText == ''){
                    adults = 0;
                }else{
                    adults = adultsText;
                }
                var childsText = $('#selectChild').val();
                var childs = 0;
                if(childsText == ''){
                    childs = 0;
                }else{
                    childs = childsText;
                }

                var infantsText = $('#selectInfant').val();
                var infants = 0;
                if(infantsText == ''){
                    infants = 0;
                }else{
                    infants = infantsText;
                }


                if (groupdepartureflag > 0) {
                    startdate = dateslection;
                } else {
                    startdate = txtstartdate;
                }

                var selectedcity = $('#selectcity').val();
                var pacakageID = $('#hdnPacakageID').val();
                // $.cookie('option', null,{ path: '/' });
                var pricePeroerson = $('#hdnPriceperperson').val()
                if (startdate == '') {
                    alert("Select Date");
                    return false;
                } else if (selectedcity == 0) {
                    alert("Select City");
                    return false;
                } else {
                    if (rolltype == 'user') {
                        $.removeCookie("option");
                        $.removeCookie("startDate");
                        $.removeCookie("changeFromDate");
                        window.location = '/user/transferData/' + userid + '/' + startdate + '/' +
                            selectedcity + '/' + pacakageID + '/' + adults + '/' + childs + '/' + infants + '/' + pricePeroerson;
                    } else if (rolltype == 'admin') {
                        alert("You are not User");
                    }
                }

            });
        });
        // if (jQuery().select2) {
        //     $(".select2").select2();
        // }
        // for Country
        function getCookie(option) {
            var i, x, y, ARRcookies = document.cookie.split(";");
            for (i = 0; i < ARRcookies.length; i++) {
                x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
                y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
                x = x.replace(/^\s+|\s+$/g, "");
                if (x == option) {
                    return unescape(y);
                }
            }
        }

        // for Date for Change function
        function getchangeDateCookie(changeFromDate) {
            var i, x, y, ARRcookies = document.cookie.split(";");
            for (i = 0; i < ARRcookies.length; i++) {
                x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
                y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
                x = x.replace(/^\s+|\s+$/g, "");
                if (x == changeFromDate) {
                    return unescape(y);
                }
            }
        }

        // for Date for KeyPresws function
        function getDateCookie(startDate) {
            var i, x, y, ARRcookies = document.cookie.split(";");
            for (i = 0; i < ARRcookies.length; i++) {
                x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
                y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
                x = x.replace(/^\s+|\s+$/g, "");
                if (x == startDate) {
                    return unescape(y);
                }
            }
        }

        function checkCookie() {
            var option = getCookie("option");
            var keyPreassStartDate = getDateCookie("startDate");
            var texcahgeStartDate = getchangeDateCookie("changeFromDate");
            if (option != null && option != "") {
                $('#selectcity option[value="' + option + '"]').attr('selected', 'selected');
                // $('.select2').val(option);
                // $('#selectcity').val(option);
                // $(option).selected();
            }
            if (keyPreassStartDate != null && keyPreassStartDate != "") {
                $('#fromdate').val(keyPreassStartDate);
            }

            if (texcahgeStartDate != null && texcahgeStartDate != "") {
                $('#fromdate').val(texcahgeStartDate);
            }

        }


        // Transfer to Conversation portion
        $("#tranferConversation").click(function() {
            var pacakgeID = $('#pacakgeID').val();
            var url = "/conversation/" + pacakgeID;
            window.location.href = url;

        });
    </script>
@endsection
