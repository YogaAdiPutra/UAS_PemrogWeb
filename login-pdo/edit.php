<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require 'proses/panggil.php';
	require 'koneksi.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $proses->tampil_data_id('tbl_user','id_login',$idGet);

	include 'nav.php';

?>	
	<div class="d-flex flex-column min-vh-100">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Edit Pengguna - <?php echo $hasil['nama_pengguna'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="proses/crud.php?aksi=edit" method="POST">
								<div class="form-group">
									<label>Nama </label>
									<input type="text" value="<?php echo $hasil['nama_pengguna'];?>" class="form-control" name="nama" required>
								</div>
								<div class="form-group">
									<label>nim</label>
									<input type="number" value="<?php echo $hasil['nim'];?>" class="form-control" name="nim" required>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="harga" value="<?php echo $hasil['email'];?>" class="form-control" name="email" required>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" required><?php echo $hasil['alamat'];?></textarea>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" value="<?php echo $hasil['username'];?>" class="form-control" name="user" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" value="" placeholder="ubah password" class="form-control" name="pass" required>
									<input type="hidden" value="<?php echo $hasil['id_login'];?>" class="form-control" name="id_login" required>
								</div>
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Edit Data</button>
								<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
		<?php
    // session start
    include 'footer.php';
?> 