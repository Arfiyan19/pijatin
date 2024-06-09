-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 05:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pijit`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `jenis_kelamin`, `no_hp`, `foto`, `nik`, `foto_ktp`, `tanggal_lahir`, `tempat_lahir`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'customer1', 'Laki-Laki', '0812345671', 'foto.jpg', '1234567891', 'foto_ktp.jpg', '1999-01-01', 'Bantul1', 3, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(2, 'customer2', 'Laki-Laki', '0812345672', 'foto.jpg', '1234567892', 'foto_ktp.jpg', '1999-01-01', 'Bantul2', 4, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(3, 'customer3', 'Laki-Laki', '0812345673', 'foto.jpg', '1234567893', 'foto_ktp.jpg', '1999-01-01', 'Bantul3', 5, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(4, 'customer4', 'Laki-Laki', '0812345674', 'foto.jpg', '1234567894', 'foto_ktp.jpg', '1999-01-01', 'Bantul4', 6, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(5, 'customer5', 'Laki-Laki', '0812345675', 'foto.jpg', '1234567895', 'foto_ktp.jpg', '1999-01-01', 'Bantul5', 7, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(6, 'customer6', 'Laki-Laki', '0812345676', 'foto.jpg', '1234567896', 'foto_ktp.jpg', '1999-01-01', 'Bantul6', 8, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(7, 'customer7', 'Laki-Laki', '0812345677', 'foto.jpg', '1234567897', 'foto_ktp.jpg', '1999-01-01', 'Bantul7', 9, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(8, 'customer8', 'Laki-Laki', '0812345678', 'foto.jpg', '1234567898', 'foto_ktp.jpg', '1999-01-01', 'Bantul8', 10, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(9, 'customer9', 'Laki-Laki', '0812345679', 'foto.jpg', '1234567899', 'foto_ktp.jpg', '1999-01-01', 'Bantul9', 11, 'active', '2023-11-28 23:59:43', '2023-11-28 23:59:43'),
(10, 'customer10', 'Laki-Laki', '08123456710', 'foto.jpg', '12345678910', 'foto_ktp.jpg', '1999-01-01', 'Bantul10', 12, 'active', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(17, 'maspian', 'Laki-Laki', '6288808887', 'foto.jpg', '250233000023', 'foto_ktp.jpg', '2001-01-01', '-', 34, 'active', '2024-01-09 22:08:26', '2024-01-09 22:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenis_layanan` enum('layanan_utama','layanan_tambahan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `harga`, `durasi`, `deskripsi`, `gambar`, `jenis_layanan`, `created_at`, `updated_at`) VALUES
(1, 'Full Body Massage', 100000, 60, 'Rasakan harmoni menyeluruh dalam tubuh Anda dengan layanan Full Body Massage kami. Terapis berlisensi kami akan memberikan pijatan lembut namun mendalam dari ujung kepala hingga ujung kaki, membantu mengurangi ketegangan otot dan meningkatkan sirkulasi darah.', '/layanan/full-body.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(2, 'Hot Stone Massage', 150000, 90, 'Nikmati sensasi hangat yang menyelubungi tubuh Anda dengan Hot Stone Massage. Batu-batu pijat yang dipanaskan secara hati-hati ditempatkan pada titik-titik vital, membantu meredakan ketegangan otot dan memberikan relaksasi mendalam yang tak tertandingi.', '/layanan/hot-stone.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(3, 'Thai Massage', 200000, 120, 'Bawa diri Anda ke tanah eksotis Thailand melalui Thai Massage kami. Gabungan dari pijatan, tekanan jari, dan gerakan perenggangan yoga, layanan ini membantu mengalirkan energi dalam tubuh Anda, meningkatkan fleksibilitas, dan menciptakan perasaan kedamaian.', '/layanan/thai.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(4, 'Deep tissue Massaage', 250000, 150, 'Untuk Anda yang mencari pemijatan yang lebih intens, layanan Deep Tissue kami adalah pilihan yang sempurna. Teknik yang kuat ini fokus pada lapisan otot dalam, membantu mengurangi nyeri kronis, memulihkan fleksibilitas, dan mengembalikan vitalitas tubuh.', '/layanan/deep-tissue.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(5, 'Swedish Massage', 300000, 180, 'Swedish Massage kami menawarkan kombinasi yang sempurna antara pijatan lembut dan teknik meremas yang lebih dalam. Ini adalah pilihan populer untuk relaksasi umum, membantu mengurangi stres, meningkatkan sirkulasi, dan meremajakan pikiran Anda.', '/layanan/swedish.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(6, 'Tradisional Massage', 200000, 150, 'Layanan Tradisional Massage kami menghormati warisan budaya pijat kuno, memberikan Anda pengalaman autentik yang membawa keseimbangan dan keselarasan. Teknik-teknik yang diwariskan secara turun-temurun akan membantu mengatasi ketegangan fisik dan mental.', '/layanan/tradisional.png', 'layanan_utama', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(7, 'Kerokan', 50000, 30, 'Kerokan', 'default.jpg', 'layanan_tambahan', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(8, 'Lulur', 50000, 30, 'Lulur', 'default.jpg', 'layanan_tambahan', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(9, 'Totok Wajah', 50000, 30, 'Totok Wajah', 'default.jpg', 'layanan_tambahan', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(10, 'Refleksi', 50000, 30, 'Refleksi', 'default.jpg', 'layanan_tambahan', '2023-11-28 23:59:44', '2023-11-28 23:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_08_23_095736_create_admins_table', 1),
(5, '2023_08_23_100102_create_super_admins_table', 1),
(6, '2023_08_23_100202_create_terapis_table', 1),
(7, '2023_08_23_100357_create_customers_table', 1),
(8, '2023_08_23_100746_create_finances_table', 1),
(9, '2023_08_30_005818_table_layanan', 1),
(10, '2023_09_01_002127_create_table_alamat', 1),
(11, '2023_09_01_015244_create_table_detail_layanan', 1),
(12, '2023_09_02_000946_update_alamat_customers', 1),
(13, '2023_09_02_003036_update_alamat_super_admins', 1),
(14, '2023_09_02_003232_update_alamat_admins', 1),
(15, '2023_09_02_003322_update_alamat_finances', 1),
(16, '2023_09_02_003411_update_alamat_terapis', 1),
(17, '2023_09_11_000118_add_update_Deletestatus_to_admins_table', 1),
(18, '2023_09_15_023908_add_status_new_to_admins_table', 1),
(19, '2023_09_15_030644_add_update__deletestatus_to_super_admins_table', 1),
(20, '2023_09_15_031024_add_update__deletestatus_to_terapis_table', 1),
(21, '2023_09_15_031150_add_status_new_to_terapis_table', 1),
(22, '2023_09_15_031456_add_update__deletestatus_to_customers_table', 1),
(23, '2023_09_15_031637_add_status_new_to_customers_table', 1),
(24, '2023_09_15_031912_add_update__deletestatus_to_finances_table', 1),
(25, '2023_09_15_032028_add_status_new_to_finances_table', 1),
(26, '2023_09_16_000044_add_activation_code_to_users_table', 1),
(27, '2023_09_19_061557_create_saldo', 1),
(28, '2023_09_19_065524_create_deposits', 1),
(29, '2023_09_19_065552_create_withdrawals', 1),
(30, '2023_09_19_090136_create_update_terapis_saldo_trigger', 1),
(31, '2023_09_19_090746_create_update_terapis_saldo_trigger_for_withdrawls', 1),
(32, '2023_09_19_091434_create_bank_accounts', 1),
(33, '2023_09_19_092122_update_table_withdrawls', 1),
(34, '2023_09_20_084154_create_pemesanan', 1),
(35, '2023_09_20_084741_create_detail_pemesanan', 1),
(36, '2023_09_20_084749_create_jadwal', 1),
(37, '2023_09_21_122049_create_tolak_pemesanan_table', 1),
(38, '2023_10_09_041239_create_bank_finances_table', 1),
(39, '2023_10_10_021757_update_table_alamat', 1),
(40, '2023_10_27_015307_create_table_aduan', 1),
(41, '2023_10_28_064134_update_table_bank_accounts', 1),
(42, '2023_10_28_093958_update_table_pemesanan', 1),
(43, '2023_10_30_065907_add_skck_to_terapis', 1),
(44, '2023_10_31_002457_update_table_detail_pemesanan', 1),
(45, '2023_10_31_022646_update_table_layanan', 1),
(46, '2023_11_03_003221_update_table_bank_accounts_add_users_id', 1),
(47, '2023_11_04_013155_create_refund_table', 1),
(48, '2023_11_23_070020_modify_pemesanan_detail', 2),
(49, '2023_12_19_003102_create_tabel_cabang', 2),
(50, '2023_12_22_063306_update_saldo_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `terapis_id_1` bigint(20) UNSIGNED NOT NULL,
  `terapis_id_2` bigint(20) UNSIGNED DEFAULT NULL,
  `terapis_id_3` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pemesan_1` varchar(255) NOT NULL,
  `nama_pemesan_2` varchar(255) DEFAULT NULL,
  `nama_pemesan_3` varchar(255) DEFAULT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `metode_pembayaran` enum('Transfer Bank','Cash') NOT NULL DEFAULT 'Transfer Bank',
  `status_pembayaran` enum('Pembayaran Sukses','Pembayaran Gagal','Dalam Proses','Uang Kembali') NOT NULL DEFAULT 'Dalam Proses',
  `status_pemesanan` enum('Masuk','Proses','Batal','Sukses') NOT NULL DEFAULT 'Masuk',
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `customer_id`, `terapis_id_1`, `terapis_id_2`, `terapis_id_3`, `nama_pemesan_1`, `nama_pemesan_2`, `nama_pemesan_3`, `tanggal_pemesanan`, `tanggal_pembayaran`, `total_bayar`, `metode_pembayaran`, `status_pembayaran`, `status_pemesanan`, `catatan`, `created_at`, `updated_at`, `read`) VALUES
(98, 1, 1, NULL, NULL, 'Arfiyan', NULL, NULL, '2024-05-17', '2024-05-17 06:54:23', 150560, 'Transfer Bank', 'Dalam Proses', 'Sukses', NULL, '2024-05-17 10:00:00', '2024-05-17 00:12:34', 1),
(99, 1, 1, NULL, NULL, 'Wahyu', NULL, NULL, '2024-05-17', '2024-05-17 06:55:27', 150560, 'Transfer Bank', 'Dalam Proses', 'Batal', NULL, '2024-05-17 11:00:00', '2024-05-17 00:13:20', 1),
(100, 1, 1, NULL, NULL, 'Caka', NULL, NULL, '2024-05-17', '2024-05-17 06:56:59', 200560, 'Transfer Bank', 'Dalam Proses', 'Proses', NULL, '2024-05-17 12:00:00', '2024-05-19 08:22:13', 1),
(101, 1, 1, NULL, NULL, 'Caka', NULL, NULL, '2024-05-17', '2024-05-17 06:57:00', 200000, 'Transfer Bank', 'Dalam Proses', 'Masuk', NULL, '2024-05-16 23:57:00', '2024-05-19 02:00:21', 1),
(102, 1, 1, NULL, NULL, 'Imam', NULL, NULL, '2024-05-19', '2024-05-19 08:50:36', 200560, 'Transfer Bank', 'Dalam Proses', 'Sukses', NULL, '2024-05-19 11:00:00', '2024-05-19 02:41:03', 1),
(103, 1, 1, NULL, NULL, 'andika', NULL, NULL, '2024-05-26', '2024-05-26 12:26:42', 200000, 'Transfer Bank', 'Dalam Proses', 'Masuk', NULL, '2024-05-26 05:26:42', '2024-05-26 05:26:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` bigint(20) UNSIGNED NOT NULL,
  `layanan_tambahan_1` bigint(20) UNSIGNED DEFAULT NULL,
  `layanan_tambahan_2` bigint(20) UNSIGNED DEFAULT NULL,
  `layanan_tambahan_3` bigint(20) UNSIGNED DEFAULT NULL,
  `layanan_tambahan_4` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `pemesanan_id`, `layanan_id`, `layanan_tambahan_1`, `layanan_tambahan_2`, `layanan_tambahan_3`, `layanan_tambahan_4`, `jumlah`, `created_at`, `updated_at`) VALUES
(80, 98, 1, 7, NULL, NULL, NULL, 1, '2024-05-16 23:54:23', '2024-05-16 23:54:23'),
(81, 99, 1, 8, NULL, NULL, NULL, 1, '2024-05-16 23:55:27', '2024-05-16 23:55:27'),
(82, 100, 2, 10, NULL, NULL, NULL, 1, '2024-05-16 23:56:59', '2024-05-16 23:56:59'),
(83, 101, 2, 10, NULL, NULL, NULL, 1, '2024-05-16 23:57:00', '2024-05-16 23:57:00'),
(84, 102, 2, 8, NULL, NULL, NULL, 1, '2024-05-19 01:50:36', '2024-05-19 01:50:36'),
(85, 103, 2, 7, NULL, NULL, NULL, 1, '2024-05-26 05:26:42', '2024-05-26 05:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tolak`
--

CREATE TABLE `pemesanan_tolak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `terapis_id` bigint(20) UNSIGNED NOT NULL,
  `alasan` text NOT NULL,
  `tanggal_penolakan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_tolak`
--

INSERT INTO `pemesanan_tolak` (`id`, `pemesanan_id`, `terapis_id`, `alasan`, `tanggal_penolakan`, `created_at`, `updated_at`) VALUES
(14, 99, 1, 'Kendaraan berkendala', '2024-05-17', '2024-05-17 00:13:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `nama`, `jenis_kelamin`, `no_hp`, `foto`, `nik`, `foto_ktp`, `tanggal_lahir`, `tempat_lahir`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Laki-laki', '081234567890', 'profile_images/1701241275_IMG_1405 (1).jpg', '1234567890', 'foto_ktp.jpg', '2000-01-01', 'Jakarta', 1, '2023-11-28 23:59:42', '2023-11-29 00:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `table_alamat`
--

CREATE TABLE `table_alamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_alamat`
--

INSERT INTO `table_alamat` (`id`, `user_id`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat_lengkap`, `latitude`, `longitude`, `created_at`, `updated_at`, `kelurahan`) VALUES
(1, 1, 'DI YOGYAKARTA', 'KABUPATEN BANTUL', 'KRETEK', '100029', 'Jalan Raya Parang', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'PARANGTRITIS'),
(2, 2, 'DI YOGYAKARTA', 'KABUPATEN GUNUNG KIDUL', 'TEMON', '12345', 'Jalan Raya Solooooo2', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBER AGUNG'),
(3, 3, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '190023', 'jln tulus rejo', '-7.9463', '112.6302', '2023-11-28 23:59:45', '2024-04-25 08:44:36', 'TULUSREJO'),
(4, 4, 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', 'TEMON', '12345', 'Jalan Raya Solooooo4', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERARUM'),
(5, 5, 'DI YOGYAKARTA', 'KABUPATEN GUNUNG KIDUL', 'CANGKRINGAN', '12345', 'Jalan Raya Solooooo5', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBER AGUNG'),
(6, 6, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'SRANDAKAN', '12345', 'Jalan Raya Solooooo6', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERRAHAYU'),
(7, 7, 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', 'CANGKRINGAN', '12345', 'Jalan Raya Solooooo7', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERSARI'),
(8, 8, 'DI YOGYAKARTA', 'KABUPATEN GUNUNG KIDUL', 'SRANDAKAN', '12345', 'Jalan Raya Solooooo8', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERRAHAYU'),
(9, 9, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'TEMON', '12345', 'Jalan Raya Solooooo9', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERRAHAYU'),
(10, 10, 'DI YOGYAKARTA', 'KABUPATEN GUNUNG KIDUL', 'MINGGIR', '12345', 'Jalan Raya Solooooo10', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'CONDONG CATUR'),
(11, 11, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'TEMON', '12345', 'Jalan Raya Solooooo11', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'CONDONG CATUR'),
(12, 12, 'DI YOGYAKARTA', 'KABUPATEN SLEMAN', 'MINGGIR', '12345', 'Jalan Raya Solooooo12', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBER AGUNG'),
(13, 13, 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', 'MINGGIR', '12345', 'Jalan Raya Solooooo13', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBER AGUNG'),
(14, 14, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '65141', 'Centro Village, Jl. Kendalsari No.10, timur I', '-7.9459', '112.6277', '2023-11-28 23:59:45', '2024-04-24 18:39:37', 'TULUSREJO'),
(15, 15, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '65141', 'Jl. Puspo Gg. I No.10', '-7.9589', '112.6337', '2023-11-28 23:59:45', '2024-04-24 18:43:41', 'LOWOKWARU'),
(17, 17, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '65111', 'Jl. Letjen Sutoyo', '-7.9575', '112.6367', '2023-11-28 23:59:45', '2024-05-24 22:39:51', 'LOWOKWARU'),
(18, 18, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '65141', 'Ruko Taman Niaga, Blok B, Jl. Soekarno Hatta No.32 - 33', '-7.9431', '112.6216', '2023-11-28 23:59:45', '2024-05-24 22:43:10', 'JATIMULYO'),
(19, 19, 'JAWA TIMUR', 'KOTA MALANG', 'BLIMBING', '65126', 'Jl. Letjend S. Parman No.36', '-7.9531', '112.6390', '2023-11-28 23:59:45', '2024-05-24 22:45:34', 'PURWANTORO'),
(20, 20, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'SRANDAKAN', '12345', 'Jalan Raya Solooooo20', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'CONDONG CATUR'),
(21, 21, 'DI YOGYAKARTA', 'KABUPATEN GUNUNG KIDUL', 'CANGKRINGAN', '12345', 'Jalan Raya Solooooo21', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERSARI'),
(22, 22, 'DI YOGYAKARTA', 'KOTA YOGYAKARTA', 'CANGKRINGAN', '12345', 'Jalan Raya Solooooo22', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'CONDONG CATUR'),
(23, 23, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'MINGGIR', '12345', 'Jalan Raya Solooooo23', '-7.8949', '110.3268', '2023-11-28 23:59:45', '2023-11-28 23:59:45', 'SUMBERARUM'),
(38, 34, 'DI YOGYAKARTA', 'KABUPATEN KULON PROGO', 'GIRIMULYO', '10098', '-JLN', '-', '-', '2024-01-09 22:10:10', '2024-01-09 22:10:28', 'JATIMULYO'),
(40, 35, 'DI YOGYAKARTA', 'KABUPATEN BANTUL', 'SANDEN', '776255', 'jln...', '-', '-', '2024-01-09 22:16:22', '2024-01-09 22:16:34', 'SRIGADING'),
(58, 16, 'JAWA TIMUR', 'KOTA MALANG', 'LOWOKWARU', '65144', 'Jl. Raya Tlogomas No.46, RT.001/RW.001', '-7.9350', '112.6046', '2024-05-24 22:37:45', '2024-05-24 22:37:58', 'TLOGOMAS');

-- --------------------------------------------------------

--
-- Table structure for table `table_detail_layanan`
--

CREATE TABLE `table_detail_layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_terapis` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_detail_layanan`
--

INSERT INTO `table_detail_layanan` (`id`, `id_terapis`, `id_layanan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(2, 1, 2, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(3, 1, 3, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(4, 2, 2, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(5, 2, 3, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(6, 3, 3, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(7, 3, 4, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(8, 4, 4, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(9, 4, 5, '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(10, 2, 1, '2023-11-28 23:59:45', '2023-11-28 23:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `terapis`
--

CREATE TABLE `terapis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_skck` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive','pending','registered','interview','rejected','suspended') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terapis`
--

INSERT INTO `terapis` (`id`, `nama`, `jenis_kelamin`, `no_hp`, `foto`, `nik`, `foto_ktp`, `foto_skck`, `tanggal_lahir`, `tempat_lahir`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'terapis1', 'Laki-Laki', '0812345671', '1703057670.jpg', '1234567891', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir1', 14, 'active', '2023-11-28 23:59:44', '2024-04-25 09:00:39'),
(2, 'terapis2', 'Laki-Laki', '0812345672', 'foto.jpg', '1234567892', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir2', 15, 'active', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(3, 'terapis3', 'Laki-Laki', '0812345673', 'foto.jpg', '1234567893', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir3', 16, 'active', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(4, 'terapis4', 'Laki-Laki', '0812345674', 'foto.jpg', '1234567894', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir4', 17, 'active', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(5, 'terapis5', 'Laki-Laki', '0812345675', 'foto.jpg', '1234567895', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir5', 18, 'active', '2023-11-28 23:59:44', '2023-11-28 23:59:44'),
(6, 'terapis6', 'Laki-Laki', '0812345676', 'foto.jpg', '1234567896', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir6', 19, 'active', '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(7, 'terapis7', 'Laki-Laki', '0812345677', 'foto.jpg', '1234567897', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir7', 20, 'active', '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(8, 'terapis8', 'Laki-Laki', '0812345678', 'foto.jpg', '1234567898', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir8', 21, 'active', '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(9, 'terapis9', 'Laki-Laki', '0812345679', 'foto.jpg', '1234567899', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir9', 22, 'active', '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(10, 'terapis10', 'Laki-Laki', '08123456710', 'foto.jpg', '12345678910', 'foto_ktp.jpg', 'foto_skck.jpg', '1999-01-01', 'tempat_lahir10', 23, 'active', '2023-11-28 23:59:45', '2023-11-28 23:59:45'),
(15, 'terapis iza', 'Laki-Laki', '62888988764', 'foto.jpg', '350123456784', 'foto_ktp.jpg', 'foto_skck.jpg', '2001-01-01', 'yogyakarta', 35, 'active', '2024-01-09 22:13:51', '2024-01-09 22:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','terapis','customer','superadmin','finance') NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `activation_code`) VALUES
(1, 'superadmin@gmail.com', NULL, 'superadmin', '$2y$10$B1Tufe2fjpuaZh7m46LUEevzlnlkTv4oS6p0A9GxGVzQMs6/JRcIu', NULL, '2023-11-28 23:59:42', '2023-11-28 23:59:42', NULL),
(2, 'admin@gmail.com', NULL, 'admin', '$2y$10$90im/gNDOlw8cPe4q3BOaui5nlh3.SkYEIPlExTOvkhKWWrOjpHVi', NULL, '2023-11-28 23:59:42', '2023-11-28 23:59:42', NULL),
(3, 'customer1@gmail.com', '2023-11-28 23:59:42', 'customer', '$2y$10$7crouxrAmkNPbIfaIzuvIexb3JyQ6KDQ4iEatXNX8xss2U4qqxxsq', NULL, '2023-11-28 23:59:42', '2023-11-28 23:59:42', NULL),
(4, 'customer2@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$rNLJK6NdQ2KoLghdTPz6KekSwgI0qgOvVxm0pDpH1fswEHrXojR/O', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(5, 'customer3@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$kre6tHpsBjbfgS3CeEu4IOYBfFh3gTijCxqtylf99L.Zp9TfKH57K', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(6, 'customer4@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$3FSDJMCcDFii0W.lw6ZVbem1uw81AAPs4eQbAs0wG/vr9Ej59PnnS', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(7, 'customer5@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$oUrRk4/BisLYtq5OwQcL4.pklkNikby.GAYCuDNs/NXPxQQeH4b.e', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(8, 'customer6@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$S4mbxHPwxzYrM.b1Dx6jfeppru2vDJeFnFd7Jk35X4P07KX8Ihswa', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(9, 'customer7@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$avat8k8oXzAFnjqpiQg/wOVonp39.H.s0M2bRygcHgTS0O4WcUq/2', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(10, 'customer8@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$nIfbmtPCSGENvJo7PdQx.eGaNKNN4fGjkur33PAgyaumOwQbJh1fW', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(11, 'customer9@gmail.com', '2023-11-28 23:59:43', 'customer', '$2y$10$R9EnlQipqeyKssCf.BTcy.JEf8fB6jXK3yPre11fb4gS4oAzaLgaG', NULL, '2023-11-28 23:59:43', '2023-11-28 23:59:43', NULL),
(12, 'customer10@gmail.com', '2023-11-28 23:59:44', 'customer', '$2y$10$.1ZILd.F5Mv5NNsI35C9VOiQmOtDg3/vcdCo9FjS7W2sYxQddVWXC', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(13, 'finance@gmail.com', NULL, 'finance', '$2y$10$j9b1okF5jc9naiMgXLS.uuC4EqTAVIjVGTDJm9SHWlBHiswogZuKG', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(14, 'terapis1@gmail.com', '2023-11-28 23:59:44', 'terapis', '$2y$10$ZCdVhM2/LtdMV.fyPmM9.OexUaoiNJW3pOgEWU2edavd9cLW4fv7e', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(15, 'terapis2@gmail.com', '2023-11-28 23:59:44', 'terapis', '$2y$10$Rd4Hr0h665/JQtUjXymfv.v0r6vk2fMJeAVWrfCinuahPy2XkMUoe', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(16, 'terapis3@gmail.com', '2023-11-28 23:59:44', 'terapis', '$2y$10$HZOaAfTLgN1noGaAJcgYCO9yBzY7UUJ23lXpuGx27sMySXSpOx2OO', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(17, 'terapis4@gmail.com', '2023-11-28 23:59:44', 'terapis', '$2y$10$OGdbeyLsZG9R3EeXMuoT8Oa8.4ulvHIPVxZ3yJghNBBBDXk2SkL/i', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(18, 'terapis5@gmail.com', '2023-11-28 23:59:44', 'terapis', '$2y$10$4.WGYeEf7BjuuoGhx4fhCuuoPz.z9AVayJE2z2Wd1naNb1Z91IVhG', NULL, '2023-11-28 23:59:44', '2023-11-28 23:59:44', NULL),
(19, 'terapis6@gmail.com', '2023-11-28 23:59:45', 'terapis', '$2y$10$LWfgROLRVz/kQGPCYbPVjuKNu88Zci71j.RtT3ESFLsqogJvljr.G', NULL, '2023-11-28 23:59:45', '2023-11-28 23:59:45', NULL),
(20, 'terapis7@gmail.com', '2023-11-28 23:59:45', 'terapis', '$2y$10$qnDCEGE7K70MVQ1MqCUVLOs87MIzMYhYcjVezSXgwzPdNZR.6jHpi', NULL, '2023-11-28 23:59:45', '2023-11-28 23:59:45', NULL),
(21, 'terapis8@gmail.com', '2023-11-28 23:59:45', 'terapis', '$2y$10$a3gLuFNDL9kGnkg4VdZMgOwKKS0qhSrFnCm8/rqmQrkq7obCZH0EK', NULL, '2023-11-28 23:59:45', '2023-11-28 23:59:45', NULL),
(22, 'terapis9@gmail.com', '2023-11-28 23:59:45', 'terapis', '$2y$10$rjh5I5zkI3CTBC01aRkdLekb15kFFf28HfoAx3tpKAcz6dl8dadFu', NULL, '2023-11-28 23:59:45', '2023-11-28 23:59:45', NULL),
(23, 'terapis10@gmail.com', '2023-11-28 23:59:45', 'terapis', '$2y$10$Ldbdy4zHgMycgfD.Y6fr0.Lwdw/UVYjUyL172UwPUfWJTZfL4xt4e', NULL, '2023-11-28 23:59:45', '2023-11-28 23:59:45', NULL),
(34, 'arfieyan1903@gmail.com', '2024-01-09 22:09:03', 'customer', '$2y$10$02Rc7q1.t2HdS/dSgEObduvsGHdqnk3M9G6phplUa7.S.4pQKcZYW', NULL, '2024-01-09 22:08:26', '2024-01-09 22:09:03', NULL),
(35, 'arfieyanshopee1@gmail.com', '2024-01-09 22:14:17', 'terapis', '$2y$10$uRXbDgNwxFmA165BZuKkx.owPFMYB0m7yFpLXUCjf4rNot8fF2L8O', NULL, '2024-01-09 22:13:51', '2024-01-09 22:14:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_customer_id_foreign` (`customer_id`),
  ADD KEY `pemesanan_terapis_id_foreign` (`terapis_id_1`),
  ADD KEY `pemesanan_terapis_id_2_foreign` (`terapis_id_2`),
  ADD KEY `pemesanan_terapis_id_3_foreign` (`terapis_id_3`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_detail_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `pemesanan_detail_layanan_id_foreign` (`layanan_id`),
  ADD KEY `pemesanan_detail_layanan_tambahan_2_foreign` (`layanan_tambahan_2`),
  ADD KEY `pemesanan_detail_layanan_tambahan_3_foreign` (`layanan_tambahan_3`),
  ADD KEY `pemesanan_detail_layanan_tambahan_1_foreign` (`layanan_tambahan_1`) USING BTREE,
  ADD KEY `pemesanan_detail_layanan_tambahan_4_foreign` (`layanan_tambahan_4`);

--
-- Indexes for table `pemesanan_tolak`
--
ALTER TABLE `pemesanan_tolak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_tolak_terapis_id_foreign` (`terapis_id`),
  ADD KEY `pemesanan_tolak_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `super_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `table_alamat`
--
ALTER TABLE `table_alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_alamat_user_id_foreign` (`user_id`);

--
-- Indexes for table `table_detail_layanan`
--
ALTER TABLE `table_detail_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_detail_layanan_id_terapis_foreign` (`id_terapis`),
  ADD KEY `table_detail_layanan_id_layanan_foreign` (`id_layanan`);

--
-- Indexes for table `terapis`
--
ALTER TABLE `terapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terapis_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pemesanan_tolak`
--
ALTER TABLE `pemesanan_tolak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_alamat`
--
ALTER TABLE `table_alamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `table_detail_layanan`
--
ALTER TABLE `table_detail_layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `terapis`
--
ALTER TABLE `terapis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_terapis_id_2_foreign` FOREIGN KEY (`terapis_id_2`) REFERENCES `terapis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_terapis_id_3_foreign` FOREIGN KEY (`terapis_id_3`) REFERENCES `terapis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_terapis_id_foreign` FOREIGN KEY (`terapis_id_1`) REFERENCES `terapis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `pemesanan_detail_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`),
  ADD CONSTRAINT `pemesanan_detail_layanan_tambahan_1_foreign` FOREIGN KEY (`layanan_tambahan_1`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_detail_layanan_tambahan_2_foreign` FOREIGN KEY (`layanan_tambahan_2`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_detail_layanan_tambahan_3_foreign` FOREIGN KEY (`layanan_tambahan_3`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_detail_layanan_tambahan_4_foreign` FOREIGN KEY (`layanan_tambahan_4`) REFERENCES `layanan` (`id`),
  ADD CONSTRAINT `pemesanan_detail_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `pemesanan_tolak`
--
ALTER TABLE `pemesanan_tolak`
  ADD CONSTRAINT `pemesanan_tolak_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_tolak_terapis_id_foreign` FOREIGN KEY (`terapis_id`) REFERENCES `terapis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD CONSTRAINT `super_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_alamat`
--
ALTER TABLE `table_alamat`
  ADD CONSTRAINT `table_alamat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_detail_layanan`
--
ALTER TABLE `table_detail_layanan`
  ADD CONSTRAINT `table_detail_layanan_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_detail_layanan_id_terapis_foreign` FOREIGN KEY (`id_terapis`) REFERENCES `terapis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terapis`
--
ALTER TABLE `terapis`
  ADD CONSTRAINT `terapis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
