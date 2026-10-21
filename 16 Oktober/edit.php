<?php
require_once 'Product.php';

// Pastikan ada parameter ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
// Mengambil satu data produk berdasarkan ID[cite: 19]
$dataProduk = Product::findById($id); //[cite: 19]

if (!$dataProduk) {
    die("Produk tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->setNamaProduk($_POST['nama_produk'])
            ->setHarga($_POST['harga'])
            ->setStok($_POST['stok']);
    
    // Memperbarui data produk[cite: 19]
    if ($product->update($id)) { //[cite: 19]
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal memperbarui data.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
    <h2>Edit Produk</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?= htmlspecialchars($dataProduk['nama_produk']) ?>" required><br><br>
        
        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= htmlspecialchars($dataProduk['harga']) ?>" required><br><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= htmlspecialchars($dataProduk['stok']) ?>" required><br><br>
        
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>