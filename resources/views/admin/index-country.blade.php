@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Country Master</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.country') }}" class="btn btn-primary">Add Country</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableCity">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Country Name</th>
                                    <th>Country alias</th>
                                    <th>Country Phone code</th>
                                    <th>International or Domestic</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($countries as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ getCountryName($data->id) }}</td>
                                        <td>{{ $data->country_alias }}</td>
                                        <td style="text-align: center">
                                            @if ($data->country_code)
                                                + {{ $data->country_code }}
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->d_i_f == 1)
                                                <div class="badge badge-pill badge-info mb-1 float-center">Domestic</div>
                                            @else
                                                <div class="badge badge-pill badge-success mb-1 float-center">International
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="buttons">

                                                {{-- <a href="{{ url('/admin/user/edit/' . $data->id) }}"
                                                class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                title="view and Edit Your User"><i class="far fa-eye"></i></a> --}}

                                                <a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                    title="view and Edit Your Country"><i class="far fa-eye"></i></a>

                                                <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                    data-toggle="tooltip" title="Delete your Country"
                                                    href="javacript:void(0)" id="deleteCountry_{{ $data->id }}"><i
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
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableCity').DataTable({
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
    </script>
    @if ($countries)
        @foreach ($countries as $data)
            <script>
                $('#deleteCountry_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected COUNTRY?",
                            text: "Once deleted, you will never get this COUNTRY back. It will have to be rebuilt a new ",
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
                                    url: "{{ route('admin.country.delete') }}",
                                    method: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: id
                                    },
                                    success: function(response) {
                                        swal({
                                            icon: "success",
                                            text: "Country deleted successfully",
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
