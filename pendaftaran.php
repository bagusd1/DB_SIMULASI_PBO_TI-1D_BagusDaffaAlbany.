Baik, aku sesuaikan kodenya dengan catatan tambahanmu. Sesuai aturan PBO di PHP, *abstract method* memang harus dideklarasikan kosong (tanpa kurung kurawal `{}`).

Berikut adalah implementasi Tahap 3 yang difokuskan murni pada properti *protected* dan *abstract method* yang kosong:

### 1. File `koneksi/database.php`

```php
<?php
// koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_kampus"; // Sesuaikan dengan nama databasemu
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

```

---

### 2. File Abstract Class `Pendaftaran.php`

Di file ini, kita mendeklarasikan *abstract class* beserta properti `protected` dan *abstract method* yang benar-benar tanpa *body/isi*. Untuk memenuhi syarat "memetakan nilai dari kolom tabel", kita sediakan `__construct()` untuk menerima datanya nanti dari *database*.

```php
<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // 3. Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Konstruktor ini yang akan memetakan data dari database ke properti objek saat dipanggil
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // 4. Metode Abstrak (Tanpa Isi/Body)
    // Sesuai catatan tambahan, method ini dibiarkan kosong dan diakhiri dengan titik koma.
    abstract public function hitungTotalBiaya();
    
    abstract public function tampilkanInfoJalur();
}
?>