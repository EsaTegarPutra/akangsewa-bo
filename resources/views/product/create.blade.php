@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Product</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('product/master/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Product Name</label>
                                                <input class="form-control" name="productName" id="productName" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Category</label>
                                                <select id="categoryId" name="categoryId" class="form-select">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category['id']}}">{{$category['categoryName']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Price</label>
                                                <input class="form-control" name="price" id="price" type="number">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">avabilityStatus</label>
                                                <select id="avabilityStatus" name="avabilityStatus" class="form-select">
                                                    <option value="" selected disabled></option>
                                                    <option value="true">Enable</option>
                                                    <option value="false">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('product') }}" type="button" class="btn btn-danger btn-sm me-1">
                                <i class="ti-close"></i> Cancel
                            </a>
                            <a href="javascript:void(0)" id="btnSave" class="btn btn-info btn-sm">
                                <i class="ti-save"></i> Save
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
