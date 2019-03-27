<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)); ?></title>
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

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <div class="col-lg-12">
				<div class="box-content">
					<h4 class="box-title">Data User</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
                        <a href="<?php echo base_url('admin/user/tambah'); ?>" class="btn btn-xs btn-primary btn-icon btn-icon-left waves-effect waves-light"><i class="ico fa fa-plus"></i> Tambah Data</a>
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>User Number</th>
								<th>Username</th>
								<th>Email</th>
								<th>Tanggal Daftar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>User Number</th>
								<th>Username</th>
								<th>Email</th>
								<th>Tanggal Daftar</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>
                                <div class="btn-group margin-top-10">
                                    <button type="button" class="btn btn-xs btn-block btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <span class="caret"></span></button> 
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Detail Data</a></li>
                                        <li><a href="#">Ubah Data</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Hapus Data</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        </tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
		<!-- .row -->

		<footer class="footer">
			<?php $this->load->view('Admin/include/footer'); ?>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>