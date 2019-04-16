<?php
	require_once('../connection.php');

	$sql = 'SELECT * FROM post';
	$r = mysqli_query($con,$sql);
	$result = array();

	while($row = mysqli_fetch_array($r)){
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat
		array_push($result,array(
			"id_post"=>$row['id_post'],
			"nama_img"=>$row['nama_img'],
			"tipe_img"=>$row['tipe_img'],
			"size_img"=>$row['size_img'],
			"slug_post"=>$row['slug_post'],
			"lttd_img"=>$row['lttd_img'],
			"lgttd_img"=>$row['lgttd_img'],
			"lokasi"=>$row['lokasi'],
			"lttd_loc"=>$row['lttd_loc'],
			"lgttd_loc"=>$row['lgttd_loc'],
			"caption"=>$row['caption'],
			"tanggal"=>$row['tanggal'],
			"waktu"=>$row['waktu'],
			"username"=>$row['username']
		));
	}
	echo json_encode(array('result'=>$result));
	mysqli_close($con);
?>