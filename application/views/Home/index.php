<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITE_NAME; ?></title>
    <?php $this->load->view('Home/include/css'); ?>
</head>
<body>

<div id="header">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Sosial Bencana</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('login'); ?>"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="main">
    <div class="container">
        <div class="row my-3">
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col">
                <div class="row">
                    <div class="col-xl-lg-6 col-lg-6 col-md-12 col">
                        <div class="card mb-3">
                            <img src="<?php echo base_url('asset/img/sosial/foto1.jpg'); ?>" alt="" class="img-fluid">
                            <h2 class="pl-3 pt-2 post-title">Letusan Gunung Merapi</h2>
                            <div class="media p-3">
                                <img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt="John Doe" class="mr-3 rounded-circle" width="40" height="40">
                                <div class="media-body">
                                    <h5 class="post-username">wrep17</h5>
                                    <span>Semarang, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-lg-6 col-lg-6 col-md-12 col">
                        <div class="card mb-3">
                            <img src="<?php echo base_url('asset/img/sosial/foto2.jpg'); ?>" alt="" class="img-fluid">
                            <h2 class="pl-3 pt-2 post-title">Letusan Gunung Merapi</h2>
                            <div class="media p-3">
                                <img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt="John Doe" class="mr-3 rounded-circle" width="40" height="40">
                                <div class="media-body">
                                    <h5 class="post-username">wrep17</h5>
                                    <span>Semarang, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-lg-6 col-lg-6 col-md-12 col">
                        <div class="card mb-3">
                            <img src="<?php echo base_url('asset/img/sosial/foto3.jpg'); ?>" alt="" class="img-fluid">
                            <h2 class="pl-3 pt-2 post-title">Letusan Gunung Merapi</h2>
                            <div class="media p-3">
                                <img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt="John Doe" class="mr-3 rounded-circle" width="40" height="40">
                                <div class="media-body">
                                    <h5 class="post-username">wrep17</h5>
                                    <span>Semarang, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-lg-6 col-lg-6 col-md-12 col">
                        <div class="card mb-3">
                            <img src="<?php echo base_url('asset/img/sosial/foto4.jpg'); ?>" alt="" class="img-fluid">
                            <h2 class="pl-3 pt-2 post-title">Letusan Gunung Merapi</h2>
                            <div class="media p-3">
                                <img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt="John Doe" class="mr-3 rounded-circle" width="40" height="40">
                                <div class="media-body">
                                    <h5 class="post-username">wrep17</h5>
                                    <span>Semarang, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col">
                <div class="card mb-3">
                    <div class="media p-3">
                        <img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt="John Doe" class="mr-3 rounded-circle" width="40" height="40">
                        <div class="media-body">
                            <h5 class="post-username">wrep17</h5>
                            <span>Semarang, Indonesia</span>
                        </div>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">Hot Today</li>
                    <li class="list-group-item">Ranking</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<?php $this->load->view('Home/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>