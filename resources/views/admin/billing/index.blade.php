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
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-1">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Billing Management</h6>
                        <div>
                            <ul id="myTab" role="tablist"
                                class="flex flex-wrap w-full text-sm font-medium text-center 
                                border-b border-slate-200 dark:border-zink-500 nav-tabs">
                                <li class="group active">
                                    <a href="#unbilled" id="unbilled-tab" data-tab-toggle data-target="unbilled"
                                        class="active inline-block px-4 py-2 text-base transition-all
                                 duration-300 ease-linear rounded-t-md text-slate-500 
                                 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500
                                  group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 
                                  group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 
                                  hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 
                                  dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Unbilled
                                        Leads</a>
                                </li>
                                <li class="group">
                                    <a href="#billed" id="billed-tab" data-tab-toggle data-target="billed"
                                        class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear 
                                        rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent 
                                        group-[.active]:text-custom-500 group-[.active]:border-slate-200 
                                        dark:group-[.active]:border-zink-500 group-[.active]:border-b-white 
                                        dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 
                                        dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white
                                         -mb-[1px]">Billed
                                        Leads</a>
                                </li>

                            </ul>

                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="unbilled" role="tabpanel">
                                    @include('admin.billing.unbilled_table', ['leads' => $leadsWithoutBills,
                                    ])
                                </div>
                                <div class="tab-pane fade" id="billed" role="tabpanel">
                                    @include('admin.billing.billed_table', ['leads' => $leadsWithBills])
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end card-->

            </div>
        </div>
    </div>

    <!-- Raise Bill Modal -->
    <div class="modal fade" id="raiseBillModal" tabindex="-1" role="dialog" aria-labelledby="raiseBillModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="raiseBillModalLabel">Raise Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="raiseBillForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="leadId" name="lead_id">
                        <div class="form-group">
                            <label for="leadNumber">Lead Number</label>
                            <input type="text" class="form-control" id="leadNumber" >
                        </div>
                        <div class="form-group">
                            <label for="expectedAmount">Expected Amount</label>
                            <input type="number" class="form-control" id="expectedAmount" name="expected_amount" required>
                        </div>
                        <div class="form-group">
                            <label for="toPay">To Pay</label>
                            <input type="number" class="form-control" id="toPay" name="to_pay" required>
                        </div>
                        <div class="form-group">
                            <label for="billDate">Date</label>
                            <input type="date" class="form-control" id="billDate" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="agent_id">Agent</label>
                            <input type="text" name="agent_name" id="agent_name" class="form-control" >
                            <input type="hidden" name="agent_id" id="agent_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Raise Bill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Make Payment Modal -->
    <div id="makePaymentModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 
                      ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Make Payment</h5>
                <button data-modal-close="defaultModal"
                    class="transition-all duration-200 ease-linear
                             text-slate-500 hover:text-red-500 dark:text-zink-200 
                             dark:hover:text-red-500">
                    <i data-lucide="x" class="size-5"></i>
                </button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form id="makePaymentForm" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-2">
                        <input type="hidden" id="billId" name="bill_id">
                        <div class="form-group">
                            <label class="inline-block mb-2 text-base font-medium" for="billNumber">Bill Number</label>
                            <input type="text"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="billNumber" >
                        </div>
                        <div class="form-group">
                            <label class="inline-block mb-2 text-base font-medium" for="amountDue">Amount Due</label>
                            <input type="number"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="amountDue" >
                        </div>
                        <div class="form-group">
                            <label class="inline-block mb-2 text-base font-medium" for="paymentAmount">Payment
                                Amount</label>
                            <input type="number"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="paymentAmount" name="payment_amount" required>
                        </div>
                        <div class="form-group">
                            <label class="inline-block mb-2 text-base font-medium" for="paymentMode">Payment Mode</label>
                            <select
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="paymentMode" name="payment_mode" required>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600
                                                             active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn"
                            data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                         active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Process
                            Payment</button>
                    </div>
                </form>
            </div>
            {{-- <div class="flex items-center justify-between p-4 mt-auto border-t border-slate-200 dark:border-zink-500">
                <button data-modal-close="defaultModal"
                    class="transition-all duration-200 ease-linear
                             text-slate-500 hover:text-red-500 dark:text-zink-200 
                             dark:hover:text-red-500">
                    <i data-lucide="x" class="size-5"></i>
                </button>
            </div> --}}
        </div>
    </div>

    <!-- View Receipt Modal -->
    <div id="viewReceiptModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 
               ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16">Payment Transaction Details</h5>
                <button data-modal-close="viewReceiptModal"
                    class="transition-all duration-200 ease-linear
           text-slate-500 hover:text-red-500 dark:text-zink-200 
           dark:hover:text-red-500">
                    <i data-lucide="x" class="size-5"></i>
                </button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#billed').hide();

            $('#billed-tab').click(function() {

                $('#billed').show();
                $('#unbilled').hide();

            });

            $('#unbilled-tab').click(function() {

                $('#billed').hide();
                $('#unbilled').show();

            });
            $('#raiseBillModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var leadId = button.data('lead-id');
                var leadNum = button.data('lead-num');
                var maxBudget = button.data('max-budget');
                var agentName = button.data('agent-name');
                var agentId = button.data('agent-id');
                var modal = $(this);
                modal.find('.modal-title').text('Raise Bill for Lead #' + leadNum);
                modal.find('#leadId').val(leadId);
                modal.find('#leadNumber').val(leadNum);
                modal.find('#expectedAmount').val(maxBudget);
                modal.find('#toPay').val(maxBudget);
                modal.find('#billDate').val(new Date().toISOString().substr(0, 10));
                modal.find('#agent_name').val(agentName);
                modal.find('#agent_id').val(agentId);

                $('#raiseBillForm').attr('action', '/billing/' + leadId);
            });

            $('#raiseBillForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#raiseBillModal').modal('hide');
                        $.get(window.location.href, function(data) {
                            $('#unbilled').html($(data).find('#unbilled').html());
                            $('#billed').html($(data).find('#billed').html());
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#makePaymentModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var billId = button.data('bill-id');
                var leadNum = button.data('lead-num');
                var billNum = button.data('bill-num');
                var amountDue = button.data('amount-due');
                var modal = $(this);
                modal.find('.modal-title').text('Make Payment for Bill #' + billNum);
                modal.find('#billId').val(billId);
                modal.find('#billNumber').val(billNum);
                modal.find('#amountDue').val(amountDue);
                modal.find('#paymentAmount').attr('max', amountDue);

                $('#makePaymentForm').attr('action', '/billing/payment/' + billId);
            });

            $('#makePaymentForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#makePaymentModal').modal('hide');
                        $.get(window.location.href, function(data) {
                            $('#billed').html($(data).find('#billed').html());
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
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
