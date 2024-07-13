@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        margin-left: -15px !important;
    }

    .custom-select {
        font-size: 12px !important;
        padding: .375rem 1.7rem .375rem .5rem !important;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 12px !important;
    }
</style>
@section('content')
    <form id="add_package_itenary_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Package Itinerary</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="package_id">Select Package *</label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="0">Select Package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->package_name }}
                                @if ($package->groupdepartureflag == 1)
                                   <b> (Fixed Departure Or Group Departure - {{ date('d-M-y', strtotime($package->groupdeparture)) }}) </b>
                                @else
                                    
                                @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="restrictions">Itinerary *</label>
                    <table class="table table-sm" id="tblItenary">
                        <thead>
                            <tr>
                                <th scope="col" style="display: none">Package Id</th>
                                <th scope="col" style="width: 13%;">Day</th>
                                <th scope="col" style="width: 10%;">Time</th>
                                <th scope="col" style="width: 13%;">City</th>
                                <th scope="col" style="width: 14%;">Mode</th>
                                <th scope="col" style="width: 15%;">Mode Details</th>
                                <th scope="col" style="width: 6%;">A/D</th>
                                <th scope="col" style="width: 25%;">Remarks</th>
                                <th scope="col" style="width: 4%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>

                                <td style="display: none">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hdnPackageid" id="hdnPackageid">
                                    </div>
                                </td>
                                <td style="width: 13%;">
                                    <div class="form-group">
                                        <select class="custom-select" id="ddlDay" name="ddlDay">
                                            <option value="0">Choose Days</option>

                                        </select>
                                    </div>
                                </td>
                                <td style="width: 10%;">
                                    <div class="form-group">
                                        <input type="time" class="form-control" name="txtTime" id="txtTime">
                                    </div>
                                </td>
                                <td style="width: 13%;">
                                    <div class="form-group">
                                        <select class="custom-select" id="ddlCity" name="ddlCity">
                                            <option value="0">Choose City</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 14%;">
                                    <div class="form-group">

                                        <select class="custom-select" id="ddMode" name="ddMode">
                                            <option value="0">Choose Mode</option>
                                            <option value="Travel">Travel</option>
                                            <option value="Hotel">Hotel</option>
                                            <option value="Sight">Sight</option>
                                            <option value="Meal">Meal</option>
                                            <option value="Note">Note</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 15%;">
                                    <div class="form-group">


                                        <select class="form-control select2 " tabindex="-1" aria-hidden="true"
                                            id="ddlModeDetails" name="ddlModeDetails">
                                            <option value="0">Choose Details</option>

                                        </select>
                                    </div>
                                </td>
                                <td style="width: 6%;">
                                    <div class="form-group">

                                        <select class="custom-select" id="ddlAD" name="ddlAD">
                                            <option value="A" selected>A</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="form-group">
                                        <textarea class="form-control" id="txtRemarks" name="txtRemarks"></textarea>
                                    </div>
                                </td>
                                <td style="width: 4%;">
                                    <div class="buttons">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-warning addRow"
                                            id="addItanay">+</a>
                                    </div>
                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="saveItenary">Add +</button>
                <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back to main menu</a>
            </div>
        </div>
    </form>
    {{-- Delete Modal for category and subcategory starts --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodal">Delete Itenary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_itenary_id">
                    <h4>Are you sure? Want to delte this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_itenary_id_btn" data-dismiss="modal">Yes
                        Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal for category and subcategory ends --}}
