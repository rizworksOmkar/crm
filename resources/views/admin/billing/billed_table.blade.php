<table class="table table-striped">
    <thead>
        <tr>
            <th>Lead Number</th>
            <th>Customer</th>
            <th>Bill Number</th>
            <th>Total Amount</th>
            <th>Amount Due</th>
            <th>Last Receipt</th>
            <th>Status</th>
            <th>Actions</th>
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
                    @if($lead->billing->receipts->isNotEmpty())
                        {{ $lead->billing->receipts->last()->payment_receipt_num }}
                        <br>
                        {{ number_format($lead->billing->receipts->last()->amount_paid, 2) }}
                        ({{ $lead->billing->receipts->last()->date }})
                    @else
                        No receipts
                    @endif
                </td>
                <td>{{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}</td>
                <td>
                    <a href="{{ route('billing.show', $lead->billing->id) }}" class="btn btn-info">View Details</a>
                    @if($lead->billing->to_pay > 0)
                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#makePaymentModal"
                            data-bill-id="{{ $lead->billing->id }}"
                            data-lead-num="{{ $lead->lead_num }}"
                            data-bill-num="{{ $lead->billing->bill_num }}"
                            data-amount-due="{{ $lead->billing->to_pay }}">
                            Make Payment
                        </button>
                    @endif

                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                        data-target="#viewReceiptModal"
                        data-bill-id="{{ $lead->billing->id }}"
                        data-lead-num="{{ $lead->lead_num }}">
                        View Receipt
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
