<?php

session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi = $_POST['konfirmasi'];

$cek = mysqli_query($koneksi,"select * from data where id_user='$_SESSION[id_user]' and password = '$password_lama'");
$count = mysqli_num_rows($cek);
if ($count > 0){
$data = mysqli_query($koneksi,"update data set password='$password_baru' where id_user='$_SESSION[id_user]'");

header("location:landing.php?id=".$_SESSION['id_user']);
}




?>