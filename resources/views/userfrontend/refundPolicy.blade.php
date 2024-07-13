@extends('layouts.front')

@section('content')
    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Refund Policy</h2>
                        <ul>
                            <li><a href="{{ route('user.home') }}">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 pb-4 condition_pagr">
        <div class="container">
            <div class="privacy_policy">
                <h4 class="pvc_plc_header"><strong>Refund Policy</strong></h4>
                {{-- <h5 class="pvc_plc_title">Last updated on 14-03-2024 13:29:39 </h5> --}}
                <p><b>Travel Host Online </b> is only a facilitator and any refund for any service(s) which are not delivered by the
                    service provider /Independent Contractors or for any reason for which the User is entitled for a refund
                    is subject to TRAVEL HOST ONLINE receiving the amount from the said service provider. User acknowledges
                    that TRAVEL HOST ONLINE shall not be held liable for any delay in refund or non-refund of the amount
                    from the respective service provider or Independent Contractors of TRAVEL HOST ONLINE. In such events
                    the User shall directly approach the service provider for any claims.
                </p>
                <p>In case the User makes any changes in their accommodation while on the Outbound Tour, TRAVEL HOST ONLINE
                    shall not refund or pay compensation in any manner whatsoever. The User would also be liable to pay any
                    additional sum that is required to be paid consequent to the aforesaid changes made in the
                    accommodation.
                </p>
                <p>In the event of any delay in the refund beyond the period specified herein, the entire liability of
                    TRAVEL HOST ONLINE shall be refund of the said amount with interest calculated at the applicable bank
                    rate till the date the refund is made.
                </p>
                <p>
                    Incase of any changes Or cancellation in Tour Packages, The refund will be processed as per the refund
                    policy given at the time of Quotation. Also if any additional cost required to make the requested
                    changes then the client has to pay for the same
                </p>

                <h5 class="pvc_plc_header">Timeline for Refund</h5>

                <ul>
                    <li><b>Flights-</b> As per Airline's refund policy ( Generally takes 7 to 15 working Days )</li>
                    <li><b>Hotels -</b> As per Hotel's Refund Policy (Generally takes 7 to 15 working Days )</li>
                    <li><b>Tours -</b> As per the Refund policy mentioned in the quotation ( Generally takes 7 to 15 working Days)</li>
                    
                </ul>
                <p> 
                For any other services booked like <b>Cruise, Car Rentals - </b> The refund will be made with in 7 to 15 working
                days. </p>

               <p> <b>NOTE - Please understand that the refund is based on approval as per the policies given by Hotels &
                Airlines. Incase of Non-Refundable booking no refunds will be processed. No matter when ever the client
                cancels it. Also if the booking cancellation is happening within the Non-refundable date range as per the
                cancellation policy given . Then also there will be no refund given to the clients </b> </p>

            </div>
        </div>
    </section>
@endsection
