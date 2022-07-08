-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 07:36 AM
-- Server version: 5.7.37
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smabandu_devppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_24_123141_create_students_table', 2),
(6, '2022_02_06_084943_create_semesters_table', 3),
(7, '2022_03_03_092611_orders', 4),
(8, '2022_05_27_183045_create_tests_table', 5),
(9, '2022_05_29_051902_create_notifications_table', 6),
(10, '2022_05_29_054247_create_jobs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_bayar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `id_bayar`, `jenis_pembayaran`, `nominal`, `tanggal`, `jenis_bayar`, `bukti_bayar`, `verifikasi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(40, 'b3a85586-bfdb-4bbb-982c-1e29540276a4', 'INV-00001', 'tdu', '300000', '2022-06-20', 'transfer', 'bukti_bayar/6ZEc1BMLLPwJCRas1LrTPWNDR67RXOJBVhuUmCUJ.jpg', 1, NULL, '2022-06-20 14:41:00', '2022-06-20 15:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `payments_copy`
--

CREATE TABLE `payments_copy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payments_copy`
--

INSERT INTO `payments_copy` (`id`, `student_id`, `order_id`, `status`, `gross_amount`, `payment_type`, `status_message`, `bill_key`, `pdf_url`, `jenis_bayar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, NULL, '1573418892', 'setelment', '300000', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 04:55:40', '2022-03-05 04:55:40'),
(14, '32', '820292998', NULL, '300000', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-05 04:57:19', '2022-03-05 04:57:19'),
(15, 'b63aac10-510d-4514-98a3-04d0d2ad7d3f', '18158960', 'pending', '400000', 'echannel', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/76fea6c3-a8cd-47d9-aaba-be3837ec11b4/pdf', 'Oke', NULL, '2022-03-05 06:53:36', '2022-03-05 07:41:38'),
(16, 'b63aac10-510d-4514-98a3-04d0d2ad7d3f', '52608191', 'pending', '1000000', 'bank_transfer', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/35a101be-9900-4899-952c-4ece5c1a280f/pdf', NULL, NULL, '2022-03-05 07:25:54', '2022-03-05 07:39:49'),
(17, 'b63aac10-510d-4514-98a3-04d0d2ad7d3f', '1653203661', NULL, '500000', NULL, NULL, NULL, NULL, 'tdu', NULL, '2022-03-05 07:30:45', '2022-03-05 07:30:45'),
(18, 'b63aac10-510d-4514-98a3-04d0d2ad7d3f', '560986443', 'pending', '1000000', 'bank_transfer', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/7cd898af-3711-4c90-9600-09ebb44272e4/pdf', 'tdu', NULL, '2022-03-05 07:42:54', '2022-03-05 07:43:15'),
(19, 'b63aac10-510d-4514-98a3-04d0d2ad7d3f', '2040090404', NULL, '1000000', NULL, NULL, NULL, NULL, 'tdu', NULL, '2022-03-09 11:03:24', '2022-03-09 11:03:24'),
(21, 'c6e17620-3ff1-47c8-9392-3da7717068fc', '2117731972', 'settlement', '450000', 'bank_transfer', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/a53ece22-35a2-42fd-a052-1ed4e00e49df/pdf', 'tdu', NULL, '2022-03-13 09:51:06', '2022-03-13 10:04:19'),
(22, 'c6e17620-3ff1-47c8-9392-3da7717068fc', '453208116', 'settlement', '2000000', 'bank_transfer', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/c277f082-8af8-4847-b55a-39c3343191c3/pdf', 'du', NULL, '2022-03-13 10:10:22', '2022-03-13 10:11:20'),
(23, 'c6e17620-3ff1-47c8-9392-3da7717068fc', '1619755278', NULL, '5466456456', NULL, NULL, NULL, NULL, 'tdu', NULL, '2022-03-13 10:13:34', '2022-03-13 10:13:34'),
(24, 'b575c396-7396-4a2f-b04f-106c3e9636c4', '515044256', 'pending', '300000', 'bank_transfer', 'Transaksi sedang diproses', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/a85227c4-24e1-4eb1-8dd8-a9dbfd76b348/pdf', 'tdu', NULL, '2022-05-24 11:46:47', '2022-05-24 11:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Tidak bekerja'),
(2, 'PNS/TNI/Polri'),
(3, 'Karyawan Swasta'),
(4, 'Pedagang Kecil'),
(5, 'Wiraswasta'),
(6, 'Buruh'),
(7, 'Pensiunan'),
(8, 'Karyawan BUMN'),
(9, 'Sudah meninggal'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SD Sederajat'),
(2, 'SMP Sederajat'),
(3, 'SMA Sederajat'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id` bigint(20) NOT NULL,
  `penghasilan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id`, `penghasilan`) VALUES
(1, 'Kurang dari Rp. 500,000'),
(2, 'Rp. 500,000 - Rp. 999,999'),
(3, 'Rp. 1,000,000 - Rp. 1,999,999'),
(4, 'Rp. 2,000,000 - Rp. 4,999,999'),
(5, 'Rp. 5,000,000 - Rp. 20,000,000'),
(6, 'Lebih dari Rp. 20,000,000'),
(7, 'Tidak Berpenghasilan');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) COLLATE armscii8_bin DEFAULT NULL,
  `nama_kegiatan` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `jenis_kegiatan` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `tingkat` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `tahun` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `hasil` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `sertifikat` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `student_id`, `nama_kegiatan`, `jenis_kegiatan`, `tingkat`, `tahun`, `hasil`, `sertifikat`, `created_at`, `updated_at`) VALUES
