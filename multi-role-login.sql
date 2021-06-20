-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 12:06 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi-role-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `id_wilayah` bigint(5) UNSIGNED NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_wilayah`, `nama`, `created_at`, `updated_at`) VALUES
(1, 5, 'Cengkareng', '2021-04-16 08:34:02', '2021-04-16 08:34:02'),
(2, 5, 'Grogol Petamburan', '2021-04-18 01:14:29', '2021-04-18 01:14:29'),
(3, 5, 'Kalideres', '2021-04-18 07:22:09', '2021-04-18 07:22:09'),
(4, 5, 'Kembangan', '2021-04-18 07:51:46', '2021-04-18 07:51:46'),
(5, 5, 'Palmerah', '2021-04-18 07:52:36', '2021-04-18 07:52:36'),
(6, 5, 'Kebon Jeruk', '2021-04-18 07:53:19', '2021-04-18 07:53:19'),
(7, 5, 'Taman Sari', '2021-04-21 06:53:01', '2021-04-21 06:53:01'),
(8, 5, 'Tambora', '2021-04-21 06:53:15', '2021-04-21 06:53:15'),
(9, 1, 'Penjaringan', '2021-04-18 07:55:22', '2021-04-18 07:55:22'),
(10, 1, 'Koja', '2021-04-18 07:55:41', '2021-04-18 07:55:41'),
(11, 1, 'Kelapa Gading', '2021-04-21 06:58:12', '2021-04-21 06:58:12'),
(12, 1, 'Cilincing', '2021-04-21 06:57:10', '2021-04-21 06:57:10'),
(13, 1, 'Pademangan', '2021-04-21 07:01:09', '2021-04-21 07:01:09'),
(14, 1, 'Tanjung Priok', '2021-04-21 07:01:56', '2021-04-21 07:01:56'),
(15, 3, 'Cilandak', '2021-04-18 01:17:58', '2021-04-18 01:17:58'),
(16, 3, 'Kebayoran Baru', '2021-04-18 03:13:33', '2021-04-18 03:13:33'),
(17, 3, 'Jagakarsa', '2021-04-29 18:49:22', '2021-04-29 18:49:22'),
(18, 3, 'Kebayoran Lama', '2021-04-29 18:49:55', '2021-04-29 18:49:55'),
(19, 3, 'Mampang Prapatan', '2021-04-29 18:50:13', '2021-04-29 18:50:13'),
(20, 3, 'Pancoran', '2021-04-29 18:50:46', '2021-04-29 18:50:46'),
(21, 3, 'Pasar Minggu', '2021-04-29 18:51:16', '2021-04-29 18:51:16'),
(22, 3, 'Pesanggrahan', '2021-04-29 18:51:44', '2021-04-29 18:51:44'),
(23, 3, 'Setia Budi', '2021-04-29 18:52:07', '2021-04-29 18:52:07'),
(24, 3, 'Tebet', '2021-04-29 18:52:21', '2021-04-29 18:52:21'),
(25, 6, 'Gambir', '2021-04-18 01:15:36', '2021-04-18 01:15:36'),
(26, 6, 'Cempaka Putih', '2021-04-29 18:55:26', '2021-04-29 18:55:26'),
(27, 6, 'Johar Baru', '2021-04-29 18:56:13', '2021-04-29 18:56:13'),
(28, 6, 'Kemayoran', '2021-04-29 18:56:27', '2021-04-29 18:56:27'),
(29, 6, 'Menteng', '2021-04-29 18:56:39', '2021-04-29 18:56:39'),
(30, 6, 'Sawah Besar', '2021-04-29 18:56:53', '2021-04-29 18:56:53'),
(31, 6, 'Senen', '2021-04-29 18:57:07', '2021-04-29 18:57:07'),
(32, 6, 'Tanah Abang', '2021-04-29 18:57:22', '2021-04-29 18:57:22'),
(33, 2, 'Cakung', '2021-04-29 18:59:07', '2021-04-29 18:59:07'),
(34, 2, 'Cipayung', '2021-04-29 18:59:19', '2021-04-29 18:59:19'),
(35, 2, 'Ciracas', '2021-04-29 18:59:41', '2021-04-29 18:59:41'),
(36, 2, 'Duren Sawit', '2021-04-29 18:59:52', '2021-04-29 18:59:52'),
(37, 2, 'Jatinegara', '2021-04-29 19:00:14', '2021-04-29 19:00:14'),
(38, 2, 'Kramat Jati', '2021-04-29 19:00:28', '2021-04-29 19:00:28'),
(39, 2, 'Makasar', '2021-04-29 19:00:44', '2021-04-29 19:00:44'),
(40, 2, 'Matraman', '2021-04-29 19:00:57', '2021-04-29 19:00:57'),
(41, 2, 'Pasar Rebo', '2021-04-29 19:01:14', '2021-04-29 19:01:14'),
(42, 2, 'Pulo Gadung', '2021-04-29 19:01:27', '2021-04-29 19:01:27'),
(43, 4, 'Kepulauan Seribu Selatan', '2021-04-29 19:02:12', '2021-04-29 19:02:12'),
(44, 4, 'Kepulauan Seribu Utara', '2021-04-29 19:02:24', '2021-04-29 19:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `id_wilayah` bigint(5) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(5) UNSIGNED NOT NULL,
  `user_id` bigint(5) UNSIGNED NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `id_wilayah`, `id_kecamatan`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(5, 5, 3, 1, 'Kalideres', '2021-04-18 07:22:30', '2021-04-18 07:22:30'),
(6, 5, 4, 1, 'Kembangan Selatan', '2021-04-18 07:52:04', '2021-04-18 07:52:04'),
(7, 5, 5, 1, 'Slipi', '2021-04-18 07:52:51', '2021-04-18 07:52:51'),
(8, 5, 6, 1, 'Kebon Jeruk', '2021-04-18 07:53:35', '2021-04-18 07:53:35'),
(9, 5, 3, 1, 'Pegadungan', '2021-04-18 07:54:13', '2021-04-18 07:54:13'),
(10, 5, 6, 1, 'Kedoya Utara', '2021-04-18 07:54:42', '2021-04-18 07:54:42'),
(11, 1, 10, 1, 'Koja', '2021-04-18 07:56:47', '2021-04-18 07:56:47'),
(13, 1, 12, 1, 'Cilincing', '2021-04-21 07:07:07', '2021-04-21 07:07:07'),
(14, 1, 12, 1, 'Kalibaru', '2021-04-21 07:07:24', '2021-04-21 07:07:24'),
(15, 1, 12, 1, 'Marunda', '2021-04-21 07:07:37', '2021-04-21 07:07:37'),
(16, 1, 12, 1, 'Rorotan', '2021-04-21 07:08:00', '2021-04-21 07:08:00'),
(17, 1, 12, 1, 'Semper Barat', '2021-04-21 07:08:15', '2021-04-21 07:08:15'),
(18, 1, 12, 1, 'Semper Timur', '2021-04-21 07:08:31', '2021-04-21 07:08:31'),
(19, 1, 12, 1, 'Sukapura', '2021-04-21 07:08:51', '2021-04-21 07:08:51'),
(20, 2, 11, 1, 'Kelapa Gading Barat', '2021-04-21 07:10:20', '2021-04-21 07:10:20'),
(21, 1, 11, 1, 'Kelapa Gading Timur', '2021-04-21 07:10:46', '2021-04-21 07:10:46'),
(22, 1, 11, 1, 'Pegangsaan Dua', '2021-04-21 07:11:17', '2021-04-21 07:11:17'),
(23, 1, 10, 1, 'Lagoa', '2021-04-21 07:11:32', '2021-04-21 07:11:32'),
(24, 1, 10, 1, 'Rawa Badak Selatan', '2021-04-21 07:11:57', '2021-04-21 07:11:57'),
(25, 1, 10, 1, 'Rawa Badak Utara', '2021-04-21 07:12:23', '2021-04-21 07:12:23'),
(26, 1, 10, 1, 'Tugu Selatan', '2021-04-21 07:12:54', '2021-04-21 07:12:54'),
(27, 1, 10, 1, 'Tugu Utara', '2021-04-21 07:13:22', '2021-04-21 07:13:22'),
(28, 1, 13, 1, 'Ancol', '2021-04-21 07:13:42', '2021-04-21 07:13:42'),
(29, 1, 13, 1, 'Pademangan Barat', '2021-04-21 07:13:58', '2021-04-21 07:13:58'),
(30, 1, 13, 1, 'Pademangan Timur', '2021-04-21 07:14:12', '2021-04-21 07:14:12'),
(31, 1, 9, 1, 'Kamal Muara', '2021-04-21 07:14:32', '2021-04-21 07:14:32'),
(32, 1, 9, 1, 'Kapuk Muara', '2021-04-21 07:15:25', '2021-04-21 07:15:25'),
(33, 1, 9, 1, 'Penjaringan', '2021-04-21 07:15:53', '2021-04-21 07:15:53'),
(34, 1, 9, 1, 'Pluit', '2021-04-21 07:16:10', '2021-04-21 07:16:10'),
(35, 1, 14, 1, 'Kebon Bawang', '2021-04-21 07:16:30', '2021-04-21 07:16:30'),
(36, 1, 14, 1, 'Papanggo', '2021-04-21 07:16:42', '2021-04-21 07:16:42'),
(37, 1, 14, 1, 'Papanggo', '2021-04-21 07:16:42', '2021-04-21 07:16:42'),
(38, 1, 14, 1, 'Sungai Bambu', '2021-04-21 07:16:57', '2021-04-21 07:16:57'),
(39, 1, 14, 1, 'Sunter Agung', '2021-04-21 07:17:11', '2021-04-21 07:17:11'),
(40, 1, 14, 1, 'Sunter Jaya', '2021-04-21 07:17:31', '2021-04-21 07:17:31'),
(41, 1, 14, 1, 'Tanjung Priok', '2021-04-21 07:17:45', '2021-04-21 07:17:45'),
(42, 1, 14, 1, 'Warakas', '2021-04-21 07:17:56', '2021-04-21 07:17:56'),
(43, 5, 1, 1, 'Cengkareng Timur', '2021-04-22 10:54:24', '2021-04-22 10:54:24'),
(44, 5, 1, 1, 'Cengkareng Barat', '2021-04-29 19:05:43', '2021-04-29 19:05:43'),
(45, 5, 1, 1, 'Duri Kosambi', '2021-04-29 19:06:07', '2021-04-29 19:06:07'),
(46, 5, 1, 1, 'Kapuk', '2021-04-29 19:06:22', '2021-04-29 19:06:22'),
(47, 5, 1, 1, 'Kedaung Kali Angke', '2021-04-29 19:06:43', '2021-04-29 19:06:43'),
(48, 5, 1, 1, 'Rawa Buaya', '2021-04-29 19:07:04', '2021-04-29 19:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_03_150644_create_roles_table', 1),
(5, '2021_04_09_160450_create_posts_table', 2),
(6, '2021_04_11_143036_create_posts_table', 3),
(7, '2021_04_11_155552_create_posts_table', 4),
(8, '2021_04_13_124330_create_wilayah_table', 5),
(9, '2021_04_13_124638_create_kecamatan_table', 6),
(10, '2021_04_13_125030_create_wilayah_table', 7),
(11, '2021_04_16_211106_add_foreign_kecamatan', 8),
(12, '2021_04_16_212228_add_foreign_posts', 9),
(13, '2021_04_17_220614_create_kelurahan_table', 10),
(14, '2021_04_17_221744_create_rumah_sakit_table', 11),
(15, '2021_04_18_091846_add_alamat_table', 12),
(16, '2021_04_18_174146_create_tenaga_medis_table', 13),
(17, '2021_04_30_021101_create_pasien_table', 14),
(18, '2021_04_30_173056_add_nama_pasien', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(16) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(5) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(5) UNSIGNED NOT NULL,
  `id_wilayah` bigint(5) UNSIGNED NOT NULL,
  `nama_pasien` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` int(3) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Positif','Meninggal','Sembuh') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `id_kelurahan`, `id_kecamatan`, `id_wilayah`, `nama_pasien`, `usia`, `jenis_kelamin`, `status`, `alamat`, `created_at`, `updated_at`) VALUES
