<style>
    .pagination a {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 5px;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.pagination .current-page {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
}
</style>
<h2>Data Produk</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Stok</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Number of products per page
    $productsPerPage = 5;

    // Get the current page number from the URL
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the OFFSET for the SQL query
    $offset = ($currentPage - 1) * $productsPerPage;

    $nomor = $offset + 1; // Start numbering from the offset + 1

    // Fetch products data from the database with LIMIT and OFFSET
    $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $productsPerPage OFFSET $offset");

    while ($pecah = $ambil->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah["nama_kategori"] ?></td>
            <td><?php echo $pecah['nama_produk'] ?></td>
            <td><?php echo $pecah['harga_produk'] ?></td>
            <td><?php echo $pecah['berat_produk'] ?></td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100">
            </td>
            <td><?php echo $pecah['deskripsi_produk'] ?></td>
            <td><?php echo $pecah['stok_produk'] ?></td>
            <td>
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn" onclick="return
                    confirm('Yakin Hapus?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="fa fa-cog" aria-hidden="true"></i> Ubah</a>
                <a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
            </td>
        </tr>
    <?php
        $nomor++;
    }
    ?>
    </tbody>
</table>

<!-- Pagination Links -->
<div class="pagination justify-content-center">
    <?php
    // Get the total number of products from the database
    $totalProducts = $koneksi->query("SELECT COUNT(*) as total FROM produk")->fetch_assoc()['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalProducts / $productsPerPage);

    // Generate pagination links
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="index.php?halaman=produk&page=' . $i . '">' . $i . '</a>';
    }
    ?>
</div><br>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary mb-5"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Produk</a>
