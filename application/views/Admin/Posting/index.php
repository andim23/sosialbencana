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
					<h4 class="box-title">Data Posting</h4>
					<div class="dropdown js__drop_down">
                        <a href="<?php echo base_url('posting/tambah'); ?>" class="btn btn-xs btn-primary btn-icon btn-icon-left waves-effect waves-light"><i class="ico fa fa-plus"></i> Tambah Data</a>
					</div>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th width="25%">Lokasi</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th width="10%">Caption</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th width="25%">Lokasi</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th width="10%">Caption</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
							$no = 1;
							foreach($post as $post) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
                                <td style="word-wrap: break-word;"><?php echo $post['lokasi']; ?></td>
                                <td><?php echo $post['lttd_loc']; ?></td>
                                <td><?php echo $post['lgttd_loc']; ?></td>
                                <td><?php echo $post['caption']; ?></td>
                                <td><?php echo $post['tanggal']; ?></td>
								<td>
                                    <a href="#" onClick="show_image(<?php echo $post['id_post']; ?>)" data-toggle="modal" data-target="#imageModal" data-image="<?php echo $post['nama_img']; ?>" id="showimage<?php $post['id_post']; ?>" class="btn btn-success btn-circle waves-effect waves-light" title="Show Image"><i class="ico fa fa-image"></i></a>
                                    <a href="<?php echo base_url('posting/detail/').$post['id_post']; ?>" class="btn btn-primary btn-circle waves-effect waves-light" title="Show Post"><i class="ico fa fa-info"></i></a>
                                    <a href="<?php echo base_url('posting/edit/').$post['id_post']; ?>" class="btn btn-primary btn-circle waves-effect waves-light" title="Show Post"><i class="ico fa fa-edit"></i></a>
                                    <a href="#" onClick="return hapus('<?php echo base_url('posting/hapus/').$post['id_post']; ?>');" class="btn btn-danger btn-circle waves-effect waves-light" title="Show Image"><i class="ico fa fa-times"></i></a>
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
<!-- MODAL IMAGE -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Show Image</h4>
            </div>
            <div class="modal-body">
                <img src="" name="image" class="img-responsive postimg" id="image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL IMAGE -->
<!-- MODAL HAPUS -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Posting</h4>
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
function show_image(id)
{
    var image = $('#showimage'+id).data('image');
    $("#image").attr('src','<?php echo base_url('uploads/'); ?>'+image);
}
</script>
<script>
function hapus(url)
{
    $('#delete').attr('href', url);
	$('#modalHapus').modal();
}
</script>
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
<!-- JAVASCRIPT -->
</body>
</html>