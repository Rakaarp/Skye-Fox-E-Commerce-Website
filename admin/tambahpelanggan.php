<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" class="form-control" name="telepon">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>         
</form>
<?php 
    if(isset($_POST['save'])){
        $koneksi->query("INSERT INTO pelanggan
        (email_pelanggan, nama_pelanggan, telepon_pelanggan)
        VALUES('$_POST[email]','$_POST[nama]','$_POST[telepon]')");

        echo "<div class='alert alert-info'>Data Pelanggan Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
    }
?>
