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
                        <h3 class="box-title">Tenant Shipping</h3>
                        <a href="{{ url('masterData/tenantShipping/create') }}" class="btn btn-info btn-sm btn-add">Add
                            Shipping</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Shipping Name</th>
                                        <th>Shipping Price</th>
                                        <th>Shipping Type</th>
                                        <th>Status</th>
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
                    data: 'shippingName'
                },
                {
                    data: 'shippingPrice',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                },
                {
                    data: 'shippingType'
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        return data === "true" ?
                            '<span class="badge bg-success">Enable</span>' :
                            '<span class="badge bg-danger">Disable</span>';
                    }
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

            location.href = "{{ url('masterData/tenantShipping/edit') }}/" + data[index].id;
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
                        location.href = "{{ url('masterData/tenantShipping/delete') }}" + "/" + id;
                    },
                    cancel: function() {}
                }
            });
        }

        function loadData() {
            $('#lookup').dataTable().fnDestroy(); // menghancurkan tabel sebelumnya

            var table = $("#lookup").DataTable({
                "scrollCollapse": true,
                'autoWidth': true,
                'bSort': true,
                'bPaginate': true,
                'searching': true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('masterData/tenantShipping/getIndex') }}/",
                    dataType: "json",
                    type: "GET",
                    error: function() {
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
                        data: 'shippingName'
                    },
                    {
                        data: 'shippingPrice',
                        render: $.fn.dataTable.render.number(',', '.', 2, 'Rp ')
                    },
                    {
                        data: 'shippingType'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            return data === "true" ?
                                '<span class="badge bg-success">Enable</span>' :
                                '<span class="badge bg-danger">Disable</span>';
                        }
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
                        "targets": [5],
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
