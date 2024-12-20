@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h2>Banner List</h2>
                        <a href="{{ url('masterData/banner/create') }}" class="btn btn-primary mb-3">Add Banner</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table" id="lookup">
                                <thead class="bg-info">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Banner Name</th>
                                        <th>Images</th>
                                        <th>Status</th>
                                        <th>Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk menampilkan gambar -->
        <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="imagePreviewLabel">view image</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Image" class="img-fluid"
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
                    data: 'Id'
                },
                {
                    data: 'bannerName'
                },
                {
                    data: 'images',
                    render: function(data, type, row) {
                        if (row.images && row.imagesContentType) {
                            const imageUrl = `data:${row.imagesContentType};base64,${row.images}`;
                            return `
             <div style="text-align: center;">
                <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
                    view image
                </button>
                <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Self Photo">
            </div>
            `;
                        } else {
                            return '<p style="text-align: center;">No Image</p>';
                        }
                    }
                },
                {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data === 'enable') {
                                return `<div style="text-align: center;"><span class="badge badge-success">${data}</span></div>`;
                            } else if (data === 'disable') {
                                return `<div style="text-align: center;"><span class="badge badge-danger">${data}</span></div>`;
                            }
                        }
                    },

                {
                    data: 'links',
                    render: function(data, type, row) {
                        if (data) {
                            return `<a href="${data}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">${data}</a>`;
                        } else {
                            return '<p style="text-align: center;">none</p>';
                        }
                    }
                },
                {
                    data: 'id'
                },
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

            location.href = "{{ url('masterData/banner/edit') }}/" + data[index].id;
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
                        location.href = "{{ url('masterData/banner/delete') }}" + "/" + id;
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
                    url: "{{ url('masterData/banner/getIndex') }}/",
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
                        data: 'bannerName'
                    },
                    {
                        data: 'images',
                        render: function(data, type, row) {
                            if (row.images && row.imagesContentType) {
                                const imageUrl = `data:${row.imagesContentType};base64,${row.images}`;
                                return `
            <div style="text-align: center;">
                <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
                    view image
                </button>
                <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Self Photo">
            </div>
            `;
                            } else {
                                return '<p style="text-align: center;">No Image</p>';
                            }
                        }
                    },

                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data === 'enable') {
                                return `<div style="text-align: center;"><span class="badge badge-success">${data}</span></div>`;
                            } else if (data === 'disable') {
                                return `<div style="text-align: center;"><span class="badge badge-danger">${data}</span></div>`;
                            }
                        }
                    },
                    {
                        data: 'links',
                        render: function(data, type, row) {
                            if (data) {
                                return `<a href="${data}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">${data}</a>`;
                            } else {
                                return '<p style="text-align: center;">none</p>';
                            }
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