(10270, 15, 21, 6, 'Empluk Maman Mandala', 26, 'L', 'Meninggal', 'Gg. Gardujati No. 860, Salatiga 37063, Jabar', '2021-07-11 17:00:00', '2021-05-27 20:42:03'),
(10271, 39, 21, 2, 'Mulyanto Prakasa', 21, 'L', 'Meninggal', 'Jln. Sam Ratulangi No. 785, Bau-Bau 73374, Sumut', '2021-07-11 17:00:00', '2021-05-27 20:42:03'),
(10272, 23, 23, 5, 'Asmianto Zulkarnain S.Psi', 71, 'P', 'Sembuh', 'Jr. Madrasah No. 342, Jambi 35857, DKI', '2021-10-11 17:00:00', '2021-05-27 20:42:03'),
(10273, 42, 21, 2, 'Yunita Kani Yuliarti M.Ak', 58, 'L', 'Meninggal', 'Ds. Wahid No. 33, Solok 30563, Papua', '2021-03-11 17:00:00', '2021-05-27 20:42:03'),
(10274, 28, 40, 2, 'Enteng Gunarto', 76, 'L', 'Positif', 'Kpg. Gotong Royong No. 683, Probolinggo 42614, DIY', '2021-10-11 17:00:00', '2021-05-27 20:42:03'),
(10275, 30, 43, 5, 'Paris Utami', 84, 'P', 'Positif', 'Gg. Bahagia  No. 847, Pariaman 70043, Sumsel', '2021-08-11 17:00:00', '2021-05-27 20:42:03'),
(10276, 18, 30, 4, 'Ani Wulandari', 30, 'P', 'Meninggal', 'Psr. Pasteur No. 405, Madiun 92221, Kepri', '2021-03-11 17:00:00', '2021-05-27 20:42:03'),
(10277, 45, 41, 2, 'Bakijan Darmana Tamba S.Psi', 5, 'P', 'Meninggal', 'Psr. Supono No. 128, Tual 39794, Sulteng', '2021-06-11 17:00:00', '2021-05-27 20:42:03'),
(10278, 23, 21, 1, 'Gara Dongoran', 27, 'L', 'Sembuh', 'Jr. Bambon No. 256, Batam 20341, Sulbar', '2021-05-11 17:00:00', '2021-05-27 20:42:03'),
(10279, 35, 5, 4, 'Hasim Martana Hutasoit M.Pd', 28, 'P', 'Sembuh', 'Psr. Bakaru No. 955, Sorong 42364, Bali', '2021-12-11 17:00:00', '2021-05-27 20:42:03'),
(10280, 15, 28, 2, 'Febi Usada', 31, 'L', 'Sembuh', 'Ki. Bazuka Raya No. 616, Sawahlunto 90205, Pabar', '2021-02-11 17:00:00', '2021-05-27 20:42:03'),
(10281, 36, 29, 5, 'Karya Saiful Ramadan S.Psi', 51, 'P', 'Positif', 'Psr. Gedebage Selatan No. 60, Parepare 61454, Jabar', '2021-02-11 17:00:00', '2021-05-27 20:42:03'),
(10282, 10, 13, 5, 'Eko Januar', 48, 'P', 'Meninggal', 'Ds. Rajawali Barat No. 643, Bontang 22319, Kalteng', '2021-10-11 17:00:00', '2021-05-27 20:42:03'),
(10283, 16, 3, 1, 'Mumpuni Wijaya S.Gz', 64, 'L', 'Positif', 'Jln. Achmad Yani No. 393, Pariaman 43616, Jabar', '2021-02-11 17:00:00', '2021-05-27 20:42:04'),
(10284, 47, 7, 1, 'Rizki Thamrin', 94, 'P', 'Meninggal', 'Ki. Yogyakarta No. 95, Cirebon 51713, Maluku', '2021-12-11 17:00:00', '2021-05-27 20:42:04'),
(10285, 46, 40, 6, 'Elisa Diana Novitasari S.H.', 79, 'L', 'Sembuh', 'Dk. Gajah Mada No. 719, Bekasi 24836, Riau', '2021-08-11 17:00:00', '2021-05-27 20:42:04'),
(10286, 32, 33, 6, 'Ika Suryatmi M.TI.', 52, 'P', 'Meninggal', 'Jln. HOS. Cjokroaminoto (Pasirkaliki) No. 287, Ternate 96032, Sulut', '2021-04-11 17:00:00', '2021-05-27 20:42:04'),
(10287, 10, 24, 1, 'Kartika Oktaviani', 21, 'P', 'Sembuh', 'Jln. Teuku Umar No. 766, Bandung 25661, Papua', '2021-12-11 17:00:00', '2021-05-27 20:42:04'),
(10288, 25, 18, 4, 'Catur Panca Saptono S.E.', 24, 'P', 'Meninggal', 'Jr. Gremet No. 39, Kotamobagu 97456, Bengkulu', '2021-06-11 17:00:00', '2021-05-27 20:42:04'),
(10289, 23, 42, 2, 'Harsanto Firmansyah', 84, 'L', 'Positif', 'Jln. Kali No. 28, Tangerang Selatan 57606, Papua', '2021-03-11 17:00:00', '2021-05-27 20:42:59'),
(10290, 38, 2, 1, 'Janet Mardhiyah', 11, 'P', 'Meninggal', 'Psr. Acordion No. 696, Tarakan 93639, Riau', '2021-08-11 17:00:00', '2021-05-27 20:42:59'),
(10291, 33, 7, 6, 'Belinda Sabrina Pertiwi M.Farm', 29, 'P', 'Sembuh', 'Psr. Jambu No. 26, Malang 68085, Sulsel', '2021-06-11 17:00:00', '2021-05-27 20:42:59'),
(10292, 34, 39, 6, 'Waluyo Sitompul', 51, 'L', 'Positif', 'Ki. Astana Anyar No. 94, Manado 44083, Sumut', '2021-12-11 17:00:00', '2021-05-27 20:42:59'),
(10293, 7, 13, 4, 'Rizki Jailani', 54, 'L', 'Sembuh', 'Dk. Baranangsiang No. 387, Lubuklinggau 59907, Papua', '2021-08-11 17:00:00', '2021-05-27 20:42:59'),
(10294, 6, 12, 4, 'Kamila Wulandari M.M.', 77, 'P', 'Sembuh', 'Gg. Basoka Raya No. 637, Bengkulu 32896, Jatim', '2021-08-11 17:00:00', '2021-05-27 20:42:59'),
(10295, 17, 4, 3, 'Hamima Lestari', 89, 'L', 'Sembuh', 'Kpg. Uluwatu No. 579, Sabang 75779, Papua', '2021-09-11 17:00:00', '2021-05-27 20:43:19'),
(10296, 35, 4, 2, 'Uli Mandasari S.Psi', 39, 'L', 'Meninggal', 'Gg. Sutarjo No. 230, Ambon 15953, NTT', '2021-07-11 17:00:00', '2021-05-27 20:43:19'),
(10297, 23, 34, 3, 'Lembah Latupono M.TI.', 31, 'P', 'Sembuh', 'Ki. Cikapayang No. 499, Pekalongan 31442, Maluku', '2021-11-11 17:00:00', '2021-05-27 20:43:19'),
(10298, 14, 36, 6, 'Novi Latika Nasyidah', 51, 'P', 'Positif', 'Jln. Flores No. 173, Depok 62805, Maluku', '2021-10-11 17:00:00', '2021-05-27 20:43:19'),
(10299, 28, 36, 4, 'Among Mursinin Irawan S.Ked', 7, 'P', 'Sembuh', 'Gg. Tangkuban Perahu No. 753, Ambon 49279, Sulteng', '2021-08-11 17:00:00', '2021-05-27 20:43:19'),
(10300, 32, 21, 2, 'Banawa Cayadi Saragih', 31, 'P', 'Positif', 'Ds. Bagis Utama No. 574, Balikpapan 35020, Bali', '2021-08-11 17:00:00', '2021-05-27 20:43:19'),
(10301, 10, 21, 3, 'Jasmani Setiawan', 15, 'P', 'Meninggal', 'Ki. Zamrud No. 189, Tegal 13952, Kaltara', '2021-07-11 17:00:00', '2021-05-27 20:43:19'),
(10302, 18, 40, 2, 'Putu Adriansyah', 6, 'L', 'Sembuh', 'Kpg. Bakau No. 392, Pematangsiantar 85827, Jambi', '2021-03-11 17:00:00', '2021-05-27 20:43:19'),
(10303, 41, 37, 6, 'Eko Hardiansyah M.TI.', 9, 'L', 'Positif', 'Kpg. Wahidin Sudirohusodo No. 196, Batam 81432, Bengkulu', '2021-08-11 17:00:00', '2021-05-27 20:43:19'),
(10304, 28, 36, 6, 'Harjasa Sitorus', 68, 'L', 'Meninggal', 'Ki. M.T. Haryono No. 514, Mojokerto 94686, Jateng', '2021-01-11 17:00:00', '2021-05-27 20:43:19'),
(10305, 32, 21, 5, 'Zulaikha Ifa Winarsih S.E.I', 62, 'P', 'Sembuh', 'Ki. Ciwastra No. 313, Sibolga 13704, Sulsel', '2021-10-11 17:00:00', '2021-05-27 20:43:19'),
(10306, 32, 2, 2, 'Shakila Riyanti S.Pd', 100, 'L', 'Meninggal', 'Ki. Bazuka Raya No. 337, Administrasi Jakarta Utara 35359, Maluku', '2021-09-11 17:00:00', '2021-05-27 20:43:19'),
(10307, 48, 14, 1, 'Aisyah Novitasari S.Sos', 53, 'L', 'Sembuh', 'Ki. Cut Nyak Dien No. 843, Gorontalo 72051, NTT', '2021-02-11 17:00:00', '2021-05-27 20:43:19'),
(10308, 17, 43, 2, 'Mariadi Budi Lazuardi', 50, 'P', 'Meninggal', 'Jr. Asia Afrika No. 759, Denpasar 90879, Jabar', '2021-07-11 17:00:00', '2021-05-27 20:54:31'),
(10309, 38, 8, 4, 'Elisa Hastuti', 56, 'P', 'Positif', 'Jln. Honggowongso No. 658, Ambon 89498, DKI', '2021-11-11 17:00:00', '2021-05-27 20:54:31'),
(10310, 48, 35, 6, 'Ajimat Januar', 86, 'L', 'Positif', 'Ki. Flora No. 632, Pekalongan 21188, Papua', '2021-11-11 17:00:00', '2021-05-27 20:54:31'),
(10311, 6, 21, 4, 'Pia Yolanda S.Gz', 95, 'P', 'Meninggal', 'Kpg. Babadak No. 503, Palembang 69202, Maluku', '2021-09-11 17:00:00', '2021-05-27 20:54:31'),
(10312, 22, 20, 2, 'Zizi Utami M.Farm', 38, 'L', 'Sembuh', 'Jln. Bakit  No. 22, Cimahi 43272, Sulbar', '2021-09-11 17:00:00', '2021-05-27 20:54:31'),
(10313, 5, 30, 1, 'Putri Mutia Rahayu M.TI.', 67, 'L', 'Positif', 'Psr. Ciumbuleuit No. 68, Surabaya 53974, Babel', '2021-08-11 17:00:00', '2021-05-27 20:54:31'),
(10314, 14, 40, 2, 'Hartaka Megantara', 41, 'P', 'Sembuh', 'Ki. Ters. Kiaracondong No. 270, Tangerang 93121, Kepri', '2021-09-11 17:00:00', '2021-05-27 20:54:31'),
(10315, 6, 19, 6, 'Saka Narpati', 56, 'L', 'Meninggal', 'Jln. Baladewa No. 90, Tarakan 49461, Papua', '2021-04-11 17:00:00', '2021-05-27 20:54:31'),
(10316, 13, 3, 4, 'Rafi Pangestu', 92, 'L', 'Sembuh', 'Dk. Untung Suropati No. 813, Banjarmasin 61999, Sulsel', '2021-04-11 17:00:00', '2021-05-27 20:54:31'),
(10317, 24, 43, 6, 'Raina Cinthia Yuliarti', 35, 'P', 'Meninggal', 'Ds. Ciumbuleuit No. 787, Administrasi Jakarta Utara 98351, Banten', '2021-10-11 17:00:00', '2021-05-27 20:54:31'),
(10318, 19, 44, 2, 'Bakiono Mangunsong S.I.Kom', 79, 'L', 'Sembuh', 'Kpg. Basuki No. 526, Bitung 18374, Kalteng', '2021-03-11 17:00:00', '2021-05-27 20:54:31'),
(10319, 8, 23, 3, 'Ade Mangunsong', 46, 'P', 'Meninggal', 'Dk. Pelajar Pejuang 45 No. 386, Bekasi 59776, Kalbar', '2021-03-11 17:00:00', '2021-05-27 20:54:31'),
(10320, 10, 21, 4, 'Dalima Sudiati', 2, 'L', 'Positif', 'Ki. Asia Afrika No. 191, Banda Aceh 66882, Kalsel', '2021-05-11 17:00:00', '2021-05-27 20:54:31'),
(10321, 17, 42, 3, 'Ilsa Susanti S.T.', 88, 'P', 'Sembuh', 'Ds. Ters. Kiaracondong No. 137, Tangerang 57693, Jabar', '2021-02-11 17:00:00', '2021-05-27 20:54:31'),
(10322, 13, 35, 5, 'Cawuk Narpati', 83, 'L', 'Sembuh', 'Dk. Bambon No. 281, Pontianak 69233, Aceh', '2021-09-11 17:00:00', '2021-05-27 20:54:31'),
(10323, 42, 26, 2, 'Danuja Darmaji Hidayanto S.E.I', 27, 'P', 'Meninggal', 'Jln. Baranang Siang Indah No. 191, Mojokerto 43926, Sumut', '2021-04-11 17:00:00', '2021-05-27 20:54:31'),
(10324, 27, 2, 4, 'Yuni Nadine Puspita S.Pd', 67, 'P', 'Meninggal', 'Gg. Otto No. 986, Langsa 36866, Sumbar', '2021-02-11 17:00:00', '2021-05-27 20:54:31'),
(10325, 28, 5, 4, 'Wirda Rahayu', 97, 'P', 'Sembuh', 'Psr. Suprapto No. 579, Tanjung Pinang 39536, Aceh', '2021-01-11 17:00:00', '2021-05-27 20:54:31'),
(10326, 15, 9, 1, 'Vicky Laksmiwati M.TI.', 84, 'L', 'Sembuh', 'Dk. Baja Raya No. 479, Palu 38207, Kaltim', '2021-03-11 17:00:00', '2021-05-27 20:54:31'),
(10327, 44, 15, 2, 'Harsana Danuja Setiawan S.Ked', 14, 'P', 'Meninggal', 'Gg. Bahagia  No. 695, Solok 75680, Gorontalo', '2021-09-11 17:00:00', '2021-05-27 20:55:00'),
(10328, 10, 24, 1, 'Makara Lamar Waskita M.TI.', 75, 'L', 'Meninggal', 'Dk. Babakan No. 805, Padangpanjang 99619, Sulut', '2021-02-11 17:00:00', '2021-05-27 20:55:00'),
(10329, 44, 28, 1, 'Galar Santoso M.Ak', 51, 'P', 'Sembuh', 'Ki. Kusmanto No. 392, Mojokerto 62873, Sulbar', '2021-12-11 17:00:00', '2021-05-27 20:55:00'),
(10330, 7, 20, 5, 'Martaka Utama', 98, 'L', 'Sembuh', 'Psr. Yohanes No. 453, Banjar 87028, Malut', '2021-08-11 17:00:00', '2021-05-27 20:55:00'),
(10331, 40, 28, 6, 'Tania Laksita', 50, 'L', 'Meninggal', 'Ki. Sam Ratulangi No. 827, Salatiga 80763, Sulbar', '2021-09-11 17:00:00', '2021-05-27 20:55:00'),
(10332, 46, 10, 3, 'Ozy Wahyudin', 3, 'L', 'Sembuh', 'Gg. Achmad Yani No. 680, Makassar 75440, NTT', '2021-02-11 17:00:00', '2021-05-27 20:55:00'),
(10333, 33, 26, 2, 'Pardi Thamrin', 35, 'P', 'Sembuh', 'Ki. Padma No. 395, Pangkal Pinang 49393, DKI', '2021-07-11 17:00:00', '2021-05-27 20:55:00'),
(10334, 25, 41, 4, 'Hamima Kania Hastuti S.Gz', 77, 'P', 'Sembuh', 'Ki. Bakti No. 531, Bandung 19677, Aceh', '2021-03-11 17:00:00', '2021-05-27 20:55:00'),
(10335, 13, 42, 5, 'Yunita Haryanti S.Kom', 4, 'L', 'Meninggal', 'Kpg. Baan No. 880, Jambi 87581, Sumbar', '2021-01-11 17:00:00', '2021-05-27 20:55:00'),
(10336, 15, 21, 1, 'Oni Wulandari', 44, 'P', 'Sembuh', 'Psr. Pahlawan No. 491, Serang 48893, Sumsel', '2021-06-11 17:00:00', '2021-05-27 20:55:00'),
(10337, 27, 7, 6, 'Vino Cemplunk Kuswoyo', 17, 'L', 'Meninggal', 'Kpg. Baya Kali Bungur No. 590, Lhokseumawe 22785, Kalbar', '2021-09-11 17:00:00', '2021-05-27 20:55:01'),
(10338, 37, 30, 3, 'Nadia Dinda Wulandari', 71, 'P', 'Sembuh', 'Psr. Kyai Mojo No. 479, Binjai 53093, Jateng', '2021-09-11 17:00:00', '2021-05-27 20:55:01'),
(10339, 34, 9, 1, 'kipas angin', 21, 'L', 'Sembuh', 'Jl. Rada Burem', '2021-06-03 10:45:24', '2021-06-03 10:45:24'),
(10340, 34, 9, 1, 'kipas angin', 21, 'L', 'Sembuh', 'Jl. Rada Burem', '2021-06-03 10:45:52', '2021-06-03 10:45:52'),
(418170100334181, 46, 1, 5, 'Doyok', 20, 'L', 'Sembuh', 'jl. rada burem', '2021-06-12 10:58:07', '2021-06-12 11:01:33'),
(1704880501047421, 6, 35, 5, 'Dinda Handayani', 1, 'P', 'Sembuh', 'Ki. Cikutra Timur No. 166, Batu 12022, Bali', '2021-02-11 17:00:00', '2021-06-12 10:48:32'),
(3503301311159457, 30, 32, 2, 'Hasta Oskar Najmudin', 6, 'L', 'Positif', 'Psr. Wora Wari No. 905, Surakarta 13738, Sumbar', '2021-08-11 17:00:00', '2021-06-12 10:48:32'),
(3671444509926484, 16, 15, 5, 'Putri Prastuti S.Pt', 67, 'P', 'Meninggal', 'Kpg. Nangka No. 631, Pariaman 47299, Kaltara', '2021-12-11 17:00:00', '2021-06-12 10:48:32'),
(7322004401136913, 9, 31, 3, 'Cahya Kuncara Hidayanto', 80, 'P', 'Positif', 'Jln. Basuki No. 193, Banjarbaru 68153, NTT', '2021-10-11 17:00:00', '2021-06-12 10:48:32'),
(7505541108102666, 32, 16, 2, 'Vanya Usada', 2, 'L', 'Sembuh', 'Jr. Villa No. 251, Jambi 99052, Jateng', '2021-04-11 17:00:00', '2021-06-12 10:48:32'),
(8201795605124797, 7, 17, 5, 'Vanesa Suartini S.Psi', 63, 'L', 'Sembuh', 'Gg. Sam Ratulangi No. 226, Bandung 32152, NTT', '2021-08-11 17:00:00', '2021-06-12 10:48:32'),
(9128516107001708, 10, 25, 5, 'Wani Nasyiah', 29, 'P', 'Meninggal', 'Dk. Laswi No. 169, Jambi 87934, Lampung', '2021-09-11 17:00:00', '2021-06-12 10:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `user_id` bigint(5) UNSIGNED NOT NULL,
  `judul` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `judul`, `slug`, `gambar`, `body`, `created_at`, `updated_at`) VALUES
