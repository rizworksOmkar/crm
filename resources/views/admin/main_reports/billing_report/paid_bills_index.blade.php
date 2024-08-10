



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
                    <h4>Paid Billed Lead Report</h4>
                    <div class="card-header-action">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="width:100%;" id="tableState">

                                <thead>
                                    <tr>
                                        <th>Lead Number</th>
                                        <th>Customer</th>
                                        <th>Bill Number</th>
                                        <th>Total Amount</th>
                                        <th>Amount Due</th>

                                        <th>Status</th>
                                        <th>Reciepts</th>
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

                                            <td>{{ $lead->billing->dispute_flag ? 'Disputed' : 'Clear' }}</td>
                                            <td>


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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableCity').DataTable({
                "scrollX": true,
                stateSave: true,
                "paging": true,
                "ordering": false,
                "info": false,
                // dom: 'Bfrtip',
                // buttons: [
                //     'excel', 'pdf'
                // ]
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
