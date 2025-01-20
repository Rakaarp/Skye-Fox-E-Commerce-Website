<h2>TAMBAH KATEGORI</h2>

<!--------------------FORM-------------------->

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama_kategori" required>
	</div>

	<button class="btn btn-primary" name="save">save</button>
</form>

<!--------------------UPDATE-------------------->

<?php
if (isset($_POST['save']))
{
	//--update data--
	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$_POST[nama_kategori]')");

	echo "<script>alert('kategori berhasil ditambahkan');</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";

}
?>