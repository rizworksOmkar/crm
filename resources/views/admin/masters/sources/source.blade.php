@extends('layouts.admin-front')
@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                    <!--end col-->
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                                <div class="xl:col-span-3">
                                    <h4 class="text-15">Sources</h4>
                                </div>
                                <!--end col-->
                                <div class="xl:col-span-3 xl:col-start-12">
                                    <div class="flex gap-0">
                                        {{-- <div class="relative grow">
                                            <input type="text"
                                                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Search for ..." autocomplete="off" />
                                            <i data-lucide="search"
                                                class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                        </div> --}}
                                        {{-- <button type="button"
                                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                            <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-download-2-line"></i>
                                            Export
                                        </button> --}}
                                        <a href="#" id="addLeadSourceBtn"
                                            class="btn text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                                            Source</a>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>

                            {{-- <div id="addLeadSourceForm" style="display: none">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <form id="add_lead_source_form" action="{{ route('lead-sources.store') }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Create Lead Source</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group col-md-6">
                                                    <label for="lead_source">Add Lead Source</label>
                                                    <input type="text" class="form-control" id="lead_source"
                                                        name="lead_source" placeholder="Enter Lead Source">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                                <a href="/source" class="btn btn-danger ml-5">Back To Main Menu</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div id="addLeadSourceForm" style="display: none">
                                <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-3 mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="add_lead_source_form" action="{{ route('lead-sources.store') }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                <div class="card-header mb-3">
                                                    <h4>Create Lead Source</h4>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="inline-block mb-2 text-base font-medium"
                                                        for="lead_source">Add Lead Source <span
                                                            class="text-red-500">*</span></label>
                                                    <input type="password" id="lead_source" name="lead_source"
                                                        placeholder=""
                                                        class="form-input border-slate-200 dark:border-zink-500 
                                                        focus:outline-none focus:border-custom-500 disabled:bg-slate-100 
                                                        dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 
                                                        dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 
                                                        dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 
                                                        dark:placeholder:text-zink-200"
                                                        required="">
                                                </div>
                                                <div class="lead_sourc_btn">
                                                    <button type="submit"
                                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white 
                                                    hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                                                    focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                                                     active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                                                      active:ring-custom-100 dark:ring-custom-400/20">Create</button>
                                                    <a href="/source"
                                                        class="btn btn-sm btn-danger bg-red-500 text-white ml-2">Back To
                                                        Main Menu</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end grid-->
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap">
                                    <thead
                                        class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                        <tr>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Sl no
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Lead Sources
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                State
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Change State
                                            </th>
                                            <th
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sources as $source)
                                            <tr>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $source->lead_source }}</td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                    @if ($source->state_lead_source == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">

                                                    <button id="toggle-status" data-status-id="{{ $source->id }}"
                                                        class="btn btn-primary toggle-status text-white bg-custom-800">Changes
                                                        Status</button>

                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">

                                                    <form style="display: inline-block;" method="POST"
                                                        action="{{ route('lead-sources.destroy', $source->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger bg-red-500 text-white"
                                                            onclick="return confirm('Are you sure you want to delete this property type?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col items-center mt-5 md:flex-row">
                                <div class="mb-4 grow md:mb-0">
                                    <p class="text-slate-500 dark:text-zink-200">
                                        Showing <b>07</b> of <b>19</b> Results
                                    </p>
                                </div>
                                <ul class="flex flex-wrap items-center gap-2 shrink-0">
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                                class="mr-1 size-4 rtl:rotate-180" data-lucide="chevron-left"></i>
                                            Prev</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">1</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto active">2</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">3</a>
                                    </li>
                                    <li>
                                        <a href="#!"
                                            class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">Next
                                            <i class="ml-1 size-4 rtl:rotate-180" data-lucide="chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/OldAssets/bundles/datatables/datatables.min.js') }}"></script>
    <script
        src="{{ asset('assets/admin/OldAssets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/OldAssets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/OldAssets/js/page/datatables.js') }}"></script>
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

        $('#addLeadSourceBtn').click(function() {
            $('#addLeadSourceForm').toggle();
        });

        $('.toggle-status').click(function() {
            var statusid = $(this).data('status-id');
            $.ajax({
                url: '/leadsourcechange/' + statusid + '/toggle-status',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    alert(response.message);
                    location.reload();
                }
            });
        });
    </script>
@endsection
