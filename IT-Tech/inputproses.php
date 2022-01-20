<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

$produkname = $_POST['produkname'];
$price = $_POST['price'];
$stok_produk = $_POST['stok_produk'];
$description = $_POST['description'];
$seller = $_POST['seller'];
$lokasi = $_POST['lokasi'];
$id_user = $_SESSION['id_user'];
$foto = $_FILES['foto']['name'];


if (isset($_POST['save'])){
$data = mysqli_query($koneksi,"INSERT INTO produk (id_user,produkname,price,stok_produk,description,seller,lokasi,foto)
values ('$id_user','$produkname','$price','$stok_produk','$description','$seller','$lokasi','$foto');" );
move_uploaded_file($_FILES['foto']['tmp_name'], "foto_produk/".$_FILES['foto']['name']);
}

header("location:input prdk.php?id=".$_SESSION['id_user'])

?>

