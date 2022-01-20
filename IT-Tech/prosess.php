<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from data where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$result = $data->fetch_assoc();
 
if($cek >0){
	$_SESSION['username'] = $username;
	$_SESSION['id_user'] = $result['id_user'];
	$_SESSION['foto_profile'] = $result['foto_profile'];
	$_SESSION['status'] = "login";
	header("location:landing.php?id=".$result['id_user']);
}else{
	header("location:login.php?pesan=gagal");
}
?>