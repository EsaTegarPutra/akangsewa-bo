@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update Product Image</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form"
                        action="{{ url('product/imageRepository/update/' . $productImage['id']) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <!-- Product Name -->
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <select id="productId" name="productId" class="form-select" required>
                                            <option value="" disabled>Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product['id'] }}"
                                                    {{ $product['id'] == $productImage['productId'] ? 'selected' : '' }}>
                                                    {{ $product['productName'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Attribute Values -->
                                    <div class="form-group">
                                        <label class="form-label">Attribute Value</label>
                                        <select id="attributeValuesId" name="attributeValuesId" class="form-select"
                                            required>
                                            <option value="" selected disabled>Select Attribute Value</option>
                                            @foreach ($attributeValues as $attributeValue)
                                                <option value="{{ $attributeValue['id'] }}"
                                                    {{ $attributeValue['id'] == $productImage['attributeValuesId'] ? 'selected' : '' }}>
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
                                                src="data:{{ $productImage['imagesProductContentType'] }};base64,{{ $productImage['imagesProduct'] }}"
                                                alt="Product Image"
                                                style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; aspect-ratio: 1 / 1; object-fit: cover; width: 100%; height: auto;" />

                                            <input type="hidden" name="existingImage" value="{{ $productImage['imagesProduct'] }}">
                                            <input type="hidden" name="existingImageContentType" value="{{ $productImage['imagesProductContentType'] }}">
                                            <input type="file" name="imagesProduct" id="imagesProduct"
                                                style="display: none;" accept="image/*"
                                                onchange="document.getElementById('image-result').src = window.URL.createObjectURL(this.files[0])" />

                                            <label for="imagesProduct" class="btn btn-primary"
                                                style="border-radius: 0 !important;">New File</label>

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
            var existingImage = $('input[name="existingImage"]').val();
            var existingImageContentType = $('input[name="existingImageContentType"]').val();

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
            } else if (!imagesProduct && !existingImage && !existingImageContentType) {
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
