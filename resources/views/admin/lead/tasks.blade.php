@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tasks</h4>
                    <div class="card-header-action">
                        {{-- <a href="{{ route('admin-create-lead') }}" class="btn btn-primary">Add Lead</a> --}}
                        {{-- <a href="{{ route('view.addTasks', $lead->id) }}" class="btn btn-sm btn-warning"> Add Tasks</a> --}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    {{-- <th>Task Id</th> --}}
                                    <th>Description</th>
                                    <th>Mode</th>
                                    <th>Date</th>
                                    <th>Created by</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($lead->tasks as $task)
                                    @php $i++; @endphp
                                    <tr>
                                        <th>{{ $i }}</th>
                                        {{-- <th>{{ $task->id }}</th> --}}
                                        <th>{{ $task->description }}</th>
                                        <th>{{ $task->mode }}</th>
                                        <th>{{ \Carbon\Carbon::parse($task->date)->format('Y-m-d') }}</th>
                                        <th>
                                            @if ($task->createdBy->role_type == 'user')
                                                Employee
                                            @else
                                                Admin
                                            @endif
                                        </th>
                                        <th>{{ $task->status }}</th>
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
@endsection
