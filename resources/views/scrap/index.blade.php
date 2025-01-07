@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Section Card -->
        <div class="row text-center mb-4">
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/digital.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="Komdigi" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/telkomsel.png') }}"
                        class="card-img-top img-fluid custom-img mb-3" alt="Telkomsel"
                        style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/indosat.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="Indosat" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/xl.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="XL" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto">Show Data</button>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="box">
            <div class="box-header with-border d-flex justify-content-between align-items-center">
                <h3 class="box-title">Data Scrap</h3>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead class="bg-info">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Identity No</th>
                                <th>Identity Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="imagePreviewLabel">Image Preview</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Scrap Image" class="img-fluid"
                        style="max-width: 100%; max-height: 100%;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openImageModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            var imageModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            imageModal.show();
        }

        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('masterData/scrapData/getIndex') }}",
                    type: "GET",
                    error: function() {
                        $(".dataTable-error").html("");
                        $("#dataTable").append(
                            '<tbody class="dataTable-error"><tr><th colspan="7" class="text-center">No data found in the server</th></tr></tbody>'
                        );
                        $("#dataTable_processing").css("display", "none");
                    }
                },
                columns: [{
                        data: 'id',
                        render: (data, type, row, meta) => meta.row + 1
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'type'
                    },
                    {
                        data: 'nik'
                    },
                    {
                        data: 'pathIdentity',
                        targets: [5], // Target kolom untuk 'Images'
                        createdCell: function(td, cellData, rowData, row, col) {
                            if (cellData) {
                                const imageUrl = `http://103.127.136.166:8991${cellData}`;
                                $(td).html(`
                        <div style="text-align: center;">
                            <button class="btn btn-info btn-sm" onclick="openImageModal('${imageUrl}')">
                                Preview Image
                            </button>
                            <img src="${imageUrl}" style="display: none; max-width: 100px; max-height: 100px; object-fit: contain;" alt="Product Image">
                        </div>
                    `);
                            } else {
                                $(td).html('<p class="text-center">No Image</p>');
                            }
                        },
                        orderable: false
                    },
                    {
                        data: 'id',
                        render: (data) =>
                            `<a href="scrapData/details/${data}" class="btn btn-primary btn-sm">Detail</a>`
                    }
                ]
            });
        });
    </script>
@endsection
