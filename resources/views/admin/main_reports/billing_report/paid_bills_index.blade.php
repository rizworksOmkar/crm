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
    </style>
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Paid Billed Lead Report</h6>
                    <table id="basic_tables" class="display stripe group" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="ltr:!text-left rtl:!text-right">
                                    Lead Number</th>
                                <th>Customer</th>
                                <th>Bill Number</th>
                                <th>Total Amount</th>
                                <th>Amount Due</th>
                                <th>Status</th>
                                <th>Reciepts</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($leadsWithBills as $lead)
                                <tr>
                                    <td>{{ $lead->lead_num }}</td>
                                    <td>{{ $lead->contact->name }}</td>
                                    <td>{{ $lead->billing->bill_num }}</td>
                                    <td>{{ number_format($lead->billing->customerWillPay, 2) }}</td>
                                    <td>{{ number_format($lead->billing->to_pay, 2) }}</td>

                                    <td>{{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}</td>
                                    <td>

                                        <button type="button" data-modal-target="viewReceiptModal"
                                            class="text-white btn bg-custom-500 border-custom-500
                                                         hover:text-white hover:bg-custom-600 hover:border-custom-600
                                                          focus:text-white focus:bg-custom-600 focus:border-custom-600
                                                           focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 
                                                           active:border-custom-600 active:ring active:ring-custom-100 
                                                           dark:ring-custom-400/20"
                                            data-bill-id="{{ $lead->billing->id }}" data-lead-num="{{ $lead->lead_num }}">
                                            View Receipt
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!--end card-->
        </div>
    </div>

    {{-- <div class="flex flex-wrap gap-2"> --}}
    {{-- modal start  --}}
    <div id="viewReceiptModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300
         ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4
          show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="modal-title text-16"> Payment Transaction Details</h5>
                <button data-modal-close="viewReceiptModal"
                    class="transition-all duration-200 ease-linear
                     text-slate-500 hover:text-red-500 dark:text-zink-200 
                     dark:hover:text-red-500">
                    <i data-lucide="x" class="size-5"></i>
                </button>
            </div>
            <div
                class="max-h-[calc(theme('height.screen')_-_180px)]
                            p-4 overflow-y-auto modal-body">
                <div class="timeline" id="receiptTimeline">
                    <!-- Timeline content will be dynamically inserted here -->
                </div>
            </div>
            <div class="flex items-center justify-between p-4 mt-auto border-t border-slate-200 dark:border-zink-500">
                <button data-modal-close="viewReceiptModal"
                    class="transition-all duration-200 ease-linear 
                       text-slate-500 hover:text-red-500 dark:text-zink-200 
                       dark:hover:text-red-500">
                    Close
                </button>
            </div>
        </div>
    </div>
    {{-- modal end  --}}
    {{-- </div> --}}

    <div class="modal fade d-none" id="viewReceiptModal" tabindex="-1" role="dialog"
        aria-labelledby="viewReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewReceiptModalLabel">Payment Transaction Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="timeline" id="receiptTimeline">
                        <!-- Timeline content will be dynamically inserted here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


            $('#viewReceiptModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var billId = button.data('bill-id');
                var leadNum = button.data('lead-num');
                var modal = $(this);
                modal.find('.modal-title').text('Payment Transaction Details for Lead #' + leadNum);

                $.ajax({
                    url: '/billing/' + billId + '/transactions',
                    method: 'GET',
                    success: function(response) {
                        var timeline = $('#receiptTimeline');
                        timeline.empty();

                        response.transactions.forEach(function(transaction) {
                            var timelineItem = `
                        <div class="timeline-item">
                            <div class="timeline-content">
                                <h6>Transaction #${transaction.transaction_num}</h6>
                                <p>Receipt Number: ${transaction.receipt_num}</p>
                                <p>Amount Paid: ${transaction.payment_amount}</p>
                                <p>Payment Mode: ${transaction.mode}</p>
                                <p>Status: ${transaction.status}</p>
                            </div>
                        </div>
                    `;
                            timeline.append(timelineItem);
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
