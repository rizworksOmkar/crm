@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="card">

        <div class="card-header">
            <h4>Add Destination</h4>
        </div>
        <div class="card-body">
            <form id="fromdestination">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label">Select Category</label>
                    <input type="hidden" name="destination_id" id="destination_id" value="{{ $destination->id }}">
                    <div class="col-sm-9">
                        <select name="category" id="category" class="form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="1" {{ $destination->category == 1 ? 'selected' : '' }}>International
                            </option>
                            <option value="0" {{ $destination->category == 0 ? 'selected' : '' }}>Domestic</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="destination_name" class="col-sm-3 col-form-label">Destination Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="destination_name" name="destination_name"
                            placeholder="Destination Name" value="{{ $destination->destination_name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country_id" class="col-sm-3 col-form-label">Select Country</label>
                    <div class="col-sm-9">
                        <select name="country_id[]" id="country_id" class="form-control select2" multiple="multiple">
                            <option value="">--Select one or more countries--</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ in_array($country->id, explode(',', $destination->country_id)) ? 'selected' : '' }}>
                                    {{ $country->country_name }}</option>
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
                                <option value="{{ $state->id }}"
                                    {{ in_array($state->id, explode(',', $destination->state_id)) ? 'selected' : '' }}>
                                    {{ $state->state_name }}</option>
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
                                <option value="{{ $city->id }}"
                                    {{ in_array($city->id, explode(',', $destination->city_id)) ? 'selected' : '' }}>
                                    {{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Short Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control form-control-sm" id="short_description" name="short_description"
                            placeholder="Short Description">{{ $destination->short_description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Price Range</label>
                    <div class="col-sm-9">

                        <div class="input-group">
                            <input type="text" class="form-control" name="price_range_1" id="price_range_1"
                                placeholder="From" value="{{ $destination->price_range_1 }}">
                            <input type="text" class="form-control" name="price_range_2" id="price_range_2"
                                placeholder="To" value="{{ $destination->price_range_2 }}">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon_photo" class="col-sm-3 col-form-label">Upload Destination thumbnail photo</label>
                    <div class="col-sm-9">

                        <div class="cropme" style="width: 210px; height: 205px;">
                            @if ($destination->main_photo)
                                <img src="{{ asset($destination->main_photo) }}" alt="Current Package Image"
                                    style="max-width: 100%; max-height: 100%;">
                            @endif
                        </div>
                        <input type="hidden" id="icon_photo" name="icon_photo" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="secondary_photo_1" class="col-sm-3 col-form-label">Change Banner Photo <p><small>(width
                                1920px
                                & height 400px)</small></p> </label>

                    <div class="col-sm-9">
                        <div class="image-preview-container @if ($destination->secondary_photo_1) has-image @endif">

                            @if ($destination->secondary_photo_1)
                                <img id="preview-selected-image" src="{{ $destination->secondary_photo_1 }}"
                                    class="img" />
                            @else
                                <div class="preview">
                                    <img id="preview-selected-image" />
                                </div>
                            @endif

                            @if ($destination->secondary_photo_1)
                                <label for="file-upload">Changed Image </label>
                            @else
                                <label for="file-upload">Upload Image </label>
                            @endif
                            <input type="file" id="file-upload" accept="image/*" onchange="previewImage(event);"
                                name="fpBannerphoto" />
                        </div>

                    </div>
                </div>


            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="submitDestination">Add +</button>
        </div>

    </div>


    {{-- </form> --}}
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
        $(document).ready(function() {
            $('.cropme').simpleCropper();

            var options2 = {
                'maxCharacterSize': 150,
                'originalStyle': 'originalTextareaInfo',
                'warningStyle': 'warningTextareaInfo',
                'warningNumber': 86,
                'displayFormat': '#input/#max | #words words'
            };
            $('#short_description').textareaCount(options2);

        });

        const previewImage = (event) => {

            const files = event.target.files;
            if (files.length > 0) {
                var targetefilesize = files[0].size;
                if (targetefilesize > 1000000) {
                    swal({
                        title: "Banner Picture Uploading Fail",
                        text: "Upload Banner picture in less than 1 MB!",
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
    </script>
    <script>
        $('#country_id').on('change', function() {
            var country_ids = $(this).val();

            if (country_ids) {

                $('#state_id').empty().append('<option value="">Select</option>');
                $('#city_id').empty().append('<option value="">Select</option>');

                $.each(country_ids, function(index, country_id) {
                    $.ajax({
                        url: '/get-states/' + country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {

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
                // Clear state and city dropdowns
                $('#state_id').empty().append('<option value="">Select</option>');
                $('#city_id').empty().append('<option value="">Select</option>');
            }

        });
        $('#submitDestination').click(function(event) {
            event.preventDefault();

            var myform = document.getElementById("fromdestination");
            var destinationId = $('#destination_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/updateDestination/" + destinationId,
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
                                window.location.replace("/destination-index");
                            }
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: "Error Occurred. Please try again later.",
                            icon: "error",
                            button: "OK",
                        });
                    }
                },
            });
        });
    </script>
@endsection
