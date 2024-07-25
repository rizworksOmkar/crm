@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Status</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin-create-status') }}" class="btn btn-primary">Add Status</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Status Types</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>No response</td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>Contact & Response</td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>Site Visit Done</td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td>Site Visit Requested</td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td>Visit Postponed</td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td>Follow up needed</td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td>Follow up done</td>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <td>Not Interested</td>
                                </tr>
                                <tr>
                                    <th>9</th>
                                    <td>Closed Successfully</td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <td>Closed with Failure</td>
                                </tr>
                                <tr>
                                    <th>11</th>
                                    <td>Invalid Contact Details</td>
                                </tr>
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
    {{-- @if ($leads)
        @foreach ($leads as $lead)
            <script>
                $(document).on('click', '.delete-lead-btn', function() {
                    var leadId = $(this).attr('submitid');
                    if (confirm('Are you sure you want to delete this lead?')) {
                        $.ajax({
                            url: '/leads/' + leadId,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload();
                            },
                            error: function(error) {
                                console.error('Error deleting lead:', error);
                                alert('Error: Unable to delete lead.');
                            }
                        });
                    }
                });
            </script>
        @endforeach
    @endif --}}
@endsection
