<?php

// ==========================================
// BAGIAN 1: DEFINISI CLASS (STRUKTUR)
// ==========================================

class Pasien {
    private string $idPasien;
    private string $nama;
    private string $alamat;
    private int $noTelepon;
    
    private array $riwayatPemeriksaan = [];

    public function __construct(string $idPasien, string $nama, string $alamat, int $noTelepon) {
        $this->idPasien = $idPasien;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->noTelepon = $noTelepon;
    }

    public function mendaftar(): void {
        echo "Pasien <strong>{$this->nama}</strong> (ID: {$this->idPasien}) berhasil mendaftar ke sistem klinik.<br>";
    }

    public function ubahDataPasien(string $alamatBaru, int $noTeleponBaru): void {
        $this->alamat = $alamatBaru;
        $this->noTelepon = $noTeleponBaru;
    }

    public function melakukanPemeriksaan(Pemeriksaan $pemeriksaan): void {
        $this->riwayatPemeriksaan[] = $pemeriksaan;
    }

    public function lihatRiwayatPemeriksaan(): void {
        echo "<br><strong>=== Riwayat Pemeriksaan Pasien: {$this->nama} ===</strong><br><br>";
        foreach ($this->riwayatPemeriksaan as $p) {
            $p->tampilkanDetail();
        }
    }

    public function getNama(): string {
        return $this->nama;
    }
}

class Dokter {
    private string $idDokter;
    private string $nama;
    private string $spesialisasi;

    public function __construct(string $idDokter, string $nama, string $spesialisasi) {
        $this->idDokter = $idDokter;
        $this->nama = $nama;
        $this->spesialisasi = $spesialisasi;
    }

    public function memeriksaPasien(Pasien $pasien): void {
        echo "Dokter <strong>{$this->nama}</strong> (Spesialis: {$this->spesialisasi}) sedang memeriksa pasien <strong>{$pasien->getNama()}</strong>.<br>";
    }

    public function isiHasilPemeriksaan(Pemeriksaan $pemeriksaan, string $hasil): void {
        $pemeriksaan->catatHasil($hasil);
    }

    public function ubahSpesialisasi(string $spesialisasiBaru): void {
        $this->spesialisasi = $spesialisasiBaru;
    }

    public function getNama(): string {
        return $this->nama;
    }
}

class Pemeriksaan {
    private string $idPemeriksaan;
    private string $tanggalPemeriksaan;
    private string $keluhan = "-";
    private string $hasilPemeriksaan = "-";
    
    private Pasien $pasien;
    private Dokter $dokter;

    public function __construct(string $idPemeriksaan, string $tanggalPemeriksaan, Pasien $pasien, Dokter $dokter) {
        $this->idPemeriksaan = $idPemeriksaan;
        $this->tanggalPemeriksaan = $tanggalPemeriksaan;
        $this->pasien = $pasien;
        $this->dokter = $dokter;
        
        $this->pasien->melakukanPemeriksaan($this);
    }

    public function catatKeluhan(string $keluhan): void {
        $this->keluhan = $keluhan;
    }

    public function catatHasil(string $hasil): void {
        $this->hasilPemeriksaan = $hasil;
    }

    public function tampilkanDetail(): void {
        echo "<strong>ID Pemeriksaan :</strong> {$this->idPemeriksaan}<br>";
        echo "<strong>Tanggal :</strong> {$this->tanggalPemeriksaan}<br>";
        echo "<strong>Dokter Bertugas :</strong> {$this->dokter->getNama()}<br>";
        echo "<strong>Keluhan Pasien :</strong> {$this->keluhan}<br>";
        echo "<strong>Hasil :</strong> {$this->hasilPemeriksaan}<br>";
        echo "--------------------------------------------------<br>";
    }
}


// ==========================================
// BAGIAN 2: SIMULASI PROGRAM (EKSEKUSI)
// ==========================================

$pasien1 = new Pasien("PSN-789", "Meg Griffin", "Jl. Ahmad Yani, Pontianak", 812345678);
$dokter1 = new Dokter("DKT-67", "Dr. Dokteran", "Penyakit Dalam");

$pasien1->mendaftar();

$pemeriksaan1 = new Pemeriksaan("PMRX-001", date("Y-m-d"), $pasien1, $dokter1);

$pemeriksaan1->catatKeluhan("Demam tinggi dan sakit kepala selama 3 hari.");
$dokter1->memeriksaPasien($pasien1);
$dokter1->isiHasilPemeriksaan($pemeriksaan1, "Gejala tifus ringan. Diberikan resep antibiotik dan paracetamol.");

$pasien1->lihatRiwayatPemeriksaan();

?>