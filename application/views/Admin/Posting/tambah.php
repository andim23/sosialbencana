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
				<div class="col-12">
					<div class="box-content">
					    <?php echo form_open('posting/p_tambah', array('enctype' => 'multipart/form-data','id'=>'form_validation')); ?>
                        <div class="form-group">
                            <label for="inputNama" class="control-label">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi">
                            <?php echo form_error('lokasi', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <button type="button" onClick="getLocation()" class="btn btn-primary" >Dapatkan Lokasi Sekarang</button>
                        <p id="result"></p>
                        <div class="row small-spacing">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude">
                                    <?php echo form_error('latitude', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude">
                                    <?php echo form_error('longitude', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNama" class="control-label">Caption</label>
                            <textarea type="text" class="form-control" id="caption" name="caption">Caption Postingan</textarea>
                            <?php echo form_error('caption', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputNama" class="control-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Pilih Gambar">
                            <?php echo form_error('gambar', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo base_url('posting'); ?>" class="btn btn-danger"><i class="fa fa-rotate-left"></i> KEMBALI</a>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                        <?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<footer class="footer">
                <?php $this->load->view('Admin/include/footer'); ?>
			</footer>
		</div>
	</div>


<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<script>
var x = document.getElementById("result");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Lokasi Tidak Ditemukan");
  }
}

function showPosition(position) {
    $("#latitude").val(position.coords.latitude);
    $("#longitude").val(position.coords.longitude);
}
</script>
<!-- JAVASCRIPT -->
</body>

</html>
