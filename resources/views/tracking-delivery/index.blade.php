@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="d-flex gap-2 mb-3">
                        <a href="" class="btn btn-outline-secondary btn-sm rounded shadow-sm"><i
                                class="ti-arrow-left"></i></a>
                        <h5 class="m-1">Order ID : 00001</h5>
                    </div>

                    <!-- Progress Tracker -->
                    <div class="mb-4">
                        <h4 class="fw-bold">Tracking Delivery</h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Pending</span>
                            <span class="text-muted">On Progress</span>
                            <span class="text-muted">Completed</span>
                        </div>
                        <div class="progress" style="height: 20px; border-radius: 0; background-color: #e0e0e0;">
                            <div class="progress-bar bg-primary" id="progressPending"
                                style="width: 0%; border-radius: 0; transition: width 0.5s;">
                                <span id="pendingLabel" class="text-white"
                                    style="font-size: 12px; font-weight: 500;"></span>
                            </div>
                            <div class="progress-bar bg-warning" id="progressOnProgress"
                                style="width: 0%; border-radius: 0; transition: width 0.5s;">
                                <span id="onProgressLabel" class="text-white"
                                    style="font-size: 12px; font-weight: 500;"></span>
                            </div>
                            <div class="progress-bar bg-success" id="progressCompleted"
                                style="width: 0%; border-radius: 0; transition: width 0.5s;">
                                <span id="completedLabel" class="text-white"
                                    style="font-size: 12px; font-weight: 500;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-6 mb-4">
                            <!-- Shipping Data -->
                            <div class="card shadow-sm rounded-4 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-secondary text-uppercase">00001</span>
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
                                        Kilimanjaro Ave. No. 13 Block M Grand Laguna Residential Jombang, East Java 61125
                                    </div>
                                    <div class="text-muted small d-flex align-items-center">
                                        <i class="ti-location-pin me-2 text-primary"></i>
                                        Soekarno-Hatta Street No. 89 Block B Jati Kasih Residential Bogor, West Java 66857
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-2">
                                    <span class="text-muted small">2h 23m</span>
                                    <span class="text-muted small">.</span>
                                    <span class="text-muted small">34 km</span>
                                    <span class="text-muted small">.</span>
                                    <span class="text-danger small">65 minutes late</span>
                                </div>
                            </div>
                            <div class="card shadow-sm rounded-4 p-3">
                                <div class="d-flex justify-content-between">
                                    <div class=" d-flex gap-2">
                                        <h6 class="m-0 fw-bold">Mamat Racing</h6>
                                        <small class="text-muted">1 days ago</small>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-secondary p-1">
                                            <i class="ti-back-left" title="Reply"></i>
                                        </button>
                                    </div>
                                </div>
                                <p>Bang jangan lama lama ya.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Map Embed -->
                            <div class="card shadow-sm rounded-4">
                                <div class="card-body p-0">
                                    <iframe width="100%" height="300" style="border:0" loading="lazy" allowfullscreen
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
@endsection

@section('script')
    <!-- JavaScript to Simulate Progress -->
    <script>
        function updateProgress() {
            let pendingWidth = 33; // 33% for Pending
            let onProgressWidth = 33; // 33% for On Progress
            let completedWidth = 34; // 34% for Completed

            // Select elements
            let progressPending = document.getElementById('progressPending');
            let progressOnProgress = document.getElementById('progressOnProgress');
            let progressCompleted = document.getElementById('progressCompleted');

            let pendingLabel = document.getElementById('pendingLabel');
            let onProgressLabel = document.getElementById('onProgressLabel');
            let completedLabel = document.getElementById('completedLabel');

            let pendingProgress = 0;
            let onProgressProgress = 0;
            let completedProgress = 0;

            // Animate each section's progress
            let timer = setInterval(() => {
                if (pendingProgress < pendingWidth) {
                    pendingProgress++;
                    progressPending.style.width = `${pendingProgress}%`;
                    pendingLabel.innerText = `${pendingProgress}%`;
                } else if (onProgressProgress < onProgressWidth) {
                    onProgressProgress++;
                    progressOnProgress.style.width = `${onProgressProgress}%`;
                    onProgressLabel.innerText = `${onProgressProgress + 33}%`;
                } else if (completedProgress < completedWidth) {
                    completedProgress++;
                    progressCompleted.style.width = `${completedProgress}%`;
                    completedLabel.innerText = `${completedProgress + 66}%`;
                } else {
                    clearInterval(timer);
                }
            }, 30);
        }

        document.addEventListener('DOMContentLoaded', updateProgress);
    </script>
@endsection
