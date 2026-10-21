<?php
require_once 'Product.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->setNamaProduk($_POST['nama_produk'])
            ->setHarga($_POST['harga'])
            ->setStok($_POST['stok']);
    
    // Menyimpan data produk[cite: 19]
    if ($product->save()) { //[cite: 19]
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menyimpan data.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Produk</title></head>
<body>
    <h2>Tambah Produk Baru</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required><br><br>
        
        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>
        
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>