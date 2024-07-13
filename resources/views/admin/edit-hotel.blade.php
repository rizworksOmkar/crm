@extends('layouts.admin-front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <form id="add_hotel_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Edit Hotel</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form id="frmhotel">
                        <input type="hidden" id="hdnhotelID" name="hdnhotelID" value="{{ $hotel->id }}">
                        <div class="form-group">
                            <label for="hotel_name">Hotel Name *</label>
                            <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                                placeholder="Input Hotel Name" value="{{ $hotel->hotel_name }}">
                        </div>

                        <div class="form-group">
                            <label for="hotel_name">Hotel Description *</label>
                            <textarea class="summernote" id="hotel_description" name="hotel_description">{{ $hotel->hotel_description }}</textarea>
                        </div>
                        <div class="form-group row">
                            <label for="icon_photo" class="col-sm-3 col-form-label">Old Hotel Image</label>
                            <div class="col-sm-9">
                                <img src="{{ asset($hotel->hotel_imege) }}" alt="Current Package Image"
                                    style="max-width: 100%; max-height: 100%;">
                                <input type="hidden" id="exiting_icon_photo" name="exiting_icon_photo" class="form-control"
                                    value="{{ $hotel->hotel_imege }}">
                                {{-- <div class="cropme" style="width: 300px; height: 400px;"></div>
                                <input type="hidden" id="icon_photo" name="icon_photo" class="form-control"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon_photo" class="col-sm-3 col-form-label">Upload Hotel Image</label>
                            <div class="col-sm-9">

                                <div class="cropme" style="width: 300px; height: 400px;"></div>
                                <input type="hidden" id="icon_photo" name="icon_photo" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="city_id">Location Name *</label>
                                <input type="text" class="form-control" id="location_name" name="location_name"
                                    placeholder="Input Location Name" value="{{ $hotel->location_name }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city_id">Select City *</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="0">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $city->id == $hotel->city_id ? 'selected' : '' }}>
                                            {{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="country_id">Select Country *</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    <option value="{{ $hotel->country_id }}">{{ getCountryName($hotel->country_id) }}
                                    </option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state_id">Select State</label>
                                <select name="state_id" id="state_id" class="form-control">
                                    <option value="{{ $hotel->state_id }}">{{ getStateName($hotel->state_id) }}</option>
                                </select>
                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hotel_star">Select Star Category Hotel *</label>
                                <select name="hotel_star" id="hotel_star" class="form-control">
                                    <option value="0">Select </option>
                                    @if ($hotel->hotel_star == 1)
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 2)
                                        <option value="1">1</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 3)
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 4)
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 5)
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 6)
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 6 ? 'selected' : '' }}>6</option>
                                        <option value="7">7</option>
                                    @elseif ($hotel->hotel_star == 7)
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="{{ $hotel->hotel_star }}"
                                            {{ $hotel->hotel_star == 7 ? 'selected' : '' }}>7</option>
                                    @else
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hotel_type">Hotel Property Type *</label>
                                <select name="hotel_type" id="hotel_type" class="form-control">
                                    <option value="0">Select Property Type</option>
                                    @foreach ($HotelProperty as $property)
                                        <option value="{{ $property->id }}"
                                            {{ $property->id == $hotel->hotel_type ? 'selected' : '' }}>
                                            {{ $property->propertytype }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="hotel_bacic_amenities">Basic Amenities</label>
                            <div class="package_details_top_bottom">
                                <div class="package_details_top_bottom_item">
                                    <div class="package_details_top_bottom_icon">
                                        <i class="fa fa-wifi" aria-hidden="true"></i>
                                    </div>
                                    <div class="package_details_top_bottom_text text-center">
                                        <div class="pretty p-default">

                                            <input type="checkbox" name="chkWifi" id="chkWifi" value="1"
                                                {{ $hotel->wifi == 1 ? 'checked' : '' }} />
                                            <div class="state p-primary">
                                                <label>Wi-Fi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="package_details_top_bottom_item">
                                    <div class="package_details_top_bottom_icon">
                                        <i class="fa fa-bed" aria-hidden="true"></i>

                                    </div>
                                    <div class="package_details_top_bottom_text">
                                        <div class="package_details_top_bottom_text text-center">
                                            <div class="pretty p-default ">
                                                <input type="checkbox" name="chkRoomService" id="chkRoomService"
                                                    value="1" {{ $hotel->roomservice == 1 ? 'checked' : '' }} />
                                                <div class="state p-primary">
                                                    <label>Room Service</label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <p>Group tour</p> --}}
                                    </div>
                                </div>
                                <div class="package_details_top_bottom_item">
                                    <div class="package_details_top_bottom_icon">
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                    </div>
                                    <div class="package_details_top_bottom_text">
                                        {{-- <h5>Hotel</h5> --}}
                                        <div class="package_details_top_bottom_text text-center">
                                            <div class="pretty p-default ">
                                                <input type="checkbox" name="chkParking" id="chkParking" value="1"
                                                    {{ $hotel->parking == 1 ? 'checked' : '' }} />
                                                <div class="state p-primary">
                                                    <label>Parking</label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <p>50 people</p> --}}
                                    </div>
                                </div>
                                <div class="package_details_top_bottom_item">
                                    <div class="package_details_top_bottom_icon">
                                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                                    </div>
                                    <div class="package_details_top_bottom_text text-center">

                                        <div class="pretty p-default ">
                                            <input type="checkbox" name="chkRestaurants" id="chkRestaurants"
                                                value="1" {{ $hotel->restaurants == 1 ? 'checked' : '' }} />
                                            <div class="state p-primary">
                                                <label>Restaurants</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="package_details_top_bottom_item">
                                    <div class="package_details_top_bottom_icon">
                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                    </div>
                                    <div class="package_details_top_bottom_text text-center">
                                        {{-- <h5>Meals</h5> --}}
                                        <div class="pretty p-default ">
                                            <input type="checkbox" name="chkCCTV" id="chkCCTV" value="1"
                                                {{ $hotel->cctv == 1 ? 'checked' : '' }} />
                                            <div class="state p-primary">
                                                <label>CCTV</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <h6 class="mt-3">Others Charges</h6>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="hotel_star">Breakfast Facility*</label>
                                <select name="ddlbreakfast" id="ddlbreakfast" class="form-control">
                                    <option value="0">Select Facility</option>
                                    @if ($hotel->breakfast_included == 1)
                                        <option value="{{ $hotel->breakfast_included }}"
                                            {{ $hotel->breakfast_included == 1 ? 'selected' : '' }}>Compulsory</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->breakfast_included == 2)
                                        <option value="1">Compulsory</option>
                                        <option value="{{ $hotel->breakfast_included }}"
                                            {{ $hotel->breakfast_included == 2 ? 'selected' : '' }}>Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->breakfast_included == 3)
                                        <option value="1">Compulsory</option>
                                        <option value="2">Optional</option>
                                        <option value="{{ $hotel->breakfast_included }}"
                                            {{ $hotel->breakfast_included == 3 ? 'selected' : '' }}>Not Included</option>
                                    @else
                                        <option value="1">Compulsory</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Cost Of Breakfast *</label>
                                <input type="text" class="form-control numberonly" id="breakfast_cost"
                                    name="breakfast_cost" placeholder="Input Cost Of Breakfast"
                                    value="{{ $hotel->breakfast_cost }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Discount Of Breakfast *</label>

                                <div class="input-group colorpickerinput">
                                    <input type="text" id="discount_breakfast" name="discount_breakfast"
                                        class="form-control numberonly" value="{{ $hotel->breakfast_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">After Dicounted Amount *</label>
                                <input type="text" class="form-control numberonly" id="after_discounted_amount"
                                    name="after_discounted_amount" placeholder="After Dicounted amount"
                                    value="{{ $hotel->breakfast_discount_cost }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="hotel_star">Extra Bed Facility*</label>
                                <select name="ddlExtrabed" id="ddlExtrabed" class="form-control">
                                    <option value="0">Select Facility</option>
                                    @if ($hotel->extrabed_included == 1)
                                        <option value="{{ $hotel->extrabed_included }}"
                                            {{ $hotel->extrabed_included == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->extrabed_included == 2)
                                        <option value="1">Yes</option>
                                        <option value="{{ $hotel->extrabed_included }}"
                                            {{ $hotel->extrabed_included == 2 ? 'selected' : '' }}>Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->extrabed_included == 3)
                                        <option value="1">Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="{{ $hotel->extrabed_included }}"
                                            {{ $hotel->extrabed_included == 3 ? 'selected' : '' }}>Not Included</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Cost For Extra Bed *</label>
                                <input type="text" class="form-control numberonly" id="extrabed_cost"
                                    name="extrabed_cost" placeholder="Input Cost For Extra Bed"
                                    value="{{ $hotel->extrabed_cost }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Discount For Extra Bed *</label>

                                <div class="input-group colorpickerinput">
                                    <input type="text" id="discount_extrabed" name="discount_extrabed"
                                        class="form-control numberonly" value="{{ $hotel->extrabed_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">After Dicounted Amount *</label>
                                <input type="text" class="form-control numberonly"
                                    id="after_discounted_extrabedamount" name="after_discounted_extrabedamount"
                                    placeholder="After Dicounted amount" value="{{ $hotel->extrabed_discount_cost }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="hotel_star">Extra Person Facility*</label>
                                <select name="ddlExtraPerson" id="ddlExtraPerson" class="form-control">
                                    <option value="0">Select Facility</option>
                                    @if ($hotel->extraperson_included == 1)
                                        <option value="{{ $hotel->extraperson_included }}"
                                            {{ $hotel->extraperson_included == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->extraperson_included == 2)
                                        <option value="1">Yes</option>
                                        <option value="{{ $hotel->extraperson_included }}"
                                            {{ $hotel->extraperson_included == 2 ? 'selected' : '' }}>Optional</option>
                                        <option value="3">Not Included</option>
                                    @elseif ($hotel->extraperson_included == 3)
                                        <option value="1">Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="{{ $hotel->extraperson_included }}"
                                            {{ $hotel->extraperson_included == 3 ? 'selected' : '' }}>Not Included</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Not Included</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Extra Person Charges</label>
                                <input type="text" class="form-control numberonly" id="extra_person_charge"
                                    name="extra_person_charge" value="{{ $hotel->extraperson_cost }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Discount For Extra Person *</label>

                                <div class="input-group colorpickerinput">
                                    <input type="text" id="discount_extraPerson" name="discount_extraPerson"
                                        class="form-control numberonly" value="{{ $hotel->extraperson_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">After Dicounted Amount *</label>
                                <input type="text" class="form-control numberonly"
                                    id="after_discounted_extraPersonamount" name="after_discounted_extraPersonamount"
                                    placeholder="After Dicounted amount" value="{{ $hotel->extraperson_discount_cost }}">
                            </div>
                        </div>

                        <h6 class="mt-3">Terms and Conditions</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dtpfreecancelation">Free Cancelation Date * </label>
                                <input type="date" name="dtpfreecancelation" id="dtpfreecancelation"
                                    class="form-control" value="{{ $hotel->cancel_date }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="timecheckin">Check In Time * </label>
                                <input type="time" name="timecheckin" id="timecheckin" class="form-control"
                                    value="{{ $hotel->check_in_time }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="timeCheckOut">Check Out Time * </label>
                                <input type="time" name="timeCheckOut" id="timeCheckOut" class="form-control"
                                    value="{{ $hotel->check_out_time }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtExclusiveOffer">Exclusive Offer</label>
                            <input type="text" name="txtExclusiveOffer" id="txtExclusiveOffer" class="form-control"
                                value="{{ $hotel->exclusive_offer }}">
                        </div>
                        <div class="form-group">
                            <label for="child_policy">Child Policy * </label>
                            <textarea class="summernote" id="child_policy" name="child_policy" placeholder="Children policy">{{ $hotel->child_policy }}</textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="child_age_relaxation">Child Age Relaxation *</label>
                            <input type="number" class="form-control" id="child_age_relaxation"
                                name="child_age_relaxation" placeholder="Input age"
                                value="{{ $hotel->child_age_relaxation }}">
                        </div>


                        <h6 class="mt-3">Minimum Cost</h6>
                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="hotel_type">Minimum Rack rate *</label>
                                <input type="text" class="form-control" id="rack_rate" name="rack_rate"
                                    placeholder="Input Minimum Rack rate" value="{{ $hotel->minimum_rack_rate }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Base Discount *</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="base_discount" name="base_discount" class="form-control"
                                        value="{{ $hotel->base_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Special Discount *</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="special_discount" name="special_discount"
                                        class="form-control" value="{{ $hotel->special_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hotel_type">Agent Discount *</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" id="agent_discount" name="agent_discount" class="form-control"
                                        value="{{ $hotel->agent_discount }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add +</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.cropme').simpleCropper();
            $('.numberonly').keypress(function(e) {

                var charCode = (e.which) ? e.which : event.keyCode

                if (String.fromCharCode(charCode).match(/[^0-9]/g))

                    return false;

            });
            var breakfastLoad = $('#ddlbreakfast').val();
            var extrabedLoad = $('#ddlExtrabed').val();
            var extraperonLoad = $('#ddlExtraPerson').val();
            if (breakfastLoad == 3 || breakfastLoad == 0) {
                $('#breakfast_cost').prop("disabled", true);
                $('#discount_breakfast').prop("disabled", true);
                $('#after_discounted_amount').prop("disabled", true);

            } else {
                $('#breakfast_cost').prop("disabled", false);
                $('#discount_breakfast').prop("disabled", false);
                $('#after_discounted_amount').prop("disabled", false);
            }

            if (extrabedLoad == 3 || extrabedLoad == 0) {
                $('#extrabed_cost').prop("disabled", true);
                $('#discount_extrabed').prop("disabled", true);
                $('#after_discounted_extrabedamount').prop("disabled", true);

            } else {
                $('#extrabed_cost').prop("disabled", false);
                $('#discount_extrabed').prop("disabled", false);
                $('#after_discounted_extrabedamount').prop("disabled", false);
            }

            if (extraperonLoad == 3 || extraperonLoad == 0) {
                $('#extra_person_charge').prop("disabled", true);
                $('#discount_extraPerson').prop("disabled", true);
                $('#after_discounted_extraPersonamount').prop("disabled", true);
            } else {
                $('#extra_person_charge').prop("disabled", false);
                $('#discount_extraPerson').prop("disabled", false);
                $('#after_discounted_extraPersonamount').prop("disabled", false);
            }

            $('#city_id').on('change', function() {
                var cityId = $(this).val();

                if (cityId) {
                    $.ajax({
                        url: '{{ route('getCityDetails', '') }}/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#country_id').empty().append('<option value="' + parseInt(data
                                .country_id) + '">' + data.country_name + '</option>');
                            if (data.state_id) {
                                $('#state_id').empty().append('<option value="' + parseInt(data
                                    .state_id) + '">' + data.state_name + '</option>');
                            } else {
                                $('#state_id').empty();
                            }
                        }


                    });
                } else {
                    $('#country_id').val(0);
                    $('#state_id').val(0);
                }
            });

            $('#ddlbreakfast').on('change', function() {
                var breakfast = $(this).val();

                if (breakfast == 3 || breakfast == 0) {
                    $('#breakfast_cost').prop("disabled", true);
                    $('#discount_breakfast').prop("disabled", true);
                    $('#after_discounted_amount').prop("disabled", true);
                    $('#after_discounted_amount').val('');
                    $('#discount_breakfast').val('');
                    $('#breakfast_cost').val('');

                } else {
                    $('#breakfast_cost').prop("disabled", false);
                    $('#discount_breakfast').prop("disabled", false);
                    $('#after_discounted_amount').prop("disabled", false);
                }
            });


            $('#ddlExtrabed').on('change', function() {
                var extrabed = $(this).val();

                if (extrabed == 3 || extrabed == 0) {
                    $('#extrabed_cost').prop("disabled", true);
                    $('#discount_extrabed').prop("disabled", true);
                    $('#after_discounted_extrabedamount').prop("disabled", true);

                    $('#extrabed_cost').val('');
                    $('#discount_extrabed').val('');
                    $('#after_discounted_extrabedamount').val('');

                } else {
                    $('#extrabed_cost').prop("disabled", false);
                    $('#discount_extrabed').prop("disabled", false);
                    $('#after_discounted_extrabedamount').prop("disabled", false);
                }
            });


            $('#ddlExtraPerson').on('change', function() {
                var extraperon = $(this).val();

                if (extraperon == 3 || extraperon == 0) {
                    $('#extra_person_charge').prop("disabled", true);
                    $('#discount_extraPerson').prop("disabled", true);
                    $('#after_discounted_extraPersonamount').prop("disabled", true);

                    $('#extra_person_charge').val('');
                    $('#discount_extraPerson').val('');
                    $('#after_discounted_extraPersonamount').val('');


                } else {
                    $('#extra_person_charge').prop("disabled", false);
                    $('#discount_extraPerson').prop("disabled", false);
                    $('#after_discounted_extraPersonamount').prop("disabled", false);
                }
            });

            $("#discount_breakfast").keyup(function() {
                var textValue = $(this).val();
                var originalcost = $('#breakfast_cost').val();
                var discounted = (parseInt(originalcost) * parseInt(textValue)) / 100;
                var afterdiscount_originalamont = parseInt(originalcost) - parseInt(discounted);
                if (afterdiscount_originalamont > 0) {
                    $('#after_discounted_amount').val(afterdiscount_originalamont);
                } else {
                    $('#after_discounted_amount').val('');
                }
            });


            $("#discount_extrabed").keyup(function() {
                var textValue = $(this).val();
                var originalcost = $('#extrabed_cost').val();
                var discounted = (parseInt(originalcost) * parseInt(textValue)) / 100;
                var afterdiscount_originalamont = parseInt(originalcost) - parseInt(discounted);
                if (afterdiscount_originalamont > 0) {
                    $('#after_discounted_extrabedamount').val(afterdiscount_originalamont);
                } else {
                    $('#after_discounted_extrabedamount').val('');
                }
            });

            $("#discount_extraPerson").keyup(function() {
                var textValue = $(this).val();
                var originalcost = $('#extra_person_charge').val();
                var discounted = (parseInt(originalcost) * parseInt(textValue)) / 100;
                var afterdiscount_originalamont = parseInt(originalcost) - parseInt(discounted);
                if (afterdiscount_originalamont > 0) {
                    $('#after_discounted_extraPersonamount').val(afterdiscount_originalamont);
                } else {
                    $('#after_discounted_extraPersonamount').val('');
                }
            });


            // $('#for_number_of_days').keyup(function() {
            //     var textValue = $(this).val();
            //     var noofnights = 0;
            //     noofnights = parseInt(textValue) - 1;
            //     if (noofnights > 0) {
            //         $('#for_number_of_nights').val(noofnights);
            //     } else {
            //         $('#for_number_of_nights').val('');
            //     }
            // });

            $('#add_hotel_form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin-hotel-update') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.message == 'success') {
                            swal({
                                title: "Success",
                                text: "Data Updated Successfully.",
                                icon: "success",
                                button: "OK",
                            }).then((willconfirm) => {
                                if (willconfirm) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Error Occured. Please try again later.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
