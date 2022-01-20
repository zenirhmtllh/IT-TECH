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
	<title>Detail nota</title>
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
        <a class="nav-link" href="#" style="font-size: 25px;">Nota<span class="sr-only">(current)</span></a>
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

            <?php
            $detail = $koneksi->query("SELECT * FROM pembelian JOIN data on
            pembelian.id_pelanggan=data.id_user where pembelian.id_pembelian='$_GET[id]'");
            $nota = $detail ->fetch_assoc();
            ?>
            <div class="col-10" style="margin-left: 300px;">
				<div class="container py-4 my-2">
				<div class="row">
				<div class="col-9" style="background:lightgray; height:auto; border-radius:10px">
                <h3>Pelanggan</h3>
                <strong><?php echo $nota['nama_lengkap'];?></strong><br>
                <p>
                no telfon: <?php echo $nota['no_tlp'];?><br>
                alamat: <?php echo $nota['alamat'];?>
                </p>
                 ------------------------------------------------------------------------------------------------
                 <h3>Pembelian & Pengiriman</h3>
                 <strong>Status: <?php echo $nota['status'];?></strong>
                <p>
                Nomor pembelian: <?php echo $nota['id_pembelian'];?><br>
                Tangal pembelian: <?php echo $nota['tanggal_pembelian'];?><br>
                Alamat pengiriman: <?php echo $nota['alamat_pengiriman'];?><br>
                Ongkos pengiriman:  <?php echo $nota['nama_kota'];?> - Rp.<?php echo number_format($nota['tarif']);?><br>
                Total pembelian: Rp.<?php echo number_format($nota['total_pembelian']);?>
                </p>
                
                <table class="table table - bordered">
                <thead>
                    <tr>
                    <th>no</th>
                    <th>Nama produk</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>subtotal</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $nomor=1;?>
                    <?php
                    $list=$koneksi->query("SELECT * FROM pembelian_produk join produk on
                    pembelian_produk.id_produk=produk.id WHERE pembelian_produk.id_pembelian='$_GET[id]'");
                    ?>
                    <?php
                    while ($item = $list->fetch_assoc()){
                    ?>
                        <tr>
                        <td><?php echo $nomor ;?></td>
                        <td><?php echo $item['produkname'];?></td>
                        <td>Rp.<?php echo number_format($item['price']);?></td>
                        <td><?php echo $item['jumlah'];?></td>
                        <td>Rp.<?php echo number_format($item['price']*$item['jumlah']);?></td>
                        </tr>
                        <?php $nomor++;?>
                    <?php }?>
                    </tbody>
                </table>
                <div class="alert alert-info">
                <p>
                Silahkan melakukan pembayaran:<br>
                <strong> Total harga: Rp.<?php echo number_format($nota['total_pembelian']);?></strong><br>
                <strong>Rekening tujuan: BANK MANDIRI  152-001134-1902  AN.  unknown</strong>
                </p>
                </div>
                <a style="margin-top:10px; margin-bottom:15px" href="admin_pembayaran.php" class="btn btn-primary">kembali</a>
                </div>
                </div>
                </div>
                </div>