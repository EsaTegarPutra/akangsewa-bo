@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Shipping</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('masterData/tenantShipping/update/' . $shipping['id']) }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Shipping Name</label>
                                        <input class="form-control" name="shippingName" id="shippingName" value="{{ $shipping['shippingName'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Shipping Type</label>
                                        <input class="form-control" name="shippingType" id="shippingType" value="{{ $shipping['shippingType'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Shipping Price</label>
                                        <input class="form-control" name="shippingPrice" id="shippingPrice" type="number" value="{{ $shipping['shippingPrice'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select id="status" name="status" class="form-select">
                                            <option value="true" {{ $shipping['status'] === "true" ? 'selected' : 'Eanble' }}>Enable</option>
                                            <option value="false" {{ $shipping['status'] === "false" ? 'selected' : 'Disable' }}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('masterData/tenantShipping') }}" type="button" class="btn btn-danger btn-sm me-1">
                                <i class="ti-close"></i> Cancel
                            </a>
                            <a href="javascript:void(0)" id="btnSave" class="btn btn-info btn-sm">
                                <i class="ti-save-alt"></i> Save
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('#btnSave').on('click', function() {
            var shippingName = $('#shippingName').val();
            var shippingPrice = $('#shippingPrice').val();
            var shippingType = $('#shippingType').val();
            var status = $('#status').val();

            if (!shippingName) {
                $.alert({
                    title: 'Information',
                    content: 'Category Name cant empty',
                });
            } else if (!shippingPrice) {
                $.alert({
                    title: 'Information',
                    content: 'Category Name cant empty',
                });
            } else if (!shippingType) {
                $.alert({
                    title: 'Information',
                    content: 'Category Name cant empty',
                });
            } else if (!status) {
                $.alert({
                    title: 'Information',
                    content: 'Status cant empty',
                });
            } else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
