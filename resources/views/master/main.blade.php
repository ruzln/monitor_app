<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>MONITOR | {{ $title }}</title>
	<meta name="description" content="Splasher is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Splasher Admin, Splasheradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href={{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}} rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
	<link href="../vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>

	<!-- bootstrap-select CSS -->
	<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

	<!-- Toast CSS -->
	<link href={{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}} rel="stylesheet" type="text/css">
	

	<!-- Custom CSS -->
	<link href={{ asset('dist/css/style.css')}} rel="stylesheet" type="text/css">
     
	        
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-2-active navbar-top-light horizontal-nav">
		<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="nav-wrap">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a href="/">
								<img class="brand-img" src="images/logo.jpg" alt="e-monitor"/>
								<span class="brand-text">E-MONITOR</span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
					<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">

					</ul>
				</div>	
				</div>
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li class="navigation-header">
						<span>Menu</span> 
						<hr/>
					</li>
					<li>
						<a class="{{ ($title === "Dashboard") ? 'active' : '' }}" href="/" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-home mr-20"></i>
                            <span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>						
					</li>
					<li>
						<a class="{{ ($title === "Hari Ini") ? 'active' : '' }}" href="/penerimaan" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-image  mr-20"></i>
                            <span class="right-nav-text">Monitoring PBB </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
					<li>
						<a class="{{ ($title === "Kecamatan") ? 'active' : '' }}" href="/kecamatan" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="ti-menu-alt mr-20"></i>
                            <span class="right-nav-text">Penerimaan Kecamatan </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a class="{{ ($title === "Desa/Kelurahan") ? 'active' : '' }}" href="/kelurahan" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="ti-pencil-alt  mr-20"></i>
                            <span class="right-nav-text">Penerimaan Desa/Kelurahan</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>
					
					<li>
						<a class="{{ ($title === "Realisasi") ? 'active' : '' }}" href="/report" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="ti-printer  mr-20"></i>
                            <span class="right-nav-text">Report</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
                    </li>

				</ul>
			</div>
		
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container pt-30">
				<!-- Row -->
				@yield('content')
				<!-- /Row -->

			</div>
			
			<!-- Footer -->
			<footer class="footer pl-30 pr-30">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p>{{ Carbon\Carbon::now()->isoFormat("Y") }} &copy; IT BAPENDA</p>
						</div>
						<div class="col-sm-6 text-right">
							<p>Follow Us</p>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
		
	<!-- jQuery -->
    <script src={{ asset('vendors/bower_components/jquery/dist/jquery.min.js')}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}></script>
    			
	<!-- Toast JavaScript -->
	<script src={{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}></script>
		
	<!-- Data table JavaScript -->
	<script src={{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}></script>
	<script src={{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/jszip/dist/jszip.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/pdfmake/build/pdfmake.min.js')}}></script>
	<script src={{ asset('vendors/bower_components/pdfmake/build/vfs_fonts.js')}}></script>
	<script src={{ asset('dist/js/export-table-data.js')}}></script>
	<script src={{ asset('dist/js/dataTables-data.js')}}></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src={{ asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}></script>
	<script src={{ asset('vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}></script>

	<!-- Slimscroll JavaScript -->
	<script src={{ asset('dist/js/jquery.slimscroll.js')}}></script>	

	<!-- Fancy Dropdown JS -->
	<script src={{ asset('dist/js/dropdown-bootstrap-extended.js')}}></script>
		
	<!-- Owl JavaScript -->
	<script src={{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}></script>

	<!-- Select2 JavaScript -->
	<script src="../vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
		
	<!-- Bootstrap Select JavaScript -->
	<script src="../vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	

	<!-- Switchery JavaScript -->
	<script src={{ asset('vendors/bower_components/switchery/dist/switchery.min.js')}}></script>

	<!-- Select2 JavaScript -->
	<script src="../vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

	<!-- Init JavaScript -->
	<script src={{ asset('dist/js/init.js')}}></script>
	<script src={{ asset('dist/js/dashboard-data.js')}}></script>

	
	</body>
</html>
