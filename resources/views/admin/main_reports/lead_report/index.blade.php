@extends('layouts.admin-front')
@section('content')
    
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Leads</h6>
                    <table id="basic_tables" class="display stripe group" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="ltr:!text-left rtl:!text-right">
                                    Select</th>
                                <th>Sl no</th>
                                <th>Customer Name</th>
                                <th>Lead Number</th>
                                <th>Lead Date</th>
                                <th>Assigned To</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($leads as $lead)
                                @php $i++; @endphp
                                <tr>
                                    <td><input type="checkbox" class="lead-checkbox" data-lead-id="{{ $lead->id }}">
                                    </td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $lead->contact->name }}</td>
                                    <td>{{ $lead->lead_num }}</td>
                                    <td>{{ $lead->created_at }}</td>
                                    <td>
                                        @if ($lead->assignedTo == null)
                                            Not Assigned
                                        @else
                                            {{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end card-->

            <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
                <div class="col-span-12 card 2xl:col-span-12">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 
                    mb-5 2xl:grid-cols-1">
                            <h4 class="mb-4 text-18">Selected Lead Timeline</h4>
                        </div>

                        <!--end grid-->
                        <div class="overflow-x-auto">
                            <div class="timeline" id="lead-timeline">
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


            $('.lead-checkbox').on('change', function() {
                $('.lead-checkbox').not(this).prop('checked', false);

                if ($(this).is(':checked')) {
                    var leadId = $(this).data('lead-id');
                    var row = $(this).closest('tr');
                    var customerName = row.find('td:eq(2)').text();
                    var leadNumber = row.find('td:eq(3)').text();

                    $('#lead-details').show();
                    $('#customer-name').val(customerName);
                    $('.lead-form').data('lead-id', leadId);

                    $.ajax({
                        url: '/leads/' + leadId + '/detail',
                        method: 'GET',
                        success: function(response) {
                            $('#customer-phone').val(response.phone);
                            $('#customer-whatsapp').val(response.whatsapp);
                        },
                        error: function(error) {
                            console.error('Error loading lead details:', error);
                        }
                    });

                    loadLeadTimeline(leadId);
                } else {
                    $('#lead-details').hide();
                    $('#lead-timeline').empty();
                }
            });

            $('.lead-form').on('submit', function(e) {
                e.preventDefault();
                var leadId = $(this).data('lead-id');
                var formData = $(this).serialize();

                $.ajax({
                    url: '/tasks',
                    method: 'POST',
                    data: formData + '&lead_id=' + leadId,
                    success: function(response) {
                        // $('#lead-form')[0].reset();
                        alert('Task added successfully');
                        loadLeadTimeline(leadId);
                    },
                    error: function(error) {
                        console.error('Error adding task:', error);
                        alert('Error: Unable to add task.');
                    }
                });
            });

            function loadLeadTimeline(leadId) {
                $.ajax({
                    url: '/leads/' + leadId + '/timelines',
                    method: 'GET',
                    success: function(response) {
                        var timeline = $('#lead-timeline');
                        timeline.empty();

                        response.tasks.forEach(function(task, index) {
                            var statusInfo = getStatusInfo(task.status);

                            var item = $('<div>').addClass('timeline-item');
                            var icon = $('<div>').addClass('timeline-icon').css(
                                'background-color', statusInfo.color);
                            icon.append($('<i>').addClass(statusInfo.icon));
                            var content = $('<div>').addClass('timeline-content');

                            var header = $('<h3>').text(task.date);
                            header.append($('<span>').addClass('status ' + statusInfo.class)
                                .text(task.status));

                            content.append(header);
                            content.append($('<p>').text('Customer Update: ' + task
                                .customer_description));
                            content.append($('<p>').text('Employee Update: ' + task
                                .user_description));
                            content.append($('<p>').text('Mode: ' + task.mode));

                            item.append(icon);
                            item.append(content);
                            timeline.append(item);
                        });
                    },
                    error: function(error) {
                        console.error('Error loading timeline:', error);
                    }
                });
            }

            function getStatusInfo(status) {
                switch (status.toLowerCase()) {
                    case 'no response':
                        return {
                            icon: 'fas fa-comment-slash', color: '#9e9e9e', class: 'status-no-response'
                        };
                    case 'contact & response':
                        return {
                            icon: 'fas fa-comments', color: '#2196f3', class: 'status-contact-response'
                        };
                    case 'site visit done':
                        return {
                            icon: 'fas fa-map-marker-alt', color: '#4caf50', class: 'status-site-visit-done'
                        };
                    case 'site visit requested':
                        return {
                            icon: 'fas fa-calendar-alt', color: '#ff9800', class: 'status-site-visit-requested'
                        };
                    case 'visit postponed':
                        return {
                            icon: 'fas fa-calendar-times', color: '#ff5722', class: 'status-visit-postponed'
                        };
                    case 'follow up needed':
                        return {
                            icon: 'fas fa-bell', color: '#e91e63', class: 'status-follow-up-needed'
                        };
                    case 'follow up done':
                        return {
                            icon: 'fas fa-check-circle', color: '#8bc34a', class: 'status-follow-up-done'
                        };
                    case 'not interested':
                        return {
                            icon: 'fas fa-thumbs-down', color: '#795548', class: 'status-not-interested'
                        };
                    case 'closed successfully':
                        return {
                            icon: 'fas fa-check', color: '#00c853', class: 'status-closed-successfully'
                        };
                    case 'closed with failure':
                        return {
                            icon: 'fas fa-times', color: '#f44336', class: 'status-closed-with-failure'
                        };
                    case 'invalid contact details':
                        return {
                            icon: 'fas fa-exclamation-triangle', color: '#ffeb3b', class:
                                'status-invalid-contact-details'
                        };
                    default:
                        return {
                            icon: 'fas fa-question', color: '#607d8b', class: 'status-unknown'
                        };
                }
            }
        });
    </script>
@endsection
