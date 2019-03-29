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
						<img src="<?php echo base_url('uploads/user/avatar.png'); ?>" alt="">
						<h3><strong><?php echo $user['username']; ?></strong></h3>
						<h4>Relawan Divisi xxxx.</h4>
					</div>
					<!-- .profile-avatar -->
					<table class="table table-hover no-margin">
						<tbody>
							<tr>
								<td>Status</td>
								<td><span class="notice notice-danger">Active</span></td>
							</tr>
							<tr>
								<td>Registrasi</td>
								<td><?php echo $user['tanggal']; ?></td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo base_url('admin/user'); ?>" class="btn btn-sm btn-danger">KEMBALI</a></td>
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
											<div class="col-xs-5"><label>Kode Number:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['num']; ?></div>
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
											<div class="col-xs-5"><label>Username:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?php echo $user['username']; ?></div>
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
								<ul class="notice-list">
									<li>
									    <span class="name"><?php echo date('d-m-Y H:i:s'); ?></span>
                                        <span class="desc">Username Melakukan Login.</span>
									</li>
								</ul>
								<!-- /.notice-list -->
								<div class="text-center margin-top-20"><a href="#" class="btn btn-default">Lihat Selengkapnya <i class="fa fa-angle-double-right"></i></a></div>
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