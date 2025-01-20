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
<!-- Title page -->
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
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                <form class="user" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>

                    <button class="btn" style="background-color: #073e65; color: #ed9696;" name="login">Login</button>
                    </a>

                </form>
                <?php
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    //lakukan query cek akun di tabel pelanggan db
                    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

                    //hitung akun yang terambil
                    $akunyangcocok = $ambil->num_rows;

                    //jika terdapat akun yang cocok
                    if ($akunyangcocok == 1) {
                        $akun = $ambil->fetch_assoc();
                        $_SESSION['pelanggan'] = $akun;
                        echo "<script>alert('Berhasil Login! Terimakasih ^^');</script>";

                        // jika sudah belanja
                        if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
                            echo "<script>location='checkout.php';</script>";
                        } else {
                            echo "<script>location='riwayat.php';</script>";
                        }
                    } else {
                        echo "<script>alert('password/email salah');</script>";
                        echo "<script>location='login.php';</script>";
                    }
                }
                ?>
                <div class="text-center">
                    <a class="small" href="daftar.php">Create an Account!</a>
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