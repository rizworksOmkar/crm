@extends('layouts.admin-front')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    {{-- <form id="add_package_form" method="POST" action="{{ route('admin.package.store') }}" enctype="multipart/form-data"> --}}
    <form id="add_package_form">
        {{ csrf_field() }}
        <div class="card">

            <div class="card-header">
                <h4>Add Package</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Select Category</label>
                    <div class="col-sm-9">
                        <select name="category" id="category" class="form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="1">International</option>
                            <option value="0">Domaestic</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="package_name" class="col-sm-3 col-form-label">Package Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="package_name" name="package_name"
                            placeholder="Package Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon_photo" class="col-sm-3 col-form-label">Upload Package Image </label>

                    <div class="col-sm-9">

                        <div class="cropme" style="width: 330px; height: 450px;"></div>
                        <input type="hidden" id="icon_photo" name="icon_photo" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon_photo" class="col-sm-3 col-form-label">Upload Package Banner Image (1400 * 520 )</label>
                    <div class="col-sm-9">

                        <div class="image-preview-container">

                            <div class="preview">
                                <img id="preview-selected-image" />
                            </div>

                            <label for="file-upload">Upload Banner Image </label>

                            <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event);"
                                name="fpackagesBannerImages" />

                        </div>
                        {{-- <div class="cropme" style="width: 330px; height: 450px;"></div>
                        <input type="hidden" id="icon_photo" name="icon_photo" class="form-control"> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Number of Days & Nights</label>
                    <div class="col-sm-9">

                        <div class="input-group">
                            <input type="text" class="form-control numberonly" name="for_number_of_days"
                                id="for_number_of_days" placeholder="For Number of Days ">
                            <input type="text" class="form-control numberonly" name="for_number_of_nights"
                                id="for_number_of_nights" placeholder="For Number of Nights">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Group Departure Or Fixed Departure Or Pacakage
                        Availability</label>
                    <div class="col-sm-9">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Do you want to include Group Departure Or
                                        Fixed Departure Or Pacakage Availability in this given Package? </b>
                                    <input class="form-check-input" type="checkbox" id="chkGDFD" name ="chkGDFD"
                                        value="1" style="margin-left: -1.01rem;"></span>
                            </div>

                            {{-- <input type="date" class="form-control col-lg-3" name="txtGDFDdate" id="txtGDFDdate"> --}}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country_id" class="col-sm-3 col-form-label">Select Country</label>
                    <div class="col-sm-9">
                        <select name="country_id[]" id="country_id" class="form-control select2" multiple="multiple">
                            <option value="">--Select one or more countries--</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state_id" class="col-sm-3 col-form-label">Select State</label>
                    <div class="col-sm-9">
                        <select name="state_id[]" id="state_id" class="form-control select2" multiple="multiple">
                            <option value="">Select</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="city_id" class="col-sm-3 col-form-label">Select City</label>
                    <div class="col-sm-9">
                        <select name="city_id[]" id="city_id" class="form-control select2" multiple="multiple">
                            <option value="">Select</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Arrival & Departure</label>
                    <div class="col-sm-9">

                        <div class="input-group">
                            <input type="text" class="form-control" name="arrival_at" id="arrival_at"
                                placeholder="Arrival At">
                            <input type="text" class="form-control" name="departure_at" id="departure_at"
                                placeholder="Departure At">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Package Snapshot</label>
                    <div class="col-sm-9">
                        <div class="package_details_top_bottom">
                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-plane" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text text-center">
                                    <div class="pretty p-default">
                                        <input type="checkbox" name="chkFlight" id="chkFlight" value="1" />
                                        <div class="state p-primary">
                                            <label>Flight</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-bus" aria-hidden="true"></i>

                                </div>
                                <div class="package_details_top_bottom_text">
                                    <div class="package_details_top_bottom_text text-center">
                                        <div class="pretty p-default ">
                                            <input type="checkbox" name="chkTransfer" id="chkTransfer" value="1" />
                                            <div class="state p-primary">
                                                <label>Transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>Group tour</p> --}}
                                </div>
                            </div>
                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text">
                                    {{-- <h5>Hotel</h5> --}}
                                    <div class="package_details_top_bottom_text text-center">
                                        <div class="pretty p-default ">
                                            <input type="checkbox" name="chkHotel" id="chkHotel" value="1" />
                                            <div class="state p-primary">
                                                <label>Hotel</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>50 people</p> --}}
                                </div>
                            </div>
                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-binoculars" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text text-center">

                                    <div class="pretty p-default ">
                                        <input type="checkbox" name="chkSightseeing" id="chkSightseeing"
                                            value="1" />
                                        <div class="state p-primary">
                                            <label>Sightseeing</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text text-center">
                                    {{-- <h5>Meals</h5> --}}
                                    <div class="pretty p-default ">
                                        <input type="checkbox" name="chkMeals" id="chkMeals" value="1" />
                                        <div class="state p-primary">
                                            <label>Meals</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-train" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text text-center">

                                    <div class="pretty p-default ">
                                        <input type="checkbox" name="chkTrain" id="chkTrain" value="1" />
                                        <div class="state p-primary">
                                            <label>Train</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="package_details_top_bottom_item">
                                <div class="package_details_top_bottom_icon">
                                    <i class="fa fa-cc-visa" aria-hidden="true"></i>
                                </div>
                                <div class="package_details_top_bottom_text text-center">

                                    <div class="pretty p-default ">
                                        <input type="checkbox" name="chkVisa" id="chkVisa" value="1" />
                                        <div class="state p-primary">
                                            <label>Visa</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="short_description" name="short_description" placeholder="Short Description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Long Description</label>
                    <div class="col-sm-9">
                        <textarea class="summernote" id="long_description" name="long_description" placeholder="Long Description"></textarea>
                    </div>
                </div>



                <h5 class="mb-3">Package Rate</h5>

                <div class="form-group row">
                    <label for="on_season_price" class="col-sm-3 col-form-label">Price Per Person</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="price_pp" name="price_pp"
                            placeholder="Price Per Person">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="on_season_price" class="col-sm-3 col-form-label">Discounted Price Per Person</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="discounted_price_pp" name="discounted_price_pp"
                            placeholder="Discounted Price Per Person">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rack_rate" class="col-sm-3 col-form-label">Rack rate</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="rack_rate" name="rack_rate"
                            placeholder="Enter Rack Rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="on_season_rate" class="col-sm-3 col-form-label">On Season rate</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="on_season_rate" name="on_season_rate"
                            placeholder="On Season Rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mid_season_rate" class="col-sm-3 col-form-label">Mid Season rate</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="mid_season_rate" name="mid_season_rate"
                            placeholder="Mid Season Rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="off_season_rate" class="col-sm-3 col-form-label">Off Season rate</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="off_season_rate" name="off_season_rate"
                            placeholder="Off Season Price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="festive_season_rate" class="col-sm-3 col-form-label">Festive Season rate</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="festive_season_rate" name="festive_season_rate"
                            placeholder="Festive Season Rate">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agent_discount" class="col-sm-3 col-form-label">Agent Discount</label>
                    <div class="col-sm-2">
                        <select name="agentdescounttype" id="agentdescounttype" class="form-control form-control-sm">
                            <option value="1">%</option>
                            <option value="2">Flat</option>
                        </select>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="agent_price_pp" name="agent_price_pp"
                            placeholder="Agent Price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="normal_discount" class="col-sm-3 col-form-label">Normal Discount</label>
                    <div class="col-sm-2">
                        <select name="normaldescounttype" id="normaldescounttype" class="form-control form-control-sm">
                            <option value="1">%</option>
                            <option value="2">Flat</option>
                        </select>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="normal_price_pp" name="normal_price_pp"
                            placeholder="Normal Discount">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="normal_discount" class="col-sm-3 col-form-label">Child and Infant Discount <p>(Only give
                            number) <small>2 to 12 years</small></p></label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control numberonly" id="number_child_persentage"
                            name="number_child_persentage" placeholder="How much percentage give discount %">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="city_id" class="col-sm-3 col-form-label">Package Type</label>
                    <div class="col-sm-9">
                        <select name="package_type_id[]" id="package_type_id" class="form-control select2"
                            multiple="multiple">
                            <option value="">Select</option>
                            @foreach ($packageType as $pt)
                                <option value="{{ $pt->id }}">{{ $pt->package_type }}</option>
                            @endforeach
                            {{-- <option value="0">Family</option>
                            <option value="1">Couple</option>
                            <option value="2">Corporate</option>
                            <option value="3">Solo</option>
                            <option value="4">Group</option>
                            <option value="5">Honeymoon</option>
                            <option value="6">Friends</option> --}}
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="city_id" class="col-sm-3 col-form-label">Activities</label>
                    <div class="col-sm-9">
                        <select name="activity_type_id[]" id="activity_type_id" class="form-control select2"
                            multiple="multiple">
                            <option value="">Select</option>
                            @foreach ($packageActivity as $pa)
                                <option value="{{ $pa->id }}">{{ $pa->package_activity }}</option>
                            @endforeach
                            {{-- <option value="0">River Rafting</option>
                            <option value="1">Camping</option>
                            <option value="2">Hiking</option>
                            <option value="3">Off Road Biking/Cycling</option>
                            <option value="4">Paragliding</option>
                            <option value="5">Rock Climbing</option>
                            <option value="6">Skiing</option>
                            <option value="7">Jungle Safari</option>
                            <option value="8">Trekking</option>
                            <option value="9">Water Activities</option>
                            <option value="10">Temple & Heritage</option> --}}


                        </select>

                    </div>
                </div>
                <hr>
                <h5 class="mb-3">Terms &amp; conditions</h5>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Package Inclusion</label>
                    <div class="col-sm-9">
                        {{-- <textarea class="summernote" id="short_description" name="short_description"
                            placeholder="Package Inclusion"></textarea> --}}
                        <textarea class="summernote" id="pacakage_inclusion" name="pacakage_inclusion"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pacakage Exclusions</label>
                    <div class="col-sm-9">
                        {{-- <textarea class="summernote" id="short_description" name="short_description"
                            placeholder="Package Inclusion"></textarea> --}}
                        <textarea class="summernote" id="pacakage_exclusions" name="pacakage_exclusions"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Payment policy</label>
                    <div class="col-sm-9">
                        {{-- <textarea class="summernote" id="short_description" name="short_description"
                            placeholder="Package Inclusion"></textarea> --}}
                        <textarea class="summernote" id="payment_policy" name="payment_policy"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cancelation policy</label>
                    <div class="col-sm-9">
                        {{-- <textarea class="summernote" id="short_description" name="short_description"
                            placeholder="Package Inclusion"></textarea> --}}
                        <textarea class="summernote" id="cancelation_policy" name="cancelation_policy"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Terms & Conditions</label>
                    <div class="col-sm-9">
                        {{-- <textarea class="summernote" id="short_description" name="short_description"
                            placeholder="Package Inclusion"></textarea> --}}
                        <textarea class="summernote" id="terms_conditions" name="terms_conditions"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="submitPackage">Add +</button>
            </div>
        </div>
    </form>

    <div id='modal'></div>
    <div id='preview'>
        <div class='buttons'>
            <div class='cancel'></div>
            <div class='ok'></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const previewImage = (event) => {

            const files = event.target.files;
            if (files.length > 0) {
                var targetefilesize = files[0].size;
                if (targetefilesize > 1000000) {
                    swal({
                        title: "Gallery Picture Uploading Fail",
                        text: "Upload Gallery picture in less than 1 MB!",
                        icon: "error",
                    });
                    return false;
                } else {
                    const imageFiles = event.target.files;

                    const imageFilesLength = imageFiles.length;

                    if (imageFilesLength > 0) {
                        /**
                         * Get the image path.
                         */
                        const imageSrc = URL.createObjectURL(imageFiles[0]);
                        /**
                         * Select the image preview element.
                         */
                        const imagePreviewElement = document.querySelector("#preview-selected-image");
                        /**
                         * Assign the path to the image preview element.
                         */
                        imagePreviewElement.src = imageSrc;
                        /**
                         * Show the element by changing the display value to "block".
                         */
                        imagePreviewElement.style.display = "block";
                    }
                }
            } else {

                const imagePreviewElement = document.querySelector("#preview-selected-image");
                imagePreviewElement.src = "";
                imagePreviewElement.style.display = "none";
            }
        };
        $(document).ready(function() {

            $('.cropme').simpleCropper();


            // $('#chkGDFD').change(function() {
            //     var status = this.checked;
            //     if (status)
            //         $('#txtGDFDdate').prop("disabled", false);
            //     else
            //         $('#txtGDFDdate').prop("disabled", true);
            //         $('#txtGDFDdate').val('')
            //             .attr('type', 'text')
            //             .attr('type', 'date');
            // })
            // $("#txtGDFDdate").attr("disabled", "disabled");

            $('.numberonly').keypress(function(e) {

                var charCode = (e.which) ? e.which : event.keyCode

                if (String.fromCharCode(charCode).match(/[^0-9]/g))

                    return false;

            });

            var options2 = {
                'maxCharacterSize': 150,
                'originalStyle': 'originalTextareaInfo',
                'warningStyle': 'warningTextareaInfo',
                'warningNumber': 86,
                'displayFormat': '#input/#max | #words words'
            };
            $('#short_description').textareaCount(options2);
        });



        $('#country_id').on('change', function() {
            var country_ids = $(this).val();

            if (country_ids) {
                // Clear state and city dropdowns
                $('#state_id').empty().append('<option value="">Select</option>');
                $('#city_id').empty().append('<option value="">Select</option>');

                $.each(country_ids, function(index, country_id) {
                    $.ajax({
                        url: '/get-states/' + country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Append states to state dropdown
                            $.each(data, function(key, value) {
                                $('#state_id').append('<option value="' + value.id +
                                    '">' + value.state_name + '</option>');
                            });
                        }
                    });
                    $.ajax({
                        url: '/get-cities/' + country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Append cities to city dropdown
                            $.each(data, function(key, value) {
                                $('#city_id').append('<option value="' + value.id +
                                    '">' + value.city_name + '</option>');
                            });
                        }
                    });
                });
            } else {
                $('#state_id').empty().append('<option value="">Select</option>');
                $('#city_id').empty().append('<option value="">Select</option>');
            }

        });

        $('#submitPackage').click(function(event) {
            event.preventDefault();

            var myform = document.getElementById("add_package_form");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.package.store') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.message == 'success') {
                        swal({
                            title: "Success",
                            text: "Data Updated Successfully.",
                            icon: "success",
                            button: "OK",
                        }).then((willconfirm) => {
                            if (willconfirm) {
                                window.location.replace("/addpackage");;
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

                },
            });


        });

        $('#for_number_of_days').keyup(function() {
            var textValue = $(this).val();
            var noofnights = 0;
            noofnights = parseInt(textValue) - 1;
            if (noofnights > 0) {
                $('#for_number_of_nights').val(noofnights);
            } else {
                $('#for_number_of_nights').val('');
            }
        });
        $('#for_number_of_nights').keyup(function() {
            var textValue = $(this).val();
            var noofdays = 0;
            noofdays = parseInt(textValue) + 1;
            if (noofdays > 0) {
                $('#for_number_of_days').val(noofdays);
            } else {
                $('#for_number_of_days').val('');
            }
        });
    </script>
@endsection
