<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)); ?></title>
	<?php $this->load->view('Admin/include/css'); ?>
</head>

<body>
<div class="main-menu">
    <!-- HEADER -->
	<header class="header">
		<?php $this->load->view('Admin/include/header'); ?>
    </header>
    <!-- HEADER -->
    
	<div class="content">
        <!-- SIDEBAR -->
        <?php $this->load->view('Admin/include/sidebar'); ?>
        <!-- SIDEBAR -->
	</div>
</div>

<div class="fixed-navbar">
	<?php $this->load->view('Admin/include/navbar'); ?>
</div>

<div id="wrapper">
	<div class="main-content">
        <!-- ROW -->
		<div class="row small-spacing">
			<div class="col-lg-3 col-xs-12">
				<div class="box-content bordered primary margin-bottom-20">
					<div class="profile-avatar">
						<img src="<?php echo $user['avatar']; ?>" alt="">
						<h5 class="text-center"><strong><?php echo $user['user_kode']; ?></strong></h5>
						<h4><?php echo $user['nama']; ?></h4>
					</div>
					<!-- .profile-avatar -->
					<table class="table table-hover no-margin">
						<tbody>
							<tr>
								<td>Status</td>
								<td>
									<span class="notice notice-danger">
										<?php
										foreach($status as $s)
										{
											echo $s['kode_status'] == $user['id_status'] ? $s['nama_status'] : '';
										}
										?>
									</span>
								</td>
							</tr>
							<tr>
								<td>Registrasi</td>
								<td><?php echo $user['tanggal']; ?></td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo base_url('user'); ?>" class="btn btn-sm btn-danger">KEMBALI</a></td>
                            </tr>
						</tbody>
					</table>
				</div>
				<!-- /.box-content bordered -->
			</div>
			<!-- /.col-md-3 col-xs-12 -->
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
                            <h4 class="box-title"><i class="fa fa-user ico"></i>About</h4>
                            
							<div class="card-content">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Kode User/Relawan:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['user_kode']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Nama:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['nama']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['email']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Jenis Kelamin:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['j_kel']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Tanggal Lahir:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['tgl_lahir']; ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
					<!-- /.col-md-12 -->
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="box-content card">
                            <h4 class="box-title"><i class="fa fa-globe ico"></i> Aktivitas</h4>
                            
							<div class="card-content">
								<div class="activity-list">
						<div class="activity-item">
							<div class="bar bg-primary">
								<div class="dot bg-primary"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">10 min</div>
								<!-- /.date -->
								<div class="text">
									Harry has finished "Amaza HTML" task
								</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-danger">
								<div class="dot bg-danger"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">15 min</div>
								<!-- /.date -->
								<div class="text">
									You completed your task
								</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-success">
								<div class="dot bg-success"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">30 min</div>
								<!-- /.date -->
								<div class="text">
									New updated has been installed
								</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-violet">
								<div class="dot bg-violet"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">1 hour ago</div>
								<!-- /.date -->
								<div class="text">Write some comments</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-warning">
								<div class="dot bg-warning"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">1 day ago</div>
								<!-- /.date -->
								<div class="text">4 friends request accepted</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-orange">
								<div class="dot bg-orange"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">6 days ago</div>
								<!-- /.date -->
								<div class="text">Betty has joined your team</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
						<div class="activity-item">
							<div class="bar bg-orange">
								<div class="dot bg-orange"></div>
								<div class="last-dot bg-orange"></div>
								<!-- /.dot -->
							</div>
							<!-- /.bar -->
							<div class="content">
								<div class="date">12 days ago</div>
								<!-- /.date -->
								<div class="text">Daisy has joined your team</div>
								<!-- /.text -->
							</div>
							<!-- /.content -->
						</div>
						<!-- /.activity-item -->
					</div>
					<!-- /.activity-list -->
					<a href="#" class="activity-link">View all activity <i class="fa fa-angle-down"></i></a>
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
					<!-- /.col-md-6 -->
					<div class="col-md-6 col-xs-12">
						<div class="box-content card">
                            <h4 class="box-title"><i class="fa fa-bar-chart ico"></i> Laporan</h4>
                            
							<div class="card-content">
								
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
					<!-- /.col-md-6 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col-md-9 col-xs-12 -->
		</div>
		<!-- ROW -->

		<footer class="footer">
			<?php $this->load->view('Admin/include/footer'); ?>
		</footer>
	</div>

<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>