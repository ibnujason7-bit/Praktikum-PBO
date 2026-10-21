<?php
class DatabaseConnection {
    private static $connection = null; //[cite: 18]

    public static function getConnection() { //[cite: 18]
        if (self::$connection === null) { //[cite: 18]
            try {
                // Konfigurasi koneksi PDO[cite: 18]
                self::$connection = new PDO("mysql:host=localhost;dbname=db_produk", "root", ""); //[cite: 18]
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return self::$connection; //[cite: 18]
    }
}
?>