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
	<title>Pembayaran admin</title>
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
                 <img src="king.png" width="30" height="30" alt="" style="margin-top: 13px; border-radius: 5px">
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="font-size: 25px; margin-right: 15px" href=""><?php  echo "" 
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
				  <a href="landing_admin.php" class="btn" style="width: 95%;background:;">home</a><br>
				  					</center>
				</div>
			</div>
			<!--card col-->
			<div class="col-10">
				<div class="container" style="margin-top: 5%; margin-left: 150px;">
					<div class="row" style="margin-left: -10%;margin-right: -10%">
                    <div class="col-9" style="background:lightgray; height:auto; width:200px; border-radius:10px">
				<form action="" method="post" style="justify-content: center">
				<table  class="table">
					<thead>
					<tr>
						<th>No</th>
						<th>Id pembayaran</th>
						<th>Id pembelian</th>
						<th>Nama pengirim</th>
						<th>Bank</th>
						<th>Tanggal pembayaran</th>
                        <th>jumlah</th>
                        <th>action</th>
					</tr>
						</thead>
					<tbody>
						<?php $nomor=1;?>
						<?php
						$datt = $koneksi->query("SELECT * FROM pembayaran");
						while($datatran = $datt-> fetch_assoc()){
						?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $datatran["id_pembayaran"];?></td>
							<td><?php echo $datatran["id_pembelian"];?></td>
							<td><?php echo $datatran["nama"];?></td>
							<td><?php echo $datatran["bank"];?></td>
                            <td><?php echo $datatran["tanggal_pembayaran"];?></td>
                            <td>Rp.<?php echo number_format($datatran["jumlah_pembayaran"]);?></td>
                            <td><a href="admin_nota.php?id=<?php echo $datatran["id_pembelian"]?>" class="btn btn-primary btn-xs">detail</a></td>
						</tr>
						<?php $nomor++;?>
                        <?php } ?>
						</tbody>
						</table>
						<a href="landing_admin.php" class="btn btn-primary" style="margin-top: 10px; margin-bottom:15px">Kembali</a>
						</div>
                        </div>
                        </div>
                        </div>