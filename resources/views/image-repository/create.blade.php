@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-4">
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
                                <!-- Product Variant -->
                                <div class="form-group">
                                    <label class="form-label">Product Variant</label>
                                    <select id="productVariantId" name="productVariantId" class="form-select" required>
                                        <option value="" selected disabled>Select Product Variant</option>
                                        @foreach ($productVariants as $productVariant)
                                            <option value="{{ $productVariant['id'] }}">
                                                {{ $productVariant['variantName'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Product Image Upload -->
                                <div class="form-group mb-0">
                                    <label class="form-label">Product Image</label>
                                    <div class="d-flex flex-column">
                                        <img id="image-result"
                                            style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; border-bottom-style: none !important; aspect-ratio: 1 / 1; background-position: center; object-fit: cover;" />

                                        <input type="file" name="imagesProduct" id="imagesProduct" style="display: none;"
                                            accept="image/*" required
                                            onchange="document.getElementById('image-result').src = window.URL.createObjectURL(this.files[0])" />

                                        <label for="imagesProduct" class="btn btn-primary"
                                            style="border-radius: 0 !important;">Choose File</label>
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
            var productVariantId = $('#productVariantId').val();
            var imagesProduct = $('#imagesProduct').val();

            if (!productVariantId) {
                $.alert({
                    title: 'Information',
                    content: 'Product Variant can\'t be empty',
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
