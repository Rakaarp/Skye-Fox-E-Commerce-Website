<head>
	<title>Skye & Fox</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/iconlogo.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<!-- Logo desktop -->
					<a href="index.php" class="logo">
						<img src="images/icons/logoskye.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="produk.php">Shop</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>

							<!-- login -->
							<?php if (isset($_SESSION["pelanggan"])) : ?>
								<li>
									<a href="logout.php">Logout</a>
								</li>

								<!-- jika belum login -->
							<?php else : ?>
								<li>
									<a href="login.php">Login</a>
								</li>
							<?php endif ?>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">
						<div class="flex-c-m h-full p-r-24">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
								<i class="zmdi zmdi-search"></i>
							</div>
						</div>

						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logoskye.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="produk.php">Shop</a>
				</li>

				<li>
					<a href="about.php">About</a>
				</li>

				<li>
					<a href="contact.php">Contact</a>
				</li>

				<!-- login -->
				<?php if (isset($_SESSION["pelanggan"])) : ?>
					<li>
						<a href="riwayat.php">Order History</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>

					<!-- jika belum login -->
				<?php else : ?>
					<li>
						<a href="login.php">Login</a>
					</li>
				<?php endif ?>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form action="pencarian.php" method="get" class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="keyword" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

		<!-- Sidebar -->
		<aside class="wrap-sidebar js-sidebar">
			<div class="s-full js-hide-sidebar"></div>

			<div class="sidebar flex-col-l p-t-22 p-b-25">
				<div class="flex-r w-full p-b-30 p-r-27">
					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>

				<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
					<ul class="sidebar-link w-full">
						<li class="p-b-13">
							<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
								Home
							</a>
						</li>

						<li class="p-b-13">
							<a href="produk.php" class="stext-102 cl2 hov-cl1 trans-04">
								Shop
							</a>
						</li>

						<?php if (isset($_SESSION["pelanggan"])) : ?>
							<li class="p-b-13">
								<a href="keranjang.php" class="stext-102 cl2 hov-cl1 trans-04">
									Shopping Cart
								</a>
							</li>

							<li class="p-b-13">
								<a href="riwayat.php" class="stext-102 cl2 hov-cl1 trans-04">
									Order History
								</a>
							</li>

							<li class="p-b-13">
								<a href="editprofil.php" class="stext-102 cl2 hov-cl1 trans-04">
									Edit Profil
								</a>
							</li>

							<li class="p-b-13">
								<a href="logout.php" class="stext-102 cl2 hov-cl1 trans-04">
									Logout
								</a>
							</li>

						<?php else : ?>
							<li class="p-b-13">
								<a href="login.php" class="stext-102 cl2 hov-cl1 trans-04">
									Login
								</a>
							</li>
						<?php endif ?>
					</ul>

					<div class="sidebar-gallery w-full p-tb-30">
						<span class="mtext-101 cl5">
							Skye & Fox
						</span>

						<div class="flex-w flex-sb p-t-36 gallery-lb">
							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/1.png" data-lightbox="gallery" style="background-image: url('images/project/1.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/2.png" data-lightbox="gallery" style="background-image: url('images/project/2.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/3.png" data-lightbox="gallery" style="background-image: url('images/project/3.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/4.png" data-lightbox="gallery" style="background-image: url('images/project/4.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/5.png" data-lightbox="gallery" style="background-image: url('images/project/5.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/6.png" data-lightbox="gallery" style="background-image: url('images/project/6.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/7.png" data-lightbox="gallery" style="background-image: url('images/project/7.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/8.png" data-lightbox="gallery" style="background-image: url('images/project/8.png');"></a>
							</div>

							<!-- item gallery sidebar -->
							<div class="wrap-item-gallery m-b-10">
								<a class="item-gallery bg-img1" href="images/project/9.png" data-lightbox="gallery" style="background-image: url('images/project/9.png');"></a>
							</div>
						</div>
					</div>

					<div class="sidebar-gallery w-full">
						<span class="mtext-101 cl5">
							About Us
						</span>

						<p class="stext-108 cl6 p-t-27">
						Skye & Fox is a clothing-line brand that originally focused on casual shirts. Now, after being acquired by Tama Kreasi, Skye & Fox has expanded into various trendy clothing for teenagers and young adults. Skye & Fox aims to offer a "fun" and "stylish" concept for the youth. We strive to provide the best garment quality to our customers while keeping the prices affordable. We already have our own website dedicated to sales and collaborate with several e-commerce platforms in Indonesia.
						</p>
					</div>
				</div>
			</div>
		</aside>