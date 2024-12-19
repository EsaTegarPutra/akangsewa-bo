@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update Kurir</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('masterData/kurir/update/' . $kurir['id']) }}"
                        method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-5">
                                    {{-- Kurir Full Name  --}}
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input class="form-control" name="fullName" id="fullName"
                                            value="{{ $kurir['fullName'] }}">
                                    </div>
                                </div>

                                <div class="col-5">
                                    {{-- No.Telp --}}
                                    <div class="form-group">
                                        <label class="form-label">No.Telp</label>
                                        <input class="form-control" name="noTelp" id="noTelp" type="number"
                                            placeholder="Ex: 62xxx..." value="{{ $kurir['noTelp'] }}">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select id="active" name="active" class="form-select">
                                            <option value="true" {{ $kurir['active'] == true ? 'selected' : '' }}>
                                                Enable</option>
                                            <option value="false" {{ $kurir['active'] == false ? 'selected' : '' }}>
                                                Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <!-- Identity Photo Image Upload -->
                                    <div class="form-group mb-0">
                                        <label class="form-label">Identity Photo</label>
                                        <div class="d-flex flex-column">
                                            <img id="image-result-identity-photo"
                                                src="data:{{ $kurir['identityPhotoContentType'] }};base64,{{ $kurir['identityPhoto'] }}"
                                                style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; border-bottom-style: none !important; aspect-ratio: 1 / 1; background-position: center; object-fit: cover;" />

                                            <input type="hidden" name="existingIdentityPhoto"
                                                value="{{ $kurir['identityPhoto'] }}">
                                            <input type="hidden" name="existingIdentityPhotoContentType"
                                                value="{{ $kurir['identityPhotoContentType'] }}">

                                            <input type="file" name="identityPhoto" id="identityPhoto"
                                                style="display: none;" accept="image/*" required
                                                onchange="document.getElementById('image-result-identity-photo').src = window.URL.createObjectURL(this.files[0])" />

                                            <label for="identityPhoto" class="btn btn-primary"
                                                style="border-radius: 0 !important;">New File</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <!-- Self Photo Image Upload -->
                                    <div class="form-group mb-0">
                                        <label class="form-label">Self Photo</label>
                                        <div class="d-flex flex-column">
                                            <img id="image-result-self-photo"
                                                src="data:{{ $kurir['selfPhotoContentType'] }};base64,{{ $kurir['selfPhoto'] }}"
                                                style="border: 2px solid #1e42a0 !important; border-bottom: none !important; border-style: dashed !important; border-bottom-style: none !important; aspect-ratio: 1 / 1; background-position: center; object-fit: cover;" />

                                            <input type="hidden" name="existingSelfPhoto"
                                                value="{{ $kurir['selfPhoto'] }}">
                                            <input type="hidden" name="existingSelfPhotoContentType"
                                                value="{{ $kurir['selfPhotoContentType'] }}">

                                            <input type="file" name="selfPhoto" id="selfPhoto" style="display: none;"
                                                accept="image/*" required
                                                onchange="document.getElementById('image-result-self-photo').src = window.URL.createObjectURL(this.files[0])" />

                                            <label for="selfPhoto" class="btn btn-primary"
                                                style="border-radius: 0 !important;">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Buttons -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('masterData/kurir') }}" type="button" class="btn btn-danger btn-sm me-1">
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
            var fullName = $('#fullName').val();
            var noTelp = $('#noTelp').val();
            var active = $('#active').val();
            var identityPhoto = $('#identityPhoto').val();
            var existingIdentityPhoto = $('input[name="existingIdentityPhoto"]').val();
            var existingIdentityPhotoContentType = $('input[name="existingIdentityPhotoContentType"]').val();
            var selfPhoto = $('#selfPhoto').val();
            var existingSelfPhoto = $('input[name="existingSelfPhoto"]').val();
            var existingSelfPhotoContentType = $('input[name="existingSelfPhotoContentType"]').val();

            if (!fullName) {
                $.alert({
                    title: 'Information',
                    content: 'Full Name can\'t be empty',
                });
            } else if (!noTelp) {
                $.alert({
                    title: 'Information',
                    content: 'No.Telp can\'t be empty',
                });
            } else if (!active) {
                $.alert({
                    title: 'Information',
                    content: 'Active can\'t be empty',
                });
            } else if (!identityPhoto && !existingIdentityPhoto && !existingIdentityPhotoContentType) {
                $.alert({
                    title: 'Information',
                    content: 'Identity Photo can\'t be empty',
                });
            } else if (!selfPhoto && !existingSelfPhoto && !existingSelfPhotoContentType) {
                $.alert({
                    title: 'Information',
                    content: 'Self Photo can\'t be empty',
                });
            } else {
                $('#fSubmit').submit(); // Submit the form if all fields are filled
            }
        });
    </script>
@endsection
