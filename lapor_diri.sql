-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 03:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapor_diri`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `nama_banner` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_aktif` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `nama_banner`, `gambar`, `status_aktif`, `created_at`, `updated_at`) VALUES
(1, 'Pasar Rakyat Kasang', '2.jpeg', 'Y', '2020-05-18 07:40:53', '2020-05-18 08:56:26'),
(3, 'Pemesanan Pasar Tradisional Online', 'parto.jpeg', 'Y', '2020-05-18 01:38:17', '2020-05-18 08:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `formstatus`
--

CREATE TABLE `formstatus` (
  `id` int(11) NOT NULL,
  `nama_form` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formstatus`
--

INSERT INTO `formstatus` (`id`, `nama_form`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pendaftaran', 'Aktif', '2021-04-29 07:44:47', '2021-05-01 05:40:20'),
(2, 'hasil_gowes', 'Aktif', '2021-04-29 07:44:47', '2021-05-15 08:57:48'),
(3, 'sertifikat', 'Aktif', '2021-04-30 14:57:00', '2021-07-13 12:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'TELANAIPURA', '2020-05-01 10:21:25', '0000-00-00 00:00:00'),
(2, 'JELUTUNG', '2020-05-01 03:21:33', '2020-05-01 10:37:23'),
(3, 'KOTABARU', '2020-05-01 03:23:49', '2020-05-01 10:23:49'),
(6, 'PASAR JAMBI', '2020-05-01 03:52:56', '2020-05-01 10:53:22'),
(8, 'JAMBI TIMUR', '2020-05-01 07:05:54', '2020-05-01 14:05:54'),
(9, 'JAMBI SELATAN', '2020-05-01 07:06:07', '2020-05-01 14:06:07'),
(10, 'DANAU TELUK', '2020-05-01 07:06:18', '2020-05-01 14:06:18'),
(11, 'PELAYANGAN', '2020-05-01 07:06:29', '2020-05-01 14:06:29'),
(12, 'ALAM BARAJO', '2020-05-01 07:06:40', '2020-05-01 14:06:40'),
(13, 'PAAL MERAH', '2020-05-01 07:06:52', '2020-05-01 14:06:52'),
(14, 'DANAU SIPIN', '2020-05-01 07:07:04', '2020-05-01 14:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kecamatan_id`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Simpang IV Sipin', '2020-05-01 14:18:24', '2020-05-01 14:19:26'),
(2, 1, 'Buluran Kenali', '2020-05-01 07:20:00', '2020-05-01 14:20:00'),
(3, 1, 'Teluk Kenali', '2020-05-01 07:21:05', '2020-05-01 14:21:05'),
(4, 1, 'Telanaipura', '2020-05-01 07:21:24', '2020-05-01 14:21:24'),
(5, 1, 'Penyengat Rendah', '2020-05-01 07:21:57', '2020-05-01 14:21:57'),
(6, 1, 'Pematang Sulur', '2020-05-01 07:22:16', '2020-05-01 14:22:16'),
(7, 2, 'Jelutung', '2020-05-01 07:25:16', '2020-05-01 14:25:16'),
(8, 2, 'Kebun Handil', '2020-05-01 07:25:41', '2020-05-01 14:25:41'),
(9, 2, 'Cempaka Putih', '2020-05-01 07:25:55', '2020-05-01 14:25:55'),
(10, 2, 'Talang Jauh', '2020-05-01 07:26:10', '2020-05-01 14:26:10'),
(11, 2, 'Lebak Bandung', '2020-05-01 07:26:33', '2020-05-01 14:26:33'),
(12, 2, 'Payo Lebar', '2020-05-01 07:26:54', '2020-05-01 14:26:54'),
(13, 2, 'Handil Jaya', '2020-05-01 07:27:36', '2020-05-01 14:27:36'),
(14, 3, 'Suka Karya', '2020-05-01 07:39:27', '2020-05-01 14:39:27'),
(15, 3, 'Simpang III Sipin', '2020-05-01 07:40:49', '2020-05-01 14:40:49'),
(16, 3, 'Paal Lima', '2020-05-01 07:41:10', '2020-05-01 14:41:10'),
(17, 3, 'Kenali Asam Bawah', '2020-05-01 07:41:46', '2020-05-01 14:41:46'),
(18, 3, 'Kenali Asam Atas', '2020-05-25 18:32:42', '2020-05-26 01:32:42'),
(19, 6, 'Pasar Jambi', '2020-05-25 18:33:24', '2020-05-26 01:33:24'),
(20, 6, 'Beringin', '2020-05-25 18:33:50', '2020-05-26 01:33:50'),
(21, 6, 'Sungai Asam', '2020-05-25 18:34:08', '2020-05-26 01:34:08'),
(22, 6, 'Orang Kayo Hitam', '2020-05-25 18:34:33', '2020-05-26 01:34:33'),
(23, 8, 'Sijenjang', '2020-05-25 18:35:16', '2020-05-26 01:35:16'),
(24, 8, 'Kasang Jaya', '2020-05-25 18:35:33', '2020-05-26 01:35:33'),
(25, 8, 'Talang Banjar', '2020-05-25 18:35:56', '2020-05-26 01:35:56'),
(26, 8, 'Budiman', '2020-05-25 18:36:18', '2020-05-26 01:36:18'),
(27, 8, 'Sulanjana', '2020-05-25 18:36:32', '2020-05-26 01:36:32'),
(28, 8, 'Kasang', '2020-05-25 18:36:56', '2020-05-26 01:36:56'),
(29, 8, 'Tanjung Sari', '2020-05-25 18:37:29', '2020-05-26 01:37:29'),
(30, 8, 'Rajawali', '2020-05-25 18:37:53', '2020-05-26 01:37:53'),
(31, 8, 'Tanjung Pinang', '2020-05-25 18:38:12', '2020-05-26 01:38:12'),
(32, 9, 'Pasir Putih', '2020-05-25 18:38:56', '2020-05-26 01:38:56'),
(33, 9, 'Tambak Sari', '2020-05-25 18:39:12', '2020-05-26 01:39:12'),
(34, 9, 'The Hok', '2020-05-25 18:39:34', '2020-05-26 01:39:34'),
(35, 9, 'Wijayapura', '2020-05-25 18:40:03', '2020-05-26 01:40:03'),
(36, 9, 'Pakuan baru', '2020-05-25 18:40:23', '2020-05-26 01:40:23'),
(37, 10, 'Pasir Panjang', '2020-05-25 18:40:58', '2020-05-26 01:40:58'),
(38, 10, 'Tanjung Raden', '2020-05-25 18:41:24', '2020-05-26 01:41:24'),
(39, 10, 'Olak Kemang', '2020-05-25 18:41:44', '2020-05-26 01:41:44'),
(40, 10, 'Tanjung Pasir', '2020-05-25 18:42:01', '2020-05-26 01:42:01'),
(41, 10, 'Ulu Gedong', '2020-05-25 18:42:19', '2020-05-26 01:42:19'),
(42, 11, 'Arab Melayu', '2020-05-25 18:44:04', '2020-05-26 01:44:04'),
(43, 11, 'Mudung Laut', '2020-05-25 18:44:27', '2020-05-26 01:44:27'),
(44, 11, 'Tengah', '2020-05-25 18:44:43', '2020-05-26 01:44:43'),
(45, 11, 'Tahtul Yaman', '2020-05-25 18:45:14', '2020-05-26 01:45:14'),
(46, 11, 'Jelmu', '2020-05-25 18:45:28', '2020-05-26 01:45:28'),
(47, 11, 'Tanjung Johor', '2020-05-25 18:46:01', '2020-05-26 01:46:01'),
(48, 12, 'Kenali Besar', '2020-05-25 18:46:36', '2020-05-26 01:46:36'),
(49, 12, 'Rawasari', '2020-05-25 18:47:03', '2020-05-26 01:47:03'),
(50, 12, 'Beliung', '2020-05-25 18:47:25', '2020-05-26 01:47:25'),
(51, 12, 'Mayang Mangurai', '2020-05-25 18:47:36', '2020-05-26 01:47:36'),
(52, 12, 'Bagan Pete', '2020-05-25 18:48:10', '2020-05-26 01:48:10'),
(53, 13, 'Talang Bakung', '2020-05-25 18:48:38', '2020-05-26 01:48:38'),
(54, 13, 'Payo Selincah', '2020-05-25 18:48:57', '2020-05-26 01:48:57'),
(55, 13, 'Eka Jaya', '2020-05-25 18:49:09', '2020-05-26 01:49:09'),
(56, 13, 'Lingkar Selatan', '2020-05-25 18:49:27', '2020-05-26 01:49:27'),
(57, 13, 'Paal Merah', '2020-05-25 18:49:55', '2020-05-26 01:49:55'),
(58, 14, 'Sungai Putri', '2020-05-25 18:50:15', '2020-05-26 01:50:15'),
(59, 14, 'Murni', '2020-05-25 18:50:28', '2020-05-26 01:50:28'),
(60, 14, 'Solok Sipin', '2020-05-25 18:50:41', '2020-05-26 01:50:41'),
(61, 14, 'Selamat', '2020-05-25 18:50:54', '2020-05-26 01:50:54'),
(62, 14, 'Legok', '2020-05-25 18:51:10', '2020-05-26 01:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `lapor_diri`
--

CREATE TABLE `lapor_diri` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `no_rumah` varchar(10) NOT NULL,
  `foto_test` varchar(255) NOT NULL,
  `tgl_test` date NOT NULL,
  `tempat_test` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `strava` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `no_pendaftaran`, `nama`, `nik`, `email`, `tgl_lahir`, `jenis_kelamin`, `alamat_lengkap`, `kota`, `no_hp`, `kategori`, `instagram`, `facebook`, `strava`, `created_at`, `updated_at`) VALUES
(1, '', 'arda', '3453', 'ayu@gmail.com', '2020-08-05', 'ss', 'sfsd', 'fsdfsd', 'sdfsdf', '8', 'sfsf', 'sdfs', 'sdf', '2020-08-05 02:52:35', '2020-08-05 09:52:35'),
(2, '08-0002', 'sdfs', 'sdf', 'ayudd@gmail.com', '2020-08-11', 'sdf', 'dfdf', 'sdf', 'sdf', '08', 'sdf', 'sf', 'sdf', '2020-08-05 03:11:44', '2020-08-05 10:11:44'),
(3, '17-0003', 'aaaa', '11111', '4@gmail.com', '2020-08-05', 'aaaa', 'aaaa', 'aaaa', 'aaaa', '17', 'aaa', 'aaaa', 'aaaa', '2020-08-05 03:13:19', '2020-08-05 10:13:19'),
(4, '08-0004', 'hjhj', 'hjhj', 'email@gmail.com', '2020-08-04', 'hjhj', 'hjh', 'jhj', 'hj', '08', 'hj', 'hj', 'hj', '2020-08-05 03:21:52', '2020-08-05 10:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_test`
--

CREATE TABLE `tempat_test` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(233) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `aktif`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin', 'Y', 'yy@gmail.com', NULL, NULL, '$2y$10$PW0hOYRHLqps4RBPo/kppOx.ebg.POzKcUujHMTprCs1zLmonYHm.', NULL, '2020-06-16 21:08:02', '2021-04-19 05:52:58'),
(2, 'Nanang Maulana Syarif', 'nanang', 'superadmin', 'Y', 'nanang.ms22@gmail.com', NULL, NULL, '$2y$10$szlOxJUW.V/C9RhL8.kkgeOdr9NmB9TInGQWjaiBsjcZfjK2lkh6i', NULL, '2020-08-05 19:55:40', '2021-04-19 05:44:06'),
(3, 'Hendra', 'hendra', 'admin', 'Y', 'hendra@gmail.com', NULL, NULL, '$2y$10$myL35K6bVjHwLZ9mPjtuL.u2NGViD43Of.PiqI.34ALetDq.uIZzW', NULL, '2020-08-18 04:10:01', '2021-05-01 10:46:58'),
(4, 'Sudirman', 'sudirman', 'admin', 'Y', 'sudirman@gmail.com', NULL, NULL, '$2y$10$jBrcw8aqO/okpJ03bjag7Oph13.N1avTMR6nvoNsuzMq5AKwr.H8u', NULL, '2021-05-03 00:48:53', '2021-05-03 00:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formstatus`
--
ALTER TABLE `formstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapor_diri`
--
ALTER TABLE `lapor_diri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_test`
--
ALTER TABLE `tempat_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formstatus`
--
ALTER TABLE `formstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `lapor_diri`
--
ALTER TABLE `lapor_diri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tempat_test`
--
ALTER TABLE `tempat_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
