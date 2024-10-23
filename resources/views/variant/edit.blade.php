@extends('layouts.app')
@section('content')
<section class="content">
	<div class="row">
    <div class="col-lg-4">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Edit Variant</h4>
						</div>
						<!-- /.box-header -->
						<form id="fSubmit" class="form" action="{{url('product/variant/update/'.$variant['id'])}}" method="post">
              {{csrf_field()}}
							<div class="box-body">
								<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
										<label class="form-label">ProductId</label>
										<select name="productId" id="productId" class="form-select">
										  <option value="" selected disabled>...</option>
										  @foreach ($products as $product)
											  <option value="{{ $product['id'] }}">
												  {{ $product['id'] }}
											  </option>
										  @endforeach
										</select>
									  </div>
								  </div>
								  
									<div class="col-md-12">
									  <div class="form-group">
										<label class="form-label">variant name</label>
										<input class="form-control" value="{{ $variant['variantName'] }}" name="variantName" id="variantName">
									  </div>
									</div>
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">stock</label>
									  <input class="form-control" value="{{ $variant['stock'] }}" name="stock" id="stock">
									</div>
								  </div>
								</div>

							</div>
							<!-- /.box-body -->
							<div class="box-footer d-flex justify-content-end">
								<a href="{{url('product/variant')}}" type="button" class="btn btn-danger btn-sm me-1">
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
	var productId = $('#productId').val();
	// var productName = $('#productName').val();
	var variantName = $('#variantName').val();
      var stock = $('#stock').val();

      if(!variantName){
        $.alert({
            title: 'Information',
            content: 'variant name cant empty',
        });
    }else if(!productId){
        $.alert({
            title: 'Information',
            content: 'product cant empty',
        });
    // }else if(!productName){
    //     $.alert({
    //         title: 'Information',
    //         content: 'product name cant empty',
    //     });
    }else if(!stock){
        $.alert({
            title: 'Information',
            content: 'Stock cant empty',
        });
      }else{
        $('#fSubmit').submit();
      }
  });

</script>
@endsection
