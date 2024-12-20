@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Banner</h1>
        <form id="fSubmit" class="form" action="{{ url('masterData/banner/update/' . $banner['id']) }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <!-- Row untuk input nama banner dan link -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Banner Name</label>
                    <input type="text" class="form-control" id="bannerName" name="bannerName"
                        value="{{ $banner['bannerName'] }}">
                </div>
            </div>

            <div class="form-group mb-0">
                <label class="form-label">images</label>
                <div class="d-flex flex-column">
                    <img id="image-result-images"
                        src="data:{{ $banner['imagesContentType'] }};base64,{{ $banner['images'] }}"
                        style="border: 2px dashed #1e42a0; 
                             width: 200px; 
                             height: 200px; 
                             object-fit: cover; 
                             background-color: #f0f0f0;"
                        alt="Banner Image" data-bs-toggle="modal" data-bs-target="#imageModal" />

                    <input type="hidden" name="existingImages" value="{{ $banner['images'] }}">
                    <input type="hidden" name="existingImagesContentType" value="{{ $banner['imagesContentType'] }}">

                    <input type="file" name="images" id="images" style="display: none;" accept="image/*" required
                        onchange="document.getElementById('image-result-images').src = window.URL.createObjectURL(this.files[0])" />

                    <div class="m-3">
                        <div class="col-6">
                            <label for="images" class="btn btn-primary">Choose File</label>
                        </div>
                    </div>
                   
                </div>
            </div>

            {{-- modal untuk gambar --}}
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Preview Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="image-modal-images"
                                src="data:{{ $banner['imagesContentType'] }};base64,{{ $banner['images'] }}"
                                style="width: 100%; height: auto; object-fit: contain;" alt="Banner Image" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="enable" {{ $banner['status'] == true ? 'selected' : '' }}>
                                    Enable</option>
                                <option value="disable" {{ $banner['status'] == false ? 'selected' : '' }}>
                                    disable</option>
                            </select>
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
        $('#btnSave').on('click', function() {
            var bannerName = $('#bannerName').val();
            var status = $('#status').val();
            var links = $('#links').val();

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
            } else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
