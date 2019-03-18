<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITE_NAME; ?></title>
    <?php $this->load->view('Home/include/css'); ?>
</head>
<body>

<div class="auth">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col">
            <div class="auth-img">
                <img src="<?php echo base_url('asset/img/sosial/foto7.jpg'); ?>" alt="">
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col">
            <div class="auth-kanan">
                <div class="auth-title">
                    <h2 class="text-center">Sosial Bencana</h2>
                </div>
                <div class="auth-body">
                    <?php echo form_open('auth/proseslogin'); ?>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="******">
                        </div>
                        <button type="submit" class="btn form-control auth-btn">Login</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="auth-footer">
                    <h4 class="text-center">Don't have a member? <span><a href="<?php echo base_url('register'); ?>">Register</a></span></h4>
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