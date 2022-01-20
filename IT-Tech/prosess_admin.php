<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$result = $data->fetch_assoc();
 
if($cek >0){
	$_SESSION['username'] = $username;
	$_SESSION['id_admin'] = $result['id_admin'];
	$_SESSION['foto_profile'] = $result['foto_profile'];
	$_SESSION['status'] = "login";
	header("location:landing_admin.php?id=".$result['id_admin']);
}else{
	header("location:login.php?pesan=gagal");
}
?>