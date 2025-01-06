@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Banner</h1>
        <form id="fSubmit" class="form" action="{{ url('masterData/banner/update/' . $bannerImage['id']) }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <!-- Row untuk input nama banner dan link -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Banner Name</label>
                    <input type="text" class="form-control" id="bannerName" name="bannerName"
                        value="{{ $bannerImage['bannerName'] }}">
                </div>
            </div>

            {{-- image --}}
            <div class="form-group mb-0">
                <label class="form-label">Image</label>
                <div class="d-flex flex-column">
                    <img id="image-result" src="data:{{ $bannerImage['imagesContentType'] }};base64,{{ $bannerImage['images'] }}"
                        alt="images"
                        style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; aspect-ratio: 1 / 1; object-fit: cover; width: 100%; height: auto;" />

                    <input type="hidden" name="existingImage" value="{{ $bannerImage['images'] }}">
                    <input type="hidden" name="existingImageContentType" value="{{ $bannerImage['imagesContentType'] }}">
                    <input type="file" name="images" id="images" style="display: none;" accept="image/*"
                        onchange="document.getElementById('image-result').src = window.URL.createObjectURL(this.files[0])" />

                    <label for="images" class="btn btn-primary" style="border-radius: 0 !important;">New File</label>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" id="bannerName" name="bannerName"
                                    value="{{ $bannerImage['bannerName'] ?? '' }}">
                                <select id="status" name="status" class="form-select">
                                    <option value="enable" {{ $bannerImage['status'] ? 'selected' : '' }}>Enable</option>
                                    <option value="disable" {{ $bannerImage['status'] ? 'selected' : '' }}>Disable</option>
                                </select>
                                <input type="url" class="form-control" id="links" name="links"
                                    value="{{ $bannerImage['links'] ?? '' }}">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="link" class="form-label">Links</label>
                        <input type="url" class="form-control" id="links" name="links"
                            value="{{ $banner['links'] }}">
                    </div>
                </div>


                <!-- Tombol aksi -->
                <div class="box-footer d-flex justify-content-end">
                    <a href="{{ url('masterData/banner') }}" type="button" class="btn btn-danger btn-sm me-1">
                        <i class="ti-close"></i> Cancel
                    </a>
                    <a href="javascript:void(0)" id="btnSave" class="btn btn-info btn-sm">
                        <i class="ti-save-alt"></i> Save
                    </a>
                </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

        });

        $('#btnSave').on('click', function() {
            var bannerName = $('#bannerName').val();
            var status = $('#status').val();
            var links = $('#links').val();
            var existingImage = $('input[name="existingImage"]').val();
            var existingImageContentType = $('input[name="existingImageContentType"]').val();


            if (!bannerName) {
                $.alert({
                    title: 'Information',
                    content: 'banner name cant empty',
                });
            } else if (!status) {
                $.alert({
                    title: 'Information',
                    content: 'Status cant empty',
                });
            } else if (!links) {
                $.alert({
                    title: 'Information',
                    content: 'links cant empty',
                });
            } else if (!images && !existingImage && !existingImageContentType) {
                $.alert({
                    title: 'Information',
                    content: ' Image can\'t be empty',
                });
            } else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
