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
            <!-- COLUMN -->
            <div class="col-lg-12">
				<div class="box-content card white">
                    <h4 class="box-title">Form User</h4>
                    <!-- CARD -->
					<div class="card-content">
						<?php echo form_open('', array('autocomplete' => 'off')); ?>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username_user" id="username_user" placeholder="Masukkan Username">
							</div>
							<div class="form-group">
								<label>Email address</label>
								<input type="email" class="form-control" name="email_user" id="email_user" placeholder="Masukkan Email Yang Aktif.">
							</div>
							<div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password_user" id="password_user" placeholder="Masukkan Kata Sandi/Password Minimal 8 Karakter.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="konfirmasi" class="form-control" name="konfirmasi_user" id="konfirmasi_user" placeholder="Masukkan Konfirmasi Kata Sandi/Password Minimal 8 Karakter.">
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-danger btn-sm">KEMBALI</a>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">PROSES</button>
						<?php echo form_close(); ?>
					</div>
					<!-- CARD -->
				</div>
				<!-- /.box-content -->
            </div>
            <!-- COLUMN -->
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