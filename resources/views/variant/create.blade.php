@extends('layouts.app')
@section('content')
<section class="content">
	<div class="row">
    <div class="col-lg-4">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Variant</h4>
						</div>
						<!-- /.box-header -->
						<form id="fSubmit" class="form" action="{{url('product/variant/store')}}" method="post">
              {{csrf_field()}}
							<div class="box-body">
								<div class="row">
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">Product Name</label>
									  <select name="productId" id="productId" class="form-select">
										<option value="" selected disable>...</option>
										@foreach ($products as $product)
											<option value="{{ $product['id'] }}">
												{{ $product['productName'] }}
											</option>
										@endforeach
									  </select>
									</div>
								  </div>
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">variant name</label>
									  <input class="form-control" name="variantName" id="variantName">
									</div>
								  </div>
								  <div class="col-md-12">
									<div class="form-group">
									  <label class="form-label">Stock</label>
									  <input class="form-control" name="stock" id="stock" type="number">
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


  $(document).ready(function() {

  });

  $('#btnSave').on('click', function(){
	  var productId = $('#productId').val();
      var variantName = $('#variantName').val();
      var stock = $('#stock').val();

      if(!productId){
        $.alert({
            title: 'Information',
            content: 'product cant empty',
        });
     }else if(!variantName){
         $.alert({
             title: 'Information',
             content: 'variant cant empty',
         });
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
