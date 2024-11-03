@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title">Pending Order</h3>
                        
                    </div>
                    {{-- contoh view pending order --}}
                    <div class="box-body">
                        <div class="table-responsive ">
                            <table class="table" id="lookup">
                                <thead class="bg-info">    
                                    <tr>
                                        <th>No</th>
                                        <th>order Id</th>
                                        <th>product variant</th>
                                        <th>price</th>
                                        <th>days</th>
                                        <th>status</th>
                                        <th>created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>010101</td>
                                        <td>Panasonic Professional Camera Recorder <br>
                                            SONY MHC-M40D High Power Audio System
                                        </td>
                                        <td>Rp 2,500,000.00 <br>
                                            Rp 1,500,999.00
                                        </td>
                                        <td>29/10/2024</td>
                                        <td><button class="btn btn-sm btn-rounded btn-danger">pending</button></td>
                                        <td>2024-10-25T09:47:28Z</td>
                                        <td><a href="{{ url('order/detailOrder') }}" class="btn btn-warning">detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var table = $("#lookup").dataTable({
            columns: 
            [
                { data: 'id' },
                { data: 'orderId' },
                { data: 'productVariant' },
                { data: 'price' },
                { data:'days' },
                { data: 'status' },
                { data: 'createdAt' },
                { data: 'action' },
            ],
        });

        $(document).ready(function() {
            loadData();
        });

    </script>
@endsection