<h2>Detail Pembelian</h2>
<?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php print_r($detail); ?></pre> -->

<div class="row mb-4">
					<div class="col-md-4 mb-4">
						<h3>Pembelian</h3>
						<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
						Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
						Total : Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
                        Ukuran Produk : <?php echo $detail['catatan']; ?>
					</div>
					<div class="col-md-4 mb-4">
						<h3>
							Pelanggan
						</h3>
						<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
						<p>
							<?php echo $detail['telepon_pelanggan']; ?> <br>
							<?php echo $detail['email_pelanggan']; ?>
						</p>
					</div>
					<div class="col-md-4 mb-4">
						<h3>Pengiriman</h3>
						<strong><?php echo $detail['alamat_pengiriman']; ?></strong><br>
						Ongkos kirim : Rp. <?php echo number_format($detail['ongkir']); ?><br>
						Ekspedisi : <?php echo $detail['ekspedisi']; ?> <?php echo $detail['paket']; ?> <?php echo $detail['estimasi']; ?><br>
						Alamat : <?php echo $detail['tipe']; ?> <?php echo $detail['distrik']; ?> <?php echo $detail['provinsi']; ?><br>
					</div>

				</div>

<table class="table table-bordered mb-5">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
<?php $nomor=1; ?>
<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk 
WHERE pembelian_produk.id_pembelian='$_GET[id]'") ?>
<?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
                <?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
            </td>
        </tr>
<?php $nomor++; ?>
<?php } ?>
    </tbody>
</table>