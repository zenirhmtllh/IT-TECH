<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

if(isset($_POST["simpan"])){

$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_tlp = $_POST['no_tlp'];

$data = mysqli_query($koneksi,"update data set nama_lengkap='$nama_lengkap',alamat='$alamat',email='$email',no_tlp='$no_tlp' where id_user='$_SESSION[id_user]'");

header("location:landing.php?id=".$_SESSION['id_user']);
}
?>

