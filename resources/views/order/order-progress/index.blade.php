@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title">Order Progress</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="ordersTable" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Transaction Date</th>
                                        <th>Payment Type</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var table = $("#lookup").dataTable({
            columns: [{
                    data: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'orderCode'
                },
                {
                    data: 'customerName'
                },
                {
                    data: 'totalAmount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'transactionDate',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toISOString().split('T')[0];
                    }
                },
                {
                    data: 'paymentBankName'
                },
                {
                    data: 'status'
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `
                            <div class="text-center">
                                <a href="/order/detailPending/${data}" class="btn btn-primary btn-sm">Detail</a>
                                <a href="/order/tracking-delivery/detail/${data}" class="btn btn-success btn-sm">Tracking</a>
                            </div>
                        `;
                    }

                }
            ]
        });

        $(document).ready(function() {
            loadData();
        });

        function loadData() {
            // Reset DataTables jika sudah diinisialisasi sebelumnya
            if ($.fn.DataTable.isDataTable('#ordersTable')) {
                $('#ordersTable').DataTable().destroy();
            }

            // Inisialisasi DataTables
            $('#ordersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getIndexProgressOrder') }}",
                    type: "GET",
                    error: function() {
                        $(".ordersTable-error").html("");
                        $("#ordersTable").append(
                            '<tbody class="ordersTable-error"><tr><th colspan="8" class="text-center">No data found in the server</th></tr></tbody>'
                        );
                        $("#ordersTable_processing").css("display", "none");
                    }
                },
                columns: [{
                    data: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'orderCode'
                },
                {
                    data: 'customerName'
                },
                {
                    data: 'totalAmount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'transactionDate',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toISOString().split('T')[0];
                    }
                },
                {
                    data: 'paymentBankName'
                },
                {
                    data: 'status'
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `
                            <div class="text-center">
                                <a href="/order/detailPending/${data}" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        `;
                    }

                }
            ]
            });
        }
    </script>
@endsection
