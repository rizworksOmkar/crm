@extends('layouts.front')

@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>About us</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about_us_top" class="section_padding">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6"> --}}
                {{-- <div class="col-lg-6"> --}}
                    <div class="about_us_left">
                        {{-- <div class="about_us_right"> --}}
                            <img src="assets/user/img/common/abour_right.png" alt="img">
                        {{-- </div> --}}
                        @if ($aboutCount > 0)
                            @foreach ($aboutus as $item)
                                <h5>{{ $item->about_heading }}</h5>
                                <h2>{{ $item->aboutus_title }}</h2>
                                {!! $item->aboutus_content !!}
                            @endforeach
                        @else
                        @endif
                    </div>
                {{-- </div>
                <div class="col-lg-6"> --}}
                    
                {{-- </div> --}}

            </div>
        </div>
    </section>

    <!-- About Banner -->
    <section id="about_offer_banner" class="section_padding_bottom">
        <div class="container-fluid">
            <div class="row">
                <h2 class="d-none">Heading</h2>
                <div class="col-lg-4">
                    <div class="about_offer_banner">
                        <a href="%21.html#"><img src="assets/user/img/common/small_banner.png" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="about_offer_banner">
                        <img src="assets/user/img/common/big_banner.png" alt="img">
                        <div class="about_offer_text">
                            {{-- <h3>Enjoy <span>20%</span> discount</h3> --}}
                            <h2>Thailand couple tour</h2>
                            {{-- <a href="tour-search.html">Find tours</a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- About Service Area -->
    <section id="about_service_offer" class="section_padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="about_service_boxed">
                        <img src="assets/user/img/icon/world.png" alt="img">
                        <h5><a href="#!">Best services</a></h5>
                        <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit. Consec tetur adipiscing elit.
                            Incididunt ut dolore.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="about_service_boxed">
                        <img src="assets/user/img/icon/walte.png" alt="img">
                        <h5><a href="#!">Trusted payment</a></h5>
                        <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit. Consec tetur adipiscing elit.
                            Incididunt ut dolore.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="about_service_boxed">
                        <img src="assets/user/img/icon/star.png" alt="img">
                        <h5><a href="#!">Top facility</a></h5>
                        <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit. Consec tetur adipiscing elit.
                            Incididunt ut dolore.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="about_service_boxed">
                        <img src="assets/user/img/icon/persentis.png" alt="img">
                        <h5><a href="#!">Awesome deals</a></h5>
                        <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit. Consec tetur adipiscing elit.
                            Incididunt ut dolore.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- consultation Area -->
    <section id="consultation_area" class="section_padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="consultation_area_text">
                        <h2>Have you any question? Get A Consultation</h2>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Area -->
    <section id="counter_area" class="section_padding_bottom ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="counter_area_wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 clo-sm-12 col-12">
                                <div class="counter_item">
                                    <img src="assets/user/img/icon/user.png" alt="icon">
                                    <h3 class="counter">2348</h3>
                                    <h6>Partners</h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 clo-sm-12 col-12">
                                <div class="counter_item">
                                    <img src="assets/user/img/icon/bank.png" alt="icon">
                                    <h3 class="counter">1000</h3>
                                    <h6>Listed Hotels</h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 clo-sm-12 col-12">
                                <div class="counter_item">
                                    <img src="assets/user/img/icon/world-map.png" alt="icon">
                                    <h3 class="counter">430</h3>
                                    <h6>Destinations</h6>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 clo-sm-12 col-12">
                                <div class="counter_item">
                                    <img src="assets/user/img/icon/calander.png" alt="icon">
                                    <h3 class="counter">40</h3>
                                    <h6>Booking</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Area -->
    <section id="customer_reviews" class="section_padding_bottom d-none">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>Customer review</h2>
                </div>
            </div>
            <div class="row">
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
                            <img src="assets/user/img/review/review6.png" alt="img">
                            <h4>Jesica simpsn</h4>
                            <span>Tourist</span>
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
                            <img src="assets/user/img/review/review6.png" alt="img">
                            <h4>Santa mariam</h4>
                            <span>traveler</span>
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
                            <img src="assets/user/img/review/review7.png" alt="img">
                            <h4>Jack cremer</h4>
                            <span>Manager</span>
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
    <section id="cta_area" class="d-none">
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
