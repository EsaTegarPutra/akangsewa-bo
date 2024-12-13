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
                        <h3 class="box-title">Pending Order</h3>
                        
                    </div>
                   
                    <div class="box-body">
                        <div class="table-responsive ">
                            <table class="table" id="lookup">
                                <thead class="bg-info">    
                                    <tr>
                                        <th>No</th>
                                        <th>order code</th>
                                        <th>total amount</th>
                                        <th>total discount</th>
                                        <th>total price</th>
                                        <th>transaction date</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>010101</td>
                                        <td>Panasonic Professional Camera Recorder <br>
                                            SONY MHC-M40D High Power Audio System
                                        </td>
                                        <td>Rp 2,500,000.00 <br>
                                            Rp 1,500,999.00
                                        </td>
                                        <td>29/10/2024</td>
                                        <td><button class="btn btn-sm btn-rounded btn-danger">pending</button></td>
                                        <td>2024-10-25T09:47:28Z</td>
                                        <td><a href="{{ url('order/detailOrder') }}" class="btn btn-warning">detail</a></td>
                                    </tr>
                                </tbody> --}}
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
                                <a href="/order/detailOrder/${data}" class="btn btn-primary btn-sm">Detail</a>
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
                url: "{{ route('getIndexDetailPending') }}",
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
                                <a href="/order/detailOrder/${data}" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        `;
                    }
                }
            ]
        });
    }
</script>
@endsection



