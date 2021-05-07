-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 04:50 AM
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(17, '2021_04_30_021101_create_pasien_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL,
  `usia` int(10) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Positif','Meninggal','Sembuh') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `judul`, `slug`, `gambar`, `body`, `created_at`, `updated_at`) VALUES
(4, 1, 'saya orang baik', 'saya-orang-baik', 'saya-orang-baik-1618161291.jpg', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '2021-04-11 10:14:51', '2021-04-11 14:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_rumahsakit` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id`, `id_wilayah`, `id_kecamatan`, `id_kelurahan`, `user_id`, `nama_rumahsakit`, `alamat`, `no_telpon`, `jumlah_kamar`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 5, 3, 5, 1, 'RS Mitra Keluarga Kalideres', 'Jl. Peta Selatan No. 1 Kel. Kalideres Kec. Kalideres Jakarta Barat', '0887284673', 200, '-6.1494945', '106.7001931', '2021-04-18 07:24:29', '2021-04-18 11:55:17'),
(3, 5, 4, 6, 1, 'RS Pondok Indah Puri Indah', 'Jl. Puri Indah Raya Blok S-2 Kel. Kembangan Selatan Kec. Kembangan Jakarta Barat', '09967673894', 300, '-6.1860849', '106.7331763', '2021-04-18 07:26:54', '2021-04-18 11:55:51'),
(4, 1, 10, 11, 1, 'RSUD Koja', 'Jl. Deli No.4, RT.11/RW.7, Koja, Kec. Koja, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14220', '0887284673', 200, '-6.1086821', '106.8979929', '2021-04-19 09:03:30', '2021-04-19 09:03:30'),
(5, 5, 3, 9, 1, 'RSUD Kalideres', 'Jl. Satu Maret No.48, RT.1/RW.4, Pegadungan, Kec. Kalideres, Kota Jakarta Barat', '1234567', 100, '-6.1266925', '106.7018525', '2021-04-21 08:43:19', '2021-04-21 08:43:19'),
(6, 5, 3, 5, 1, 'RS Hermina Daan Mogot', 'Jl. Kintamani Raya No.2, RT.1/RW.12, Kalideres, Kec. Kalideres, Kota Jakarta Barat', '0215408989', 100, '-6.1528705', '106.7098963', '2021-04-21 08:48:10', '2021-04-21 08:48:10'),
(7, 5, 1, 43, 1, 'RSUD Cengkareng', 'Jl. Bumi Cengkareng Indah No.1, RW.10, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat', '02154372874', 100, '-6.142992996508288', '106.73479566779329', '2021-04-22 10:55:46', '2021-04-22 10:56:49'),
(8, 1, 10, 27, 1, 'RSUD Tugu Koja', 'Jl. Walang Permai No.39, RT.6/RW.12, Tugu Utara, Kec. Koja, Kota Jakarta Utara', '(021) 4390 5651', 120, '-6.1273510253848436,', '106.90700805254573', '2021-04-27 01:14:44', '2021-04-27 01:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_medis`
--

CREATE TABLE `tenaga_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rumahsakit` bigint(20) UNSIGNED NOT NULL,
  `id_kelurahan` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL,
  `jumlah_tenaga_medis` int(10) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 1, 'Admin', 'admin@admin.com', NULL, '$2y$10$yKdw0089jMoupwswHtQhaeJiS1llxiLH/Xs4zMTfPc4pzSgldOhRe', NULL, '2021-04-03 08:14:22', '2021-04-04 06:12:21'),
(2, 2, 'User', 'user@user.com', NULL, '$2y$10$ofxRDaoZsLF3pT8a/OjyrubF9gdgTvNkh3AK24/U9ugacxyYxFrfu', NULL, '2021-04-23 14:49:10', '2021-04-23 14:49:10'),
(3, 3, 'Petugas', 'petugas@petugas.com', NULL, '$2y$10$pcsJOoGyCNcFZCuRXzEWR.dOrNsmAsklzuawSnn2toiV6zDIbmrzq', NULL, '2021-04-23 14:49:10', '2021-04-23 14:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
