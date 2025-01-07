@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white text-center">
                            <h2>Details Data: {{ $scrap['name'] }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <!-- Image Section -->
                                <div class="col-md-6 d-flex justify-content-center align-items-center">
                                    @if ($scrap['pathIdentity'])
                                        <img src="http://103.127.136.166:8991{{ $scrap['pathIdentity'] }}" 
                                            alt="{{ $scrap['name'] }}'s Identity"
                                            class="img-fluid rounded shadow"
                                            style="max-width: 100%; max-height: 300px; object-fit: cover;   ">
                                    @else
                                        <p class="text-center text-muted">No Image Available</p>
                                    @endif
                                </div>
                                <!-- Data Section -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-3">
                                            <p class="fw-bold">Name</p>
                                            <p class="fw-bold">NIK</p>
                                            <p class="fw-bold">Provider</p>
                                            <p class="fw-bold">Phone</p>
                                        </div>
                                        <div class="col-9">
                                            <p>: {{ $scrap['name'] }}</p>
                                            <p>: {{ $scrap['nik'] }}</p>
                                            <p>: {{ $scrap['type'] }}</p>
                                            <p>: {{ $scrap['phone'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Last updated on: {{ date('d-m-Y H:i:s') }}</small>
                                <a href="{{ url('masterData/scrapData') }}" class="btn btn-secondary btn-sm">
                                Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Optional: You can add some JavaScript here if needed
    </script>
@endsection
