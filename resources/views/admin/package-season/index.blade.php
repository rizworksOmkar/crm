@extends('layouts.admin-front')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <form id="add_package_itenary_form">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h4>Add Package Season</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="package_id">Select Package *</label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="0">Select Package</option>
                            @foreach ($packages as $package)
                                @if ($package->groupdepartureflag == 1)
                                <option value="{{ $package->id }}">{{ $package->package_name }} -FD</option>
                                @else
                                    
                                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="restrictions">Season *</label>
                    <table class="table table-sm" id="tblSeason">
                        <thead>
                            <tr>
                                <th scope="col" style="display: none">Package Id</th>
                                <th scope="col">Season Type</th>
                                <th scope="col">Season Start Date</th>
                                <th scope="col">Season End Date</th>
                                <th scope="col">Season Price</th>
                                <th scope="col">Action</th>
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
                                <td>
                                    <div class="form-group">
                                        <select class="custom-select" id="season_type" name="season_type">

                                            <option value="0">Select season</option>
                                            @foreach ($seasonpackages as $sl)
                                                <option value="{{ $sl->id }}">{{ $sl->season_name }}</option>
                                            @endforeach
                                            {{-- <option value="On Season">On Season</option>
                                            <option value="Off Season">Off Season</option>
                                            <option value="Festive Season">Festive Season</option>
                                            <option value="Mid Season">Mid Season</option> --}}


                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="season_start" id="season_start">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="season_end" id="season_end">
                                    </div>
                                </td>
                                {{-- season_price --}}
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="season_price" id="season_price">

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
                <a href="javascript:void(0);" class="btn btn-danger" id="backMenu">Back to main menu</a>
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
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);

            $('#season_start').attr('min', maxDate);
             $('#season_end').attr('min', maxDate);
        });
        $(document).on('change', '#package_id', function() {
            var packageId = $(this).val();
            $('#hdnPackageid').val(packageId);

            if (packageId > 0) {

                $.ajax({
                    url: "{{ route('admin.package.seasondetails') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "packageid": packageId,
                    },
                    dataType: "json",
                    success: function(response) {

                        $('#tblSeason tbody').html("");
                        $.each(response.seasons, function(key, item) {
                            var startDate = new Date(item.season_start);
                            var endDate = new Date(item.season_end);
                            $('#tblSeason tbody').append(
                                '<tr>' +
                                '<td style="display: none">' +
                                item.package_id +
                                '</td>' +
                                '<td>' +
                                item.season_name +
                                '</td>' +
                                '<td>' +
                                startDate.toLocaleDateString("fr-FR") +
                                '</td>' +

                                '<td>' +
                                endDate.toLocaleDateString("fr-FR") +
                                '</td>' +

                                '<td>' +
                                item.season_price +
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
            $season_type = $('#season_type').val();
            $season_start = $('#season_start').val();
            $season_end = $('#season_end').val();
            $season_price = $('#season_price').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($hdnPackageid == '') {
                alert("Select Pacakage");
                return false;
            }
            if ($season_type == 0) {
                alert("Select Season Type");
                return false;
            }
            if ($season_start == '') {
                alert("Enter Season Start Date");
                return false;
            }
            if ($season_end == 0) {
                alert("Enter Season End Date");
                return false;
            }

            // Save ***
            $.ajax({
                url: "{{ route('admin.package.seasonadd.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "packageid": $hdnPackageid,
                    "season_type": $season_type,
                    "season_start": $season_start,
                    "season_end": $season_end,
                    "season_price": $season_price,
                },
                dataType: "json",
                success: function(data) {


                    // Fetch


                    if (data.flag == "1") {
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            button: "Ok",
                        }).then((willconfirm) => {

                            return false;
                        });
                    }

                    if (data.message == "success") {
                        $.ajax({
                            url: "{{ route('admin.package.seasondetails') }}",
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "packageid": $hdnPackageid,
                            },
                            dataType: "json",
                            success: function(response) {

                                $('#tblSeason tbody').html("");
                                $.each(response.seasons, function(key, item) {
                                    var startDate = new Date(item.season_start);
                                    var endDate = new Date(item.season_end);
                                    $('#tblSeason tbody').append(
                                        '<tr>' +
                                        '<td style="display: none">' +
                                        item.package_id +
                                        '</td>' +
                                        '<td>' +
                                        item.season_name +
                                        '</td>' +
                                        '<td>' +
                                        startDate.toLocaleDateString("fr-FR") +
                                        '</td>' +

                                        '<td>' +
                                        endDate.toLocaleDateString("fr-FR") +
                                        '</td>' +

                                        '<td>' +
                                        item.season_price +
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
                                $('#season_start').val("");
                                $('#season_end').val("");
                                $('#season_price').val("");
                                $('select#season_type').val('0');
                            }
                        });

                    }
                }
            });

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
                url: "/deleteSeasonDetails/" + delete_season_id,
                success: function(response) {
                    console.log(response);
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');

                    $hdnPackageid = $('#hdnPackageid').val();
                    $.ajax({
                        url: "{{ route('admin.package.seasondetails') }}",
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "packageid": $hdnPackageid,
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#tblSeason tbody').html("");
                            $.each(response.seasons, function(key, item) {
                                var startDate = new Date(item.season_start);
                                var endDate = new Date(item.season_end);
                                $('#tblSeason tbody').append(
                                    '<tr>' +
                                    '<td style="display: none">' +
                                    item.package_id +
                                    '</td>' +
                                    '<td>' +
                                    item.season_name +
                                    '</td>' +
                                    '<td>' +
                                    startDate.toLocaleDateString("fr-FR") +
                                    '</td>' +

                                    '<td>' +
                                    endDate.toLocaleDateString("fr-FR") +
                                    '</td>' +
                                    '<td>' +
                                    item.season_price +
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

        $('#backMenu').on('click', function() {
            window.location.reload();
        });
    </script>
@endsection
