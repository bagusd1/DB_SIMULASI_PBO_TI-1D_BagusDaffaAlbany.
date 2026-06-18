<?php
class Koneksi {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_simulasi_pbo_ti-1d_bagusdaffaalbany"; 
    public $conn;

    // Menangani koneksi database menggunakan PDO
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>