<?php
require_once 'Product.php';

// Proses hapus data[cite: 19]
if (isset($_GET['delete_id'])) {
    Product::delete($_GET['delete_id']); //[cite: 19]
    header("Location: index.php");
    exit;
}

// Ambil semua data produk[cite: 19]
$products = Product::findAll(); //[cite: 19]
?>
<!DOCTYPE html>
<html>
<head><title>Manajemen Produk</title></head>
<body>
    <h2>Daftar Produk</h2>
    <a href="create.php">Tambah Produk Baru</a>
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px; width: 50%;">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($products as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="index.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>