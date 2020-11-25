<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('/css/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('/css/dist/css/adminlte.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	@yield('styles')
</head>
<body class="hold-transition sidebar-fixed fixed layout-navbar-fixed layout-fixed">
	<!-- Site wrapper -->
	<div class="wrapper">
  		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		    <!-- Left navbar links -->
		    <ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		    <!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Log-Out Menu -->
				<li class="nav-item">
					<form action="{{ route('logout') }}" method="post">
						@csrf
						<button type="submit" class="btn btn-danger">
							<i class="fas fa-sign-out-alt"></i> Log-Out
						</button>
					</form>
				</li>
			</ul>
 		</nav>
  		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary">
		    <!-- Brand Logo -->
		    <a href="{{ route('home') }}" class="brand-link">
				<div class="text-center">
					<div>{{ config('app.name') }}</div>
				</div>
		    </a>
		    <!-- Sidebar -->
		    <div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="{{ asset('/css/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ auth()->user()->common_name }}</a>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-2">
		        	<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Dashboard -->
						<li class="nav-item">
							<a href="{{ route('home') }}" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@if (auth()->user()->user_role == 1)
							<!-- Admin Module -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-user-shield"></i>
									<p>Administration<i class="right fas fa-angle-left"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{ route('departments.index') }}" class="nav-link">
											<i class="fas fa-building nav-icon"></i>
											<p>Departments</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{ route('users.index') }}" class="nav-link">
											<i class="fas fa-user-lock nav-icon"></i>
											<p>Users</p>
										</a>
									</li>
								</ul>
							</li>
							<!-- Employee Module -->
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>Employees<i class="right fas fa-angle-left"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{ route('employees.index') }}" class="nav-link">
											<i class="fas fa-users nav-icon"></i>
											<p>Employees</p>
										</a>
									</li>
								</ul>
							</li>
						@endif
			        </ul>
		      	</nav>
		    	<!-- /.sidebar-menu -->
	    	</div>
	    	<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div>
	<!-- /.content-wrapper -->

<!-- Footer -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Test Version
			</div>
			<strong>By: <a href="#">JBMalveda</a></strong>
		</footer>
		<!-- /Footer -->

		<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			</aside>
		<!-- /.control-sidebar -->
	</div>
<!-- ./wrapper -->
<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('/css/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/css/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/css/dist/js/adminlte.min.js') }}"></script>
@yield('scripts')
</body>
</html>