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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Billing Management</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="unbilled-tab" data-toggle="tab" href="#unbilled"
                                role="tab">Unbilled Leads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="billed-tab" data-toggle="tab" href="#billed" role="tab">Billed
                                Leads</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="unbilled" role="tabpanel">
                            @include('admin.billing.unbilled_table', ['leads' => $leadsWithoutBills])
                        </div>
                        <div class="tab-pane fade" id="billed" role="tabpanel">
                            @include('admin.billing.billed_table', ['leads' => $leadsWithBills])
                        </div>
                    </div>
                </div>
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
                            <input type="text" class="form-control" id="leadNumber" readonly>
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
                            <input type="text" name="agent_name" id="agent_name" class="form-control" readonly>
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
    <div class="modal fade" id="makePaymentModal" tabindex="-1" role="dialog" aria-labelledby="makePaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makePaymentModalLabel">Make Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="makePaymentForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="billId" name="bill_id">
                        <div class="form-group">
                            <label for="billNumber">Bill Number</label>
                            <input type="text" class="form-control" id="billNumber" readonly>
                        </div>
                        <div class="form-group">
                            <label for="amountDue">Amount Due</label>
                            <input type="number" class="form-control" id="amountDue" readonly>
                        </div>
                        <div class="form-group">
                            <label for="paymentAmount">Payment Amount</label>
                            <input type="number" class="form-control" id="paymentAmount" name="payment_amount"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="paymentMode">Payment Mode</label>
                            <select class="form-control" id="paymentMode" name="payment_mode" required>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Process Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Receipt Modal -->
    <div class="modal fade" id="viewReceiptModal" tabindex="-1" role="dialog" aria-labelledby="viewReceiptModalLabel"
        aria-hidden="true">
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
    <script>
        $(document).ready(function() {
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
