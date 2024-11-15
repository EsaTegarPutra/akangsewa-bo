@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="d-flex justify-content-between">
                <h5 class="card-header fw-bold">Status: <br><button class="btn btn-danger btn-rounded btn-sm">Pending</button>
                </h5>
                <h5 class="card-header fw-bold"><br>
                    <button class="btn btn-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>
                        Print
                    </button>
                    <a href="" class="btn btn-dark d-flex gap-1"><i class="ti-reload p-1"></i>Process</a>
                </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around">
                    <p class="fs-5 fw-bold">Request Date:</p>
                    <p class="fs-5 fw-bold">Rental Date:</p>
                    <p class="fs-5 fw-bold">Rental Period:</p>
                </div>
                <div class="d-flex justify-content-around">
                    <p class="fs-6">01/11/2024</p>
                    <p class="fs-6">10/11/2024</p>
                    <p class="fs-6">15/11/2024</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body ">
                        <p class="fs-5 fw-bold">Customer Information</p>
                        <div class="d-flex justify-content-between ">
                            <div class="">
                                <p class="text-primary">Name</p>
                                <p class="text-primary">E-mail</p>
                                <p class="text-primary">Phone</p>
                                <p class="text-primary">Company Name</p>
                                <p class="text-primary">identity Number</p>
                                <p class="text-primary">Date of Birth</p>
                                <p class="text-primary">Payment Method</p>
                            </div>
                            <div class="">
                                <p class="">: tatang</p>
                                <p class="">: tatang@gmail.com</p>
                                <p class="">: 08********</p>
                                <p class="">: -</p>
                                <p class="">: 317**********</p>
                                <p class="">: **/**/****</p>
                                <p class="">: Transfer-Bank</p>
                            </div>
                        </div><br>
                        {{-- <div class="border-bottom">
                            <p class="fs-5 fw-bold">Customer Note:</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, laborum.</p>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="fs-5 fw-bold">Product Order</p>
                        <table class="table table-hover">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Panasonic Professional Camera Recorder</td>
                                    <td>1</td>
                                    <td>Rp 2,500,000.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>SONY MHC-M40D High Power Audio System</td>
                                    <td>1</td>
                                    <td>Rp 1,500,999.00</td>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div class="p-3">
                                <p class="text-primary">Subtotal untuk Produk </p>
                                <p class="text-primary">biaya layanan </p>
                                <p class="text-primary">biaya penanganan </p>
                                <p class="fs-5 fw-bold">Total Pembayaran</p>
                            </div>
                            <div class="p-3">
                                <p>Rp 4,000,999.00 </p>
                                <p>Rp 500,000.00 </p>
                                <p>Rp 1,000,000.00 </p>
                                <p class="fs-5 fw-bold">Rp 5,500,999.00 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around">
                    <p class="fs-5 fw-bold">Rental Address</p>
                    <p class="fs-5 fw-bold">Shipping Address</p>
                </div>
                <div class="d-flex justify-content-around">
                    <p>123 Rental Street, Downtown, Cityville</p>
                    <p>789 Resident Lane, Uptown, Cityville</p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
