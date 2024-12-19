@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="d-flex gap-2 mb-3">
                        <a href="" class="btn btn-primary btn-sm rounded shadow-md"><i class="ti-arrow-left"></i></a>
                        <h5 class="m-1">Detail Tracking</h5>
                    </div>

                    <!-- Progress Tracker -->
                    <div class="mb-4">
                        <h4 class="fw-bold">Tracking Delivery</h4>
                        <div class="d-flex justify-content-between text-muted small mb-1">
                            <span>Pending</span>
                            <span>On Progress</span>
                            <span>Completed</span>
                        </div>
                        <div class="progress" style="height: 20px; background-color: #f1f1f1; border-radius: 10px;">
                            <div class="progress-bar" id="progressBar"
                                style="width: 0%; border-radius: 10px; transition: width 0.5s; position: relative; background: linear-gradient(90deg, rgba(30,66,160,1) 0%, rgba(55,97,205,1) 50%, rgba(53,179,255,1) 100%);">
                                <span id="progressLabel"
                                    class="text-white"style="position: absolute; right: 10px; font-size: 12px; font-weight: 500;">0%</span>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="mb-3">
                        <h4 class="fw-bold">Information Tracking</h4>
                        <div class="row my-4">
                            <div class="col-md-6 mb-4">
                                <!-- Shipping Data -->
                                <div class="card shadow-md rounded-4 p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-secondary text-uppercase">Order ID : 00001</span>
                                        <i class="text-danger ti-alert"></i>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ti-location-arrow text-primary me-2"></i>
                                        <h6 class="m-0">Mamat Racing</h6>
                                        <span class="ms-2 text-muted">JNE Express</span>
                                        <span class="ms-auto text-muted">56 km</span>
                                    </div>
                                    <div class="mb-3">
                                        <div class="text-muted small d-flex align-items-center mb-1">
                                            <i class="ti-arrow-circle-up me-2 text-primary"></i>
                                            Kilimanjaro Ave. No. 13 Block M Grand Laguna Residential Jombang, East Java
                                            61125
                                        </div>
                                        <div class="text-muted small d-flex align-items-center">
                                            <i class="ti-location-pin me-2 text-primary"></i>
                                            Soekarno-Hatta Street No. 89 Block B Jati Kasih Residential Bogor, West Java
                                            66857
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <span class="text-muted small">2h 23m</span>
                                        <span class="text-muted small">.</span>
                                        <span class="text-muted small">34 km</span>
                                        <span class="text-muted small">.</span>
                                        <span class="small badge text-danger" style="background-color: #F9BAC4;">
                                            65 minutes late
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="card shadow-md rounded-4 p-3">
                                    <div class="d-flex justify-content-between">
                                        <div class=" d-flex gap-2">
                                            <h6 class="m-0 ">Mamat Racing</h6>
                                            <small class="text-muted">1 days ago</small>
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-sm btn-secondary p-2">
                                                <i class="ti-back-left" title="Reply"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p>Bang jangan lama lama ya.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Map Embed -->
                                <div class="card shadow-md rounded-4">
                                    <div class="card-body p-20">
                                        <iframe width="100%" height="300" style="border:0" loading="lazy"
                                            allowfullscreen
                                            src="https://www.google.com/maps?q=Kilimanjaro+Ave.+No.+13+Block+M+Grand+Laguna+Residential+Jombang,+East+Java+61125&output=embed">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- JavaScript to Simulate Progress -->
    <script>
        function updateProgress() {
            const progressBar = document.getElementById('progressBar');
            const progressLabel = document.getElementById('progressLabel');

            let progress = 0;
            const totalProgress = 100;

            // Update progress bar and label
            const timer = setInterval(() => {
                if (progress <= totalProgress) {
                    progressBar.style.width = `${progress}%`;
                    progressLabel.innerText = `${progress}%`;
                    progress++;
                } else {
                    clearInterval(timer);
                }
            }, 30); // Adjust the interval time as needed for smoother animation
        }

        document.addEventListener('DOMContentLoaded', updateProgress);
    </script>
@endsection
