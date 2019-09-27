<?php
//memasukkan file config.php
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">HALAMAN PENDATAAN</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>TABEL PENDATAAN</h2>
		<a href="tambah.php"> <button type="button" class="btn btn-info">Tambah Data</button></a>
		
		<hr>
		
		<table class="table">
    <thead>
      <tr>
        <th>NO.</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Aksi</th>
				</tr>
			</thead>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM data_nama ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['username'].'</td>
							<td>'.$data['password'].'</td>
							<td>'.$data['email'].'</td>
							<td>
								<a href="edit.php?id='.$data['id'].'" class="btn btn-success">Update</button>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>