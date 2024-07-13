<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        .ticket-container {
            max-width: 1000px;
            margin: 0 auto;
            border: 2px solid #3498db;
            padding: 20px;
        }
    </style>
</head>

<body>
    @if (isset($apiResponse['Response']['Response']['PNR']))
        <div class="ticket-container">
            <h1>Flight Ticket</h1>

            <table>
                <tr>
                    <th>Booking Details</th>
                    <td>PNR: {{ $apiResponse['Response']['Response']['PNR'] }}</td>
                    <td>Booking ID: {{ $apiResponse['Response']['Response']['BookingId'] }}</td>
                    <td>Status: {{ $apiResponse['Response']['Response']['Status'] }}</td>
                    <td>Is Price Changed: {{ $apiResponse['Response']['Response']['IsPriceChanged'] ? 'Yes' : 'No' }}
                    </td>
                    <td>Is Time Changed: {{ $apiResponse['Response']['Response']['IsTimeChanged'] ? 'Yes' : 'No' }}</td>
                </tr>
            </table>

            <h2>Passenger Details</h2>
            <table>
                <tr>
                    <th>Passenger</th>
                    <th>Name</th>
                    <th>Pax Type</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Nationality</th>
                    <th>Lead Passenger</th>
                </tr>
                @foreach ($apiResponse['Response']['Response']['FlightItinerary']['Passenger'] as $passenger)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $passenger['Title'] }} {{ $passenger['FirstName'] }} {{ $passenger['LastName'] }}</td>
                        <td>{{ $passenger['PaxType'] == 1 ? 'Adult' : 'Child' }}</td>
                        <td>{{ $passenger['Gender'] == 1 ? 'Male' : 'Female' }}</td>
                        <td>{{ $passenger['ContactNo'] }}</td>
                        <td>{{ $passenger['Email'] }}</td>
                        <td>{{ $passenger['AddressLine1'] }}, {{ $passenger['AddressLine2'] }},
                            {{ $passenger['City'] }},
                            {{ $passenger['CountryCode'] }}</td>
                        <td>{{ $passenger['Nationality'] }}</td>
                        <td>{{ $passenger['IsLeadPax'] ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </table>

            <h2>Flight Itinerary</h2>
            <table>
                <tr>
                    <th>Segment</th>
                    <th>Origin</th>
                    <th>Departure Time</th>
                    <th>Destination</th>
                    <th>Arrival Time</th>
                    <th>Flight Status</th>
                    <th>Baggage</th>
                    <th>Cabin Class</th>
                </tr>
                @foreach ($apiResponse['Response']['Response']['FlightItinerary']['Segments'] as $segment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $segment['Origin']['Airport']['AirportName'] }}
                            ({{ $segment['Origin']['Airport']['AirportCode'] }})
                        </td>
                        <td>{{ $segment['Origin']['DepTime'] }}</td>
                        <td>{{ $segment['Destination']['Airport']['AirportName'] }}
                            ({{ $segment['Destination']['Airport']['AirportCode'] }})</td>
                        <td>{{ $segment['Destination']['ArrTime'] }}</td>
                        <td>{{ $segment['FlightStatus'] }}</td>
                        <td>{{ $segment['Baggage'] }}</td>
                        <td>{{ $segment['CabinClass'] }}</td>
                    </tr>
                @endforeach
            </table>

            <h2>Fare Details</h2>
            <table>
                <tr>
                    <th>Fare Type</th>
                </tr>
                <tr>
                    <td>{{ $apiResponse['Response']['Response']['FlightItinerary']['FareType'] }}</td>
                </tr>
            </table>

            <h2>Fare Rules</h2>
            @foreach ($apiResponse['Response']['Response']['FlightItinerary']['FareRules'] as $fareRule)
                <table>
                    <tr>
                        <th>Fare Rule</th>
                        <td>Origin: {{ $fareRule['Origin'] }}</td>
                        <td>Destination: {{ $fareRule['Destination'] }}</td>
                        <td>Airline: {{ $fareRule['Airline'] }}</td>
                        <td>Fare Basis Code: {{ $fareRule['FareBasisCode'] }}</td>

                    </tr>
                </table>
            @endforeach
            Fare Rule Detail: {!! $fareRule['FareRuleDetail'] !!}
            <h2>Penalty Charges</h2>
            <table>
                <tr>
                    <th>Reissue Charge</th>
                    <th>Cancellation Charge</th>
                </tr>
                <tr>
                    <td>{{ $apiResponse['Response']['Response']['FlightItinerary']['PenaltyCharges']['ReissueCharge'] }}
                    </td>
                    <td>{{ $apiResponse['Response']['Response']['FlightItinerary']['PenaltyCharges']['CancellationCharge'] }}
                    </td>
                </tr>
            </table>
        </div>
    @else
        <h1>Something went wrong, ticket has not been book, kindly book again
            <p>If you are not automatically redirected, you can <a href="/flight-booking-process">click here</a>.</p>
        </h1>
        

    @endif
</body>

</html>
