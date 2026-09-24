<?php

// 1. Buat interface Bentuk dengan method hitungLuas()
interface Bentuk {
    public function hitungLuas();
}

// 2. Buat class Persegi yang mengimplementasikan interface
class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        $luas = $this->sisi * $this->sisi;
        echo "Luas Persegi (sisi=" . $this->sisi . "): " . $luas . "\n";
    }
}

// 3. Buat class Lingkaran yang mengimplementasikan interface
class Lingkaran implements Bentuk {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        // Menggunakan 3.14 agar hasilnya sesuai dengan output yang diharapkan (153.86)
        $luas = 3.14 * $this->radius * $this->radius; 
        echo "Luas Lingkaran (radius=" . $this->radius . "): " . $luas . "\n";
    }
}

// 4. Skrip yang menampung objek dalam satu array dan melakukan loop
$kumpulanBentuk = [
    new Persegi(5),
    new Lingkaran(7)
];

foreach ($kumpulanBentuk as $bentuk) {
    $bentuk->hitungLuas();
}

?>