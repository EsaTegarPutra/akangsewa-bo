@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row my-4">
                <div class="col-md-12">
                    <div class="d-flex gap-2 mb-3">
                        <a href="" class="btn btn-primary btn-sm rounded shadow-sm  "><i class="ti-arrow-left"></i></a>
                        <h4 class="m-1">Detail Progress</h4>
                    </div>
                    <div class="card shadow-sm rounded-lg">
                        <div class="card-body">
                            <!-- Order Header and Status -->
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                                <!-- Order Title and Status -->
                                <div class="d-flex align-items-center gap-2 mb-2 mb-md-0">
                                    <h4 class="m-0">Order ID : 00001 <span>|</span></h4>
                                    <span class="badge bg-secondary text-light px-3 py-2">On Going</span>
                                </div>
                                <!-- Action Buttons -->
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-secondary btn-sm px-3 shadow-sm">More</button>
                                    <button class="btn btn-primary btn-sm px-3 shadow-sm">
                                        <i class="ti-export"></i> Invoice
                                    </button>
                                    <button class="btn btn-success btn-sm px-3 shadow-sm" disabled>
                                        <i class="ti-check-box"></i> Completed
                                    </button>
                                </div>
                            </div>

                            <!-- Order Details -->
                            <div class="row text-center text-md-start">
                                <div class="col-6 col-md-3 mb-3">
                                    <p class="m-0 fw-bold">Requets on :</p>
                                    <p class="m-0 text-muted">17 Aug 1945, 12:59</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <p class="m-0 fw-bold">Placed on :</p>
                                    <p class="m-0 text-muted">17 Aug 1945, 12:59</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <p class="m-0 fw-bold">Rental Date :</p>
                                    <p class="m-0 text-muted">4 days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Tracker -->
                    <div class="mb-4">
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
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card p-3 shadow-sm" style="max-width: 400px; border-radius: 10px;">
                                <h6 class="text-uppercase fw-bold">Customer & Order</h6>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">Name</div>
                                    <div class="col-7">: Mamat Racing</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">Email</div>
                                    <div class="col-7">: ananancy@mail.com</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">Phone</div>
                                    <div class="col-7">: +79703000</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">PO</div>
                                    <div class="col-7">: 77399999</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">Payment Terms</div>
                                    <div class="col-7">: Net 30</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 fw-bold">Delivery Method</div>
                                    <div class="col-7">: Embarcadero North</div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <h6 class="text-uppercase fw-bold">RETURN ADDRESS</h6>
                                    <div>
                                        <p>Kilimanjaro Ave. No. 13 Block M Grand Laguna Residential Jombang, East Java
                                            61125,
                                            Indonesia</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-uppercase fw-bold">SHIPPING ADDRESS</h6>
                                    <div>
                                        <p>Soekarno-Hatta Street No. 89 Block B Jati Kasih Residential Bogor, West Java
                                            66857,
                                            Indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header with-border d-flex justify-content-start align-items-center p-3">
                                    <i class="ti-shopping-cart-full fs-3"></i>
                                    <h3 class="box-title">Products Ordered</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive mb-2">
                                        <table id="lookup" class="table">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item Name</th>
                                                    <th>Quatity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Sony Sound System</td>
                                                    <td>2</td>
                                                    <td>2.000.000,00</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Canon Camera Profesional</td>
                                                    <td>1</td>
                                                    <td>2.500.000,00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="mb-2">
                                        <h5 class="fw-bold mb-3">Payment Details</h5>

                                        <!-- Subtotal Harga Produk -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Product Subtotal</span>
                                            <span>Rp 1.000.000</span>
                                        </div>

                                        <!-- Biaya Layanan -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Service Fee</span>
                                            <span>Rp 50.000</span>
                                        </div>

                                        <!-- Biaya Penanganan -->
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Handling Fee</span>
                                            <span>Rp 20.000</span>
                                        </div>

                                        <hr class="my-3">

                                        <!-- Total Pembayaran -->
                                        <div class="d-flex justify-content-between">
                                            <h5 class="fw-bold">Total Payment </h5>
                                            <h5 class="fw-bold">Rp 1.070.000</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
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
