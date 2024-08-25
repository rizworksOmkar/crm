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
            <div class="grid grid-cols-1 gap-x-5 " id="billingGrid">
                <div class="card col-span-3">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Billing Management</h6>
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
                                                <th class="ltr:!text-left rtl:!text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leadsWithoutBills as $lead)
                                                <tr>
                                                    <td>{{ $lead->lead_num }}</td>
                                                    <td>{{ $lead->contact->name }}</td>
                                                    <td>{{ $lead->contact->phone }}</td>
                                                    <td>{{ $lead->contact->whatsapp_ph }}</td>
                                                    <td>{{ $lead->property_type }}</td>
                                                    <td>{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}
                                                    </td>


                                                    <td>

                                                        <button type="button"
                                                            class="btn btn-success text-white btn bg-custom-500
                                                         border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600
                                                          focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring
                                                          focus:ring-custom-100 active:text-white active:bg-custom-600
                                                        active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"
                                                            id="unbilledRaiseBill" data-lead-id="{{ $lead->id }}"
                                                            data-lead-num="{{ $lead->lead_num }}"
                                                            data-max-budget="{{ $lead->max_budget }}"
                                                            data-cust-name="{{ $lead->contact->name }}"
                                                            data-lead-date="{{ $lead->created_at }}"
                                                            data-property-type="{{ $lead->property_type }}"
                                                            data-cust-address="{{ $lead->contact->address }}"
                                                            data-cust-phone="{{ $lead->contact->phone }}"
                                                            data-cust-whatsapp="{{ $lead->contact->whatsapp_ph }}"
                                                            data-agent-name="{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}"
                                                            data-agent-id="{{ $lead->assignedTo->id }}"
                                                            data-finalized-property="{{ $lead->finalized_property }}"
                                                            data-rent="{{ $lead->rent }}"
                                                            data-advance="{{ $lead->advance }}"
                                                            data-payment-terms="{{ $lead->payment_terms }}">
                                                            Raise Bill
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--end card-->

                {{-- raise Bill box --}}
                <div class="card hidden" id="raiseBillPart">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
                            <div class="xl:col-span-3">
                                <h6 class="mb-4 text-15">Raise Bill</h6>
                            </div>
                            <div class="xl:col-span-5 xl:col-start-12">
                                <button type="button" id="close" class="text-red-500 btn bg-white border-red-500">
                                    Close
                                </button>
                            </div>
                        </div>
                        <form id="raiseBillForm" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                                <input type="hidden" id="leadId" name="leadId">
                                <input type="hidden" id="agent_id" name="agent_id">
                                <div class="mb-4">
                                    <label for="custName" class="inline-block mb-2 text-base font-medium">
                                        Customer Name
                                    </label>
                                    <input type="text" id="custName" name="custName" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="custAddress" class="inline-block mb-2 text-base font-medium">
                                        Address
                                    </label>
                                    <input type="text" id="custAddress" name="custAddress" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="custPhone" class="inline-block mb-2 text-base font-medium">
                                        Phone
                                    </label>
                                    <input type="text" id="custPhone" name="custPhone" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="custWhatsApp" class="inline-block mb-2 text-base font-medium">
                                        WhatsApp
                                    </label>
                                    <input type="text" id="custWhatsApp" name="custWhatsApp" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="leadNumber" class="inline-block mb-2 text-base font-medium">
                                        Lead Number
                                    </label>
                                    <input type="text" id="leadNumber" name="leadNumber" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="leadDate" class="inline-block mb-2 text-base font-medium">
                                        Lead Date
                                    </label>
                                    <input type="text" id="leadDate" name="leadDate" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="propertyType" class="inline-block mb-2 text-base font-medium">
                                        Property Type
                                    </label>
                                    <input type="text" id="propertyType" name="propertyType" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="finalizedProperty" class="inline-block mb-2 text-base font-medium">
                                        Finalized Property
                                    </label>
                                    <input type="text" id="finalizedProperty" name="finalizedProperty"
                                        class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="billDate" class="inline-block mb-2 text-base font-medium">
                                        Bill Date
                                    </label>
                                    <input type="date" id="billDate" name="billDate" class="form-input" required>
                                </div>
                                <div class="mb-4">
                                    <label for="billAmount" class="inline-block mb-2 text-base font-medium">
                                        Bill Amount
                                    </label>
                                    <input type="text" id="billAmount" name="billAmount" class="form-input">
                                </div>
                                <div class="mb-4">
                                    <label for="narration" class="inline-block mb-2 text-base font-medium">
                                        Narration
                                    </label>
                                    <input type="text" id="narration" name="narration" class="form-input">
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="submit" class="btn bg-custom-800 text-white" id ="raiseBillForm">
                                    Raise Bill
                                </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            document.querySelectorAll('[id="unbilledRaiseBill"]').forEach(button => {
                button.addEventListener('click', function() {
                    const grid = document.getElementById('billingGrid');
                    const raiseBillPart = document.getElementById('raiseBillPart');

                    grid.classList.remove('grid-cols-1');
                    grid.classList.add('grid-cols-2');
                    raiseBillPart.classList.remove('hidden');



                    document.getElementById('leadId').value = this.getAttribute('data-lead-id');
                    document.getElementById('agent_id').value = this.getAttribute('data-agent-id');
                    document.getElementById('custName').value = this.getAttribute('data-cust-name');
                    document.getElementById('custAddress').value = this.getAttribute(
                        'data-cust-address');
                    document.getElementById('custPhone').value = this.getAttribute(
                        'data-cust-phone');
                    document.getElementById('custWhatsApp').value = this.getAttribute(
                        'data-cust-whatsapp');
                    document.getElementById('leadNumber').value = this.getAttribute(
                        'data-lead-num');
                    document.getElementById('leadDate').value = this.getAttribute('data-lead-date');
                    document.getElementById('propertyType').value = this.getAttribute(
                        'data-property-type');
                    document.getElementById('finalizedProperty').value = this.getAttribute(
                        'data-finalized-property');
                    document.getElementById('billAmount').value = this.getAttribute('data-rent');
                    document.getElementById('narration').value = this.getAttribute(
                        'data-payment-terms');

                });
            });

            // Event listener for closing the raise bill form
            document.getElementById('close').addEventListener('click', function() {
                const grid = document.getElementById('billingGrid');
                const raiseBillPart = document.getElementById('raiseBillPart');

                // Hide the raise bill part and reset the grid layout
                grid.classList.remove('grid-cols-2');
                grid.classList.add('grid-cols-1');
                raiseBillPart.classList.add('hidden');
            });


            // document.getElementById('unbilledRaiseBill').addEventListener('click', function() {
            //     const parentDiv = document.getElementById('billingManagementBox')
            //     const formDiv = document.getElementById('raiseBillModal')
            //     const formDiv1 = document.getElementById('viewReceiptModal')
            //     const formDiv2 = document.getElementById('unbilledRaiseBill')

            // Change the parent div's grid to col-span-2
            // parentDiv.classList.remove('xl:grid-cols-1')
            // parentDiv.classList.add('xl:grid-cols-2')

            // // Display the hidden form div
            // formDiv.classList.remove('hidden')
            // formDiv.classList1.remove('hidden')
            // formDiv.classList2.remove('hidden')
            // });

            // document.getElementById('billedReceiptBill').addEventListener('click', function() {
            //     const parentDiv = document.getElementById('billingManagementBox')
            //     const formDiv = document.getElementById('raiseBillModal')
            //     const formDiv1 = document.getElementById('viewReceiptModal')
            //     const formDiv2 = document.getElementById('unbilledRaiseBill')

            //     // Change the parent div's grid to col-span-2
            //     parentDiv.classList.remove('xl:grid-cols-1')
            //     parentDiv.classList.add('xl:grid-cols-2')

            //     // Display the hidden form div
            //     formDiv.classList.remove('hidden')
            //     formDiv.classList1.remove('hidden')
            //     formDiv.classList2.remove('hidden')
            // });


            // $('#raiseBillModal').hide();
            // $('#unbilledRaiseBill').click(function() {
            //     $('#raiseBillModal').show();
            //     $('#viewReceiptModal').hide();
            //     $('#makePaymentModal').hide();
            // });

            // $('#viewReceiptModal').hide();
            // $('#billedReceiptBill').click(function() {
            //     $('#viewReceiptModal').show();
            //     $('#raiseBillModal').hide();
            //     $('#makePaymentModal').hide();
            // });

            // $('#makePaymentModal').hide();
            // $('#makePaymentForm').click(function() {
            //     $('#makePaymentModal').show();
            //     $('#raiseBillModal').hide();
            //     $('#viewReceiptModal').hide();
            // });

            // $('#billed').hide();

            // $('#billed-tab').click(function() {

            //     $('#billed').show();
            //     $('#unbilled').hide();
            //     $('#raiseBillModal').hide();

            // });

            // $('#unbilled-tab').click(function() {

            //     $('#billed').hide();
            //     $('#unbilled').show();
            //     $('#viewReceiptModal').hide();

            // });


            // $('#raiseBillModal').on('show.bs.modal', function(event) {
            //     var button = $(event.relatedTarget);
            //     var leadId = button.data('lead-id');
            //     var leadNum = button.data('lead-num');
            //     var maxBudget = button.data('max-budget');
            //     var agentName = button.data('agent-name');
            //     var agentId = button.data('agent-id');
            //     var modal = $(this);
            //     modal.find('.modal-title').text('Raise Bill for Lead #' + leadNum);
            //     modal.find('#leadId').val(leadId);
            //     modal.find('#leadNumber').val(leadNum);
            //     modal.find('#expectedAmount').val(maxBudget);
            //     modal.find('#toPay').val(maxBudget);
            //     modal.find('#billDate').val(new Date().toISOString().substr(0, 10));
            //     modal.find('#agent_name').val(agentName);
            //     modal.find('#agent_id').val(agentId);

            //     $('#raiseBillForm').attr('action', '/billing/' + leadId);
            // });

            $('#raiseBillForm').on('submit', function(e) {
                e.preventDefault();

                var leadId = $('#leadId').val();

                var url = '/billing/' + leadId;
                alert(url);

                var form = $(this);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        console.log('Bill raised successfully:', response);
                        Swal.fire({
                            title: 'Success!',
                            text: 'Bill raised successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });


            // $('#makePaymentModal').on('show.bs.modal', function(event) {
            //     var button = $(event.relatedTarget);
            //     var billId = button.data('bill-id');
            //     var leadNum = button.data('lead-num');
            //     var billNum = button.data('bill-num');
            //     var amountDue = button.data('amount-due');
            //     var modal = $(this);
            //     modal.find('.modal-title').text('Make Payment for Bill #' + billNum);
            //     modal.find('#billId').val(billId);
            //     modal.find('#billNumber').val(billNum);
            //     modal.find('#amountDue').val(amountDue);
            //     modal.find('#paymentAmount').attr('max', amountDue);

            //     $('#makePaymentForm').attr('action', '/billing/payment/' + billId);
            // });

            // $('#makePaymentForm').on('submit', function(e) {
            //     e.preventDefault();
            //     var form = $(this);
            //     $.ajax({
            //         url: form.attr('action'),
            //         method: 'POST',
            //         data: form.serialize(),
            //         success: function(response) {
            //             $('#makePaymentModal').modal('hide');
            //             $.get(window.location.href, function(data) {
            //                 $('#billed').html($(data).find('#billed').html());
            //             });
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.responseText);
            //         }
            //     });
            // });

            // $('#viewReceiptModal').on('show.bs.modal', function(event) {
            //     var button = $(event.relatedTarget);
            //     var billId = button.data('bill-id');
            //     var leadNum = button.data('lead-num');
            //     var modal = $(this);
            //     modal.find('.modal-title').text('Payment Transaction Details for Lead #' + leadNum);

            //     $.ajax({
            //         url: '/billing/' + billId + '/transactions',
            //         method: 'GET',
            //         success: function(response) {
            //             var timeline = $('#receiptTimeline');
            //             timeline.empty();

            //             response.transactions.forEach(function(transaction) {
            //                 var timelineItem = `
        //             <div class="timeline-item">
        //                 <div class="timeline-content">
        //                     <h6>Transaction #${transaction.transaction_num}</h6>
        //                     <p>Receipt Number: ${transaction.receipt_num}</p>
        //                     <p>Amount Paid: ${transaction.payment_amount}</p>
        //                     <p>Payment Mode: ${transaction.mode}</p>
        //                     <p>Status: ${transaction.status}</p>
        //                 </div>
        //             </div>
        //         `;
            //                 timeline.append(timelineItem);
            //             });
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.responseText);
            //         }
            //     });
            // });
        });
    </script>
@endsection
