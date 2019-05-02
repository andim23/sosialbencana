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
						<?php echo form_open('user/p_edit', array('autocomplete' => 'off')); ?>
							<div class="form-group">
								<label>Kode User/Relawan</label>
								<input type="text" class="form-control" name="user_kode" id="user_kode" value="<?php echo set_value('user_kode', $user['user_kode']); ?>" readonly>
								<?php echo form_error('user_kode', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama', $user['nama']); ?>">
								<?php echo form_error('nama', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="form-group">
								<label>Email Address</label>
								<input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email', $user['email']); ?>">
								<?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="number" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone', $user['phone']); ?>">
								<?php echo form_error('phone', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo set_value('tgl_lahir', $user['tgl_lahir']); ?>">
										<?php echo form_error('tgl_lahir', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select class="form-control" name="j_kel" id="j_kel" value="<?php echo set_value('j_kel', $user['j_kel']); ?>">
											<option value="">--- Pilih Jenis Kelamin ---</option>
											<option value="Laki-Laki" <?php echo $user['j_kel'] == 'Laki-Laki' ? 'selected="selected"' : '' ?>>Laki-Laki</option>
											<option value="Perempuan" <?php echo $user['j_kel'] == 'Perempuan' ? 'selected="selected"' : '' ?>>Perempuan</option>
										</select>
										<?php echo form_error('j_kel', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Level</label>
										<select name="level" id="level" class="form-control">
											<option value="">--- Pilih Level ---</option>
											<?php
											foreach($level as $level)
											{
												echo '<option value="'.$level['kode_level'].'"'.set_select('level', $user['id_level'], ($level['kode_level'] == $user['id_level'])).'>'.$level['level'].'</option>';
											}
											?>
										</select>
										<?php echo form_error('level', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Status</label>
										<select name="status" id="status" class="form-control">
											<option value="">--- Pilih Status ---</option>
											<?php
											foreach($status as $status)
											{
												echo '<option value="'.$status['kode_status'].'"'.set_select('status', $user['id_status'], ($status['kode_status'] == $user['id_status'])).'>'.$status['nama_status'].'</option>';
											}
											?>
										</select>
										<?php echo form_error('status', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
							</div>
                            <a href="<?php echo base_url('user'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-rotate-left"></i> KEMBALI</a>
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