(19, 'b3a85586-bfdb-4bbb-982c-1e29540276a4', 'Lomba Catur', 'Individual', 'Kabupaten', '2018', 'Juara 1', 'sertifikat/MafAFg727s14bshE0ELv7iGplJgMcr6qWONlpyEn.jpg', '2022-06-20 14:36:48', '2022-06-20 14:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `role` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Semester 5', '2008', '2022-02-07 05:37:02', '2022-03-06 00:53:31'),
(2, 'Semester 3', '2022', '2022-03-11 23:03:39', '2022-03-11 23:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `gelombang_test` varchar(100) DEFAULT NULL,
  `jumlah_pendaftar` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `gelombang_test`, `jumlah_pendaftar`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 5 Tahap 4', 340, NULL, '2022-06-20 13:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nodaftar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_saudara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nokk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nikayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jarak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_pd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` int(11) DEFAULT '0',
  `verifikasi_bayar` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `nodaftar`, `uuid`, `name`, `jenis_kelamin`, `tempat`, `tanggal`, `nik`, `agama`, `nohp_siswa`, `anak_ke`, `jumlah_saudara`, `tinggi_badan`, `berat_badan`, `hoby`, `cita`, `nisn`, `asal_sekolah`, `npsn`, `provinsi_sekolah`, `kabupaten_sekolah`, `kecamatan_sekolah`, `desa_sekolah`, `nokk`, `namaayah`, `nikayah`, `tahun_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nama_ibu`, `nik_ibu`, `tahun_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_pd`, `jarak`, `waktu`, `desa_pd`, `kecamatan_pd`, `kota_pd`, `provinsi_pd`, `nohp_ortu`, `foto`, `verifikasi`, `verifikasi_bayar`, `created_at`, `updated_at`) VALUES
('b3a85586-bfdb-4bbb-982c-1e29540276a4', 156, 'SMATEL-001', NULL, 'Deni Muhamad Ikbal', 'laki-laki', 'Majalengka', '1987-11-23', '1234567890123456', 'islam', '085722676819', '1', '2', '169', '40', 'Membaca', 'Menulis', '2012345678', 'SMP Telkom', '20228479', 'Jawa Barat', 'Bandung', 'Bantarujeg', 'Dayeuhkolot', '1234567890123456', 'Adlia Kusmana', '1234567890123456', '1987', 'SD Sederajat', 'Wiraswasta', 'Rp. 1,000,000 - Rp. 1,999,999', 'Nining', '1234567890123456', '1978', 'SD Sederajat', 'Tidak bekerja', 'Tidak Berpenghasilan', 'Dsn,. Cidomas', '20', '15', 'dada', 'asdasda', 'asdadada', 'asdadasda', '085722676819', 'pasphoto/7HwnRSOUKOz9eUKVgDF3poIG7l2JRPlnp4EmJSfG.jpg', 1, 1, '2022-06-20 14:31:22', '2022-06-20 15:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelombang_test` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `student_id`, `hasil`, `gelombang_test`, `created_at`, `updated_at`) VALUES
(5, 'b3a85586-bfdb-4bbb-982c-1e29540276a4', '1', 'Gelombang 5 Tahap 4', '2022-06-20 15:01:36', '2022-06-20 15:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Deni Muhamad  Ikbal', '', 'admin', 'deniikbal@gmail.com', NULL, '$2y$10$EIfLNYQ2mbylQfzN4gj/EuoV1C5tgjtGKbiRGDMyj4byJ/BpJmNfu', NULL, '2022-01-22 18:01:15', '2022-01-22 18:01:15'),
(156, 'Deni Muhamad Ikbal', '085722676819', 'siswa', 'dmichem@gmail.com', NULL, '$2y$10$R4ZOVXysj8XukxfI9YQnHuZiPs79x.Kq.3DMi5lANZFbtX1ETSx7G', NULL, '2022-06-20 14:30:48', '2022-06-20 14:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payments_students` (`student_id`);

--
-- Indexes for table `payments_copy`
--
ALTER TABLE `payments_copy`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payments_copy`
--
ALTER TABLE `payments_copy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_payments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_students_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
