<?php
session_start();
include 'koneksi.php';
?>

<!--
<br><br><br><pre><?php print_r($_SESSION); ?></pre>
-->

<!--ambil id pelanggan-->
<?php 
$id = $_SESSION['pelanggan']['id_pelanggan'];
$nama = $_SESSION['pelanggan']['nama_pelanggan'];
$telepon = $_SESSION['pelanggan']['telepon_pelanggan'];
$email = $_SESSION['pelanggan']['email_pelanggan'];
$password = $_SESSION['pelanggan']['password_pelanggan'];
$alamat = $_SESSION['pelanggan']['alamat_pelanggan'];
?>

<!DOCTYPE html>
<html lang="en">

<style>
	.slider {
		display: flex;
		overflow-x: scroll;
	}

	.slide-item {
		display: flex;
	}

	.block2 {
		flex: 0 0 33.33%;
		/* Set lebar 33.33% untuk masing-masing produk */
		margin-right: 15px;
		/* Jarak antara produk */
	}

	.cl2x {
		color: #ffffff;
		/* kode warna putih */
		text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
	}
</style>

<?php 
include 'header.php';
?>

<!--------------------KONTEN-------------------->
<section class="konten mb-5 mt-5">
	<div class="container">
		<br><h1>Edit Profil</h1><hr>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" name="telepon" class="form-control" value="<?php echo $telepon; ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>">
			</div>
			<button class="btn btn-primary mb-5" name="simpan">Save</button>
		</form>
		</div>
	</div>
</section>
<!--------------------UPDATE-------------------->

<?php
if (isset($_POST['simpan'])){
	$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',telepon_pelanggan='$_POST[telepon]',password_pelanggan='$_POST[password]',alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan=$id");

	echo "<script>alert('data anda telah disimpan, silahkan login kembali');</script>";
	echo "<script>location='login.php';</script>";
}

?>
<?php 
include 'footer.php';
?>

</body>

</html>