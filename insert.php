<?php

include 'config.php';

$nama_depan = $_POST["nama_depan"];
$nama_belakang = $_POST["nama_belakang"];
$alamat = $_POST["alamat"];
$email = $_POST["email"];
$password = $_POST["password"];
$no_telp = $_POST["no_telp"];

if($mysqli->query("INSERT INTO pelanggan (nama_depan , nama_belakang , alamat , email , no_telp , password ) 
VALUES('$nama_depan', '$nama_belakang', '$alamat' ,'$email' , '$no_telp' , '$password' )")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>
