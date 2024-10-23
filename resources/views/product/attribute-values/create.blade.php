@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Attribute Value</h4>
                    </div>
                    <!-- /.box-header -->
                    <form id="fSubmit" class="form" action="{{ url('product/attributeValues/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Attribute Name</label>
                                        <select id="attributeId" name="attributeId" class="form-select" required>
                                            <option value="" selected disabled>Select Attribute</option>
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Attribute Value Name</label>
                                        <input class="form-control" name="valuesAttribute" id="valuesAttribute">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer d-flex justify-content-end">
                            <a href="{{ url('product/attributeValues') }}" type="button" class="btn btn-danger btn-sm me-1">
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
            var attributeName = $('#attributeId').val();
            var valuesAttribute = $('#valuesAttribute').val();


            if (!attributeName) {
                $.alert({
                    title: 'Information',
                    content: 'Attribute Name cant empty',
                });
            } 
            else if (!valuesAttribute) {
                $.alert({
                    title: 'Information',
                    content: 'Attribute Value Name cant empty',
                });
            } 
            else {
                $('#fSubmit').submit();
            }
        });
    </script>
@endsection
