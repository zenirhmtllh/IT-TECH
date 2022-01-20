<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
@import url("registerStyle.css");
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
<title>REGISTER</title>
	<link rel="shorcut icon" href="logo.png">
	<link href="https://fonts.googleapis.com/css?family=Rationale&display=swap" rel="stylesheet">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../../../Users/Frozen/Desktop/impalHTML/styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center ">
		<div class="card">
			<div class="card-header">
				<center>
				<img src="logo.png">
			    </center>
			</div>
			<div class="card-body">
				<center>
				<h3 style="">REGISTER</h3>
				</center>
				<form method="post" action="registerproses.php">
					<label style="font-size: 12px">Nama Lengkap </label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="nama_lengkap">
						
					</div>
					<label style="font-size: 12px">No. KTP</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="number" class="form-nama" name="no_ktp" min="16">
					</div>
					<label style="font-size: 12px"> Alamat </label>

					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="alamat">

					</div>
					<label style="font-size: 12px">email</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="email">


					</div>
					<label style="font-size: 12px">username</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="text" class="form-nama" name="username">
					</div>
					
					<label style="font-size: 12px">password</label>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input type="password" class="form-nama" name="password">
					</div>
					
					<label style="font-size: 12px">Nomor Telfon</label>
					<div class="input-group form-group">
						
						<div class="input-group-prepend">
						</div>
						<input type="number" class="form-nama" name="no_tlp" min="1" href="login.php">
					</div>

					<div class="form-group">
						<center>
							<input type="submit" value="Daftar" class="btn daftar_btn" href="login.php" name="daftar">
						</center>
					</div>
				</form>
					<div class="d-flex justify-content-center">
					<a href="#">Sudah Memiliki Akun?</a>
				</div>
			</div>
				
			</div>
		</div>
	</div>
</body>
</html>