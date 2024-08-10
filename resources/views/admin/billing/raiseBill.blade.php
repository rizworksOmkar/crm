@extends('layouts.admin-front')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Raise Bill for Lead: {{ $lead->lead_num }}</h4>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('billing.store', $lead->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="expected_amount">Expected Amount</label>
                        <input type="number" name="expected_amount" id="expected_amount" class="form-control" value="{{ $lead->max_budget }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="to_pay">To Pay</label>
                        <input type="number" name="to_pay" id="to_pay" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_settled">Customer Settled</label>
                        <select name="customer_settled" id="customer_settled" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agent_id">Agent</label>
                        <input type="text" name="agent_name" id="agent_name" class="form-control" value="{{ $lead->assignedTo->first_name . ' ' . $lead->assignedTo->last_name }}" readonly>
                        <input type="hidden" name="agent_id" value="{{ $lead->assignedTo->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Raise Bill</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
