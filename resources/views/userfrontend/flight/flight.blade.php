@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .hideIt {
            display: none;
        }
    </style>
    <section id="common_banner" class="bnnr_pdng">
        <div class="container">
            {{-- <div id="htlDtls_search">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
        </div> --}}
            <div class="container" style="display: none">
                <h1>Data</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>TokenId</th>
                            <td>{{ $tokenId }}</td>
                        </tr>

                        <tr>
                            <th>Member ID</th>
                            <td>{{ $memberId }}</td>
                        </tr>
                        <tr>
                            <th>Agency ID</th>
                            <td>{{ $agencyId }}</td>
                        </tr>
                        <tr>
                            <th>Cached</th>
                            <td>{{ $isCached ? 'Yes' : 'No' }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Flights</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            {{-- <li><span><i class="fas fa-circle"></i></span> Hotel</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Search Box --}}
    <section>





        <!-- Ayush Work -->
        {{-- <section>
            <section id="theme_search_form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="theme_search_form_area">
                                <div class="theme_search_form_tabbtn active_psn">
                                    <ul class="nav nav-tabs " role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="flights-tab" data-bs-toggle="tab"
                                                data-bs-target="#flights" type="button" role="tab"
                                                aria-controls="flights" aria-selected="true"><i
                                                    class="fas fa-plane-departure"></i>Flights</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content res_tb_cnt" id="myTabContent">
                                    <div class="tab-pane fade show active" id="flights" role="tabpanel"
                                        aria-labelledby="flights-tab">
                                        <form id="search_form">
                                            <div class="tab-content" id="myTabContent1">
                                                <div class="tab-pane fade show active" id="oneway_flight" role="tabpanel"
                                                    aria-labelledby="oneway-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="oneway_search_form">

                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>From</p>

                                                                            <select class="form-control" name="origin"
                                                                                id="origin">
                                                                                <option value="AMD">Ahmedabad</option>
                                                                                <option value="BLR">Bengaluru (Bangalore)
                                                                                </option>
                                                                                <option value="BBI">Bhubaneswar, Odisha
                                                                                </option>
                                                                                <option value="MAA">Chennai (Madras)
                                                                                </option>
                                                                                <option value="CJB">Coimbatore, Tamil
                                                                                    Nadu</option>
                                                                                <option value="GOI">Dabolim, GOA</option>
                                                                                <option value="GAU">Guwahati, Assam
                                                                                </option>
                                                                                <option value="HYD">Hyderabad</option>
                                                                                <option value="IDR">Indore, Madhya
                                                                                    Pradesh</option>
                                                                                <option value="JAI">Jaipur, Rajasthan
                                                                                </option>
                                                                                <option value="COK">Kochi (Cochin)
                                                                                </option>
                                                                                <option value="CCU">Kolkata (Calcutta)
                                                                                </option>
                                                                                <option value="CCJ">Kozhikode Airport
                                                                                </option>
                                                                                <option value="LKO">Lucknow, Uttar
                                                                                    Pradesh</option>
                                                                                <option value="CNN">Mattanur town in
                                                                                    Kannur district</option>
                                                                                <option value="BOM">Mumbai (Bombay)
                                                                                </option>
                                                                                <option value="DEL">New Delhi</option>
                                                                                <option value="PAT">Patna, Bihar</option>
                                                                                <option value="PNQ">Pune, Maharashtra
                                                                                </option>
                                                                            </select>




                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-departure"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>To</p>

                                                                            <select class="form-control" name="destination"
                                                                                id="destination">
                                                                                <option value="AMD">Ahmedabad</option>
                                                                                <option value="BLR">Bengaluru (Bangalore)
                                                                                </option>
                                                                                <option value="BBI">Bhubaneswar, Odisha
                                                                                </option>
                                                                                <option value="MAA">Chennai (Madras)
                                                                                </option>
                                                                                <option value="CJB">Coimbatore, Tamil
                                                                                    Nadu</option>
                                                                                <option value="GOI">Dabolim, GOA</option>
                                                                                <option value="GAU">Guwahati, Assam
                                                                                </option>
                                                                                <option value="HYD">Hyderabad</option>
                                                                                <option value="IDR">Indore, Madhya
                                                                                    Pradesh</option>
                                                                                <option value="JAI">Jaipur, Rajasthan
                                                                                </option>
                                                                                <option value="COK">Kochi (Cochin)
                                                                                </option>
                                                                                <option value="CCU">Kolkata (Calcutta)
                                                                                </option>
                                                                                <option value="CCJ">Kozhikode Airport
                                                                                </option>
                                                                                <option value="LKO">Lucknow, Uttar
                                                                                    Pradesh</option>
                                                                                <option value="CNN">Mattanur town in
                                                                                    Kannur district</option>
                                                                                <option value="BOM">Mumbai (Bombay)
                                                                                </option>
                                                                                <option value="DEL">New Delhi</option>
                                                                                <option value="PAT">Patna, Bihar
                                                                                </option>
                                                                                <option value="PNQ">Pune, Maharashtra
                                                                                </option>
                                                                            </select>


                                                                            <div class="plan_icon_posation">
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                            </div>

                                                                            <div class="range_plan">
                                                                                <i class="fas fa-exchange-alt"></i>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                        <div class="form_search_date">
                                                                            <div
                                                                                class="flight_Search_boxed date_flex_area">
                                                                                <div class="Journey_date">
                                                                                    <p>Departure Date</p>
                                                                                    <input name="preferredDepartureDate"
                                                                                        id="preferredDepartureDate"
                                                                                        type="date">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                        <div class="flight_Search_boxed flt_gos">
                                                                            <p>Flight Cabin Class</p>
                                                                            <select class="form-select select2 slct_ct"
                                                                                name="flightCabinClass"
                                                                                id="flightCabinClass">
                                                                                <option value="0">----- Select Cabin
                                                                                    -----
                                                                                </option>
                                                                                <option value="1">All</option>
                                                                                <option value="2">Economy</option>
                                                                                <option value="3">Premium Economy
                                                                                </option>
                                                                                <option value="4">Business</option>
                                                                                <option value="5">Premium Business
                                                                                </option>
                                                                                <option value="6">First</option>

                                                                            </select>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-6 col-sm-12 col-12">

                                                                        <div class="passenger-sections"
                                                                            onclick="togglePassengerSections()">
                                                                            <p>Passengers +</p>

                                                                            <div class="hideIt">
                                                                                <div class="passenger-section"
                                                                                    id="adultSection">
                                                                                    <p>Adults</p>
                                                                                    <button class="btn-add"
                                                                                        onclick="addPassenger('adult')">+</button>
                                                                                    <span class="count"
                                                                                        id="adultCount">0</span>
                                                                                    <button class="btn-subtract"
                                                                                        onclick="subtractPassenger('adult')">-</button>
                                                                                </div>

                                                                                <div class="passenger-section"
                                                                                    id="childSection">
                                                                                    <p>Children (2-11 yrs)</p>
                                                                                    <button class="btn-add"
                                                                                        onclick="addPassenger('child')">+</button>
                                                                                    <span class="count"
                                                                                        id="childCount">0</span>
                                                                                    <button class="btn-subtract"
                                                                                        onclick="subtractPassenger('child')">-</button>
                                                                                </div>

                                                                                <div class="passenger-section"
                                                                                    id="infantSection">
                                                                                    <p>Infants (0-2 yrs)</p>
                                                                                    <button class="btn-add"
                                                                                        onclick="addPassenger('infant')">+</button>
                                                                                    <span class="count"
                                                                                        id="infantCount">0</span>
                                                                                    <button class="btn-subtract"
                                                                                        onclick="subtractPassenger('infant')">-</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>





                                                                    <div class="top_form_search_button ">
                                                                        <button type="submit"
                                                                            class="btn btn_theme btn_md btn_psn">Search</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section> --}}

        <!-- Anish Work -->
        <!-- Form Area -->
        <section id="theme_search_form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="theme_search_form_area">
                            <div class="theme_search_form_tabbtn active_psn">
                                <ul class="nav nav-tabs " role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="flights-tab" data-bs-toggle="tab"
                                            data-bs-target="#flights" type="button" role="tab" aria-controls="flights"
                                            aria-selected="true"><i class="fas fa-plane-departure"></i>Flights</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content res_tb_cnt" id="myTabContent">
                                <div class="tab-pane fade show active" id="flights" role="tabpanel"
                                    aria-labelledby="flights-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="flight_categories_search">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="oneway-tab" data-bs-toggle="tab"
                                                            data-bs-target="#oneway_flight" type="button" role="tab"
                                                            aria-controls="oneway_flight" aria-selected="true">One
                                                            Way</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="roundtrip-tab" data-bs-toggle="tab"
                                                            data-bs-target="#roundtrip" type="button" role="tab"
                                                            aria-controls="roundtrip"
                                                            aria-selected="false">Roundtrip</button>
                                                    </li>
                                                    {{-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="multi_city-tab" data-bs-toggle="tab"
                                                        data-bs-target="#multi_city" type="button" role="tab"
                                                        aria-controls="multi_city" aria-selected="false">Multi
                                                        city</button>
                                                </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="myTabContent1">
                                        <div class="tab-pane fade show active" id="oneway_flight" role="tabpanel"
                                            aria-labelledby="oneway-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="oneway_search_form">
                                                        <form id="search_form">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>From</p>
                                                                        <select class="form-select select2 slct_ct"
                                                                            name="origin" id="origin">
                                                                            <option value="0">----- Select City -----
                                                                            </option>
                                                                            <option value="AMD">Ahmedabad</option>
                                                                            <option value="BLR">Bengaluru (Bangalore)
                                                                            </option>
                                                                            <option value="BBI">Bhubaneswar, Odisha
                                                                            </option>
                                                                            <option value="MAA">Chennai (Madras)
                                                                            </option>
                                                                            <option value="CJB">Coimbatore, Tamil
                                                                                Nadu</option>
                                                                            <option value="GOI">Dabolim, GOA</option>
                                                                            <option value="GAU">Guwahati, Assam
                                                                            </option>
                                                                            <option value="HYD">Hyderabad</option>
                                                                            <option value="IDR">Indore, Madhya
                                                                                Pradesh</option>
                                                                            <option value="JAI">Jaipur, Rajasthan
                                                                            </option>
                                                                            <option value="COK">Kochi (Cochin)
                                                                            </option>
                                                                            <option value="CCU">Kolkata (Calcutta)
                                                                            </option>
                                                                            <option value="CCJ">Kozhikode Airport
                                                                            </option>
                                                                            <option value="LKO">Lucknow, Uttar
                                                                                Pradesh</option>
                                                                            <option value="CNN">Mattanur town in
                                                                                Kannur district</option>
                                                                            <option value="BOM">Mumbai (Bombay)
                                                                            </option>
                                                                            <option value="DEL">New Delhi</option>
                                                                            <option value="PAT">Patna, Bihar</option>
                                                                            <option value="PNQ">Pune, Maharashtra
                                                                            </option>
                                                                        </select>

                                                                        <span class="">like CCU - Kolkata
                                                                            (Calcutta)...</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-departure"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>To</p>

                                                                        <select class="form-select select2 slct_ct"
                                                                            name="destination" id="destination">
                                                                            <option value="0">----- Select City -----
                                                                            </option>
                                                                            <option value="AMD">Ahmedabad</option>
                                                                            <option value="BLR">Bengaluru (Bangalore)
                                                                            </option>
                                                                            <option value="BBI">Bhubaneswar, Odisha
                                                                            </option>
                                                                            <option value="MAA">Chennai (Madras)
                                                                            </option>
                                                                            <option value="CJB">Coimbatore, Tamil
                                                                                Nadu</option>
                                                                            <option value="GOI">Dabolim, GOA</option>
                                                                            <option value="GAU">Guwahati, Assam
                                                                            </option>
                                                                            <option value="HYD">Hyderabad</option>
                                                                            <option value="IDR">Indore, Madhya
                                                                                Pradesh</option>
                                                                            <option value="JAI">Jaipur, Rajasthan
                                                                            </option>
                                                                            <option value="COK">Kochi (Cochin)
                                                                            </option>
                                                                            <option value="CCU">Kolkata (Calcutta)
                                                                            </option>
                                                                            <option value="CCJ">Kozhikode Airport
                                                                            </option>
                                                                            <option value="LKO">Lucknow, Uttar
                                                                                Pradesh</option>
                                                                            <option value="CNN">Mattanur town in
                                                                                Kannur district</option>
                                                                            <option value="BOM">Mumbai (Bombay)
                                                                            </option>
                                                                            <option value="DEL">New Delhi</option>
                                                                            <option value="PAT">Patna, Bihar
                                                                            </option>
                                                                            <option value="PNQ">Pune, Maharashtra
                                                                            </option>
                                                                        </select>

                                                                        <span class="">like CCU - Kolkata
                                                                            (Calcutta)...</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-arrival"></i>
                                                                        </div>

                                                                        <div class="range_plan">
                                                                            <i class="fas fa-exchange-alt"></i>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                    <div class="form_search_date">
                                                                        <div class="flight_Search_boxed date_flex_area">
                                                                            <div class="Journey_date">
                                                                                <p>Departure Date</p>
                                                                                <input type="date"
                                                                                    name="preferredDepartureDate"
                                                                                    id="preferredDepartureDate"
                                                                                    value="dd-MM-yyyy">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>Flight Cabin Class</p>
                                                                        <select class="form-select select2 slct_ct"
                                                                            name="flightCabinClass" id="flightCabinClass">
                                                                            <option value="0">----- Select Cabin -----
                                                                            </option>
                                                                            <option value="1">All</option>
                                                                            <option value="2">Economy</option>
                                                                            <option value="3">Premium Economy
                                                                            </option>
                                                                            <option value="4">Business</option>
                                                                            <option value="5">Premium Business
                                                                            </option>
                                                                            <option value="6">First</option>
                                                                        </select>
                                                                        <span class="">Like Economy / Business
                                                                            /etc...</span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2  col-md-6 col-sm-12 col-12 ">
                                                                    <div
                                                                        class="flight_Search_boxed dropdown_passenger_area">
                                                                        <p>Passengers</p>

                                                                        <div class="dropdown">
                                                                            <div class="dropdown-toggle final-count acir_sz final_main_count"
                                                                                data-toggle="dropdown" type="button"
                                                                                id="dropdownMenuButton1"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">

                                                                                <span id="mainadultCount" class="pcount">
                                                                                    0 </span> Adults| <span
                                                                                    id="mainchildCount" class="ccount">0
                                                                                </span> Child| <span id="maininfantCount"
                                                                                    class="incount"> 0 </span> Infant

                                                                            </div>
                                                                            <div class="dropdown-menu dropdown_passenger_info"
                                                                                aria-labelledby="dropdownMenuButton1">
                                                                                <div class="traveller-calulate-persons">
                                                                                    <div class="passengers">
                                                                                        <h6>Passengers</h6>
                                                                                        <div class="passengers-types">
                                                                                            <div class="passengers-type"
                                                                                                id="adultSection">
                                                                                                <div class="text"><span
                                                                                                        class="count pcount"
                                                                                                        id="adultCount">0</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p>Adult</p>
                                                                                                        <span>12+
                                                                                                            yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add"
                                                                                                        onclick="addPassenger('adult')">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="btn-subtract"
                                                                                                        onclick="subtractPassenger('adult')">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="passengers-type"
                                                                                                id="childSection">
                                                                                                <div class="text"><span
                                                                                                        class="count ccount"
                                                                                                        id="childCount">0</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p
                                                                                                            class="fz14 mb-xs-0">
                                                                                                            Children
                                                                                                        </p><span>2
                                                                                                            - Less than 12
                                                                                                            yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add-c"
                                                                                                        onclick="addPassenger('child')">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="btn-subtract-c"
                                                                                                        onclick="subtractPassenger('child')">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="passengers-type"
                                                                                                id="infantSection">
                                                                                                <div class="text">
                                                                                                    <span
                                                                                                        class="count incount"
                                                                                                        id="infantCount">0</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p
                                                                                                            class="fz14 mb-xs-0">
                                                                                                            Infant
                                                                                                        </p><span>Less
                                                                                                            than 2
                                                                                                            yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add-in"
                                                                                                        onclick="addPassenger('infant')">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>

                                                                                                    <button type="button"
                                                                                                        class="btn-subtract-in"
                                                                                                        onclick="subtractPassenger('infant')">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- <div class="cabin-selection">
                                                                                        <h6>Cabin Class</h6>
                                                                                        <div class="cabin-list">
                                                                                            <button type="button"
                                                                                                class="label-select-btn">
                                                                                                <span
                                                                                                    class="muiButton-label">Economy
                                                                                                </span>
                                                                                            </button>
                                                                                            <button type="button"
                                                                                                class="label-select-btn active">
                                                                                                <span
                                                                                                    class="muiButton-label">
                                                                                                    Business
                                                                                                </span>
                                                                                            </button>
                                                                                            <button type="button"
                                                                                                class="label-select-btn">
                                                                                                <span
                                                                                                    class="MuiButton-label">First
                                                                                                    Class </span>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="hideIt">
                                                                            <div class="passenger-section"
                                                                                id="adultSection">
                                                                                <p>Adults</p>
                                                                                <button class="btn-add"
                                                                                    onclick="addPassenger('adult')">+</button>
                                                                                <span class="count"
                                                                                    id="adultCount">0</span>
                                                                                <button class="btn-subtract"
                                                                                    onclick="subtractPassenger('adult')">-</button>
                                                                            </div>

                                                                            <div class="passenger-section"
                                                                                id="childSection">
                                                                                <p>Children (2-11 yrs)</p>
                                                                                <button class="btn-add"
                                                                                    onclick="addPassenger('child')">+</button>
                                                                                <span class="count"
                                                                                    id="childCount">0</span>
                                                                                <button class="btn-subtract"
                                                                                    onclick="subtractPassenger('child')">-</button>
                                                                            </div>

                                                                            <div class="passenger-section"
                                                                                id="infantSection">
                                                                                <p>Infants (0-2 yrs)</p>
                                                                                <button class="btn-add"
                                                                                    onclick="addPassenger('infant')">+</button>
                                                                                <span class="count"
                                                                                    id="infantCount">0</span>
                                                                                <button class="btn-subtract"
                                                                                    onclick="subtractPassenger('infant')">-</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc-12foipm-31 bTdRNA">
                                                                    <div class="sc-12foipm-32 leeMgZ">
                                                                        <div class="sc-12foipm-6 klNLWb"><span class="sc-12foipm-7 guyPvv">Select A
                                                                                Fare Type:</span>
                                                                            <ul class="sc-12foipm-8 bKIRNu">
                                                                                <li class="sc-12foipm-0 dknPnk">
                                                                                    <span class="sc-12foipm-1 YqJuG">
                                                                                        <input type="radio" >
                                                                                    </span>
                                                                                    <span class="sc-12foipm-2 imDLTV">regular</span>
                                                                                </li>
                                                                                <li class="sc-12foipm-0 hMZoCC">
                                                                                    <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                    <span class="sc-12foipm-2 isUBMc">armed forces</span>
                                                                                    <div class="sc-12foipm-4 fwqIFb fswTooltip">
                                                                                        <span class="fswTooltip__icon">
                                                                                            <img src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_df-1663661509.png"
                                                                                                alt="Mandatory for all travellers to carry a valid <b>ARMED FORCES ID</b> or <b>dependent card</b> at the time of boarding"></span><span
                                                                                            class="fswTooltip__text">Mandatory for all travellers to
                                                                                            carry a valid <b>ARMED FORCES ID</b> or <b>dependent
                                                                                                card</b> at the time of boarding</span></div>
                                                                                </li>
                                                                                <li class="sc-12foipm-0 hMZoCC"><span
                                                                                        class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                        <span class="sc-12foipm-2 isUBMc">senior citizen</span>
                                                                                    <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                            class="fswTooltip__icon"><img
                                                                                                src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_sc-1663661408.png"
                                                                                                alt="Applicable for citizens <b>above 60 years</b> of age. Please provide valid proof of age at the airport. "></span><span
                                                                                            class="fswTooltip__text">Applicable for citizens <b>above
                                                                                                60 years</b> of age. Please provide valid proof of age
                                                                                            at the airport. </span></div>
                                                                                </li>
                                                                                <li class="sc-12foipm-0 hMZoCC">
                                                                                    <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                    <span class="sc-12foipm-2 isUBMc">student</span>
                                                                                    <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                            class="fswTooltip__icon"><img
                                                                                                src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_st-1663661313.png"
                                                                                                alt="Mandatory for all student to carry a valid <b>STUDENT ID</b> card at the time of boarding"></span><span
                                                                                            class="fswTooltip__text">Mandatory for all student to carry
                                                                                            a valid <b>STUDENT ID</b> card at the time of
                                                                                            boarding</span></div>
                                                                                </li>
                                                                                <li class="sc-12foipm-0 hMZoCC">
                                                                                    <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span><span
                                                                                        class="sc-12foipm-2 isUBMc">doctors &amp; nurses</span>
                                                                                    <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                            class="fswTooltip__icon"><img
                                                                                                src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_dn-1663661480.png"
                                                                                                alt="Applicable only for medical personnel. It is mandatory to show a valid ID at the airport, without which boarding may be denied."></span><span
                                                                                            class="fswTooltip__text">Applicable only for medical
                                                                                            personnel. It is mandatory to show a valid ID at the
                                                                                            airport, without which boarding may be denied.</span></div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="top_form_search_button ">
                                                                    <button
                                                                        class="btn btn_theme btn_md btn_psn">Search</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="roundtrip" role="tabpanel"
                                            aria-labelledby="roundtrip-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="oneway_search_form">
                                                        <form id="search_form_round">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>From</p>
                                                                        {{-- <input type="text" value="New York"> --}}
                                                                        <select class="form-select select2 slct_ct"
                                                                            name="roundorigin" id="roundorigin">
                                                                            <option value="0">----- Select City -----
                                                                            </option>
                                                                            <option value="AMD">Ahmedabad</option>
                                                                            <option value="BLR">Bengaluru (Bangalore)
                                                                            </option>
                                                                            <option value="BBI">Bhubaneswar, Odisha
                                                                            </option>
                                                                            <option value="MAA">Chennai (Madras)
                                                                            </option>
                                                                            <option value="CJB">Coimbatore, Tamil
                                                                                Nadu</option>
                                                                            <option value="GOI">Dabolim, GOA</option>
                                                                            <option value="GAU">Guwahati, Assam
                                                                            </option>
                                                                            <option value="HYD">Hyderabad</option>
                                                                            <option value="IDR">Indore, Madhya
                                                                                Pradesh</option>
                                                                            <option value="JAI">Jaipur, Rajasthan
                                                                            </option>
                                                                            <option value="COK">Kochi (Cochin)
                                                                            </option>
                                                                            <option value="CCU">Kolkata (Calcutta)
                                                                            </option>
                                                                            <option value="CCJ">Kozhikode Airport
                                                                            </option>
                                                                            <option value="LKO">Lucknow, Uttar
                                                                                Pradesh</option>
                                                                            <option value="CNN">Mattanur town in
                                                                                Kannur district</option>
                                                                            <option value="BOM">Mumbai (Bombay)
                                                                            </option>
                                                                            <option value="DEL">New Delhi</option>
                                                                            <option value="PAT">Patna, Bihar</option>
                                                                            <option value="PNQ">Pune, Maharashtra
                                                                            </option>
                                                                        </select>
                                                                        {{-- <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="NewYork">New York</option>
                                                                        <option value="1">London</option>
                                                                    </select> --}}
                                                                        <span class="">like CCU - Kolkata
                                                                            (Calcutta)...</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-departure"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>To</p>
                                                                        {{-- <input type="text" value="New York"> --}}
                                                                        <select class="form-select select2 slct_ct"
                                                                            name="rounddestination" id="rounddestination">
                                                                            <option value="0">----- Select City -----
                                                                            </option>
                                                                            <option value="AMD">Ahmedabad</option>
                                                                            <option value="BLR">Bengaluru (Bangalore)
                                                                            </option>
                                                                            <option value="BBI">Bhubaneswar, Odisha
                                                                            </option>
                                                                            <option value="MAA">Chennai (Madras)
                                                                            </option>
                                                                            <option value="CJB">Coimbatore, Tamil
                                                                                Nadu</option>
                                                                            <option value="GOI">Dabolim, GOA</option>
                                                                            <option value="GAU">Guwahati, Assam
                                                                            </option>
                                                                            <option value="HYD">Hyderabad</option>
                                                                            <option value="IDR">Indore, Madhya
                                                                                Pradesh</option>
                                                                            <option value="JAI">Jaipur, Rajasthan
                                                                            </option>
                                                                            <option value="COK">Kochi (Cochin)
                                                                            </option>
                                                                            <option value="CCU">Kolkata (Calcutta)
                                                                            </option>
                                                                            <option value="CCJ">Kozhikode Airport
                                                                            </option>
                                                                            <option value="LKO">Lucknow, Uttar
                                                                                Pradesh</option>
                                                                            <option value="CNN">Mattanur town in
                                                                                Kannur district</option>
                                                                            <option value="BOM">Mumbai (Bombay)
                                                                            </option>
                                                                            <option value="DEL">New Delhi</option>
                                                                            <option value="PAT">Patna, Bihar
                                                                            </option>
                                                                            <option value="PNQ">Pune, Maharashtra
                                                                            </option>
                                                                        </select>

                                                                        <span class="">like CCU - Kolkata
                                                                            (Calcutta)...</span>
                                                                        <div class="plan_icon_posation">
                                                                            <i class="fas fa-plane-arrival"></i>
                                                                        </div>

                                                                        <div class="range_plan">
                                                                            <i class="fas fa-exchange-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="flight_Search_boxed">
                                                                    <p>To</p>
                                                                    <select class="slct_ct" name=""
                                                                        id="">
                                                                        <option value="London">London</option>
                                                                        <option value="1">New York</option>
                                                                    </select>
                                                                    <span>LCY, London city airport </span>
                                                                    <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div>
                                                                </div> --}}
                                                                </div>
                                                                <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                    <div class="form_search_date">
                                                                        <div class="flight_Search_boxed date_flex_area">
                                                                            <div class="Journey_date">
                                                                                <p>Departure Date</p>
                                                                                <input type="date"
                                                                                    name="roundpreferredDepartureDate"
                                                                                    id="roundpreferredDepartureDate"
                                                                                    value="dd-MM-yyyy">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                    <div class="form_search_date">
                                                                        <div class="flight_Search_boxed date_flex_area">
                                                                            <div class="Journey_date">
                                                                                <p>Return Date</p>
                                                                                <input type="date"
                                                                                    name="roundreturndate"
                                                                                    id="roundreturndate"
                                                                                    value="dd-MM-yyyy">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                                                                    <div class="flight_Search_boxed flt_gos">
                                                                        <p>Flight Cabin Class</p>
                                                                        <select class="form-select select2 slct_ct"
                                                                            name="roundflightCabinClass"
                                                                            id="roundflightCabinClass">
                                                                            <option value="0">----- Select Cabin -----
                                                                            </option>
                                                                            <option value="1">All</option>
                                                                            <option value="2">Economy</option>
                                                                            <option value="3">Premium Economy
                                                                            </option>
                                                                            <option value="4">Business</option>
                                                                            <option value="5">Premium Business
                                                                            </option>
                                                                            <option value="6">First</option>
                                                                        </select>
                                                                        <span class="">Like Economy / Business
                                                                            /etc...</span>
                                                                        {{-- <div class="plan_icon_posation">
                                                                        <i class="fas fa-plane-arrival"></i>
                                                                    </div> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2  col-md-6 col-sm-12 col-12">
                                                                    <div
                                                                        class="flight_Search_boxed dropdown_passenger_area">
                                                                        <p>Passengers</p>

                                                                        <div class="dropdown">
                                                                            <div class="dropdown-toggle final-count acir_sz final_main_count"
                                                                                data-toggle="dropdown" type="button"
                                                                                id="dropdownMenuButtonRound"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">

                                                                                <span id="roundmainadultCount"
                                                                                    class="pcount"> 0 </span> Adults| <span
                                                                                    id="roundmainchildCount"
                                                                                    class="ccount">0 </span> Child| <span
                                                                                    id="roundmaininfantCount"
                                                                                    class="incount"> 0 </span> Infant

                                                                            </div>
                                                                            <div class="dropdown-menu dropdown_passenger_info"
                                                                                aria-labelledby="dropdownMenuButtonRound">
                                                                                <div class="traveller-calulate-persons">
                                                                                    <div class="passengers">
                                                                                        <h6>Passengers</h6>
                                                                                        <div class="passengers-types">
                                                                                            <div class="passengers-type"
                                                                                                id="roundadultSection">
                                                                                                <div class="text"><span
                                                                                                        class="count pcount"
                                                                                                        id="roundadultCount">2</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p>Adult</p>
                                                                                                        <span>12+ yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="btn-subtract">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="passengers-type"
                                                                                                id="roundchildSection">
                                                                                                <div class="text"><span
                                                                                                        class="count ccount"
                                                                                                        id="roundchildCount">0</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p
                                                                                                            class="fz14 mb-xs-0">
                                                                                                            Children
                                                                                                        </p><span>2
                                                                                                            - Less than 12
                                                                                                            yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add-c">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="btn-subtract-c">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="passengers-type"
                                                                                                id="roundinfantSection">
                                                                                                <div class="text">
                                                                                                    <span
                                                                                                        class="count incount"
                                                                                                        id="roundinfantCount">0</span>
                                                                                                    <div
                                                                                                        class="type-label">
                                                                                                        <p
                                                                                                            class="fz14 mb-xs-0">
                                                                                                            Infant
                                                                                                        </p><span>Less
                                                                                                            than 2
                                                                                                            yrs</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="button-set">
                                                                                                    <button type="button"
                                                                                                        class="btn-add-in">
                                                                                                        <i
                                                                                                            class="fas fa-plus"></i>
                                                                                                    </button>

                                                                                                    <button type="button"
                                                                                                        class="btn-subtract-in">
                                                                                                        <i
                                                                                                            class="fas fa-minus"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- <div class="cabin-selection">
                                                                                    <h6>Cabin Class</h6>
                                                                                    <div class="cabin-list">
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="muiButton-label">Economy
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn active">
                                                                                            <span
                                                                                                class="muiButton-label">
                                                                                                Business
                                                                                            </span>
                                                                                        </button>
                                                                                        <button type="button"
                                                                                            class="label-select-btn">
                                                                                            <span
                                                                                                class="MuiButton-label">First
                                                                                                Class </span>
                                                                                        </button>
                                                                                    </div>
                                                                                </div> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sc-12foipm-31 bTdRNA">
                                                                <div class="sc-12foipm-32 leeMgZ">
                                                                    <div class="sc-12foipm-6 klNLWb"><span class="sc-12foipm-7 guyPvv">Select A
                                                                            Fare Type:</span>
                                                                        <ul class="sc-12foipm-8 bKIRNu">
                                                                            <li class="sc-12foipm-0 dknPnk">
                                                                                <span class="sc-12foipm-1 YqJuG">
                                                                                    <input type="radio" >
                                                                                </span>
                                                                                <span class="sc-12foipm-2 imDLTV">regular</span>
                                                                            </li>
                                                                            <li class="sc-12foipm-0 hMZoCC">
                                                                                <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                <span class="sc-12foipm-2 isUBMc">armed forces</span>
                                                                                <div class="sc-12foipm-4 fwqIFb fswTooltip">
                                                                                    <span class="fswTooltip__icon">
                                                                                        <img src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_df-1663661509.png"
                                                                                            alt="Mandatory for all travellers to carry a valid <b>ARMED FORCES ID</b> or <b>dependent card</b> at the time of boarding"></span><span
                                                                                        class="fswTooltip__text">Mandatory for all travellers to
                                                                                        carry a valid <b>ARMED FORCES ID</b> or <b>dependent
                                                                                            card</b> at the time of boarding</span></div>
                                                                            </li>
                                                                            <li class="sc-12foipm-0 hMZoCC"><span
                                                                                    class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                    <span class="sc-12foipm-2 isUBMc">senior citizen</span>
                                                                                <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                        class="fswTooltip__icon"><img
                                                                                            src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_sc-1663661408.png"
                                                                                            alt="Applicable for citizens <b>above 60 years</b> of age. Please provide valid proof of age at the airport. "></span><span
                                                                                        class="fswTooltip__text">Applicable for citizens <b>above
                                                                                            60 years</b> of age. Please provide valid proof of age
                                                                                        at the airport. </span></div>
                                                                            </li>
                                                                            <li class="sc-12foipm-0 hMZoCC">
                                                                                <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span>
                                                                                <span class="sc-12foipm-2 isUBMc">student</span>
                                                                                <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                        class="fswTooltip__icon"><img
                                                                                            src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_st-1663661313.png"
                                                                                            alt="Mandatory for all student to carry a valid <b>STUDENT ID</b> card at the time of boarding"></span><span
                                                                                        class="fswTooltip__text">Mandatory for all student to carry
                                                                                        a valid <b>STUDENT ID</b> card at the time of
                                                                                        boarding</span></div>
                                                                            </li>
                                                                            <li class="sc-12foipm-0 hMZoCC">
                                                                                <span class="sc-12foipm-1 ldWNmn"><input type="radio" ></span><span
                                                                                    class="sc-12foipm-2 isUBMc">doctors &amp; nurses</span>
                                                                                <div class="sc-12foipm-4 fwqIFb fswTooltip"><span
                                                                                        class="fswTooltip__icon"><img
                                                                                            src="https://gos3.ibcdn.com/special_fare_icon_dweb_home_page_dn-1663661480.png"
                                                                                            alt="Applicable only for medical personnel. It is mandatory to show a valid ID at the airport, without which boarding may be denied."></span><span
                                                                                        class="fswTooltip__text">Applicable only for medical
                                                                                        personnel. It is mandatory to show a valid ID at the
                                                                                        airport, without which boarding may be denied.</span></div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="top_form_search_button">
                                                                <button
                                                                    class="btn btn_theme btn_md btn_psn">Search</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


























        {{-- </section> --}}
        {{-- Search Box End --}}
        {{-- flight body --}}
        {{-- <section> --}}
        <section class="section_padding_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="flight_filter">
                            <div class="fltr_box">
                                <p class="flight_header">Popular Filters</p>
                                <div class="fltr_flight_ctgr">
                                    <div class="fltr_ctgr_right">
                                        <input type="checkbox">
                                        <p>Non Stop (NA)</p>
                                    </div>
                                    <span class="flight_price">₹ NA</span>
                                </div>
                                <div class="fltr_flight_ctgr">
                                    <div class="fltr_ctgr_right">
                                        <input type="checkbox">
                                        <p>Prenoon Departure (NA)</p>
                                    </div>
                                    <span class="flight_price">₹ NA</span>
                                </div>
                                <div class="fltr_flight_ctgr">
                                    <div class="fltr_ctgr_right">
                                        <input type="checkbox">
                                        <p>IndiGo (NA)</p>
                                    </div>
                                    <span class="flight_price">₹ NA</span>
                                </div>
                                <div class="fltr_flight_ctgr">
                                    <div class="fltr_ctgr_right">
                                        <input type="checkbox">
                                        <p>Vistara (NA)</p>
                                    </div>
                                    <span class="flight_price">₹ NA</span>
                                </div>
                                <div class="fltr_flight_ctgr">
                                    <div class="fltr_ctgr_right">
                                        <input type="checkbox">
                                        <p>Akasa Air (NA)</p>
                                    </div>
                                    <span class="flight_price">₹ NA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="flight_list">
                            <p class="flght_header">Flights </p>
                            <div class="flight_list_box">
                                <div class="flight_ctgr_tab ">
                                    <div class="flight_tab">
                                        <span class="rpc_icon"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                        <div class="flight_prc">
                                            <p>Cheapest</p>
                                            <span>₹ NA ・</span><span>Duration: NA</span>
                                        </div>
                                    </div>
                                    <div class="flight_tab">
                                        <span class="rpc_icon"><i class="fa fa-assistive-listening-systems"
                                                aria-hidden="true"></i></span>
                                        <div class="flight_prc">
                                            <p>Non Stop First</p>
                                            <span>₹ NA ・</span><span>Duration: NA</span>
                                        </div>
                                    </div>
                                    <div class="flight_tab">
                                        <span class="rpc_icon"><i class="fa fa-star" aria-hidden="true"></i></span>
                                        <div class="flight_prc">
                                            <p>You May Prefer</p>
                                            <span>₹ NA ・</span><span>Duration: NA</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flight_srtd">
                                    <p>Flights sorted by Popularity (based on price, duration & convenience)</p>
                                </div>
                                <div class="flight_listing">

                                    <div id="FlightResultsRow">



                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    {{-- flight body end --}}
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        function togglePassengerSections() {
            var hideItSection = document.querySelector('.hideIt');
            hideItSection.style.display = (hideItSection.style.display === 'none' || hideItSection.style.display === '') ?
                'block' : 'none';
        }
        // Your existing counts
        let adultCount = 0;
        let childCount = 0;
        let infantCount = 0;

        // Additional object to store counts
        let passengerCounts = {
            adult: 0,
            child: 0,
            infant: 0
        };

        function addPassenger(type) {
            switch (type) {
                case 'adult':
                    adultCount++;
                    passengerCounts.adult++;
                    document.getElementById('adultCount').textContent = adultCount;
                    document.getElementById('mainadultCount').textContent = adultCount;
                    break;
                case 'child':
                    childCount++;
                    passengerCounts.child++;
                    document.getElementById('childCount').textContent = childCount;
                    document.getElementById('mainchildCount').textContent = childCount;
                    break;
                case 'infant':
                    infantCount++;
                    passengerCounts.infant++;
                    document.getElementById('infantCount').textContent = infantCount;
                    document.getElementById('maininfantCount').textContent = infantCount;
                    break;
                default:
                    break;
            }
        }

        function subtractPassenger(type) {
            switch (type) {
                case 'adult':
                    if (adultCount > 0) {
                        adultCount--;
                        passengerCounts.adult--;
                        document.getElementById('adultCount').textContent = adultCount;
                        document.getElementById('mainadultCount').textContent = adultCount;
                    }
                    break;
                case 'child':
                    if (childCount > 0) {
                        childCount--;
                        passengerCounts.child--;
                        document.getElementById('childCount').textContent = childCount;
                        document.getElementById('mainchildCount').textContent = childCount;
                    }
                    break;
                case 'infant':
                    if (infantCount > 0) {
                        infantCount--;
                        passengerCounts.infant--;
                        document.getElementById('infantCount').textContent = infantCount;
                        document.getElementById('maininfantCount').textContent = infantCount;
                    }
                    break;
                default:
                    break;
            }
        }

        // Function to get the counts (you can use this function where needed)
        function getPassengerCounts() {
            return passengerCounts;
        }
    </script>





    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }
        $(document).ready(function() {
            // Handle form submission
            $("#search_form").submit(function(e) {
                e.preventDefault(); // Prevent default form submission behavior

                var passengerCounts = getPassengerCounts();
                // Get the CSRF token from the meta tags
                var csrfToken =
                    $('meta[name="csrf-token"]').attr('content');

                // Prepare the data to be sent
                var formData = {
                    "_token": csrfToken,

                    "origin": $("#origin").val(),
                    "destination": $("#destination").val(),
                    "flightCabinClass": $("#flightCabinClass").val(),
                    "preferredDepartureDate": $("#preferredDepartureDate").val(),
                    "adultCount": passengerCounts.adult,
                    "childCount": passengerCounts.child,
                    "infantCount": passengerCounts.infant,
                };
                alert("Form Data:\n" + JSON.stringify(formData, null, 2));

                //Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/flight-normal-search",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log('API response:',
                            response); // Handle the successful response

                        const trace = response.Response.TraceId;
                        const results = response.Response.Results[0];
                        const origin = response.Response.Origin;
                        const destination = response.Response.Destination;

                        //  "additionalData": {
                        //         "AdultCount": "1",
                        //         "ChildCount": "1",
                        //         "InfantCount": "1"
                        //     }

                        const additionalData = response.additionalData;
                        const adultCount = additionalData.AdultCount;
                        const childCount = additionalData.ChildCount;
                        const infantCount = additionalData.InfantCount;

                        $('#FlightResultsRow').empty();

                        function extractTimeFromDate(dateTimeString) {
                            const dateTime = new Date(dateTimeString);
                            return dateTime.toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                        }

                        function convertMinutesToHoursAndMinutes(minutes) {
                            const hours = Math.floor(minutes / 60);
                            const remainingMinutes = minutes % 60;
                            return `${hours} h ${remainingMinutes} m`;
                        }

                        $.each(results, function(i, result) {
                            const isLLC = result.IsLCC; //Low Cost Carrier

                            if (!isLLC) {
                                const segments = result.Segments;

                                const airLineName = segments[0][0].Airline.AirlineName;
                                const airLineCode = segments[0][0].Airline.AirlineCode;
                                const flightNumber = segments[0][0].Airline
                                    .FlightNumber;

                                const originAirportCode = segments[0][0].Origin.Airport
                                    .AirportCode;
                                const originAirportName = segments[0][0].Origin.Airport
                                    .AirportName;
                                const originCityCode = segments[0][0].Origin.Airport
                                    .CityCode;
                                const originCityName = segments[0][0].Origin.Airport
                                    .CityName;
                                const departureTimex = segments[0][0].Origin.DepTime;
                                const departureTime = extractTimeFromDate(
                                    departureTimex);

                                const destinationAirportCode = segments[0][0]
                                    .Destination
                                    .Airport.AirportCode;
                                const destinationAirportName = segments[0][0]
                                    .Destination
                                    .Airport.AirportName;
                                const destinationCityCode = segments[0][0].Destination
                                    .Airport.CityCode;
                                const destinationCityName = segments[0][0].Destination
                                    .Airport.CityName;
                                const arrivalTimex = segments[0][0].Destination.ArrTime;
                                const arrivalTime = extractTimeFromDate(arrivalTimex);

                                const duration = segments[0][0].Duration;
                                const durationInHoursAndMinutes =
                                    convertMinutesToHoursAndMinutes(duration);

                                //baggage information
                                const baggage = segments[0][0].Baggage;
                                //cabin baggage
                                const cabinBaggage = segments[0][0].CabinBaggage;

                                const airlineCode = result.AirlineCode;
                                const resultIndex = result.ResultIndex;
                                const currency = result.Fare.Currency;
                                const baseFare = result.Fare.BaseFare;
                                const tax = result.Fare.Tax;
                                const yqTax = result.Fare.YQTax;
                                const additionalTxnFeePub = result.Fare
                                    .AdditionalTxnFeePub;
                                const additionalTxnFeeOfrd = result.Fare
                                    .AdditionalTxnFeeOfrd;
                                const otherCharges = result.Fare.OtherCharges;
                                const discount = result.Fare.Discount;
                                const publishedFare = result.Fare.PublishedFare;
                                const offeredFare = result.Fare.OfferedFare;
                                const tdsOnCommission = result.Fare.TdsOnCommission;
                                const tdsOnPLB = result.Fare.TdsOnPLB;
                                const tdsOnIncentive = result.Fare.TdsOnIncentive;
                                const serviceFee = result.Fare.ServiceFee;


                                const uniqueId = `flightCard_${i}`;
                                const collapseId = `collapse_${i}`;

                                //append the results to the div
                                const flightCard = `
                            <div class="flight_list_row mb-3">
                                <div class="flight_list_chart" id="uniqueId">

                                    <div class="flight_chrt">
                                        <span class="flt_img">
                                            <img src="https://content.airhex.com/content/logos/airlines_${airlineCode}_200_200_s.png" alt="Airline Logo" class="card-img">
                                        </span>

                                        <div class="flight_prc">
                                            <p>${airLineName}</p>
                                            <span>${airLineCode} ${flightNumber}</span>
                                        </div>
                                    </div>
                                    <div class="flght_dstns">
                                        <div class="flight_prc">
                                            <p>${departureTime}</p>
                                            <span>${originCityName}</span>
                                        </div>
                                        <div class="flight_prc flght_prc_flx">
                                            <span>${durationInHoursAndMinutes}</span>
                                            <span>------</span>
                                            <span>Non stop</span>
                                        </div>
                                        <div class="flight_prc">
                                            <p>${arrivalTime}</p>
                                            <span>${destinationCityName}</span>
                                        </div>
                                    </div>
                                    <div class="flight_prc">
                                        <p>₹ ${publishedFare}</p>
                                        <span style="background-color: #0074cc; color: #ffffff; padding: 5px 10px; border-radius: 5px;">Published Fare</span>
                                    </div>
                                    <div class="booking_btn">
                                        <a class="flght_btn flght_dtls_btn" data-toggle="collapse" href="#${collapseId}" role="button" aria-expanded="false" aria-controls="${collapseId}">
                                            VIEW DETAILS
                                        </a>
                                    </div>

                                </div>
                                <div class="row mt-3 customer-data-form" style="display: none;"></div>
                                <div class="collapse mb-3" id="${collapseId}">
                                    <div class="flight_list_chart">
                                        <div class="flight_chrt">
                                            <span class="flt_img">
                                            </span>
                                            <div class="flight_prc">
                                                <p>${airLineName}</p>
                                                <span>${airLineCode} ${flightNumber}</span>
                                            </div>
                                        </div>
                                        <div class="flght_dstns">
                                            <div class="flight_prc">
                                                <p>${baggage} </p>
                                                <span>Baggage</span>
                                            </div>
                                            <div class="flight_prc flght_prc_flx">
                                                <span></span>
                                                <span>------</span>
                                                <span></span>
                                            </div>
                                            <div class="flight_prc">
                                                <p>${cabinBaggage} </p>
                                                <span>Cabin Baggage</span>
                                            </div>
                                        </div>
                                        <div class="flight_prc">
                                            <div class="row" id="isPriceChanged">

                                            </div>
                                        </div>
                                        <div class="booking_btn">
                                            <button class="btn-quote-fare flght_btn flght_dtls_bkng"
                                                data-resultIndex="${resultIndex}"
                                                data-adultCount="${adultCount}"
                                                data-childCount="${childCount}"
                                                data-infantCount="${infantCount}">Proceed Next</button>

                                            <button class="btn-book-ticket flght_btn flght_dtls_bkng  d-none"

                                                data-resultIndex="${resultIndex}"
                                                data-currency="${currency}"
                                                data-baseFare="${baseFare}"
                                                data-tax="${tax}"
                                                data-yqTax="${yqTax}"
                                                data-additionalTxnFeePub="${additionalTxnFeePub}"
                                                data-additionalTxnFeeOfrd="${additionalTxnFeeOfrd}"
                                                data-otherCharges="${otherCharges}"
                                                data-discount="${discount}"
                                                data-publishedFare="${publishedFare}"
                                                data-offeredFare="${offeredFare}"
                                                data-tdsOnCommission="${tdsOnCommission}"
                                                data-tdsOnPLB="${tdsOnPLB}"
                                                data-tdsOnIncentive="${tdsOnIncentive}"
                                                data-serviceFee="${serviceFee}"


                                            >BOOK NOW</button>
                                        </div>


                                    </div>
                                    <div>
                                            <p>Showing results for ${adultCount} Adults, ${childCount} Children, ${infantCount} Infants(On the day of boarding) </p>

                                        </div>
                                </div>
                            </div>

                            `;

                                //append the results to the div
                                $('#FlightResultsRow').append(flightCard);


                            }

                        });

                    },
                    error: function(xhr, status, error) {
                        console.log(error); // Handle any errors that occur during the request
                    }
                });


            });



            // Handle the fare quote button click


            $(document).on('click', '.btn-quote-fare', function() {
                var resultIndex = $(this).data('resultindex');
                var adultCount = $(this).data('adultcount');
                var childCount = $(this).data('childcount');
                var infantCount = $(this).data('infantcount');

                fareQuote(resultIndex, adultCount, childCount, infantCount);
            }); // proceed next button click

            function fareQuote(resultIndex, adultCount, childCount, infantCount) {
                $.ajax({
                    url: 'fare-quote',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        resultIndex: resultIndex,
                        adultCount: adultCount,
                        childCount: childCount,
                        infantCount: infantCount
                    },
                    success: function(response) {
                        console.log(response);

                        //next page
                        window.location.href = '/flightbooking?apiResponse=' + encodeURIComponent(JSON
                            .stringify(response));


                    },
                    error: function(xhr, status, error) {
                        console.log('block room error:', status, error);
                    }
                });
            }



        });
    </script>
@endsection
