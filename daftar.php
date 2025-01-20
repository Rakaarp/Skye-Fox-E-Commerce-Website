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
            <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Come Join Us!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <label>Name :</label>
                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Insert Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Insert Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="text" class="form-control form-control-user" name="password" placeholder="Insert Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address :</label>
                                            <textarea type="text" class="form-control form-control-user" name="alamat" placeholder="Insert Full Address" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number :</label>
                                            <input type="text" class="form-control form-control-user" name="telepon" placeholder="Insert Phone Number" required>
                                        </div>
                                        <button class="btn" style="background-color: #073e65; color: #ed9696;" name="daftar">Join</button>
                                        </a>

                                    </form>
                                    <?php
                                    //ciptakan fungsi button
                                    if (isset($_POST["daftar"])) {
                                        // ambil isian nama email password alamat telepon
                                        $nama = $_POST["nama"];
                                        $email = $_POST["email"];
                                        $password = $_POST["password"];
                                        $alamat = $_POST["alamat"];
                                        $telepon = $_POST["telepon"];

                                        //cek apakah email sudah digunakan
                                        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                                        $yangcocok = $ambil->num_rows;
                                        if ($yangcocok == 1) {
                                            echo "<script>alert('Email sudah digunakan');</script>";
                                            echo "<script>location='daftar.php';</script>";
                                        } else {
                                            //query insert ke tabel
                                            $koneksi->query("INSERT INTO pelanggan
                                            (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan)
                                            VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");

                                            echo "<script>alert('Pendaftaran Sukses! Silahkan Login');</script>";
                                            echo "<script>location='login.php';</script>";
                                        }
                                    }
                                    ?>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>

</body>

</html>