-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 07:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti-1d_bagusdaffaalbany`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` enum('Kabupaten/Kota','Provinsi','Nasional','Internasional') DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 2 Surabaya', '92.25', '250000.00', 'Reguler', 'Kedokteran', 'Kampus Kedokteran', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMKN 1 Semarang', '80.00', '250000.00', 'Reguler', 'Teknik Mesin', 'Kampus Vokasi', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Yogyakarta', '88.75', '250000.00', 'Reguler', 'Akuntansi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMAN 1 Medan', '75.50', '250000.00', 'Reguler', 'Ilmu Hukum', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 8 Makassar', '83.40', '250000.00', 'Reguler', 'Psikologi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 70 Jakarta', '80.00', '150000.00', 'Prestasi', 'Ilmu Komunikasi', 'Kampus Utama', 'Juara 1 Basket', 'Provinsi', NULL, NULL),
(9, 'Indah Cahyani', 'SMAN 1 Surakarta', '85.00', '150000.00', 'Prestasi', 'Sastra Inggris', 'Kampus Utama', 'Juara 2 Olimpiade Fisika', 'Nasional', NULL, NULL),
(10, 'Joko Susilo', 'SMKN 2 Malang', '79.50', '150000.00', 'Prestasi', 'Teknik Elektro', 'Kampus Vokasi', 'Juara 1 LKS Web Technologies', 'Nasional', NULL, NULL),
(11, 'Kurniawati', 'SMAN 3 Tarakan', '82.00', '150000.00', 'Prestasi', 'Manajemen', 'Kampus Utama', 'Juara 3 Bulutangkis', 'Kabupaten/Kota', NULL, NULL),
(12, 'Laksana Mega', 'SMAN 1 Denpasar', '91.00', '150000.00', 'Prestasi', 'Hubungan Internasional', 'Kampus Utama', 'Juara 1 Debat Bahasa Inggris', 'Internasional', NULL, NULL),
(13, 'Mega Utami', 'SMAN 2 Padang', '84.60', '150000.00', 'Prestasi', 'Farmasi', 'Kampus Kedokteran', 'Juara 2 Karya Ilmiah Remaja', 'Provinsi', NULL, NULL),
(14, 'Naufal Rizqi', 'SMAN 1 Bogor', '88.00', '350000.00', 'Kedinasan', 'Amanat Negara', 'Kampus Kedinasan', NULL, NULL, 'SK-990/STN/2026', 'Kementerian Keuangan'),
(15, 'Oki Pratama', 'SMAN 4 Palembang', '86.50', '350000.00', 'Kedinasan', 'Sains Data Spasial', 'Kampus Kedinasan', NULL, NULL, 'SK-112/BIG/2026', 'Badan Informasi Geospasial'),
(16, 'Putri Ayu', 'SMAN 1 Balikpapan', '93.00', '350000.00', 'Kedinasan', 'Persandian Siber', 'Kampus Kedinasan', NULL, NULL, 'SK-404/BSSN/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qori Sambodo', 'SMAN 3 Semarang', '89.10', '350000.00', 'Kedinasan', 'Statistika Resmi', 'Kampus Kedinasan', NULL, NULL, 'SK-881/BPS/2026', 'Badan Pusat Statistik'),
(18, 'Rian Hidayat', 'SMAN 1 Manado', '87.20', '350000.00', 'Kedinasan', 'Administrasi Pemerintahan', 'Kampus Kedinasan', NULL, NULL, 'SK-302/DN/2026', 'Kementerian Dalam Negeri'),
(19, 'Siti Aminah', 'SMAN 1 Banda Aceh', '90.50', '350000.00', 'Kedinasan', 'Meteorologi', 'Kampus Kedinasan', NULL, NULL, 'SK-705/BMKG/2026', 'BMKG'),
(20, 'Taufik Hidayat', 'SMAN 2 Jayapura', '84.00', '350000.00', 'Kedinasan', 'Imigrasi', 'Kampus Kedinasan', NULL, NULL, 'SK-214/KHM/2026', 'Kementerian Hukum dan HAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
