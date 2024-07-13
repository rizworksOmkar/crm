<?php

namespace App\Http\Controllers\flight;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;




class FlightController extends Controller
{
    public function flightBookingProcess()
    {
        $cacheFlightKeyToken = 'user_flighttoken:' . 'tbo';
        $cacheFlightKeyMemberId = 'user_flightmember_id:' . 'tbo';
        $cacheFlightKeyAgencyId = 'user_flightagency_id:' . 'tbo';

        // Get the cached TokenId, MemberId, and AgencyId
        $cachedFlightToken = Cache::get($cacheFlightKeyToken);
        $cachedFlightMemberId = Cache::get($cacheFlightKeyMemberId);
        $cachedFlightAgencyId = Cache::get($cacheFlightKeyAgencyId);

        // Initialize $authResponse with default values
        $authResponse = [
            'Status' => 0,
            'TokenId' => null,
            'Member' => null,
        ];

        // Check if the token is cached
        if ($cachedFlightToken && $cachedFlightMemberId && $cachedFlightAgencyId) {
            $tokenId = $cachedFlightToken;
            $memberId = $cachedFlightMemberId;
            $agencyId = $cachedFlightAgencyId;
            $isCached = true; // Set the flag to true indicating all values are cached
        } else {
            // If any of the values are not in cache, call the authenticate API to get the Token ID and other data
            $authResponse = $this->authenticate();

            if (isset($authResponse['Status']) && $authResponse['Status'] === 1) {
                $tokenId = $authResponse['TokenId'];
                $memberId = $authResponse['Member']['MemberId'];
                $agencyId = $authResponse['Member']['AgencyId'];

                // Cache the values with a 24-hour expiry time
                Cache::put($cacheFlightKeyToken, $tokenId, 900);
                Cache::put($cacheFlightKeyMemberId, $memberId, 900);
                Cache::put($cacheFlightKeyAgencyId, $agencyId, 900);

                $isCached = true; // Set the flag to false indicating values are not all cached
            } else {
                // Set default values when authentication fails
                $tokenId = null;
                $memberId = null;
                $agencyId = null;
                $isCached = false;
            }
        }

        return view('userfrontend.flight.flight', [
            'tokenId' => $tokenId,
            'memberId' => $memberId,
            'agencyId' => $agencyId,
            'data' => $authResponse['Member'],
            'isCached' => $isCached,
        ]);

    }


    private function authenticate()
    {
        $url = 'http://api.tektravels.com/SharedServices/SharedData.svc/rest/Authenticate';

        $requestData = [
            "ClientId" => "ApiIntegrationNew",
            "UserName" => "tanmay",
            "Password" => "tanmay@123",
            "EndUserIp" => "192.168.11.120"
        ];

        $response = Http::post($url, $requestData);

        if ($response->successful()) {
            $responseData = $response->json();
            return $responseData;
        }

        return null;
    }

