<div class="card">
    <div class="card-body">
        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-13">
            <div class="xl:col-span-3">
                {{-- <h6 class="mb-4 text-15">Raise Bill</h6> --}}
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
                    @foreach ($leads as $lead)
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
                                {{-- <a href="{{ route('billing.show', $lead->billing->id) }}"
                                class="btn btn-info text-white btn bg-custom-500 border-custom-500 hover:text-white
                                 hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 
                                 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white 
                                 active:bg-custom-600 active:border-custom-600 active:ring 
                                 active:ring-custom-100 dark:ring-custom-400/20">View
                                Details</a> --}}
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
</div>
