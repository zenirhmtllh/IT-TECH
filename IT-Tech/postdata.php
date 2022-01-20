<?php
include "config.php";
$data = mysqli_query($koneksi,"select * from produk ORDER BY id DESC");
?>