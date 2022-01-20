<?php
session_start();
$id=$_GET["id"];
unset($_SESSION["keranjang"][$id]);

echo "<script>alert('produk telah dihapus');</script>";
header("location:keranjang.php?id=".$_SESSION['id_user']);
?>