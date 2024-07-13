@extends('layouts.front')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            {{-- <div id="htlDtls_search">
                <a href="#home">Home</a>
                <a href="#news">News</a>
                <a href="#contact">Contact</a>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Hotel Crestwood</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Hotel</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Common Banner Area End -->
    <section id="hotel_details">
        {{-- Search Box --}}
        <div class="htl_dtls_search">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="htl_Search_boxed">
                            <div class="htl_cty_srch">
                                <p class="htl_city_name">CITY OR LOCATION</p>
                                <select class="form-select select2 " name="selectHtlDtlscity" id="selectHtlDtlscity">
                                    <option value="0">Landmark or Property Name
                                    </option>
                                    <option value="1">London</option>
                                    <option value="NewYork">New York</option>
                                </select>
                                {{-- <span class="">JFK - John F. Kennedy
                                    International...</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <div class="form_search_date">
                            <div class="htl_srch_date">
                                <p>Check-in</p>
                                <div class="htl_chk_in">
                                    <input type="date" value="2022-05-03">
                                    <span>Thursday</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <div class="form_search_date">
                            <div class="htl_srch_date">
                                <p>Check-out</p>
                                <div class="htl_chk_in">
                                    <input type="date" value="2022-05-05">
                                    <span>Thursday</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12 ">
                        <div class="htl_Search_boxed dropdown_passenger_area">
                            <p class="htl_city_name">Guests & Rooms</p>
                            {{-- <p>Passenger, Class </p> --}}
                            <div class="dropdown">
                                <button class="dropdown-toggle final-count htl_guest_slct" data-toggle="dropdown"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    0 Room | 0 Adults | 0 Child
                                    {{-- 0 Passenger --}}
                                </button>
                                <div class="dropdown-menu dropdown_passenger_info" aria-labelledby="dropdownMenuButton1">
                                    <div class="traveller-calulate-persons">
                                        <div class="passengers">
                                            {{-- <h6>Passengers</h6> --}}
                                            <div class="passengers-types">
                                                <div class="passengers-type">
                                                    <div class="text"><span class="count rcount">0</span>
                                                        <div class="type-label d_flx">
                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                1 Room
                                                            </p><span>(Max 8)</span>
                                                        </div>
                                                    </div>
                                                    <div class="button-set">
                                                        <button type="button" class="btn-add-rm">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn-subtract-rm">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="passengers-type">
                                                    <div class="text"><span class="count pcount">2</span>
                                                        <div class="type-label d_flx">
                                                            <p class="mr-1">Adult</p>
                                                            <span>(12+ yrs)</span>
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

                                                    <div class="text"><span class="count ccount">0</span>
                                                        <div class="type-label d_flx ">
                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                Children</p>
                                                            <span>(2 - Less than 12
                                                                yrs)</span>
                                                        </div>
                                                    </div>
                                                    <div class="button-set">
                                                        <button type="button" class="btn-add-c">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn-subtract-c">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="passengers-type d-none">
                                                    <div class="text">
                                                        <span class="count incount">0</span>
                                                        <div class="type-label d_flx">
                                                            <p class="fz14 mb-xs-0 mr-1">
                                                                Infant</p>
                                                            <span>(Less than 2 yrs)</span>
                                                        </div>
                                                    </div>
                                                    <div class="button-set">
                                                        <select name="" id="" class="slct_gst_rm">
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
                                                        </select>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <div class="top_form_search_button htl_dtls_srch_btn">
                            <button class="btn btn_theme btn_md">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Search Box End --}}
        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour_details_leftside_wrapper mb-4">
                        <div class="tour_details_heading_wrapper bg_wht">
                            <div class="tour_details_top_heading">
                                <div class="str_rtng">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h2>Hotel Crestwood</h2>
                                <h5 class="pt-0"><i class="fas fa-map-marker-alt"></i> Park circus - Kolkata</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="htlDtl_hdrRght">
                        <div class="htl_ctgr">
                            <p class="htl_rtng_box">4.0</p>
                            <p class="htl_ctgr_tp">Very Good</p>
                        </div>

                        <div class="chkin_chkot">
                            <div class="htldtls_in">
                                <span>Check-in</span>
                                <p>12 PM</p>
                            </div>
                            <div class="htldtls_out">
                                <span>Check-out</span>
                                <p>10 AM</p>
                            </div>
                        </div>
                    </div>
                    <div class="fr_cncl">
                        <h5>Free Cancellation Till 13 Jul'23</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    {{-- <div class="tour_details_leftside_wrapper mb-4">
                        <div class="tour_details_heading_wrapper bg_wht">
                            <div class="tour_details_top_heading">
                                <h2>Amazing Bukit Batok</h2>
                                <h5><i class="fas fa-map-marker-alt"></i> Singapore</h5>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-8 prl_x">
                            <div class="slideshow-container">
                                <div class="hotelmySlides">
                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img" class=""
                                        style="width:100%">
                                </div>

                                <div class="hotelmySlides">
                                    <img src="/assets/user/img/hotel/hotel-list-2.png" alt="img" class=""
                                        style="width:100%">
                                </div>

                                <div class="hotelmySlides">
                                    <img src="/assets/user/img/hotel/hotel-list-3.png" alt="img" class=""
                                        style="width:100%">
                                </div>

                                <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                            </div>
                        </div>
                        <div class="col-lg-4 prl_x">
                            <div class="crtar">
                                <div class="hotelCtar">
                                    <div class="hotel_ttl">
                                        <p>Interior</p>
                                    </div>
                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img" class=""
                                        style="width:100%">
                                </div>

                                <div class="hotelCtar">
                                    <div class="hotel_ttl">
                                        <p>Out door</p>
                                    </div>
                                    <img src="/assets/user/img/hotel/hotel-list-2.png" alt="img" class=""
                                        style="width:100%">
                                </div>

                                <div class="hotelCtar">
                                    <div class="hotel_ttl">
                                        <p>From Visitors</p>
                                    </div>
                                    <img src="/assets/user/img/hotel/hotel-list-3.png" alt="img" class=""
                                        style="width:100%">
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- <div class="tour_details_leftside_wrapper">
                        <h3 class="htldAmen_heading">Popular Amenities</h3>
                        <div class="tour_details_top_bottom ">
                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>Smoking Rooms</h5>
                                </div>
                            </div>

                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-wifi" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>Wi-Fi</h5>
                                </div>
                            </div>

                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>Room Service</h5>
                                </div>
                            </div>

                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>Air Conditioning</h5>

                                </div>
                            </div>

                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>Food and Drinks</h5>

                                </div>
                            </div>

                            <div class="toru_details_top_bottom_item htl_dtls_Amenities">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>CCTV </h5>

                                </div>
                            </div>

                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4 prl_x">
                    <span data-nosnippet="true">
                        <div class="hotel_rt_box">
                            <div class="hotel_rm_bx">
                                <div class="htl_amnt_box">
                                    <h4 class="dlx_rm">Amenities</h4>
                                    <div class="amnts-list">
                                        <ul class="usr">
                                            <li>Wi-Fi</li>
                                            <li> Spa</li>
                                            <li> Room Service</li>
                                            <li>Swimming Pool </li>
                                            <li> Airport Transfers</li>
                                            <li> Balcony/Terrace</li>
                                            <li> Bar</li>
                                            <li> Barbeque</li>
                                            <li> Cafe</li>
                                            <li>Indoor Games</li>
                                            <li> Parking</li>
                                            <li> Restaurant</li>
                                            <li> Bus Station Transfers</li>
                                            <li>Railway Station Transfers</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="hotel_rm_bx">
                                <div class="htl_contn">
                                    <a class="dlx_rm" data-testid="baseSrRoomName">Deluxe Room</a>
                                    <div class="makeFlex">
                                        <div class="htl_price">
                                            <p class="usrAdl">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <span class="font12 latoBold">For 1 Adult</span>
                                            </p>
                                            <ul class="usr">
                                                <li class="usr_itemNon ">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                    <span class="latoBold redText">Non-Refundable</span>
                                                    <div class="FcDetails__outer"></div>
                                                </li>
                                                <li class="usr_itemRm">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <span>Room Only</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="hotel_priceright">
                                            <div class="hotel_price">
                                                <p class="">Per person</p>
                                                <p class="htl_RacPrice">₹ 9,999</p>
                                                <div class="htl_tPrice">
                                                    <p class="">₹ 2,826</p>
                                                </div>
                                                <p class="">+ ₹ 699 taxes &amp; fees
                                                </p>
                                                <p class="htl_prcSave">Saving ₹ 7,173</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hotelFtr_bx">
                                    <a class="hotelVew_bx">
                                        VIEW OTHER ROOMS
                                    </a>
                                    <span class="htl_bookNowBtn ">
                                        <a class="primaryBtn ">BOOK THIS NOW</a>
                                    </span>
                                </div>
                            </div>
                            <div class="makeFlex">
                                <div class="hotel_rm_bx vew_review">
                                    <span class="vew_review_map"><a href="">View On Map</a></span>
                                    <img src="//imgak.mmtcdn.com/pwa_v3/pwa_hotel_assets/map-bg-new.png" alt="map">
                                </div>
                                <div class="hotel_rm_bx vew_review hotel_vew_review">
                                    <div class="hotel_rting_rvw">
                                        <p class="">3.7</p>
                                    </div>
                                    <p class="htl_vg">Very Good</p>
                                    <p class="htl_vg_sub">Based on <b> 1588 Ratings</b></p>
                                    <p class="mt-2"><a class="vew_review_red">Read all
                                            Reviews</a></p>
                                </div>
                            </div>
                            <div class="htl_valy_st hotel_rm_bx">
                                <div class="htl_st_header">
                                    <span class="htl_header_img">
                                        <img src="https://promos.makemytrip.com/Hotels_product/Value_Stays/App/listing/inlinecards/icon-hdpi.png"
                                            alt="">
                                    </span>
                                    <div class="htl_headet_tx">
                                        <p class="hdt_top">MMT ValueStays</p>
                                        <p class="hdt_top_sml">
                                            <font color="#000000">Top Rated Affordable Properties</font>
                                        </p>
                                    </div>
                                </div>
                                <ul class="altVs_list">
                                    <li class="usr_item">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>100% Money Back Guarantee*</span>
                                    </li>
                                    <li class="usr_item">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Hassle-Free Check-in</span>
                                    </li>
                                </ul>
                                <p class="hdt_ftr_sml">* if you don’t get clean rooms with TV, AC &amp;
                                    Free Wi-Fi</p>
                            </div> --}}
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="htl_dtls_pRltv">
            <div class=" htlDtlsTbbMebnu_header " id="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="htlDtlsTbbMebnu" class="htlDtls_TbbMebnu tabs">
                                <a href="#tab1" data-tab="tab1" class="htlDtlsactive">OVERVIEW</a>
                                <a href="#tab2" data-tab="tab2">ROOMS</a>
                                {{-- <a href=""> AMENITIES</a> --}}
                                {{-- <a href="">LOCATION</a> --}}
                                <a href="#tab3" data-tab="tab3">PROPERTY RULES</a>
                                <a href="#tab4" data-tab="tab4">USER REVIEWS</a>
                                <a href="#tab5" data-tab="tab5">SIMILAR PROPERTIES</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="ovrvw  tabContent" id="tab1">
                    <div class="ovrvw_abt mtb_25 ">
                        <h4 class="abt_title">About The Hotel</h4>
                        <p class="abt_elps"> Hotel Crestwood Inn is situated in a bustling desert city Jodhpur which is the
                            second
                            largest in Rajasthan after Jaipur. The property is at a distance of just 4 km from Jodhpur
                            Airport
                            while
                            Jodhpur Junction and Bus Stand is just walking distance away. The property has an advantage as
                            it
                            enjoys
                            propinquity to various popular tourist excursions such as Mehrangarh Fort(2.1 km), Umaid Bhawan
                            Palace(3
                            km), Jaswant Thada(2.6 km), Kaylana Lake(10 km) and many other notable spots which can be
                            visited by
                            guests during their stay. The hotel itself offers services that are designed to offer maximum
                            comfort to
                            its guests. Some of the services offered here are laundry, room service, doctor on call and
                            front
                            desk.
                            Every room in the hotel is uniquely designed with cozy interiors and offer exclusive facilities
                            such
                            as
                            television, telephone, hot/cold water, attached bathroom and various other essential bathroom
                            toiletries. Experience a grand stay and a warm hospitality at Hotel Crestwood Inn!</p>
                        <div class="abt_mrBtn">
                            <a class="abt_more" href="">Read more</a>
                        </div>
                    </div>
                    <div class="ovrvw_abt mtb_25" id="htlDtlsTb">
                        <div class="brk_fst row">
                            <div class="brk_fst_dscp col-lg-3">
                                <h4 class="abt_title">Compulsory Breakfast</h4>
                                <table>
                                    <tr>
                                        <td>Ammount</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td>30%</td>
                                    </tr>
                                    <tr class="tl_ammnt">
                                        <td>Discounted Ammount</td>
                                        <td>140</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="brk_ppoint col-lg-9">
                                <h4 class="abt_title">30 % Discount On Happy Hours</h4>
                                <p>30% discount on Happy Hours is available. It will be applicable on Food/Beverages only.
                                    It is
                                    served with Veg options. Drinks will include Tea or coffee/Soft Drinks. Happy Hours is
                                    available
                                    from 08:00 AM till 11:00 PM at Haveli Restro.</p>
                            </div>
                        </div>
                    </div>
                    <div class=" mtb_25" id="htlDtlsTb">
                        <div class="brk_fst row">
                            <div class="ovrvw_abt col-lg-6">
                                <h4 class="abt_title">Extra Beds</h4>
                                <p>An extra bed will be provided to accommodate any child included in the booking for a
                                    charge
                                    mentioned below. (Subject to availability)</p>
                                <h5 class="extr_bd">Facilities</h5>
                                <ul>
                                    <li>4 person in available</li>
                                    <li>Extra Cushions</li>
                                    <li>Extra Blanket</li>
                                    <li>Extra Pillows</li>
                                </ul>
                            </div>
                            <div class="ovrvw_abt col-lg-6">
                                <h4 class="abt_title">Child Policy</h4>
                                <p>The kids can stay in the same room with the parents without any additional charges. In
                                    case
                                    an
                                    extra bed is required, that would be on an additional charges. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rm_teb_box mtb_25 tabContent" id="tab2">
                    <div class="row">
                        <div class="rm_head">
                            <div class="row">
                                <div class="col-lg-4 cl-pd-none">
                                    <h4>4 ROOM TYPES</h4>
                                </div>
                                <div class="col-lg-4 cl-pd-none">
                                    <h4>OPTIONS</h4>
                                </div>
                                <div class="col-lg-4 cl-pd-none">
                                    <h4>PRICE</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 cl-pd-none">
                            <div class="rm_img_box">
                                <p class="rm_tp">Standard Non AC Room With Fan</p>
                                <div class="rm_img_optn">
                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img" class="">
                                </div>
                                <div class="rm_img_dtls">
                                    <div class="rm_img_dtlsType">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <p>120 sq.ft</p>
                                    </div>
                                    <div class="rm_img_dtlsType">
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <p>Double Bed</p>
                                    </div>
                                    <div class="rm_img_dtlsType">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>Max 2 Guests</p>
                                    </div>
                                    <div class="rm_img_dtlsType">
                                        <i class="fa fa-institution" aria-hidden="true"></i>
                                        <p>Palace View</p>
                                    </div>
                                </div>
                                <div class="mr-view"><button>View More Details</button></div>
                            </div>
                        </div>
                        <div class="col-lg-4 cl-pd-none">
                            <div class="rm-optn">
                                <p class="rm_tp">1. Room Only | Free Cancellation</p>
                                <ul>
                                    <li>No meals included</li>
                                    <li>10 % Discount On Events</li>
                                    <li>Free Room Upgrade</li>
                                    <li>Free Cancellation before 24 Jul 11:59 AM</li>
                                    {{-- <li></li> --}}
                                </ul>
                                <div class="mr-view"><button>View More Details</button></div>
                            </div>
                        </div>
                        <div class="col-lg-4 cl-pd-none">
                            <div class="rm-prce">
                                <span class="of_box">35.0 % off</span>
                                <p class="cut_prce">
                                    ₹ 700
                                </p>
                                <h4>
                                    ₹ 456
                                </h4>
                                <span class="tx_fr">+ ₹ 114 taxes & fees</span>
                                <p class="rm-night">1 Roomper night</p>
                                <div class="slct_rm">
                                    <button>Select Room</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="amnts_box mtb_25 d-none" id="htlDtlsTb">
                <h4 class="abt_title">Amenities at Hotel Crestwood</h4>
                <div class="amnts_actv">
                    <div class="amnts_actv_optn">
                        <i class="fa fa-wifi" aria-hidden="true"></i>
                        <p> Wi-Fi</p>
                    </div>
                    <div class="amnts_actv_optn">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                        <p> Room Service</p>
                    </div>
                    <div class="amnts_actv_optn">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <p> Parking</p>
                    </div>
                    <div class="amnts_actv_optn">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                        <p> Restaurant</p>
                    </div>
                </div>
                <div class="all_amnts-optn">
                    <ul>
                        <p class="rm_tp">Highlighted Amenities</p>
                        <li>Smoking Rooms</li>
                        <li>Wi-Fi</li>
                        <li>Room Service</li>
                        <li>Air Conditioning</li>
                    </ul>
                    <ul>
                        <p class="rm_tp">Basic Facilities</p>
                        <li>Room Service</li>
                        <li>Housekeeping</li>
                        <li>Grocery</li>
                        <li>Air Conditioning</li>
                    </ul>
                    <ul>
                        <p class="rm_tp">Food and Drinks</p>
                        <li> Breakfast</li>
                        <li>Dining Area</li>
                        <li>Barbeque</li>
                        <li>Restaurant</li>
                    </ul>
                    <ul>
                        <p class="rm_tp">Safety and Security</p>
                        <li>Safe</li>
                        <li>CCTV</li>
                    </ul>
                    <ul>
                        <p class="rm_tp">General Services</p>
                        <li>Luggage Assistance</li>
                        <li>Bellboy Service</li>
                        <li>Wake-up Call</li>
                    </ul>
                </div>
                 </div> --}}
                <div class="prpty_ruls mtb_25 tabContent" id="tab3">
                    <h4 class="abt_title">Property Rules</h4>
                    <div class="ckIn_ckOt">
                        <div class="ck-inot">
                            <span>Check-in:</span>
                            <p>12 PM</p>
                        </div>
                        <div class="ck-inot">
                            <span>Check-out:</span>
                            <p>10 AM</p>
                        </div>
                    </div>
                    <div class="alwd_rols">
                        <div class="alwd_fd">
                            <ul>
                                <li>Aadhar, Passport, Driving License and Govt. ID are accepted as ID proof(s)</li>
                                <li>Pets are not allowed.</li>
                                <li>Smoking within the premises is not allowed</li>

                                <li>Non-veg food is allowed</li>
                                <li>Food from outside is allowed</li>
                                <li>Food delivery from Local restaurants and other apps is allowed</li>
                                <li>Alcohol is allowed in the premises</li>
                            </ul>
                        </div>
                        <div class="abt_mrBtn">
                            <a class="abt_more" href="">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="prpty_ruls mtb_25 tabContent" id="tab4">
                    <h4 class="abt_title">USER REVIEWS & RATING</h4>
                    <div class="usr_sty">
                        <div class="htl_ctgr_rtng">
                            <div class="htl_ctgr">
                                <p class="htl_rtng_box">4.0</p>
                                <p class="htl_ctgr_tp">Very Good</p>
                                <span>(99 Ratings)</span>
                            </div>
                        </div>
                        <div class="usr_sty_ctgr">
                            <h4 class="abt_title">What our guests say?</h4>
                            <ul>
                                <li>neat room (8)</li>
                                <li>good food quality (6)</li>
                                <li>quick service (5)</li>
                                <li>great place (4)</li>
                                <li>best stay (3)</li>
                                <li>desert safari (2)</li>
                                <li>city tour (2)</li>
                                <li>nice person (2)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="usr_rvw">
                        <div class="usr-cmnt-img">
                            <img src="assets/user/img/common/testimonial.png" alt="">
                        </div>
                        <div class="usr_cmnt_box">
                            <div class="usr_nm">
                                <h5 class="usrrm_tp">Soma De</h5>
                                <p>(Stayed 26 Sep, 2017)</p>
                            </div>
                            <span class="htl_str_rting">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <p class="usr_cmnt">nice hotel and view and nice service and silence place</p>
                            <div class="ownr_rply_box">
                                <div class="usr_cphr_img">
                                    <img src="/assets/user/img/hotel/hotel-list-2.png" alt="">
                                    <img src="/assets/user/img/hotel/hotel-list-3.png" alt="">
                                </div>
                                <div class="ownr_rply">
                                    <p>Owner replied in 14 jan</p>
                                    <p class="ownt_cmnt">Dear Guest .Thank you for staying with us a d writing a positive
                                        feedback
                                        to encourage us. We would love to see u again. Regarda</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="usr_rvw">
                        <div class="usr-cmnt-img">
                            <img src="assets/user/img/common/side_img.png" alt="">
                        </div>
                        <div class="usr_cmnt_box">
                            <div class="usr_nm">
                                <h5 class="usrrm_tp">Priya Das</h5>
                                <p>(Stayed 26 jan, 2023)</p>
                            </div>
                            <span class="htl_str_rting">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            <p class="usr_cmnt">Nice Hotel. Room was good Service is also nice. They have roof top
                                restaurant
                                Zoya ka Zayeka. With tasty home made food. Recommend.</p>
                            <div class="ownr_rply_box">
                                <div class="usr_cphr_img">
                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="">
                                    <img src="/assets/user/img/hotel/hotel-list-3.png" alt="">
                                </div>
                                <div class="ownr_rply">
                                    <p>Owner replied in 14 jan</p>
                                    <p class="ownt_cmnt">Dear Sir. Thank you for your positive feedback and review. we
                                        would
                                        love to host you again. Have great day.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }

        $(document).ready(function() {
            // Hide all tab content except the first
            $('.tabContent').not(':first').hide();


            // Bind click event to tabs links
            $('.tabs a').click(function() {

                //Hide all tab content
                $('.tabContent').hide();

                // Remove active class from all tabs links
                $('.tabs a').removeClass('htlDtlsactive');

                // Add htlDtlsactive class to clicked tab link
                $(this).addClass('htlDtlsactive');

                // Get data-tab attribute value
                var tab = $(this).data('tab');

                // Show corresponding tab content
                $('#' + tab).show();
            });

        });
        let slideIndex = [1, 1];
        let slideId = ["hotelmySlides"]
        showSlides(1, 0);
        showSlides(1, 1);

        function plusSlides(n, no) {
            showSlides(slideIndex[no] += n, no);
        }

        function showSlides(n, no) {
            let i;
            let x = document.getElementsByClassName(slideId[no]);
            if (n > x.length) {
                slideIndex[no] = 1
            }
            if (n < 1) {
                slideIndex[no] = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex[no] - 1].style.display = "block";
        }
    </script>

    <script>
        // teb meennu header sticy
        // window.onscroll = function() {
        //     myFunction()
        // };

        // var header = document.getElementById("htlDtlsTbbMebnu");
        // var sticky = header.offsetTop;

        // function myFunction() {
        //     if (window.pageYOffset > sticky) {
        //         header.classList.add("htlsticky");
        //     } else {
        //         header.classList.remove("htlsticky");
        //     }
        // }
    </script>
@endsection
