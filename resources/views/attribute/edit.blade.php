@extends('layouts.app')
@section('content')
<section class="content">
	<div class="row">
    <div class="col-lg-4">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Attribute</h4>
						</div>
						<!-- /.box-header -->
						<form id="fSubmit" class="form" action="{{url('product/attribute/update/'.$attribute['id'])}}" method="post">
              {{csrf_field()}}
							<div class="box-body">
								<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">name</label>
									  <input class="form-control" value="{{ $attribute['name'] }}" name="name" id="name">
									</div>
								  </div>
								</div>

							</div>
							<!-- /.box-body -->
							<div class="box-footer d-flex justify-content-end">
								<a href="{{url('product/attribute')}}" type="button" class="btn btn-danger btn-sm me-1">
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

  $('#btnSave').on('click', function(){
      var name = $('#name').val();

      if(!name){
        $.alert({
            title: 'Information',
            content: 'Name cant empty',
        });
      }else{
        $('#fSubmit').submit();
      }
  });

</script>
@endsection
