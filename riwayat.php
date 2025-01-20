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

		<!-- section -->
		<!-- <pre><?php print_r($_SESSION) ?></pre> -->
		<section class="riwayat">
			<div class="container mt-5 mb-5">
				<div class="row mb-4">
					<div class="col-md-4 mb-4">
						<h3>Order History of <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
					</div>
				</div>

				<table class="table table-bordered mb-4">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Total</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$nomor = 1;
						// mendapatkan id pelanggan yg login
						$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

						$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
						while ($pecah = $ambil->fetch_assoc()) {
						?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah["tanggal_pembelian"] ?></td>
								<td>
									<?php echo $pecah["status_pembelian"] ?>
									<br>
									<?php if (!empty($pecah['resi_pengiriman'])) : ?>
										Resi : <?php echo $pecah['resi_pengiriman']; ?>
									<?php endif ?>
								</td>
								<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
								<td>
									<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Receipt</a>

									<?php if ($pecah['status_pembelian']=="Pending"): ?>
										<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">
										<i class="fa fa-upload" aria-hidden="true"></i> Input Payment
									</a>
									<?php else: ?>
										<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">
										<i class="fa fa-files-o" aria-hidden="true"></i> Payment Details
										</a>
									<?php endif ?>
									
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php } ?>
					</tbody>

				</table>
			</div>

		</section>

<?php 
include 'footer.php';
?>

</body>

</html>