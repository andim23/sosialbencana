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
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-user"></i>
						<p class="text text-white">USER</p>
						<h2 class="counter"><?php echo $user; ?></h2>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-heart"></i>
						<p class="text text-white">REACTION</p>
						<h2 class="counter"><?php echo $react; ?></h2>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-line-chart"></i>
						<p class="text text-white">POST</p>
						<h2 class="counter"><?php echo $post; ?></h2>
					</div>
				</div>
			</div>
			<!-- STATISTIK ATAS -->

			<!-- STATISTIK PERSENTASE -->
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">User Aktif (Persen / %)</h4>
					<div class="text-center">
						<?php
						$persenAktif = ($aktif / $user)*100;
						?>
						<div class="knob-wrap">
							<input class="knob" data-width="150" data-height="150" data-bgColor="#ebeff2" data-fgColor="#304ffe" data-readOnly=true data-thickness=".4" value="<?php echo round($persenAktif, 2); ?>"  />
						</div>
						<!-- .knob-wrap -->
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">User Tidak Aktif (Persen / %)</h4>
					<div class="text-center">
						<?php
						$persenTidakAktif = ($tidakAktif / $user)*100;
						?>
						<div class="knob-wrap">
							<input class="knob" data-width="150" data-height="150" data-bgColor="#ebeff2" data-fgColor="#304ffe" data-readOnly=true data-thickness=".4" value="<?php echo round($persenTidakAktif, 2); ?>"  />
						</div>
						<!-- .knob-wrap -->
					</div>
				</div>
			</div>
			<!-- STATISTIK PERSENTASE -->

			<!-- ACTIVITY -->
			<div class="col-md-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title"><i class="fa fa-globe ico"></i> Aktivitas</h4>
					<!-- CARD CONTENT -->
					<div class="card-content">
						<!-- ACTIVITY LIST -->
						<div class="activity-list">
							<div class="activity-item">
								<div class="bar bg-primary">
									<div class="dot bg-primary"></div>
								</div>
								<div class="content">
									<div class="date">10 min</div>
									<!-- /.date -->
									<div class="text">
										Harry has finished "Amaza HTML" task
									</div>
								</div>
							</div>
						</div>
						<!-- ACTIVITY LIST -->
						<a href="#" class="activity-link">View all activity <i class="fa fa-angle-down"></i></a>
					</div>
					<!-- CARD CONTENT -->
				</div>
			</div>
			<!-- ACTIVITY -->
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