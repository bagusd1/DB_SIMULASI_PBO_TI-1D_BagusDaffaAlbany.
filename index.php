<?php
// index.php

// 1. Memuat semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi koneksi database
$database = new Koneksi();
$db = $database->getConnection();

// 3. Mengambil data menggunakan Static Method spesifik dari Tahap 4
$listReguler = PendaftaranReguler::getDaftarReguler($db);
$listPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$listKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

// Fungsi pembantu untuk format Rupiah
function formatRupiah($angka){
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penerimaan Mahasiswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans antialiased">

    <div class="max-w-7xl mx-auto">
        <header class="mb-10 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Data Pendaftaran Mahasiswa Baru</h1>
            <p class="text-gray-500 mt-2">Sistem Informasi Penerimaan Terpadu</p>
        </header>

        <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden border-t-4 border-blue-500">
            <div class="p-5 bg-gray-50 border-b">
                <h2 class="text-xl font-semibold text-blue-700">Pendaftar Jalur Reguler</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <th class="p-4 border-b">ID</th>
                            <th class="p-4 border-b">Nama Calon</th>
                            <th class="p-4 border-b">Asal Sekolah</th>
                            <th class="p-4 border-b">Nilai Ujian</th>
                            <th class="p-4 border-b">Informasi Spesifik Jalur</th>
                            <th class="p-4 border-b">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <?php foreach ($listReguler as $row): 
                            // INSTANSIASI OBJEK untuk menggunakan Polymorphism
                            $mabaReguler = new PendaftaranReguler(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['pilihan_prodi'], $row['lokasi_kampus']
                            );
                        ?>
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4"><?= $row['id_pendaftaran'] ?></td>
                            <td class="p-4 font-medium"><?= $row['nama_calon'] ?></td>
                            <td class="p-4"><?= $row['asal_sekolah'] ?></td>
                            <td class="p-4 text-center font-bold text-blue-600"><?= $row['nilai_ujian'] ?></td>
                            <td class="p-4 italic text-gray-600"><?= $mabaReguler->tampilkanInfoJalur() ?></td>
                            <td class="p-4 font-semibold text-green-600"><?= formatRupiah($mabaReguler->hitungTotalBiaya()) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden border-t-4 border-yellow-500">
            <div class="p-5 bg-gray-50 border-b">
                <h2 class="text-xl font-semibold text-yellow-600">Pendaftar Jalur Prestasi</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <th class="p-4 border-b">ID</th>
                            <th class="p-4 border-b">Nama Calon</th>
                            <th class="p-4 border-b">Asal Sekolah</th>
                            <th class="p-4 border-b">Nilai Ujian</th>
                            <th class="p-4 border-b">Informasi Spesifik Jalur</th>
                            <th class="p-4 border-b">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <?php foreach ($listPrestasi as $row): 
                            // INSTANSIASI OBJEK
                            $mabaPrestasi = new PendaftaranPrestasi(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['jenis_prestasi'], $row['tingkat_prestasi']
                            );
                        ?>
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4"><?= $row['id_pendaftaran'] ?></td>
                            <td class="p-4 font-medium"><?= $row['nama_calon'] ?></td>
                            <td class="p-4"><?= $row['asal_sekolah'] ?></td>
                            <td class="p-4 text-center font-bold text-blue-600"><?= $row['nilai_ujian'] ?></td>
                            <td class="p-4 italic text-gray-600"><?= $mabaPrestasi->tampilkanInfoJalur() ?></td>
                            <td class="p-4 font-semibold text-green-600"><?= formatRupiah($mabaPrestasi->hitungTotalBiaya()) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden border-t-4 border-red-500">
            <div class="p-5 bg-gray-50 border-b">
                <h2 class="text-xl font-semibold text-red-600">Pendaftar Jalur Kedinasan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <th class="p-4 border-b">ID</th>
                            <th class="p-4 border-b">Nama Calon</th>
                            <th class="p-4 border-b">Asal Sekolah</th>
                            <th class="p-4 border-b">Nilai Ujian</th>
                            <th class="p-4 border-b">Informasi Spesifik Jalur</th>
                            <th class="p-4 border-b">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <?php foreach ($listKedinasan as $row): 
                            // INSTANSIASI OBJEK
                            $mabaKedinasan = new PendaftaranKedinasan(
                                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                                $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                            );
                        ?>
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4"><?= $row['id_pendaftaran'] ?></td>
                            <td class="p-4 font-medium"><?= $row['nama_calon'] ?></td>
                            <td class="p-4"><?= $row['asal_sekolah'] ?></td>
                            <td class="p-4 text-center font-bold text-blue-600"><?= $row['nilai_ujian'] ?></td>
                            <td class="p-4 italic text-gray-600"><?= $mabaKedinasan->tampilkanInfoJalur() ?></td>
                            <td class="p-4 font-semibold text-green-600"><?= formatRupiah($mabaKedinasan->hitungTotalBiaya()) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>