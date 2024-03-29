<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)); ?></title>
	<?php $this->load->view('Admin/include/css'); ?>
	<style>
		#map {
			width: 100%;
			height: 400px;
		}
        #map2 {
			width: 100%;
			height: 400px;
		}
	</style>
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
				<!-- TABEL -->
				<div class="col-12">
					<div class="box-content card">
						<h4 class="box-title bg-success">Detail Post - <?php echo $post['id_post']; ?></h4>
						<!-- CARD-CONTENT -->
						<div class="card-content">
							<img src="<?php echo base_url('uploads/').$post['nama_img']; ?>" class="margin-bottom-10"
								alt="" class="img-responsive">
							<div class="table-responsive">
								<!-- TABEL -->
								<table class="table table-bordered">
									<tbody>
										<tr>
											<th scope="row">Api Gambar</th>
											<td><?php echo $post['api_img']; ?></td>
										</tr>
										<tr>
											<th scope="row">Slug</th>
											<td><?php echo $post['slug_post']; ?></td>
										</tr>
										<tr>
											<th scope="row">Lokasi</th>
											<td><?php echo $post['lokasi']; ?></td>
										</tr>
										<tr>
											<th scope="row">Latitude</th>
											<td><?php echo $post['lttd_loc']; ?></td>
										</tr>
										<tr>
											<th scope="row">Longitude</th>
											<td><?php echo $post['lgttd_loc']; ?></td>
										</tr>
										<tr>
											<th scope="row">Caption</th>
											<td><?php echo $post['caption']; ?></td>
										</tr>
										<tr>
											<th scope="row">Tanggal</th>
											<td><?php echo $post['tanggal']."-".$post['waktu']; ?></td>
										</tr>
										<tr>
											<th scope="row">Kode User</th>
											<td><?php echo $post['user_kode']; ?></td>
										</tr>
									</tbody>
								</table>
								<!-- TABEL -->

                                <div class="mapContainer">
									<div id="map2" class="map2"></div>
								</div>
                                <div class="clear-fix"><br></div>
							</div>
							<a href="<?php echo base_url('posting'); ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-rotate-left"></i> KEMBALI</a>
                            <a class="btn btn-success btn-sm" target="_blank"
                                href="//maps.google.com/maps?f=d&amp;daddr=<?php echo $post['lttd_loc']; ?>,<?php echo $post['lgttd_loc']; ?>&amp;hl=en"> 
                                Buka Alamat pada GoogleMaps</a>
						</div>
						<!-- CARD-CONTENT -->
					</div>
				</div>
				<!-- TABEL -->
			</div>

			<footer class="footer">
				<?php $this->load->view('Admin/include/footer'); ?>
			</footer>
		</div>
		<!-- /.main-content -->
	</div>
	<!--/#wrapper -->

	<!-- JAVASCRIPT -->
	<?php $this->load->view('Admin/include/js'); ?>

	<script>
	// leaflett
    var map = L.map('map2').setView([<?php echo $post['lttd_loc']; ?>, <?php echo $post['lgttd_loc']; ?>], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // ini adalah koordinat marker 
    L.marker([<?php echo $post['lttd_loc']; ?>, <?php echo $post['lgttd_loc']; ?>]).addTo(map)
    .bindPopup("<b><?php echo $post['caption']; ?>.</b>").openPopup();
    
    var popup = L.popup();
    function onMapClick(e) {
        popup
        .setLatLng(e.latlng);
    }
    map.on('click', onMapClick);
    
    </script>

	<!-- JAVASCRIPT -->
</body>

</html>
