@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <form id="add_package_itenary_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Hotel Prices</h4>
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
                <div class="form-group">
                    <label for="restrictions">Season *</label>
                    <table class="table table-sm" id="tblSeason" style="font-size: 12px">
                        <thead>
                            <tr>
                                <th scope="col" style="display: none">hotel Id</th>
                                <th scope="col">Season Type</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Season Start Date</th>
                                <th scope="col">Season End Date</th>
                                <th scope="col">Rack Rate</th>
                                <th scope="col">Hotel Rate</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>

                                <td style="display: none">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hdnhotelid" id="hdnhotelid">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control-sm" id="season_type" name="season_type">

                                            <option value="0">Select season</option>
                                            @foreach ($seasonHotels as $sl)
                                                <option value="{{ $sl->id }}">{{ $sl->season_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control-sm select2" id="hotel_rooms" name="hotel_rooms">

                                            <option value="0">Select rooms</option>

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-sm" name="season_start"
                                            id="season_start">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-sm" name="season_end"
                                            id="season_end">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" name="rackrate"
                                            id="rackrate">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" name="hotelrate"
                                            id="hotelrate">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control form-control-sm" name="pricedescription" id="pricedescription" cols="30"
                                            rows="10"></textarea>
                                    </div>
                                </td>
                                <td>
                                    <div class="buttons">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                            id="addSeason">+</a>
                                    </div>
                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="javascript:void(0);" class="btn btn-primary" id="saveMenu">Save & exit</a>
                <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back</a>
            </div>
        </div>
    </form>

    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodal">Delete Season</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_season_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_season_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal for category and subcategory ends --}}
@endsection
@section('scripts')
    <script>
        $(document).on('change', '#hotelid', function() {
            var valHotelID = $(this).val();
            $('#hdnhotelid').val(valHotelID);

            if (valHotelID > 0) {

                $.ajax({
                    url: "{{ route('admin-hotel-prices') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelid": valHotelID,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblSeason tbody').html("");
                        var description = "";
                        $.each(response.hotelprices, function(key, item) {

                            if (item.description == null) {
                                description = "";
                            } else {
                                description = item.description;
                            }
                            $('#tblSeason tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.hotel_id +
                                '</td>' +
                                '<td>' +
                                item.season_name +
                                '</td>' +
                                '<td>' +
                                item.room_name +
                                '</td>' +
                                '<td>' +
                                item.season_start +
                                '</td>' +
                                '<td>' +
                                item.season_end +
                                '</td>' +
                                '<td>' +
                                item.rack_rate +
                                '</td>' +
                                '<td>' +
                                item.hotel_rate +
                                '</td>' +
                                '<td>' +
                                description +
                                '</td>' +

                                '<td>' +
                                '<button type="button" value="' +
                                item
                                .id +
                                '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                                '</td>' +
                                '</tr>'
                            );
                        });

                    }
                });

                $.ajax({
                    url: "{{ route('admin-get-rooms') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": valHotelID,
                    },
                    dataType: "json",
                    success: function(data) {

                        if (data) {
                            $('#hotel_rooms').empty();
                            // Populate the city dropdown
                            $('select[name="hotel_rooms"]').append(
                                '<option value="0">Select Rooms</option>');
                            $.each(data.hotelRoom, function(key, data) {
                                $('select[name="hotel_rooms"]').append(
                                    '<option value="' + data.id + '">' + data.room_name +
                                    '</option>');
                            });
                        } else {
                            $('#hotel_rooms').empty();
                        }
                    }

                });

            } else {
                $('#tblSeason tbody').html("");
                $('#hotel_rooms').empty();
            }


        });

        $('#addSeason').on('click', function() {
            
            $hdnhotelid = $('#hdnhotelid').val();
            $season_type = $('#season_type').val();
            $hotel_rooms = $('#hotel_rooms').val();           
            $season_start = $('#season_start').val();
            $season_end = $('#season_end').val();
            $rackrate = $('#rackrate').val();
            $hotelrate = $('#hotelrate').val();
            $pricedescription = $('#pricedescription').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnhotelid == 0) {
                alert("Select Select Hotel");
                return false;
            } else if ($season_type == 0) {
                alert("Select Season Type");
                return false;
            } else if ($season_start == '') {
                alert("Enter Season Start Date");
                return false;
            } else if ($season_end == '') {
                alert("Enter Season End Date");
                return false;
            } else if ($rackrate == '') {
                alert("Enter Rack Rate");
                return false;
            } else if ($hotelrate == '') {
                alert("Enter Hotel Rate");
                return false;
            } else {
                // Save ***
                $.ajax({
                    url: "{{ route('admin-hotel-prices-store') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelId": $hdnhotelid,
                        "hotel_rooms": $hotel_rooms,
                        "season_type": $season_type,
                        "season_start": $season_start,
                        "season_end": $season_end,
                        "rackrate": $rackrate,
                        "hotelrate": $hotelrate,
                        "pricedescription": $pricedescription,
                    },
                    dataType: "json",
                    success: function(data) {
                        // Fetch
                        if (data.message == "success") {
                            $.ajax({
                                url: "{{ route('admin-hotel-prices') }}",
                                type: "GET",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "hotelid": $hdnhotelid,
                                },
                                dataType: "json",
                                success: function(response) {

                                    $('#tblSeason tbody').html("");
                                    var description = "";
                                    $.each(response.hotelprices, function(key, item) {

                                        if (item.description == null) {
                                            description = "";
                                        } else {
                                            description = item.description;
                                        }
                                        $('#tblSeason tbody').append(
                                            '<tr>' +
                                            '<td style="display: none">' +
                                            item.hotel_id +
                                            '</td>' +
                                            '<td>' +
                                            item.season_name +
                                            '</td>' +
                                            '<td>' +
                                            item.room_name +
                                            '</td>' +
                                            '<td>' +
                                            item.season_start +
                                            '</td>' +
                                            '<td>' +
                                            item.season_end +
                                            '</td>' +
                                            '<td>' +
                                            item.rack_rate +
                                            '</td>' +
                                            '<td>' +
                                            item.hotel_rate +
                                            '</td>' +
                                            '<td>' +
                                            description +
                                            '</td>' +

                                            '<td>' +
                                            '<button type="button" value="' +
                                            item
                                            .id +
                                            '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
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
            }

        });

        // Delete

        $(document).on('click', '.deleteRow', function(e) {
            e.preventDefault();
            var season_id = $(this).val();
            $('#delete_season_id').val(season_id);

        });

        $('.delete_season_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_season_id = $('#delete_season_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteHotelPrice/" + delete_season_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');

                    $hdnhotelid = $('#hdnhotelid').val();
                    $.ajax({
                        url: "{{ route('admin-hotel-prices') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "hotelid": $hdnhotelid,
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#tblSeason tbody').html("");
                            var description = "";
                            $.each(response.hotelprices, function(key, item) {

                                if (item.description == null) {
                                    description = "";
                                } else {
                                    description = item.description;
                                }
                                $('#tblSeason tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.hotel_id +
                                    '</td>' +
                                    '<td>' +
                                    item.season_name +
                                    '</td>' +
                                    '<td>' +
                                    item.room_name +
                                    '</td>' +
                                    '<td>' +
                                    item.season_start +
                                    '</td>' +
                                    '<td>' +
                                    item.season_end +
                                    '</td>' +
                                    '<td>' +
                                    item.rack_rate +
                                    '</td>' +
                                    '<td>' +
                                    item.hotel_rate +
                                    '</td>' +
                                    '<td>' +
                                    description +
                                    '</td>' +

                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
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
