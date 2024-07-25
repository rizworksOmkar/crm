@extends('layouts.admin-front')

@section('content')
    <style>
        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e0e0e0;
        }

        .timeline-item {
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-icon {
            position: absolute;
            left: -30px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            color: white;
            font-size: 14px;
        }

        .timeline-content {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }

        .timeline-content h3 {
            margin: 0;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .timeline-content p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }

        .status {
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 12px;
            color: white;
        }

        .status-no_response {
            background-color: #f44336;
        }

        .status-contact_and_response {
            background-color: #2196f3;
        }

        .status-site_visit_done {
            background-color: #4caf50;
        }

        .status-site_visit_requested {
            background-color: #ff9800;
        }

        .status-visit_postponed {
            background-color: #ff5722;
        }

        .status-follow_up_needed {
            background-color: #9c27b0;
        }

        .status-follow_up_done {
            background-color: #00bcd4;
        }

        .status-not_interested {
            background-color: #795548;
        }

        .status-closed_successfully {
            background-color: #009688;
        }

        .status-closed_with_failure {
            background-color: #e91e63;
        }

        .status-invalid_contact_details {
            background-color: #607d8b;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employees Report</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h4>Employees</h4>
                </div>
                <div class="list-group" id="employee-list">
                    @foreach ($employees as $employee)
                        <a href="#" class="list-group-item list-group-item-action" data-id="{{ $employee->id }}">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card" id="leads-container" style="display:none;">
                <div class="card-header">
                    <h4>Lead Report</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="leads-table">
                            <thead>
                                <tr>
                                    <th>Lead Number</th>
                                    <th>Description</th>
                                    <th>Property Type</th>
                                    <th>Budget</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" id="lead-details-container" style="display:none;">
                <div class="card-header">
                    <h4>Lead Details</h4>
                </div>
                <div class="card-body">
                    <p><strong>Contact Name:</strong> <span id="contact-name"></span></p>
                    <p><strong>Contact Email:</strong> <span id="contact-email"></span></p>
                    <p><strong>Contact Phone:</strong> <span id="contact-phone"></span></p>
                    <hr>
                    <p><strong>Lead Description:</strong> <span id="lead-description"></span></p>
                    <p><strong>Property Type:</strong> <span id="property-type"></span></p>
                    <p><strong>Budget:</strong> <span id="budget"></span></p>
                    <p><strong>Location:</strong> <span id="location"></span></p>
                    <hr>
                    <button class="btn btn-info btn-sm" id="show-tasks-btn">Show Activity</button>
                    <div id="tasks-container" style="display:none;">
                        <div class="timeline" id="tasks-timeline">

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
            $('#employee-list .list-group-item').on('click', function() {
                var employeeId = $(this).data('id');
                $('#employee-list .list-group-item').removeClass('active');
                $(this).addClass('active');
                $('#lead-details-container').hide();
                $('#tasks-container').hide();
                fetchLeads(employeeId);
            });

            function fetchLeads(employeeId) {
                $.ajax({
                    url: '/employees/' + employeeId + '/leads',
                    method: 'GET',
                    success: function(data) {
                        populateLeadsTable(data);
                    }
                });
            }

            function populateLeadsTable(leads) {
                $('#leads-container').show();
                var tbody = $('#leads-table tbody');
                tbody.empty();

                leads.forEach(function(lead) {
                    var row = '<tr>' +
                        '<td>' + lead.lead_num + '</td>' +
                        '<td>' + lead.description + '</td>' +
                        '<td>' + lead.property_type + '</td>' +
                        '<td>' + lead.max_budget + '</td>' +
                        '<td><button class="btn btn-info btn-sm view-lead-details" data-id="' + lead.id +
                        '">View Details</button></td>' +
                        '</tr>';
                    tbody.append(row);
                });

                $('.view-lead-details').on('click', function() {
                    var leadId = $(this).data('id');
                    $('#tasks-container').hide();
                    fetchLeadDetails(leadId);
                });
            }

            function fetchLeadDetails(leadId) {
                $.ajax({
                    url: '/leads/' + leadId + '/details',
                    method: 'GET',
                    success: function(data) {
                        populateLeadDetails(data);
                    }
                });
            }

            function populateLeadDetails(lead) {
                $('#lead-details-container').show();
                $('#contact-name').text(lead.contact.name);
                $('#contact-email').text(lead.contact.email);
                $('#contact-phone').text(lead.contact.phone);
                $('#lead-description').text(lead.description);
                $('#property-type').text(lead.property_type);
                $('#budget').text(lead.max_budget);
                $('#location').text(lead.specific_location);

                $('#show-tasks-btn').off('click').on('click', function() {
                    populateTasksTable(lead.tasks);
                    $('#tasks-container').toggle();
                });
            }

            function populateTasksTable(tasks) {
                var tasksTimeline = $('#tasks-timeline');
                tasksTimeline.empty();

                tasks.forEach(function(task) {
                    var statusClass = 'status-' + task.status.toLowerCase().replace(/ /g, '_');
                    var modeIcon = getModeIcon(task.mode);

                    var taskItem = `
            <div class="timeline-item">
                <div class="timeline-icon" style="background-color: ${getStatusColor(task.status)};">
                    ${modeIcon}
                </div>
                <div class="timeline-content">
                    <h3>
                        ${task.description}
                        <span class="status ${statusClass}">${task.status}</span>
                    </h3>
                    <p>${task.date}</p>
                    <p>Mode: ${task.mode}</p>
                </div>
            </div>
        `;
                    tasksTimeline.append(taskItem);
                });
            }

            function getModeIcon(mode) {
                switch (mode) {
                    case 'Site Visit':
                        return '<i class="fas fa-home"></i>';
                    case 'Phone Call':
                        return '<i class="fas fa-phone"></i>';
                    case 'Discussion':
                        return '<i class="fas fa-comments"></i>';
                    default:
                        return '<i class="fas fa-tasks"></i>';
                }
            }

            function getStatusColor(status) {
                switch (status) {
                    case 'no_response':
                        return '#f44336';
                    case 'contact_and_response':
                        return '#2196f3';
                    case 'site_visit_done':
                        return '#4caf50';
                    case 'site_visit_requested':
                        return '#ff9800';
                    case 'visit_postponed':
                        return '#ff5722';
                    case 'follow_up_needed':
                        return '#9c27b0';
                    case 'follow_up_done':
                        return '#00bcd4';
                    case 'not_interested':
                        return '#795548';
                    case 'closed_successfully':
                        return '#009688';
                    case 'closed_with_failure':
                        return '#e91e63';
                    case 'invalid_contact_details':
                        return '#607d8b';
                    default:
                        return '#6c757d';
                }
            }

        });
    </script>
@endsection
{{-- function populateTasksTable(tasks) {
    var tasksTbody = $('#tasks-table tbody');
    tasksTbody.empty();

    tasks.forEach(function(task) {
        var taskRow = '<tr>' +
            '<td>' + task.description + '</td>' +
            '<td>' + task.date + '</td>' +
            '<td>' + task.status + '</td>' +
            '<td>' + task.mode + '</td>' +
            '</tr>';
        tasksTbody.append(taskRow);
    });
} --}}
