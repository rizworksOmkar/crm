<table>
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
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->lead->lead_num }}</td>
            <td>{{ $task->created_at->format('Y-m-d') }}</td>
            <td>{{ $task->lead->contact->name }}</td>
            <td>{{ $task->lead->contact->phone }}</td>
            <td>{{ $task->lead->contact->email }}</td>
            <td>{{ $task->customer_description }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->mode }}</td>
            <td>{{ $task->createdBy->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
