-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 09:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster1`
--

CREATE TABLE `cluster1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cluster2`
--

CREATE TABLE `cluster2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Oebobo', '2023-05-21 01:48:15', '2023-05-21 01:43:27'),
(2, 'Kelapa Lima', '2023-05-21 01:45:48', '2023-05-21 01:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan_kelurahan`
--

CREATE TABLE `kecamatan_kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `kelurahan_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan_kelurahan`
--

INSERT INTO `kecamatan_kelurahan` (`id`, `kecamatan_id`, `kelurahan_id`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2023-05-21 02:05:36', '2023-05-21 02:01:52'),
(3, 2, 4, '2023-05-21 02:02:52', '2023-05-21 02:02:52'),
(4, 1, 2, '2023-05-21 20:07:59', '2023-05-21 20:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(42, 'A', NULL, NULL),
(43, 'B', NULL, NULL),
(44, 'C', NULL, NULL),
(45, 'D', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Kayu Putih', '2023-05-21 01:53:52', '2023-05-21 01:53:44'),
(2, 'Tuak Daun Merah', '2023-05-21 01:54:01', '2023-05-21 01:54:01'),
(4, 'Pasir Panjang', '2023-05-21 01:54:25', '2023-05-21 01:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(16, 'Nilai Rata-Rata Pengetahuan', '2023-06-18 23:15:44', '2023-04-21 09:18:23'),
(18, 'Nilai Rata-Rata Keterampilan', '2023-05-18 22:11:02', '2023-04-24 00:21:05'),
(19, 'Jumlah Penghasilan Orang Tua', '2023-05-18 22:11:18', '2023-04-24 00:22:28'),
(20, 'Jumlah Tanggungan Orang Tua', '2023-05-18 22:11:28', '2023-04-24 00:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_19_134504_make_kasus_table', 1),
(3, '2022_09_19_145703_create_puskesmas_table', 2),
(4, '2022_09_19_150923_create_kecamatan_table', 3),
(6, '2022_09_19_151045_create_kelurahan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nis` varchar(128) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tingkat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `jk`, `tgl_lahir`, `kecamatan_id`, `kelurahan_id`, `tingkat_id`, `kelas_id`, `updated_at`, `created_at`) VALUES
(17, 'Max Robinson Tagi Huma', '2134', 'Laki - Laki', '04/27/2008', 1, 2, 4, 42, '2023-05-21 21:02:48', '2023-04-07 01:22:24'),
(18, 'Antonia Akulina Elsandha Pohto', '3345', 'Perempuan', '08/28/2008', 1, 1, 1, 43, '2023-05-21 23:54:16', '2023-04-07 01:23:38'),
(19, 'Esther Laure', '4234', 'Perempuan', '12/22/2008', NULL, NULL, 1, NULL, '2023-05-15 02:59:50', '2023-04-07 01:25:57'),
(20, 'Sonia Agnes Nenotek', '2194', 'Perempuan', '12/12/2008', NULL, NULL, 1, NULL, '2023-05-15 03:00:55', '2023-04-08 15:36:09'),
(21, 'Bryan Julio Oematan', '3229', 'Laki - Laki', '11/18/2008', NULL, NULL, 1, NULL, '2023-05-15 03:02:08', '2023-04-08 16:11:37'),
(22, 'Esterranda Afri Bella', '1499', 'Perempuan', '05/12/2008', NULL, NULL, 1, NULL, '2023-05-15 03:04:20', '2023-04-08 16:34:57'),
(23, 'Brigita Jesica Faot', '5760', 'Perempuan', '09/07/2008', NULL, NULL, 1, NULL, '2023-05-15 03:05:41', '2023-04-08 17:34:13'),
(25, 'Mesandra Boimau', '5645', 'Perempuan', '08/23/2008', NULL, NULL, 1, NULL, '2023-05-15 03:07:34', '2023-04-28 10:05:44'),
(26, 'Nadine Gretha Ester Letty', '2802', 'Perempuan', '07/15/2008', NULL, NULL, 1, NULL, '2023-05-15 03:08:38', '2023-04-28 10:06:16'),
(27, 'Evered P.O. Haning', '1054', 'Perempuan', '06/23/2008', NULL, NULL, 1, NULL, '2023-05-15 03:10:20', '2023-04-28 10:09:28'),
(28, 'Muhammad Lukman Bali', '5390', 'Laki - Laki', '05/23/2008', NULL, NULL, 1, NULL, '2023-05-15 03:11:36', '2023-04-28 10:09:42'),
(29, 'Sonia Anja Indira Daulika', '1187', 'Perempuan', '04/18/2008', NULL, NULL, 1, NULL, '2023-05-15 03:12:57', '2023-04-28 10:09:54'),
(30, 'Santo Yosep Herin', '1217', 'Laki - Laki', '03/19/2008', NULL, NULL, 1, NULL, '2023-05-15 03:14:41', '2023-04-28 10:10:05'),
(31, 'Antonia Bana', '8767', 'Perempuan', '02/23/2008', NULL, NULL, 1, NULL, '2023-05-15 03:17:32', '2023-04-28 10:10:21'),
(32, 'Marshalinda B. P. Fudikoa', '1512', 'Perempuan', '01/20/2008', NULL, NULL, 1, NULL, '2023-05-15 03:18:39', '2023-04-28 10:10:34'),
(33, 'Tereza A. Muda Rihi', '2196', 'Perempuan', '01/19/2008', NULL, NULL, 1, NULL, '2023-05-15 03:19:57', '2023-04-28 10:10:48'),
(34, 'Hilyatus faradiba', '5394', 'Laki - Laki', '02/20/2008', NULL, NULL, 1, NULL, '2023-05-15 03:23:37', '2023-04-28 10:11:31'),
(35, 'Leonardo Soares', '3208', 'Laki - Laki', '04/16/2008', NULL, NULL, 1, NULL, '2023-05-15 03:26:40', '2023-04-28 10:12:27'),
(36, 'Dona . A. A Gawalu', '1206', 'Perempuan', '05/26/2008', NULL, NULL, 1, NULL, '2023-05-15 03:28:04', '2023-04-28 10:12:40'),
(37, 'Josef Mario Seran Nuak', '1213', 'Laki - Laki', '05/09/2008', NULL, NULL, 1, NULL, '2023-05-15 03:29:14', '2023-04-28 10:12:52'),
(442, 'vgyugu', '687', 'Laki - laki', '06/16/2023', 1, 2, 1, 42, '2023-06-16 21:43:59', '2023-06-16 21:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kriteria`
--

CREATE TABLE `siswa_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bobot` double NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_kriteria`
--

INSERT INTO `siswa_kriteria` (`id`, `siswa_id`, `kriteria_id`, `bobot`, `updated_at`, `created_at`) VALUES
(2041, 17, 16, 84.9, '2023-06-19 02:14:54', '2023-06-19 00:47:38'),
(2042, 17, 18, 88.9, '2023-06-19 02:14:54', '2023-06-19 00:47:38'),
(2043, 17, 19, 400000, '2023-06-19 02:15:03', '2023-06-19 00:47:38'),
(2044, 17, 20, 5, '2023-06-19 02:14:54', '2023-06-19 00:47:38'),
(2056, 18, 16, 88.1, '2023-06-19 02:14:15', '2023-06-19 01:52:32'),
(2057, 18, 18, 90.5, '2023-06-19 02:14:15', '2023-06-19 01:52:32'),
(2058, 18, 19, 1500000, '2023-06-19 02:14:15', '2023-06-19 01:52:32'),
(2059, 18, 20, 1, '2023-06-19 02:14:15', '2023-06-19 01:52:32'),
(2060, 19, 16, 82.9, '2023-06-19 02:15:39', '2023-06-19 01:56:34'),
(2061, 19, 18, 83.3, '2023-06-19 02:15:39', '2023-06-19 01:56:35'),
(2062, 19, 19, 1000000, '2023-06-19 02:15:39', '2023-06-19 01:56:35'),
(2063, 19, 20, 2, '2023-06-19 02:15:39', '2023-06-19 01:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, '7', '2023-05-04 05:51:20', '2023-04-08 12:49:33'),
(4, '8', '2023-04-08 17:33:26', '2023-04-08 13:18:21'),
(5, '9', '2023-04-08 17:33:32', '2023-04-08 17:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat_kelas`
--

CREATE TABLE `tingkat_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tingkat_kelas`
--

INSERT INTO `tingkat_kelas` (`id`, `tingkat_id`, `kelas_id`, `updated_at`, `created_at`) VALUES
(1, 1, 42, '2023-05-22 00:10:44', NULL),
(2, 1, 43, NULL, NULL),
(3, 1, 44, NULL, NULL),
(4, 4, 42, NULL, NULL),
(5, 4, 43, NULL, NULL),
(6, 5, 42, '2023-05-22 00:06:43', '2023-05-22 00:06:43'),
(7, 1, 45, '2023-06-01 19:35:01', '2023-06-01 19:35:01'),
(8, 4, 44, '2023-06-01 19:35:11', '2023-06-01 19:35:11'),
(9, 4, 45, '2023-06-01 19:35:19', '2023-06-01 19:35:19'),
(10, 5, 43, '2023-06-01 19:35:27', '2023-06-01 19:35:27'),
(11, 5, 44, '2023-06-01 19:35:35', '2023-06-01 19:35:35'),
(12, 5, 45, '2023-06-01 19:35:43', '2023-06-01 19:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$CDUegRnPLXbZT9jpyonuRe5OlcN568PoG7Kt1yFJ8BxPG.bOcsB1e', 1, NULL, '2023-05-23 03:11:52'),
(15, 'a', '$2y$10$2nHrMssIHsy.qVb8bFgcIe.2iOLnh4iCSYuDmiBzSjda1duNNcTpu', NULL, '2023-04-08 18:42:31', '2023-04-08 18:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cluster1`
--
ALTER TABLE `cluster1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cluster2`
--
ALTER TABLE `cluster2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`,`kelurahan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tingkat_id` (`tingkat_id`,`kelas_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`,`kelurahan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `siswa_kriteria`
--
ALTER TABLE `siswa_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`siswa_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tingkat_id` (`tingkat_id`,`kelas_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cluster1`
--
ALTER TABLE `cluster1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cluster2`
--
ALTER TABLE `cluster2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `siswa_kriteria`
--
ALTER TABLE `siswa_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2064;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  ADD CONSTRAINT `kecamatan_kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kecamatan_kelurahan_ibfk_2` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`tingkat_id`) REFERENCES `tingkat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_4` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_5` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_6` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `siswa_kriteria`
--
ALTER TABLE `siswa_kriteria`
  ADD CONSTRAINT `siswa_kriteria_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_kriteria_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  ADD CONSTRAINT `tingkat_kelas_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tingkat_kelas_ibfk_2` FOREIGN KEY (`tingkat_id`) REFERENCES `tingkat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
