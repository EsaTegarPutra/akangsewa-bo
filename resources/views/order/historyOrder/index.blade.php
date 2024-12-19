@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order Completed</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Order Id</th>
                                        <th>Product Variant</th>
                                        <th>Price</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th>Create At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>001</td>
                                        <td>Black</td>
                                        <td>Rp.1.000.000</td>
                                        <td>2 Days</td>
                                        <td class="text-center"><span class="bg-success py-1 px-2 rounded-pill">Completed</span></td>
                                        <td>20 Oct 2024</td>
                                        <td class="text-center"><a href="{{route('showCompletedOrder')}}" class="btn btn-sm btn-info">Detail</a></td>
                                    </tr> --}}
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
    <script>
        var table = $("#lookup").dataTable({
            columns: [{
                    data: 'id'
                },
                {
                    data: 'orderCode'
                },
                {
                    data: 'totalAmount'
                },
                {
                    data: 'totalDiscount'
                },
                {
                    data: 'totalPrice'
                },
                {
                    data: 'transactionDate'
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        return '<div class="bg-success py-1 px-2 rounded-pill d-flex justify-content-center">' + 'completed' + '</div>';
                    }
                },
                // {
                //     data: 'id'
                // }
            ],
        });

        $(document).ready(function() {
            loadData();
        });


        $('.table').on('click', '.btn-detail-order-completed', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id').split('_');
            var index = id[1];
            var data = table.fnGetData()

            location.href = "{{ url('orders/getAllOrdersByStatus/d/show') }}/" + data[index].id;
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
                    url: "{{ url('order/historyOrder/getIndex') }}/",
                    dataType: "json",
                    type: "GET",
                    error: function() { // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append(
                            '<tbody class="employee-grid-error"><tr><th style="background: #F0F0F0;color:#000000" class="text-center" colspan="5">No data found in the server</th></tr></tbody>'
                        );
                        $("#lookup_processing").css("display", "none");

                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'orderCode'
                    },
                    {
                        data: 'totalAmount'
                    },
                    {
                        data: 'totalDiscount'
                    },
                    {
                        data: 'totalPrice'
                    },
                    {
                        data: 'transactionDate'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            return '<div class="bg-success py-1 px-2 rounded-pill d-flex justify-content-center">' + 'completed' +
                                '</div>';
                        }
                    },
                    // {
                    //     data: 'id'
                    // }
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
                            $(td).append($('@include('inc.button.btnDetailOrderCompleted')'));
                        },
                        orderable: false
                    }
                ]
            });

        }
    </script>
@endsection
