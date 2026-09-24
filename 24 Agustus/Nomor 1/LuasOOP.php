<?php
class PersegiPanjang {
    // Mendefinisikan properti (variabel dalam class)
    public $panjang;
    public $lebar;

    // Method (fungsi) untuk mengatur nilai panjang dan lebar
    public function setUkuran($p, $l) {
        $this->panjang = $p;
        $this->lebar = $l;
    }

    // Method untuk menghitung luas
    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
}

// 1. Membuat objek baru
$objekPersegi = new PersegiPanjang();

// 2. Memasukkan nilai menggunakan method setUkuran
$objekPersegi->setUkuran(10, 5);

// 3. Menampilkan hasil
echo "Luas Persegi Panjang: " . $objekPersegi->hitungLuas();
?>