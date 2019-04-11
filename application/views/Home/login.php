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
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITE_NAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge; text/html;">
    <link rel="stylesheet" href="<?php echo base_url('asset/home/css/bootstrap.min.css'); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo base_url('asset/home/css/style.css'); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo base_url('asset/home/css/sweetalert2.min.css'); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- online-fonts -->
    <!-- logo -->
    <link href="//fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <!-- titles -->
    <link href="//fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- body -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
    <!-- font-awesome icons -->
    <link href="<?php echo base_url()?>asset/home/css/font-awesome.css" rel="stylesheet">
</head>
<body>

<div class="auth">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col">
                <div class="auth-body">
                    <div class="auth-title">
                        <h2 class="text-center"><a href="<?php echo base_url('/'); ?>">Sosial Bencana</a></h2>
                    </div>
                    <div class="auth-register">
                        <?php echo form_open('auth/proseslogin'); ?>
                            <div class="form-group">
                                <!-- <label>Email address</label> -->
                                <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                <?php echo form_error('email', '<p class="text-white">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <!-- <label>Password</label> -->
                                <input type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password">
                                <?php echo form_error('password', '<p class="text-white">', '</p>'); ?>
                            </div>
                            <button type="submit" class="btn form-control auth-btn">Login</button>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="auth-footer">
                        <p><a href="<?php echo base_url('register'); ?>" class="mr-auto">Create Account</a> <a href="" class="ml-auto">Lupa Password</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JAVASCRIPT -->
<script src="<?php echo base_url('asset/home/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('asset/home/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('asset/home/js/sweetalert2.all.min.js'); ?>"></script>
<!-- //JAVASCRIPT -->
</body>
</html>
