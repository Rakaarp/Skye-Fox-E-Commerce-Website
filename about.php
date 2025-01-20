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
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							About Us
						</h3>

						<p class="stext-113 cl6 p-b-26">
                        Skye & Fox is a clothing-line brand that originally focused on casual shirts. Now, after being acquired by Tama Kreasi, Skye & Fox has expanded into various trendy clothing for teenagers and young adults. Skye & Fox aims to offer a "fun" and "stylish" concept for the youth. We strive to provide the best garment quality to our customers while keeping the prices affordable. We already have our own website dedicated to sales and collaborate with several e-commerce platforms in Indonesia.
						</p>

						<p class="stext-113 cl6 p-b-26">
                        We have partnerships with various large companies throughout Indonesia. Looking ahead, our aspiration is to contribute to and collaborate with multinational corporations beyond Indonesia.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Any questions? Let us know in store at : <br>
                            Ruko Golden 8, Blk. A No.06, West Pakulonan, Kelapa Dua, Tangerang Regency, Banten 15810 <br>
                            <i class="fa fa-phone" aria-hidden="true"></i>  (+62) 88-222-035-777
						</p>
                        <p class="stext-113 cl6 p-b-26">
							
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/about-1.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
                        Our Mission at Skye & Fox is to empower and inspire the youth to express their unique personalities through fun and stylish clothing. We strive to be the go-to brand for young individuals seeking high-quality garments that not only reflect the latest trends but also embody comfort and confidence. With our wide range of contemporary clothing options, we aim to become a one-stop destination for the fashion-forward youth.<br><br>
                        Driven by a passion for excellence, we are committed to delivering the best-in-class products while ensuring affordability. Our dedication to maintaining the highest standards of craftsmanship and material selection enables us to provide customers with clothing that stands the test of time.<br><br>
                        We believe in fostering creativity, inclusivity, and a sense of belonging within our community. Through our vibrant designs and versatile collections, we aim to create a space where individuals can freely express themselves and celebrate their individuality.<br><br>
                        Furthermore, we are determined to forge meaningful partnerships and collaborations, both locally and globally. By teaming up with like-minded businesses and multinational enterprises, we seek to expand our reach and impact, sharing our vision of youthful expression with the world.<br><br>
                        In all our endeavors, we are guided by a commitment to customer satisfaction, ethical business practices, and environmental responsibility. We continuously strive to evolve, innovate, and set new benchmarks in the fashion industry, all while making a positive difference in the lives of the youth we serve.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
                            Elegance is not standing out, but being remembered.
							</p>

							<span class="stext-111 cl8">
								- Giorgio Armani
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-002.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
<?php 
include 'footer.php';
?>

</body>

</html>