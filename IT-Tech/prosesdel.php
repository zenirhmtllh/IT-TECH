<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi,"DELETE from produk where id='$id'");
header("location:vproduk.php?id=".$_SESSION['id_user']);

?>