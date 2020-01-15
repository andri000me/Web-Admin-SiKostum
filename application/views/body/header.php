<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>SI KOSTUM</title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="<?php echo base_url();?>assets/img/costume.png" type="image/x-icon"/>
		<!-- Fonts and icons -->
		<script src="<?php echo base_url();?>assets/js/plugin/webfont/webfont.min.js"></script>
	<!-- 	<script>
			WebFont.load({
				google: {"families":["Lato:300,400,700,900"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script> -->
		<!-- CSS Files -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/atlantis.min.css">
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css">
	</head>
	<body>
		<div class="wrapper">
			<div class="main-header">
				<!-- Logo Header -->
				<div class="logo-header" data-background-color="blue">
					
					<a href="<?php echo base_url('beranda');?>" class="logo">
						<div style="color: #ffffff;font-weight: bold;">SI KOSTUM</div>
					</a>
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
					</button>
					
					<div class="nav-toggle">
						<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
						</button>
					</div>
				</div>
				<!-- End Logo Header -->
				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
					
					<div class="container-fluid">
						
						
					</div>
				</nav>
				<!-- End Navbar -->
			</div>

			<div class="sidebar sidebar-style-2">
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<?php foreach ($user as $key) { ?>
								<img src="http://localhost/RESTT/uploads/<?php echo $key->foto_user;?>" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?php  echo $key->level;  ?>
										<span class="user-level"><?php echo $key->nama ?></span>
										<span class="caret"></span>
									</span>
								</a>
							<?php } ?>
								<div class="clearfix"></div>
								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="<?php echo base_url('Profil'); ?>">
												<span class="link-collapse text-center">Profil Saya</span>
											</a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
