-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for smk
CREATE DATABASE IF NOT EXISTS `smk` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `smk`;

-- Dumping structure for table smk.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `judul_url` text DEFAULT NULL,
  `artikel` longtext DEFAULT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `show` enum('Y','N') NOT NULL,
  `gambar` text NOT NULL,
  `idkategori` varchar(191) NOT NULL,
  `dilihat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table smk.artikel: ~1 rows (approximately)
DELETE FROM `artikel`;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
INSERT INTO `artikel` (`id`, `judul`, `judul_url`, `artikel`, `tanggal`, `id_admin`, `show`, `gambar`, `idkategori`, `dilihat`) VALUES
	(1, 'tai', NULL, NULL, '', '', 'Y', '', '', NULL);
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;

-- Dumping structure for table smk.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(191) DEFAULT NULL,
  `edit` enum('Y','N') NOT NULL,
  `show` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smk.kategori: ~0 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table smk.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table smk.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table smk.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idortu` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `tahun_lahir_ayah` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan_ayah` enum('Tidak Sekolah','TK','SD','SMP','SMA','D1','D2','D3','S1') DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `kebutuhan_khusus_ayah` varchar(50) DEFAULT NULL,
  `no_hp_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `tahun_lahir_ibu` varchar(50) DEFAULT NULL,
  `jenjang_pendidikan_ibu` enum('Tidak Sekolah','TK','SD','SMP','SMA','D1','D2','D3','S1') DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `kebutuhan_khusus_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `no_hp_ibu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table smk.orang_tua: ~2 rows (approximately)
DELETE FROM `orang_tua`;
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
INSERT INTO `orang_tua` (`id`, `idortu`, `nama_ayah`, `tahun_lahir_ayah`, `jenjang_pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `kebutuhan_khusus_ayah`, `no_hp_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `jenjang_pendidikan_ibu`, `pekerjaan_ibu`, `kebutuhan_khusus_ibu`, `penghasilan_ibu`, `no_hp_ibu`) VALUES
	(2, '3546768654365768786574767', 'Bastomi1', '1910', 'D1', 'asdf1', '10001', '1', '0812345678901', 'Welasmiati1', '1111', 'SMP', 'asdftg1', '1', '40001', '0812345678901'),
	(19, '56797546', 'jkjhggfjh', '2020', NULL, 'tylu', '13245678', NULL, NULL, 'dfjhgklk', '2020', NULL, 'gjhkjkkhg', NULL, '546576879', NULL);
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;

-- Dumping structure for table smk.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table smk.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table smk.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smk.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table smk.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table smk.setting: ~0 rows (approximately)
DELETE FROM `setting`;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping structure for table smk.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idtahun` int(11) DEFAULT NULL,
  `hari_tanggal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_pendaftaran` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Budha') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebutuhan_khusus` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `dusun` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_tinggal` enum('Bersama Orangtua','Bersama Wali','Pondok') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alat_transportasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_peserta_un` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima_kip` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jarak_rumah_sekolah` enum('Kurang dari 1 Kilometer','Lebih dari 1 Kilometer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_tempuh` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idortu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppdb` enum('terima','belum','tolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'belum',
  `status` enum('lulus','belum') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'belum',
  `ket` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table smk.siswa: ~2 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id`, `idtahun`, `hari_tanggal`, `no_pendaftaran`, `nama_lengkap`, `gender`, `nisn`, `tempat_lahir`, `ttl`, `nik`, `agama`, `kebutuhan_khusus`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `telp`, `hp`, `email`, `no_peserta_un`, `penerima_kip`, `no_kip`, `berat_badan`, `tinggi_badan`, `jarak_rumah_sekolah`, `waktu_tempuh`, `jumlah_saudara`, `idortu`, `ppdb`, `status`, `ket`) VALUES
	(7, 2, 'Sabtu, 08/02/2020', '001', 'Aji Putra Prayogi', 'Laki-Laki', '3546768654365768786574767', 'Teluk Belengkong1', '01-10-2002', '3546768654365768786574767', 'Islam', 'no', 'Jalan Raya Bulurejo1', 251, 31, 'Bulurejo1', 'Blabak1', 'Pesantren1', '1524316786765786978654561', 'Bersama Wali', 'Sepeda Montor1', '08123456789015768978', '0812345678911', 'ajiputraprayogi1@gmail.com', '0121', 'Tidak', '678901', '401kg', '1731cm', 'Kurang dari 1 Kilometer', '171 Menit', '31', '3546768654365768786574767', 'terima', 'belum', 'BarBar'),
	(24, 1, 'Sabtu, 08/02/2020', '002', 'awdf', 'Laki-Laki', '65768909786646576879', 'trtyu', '08-02-2020', '56797546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56797546', 'terima', 'belum', NULL);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table smk.tahun
CREATE TABLE IF NOT EXISTS `tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.tahun: ~2 rows (approximately)
DELETE FROM `tahun`;
/*!40000 ALTER TABLE `tahun` DISABLE KEYS */;
INSERT INTO `tahun` (`id`, `tahun`) VALUES
	(1, '2020/2021'),
	(2, '2001/2002');
/*!40000 ALTER TABLE `tahun` ENABLE KEYS */;

-- Dumping structure for table smk.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` enum('Developer','Superadmin','Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table smk.users: ~6 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, 'Superadmin', '$2y$10$dZL3.RaUj3HZ01rpqBoOBuIODEjWjDLsa6J3kMPZ7UeZrx8Ukjnnu', NULL, '2020-01-08 15:35:16', '2020-01-08 15:35:16'),
	(2, 'ajiputraprayogi', 'ajiputraprayogi@gmail.com', NULL, 'Admin', '$2y$10$FZKiRD.HkQoPG3FUTypycO34P4St8B3qNF9z7jCMWQaIhsVZ2WMvC', NULL, NULL, NULL),
	(3, 'syahrilkarim', 'syahrilkarim@gmail.com', NULL, 'User', '$2y$10$YEvAPSPR5qMf6FmJleAZoe69iUdJrWeJKNZ5QpgRZ2MHAqt0He17.', NULL, NULL, NULL),
	(5, 'taufikperdana', 'anakmbarep999@gmail.com', NULL, 'User', '$2y$10$TxU1WxM1lZzmwpVkJ5KdquOG3v8xe3b2zv8Es13m3Mq/viRFEdik2', NULL, NULL, NULL),
	(6, 'afanfandy', 'afanfandy@gmail.com', NULL, 'User', '$2y$10$TgfrliI/yUG1FLnjltS3wuWDZk7J0W.hW4YQ8SypyHqp.7EbjrI..', NULL, NULL, NULL),
	(7, 'developer', 'xiirpl2020@gmail.com', NULL, 'Developer', '$2y$10$OAb4u2sAAVIwH1NiXoQT4.SyrSE/nGg4uV.uEEOULCgreGdy.O1Ti', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
