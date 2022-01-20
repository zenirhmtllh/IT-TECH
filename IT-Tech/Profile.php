<!doctype html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
@import url("Profilestyle.css");
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Rationale&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<html>
<head>
	<title>profile</title>
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
        <a class="nav-link" href="#" style="font-size: 25px;">Profile<span class="sr-only">(current)</span></a>
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

			<!--profile form-->
			<div class="col-10" style="margin-left:-90px">
				<div class="container py-4 my-2">
				<div class="row">
				<div class="col-4" style="background:lightgray; height:auto; border-radius:10px">
            <img class="w-100 rounded border" src="<?php echo 'foto_profile/'. $simpan ['foto_profile'] ?>" />
            <div class="pt-4 mt-2" style="width: 300px;">
               <form action="prosesupdate.php" method="POST">
					<label style="font-size: 12px">email</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="email" placeholder="" value="<?php echo $simpan['email'];?>">
						
					</div>
					<label style="font-size: 12px">No.Telfon</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="number" class="form-nama" name="no_tlp" min="16" placeholder="" value="<?php echo $simpan['no_tlp'];?>">
					</div>
					<label style="font-size: 12px">Nama Lengkap </label>

					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="nama_lengkap" placeholder=""value="<?php echo $simpan['nama_lengkap'];?>">

					</div>
					<label style="font-size: 12px">Alamat</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="alamat" placeholder="" value="<?php echo $simpan['alamat'];?>">
						</div>
					<label style="font-size: 12px">NIK</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="number" class="form-nama" name="quantity" min="1" placeholder="" value="<?php echo $simpan['no_ktp'];?>" readonly>
					</div>
				   <div class="form-group">
							<button class="simpan" name="simpan">simpan</button>
					</div>
				</form>
            </div>
        </div>
        <div class="col-md-4" style="margin-left: 10px; background:lightgray; height:70%; border-radius:10px">
            <div class="d-flex align-items-center">
                <h2 class="font-weight-bold m-0">
					<?php  echo "" 
				.$_SESSION['username']?>   
                </h2>
            </div>
            <p class="h5 text-primary mt-2 d-block font-weight-light">
			<?php echo $simpan['nama_lengkap'];?>
            </p>
            <section class="d-flex mt-5" style="padding-top: 100px;">
                <button class="btn btn-light mr-3 mb-3;" style="background: #E09B9B;margin-top:10px; margin-bottom:15px;
				box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);" data-toggle="modal" data-target="#modalpic">
                    <i class="fa fa-camera"></i>
                    Ubah foto
				</button>
				<!-- The Modal -->
				<form method="post" action="foto_profile.php" enctype="multipart/form-data">
					  <div class="modal fade" id="modalpic">
						<div class="modal-dialog modal-dialog-centered" style="border-radius: 10px;">
						  <div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header" style="background: black;">
							  <h4 class="modal-title w-100">Ganti Profile</h4>
							  <button type="button" class="close" data-dismiss="modal" style="color: red;">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body" style="background: black;">
								<center>
							  <img src="<?php echo 'foto_profile/'. $simpan ['foto_profile'] ?>" alt="Avatar" style="width:200px; height: 200px;">
								</center>
							</div>

							<!-- Modal footer -->
							<div class="modal-footer d-flex justify-content-center" style="background: black;">
							 <input type="file" name="foto_profile">
							  <button class="btn btn-default" style="background: #E09B9B;
							   border-radius: 10px; width: 50%;" name="simpan">Simpan</button>
							</div>
						  </div>
						</div>
					  </div>
					</form>
					<!--end modal-->
				
					
                <button class="btn btn-light mr-3 mb-3;" style="background: #E09B9B;margin-top:10px; margin-bottom:15px;
				box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-refresh"></i>
                    Ganti Password
               	 </button>
				 <!-- The Modal -->
					  <div class="modal fade" id="myModal">
						<div class="modal-dialog modal-dialog-centered" style="border-radius: 10px;">
						  <div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header" style="background: black;">
							  <h4 class="modal-title w-100">Ganti Password</h4>
							  <button type="button" class="close" data-dismiss="modal" style="color: red;">&times;</button>
							</div>

							<!-- Modal body -->
							  <form action="gantipass.php" method="post">
							<div class="modal-body" style="background: black;">
							  <div class="input-group form-group">
									<div class="input-group-prepend">
									</div>
								  	<label style="font-size: 12px">Password Lama </label>
									<input type="password" class="form-pass" name="password_lama" id="password_lama">
								</div>
								<label style="font-size: 12px">Password Baru</label>
								<div class="input-group form-group">
									<div class="input-group-prepend">
									</div>
									<input type="password" class="form-pass" name="password_baru" id="password_baru">
								</div>
								<label style="font-size: 12px">Re-Type Password </label>
								<div class="input-group form-group">
									<div class="input-group-prepend">
									</div>
									<input type="password" class="form-pass" name="konfirmasi" id="konfirmasi">
								</div>
							</div>

							<!-- Modal footer -->
							<div class="modal-footer d-flex justify-content-center" style="background: black;">
							  <button class="btn-primary" style="background: #E09B9B;
							   border-radius: 10px; width: 50%;" type="submit">Ganti</button>
							</div>
						  </div>
						</div>
					  </div>
						  </form>
					<!--end modal-->
						</section>
						  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
