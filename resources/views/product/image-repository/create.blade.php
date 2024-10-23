@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Product Image</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('product/imageRepository/store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <!-- Product Name -->
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <select id="productId" name="productId" class="form-select" required>
                                            <option value="" selected disabled>Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product['id'] }}">{{ $product['productName'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Attribute Values (Jika ada) -->
                                    <div class="form-group">
                                        <label class="form-label">Attribute Value</label>
                                        <select id="attributeValuesId" name="attributeValuesId" class="form-select"
                                            required>
                                            <option value="" selected disabled>Select Attribute Value</option>
                                            @foreach ($attributeValues as $attributeValue)
                                                <!-- Assuming $attributeValues is passed from controller -->
                                                <option value="{{ $attributeValue['id'] }}">
                                                    {{ $attributeValue['valuesAttribute'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Product Image Upload -->
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="form-label">Product Image</label>
                                        <div class="d-flex flex-column">
                                            <img id="image-result"
                                                style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; border-bottom-style: none !important; aspect-ratio: 1 / 1; background-position: center; object-fit: cover;" />

                                            <input type="file" name="imagesProduct" id="imagesProduct"
                                                style="display: none;" accept="image/*" required
                                                onchange="document.getElementById('image-result').src = window.URL.createObjectURL(this.files[0])" />

                                            <label for="imagesProduct" class="btn btn-primary"
                                                style="border-radius: 0 !important;">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Buttons -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('product/imageRepository') }}" type="button"
                                class="btn btn-danger btn-sm me-1">
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
        $(document).ready(function() {

        });

        $('#btnSave').on('click', function() {
            var productId = $('#productId').val();
            var attributeValuesId = $('#attributeValuesId').val();
            var imagesProduct = $('#imagesProduct').val();

            if (!productId) {
                $.alert({
                    title: 'Information',
                    content: 'Product Name can\'t be empty',
                });
            } else if (!attributeValuesId) {
                $.alert({
                    title: 'Information',
                    content: 'Attribute Value can\'t be empty',
                });
            } else if (!imagesProduct) {
                $.alert({
                    title: 'Information',
                    content: 'Product Image can\'t be empty',
                });
            } else {
                $('#fSubmit').submit(); // Submit the form if all fields are filled
            }
        });
    </script>
@endsection
