-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2024 at 04:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simak_poltekmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prog_studi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `user_id`, `nama`, `prog_studi`, `created_at`, `updated_at`) VALUES
(1, 1234, 4, 'andi', 'trpl', '2024-03-13 07:22:22', '2024-03-13 07:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `ruangkelas` varchar(100) NOT NULL,
  `namakelas` varchar(255) NOT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode`, `ruangkelas`, `namakelas`, `hari`, `jam`, `created_at`, `updated_at`) VALUES
(1, '001', '201', 'Multimedia24', '', '', NULL, NULL),
(2, '002', '202', 'RPL 2', NULL, NULL, '2024-06-04 02:24:20', '2024-06-04 02:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_masuk` varchar(10) NOT NULL,
  `programstudi_id` bigint(2) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `dosen_id` varchar(255) NOT NULL,
  `nik_mhs` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(10) DEFAULT NULL,
  `tgl_lahir` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `desa` varchar(20) DEFAULT NULL,
  `kec` varchar(20) DEFAULT NULL,
  `kab` varchar(20) DEFAULT NULL,
  `prov` varchar(20) DEFAULT NULL,
  `nama_bapak` varchar(20) DEFAULT NULL,
  `nama_ibu` varchar(20) DEFAULT NULL,
  `aktif` varchar(255) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `npm`, `semester`, `tahun_masuk`, `programstudi_id`, `kelas_id`, `dosen_id`, `nik_mhs`, `tempat_lahir`, `tgl_lahir`, `alamat`, `desa`, `kec`, `kab`, `prov`, `nama_bapak`, `nama_ibu`, `aktif`, `ket`, `created_at`, `updated_at`) VALUES
