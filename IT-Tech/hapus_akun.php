<?php
session_start();
include 'config.php';
$id=$_GET["id"];

mysqli_query($koneksi,"DELETE FROM  data WHERE id_user='$id'");

echo "<script>alert('akun telah dihapus');</script>";
header("location:user_admin.php");
?>