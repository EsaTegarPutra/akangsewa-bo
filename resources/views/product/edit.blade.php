@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Product</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('product/master/update/' . $product['id']) }}"
                        method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Product Name</label>
                                                <input class="form-control" name="productName" id="productName" type="text" value="{{ $product['productName'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Category</label>
                                                <select id="categoryId" name="categoryId" class="form-select">
                                                    <option value="" disabled>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category['id'] }}" {{ $category['id'] == $product['categoryId'] ? 'selected' : '' }}>
                                                            {{ $category['categoryName'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Price</label>
                                                <input class="form-control" name="price" id="price" type="number" value="{{ $product['price'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Availability Status</label>
                                                <select id="avabilityStatus" name="avabilityStatus" class="form-select">
                                                    <option value="true" {{ $product['avabilityStatus'] === "true" ? 'selected' : 'Eanble' }}>Enable</option>
                                                    <option value="false" {{ $product['avabilityStatus'] === "false" ? 'selected' : 'Disable' }}>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('product/master') }}" type="button" class="btn btn-danger btn-sm me-1">
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
            var productName = $('#productName').val();
            var price = $('#price').val();
            var categoryId = $('#categoryId').val();
            var avabilityStatus = $('#avabilityStatus').val();

            if (!productName) {
                $.alert({
                    title: 'Information',
                    content: 'Product Name cant empty',
                });
            } else if (!price) {
                $.alert({
                    title: 'Information',
                    content: 'Price cant empty',
                });
            } else if (!categoryId) {
                $.alert({
                    title: 'Information',
                    content: 'Category cant empty',
                });
            } else if (!avabilityStatus) {
                $.alert({
                    title: 'Information',
                    content: 'avabilityStatus cant empty',
                });
            } else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
