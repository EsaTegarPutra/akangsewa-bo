@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                {{-- Header Info --}}
                <div class="box">
                    <div class="box-header with-border d-flex flex-column flex-sm-row align-items-start justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-sm btn-light">&#x25c0;</button>
                            <div class="header-main-detail-order">
                                <div class="d-flex align-items-center gap-3">
                                    <h3 class="box-title title-order-id">Detail Order ID: 999999</h3>
                                    <h4 class="mb-0">|</h4>
                                    <div class="bg-success fs-6 text-white px-10 py-1 rounded-pill">Completed</div>
                                </div>
                                <p class="mt-8 mb-0">28 Oct 2024 10:01:11</p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-info"><i class="ti-save"></i> Export</button>
                    </div>
                    <div class="box-body">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <p class="fs-4 mb-0 fw-bold">Customer</p>
                                    <p class="mb-0 text-secondary fw-bold">Name : <span
                                            class="fw-normal text-dark">name123</span></p>
                                    <p class="mb-0 text-secondary fw-bold">Email : <span
                                            class="fw-normal text-dark">name123@gmail.com</span></p>
                                    <p class="mb-0 text-secondary fw-bold">Phone : <span
                                            class="fw-normal text-dark">08123456789</span></p>
                                    <p class="mb-0 text-secondary fw-bold">Address &#9663;</p>
                                    <p class="mb-0 text-dark">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Expedita
                                        repellat fugiat reiciendis magnam animi delectus labore at? Laboriosam
                                    </p>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <div
                                        class="history-status d-flex flex-column justify-content-center align-items-center">
                                        <p class="fs-4 mb-3 fw-bold">History Status</p>
                                        <div class="container steps-container mb-1">
                                            <div
                                                class="steps d-flex justify-content-between padding-top-2x padding-bottom-1x">
                                                <div class="step completed">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon">&#x2713;</div>
                                                    </div>
                                                    <h4 class="step-title">Pending</h4>
                                                    <p class="mb-0 text-secondary step-time">25 Oct 2024</p>
                                                </div>
                                                <div class="step completed">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon">&#x2713;</div>
                                                    </div>
                                                    <h4 class="step-title">Ongoing</h4>
                                                    <p class="mb-0 text-secondary step-time">25 Oct 2024</p>
                                                </div>
                                                <div class="step completed">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon">&#x2713;</i></div>
                                                    </div>
                                                    <h4 class="step-title">Completed</h4>
                                                    <p class="mb-0 text-secondary step-time">28 Oct 2024</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Detail Product Info --}}
                <div class="box mt-5">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8 col-lg-9">
                                <p class="fs-4 mb-2 fw-bold">Products</p>
                                <div class="table-responsive">
                                    <table id="lookup" class="table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Sony Sound System</td>
                                                <td>2</td>
                                                <td>2.000.000,00</td>
                                                <td>24 Oct 2024 10:52:16</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Canon Camera Profesional</td>
                                                <td>2</td>
                                                <td>2.500.000,00</td>
                                                <td>24 Oct 2024 10:52:16</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 d-flex flex-column mt-4 mt-md-0">
                                <p class="fs-4 mb-2 fw-bold">Customer Notes
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </p>
                                <p class="mb-0 border border-5 border-info py-1 px-2 rounded-3">Lorem ipsum dolor sit amet
                                    consectetur, adipisicing elit. Dicta,
                                    adipisci.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Detail Order Info --}}
                <div class="row mt-5">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="box">
                            <div class="box-body">

                                <h4 class="mb-1 fw-bold">Order Info</h4>
                                <p class="mb-0 text-secondary fw-bold">Rental Period :
                                    <span class="fw-normal text-dark">
                                        2 days
                                    </span>
                                </p>
                                <p class="mb-0 text-secondary fw-bold">Shipping :
                                    <span class="fw-normal text-dark">J&T Exprezz</span>
                                </p>
                                <p class="mb-0 text-secondary fw-bold">Payment method :
                                    <span class="fw-normal text-dark">
                                        E-Wallet
                                    </span>
                                </p>
                                <p class="mb-0 text-secondary fw-bold">Status :
                                    <span class="fw-normal text-dark">
                                        Completed
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="box">
                            <div class="box-body">

                                <h4 class="mb-1 fw-bold">Payment Info</h4>
                                <p class="mb-0 text-secondary fw-bold">Paid on :
                                    <span class="fw-normal text-dark">25 Oct 2024 10:01:11</span>
                                </p>
                                <p class="mb-0 text-secondary fw-bold">E-Wallet name :
                                    <span class="fw-normal text-dark">Gopay</span>
                                </p>
                                <p class="mb-0 text-secondary fw-bold">No. E-Wallet :
                                    <span class="fw-normal text-dark">08123456789</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="box">
                            <div class="box-body">
                                <h4 class="mb-1 fw-bold">Total Payment</h4>
                                <p class="mb-0">Sub total products : Rp.1.998.000</p>
                                <p class="mb-0">Sub total shipping : Rp.15.000</p>
                                <p class="mb-1 d-flex align-items-center gap-1">Total price :
                                    <span class="fs-5 fw-bold text-secondary my-0">Rp.2.013.000</span>
                                </p>
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
@endsection
