



@extends('layouts.admin-front')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Unpaid Billed Lead Report</h4>
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
                                        {{-- <th>Actions</th> --}}
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
                                            {{-- <td>
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
                                            </td> --}}
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
        });

    </script>

@endsection