(7, 1, 'Jumlah Pasien Covid-19 di RS Wisma Atlet', 'jumlah-pasien-covid-19-di-rs-wisma-atlet-kemayoran', 'post/1621601449cdc-w9KEokhajKw-unsplash.jpg', '<p><img src=\"https://asset.kompas.com/crops/wt3kQFa23E_jnq_CmLYk8xdbnp8=/0x0:0x0/750x500/data/photo/2020/09/28/5f719a204855a.jpg\" style=\"width: 677.25px;\"><span style=\"background-color: transparent; color: rgb(42, 42, 42); font-family: Roboto, sans-serif;\"><br></span></p><p><span style=\"background-color: transparent; color: rgb(42, 42, 42); font-family: Roboto, sans-serif;\">Jumlah pasien di Rumah Sakit Darurat Covid-19 Wisma Atlet Kemayoran, Jakarta Pusat, terus bertambah dalam tiga hari terakhir. Penambahan ini tak terlepas dari banyaknya pasien dari klaster mudik Lebaran. Pada Selasa (18/5/2021), ada 900 pasien yang dirawat di RS Wisma Atlet. Namun, jumlahnya terus bertambah dalam tiga hari terakhir akibat pasien yang masuk lebih banyak ketimbang pasien keluar. Pada Rabu, ada penambahan 31 orang. Lalu, pada Kamis, kembali terjadi penambahan 97 pasien. Kemudian, pada Jumat (21/5/2021) hari ini, kembali terjadi penambahan sebanyak 81 pasien.&nbsp;</span><span style=\"background-color: transparent; color: rgb(42, 42, 42); font-family: Roboto, sans-serif;\">Jumlah pasien di RS Wisma Atlet mencapai 1.109 orang berdasar data sampai Jumat pukul 08.00. Komando Daerah Militer Jayakarta selaku pengelola Wisma Atlet mengakui, penambahan ini disebabkan oleh pasien yang dinyatakan positif Covid-19 usai kembali dari mudik Lebaran.</span></p>', '2021-05-21 05:50:49', '2021-05-21 05:50:49'),
(8, 1, 'Data Vaksinasi COVID-19 (Update per 21 M', 'data-vaksinasi-covid-19-update-per-21-mei-2021', 'post/1621601613fusion-medical-animation-rnr8D3FNUNY-unsplash.jpg', '<p><img src=\"https://covid19.go.id/storage/app/uploads/public/60a/789/0a1/60a7890a1371e649593018.jpeg\" style=\"width: 677.25px;\"><br></p>', '2021-05-21 05:53:33', '2021-05-21 05:53:33'),
(9, 3, 'Redam Lonjakan COVID-19, Masyarakat Jang', 'redam-lonjakan-covid-19-masyarakat-jangan-berkerum', 'post/1621601947martin-sanchez-Tzoe6VCvQYg-unsplash.jpg', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Belajar dari pengalaman sebelumnya, terbukti terjadi lonjakan kasus pada empat momen libur panjang sepanjang 2020. Lonjakan kasus juga biasanya diikuti lonjakan kematian akibat COVID-19. Kecenderungan masyarakat yang melakukan perjalanan setiap libur panjang, menjadi pemicu lonjakan kasus karena hampir selalu diiringi oleh turunnya kepatuhan terhadap protokol kesehatan.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Dr. Sonny Harry B. Harmadi, Ketua Bidang Perubahan Perilaku Satgas Penanganan COVID-19, menyampaikan meningkatnya aktivitas perjalanan akan menciptakan kerumunan. Kepatuhan protokol 3M memakai masker, menjaga jarak, dan mencuci tangan, akan turut berkurang. “Inilah yang memicu lonjakan kasus. Lalu saat terjadi lonjakan kasus, beban pada pelayanan kesehatan juga ikut meningkat,” terangnya dalam Dialog bertema Terus Kencangkan Protokol Kesehatan yang diselenggarakan KPCPEN dan ditayangkan di FMB9ID_IKP, Kamis (20/5).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Dikhawatirkan pasien COVID-19 yang dirawat di RS akan datang secara bersamaan dengan jumlah yang besar. “Kalau sampai 7-8 ribu pasien dirawat bersamaan, maka RS akan sangat kewalahan sehingga tidak bisa membantu dengan maksimal,” ungkap dr. Lia G. Partakusuma Sp.PK. MM. MARS. Sekjen Perhimpunan Rumah Sakit Seluruh Indonesia (PERSI).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Tidak hanya itu saja, jumlah tenaga kesehatan juga dikhawatirkan tidak mencukupi apabila jumlah kasus yang dirawat di RS meningkat secara bersamaan. “SDM di ICU harus khusus, belum lagi apabila jumlah penularan tinggi, maka SDM kita akan mudah tertular seperti awal tahun yang lalu, banyak tenaga kesehatan kita tertular COVID-19,” jelas dr. Lia lebih lanjut.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Saat ini kondisi keterisian tempat tidur (bed occupancy ratio/BOR) secara nasional kurang dari 30%. Namun sudah ada beberapa provinsi yang menunjukkan peningkatan BOR cukup signifikan, “Aceh dan Sulawesi Barat BOR-nya kini sudah di atas 50%. Ada juga beberapa provinsi yang BOR-nya mencapai 25-50% seperti Sumatera Utara, Kalimantan Barat, dan Riau. Lalu yang peningkatannya 10-24% ada di Sumatera Barat, Bangka Belitung, Kep. Riau, Jawa Tengah, dan Jambi,” terang dr. Lia.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Untuk menekan dan menghindari kondisi terburuk itulah pemerintah memberlakukan peraturan peniadaan mudik tahun ini. Kondisi transportasi selama diberlakukannya aturan peniadaan mudik juga dinilai sangat efektif.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Diakui Dr. Sonny, “Transportasi baik angkutan laut, udara, bahkan angkutan darat lalu lintasnya turun 93%. Angkutan udara pun turun 70%. Esensi pelarangan mudik itu adalah agar masyarakat jangan melakukan perjalanan pada tanggal berapapun,” terangnya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Aturan pelarangan mudik tahun ini pun mampu menekan keinginan masyarakat untuk pulang ke kampung halaman, penelitian litbang Satgas COVID-19 menunjukkan sebelumnya masyarakat yang ingin melakukan mudik sebesar 33%, turun menjadi 11% setelah diberlakukan aturan pelarangan mudik, bahkan setelah sosialisasi terus menerus dilakukan, keinginan untuk mudik turun menjadi 7%.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Prof. Dr. dr. Soedjatmiko SpA(K). Msi., Guru Besar FKUI mengimbau agar membatasi kerumunan dimanapun, baik pemudik maupun yang tidak mudik. Bagi yang tidak mudik juga sebaiknya jangan berkerumun di pusat perbelanjaan, apalagi di tempat wisata. “Jangan sampai saudara kita tertular COVID-19 hingga bergejala berat dan masuk rumah sakit,” pesannya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Mengutip data Satgas COVID-19, Prof. Soedjatmiko menyebutkan bahwa dari 6-7 orang yang berkerumun ada 1 orang yang positif COVID-19. “Apalagi dalam kerumunan itu kecenderungan mengabaikan protokol kesehatan juga tinggi, seperti memakai masker tidak benar, bahkan tidak memakai masker sama sekali,” tegasnya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Begitu juga bagi yang sudah divaksinasi sebanyak dua dosis secara lengkap pun dihimbau oleh Prof. Soedjatmiko agar tidak berkerumun, “Masih ada peluang sebesar 35% bagi orang yang sudah divaksinasi untuk tertular COVID-19. Sehingga tidak ada jaminan kita kebal 100% dari COVID-19,”</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Untuk menghindari itu Prof. Soedjatmiko menyarankan, “Apabila ada keluarga yang mudik atau pernah berkerumun selama 1 jam atau lebih, perlu diwaspadai. Sarankan untuk swab Antigen atau PCR, dan bila perlu laporkan ke ketua RT/RW dan Satgas COVID-19 di lingkungan masing-masing,” sarannya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">***</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\"><span style=\"font-weight: bolder;\">Tentang Komite Penanganan COVID-19 dan Pemulihan Ekonomi Nasional (KPCPEN)</span>&nbsp;- Komite Penanganan COVID-19 dan Pemulihan Ekonomi Nasional (KPCPEN) dibentuk dalam rangka percepatan penanganan COVID-19 serta pemulihan perekonomian dan transformasi ekonomi nasional.&nbsp; Prioritas KPCPEN secara berurutan adalah: Indonesia Sehat, mewujudkan rakyat aman dari COVID-19 dan reformasi pelayanan kesehatan; Indonesia Bekerja, mewujudkan pemberdayaan dan percepatan penyerapan tenaga kerja; dan Indonesia Tumbuh, mewujudkan pemulihan dan transformasi ekonomi nasional. Dalam pelaksanaannya, KPCPEN dibantu oleh Satuan Tugas Penanganan COVID-19 dan Satuan Tugas Pemulihan dan Transformasi Ekonomi Nasional.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(119, 119, 119); line-height: 26px; font-family: Roboto, sans-serif; font-size: 18px;\">Tim Komunikasi Komite Penanganan COVID-19 dan Pemulihan Ekonomi Nasional</p>', '2021-05-21 05:59:07', '2021-05-21 05:59:07'),
(10, 3, 'test judul', 'test-judul', 'post/1621602035ATM_Bersama_logo.png', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2021-05-21 06:00:35', '2021-05-21 06:00:35'),
(11, 3, 'Belajar Bahasa Inggris yang baik dan ben', 'belajar-bahasa-inggris-yang-baik-dan-benar-dengan-', 'post/1621602075download.jpg', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-05-21 06:01:15', '2021-05-21 06:01:15'),
(12, 3, 'Belajar Bahasa Inggris yang baik dan ben', 'belajar-bahasa-inggris-yang-baik-dan-benar-dengan-', 'post/1621602075download.jpg', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-05-21 06:01:15', '2021-05-21 06:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-04-23 14:49:10', '2021-04-23 14:49:10'),
(2, 'user', '2021-04-23 14:49:10', '2021-04-23 14:49:10'),
(3, 'petugas', '2021-04-23 14:49:10', '2021-04-23 14:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `id_wilayah` bigint(5) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(5) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(5) UNSIGNED NOT NULL,
  `user_id` bigint(5) UNSIGNED NOT NULL,
  `nama_rumahsakit` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kamar` int(5) NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id`, `id_wilayah`, `id_kecamatan`, `id_kelurahan`, `user_id`, `nama_rumahsakit`, `alamat`, `no_telpon`, `jumlah_kamar`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 5, 3, 5, 1, 'RS Mitra Keluarga', 'Jl. Peta Selatan No. 1 Kel. Kalideres Kec. Kalideres Jakarta Barat', '0887284673', 200, '-6.1494945', '106.7001931', '2021-04-18 07:24:29', '2021-06-03 11:56:56'),
(3, 5, 4, 6, 1, 'RS Pondok Indah Puri Indah', 'Jl. Puri Indah Raya Blok S-2 Kel. Kembangan Selatan Kec. Kembangan Jakarta Barat', '09967673894', 300, '-6.1860849', '106.7331763', '2021-04-18 07:26:54', '2021-04-18 11:55:51'),
(4, 1, 10, 11, 1, 'RSUD Koja', 'Jl. Deli No.4, RT.11/RW.7, Koja, Kec. Koja, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14220', '0887284673', 200, '-6.1086821', '106.8979929', '2021-04-19 09:03:30', '2021-04-19 09:03:30'),
(5, 5, 3, 9, 1, 'RSUD Kalideres', 'Jl. Satu Maret No.48, RT.1/RW.4, Pegadungan, Kec. Kalideres, Kota Jakarta Barat', '1234567', 100, '-6.1266925', '106.7018525', '2021-04-21 08:43:19', '2021-04-21 08:43:19'),
(6, 5, 3, 5, 1, 'RS Hermina Daan Mogot', 'Jl. Kintamani Raya No.2, RT.1/RW.12, Kalideres, Kec. Kalideres, Kota Jakarta Barat', '0215408989', 100, '-6.1528705', '106.7098963', '2021-04-21 08:48:10', '2021-04-21 08:48:10'),
(7, 5, 1, 43, 1, 'RSUD Cengkareng', 'Jl. Bumi Cengkareng Indah No.1, RW.10, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat', '02154372874', 100, '-6.142992996508288', '106.73479566779329', '2021-04-22 10:55:46', '2021-04-22 10:56:49'),
(8, 1, 10, 27, 1, 'RSUD Tugu Koja', 'Jl. Walang Permai No.39, RT.6/RW.12, Tugu Utara, Kec. Koja, Kota Jakarta Utara', '(021) 4390 5651', 120, '-6.1273510253848436', '106.90700805254573', '2021-04-27 01:14:44', '2021-04-27 01:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_medis`
--

CREATE TABLE `tenaga_medis` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `id_rumahsakit` bigint(5) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(5) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(5) UNSIGNED NOT NULL,
  `id_wilayah` bigint(5) UNSIGNED NOT NULL,
  `jumlah_tenaga_medis` int(6) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenaga_medis`
--

INSERT INTO `tenaga_medis` (`id`, `id_rumahsakit`, `id_kelurahan`, `id_kecamatan`, `id_wilayah`, `jumlah_tenaga_medis`, `created_at`, `updated_at`) VALUES
(2, 4, 11, 10, 1, 120, '2021-04-19 10:02:05', '2021-04-19 12:19:01'),
(3, 8, 27, 10, 1, 120, '2021-04-27 01:16:50', '2021-04-27 01:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `role_id` bigint(5) UNSIGNED NOT NULL DEFAULT 3,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, '$2y$10$RfoppPNryAiIwLpZtXoSu..J6c8LNnRPyhTNOOB87kz53VnSsA26G', NULL, '2021-04-03 08:14:22', '2021-05-31 07:58:11'),
(3, 3, 'Petugas', 'petugas@petugas.com', NULL, '$2y$10$UVSb5USaL6lkqp7Q13hYsO.5BRkIBYwf.Tfiex/0znyHlQKkYTJtK', NULL, '2021-04-23 14:49:10', '2021-05-26 06:46:15'),
(9, 3, 'Wahid Dwi Saputra', 'wahid@gishealthy.com', NULL, '$2y$10$6d5c.ISI0LjGU5Cp0mrklOt3QHlG.0QqcDZyBUfN5hIYdHuPxlPAq', NULL, '2021-05-24 08:26:53', '2021-05-26 06:49:07'),
(11, 3, 'Milenium Adiputro Simanjuntak', 'neo@gishealthy.com', NULL, '$2y$10$0X34C49MRmXu4p05K52O5uqDOwg.kRrQduq8crENvxjIfENaWF3b6', NULL, '2021-05-24 09:06:14', '2021-05-24 09:06:14'),
(12, 3, 'Hardeka', 'hardeka@gishealthy.com', NULL, '$2y$10$3nspxgM8sM0zj442tgjONOnWsSJalkZ7GyHFg99GtsJGRZgxPR3iu', NULL, '2021-05-24 09:11:35', '2021-05-24 09:11:35'),
(13, 3, 'Mario', 'maria@mario.com', NULL, '$2y$10$dNP1o4sNnOK4NBTPWkvG3edq0do0WRoHl/DbdHXBJx8MRkGIVn9yC', NULL, '2021-05-24 09:17:58', '2021-05-24 09:17:58'),
(14, 3, 'wahyusubuh', 'wahyu@wahyu.com', NULL, '$2y$10$9m0GjrLWx7I0d4RmeFMepORdcXIcMLIWBgYNOpbB1qYDUlksDYxEW', NULL, '2021-05-24 09:22:32', '2021-05-24 09:22:32'),
(15, 3, 'nasrulyoutube', 'nasrul@youtube.com', NULL, '$2y$10$7Fcy9FLrcgRCtIAKNt7TYOjnRQmlTfazJDVIdbfO9Sdd55sklx992', NULL, '2021-05-24 09:38:59', '2021-05-24 09:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(5) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta Utara', '2021-04-13 07:29:47', '2021-04-13 07:29:47'),
(2, 'Jakarta Timur', '2021-04-13 07:33:14', '2021-04-13 07:33:14'),
(3, 'Jakarta Selatan', '2021-04-13 07:33:25', '2021-04-13 07:33:25'),
(4, 'Kep. Seribu', '2021-04-13 07:33:46', '2021-04-13 07:33:46'),
(5, 'Jakarta Barat', '2021-04-16 08:33:42', '2021-04-16 08:33:42'),
(6, 'Jakarta Pusat', '2021-04-18 01:10:57', '2021-04-18 01:10:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id_wilayah_foreign` (`id_wilayah`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_id_wilayah_foreign` (`id_wilayah`),
  ADD KEY `kelurahan_id_kecamatan_foreign` (`id_kecamatan`),
  ADD KEY `kelurahan_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id_wilayah_foreign` (`id_wilayah`),
  ADD KEY `pasien_id_kecamatan_foreign` (`id_kecamatan`),
  ADD KEY `pasien_id_kelurahan_foreign` (`id_kelurahan`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rumah_sakit_id_wilayah_foreign` (`id_wilayah`),
  ADD KEY `rumah_sakit_id_kecamatan_foreign` (`id_kecamatan`),
  ADD KEY `rumah_sakit_id_kelurahan_foreign` (`id_kelurahan`),
  ADD KEY `rumah_sakit_user_id_foreign` (`user_id`);

--
-- Indexes for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenaga_medis_id_rumahsakit_foreign` (`id_rumahsakit`),
  ADD KEY `tenaga_medis_id_kelurahan_foreign` (`id_kelurahan`),
  ADD KEY `tenaga_medis_id_kecamatan_foreign` (`id_kecamatan`),
  ADD KEY `tenaga_medis_id_wilayah_foreign` (`id_wilayah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_id_wilayah_foreign` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelurahan_id_wilayah_foreign` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelurahan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_id_kelurahan_foreign` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_id_wilayah_foreign` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD CONSTRAINT `rumah_sakit_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rumah_sakit_id_kelurahan_foreign` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rumah_sakit_id_wilayah_foreign` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rumah_sakit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  ADD CONSTRAINT `tenaga_medis_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_medis_id_kelurahan_foreign` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_medis_id_rumahsakit_foreign` FOREIGN KEY (`id_rumahsakit`) REFERENCES `rumah_sakit` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tenaga_medis_id_wilayah_foreign` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
