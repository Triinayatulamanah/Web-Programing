<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">HALAMAN PENDATAAN</a>
			<button class="navbar-toggler" type="button" data_nama-toggle="collapse" data_nama-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2><font color=black>HALAMAN PENGISIAN</color></h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$username		= $_POST['username'];
			$password		= $_POST['password'];
			$email			= $_POST['email'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM data_nama WHERE nama='$nama'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data_nama(nama, username, password, email) VALUES('$nama', '$username', '$password', '$email')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NAMA sudah terdaftar.</div>';
			}

			if (empty(nama) || empty(username) || empty(password) || empty(email)) {
				echo " <strong> Data harus diisi </strong>";
			}else{
			}
		}

		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" onkeypress="return event.charCode <48 || event.charCode >57" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">USERNAME</label>
				<div class="col-sm-10">
					<input type="text" name="username" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PASSWORD</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">EMAIL</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>