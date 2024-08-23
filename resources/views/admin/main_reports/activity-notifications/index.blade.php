@extends('layouts.admin-front')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Activity Notifications
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="date">Select Date:</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Lead No.</th>
                                        <th>Task Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Customer Email</th>
                                        <th>Task Description</th>
                                        <th>Task Status</th>
                                        <th>Task Mode</th>
                                        <th>Task Created By</th>
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#date').change(function() {
                var date = $('#date').val();
                $.ajax({
                    url: '{{ route('tasks.notification.filter') }}',
                    type: 'POST',
                    data: { date: date },
                    success: function(response) {
                        var tasksTable = $('#tasks-table');
                        tasksTable.empty();
                        $.each(response.tasks, function(index, task) {
                            var row = '<tr>' +
                                '<td>' + task.lead.lead_num + '</td>' +
                                '<td>' + moment(task.created_at).format('YYYY-MM-DD') + '</td>' +
                                '<td>' + task.lead.contact.name + '</td>' +
                                '<td>' + task.lead.contact.phone + '</td>' +
                                '<td>' + task.lead.contact.email + '</td>' +
                                '<td>' + task.customer_description + '</td>' +
                                '<td>' + task.status + '</td>' +
                                '<td>' + task.mode + '</td>' +
                                '<td>' + task.created_by.first_name +' '+ task.created_by.last_name +'</td>' +
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



