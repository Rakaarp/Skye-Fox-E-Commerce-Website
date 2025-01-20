<?php
session_start();
include 'koneksi.php';

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
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					Receipt
				</span>
			</div>
		</div>


		<section class="konten">
			<div class="container mt-5 mb-5">
				<?php
				$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
				$detail = $ambil->fetch_assoc();
				?>
				<!-- <pre><?php print_r($detail); ?></pre> -->
				<div class="row mb-4">
					<div class="col-md-4 mb-4">
						<h3>Purchase</h3><br>
						<strong>Purchase Number: <?php echo $detail['id_pembelian']; ?></strong><br>
						Date : <?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])) ; ?><br>
						<strong>Total : Rp. <?php echo number_format($detail['total_pembelian']); ?></strong> <br>
						Product Size : <?php echo $detail['catatan']; ?>
					</div>
					<div class="col-md-4 mb-4">
						<h3>
							Customer
						</h3><br>
						<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
						<p>
							<?php echo $detail['telepon_pelanggan']; ?> <br>
							<?php echo $detail['email_pelanggan']; ?>
						</p>
					</div>
					<div class="col-md-4 mb-4">
						<h3>Delivery</h3><br>
						<strong><?php echo $detail['alamat_pengiriman']; ?></strong><br>
						<strong>Delivery Fee : Rp. <?php echo number_format($detail['ongkir']); ?></strong><br>
						Expedition : <?php echo $detail['ekspedisi']; ?> <?php echo $detail['paket']; ?> <?php echo $detail['estimasi']; ?><br>
						Address : <?php echo $detail['tipe']; ?> <?php echo $detail['distrik']; ?> <?php echo $detail['provinsi']; ?><br>
					</div>

				</div>

				<table class="table table-bordered mb-4">
					<thead>
						<tr>
							<th>No</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Weight</th>
							<th>Quantity</th>
							<th>Total Weight</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
						<?php while ($pecah = $ambil->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td><?php echo $pecah['berat']; ?> Gr.</td>
								<td><?php echo $pecah['jumlah']; ?></td>
								<td><?php echo $pecah['subberat']; ?> Gr.</td>
								<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
							</tr>
							<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>

				<div class="row">
					<div class="col-md-7">
						<div class="alert alert-info">
							<p>
								silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
								<strong>BANK BRI 123-456789-1234 AN. Raka Pratama Brata</strong>
							</p>
						</div>
					</div>
				</div>
				<a href="index.php" class="btn btn-primary btn-sm">Home</a>
				<a href="riwayat.php" class="btn btn-secondary btn-sm">Order History</a>

			</div>
		</section>
<?php 
include 'footer.php';
?>

</body>

</html>