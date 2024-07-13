@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sub Services create</h4>
                    <div class="card-header-action">
                       
                        <a href="{{ route('admin.Sub-Services-create') }}" class="btn btn-primary">Add Service</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableCity">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Title</th>
                                    <th>Service Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $i=0; @endphp
                                @if ($subServiceCount > 0)
                                    @foreach ($Subservices as $data)
                                        @php $i++; @endphp
                                        <tr>
                                            <th>{{ $i }}</th>
                                            <td>{{ $data->title }}</td>                                            
                                            <td>
                                                <img src="{{$data->service_images}}" alt="{{ $data->service_images }}" class="img-thumbnail" width ="90">
                                            </td>
                                            <td>
                                                <div class="buttons">                                                  
                                                     
                                                    <a href="{{ url('/EditSubServices/'. $data->id) }}" class="btn btn-icon btn-sm btn-info"
                                                        data-toggle="tooltip" title="view and Edit Your Country"><i
                                                            class="far fa-eye"></i></a>

                                                    <a submitid="{{ $data->id }}" class="btn btn-icon btn-sm btn-danger"
                                                        data-toggle="tooltip" title="Delete your City"
                                                        href="javacript:void(0)" id="deleteCountry_{{ $data->id }}"><i
                                                            class="fas fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                @endif

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
    @if ($Subservices)
        @foreach ($Subservices as $data)
            <script>
                $('#deleteCountry_{{ $data->id }}').click(function() {
                    swal({
                            title: "Do you want to delete your selected Service?",
                            text: "Once deleted, you will never get this Service back. It will have to be rebuilt a new ",
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
                                    url: "{{ route('admin-Sub-Services-Delete') }}",
                                    method: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: id
                                    },
                                    success: function(response) {
                                        swal({
                                            icon: "success",
                                            text: "Service deleted successfully",
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
