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
						<img src="<?php echo base_url('upload/user/avatar.png'); ?>" alt="">
						<h3><strong>Betty Simmons</strong></h3>
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
								<td>Member Since</td>
								<td>Jan 07, 2014</td>
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
											<div class="col-xs-5"><label>First Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Betty</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Last Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Simmons</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>User Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Betty</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">youremail@gmail.com</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>City:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Los Angeles</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Country:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">United States</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Birthday:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Jan 22, 1984</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Interests:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">Basketball, Web, Design, etc.</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Website:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><a href="#">yourwebsite.com</a></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Phone:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7">+1-234-5678</div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
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