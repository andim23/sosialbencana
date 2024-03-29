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
						<?php echo form_open('status/p_tambah', array('autocomplete' => 'off')); ?>
							<div class="form-group">
								<label>Nama Status</label>
								<input type="text" class="form-control" name="nama_status" placeholder="Masukkan Nama Status" value="<?php echo set_value('nama_status'); ?>">
								<?php echo form_error('nama_status', '<p class="text-danger">', '</p>'); ?>
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
						<?php echo form_open('status/p_edit', array('autocomplete' => 'off')); ?>
                            <input type="hidden" class="form-control" name="kode_status" id="kode_status" placeholder="Masukkan Kode Status" value="<?php echo set_value('kode_status'); ?>" readonly>
							<div class="form-group">
								<label>Nama Status</label>
								<input type="text" class="form-control" name="nama_status" id="nama_status" placeholder="Masukkan Nama Status" value="<?php echo set_value('nama_status'); ?>">
								<?php echo form_error('nama_status', '<p class="text-danger">', '</p>'); ?>
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
					<h4 class="box-title">Data Status</h4>
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
											<!-- <li role="separator" class="divider"></li> -->
											<li><a href="javascript:void(0);" class="item-hapus" onClick="return hapus('<?php echo base_url('status/hapus/').$status['kode_status']; ?>');">Hapus Data</a></li>
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
        document.getElementById("kode_status").value = this.cells[1].innerHTML;
        document.getElementById("nama_status").value = this.cells[2].innerHTML;
    };
}
</script>
<!-- JAVASCRIPT -->
</body>
</html>