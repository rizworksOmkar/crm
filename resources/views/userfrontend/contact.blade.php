@extends('layouts.front')

@section('content')
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Area -->
    <section id="contact_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Contact with us</h2>
                    </div>
                </div>
            </div>
            <div class="contact_main_form_area_two">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact_left_top_heading">
                            <h2>Do you have any query? Contact with us to get any
                                any support.</h2>
                            <h3>Leave us a message</h3>
                            {{-- <p>Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum.
                                There are many variations of passages of Lorem Ipsum available but the majority.</p> --}}
                        </div>
                        <div class="contact_form_two">
                            <form action="https://andit.co/projects/html/travoriz/!#" id="contact_form_content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" placeholder="First name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" placeholder="Last name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input"
                                                placeholder="Email address (Optional)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input"
                                                placeholder="Mobile number*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control bg_input" rows="5" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn_theme btn_md">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_two_left_wrapper">
                            <h3>Contact details</h3>
                            <div class="contact_details_wrapper">
                                <div class="contact_detais_item">
                                    <h3>{{ $companyName->company_name }}</h3>
                                    <h6>
                                        {{ $companyName->company_registered_address }}<br>
                                        {{ getCityName($companyName->city_id)}} - {{$companyName->pincode}}, {{getStateName($companyName->state_id)}} , {{getCountryName($companyName->country_id)}}
                                    </h6>
                                </div>
                                <div class="contact_detais_item">
                                    <h4>Help line</h4>
                                    <h3><a
                                            href="{{ $companyName->company_phone_number_1 }}">+{{$companyName->company_country_code}} {{ $companyName->company_phone_number_1 }}</a>
                                    </h3>
                                </div>
                                <div class="contact_detais_item">
                                    <h4>Support mail</h4>
                                    <h3><a href="mailto:mailto:{!! $companyName->company_email_id_1 !!}">{!! $companyName->company_email_id_1 !!}</a> <br>
                                        <a href="mailto:mailto:{!! $companyName->company_email_id_2 !!}">{!! $companyName->company_email_id_2 !!}</a>
                                    </h3>
                                </div>
                                {{-- <div class="contact_detais_item">
                                    <h4>Contact hour</h4>
                                    <h3>Mon-Sun : 24 hours</h3>
                                </div> --}}
                                {{-- <div class="contact_map_area">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.6962663570607!2d89.56355961427838!3d22.813715829827952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff901efac79b59%3A0x5be01a1bc0dc7eba!2sAnd+IT!5e0!3m2!1sen!2sbd!4v1557901943656!5m2!1sen!2sbd"></iframe>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @if ($CompanyBranchCount > 0)
                        <div class="cnt_rg mt_50 row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section_heading_center">
                                    <h2>Our Others Branches</h2>
                                </div>
                            </div>

                            @foreach ($CompanyBranch as $item)
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">
                                    <div class="about_service_boxed cnt_rg_box top_service_boxed ">
                                        <h6 class="cntry_head">{{ $item->company_country }}</h6>
                                        <h5><a href="#!">{{ $item->company_address }}</a></h5>
                                        <h6>{{ $item->company_state }}, {{ $item->company_city }} -
                                            {{ $item->company_pincode }}</h6>
                                        <p><strong>​Email</strong> <span>{{ $item->company_email_1 }}</span></p>
                                        <p><strong>Mobile</strong> <span>{{ $item->phone_number_1 }}</span></p>
                                        <p><strong>Contact hour</strong> <span>Mon-Sun : 24 hours</span></p>
                                    </div>
                                </div>
                            @endforeach


                            {{-- <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">
                            <div class="about_service_boxed cnt_rg_box top_service_boxed ">
                                <h5><a href="#!">75C, Park Street</a></h5>
                                <h6>KOLKATA - 700016</h6>
                                <p><strong>​Email</strong> <span>enquiry@travelhostonline.in</span></p>
                                <p><strong>Mobile</strong> <span>+91 7978868144</span></p>
                                <p><strong>Contact hour</strong> <span>Mon-Sun : 24 hours</span></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">
                            <div class="about_service_boxed cnt_rg_box top_service_boxed ">
                                <h5><a href="#!">75C, Park Street</a></h5>
                                <h6>KOLKATA - 700016</h6>
                                <p><strong>​Email</strong> <span>enquiry@travelhostonline.in</span></p>
                                <p><strong>Mobile</strong> <span>+91 7978868144</span></p>
                                <p><strong>Contact hour</strong> <span>Mon-Sun : 24 hours</span></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12 ">
                            <div class="about_service_boxed cnt_rg_box top_service_boxed ">
                                <h5><a href="#!">75C, Park Street</a></h5>
                                <h6>KOLKATA - 700016</h6>
                                <p><strong>​Email</strong> <span>enquiry@travelhostonline.in</span></p>
                                <p><strong>Mobile</strong> <span>+91 7978868144</span></p>
                                <p><strong>Contact hour</strong> <span>Mon-Sun : 24 hours</span></p>
                            </div>
                        </div> --}}
                        </div>
                    @else
                    @endif
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
