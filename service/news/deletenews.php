<?php
 //Mendapatkan Nilai ID
 $id = $_GET['id'];
 //Import File Koneksi Database
 require_once('../connection.php');

 //Membuat SQL Query
 $sql1 = "DELETE FROM post WHERE id='$id';";
 
 //Menghapus Nilai pada Database
 if(mysqli_query($con,$sql1)){
    echo 'Berhasil Menghapus';
 }else{
 echo 'Gagal Menghapus';
 }

 mysqli_close($con);
 ?>
