@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Add Banner</h2>
        <form id="fSubmit" class="form" action="{{ url('masterData/banner/store') }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Banner Name</label>
                        <input class="form-control" id="bannerName" name="bannerName">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <label for="images" class="form-label">Images</label>
                        <div class="col-6">
                            <img id="image-result"
                                style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; border-bottom-style: none !important; aspect-ratio: 1 / 1; background-position: center; object-fit: cover;" />

                            <input type="file" name="images" id="images" style="display: none;"
                                accept="image/*" required
                                onchange="document.getElementById('image-result').src = window.URL.createObjectURL(this.files[0])" />

                            <label for="images" class="btn btn-primary" style="border-radius: 0 !important;">Choose
                                File</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="" selected disabled></option>
                                    <option value="enable">Enable</option>
                                    <option value="disable">Disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Links</label>
                        <input type="url" class="form-control" id="links" name="links" placeholder="https://">
                    </div>
                </div>

                {{-- buttons --}}
                <div class="box-footer">
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
            var bannername = $('#bannerName').val();
            var images = $('#images').val();
            var status = $('#status').val();
            var links = $('#links').val();

            if (!bannername) {
                $.alert({
                    title: 'Information',
                    content: 'banner name cant empty',
                });
            } else if (!images) {
                $.alert({
                    title: 'Information',
                    content: 'image cant empty',
                });
            } else if (!status) {
                $.alert({
                    title: 'Information',
                    content: 'status cant empty',
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
