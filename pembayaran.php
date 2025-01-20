<?php
session_start();
//koneksi ke database
include 'koneksi.php';

//jika tidak ada session pelanggan (belom login)
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}


// mendapatkan id pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

// mendapatkan id pelanggan yg beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login != $id_pelanggan_beli) {
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php';</script>";
}

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

		<!-- koding disini -->
		<div class="container mt-5 mb-5">
			<h2>Payments Confirmation</h2><br>
			<p>Please Upload your Payment Receipt here!</p><br>
			<div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank">
				</div>
				<div class="form-group">
					<label>Total Payments</label>
					<input type="number" class="form-control" name="jumlah" min="1">
				</div>
				<div class="form-group">
					<label>Payment Receipt</label>
					<input type="file" class="form-control" name="bukti">
					<p class="text-danger">Payment Receipt not more than 2MB</p>
				</div>
				<button class="btn btn-primary" name="kirim">Send</button>
			</form>
		</div>

		<?php
		//jika ada tombol kirim 
		if (isset($_POST["kirim"])) {
			// upload dulu foto bukti
			$namabukti = $_FILES["bukti"]["name"];
			$lokasibukti = $_FILES["bukti"]["tmp_name"];
			$namafiks = date("YmdHis") . $namabukti;
			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

			$nama = $_POST["nama"];
			$bank = $_POST["bank"];
			$jumlah = $_POST["jumlah"];
			$tanggal = date("Y-m-d");

			//simpan pembayaran
			$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

			// update data pembeliannya dari pending menjadi sudah kirim pembayaran
			$koneksi->query("UPDATE pembelian SET status_pembelian='Paid'
                WHERE id_pembelian='$idpem'");

			echo "<script>alert('Terimakasih telah melakukan pembayaran');</script>";
			echo "<script>location='riwayat.php';</script>";
		}
		?>

<?php 
include 'footer.php';
?>

</body>

</html>