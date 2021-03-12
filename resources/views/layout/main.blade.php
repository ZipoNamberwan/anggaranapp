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
	<link rel="icon" type="image/png" sizes="16x16" href="/img/bps.png">

	<!-- Data table CSS -->
	<link href="/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="/dist/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
	<script src="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
	<script src="//cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css"></script>
	<script src="//cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"></script>
	
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
							<a href="#">
								<img class="brand-img" src="/img/bpsntt2.png" alt="brand"/>
								<span class="brand-text"><img  src="/img/bpsanggaran.png" alt="brand"/></span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
					<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					
				</div>
				</div>
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
				@role('admin|viewer')
					<li class="navigation-header">
						<span>Master Kode</span> 
						<hr/>
					</li>
				
					<li>
						<a href="/pok"><div class="pull-left"><i class="ti-panel mr-20"></i><span class="right-nav-text">MASTER POK </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="/belanja"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">MASTER JENIS BELANJA</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="/fungsi"><div class="pull-left"><i class="ti-clipboard mr-20"></i><span class="right-nav-text">MASTER BAGIAN/FUNGSI </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					@endrole
					
					<li class="navigation-header mt-20">
						<span>Penarikan dan Realisasi</span> 
						<hr/>
					</li>
					<li>
						<a href="/rpd"><div class="pull-left"><i class="ti-pencil-alt  mr-20"></i>RPD</div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					<li>
						<a href="/lds"><div class="pull-left"><i class="ti-check-box  mr-20"></i>LDS</div><div class="pull-right"></div><div class="clearfix"></div></a>
					</li>
					<li class="navigation-header mt-20">
					<span>Unduh</span>
					<hr />
				</li>
				<li>
					<a href="/downloadpok">
						<div class="pull-left"><i class="ti-book mr-20"></i><span class="right-nav-text">Unduh POK</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
					<li class="navigation-header mt-20">
						<span>TABULASI</span> 
						<hr/>
					</li>
					<li>
						<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="ti-layout mr-20"></i><span class="right-nav-text">Tabel</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
						<ul id="pages_dr" class="collapse collapse-level-1">
							<li>
								<a href="/tabulasi1">RPD BAGIAN/FUNGSI</a>
							</li>
							<li>
								<a href="/tabulasi2">LDS BAGIAN/FUNGSI</a>
							</li>
							<li>
								<a href="/tabulasi3">RPD JENIS BELANJA</a>
							</li>
							<li>
								<a href="/tabulasi4">LDS JENIS BELANJA</a>
							</li>
						</ul>
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
	<script src="/vendors/bower_components/editable-table/mindmup-editabletable.js"></script>
	<script src="/vendors/bower_components/editable-table/numeric-input-example.js"></script>
	<script src="/dist/js/editable-table-data.js"></script>
	
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
	
	<!-- Tabulasi -->

	<script src="/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="/vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>	
	<script src="/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="/dist/js/export-table-data.js"></script>
	
	<!-- Tabel Scroll Frezze -->
	<script src="//code.jquery.com/jquery-3.5.1.js"></script>
	<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="/dist2/sweetalert2.js"></script>

	@yield('optionaljs')
</body>

</html>
