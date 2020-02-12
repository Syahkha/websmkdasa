-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 02:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `judul_url` text DEFAULT NULL,
  `artikel` longtext DEFAULT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `show` enum('Y','N') NOT NULL,
  `gambar` text NOT NULL,
  `idkategori` varchar(191) NOT NULL,
  `dilihat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `judul_url`, `artikel`, `tanggal`, `id_admin`, `show`, `gambar`, `idkategori`, `dilihat`) VALUES
(1, 'Selamat datang', 'Selamat-datang', '<p>fsafafaf</p>\r\n<p>asfasgaga</p>\r\n<p>asgasga</p>\r\n<p>asgsaga</p>\r\n<p>asgagasg</p>\r\n<p>sagasgasg</p>\r\n<p>hh</p>\r\n<p>hreh</p>\r\n<p>erhreherh</p>', '03-02-2020 13:18:04', '1', 'Y', '1580735884-blur-breathtaking-clouds-1903702.jpg', '3', NULL),
(2, 'Selamat datang', 'Selamat-datang', '<p>artikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikel</p>\r\n<p>artikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikel</p>\r\n<p>artikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikelartikel</p>\r\n<p>artikelartikelartikelartikel&nbsp;artikelartikelartikel&nbsp;artikelartikelartikel&nbsp;artikelartikelartikel&nbsp;artikelartikelartikelartikel</p>', '04-02-2020 06:40:35', '1', 'Y', '1580798435-blur-breathtaking-clouds-1903702.jpg', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) NOT NULL,
  `kategori` varchar(191) DEFAULT NULL,
  `url_kategori` text NOT NULL,
  `edit` enum('Y','N') NOT NULL,
  `show` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `url_kategori`, `edit`, `show`) VALUES
(2, 'Siswa Menulis', 'Siswa-Menulis', 'N', 'Y'),
(6, 'Kegiatan', 'Kegiatan', 'N', 'Y');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` bigint(20) NOT NULL,
  `idortu` int(11) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `kebutuhan_khusus_ayah` varchar(50) DEFAULT NULL,
  `no_hp_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `kebutuhan_khusus_ibu` varchar(50) DEFAULT NULL,
  `no_hp_ibu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `idortu`, `nama_ayah`, `tahun_lahir_ayah`, `jenjang_pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `kebutuhan_khusus_ayah`, `no_hp_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `jenjang_pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `kebutuhan_khusus_ibu`, `no_hp_ibu`) VALUES
(2, 54321, 'Bastomi', '1900', 'SMA', 'asdf', '1000', NULL, '081234567890', 'Welasmiati', '1900', 'SD', 'asdftg', '4000', NULL, '081234567890');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `webname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak1` varchar(50) NOT NULL,
  `kontak2` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `youtube` text DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `psb` enum('Y','N') NOT NULL,
  `profil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `webname`, `email`, `kontak1`, `kontak2`, `facebook`, `instagram`, `twitter`, `youtube`, `alamat`, `kota`, `provinsi`, `logo`, `icon`, `banner`, `psb`, `profil`) VALUES
