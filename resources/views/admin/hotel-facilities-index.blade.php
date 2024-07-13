@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Hotel Facilities</h4>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="hotelid">Select Hotel *</label>
                    <select name="hotelid" id="hotelid" class="form-control select2">
                        <option value="0">Select Hotel</option>
                        @foreach ($listofHotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--Amenities-->
            <div class="card">
                <div class="card-header">
                    <h4>Add Hotel Amenities</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restrictions">Amenities *</label>
                        <table class="table table-sm" id="tblAmenities" style="font-size: 13px;">

                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">hotel Id</th>
                                    <th scope="col">Amenities</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <form id="frmhotalAmenities">
                                    {{ csrf_field() }}
                                    <tr>

                                        <td style="display: none">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="hdnhotelidAmenities"
                                                    id="hdnhotelidAmenities">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                {{-- <input type="text" class="form-control form-control-sm"
                                                    name="txtAmenities" id="txtAmenities"> --}}
                                                <select name="ddlAmenities" id="ddlAmenities" class="form-control select2">
                                                    <option value="0">Select Amenities</option>
                                                    @foreach ($listofAmenities as $amenities)
                                                        <option value="{{ $amenities->id }}">{{ $amenities->amenities }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </td>


                                        <td>
                                            <div class="buttons">
                                                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                                        id="addSeasonIndoor">+</a> --}}
                                                <button type="submit" class="btn btn-sm btn-warning addRow"
                                                    id="addAmenities">+</button>
                                            </div>
                                        </td>

                                    </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <!--PROPERTY RULES-->
            <div class="card">
                <div class="card-header">
                    <h4>Add Property Rules
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restrictions">Property Rules *</label>
                        <table class="table table-sm" id="tblPropertyRules" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">hotel Id</th>
                                    <th scope="col">Rules</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <form id="frmhotalPropertyRules">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td style="display: none">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="hdnhotelidPropRules"
                                                    id="hdnhotelidPropRules">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select name="ddlPropRules" id="ddlPropRules" class="form-control select2">
                                                    <option value="0">Select Amenities</option>
                                                    @foreach ($listofPropRules as $rules)
                                                        <option value="{{ $rules->id }}">{{ $rules->property_rules }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="buttons">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                                    id="addPropRules">+</a>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-footer">
            <a href="javascript:void(0);" class="btn btn-primary" id="saveMenu">Save & exit</a>
            <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back</a>
        </div>
    </div>


    <div class="modal fade" id="deleteModalAmenities" tabindex="-1" aria-labelledby="deleteModalAmenities"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalAmenities">Delete Aminities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_Amenities_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_Amenities_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModalProperty" tabindex="-1" aria-labelledby="deleteModalProperty"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalProperty">Delete Hotel Property Rules</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_property_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_property_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="deletemodalReception" tabindex="-1" aria-labelledby="deletemodalReception" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodalReception">Delete Season</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_reception_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_reception_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Delete Modal for category and subcategory ends --}}
