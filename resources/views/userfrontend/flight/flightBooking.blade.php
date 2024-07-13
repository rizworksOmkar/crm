@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/slick-carousel/slick/slick.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
@endsection
@section('content')
    <style>
        .seat-card-container {
            position: relative;
        }

        .seat-card {
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px;
            margin: 20px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .flight-outline {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 200px;
            border: 2px solid #333;
            border-radius: 10px;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach ($segments as $segmentArray)
        @foreach ($segmentArray as $segment)
            {{-- is llc --}}
            <input type="hidden" value="{{ $apiResponse['Response']['Results']['IsLCC'] }}">

            <div class="segment" style="display: none">
                <p>result index : {{ $apiResponse['Response']['Results']['ResultIndex'] }}</p>
                <p>Baggage: {{ $segment['Baggage'] }}</p>
                <p>Cabin Baggage: {{ $segment['CabinBaggage'] }}</p>
                <p>Cabin Class: {{ $segment['CabinClass'] }}</p>
                <p>Fare: {{ $apiResponse['Response']['Results']['Fare']['Currency'] }}</p>
                <p>Base Fare: {{ $apiResponse['Response']['Results']['Fare']['BaseFare'] }}</p>


                <p>

                <div class="airline-info">
                    <p>Airline Code: {{ $segment['Airline']['AirlineCode'] }}</p>
                    <p>Airline Name: {{ $segment['Airline']['AirlineName'] }}</p>
                    <p>Flight Number: {{ $segment['Airline']['FlightNumber'] }}</p>
                    <p>Fare Class: {{ $segment['Airline']['FareClass'] }}</p>
                    <!-- Add more fields from the nested "Airline" array as needed -->
                </div>

                <div class="origin-destination">
                    <p>Origin Airport: {{ $segment['Origin']['Airport']['AirportName'] }}</p>
                    <p>Origin City: {{ $segment['Origin']['Airport']['CityName'] }}</p>
                    <p>Departure Time: {{ $segment['Origin']['DepTime'] }}</p>
                    <p>Destination Airport: {{ $segment['Destination']['Airport']['AirportName'] }}</p>
                    <p>Destination City: </p>
                    <!-- Add more fields from the nested "Origin" and "Destination" arrays as needed -->
                </div>

                <p>Duration: {{ $segment['Duration'] }} minutes</p>
                <p>Ground Time: {{ $segment['GroundTime'] }} minutes</p>
                <p>StopOver: {{ $segment['StopOver'] ? 'Yes' : 'No' }}</p>
                <p>Flight Status: {{ $segment['FlightStatus'] }}</p>
                <!-- Add more fields from the top-level of the segment as needed -->
            </div>
        @endforeach
    @endforeach

    <section id="common_banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Flight Booking</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            {{-- <li><span><i class="fas fa-circle"></i></span> Hotel</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="flightBooking">
        <div class="container">
            <div class="bking_head">
                <h4 class="booking-title">Complete your booking</h4>
            </div>


            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="flight_booking">
                        <div class="flight_booking_content">
                            <div class="bking_box_1">
                                <div class="bking_dtls_cntr">
                                    <h5 class="flght_cntry_name">{{ $segment['Origin']['Airport']['CityName'] }} →
                                        {{ $segment['Destination']['Airport']['CityName'] }}</h5>

                                    <p class="flght_jrny_date">
                                        <span class="bk_dt">
                                            {{ \Carbon\Carbon::parse($segment['Origin']['DepTime'])->format('l, M d') }}
                                        </span>

                                        @php
                                            function formatDuration($minutes)
                                            {
                                                $hours = floor($minutes / 60);
                                                $remainingMinutes = $minutes % 60;

                                                $formattedDuration = '';

                                                if ($hours > 0) {
                                                    $formattedDuration .= $hours . ' h ';
                                                }

                                                if ($remainingMinutes > 0) {
                                                    $formattedDuration .= $remainingMinutes . ' min';
                                                }

                                                return $formattedDuration;
                                            }
                                        @endphp
                                        <span>{{ $segment['StopOver'] ? 'Yes' : 'Non Stop' }}
                                            · {{ formatDuration($segment['Duration']) }}</span>
                                    </p>
                                </div>
                                <div class="fare_side">
                                    <span class="free_fare">CANCELLATION FEES APPLY</span>
                                </div>
                            </div>
                            <div class="bking_box_2">
                                <div class="bk_jet">
                                    <div class="jet-dtls">
                                        <img src="https://content.airhex.com/content/logos/airlines_{{ $segment['Airline']['AirlineCode'] }}_200_200_s.png"
                                            alt="">
                                        <p>
                                            <span class="jet_name">{{ $segment['Airline']['AirlineName'] }}</span>
                                            <span> {{ $segment['Airline']['AirlineCode'] }}
                                                {{ $segment['Airline']['FlightNumber'] }} </span>
                                        </p>
                                    </div>
                                    <div class="bking_ecnm">

                                        <span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="booking_itnry row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="booking_itnry_left">
                                            <div class="bk_itnr_to">
                                                <h6>{{ \Carbon\Carbon::parse($segment['Origin']['DepTime'])->format('H:i') }}
                                                </h6>
                                                <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                <h6>{{ $segment['Origin']['Airport']['CityName'] }} </h6>
                                                <span> {{ $segment['Origin']['Airport']['AirportName'] }}</span>
                                            </div>
                                            <div class="bk_itnr_md">
                                                <span class="bk_flght_hrjbar"></span>
                                                <span> {{ formatDuration($segment['Duration']) }}</span>
                                            </div>
                                            <div class="bk_itnr_to">
                                                <h6>{{ \Carbon\Carbon::parse($segment['Destination']['ArrTime'])->format('H:i') }}
                                                </h6>
                                                <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                <h6>{{ $segment['Destination']['Airport']['CityName'] }} </h6>
                                                <span> {{ $segment['Destination']['Airport']['AirportName'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="booking_itnry_right">
                                            <div class="bk_itnr_rght">
                                                <p>Baggage</p>
                                                
                                            </div>
                                            <div class="bk_itnr_rght">
                                                <p>Check-in</p>
                                                <span>{{ $segment['Baggage'] }} (1 piece only)</span>
                                            </div>
                                            <div class="bk_itnr_rght">
                                                <p>Cabin</p>
                                                <span>{{ $segment['CabinBaggage'] }} (1 piece only)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flght_gageContent">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <p>Got excess baggage? Don’t stress, buy extra check-in baggage allowance for
                                            {{ $segment['Origin']['Airport']['AirportName'] }}-{{ $segment['Destination']['Airport']['AirportName'] }} at fab rates!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flight_booking_content cancl_box" style="display: none">
                            <div class="cncl_rfnd_policy">
                                <div class="flght_booking_name">
                                    <div class="bking_dtls_cntr">
                                        <h5 class="flght_cntry_name">Cancellation Refund Policy</h5>
                                    </div>
                                    <div class="fare_side">
                                        <a href="javascript:void(0)" class="vw_plcy" data-bs-toggle="modal"
                                            data-bs-target="#CancellationModal">View Policy</a>
                                    </div>
                                </div>
                                <div class="bk_plc">
                                    <div class="jet-dtls">
                                        <img src="assets/user/img/flight/flight1.png" alt="">
                                        <p>
                                            <span class="plcy_jet_name">{{ $segment['Origin']['Airport']['AirportName'] }}-{{ $segment['Destination']['Airport']['AirportName'] }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="cncl_penal">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                            <div class="cncl_key">
                                                <p>Cancellation Penalty :</p>
                                                <p>Cancel Between (IST) :</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                                            <div class="cncl_bar">
                                                <div class="cncl_bar_prc">
                                                    <p>₹ 3,900</p>
                                                    <p>₹ 5,873</p>
                                                </div>
                                                <p class="mdl_cncl_bar"></p>
                                                <div class="cncl_bar_date">
                                                    <p>Now</p>
                                                    <div class="cncl_dt">
                                                        <p>31 Aug</p>
                                                        <span>12:35</span>
                                                    </div>
                                                    <div class="cncl_dt">
                                                        <p>31 Aug</p>
                                                        <span>14:35</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flght_gageContent">
                                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                            <p>Got excess baggage? Don't stress, buy extra check-in baggage allowance for
                                                {{ $segment['Origin']['Airport']['AirportName'] }}-{{ $segment['Destination']['Airport']['AirportName'] }} at fab rates!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cancl_box flight_booking_content" style="display: none">
                            <div class="usr_pln">
                                <div class="flght_booking_name">
                                    <div class="bking_dtls_cntr">
                                        <h5 class="flght_cntry_name">Unsure of your travel plans?</h5>
                                    </div>
                                </div>
                                <div class="usr_pln_box">
                                    <div class="flght_booking_name">
                                        <div class="d-flex">
                                            <input type="checkbox">
                                            <h5 class="cncl_rfnd">Cancellation Refund Policy</h5>
                                        </div>
                                    </div>
                                    <div class="flght_booking_name">
                                        <div class="pln_view">
                                            <p class="plan_text"><b>Save up to ₹ 3,250</b> on date change charges up to 3
                                                hours before departure. You just pay the fare difference.
                                            </p>
                                            <a href="" class="vw_TC">View T&C</a>
                                        </div>
                                        <span class="plan_cost">₹ 207</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flight_booking">
                        <div class="cancl_box flight_booking_content">
                            <div class="usr_pln">
                                <div class="flght_booking_name">
                                    <div class="bking_dtls_cntr">
                                        <h5 class="flght_cntry_name">Important Information</h5>
                                    </div>
                                </div>
                                <div class="inptn_ifrm">
                                    <div class="chck_trvl">
                                        <span class="chck_icn"><img src="assets/user/img/flight/flight5.png"
                                                alt=""></span>
                                        <p>Check travel guidelines and baggage information below:</p>
                                    </div>
                                    <ul class="infm_list">
                                        <li>Carry no more than 1 check-in baggage and 1 hand baggage per passenger. If
                                            violated, airline may levy extra charges.</li>
                                        <li>Wearing a mask/face cover is no longer mandatory. However, all travellers
                                            are advised to do so as a precautionary measure.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flight_booking" style="display: none">
                        <div class="flght_booking_hed">
                            <div class="bking_dtls_cntr trip_trvl">
                                <span class="flt_logo_icn"><img src="assets/user/img/flight/flight6.png"
                                        alt=""></span>
                                <h5 class="flght_cntry_name">Trip Secure</h5>
                            </div>
                        </div>
                        <div class="cancl_box flight_booking_content">
                            <div class="flght_booking_hed px-3">
                                <div class="bking_dtls_cntr trip_trvl">
                                    <h5 class="flght_cntry_name">₹ 249</h5>
                                    <span class="sml_txt"><sub>/Traveller (18% GST included)</sub></span>
                                </div>
                            </div>
                            <div class="trip_scr_slider">
                                <div class="trip-slideshow-container">
                                    <div class="tripmySlides">
                                        <div class="trp_scr_box">
                                            <span><img src="assets/user/img/flight/flight7.png" alt=""></span>
                                            <div class="trp_scr_cost">
                                                <p class="tp_cst"><span>Up to</span> ₹ 3,000 </p>
                                                <span class="trp_ctgr">Missed Flight</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tripmySlides">
                                        <div class="trp_scr_box">
                                            <span><img src="assets/user/img/flight/flight8.png" alt=""></span>
                                            <div class="trp_scr_cost">
                                                <p class="tp_cst"><span>Up to</span> ₹ 3,000 </p>
                                                <span class="trp_ctgr">Missed Flight</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tripmySlides">
                                        <div class="trp_scr_box">
                                            <span><img src="assets/user/img/flight/flight9.png" alt=""></span>
                                            <div class="trp_scr_cost">
                                                <p class="tp_cst"><span>Up to</span> ₹ 3,000 </p>
                                                <span class="trp_ctgr">Missed Flight</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tripmySlides">
                                        <div class="trp_scr_box">
                                            <span><img src="assets/user/img/flight/flight10.png" alt=""></span>
                                            <div class="trp_scr_cost">
                                                <p class="tp_cst"><span>Up to</span> ₹ 3,000 </p>
                                                <span class="trp_ctgr">Missed Flight</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slider_btn">
                                        <a class="trip_prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                                        <a class="trip_next" onclick="plusSlides(1, 0)">&#10095;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trip_scr_chck">
                            <div class="sct_chck">
                                <input type="radio" name="" value="">
                                <p class="scr_txt">Yes, <span> Secure my trip.</span></p>
                            </div>
                            <div class="sct_chck">
                                <input type="radio" name="" value="">
                                <p class="scr_txt">No, <span> I will risk my trip.</span></p>
                            </div>
                            <div class="pln_view">
                                <p class="plan_text">By selecting the product, I confirm the travellers age is between 6
                                    months to 70 years and agree to the
                                </p>
                                <a href="" class="vw_TC">View T&C</a>
                            </div>
                        </div>
                    </div>





                    <div class="flight_booking">
                        <div class="flght_booking_hed">
                            <div class="bking_dtls_cntr trip_trvl">
                                <h5 class="flght_cntry_name">Traveller Details</h5>
                            </div>
                        </div>


                        <input type="hidden" id="adultCount" value="{{ $adultCount }}">
                        <input type="hidden" id="childCount" value="{{ $childCount }}">
                        <input type="hidden" id="infantCount" value="{{ $infantCount }}">


                        <div>
                            <div id="participantInfo">
                                <!-- This div will be dynamically populated with input fields based on the adult and child counts -->
                            </div>

                            <div class="trvl_frm_cont">
                                <div class="trvl_adl">
                                    <p class="bk_dtl_send">Booking details will be sent to</p>
                                </div>
                                <div class="trvl_frm_box">
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Country Code</p>
                                        <select name="countryCode" id="countryCode">
                                            <option value="IN">India(91)</option>
                                        </select>
                                    </div>
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Mobile No</p>
                                        <input type="text" name="mobileNo" id="mobileNo" placeholder="No">
                                    </div>
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Email</p>
                                        <input type="text" name="email" id="email"
                                            placeholder="Enter Your Email Id">
                                    </div>
                                </div>
                            </div>
                            <button onclick="submitForm()">Submit</button>

                        </div>




                        {{-- resultIndex
                            --}}
                        <input type="hidden" id="allFare" value="{{ json_encode($fareBreakdown) }}">
                        <input type="hidden" id="resultIndex"
                            value="{{ $apiResponse['Response']['Results']['ResultIndex'] }}">
                        <input type="hidden" id="currency"
                            value="{{ $apiResponse['Response']['Results']['Fare']['Currency'] }}">
                        <input type="hidden" id="baseFare"
                            value="{{ $apiResponse['Response']['Results']['Fare']['BaseFare'] }}">
                        <input type="hidden" id="tax"
                            value="{{ $apiResponse['Response']['Results']['Fare']['Tax'] }}">
                        <input type="hidden" id="yqTax"
                            value="{{ $apiResponse['Response']['Results']['Fare']['YQTax'] }}">
                        <input type="hidden" id="additionalTxnFeePub"
                            value="{{ $apiResponse['Response']['Results']['Fare']['AdditionalTxnFeePub'] }}">
                        <input type="hidden" id="additionalTxnFeeOfrd"
                            value="{{ $apiResponse['Response']['Results']['Fare']['AdditionalTxnFeeOfrd'] }}">
                        <input type="hidden" id="otherCharges"
                            value="{{ $apiResponse['Response']['Results']['Fare']['OtherCharges'] }}">
                        <input type="hidden" id="discount"
                            value="{{ $apiResponse['Response']['Results']['Fare']['Discount'] }}">
                        <input type="hidden" id="publishedFare"
                            value="{{ $apiResponse['Response']['Results']['Fare']['PublishedFare'] }}">
                        <input type="hidden" id="offeredFare"
                            value="{{ $apiResponse['Response']['Results']['Fare']['OfferedFare'] }}">
                        <input type="hidden" id="tdsOnCommission"
                            value="{{ $apiResponse['Response']['Results']['Fare']['TdsOnCommission'] }}">
                        <input type="hidden" id="tdsOnPLB"
                            value="{{ $apiResponse['Response']['Results']['Fare']['TdsOnPLB'] }}">
                        <input type="hidden" id="tdsOnIncentive"
                            value="{{ $apiResponse['Response']['Results']['Fare']['TdsOnIncentive'] }}">
                        <input type="hidden" id="serviceFee"
                            value="{{ $apiResponse['Response']['Results']['Fare']['ServiceFee'] }}">

                    </div>
                    <div class="flight_booking">
                        <div class="flght_booking_hed">
                            <div class="bking_dtls_cntr trip_trvl">
                                <h5 class="flght_cntry_name" style="padding: 20px">Select Seats</h5>
                            </div>
                        </div>

                        <div class="flght_cnfrm">
                            <a class="flght_cnfrm_btn" id="seatContinueButton"
                                data-resultindex="{{ $apiResponse['Response']['Results']['ResultIndex'] }}">Continue</a>
                        </div>
                    </div>



                    <div id="FlightSeat" class="seat-row">
                        {{-- flight seat --}}

                    </div>
                    <div class="flight_booking">
                        <div class="flght_booking_hed">
                            <div class="bking_dtls_cntr trip_trvl">
                                <h5 class="flght_cntry_name" style="padding: 20px">Book Ticket</h5>
                            </div>
                        </div>
                        <div class="flght_cnfrm">
                            <a class="flght_cnfrm_btn" id="bookingContinue">Continue</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="pageRightContainer customScroll">
                        <section class="fareSummary">
                            <div>
                                <p class="fontSize18 blackFont">Fare Summary</p>
                            </div>

                            @php
                                $totalBaseFare = 0;
                                $totalTax = 0;
                            @endphp

                            @foreach($fareBreakdown as $fareDetails)
                                @php
                                    $passengerType = $fareDetails['PassengerType'];
                                    $baseFare = $fareDetails['BaseFare'] / $fareDetails['PassengerCount'];
                                    $tax = $fareDetails['Tax'] / $fareDetails['PassengerCount'];
                                    $totalBaseFare += $baseFare * $fareDetails['PassengerCount'];
                                    $totalTax += $tax * $fareDetails['PassengerCount'];
                                @endphp

                                <div class="fareTypeWrap">
                                    <div class="fareRow">
                                        <div class="makeFlex hrtlCenter pointer flexOne">
                                            <span class="fareHeader">{{ $passengerType === 1 ? 'Adult' : ($passengerType === 2 ? 'Child' : 'Infant') }}</span>
                                        </div>
                                        <span class="fontSize14 darkText" id="farePricehide{{ $passengerType }}">₹{{ number_format($baseFare * $fareDetails['PassengerCount'], 2) }}</span>
                                    </div>
                                    <div class="fareContentWrap" id="textflightBox{{ $passengerType }}">
                                        <div class="fareSubList">
                                            <p class="fareRow appendTop5">
                                                <span class="fareRow__text fontSize14 darkText">
                                                    <span>{{ $fareDetails['PassengerCount'] }} {{ $passengerType === 1 ? 'Adult(s)' : ($passengerType === 2 ? 'Child(s)' : 'Infant(s)') }}</span>
                                                </span>
                                                <span class="fontSize14 darkText">
                                                    <span>₹{{ number_format($baseFare, 2) }}</span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="fareTypeWrap">
                                    <div class="fareRow">
                                        <div class="makeFlex hrtlCenter pointer flexOne">
                                            <span class="fareHeader">Taxes and Surcharges</span>
                                        </div>
                                        <span class="fontSize14 darkText" id="farePricehide{{ $passengerType }}">₹{{ number_format($tax * $fareDetails['PassengerCount'], 2) }}</span>
                                    </div>
                                    <div class="fareContentWrap" id="textflightBox{{ $passengerType }}">
                                        <div class="fareSubList">
                                            <p class="fareRow appendTop5">
                                                <span class="fareRow__text fontSize14 darkText">
                                                    <span>{{ $fareDetails['PassengerCount'] }} {{ $passengerType === 1 ? 'Adult(s)' : ($passengerType === 2 ? 'Child(s)' : 'Infant(s)') }}</span>
                                                </span>
                                                <span class="fontSize14 darkText">
                                                    <span>₹{{ number_format($tax, 2) }}</span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="fareFooter">
                                <p class="fareRow"><span class="fontSize16 blackFont">Total Amount</span><span class="fontSize16 blackFont">₹{{ number_format($totalBaseFare + $totalTax, 2) }}</span></p>
                            </div>
                        </section>
                    </div>
                </div>







            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal" id="CancellationModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fare rules</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="cancellTab">
                        <div class="cancellCharg">
                            <a href="javascript:void(0)" id="cancallCharge">Cancellation Charges</a>
                        </div>
                        <div class="cancellCharg">
                            <a href="javascript:void(0)" id="changeCharge">Date change charges</a>
                        </div>
                    </div>
                    <div class="cancellContent" id="cancallChargeBox">
                        <div class="cancl-head">
                            <img src="https://content.airhex.com/content/logos/airlines_SG_200_200_s.png" alt="">
                            <p>DEL-BLR</p>
                        </div>
                        <div class="cancll_contn_box">
                            <div class="cancll_details">
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <p class="cncl_body_head">Time frame</p>
                                        <span>(From Scheduled flight departure)</span>
                                    </div>
                                    <div class="cncl_body">
                                        <p class="cncl_body_head">Airline Fee + MMT Fee</p>
                                        <span>((Per passenger))</span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>0 hours to 2 hours*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT :<p class="cncl_body_head">Non Refundable</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>2 hours to 4 days*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT : <p class="cncl_body_head">₹ 3,600 + ₹ 300</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>4 days to 365 days*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT : <p class="cncl_body_head">₹ 3,100 + ₹ 300</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="cncl_body">
                                <span>*From the Date of Departure</span>
                            </div>
                        </div>
                    </div>
                    <div class="cancellContent" id="changeChargeBox">
                        <div class="cancl-head">
                            <img src="https://content.airhex.com/content/logos/airlines_SG_200_200_s.png" alt="">
                            <p>changeChargeBox</p>
                        </div>
                        <div class="cancll_contn_box">
                            <div class="cancll_details">
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <p class="cncl_body_head">Time frame</p>
                                        <span>(From Scheduled flight departure)</span>
                                    </div>
                                    <div class="cncl_body">
                                        <p class="cncl_body_head">Airline Fee + MMT Fee + Fare difference</p>
                                        <span>((Per passenger))</span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>0 hours to 2 hours*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT :<p class="cncl_body_head">Non Refundable</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>2 hours to 4 days*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT : <p class="cncl_body_head">₹ 3,600 + ₹ 300</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="cancll_body_row">
                                    <div class="cncl_body">
                                        <span>4 days to 365 days*</span>
                                    </div>
                                    <div class="cncl_body">
                                        <span>ADULT : <p class="cncl_body_head">₹ 3,100 + ₹ 300</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="cncl_body">
                                <span>*From the Date of Departure</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                {{-- <div class="modal-footer"> --}}
                <div class="cncl_footer_body">
                    <p class="cncl_body_head">*Important:</p>
                    <span>
                        The airline fee is indicative. MakeMyTrip does not
                        guarantee the accuracy of this information. All fees mentioned are per passenger.
                    </span>
                </div>
                {{-- </div> --}}

            </div>
        </div>
    </div>
    {{-- modal end  --}}

    <!-- Your HTML code here -->
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }
    </script>
    <script>
        $(document).on('click',  '#seatContinueButton', function() {
            var resultIndex = $(this).data('resultindex');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Send an Ajax request here using the resultIndex
            $.ajax({
                url: '/flight-ssr',
                method: 'POST', // Use POST or GET as needed
                data: {
                    "_token": csrfToken,
                    resultIndex: resultIndex
                },
                success: function(response) {
                    console.log('Received data:', response);

                    // Create a container for the seat card and flight outline
                    const seatCardContainer = $('<div class="seat-card-container"></div>');

                    // Create the flight outline
                    const flightOutline = $('<div class="flight-outline"></div>');

                    // Append the flight outline to the container
                    seatCardContainer.append(flightOutline);

                    // Iterate through the response data and create the seat card
                    $.each(response.Response.SeatDynamic, function(i, segmentSeat) {
                        const segments = segmentSeat.SegmentSeat;
                        const seatCard = $('<div class="seat-card"></div>');

                        // Iterate through seatInfo and create seat elements
                        $.each(segments, function(j, segment) {
                            const seatInfo = segment.RowSeats;

                            // Iterate through seatInfo and create seat elements
                            $.each(seatInfo, function(k, row) {
                                const seatRow = $(
                                    '<div class="seat-row"></div>'
                                ); // Create a seat row

                                // Iterate through row.Seats and create seat elements
                                $.each(row.Seats, function(l, seat) {
                                    const seatElement = $(
                                        '<input type="checkbox" class="seat-checkbox">'
                                    ); // Create a seat checkbox
                                    seatElement.attr('id', 'seat-' +
                                        seat.Code);
                                    seatElement.data('seat-code', seat
                                        .Code);
                                    seatElement.data('seat-description',
                                        seat.Description
                                    ); // Add the "description" data

                                    // If the seat is not available, disable the checkbox and add an "X" mark
                                    if (seat.AvailablityType !==
                                        3
                                    ) { // Example: 3 means available
                                        seatElement.attr('disabled',
                                            true);
                                        seatElement.after($(
                                            '<label for="seat-' +
                                            seat.Code +
                                            '">X</label>'));
                                    }

                                    // Add a click event handler for the seat checkbox
                                    seatElement.on('click', function() {
                                        const seatCode = $(this)
                                            .data('seat-code');
                                        const seatDescription =
                                            $(this).data(
                                                'seat-description'
                                            ); // Get the "description" data
                                        // Handle seat selection logic here
                                        alert('Selected seat: ' +
                                            seatCode +
                                            '\nDescription: ' +
                                            seatDescription);
                                    });

                                    // Append the seat checkbox to the seat row
                                    seatRow.append(seatElement);
                                });

                                // Append the seat row to the seat card
                                seatCard.append(seatRow);
                            });
                        });

                        // Append the seat card to the container
                        seatCardContainer.append(seatCard);
                    });

                    // Append the seat card container to the body or a specific element
                    $('#FlightSeat').empty().append(seatCardContainer);
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the request
                    console.error('Error:', status, error);
                }
            });
        });
    </script>






    {{-- <script>
        var adultCount;
        var childCount;

        // Function to create input fields
        function createInputField(type, index, label) {
            var inputDiv = document.createElement('div');
            inputDiv.innerHTML = `
            <div class="row">
            <div class="form-group col-md-4">
                <label for="${type}FirstName${index}">${label} ${index} First Name:</label>
                <input type="text" id="${type}FirstName${index}" name="${type}FirstName${index}" class="form-control" required>
            </div>

            <div class="form-group col-md-4">
                <label for="${type}LastName${index}">${label} ${index} Last Name:</label>
                <input type="text" id="${type}LastName${index}" name="${type}LastName${index}" class="form-control" required>
            </div>

            <div class="form-group col-md-4">
                <label for="${type}Gender${index}">${label} ${index} Gender:</label>
                <input type="text" id="${type}Gender${index}" name="${type}Gender${index}" class="form-control" required>
            </div>
            </div>
            `;
            return inputDiv;
        }

        // Function to collect information
        function collectInformation() {
            adultCount = parseInt(document.getElementById('adultCount').value);
            childCount = parseInt(document.getElementById('childCount').value);

            // Collect information for adults
            for (var i = 1; i <= adultCount; i++) {
                var adultDiv = createInputField('adult', i, 'Adult');
                document.getElementById('participantInfo').appendChild(adultDiv);
            }

            // Collect information for children
            for (var j = 1; j <= childCount; j++) {
                var childDiv = createInputField('child', j, 'Child');
                document.getElementById('participantInfo').appendChild(childDiv);
            }
        }

        // Function to submit the form and collect information
        function submitForm() {
            var participants = [];

            // Collect information for adults
            for (var i = 1; i <= adultCount; i++) {
                participants.push({
                    type: 'adult',
                    firstName: document.getElementById(`adultFirstName${i}`).value,
                    lastName: document.getElementById(`adultLastName${i}`).value,
                    gender: document.getElementById(`adultGender${i}`).value
                });
            }

            // Collect information for children
            for (var j = 1; j <= childCount; j++) {
                participants.push({
                    type: 'child',
                    firstName: document.getElementById(`childFirstName${j}`).value,
                    lastName: document.getElementById(`childLastName${j}`).value,
                    gender: document.getElementById(`childGender${j}`).value
                });
            }

            // Display collected information
            console.log(participants);
        }

        // Call the collectInformation function when the page loads
        window.onload = collectInformation;
    </script> --}}

    <script>
        var participants = [];

        var adultCount;
        var childCount;
        var infantCount;




        // Function to create input fields
        function createInputField(type, index, label) {
            var inputDiv = document.createElement('div');
            inputDiv.innerHTML = `
            <div class="row">
                <div><label >${label} ${index} </label></div>
                <div class="form-group col-md-3">
                <label for="${type}Title${index}"> Title:</label>
                <select id="${type}Title${index}" name="${type}Title${index}" class="form-control">
                    <option value="Mr">Mr.</option>
                    <option value="Mrs">Mrs.</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="${type}FirstName${index}"> First Name:</label>
                <input type="text" id="${type}FirstName${index}" name="${type}FirstName${index}" class="form-control" required>
            </div>

            <div class="form-group col-md-3">
                <label for="${type}LastName${index}"> Last Name:</label>
                <input type="text" id="${type}LastName${index}" name="${type}LastName${index}" class="form-control" required>
            </div>

            <div class="form-group col-md-3">
                <label for="${type}Gender${index}"> Gender:</label>
                <select id="${type}Gender${index}" name="${type}Gender${index}" class="form-control" required>
                    <option value="1">MALE</option>
                    <option value="2">FEMALE</option>
                </select>
            </div>
            </div>
            `;
            return inputDiv;
        }

        // Function to collect information
        function collectInformation() {
            adultCount = parseInt(document.getElementById('adultCount').value);
            childCount = parseInt(document.getElementById('childCount').value);
            infantCount = parseInt(document.getElementById('infantCount').value);


            // Collect information for adults
            for (var i = 1; i <= adultCount; i++) {
                var adultDiv = createInputField('adult', i, 'Adult');
                document.getElementById('participantInfo').appendChild(adultDiv);
            }

            // Collect information for children
            for (var j = 1; j <= childCount; j++) {
                var childDiv = createInputField('child', j, 'Child');
                document.getElementById('participantInfo').appendChild(childDiv);
            }

            // Collect information for infants
            for (var k = 1; k <= infantCount; k++) {
                var infantDiv = createInputField('infant', k, 'Infant');
                document.getElementById('participantInfo').appendChild(infantDiv);
            }
        }

        // Function to submit the form and collect information
        function submitForm() {
            var otherCharges = $('#otherCharges').val();
            var discount = $('#discount').val();
            var offeredFare = $('#offeredFare').val();
            var tdsOnCommission = $('#tdsOnCommission').val();
            var tdsOnPLB = $('#tdsOnPLB').val();
            var tdsOnIncentive = $('#tdsOnIncentive').val();
            var serviceFee = $('#serviceFee').val();
            var fareBreakdown = $('#allFare').val();
            var countryCode = $('#countryCode').val();
            var mobileNo = $('#mobileNo').val();
            var email = $('#email').val();

            var passengersData = JSON.parse(fareBreakdown);

            var p1 = [];
            var p2 = [];
            var p3 = [];

            for (var i = 0; i < passengersData.length; i++) {
                var passenger = passengersData[i];

                // Divide BaseFare and Tax by PassengerCount
                var baseFarePerPassenger = passenger.BaseFare / passenger.PassengerCount;
                var taxPerPassenger = passenger.Tax / passenger.PassengerCount;
                var publishedFarePerPassenger = baseFarePerPassenger + taxPerPassenger;

                // Create a new passenger object with all specified fields
                var newPassenger = {
                    Currency: passenger.Currency,
                    BaseFare: baseFarePerPassenger,
                    Tax: taxPerPassenger,
                    YQTax: passenger.YQTax,
                    AdditionalTxnFeePub: passenger.AdditionalTxnFeePub,
                    AdditionalTxnFeeOfrd: passenger.AdditionalTxnFeeOfrd,
                    OtherCharges: otherCharges,
                    Discount: discount,
                    PublishedFare: publishedFarePerPassenger,
                    OfferedFare: offeredFare,
                    TdsOnCommission: tdsOnCommission,
                    TdsOnPLB: tdsOnPLB,
                    TdsOnIncentive: tdsOnIncentive,
                    ServiceFee: serviceFee,

                    PassengerType: passenger.PassengerType,



                };

                // Push the new passenger into the corresponding array
                switch (newPassenger.PassengerType) {
                    case 1:
                        p1.push(newPassenger);
                        break;
                    case 2:
                        p2.push(newPassenger);
                        break;
                    case 3:
                        p3.push(newPassenger);
                        break;
                        // Add more cases if there are other passenger types
                }
            }

            // Now p1, p2, p3 contain arrays of passengers with divided BaseFare and Tax values.
            console.log("Passengers with PassengerType 1:", p1);
            console.log("Passengers with PassengerType 2:", p2);
            console.log("Passengers with PassengerType 3:", p3);


            // Collect information for adults
            for (var i = 1; i <= adultCount; i++) {
                participants.push({
                    title: document.getElementById(`adultTitle${i}`).value,
                    firstName: document.getElementById(`adultFirstName${i}`).value,
                    lastName: document.getElementById(`adultLastName${i}`).value,
                    type: 1,
                    gender: document.getElementById(`adultGender${i}`).value,
                    addressLine1: "Address Line 1",
                    addressLine2: "Address Line 2",
                    FareDetails: p1,
                    city: "City",
                    countryCode: countryCode,
                    cellCountryCode: "+91",
                    contactNo: mobileNo,
                    nationality: "IN",
                    email: email,
                    IsLeadPax: i === 1 ? true : false,
                    ffAirlineCode: "",
                    ffNumber: "",
                    gstCompanyAddress: "",
                    gstCompanyContactNumber: "",
                    gstCompanyName: "",
                    gstNumber: "",
                    gstCompanyEmail: ""




                });
            }

            // Collect information for children
            for (var j = 1; j <= childCount; j++) {
                participants.push({
                    title: document.getElementById(`childTitle${j}`).value,
                    firstName: document.getElementById(`childFirstName${j}`).value,
                    lastName: document.getElementById(`childLastName${j}`).value,
                    type: 2,
                    gender: document.getElementById(`childGender${j}`).value,
                    addressLine1: "Address Line 1",
                    addressLine2: "Address Line 2",
                    FareDetails: p2,
                    city: "City",
                    countryCode: countryCode,
                    cellCountryCode: "+91",
                    contactNo: mobileNo,
                    nationality: "IN",
                    email: email,
                    IsLeadPax: false,
                    ffAirlineCode: "",
                    ffNumber: "",
                    gstCompanyAddress: "",
                    gstCompanyContactNumber: "",
                    gstCompanyName: "",
                    gstNumber: "",
                    gstCompanyEmail: ""

                });
            }

            // Collect information for infants
            for (var k = 1; k <= infantCount; k++) {
                participants.push({
                    title: document.getElementById(`infantTitle${k}`).value,
                    firstName: document.getElementById(`infantFirstName${k}`).value,
                    lastName: document.getElementById(`infantLastName${k}`).value,
                    DateOfBirth: "2023-10-06T00:00:00",
                    type: 3,
                    gender: document.getElementById(`infantGender${k}`).value,
                    addressLine1: "Address Line 1",
                    addressLine2: "Address Line 2",
                    FareDetails: p3,
                    city: "City",
                    countryCode: countryCode,
                    cellCountryCode: "+91",
                    contactNo: mobileNo,
                    nationality: "IN",
                    email: email,
                    IsLeadPax: false,
                    ffAirlineCode: "",
                    ffNumber: "",
                    gstCompanyAddress: "",
                    gstCompanyContactNumber: "",
                    gstCompanyName: "",
                    gstNumber: "",
                    gstCompanyEmail: ""
                });
            }


            // Display collected information
            console.log(participants);
            Swal.fire({
                title: 'Passenger Data Submitted!',
                text: 'Passenger data is submitted successfully.',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK',
            }).then((result) => {
                // Handle the result or perform any other actions after the user clicks "OK"
                if (result.isConfirmed) {
                    // The user clicked "OK"
                }
            });
        }

        // Call the collectInformation function when the page loads
        window.onload = collectInformation;

        $(document).on('click', '#bookingContinue', function() {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');







            var resultIndex = $('#resultIndex').val();
            var currency = $('#currency').val();
            var baseFare = $('#baseFare').val();
            var tax = $('#tax').val();
            var yqTax = $('#yqTax').val();
            var additionalTxnFeePub = $('#additionalTxnFeePub').val();
            var additionalTxnFeeOfrd = $('#additionalTxnFeeOfrd').val();
            var otherCharges = $('#otherCharges').val();
            var discount = $('#discount').val();
            var publishedFare = $('#publishedFare').val();
            var offeredFare = $('#offeredFare').val();
            var tdsOnCommission = $('#tdsOnCommission').val();
            var tdsOnPLB = $('#tdsOnPLB').val();
            var tdsOnIncentive = $('#tdsOnIncentive').val();
            var serviceFee = $('#serviceFee').val();

            // Create an array to store selected seat codes and descriptions
            var selectedSeats = [];

            // Iterate through selected seats and add their codes and descriptions to the array
            $('.seat-checkbox:checked').each(function() {
                var seatCode = $(this).data('seat-code');
                var seatDescription = $(this).data('seat-description');
                selectedSeats.push({
                    code: seatCode,
                    description: seatDescription
                });
            });


            // Create a data object to send in the AJAX request
            var requestData = {
                "_token": csrfToken,
                resultIndex: resultIndex,
                // selectedSeats: selectedSeats,
                passengers: participants,
                otherCharges: otherCharges,
                offeredFare: offeredFare

            };

            // Display the data object in the console
            console.log('Request Data:', requestData);



            //console.log('Selected Seats:', selectedSeats);



            // Send an Ajax request here using the requestData
            $.ajax({
                url: '/flight-book-with-ssr', // Replace with your Ajax endpoint URL
                method: 'POST', // Use POST or GET as needed
                data: requestData, // Send the data object
                success: function(response) {
                    console.log('Received data:', response);
                    window.location.href = '/flightticket?apiResponse=' + encodeURIComponent(JSON
                        .stringify(response));


                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the request
                    console.error('Error:', status, error);
                }
            });
        });
    </script>
@endsection
