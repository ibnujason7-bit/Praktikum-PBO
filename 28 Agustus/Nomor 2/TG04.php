<?php
class Product {
    public $nama;
    public $harga;
    public $kategori;

    // Constructor
    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    // Method getInfo()
    public function getInfo() {
        return "Produk: $this->nama | Kategori: $this->kategori | Harga: Rp" . number_format($this->harga, 0, ',', '.');
    }

    // Method applyDiskon($persen)
    public function applyDiskon($persen) {
        $nominalDiskon = $this->harga * ($persen / 100);
        $this->harga -= $nominalDiskon;
        return "Diskon $persen% berhasil diterapkan.";
    }
}

// Buat 2 objek Product
$produk1 = new Product("Laptop Gaming", 10000000, "Gadget");
$produk2 = new Product("Meja Belajar", 500000, "Furnitur");

// Menampilkan informasi Produk 1
echo "Informasi Awal:<br>";
echo $produk1->getInfo() . "<br>";
echo $produk1->applyDiskon(10) . "<br>"; // Diskon 10%
echo "Setelah Diskon:<br>";
echo $produk1->getInfo() . "<br><br>";

// Menampilkan informasi Produk 2
echo "Informasi Awal:<br>";
echo $produk2->getInfo() . "<br>";
echo $produk2->applyDiskon(20) . "<br>"; // Diskon 20%
echo "Setelah Diskon:<br>";
echo $produk2->getInfo() . "<br>";
?>