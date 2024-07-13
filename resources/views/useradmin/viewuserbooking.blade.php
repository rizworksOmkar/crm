@extends('layouts.user-dashboard-layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="dashboard_common_table">
        <div class="profile_update_form prt_edt_box">
            <h3>Booking ID : {{ $bookingID }}
                <a href="{{ url('/user/getDetailsforedit/' . $bookingID) }}" class="btn btn-icon btn-sm btn-dark btn-right"
                    data-toggle="tooltip" title="View Details"><i class="far fa-edit"></i></a>
            </h3>
            <form id="booking_form">

                <div class="row">
                    <input type="hidden" class="form-control" id="hdncategory" name="hdncategory" value="{{ $category }}">
                    <div class="col-lg-4">
                        <div class="form-group usr_ipt_grp">
                            <label for="f-name">First name</label>
                            <input type="text" class="form-control disabled" id="f-name" id="f-name"
                                placeholder="Your Name" value="{{ Auth::User()->first_name }}">
                            {{-- <p class="form-control disabled usr_ipt" id="f-name">{{ Auth::User()->first_name }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group usr_ipt_grp">
                            <label for="m-name">Middle name</label>
                            <input type="text" class="form-control disabled" id="m-name" name="m-name"
                                value="{{ Auth::User()->middle_name }}">
                            {{-- <p class="form-control disabled usr_ipt" id="m-name" name="m-name">{{ Auth::User()->middle_name }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group usr_ipt_grp">
                            <label for="l-name">Last name</label>
                            <input type="text" class="form-control disabled" id="l-name" name="l-name"
                                value="{{ Auth::User()->last_name }}">
                            {{-- <p class="form-control disabled usr_ipt" id="l-name" name="l-name">{{ Auth::User()->last_name }}</p>     --}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group usr_ipt_grp">
                            <label for="mail-address">Starting From</label>
                            <input type="text" class="form-control disabled" id="city-name" name="city-name"
                                value="{{ getCityNamewithoutcomma($details->city_id) }}">
                            {{-- <p class="form-control disabled usr_ipt" id="city-name" name="city-name">{{ getCityNamewithoutcomma($details->city_id) }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group usr_ipt_grp">
                            <label for="journeyDate">Journey Date</label>
                            <input type="text" class="form-control disabled" id="journeyDate" name="journeyDate"
                                value="{{ date('d-m-Y', strtotime($details->journey_date)) }}">
                            {{-- <p class="form-control disabled usr_ipt" id="journeyDate" name="journeyDate">{{ date('d-m-Y', strtotime($details->journey_date)) }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group usr_ipt_grp">
                            <label for="pacakageName">Package Name</label>

                            <input type="text" class="form-control disabled" id="pacakageName" name="pacakageName"
                                value="{{ getpackageName($details->pacakge_id) }}">
                            {{-- <p class="form-control disabled usr_ipt" id="pacakageName" name="pacakageName">{{ getpackageName($details->pacakge_id) }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group usr_ipt_grp flx_sp_bwn">
                            <label for="pacakagePrice" class="width_100">Price Of Package In (Rs.) Per Person</label>
                            <input type="text" class="form-control disabled" id="pacakagePrice" name="pacakagePrice"
                                value="{{ $details->pacakge_cost }}">
                            {{-- <p class="form-control disabled usr_ipt" id="pacakagePrice" name="pacakagePrice">{{ $details->pacakge_cost }}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group usr_ipt_grp">
                            <label for="bookAddress">Address</label>
                            <textarea class="form-control disabled" id="bookAddress" name="bookAddress">{!! $details->user_address !!} </textarea>
                            {{-- <p class="form-control disabled usr_ipt" id="bookAddress" name="bookAddress">
                            {!! $details->user_address !!}</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group usr_ipt_grp">
                            <label for="bookState">State</label>
                            <input type="text" class="form-control disabled" id="bookState" name="bookState"
                                value="{{ $details->user_state }}" />
                        </div>
                    </div>
                    <div class="col-lg-3 usr_ipt_grp">
                        <div class="form-group">
                            <label for="bookCity">City</label>
                            <input type="text" class="form-control disabled" id="bookCity" name="bookCity"
                                value="{{ $details->user_city }}" />
                        </div>
                    </div>
                    <div class="col-lg-3 usr_ipt_grp">
                        <div class="form-group">
                            <label for="bookCountry">Country</label>
                            <input type="text" class="form-control disabled" id="bookCountry" name="bookCountry"
                                value="{{ $details->user_country }}" />
                        </div>
                    </div>
                    <div class="col-lg-3 usr_ipt_grp">
                        <div class="form-group">
                            <label for="bookPincode">PinCode</label>
                            <input type="text" class="form-control disabled" id="bookPincode" name="bookPincode"
                                value="{{ $details->user_pincode }}" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Adult <small>(Above 18 Years)</small>
                <a href="{{ url('/user/getRiderDetailsforedit/' . $bookingID . '/' . Auth::User()->id) }}"
                    class="btn btn-icon btn-sm btn-dark btn-right" data-toggle="tooltip" title="View Details"><i
                        class="far fa-edit"></i></a>
            </h3>
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofadult">Input Number Of Adult </label>
                            <input type="text" class="form-control disabled" id="noofadult" name="noofadult"
                                value="{{ $details->no_of_adult }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Adult With Details</label>
                            <table class="table table-striped table-hover" id="tblAdultDetails" style="width: 100%">
                                <colgroup>

                                    <col style="width:70%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adultdetails as $adultitem)
                                        <tr>
                                            <td>{{ $adultitem->full_name }}</td>
                                            <td>{{ $adultitem->age }}</td>
                                            <td>
                                                @if ($adultitem->sex == 1)
                                                    Male
                                                @elseif ($adultitem->sex == 2)
                                                    FeMale
                                                @else
                                                    Others
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Children <small>(Within 18 Years)</small>
                <a href="{{ url('/user/getRiderDetailsforedit/' . $bookingID . '/' . Auth::User()->id) }}"
                    class="btn btn-icon btn-sm btn-dark btn-right" data-toggle="tooltip" title="View Details"><i
                        class="far fa-edit"></i></a>
            </h3>
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofchild">Input Number Of Children </label>
                            <input type="text" class="form-control disabled" id="noofchild" name="noofchild"
                                value="{{ $details->no_of_child }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Children With Details</label>
                            <table class="table table-striped table-hover" id="tblChildDetails" style="width: 100%">
                                <colgroup>
                                    <col style="width:70%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />

                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($childdetails as $childitem)
                                        <tr>
                                            <td>{{ $childitem->full_name }}</td>
                                            <td>{{ $childitem->age }}</td>
                                            <td>
                                                @if ($childitem->sex == 1)
                                                    Male
                                                @elseif ($childitem->sex == 2)
                                                    FeMale
                                                @else
                                                    Others
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Infant <small>(0-2 years)</small>
                <a href="{{ url('/user/getRiderDetailsforedit/' . $bookingID . '/' . Auth::User()->id) }}"
                    class="btn btn-icon btn-sm btn-dark btn-right" data-toggle="tooltip" title="View Details"><i
                        class="far fa-edit"></i></a>
            </h3>
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofinfant">Input Number Of Infant </label>
                            <input type="text" class="form-control disabled" id="noofinfant" name="noofinfant"
                                value="{{ $details->no_of_infant }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Infant With Details</label>
                            <table class="table table-striped table-hover" id="tblInfantDetails" style="width: 100%">
                                <colgroup>
                                    <col style="width:70%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infantdetails as $infantitem)
                                        <tr>
                                            <td>{{ $infantitem->full_name }}</td>
                                            <td>{{ $infantitem->age }}</td>
                                            <td>
                                                @if ($infantitem->sex == 1)
                                                    Male
                                                @else
                                                    FeMale
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="others-options usr_bking_price prt_edt_box">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div class="flx_sp_bwn bd-highlight">
                    <h3>
                        Total :-
                    </h3>
                    <h3 id="totalPrice">
                    </h3>
                </div>
                <div class="flx_sp_bwn  bd-highlight">
                    <h3 class="discount">
                        Discount :-
                        {{-- Discount <span class="psnt">({{$details->child_discount}}%)</span> :- --}}
                        <input type="hidden" name="hdnChildDiscount" id="hdnChildDiscount" value="{{$details->child_discount}}">
                        <p class="dscnt_word" id="dscntNtc">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            @if ($details->child_discount)
                            You get this {{$details->child_discount}}% discount for booking a child or infant into this package
                                
                            @else
                            You get this 0 % discount for booking a child or infant into this package
                            @endif
                        </p>
                    </h3>
                    <h3 id="discount" class="discount">-
                    </h3>
                </div>
                <div class="flx_sp_bwn  bd-highlight">
                    <h3 class="GST">
                        GST :-
                        <p class="dscnt_word" id="dscnGST">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                           
                            Your GST  5% add into this package
                            
                        </p>
                       
                    </h3>
                    <h3 id="costgst" class="gst">
                    </h3>
                </div>
                @if ($category == 1)
                
                <div class="flx_sp_bwn bdr_b bd-highlight">
                    <h3 class="tcs">
                        TCS :-
                        <p class="dscnt_word" id="7lakhbelow">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                           
                            Your Package cost is below or equal 7 Lakh, So TCS  5% add into this package 
                            
                        </p>
                        <p class="dscnt_word" id="7lakhAbove">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                           
                            Your Package cost is above 7 Lakh, So TCS  20% add into this package 
                            
                        </p>
                       
                    </h3>
                    <h3 id="costtcs" class="tcs">
                    </h3>
                </div>
                @else
                    
                @endif
                <div class="flx_sp_bwn bdr_b bd-highlight d-none">
                    <h3 class="discount">
                        Total GST :-
                        <table class="gst_count" style="width:100%">
                            <tr>
                              <th>CGST</th>
                              <th>SGST</th>
                              <th>IGST</th>
                            </tr>
                            <tr>
                              <td>120.20</td>
                              <td>230.30</td>
                              <td>0</td>
                            </tr>
                          </table>
                        {{-- <p class="dscnt_word" id="dscntNtc">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            You get this discount for booking a child or infant package
                        </p> --}}
                    </h3>
                    <h3 id="discount" class="discount">+ 350.50
                    </h3>
                </div>
                <div class="flx_sp_bwn bdr_b_stn bd-highlight">
                    <h3 class="grandPrice">
                        Grand Total :-
                        <p class="price_word" id="grandinAWord"></p>
                    </h3>
                    <h3 id="grandPrice" class="grandPrice" data-action="convert-to-words" data-target="price-someId">
                    </h3>
                </div>
                {{-- <div class="p-2 bd-highlight">
                    <h3 id="totalPrice">
                    </h3>
                    <h3 id="discount" class="discount">-
                    </h3>
                    <h3 id="grandPrice" class="grandPrice" data-action="convert-to-words" data-target="price-someId">
                    </h3>
                </div> --}}
                {{-- <div class="p-2 bd-highlight d-none">
                    <div class="option-item">
                        <a href="{{ url('/user/dashboard') }}" class="btn btn-dark" id="savenext">Go To Dashboard</a>
                    </div>
                </div> --}}
                {{-- <p class="price_word" id="grandinAWord"></p> --}}
            </div>
        </div>
        <div class="p-2 bd-highlight mt-5 text-center">
            <div class="option-item">
                {{-- <a href="{{ url('/user/dashboard') }}" class="btn btn-dark" id="savenext">Proceed to pay</a> --}}
                {{-- <a href="{{ route('phonepe.payment') }}" class="btn btn-dark" id="savenext">Proceed to pay</a> --}}
                <a href="{{ route('payPG', ['bookingID' => $bookingID]) }}" class="btn btn-dark" id="savenext">Proceed to pay</a>
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
        function convertNumberToWords(num) {
            var ones = ["", "One ", "Two ", "Three ", "Four ", "Five ", "Six ", "Seven ", "Eight ", "Nine ", "Ten ",
                "Eleven ", "Twelve ", "Thirteen ", "Fourteen ", "Fifteen ", "Sixteen ", "Seventeen ", "Eighteen ",
                "Nineteen "
            ];
            var tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
            if ((num = num.toString()).length > 9) return "Overflow: Maximum 9 digits supported";
            n = ("000000000" + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = "";
            str += n[1] != 0 ? (ones[Number(n[1])] || tens[n[1][0]] + " " + ones[n[1][1]]) + "Crore " : "";
            str += n[2] != 0 ? (ones[Number(n[2])] || tens[n[2][0]] + " " + ones[n[2][1]]) + "Lakh " : "";
            str += n[3] != 0 ? (ones[Number(n[3])] || tens[n[3][0]] + " " + ones[n[3][1]]) + "Thousand " : "";
            str += n[4] != 0 ? (ones[Number(n[4])] || tens[n[4][0]] + " " + ones[n[4][1]]) + "Hundred " : "";
            str += n[5] != 0 ? (str != "" ? "and " : "") + (ones[Number(n[5])] || tens[n[5][0]] + " " + ones[n[5][1]]) : "";
            return str;
        }
        $(document).ready(function() {
            $('#7lakhbelow').hide();
            $('#7lakhAbove').hide();
            $('.numberonly').keypress(function(e) {

                var charCode = (e.which) ? e.which : event.keyCode

                if (String.fromCharCode(charCode).match(/[^0-9]/g))

                    return false;

            });

            var grandTotal = 0;
            var persontegeCalculate = 0;
            var inAWord = "";
            var tcsCost = 0;
            var gstCost = 0;
            var afterDiscount=0;
            $category = $('#hdncategory').val();
            $pacakgeCost = $('#pacakagePrice').val();
            $noOfadult = $('#noofadult').val();
            $noofchild = $('#noofchild').val();
            $noofinfant = $('#noofinfant').val();
            $childParcentage = $('#hdnChildDiscount').val();
            var totalPricecalculate = parseInt($pacakgeCost) * ((parseInt($noOfadult)) + (parseInt($noofchild)) + (
                parseInt(
                    $noofinfant)));


                    // New entry

                    if($category == 1){
                        gstCost = (parseInt(totalPricecalculate) * 5 / 100) ;
                        if(totalPricecalculate > 700000){
                            tcsCost = (parseInt(totalPricecalculate) * 20 / 100);
                            $('#7lakhbelow').hide();
                            $('#7lakhAbove').show();
                        }else if(totalPricecalculate < 700000){
                            tcsCost = (parseInt(totalPricecalculate) * 5 / 100) ;
                            $('#7lakhbelow').show();
                            $('#7lakhAbove').hide();
                        }else{
                            tcsCost = (parseInt(totalPricecalculate) * 5 / 100);
                            $('#7lakhbelow').show();
                            $('#7lakhAbove').hide();
                        }
                    }else{
                        gstCost = (parseInt(totalPricecalculate) * 5 / 100);
                    }
                  

            if ($noOfadult > 0 && $noofchild == 0 && $noofinfant == 0) {
                grandTotal = parseInt(totalPricecalculate) + parseInt(tcsCost) + parseInt(gstCost);
            } else if ($noOfadult > 0 && $noofchild > 0 && $noofinfant == 0) {
                persontegeCalculate = parseInt(totalPricecalculate) * $childParcentage / 100;

                afterDiscount =  parseInt(parseInt(totalPricecalculate) - parseInt(persontegeCalculate))

                grandTotal = parseInt(parseInt(afterDiscount) + parseInt(tcsCost) + parseInt(gstCost));

            } else if ($noOfadult > 0 && $noofchild == 0 && $noofinfant > 0) {
                persontegeCalculate = parseInt(totalPricecalculate) * $childParcentage / 100;

                afterDiscount =  parseInt(parseInt(totalPricecalculate) - parseInt(persontegeCalculate));

                grandTotal = parseInt(parseInt(afterDiscount) + parseInt(tcsCost) + parseInt(gstCost));

            } else if ($noOfadult > 0 && $noofchild > 0 && $noofinfant > 0) {
                persontegeCalculate = parseInt(totalPricecalculate) * $childParcentage / 100;

                afterDiscount = parseInt(parseInt(totalPricecalculate) - parseInt(persontegeCalculate));

                grandTotal = parseInt(parseInt(afterDiscount) + parseInt(tcsCost) + parseInt(gstCost));
                
            } else {
                // alert
            }
            $('#costgst').append( gstCost + '/-');
            $('#costtcs').append( tcsCost + '/-');
            $('#totalPrice').append('<i class="fas fa-rupee-sign fa-xs"></i> ' + totalPricecalculate + '/-');
            $('#grandPrice').append('<i class="fas fa-rupee-sign fa-xs"></i> ' + grandTotal + '/-');
            $('#discount').append('<i class="fas fa-rupee-sign fa-xs"></i> ' + persontegeCalculate + '/-');
            inAWord = grandTotal;


            if ($noofchild > 0 || $noofinfant > 0) {
                document.getElementById("dscntNtc").style.display = "block";
            } else {
                document.getElementById("dscntNtc").style.display = "none";
            }


            // grand words total document.getElementById("mySidenav").style.display = "block";

            // var amt = $this.val() $('#grandPrice').text();
            var words = convertNumberToWords(inAWord);
            // alert(words);
            if (words == '') {

                $('#grandinAWord').text('Rupees zero only');
            } else {
                $('#grandinAWord').text('Rupees ' + words + ' only');
            }
        });
        if (jQuery().select2) {
            $(".select2").select2();
        }
        // $("#savenext").click(function(event) {
        //     event.preventDefault();
        //     var myform = document.getElementById("booking_form");
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "{{ route('User-bookingsave') }}",
        //         type: "POST",
        //         data: new FormData(myform),
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             if (response.message == 'success') {
        //                 window.location = '/user/JourneyPersonDetails/' + response.bookingID;

        //             } else {
        //             }

        //         },
        //     });
        // });
    </script>
    {{-- <script>
        $('body').on('keyup change blur input', '[data-action=convert-to-words]', function() {
            var $this = $(this);
            var target = $this.data('target');
            var amt = $('#grandPrice').html();
            alert(amt);
            // var amt = $this.val();
            var words = convertNumberToWords(amt);
            $('[data-attrib="' + target + '"]').text(words);
        });
    </script> --}}
@endsection
