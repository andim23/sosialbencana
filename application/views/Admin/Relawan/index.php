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
		<div class="row small-spacing">
            <div class="col-lg-12">
				<!-- BOX CONTENT -->
				<div class="box-content">
					<h4 class="box-title">Data Relawan</h4>
					<div class="dropdown js__drop_down">
                        <a href="<?php echo base_url('user/tambah'); ?>" class="btn btn-xs btn-primary btn-icon btn-icon-left waves-effect waves-light"><i class="ico fa fa-plus"></i> Tambah Data</a>
					</div>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode Relawan/User</th>
								<th>Email</th>
								<th>Level</th>
								<th>Status</th>
								<th>Tanggal Daftar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Kode Relawan/User</th>
								<th>Email</th>
								<th>Level</th>
								<th>Status</th>
								<th>Tanggal Daftar</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							$no = 1;
							foreach($relawan as $relawan) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $relawan['user_kode']; ?></td>
								<td><?php echo $relawan['email']; ?></td>
								<td>
									<?php
									foreach($level as $lev)
									{
										echo $lev['kode_level'] == $relawan['id_level'] ? $lev['level'] : '';
									}
									?>
								</td>
								<td>
									<?php
									foreach($status as $s)
									{
										echo $s['kode_status'] == $relawan['id_status'] ? $s['nama_status'] : '';
									}
									?>
								</td>
								<td><?php echo $relawan['tanggal']; ?></td>
								<td>
									<div class="btn-group margin-top-10">
										<button type="button" class="btn btn-xs btn-block btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <span class="caret"></span></button> 
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url('user/detail/').$relawan['user_kode']; ?>">Detail Data</a></li>
											<li><a href="<?php echo base_url('user/edit/').$relawan['user_kode']; ?>">Ubah Data</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="javascript:void(0);" class="item-hapus" onClick="return hapus('<?php echo base_url('user/hapus/').$relawan['user_kode']; ?>');">Hapus Data</a></li>
										</ul>
									</div>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
					</table>
				</div>
				<!-- BOX CONTENT -->
			</div>
		</div>
		<!-- .row -->

		<footer class="footer">
			<?php $this->load->view('Admin/include/footer'); ?>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

<!-- MODAL -->		
<!--MODAL HAPUS-->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Relawan</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda Yakin Ingin Menghapus Data?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
				<a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect waves-light" id="delete">Delete</a>
			</div>
		</div>
	</div>
</div>
<!-- MODAL HAPUS-->
<!-- MODAL -->

<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<?php
if($this->session->flashdata('sukses'))
{
	echo '<script src="'.base_url().'asset/admin/plugin/sweet-alert/sweetalert.min.js"></script>';
	echo '<script>
			swal({title:"'.$this->session->flashdata('sukses').'",text:"",type:"success",confirmButtonColor:"#304ffe"})
		</script>';
}
if($this->session->flashdata('gagal'))
{
	echo '<script src="'.base_url().'asset/admin/plugin/sweet-alert/sweetalert.min.js"></script>';
	echo '<script>
			swal({title:"'.$this->session->flashdata('gagal').'",text:"",type:"error",confirmButtonColor:"#304ffe"})
		</script>';
}
?>
<script>
function hapus(url)
{
    $('#delete').attr('href', url);
	$('#modalHapus').modal();
}
</script>
<!-- JAVASCRIPT -->
</body>
</html>