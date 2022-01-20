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
	<title>Data pembelian</title>
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
        <a class="nav-link" href="#" style="font-size: 25px;">Riwayat<span class="sr-only">(current)</span></a>
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


            <div class="col-10" style="margin-left: 300px;">
				<div class="container py-4 my-2">
				<div class="row">
				<div class="col-9" style="">

                <table class="table" style="background: whitesmoke; border-radius:10px;">
                <thead style="background: lightgrey;">
                    <tr>
                    <th>no</th>
                    <th>Tanggal pembelian</th>
                    <th>status</th>
                    <th>Total harga</th>
                    <th>Opsi</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $nomor=1;?>
                    <?php
                    $id_pelanggan = $_SESSION['id_user'];
                    $data_t = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan=$id_pelanggan");
                    while($all_t = $data_t->fetch_assoc()){;
                    ?>
                        <tr>
                        <td><?php echo $nomor ;?></td>
                        <td><?php echo $all_t['tanggal_pembelian'];?></td>
                        <td><?php echo $all_t['status'];?></td>
                        <td>Rp.<?php echo  number_format($all_t['total_pembelian']);?></td>
                        <td><a href="nota.php?id=<?php echo $all_t["id_pembelian"];?>" class="btn btn-primary">detail</a>
                        <a href="bayar.php?id=<?php echo $all_t["id_pembelian"];?>" class="btn btn-primary">pembayaran</a>
                        </td>
                        </tr>
                        <?php $nomor++;?>
                    <?php }?>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>