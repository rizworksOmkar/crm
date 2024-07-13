@extends('layouts.front')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('styles')
    <title>{{ isset($title) ? $title : $companyName->company_name }}</title>
    {{-- <title>Dashboard - TRAVELHOSTONLINE </title> --}}
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.min.css') }}" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">

    <!-- Slick css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/slick.min.css') }}" />
    <!--slick-theme.css-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/slick-theme.min.css') }}" />
    <!-- Rangeslider css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/nouislider.css') }}" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.min.css') }}" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.theme.default.min.css') }}" />
    <!-- navber css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/navber.css') }}" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/meanmenu.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}" />
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/user/img/favicon.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">

                        <h2>Add Reviews</h2>


                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Add Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="dashboard_common_table adrvw_pd">
                <div class="profile_update_form prt_edt_box">
                    <h3>Add your Review</small></h3>
                    <input type="hidden" class="form-control numberonly" value="" id="hdbBookingID"
                        name="hdbBookingID" />
                    <input type="hidden" class="form-control numberonly" value="" id="hdbUserID" name="hdbUserID" />
                    <div class="travelerDetails">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="noofadult">Tour Title </label>
                                    <input type="text" class="form-control numberonly" id="noofadult" name="noofadult"
                                        placeholder="Enter Tour Title" value="" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group frm_txter">
                                    <label for="noofadult">Description </label>
                                    <textarea class="form-control numberonly" name="" id="" cols="5" rows="5"></textarea>
                                    {{-- <input type="text" class="form-control numberonly" id="noofadult" name="noofadult"
                                      placeholder="Enter Tour Title"  value="" /> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group frm_txter">
                                    <label for="noofadult">visited from </label>
                                    <input type="text" class="form-control numberonly" id="noofadult" name="noofadult"
                                        placeholder="" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group frm_txter">
                                    <label for="noofadult">visited Start Date </label>
                                    <input type="date" class="form-control numberonly" id="noofadult" name="noofadult"
                                        placeholder="Enter Tour Title" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group frm_txter">
                                    <label for="noofadult">visited End Date </label>
                                    <input type="date" class="form-control numberonly" id="noofadult" name="noofadult"
                                        placeholder="Enter Tour Title" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group frm_txter">
                                    <label for="noofadult">Rating </label>
                                    <select class="form-control numberonly" name="" id="">
                                      <option value="">5 star</option>
                                      <option value="">4 star</option>
                                      <option value="">3 star</option>
                                      <option value="">2 star</option>
                                      <option value="">1 star</option>
                                    </select>
                                    {{-- <input type="date" class="form-control numberonly" id="noofadult" name="noofadult"
                                        placeholder="Enter Tour Title" value="" /> --}}
                                </div>
                            </div>
                           
                            <div class="others-options bd-highlight mt-5 text-center">
                                <div class="option-item">
                                    {{-- <a href="{{ url('/user/viewBooking/' . $bookingID) }}" class="btn btn-dark">Save &amp; View</a> --}}
                                    <a href="javascript:void();" class="btn btn-dark" id="familyDetailsSave">Save
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile_update_form prt_edt_box">
                    <h3>Upload Your Photo or Video</h3>
                    <div class="travelerDetails">
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bookAddress">Set Children With Details</label>
                                    <table class=" tbl_box_aling table table-striped table-hover" id="tblChildDetails"
                                        style="width: 100%">
                                        <colgroup>
                                            <col style="width:50%" />
                                            <col style="width:30%" />
                                            <col style="width:20%" />
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Upload Your Photo or Video</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Full Name" id="riderChildname"
                                                        id="riderChildname" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control numberonly"
                                                        placeholder="" id="riderChildAge" id="riderChildAge" />
                                                </td>
                                                
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                                        id="btnChildADD">Add
                                                        +</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bookAddress">Upload Your Photo or Video</label>
                                    <table class=" tbl_box_aling table table-striped table-hover" id="tblChildDetails"
                                        style="width: 100%">
                                        <colgroup>
                                            <col style="width:50%" />
                                            <col style="width:30%" />
                                            <col style="width:20%" />
                                        </colgroup>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        placeholder="" id="riderChildname"
                                                        id="riderChildname" />
                                                </td>
                                                <td>
                                                  <div class=" row">
                                                    {{-- <label for="company_logo_2" class="col-sm-3 col-form-label">Upload Company Logo 2</label> --}}
                                                        <input type="file" id="company_logo_2" name="company_logo_2">
                                                </td>
                                                
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                                        id="btnChildADD">Add
                                                        +</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                           
                            </div>
                            <div class="others-options bd-highlight mt-5 text-center">
                              <div class="option-item">
                                  {{-- <a href="{{ url('/user/viewBooking/' . $bookingID) }}" class="btn btn-dark">Save &amp; View</a> --}}
                                  <a href="/user/reviews" class="btn btn-dark" id="familyDetailsSave">Save</a>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Delete Modal for category and subcategory ends --}}
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
