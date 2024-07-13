@extends('layouts.admin-front')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Rule Engine For Domestic Packages.</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>City Wise</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="coutnry_id" class="col-sm-3 col-form-label">Select City</label>
                                <div class="col-sm-9">
                                    <select name="city_id" id="city_id" class="form-control select2 form-control-sm">
                                        <option value="">Select city</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="btnFilterbyCity">Filter By City</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Night Wise</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="coutnry_id" class="col-sm-3 col-form-label">Number Of Night</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control .numberonly" id="for_number_of_nights"
                                        name="for_number_of_nights" placeholder="Input Number Of Nights for filter">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="btnFilterbyNight">Filter By Night</button>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4></h4>
                            <div class="card-header-action">
                                <a href="javacript:void(0)" class="btn btn-primary" id="reload">
                                    <i class="fas fa-redo" aria-hidden="true"></i> Reset
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <form id="frmrulepackage">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control numberonly" name="hdnCategory"
                                        id="hdnCategory" />
                                        <input type="hidden" class="form-control numberonly" name="hdnCity"
                                        id="hdnCity" />    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Select Pacakges</span>
                                            </div>
                                            <select class="form-control select2" name="slectpacakages" id="slectpacakages">
                                                <option value="0">Select Packages</option>
                                                @foreach ($packages as $item)
                                                    <option value="{{ $item->id }}">{{ $item->package_name }}
                                                        ({{ $item->for_number_of_days }} Days /
                                                        {{ $item->for_number_of_nights }}
                                                        Nights)
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="addRulePackage">ADD
                                                    +</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List OF Rule Engine for packages</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" style="width:100%;" id="tablepacakages">
                                    <colgroup>
                                        <col style="width: 10%" />
                                        <col style="width: 40%" />
                                        <col style="width: 40%" />
                                        <col style="width: 10%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>City</th>
                                            <th>Pacakages Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($rulpackages as $data)
                                            @php $i++; @endphp
                                            <tr>
                                                <th>{{ $i }}</th>
                                                <td>
                                                    {{getCityName($data->city_id) }}
                                                </td>
                                                <td>{{ getpackageName($data->package_id) }}
                                                    ({{ getDaysandNight($data->package_id) }})
                                                </td>
                                                <td>
                                                    <div class="buttons">

                                                        <a submitid="{{ $data->id }}"
                                                            class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                            title="Delete your City" href="javacript:void(0)"
                                                            id="deleteCountry_{{ $data->id }}"><i
                                                                class="fas fa-times"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.numberonly').keypress(function(e) {
                var charCode = (e.which) ? e.which : event.keyCode
                if (String.fromCharCode(charCode).match(/[^0-9]/g))
                    return false;
            });
            $('#tablepacakages').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": false,
                "info": false,
                // dom: 'Bfrtip',
                // buttons: [
                //     'excel', 'pdf'
                // ]
            });
        });

        $(document).on('change', '#slectpacakages', function() {
            var pacakage_id = $(this).val();
            $.ajax({
                url: "{{ route('admin.homepage-pacakages-category.get') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "pacakageid": pacakage_id,
                },
                dataType: "json",
                success: function(data) {
                    $('#hdnCategory').val('');
                    $('#hdnCity').val('');
                    $.each(data, function(key, response) {
                        $('#hdnCategory').val(response.category);
                        $('#hdnCity').val(response.city_id);
                    });


                }
            });
        });

        $('#btnFilterbyCity').click(function(event) {
            event.preventDefault();
            var city_id = $('#city_id').val();
            if (city_id == 0) {
                swal({
                    title: "Error",
                    text: "Please select City.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            } else {
                $.ajax({
                    url: "{{ route('admin-homepage-DOM-pacakages-City-get') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "cityid": city_id,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data.countryINTorDOM);
                        if (data) {
                            $('#slectpacakages').empty();
                            $('select[name="slectpacakages"]').append(
                                '<option value="0">Select Packages</option>');
                            $.each(data, function(key, response) {
                                $('select[name="slectpacakages"]').append(
                                    '<option value="' + response.id +
                                    '">' + response
                                    .package_name + ' (' + response.for_number_of_days +
                                    ' Days / ' + response.for_number_of_nights +
                                    ' Nights) </option>');
                            });
                        } else {
                            $('#slectpacakages').empty();
                        }

                    }
                });
            }

        });

        $('#btnFilterbyNight').click(function(event) {
            event.preventDefault();
            var night = $('#for_number_of_nights').val();
            if (night == '') {
                swal({
                    title: "Error",
                    text: "Please enter nights.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            } else {
                $.ajax({
                    url: "{{ route('admin-homepage-DOM-pacakages-Night-get') }}",
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "night": night,
                    },
                    dataType: "json",
                    success: function(data) {
                        // console.log(data.countryINTorDOM);
                        if (data) {
                            $('#slectpacakages').empty();
                            $('select[name="slectpacakages"]').append(
                                '<option value="0">Select Packages</option>');
                            $.each(data, function(key, response) {
                                $('select[name="slectpacakages"]').append(
                                    '<option value="' + response.id +
                                    '">' + response
                                    .package_name + ' (' + response.for_number_of_days +
                                    ' Days / ' + response.for_number_of_nights +
                                    ' Nights) </option>');
                            });
                        } else {
                            $('#slectpacakages').empty();
                        }

                    }
                });
            }

        });

        $('#reload').click(function(event) {
            event.preventDefault();
            location.reload();
        });


        $('#addRulePackage').click(function(event) {
            event.preventDefault();
            var packages = $('#slectpacakages').val();
            var myform = document.getElementById("frmrulepackage");
            if (packages == 0) {
                swal({
                    title: "Error",
                    text: "Please select package.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('homepage-packages-store') }}",
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
                                    //window.location.replace("/storehomepagebanner");;
                                    location.reload();
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
            }
        });
    </script>
    @if ($rulpackages)
        @foreach ($rulpackages as $data)
            <script>
                $('#deleteCountry_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected PACKAGE?",
                            text: "Once deleted, you will never get this PACKAGE back. It will have to be rebuilt a new ",
                            icon: "warning",
                            buttons: true,
                            showCancelButton: true,
                            dangerMode: true,
                            confirmButtonColor: "#0D83DA",
                            confirmButtonText: "Confirm ",
                            cancelButtonColor: "#E21A4F ",
                            cancelButtonText: "Cancel",
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).attr('submitid');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('admin.PackagesRulles-delete') }}",
                                    method: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: id
                                    },
                                    success: function(response) {
                                        swal({
                                            icon: "success",
                                            text: "Package deleted successfully",
                                        }).then((willconfirm) => {
                                            if (willconfirm) {
                                                location.reload();
                                            }
                                        });
                                    }
                                });
                            } else {
                                swal("Your file is safe!");
                            }
                        });
                });
            </script>
        @endforeach
    @endif
@endsection
