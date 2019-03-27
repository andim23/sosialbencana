<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)); ?></title>
	<?php $this->load->view('Admin/include/css'); ?>
</head>

<body>
<div class="main-menu">
	<header class="header">
		<?php $this->load->view('Admin/include/header'); ?>
	</header>
	<!-- /.header -->
	<div class="content">
        <!-- SIDEBAR -->
        <?php $this->load->view('Admin/include/sidebar'); ?>
        <!-- SIDEBAR -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<?php $this->load->view('Admin/include/navbar'); ?>
</div>

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-diamond"></i>
						<p class="text text-white">SUCCESS</p>
						<h2 class="counter">72943</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-download"></i>
						<p class="text text-white">DOWNLOAD</p>
						<h2 class="counter">6382</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-bug"></i>
						<p class="text text-white">FIXED BUG</p>
						<h2 class="counter">12564</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-usd"></i>
						<p class="text text-white">SALES</p>
						<h2 class="counter">2,637</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>
		<!-- .row -->
	
		<footer class="footer">
			<?php $this->load->view('Admin/include/footer'); ?>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>