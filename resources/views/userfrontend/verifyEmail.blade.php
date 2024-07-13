@extends('layouts.layout_registration')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
  <!-- Common Banner Area -->
  <section id="common_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="common_bannner_text">
                    {{-- <h2>Register</h2>
                    <ul>
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li><span><i class="fas fa-circle"></i></span> Register</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<section id="common_author_area" class="section_padding">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 offset-md-1 col-lg-12 offset-lg-1 mx-auto">
                <div class="col-12 col-md-12 col-sm-12 thnk_mb">
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state text-center thnk-state" data-height="500">
                                <div class="text-center verify_i">
                                    <!-- <img src="/frontend/assets/images/img1.png" alt="" /> -->
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                                <h2>Your email have been verified</h2>
                                <!-- <p class="lead" style="font-size: 13px !important">
                      We have sent a verification email to rhaul@gmail.com..
                    </p> -->
                                <!-- <a routerLink="/login" class="mt-2 bb"
                        >Click the link to get started !.</a
                      > -->
                                {{-- @if (Auth::check())
                                    <a href="javascript:void(0)" rolltype={{ Auth::User()->role_type }}
                                        class="btn btn-info mt-4 thnk_btn rolltype">Go to dashboard</a>
                                @else --}}
                                    <a href="/" class="btn btn-info mt-4 thnk_btn rolltype">Click here for
                                        Login</a>
                                {{-- @endif --}}

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $(".rolltype").click(function() {
            var rolltype = $(this).attr('rolltype');
            //alert(rolltype);
            if (rolltype == 'partner') {
                window.location.replace("/partner/dashboard");
            } else {
                window.location.replace("/user/dashboard");
            }
        });
    });
</script> --}}
@endsection
