<?php
class Mobil {
    //Ubah semua properti menjadi private
    private $merek;
    private $warna;
    private $kecepatan;

    // Constructor
    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        // Menggunakan setter di constructor agar validasi berjalan saat objek dibuat
        $this->setWarna($warna);
        $this->setKecepatan($kecepatan);
    }

    // Buat method getter untuk setiap properti
    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    //Buat method setter untuk kecepatan dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            echo "Error: Kecepatan tidak boleh negatif!<br>";
        } elseif ($kecepatan > 200) {
            echo "Error: Kecepatan maksimal 200 km/jam!<br>";
        } else {
            // Jika lolos validasi, baru data diubah
            $this->kecepatan = $kecepatan;
        }
    }

    //Buat method setter untuk warna dengan validasi
    public function setWarna($warna) {
        $warna_bersih = trim($warna);
        
        if (empty($warna_bersih)) {
            echo "Error: Warna tidak boleh kosong!<br>";
        } elseif (strlen($warna_bersih) < 3) {
            echo "Error: Warna minimal 3 karakter!<br>";
        } else {
            // Jika lolos validasi, baru data diubah
            $this->warna = $warna_bersih;
        }
    }

    // Method menampilkan informasi mobil
    public function getInfo() {
        return "Mobil " . $this->getMerek() . " berwarna " . $this->getWarna() . " dengan kecepatan " . $this->getKecepatan() . " km/jam.";
    }

    public function jalankan() {
        return "Mobil berjalan...";
    }

    public function berhenti() {
        return "Mobil berhenti";
    }
}


// Membuat objek dengan data yang valid
$mobil1 = new Mobil("Toyota", "Cyan", 100);
echo "<b>Info Awal:</b><br>";
echo $mobil1->getInfo() . "<br><br>";

// Menguji update data yang benar
echo "<b>Update Data Valid:</b><br>";
$mobil1->setKecepatan(150);
echo "Kecepatan diubah menjadi 150 km/jam.<br>";
echo $mobil1->getInfo() . "<br><br>";

// Menguji Validasi Error (Pesan error akan otomatis dicetak karena kita pakai echo di dalam setter)
echo "<b>Testing Validasi Error:</b><br>";
$mobil1->setWarna("Ab");    // Pesan: Error: Warna minimal 3 karakter!
$mobil1->setWarna("");      // Pesan: Error: Warna tidak boleh kosong!
$mobil1->setKecepatan(250); // Pesan: Error: Kecepatan maksimal 200 km/jam!
$mobil1->setKecepatan(-10); // Pesan: Error: Kecepatan tidak boleh negatif!

// Menampilkan info akhir untuk membuktikan data gagal diubah saat error
echo "<br><b>Info Akhir (Data tidak berubah karena validasi):</b><br>";
echo $mobil1->getInfo() . "<br>";
?>