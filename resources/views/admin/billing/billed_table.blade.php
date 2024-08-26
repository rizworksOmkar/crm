{{-- <div class="card">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
            <div class="xl:col-span-3">
            </div>
            <div class="xl:col-span-5 xl:col-start-12">
                <button type="button"
                    class="text-red-500 bg-white border-red-500 btn hover:text-red-500 hover:bg-red-100
                           focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700
                           dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                    <span class="align-middle">Close
                    </span>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table id="" class="table stripe group" style="width: 100%">
                <thead>
                    <tr>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Lead Number</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Customer</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Bill Number</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Total Amount</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Amount Due</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Last Receipt</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Status</th>
                        <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Actions</th>
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
                            <td>
                                @if ($lead->billing->receipts->isNotEmpty())
                                    {{ $lead->billing->receipts->last()->payment_receipt_num }}
                                    <br>
                                    {{ number_format($lead->billing->receipts->last()->amount_paid, 2) }}
                                    ({{ $lead->billing->receipts->last()->date }})
                                @else
                                    No receipts
                                @endif
                            </td>
                            <td>
                                <span class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600
                                active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">
                                {{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}
                            </span>
                            </td>
                            <td>

                                @if ($lead->billing->to_pay > 0)
                                    <button type="button"
                                        class="btn btn-success text-white btn bg-custom-500 border-custom-500
                                    hover:text-white hover:bg-custom-600 hover:border-custom-600
                                    focus:text-white focus:bg-custom-600 focus:border-custom-600
                                    focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                    active:border-custom-600 active:ring active:ring-custom-100
                                     dark:ring-custom-400/20"
                                        id="makePaymentForm" data-bill-id="{{ $lead->billing->id }}"
                                        data-lead-num="{{ $lead->lead_num }}"
                                        data-bill-num="{{ $lead->billing->bill_num }}"
                                        data-amount-due="{{ $lead->billing->to_pay }}">
                                        Make Payment
                                    </button>
                                @endif

                                <button type="button"
                                    class="btn btn-secondary text-white btn bg-custom-500 border-custom-500
                                 hover:text-white hover:bg-custom-600 hover:border-custom-600
                                 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring
                                 focus:ring-custom-100 active:text-white active:bg-custom-600
                                 active:border-custom-600 active:ring active:ring-custom-100
                                 dark:ring-custom-400/20"
                                    id="billedReceiptBill" data-bill-id="{{ $lead->billing->id }}"
                                    data-lead-num="{{ $lead->lead_num }}">
                                    View Receipt
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
{{-- view Receiptbox --}}
{{-- <div class="card" id="viewReceiptModal">
    <div class="card-body">
        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <div class="timeline" id="receiptTimeline">
                <!-- Timeline content will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div> --}}
{{-- make Payment box --}}
{{-- <div class="card" id="makePaymentModal">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
            <div class="xl:col-span-3">
                <h6 class="mb-4 text-15">Make Payment</h6>
            </div>
            <div class="xl:col-span-5 xl:col-start-12">
                <button type="button"
                    class="text-red-500 bg-white border-red-500 btn hover:text-red-500 hover:bg-red-100
                           focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700
                           dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                    <span class="align-middle">Close
                    </span>
                </button>
            </div>
        </div>
        <form id="makePaymentForm" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                <input type="hidden" id="leadId" name="lead_id">
                <div class="mb-4">
                    <label class="inline-block mb-2 text-base font-medium" for="billNumber">Bill
                        Number</label>
                    <input type="text"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none
                focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600
                disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200
                disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        id="billNumber">
                </div>

                <div class="mb-4">
                    <label class="inline-block mb-2 text-base font-medium" for="amountDue">Amount
                        Due</label>
                    <input type="number"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        id="amountDue">
                </div>
                <div class="mb-4">
                    <label class="inline-block mb-2 text-base font-medium" for="paymentAmount">Payment
                        Amount</label>
                    <input type="number"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        id="paymentAmount" name="payment_amount" required>
                </div>
                {{-- Lead Details --}}
{{-- <div class="mb-4">
                    <label class="inline-block mb-2 text-base font-medium" for="paymentMode">Payment
                        Mode</label>
                    <select
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        id="paymentMode" name="payment_mode" required>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

            </div>

            <div class="flex justify-end gap-2">
                <button type="submit"
                    class="text-white transition-all duration-200 ease-linear btn bg-custom-800
                    border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600
                    focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring
                    focus:ring-custom-100 active:text-white active:bg-custom-600
                    active:border-custom-600 active:ring active:ring-custom-100">
                    Process Payment
                </button>

            </div>
        </form>
    </div>
</div>  --}}
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
            top: 22px;
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

        .cuusDtls-content {
            margin-left: 45px;
            padding: 15px;
            border-radius: 5px;
            position: relative;
        }

        .rowActive{
            background-color: #e5e5e5
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
                                    <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
                                        <div class="xl:col-span-3">
                                        </div>

                                    </div>
                                    <div class="overflow-x-auto">
                                        <table id="" class="table stripe group" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Lead Number
                                                    </th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Customer
                                                    </th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Bill Number
                                                    </th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Total
                                                        Amount</th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Amount Due
                                                    </th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Last
                                                        Receipt</th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Status</th>
                                                    <th class="ltr:!text-left rtl:!text-right whitespace-nowrap">Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leadsWithBills as $lead)
                                                    <tr id="bllngRowActive">
                                                        <td>{{ $lead->lead_num }}</td>
                                                        <td>{{ $lead->contact->name }}</td>
                                                        <td>{{ $lead->billing->bill_num }}</td>
                                                        <td>{{ number_format($lead->billing->customerWillPay, 2) }}</td>
                                                        <td>{{ number_format($lead->billing->to_pay, 2) }}</td>
                                                        <td>
                                                            @if ($lead->billing->receipts->isNotEmpty())
                                                                {{ $lead->billing->receipts->last()->payment_receipt_num }}
                                                                <br>
                                                                {{ number_format($lead->billing->receipts->last()->amount_paid, 2) }}
                                                                ({{ $lead->billing->receipts->last()->date }})
                                                            @else
                                                                No receipts
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600
                                                            active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">
                                                                {{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}
                                                            </span>
                                                        </td>
                                                        <td>

                                                            @if ($lead->billing->to_pay > 0)
                                                                <button type="button"
                                                                    class="btn btn-success text-white btn bg-custom-500 border-custom-500
                                                                hover:text-white hover:bg-custom-600 hover:border-custom-600
                                                                focus:text-white focus:bg-custom-600 focus:border-custom-600
                                                                focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                                                                active:border-custom-600 active:ring active:ring-custom-100
                                                                 dark:ring-custom-400/20"
                                                                    id="makePayment" data-bill-id="{{ $lead->billing->id }}"
                                                                    data-lead-num="{{ $lead->lead_num }}"
                                                                    data-bill-num="{{ $lead->billing->bill_num }}"
                                                                    data-amount-due="{{ $lead->billing->to_pay }}"
                                                                    data-lead-num="{{ $lead->lead_num }}"
                                                                    data-max-budget="{{ $lead->max_budget }}"
                                                                    data-cust-name="{{ $lead->contact->name }}"
                                                                    data-bill-date="{{ $lead->billing->date }}"
                                                                    data-property-type="{{ $lead->property_type }}"
                                                                    data-cust-address="{{ $lead->contact->address }}"
                                                                    data-cust-phone="{{ $lead->contact->phone }}"
                                                                    data-cust-whatsapp="{{ $lead->contact->whatsapp_ph }}"
                                                                    data-agent-name="{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}"
                                                                    data-agent-id="{{ $lead->assignedTo->id }}"
                                                                    data-finalized-property="{{ $lead->finalized_property }}"
                                                                    data-bill-amount ="{{ $lead->billing->customerWillPay }}"
                                                                    data-due-amount="{{ $lead->billing->to_pay }}"
                                                                    data-payment-terms="{{ $lead->payment_terms }}">
                                                                    Make Payment
                                                                </button>
                                                            @endif

                                                            <button type="button"
                                                                class="btn btn-secondary text-white btn bg-custom-500 border-custom-500
                                                             hover:text-white hover:bg-custom-600 hover:border-custom-600
                                                             focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring
                                                             focus:ring-custom-100 active:text-white active:bg-custom-600
                                                             active:border-custom-600 active:ring active:ring-custom-100
                                                             dark:ring-custom-400/20"
                                                                id="billedReceiptBill"
                                                                data-bill-id="{{ $lead->billing->id }}"
                                                                data-lead-num="{{ $lead->lead_num }}">
                                                                View Receipt
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
                    </div>
                </div><!--end card-->

                {{-- make payment --}}
                <div class="card hidden" id="makePaymentPart">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
                            <div class="xl:col-span-3">
                                <h6 class="mb-4 text-15">Payment </h6>
                            </div>
                            <div class="xl:col-span-5 xl:col-start-12">
                                <button type="button" id="close" class="text-red-500 btn bg-white border-red-500">
                                    Close
                                </button>
                            </div>
                        </div>
                        <form id="makePaymentform">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                                        <input type="hidden" id="billId" name="billId">
                                        <input type="hidden" id="agent_id" name="agent_id">
                                        <div class="mb-4">
                                            <label for="custName" class="inline-block mb-2 text-base font-medium">
                                                Customer Name
                                            </label>
                                            <input type="text" id="custName" name="custName" class="form-input"
                                                disabled>
                                        </div>
                                        <div class="mb-4">
                                            <label for="custAddress" class="inline-block mb-2 text-base font-medium">
                                                Address
                                            </label>
                                            <input type="text" id="custAddress" name="custAddress" class="form-input"
                                                disabled>
                                        </div>
                                        <div class="mb-4">
                                            <label for="custPhone" class="inline-block mb-2 text-base font-medium">
                                                Phone
                                            </label>
                                            <input type="text" id="custPhone" name="custPhone" class="form-input"
                                                disabled>
                                        </div>
                                        <div class="mb-4">
                                            <label for="custWhatsApp" class="inline-block mb-2 text-base font-medium">
                                                WhatsApp
                                            </label>
                                            <input type="text" id="custWhatsApp" name="custWhatsApp" class="form-input"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">
                                        <div class="mb-4">
                                            <label for="billNumber" class="inline-block mb-2 text-base font-medium">
                                                Bill Number
                                            </label>
                                            <input type="text" id="billNumber" name="billNumber" class="form-input"
                                                disabled>
                                        </div>
                                        <div class="mb-4">
                                            <label for="billDate" class="inline-block mb-2 text-base font-medium">
                                                Bill Date
                                            </label>
                                            <input type="text" id="billDate" name="billDate" class="form-input"
                                                required disabled>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                                        <div class="mb-4">
                                            <label for="billAmount" class="inline-block mb-2 text-base font-medium">
                                                Bill Amount
                                            </label>
                                            <input type="text" id="billAmount" name="billAmount"
                                                class="form-input" disabled>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-1">
                                        {{-- due amount div --}}
                                        <div class="mb-4">
                                            <label for="dueAmount" class="inline-block mb-2 text-base font-medium">
                                                Due Amount
                                            </label>
                                            <input type="text" id="dueAmount" name="dueAmount" class="form-input"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-2">

                                        {{-- payment amount div --}}
                                        <div class="mb-4">
                                            <label for="paymentAmount" class="inline-block mb-2 text-base font-medium">
                                                Payment Amount
                                            </label>
                                            <input type="number" id="paymentAmount" name="paymentAmount"
                                                class="form-input" required>
                                        </div>
                                        {{-- payment mode div --}}
                                        <div class="mb-4">
                                            <label for="paymentMode" class="inline-block mb-2 text-base font-medium">
                                                Payment Mode
                                            </label>
                                            <select id="paymentMode" name="paymentMode" class="form-input" required>
                                                <option value="cash">Cash</option>
                                                <option value="card">Card</option>
                                                <option value="bank_transfer">Bank Transfer</option>
                                            </select>
                                        </div>
                                        {{-- date  --}}
                                        <div class="mb-4">
                                            <label for="paymentDate" class="inline-block mb-2 text-base font-medium">
                                                Payment Date
                                            </label>
                                            <input type="date" id="paymentDate" name="paymentDate" class="form-input"
                                                required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="submit" class="btn bg-custom-800 text-white" id ="processPayment">
                                    Process Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- view receipt --}}
                <div class="card hidden" id="viewReciept">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
                            <div class="xl:col-span-3">
                                <h6 class="mb-4 text-15">Reciept </h6>
                            </div>
                            <div class="xl:col-span-5 xl:col-start-12">
                                <button type="button" id="closeReciept"
                                    class="text-red-500 btn bg-white border-red-500">
                                    Close
                                </button>
                            </div>
                        </div>
                        <div class="cusData" id="cusData">

                        </div>
                        <div class="timeline" id="receiptTimeline">
                        </div>
                    </div>
                </div>
                {{-- view receipt --}}



            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            document.querySelectorAll('[id="makePayment"]').forEach(button => {
                button.addEventListener('click', function() {
                    const grid = document.getElementById('billingGrid');
                    const raiseBillPart = document.getElementById('makePaymentPart');
                    // var bllngRowActive = document.getElementById('bllngRowActive');
                    
                    // bllngRowActive.classList.add('rowActive');


                    grid.classList.remove('grid-cols-1');
                    grid.classList.add('grid-cols-2');
                    raiseBillPart.classList.remove('hidden');



                    document.getElementById('billId').value = this.getAttribute('data-bill-id');
                    document.getElementById('agent_id').value = this.getAttribute('data-agent-id');
                    document.getElementById('custName').value = this.getAttribute('data-cust-name');
                    document.getElementById('custAddress').value = this.getAttribute(
                        'data-cust-address');
                    document.getElementById('custPhone').value = this.getAttribute(
                        'data-cust-phone');
                    document.getElementById('custWhatsApp').value = this.getAttribute(
                        'data-cust-whatsapp');
                    document.getElementById('billNumber').value = this.getAttribute(
                        'data-bill-num');
                    document.getElementById('billDate').value = this.getAttribute('data-bill-date');
                    // console.log(this.getAttribute('data-bill-date'));

                    document.getElementById('billAmount').value = this.getAttribute(
                        'data-bill-amount');
                    // console.log(this.getAttribute('data-bill-amount'));
                    document.getElementById('dueAmount').value = this.getAttribute(
                        'data-amount-due');

                    // console.log(this.getAttribute('data-due-amount'));
                    document.getElementById('paymentAmount').max = this.getAttribute(
                        'data-due-amount');

                });
            });

            // Event listener for closing the raise bill form
            document.getElementById('close').addEventListener('click', function() {
                const grid = document.getElementById('billingGrid');
                const raiseBillPart = document.getElementById('makePaymentPart');

                // Hide the raise bill part and reset the grid layout
                grid.classList.remove('grid-cols-2');
                grid.classList.add('grid-cols-1');
                raiseBillPart.classList.add('hidden');
            });






            $('#makePaymentform').on('submit', function(e) {
                e.preventDefault();

                var billId = $('#billId').val();
                var url = '/billing/payment/' + billId;

                var form = $(this);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            console.log('Payment successful:', response);




                            Swal.fire({
                                title: 'Payment Successful!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {

                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {

                        console.log(xhr.responseText);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while processing the payment. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // Event listener for viewing receipts
            document.querySelectorAll('[id="billedReceiptBill"]').forEach(button => {
                button.addEventListener('click', function() {
                    const grid = document.getElementById('billingGrid');
                    const viewReceipt = document.getElementById('viewReciept');
                    // var bllngRowActive = document.getElementById('bllngRowActive');
                    // alert("Hello! I am an alert box!!");
                    // bllngRowActive.classList.add('rowActive');

                    grid.classList.remove('grid-cols-1');
                    grid.classList.add('grid-cols-2');
                    viewReceipt.classList.remove('hidden');

                    var billId = this.getAttribute('data-bill-id');
                    var url = '/billing/' + billId + '/transactions';

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            var cusData = document.getElementById('cusData');
                            cusData.innerHTML = '';

                            var timeline = document.getElementById('receiptTimeline');
                            timeline.innerHTML = '';

                            var customerDetails = `
                    <div class="card cuusDtls-content bg_white">
                        <div class="card-body">
                            <h4>Customer Details</h4>
                            <p class="mt-2 cusDtlscntn">Name: <span>${response.contact.name}</span></p>
                            <p class="mt-2 cusDtlscntn">Email: <span>${response.contact.email}</span></p>
                            <p class="mt-2 cusDtlscntn">Phone: <span>${response.contact.phone}</span></p>
                            <p class="mt-2 cusDtlscntn">WhatsApp:<span> ${response.contact.whatsapp_ph}</span></p>
                            <p class="mt-2 cusDtlscntn">Address: <span>${response.contact.address}</span></p>
                        </div>
                    </div>
                `;
                            cusData.innerHTML += customerDetails;

                            response.transactions.forEach(transaction => {
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
                                timeline.innerHTML += timelineItem;
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });

            // Event listener for closing the view receipt modal
            document.getElementById('closeReciept').addEventListener('click', function() {
                const grid = document.getElementById('billingGrid');
                const viewReceipt = document.getElementById('viewReciept');

                grid.classList.remove('grid-cols-2');
                grid.classList.add('grid-cols-1');
                viewReceipt.classList.add('hidden');
            });


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
        //         <div class="timeline-item">
        //             <div class="timeline-content">
        //                 <h6>Transaction #${transaction.transaction_num}</h6>
        //                 <p>Receipt Number: ${transaction.receipt_num}</p>
        //                 <p>Amount Paid: ${transaction.payment_amount}</p>
        //                 <p>Payment Mode: ${transaction.mode}</p>
        //                 <p>Status: ${transaction.status}</p>
        //             </div>
        //         </div>
        //     `;
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
