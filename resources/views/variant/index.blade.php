@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title">Product Variant</h3>
                        <a href="{{ url('product/variant/create') }}" class="btn btn-info btn-sm btn-add">Add Variant</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Variant Name</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
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
                    data: 'variantName'
                },
                {
                    data: 'stock'
                },
                {
                    data: 'createdAt'
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

            location.href = "{{ url('product/variant/edit') }}/" + data[index].id;
        });
        $('.table').on('click', '.btn-delete', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id').split('_');
            var index = id[1];
            var data = table.fnGetData()

            deletes(data[index].id);
        });

        function deletes(id) {
            $.confirm({
                confirmButton: 'Remove',
                cancelButton: 'Cancel',
                title: 'Confirmation',
                content: 'Remove this Data ?',
                icon: 'ti-info',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{!! url('product/variant/checkProductImage') !!}/" + id,
                            data: {},
                            dataType: "json",
                            type: "get",
                            success: function(imageData) {
                                if (imageData > 1) {
                                    $.alert({
                                        title: 'Information',
                                        content: 'variant cant delete, image used by this variant product: ' +
                                            imageData,
                                    });
                                } else {
                                    location.href = "{{ url('product/variant/delete') }}" + "/" +
                                        id;
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                var errorMsg = 'Ajax request failed table with = ' + errorThrown;
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
                    url: "{{ url('product/variant/getIndex') }}/",
                    dataType: "json",
                    type: "GET",
                    error: function() { // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append(
                            '<tbody class="employee-grid-error"><tr><th style="background: #F0F0F0;color:#000000" class="text-center" colspan="7">No data found in the server</th></tr></tbody>'
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
                    data: 'variantName'
                },
                {
                    data: 'stock'
                },
                {
                    data: 'createdAt'
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
                    "targets": [4], // Target kolom 'createAt'
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
                    "targets": [5], // Target kolom 'updatedAt'
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
                    "targets": [6],
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
