

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
	<title>Home</title>
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
        <a class="nav-link" href="landing.php?id=<?php echo $_SESSION['id_user'];?>" style="font-size: 25px;">Home <span class="sr-only">(current)</span></a>
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

			<!--card col-->
			<div class="col-10" style="margin-left: 300px;">
				<div class="container py-4 my-2">
				<div class="row">
				<div class="col-9" style="background:lightgray; height:auto; border-radius:10px">
				<form action="" method="post" style="justify-content: center">
				<table class="table">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama produk</th>
						<th>Harga</th>
						<th>jumlah</th>
						<th>subharga</th>
					</tr>
						</thead>
					<tbody>
						<?php $nomor=1;?>
                        <?php $totalharga=0;?>
						<?php foreach ($_SESSION["keranjang"] as $id =>$jumlah):?>
						<?php
						$cart = $koneksi->query("select*from produk where id='$id'");
						$dataproduk = $cart-> fetch_assoc();
						$subharga = $dataproduk["price"]*$jumlah;
						?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $dataproduk["produkname"];?></td>
							<td>Rp.<?php echo number_format ($dataproduk["price"]);?></td>
							<td><?php echo $jumlah;?></td>
							<td>Rp.<?php echo number_format($subharga);?></td>
						</tr>
						<?php $nomor++;?>
                        <?php $totalharga+=$subharga;?>
						<?php endforeach ?>
						</tbody>
                        <tfoot>
                        <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalharga)?></th>
                        </tr>
                        </tfoot>
						</table>
                        <form method="post">
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 10px">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $simpan["nama_lengkap"]?>"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $simpan["no_tlp"]?>"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $simpan["alamat"]?>"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 10px">
                            <select class="form-control" name="id_ongkir">
                                <option value="">pilih ongkos kirim</option>
                                <?php
                                $data=$koneksi->query("SELECT * FROM ongkir");
                              while ( $dataongkir=$data->fetch_assoc()){
                                ?>
                                <option value=" <?php echo $dataongkir['id_ongkir']?>">
                                <?php echo $dataongkir['kota']?>  -
                                <?php echo $dataongkir['tarif']?>
                                </option>
                              <?php } ?>
                             </select>  
                            </div>
                        </div>
                        <div class="form-grup">
                        <label>Alamat pengiriman</label>
                        <textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap untuk peniriman (kode pos,kecamatan,dan kelurahan)"></textarea>
                        </div>
                        <button class="btn btn-primary" name="bayar" style="margin-top: 10px;margin-bottom:15px">bayar</button>
                        </form>
                        <?php
                        if (isset($_POST["bayar"])){
                            $id_pelanggan = $simpan["id_user"];
                            $id_ong = $_POST["id_ongkir"];
                            $tanggal_pembelian = date("y-m-d");
                            $alamat_pengiriman = $_POST['alamat_pengiriman'];

                            $data=$koneksi->query("SELECT * FROM ongkir Where id_ongkir='$id_ong'");
                            $arrongkir = $data->fetch_assoc();
                            $nama_kota = $arrongkir['kota'];
                            $tarif = $arrongkir['tarif'];

                            $total_pembelian = $totalharga + $tarif;

                            $koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian, nama_kota,
                            tarif,total_pembelian,alamat_pengiriman) 
                            VALUES('$id_pelanggan','$id_ong','$tanggal_pembelian','$nama_kota','$tarif','$total_pembelian','$alamat_pengiriman')");

                            $id_pembelian_baru = $koneksi->insert_id;
                            foreach($_SESSION["keranjang"] as $id_produk => $jumlah){
                                $koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,jumlah)
                                VALUES('$id_pembelian_baru','$id_produk','$jumlah')");
                            }

                            $koneksi->query("UPDATE produk SET stok_produk = stok_produk-$jumlah
                            WHERE id='$id_produk'");

                            unset($_SESSION["keranjang"]);

                            echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
                        }
                        
                        ?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>




	

