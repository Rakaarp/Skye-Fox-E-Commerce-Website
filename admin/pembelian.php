<h2>Data Pembelian</h2>

<?php
// Pagination Variables
$perPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query to get total number of rows
$totalRowsQuery = $koneksi->query("SELECT COUNT(*) as total FROM pembelian");
$totalRows = $totalRowsQuery->fetch_assoc()['total'];

// Calculate total pages
$totalPages = ceil($totalRows / $perPage);

// Query to get data for the current page
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan LIMIT $start, $perPage");
?>

<table class="table table-bordered mb-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = $start + 1; // Adjust the starting number for each page ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_pelanggan'] ?></td>
                <td><?php echo date("d F Y", strtotime($pecah['tanggal_pembelian'])) ?></td>
                <td><?php echo $pecah['status_pembelian'] ?></td>
                <td>Rp. <?php echo number_format($pecah['total_pembelian']) ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>

                    <?php if ($pecah['status_pembelian'] !== "Pending"): ?>
                        <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Lihat Pembayaran</a>
                    <?php endif ?>

                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<!-- Pagination links -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>"><a class="page-link" href="index.php?halaman=pembelian&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>
