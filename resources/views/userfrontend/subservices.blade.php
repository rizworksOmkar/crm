@extends('layouts.front')

@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Our Sub Services</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Our Sub Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section iid="top_service_andtour" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>And tour top services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($subservicesCount > 0)
                    @foreach ($subservices as $item)
                        {{-- <h5 class="mb-3">{{ $item->services_title }}</h5>
                        {!! $item->services_content !!} --}}
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="top_service_boxed sub_srvc_img">
                                <img src="{{ $item->service_images }}" alt="icon">
                                <h3>{{$item->title}}</h3>
                                <p>
                                    {{$item->short_content	}} .. <a href={{ url('/viewDusbserviceDetails/'. $item->id) }} >View</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
              

            </div>
        </div>
    </section>

    <!-- About Banner -->


    <!-- Cta Area -->
    <section id="cta_area" class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon ">
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
