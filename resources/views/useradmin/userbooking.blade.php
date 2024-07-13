@extends('layouts.user-dashboard-layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="dashboard_common_table">
        <h3>Booking Details</h3>
        <div class="profile_update_form">
            <form id="booking_form">
                {{ csrf_field() }}
                <div class="row">
                    {{-- <input type="hidden" class="form-control" id="hdnUserID" name="hdnUserID" value="{{ Auth::User()->id }}"> --}}
                    <input type="hidden" class="form-control" id="hdndepartureFlag" name="hdndepartureFlag"
                        value="{{ $pacakageName->groupdepartureflag }}">
                    <input type="hidden" class="form-control" id="hdndAdult" name="hdndAdult" value="{{ $adults }}">
                    <input type="hidden" class="form-control" id="hdnChild" name="hdnChild" value="{{ $childs }}">
                    <input type="hidden" class="form-control" id="hdnInfant" name="hdnInfant" value="{{ $infants }}">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="f-name">First name</label>
                            <input type="text" class="form-control" id="f-name" id="f-name" placeholder="Your Name"
                                value="{{ Auth::User()->first_name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="m-name">Middle name</label>
                            <input type="text" class="form-control" id="m-name" name="m-name"
                                value="{{ Auth::User()->middle_name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="l-name">Last name</label>
                            <input type="text" class="form-control" id="l-name" name="l-name"
                                value="{{ Auth::User()->last_name }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="mail-address">Selected City Name</label>
                            <select class="form-select select2" name="selectcity" id="selectcity">
                                <option value="0">----- Select City -----</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $selectedcity ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="journeyDate">Journey Date</label>
                            @if ($pacakageName->groupdepartureflag > 0)
                                <select class="form-select select2" name="ddljourneyDate" id="ddljourneyDate">
                                    @foreach ($pacakgeavail as $avail)
                                        @if ($avail->availability_date >= $todaysDate)
                                            <option value="{{ $avail->availability_date }}"
                                                {{ $avail->availability_date == $startdate ? 'selected' : '' }}>
                                                {{ date('d-M-Y', strtotime($avail->availability_date)) }}
                                            </option>
                                        @else
                                        @endif
                                    @endforeach
                                </select>
                            @else
                                <input type="date" class="form-control" id="journeyDate" name="journeyDate"
                                    value="{{ $startdate }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pacakageName">Package Name</label>
                            <input type="hidden" class="form-control" id="hdnPacakgeID" name="hdnPacakgeID"
                                value="{{ $pacakageName->id }}">
                            <input type="text" class="form-control" id="pacakageName" name="pacakageName"
                                value="{{ $pacakageName->package_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group usr_ipt_grp flx_sp_bwn">
                            <label for="pacakagePrice" class="width_100">Price Of Package In (Rs.) Per Person</label>
                            <input type="text" class="form-control" id="pacakagePrice" name="pacakagePrice"
                                value="{{ $pricePeroerson }}" readonly>
                            <input type="hidden" class="form-control" id="hiddenchild_discount" name="hiddenchild_discount"
                                value="{{ $pacakageName->child_discount }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Address</label>
                            <textarea class="form-control" id="bookAddress" name="bookAddress"> </textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="bookState">State</label>
                            <input type="text" class="form-control" id="bookState" name="bookState" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="bookCity">City</label>
                            <input type="text" class="form-control" id="bookCity" name="bookCity" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="bookCountry">Country</label>
                            <input type="text" class="form-control" id="bookCountry" name="bookCountry" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="bookPincode">PinCode</label>
                            <input type="text" class="form-control numberonly" id="bookPincode" name="bookPincode" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="others-options d-flex align-items-center">
            <div class="option-item">
                {{-- <a data-bs-toggle="modal"
                data-bs-target="#saveModal" class="btn btn-dark">Save &amp; Next</a> --}}
                <a href="javascript:void();" class="btn btn-dark" id="savenext">Save &amp; Next</a>
            </div>
        </div>

    </div>
    {{-- <div class="modal fade" id="saveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <h4>
                        Your Journey Details Is Saved                         
                    </h4>
                    <h6>Kindly Set Your Journey Persones Name.</h6>
                    <div class="logout_approve_button">
                        <a href="#" class="btn btn_theme btn_md">Yes I DO</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.numberonly').keypress(function(e) {

                var charCode = (e.which) ? e.which : event.keyCode

                if (String.fromCharCode(charCode).match(/[^0-9]/g))

                    return false;

            });
        });
        if (jQuery().select2) {
            $(".select2").select2();
        }
        $("#savenext").click(function(event) {
            event.preventDefault();

            var adults = $('#hdndAdult').val();
            var childs = $('#hdnChild').val();
            var infants = $('#hdnInfant').val();
            var myform = document.getElementById("booking_form");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('User-bookingsave') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.message == 'success') {
                        window.location = '/user/JourneyPersonDetails/' + response.bookingID + '/' + adults + '/' + childs + '/' + infants;

                    } else {}

                },
            });
        });
    </script>
@endsection
