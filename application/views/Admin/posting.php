<!DOCTYPE html>
<html lang="en">

<head>
	<title>Form Validation - My Admin Template</title>
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
	<!-- /.fixed-navbar -->

	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">
				<div class="col-12">
					<div class="box-content">
					<?php echo form_open('Admin/proses_post', array('enctype' => 'multipart/form-data','id'=>'form_validation')); ?>
							<div class="form-group">
								<label for="inputNama" class="control-label">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda"
									required>
							</div>
							<div class="form-group">
								<label for="inputNama" class="control-label">Deskripsi</label>
								<input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"
									required>
							</div>
							<div class="form-group">
								<label for="inputNama" class="control-label">Status</label>
								<input type="text" class="form-control" name="status" placeholder="Masukkan Status Anda"
									required>
							</div>
							<div class="form-group">
								<label for="inputNama" class="control-label">Gambar</label>
								<input type="file" class="form-control" name="gambar" placeholder="Pilih Gambar"
									required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
							</div>
							<?php echo form_close(); ?>
					</div>
					<!-- /.box-content -->
				</div>
				<!-- /.col-12 -->
			</div>
			<!-- /.row small-spacing -->
			<footer class="footer">
                <?php $this->load->view('Admin/include/footer'); ?>
			</footer>
		</div>
		<!-- /.main-content -->
	</div>
	<!--/#wrapper -->


	<!-- JAVASCRIPT -->
        <?php $this->load->view('Admin/include/js'); ?>
    <!-- JAVASCRIPT -->
</body>

</html>
