@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                {{-- Header Info --}}
                <div class="box">
                    <div
                        class="box-header with-border d-flex flex-column flex-sm-row align-items-start justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i></button>
                            <div class="header-main-detail-order">
                                <div class="d-flex align-items-center gap-3">
                                    <h4 class="box-title title-order-id">Order ID: 999999</h4>
                                    <h4 class="mb-0 pe-none">|</h4>
                                    <span class="badge bg-success px-3 py-2 rounded-pill">Completed</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mt-3 mt-sm-0">
                            <button class="btn btn-sm btn-primary" onclick="exportInv()"><i class="ti-download"></i>
                                Export</button>
                            <h4 class="mb-0 mx-1 pe-none">|</h4>
                            <button class="btn btn-sm btn-primary">View Tracking</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="box">
                            <div class="box-body" style="padding: 1rem 1.2rem !important">
                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <h3 class="mt-1 mb-0 me-1"><i class="ti-id-badge"></i></h3>
                                    <h5 class="my-0 fw-bold">CUSTOMER & ORDER</h5>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Name</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">your
                                            name</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Email</div>
                                    <div class="col-7 text-secondary fw-bold">: <span
                                            class="fw-normal text-dark">name123@gmail.com</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Phone</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">(+62)
                                            8123456789</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Request date</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">20 Oct
                                            2024</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Completed date</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">24 Oct
                                            2024</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Rental Period</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">2
                                            days</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Shipping</div>
                                    <div class="col-7 text-secondary fw-bold">: <span class="fw-normal text-dark">J&T
                                            Exprezz</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-5 text-secondary fw-bold">Payment method</div>
                                    <div class="col-7 text-secondary fw-bold">: <span
                                            class="fw-normal text-dark">E-Wallet</span></div>
                                </div>

                                <hr>

                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <h4 class="mt-1 mb-0"><i class="ti-location-arrow"></i></h4>
                                    <h5 class="my-0 fw-bold">RETURN ADDRESS</h5>
                                </div>
                                <p class="mb-3">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Expedita
                                    repellat fugiat reiciendis magnam animi delectus.
                                </p>
                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <h4 class="mt-1 mb-0"><i class="ti-location-pin"></i></h4>
                                    <h5 class="my-0 fw-bold">SHIPPING ADDRESS</h5>
                                </div>
                                <p class="mb-0">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Expedita
                                    repellat fugiat reiciendis magnam animi delectus.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="box">
                            <div class="box-header" style="padding: 1rem 1.2rem !important">
                                <div class="d-flex align-items-center gap-1">
                                    <h3 class="mt-1 mb-0 me-1"><i class="ti-shopping-cart-full"></i></h3>
                                    <h5 class="my-0 fw-bold">PRODUCTS ORDERED</h5>
                                </div>
                            </div>
                            <div class="box-body" style="padding: 1rem 1.2rem !important">
                                <div class="table-responsive">
                                    <table id="lookup" class="table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th style="padding: .85rem">No</th>
                                                <th style="padding: .85rem">Product Name</th>
                                                <th style="padding: .85rem">Quantity</th>
                                                <th style="padding: .85rem">Price</th>
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
                                                <td>2</td>
                                                <td>2.500.000,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mt-3 mt-sm-0">
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <h4 class="mt-1 mb-0"><i class="ti-pencil-alt"></i></h4>
                                            <h5 class="my-0 fw-bold">CUSTOMER NOTES</h5>
                                        </div>
                                        <p class="mb-0 border border-info py-1 px-2 rounded-3"
                                            style="border-width: 1.5px !important">Lorem ipsum dolor sit amet
                                            consectetur, adipisicing elit. Dicta,
                                            adipisci.</p>
                                    </div>
                                    <div class="col-sm-8 mt-3 mt-sm-0">
                                        <div class="d-flex align-items-center gap-1 mb-2">
                                            <h4 class="mt-1 mb-0"><i class="ti-receipt"></i></h4>
                                            <h5 class="my-0 fw-bold">PAYMENT DETAILS</h5>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">Sub total products :</p>
                                            <p class="mb-0">Rp.9.000.000</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">Sub total shipping :</p>
                                            <p class="mb-0">Rp.15.000</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">Total price :</p>
                                            <p class="mb-0 text-secondary fs-5 fw-bold">Rp.9.015.000</p>
                                        </div>

                                        <hr style="margin: .8rem 0">

                                        <div class="row mb-2">
                                            <div class="col-5 col-lg-4 text-secondary fw-bold">Paid on</div>
                                            <div class="col-7 col-lg-8 text-secondary fw-bold">: <span
                                                    class="fw-normal text-dark">20 Oct 2024 10:01:11</span></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5 col-lg-4 text-secondary fw-bold">E-Wallet name</div>
                                            <div class="col-7 col-lg-8 text-secondary fw-bold">: <span
                                                    class="fw-normal text-dark">Gopay</span></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5 col-lg-4 text-secondary fw-bold">No. E-Wallet</div>
                                            <div class="col-7 col-lg-8 text-secondary fw-bold">: <span
                                                    class="fw-normal text-dark">08123456789</span></div>
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
    </section>
@endsection
@section('script')
    <script>
        function exportInv() {
            document.title = 'INV' + new Date().toISOString().split('T')[0];
            window.print();
        }
    </script>
@endsection
