@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Section Card -->
        <div class="row text-center mb-4">
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/digital.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="Komdigi" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto" onclick="loadData('Komdigi')">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/telkomsel.png') }}"
                        class="card-img-top img-fluid custom-img mb-3" alt="Telkomsel"
                        style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto" onclick="loadData('TELKOMSEL')">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/indosat.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="Indosat" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto" onclick="loadData('INDOSAT')">Show Data</button>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-3">
                <div class="card p-3 shadow-sm d-flex flex-column h-250">
                    <img src="{{ asset('assets/images/path/xl.png') }}" class="card-img-top img-fluid custom-img mb-3"
                        alt="XL" style="height: 150px; object-fit: contain;">
                    <button class="btn btn-primary mt-auto" onclick="loadData('XL')">Show Data</button>
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
        let dataTableInstance; // Variabel global untuk menyimpan instance DataTable

        $(document).ready(function() {
            dataTableInstance = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/masterData/scrapData/getIndex') }}", // Default URL
                    type: "GET",
                    error: function() {
                        $(".dataTable-error").html("");
                        $("#dataTable").append(
                            '<tbody class="dataTable-error"><tr><th colspan="6" class="text-center">No data found in the server</th></tr></tbody>'
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
                        data: 'id',
                        render: (data) =>
                            `<a href="scrapData/details/${data}" class="btn btn-primary btn-sm">Detail</a>`
                    }
                ]
            });
        });

        function loadData(type) {
            let newUrl;

            if (type === "Komdigi") {
                newUrl = `{{ url('/masterData/scrapData/getIndex') }}`; // API untuk Komdigi
            } else {
                newUrl = `{{ url('/masterData/scrapData/getByType/') }}/${type}`; // API untuk Telkomsel, XL, Indosat
            }

            console.log("Loading data for type:", type, "URL:", newUrl);

            if (dataTableInstance) {
                dataTableInstance.ajax.url(newUrl).load(); // Ganti URL dan reload DataTable
            } else {
                console.error("DataTable belum diinisialisasi!");
            }
        }
    </script>
@endsection
