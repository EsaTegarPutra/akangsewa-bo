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
                                        <th>Variant Name</th>
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
        
        <!-- Image Modal -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="imagePreviewLabel">Image Preview</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Product Image" class="img-fluid"
                            style="max-width: 100%; max-height: 100%;">
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
                    data: 'productVariantName'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        const imageUrl = `http://103.127.136.166:8991/api/product-images-path/${data}`;
                        return `
    <div style="text-align: center;">
        <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
            Preview Image
        </button>
        <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Product Image">
    </div>
`;
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

        function openImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            var imageModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            imageModal.show();
        }

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
                        data: 'productVariantName'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            const imageUrl = `http://103.127.136.166:8991/api/product-images-path/${data}`;
                            return `
    <div style="text-align: center;">
        <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
            Preview Image
        </button>
        <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Product Image">
    </div>
`;
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
