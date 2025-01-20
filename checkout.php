<?php
session_start();

// echo"<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';
if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
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

	body {
		margin-top: 20px;
	}

	select.form-control:not([size]):not([multiple]) {
		height: 44px;
	}

	select.form-control {
		padding-right: 38px;
		background-position: center right 17px;
		background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
		background-repeat: no-repeat;
		background-size: 9px 9px;
	}

	.form-control:not(textarea) {
		height: 44px;
	}

	.form-control {
		padding: 0 18px 3px;
		border: 1px solid #dbe2e8;
		border-radius: 22px;
		background-color: #fff;
		color: #606975;
		font-family: "Maven Pro", Helvetica, Arial, sans-serif;
		font-size: 14px;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
	}

	.shopping-cart,
	.wishlist-table,
	.order-table {
		margin-bottom: 20px
	}

	.shopping-cart .table,
	.wishlist-table .table,
	.order-table .table {
		margin-bottom: 0
	}

	.shopping-cart .btn,
	.wishlist-table .btn,
	.order-table .btn {
		margin: 0
	}

	.shopping-cart>table>thead>tr>th,
	.shopping-cart>table>thead>tr>td,
	.shopping-cart>table>tbody>tr>th,
	.shopping-cart>table>tbody>tr>td,
	.wishlist-table>table>thead>tr>th,
	.wishlist-table>table>thead>tr>td,
	.wishlist-table>table>tbody>tr>th,
	.wishlist-table>table>tbody>tr>td,
	.order-table>table>thead>tr>th,
	.order-table>table>thead>tr>td,
	.order-table>table>tbody>tr>th,
	.order-table>table>tbody>tr>td {
		vertical-align: middle !important
	}

	.shopping-cart>table thead th,
	.wishlist-table>table thead th,
	.order-table>table thead th {
		padding-top: 17px;
		padding-bottom: 17px;
		border-width: 1px
	}

	.shopping-cart .remove-from-cart,
	.wishlist-table .remove-from-cart,
	.order-table .remove-from-cart {
		display: inline-block;
		color: #ff5252;
		font-size: 18px;
		line-height: 1;
		text-decoration: none
	}

	.shopping-cart .count-input,
	.wishlist-table .count-input,
	.order-table .count-input {
		display: inline-block;
		width: 100%;
		width: 86px
	}

	.shopping-cart .product-item,
	.wishlist-table .product-item,
	.order-table .product-item {
		display: table;
		width: 100%;
		min-width: 150px;
		margin-top: 5px;
		margin-bottom: 3px
	}

	.shopping-cart .product-item .product-thumb,
	.shopping-cart .product-item .product-info,
	.wishlist-table .product-item .product-thumb,
	.wishlist-table .product-item .product-info,
	.order-table .product-item .product-thumb,
	.order-table .product-item .product-info {
		display: table-cell;
		vertical-align: top
	}

	.shopping-cart .product-item .product-thumb,
	.wishlist-table .product-item .product-thumb,
	.order-table .product-item .product-thumb {
		width: 130px;
		padding-right: 20px
	}

	.shopping-cart .product-item .product-thumb>img,
	.wishlist-table .product-item .product-thumb>img,
	.order-table .product-item .product-thumb>img {
		display: block;
		width: 100%
	}

	@media screen and (max-width: 860px) {

		.shopping-cart .product-item .product-thumb,
		.wishlist-table .product-item .product-thumb,
		.order-table .product-item .product-thumb {
			display: none
		}
	}

	.shopping-cart .product-item .product-info span,
	.wishlist-table .product-item .product-info span,
	.order-table .product-item .product-info span {
		display: block;
		font-size: 13px
	}

	.shopping-cart .product-item .product-info span>em,
	.wishlist-table .product-item .product-info span>em,
	.order-table .product-item .product-info span>em {
		font-weight: 500;
		font-style: normal
	}

	.shopping-cart .product-item .product-title,
	.wishlist-table .product-item .product-title,
	.order-table .product-item .product-title {
		margin-bottom: 6px;
		padding-top: 5px;
		font-size: 16px;
		font-weight: 500
	}

	.shopping-cart .product-item .product-title>a,
	.wishlist-table .product-item .product-title>a,
	.order-table .product-item .product-title>a {
		transition: color .3s;
		color: #374250;
		line-height: 1.5;
		text-decoration: none
	}

	.shopping-cart .product-item .product-title>a:hover,
	.wishlist-table .product-item .product-title>a:hover,
	.order-table .product-item .product-title>a:hover {
		color: #0da9ef
	}

	.shopping-cart .product-item .product-title small,
	.wishlist-table .product-item .product-title small,
	.order-table .product-item .product-title small {
		display: inline;
		margin-left: 6px;
		font-weight: 500
	}

	.wishlist-table .product-item .product-thumb {
		display: table-cell !important
	}

	@media screen and (max-width: 576px) {
		.wishlist-table .product-item .product-thumb {
			display: none !important
		}
	}

	.shopping-cart-footer {
		display: table;
		width: 100%;
		padding: 10px 0;
		border-top: 1px solid #e1e7ec
	}

	.shopping-cart-footer>.column {
		display: table-cell;
		padding: 5px 0;
		vertical-align: middle
	}

	.shopping-cart-footer>.column:last-child {
		text-align: right
	}

	.shopping-cart-footer>.column:last-child .btn {
		margin-right: 0;
		margin-left: 15px
	}

	@media (max-width: 768px) {
		.shopping-cart-footer>.column {
			display: block;
			width: 100%
		}

		.shopping-cart-footer>.column:last-child {
			text-align: center
		}

		.shopping-cart-footer>.column .btn {
			width: 100%;
			margin: 12px 0 !important
		}
	}

	.coupon-form .form-control {
		display: inline-block;
		width: 100%;
		max-width: 235px;
		margin-right: 12px;
	}

	.form-control-sm:not(textarea) {
		height: 36px;
	}
