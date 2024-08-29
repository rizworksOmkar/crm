@extends('layouts.admin-front')
<style>
    .dataTables_filter {
        display: none;
    }
</style>
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                    <div class="col-span-12 card 2xl:col-span-12">
                        <div class="card-body">
                            <div class="card-header">
                                <h4>Activity Notifications</h4>
                            </div>
                            <div class="card-body">
                                <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3 mb-4">
                                    <div class="mb-4">
                                        <label for="date" class="inline-block mb-2 text-base font-medium">Select
                                            Date:</label>
                                        <input type="date"
                                            class="form-control form-input border-slate-200 
                                                   dark:border-zink-500 focus:outline-none focus:border-custom-500
                                                    disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 
                                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 
                                                    dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 
                                                    placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            id="date" name="date">
                                    </div>

                                </div>
                                <div class="overflow-x-auto">
                                    <table class="table table-striped w-full display stripe group" id="tableLead">
                                        <thead class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                            <tr>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Lead No.</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Task Date</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Customer Name</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Customer Phone</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Customer Email</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Customer Description</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Emp Feedback</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Task Status</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Task Mode</th>
                                                <th  class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Task Created By</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tasks-table">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#tableLead').DataTable({
                "scrollX": false,
                stateSave: false,
                "paging": false,
                "ordering": false,
                "info": false,
            });



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#date').change(function() {
                var date = $('#date').val();
                $.ajax({

                    url: '{{ route('tasks.notification.filter') }}',
                    type: 'POST',
                    data: {
                        date: date
                    },
                    success: function(response) {
                        var tasksTable = $('#tasks-table');
                        tasksTable.empty();
                        $.each(response.tasks, function(index, task) {
                            var row = '<tr>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.lead.lead_num + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + moment(task.date).format('YYYY-MM-DD') + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.lead.contact.name + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.lead.contact.phone + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.lead.contact.email + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.customer_description + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.user_description + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.status + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.mode + '</td>' +
                                '<td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">' + task.created_by.first_name + ' ' + task.created_by.last_name + '</td>' +
                                '</tr>';
                            tasksTable.append(row);
                        });
                    }
                });
            });
        });
    </script>
@endsection
{{-- @section('scripts')
<script>
  $(document).ready(function() {
    $('#date').change(function() {
      const date = $(this).val();

      fetch('{{ route('tasks.notification.filter') }}', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ date: date })
      })
        .then(response => response.json())
        .then(data => {
          const tasksTable = $('#tasks-table');
          tasksTable.empty();

          data.tasks.forEach(task => {
            const row = `<tr>
              <td>${task.lead.lead_num}</td>
              <td>${moment(task.created_at).format('YYYY-MM-DD')}</td>
              <td>${task.lead.contact.name}</td>
              <td>${task.lead.contact.phone}</td>
              <td>${task.lead.contact.email}</td>
              <td>${task.customer_description}</td>
              <td>${task.status}</td>
              <td>${task.mode}</td>
              <td>${task.created_by.first_name} ${task.created_by.last_name}</td>
            </tr>`;
            tasksTable.append(row);
          });
        })
        .catch(error => {
          console.error('Error fetching tasks:', error);
          // Handle errors gracefully (e.g., display an error message)
        });
    });
  });
</script>
@endsection --}}