(3, 8, '1111', 2, '2023-2024', 1, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '2024-04-07 23:10:49', '2024-04-22 19:50:12'),
(4, 9, '2222', 2, '2023-2024', 2, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-08 00:49:59', '2024-04-22 19:50:12'),
(5, 10, '12', 1, '2023-2024', 2, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-10 07:47:59', '2024-04-10 07:47:59'),
(6, 17, '12345', 1, '2023-2024', 2, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-06-07 01:14:13', '2024-06-07 02:04:46'),
(7, 18, '2302010053', 1, '2023-2024', 2, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-06-07 01:54:50', '2024-06-07 02:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `k_matkul` varchar(255) NOT NULL,
  `dosen_id` bigint(11) NOT NULL,
  `programstudi_id` bigint(5) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_matakuliah` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `tahunakademik_id` bigint(20) NOT NULL,
  `aktif` varchar(255) NOT NULL,
  `kunci` int(1) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `k_matkul`, `dosen_id`, `programstudi_id`, `kelas_id`, `nama_matakuliah`, `sks`, `semester`, `tahunakademik_id`, `aktif`, `kunci`, `ket`, `created_at`, `updated_at`) VALUES
(15, '1', 1, 2, 1, 'indonesia', 2, 1, 1, '1', NULL, NULL, '2024-06-07 01:23:24', '2024-06-07 01:23:24'),
(16, '2', 1, 2, 1, 'Pendidikan Agama', 2, 1, 1, '1', NULL, NULL, '2024-06-07 01:24:30', '2024-06-07 01:24:30'),
(17, '3', 1, 2, 1, 'Pancasila dan Kewarganegaraan', 3, 1, 1, '1', NULL, NULL, '2024-06-07 01:25:11', '2024-06-07 01:25:11'),
(18, '4', 1, 2, 1, 'Pengantar Multimedia', 3, 1, 1, '1', NULL, NULL, '2024-06-07 01:25:51', '2024-06-07 01:25:51'),
(19, '5', 1, 2, 1, 'PTI', 2, 1, 1, '1', NULL, NULL, '2024-06-07 01:26:24', '2024-06-07 01:26:24'),
(20, '6', 1, 1, 1, 'Kalkulus dasar', 3, 1, 1, '1', NULL, NULL, '2024-06-07 01:27:26', '2024-06-07 01:27:26'),
(21, '7', 1, 2, 1, 'aplikasi multimedia', 3, 1, 1, '1', NULL, NULL, '2024-06-07 01:28:09', '2024-06-07 01:28:09'),
(22, '8', 1, 2, 1, 'CT', 2, 1, 1, '1', NULL, NULL, '2024-06-07 01:28:47', '2024-06-07 01:28:47'),
(23, '9', 1, 2, 1, 'imk', 3, 1, 1, '1', NULL, NULL, '2024-06-07 01:29:18', '2024-06-07 01:29:18');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_23_081142_create_mahasiswa_tabel', 1),
(7, '2024_02_23_081155_create_dosen_tabel', 1),
(8, '2024_02_23_081203_create_matakuliah_tabel', 1),
(9, '2024_02_23_081219_create_nilai_tabel', 1),
(10, '2024_03_12_141953_create_tahun_akademik_table', 1),
(11, '2024_03_12_144933_create_setting_tabel', 1),
(13, '2024_03_31_160548_program_studi', 2),
(14, '2024_05_03_140333_create_kelas_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `tahunakademik_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `k_matakuliah` varchar(255) NOT NULL,
  `mahasiswa_npm` varchar(20) NOT NULL,
  `krs` varchar(255) DEFAULT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `kunci` int(1) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `matakuliah_id`, `tahunakademik_id`, `kelas_id`, `k_matakuliah`, `mahasiswa_npm`, `krs`, `nidn`, `nilai`, `kunci`, `ket`, `created_at`, `updated_at`) VALUES
(40, 8, 1, 0, '123', '1111', NULL, NULL, 80, 1, NULL, '2024-04-08 00:55:00', '2024-04-10 07:32:25'),
(41, 7, 1, 0, '123', '2222', NULL, NULL, 1, 1, NULL, '2024-04-08 01:28:45', '2024-04-08 01:28:45'),
(42, 9, 1, 0, '0013', '2222', NULL, NULL, 10, 1, NULL, '2024-04-10 07:46:22', '2024-04-30 07:10:34'),
(43, 9, 2, 0, '0013', '12', NULL, NULL, 20, 1, NULL, '2024-04-10 07:49:03', '2024-04-11 06:17:56'),
(44, 15, 1, 1, '1', '12345', NULL, NULL, 70, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(45, 16, 1, 1, '2', '12345', NULL, NULL, 89, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(46, 17, 1, 1, '3', '12345', NULL, NULL, 75, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(47, 18, 1, 1, '4', '12345', NULL, NULL, 78, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(48, 19, 1, 1, '5', '12345', NULL, NULL, 80, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(49, 20, 1, 1, '6', '12345', NULL, NULL, 81, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(50, 21, 1, 1, '7', '12345', NULL, NULL, 85, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(51, 22, 1, 1, '8', '12345', NULL, NULL, 72, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(52, 23, 1, 1, '9', '12345', NULL, NULL, 82, NULL, NULL, '2024-06-07 01:44:42', '2024-06-07 01:44:42'),
(53, 15, 1, 1, '1', '2302010053', NULL, NULL, 77, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(54, 16, 1, 1, '2', '2302010053', NULL, NULL, 88, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(55, 17, 1, 1, '3', '2302010053', NULL, NULL, 76, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(56, 18, 1, 1, '4', '2302010053', NULL, NULL, 81, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(57, 19, 1, 1, '5', '2302010053', NULL, NULL, 82, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(58, 20, 1, 1, '6', '2302010053', NULL, NULL, 76, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(59, 21, 1, 1, '7', '2302010053', NULL, NULL, 80, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(60, 22, 1, 1, '8', '2302010053', NULL, NULL, 64, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41'),
(61, 23, 1, 1, '9', '2302010053', NULL, NULL, 81, NULL, NULL, '2024-06-07 01:58:41', '2024-06-07 01:58:41');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programstudi`
--

CREATE TABLE `programstudi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `programstudi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programstudi`
--

INSERT INTO `programstudi` (`id`, `kode`, `programstudi`, `created_at`, `updated_at`) VALUES
(1, 'trpl', 'Teknologi Rekayasa Perangkat Lunak', NULL, NULL),
(2, 'trm', 'Teknologi Rekasaya Multimedia', NULL, NULL),
(3, 'bdl', 'Bisnis Digital', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ganjil_genap` varchar(255) NOT NULL,
  `tahunakademik_id` int(2) NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `ganjil_genap`, `tahunakademik_id`, `tahun_akademik`, `created_at`, `updated_at`) VALUES
(1, '1', 2, '2024-2025', '2024-03-13 07:21:36', '2024-06-07 02:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahunakademik`
--

INSERT INTO `tahunakademik` (`id`, `tahun_akademik`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', '2024-03-13 07:21:21', '2024-03-13 07:21:21'),
(2, '2024-2025', '2024-03-13 07:21:21', '2024-03-13 07:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `npm`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', NULL, 'admin@admin.com', NULL, '$2y$12$EWbd2N..JcKV7dIBwsMClORsEAv2qeTJlIN0y8PzeBNtxak8yITJy', 1, NULL, '2024-03-13 07:21:17', '2024-03-13 07:21:17'),
(2, 'Manager User', NULL, 'manager@admin.com', NULL, '$2y$12$meLjtZbsn1Y0usuRcKRFc.I/WTFrHXYUnrgUwfSbujRkB1XuqPZZi', 2, NULL, '2024-03-13 07:21:17', '2024-03-13 07:21:17'),
(3, 'User', NULL, 'user@admin.com', NULL, '$2y$12$HloQiN6LrJcFGAzHnFqpxet2Kdfle.EdmSxLIHtwbwynGuXLLksPq', 0, NULL, '2024-03-13 07:21:17', '2024-03-13 07:21:17'),
(4, 'andi', NULL, 'andi@gmail.com', NULL, '$2y$12$WHS1YL0bQtiG0KNkO1/6.u2ku0fD8owkufWFGikQV4RAFpcPSA8nK', 2, NULL, '2024-03-13 07:22:22', '2024-03-13 07:22:22'),
(8, 'jabbar', '1111', 'jabbar@gmail.com', NULL, '$2y$12$JpSGtAm8qs0fYOlYFeHq1eG21tu5mdTQ3EWNOZjbUKAK4YK.43X/K', 0, NULL, '2024-04-07 23:10:49', '2024-04-07 23:10:49'),
(9, 'jadu', '2222', 'jadu@gmail.com', NULL, '$2y$12$1ccUdwAG1qPspJMx4Is7W.FMSb1q/mQcqSeExbIuMgS1KD34m6LQm', 0, NULL, '2024-04-08 00:49:59', '2024-04-08 00:49:59'),
(10, 'jaja', '12', 'jaja@gmail.com', NULL, '$2y$12$.f.hStlOty15HMzYc20iWeIeUzNwfkhZZ0QL/iwlW46v3MCVmhaju', 0, NULL, '2024-04-10 07:47:59', '2024-04-10 07:47:59'),
(17, 'dini', '12345', 'dini@gmail.com', NULL, '$2y$12$4X5FOf7R4KEQ4QkIcffIVurWdUSqR8CNbppORzMB.ZhQnNn5IoGt6', 0, NULL, '2024-06-07 01:14:13', '2024-06-07 01:14:13'),
(18, 'FINA FAOZIYAH', '2302010053', 'fina@gmail.com', NULL, '$2y$12$5S3/kY0wrgnUeV3.pBW8LujCRPFS7b4Gub613Fa9P1K7TJOuRfIjy', 0, NULL, '2024-06-07 01:54:50', '2024-06-07 01:54:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nidn_unique` (`nidn`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_npm_unique` (`npm`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matakuliah_k_matkul_unique` (`k_matkul`),
  ADD KEY `k_matkul_2` (`k_matkul`);
ALTER TABLE `matakuliah` ADD FULLTEXT KEY `k_matkul` (`k_matkul`);
ALTER TABLE `matakuliah` ADD FULLTEXT KEY `k_matkul_3` (`k_matkul`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