(1, 'SMK Plus Darussalam', 'smkplusdarusalam@gmail.com', '2395325235', '52353253252', 'facebook', 'instagram', 'twitter', 'youtube', 'ngronggo', 'kediri', 'Jawa Timur', '1580737882-logo2.png', '1580738100-images (2).jpeg', '1580656816-347044ee1378650819b8ee00cc7b6134.jpg', 'Y', 'dassafsafsafsafsafsafsafsaasfaf');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) NOT NULL,
  `hari_tanggal` varchar(50) DEFAULT NULL,
  `no_pendaftaran` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(191) DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `ttl` varchar(191) DEFAULT NULL,
  `nik` varchar(191) DEFAULT NULL,
  `agama` varchar(191) DEFAULT NULL,
  `kebutuhan_khusus` varchar(191) DEFAULT NULL,
  `alamat` varchar(191) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `dusun` varchar(191) DEFAULT NULL,
  `kelurahan` varchar(191) DEFAULT NULL,
  `kecamatan` varchar(191) DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `jenis_tinggal` varchar(191) DEFAULT NULL,
  `alat_transportasi` varchar(191) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `no_peserta_un` varchar(50) DEFAULT NULL,
  `penerima_kip` enum('Ya','Tidak') DEFAULT NULL,
  `no_kip` varchar(191) DEFAULT NULL,
  `berat_badan` varchar(191) DEFAULT NULL,
  `tinggi_badan` varchar(191) DEFAULT NULL,
  `jarak_rumah_sekolah` varchar(191) DEFAULT NULL,
  `waktu_tempuh` varchar(191) DEFAULT NULL,
  `jumlah_saudara` varchar(191) DEFAULT NULL,
  `idortu` int(11) DEFAULT NULL,
  `ppdb` enum('terima','belum','tolak') DEFAULT 'belum',
  `status` enum('lulus','belum') DEFAULT 'belum',
  `ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `hari_tanggal`, `no_pendaftaran`, `nama_lengkap`, `gender`, `nisn`, `tempat_lahir`, `ttl`, `nik`, `agama`, `kebutuhan_khusus`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `telp`, `hp`, `email`, `no_peserta_un`, `penerima_kip`, `no_kip`, `berat_badan`, `tinggi_badan`, `jarak_rumah_sekolah`, `waktu_tempuh`, `jumlah_saudara`, `idortu`, `ppdb`, `status`, `ket`) VALUES
(7, 'Sabtu, 25/01/2020', 1, 'Aji Putra Prayogi', 'Laki-Laki', '12345', 'Teluk Belengkong', '20-09-2002', '54321', 'Islam', NULL, 'Jalan Raya Bulurejo', 25, 3, 'Bulurejo', 'Blabak', 'Pesantren', '15243', 'Bersama Orangtua', 'Sepeda Montor', '081234567890', '081234567890', 'ajiputraprayogi@gmail.com', '012', 'Ya', '67890', '40kg', '173cm', 'Lebih dari 1 Kilometer', '17 Menit', '3', 54321, 'tolak', 'belum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` bigint(25) NOT NULL,
  `sub_kategori` text DEFAULT NULL,
  `kategori_id` int(25) NOT NULL DEFAULT 0,
  `url_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `sub_kategori`, `kategori_id`, `url_kategori`) VALUES
(1, 'Pramuka', 3, NULL),
(2, 'Osis', 3, NULL),
(3, 'Resensi', 2, NULL),
(4, 'Artikel', 2, NULL),
(5, 'Pramuka', 6, NULL),
(6, 'Osis', 6, NULL),
(7, 'Ekstrakulikuler', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` enum('Developer','Superadmin','Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'Superadmin', '$2y$10$dZL3.RaUj3HZ01rpqBoOBuIODEjWjDLsa6J3kMPZ7UeZrx8Ukjnnu', NULL, '2020-01-08 08:35:16', '2020-01-08 08:35:16'),
(2, 'ajiputraprayogi', 'ajiputraprayogi@gmail.com', NULL, 'Admin', '$2y$10$FZKiRD.HkQoPG3FUTypycO34P4St8B3qNF9z7jCMWQaIhsVZ2WMvC', NULL, NULL, NULL),
(3, 'syahrilkarim', 'syahrilkarim@gmail.com', NULL, 'User', '$2y$10$YEvAPSPR5qMf6FmJleAZoe69iUdJrWeJKNZ5QpgRZ2MHAqt0He17.', NULL, NULL, NULL),
(5, 'taufikperdana', 'anakmbarep999@gmail.com', NULL, 'User', '$2y$10$TxU1WxM1lZzmwpVkJ5KdquOG3v8xe3b2zv8Es13m3Mq/viRFEdik2', NULL, NULL, NULL),
(6, 'afanfandy', 'afanfandy@gmail.com', NULL, 'User', '$2y$10$TgfrliI/yUG1FLnjltS3wuWDZk7J0W.hW4YQ8SypyHqp.7EbjrI..', NULL, NULL, NULL),
(7, 'developer', 'xiirpl2020@gmail.com', NULL, 'Developer', '$2y$10$OAb4u2sAAVIwH1NiXoQT4.SyrSE/nGg4uV.uEEOULCgreGdy.O1Ti', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
