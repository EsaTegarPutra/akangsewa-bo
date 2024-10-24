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
                        <h3 class="box-title">Product</h3>
                        <a href="{{ url('product/master/create') }}" class="btn btn-info btn-sm btn-add">Add Product</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Avability Status</th>
                                        <th>Create At</th>
                                        <th>Updated At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                    data: 'productName'
                },
                {
                    data: 'price',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'categoryName'
                },
                {
                    data: 'avabilityStatus',
                    render: function(data, type, row) {
                        return data === true ? 'Enabled' : 'Disabled';
                    }
                },
                {
                    data: 'createAt'
                },
                {
                    data: 'updatedAt'
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

            location.href = "{{ url('product/master/edit') }}/" + data[index].id;
        });
        $('.table').on('click', '.btn-delete', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id').split('_');
            var index = id[1];
            var data = table.fnGetData(); // Mendapatkan data dari baris

            deletes(data[index].id); // Panggil fungsi deletes dengan ID produk
        });

        function deletes(id) {
            $.confirm({
                confirmButton: 'Remove',
                cancelButton: 'Cancel',
                title: 'Confirmation',
                content: 'Remove this Data?',
                icon: 'ti-info',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{{ url('product/master/checkProductDescription') }}/" +
                                id, // Cek Product Description
                            data: {},
                            dataType: "json",
                            type: "get",
                            success: function(descriptionData) {
                                $.ajax({
                                    url: "{{ url('product/master/checkProductVariant') }}/" +
                                        id, // Cek Product Variant
                                    data: {},
                                    dataType: "json",
                                    type: "get",
                                    success: function(variantData) {
                                        if (descriptionData < 1 && variantData < 1) {
                                            // Jika tidak ada description & variant, lanjutkan hapus produk
                                            location.href =
                                                "{{ url('product/master/delete') }}/" +
                                                id;
                                        } else {
                                            // Jika ada, tampilkan pesan error
                                            $.alert({
                                                title: 'Information',
                                                content: 'Product cannot be deleted. It has ' +
                                                    descriptionData +
                                                    ' descriptions and ' +
                                                    variantData + ' variants.',
                                            });
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        var errorMsg =
                                            'Ajax request failed for Product Variant with = ' +
                                            errorThrown;
                                        console.log(errorMsg);
                                    }
                                });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                var errorMsg =
                                    'Ajax request failed for Product Description with = ' +
                                    errorThrown;
                                console.log(errorMsg);
                            }
                        });
                    },
                    cancel: function() {}
                }
            });
        }


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
                    url: "{{ url('product/master/getIndex') }}/",
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
                        data: 'productName'
                    },
                    {
                        data: 'price',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'categoryName'
                    },
                    {
                        data: 'avabilityStatus',
                        render: function(data, type, row) {
                            return data === "true" ? 'Enabled' : 'Disabled';
                        }
                    },
                    {
                        data: 'createAt'
                    },
                    {
                        data: 'updatedAt'
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
                        "targets": [5], // Target kolom 'createAt'
                        "createdCell": function(td, cellData, rowData, row, col) {
                            if (cellData) {
                                var date = new Date(cellData);
                                var options = {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    second: '2-digit',
                                    hour12: false
                                };
                                var formattedDate = date.toLocaleDateString('en-GB', options).replace(',',
                                    '');
                                $(td).text(formattedDate);
                            } else {
                                $(td).text('Not Available');
                            }
                        }
                    },
                    {
                        "targets": [6], // Target kolom 'updatedAt'
                        "createdCell": function(td, cellData, rowData, row, col) {
                            if (cellData) {
                                var date = new Date(cellData);
                                var options = {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    second: '2-digit',
                                    hour12: false
                                };
                                var formattedDate = date.toLocaleDateString('en-GB', options).replace(',',
                                    '');
                                $(td).text(formattedDate);
                            } else {
                                $(td).text('');
                            }
                        }
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
    </script>
@endsection
