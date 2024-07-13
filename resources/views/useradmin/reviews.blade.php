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

                        <h2>Reviews</h2>


                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Review</li>
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
                            <h2>Reviews</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 rvw_pg">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="revw_box">
                                <div class="revw_top">
                                    <div class="rvw_date">
                                        <p>Posted Date & Time :- </p>
                                        <span> 2022-05-05</span>
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
                                                    <img src="/assets/user/img/hotel/hotel-list-4.png" alt="img"
                                                        class="small-image rounded rveImg_hvrnn" id="rveImg_hvrnn">
                                                    <img src="/assets/user/img/hotel/hotel-list-1.png" alt="img"
                                                        class="small-image rounded rveImg_hvr" id="rveImg_hvr">
                                                </div>
                                                <div class="imgThumbList ">
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
                                            <div class="col-lg-9">
                                                <div class="cruise_item_inner_content">
                                                    <div class="cruise_content_top_wrapper">
                                                        <div class="cruise_content_top_left cruise_content_w_100 rvw_nm">

                                                            <h4 class="">Anish De (Kolkata)</h4>
                                                            <h5>Visite at (05-07-23 & 12:20 AM)</h5>

                                                            <div class="duration">
                                                                <p class="rvw_txt cruise_content_bottom_activity mt-2">
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
                                                            <div class="row">
                                                                <div class="rtng_box col-lg-6">
                                                                    <h5>Rating :- 5 star</h5>
                                                                </div>
                                                                <div class="col-lg-6 rvw_dtls_btn rvw_dltEdt fl-rt">
                                                                    <div class="cruise_content_bottom_right br-n ">
                                                                        <a href="" class="btn btn_theme btn_md ">View
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
