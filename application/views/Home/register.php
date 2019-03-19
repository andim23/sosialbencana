<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITE_NAME; ?></title>
    <?php $this->load->view('Home/include/css'); ?>
</head>
<body>
<?php
if($this->session->flashdata('sukses'))
{
	echo '<script src="'.base_url('asset/home/js/sweetalert2.all.min.js').'"></script>';
	echo '<script>
			swal("'.$this->session->flashdata('sukses').'", "", "success");
		</script>';
}
if($this->session->flashdata('gagal'))
{
	echo '<script src="'.base_url('asset/home/js/sweetalert2.all.min.js').'"></script>';
	echo '<script>
			swal("'.$this->session->flashdata('gagal').'", "", "error");
		</script>';
}
?>
<div class="auth">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col">
                <div class="auth-body">
                    <div class="auth-title">
                        <h2 class="text-center"><a href="<?php echo base_url('/'); ?>">Sosial Bencana</a></h2>
                    </div>
                    <div class="auth-register">
                        <?php echo form_open('auth/prosesregister'); ?>
                            <div class="form-group">
                                <!-- <label>Username</label> -->
                                <input type="text" name="username" class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?php echo set_value('username'); ?>" autofocus>
                                <?php echo form_error('username', '<p class="text-white">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <!-- <label>Email address</label> -->
                                <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                <?php echo form_error('email', '<p class="text-white">', '</p>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <!-- <label>Password</label> -->
                                        <input type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password">
                                        <?php echo form_error('password', '<p class="text-white">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <!-- <label>Konfirmasi Password</label> -->
                                        <input type="password" name="konfirmasi" class="form-control <?php echo form_error('konfirmasi') ? 'is-invalid' : '' ?>" placeholder="Konfirmasi Password">
                                        <?php echo form_error('konfirmasi', '<p class="text-white">', '</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn form-control auth-btn">Register</button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="auth-footer">
                        <p><a href="<?php echo base_url('login') ?>" class="mr-auto">Login Account</a> <a href="" class="ml-auto">Lupa Password</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<?php $this->load->view('Home/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>