@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media (max-width: 600px) {
            .rsp_prl {
                padding: 0 !important;
            }
        }
    </style>
@endsection
@section('content')
    <form id="add_hotel_form">
        {{ csrf_field() }}
        <div class="row">
            <div class="card col-lg-6  col-sm-12">
                <div class="card-header">
                    <h4>Create Room Option</h4>
                </div>
                <div class="card-body">
                    <div class="card-body rsp_prl">
                        <form id="frmhotel">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="hotel_name">Select Hotel</label>
                                    <select name="selectHotel" id="selectHotel" class="form-control select2">
                                        <option value="0">Select Hotel</option>
                                        @foreach ($listofHotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="room_name">Select Room</label>
                                    <select name="hotel_rooms" id="hotel_rooms" class="form-control select2">
                                        <option value="0">Select Hotel</option>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="restrictions">Option *</label>
                                <table class="table table-sm" id="tblOptionn" style="font-size: 12px">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="display:none">hotel_id</th>
                                            <th scope="col" style="display:none">room_id</th>
                                            <th scope="col">Option</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="display:none">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="hdnhotel_id"
                                                        id="hdnhotel_id">

                                                </div>
                                            </td>
                                            <td style="display:none">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="hdnroom_id"
                                                        id="hdnroom_id">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="options"
                                                        id="options">
                                                    {{-- <select class="form-control-sm" id="" name="">
                                                        <option value="0">Select season</option>
                                                        <option value=""></option>
                                                    </select> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                                        id="addOption">+</a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="saveOptions">Add +</button>
                    <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back to main menu</a>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodal">Delete Rooms Option</h5>
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
@endsection


@section('scripts')
    <script>
        var valHotelID = 0;
        var valRoomID = 0;
        $(document).on('change', '#selectHotel', function() {
            valHotelID = $(this).val();
            $('#hdnhotel_id').val(valHotelID);

            if (valHotelID > 0) {

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
                $('#tblOptionn tbody').html("");
                $('#hotel_rooms').empty();
            }


        });

        $(document).on('change', '#hotel_rooms', function() {
            valRoomID = $(this).val();
            $('#hdnroom_id').val(valRoomID);

            if (valRoomID > 0) {

                $.ajax({
                    url: "{{ route('admin-rooms-option-get') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelid": valHotelID,
                        "roomlid": valRoomID,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblOptionn tbody').html("");
                        $.each(response.hotelOptions, function(key, item) {
                            $('#tblOptionn tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.hotel_id +
                                '</td>' +
                                '<td style="display: none">' +
                                item.room_id +
                                '</td>' +
                                '<td>' +
                                item.optiones +
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
                $('#tblOptionn tbody').html("");

            }


        });

        $('#addOption').on('click', function() {

            $hdnhotelid = $('#hdnhotel_id').val();
            $hdnroomid = $('#hdnroom_id').val();
            $options = $('#options').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnhotelid == 0) {
                alert("Select Select Hotel");
                return false;
            } else if ($hdnroomid == 0) {
                alert("Select Rooms");
                return false;
            } else if ($options == '') {
                alert("Enter Options");
                return false;
            } else {
                // Save ***
                $.ajax({
                    url: "{{ route('admin-hotel-RoomOption-store') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelId": $hdnhotelid,
                        "roomID": $hdnroomid,
                        "options": $options,
                    },
                    dataType: "json",
                    success: function(data) {
                        // Fetch
                        if (data.message == "success") {
                            $.ajax({
                                url: "{{ route('admin-rooms-option-get') }}",
                                type: "GET",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "hotelid": valHotelID,
                                    "roomlid": valRoomID,
                                },
                                dataType: "json",
                                success: function(response) {

                                    $('#tblOptionn tbody').html("");
                                    $.each(response.hotelOptions, function(key, item) {
                                        $('#tblOptionn tbody').append(
                                            '<tr>' +
                                            '<td style="display: none">' +
                                            item.hotel_id +
                                            '</td>' +
                                            '<td style="display: none">' +
                                            item.room_id +
                                            '</td>' +
                                            '<td>' +
                                            item.optiones +
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
                url: "/deleteRoomOption/" + delete_season_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');

                    $hdnhotelid = $('#hdnhotel_id').val();
                    $hdnroomlid = $('#hdnroom_id').val();
                    $.ajax({
                    url: "{{ route('admin-rooms-option-get') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "hotelid": $hdnhotelid,
                        "roomlid": $hdnroomlid,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblOptionn tbody').html("");
                        $.each(response.hotelOptions, function(key, item) {
                            $('#tblOptionn tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.hotel_id +
                                '</td>' +
                                '<td style="display: none">' +
                                item.room_id +
                                '</td>' +
                                '<td>' +
                                item.optiones +
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

        $('#saveOptions').on('click', function(e) {
            // window.location.reload();
            e.preventDefault();
            $hdnhotelid = $('#selectHotel').val();
            $roomid = $('#hotel_rooms').val();
            if ($hdnhotelid == 0) {
                alert("Select  Hotel");
                return false;
            }
            if ($roomid == 0) {
                alert("Select Rooms");
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
