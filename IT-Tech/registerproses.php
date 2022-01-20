<?php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';

if(isset($_POST['daftar'])){
$nama_lengkap = $_POST['nama_lengkap'];
$no_ktp = $_POST['no_ktp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_tlp = $_POST['no_tlp'];

$data_u = mysqli_query($koneksi,"select * from data where username='$username'");  
$cek_u = mysqli_num_rows($data_u);
$result = $data_u->fetch_assoc();

$data_e = mysqli_query($koneksi,"select * from data where email='$email'");
$cek_e = mysqli_num_rows($data_e);
$result = $data_e->fetch_assoc();

if($cek_u >0 ){

 echo "<script>alert('username telah digunakan');</script>";
 echo "<script>location='register.php';</script>";

}else if($cek_e>0){

echo "<script>alert('Email telah terdaftar');</script>";
echo "<script>location='register.php';</script>";
}else{
    
$data = mysqli_query($koneksi,"INSERT INTO data (nama_lengkap,no_ktp,alamat,email,username,password,no_tlp)
values ('$nama_lengkap','$no_ktp','$alamat','$email','$username','$password','$no_tlp');" );

header("location:login.php");
}

}

?>

