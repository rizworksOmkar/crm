<div class="card">
    <div class="card-body">
        {{-- <h6 class="mb-4 text-15">Basic</h6> --}}
        <table id="" class="table stripe group" style="width: 100%">
            <thead>
                <tr>
                    <th class="ltr:!text-left rtl:!text-right">Lead Number</th>
                    <th class="ltr:!text-left rtl:!text-right">Customer</th>
                    <th class="ltr:!text-left rtl:!text-right">Bill Number</th>
                    <th class="ltr:!text-left rtl:!text-right">Total Amount</th>
                    <th class="ltr:!text-left rtl:!text-right">Amount Due</th>
                    <th class="ltr:!text-left rtl:!text-right">Last Receipt</th>
                    <th class="ltr:!text-left rtl:!text-right">Status</th>
                    <th class="ltr:!text-left rtl:!text-right">Actions</th>
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
                        <td
                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600
                                active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">
                            {{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}</td>
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
                                    data-modal-target="makePaymentModal"
                                    data-bill-id="{{ $lead->billing->id }}" data-lead-num="{{ $lead->lead_num }}"
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
                                 data-modal-target="viewReceiptModal"
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
