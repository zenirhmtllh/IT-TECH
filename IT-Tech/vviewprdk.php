<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

$produkname = $_GET['produkname'];
$price = $_GET['price'];
$seller = $_GET['seller'];
$lokasi = $_GET['lokasi'];

$data = mysqli_query($koneksi,"SELECT * FROM produk (produkname,price,description,seller,lokasi)
values ('$produkname','$price','$description','$seller','$lokasi');" );

header("location:input prdk.php")

?>

