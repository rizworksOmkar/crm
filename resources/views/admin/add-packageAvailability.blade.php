@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <form id="add_package_itenary_form">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h4>Add Group Departure Or Fixed Departure Or Package Availability</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="package_id">Select Package *</label>
                            <select name="package_id" id="package_id" class="form-control">
                                <option value="0">Select Package</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="restrictions">Group Departure Or Fixed Departure Or Package Availability Date *</label>
                        <table class="table table-sm" id="tblSeason">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">Package Id</th>
                                    <th scope="col">Availability Date</th>
                                    {{-- <th scope="col">Display Price</th>
                                    <th scope="col">Available Price</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td style="display: none">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="hdnPackageid"
                                                id="hdnPackageid">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="availability_date"
                                                id="availability_date">
                                        </div>
                                    </td>

                                    {{-- <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="display_price"
                                                id="display_price">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="available_price"
                                                id="available_price">
                                        </div>
                                    </td> --}}


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
                    <button type="submit" class="btn btn-primary" id="saveItenary">Add +</button>
                    <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back to main menu</a>
                </div>
            </div>
        </form>
    </div>
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
        $(document).on('change', '#package_id', function() {
            var packageId = $(this).val();
            $('#hdnPackageid').val(packageId);
            // alert(formatedDate('2024-05-02'));
            if (packageId > 0) {

                $.ajax({
                    url: "{{ route('admin-package-availability-fetch') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "packageid": packageId,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblSeason tbody').html("");
                        $.each(response.packagesavailabilities, function(key, item) {
                            var availDate = new Date(item.availability_date);
                            // var displayamount = "";
                            // var availableamount = "";
                            // if (item.display_price == null) {
                            //     displayamount = "";
                            // } else {
                            //     displayamount = item.display_price;
                            // }
                            // if (item.available_price == null) {
                            //     availableamount = "";
                            // } else {
                            //     availableamount = item.available_price;
                            // }
                            $('#tblSeason tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.package_id +
                                '</td>' +
                                '<td>' +
                                availDate.toLocaleDateString("fr-FR") +
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
                $('#tblSeason tbody').html("");
            }


        });

        $('#addSeason').on('click', function() {
            $hdnPackageid = $('#hdnPackageid').val();
            $availability_date = $('#availability_date').val();
            // $display_price = $('#display_price').val();
            // $available_price = $('#available_price').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnPackageid == '') {
                alert("Select Pacakage");
                return false;
            }

            if ($availability_date == '') {
                alert("Enter Date");
                return false;
            }

            // Save ***
            $.ajax({
                url: "{{ route('admin-package-availability-store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "packageid": $hdnPackageid,
                    "availability_date": $availability_date,                  

                },
                dataType: "json",
                success: function(data) {


                    // Fetch

                    if (data.message == "success") {
                        $.ajax({
                            url: "{{ route('admin-package-availability-fetch') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "packageid": $hdnPackageid,
                            },
                            dataType: "json",
                            success: function(response) {

                                $('#tblSeason tbody').html("");
                                $.each(response.packagesavailabilities, function(key,
                                    item) {
                                    var availDate = new Date(item
                                        .availability_date);
                                    // var displayamount = "";
                                    // var availableamount = "";
                                    // if (item.display_price == null) {
                                    //     displayamount = "";
                                    // } else {
                                    //     displayamount = item.display_price;
                                    // }
                                    // if (item.available_price == null) {
                                    //     availableamount = "";
                                    // } else {
                                    //     availableamount = item.available_price;
                                    // }
                                    $('#tblSeason tbody').append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        item.package_id +
                                        '</td>' +
                                        '<td>' +
                                        availDate.toLocaleDateString("fr-FR") +
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
                        $('#availability_date').val('')
                            .attr('type', 'text')
                            .attr('type', 'date');
                           
                    }
                }
            });

        });

        // Delete

        $(document).on('click', '.deleteRow', function(e) {
            e.preventDefault();
            var avaialablity_id = $(this).val();
            $('#delete_season_id').val(avaialablity_id);

        });

        $('.delete_season_id_btn').on('click', function(e) {
            e.preventDefault();

            var delete_avaialablity_id = $('#delete_season_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/delete-package-availability/" + delete_avaialablity_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');

                    $hdnPackageid = $('#hdnPackageid').val();
                    $.ajax({
                        url: "{{ route('admin-package-availability-fetch') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "packageid": $hdnPackageid,
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#tblSeason tbody').html("");
                            $.each(response.packagesavailabilities, function(key, item) {
                                var availDate = new Date(item
                                    .availability_date);
                                // var displayamount = "";
                                // var availableamount = "";
                                // if (item.display_price == null) {
                                //     displayamount = "";
                                // } else {
                                //     displayamount = item.display_price;
                                // }
                                // if (item.available_price == null) {
                                //     availableamount = "";
                                // } else {
                                //     availableamount = item.available_price;
                                // }
                                $('#tblSeason tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.package_id +
                                    '</td>' +
                                    '<td>' +
                                    availDate.toLocaleDateString("fr-FR") +
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


        });

        $('#backMenu').on('click', function() {
            window.location.reload();
        });
    </script>
@endsection
