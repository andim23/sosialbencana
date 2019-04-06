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

<?php
if($this->session->flashdata('sukses'))
{
	echo '<script src="'.base_url().'asset/admin/plugin/sweet-alert/sweetalert.min.js"></script>';
	echo '<script>
			swal({title:"'.$this->session->flashdata('sukses').'",type:"success",confirmButtonColor:"#304ffe"})
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

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-12">
				<div class="alert alert-info" role="alert"> Silahkan Pilih di Tabel Untuk Melakukan Pengubahan Data.</div>
			</div>
			<!-- COL -->
            <div class="col-lg-6">
				<div class="box-content card danger js__card">
					<h4 class="box-title bg-primary with-control">
						Tambah Status
						<span class="controls">
							<button type="button" class="control fa fa-minus js__card_minus"></button>
							<button type="button" class="control fa fa-times js__card_remove"></button>
						</span>
						<!-- /.controls -->
					</h4>
					<!-- /.box-title -->
					<div class="card-content js__card_content">
						<?php echo form_open('admin/pt_statususer', array('autocomplete' => 'off')); ?>
							<div class="form-group">
								<label>Kode</label>
								<input type="text" class="form-control" name="kode" value="<?php echo set_value('kode', $jumlahstatus); ?>">
								<?php echo form_error('kode', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="form-group">
								<label>Nama Status</label>
								<input type="text" class="form-control" name="status" placeholder="Masukkan Nama Level" value="<?php echo set_value('status'); ?>">
								<?php echo form_error('status', '<p class="text-danger">', '</p>'); ?>
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">PROSES</button>
						<?php echo form_close(); ?>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- COL -->

			<!-- COL -->
            <div class="col-lg-6">
				<div class="box-content card danger js__card">
					<h4 class="box-title bg-primary with-control">
						Edit Status
						<span class="controls">
							<button type="button" class="control fa fa-minus js__card_minus"></button>
							<button type="button" class="control fa fa-times js__card_remove"></button>
						</span>
						<!-- /.controls -->
					</h4>
					<!-- /.box-title -->
					<div class="card-content js__card_content">
						<?php echo form_open('admin/pu_statususer', array('autocomplete' => 'off')); ?>
							<div class="form-group">
								<label>Kode</label>
								<input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode Status" value="<?php echo set_value('kode'); ?>" readonly>
								<?php echo form_error('kode', '<p class="text-danger">', '</p>'); ?>
							</div>
							<div class="form-group">
								<label>Nama Status</label>
								<input type="text" class="form-control" name="status" id="status" placeholder="Masukkan Nama Level" value="<?php echo set_value('status'); ?>">
								<?php echo form_error('status', '<p class="text-danger">', '</p>'); ?>
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">PROSES</button>
						<?php echo form_close(); ?>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- COL -->


            <div class="col-lg-12">
				<!-- BOX CONTENT -->
				<div class="box-content">
					<h4 class="box-title">Data Level</h4>
					<table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Kode</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
						<tbody>
                            <?php
                            $no=1;
                            foreach($status as $status):
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $status['kode_status']; ?></td>
                                <td><?php echo $status['nama_status']; ?></td>
                                <td>
									<div class="btn-group margin-top-10">
										<button type="button" class="btn btn-xs btn-block btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi <span class="caret"></span></button> 
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url('admin/user/detail/').$status['kode_status']; ?>">Detail Data</a></li>
											<li><a href="<?php echo base_url('admin/user/edit/1').$status['kode_status']; ?>">Ubah Data</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="javascript:void(0);" class="item-hapus" onClick="return hapus('<?php echo base_url('admin/hapusstatususer/').$status['kode_status']; ?>');">Hapus Data</a></li>
										</ul>
									</div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
				<h4 class="modal-title" id="myModalLabel">Hapus User</h4>
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
<script>
function hapus(url)
{
    $('#delete').attr('href', url);
	$('#modalHapus').modal();
}
</script>
<script>
var table = document.getElementById('example');

for(var i=1; i<table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
        document.getElementById("kode").value = this.cells[1].innerHTML;
        document.getElementById("status").value = this.cells[2].innerHTML;
    };
}
</script>
<!-- JAVASCRIPT -->
</body>
</html>