<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Services\ProductService;

try {
    $service = new ProductService();

    // Membuat 2 objek produk
    $product1 = $service->createProduct('Laptop Asus', 12500000);
    $product2 = $service->createProduct('Mouse Wireless', 150000);

    // Menampilkan 2 produk
    echo "<h3>Daftar Produk:</h3>";
    echo $service->displayProduct($product1) . "<br><br>";
    echo $service->displayProduct($product2) . "<br>";

} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}