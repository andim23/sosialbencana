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
		<!-- ROW -->
		<div class="row small-spacing">
			<!-- STATISTIK ATAS -->
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-user"></i>
						<p class="text text-white">USER</p>
						<h2 class="counter"><?php echo $user; ?></h2>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-line-chart"></i>
						<p class="text text-white">POST</p>
						<h2 class="counter"><?php echo $post; ?></h2>
					</div>
				</div>
			</div>
			<!-- STATISTIK ATAS -->

			<!-- ACTIVITY -->
			<div class="col-md-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title"><i class="fa fa-globe ico"></i> Aktivitas</h4>
					<!-- CARD CONTENT -->
					<div class="card-content">
						<!-- ACTIVITY LIST -->
						<div class="activity-list">
							<?php
							foreach($activity as $a):
							?>
							<div class="activity-item">
								<?php
								$arr = array("primary", "success", "danger", "warning", 'info', 'violet');
								$random = array_rand($arr, 2);
								?>
								<div class="bar bg-<?php echo $arr[$random[0]]; ?>">
									<div class="dot bg-<?php echo $arr[$random[0]]; ?>"></div>
								</div>
								<div class="content">
									<div class="date"><?php echo $a['tanggal']." ".$a['waktu']; ?></div>
									<!-- /.date -->
									<div class="text">
										Kejadian <b><?php echo $a['caption']; ?></b> di <?php echo $a['lokasi']; ?> oleh <b><?php echo $a['user_kode']; ?></b>
									</div>
								</div>
							</div>
							<?php
							endforeach;
							?>
						</div>
						<!-- ACTIVITY LIST -->
						<a href="#" class="activity-link">View all activity <i class="fa fa-angle-down"></i></a>
					</div>
					<!-- CARD CONTENT -->
				</div>
			</div>
			<!-- ACTIVITY -->
			<div class="col-lg-12 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Grafik User</h4>
					<div id="lines-morris-chart" class="morris-chart" style="height: 320px"></div>
					<div class="text-center">
						<ul class="list-inline morris-chart-detail-list">
							<li><i class="fa fa-circle"></i>User</li>
						</ul>
					</div>
					<!-- /#lines-morris-chart.morris-chart -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- ROW -->
	
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