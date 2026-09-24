<?php

// 1. Parent Class Produk
class Produk {
    protected $merek;
    protected $harga;
    protected $nama_produk;

    public function __construct($nama_produk, $merek, $harga) {
        $this->nama_produk = $nama_produk;
        $this->merek = $merek;
        
        if ($harga > 0) {
            $this->harga = $harga;
        } else {
            $this->harga = 0;
            echo "Error: Harga tidak boleh 0!<br>";
        }
    }

    public function getInfo() {
        return "Merek: " . $this->merek . "<br>Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }
}

// 2. Child Class Makanan
class Makanan extends Produk {
    private $tanggalKadaluarsa;
    private $status = "Segar"; 

    public function __construct($nama_produk, $merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($nama_produk, $merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function getInfo() { 
        return "Produk: Makanan - " . $this->nama_produk . "<br>" .
               "Merek: " . $this->merek . "<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
               "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "<br>" .
               "Status: " . $this->status;
    }
}

// 3. Child Class Elektronik
class Elektronik extends Produk {
    private $garansi;

    public function __construct($nama_produk, $merek, $harga, $garansi) {
        parent::__construct($nama_produk, $merek, $harga);
        $this->garansi = $garansi;
    }

    public function getInfo() { 
        return "Produk: Elektronik - " . $this->nama_produk . "<br>" .
               "Merek: " . $this->merek . "<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
               "Garansi: " . $this->garansi . " bulan";
    }
}

// Output yg diharapkan

$makanan = new Makanan("Mie Instan", "Indomie", 3500, "2025-06-30");
echo $makanan->getInfo() . "<br><br>"; 

$elektronik = new Elektronik("Smart TV", "Samsung", 5000000, 12);
echo $elektronik->getInfo() . "<br><br>";

?>