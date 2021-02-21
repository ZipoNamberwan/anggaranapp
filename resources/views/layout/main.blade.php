<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Aplikasi Anggaran</title>
	<meta name="description" content="Admintres is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Admintres Admin, Admintresadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Data table CSS -->
	<link href="/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="/dist/css/style.css" rel="stylesheet" type="text/css">

	@yield('stylesheet')
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-2-active navbar-top-light">
			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="nav-wrap">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a href="index.html">
								<img class="brand-img" src="/img/bpsntt2.png" alt="brand"/>
								<span class="brand-text"><img  src="/img/bpsanggaran.png" alt="brand"/></span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
					<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
				</div>
				</div>
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li class="navigation-header">
						<span>Master Kode</span> 
						<hr/>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-panel mr-20"></i><span class="right-nav-text">MASTER POK </span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
						<ul id="dashboard_dr" class="collapse collapse-level-1">
							<li>
								<a href="index.html">LIHAT</a>
							</li>
							<li>
								<a href="index2.html"><div class="pull-left"><span>ENTRI</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">MASTER JENIS BELANJA</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
						<ul id="ecom_dr" class="collapse collapse-level-1">
							<li>
								<a href="e-commerce.html">LIHAT</a>
							</li>
							<li>
								<a href="product.html">ENTRI</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="ti-clipboard mr-20"></i><span class="right-nav-text">MASTER BAGIAN/FUNGSI </span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
						<ul id="app_dr" class="collapse collapse-level-1">
							<li>
								<a href="chats.html">LIHAT</a>
							</li>
							<li>
								<a href="calendar.html">ENTRI</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_user"><div class="pull-left"><i class="ti-user mr-20"></i><span class="right-nav-text">MASTER PENGGUNA</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
						<ul id="app_user" class="collapse collapse-level-1">
							<li>
								<a href="chats.html">LIHAT</a>
							</li>
							<li>
								<a href="calendar.html">ENTRI</a>
							</li>
						</ul>
					</li>
					<li class="navigation-header mt-20">
						<span>Penarikan dan Realisasi</span> 
						<hr/>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="ti-pencil-alt  mr-20"></i><span class="right-nav-text">RENCANA PENARIKAN(RPD)</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
							<li>
								<a href="panels-wells.html">LIHAT</a>
							</li>
							<li>
								<a href="modals.html">ENTRI</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr"><div class="pull-left"><i class="ti-check-box  mr-20"></i><span class="right-nav-text">REALISASI ANGGARAN(LDS)</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="comp_dr" class="collapse collapse-level-1">
								<li>
								<a href="panels-wells.html">LIHAT</a>
							</li>
							<li>
								<a href="modals.html">ENTRI</a>
							</li>
						</ul>
					</li>
					<li class="navigation-header mt-20">
						<span>TABULASI</span> 
						<hr/>
					</li>
					<li>
						<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="ti-layout mr-20"></i><span class="right-nav-text">Tabel</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="pages_dr" class="collapse collapse-level-1">
							<li>
								<a href="blank.html">RPD BAGIAN/FUNGSI</a>
							</li>
							<li>
								<a href="blank.html">LDS BAGIAN/FUNGSI</a>
							</li>
							<li>
								<a href="blank.html">RPD JENIS BELANJA</a>
							</li>
							<li>
								<a href="blank.html">LDS JENIS BELANJA</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="documentation.html"><div class="pull-left"><i class="ti-book mr-20"></i><span class="right-nav-text">documentation</span></div><div class="clearfix"></div></a>
					</li>
				</ul>
			</div>
			<!-- /Left Sidebar Menu -->
			 
		<!-- Main Content -->
		<div class="page-wrapper">
      @yield('container')
			<footer class="footer pl-30 pr-30">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p>2021 &copy; Badan Pusat Statistik Provinsi NTT</p>
						</div>

					</div>
				</div>
			</footer>
			<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="/dist/js/dataTables-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="/dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="/dist/js/init.js"></script>
	
	@yield('optionaljs')

</body>

</html>
