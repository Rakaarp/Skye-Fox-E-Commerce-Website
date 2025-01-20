<?php
session_start();
//koneksi ke database
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

		<!-- Product -->
		<section class="sec-product bg0 p-t-100 p-b-50">
			<div class="container">
				<div class="p-b-32">
					<h3 class="ltext-105 cl5 txt-center respon1">
						Store Overview
					</h3>
				</div>

				<!-- Tab panes -->
				<div class="row">
					<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
					<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
						<!-- Block2 -->
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="IMG-PRODUCT">


								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $perproduk['nama_produk']; ?>
										</a>

										<span class="stext-105 cl3">
											Rp. <?php echo number_format($perproduk['harga_produk']); ?>
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
									<button type="button" class="btn btn-info btn-rounded btn-icon">
                        <i class="fa fa-shopping-cart"></i>
					</button>
				</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>


<?php 
include 'footer.php';
?>

</body>

</html>