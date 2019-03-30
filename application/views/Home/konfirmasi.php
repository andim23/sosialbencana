<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php $this->load->view('Admin/include/css'); ?>
</head>

<body>

<div id="single-wrapper">
	<form action="#" class="frm-single">
		<div class="inside">
			<div class="title"><strong>Sosial</strong>Bencana</div>
			<!-- /.title -->
			<div class="frm-title">Konfirmasi Email</div>
			<!-- /.frm-title -->
			<img src="<?php echo base_url(); ?>asset/home/icon-email.png" alt="" class="ico-email">
			<p class="text-center">Email telah kami kirimkan kepada <strong><?php echo $this->session->userdata('emailregister'); ?></strong>. Mohon untuk membuka email yang telah dikirimkan dan melakukan konfirmasi, agar bisa menggunakan aplikasi.</p>
			<a href="<?php echo base_url('login'); ?>" class="a-link"><i class="fa fa-sign-in"></i>Return to Login Page.</a>
			<div class="frm-footer"><?php echo SITE_NAME; ?> © <?php echo date('Y'); ?>.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

    <!-- JAVASCRIPT -->
    <?php $this->load->view('Admin/include/js'); ?>
	<!-- JAVASCRIPT -->
</body>
</html>