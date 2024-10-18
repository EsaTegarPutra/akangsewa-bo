@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Product Description</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('product/description/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Product Name</label>
                                                <select id="productId" name="productId" class="form-select">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product['id'] }}">{{ $product['productName'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Product Description</label>
                                        <textarea class="form-control" name="descriptionValue" id="descriptionValue"></textarea>
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
    <script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize CKEditor on the description textarea
            CKEDITOR.replace('descriptionValue');
        });

        $('#btnSave').on('click', function() {
            var productId = $('#productId').val();
            var descriptionValue = CKEDITOR.instances.descriptionValue.getData(); // Get CKEditor content

            if (!productId) {
                $.alert({
                    title: 'Information',
                    content: 'Product Name cant be empty',
                });
            } else if (!descriptionValue) {
                $.alert({
                    title: 'Information',
                    content: 'Description cant be empty',
                });
            } else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
