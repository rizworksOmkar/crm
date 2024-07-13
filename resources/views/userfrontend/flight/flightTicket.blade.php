@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets\user\css\flightTicket.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container">
        <h2>Flight Ticket Details</h2>

        <div>
            <p><strong>PNR:</strong> {{ $apiResponse['Response']['Response']['FlightItinerary']['PNR'] }}</p>
            <p><strong>Booking ID:</strong> {{ $apiResponse['Response']['Response']['BookingId'] }}</p>
            <p><strong>Status:</strong> {{ $apiResponse['Response']['Response']['FlightItinerary']['Status'] }}</p>
            {{-- Add more details as needed --}}
        </div>

        <h3>Passenger Details</h3>
        @foreach ($apiResponse['Response']['Response']['FlightItinerary']['Passenger'] as $passenger)
            <div>
                <p><strong>Title:</strong> {{ $passenger['Title'] }}</p>
                <p><strong>Name:</strong> {{ $passenger['FirstName'] }} {{ $passenger['LastName'] }}</p>
                <p><strong>Pax Type:</strong> {{ $passenger['PaxType'] }}</p>
                <p><strong>Gender:</strong> {{ $passenger['Gender'] === 1 ? 'Male' : 'Female' }}</p>
                <p><strong>Address:</strong> {{ $passenger['AddressLine1'] }}, {{ $passenger['AddressLine2'] }}</p>
                <p><strong>City:</strong> {{ $passenger['City'] }}</p>
                <p><strong>Country Code:</strong> {{ $passenger['CountryCode'] }}</p>
                <p><strong>Nationality:</strong> {{ $passenger['Nationality'] }}</p>
                <p><strong>Contact No:</strong> {{ $passenger['ContactNo'] }}</p>
                <p><strong>Email:</strong> {{ $passenger['Email'] }}</p>
                <p><strong>Is Lead Pax:</strong> {{ $passenger['IsLeadPax'] ? 'Yes' : 'No' }}</p>
                {{-- Add more passenger details as needed --}}
            </div>
        @endforeach

        <h3>Flight Itinerary</h3>
        <div>
            <p><strong>Origin:</strong> {{ $apiResponse['Response']['Response']['FlightItinerary']['Origin'] }}</p>
            <p><strong>Destination:</strong> {{ $apiResponse['Response']['Response']['FlightItinerary']['Destination'] }}</p>
            <p><strong>Airline Code:</strong> {{ $apiResponse['Response']['Response']['FlightItinerary']['AirlineCode'] }}</p>
            {{-- Add more flight itinerary details as needed --}}
        </div>

        {{-- Add more sections for other details, such as Fare, Segments, etc. --}}
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Flights Booking</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tckt_box">
        <div class="container">
            <div class="box">
                <ul class="left">
                    <li></li>
                    <!-- Add more list items as needed -->
                </ul>

                <ul class="right">
                    <li></li>
                    <!-- Add more list items as needed -->
                </ul>

                <div class="ticket">
                    <span class="airline">{{ $apiResponse['Response']['Response']['FlightItinerary']['AirlineCode'] }}</span>
                    <span class="airline airlineslip">{{ $apiResponse['Response']['Response']['FlightItinerary']['AirlineCode'] }}</span>
                    <span class="boarding">PNR: {{ $apiResponse['Response']['Response']['PNR'] }}</span>
                    <div class="content">
                        <span class="jfk">{{ $apiResponse['Response']['Response']['FlightItinerary']['Origin'] }}</span>
                        <span class="plane_icon">
                            <!-- Your SVG code for the plane icon -->
                        </span>
                        <span class="sfo">{{ $apiResponse['Response']['Response']['FlightItinerary']['Destination'] }}</span>

                        <span class="jfk jfkslip">{{ $apiResponse['Response']['Response']['FlightItinerary']['Origin'] }}</span>
                        <span class="plane_icon planeslip">
                            <!-- Your SVG code for the plane icon -->
                        </span>
                        <span class="sfo sfoslip">{{ $apiResponse['Response']['Response']['FlightItinerary']['Destination'] }}</span>
                        <div class="sub-content">
                            <span class="watermark">{{ $apiResponse['Response']['Response']['FlightItinerary']['AirlineCode'] }}</span>
                            @foreach($apiResponse['Response']['Response']['FlightItinerary']['Passenger'] as $passenger)
                                <span class="name">PASSENGER NAME<br><span>{{ $passenger['FirstName'] }} {{ $passenger['LastName'] }}</span></span>
                                <span class="flight">FLIGHT N&deg;<br><span>{{ $apiResponse['Response']['Response']['FlightItinerary']['FlightNumber'] }}</span></span>
                                <span class="gate">GATE<br><span>{{ $apiResponse['Response']['Response']['FlightItinerary']['Gate'] }}</span></span>
                                <span class="seat_tckt">SEAT<br><span>{{ $passenger['Seat'] }}</span></span>
                                <span class="boardingtime">BOARDING TIME<br><span>{{ $apiResponse['Response']['Response']['FlightItinerary']['BoardingTime'] }}</span></span>
                            @endforeach
                        </div>
                    </div>
                    <div class="barcode"></div>
                    <div class="barcode slip"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }
    </script>
@endsection
