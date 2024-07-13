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

                        <h2>All Reviews</h2>


                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> All Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Area -->

    <section id="explore_area" class="section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <div id="packCount">
                            <h2>All Reviews</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-lg-2">
                        <div class="left_side_search_area">
                            <form id="filterForm">
                                {{ csrf_field() }}

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
                                                        id="flexCheckDefaultf{{ $activityitem->id }}" name="activity_type_id[]">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefaultf{{ $activityitem->id }}">
                                                        <span class="area_flex_one">
                                                            <span>{{ $activityitem->package_activity }} </span>

                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        @else
                                        @endif

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div> --}}

                {{-- ---------------------------------------------------- --}}
                <div class="col-lg-12 rvw_pg">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="revw_box">
                                <div class="row">
                                    <div class="col-lg-9 ">
                                        <div class="revw_top">
                                            <div class="rvew_box_top">

                                                <div class="Journey_date rvw_date">
                                                    <p>To date :-</p>
                                                    <input type="date" value="2022-05-05">
                                                </div>
                                                <div class="Journey_date rvw_date">
                                                    <p>From date :-</p>
                                                    <input type="date" value="2022-05-05">
                                                </div>
                                            </div>
                                            <div class="rvw_date ps_dTime">
                                                <p>Posted Date & Time :- </p>
                                                <span> 2022-05-05</span>
                                            </div>
                                            <div class="srch_review">
                                                <div class="top_form_search_button">
                                                    <button class="btn btn_theme ">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <div class="revw_top">
                                            <div class="cruise_content_bottom_right br-n ">
                                                <a href="/user/addReview" class="btn btn_theme btn_md ">Add Review</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cruise_search_result_wrapper">
                                <div id="packages">
                                    <div class="cruise_search_item">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="cruise_item_img review_item_img">
                                                    <img src="/assets/user/img/hotel/hotel-list-5.png" alt="img"
                                                        class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                        class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                </div>
                                                <div class="imgThumbList rvw_subImg">
                                                    <span class="imgThumbCont all_vw" id="all_vw"><img class="imgThumb"
                                                            src="/assets/user/img/hotel/hotel-list-1.png"
                                                            alt="hotel_image_1">
                                                    </span>
                                                    <span class="imgThumbCont all_vw" id="all_vw2"><img class="imgThumb"
                                                            src="/assets/user/img/hotel/hotel-list-2.png"
                                                            alt="hotel_image_2">
                                                    </span>
                                                    <span class="imgThumbCont all_vw" id="all_vw3"><img class="imgThumb"
                                                            src="/assets/user/img/hotel/hotel-list-3.png"
                                                            alt="hotel_image_3">
                                                    </span>
                                                    <span class="imgThumbCont all_vw" id="all_vw4"><img class="imgThumb"
                                                            src="/assets/user/img/hotel/hotel-list-4.png"
                                                            alt="hotel_image_4">
                                                        <a href="/user/ReviewPhotos" class="allImg_page">All View</a>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="cruise_item_inner_content">
                                                    <div class="cruise_content_top_wrapper">
                                                        <div class="cruise_content_top_left cruise_content_w_100">

                                                            <h4>Visite at (05-07-23 & 12:20 AM)</h4>

                                                            <div class="duration">
                                                                <p class="wrt_rvw_txt cruise_content_bottom_activity mt-2">
                                                                    Sint est eu sit ipsum enim amet esse sunt incididunt.
                                                                    Occaecat aliquip commodo ipsum officia in Lorem commodo
                                                                    aliquip dolore. Nisi domip excepteur commodo ea nostrud
                                                                    mollit.Sint est eu sit ipsum enim amet esse sunt
                                                                    incididunt.
                                                                    Occaecat aliquip commodo ipsum officia in Lorem commodo
                                                                    aliquip dolore. Nisi domip excepteur commodo ea nostrud
                                                                    mollit.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="cruise_content_rate rvw_dltEdt">
                                                    <div class="rvw_dltEdt">
                                                        <div class="cruise_content_bottom_right ed_dlt">
                                                            <a href="" class="btn btn_theme btn_md "><i
                                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                Edit</a>
                                                        </div>
                                                        <div class="cruise_content_bottom_right ed_dlt">
                                                            <a href="" class="btn btn_theme btn_md dlt_btn"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="cruise_content_bottom_right br-n text-center cruise_content_w_100">
                                                        <a href="" class="btn btn_theme btn_md">View
                                                            details</a>
                                                    </div>
                                                </div>
                                            </div>
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
                                    type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection
