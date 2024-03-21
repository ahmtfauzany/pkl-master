<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$email  = $cek->telp;
$level  = $cek->level;
if ($level == "s_admin") {
	$level = "Super Admin";
}
$menu 		= strtolower($this->uri->segment(1));
$sub_menu 	= strtolower($this->uri->segment(2));
$sub_menu3 	= strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="foto/default1.png">
	<base href="<?php echo base_url(); ?>" />
	<title><?php echo $judul_web; ?></title>
	<style type="text/css">
		th {
			background-color: #333;
			color: white;
			border-color: #333;
		}

		.sidebar-xs .sidebar-main .navigation>li>a>span {
			display: none;
			position: absolute;
			top: 0;
			right: -260px;
			background-color: #333;
			border: 1px solid #333;
			padding: 11px 20px;
			width: 260px;
			text-align: left;
			color: #fff;
			cursor: pointer;
			border-bottom-right-radius: 3px;
			border-top-right-radius: 3px;
		}

		div.content-wrapper {
			background-color: #333;
		}

		th {
			background-color: #333;
			color: #FFF;
		}


		.sidebar-main {
			background: url('./foto/sidebar1.jpg');
			background-size: cover;
		}

		hr.short-hr {
			width: 85%;
			/* Sesuaikan dengan panjang yang diinginkan */
			margin: 10px auto;
			/* Memberi jarak di atas dan di bawah garis pembatas */
			border: 1px solid #ccc;
			/* Garis pembatas solid berwarna abu-abu */
		}

		.sidebar-xs .sidebar-main .navigation>li .has-ul>span {
			border-radius: 0 3px 0 0;
			cursor: default;
		}

		.sidebar-xs .sidebar-main .navigation>li>a>span {
			display: none;
			position: absolute;
			top: 0;
			right: -260px;
			background-color: #333;
			border: 1px solid white;
			padding: 11px 20px;
			width: 260px;
			text-align: left;
			color: #fff;
			cursor: pointer;
			border-bottom-right-radius: 3px;
			border-top-right-radius: 3px;

		}
	</style>
	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<?php
	if ($sub_menu == "" or $sub_menu == "profile" or $sub_menu == "lap_sk" or $sub_menu == "lap_sm" or $sub_menu == "lap_cuti" or $sub_menu == "lap_tugas" or $sub_menu == "lap_izin") { ?>
		<!-- Theme JS files -->
		<link rel="stylesheet" href="assets/calender/css/style.css">
		<link rel="stylesheet" href="assets/calender/css/pignose.calendar.css">
		<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
		<script type="text/javascript" src="assets/js/core/app.js"></script>
		<script src="assets/calender/js/pignose.calendar.js"></script>
		<!-- /theme JS files -->
	<?php
	} ?>
	<?php
	if ($sub_menu == "historysm"  or $sub_menu == "surat_cuti" or $sub_menu == "schistory" or $sub_menu == "kepsek" or $sub_menu == "ktu" or $sub_menu == "s_admin" or $sub_menu == "user" or $sub_menu == "pegawai" or $sub_menu == "md" or $sub_menu == "siswa" or $sub_menu == "sm"  or $sub_menu == "cuti" or $sub_menu == "sk" or $sub_menu == "tugas" or $sub_menu == "izin" or $sub_menu == "data_sm" or $sub_menu == "data_cuti" or $sub_menu == "data_sk" or $sub_menu == "data_tugas" or $sub_menu == "data_izin"  or $sub_menu == "ska") { ?>
		<!-- Theme JS files -->
		<?php if ($sub_menu == 'sm' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'cuti' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'sk' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'ktu' and $sub_menu3 != '') {
		} elseif ($sub_menu == 's_admin' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'kepsek' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'historysm' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'surat_cuti' and $sub_menu3 != '') {
		} elseif ($sub_menu == 'schistory' and $sub_menu3 != '') {
		} else { ?>
			<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="assets/js/core/app.js"></script>
			<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
		<?php } ?>
		<!-- /theme JS files -->
	<?php
	} ?>
</head>

<body>
	<!-- Main navbar -->
	<div style="background-color: #333; border-color:#333;" class="navbar navbar-default header-highlight">
		<div style="background-color: rgba(0, 0, 0, 0.7); border-color:#333;" class="navbar-header">
			<a class="navbar-brand" href="users/profile" style="color: white;">&nbsp; <?php echo ucwords($nama); ?> : <?php echo ucwords($level); ?></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a style="background-color: #333;" class="sidebar-control sidebar-main-toggle hidden-xs"><i style="background-color: #FFF;" class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li style="color: white; font-size:large;" class="navigation-header"> <span><b>MENU MAN3-APP</b></span> <i class="icon-menu" title="Main pages"></i></li>
								<hr class="short-hr">
								<li class="<?php if ($sub_menu == "") {
												echo 'active';
											} ?>"><a href=""><i class="icon-home5"></i> <span><b>DASHBOARD</b></span></a>
								</li>
								<?php if ($user->row()->level != 'ktu' and $user->row()->level != 'kepsek') { ?>
									<li class="<?php if ($sub_menu == "user") {
													echo 'active';
												} ?>">
										<?php
										if ($user->row()->level != 'pegawai') { ?>
											<a href="#"><i class="icon-user"></i> <span><b>DATA</b></span></a>
											<ul>
												<?php
												if ($user->row()->level == 's_admin') { ?>
													<li class="<?php if ($sub_menu == "user") {
																	echo 'active';
																} ?>"><a href="users/user"><i class="icon-user"></i> <b>DATA USER</b></a>
													</li>
												<?php } ?>
												<?php
												if ($user->row()->level != 's_admin') { ?>
													<li class="<?php if ($sub_menu == "pegawai") {
																	echo 'active';
																} ?>"><a href="users/pegawai"><i class="icon-user"></i> <b>DATA PEGAWAI</b></a>
													</li>
													<li class="<?php if ($sub_menu == "siswa") {
																	echo 'active';
																} ?>"><a href="users/siswa"><i class="icon-user"></i> <b>DATA SISWA</b></a>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
									</li>
									<?php
									if ($user->row()->level != 's_admin') { ?>
										<li class="<?php if ($sub_menu == "sk" or $sub_menu == "sm" or $sub_menu == "cuti") {
														echo 'active';
													} ?>">
											<a href="#"><i class="icon-envelope"></i> <span><b>SURAT</b></span></a>
											<ul>
												<?php
												if ($user->row()->level != 'pegawai') { ?>
													<li class="<?php if ($sub_menu == "sm") {
																	echo 'active';
																} ?>"><a href="users/sm"><i class="glyphicon glyphicon-tasks"></i> <b>SURAT MASUK</b></a></li>
													<li class="<?php if ($sub_menu == "sk") {
																	echo 'active';
																} ?>"><a href="users/sk"><i class="glyphicon glyphicon-tasks"></i> <b>SURAT KELUAR</b></a></li>
													<li><a href="users/tugas"><i class="glyphicon glyphicon-tasks"></i> <span><b>SURAT TUGAS</b></span></a></li>
												<?php } ?>
												<?php
												if ($user->row()->level != 'pegawai') { ?>
													<li class="<?php if ($sub_menu == "cuti") {
																	echo 'active';
																} ?>"><a href="users/cuti"><i class="glyphicon glyphicon-tasks"></i> <b>SURAT CUTI PEGAWAI</b></a></li>
												<?php } ?>
												<li><a href="users/izin"><i class="glyphicon glyphicon-tasks"></i> <span><b>SURAT IZIN SISWA</b></span></a></li>
											</ul>
										</li>

										<li class="<?php if ($sub_menu == "lap_sk" or $sub_menu == "lap_sm") {
														echo 'active';
													} ?>">
											<?php
											if ($user->row()->level != 's_admin' and $user->row()->level != 'pegawai') { ?>
												<a href="#"><i class="icon-printer2"></i> <span><b>REKAP LAPORAN</b></span></a>
												<ul>
													<li class="<?php if ($sub_menu == "lap_sm" or $sub_menu == "data_sm") {
																	echo 'active';
																} ?>"><a href="users/lap_sm"><i class="icon-file-text"></i> <b>SURAT MASUK</b></a></li>
													<li class="<?php if ($sub_menu == "lap_sk" or $sub_menu == "data_sk") {
																	echo 'active';
																} ?>"><a href="users/lap_sk"><i class="icon-file-text"></i> <b>SURAT KELUAR</b></a></li>
													<li class="<?php if ($sub_menu == "lap_tugas" or $sub_menu == "data_tugas") {
																	echo 'active';
																} ?>"><a href="users/lap_tugas"><i class="icon-file-text"></i> <b>SURAT TUGAS PEGAWAI</b></a></li>
													<li class="<?php if ($sub_menu == "lap_cuti") {
																	echo 'active';
																} ?>"><a href="users/lap_cuti"><i class="icon-file-text"></i> <b>SURAT CUTI PEGAWAI</b></a></li>
													<li class="<?php if ($sub_menu == "lap_izin" or $sub_menu == "data_izin") {
																	echo 'active';
																} ?>"><a href="users/lap_izin"><i class="icon-file-text"></i> <b>SURAT IZIN SISWA</b></a></li>
												</ul>
										</li>
										<li class="<?php if ($sub_menu == "historysm" or $sub_menu == "historysm") {
														echo 'active';
													} ?>"><a href="users/historysm"><i class="glyphicon glyphicon-bookmark"></i> <span><b>HISTORY SURAT MASUK</b></span></a></li>
									<?php } ?>
								<?php } ?>
							<?php } ?>
							<li class="<?php if ($sub_menu == "cuti") {
											echo 'active';
										} ?>"><a href="users/cuti/t"><i class="glyphicon glyphicon-tasks"></i> <b>FORM PENGAJUAN CUTI</b></a></li>
							<?php if ($user->row()->level == 's_admin') { ?>
								<li class="<?php if ($sub_menu == "s_admin" or $sub_menu == "s_admin") {
												echo 'active';
											} ?>"><a href="users/ktu"><i class="icon-envelope"></i> <span><b>PENGAJUAN SURAT MASUK</b></span></a></li>
								<li class="<?php if ($sub_menu == "historysm" or $sub_menu == "historysm") {
												echo 'active';
											} ?>"><a href="users/historysm"><i class="glyphicon glyphicon-bookmark"></i> <span><b>HISTORY SURAT MASUK</b></span></a></li>
							<?php } ?>
							<?php if ($user->row()->level == 'kepsek') { ?>
								<li class="<?php if ($sub_menu == "kepsek" or $sub_menu == "kepsek") {
												echo 'active';
											} ?>"><a href="users/kepsek"><i class="icon-envelope"></i> <span><b>PENGAJUAN SURAT MASUK</b></span></a></li>
								<li class="<?php if ($sub_menu == "s_admin" or $sub_menu == "s_admin") {
												echo 'active';
											} ?>"><a href="users/surat_cuti"><i class="icon-envelope"></i> <span><b>PENGAJUAN SURAT CUTI</b></span></a></li>
								<li class="<?php if ($sub_menu == "historysm" or $sub_menu == "historysm") {
												echo 'active';
											} ?>"><a href="users/historysm"><i class="glyphicon glyphicon-bookmark"></i> <span><b>HISTORY SURAT MASUK</b></span></a></li>
							<?php } ?>
							<!-- /main -->
							<!-- Logout -->
							<hr class="short-hr">
							<li><a href="web/logout"><i class="icon-switch2"></i> <span><b>LOGOUT</b></a></li>
							<!-- /logout -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->