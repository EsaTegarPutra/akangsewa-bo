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
                        <h3 class="box-title">Data Kurir</h3>
                        <a href="{{ url('masterData/kurir/create') }}" class="btn btn-info btn-sm btn-add">Add Kurir</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="lookup" class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Kurir Name</th>
                                        <th>Identity Photo</th>
                                        <th>Self Photo</th>
                                        <th>No.Telp</th>
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
                    data: 'fullName',
                },
                {
                    data: 'identityPhoto'
                },
                {
                    data: 'selfPhoto'
                },
                {
                    data: 'noTelp'
                },
                {
                    data: 'active'
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

            location.href = "{{ url('masterData/kurir/edit') }}/" + data[index].id;
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
                        location.href = "{{ url('masterData/kurir/delete') }}" + "/" + id;
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
                    url: "{{ url('masterData/kurir/getIndex') }}/",
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
                        data: 'fullName'
                    },
                    {
                        data: 'identityPhoto'
                    },
                    {
                        data: 'selfPhoto'
                    },
                    {
                        data: 'noTelp'
                    },
                    {
                        data: 'active'
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
                        "targets": [2], // Target kolom 'identity photo'
                        "createdCell": function(td, cellData, rowData, row, col) {
                            $(td).empty();
                            $(td).addClass("text-center");
                            if (rowData.identityPhoto) {
                                const imageUrl =
                                    `data:${rowData.identityPhotoContentType};base64,${rowData.identityPhoto}`;
                                $(td).append(`
                            <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
                                Preview Image
                            </button>
                            <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Identity Photo">
                        `);
                            } else {
                                $(td).append(`<p style="text-align: center;">No Image</p>`);
                            }
                        },
                        orderable: false
                    },
                    {
                        "targets": [3], // Target kolom 'seft photo'
                        "createdCell": function(td, cellData, rowData, row, col) {
                            $(td).empty();
                            $(td).addClass("text-center");
                            if (rowData.selfPhoto) {
                                const imageUrl =
                                    `data:${rowData.selfPhotoContentType};base64,${rowData.selfPhoto}`;
                                $(td).append(`
                            <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
                                Preview Image
                            </button>
                            <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Self Photo">
                        `);
                            } else {
                                $(td).append(`<p style="text-align: center;">No Image</p>`);
                            }
                        },
                        orderable: false
                    },
                    {
                        "targets": [5], // Target kolom 'active'
                        "createdCell": function(td, cellData, rowData, row, col) {
                            $(td).empty();
                            const statusActive = cellData ?
                                `<span class="badge bg-success">Enable</span>` :
                                `<span class="badge bg-danger">Disable</span>`;
                            $(td).html(statusActive);
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
