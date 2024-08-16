@extends('layouts.admin-front')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Receipt for Lead #{{ $lead->lead_num }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('billing.recordPayment', $lead->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="paid_amount">Paid Amount by Customer</label>
                            <input type="number" class="form-control" name="paid_amount" required value="{{ $billing->paid_amount }}" >
                        </div>
                        <div class="form-group">
                            <label for="payment_date_to_agent">Payment Date to Agent</label>
                            <input type="date" class="form-control" name="payment_date_to_agent" required>
                        </div>
                        <div class="form-group">
                            <label for="paid_amount_to_agent">Paid Amount to Agent</label>
                            <input type="number" class="form-control" name="paid_amount_to_agent" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_settled">Customer Settled</label>
                            <select class="form-control" name="customer_settled" disabled>
                                <option value="1" {{ $billing->customer_settled ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$billing->customer_settled ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agent_received_payment">Agent Received Payment</label>
                            <select class="form-control" name="agent_received_payment" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Record Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
