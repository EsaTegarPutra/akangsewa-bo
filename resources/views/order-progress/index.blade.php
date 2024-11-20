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
    </section>
@endsection
@section('script')
    {{-- <script>
        var table = $("#lookup").dataTable({
            columns: [{
                    data: 'id'
                },
                {
                    data: 'orderId'
                },
                {
                    data: 'customerName'
                },
                {
                    data: 'product'
                },
                {
                    data: 'price',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'days'
                },
                {
                    data: 'createdAt'
                },
                {
                    data: 'id'
                }
            ],
        });

        $(document).ready(function() {
            loadData();
        });


        $('.table').on('click', '.btn-edit', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id').split('_');
            var index = id[1];
            var data = table.fnGetData()

            location.href = "{{ url('#') }}/" + data[index].id;
        });
        $('.table').on('click', '.btn-delete', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id').split('_');
            var index = id[1];
            var data = table.fnGetData(); // Mendapatkan data dari baris

            deletes(data[index].id); // Panggil fungsi deletes dengan ID produk
        });




        function loadData() {

            $('#lookup').dataTable().fnDestroy();

            var table = $("#lookup").dataTable({
                "scrollCollapse": true,
                'autoWidth': true,
                'bSort': true,
                'bPaginate': true,
                'searching': true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('#') }}/",
                    dataType: "json",
                    type: "GET",
                    error: function() { // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append(
                            '<tbody class="employee-grid-error"><tr><th style="background: #F0F0F0;color:#000000" class="text-center" colspan="8">No data found in the server</th></tr></tbody>'
                        );
                        $("#lookup_processing").css("display", "none");

                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'orderId'
                    },
                    {
                        data: 'customerName'
                    },
                    {
                        data: 'product'
                    },
                    {
                        data: 'price',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'days'
                    },
                    {
                        data: 'createdAt'
                    },
                    {
                        data: 'id'
                    }
                ],
                createdRow: function(row, data, index) {
                    $(row).attr('id', 'table_' + index);
                },
                columnDefs: [{
                        "targets": [0],
                        "createdCell": function(td, cellData, rowData, row, col) {
                            $(td).text(row + 1);
                        },
                        orderable: true
                    },
                    {
                        "targets": [7],
                        "createdCell": function(td, cellData, rowData, row, col) {
                            $(td).empty();
                            $(td).addClass("text-center");
                            $(td).append($('@include('inc.button.btnGroupED')'));
                        },
                        orderable: false
                    }
                ]
            });
        }
    </script> --}}
@endsection
