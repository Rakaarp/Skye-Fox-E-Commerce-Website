<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if(!isset($_SESSION['admin'])){
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<style>
    .bg-top{
        background-color: #073e65;
    }

    .top-bar {
        border-width: 60px;
    }

    .top-bars {
        height: 76px;
    }

    
</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skye & Fox Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="../assets/vendor/jquery/jquery.min.js"></script>

</head>
<!-- style="background-color: #073e65;" -->
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #073e65;">

            <!-- Sidebar - Brand -->
            <nav class="navbar navbar-light" style="background-color: #073e65;">
                <div class="container d-flex justify-content-center">
                    <a class="navbar-brand" href="home.php">
                        <img src="../assets/img/brand.jpeg" alt="" width="110" height="50" >
                    </a>
                </div>
            </nav>

            <img src="../assets/img/logo.jpg">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=kategori">
                <i class="fa fa-tags" aria-hidden="true"></i>
                    <span>Kategori Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=produk">
                    <i class="fas fa-box-open"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pembelian">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Pembelian</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=laporan_pembelian">
                    <i class="fas fa-book"></i>
                    <span>Laporan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pelanggan">
                    <i class="fas fa-users"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-top top-bars mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

 
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php
                    if (isset($_GET['halaman']))
                    {
                        if($_GET['halaman']=="produk")
                        {
                            include 'produk.php';
                        }
                        elseif($_GET['halaman']=="pembelian")
                        {
                            include 'pembelian.php';
                        }
                        elseif ($_GET['halaman']=="pelanggan") {
                            include 'pelanggan.php';
                        }
                        elseif($_GET['halaman']=="detail"){
                            include 'detail.php';
                        }
                        elseif($_GET['halaman']=="tambahproduk"){
                            include 'tambahproduk.php';
                        }
                        elseif ($_GET['halaman'] == "hapusproduk") {
                            include 'hapusproduk.php';
                        }
                        elseif($_GET['halaman']=="ubahproduk"){
                            include 'ubahproduk.php';
                        }
                        elseif($_GET['halaman']=="hapuspelanggan"){
                            include 'hapuspelanggan.php';
                        }
                        elseif($_GET['halaman']=="tambahpelanggan"){
                            include 'tambahpelanggan.php';
                        }
                        elseif($_GET['halaman']=="ubahpelanggan"){
                            include 'ubahpelanggan.php';
                        }
                        elseif($_GET['halaman']=="logout"){
                            include 'logout.php';
                        }
                        elseif($_GET['halaman']=="pembayaran"){
                            include 'pembayaran.php';
                        }
                        elseif($_GET['halaman']=="laporan_pembelian"){
                            include 'laporan_pembelian.php';
                        }
                        elseif($_GET['halaman']=="kategori"){
                            include 'kategori.php';
                        }
                        elseif($_GET['halaman']=="detailproduk"){
                            include 'detailproduk.php';
                        }
                        elseif($_GET['halaman']=="hapusfotoproduk"){
                            include 'hapusfotoproduk.php';
                        }
                        elseif($_GET['halaman']=="hapuskategori"){
                            include 'hapuskategori.php';
                        }
                        elseif($_GET['halaman']=="tambahkategori"){
                            include 'tambahkategori.php';
                        }
                    }
                    else
                    {
                        include 'home.php';
                    }
                ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>