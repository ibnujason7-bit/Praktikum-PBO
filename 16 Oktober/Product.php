<?php
require_once 'DatabaseConnection.php';

class Product {
    private $id;
    private $nama_produk;
    private $harga;
    private $stok;
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getConnection();
    }

    // Setter untuk memudahkan pengisian data ke objek
    public function setNamaProduk($nama) { $this->nama_produk = $nama; return $this; }
    public function setHarga($harga) { $this->harga = $harga; return $this; }
    public function setStok($stok) { $this->stok = $stok; return $this; }

    // Method tambah data
    public function save() {
        $sql = "INSERT INTO products (nama_produk, harga, stok) VALUES (:nama, :harga, :stok)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama' => $this->nama_produk,
            'harga' => $this->harga,
            'stok' => $this->stok
        ]);
    }

    // Method lihat semua[cite: 19]
    public static function findAll() {
        $db = DatabaseConnection::getConnection();
        $stmt = $db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // Method lihat satu[cite: 19]
    public static function findById($id) {
        $db = DatabaseConnection::getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Method update data[cite: 19]
    public function update($id) {
        $sql = "UPDATE products SET nama_produk = :nama, harga = :harga, stok = :stok WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama' => $this->nama_produk,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'id' => $id
        ]);
    }

    // Method hapus data[cite: 19]
    public static function delete($id) {
        $db = DatabaseConnection::getConnection();
        $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>