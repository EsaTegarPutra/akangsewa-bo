@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="d-flex justify-content-between">
                <h4 class="card-header fw-bold">Order Id: 010101</h4>
                <h5 class="card-header fw-bold">Status: <br><button class="btn btn-danger btn-rounded btn-sm">Pending</button></h5>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class=" fw-bold">alamat Penyewa</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, rem quae. Eos maxime,
                        dolorem
                        reprehenderit quis, unde magni consequuntur sapiente facere nemo quam ea sequi at! Quam
                        corporis velit
                        explicabo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">                      
                        <h4 class="fw-bold">Detail Penyewaan</h4>
                        <table class="table table-hover">
                            <thead>
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
                        <div class="border-bottom">
                            <h5 class="fw-bold">pesan customer:</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, laborum.</p>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">Periode penyewaan:</h5>
                            <p class="">29 Oktober 2024 - 1 November 2024</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">total pesanan:</h5>
                            <p class="">Rp 4,000,999.00 </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">Metode Pembayaran</h5>
                            <p class="">Transfer-Bank</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="ti-receipt fw-bold">Rincian Pembayaran</h4>
                        <div class="d-flex justify-content-between">
                            <div class="p-3 ">
                                <p>Subtotal untuk Produk </p>
                                <p>biaya layanan </p>
                                <p>biaya penanganan </p>
                                <p>biaya layanan </p>
                                <h4 class="fw-bold">Total Pembayaran</h4>
                            </div>
                            <div class="p-3">
                                <p>Rp 4,000,999.00 </p>
                                <p>Rp 500,000.00 </p>
                                <p>Rp 1,000,000.00 </p>
                                <p>Rp 1,000,000.00 </p>
                                <h4 class="fw-bold">Rp 6,500,999.00 </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>


        <div class="card">
            <div class="d-grid gap-2">
                <button class="btn btn-warning ">on going</button>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
