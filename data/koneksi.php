<?php
$koneksi = mysqli_connect("localhost","root","","db_data");

if (mysqli_connect_errno()) {
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_errno();
}
?>