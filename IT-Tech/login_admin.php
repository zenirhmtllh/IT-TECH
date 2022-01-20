<!doctype html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
@import url("loginStyle.css");
</style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<html>
<head>
<title>Login admin</title>
<link rel="shorcut icon" href="logo.png">
	<link href="https://fonts.googleapis.com/css?family=Rationale&display=swap" rel="stylesheet">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
@import url("loginStyle.css");
</style>
</head>

<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<center>
				<img src="logo.png">
			    </center>
			</div>
			<div class="card-body">
				<center>
				<h3 style="">LOGIN ADMIN</h3>
				</center>
				<form action="prosess_admin.php" method="post">
					<?php 
						if(isset($_GET['pesan'])){
							if($_GET['pesan'] == "gagal"){
								echo "Login gagal! username dan password salah!";
							}else if($_GET['pesan'] == "logout"){
								echo "Anda telah berhasil logout";
							}else if($_GET['pesan'] == "belum_login"){
								echo "Anda harus login untuk mengakses halaman Admin";
							}
						}
						?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input class="form-control" type="text" name="username" placeholder="Username" />
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
						</div>
						<input class="form-control" type="password" name="password" placeholder="password" />
					</div>
					<div class="form-group">
						<center>
							<button  name="login" class="log">Login</button>
						</center>
					</div>
					<div class="d-flex justify-content-center">
					<a href="login.php">LOGIN sebagai user</a>
				</div>
				</form>
			</div>
				
			</div>
		</div>
	</div>
</body>
</html>


