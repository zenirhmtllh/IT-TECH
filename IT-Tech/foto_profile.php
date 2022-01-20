<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

$foto_profile = $_FILES['foto_profile']['name'];

if (isset($_POST['simpan'])){
$data = mysqli_query($koneksi,"update data set foto_profile='$foto_profile' where id_user='$_SESSION[id_user]'");
move_uploaded_file($_FILES['foto_profile']['tmp_name'], "foto_profile/".$_FILES['foto_profile']['name']);
}
header("location:landing.php?id=".$_SESSION['id_user'])

?>