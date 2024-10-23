@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title">Image Repository</h3>
                        <a href="{{ url('product/imageRepository/create') }}" class="btn btn-info btn-sm btn-add">Add Image
                            Product</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Attribute Values Name</th>
                                        <th>Product Image</th>
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
                    data: 'productName',
                    render: function(data, type, row) {
                        return '<div style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal;">' +
                            data + '</div>';
                    }
                },
                {
                    data: 'valuesAttribute'
                },
                {
                    data: 'imagesProduct',
                    render: function(data, type, row) {
                        if (data) {
                            return '<img src="data:' + row.imagesProductContentType + ';base64,' + data +
                                '" alt="Image" style="width: 10rem; height: auto;" />';
                        }
                        return 'No Image';
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

            location.href = "{{ url('product/imageRepository/edit') }}/" + data[index].id;
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
                        location.href = "{{ url('product/imageRepository/delete') }}" + "/" + id;
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
                    url: "{{ url('product/imageRepository/getIndex') }}/",
                    dataType: "json",
                    type: "GET",
                    error: function() { // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append(
                            '<tbody class="employee-grid-error"><tr><th style="background: #F0F0F0;color:#000000" class="text-center" colspan="6">No data found in the server</th></tr></tbody>'
                        );
                        $("#lookup_processing").css("display", "none");

                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'productName',
                        render: function(data, type, row) {
                            return '<div style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal;">' +
                                data + '</div>';
                        }
                    },
                    {
                        data: 'valuesAttribute'
                    },
                    {
                        data: 'imagesProduct',
                        render: function(data, type, row) {
                            if (data) {
                                return '<div style="display: grid; place-items: center;"><img src="data:' +
                                    row.imagesProductContentType + ';base64,' +
                                    data +
                                    '" alt="Image" style="width: 4rem; object-fit: cover; aspect-ratio: 1 / 1; background-position: center;"/></div>';
                            }
                            return '<span style="display: grid; place-items: center;">No Image</span>';
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
