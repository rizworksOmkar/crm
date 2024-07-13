@extends('layouts.user-dashboard-layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="dashboard_common_table">
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Adult <small>(Above 18 Years)</small></h3>
            <input type="hidden" class="form-control numberonly" value="{{ $bookingID }}" id="hdbBookingID"
                name="hdbBookingID" />
            <input type="hidden" class="form-control numberonly" value="{{ $userid }}" id="hdbUserID" name="hdbUserID" />
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofadult">Input Number Of Adult </label>
                            <input type="text" class="form-control numberonly" id="noofadult" name="noofadult"
                                value="{{ $details->no_of_adult }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Adult With Details</label>
                            <table class=" tbl_box_aling table table-striped table-hover" id="tblAdultDetails" style="width: 100%">
                                <colgroup>

                                    <col style="width:50%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />
                                    <col style="width:20%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>

                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter Full Name" id="ridername" id="ridername" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control numberonly" placeholder="Age" id="riderAge"
                                                id="riderAge" />
                                        </td>
                                        <td>
                                            <select class="form-select select2" name="selectridersex" id="selectridersex">
                                                <option value="0">--- Select ---</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Others</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="btnAdultADD">Add
                                                +</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Children <small>(Within 18 Years)</small></h3>
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofchild">Input Number Of Children </label>
                            <input type="text" class="form-control numberonly" id="noofchild" id="noofchild"
                                value="{{ $details->no_of_child }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Children With Details</label>
                            <table class=" tbl_box_aling table table-striped table-hover" id="tblChildDetails" style="width: 100%">
                                <colgroup>
                                    <col style="width:50%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />
                                    <col style="width:20%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter Full Name" id="riderChildname"
                                                id="riderChildname" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control numberonly" placeholder="Age" id="riderChildAge"
                                                id="riderChildAge" />
                                        </td>
                                        <td>
                                            <select class="form-select select2" name="selectriderChildsex"
                                                id="selectriderChildsex">
                                                <option value="0">--- Select ---</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Others</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="btnChildADD">Add
                                                +</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="profile_update_form prt_edt_box">
            <h3>No Of Infant <small>(0-2 years)</small></h3>
            <div class="travelerDetails">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="noofinfant">Input Number Of Infant </label>
                            <input type="text" class="form-control numberonly" id="noofinfant" id="noofinfant"
                                value="{{ $details->no_of_infant }}" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="bookAddress">Set Infant With Details</label>
                            <table class=" tbl_box_aling table table-striped table-hover" id="tblInfantDetails" style="width: 100%">
                                <colgroup>
                                    <col style="width:50%" />
                                    <col style="width:10%" />
                                    <col style="width:20%" />
                                    <col style="width:20%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter Full Name" id="riderInfantname"
                                                id="riderInfantname" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control numberonly" placeholder="Age" id="riderInfantAge"
                                                id="riderInfantAge" />
                                        </td>
                                        <td>
                                            <select class="form-select select2" name="selectriderInfantsex"
                                                id="selectriderInfantsex">
                                                <option value="0">--- Select ---</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                                id="btnInfantADD">Add +</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="others-options bd-highlight mt-5 text-center">
            <div class="option-item">
                {{-- <a href="{{ url('/user/viewBooking/' . $bookingID) }}" class="btn btn-dark">Save &amp; View</a> --}}
                <a href="javascript:void();" class="btn btn-dark" id="familyDetailsSave">Save &amp; View</a>
            </div>
        </div>

    </div>

    {{-- Delete Modal for category and subcategory starts --}}

    <div class="modal fade" id="deleteAdultmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <input type="hidden" id="delete_Adultrider_id">
                    <h3>
                        Are you sure? <br>
                        Want to delete this data ?
                    </h3>
                    <div class="logout_approve_button">
                        <button data-bs-dismiss="modal" class="btn btn_border btn_md">No Cancel</button>
                        <button type="button" class="btn btn_theme btn_md delete_Adultrider_id_btn">Yes Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteChildmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <input type="hidden" id="delete_Childrider_id">
                    <h3>
                        Are you sure? <br>
                        Want to delete this data ?
                    </h3>
                    <div class="logout_approve_button">
                        <button data-bs-dismiss="modal" class="btn btn_border btn_md">No Cancel</button>
                        <button type="button" class="btn btn_theme btn_md delete_Childrider_id_btn">Yes Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteInfantmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <input type="hidden" id="delete_Infantrider_id">
                    <h3>
                        Are you sure? <br>
                        Want to delete this data ?
                    </h3>
                    <div class="logout_approve_button">
                        <button data-bs-dismiss="modal" class="btn btn_border btn_md">No Cancel</button>
                        <button type="button" class="btn btn_theme btn_md delete_Infantrider_id_btn">Yes Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    {{-- Delete Modal for category and subcategory ends --}}
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.numberonly').keypress(function(e) {
                var charCode = (e.which) ? e.which : event.keyCode
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });

            $bookingID = $('#hdbBookingID').val();
            $hdnbookingUserID = $('#hdbUserID').val();
            // Fetch Adult Details On Load Function
            $.ajax({
                url: "{{ route('User-Get-noofAdult-bybookingId') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": $bookingID,
                    "userID": $hdnbookingUserID
                },
                dataType: "json",
                success: function(responce) {

                    $('#tblAdultDetails tbody')
                        .html("");
                    $.each(responce.result,
                        function(key,
                            item) {
                            var Sex = '';
                            if (item.sex ==
                                1) {
                                Sex = 'Male';
                            } else if (item
                                .sex == 2) {
                                Sex =
                                    'FeMale';
                            } else if (item
                                .sex == 3) {
                                Sex =
                                    'Others';
                            } else {
                                Sex = '';
                            }
                            $('#tblAdultDetails tbody')
                                .append(
                                    '<tr>' +
                                    '<td>' +
                                    item
                                    .full_name +
                                    '</td>' +
                                    '<td>' +
                                    item
                                    .age +
                                    '</td>' +
                                    '<td>' +
                                    Sex +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteAdultRow" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteAdultmodal">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                        });

                }
            });
            // End Fetch Adult On Load Function

            // Fetch Child Details On Load Function
            $.ajax({
                url: "{{ route('User-Get-noofChildAdult-bybookingId') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": $bookingID,
                    "userID": $hdnbookingUserID
                },
                dataType: "json",
                success: function(responce) {

                    $('#tblChildDetails tbody')
                        .html("");
                    $.each(responce.result,
                        function(key,
                            item) {
                            var Sex = '';
                            if (item.sex ==
                                1) {
                                Sex = 'Male';
                            } else if (item
                                .sex == 2) {
                                Sex =
                                    'FeMale';
                            } else if (item
                                .sex == 3) {
                                Sex =
                                    'Others';
                            } else {
                                Sex = '';
                            }
                            $('#tblChildDetails tbody')
                                .append(
                                    '<tr>' +
                                    '<td>' +
                                    item
                                    .full_name +
                                    '</td>' +
                                    '<td>' +
                                    item
                                    .age +
                                    '</td>' +
                                    '<td>' +
                                    Sex +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteChildRow" data-bs-toggle="modal" data-bs-target="#deleteChildmodal">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                        });

                }
            });
            // End Fetch Child On Load Function
            // Fetch Child Details On Load Function
            $.ajax({
                url: "{{ route('User-Get-noofInfant-bybookingId') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "bookingID": $bookingID,
                    "userID": $hdnbookingUserID
                },
                dataType: "json",
                success: function(responce) {

                    $('#tblInfantDetails tbody')
                        .html("");
                    $.each(responce.result,
                        function(key,
                            item) {
                            var Sex = '';
                            if (item.sex ==
                                1) {
                                Sex = 'Male';
                            } else if (item
                                .sex == 2) {
                                Sex =
                                    'FeMale';
                            } else {
                                Sex = '';
                            }
                            $('#tblInfantDetails tbody')
                                .append(
                                    '<tr>' +
                                    '<td>' +
                                    item
                                    .full_name +
                                    '</td>' +
                                    '<td>' +
                                    item
                                    .age +
                                    '</td>' +
                                    '<td>' +
                                    Sex +
                                    '</td>' +
                                    '<td>' +
                                    '<button type="button" value="' +
                                    item
                                    .id +
                                    '" class="btn btn-danger deleteInfantRow" data-bs-toggle="modal" data-bs-target="#deleteInfantmodal">-</button>' +
                                    '</td>' +
                                    '</tr>'
                                );
                        });

                }
            });
            // End Fetch Child On Load Function
        });
        if (jQuery().select2) {
            $(".select2").select2();
        }
        $('#btnAdultADD').on('click', function() {
            $bookingID = $('#hdbBookingID').val();
            $hdnbookingUserID = $('#hdbUserID').val();
            $noOfadult = $('#noofadult').val();
            $fullname = $('#ridername').val();
            $age = $('#riderAge').val();
            $sex = $('#selectridersex').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($noOfadult == '') {
                alert("Enter How many rider include");
                $('#noofadult').focus();
                return false;
            } else if ($fullname == '') {
                alert("Enter Rider's Full Name");
                $('#ridername').focus();
                return false;
            } else if ($age == '') {
                alert("Enter Rider's Age");
                $('#riderAge').focus();
                return false;
            } else if ($age < 18) {
                alert("Rider Should be above 18 years");
                $('#riderAge').focus();
                return false;
            } else if ($sex == 0) {
                alert("Please Select Rider's Gender");
                $('#selectridersex').focus();
                return false;
            } else {
                // Save ***
                $.ajax({
                    url: "{{ route('User-count-noofAdult') }}",
                    type: "get",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "bookingID": $bookingID,
                        "userID": $hdnbookingUserID
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.count == 0) {
                            $.ajax({
                                url: "{{ route('User-journeynoOfAdult-save') }}",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "bookingID": $bookingID,
                                    "noOfadult": $noOfadult,
                                    "fullname": $fullname,
                                    "age": $age,
                                    "sex": $sex,
                                },
                                dataType: "json",
                                success: function(data) {
                                    // Fetch                                    
                                    if (data.message == "success") {
                                        $.ajax({
                                            url: "{{ route('User-Get-noofAdult-bybookingId') }}",
                                            type: "GET",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "bookingID": $bookingID,
                                                "userID": $hdnbookingUserID
                                            },
                                            dataType: "json",
                                            success: function(responce) {

                                                $('#tblAdultDetails tbody')
                                                    .html("");
                                                $.each(responce.result,
                                                    function(key,
                                                        item) {
                                                        var Sex = '';
                                                        if (item.sex ==
                                                            1) {
                                                            Sex = 'Male';
                                                        } else if (item
                                                            .sex == 2) {
                                                            Sex =
                                                                'FeMale';
                                                        } else if (item
                                                            .sex == 3) {
                                                            Sex =
                                                                'Others';
                                                        } else {
                                                            Sex = '';
                                                        }
                                                        $('#tblAdultDetails tbody')
                                                            .append(
                                                                '<tr>' +
                                                                '<td>' +
                                                                item
                                                                .full_name +
                                                                '</td>' +
                                                                '<td>' +
                                                                item
                                                                .age +
                                                                '</td>' +
                                                                '<td>' +
                                                                Sex +
                                                                '</td>' +
                                                                '<td>' +
                                                                '<button type="button" value="' +
                                                                item
                                                                .id +
                                                                '" class="btn btn-danger deleteAdultRow" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteAdultmodal">-</button>' +
                                                                '</td>' +
                                                                '</tr>'
                                                            );
                                                    });

                                            }
                                        });
                                    }
                                }
                            });
                        } else {

                            if ($noOfadult <= data.count) {
                                alert("Not Applicable to Join another rider. As because you have entered no of Adult is " +
                                    $noOfadult);
                                return false;
                            } else {
                                $.ajax({
                                    url: "{{ route('User-journeynoOfAdult-save') }}",
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "bookingID": $bookingID,
                                        "noOfadult": $noOfadult,
                                        "fullname": $fullname,
                                        "age": $age,
                                        "sex": $sex,
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        // Fetch
                                        if (data.message == "success") {

                                            $.ajax({
                                                url: "{{ route('User-Get-noofAdult-bybookingId') }}",
                                                type: "GET",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "bookingID": $bookingID,
                                                    "userID": $hdnbookingUserID
                                                },
                                                dataType: "json",
                                                success: function(responce) {

                                                    $('#tblAdultDetails tbody')
                                                        .html("");
                                                    $.each(responce.result,
                                                        function(key,
                                                            item) {
                                                            var Sex = '';
                                                            if (item.sex ==
                                                                1) {
                                                                Sex =
                                                                    'Male';
                                                            } else if (item
                                                                .sex == 2) {
                                                                Sex =
                                                                    'FeMale';
                                                            } else if (item
                                                                .sex == 3) {
                                                                Sex =
                                                                    'Others';
                                                            } else {
                                                                Sex = '';
                                                            }
                                                            $('#tblAdultDetails tbody')
                                                                .append(
                                                                    '<tr>' +
                                                                    '<td>' +
                                                                    item
                                                                    .full_name +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    item
                                                                    .age +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    Sex +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    '<button type="button" value="' +
                                                                    item
                                                                    .id +
                                                                    '" class="btn btn-danger deleteAdultRow" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteAdultmodal">-</button>' +
                                                                    '</td>' +
                                                                    '</tr>'
                                                                );
                                                        });

                                                }
                                            });

                                        }
                                    }
                                });
                            }
                        }
                    }
                });

            }
        });

        $('#btnChildADD').on('click', function() {
            $bookingID = $('#hdbBookingID').val();
            $hdnbookingUserID = $('#hdbUserID').val();
            $noofchild = $('#noofchild').val();
            $fullname = $('#riderChildname').val();
            $age = $('#riderChildAge').val();
            $sex = $('#selectriderChildsex').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($noofchild == '') {
                alert("Enter How many child rider include");
                $('#noofchild').focus();
                return false;
            } else if ($fullname == '') {
                alert("Enter the Child Rider's Full Name");
                $('#riderChildname').focus();
                return false;
            } else if ($age == '') {
                alert("Enter Rider's Age");
                $('#riderChildAge').focus();
                return false;
            } else if ($age > 18) {
                alert("Child Rider Should not be above 18 years");
                $('#riderChildAge').focus();
                return false;
            } else if ($age < 3) {
                alert("Child Rider Should be above 3 years");
                $('#riderChildAge').focus();
                return false;
            } else if ($sex == 0) {
                alert("Please Select Child Rider's Gender");
                $('#selectriderChildsex').focus();
                return false;
            } else {
                // Save ***
                $.ajax({
                    url: "{{ route('User-count-noofChildAdult') }}",
                    type: "get",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "bookingID": $bookingID,
                        "userID": $hdnbookingUserID
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.count == 0) {
                            $.ajax({
                                url: "{{ route('User-journeynoOfChildAdult-save') }}",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "bookingID": $bookingID,
                                    "noofchild": $noofchild,
                                    "fullname": $fullname,
                                    "age": $age,
                                    "sex": $sex,
                                },
                                dataType: "json",
                                success: function(data) {
                                    // Fetch
                                    if (data.message == "success") {
                                        $.ajax({
                                            url: "{{ route('User-Get-noofChildAdult-bybookingId') }}",
                                            type: "GET",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "bookingID": $bookingID,
                                                "userID": $hdnbookingUserID
                                            },
                                            dataType: "json",
                                            success: function(responce) {

                                                $('#tblChildDetails tbody')
                                                    .html("");
                                                $.each(responce.result,
                                                    function(key,
                                                        item) {
                                                        var Sex = '';
                                                        if (item.sex ==
                                                            1) {
                                                            Sex = 'Male';
                                                        } else if (item
                                                            .sex == 2) {
                                                            Sex =
                                                                'FeMale';
                                                        } else if (item
                                                            .sex == 3) {
                                                            Sex =
                                                                'Others';
                                                        } else {
                                                            Sex = '';
                                                        }
                                                        $('#tblChildDetails tbody')
                                                            .append(
                                                                '<tr>' +
                                                                '<td>' +
                                                                item
                                                                .full_name +
                                                                '</td>' +
                                                                '<td>' +
                                                                item
                                                                .age +
                                                                '</td>' +
                                                                '<td>' +
                                                                Sex +
                                                                '</td>' +
                                                                '<td>' +
                                                                '<button type="button" value="' +
                                                                item
                                                                .id +
                                                                '" class="btn btn-danger deleteChildRow" data-bs-toggle="modal" data-bs-target="#deleteChildmodal">-</button>' +
                                                                '</td>' +
                                                                '</tr>'
                                                            );
                                                    });

                                            }
                                        });

                                    }
                                }
                            });
                        } else {

                            if ($noofchild <= data.count) {
                                alert("Not Applicable to Join another rider. As because you have entered no of Child Adult is " +
                                    $noofchild);
                                return false;
                            } else {
                                $.ajax({
                                    url: "{{ route('User-journeynoOfChildAdult-save') }}",
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "bookingID": $bookingID,
                                        "noofchild": $noofchild,
                                        "fullname": $fullname,
                                        "age": $age,
                                        "sex": $sex,
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        // Fetch
                                        if (data.message == "success") {
                                            $.ajax({
                                                url: "{{ route('User-Get-noofChildAdult-bybookingId') }}",
                                                type: "GET",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "bookingID": $bookingID,
                                                    "userID": $hdnbookingUserID
                                                },
                                                dataType: "json",
                                                success: function(responce) {

                                                    $('#tblChildDetails tbody')
                                                        .html("");
                                                    $.each(responce.result,
                                                        function(key,
                                                            item) {
                                                            var Sex = '';
                                                            if (item.sex ==
                                                                1) {
                                                                Sex =
                                                                    'Male';
                                                            } else if (item
                                                                .sex == 2) {
                                                                Sex =
                                                                    'FeMale';
                                                            } else if (item
                                                                .sex == 3) {
                                                                Sex =
                                                                    'Others';
                                                            } else {
                                                                Sex = '';
                                                            }
                                                            $('#tblChildDetails tbody')
                                                                .append(
                                                                    '<tr>' +
                                                                    '<td>' +
                                                                    item
                                                                    .full_name +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    item
                                                                    .age +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    Sex +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    '<button type="button" value="' +
                                                                    item
                                                                    .id +
                                                                    '" class="btn btn-danger deleteChildRow" data-bs-toggle="modal" data-bs-target="#deleteChildmodal">-</button>' +
                                                                    '</td>' +
                                                                    '</tr>'
                                                                );
                                                        });

                                                }
                                            });

                                        }
                                    }
                                });
                            }
                        }
                    }
                });

            }
        });

        $('#btnInfantADD').on('click', function() {
            $bookingID = $('#hdbBookingID').val();
            $hdnbookingUserID = $('#hdbUserID').val();
            $noofinfant = $('#noofinfant').val();
            $fullname = $('#riderInfantname').val();
            $age = $('#riderInfantAge').val();
            $sex = $('#selectriderInfantsex').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // if($age != ''){
            //     var suffix = $age.match(/\d+/);
            //     alert(suffix);
            // }           

            if ($noofinfant == '') {
                alert("Enter How many Infant you caried. Kindly Mention");
                $('#noofchild').focus();
                return false;
            } else if ($fullname == '') {
                alert("Enter the Child Rider's Full Name");
                $('#riderInfantname').focus();
                return false;
            } else if ($age == '') {
                alert("Enter Infant's  Age");
                $('#riderInfantAge').focus();
                return false;
            } else if ($age > 3) {
                alert("Infant Rider Should not be above 3 years");
                $('#riderInfantAge').focus();
                return false;
            } else if ($sex == 0) {
                alert("Please Select Infant Rider's Gender");
                $('#selectriderInfantsex').focus();
                return false;
            } else {
                // Save ***
                $.ajax({
                    url: "{{ route('User-count-noofInfant') }}",
                    type: "get",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "bookingID": $bookingID,
                        "userID": $hdnbookingUserID
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.count == 0) {
                            $.ajax({
                                url: "{{ route('User-journeynoOfInfant-save') }}",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "bookingID": $bookingID,
                                    "noofinfant": $noofinfant,
                                    "fullname": $fullname,
                                    "age": $age,
                                    "sex": $sex,
                                },
                                dataType: "json",
                                success: function(data) {
                                    // Fetch
                                    if (data.message == "success") {
                                        $.ajax({
                                            url: "{{ route('User-Get-noofInfant-bybookingId') }}",
                                            type: "GET",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "bookingID": $bookingID,
                                                "userID": $hdnbookingUserID
                                            },
                                            dataType: "json",
                                            success: function(responce) {

                                                $('#tblInfantDetails tbody')
                                                    .html("");
                                                $.each(responce.result,
                                                    function(key,
                                                        item) {
                                                        var Sex = '';
                                                        if (item.sex ==
                                                            1) {
                                                            Sex = 'Male';
                                                        } else if (item
                                                            .sex == 2) {
                                                            Sex =
                                                                'FeMale';
                                                        } else {
                                                            Sex = '';
                                                        }
                                                        $('#tblInfantDetails tbody')
                                                            .append(
                                                                '<tr>' +
                                                                '<td>' +
                                                                item
                                                                .full_name +
                                                                '</td>' +
                                                                '<td>' +
                                                                item
                                                                .age +
                                                                '</td>' +
                                                                '<td>' +
                                                                Sex +
                                                                '</td>' +
                                                                '<td>' +
                                                                '<button type="button" value="' +
                                                                item
                                                                .id +
                                                                '" class="btn btn-danger deleteInfantRow" data-bs-toggle="modal" data-bs-target="#deleteInfantmodal">-</button>' +
                                                                '</td>' +
                                                                '</tr>'
                                                            );
                                                    });

                                            }
                                        });
                                    }
                                }
                            });
                        } else {

                            if ($noofinfant <= data.count) {
                                alert("Not Applicable to Join another rider. As because you have entered no of Infant is " +
                                    $noofinfant);
                                return false;
                            } else {
                                $.ajax({
                                    url: "{{ route('User-journeynoOfInfant-save') }}",
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "bookingID": $bookingID,
                                        "noofinfant": $noofinfant,
                                        "fullname": $fullname,
                                        "age": $age,
                                        "sex": $sex,
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        // Fetch
                                        if (data.message == "success") {
                                            $.ajax({
                                                url: "{{ route('User-Get-noofInfant-bybookingId') }}",
                                                type: "GET",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "bookingID": $bookingID,
                                                    "userID": $hdnbookingUserID
                                                },
                                                dataType: "json",
                                                success: function(responce) {

                                                    $('#tblInfantDetails tbody')
                                                        .html("");
                                                    $.each(responce.result,
                                                        function(key,
                                                            item) {
                                                            var Sex = '';
                                                            if (item.sex ==
                                                                1) {
                                                                Sex =
                                                                    'Male';
                                                            } else if (item
                                                                .sex == 2) {
                                                                Sex =
                                                                    'FeMale';
                                                            } else {
                                                                Sex = '';
                                                            }
                                                            $('#tblInfantDetails tbody')
                                                                .append(
                                                                    '<tr>' +
                                                                    '<td>' +
                                                                    item
                                                                    .full_name +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    item
                                                                    .age +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    Sex +
                                                                    '</td>' +
                                                                    '<td>' +
                                                                    '<button type="button" value="' +
                                                                    item
                                                                    .id +
                                                                    '" class="btn btn-danger deleteInfantRow" data-bs-toggle="modal" data-bs-target="#deleteInfantmodal">-</button>' +
                                                                    '</td>' +
                                                                    '</tr>'
                                                                );
                                                        });

                                                }
                                            });

                                        }
                                    }
                                });
                            }
                        }
                    }
                });

            }
        });



        // Delete Adult nterestedtable
        $(document).on('click', '.deleteAdultRow', function(e) {
            e.preventDefault();
            var rider_id = $(this).val();
            $('#delete_Adultrider_id').val(rider_id);
        });
        $('.delete_Adultrider_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_Adultrider_id = $('#delete_Adultrider_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteAdultRiderDetails/" + delete_Adultrider_id,
                success: function(data) {

                    $('#deleteAdultmodal').modal('hide');

                    $bookingID = $('#hdbBookingID').val();
                    $hdnbookingUserID = $('#hdbUserID').val();
                    $.ajax({
                        url: "{{ route('User-Get-noofAdult-bybookingId') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "bookingID": $bookingID,
                            "userID": $hdnbookingUserID
                        },
                        dataType: "json",
                        success: function(responce) {
                            $('#tblAdultDetails tbody')
                                .html("");
                            $.each(responce.result,
                                function(key,
                                    item) {
                                    var Sex = '';
                                    if (item.sex ==
                                        1) {
                                        Sex = 'Male';
                                    } else if (item
                                        .sex == 2) {
                                        Sex =
                                            'FeMale';
                                    } else if (item
                                        .sex == 3) {
                                        Sex =
                                            'Others';
                                    } else {
                                        Sex = '';
                                    }
                                    $('#tblAdultDetails tbody')
                                        .append(
                                            '<tr>' +
                                            '<td>' +
                                            item
                                            .full_name +
                                            '</td>' +
                                            '<td>' +
                                            item
                                            .age +
                                            '</td>' +
                                            '<td>' +
                                            Sex +
                                            '</td>' +
                                            '<td>' +
                                            '<button type="button" value="' +
                                            item
                                            .id +
                                            '" class="btn btn-danger deleteAdultRow" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteAdultmodal">-</button>' +
                                            '</td>' +
                                            '</tr>'
                                        );
                                });

                        }
                    });
                }
            });
        });
        //****** End Adult Delete Section****

        // Delete Child nterestedtable
        $(document).on('click', '.deleteChildRow', function(e) {
            e.preventDefault();
            var rider_id = $(this).val();
            $('#delete_Childrider_id').val(rider_id);
        });
        $('.delete_Childrider_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_Childrider_id = $('#delete_Childrider_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteChildRiderDetails/" + delete_Childrider_id,
                success: function(data) {

                    $('#deleteChildmodal').modal('hide');

                    $bookingID = $('#hdbBookingID').val();
                    $hdnbookingUserID = $('#hdbUserID').val();
                    $.ajax({
                        url: "{{ route('User-Get-noofChildAdult-bybookingId') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "bookingID": $bookingID,
                            "userID": $hdnbookingUserID
                        },
                        dataType: "json",
                        success: function(responce) {

                            $('#tblChildDetails tbody')
                                .html("");
                            $.each(responce.result,
                                function(key,
                                    item) {
                                    var Sex = '';
                                    if (item.sex ==
                                        1) {
                                        Sex =
                                            'Male';
                                    } else if (item
                                        .sex == 2) {
                                        Sex =
                                            'FeMale';
                                    } else if (item
                                        .sex == 3) {
                                        Sex =
                                            'Others';
                                    } else {
                                        Sex = '';
                                    }
                                    $('#tblChildDetails tbody')
                                        .append(
                                            '<tr>' +
                                            '<td>' +
                                            item
                                            .full_name +
                                            '</td>' +
                                            '<td>' +
                                            item
                                            .age +
                                            '</td>' +
                                            '<td>' +
                                            Sex +
                                            '</td>' +
                                            '<td>' +
                                            '<button type="button" value="' +
                                            item
                                            .id +
                                            '" class="btn btn-danger deleteChildRow" data-bs-toggle="modal" data-bs-target="#deleteChildmodal">-</button>' +
                                            '</td>' +
                                            '</tr>'
                                        );
                                });
                        }
                    });
                }
            });
        });
        //****** End Child Delete Section****

        // Delete Infant nterestedtable
        $(document).on('click', '.deleteInfantRow', function(e) {
            e.preventDefault();
            var rider_id = $(this).val();
            $('#delete_Infantrider_id').val(rider_id);
        });
        $('.delete_Infantrider_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_Infantrider_id = $('#delete_Infantrider_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteInfantRiderDetails/" + delete_Infantrider_id,
                success: function(data) {

                    $('#deleteInfantmodal').modal('hide');

                    $bookingID = $('#hdbBookingID').val();
                    $hdnbookingUserID = $('#hdbUserID').val();
                    $.ajax({
                        url: "{{ route('User-Get-noofInfant-bybookingId') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "bookingID": $bookingID,
                            "userID": $hdnbookingUserID
                        },
                        dataType: "json",
                        success: function(responce) {

                            $('#tblInfantDetails tbody')
                                .html("");
                            $.each(responce.result,
                                function(key,
                                    item) {
                                    var Sex = '';
                                    if (item.sex ==
                                        1) {
                                        Sex =
                                            'Male';
                                    } else if (item
                                        .sex == 2) {
                                        Sex =
                                            'FeMale';
                                    } else {
                                        Sex = '';
                                    }
                                    $('#tblInfantDetails tbody')
                                        .append(
                                            '<tr>' +
                                            '<td>' +
                                            item
                                            .full_name +
                                            '</td>' +
                                            '<td>' +
                                            item
                                            .age +
                                            '</td>' +
                                            '<td>' +
                                            Sex +
                                            '</td>' +
                                            '<td>' +
                                            '<button type="button" value="' +
                                            item
                                            .id +
                                            '" class="btn btn-danger deleteInfantRow" data-bs-toggle="modal" data-bs-target="#deleteInfantmodal">-</button>' +
                                            '</td>' +
                                            '</tr>'
                                        );
                                });
                        }
                    });
                }
            });
        });
        //****** End Infant Delete Section****

        $('#familyDetailsSave').on('click', function() {
            $bookingID = $('#hdbBookingID').val();
            $noOfadult = $('#noofadult').val();
            $noofchild = $('#noofchild').val();
            $noofinfant = $('#noofinfant').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($noOfadult == '') {
                alert("Enter How many rider include");
                $('#noofadult').focus();
                return false;
            } else if ($noofchild == '') {
                alert("Enter How many child rider include");
                $('#noofchild').focus();
                return false;
            } else if ($noofinfant == '') {
                alert("Enter How many Infant you caried. Kindly Mention");
                $('#noofchild').focus();
                return false;
            } else {
                $.ajax({
                    url: "{{ route('User-FamilyDetails-Update') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "bookingID": $bookingID,
                        "noOfadult": $noOfadult,
                        "noofchild": $noofchild,
                        "noofinfant": $noofinfant,
                    },
                    dataType: "json",
                    success: function(data) {
                        // Fetch                                    
                        if (data.message == "success") {
                            window.location = '/user/viewBooking/' + $bookingID;
                        }
                    }
                });
            }
        });
    </script>
@endsection
