@extends('layouts.admin-front')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Package Activity Master</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.packageactivitymaster') }}" class="btn btn-primary">Add Package Activity</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover my-table" style="width:100%;" id="tablePackage">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Package activity </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($packageactivities as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $data->package_activity }}</td>

                                        <td>
                                            <a href="{{ route('admin.packageactivity-edit', ['id' => $data->id]) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger delete-package"
                                                data-package-id="{{ $data->id }}">Delete</a>
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
    <script activity="text/javascript">
        $(document).ready(function() {
            $('#tablePackage').DataTable({
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

            $('.delete-package').click(function(event) {
                event.preventDefault();

                var packageId = $(this).data('package-id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, the package will be permanently removed.",
                    icon: "warning",
                    buttons: ["Cancel", "Delete"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Send delete request
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/delete-packagesActivity/" + packageId,
                            type: "DELETE",
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    swal({
                                        title: "Success",
                                        text: "Package activity deleted successfully.",
                                        icon: "success",
                                    }).then((willConfirm) => {
                                        if (willConfirm) {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    swal({
                                        title: "Error",
                                        text: response.message,
                                        icon: "error",
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal({
                                    title: "Error",
                                    text: "An error occurred. Please try again later.",
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
