@extends('layouts.admin-front')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Billing Management</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Lead Number</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>{{ $lead->lead_num }}</td>
                                    <td>{{ $lead->contact->name }}</td>
                                    <td>{{ $lead->status }}</td>
                                    <td>
                                        @if($lead->billing)
                                            @if($lead->billing->dispute_flag)
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#fixDisputeModal-{{ $lead->id }}">Fix Dispute</button>
                                            @else
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#billDetailsModal-{{ $lead->id }}">View Bill</button>
                                            @endif
                                        @else
                                            <a href="{{ route('billing.raise', $lead->id) }}" class="btn btn-primary">Raise Bill</a>
                                        @endif

                                        @if(!$lead->billing || !$lead->billing->agent_recieved_payment)
                                            <a href="{{ route('billing.paymentReceipt', $lead->id) }}" class="btn btn-success">Payment Receipt</a>
                                        @endif

                                        <form action="{{ route('billing.raiseDispute', $lead->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Raise Dispute</button>
                                        </form>
                                    </td>
                                </tr>

                                @if($lead->billing)
                                    <!-- Modal for Bill Details -->
                                    <div class="modal fade" id="billDetailsModal-{{ $lead->id }}" tabindex="-1" role="dialog" aria-labelledby="billDetailsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="billDetailsModalLabel">Bill Details for Lead: {{ $lead->lead_num }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Expected Amount:</strong> {{ $lead->billing->expected_amount }}</p>
                                                    <p><strong>Paid Amount:</strong> {{ $lead->billing->paid_amount }}</p>
                                                    <p><strong>Payment Date:</strong> {{ $lead->billing->payment_date }}</p>
                                                    <p><strong>Customer Settled:</strong> {{ $lead->billing->customer_settled ? 'Yes' : 'No' }}</p>
                                                    @if($lead->billing->agent_recieved_payment)
                                                        <p><strong>Agent Received Payment:</strong> Yes</p>
                                                        <p><strong>Agent Payment Date:</strong> {{ $lead->billing->payment_date_to_agent }}</p>
                                                        <p><strong>Agent Paid Amount:</strong> {{ $lead->billing->paid_amount_to_agent }}</p>
                                                    @else
                                                        <p><strong>Agent Received Payment:</strong> No</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Fix Dispute -->
                                    <div class="modal fade" id="fixDisputeModal-{{ $lead->id }}" tabindex="-1" role="dialog" aria-labelledby="fixDisputeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fixDisputeModalLabel">Fix Dispute for Lead: {{ $lead->lead_num }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('billing.fixDispute', $lead->billing->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="expected_amount">Expected Amount</label>
                                                            <input type="text" class="form-control" name="expected_amount" value="{{ $lead->billing->expected_amount }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paid_amount">Paid Amount</label>
                                                            <input type="text" class="form-control" name="paid_amount" value="{{ $lead->billing->paid_amount }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payment_date">Payment Date</label>
                                                            <input type="date" class="form-control" name="payment_date" value="{{ $lead->billing->payment_date }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="customer_settled">Customer Settled</label>
                                                            <select class="form-control" name="customer_settled" required>
                                                                <option value="1" {{ $lead->billing->customer_settled ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ !$lead->billing->customer_settled ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="agent_recieved_payment">Agent Received Payment</label>
                                                            <select class="form-control" name="agent_recieved_payment" required>
                                                                <option value="1" {{ $lead->billing->agent_recieved_payment ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ !$lead->billing->agent_recieved_payment ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payment_date_to_agent">Agent Payment Date</label>
                                                            <input type="date" class="form-control" name="payment_date_to_agent" value="{{ $lead->billing->payment_date_to_agent }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paid_amount_to_agent">Agent Paid Amount</label>
                                                            <input type="text" class="form-control" name="paid_amount_to_agent" value="{{ $lead->billing->paid_amount_to_agent }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
