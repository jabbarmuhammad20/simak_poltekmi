-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 05:17 PM
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
-- Table structure for table `dosen_tabel`
--

CREATE TABLE `dosen_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prog_studi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_tabel`
--

INSERT INTO `dosen_tabel` (`id`, `nidn`, `nama`, `prog_studi`, `created_at`, `updated_at`) VALUES
(1, 101011, 'Andi', 'trpl', NULL, NULL),
(2, 101012, 'jabbar Muhammad', 'bdl', NULL, NULL);

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
-- Table structure for table `mahasiswa_tabel`
--

CREATE TABLE `mahasiswa_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `npm` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `prog_studi` varchar(255) NOT NULL,
  `k_dosenwali` varchar(255) NOT NULL,
  `aktif` varchar(255) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa_tabel`
--

INSERT INTO `mahasiswa_tabel` (`id`, `user_id`, `npm`, `semester`, `prog_studi`, `k_dosenwali`, `aktif`, `ket`, `created_at`, `updated_at`) VALUES
(1, '5', 15141, '1', 'trm', '101011', '1', NULL, '2024-02-25 08:39:20', '2024-02-25 08:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_tabel`
--

CREATE TABLE `matakuliah_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `tahun_akademik` varchar(20) DEFAULT NULL,
  `k_matkul` varchar(255) NOT NULL,
  `prog_studi` varchar(255) NOT NULL,
  `nama_matakuliah` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `ganjil_genap` int(5) DEFAULT NULL,
  `aktif` varchar(255) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah_tabel`
--

INSERT INTO `matakuliah_tabel` (`id`, `dosen_id`, `tahun_akademik`, `k_matkul`, `prog_studi`, `nama_matakuliah`, `sks`, `semester`, `ganjil_genap`, `aktif`, `ket`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 'TR1792', 'trpl', 'Bahasa Inggris', 2, '6', NULL, '1', NULL, '2024-02-27 08:15:44', '2024-02-27 08:15:44'),
(5, 1, '2023-2024', 'TR11792', 'trpl', 'Bahasa Inggris', 2, '6', NULL, '1', NULL, '2024-02-27 08:16:14', '2024-02-27 08:16:14'),
(6, 1, '2023-2024', 'TR117923', 'trpl', 'Matematika', 2, '6', NULL, '1', NULL, '2024-02-27 08:16:59', '2024-02-27 08:16:59'),
(7, 1, '2023-2024', 'TR117924', 'trpl', 'Bahasa Indonesia', 2, '6', NULL, '1', NULL, '2024-02-27 08:18:17', '2024-02-27 08:18:17'),
(8, 1, '2023-2024', '178917', 'trpl', 'Bahasa Inggris', 3, '1', NULL, '1', NULL, '2024-02-27 08:19:22', '2024-02-27 08:19:22'),
(9, 1, '2023-2024', '1789171', 'trpl', 'Bahasa Inggris', 3, '4', NULL, '1', NULL, '2024-02-27 08:22:39', '2024-02-27 08:22:39');

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
(9, '2024_02_23_081219_create_nilai_tabel', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tabel`
--

CREATE TABLE `nilai_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matakuliah_id` int(11) NOT NULL,
  `mahasiswa_npm` varchar(255) NOT NULL,
  `krs` varchar(255) DEFAULT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_tabel`
--

INSERT INTO `nilai_tabel` (`id`, `matakuliah_id`, `mahasiswa_npm`, `krs`, `nidn`, `nilai`, `ket`, `created_at`, `updated_at`) VALUES
(7, 8, '15141', '1', NULL, '1', NULL, '2024-02-27 09:47:55', '2024-02-27 09:47:55'),
(8, 5, '15141', NULL, NULL, NULL, NULL, '2024-02-27 09:47:59', '2024-02-27 09:47:59'),
(9, 3, '15141', NULL, NULL, NULL, NULL, '2024-03-05 15:49:10', '2024-03-05 15:49:10'),
(10, 3, '15141', NULL, NULL, NULL, NULL, '2024-03-05 15:49:16', '2024-03-05 15:49:16');

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
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(11) NOT NULL,
  `tahun_akademik` varchar(20) DEFAULT NULL,
  `blum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `tahun_akademik`, `blum`) VALUES
(1, '2023-2024', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` bigint(20) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun_akademik`) VALUES
(1, '2023-2024'),
(2, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `npm` varchar(255) DEFAULT NULL,
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
(1, 'Admin User', NULL, 'admin@admin.com', NULL, '$2y$12$GXpGyso65/AwWn5MKZDw0O3ZeGTVw07LBywxxPdWccMYJJ7XMJG56', 1, NULL, '2024-02-23 01:57:16', '2024-02-23 01:57:16'),
(2, 'Manager User', NULL, 'manager@admin.com', NULL, '$2y$12$jQThzysHIfbsJE6KElf/ou52KDsgwU19b5r4E4K1Ke8UEGjlfZqcy', 2, NULL, '2024-02-23 01:57:16', '2024-02-23 01:57:16'),
(3, 'User', NULL, 'user@admin.com', NULL, '$2y$12$oiTc5dP/IXEESggpYQg6/uoP59z7qEQWLz/.gEuq8Fyed60WVH1sS', 0, NULL, '2024-02-23 01:57:16', '2024-02-23 01:57:16'),
(5, 'dinda', '15141', 'dinda@gmail.com', NULL, '$2y$12$.Zr0kBk03nVRxTEbm6iWhuYmqj1jmYaBxY9rSMctSD9PttWZKuZNa', 0, NULL, '2024-02-25 08:39:20', '2024-02-25 08:39:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen_tabel`
--
ALTER TABLE `dosen_tabel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_tabel_nidn_unique` (`nidn`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mahasiswa_tabel`
--
ALTER TABLE `mahasiswa_tabel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_tabel_npm_unique` (`npm`);

--
-- Indexes for table `matakuliah_tabel`
--
ALTER TABLE `matakuliah_tabel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matakuliah_tabel_k_matkul_unique` (`k_matkul`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_tabel`
--
ALTER TABLE `nilai_tabel`
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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
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
-- AUTO_INCREMENT for table `dosen_tabel`
--
ALTER TABLE `dosen_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa_tabel`
--
ALTER TABLE `mahasiswa_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matakuliah_tabel`
--
ALTER TABLE `matakuliah_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_tabel`
--
ALTER TABLE `nilai_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
