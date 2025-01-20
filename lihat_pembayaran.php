<?php
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
    LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
    WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// jika belum ada data pembayaran
// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

if (empty($detbay)) {
    echo "<script>alert('belum ada data pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

//jika data pelanggan yang bayar pembayaran tidak sesuai dengan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if ($_SESSION["pelanggan"]['id_pelanggan'] != $detbay["id_pelanggan"]) {
    echo "<script>alert('anda tidak berhak melihat pembayaran orang lain');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
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
</style>

<?php 
include 'header.php';
?>

        <!-- koding disini -->
        <div class="container mt-5">
            <h3>Payments</h3>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><?php echo $detbay["nama"] ?></td>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <td><?php echo $detbay["bank"] ?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?php echo $detbay["tanggal"] ?></td>
                        </tr>
                        <tr>
                            <th>Total Payments</th>
                            <td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6 mb-5">
                    <img src="/bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
<?php 
include 'footer.php';
?>

</body>

</html>