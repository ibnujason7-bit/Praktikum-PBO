<?php

abstract class HewanTernak {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId() {
        return $this->id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHargaDasar() {
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Ayam extends HewanTernak {
    private $ekor;

    public function __construct($id, $nama, $hargaDasar, $ekor) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->ekor = $ekor;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (2000 * $this->ekor);
    }

    public function getJenis() {
        return "Ayam";
    }

    public function cetakDetail() {
        return "Ayam {$this->ekor} ekor (termasuk pakan Rp2.000/ekor)";
    }
}

class Sapi extends HewanTernak {
    private $ekor;

    public function __construct($id, $nama, $hargaDasar, $ekor) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->ekor = $ekor;
    }

    public function hitungTotal() {
        $total = $this->hargaDasar * $this->ekor;
        if ($this->ekor > 2) {
            $total = $total - ($total * 0.05);
        }
        return $total;
    }

    public function getJenis() {
        return "Sapi";
    }

    public function cetakDetail() {
        $keterangan = "Sapi {$this->ekor} ekor";
        if ($this->ekor > 2) {
            $keterangan .= " (diskon 5%)";
        }
        return $keterangan;
    }
}

class Kambing extends HewanTernak {
    private $ekor;

    public function __construct($id, $nama, $hargaDasar, $ekor) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->ekor = $ekor;
    }

    public function hitungTotal() {
        return $this->hargaDasar + (10000 * $this->ekor);
    }

    public function getJenis() {
        return "Kambing";
    }

    public function cetakDetail() {
        return "Kambing {$this->ekor} ekor (termasuk kandang Rp10.000/ekor)";
    }
}

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}

$daftarHewan = [
    new Ayam("H001", "Ibnu", 50000, 10),
    new Sapi("H002", "Aji", 12000000, 3),
    new Kambing("H003", "Ferdi", 2000000, 2),
    new Ayam("H004", "Ayam Kampung", 45000, 5),
    new Sapi("H005", "Sapi Limosin", 15000000, 1),
];

$totalKeseluruhan = 0;
foreach ($daftarHewan as $hewan) {
    $totalKeseluruhan += $hewan->hitungTotal();
}
echo "<p><b>Total Keseluruhan: " . rupiah($totalKeseluruhan) . "</b></p>";
echo "<h3>Detail (Array)</h3>";
echo "<ul>";
foreach ($daftarHewan as $hewan) {
    echo "<li>" . $hewan->getNama() . " - " . $hewan->cetakDetail() . "</li>";
}
echo "</ul>";
?>