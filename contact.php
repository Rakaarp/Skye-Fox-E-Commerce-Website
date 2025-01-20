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
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-banner.jpg');"></section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <div class="how-bor2">
						<div class="hov-img0">
							<img src="images/contact-1.jpg" alt="IMG">
						</div>
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
                            Ruko Golden 8, Blk. A No.06, West Pakulonan, Kelapa Dua, Tangerang Regency, Banten 15810
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
                            (+62) 88-222-035-777
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
                            skyeandfox@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.18686958897!2d106.6341953!3d-6.2390843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fbf5c27dec2f%3A0x6ed35f5ae14e77db!2sRuko%20Golden%208!5e0!3m2!1sid!2sid!4v1690007767259!5m2!1sid!2sid" width="1920" height="397" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
<?php 
include 'footer.php';
?>

</body>

</html>