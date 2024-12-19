@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section with Title and Action Buttons -->
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                    <h3 class="">Delivery Order</h3>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm px-3 shadow-sm">More</button>
                        <button class="btn btn-primary btn-sm px-3 shadow-sm">
                            <i class="bi bi-file-earmark-arrow-down"></i> Export Tracking
                        </button>
                    </div>
                </div>

                <!-- Statistic Cards -->
                <div class="row g-3">
                    <!-- Today's Delivery -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="ti-truck fs-3"></i>
                                <h6 class="ms-2 mb-0">Today's Delivery</h6>
                            </div>
                            <h3 class="">127 Orders</h3>
                            <p class="text-success small">+150% vs past month</p>
                        </div>
                    </div>

                    <!-- Monthly Delivery -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="ti-package fs-3" style="color: #6f42c1;"></i>
                                <h6 class="ms-2 mb-0">Monthly Delivery</h6>
                            </div>
                            <h3 class="">3289 Orders</h3>
                            <p class="text-success small">+150% vs past month</p>
                        </div>
                    </div>

                    <!-- Delivery Issue -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="ti-alert fs-3" style="color: #20c997;"></i>
                                <h6 class="ms-2 mb-0">Delivery Issue</h6>
                            </div>
                            <h3 class="">10 Reports</h3>
                            <p class="text-success small">+150% vs past month</p>
                        </div>
                    </div>

                    <!-- Total Delivery -->
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-4 p-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="ti-calendar fs-3" style="color: #fd7e14;"></i>
                                <h6 class="ms-2 mb-0">Total Delivery</h6>
                            </div>
                            <h3 class="">12853 Orders</h3>
                            <p class="text-success small">+150% vs past month</p>
                        </div>
                    </div>
                </div>

                <!-- Delivery Report Tabs -->
                <div class="mb-3">
                    <h4 class="">Delivery Report</h4>
                    <ul class="nav nav-tabs border-0">
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">All Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">On Progress Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">Successful</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">On Hold Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">Canceled Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted border-0" href="#">Refund / Reported</a>
                        </li>
                    </ul>
                    <hr>
                </div>
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2 flex-grow-1">
                                <h4 class="m-0">JNE Express <span>|</span></h4>
                                <span class="text-muted">EXP-00001</span>
                            </div>
                            <!-- Action Buttons -->
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-danger btn-sm px-3 shadow-sm">
                                    <i class="ti-close"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="row my-4">
                                <div class="col-md-6 mb-4">
                                    <!-- Shipping Data -->
                                    <div class="card shadow-sm rounded-4 p-3">
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
                                                <h6 class="m-0 ">Mamat Racing</h6>
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
        </div>
    </div>
@endsection