</style>

<?php 
include 'header.php';
?>
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<a href="produk.php" class="stext-109 cl8 hov-cl1 trans-04">
					Shop
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<a href="keranjang.php" class="stext-109 cl8 hov-cl1 trans-04">
					Shoping cart
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					Checkout
				</span>
			</div>
		</div>


		<!-- Shoping Cart -->
		<form class="bg0 p-t-75 p-b-85" method="post">
			<div class="container padding-bottom-3x mb-1">
				<h4 class="mtext-109 cl2 p-b-30">
					Product Details
				</h4>
				<div class="table-responsive shopping-cart">
					<table class="table">
						<thead>
							<tr>
								<th>Product Name</th>
								<th class="text-center">Price</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $nomor = 1; ?>
							<?php $totalberat=0; ?>
							<?php $totalbelanja = 0; ?>
							<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
								<!-- menampilkan produk yang di perulangkan -->
								<?php
								$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
								$pecah = $ambil->fetch_assoc();
								$subharga = $pecah["harga_produk"] * $jumlah;
								//subberat diperoleh dari berat produk X jumlah
								$subberat = $pecah["berat_produk"] * $jumlah;
								//totalberat
								$totalberat+=$subberat;
								?>
								<tr>
									<td>
										<div class="product-item">
											<a class="product-thumb" href="#"><img src="foto_produk/<?php echo $pecah["foto_produk"]; ?>" alt="Product"></a>
											<div class="product-info">
												<h4 class="product-title"><?php echo $pecah["nama_produk"]; ?></h4>
											</div>
										</div>
									</td>
									<td class="text-center">
										<?php echo $jumlah; ?>
									</td>
									<td class="text-center text-lg text-medium">Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
									<td class="text-center text-lg text-medium">Rp. <?php echo number_format($subharga); ?></td>
								</tr>
								<?php $nomor++; ?>
								<?php $totalbelanja += $subharga; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="shopping-cart-footer">
					<div class="column text-lg">Subtotal: <span class="text-medium"><Strong>Rp. <?php echo number_format($totalbelanja) ?></Strong></span></div>
				</div>
				<div class="form-group">
					<label>Input Product Size</label>
					<textarea class="form-control" name="catatan" id="" cols="30" rows="10" placeholder="nama produk:ukuran ; nama produk:ukuran