@endsection
@section('scripts')
    <script>
        $(document).on('change', '#hotelid', function() {
            var valHotelID = $(this).val();
            $('#hdnhotelidAmenities').val(valHotelID);
            $('#hdnhotelidPropRules').val(valHotelID);
            if (valHotelID > 0) {

                $.ajax({
                    url: "{{ route('admin-hotel-Amenities-details') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelid": valHotelID,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblAmenities tbody').html("");

                        $.each(response.hotelAminities, function(key, item) {


                            $('#tblAmenities tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.hotel_id +
                                '</td>' +
                                '<td>' +
                                item.amenities +
                                '</td>' +

                                '<td>' +
                                '<button type="button" value="' +
                                item
                                .id +
                                '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deleteModalAmenities">-</button>' +
                                '</td>' +
                                '</tr>'
                            );
                        });

                    }
                });

                // Rules
                $.ajax({
                    url: "{{ route('admin-hotel-Rules-details') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelid": valHotelID,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblPropertyRules tbody').html("");

                        $.each(response.hotelPropertyruls, function(key, itemProperty) {


                            $('#tblPropertyRules tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                itemProperty.hotel_id +
                                '</td>' +
                                '<td>' +
                                itemProperty.property_rules +
                                '</td>' +

                                '<td>' +
                                '<button type="button" value="' +
                                itemProperty
                                .id +
                                '" class="btn btn-danger deleteRowpropert" data-toggle="modal" data-target="#deleteModalProperty">-</button>' +
                                '</td>' +
                                '</tr>'
                            );
                        });

                    }
                });

            } else {
                $('#tblAmenities tbody').html("");
                $('#tblPropertyRules tbody').html("");
            }


        });

        $('#addAmenities').on('click', function(event) {
            event.preventDefault();
            $hdnhotelidAmenities = $('#hdnhotelidAmenities').val();
            $ddlAmenities = $('#ddlAmenities').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnhotelidAmenities == 0 || $hdnhotelidAmenities == "") {
                alert("Select Hotel");
                return false;
            }
            if ($ddlAmenities == 0) {
                alert("Select Aminities");
                return false;
            }

            // Save ***
            var myform = document.getElementById("frmhotalAmenities");
            $.ajax({
                url: "{{ route('admin-hotel-Amenities-details-store') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,

                success: function(data) {
                    // Fetch
                    if (data.message == "success") {
                        $.ajax({
                            url: "{{ route('admin-hotel-Amenities-details') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "hotelid": $hdnhotelidAmenities,
                            },
                            dataType: "json",
                            success: function(response) {

                                $('#tblAmenities tbody').html("");


                                $.each(response.hotelAminities, function(key, item) {

                                    $('#tblAmenities tbody').append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        item.hotel_id +
                                        '</td>' +
                                        '<td>' +
                                        item.amenities +
                                        '</td>' +

                                        '<td>' +
                                        '<button type="button" value="' +
                                        item
                                        .id +
                                        '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deleteModalAmenities">-</button>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                });


                            }
                        });

                    } else {
                        alert("Data Not Saved");
                        return false;
                    }
                }
            });


        });


        $('#addPropRules').on('click', function(event) {
            event.preventDefault();
            $hdnhotelidPropRules = $('#hdnhotelidPropRules').val();
            $ddlPropRules = $('#ddlPropRules').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnhotelidPropRules == 0 || $hdnhotelidPropRules == "") {
                alert("Select Hotel");
                return false;
            }
            if ($ddlPropRules == 0) {
                alert("Select Property Rules");
                return false;
            }

            // Save ***
            var myform = document.getElementById("frmhotalPropertyRules");
            $.ajax({
                url: "{{ route('admin-hotel-Property-details-store') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,

                success: function(datasave) {
                    // Fetch
                    if (datasave.message == "success") {
                        $.ajax({
                            url: "{{ route('admin-hotel-Rules-details') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "hotelid": $hdnhotelidPropRules,
                            },
                            dataType: "json",
                            success: function(response) {

                                $('#tblPropertyRules tbody').html("");

                                $.each(response.hotelPropertyruls, function(key,
                                    itemProperty) {
                                    $('#tblPropertyRules tbody').append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        itemProperty.hotel_id +
                                        '</td>' +
                                        '<td>' +
                                        itemProperty.property_rules +
                                        '</td>' +
                                        '<td>' +
                                        '<button type="button" value="' +
                                        itemProperty
                                        .id +
                                        '" class="btn btn-danger deleteRowpropert" data-toggle="modal" data-target="#deleteModalProperty">-</button>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                });
                            }
                        });
                    } else {
                        alert("Data Not Saved");
                        return false;
                    }
                }
            });


        });

        // // Delete

        $(document).on('click', '.deleteRow', function(e) {
            e.preventDefault();
            var amenities_id = $(this).val();
            $('#delete_Amenities_id').val(amenities_id);

        });

        $(document).on('click', '.deleteRowpropert', function(e) {
            e.preventDefault();
            var property_id = $(this).val();
            $('#delete_property_id').val(property_id);

        });

        $('.delete_Amenities_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_Amenities_id = $('#delete_Amenities_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/hotelAmenitiesDetails/" + delete_Amenities_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');

                    $hdnhotelidAmenities = $('#hdnhotelidAmenities').val();
                    $.ajax({
                        url: "{{ route('admin-hotel-Amenities-details') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "hotelid": $hdnhotelidAmenities,
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#tblAmenities tbody').html("");


                            $.each(response.hotelAminities, function(key, item) {

                                $('#tblAmenities tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.hotel_id +
                                    '</td>' +
                                    '<td>' +
                                    item.amenities +
                                    '</td>' +

                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deleteModalAmenities">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });


                        }
                    });

                }
            });
        });

        $('.delete_property_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_property_id = $('#delete_property_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/hotelPrpertRulesDetails/" + delete_property_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deleteModalProperty').modal('hide');

                    $hdnhotelidPropRules = $('#hdnhotelidPropRules').val();
                    $.ajax({
                        url: "{{ route('admin-hotel-Rules-details') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "hotelid": $hdnhotelidPropRules,
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#tblPropertyRules tbody').html("");

                            $.each(response.hotelPropertyruls, function(key,
                                itemProperty) {
                                $('#tblPropertyRules tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    itemProperty.hotel_id +
                                    '</td>' +
                                    '<td>' +
                                    itemProperty.property_rules +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' +
                                    itemProperty
                                    .id +
                                    '" class="btn btn-danger deleteRowpropert" data-toggle="modal" data-target="#deleteModalProperty">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });
                        }
                    });

                }
            });
        });

        $('#saveMenu').on('click', function() {
            // window.location.reload();

            $hdnhotelid = $('#hotelid').val();
            if ($hdnhotelid == 0) {
                alert("Select  Hotel");
                return false;
            }

            swal({
                title: "Success",
                text: "Data Saved Successfully.",
                icon: "success",
                button: "OK",
            }).then((willconfirm) => {
                if (willconfirm) {
                    window.location.reload();
                }
            });
        });
        $('#backMenu').on('click', function() {
            window.location.reload();


        });
    </script>
@endsection
