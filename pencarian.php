<?php include 'koneksi.php'; ?>
<?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
        OR deskripsi_produk LIKE '%$keyword%'");

while($pecah = $ambil->fetch_assoc())
{
    $semuadata[]=$pecah;
}
// echo "<pre>";
// print_r($semuadata);
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

        <!-- koding disini -->
        <div class="container mt-5 mb-5">
            <h3>Hasil Pencarian : <?php echo $keyword ?></h3>

            <?php if (empty($semuadata)): ?>
                <div class="alert alert-danger mt-4">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
            <?php endif ?>

            <div class="row mt-4">
                <?php foreach ($semuadata as $key => $value): ?>
                
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
							<img src="foto_produk/<?php echo $value['foto_produk']; ?>" alt="IMG-PRODUCT">
                        </div>
                        
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $value['nama_produk']; ?>
								</a>
                                <span class="stext-105 cl3">
											Rp. <?php echo number_format($value['harga_produk']); ?>
								</span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
            </div>
        </div>





<?php 
include 'footer.php';
?>

</body>

</html>