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
	<title>Home admin</title>
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
        <a class="nav-link" href="#" style="font-size: 25px;">Home <span class="sr-only">(current)</span></a>
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
				<div class="container" style="margin-top: 10%;">
					<div class="row" style="margin-left: -10%;margin-right: -10%">
						
						<div class="col-3" style="">
							<div class="card" style="width: 200px;margin-top: 10px; background:  linear-gradient(315deg, #f6f0c4 0%, #d99ec9 74%);border-radius: 20px;">
								<center>
							  <img src="data.png"  class="card-img-top" alt="..." style="width: 100%;height:100%;padding: 10%;border-radius: 40px">
								</center>
							  <div class="card-body">
								<center>
                                <h4>Data User</h4>
								<a href="user_admin.php" class="btn btn-primary" style="width: 95%;background: #E09B9B;
								border-radius: 10px; border: none;">Lihat</a>
								</center>
                             </div>
							</div>
						</div>

                        <div class="col-3" style="">
							<div class="card" style="width: 200px;margin-top: 10px; background:  linear-gradient(315deg, #f6f0c4 0%, #d99ec9 74%);border-radius: 20px;">
								<center>
							  <img src="inventory.png"  class="card-img-top" alt="..." style="width: 100%;height:100%;padding: 10%;border-radius: 40px">
								</center>
							  <div class="card-body">
                                <center>
                                <h4>Data Produk</h4>
								<a href="admin_produk.php" class="btn btn-primary" style="width: 95%;background: #E09B9B;
								border-radius: 10px; border: none;">Lihat</a>
								</center>
                             </div>
							</div>
						</div>

                        <div class="col-3" style="">
							<div class="card" style="width: 200px;margin-top: 10px; background:  linear-gradient(315deg, #f6f0c4 0%, #d99ec9 74%);border-radius: 20px;">
								<center>
							  <img src="payment-method.png"  class="card-img-top" alt="..." style="width: 100%;height:100%;padding: 10%;border-radius: 40px">
								</center>
							  <div class="card-body">
                                <center>
                                <h4>Data Pembayaran</h4>
								<a href="admin_pembayaran.php" class="btn btn-primary" style="width: 95%;background: #E09B9B;
								border-radius: 10px; border: none;">Lihat</a>
								</center>
                             </div>
							</div>
						</div>


                        <div class="col-3" style="">
							<div class="card" style="width: 200px;margin-top: 10px; background:  linear-gradient(315deg, #f6f0c4 0%, #d99ec9 74%);border-radius: 20px;">
								<center>
							  <img src="transaction.png"  class="card-img-top" alt="..." style="width: 100%;height:100%;padding: 10%;border-radius: 40px">
								</center>
							  <div class="card-body">
                                <center>
                                <h4>Data Transaksi</h4>
								<a href="admin_transaksi.php" class="btn btn-primary" style="width: 95%;background: #E09B9B;
								border-radius: 10px; border: none;">Lihat</a>
								</center>
                             </div>
							</div>
						</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>