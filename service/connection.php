<?php
 header("Content-Type: application/json; charset=UTF-8");
 define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','sos_ben');

 //membuat koneksi dengan database
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 ?>