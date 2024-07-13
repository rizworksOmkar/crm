@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>City Master</h4>
                    <div class="card-header-action">
                        {{-- <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                          <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                            Delete</a>
                        </div>
                      </div> --}}
                        <a href="{{ route('admin.city') }}" class="btn btn-primary">Add City</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableCity">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>
                                    <th>City Name</th>
                                    <th>City Alias</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($cities as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ getCountryName($data->country_id) }}</td>
                                        <td>{{ getStateName($data->state_id) }}</td>
                                        <td>{{ getCityName($data->id) }}</td>
                                        <td>
                                            {{ $data->city_alias }}
                                        </td>
                                        <td>
                                            <div class="buttons">

                                                {{-- <a href="{{ url('/admin/user/edit/' . $data->id) }}"
                                                class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                title="view and Edit Your User"><i class="far fa-eye"></i></a> --}}

                                                <a href="#" class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                    title="view and Edit Your Country"><i class="far fa-eye"></i></a>

                                                <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                    data-toggle="tooltip" title="Delete your City" href="javacript:void(0)"
                                                    id="deleteCountry_{{ $data->id }}"><i class="fas fa-times"></i></a>
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
    @if ($cities)
        @foreach ($cities as $data)
            <script>
                $('#deleteCountry_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected CITY?",
                            text: "Once deleted, you will never get this CITY back. It will have to be rebuilt a new ",
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
                                    url: "{{ route('admin.city.delete') }}",
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
