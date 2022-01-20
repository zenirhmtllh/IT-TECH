<!doctype html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
@import url("landingstyle.css");
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Rationale&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<html>
<head>
	<title>Pembayaran</title>
	<link rel="shorcut icon" href="logo.png">
<meta charset="utf-8">
</head>
<body class="back">
	<!--navbar-->
	<?php
    session_start();
	include 'config.php';
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
	}else{
		
	 $ambil=$koneksi->query("SELECT * FROM data");
	 $data = $ambil->fetch_assoc();
	}
	?>
	
	<?php
	$ambil=$koneksi->query("SELECT * FROM data where id_user='$_GET[id]'");
	$simpan=$ambil->fetch_assoc();
	?>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed;top: 0;width: 100%;z-index: 1">
  <a class="navbar-brand"><img src="logo.png" style="width: 100px;height: 50px; margin-left: 10px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav,#login" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style="padding-left:5%;">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="font-size: 25px;">Pembayaran<span class="sr-only">(current)</span></a>
      </li>
    </ul>
	   <ul class="navbar-nav" style="margin-left: 890PX">
		   
		   <li class="nav-item active">
                 <img src="<?php echo 'foto_profile/'. $simpan ['foto_profile'] ?>" width="30" height="30" alt="" style="margin-top: 13px; border-radius: 5px">
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="font-size: 25px; margin-right: 15px" href="profile.php?id=<?php echo $_SESSION['id_user'];?>"><?php  echo "" 
				.$_SESSION['username']?></a>
                </li>
                <li class="nav-item active" style="">
                    <a class="nav-link" href="logout.php" style="font-size: 25px;">Logout</a>
                </li>
            </ul>
  </div>
</nav>
	<!--side navbar-->
	<div class="container" style="margin-top: 54px;">
		<div class="row">
			<div class="col-2">
				<div class="sidenav">
				  <div class="search-container" style="margin-left:10px; margin-top:15px;">
				  <form class="form-inline ">
					<input class="form-control form-control-sm mr-3 w-100" type="text" placeholder="Search"
						aria-label="Search" >
					</form>
				  </div>
				  <center>
				  <a href="landing.php?id=<?php echo $_SESSION['id_user'];?>" class="btn" style="width: 95%;background:;">home</a><br>
				  <a href="input prdk.php?id=<?php echo $_SESSION['id_user'];?>"class="btn" style="width: 95%;background:;">Jual produk</a><br>
				  <a href="vproduk.php?id=<?php echo $_SESSION['id_user'];?>"class="btn" style="width: 95%;background:;">Produk saya</a><br>
				  <a href="keranjang.php?id=<?php echo $_SESSION['id_user'];?>"class="btn" style="width: 95%;background:;">Keranjang</a><br>
				  <a href="riwayat_pembelian.php?id=<?php echo $_SESSION['id_user'];?>"class="btn" style="width: 95%;background:;">Riwayat belanja</a>
					</center>
				</div>
			</div>

            <?php
            $id_p =$_GET["id"];
            $p = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian ='$id_p'");
            $data_p= $p->fetch_assoc();
            ?>

            <div class="col-10" style="margin-left: 300px;">
				<div class="container py-4 my-2">
				<div class="row">
				<div class="col-9" style="background:lightgray; height:auto; border-radius:10px">
                <h2>Konfirmasi pembayaran</h2>
                <p>Kirim bukti pembayaran anda disini</p>

                <div class="alert alert-info">
                <p>
                <strong>Tagihan yang harus dibayar:</strong><br>
                Total tagihan: Rp.<?php echo number_format($data_p['total_pembelian']);?><br>
                Rekening tujuan: BANK MANDIRI  152-001134-1902  AN.  unknown
                </p>
                </div>


                <form method="post" enctype="multipart/form-data">
                <div class="form-grup">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-grup">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
                </div>
                <div class="form-grup">
                <label>jumlah</label>
                <input type="number" class="form-control" name="jumlah_pembayaran" min="1">
                </div>
                <div class="form-grup">
                <label>Bukti pembayaran</label>
                <input type="file" class="form-control" name="bukti">
                </div>
                <button class="btn btn-primary" name="kirim" style="margin-top: 10px">kirim</button>
                <a href="riwayat_pembelian.php?id=<?php echo $_SESSION['id_user'];?>" class="btn btn-primary" style="margin-top: 10px; margin-bottom:15px">kembali</a>

                <?php
                        if (isset($_POST["kirim"])){
                            $namabukti = $_FILES["bukti"]["name"];
                            $lokasibukti = $_FILES["bukti"]["tmp_name"];
                            $namafix = date("Ymdhis").$namabukti;
                            move_uploaded_file($lokasibukti,"foto_bukti/$namafix");
                            $nama = $_POST["nama"];
                            $bank = $_POST["bank"];
                            $jumlah_pembayaran = $_POST["jumlah_pembayaran"];
                            $tanggal_pembayaran = date("y-m-d");
                            
                            $koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,tanggal_pembayaran,jumlah_pembayaran,bukti)
                            VALUES ('$id_p','$nama','$bank','$tanggal_pembayaran','$jumlah_pembayaran','$namafix')");

                            $koneksi->query("UPDATE pembelian SET status ='Sudah melakukan pembayaran'
                            WHERE id_pembelian='$id_p'");

                            echo "<script>alert=('Bukti pembayaran terkirim, Terima kasih');</script>";
                            echo "<script>location='riwayat_pembelian.php?id=$id_p';</script>";

                        }
                    ?>
                </form>
                </div>
                </div>
                </div>
                </div>


