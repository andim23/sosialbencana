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
                <div class="auth-register">
                    <?php echo form_open(); ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="******">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="konfirmasi" class="form-control" placeholder="******">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I Have Read The Privacy Policy and Agree to The Terms of Service.</label>
                        </div>
                        <button type="submit" class="btn form-control auth-btn">Register</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="auth-footer">
                    <h4 class="text-center">Already a member? <span><a href="<?php echo base_url('login'); ?>">Login</a></span></h4>
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