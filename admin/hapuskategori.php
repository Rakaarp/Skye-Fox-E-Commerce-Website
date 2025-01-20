<h2>HAPUS KATEGORI</h2>

<!--------------------AMBIL DATA-------------------->

<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

//--------------------HAPUS DATA--------------------

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori terhapus');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
?>