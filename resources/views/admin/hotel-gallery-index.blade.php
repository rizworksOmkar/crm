@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Hotel Gallery</h4>
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
            <!--Interior-->
            <div class="card">
                <div class="card-header">
                    <h4>Add Hotel Interior Gallery</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restrictions">Interior *</label>
                        <table class="table table-sm" id="tblInterior" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">hotel Id</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <form id="frmhotalIndoor">
                                    {{ csrf_field() }}
                                    <tr>

                                        <td style="display: none">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="hdnhotelidIndoor"
                                                    id="hdnhotelidIndoor">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="roomdetailsIndoor" id="roomdetailsIndoor">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="file" name="ftpIndoorImg" id="ftpIndoorImg"
                                                    accept="image/png, image/gif, image/jpeg">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="buttons">
                                                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                                        id="addSeasonIndoor">+</a> --}}
                                                <button type="submit" class="btn btn-sm btn-warning addRow"
                                                    id="addSeasonIndoor">+</button>
                                            </div>
                                        </td>

                                    </tr>
                                </form>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <!--OutDoor-->
            <div class="card">
                <div class="card-header">
                    <h4>Add Hotel Outdoor Gallery</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restrictions">Outdoor *</label>
                        <table class="table table-sm" id="tblOutdoor" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">hotel Id</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td style="display: none">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="hdnhotelidOutdoor"
                                                id="hdnhotelidOutdoor">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" name="roomdetails"
                                                id="roomdetails">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" name="ftpInterior" id="ftpInterior">
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

            </div>
            <!--Reception-->
            <div class="card">
                <div class="card-header">
                    <h4>Add Hotel Reception Gallery</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="restrictions">Reception *</label>
                        <table class="table table-sm" id="tblReception" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">hotel Id</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td style="display: none">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="hdnhotelidReception"
                                                id="hdnhotelidReception">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" name="roomdetails"
                                                id="roomdetails">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" name="ftpInterior" id="ftpInterior">
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

            </div>
        </div>
        <div class="card-footer">
            <a href="javascript:void(0);" class="btn btn-primary" id="saveMenu">Save & exit</a>
            <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back</a>
        </div>
    </div>


    {{-- <div class="modal fade" id="deletemodalindoor" tabindex="-1" aria-labelledby="deletemodalindoor" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodalindoor">Delete Indoor Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_indoor_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_indoor_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="modal fade" id="deletemodaloutdoor" tabindex="-1" aria-labelledby="deletemodaloutdoor" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodaloutdoor">Delete Season</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_outdoor_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_outdoor_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
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
            $('#hdnhotelidIndoor').val(valHotelID);
            $('#hdnhotelidOutdoor').val(valHotelID);
            $('#hdnhotelidReception').val(valHotelID);
            // if (valHotelID > 0) {

            //     $.ajax({
            //         url: "{{ route('admin-hotel-prices') }}",
            //         type: "GET",
            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             "hotelid": valHotelID,
            //         },
            //         dataType: "json",
            //         success: function(response) {

            //             $('#tblSeason tbody').html("");
            //             var brekafastStatus = "";
            //             var description = "";
            //             $.each(response.hotelprices, function(key, item) {

            //                 if (item.breakfast_included == 0) {
            //                     brekafastStatus = "No";
            //                 } else {
            //                     brekafastStatus = "Yes";
            //                 }
            //                 if (item.description == null) {
            //                     description = "";
            //                 } else {
            //                     description = item.description;
            //                 }
            //                 $('#tblSeason tbody').append(
            //                     '<tr>' +
            //                     '<td style="display: none">' +
            //                     item.hotel_id +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.season_type +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.room_type +
            //                     '</td>' +
            //                     '<td>' +
            //                     brekafastStatus +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.season_start +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.season_end +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.rack_rate +
            //                     '</td>' +
            //                     '<td>' +
            //                     item.hotel_rate +
            //                     '</td>' +
            //                     '<td>' +
            //                     description +
            //                     '</td>' +

            //                     '<td>' +
            //                     '<button type="button" value="' +
            //                     item
            //                     .id +
            //                     '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
            //                     '</td>' +
            //                     '</tr>'
            //                 );
            //             });

            //         }
            //     });

            // } else {
            //     $('#tblSeason tbody').html("");
            // }


        });

        $('#addSeasonIndoor').on('click', function(event) {
            event.preventDefault();
            $hdnhotelidIndoor = $('#hdnhotelidIndoor').val();
            $roomdetailsIndoor = $('#roomdetailsIndoor').val();
            $roomIndoorPhoto = $('#ftpIndoorImg').val();
            $extensionIndoor = "";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnhotelidIndoor == 0 || $hdnhotelidIndoor == "") {
                alert("Select Hotel");
                return false;
            }
            if ($roomdetailsIndoor == "") {
                alert("Input Room Description");
                return false;
            }
            if ($roomIndoorPhoto == '') {
                alert("Upload Photo");
                return false;
            }
            $extensionIndoor = $roomIndoorPhoto.split('.').pop().toLowerCase();
            if ($.inArray($extensionIndoor, ['png', 'jpg', 'jpeg']) == -1) {
                alert('invalid extension!');
                return false;
            }
            // Save ***
            var myform = document.getElementById("frmhotalIndoor");
            $.ajax({
                url: "{{ route('admin-hotel-indoor-image-store') }}",
                type: "POST",
                data: new FormData(myform),
                contentType: false,
                processData: false,

                success: function(data) {
                    // Fetch
                    // if (data.message == "success") {
                    //     $.ajax({
                    //         url: "{{ route('admin-hotel-prices') }}",
                    //         type: "GET",
                    //         data: {
                    //             "_token": "{{ csrf_token() }}",
                    //             "hotelid": $hdnhotelid,
                    //         },
                    //         dataType: "json",
                    //         success: function(response) {

                    //             $('#tblSeason tbody').html("");
                    //             var brekafastStatus = "";
                    //             var description = "";
                    //             $.each(response.hotelprices, function(key, item) {

                    //                 if (item.breakfast_included == 0) {
                    //                     brekafastStatus = "No";
                    //                 } else {
                    //                     brekafastStatus = "Yes";
                    //                 }
                    //                 if (item.description == null) {
                    //                     description = "";
                    //                 } else {
                    //                     description = item.description;
                    //                 }
                    //                 $('#tblSeason tbody').append(
                    //                     '<tr>' +
                    //                     '<td style="display: none">' +
                    //                     item.hotel_id +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.season_type +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.room_type +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     brekafastStatus +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.season_start +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.season_end +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.rack_rate +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.hotel_rate +
                    //                     '</td>' +
                    //                     '<td>' +
                    //                     item.description +
                    //                     '</td>' +

                    //                     '<td>' +
                    //                     '<button type="button" value="' +
                    //                     item
                    //                     .id +
                    //                     '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                    //                     '</td>' +
                    //                     '</tr>'
                    //                 );
                    //             });

                    //         }
                    //     });
                    // } else {
                    //     alert("Data Not Saved");
                    //     return false;
                    // }
                }
            });


        });

        // // Delete

        // $(document).on('click', '.deleteRow', function(e) {
        //     e.preventDefault();
        //     var season_id = $(this).val();
        //     alert(season_id);
        //     $('#delete_season_id').val(season_id);

        // });

        // $('.delete_season_id_btn').on('click', function(e) {
        //     e.preventDefault();

        //     var delete_season_id = $('#delete_season_id').val();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: "DELETE",
        //         url: "/deleteHotelPrice/" + delete_season_id,
        //         success: function(response) {
        //             console.log(response);
        //             $('#success_message').text(response.message);
        //             $('#deletemodal').modal('hide');

        //             $hdnhotelid = $('#hdnhotelid').val();
        //             $.ajax({
        //                 url: "{{ route('admin-hotel-prices') }}",
        //                 type: "GET",
        //                 data: {
        //                     "_token": "{{ csrf_token() }}",
        //                     "hotelid": $hdnhotelid,
        //                 },
        //                 dataType: "json",
        //                 success: function(response) {

        //                     $('#tblSeason tbody').html("");
        //                     var brekafastStatus = "";
        //                     var description = "";
        //                     $.each(response.hotelprices, function(key, item) {

        //                         if (item.breakfast_included == 0) {
        //                             brekafastStatus = "No";
        //                         } else {
        //                             brekafastStatus = "Yes";
        //                         }
        //                         if (item.description == null) {
        //                             description = "";
        //                         } else {
        //                             description = item.description;
        //                         }
        //                         $('#tblSeason tbody').append(
        //                             '<tr>' +
        //                             '<td style="display: none">' +
        //                             item.hotel_id +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.season_type +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.room_type +
        //                             '</td>' +
        //                             '<td>' +
        //                             brekafastStatus +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.season_start +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.season_end +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.rack_rate +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.hotel_rate +
        //                             '</td>' +
        //                             '<td>' +
        //                             item.description +
        //                             '</td>' +

        //                             '<td>' +
        //                             '<button type="button" value="' +
        //                             item
        //                             .id +
        //                             '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
        //                             '</td>' +
        //                             '</tr>'
        //                         );
        //                     });

        //                 }
        //             });
        //         }
        //     });
        // });

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
