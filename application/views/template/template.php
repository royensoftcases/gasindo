<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Anugrah</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" />



		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fixedColumns.dataTables.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.custom.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css">

		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />	
		<script src="<?php echo base_url()?>assets/js/ace-extra.min.js"></script>
<style type="text/css">
p.firstltr::first-letter {
font-size: 150%;
color: #d4af37;
padding-left: 3px;
padding-right: 2px;
font-family: Georgia;
}

#loader-wrapper .loader-section {
position: fixed;
top: 0;
width: 100%;
height: 100%;
background: url('<?php echo base_url();?>/assets/images/load-indicator.gif') 50% 50% no-repeat rgb(249,249,249);
z-index: 1000;
}

th, td { white-space: nowrap; }

div.dataTables_wrapper {
  margin: 0 auto;
  left: : 0 auto;
}

.DTFC_RightBodyLiner {
overflow: hidden!important;
}

.DTFC_LeftBodyLiner{
overflow: hidden!important;
}

.DTFC_RightBodyLiner {
overflow-x: hidden;
}

.DTFC_LeftBodyLiner{overflow-y:unset !important}
.DTFC_RightBodyLiner{overflow-y:unset !important}

.block {
display: block;
width: 100%;
border: none;
padding: 4px 6px;
font-size: 13px;
cursor: pointer;
text-align: left;
}

.dropdown-submenu {
position: relative;
}

.dropdown-submenu .dropdown-menu {
top: 0;
left: 100%;
margin-top: -1px;
}

@media screen and (max-width: 999px) {
img {
  height: 1.7em;
}

.logosedang {
padding-top: 10%;
}

.logokeluar {
height: 1.5em;
padding-right: 4%;
}

.logokiri {
padding-right: 2%;
padding-top: 1.5%;
}

.logopadding {
padding-left: 1%;
padding-top: 1.6%;
}

.logobumn {
padding-left: 4%;
padding-top: 1.3%;
}

}

@media screen and (min-width: 1000px) {
.logobesar {
height: 5em;
}

.logosedang {
height: 4.5em;
}

.logokecil {
height: 4em;
}

.logoxkecil {
height: 4em;
padding-left: 1%;
}

.logokeluar {
padding-right: 3%;
}

.logobumn {
padding-left: 3%;
}

.logokiri {
padding-right: 2%;
}
}
</style>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Anugrah Gasindo Abadi
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Admin
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
					<a href="?page=dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
					 <a href="?page=employee">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Master Employee </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
					<a href="?page=absent">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> List Absent </span>
						</a>

						<b class="arrow"></b>
					</li>

					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>


			<?php $this->load->view($content) ?>

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Roy</span>
							Application &copy; 2023
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
						
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->


		<!-- basic scripts -->

		<!--[if !IE]> -->


		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
	  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/slick.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.countdown.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/summernote.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/custom.js"></script>
      <script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/dataTables.fixedColumns.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				
			
			})
		</script>
	</body>
</html>
