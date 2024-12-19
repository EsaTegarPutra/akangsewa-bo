@extends('layouts.app')
@section('content')
    {{-- <section class="content">
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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Invoice Number</th>
                                        <th>Price</th>
                                        <th>Days</th>
                                        <th>Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>00001</td>
                                        <td>Mamat Racing</td>
                                        <td>INV1000000001</td>
                                        <td>4.500.000,00</td>
                                        <td>4</td>
                                        <td>24 Oct 2024 10:52:16</td>
                                        <td class="d-flex justify-content-center gap-1">
                                            <a href="{{ url('order/detail-order')}}" class="btn btn-md btn-primary">Detail</a>
                                            <a href="{{ url('order/tracking-delivery/detail')}}" class="btn btn-md btn-success">Tracking</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>00002</td>
                                        <td>Sucipto Padalarang</td>
                                        <td>INV1000000002</td>
                                        <td>2.000.000,00</td>
                                        <td>4</td>
                                        <td>24 Oct 2024 10:52:16</td>
                                        <td class="d-flex justify-content-center gap-1">
                                            <button class="btn btn-md btn-primary">Detail</button>
                                            <button class="btn btn-md btn-success">Tracking</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section> --}}
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
                                        <th>Total Amount</th>
                                        <th>Total Discount</th>
                                        <th>Total Price</th>
                                        <th>Transaction Date</th>
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
                    data: 'totalAmount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'totalDiscount',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'totalPrice',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'transactionDate',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toISOString().split('T')[0]; // Mengubah ke format YYYY-mm-dd
                    }
                },
                {
                    data: 'status'
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `
                                <div class="text-center">
                                    <a href="/order/detail-order/${data}" class="btn btn-primary btn-sm">Detail</a>
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
                        data: 'totalAmount',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'totalDiscount',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'totalPrice',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'transactionDate',
                        render: function(data) {
                            const date = new Date(data);
                            return date.toISOString().split('T')[0]; // Mengubah ke format YYYY-mm-dd
                        }
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                                <div class="text-center">
                                    <a href="/order/detail-order/${data}" class="btn btn-primary btn-sm">Detail</a>
                                    <a href="/order/tracking-delivery/detail/${data}" class="btn btn-success btn-sm">Tracking</a>
                                </div>
                            `;
                        }
                    }
                ]
            });
        }
    </script>
@endsection
