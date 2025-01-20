<?php
// Number of data to display per page
$dataPerPage = 5;

// Get the current page number from the URL parameter
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $dataPerPage;

// Fetch the total number of records to calculate the total number of pages
$totalData = $koneksi->query("SELECT COUNT(*) AS total FROM pelanggan")->fetch_assoc()['total'];
$totalPages = ceil($totalData / $dataPerPage);

// Retrieve data with limited results based on the current page
$ambil = $koneksi->query("SELECT * FROM pelanggan LIMIT $offset, $dataPerPage");

// Start numbering from the appropriate index based on the current page
$nomor = ($currentPage - 1) * $dataPerPage + 1;
?>

<h2>Data Pelanggan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo $pecah['email_pelanggan']; ?></td>
                <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                <td>
                    <a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                    <a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-warning"><i class="fa fa-cog" aria-hidden="true"></i> Ubah</a>
                </td>
            </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<!-- Pagination Links -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?halaman=pelanggan&page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?php echo $i === $currentPage ? 'active' : ''; ?>">
                <a class="page-link" href="index.php?halaman=pelanggan&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?halaman=pelanggan&page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Pelanggan</a>