    public function flightNormalSearch(Request $request){
        $formData = $request->all();

        $cacheFlightKeyToken = 'user_flighttoken:' . 'tbo';
        $cachedToken = Cache::get($cacheFlightKeyToken);
        $endUserIp = '192.168.10.130';


        $preferredDepartureDate = $formData['preferredDepartureDate'];
        $preferredDepartureTimes = '00:00:00';

        // Combine date and time to create the complete format
        $preferredDepartureTime = $preferredDepartureDate . 'T' . $preferredDepartureTimes;


        //arrival
        $preferredArrivalDate = $formData['preferredDepartureDate'];
        $preferredArrivalTimes = '00:00:00';
        // Combine date and time to create the complete format
        $preferredArrivalTime = $preferredArrivalDate . 'T' . $preferredArrivalTimes;


        $requestData = [
            "EndUserIp" => $endUserIp,
            "TokenId" => $cachedToken,
            "AdultCount" => $formData['adultCount'],
            "ChildCount" => $formData['childCount'],
            "InfantCount" => $formData['infantCount'],
            "DirectFlight" => False,
            "OneStopFlight" => False,
            "JourneyType" => 1,
            "PreferredAirlines" => null,
            "Segments" => [
                    [
                        "Origin" => $formData['origin'],
                        "Destination" => $formData['destination'],
                        "FlightCabinClass" => $formData['flightCabinClass'],
                        "PreferredDepartureTime" => $preferredDepartureTime,
                        "PreferredArrivalTime" =>  $preferredArrivalTime
                    ]
                ],
            "Sources" => null
        ];



        try {
            $url = 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Search';
            $response = Http::post($url, $requestData);
            $responseData = $response->json();
            //dd($response);
            if ($response->successful()) {

                //cache the TraceId from the response
                $cacheFlightKeyTraceId = 'user_flighttrace_id:' . 'tbo';
                $traceId = $responseData['Response']['TraceId'];
                Cache::put($cacheFlightKeyTraceId, $traceId, 900);

                $additionalData = [
                    "AdultCount" => $formData['adultCount'],
                    "ChildCount" => $formData['childCount'],
                    "InfantCount" => $formData['infantCount'],
                ];

                $responseData['additionalData'] = $additionalData;

                //dd($responseData);


                return response()->json($responseData);
            }
            else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function fareQuote(Request $request){
        //get cahced TraceId and tokenid
        $traceId = Cache::get('user_flighttrace_id:' . 'tbo');
        $cachedToken = Cache::get('user_flighttoken:' . 'tbo');

        //enduserip
        $endUserIp = '192.168.11.120';

        $requestData = [
            "EndUserIp" => $endUserIp,
            "TokenId" => $cachedToken,
            "TraceId" => $traceId,
            "ResultIndex" => $request->resultIndex
        ];

        $additionalData = [
            "AdultCount" => $request->adultCount,
            "ChildCount" => $request->childCount,
            "InfantCount" => $request->infantCount,
        ];
        //dd($additionalData);

        try {
            $url = 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareQuote';
            $response = Http::post($url, $requestData);
            $responseData = $response->json();
            //dd($response);
            if ($response->successful()) {

                $responseData['additionalData'] = $additionalData;

                return response()->json($responseData);
            }
            else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function flightbooking(Request $request) {
        $apiResponse = $request->query('apiResponse');
        $apiResponse = json_decode(urldecode($apiResponse), true);
        //dd($apiResponse);

        $segments = $apiResponse['Response']['Results']['Segments'];
        $fareBreakdown = $apiResponse['Response']['Results']['FareBreakdown'];

        //dd($fareBreakdown);
            $adultCount = $apiResponse['additionalData']['AdultCount'];
            $childCount = $apiResponse['additionalData']['ChildCount'];
            $infantCount = $apiResponse['additionalData']['InfantCount'];


        return view('userfrontend.flight.flightBooking', compact('apiResponse', 'segments', 'adultCount', 'childCount', 'infantCount', 'fareBreakdown'));
    }

    public function getflightTicket(Request $request){
        $apiResponse = $request->query('apiResponse');
        $apiResponse = json_decode(urldecode($apiResponse), true);

        //dd($apiResponse);

        $details = $apiResponse['Response']['Response'];

        return view('userfrontend.flight.flightTickets', compact('apiResponse', 'details'));
    }

    public function see(){
        return view('userfrontend.flight.flightConfirmTicket');
    }

    public function flightSsr(Request $request) {
        //http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR
                //get cahced TraceId and tokenid
                $traceId = Cache::get('user_flighttrace_id:' . 'tbo');
                $cachedToken = Cache::get('user_flighttoken:' . 'tbo');

                //enduserip
                $endUserIp = '192.168.11.120';

                $requestData = [
                    "EndUserIp" => $endUserIp,
                    "TokenId" => $cachedToken,
                    "TraceId" => $traceId,
                    "ResultIndex" => $request->resultIndex
                ];

                try {
                    $url = 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR';
                    $response = Http::post($url, $requestData);
                    $responseData = $response->json();
                    //dd($response);
                    if ($response->successful()) {
                        return response()->json($responseData);
                    }
                    else {
                        return response()->json(['error' => 'Invalid API response'], 500);
                    }
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
    }


        public function flightBookWithSsr(Request $request) {
            $data = $request->all();

            // dd($data);

            // Get cached TraceId and tokenid
            $traceId = Cache::get('user_flighttrace_id:' . 'tbo');
            $cachedToken = Cache::get('user_flighttoken:' . 'tbo');

            // Enduserip
            $endUserIp = '192.168.11.120';

            // Extracting relevant information
            $resultIndex = $data['resultIndex'];

            $passengers = [];

            foreach ($data['passengers'] as $passengerData) {
                $passenger = [
                    "Title" => $passengerData['title'],
                    "FirstName" => $passengerData['firstName'],
                    "LastName" => $passengerData['lastName'],
                    "PaxType" => (int)$passengerData['type'],
                    "Gender" => (int)$passengerData['gender'],
                    "PassportNo" => "",
                    "PassportExpiry" => "",
                    "AddressLine1" => $passengerData['addressLine1'],
                    "AddressLine2" => $passengerData['addressLine2'],
                    "Fare" => $passengerData['FareDetails'][0],
                    "City" => $passengerData['city'],
                    "CountryCode" => $passengerData['countryCode'],
                    "CellCountryCode" => $passengerData['cellCountryCode'],
                    "ContactNo" => $passengerData['contactNo'],
                    "Nationality" => $passengerData['nationality'],
                    "Email" => $passengerData['email'],
                    "IsLeadPax" => $passengerData['IsLeadPax'] === 'true',
                    "FFAirlineCode" => null,
                    "FFNumber" => "",
                    "GSTCompanyAddress" => null,
                    "GSTCompanyContactNumber" => null,
                    "GSTCompanyName" => null,
                    "GSTNumber" => null,
                    "GSTCompanyEmail" => null,
                ];

                // Check if the passenger is a child (PaxType 3) and set DateOfBirth
                if ($passengerData['type'] === '3') {
                    $passenger["DateOfBirth"] = $passengerData['DateOfBirth'];
                }

                // Add the passenger to the $passengers array
                $passengers[] = $passenger;
            }







            // Add the remaining data to the request array
            $requestArray = [
                'ResultIndex' => $resultIndex,
                'Passengers' => $passengers,
                'EndUserIp' => $endUserIp,
                'TokenId' => $cachedToken,
                'TraceId' => $traceId
            ];

            //dd($requestArray);


            try {
                // Get the request data


                // Make the API call
                $url = 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Book';
                $response = Http::post($url, $requestArray);
                $responseData = $response->json();

                // Check if the API call was successful
                if ($response->successful()) {
                    return response()->json($responseData);
                } else {
                    return response()->json(['error' => 'Invalid API response'], 500);
                }

            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }


}
