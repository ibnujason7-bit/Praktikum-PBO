<?php
class Mobil {
    public $merek;
    public $warna;
    public $kecepatan;

    // Constructor untuk inisialisasi semua properti
    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    // Method menampilkan informasi mobil
    public function getInfo() {
        return "Mobil $this->merek berwarna $this->warna dengan kecepatan $this->kecepatan km/jam.";
    }

    // Method menampilkan "Mobil berjalan..."
    public function jalankan() {
        return "Mobil berjalan...";
    }

    // Method menampilkan "Mobil berhenti"
    public function berhenti() {
        return "Mobil berhenti";
    }
}

// Buat 3 objek berbeda dari class Mobil
$mobil1 = new Mobil("Toyota", "Cyan", 100);
$mobil2 = new Mobil("Honda", "Kuning", 120);
$mobil3 = new Mobil("Suzuki", "Silver", 80);

// Menampilkan output Mobil 1
echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

// Menampilkan output Mobil 2
echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

// Menampilkan output Mobil 3
echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti() . "<br>";
?>