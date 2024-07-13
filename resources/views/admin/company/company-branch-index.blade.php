@extends('layouts.admin-front')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Country Master</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.company.company-branch-add') }}" class="btn btn-primary">Add Branch</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableCity">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Branch Address</th>
                                    <th>Branch Phone</th>
                                    <th>Branch Email</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($branches as $data)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{$data->company_address }}</td>
                                        <td>{{ $data->phone_number_1 }}</td>
                                        <td>{{ $data->company_email_1 }}</td>
                                        <td>
                                            <div class="buttons">


                                                    <a href="{{ route('admin.company.company-branch-edit', ['id' => $data->id]) }}"
                                                        class="btn btn-icon btn-sm btn-info" data-toggle="tooltip"
                                                        title="Edit Branch">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip"
                                                        title="Delete Branch"
                                                        onclick="deleteBranch('{{ $data->id }}')">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>


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
        function deleteBranch(branchId) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this branch!",
                icon: "warning",
                buttons: ["Cancel", "Delete"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin-company-branch-delete/" + branchId,
                        type: "POST",
                        success: function(response) {
                            if (response.success) {
                                swal({
                                    title: "Success",
                                    text: "Branch deleted successfully.",
                                    icon: "success",
                                    button: "OK",
                                }).then((willconfirm) => {
                                    if (willconfirm) {
                                        window.location.replace("/admin-company-branch");
                                    }
                                });
                            } else {
                                swal({
                                    title: "Error",
                                    text: response.message,
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            swal({
                                title: "Error",
                                text: "An error occurred. Please try again later.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                }
            });
        }
    </script>

@endsection
