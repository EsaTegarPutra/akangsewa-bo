
<!DOCTYPE html>
<html lang="en">
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
	<link rel="stylesheet" href="{{asset('assets/assets/vendor_components/datatable/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.css')}}">

  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<!-- Logo -->
		<a href="index-2.html" class="logo">
		  <!-- logo-->
		  <div class="logo-mini w-50">
			  <span class="light-logo"><img src="{{asset('assets/images/logo-letter.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{asset('assets/images/logo-letter.png')}}" alt="logo"></span>
		  </div>
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{asset('assets/images/logo-dark-text.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{asset('assets/images/logo-light-text.png')}}" alt="logo"></span>
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-primary-light" title="Full Screen">
					<i class="icon-Position"></i>
			    </a>
			</li>
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle btn-primary-light" data-bs-toggle="dropdown" title="Notifications">
			  <i class="icon-Notification"><span class="path1"></span><span class="path2"></span></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">
			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>
			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="footer">
				  <a href="#">View all</a>
			  </li>
			</ul>
		  </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="user-profile bb-1 px-20 py-10">
			<div class="d-block text-center">
				<div class="image">
				  <img src="{{asset('assets/images/avatar/avatar-13.png')}}" class="avatar avatar-xxl bg-primary-light rounded100" alt="User Image">
				</div>
				<div class="info pt-15">
					<a class="px-20 fs-18 fw-500" href="#">{{Auth::user()->name}}</a>
				</div>
			</div>
			<ul class="list-inline profile-setting mt-20 mb-0 d-flex justify-content-center gap-3">
				<li><a href="{{url('logout')}}" data-bs-toggle="tooltip" title="Logout"><i class="icon-Lock-overturning fs-24"><span class="path1"></span><span class="path2"></span></i></a></li>
			</ul>
	    </div>
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li>
				  <a href="index-2.html">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
				  </a>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="glyphicon glyphicon-align-justify"><span class="path1"></span><span class="path2"></span></i>
					<span>Master Data</span>
					<span class="pull-right-container">
					  <i class="glyphicon glyphicon-menu-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{url('masterData/category')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Category</a></li>
				  </ul>
				</li>
        <li class="treeview">
				  <a href="#">
					<i class="glyphicon glyphicon-folder-close"><span class="path1"></span><span class="path2"></span></i>
					<span>Product</span>
					<span class="pull-right-container">
					  <i class="glyphicon glyphicon-menu-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					{{-- <li><a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Variant</a></li> --}}
          <li><a href="{{url('product/master')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Main</a></li>
          <li><a href="{{url('product/imageRepository')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Image Repository</a></li>
          <li><a href="{{url('product/description')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Description</a></li>
          <li><a href="{{url('product/variant')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Variant</a></li>
          <li><a href="{{url('product/attribute')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Attribute</a></li>
				  </ul>
				</li>
        <li class="treeview">
				  <a href="#">
					<i class="glyphicon glyphicon-list-alt"><span class="path1"></span><span class="path2"></span></i>
					<span>Order</span>
					<span class="pull-right-container">
					  <i class="glyphicon glyphicon-menu-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{url('order/pendingOrder')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pending Order</a></li>
          <li><a href="{{url('order/ongoingRentals')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>On Going Rentals</a></li>
          <li><a href="{{url('order/historyOrder')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>History Order</a></li>
				  </ul>
				</li>
			  </ul>
		  </div>
		</div>
    </section>
  </aside>

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->

        @yield('content')

		<!-- /.content -->
	  </div>
  </div>
  <footer class="main-footer">
  </footer>

  <div class="control-sidebar-bg"></div>

</div>
	<script src="{{asset('assets/js/vendors.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/chat-popup.js')}}"></script>
  <script src="{{asset('assets/assets/icons/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('assets/assets/vendor_components/datatable/datatables.min.js')}}"></script>

	<script src="{{asset('assets/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

	<script src="{{asset('assets/js/template.js')}}"></script>
	<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
  <script src="{{asset('assets/js/jquery-confirm.js')}}"></script>
    @yield('script')
</body>
</html>