(contoh Brachium : XL)"></textarea>
				</div>
				<hr>
				<h4 class="mtext-109 cl2 p-b-30 mt-5">
					Input Delivery Details
				</h4>
				<div class="row mb-5">
					<div class="col-md-3">
						<div class="form-group">
							<label class="stext-110 cl2">Province</label>
							<select class="form-control" name="nama_provinsi">

							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="stext-110 cl2">District</label>
							<select class="form-control" name="nama_distrik">

							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="stext-110 cl2">Expedition</label>
							<select class="form-control" name="nama_ekspedisi">

							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="stext-110 cl2">Package</label>
							<select class="form-control" name="nama_paket">

							</select>
						</div>
					</div>
				</div>
				<hr>
				<h4 class="mtext-109 cl2 p-b-30 mt-5">
					Delivery Details
				</h4>
				<div class="row mt-2">
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Name:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Phone Number:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Email:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<?php echo $_SESSION["pelanggan"]['email_pelanggan'] ?>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Province
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="provinsi">
							</p>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								District:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="distrik">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Type:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="tipe">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Postcode:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="kodepos">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Expedition:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="ekspedisi">
							</p>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Package:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="paket">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Delivery Fee:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="ongkir">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Estimate:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="estimasi">
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="stext-110 cl2">
								Total Weight:
							</span>
							<p class="stext-111 cl6 p-t-2">
								<input type="text" name="total_berat" value="<?php echo $totalberat ;?>">
							</p>
						</div>
					</div>
				</div>
				<div class="form-floating mb-4">
					<span class="stext-110 cl2 mb-4">
						Address:
					</span>
					<textarea class="form-control" placeholder="Masukkan Alamat Lengkap" name="alamat_pengiriman" style="height: 100px"></textarea>

				</div>
				<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="checkout">
					Proceed to Checkout
				</button>
			</div>
		</form>
		<?php
		if (isset($_POST["checkout"])) {
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
			$tanggal_pembelian = date("Y-m-d");
			$alamat_pengiriman = $_POST['alamat_pengiriman'];
			$catatan = $_POST['catatan'];

			$totalberat = $_POST["total_berat"];
			$provinsi = $_POST["provinsi"];
			$distrik = $_POST["distrik"];
			$tipe = $_POST["tipe"];
			$kodepos = $_POST["kodepos"];
			$ekspedisi = $_POST["ekspedisi"];
			$paket = $_POST["paket"];
			$ongkir = $_POST["ongkir"];
			$estimasi = $_POST["estimasi"];
			

			$total_pembelian = $totalbelanja + $ongkir;

			// menyimpan data ke tabel pembelian
			$koneksi->query("INSERT INTO pembelian (
                id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pengiriman,totalberat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi,catatan)
                VALUES ('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman','$totalberat','$provinsi','$distrik','$tipe',
				'$kodepos','$ekspedisi','$paket','$ongkir','$estimasi','$catatan')");

			// mendapatkan id pembelian
			$id_pembelian_barusan = $koneksi->insert_id;

			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$perproduk = $ambil->fetch_assoc();

				$nama = $perproduk['nama_produk'];
				$harga = $perproduk['harga_produk'];
				$berat = $perproduk['berat_produk'];

				$subberat = $perproduk['berat_produk'] * $jumlah;
				$subharga = $perproduk['harga_produk'] * $jumlah;
				$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
                VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah') ");

				// skrip update stok
				$koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
				WHERE id_produk='$id_produk'");
			}

			//mengkosongkan keranjang belanja
			unset($_SESSION["keranjang"]);

			// tampilan dialihkan ke halaman nota
			echo "<script>alert('Pembelian Sukses');</script>";
			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		}
		?>
<?php 
include 'footer.php';
?>

		<script>
			$(document).ready(function() {
				$.ajax({
					type: 'post',
					url: 'dataprovinsi.php',
					success: function(hasil_provinsi) {
						$("select[name=nama_provinsi]").html(hasil_provinsi);
					}
				});

				$("select[name=nama_provinsi]").on("change", function() {
					//ambil id_provinsi yang dipilih (dari atribut pribadi)
					var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
					$.ajax({
						type: 'post',
						url: 'datadistrik.php',
						data: 'id_provinsi=' + id_provinsi_terpilih,
						success: function(hasil_distrik) {
							$("select[name=nama_distrik]").html(hasil_distrik);
						}
					});
				});

				$.ajax({
					type: 'post',
					url: 'dataekspedisi.php',
					success: function(hasil_ekspedisi) {
						$("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
					}
				});

				$("select[name=nama_ekspedisi]").on("change", function() {
					//mendapatkan data ongkos kirim

					//mendapatkan ekspedisi yang dipilih
					var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
					//mendaptakan id_distrik yang dipilih pengguna
					var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
					//mendapatkan total_berat dari inputan
					var total_berat = $("input[name=total_berat]").val();
					$.ajax({
						type: 'post',
						url: 'datapaket.php',
						data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
						success: function(hasil_paket) {
							// console.log(hasil_paket);
							$("select[name=nama_paket]").html(hasil_paket);

							//letakkan nama ekspedisi terpilih di input ekspedisi
							$("input[name=ekspedisi]").val(ekspedisi_terpilih);
						}
					})
				});
				$("select[name=nama_distrik]").on("change", function() {
					var prov = $("option:selected", this).attr("nama_provinsi");
					var dist = $("option:selected", this).attr("nama_distrik");
					var tipe = $("option:selected", this).attr("tipe_distrik");
					var kodepos = $("option:selected", this).attr("kodepos");

					$("input[name=provinsi]").val(prov);
					$("input[name=distrik]").val(dist);
					$("input[name=tipe]").val(tipe);
					$("input[name=kodepos]").val(kodepos);
				});

				$("select[name=nama_paket]").on("change", function() {
					var paket = $('option:selected', this).attr("paket");
					var ongkir = $('option:selected', this).attr("ongkir");
					var etd = $('option:selected', this).attr("etd");

					$("input[name=paket]").val(paket);
					$("input[name=ongkir]").val(ongkir);
					$("input[name=estimasi]").val(etd);
				})
			});
		</script>


</body>

</html>