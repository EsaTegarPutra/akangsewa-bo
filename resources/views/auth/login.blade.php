
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lawfirm-admin-template.multipurposethemes.com/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Sep 2024 02:53:23 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://lawfirm-admin-template.multipurposethemes.com/images/favicon.ico">

    <title>Backoffice System</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('assets/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/skin_color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.css')}}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{asset('assets/images/auth-bg/bg-1.jpg')}})">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to Back Office.</p>
							</div>
							<div class="p-40">
								<form action="{{url('login')}}" encenctype="multipart/form-data" method="post" id="fForm">
                                    {{csrf_field()}}
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" id="username" name="username" class="form-control ps-15 bg-transparent" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" id="password" name="password" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<div class="col-12 text-center">
										  <a href="javascript:void(0)" id="btnSubmit" class="btn btn-danger mt-10">SIGN IN</a>
										</div>
									  </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('assets/js/vendors.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/chat-popup.js')}}"></script>
    <script src="{{asset('assets/assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-confirm.js')}}"></script>
    <script>

    $('#btnSubmit').on('click', function(){

        var username = $('#username').val();
        var password = $('#password').val();
        console.log(username);
        if(!username){
            $.alert({
                title: 'Information',
                content: 'Username cant empty',
            });
        }else if(!password){
            $.alert({
                title: 'Information',
                content: 'Password cant empty',
            });
        }else{
            $('#fForm').submit();
        }
    });
    
    </script>
</body>
</html>
