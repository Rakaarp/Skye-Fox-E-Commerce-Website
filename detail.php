<?php session_start(); ?>
<?php
include 'koneksi.php';
?>
<?php
$id_produk = $_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
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

				<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
					Shop
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					<?php echo $detail['nama_produk']; ?>
				</span>
			</div>
		</div>


		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60 mt-5 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="foto_produk/<?php echo $detail["foto_produk"]; ?>">
										<div class="wrap-pic-w pos-relative">
											<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="foto_produk/<?php echo $detail["foto_produk"]; ?>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?php echo $detail["nama_produk"]; ?>
							</h4>

							<span class="mtext-106 cl2">
								Rp. <?php echo number_format($detail["harga_produk"]); ?>
							</span>

							<p class="stext-100 cl3 p-t-20">
							<h2 class="stext-106 cl2 js-name-detail p-t-23">
								Stok :
							</h2> <br>
							<?php echo $detail["stok_produk"]; ?>
							</p>

							<p class="stext-100 cl3 p-t-20">
							<h2 class="stext-106 cl2 js-name-detail p-t-23">
								Berat :
							</h2> <br>
							<?php echo $detail["berat_produk"]; ?> Gr.
							</p>

							<p class="stext-100 cl3 p-t-20">
							<h2 class="stext-106 cl2 js-name-detail p-t-23">
								Deskripsi :
							</h2> <br>
							<?php echo $detail["deskripsi_produk"]; ?>
							</p>
							<br>

							<form method="post">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" min="1" value="1" max="<?php echo $detail["stok_produk"]; ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" name="beli">
											Add to cart
										</button>
									</div>
								</div>
							</form>
							<?php
							if (isset($_POST["beli"])) {
								//mendapatkan jumlah yang diinputkan
								$jumlah = $_POST["jumlah"];
								//masukkan di keranjang belanja
								$_SESSION["keranjang"][$id_produk] = $jumlah;

								echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
								echo "<script>location='keranjang.php';</script>";
							}
							?>

						</div>

						<!--  -->

					</div>
				</div>
			</div>
		</section>
<?php 
include 'footer.php';
?>

</body>

</html>