@endsection
@section('scripts')
    <script>
        $(document).on('change', '#package_id', function() {
            var packageId = $(this).val();

            $('#hdnPackageid').val(packageId);
            if (packageId > 0) {
                $.ajax({
                    url: "{{ route('getPackageDetails') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": packageId,
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $('#ddlCity').empty();
                            $('#ddlDay').empty();

                            // Populate the city dropdown
                            $('select[name="ddlCity"]').append(
                                '<option value="0">Select</option>');
                            $.each(data.cities, function(key, data) {
                                $('select[name="ddlCity"]').append(
                                    '<option value="' + data.id + '">' + data.city_name +
                                    '</option>');
                            });

                            // Populate the day dropdown
                            var numberOfDays = data.for_number_of_days;
                            $('select[name="ddlDay"]').append(
                                '<option value="0">Choose Days</option>');
                            // for (var i = 1; i <= numberOfDays; i++) {
                            //     $('select[name="ddlDay"]').append(
                            //         '<option value="Day ' + i + '">' + 'Day' + ' ' + +i +
                            //         '</option>');
                            // }

                            for (var i = 1; i <= numberOfDays; i++) {
                                $('select[name="ddlDay"]').append(
                                    '<option value="' + i + '">' + 'Day' + ' ' + +i +
                                    '</option>');
                            }

                            $.ajax({
                                url: "{{ route('getItenarydetails') }}",
                                type: "GET",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "packageid": packageId,
                                },
                                dataType: "json",
                                success: function(responce) {

                                    $('#tblItenary tbody').html("");
                                    $.each(responce.result, function(key, item) {
                                        var remarks = '';
                                        if (item.remarks != null) {
                                            remarks = item.remarks;
                                        }
                                        $('#tblItenary tbody').append(
                                            '<tr>' +
                                            '<td style="display: none">' +
                                            item.package_id +
                                            '</td>' +
                                            '<td> Day ' +
                                            item.day +
                                            '</td>' +
                                            '<td>' +
                                            item.time +
                                            '</td>' +
                                            '<td>' +
                                            item.city +
                                            '</td>' +
                                            '<td>' +
                                            item.mode +
                                            '</td>' +
                                            '<td>' +
                                            item.sight_name +
                                            '</td>' +
                                            '<td>' +
                                            item.a_d +
                                            '</td>' +
                                            '<td>' +
                                            remarks +
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
                            $('#ddlCity').empty();
                            $('#ddlDay').empty();
                            $('#tblItenary tbody').html("");
                        }



                    }

                });
            } else {
                $('#ddlCity').empty();
                $('#ddlDay').empty();
                $('select[name="ddlCity"]').append(
                    '<option value="0">Select</option>');
                $('select[name="ddlDay"]').append(
                    '<option value="0">Choose Days</option>');
                $('#tblItenary tbody').html("");
            }

        });


        $(document).ready(function() {
            $('#ddMode').change(function() {
                var mode = $(this).val();
                var cityId = $('#ddlCity').val();

                if (mode === 'Note') {
                    $('#ddlModeDetails').prop('disabled', true);
                    return;
                }

                $.ajax({
                    url: '{{ route('get.mode.details') }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        mode: mode,
                        city_id: cityId
                    },
                    success: function(response) {
                        var ddlModeDetails = $('#ddlModeDetails');
                        ddlModeDetails.empty();
                        ddlModeDetails.append('<option value="0">Choose Details</option>');

                        $.each(response, function(key, value) {
                            var detailName = '';
                            if (mode === 'Travel') {
                                detailName = value.transport_name;
                            } else if (mode === 'Meal') {
                                detailName = value.meal_type;
                            } else if (mode === 'Hotel') {
                                detailName = value.hotel_name;
                            } else if (mode === 'Sight') {
                                detailName = value.sight_name;
                            }
                            //ddlModeDetails.append('<option value="' + value.id + '">' + detailName + '</option>');
                            ddlModeDetails.append('<option value="' + detailName +
                                '">' + detailName + '</option>');
                        });

                        $('#ddlModeDetails').prop('disabled', false);
                    }
                });
            });
        });



        // ***Add Itanary and fetch
        $('#addItanay').on('click', function() {
            $hdnPackageid = $('#hdnPackageid').val();
            $ddlDay = $('#ddlDay').val();
            $txtTime = $('#txtTime').val();
            $ddlCity = $('#ddlCity').val();
            $ddMode = $('#ddMode').val();
            $ddlModeDetails = $('#ddlModeDetails').val();
            $ddlAD = $('#ddlAD').val();
            $txtRemarks = $('#txtRemarks').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnPackageid == '') {
                alert("Select Pacakage");
                return false;
            }
            if ($ddlDay == 0) {
                alert("Select Days");
                return false;
            }
            if ($txtTime == '') {
                alert("Enter Time");
                return false;
            }
            if ($ddlCity == 0) {
                alert("Select city");
                return false;
            }
            if ($ddMode == 0) {
                alert("Select Mode");
                return false;
            }
            // Save ***
            $.ajax({
                url: "{{ route('admin.package.itinerary.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "packageid": $hdnPackageid,
                    "days": $ddlDay,
                    "time": $txtTime,
                    "city": $ddlCity,
                    "mode": $ddMode,
                    "modedetails": $ddlModeDetails,
                    "a_d": $ddlAD,
                    "remarks": $txtRemarks,
                },
                dataType: "json",
                success: function(data) {
                    // Fetch

                    if (data.message == "success") {
                        $.ajax({
                            url: "{{ route('getItenarydetails') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "packageid": $hdnPackageid,
                            },
                            dataType: "json",
                            success: function(responce) {

                                $('#tblItenary tbody').html("");
                                $.each(responce.result, function(key, item) {
                                    var remarks = '';
                                    if (item.remarks != null) {
                                        remarks = item.remarks;
                                    }
                                    $('#tblItenary tbody').append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        item.package_id +
                                        '</td>' +
                                        '<td> Day ' +
                                        item.day +
                                        '</td>' +
                                        '<td>' +
                                        item.time +
                                        '</td>' +
                                        '<td>' +
                                        item.city +
                                        '</td>' +
                                        '<td>' +
                                        item.mode +
                                        '</td>' +
                                        '<td>' +
                                        item.sight_name +
                                        '</td>' +
                                        '<td>' +
                                        item.a_d +
                                        '</td>' +
                                        '<td>' +
                                        remarks +
                                        '</td>' +
                                        '<td>' +
                                        '<button type="button" value="' + item
                                        .id +
                                        '" class="btn btn-danger deleteRow" data-toggle="modal" data-target="#deletemodal">-</button>' +
                                        '</td>' +
                                        '</tr>'
                                    );
                                });

                            }
                        });

                    }
                }
            });

        });

        $('#saveItenary').on('click', function(e) {
            e.preventDefault();
            $Packageid = $('#package_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($Packageid == 0) {
                swal({
                    title: "Error",
                    text: "Please select Pacakge Name.",
                    icon: "error",
                    button: "OK",
                }).then((value) => {
                    $('#package_id').focus();
                });
                return false;
            } else {
                $.ajax({
                    url: "{{ route('getdaysCityonitenarytrans') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "packageid": $Packageid,
                    },
                    dataType: "json",
                    success: function(data) {

                        if (data.message == "success") {

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

                        }
                    }
                });
            }


        });

        $('#backMenu').on('click', function() {
            window.location.reload();
        });
        // **End***
        // Delete nterestedtable
        $(document).on('click', '.deleteRow', function(e) {
            e.preventDefault();
            var itenary_id = $(this).val();
            $('#delete_itenary_id').val(itenary_id);
        });

        $('.delete_itenary_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_itenary_id = $('#delete_itenary_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteItenaryDetails/" + delete_itenary_id,
                success: function(responce) {
                    console.log(responce);
                    $('#success_message').text(responce.message);
                    $('#deletemodal').modal('hide');

                    $hdnPackageid = $('#hdnPackageid').val();
                    $.ajax({
                        url: "{{ route('getItenarydetails') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "packageid": $hdnPackageid,
                        },
                        dataType: "json",
                        success: function(responce) {
                            $('#tblItenary tbody').html("");
                            $.each(responce.result, function(key, item) {
                                $('#tblItenary tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.package_id +
                                    '</td>' +
                                    '<td>' +
                                    item.day +
                                    '</td>' +
                                    '<td>' +
                                    item.time +
                                    '</td>' +
                                    '<td>' +
                                    item.city +
                                    '</td>' +
                                    '<td>' +
                                    item.mode +
                                    '</td>' +
                                    '<td>' +
                                    item.sight_name +
                                    '</td>' +
                                    '<td>' +
                                    item.a_d +
                                    '</td>' +
                                    '<td>' +
                                    item.remarks +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' + item
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
    </script>
@endsection
