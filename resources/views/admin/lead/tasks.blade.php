@extends('layouts.admin-front')
@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu
     group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md 
     group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm 
     pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 
     group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 
     group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl 
     group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto 
     group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] 
     group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Activity</h4>
                            <div class="card-header-action">
                                {{-- <a href="{{ route('admin-create-lead') }}" class="btn btn-primary">Add Lead</a> --}}
                                {{-- <a href="{{ route('view.addTasks', $lead->id) }}" class="btn btn-sm btn-warning"> Add Tasks</a> --}}
    
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="w-full whitespace-nowrap" style="width:100%;" id="tableState">
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
                                            <td>{{ $i }}</td>
                                            {{-- <td>{{ $task->id }}</td> --}}
                                            <td>{{ $task->description }}</td>
                                            <td>{{ $task->mode }}</td>
                                            <td>{{ \Carbon\Carbon::parse($task->date)->format('Y-m-d') }}</td>
                                            <td>
                                                @if ($task->createdBy->role_type == 'user')
                                                    Employee
                                                @else
                                                    Admin
                                                @endif
                                            </td>
                                            <td>{{ $task->status }}</td>
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
            $('#tableState').DataTable({
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
