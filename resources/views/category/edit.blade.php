@extends('layouts.app')
@section('content')
<section class="content">
	<div class="row">
    <div class="col-lg-4">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">New Category</h4>
						</div>
						<!-- /.box-header -->
						<form id="fSubmit" class="form" action="{{url('masterData/category/update/'.$category['id'])}}" method="post">
              {{csrf_field()}}
							<div class="box-body">
								<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">Category Name</label>
									  <input class="form-control" value="{{$category['categoryName']}}" name="categoryName" id="categoryName">
									</div>
								  </div>
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">Status</label>
									  <select id="status" name="status" class="form-select">
										<option value="" selected disabled></option>
										<option value="true" {{$category['status'] ==  true ? 'selected' : ''}} >Enable</option>
										<option value="false" {{$category['status'] ==  false ? 'selected' : ''}}>Disable</option>
									  </select>
									</div>
								  </div>
								</div>

							</div>
							<!-- /.box-body -->
							<div class="box-footer d-flex justify-content-end">
								<a href="{{url('masterData/category')}}" type="button" class="btn btn-danger btn-sm me-1">
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
      var categoryName = $('#categoryName').val();
      var status = $('#status').val();

      if(!categoryName){
        $.alert({
            title: 'Information',
            content: 'Category Name cant empty',
        });
      }else if(!status){
        $.alert({
            title: 'Information',
            content: 'Status cant empty',
        });
      }else{
        $('#fSubmit').submit();
      }
  });

</script>
@endsection
