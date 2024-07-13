@extends('layouts.front')

@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach ($subservicesview as $item)
                        <div class="common_bannner_text">
                            <h2>{{ $item->title }}</h2>
                            <ul>
                                <li><a href="{{ route('user.home') }}">Home</a></li>
                                <li><span><i class="fas fa-circle"></i></span><a href="{{ route('user-sub-services') }}">Sub Service</a></li>
                                <li><span><i class="fas fa-circle"></i></span> {{ $item->title }}</li>
                            </ul>
                        </div>
                    @endforeach
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
                    @if ($subservicesviewCount > 0)
                    @foreach ($subservicesview as $item)
                    <img src="/assets/user/img/common/abour_right.png" alt="img">
                            <h5>{{ $item->title }}</h5>
                            {!! $item->main_content !!}
                        @endforeach
                    @else
                    @endif
                </div>

            </div>
        </div>
    </section>



    <!-- Cta Area -->
    <section id="cta_area" class="mt-5">
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
