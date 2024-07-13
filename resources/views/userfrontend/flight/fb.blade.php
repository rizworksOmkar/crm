@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/slick-carousel/slick/slick.css">
@endsection
@section('content')


@foreach ($segments as $segmentArray)
    @foreach ($segmentArray as $segment)
        <div class="segment">
            <p>Baggage: {{ $segment['Baggage'] }}</p>
            <p>Cabin Baggage: {{ $segment['CabinBaggage'] }}</p>
            <p>Cabin Class: {{ $segment['CabinClass'] }}</p>
            <!-- Add more fields from the top-level of the segment as needed -->

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
                <p>Destination City: {{ $segment['Destination']['Airport']['CityName'] }}</p>
                <p>Arrival Time: {{ $segment['Destination']['ArrTime'] }}</p>
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
            {{-- <div id="htlDtls_search">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
        </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Flights Booking</h2>
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

            <p>IsRefundable: <span id="isRefundable"></span></p>
<p>ResultIndex: <span id="resultIndex"></span></p>

            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="flight_booking">
                        <div class="flight_booking_content">
                            <div class="bking_box_1">
                                <div class="bking_dtls_cntr">
                                    <h5 class="flght_cntry_name">Kolkata → Mumbai</h5>
                                    <p class="flght_jrny_date">
                                        <span class="bk_dt">
                                            {{ \Carbon\Carbon::parse($segment['Origin']['DepTime'])->format('l, M d') }}                                        </span>

                                            @php
                                                function formatDuration($minutes) {
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
                                        <img src="assets/user/img/flight/flight1.png" alt="">
                                        <p>
                                            <span class="jet_name">SpiceJet</span>
                                            <span>SG 242</span>
                                        </p>
                                    </div>
                                    <div class="bking_ecnm">
                                        <span>Economy > </span>
                                        <p>SPICESAVER</p>
                                        <span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="booking_itnry row">
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="booking_itnry_left">
                                            <div class="bk_itnr_to">
                                                <h6>23:25</h6>
                                                <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                <h6>Kolkata </h6>
                                                <span> Netaji Subhash Chandra Bose International Airport, Terminal 2</span>
                                            </div>
                                            <div class="bk_itnr_md">
                                                <span class="bk_flght_hrjbar"></span>
                                                <span> 3h 0m</span>
                                            </div>
                                            <div class="bk_itnr_to">
                                                <h6>01:55</h6>
                                                <span><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                <h6>Mumbai </h6>
                                                <span> Chhatrapati Shivaji International Airport, Terminal 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="booking_itnry_right">
                                            <div class="bk_itnr_rght">
                                                <p>Baggage</p>
                                                <span>ADULT</span>
                                            </div>
                                            <div class="bk_itnr_rght">
                                                <p>Check-in</p>
                                                <span>15 Kgs (1 piece only)</span>
                                            </div>
                                            <div class="bk_itnr_rght">
                                                <p>Cabin</p>
                                                <span>7 Kgs (1 piece only)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flght_gageContent">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <p>Got excess baggage? Don’t stress, buy extra check-in baggage allowance for
                                            CCU-BOM at fab rates!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flight_booking_content cancl_box">
                            <div class="cncl_rfnd_policy">
                                <div class="flght_booking_name">
                                    <div class="bking_dtls_cntr">
                                        <h5 class="flght_cntry_name">Cancellation Refund Policy</h5>
                                    </div>
                                    <div class="fare_side">
                                        <a href="" class="vw_plcy">View Policy</a>
                                    </div>
                                </div>
                                <div class="bk_plc">
                                    <div class="jet-dtls">
                                        <img src="assets/user/img/flight/flight1.png" alt="">
                                        <p>
                                            <span class="plcy_jet_name">CCU-BOM</span>
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
                                            <p>Got excess baggage? Don’t stress, buy extra check-in baggage allowance for
                                                CCU-BOM at fab rates!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cancl_box flight_booking_content">
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
                    <div class="flight_booking">
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
                        <div class="flght_booking_hed">
                            <div class="bking_dtls_cntr trip_trvl">
                                <span class="flt_logo_icn"><img src="assets/user/img/flight/flight6.png"
                                        alt=""></span>
                                <h5 class="flght_cntry_name">ADULT <span>(12 yrs+)</span></h5>
                            </div>
                            <div class="sct_chck">
                                <p class="scr_txt">1/1<span> added</span></p>
                            </div>
                        </div>
                        <div class="trvl_frm">
                            <div class="trvl_frm_cont">
                                <div class="trvl_adl">
                                    <input type="checkbox" name="" value="">
                                    <h5 class="bk_fild_title">ADULT 1</h5>
                                </div>
                                <div class="trvl_frm_box">
                                    <div class="trvl_frm_input">
                                        <input type="text" placeholder="First & Middle Name">
                                        <p class="err_notice">First & Middle Name is required.</p>
                                    </div>
                                    <div class="trvl_frm_input">
                                        <input type="text" placeholder="Last Name">
                                        <p class="err_notice">First & Middle Name is required.</p>
                                    </div>
                                    <div class="trvl_frm_input">
                                        <select name="" id="">
                                            <option value="">MALE</option>
                                            <option value="">FEMALE</option>
                                        </select>
                                        <p class="err_notice">Male / Female is required.</p>
                                    </div>

                                </div>
                            </div>
                            <div class="trvl_frm_cont">
                                <div class="trvl_adl">
                                    <p class="bk_dtl_send">Booking details will be sent to</p>
                                </div>
                                <div class="trvl_frm_box">
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Country Code</p>
                                        <select name="" id="">
                                            <option value="India(91)">India(91)</option>
                                            <option value="">Afghanistan(93)</option>
                                            <option value="">Algeria(213)</option>
                                        </select>
                                    </div>
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Mobile No</p>
                                        <input type="text" placeholder="No">
                                    </div>
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Email</p>
                                        <input type="text" placeholder="Enter Your Email Id">
                                    </div>
                                </div>
                            </div>
                            <div class="trvl_frm_cont">
                                <div class="trvl_adl">
                                    <input type="checkbox" name="" value="">
                                    <h5 class="bk_fild_title">I have a GST number (Optional)</h5>
                                </div>
                                <div class="trvl_frm_box">
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Company Name</p>
                                        <input type="text" placeholder="Company Name">
                                    </div>
                                    <div class="trvl_frm_input">
                                        <p class="gst_txt">Registration No</p>
                                        <input type="text" placeholder="Registration No">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flight_booking">
                       <div class="flght_cnfrm">
                        <a href="" class="flght_cnfrm_btn">Continue</a>
                       </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12"></div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }

        let slideIndex = [1, 1];
        let slideId = ["tripmySlides"]
        showSlides(1, 0);
        showSlides(1, 1);

        // function plusSlides(n, no) {
        //     showSlides(slideIndex[no] += n, no);
        // }

        // function showSlides(n, no) {
        //     let i;
        //     let x = document.getElementsByClassName(slideId[no]);
        //     if (n > x.length) {
        //         slideIndex[no] = 1
        //     }
        //     if (n < 1) {
        //         slideIndex[no] = x.length
        //     }
        //     for (i = 0; i < x.length; i++) {
        //         x[i].style.display = "none";
        //     }
        //     x[slideIndex[no] - 1].style.display = "block";
        // }
    </script>

    <!-- Include this script in your "flight-booking" view -->
<script>
    // Function to get query parameter by name
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Retrieve the "IsRefundable" and "ResultIndex" values from the query parameters
    const isRefundable = getQueryParam('isRefundable');
    const resultIndex = getQueryParam('resultIndex');

    // Display the values in your HTML
    document.getElementById('isRefundable').textContent = isRefundable;
    document.getElementById('resultIndex').textContent = resultIndex;
</script>
<script>
  $(document).on('click', '.flght_cnfrm_btn', function() {
    var resultIndex = $(this).data('resultindex');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Send an Ajax request here using the resultIndex
    $.ajax({
        url: '/flight-ssr', // Replace with your Ajax endpoint URL
        method: 'POST', // Use POST or GET as needed
        data: {
            "_token": csrfToken,
            resultIndex: resultIndex
        },
        success: function(response) {
            // Handle the success response here
            console.log('Received data:', response);

            // Clear the existing seat map container
            $('#FlightSeat').empty();

            // Create a seat map container
            const seatMap = $('<div class="seat-map"></div>');

            // Iterate through segments and create seat rows
            $.each(response.Response.SeatDynamic, function(i, segmentSeat) {
                const segments = segmentSeat.SegmentSeat;

                // Create a seat row container for each segment
                const seatRowContainer = $('<div class="seat-row-container"></div>');

                $.each(segments, function(j, segment) {
                    const seatInfo = segment.RowSeats;

                    // Create a seat row for each set of seats
                    const seatRow = $('<div class="seat-row"></div>');

                    // Iterate through seatInfo and create seat elements
                    $.each(seatInfo, function(k, row) {
                        $.each(row.Seats, function(l, seat) {
                            const seatElement = $('<button class="seat-button"></button>'); // Create a seat button
                            seatElement.text(seat.SeatNo);
                            seatElement.data('seat-code', seat.Code);

                            // Add a click event handler for seat selection
                            seatElement.on('click', function() {
                                const seatCode = $(this).data('seat-code');

                                // Check if the seat is available (you can add your logic here)
                                if (seat.AvailablityType === 3) { // Example: 3 means available
                                    // Handle seat selection logic here
                                    alert('Selected seat: ' + seatCode);
                                } else {
                                    alert('Seat ' + seatCode + ' is not available.');
                                }
                            });

                            // Append the seat button to the seat row
                            seatRow.append(seatElement);
                        });
                    });

                    // Append the seat row to the seat row container
                    seatRowContainer.append(seatRow);
                });

                // Append the seat row container to the seat map
                seatMap.append(seatRowContainer);
            });

            // Append the seat map to your desired container
            // (e.g., replace '#FlightSeat' with your container selector)
            $('#FlightSeat').append(seatMap);
        },
        error: function(xhr, status, error) {
            // Handle any errors that occur during the request
            console.error('Error:', status, error);
        }
    });
});


</script>

@endsection
