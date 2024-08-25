@extends('layouts.admin-front')

@section('content')
    <style>
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline:before {
            content: '';
            position: absolute;
            top: 0;
            left: 50px;
            height: 100%;
            width: 2px;
            background: #e5e5e5;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 40px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #4e73df;
        }

        .timeline-content {
            margin-left: 80px;
            background: #f8f9fc;
            padding: 15px;
            border-radius: 5px;
        }

        table tr th,
        table tr td {
            white-space: nowrap;
            padding: 5px 10px;
        }
    </style>

    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="grid grid-cols-1 gap-x-5" id="billingGrid">
                <div class="card col-span-3">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 xl:grid-cols-13">
                            <div class="flex justify-between items-center mb-5">
                                <div class="xl:col-span-3">
                                    <h6 class="mb-4 text-15">Billed Leads</h6>
                                </div>
                                <a href="{{ route('raise.bill') }}"
                                   class="px-6 py-2 text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 transition-all duration-75 ease-linear">
                                   Raise Bill
                                </a>
                            </div>


                        </div>
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <table id="" class="table stripe group" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="ltr:!text-left rtl:!text-right">Lead Number</th>
                                                <th class="ltr:!text-left rtl:!text-right">Customer</th>
                                                <th class="ltr:!text-left rtl:!text-right">Phone</th>
                                                <th class="ltr:!text-left rtl:!text-right">WhatsApp</th>
                                                <th class="ltr:!text-left rtl:!text-right">Property</th>
                                                <th class="ltr:!text-left rtl:!text-right">Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leadsWithBills as $lead)
                                                <tr>
                                                    <td>{{ $lead->lead_num }}</td>
                                                    <td>{{ $lead->contact->name }}</td>
                                                    <td>{{ $lead->contact->phone }}</td>
                                                    <td>{{ $lead->contact->whatsapp_ph }}</td>
                                                    <td>{{ $lead->property_type }}</td>
                                                    <td>{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}
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
            </div>
        </div>
    </div>
@endsection
