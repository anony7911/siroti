-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 08 Apr 2023 pada 17.08
-- Versi server: 10.5.16-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u939198444_siroti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahans`
--

CREATE TABLE `bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahans`
--

INSERT INTO `bahans` (`id`, `nama_bahan`, `satuan`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'Tepung', 'kg', 45000, 12, 'images/1674458339.jpg', '2023-01-16 09:02:48', '2023-01-23 07:18:59'),
(6, 'Ragi', 'sachet', 5000, 120, 'images/1674458196.jpg', '2023-01-23 07:16:36', '2023-03-14 12:15:11'),
(7, 'Baking Pawder', 'Buah', 5000, 60, 'images/1674458407.jpg', '2023-01-23 07:20:07', '2023-03-14 12:15:47'),
(8, 'Gula Pasir', 'Kg', 12000, 65, 'images/1674462184.jpg', '2023-01-23 08:23:04', '2023-03-14 12:16:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_produks`
--

CREATE TABLE `bahan_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `bahan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahan_produks`
--

INSERT INTO `bahan_produks` (`id`, `produk_id`, `bahan_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(4, 23, 5, 1, '2023-01-23 05:53:57', '2023-01-23 05:53:57'),
(5, 26, 5, 1, '2023-01-23 11:34:24', '2023-01-23 11:34:24'),
(6, 26, 6, 1, '2023-01-23 11:34:24', '2023-01-23 11:34:24'),
(7, 26, 7, 1, '2023-01-23 11:34:24', '2023-01-23 11:34:24'),
(8, 26, 8, 1, '2023-01-23 11:34:24', '2023-01-23 11:34:24'),
(9, 27, 5, 1, '2023-01-23 11:51:40', '2023-01-23 11:51:40'),
(10, 27, 6, 2, '2023-01-23 11:51:40', '2023-01-23 11:51:40'),
(11, 27, 7, 1, '2023-01-23 11:51:40', '2023-01-23 11:51:40'),
(12, 27, 8, 1, '2023-01-23 11:51:40', '2023-01-23 11:51:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `kode_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id`, `pesanan_id`, `produk_id`, `jumlah`, `total_harga`, `kode_pesanan`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 2, 4000, 'pesanan-5-863', '2023-02-22 11:49:52', '2023-02-22 11:49:52'),
(4, 3, 26, 2, 24000, 'pesanan-5-863', '2023-02-22 11:49:52', '2023-02-22 11:49:52'),
(5, 5, 23, 18, 180000, 'pesanan-5-888', '2023-02-22 12:27:12', '2023-02-22 12:27:12'),
(6, 5, 1, 9, 18000, 'pesanan-5-888', '2023-02-22 12:27:12', '2023-02-22 12:27:12'),
(7, 6, 1, 6, 12000, 'pesanan-5-724', '2023-02-27 17:48:30', '2023-02-27 17:48:30'),
(8, 7, 1, 2, 4000, 'pesanan-6-513', '2023-03-14 12:22:31', '2023-03-14 12:22:31'),
(9, 7, 23, 1, 10000, 'pesanan-6-513', '2023-03-14 12:22:31', '2023-03-14 12:22:31'),
(10, 8, 1, 1, 2000, 'pesanan-6-598', '2023-03-27 09:59:39', '2023-03-27 09:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `user_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(5, 5, 20, 3, '2023-01-19 05:44:33', '2023-01-19 05:44:44'),
(14, 6, 1, 2, '2023-03-28 15:21:26', '2023-03-28 15:21:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_16_133409_create_pelanggans_table', 2),
(6, '2023_01_16_155504_create_bahans_table', 3),
(7, '2023_01_16_155755_create_produks_table', 4),
(9, '2023_01_17_043958_create_bahan_produks_table', 5),
(11, '2023_01_17_125237_create_stoks_table', 6),
(12, '2023_01_17_133527_create_produksis_table', 7),
(13, '2023_01_18_113531_create_keranjangs_table', 8),
(14, '2023_01_18_124832_add_user_id_to_pelanggans_table', 9),
(15, '2023_01_19_034816_create_pesanans_table', 10),
(16, '2023_01_19_035410_create_detail_pesanans_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama_pelanggan`, `alamat`, `no_telp`, `email`, `gambar`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Rini', 'JL. Garuda\nNo. 19', '123123123', 'admin1@gmail.com', 'images/1673883717.jpg', 'aktif', '2023-01-16 07:41:58', '2023-01-16 07:41:58', 5),
(2, 'Salam', 'JL. Merpati', '08233121231', 'pelanggan@gmail.com', 'images/1673883717.jpg', 'aktif', '2023-01-16 07:41:58', '2023-01-16 07:41:58', 6),
(3, 'Salim', 'JL. Merauke', '08253242343', 'pelanggan1@gmail.com', 'images/1673883717.jpg', 'aktif', '2023-01-16 07:41:58', '2023-01-16 07:41:58', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga1` int(11) NOT NULL,
  `status_pesanan` enum('menunggu','diproses','dikirim','selesai','batal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `kode_pesanan`, `total_harga1`, `status_pesanan`, `created_at`, `updated_at`) VALUES
(1, 5, 'pesanan-5-290', 116000, 'dikirim', '2023-01-18 21:12:46', '2023-01-22 16:24:56'),
(3, 5, 'pesanan-5-863', 28000, 'menunggu', '2023-02-22 11:49:52', '2023-02-22 11:49:52'),
(4, 5, 'pesanan-5-13', 0, 'diproses', '2023-02-22 11:49:58', '2023-02-22 11:52:22'),
(5, 5, 'pesanan-5-888', 198000, 'menunggu', '2023-02-22 12:27:12', '2023-02-22 12:27:12'),
(6, 5, 'pesanan-5-724', 12000, 'menunggu', '2023-02-27 17:48:30', '2023-02-27 17:48:30'),
(7, 6, 'pesanan-6-513', 14000, 'menunggu', '2023-03-14 12:22:31', '2023-03-14 12:22:31'),
(8, 6, 'pesanan-6-598', 2000, 'menunggu', '2023-03-27 09:59:39', '2023-03-27 09:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `stok`, `harga`, `deskripsi`, `gambar1`, `gambar2`, `gambar3`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Roti Mentega', 1, 2000, 'Enak dan murah', 'images/1673925984.994315136240jpg', 'images/1673925984.994315136240jpg', 'images/1673925984.994315136240jpg', 'aktif', '2023-01-16 18:48:11', '2023-01-16 19:26:24'),
(23, 'Roti Kacang Istimewa', 100, 10000, 'Roti kacang istimewa terbuat dari kacang istimewa dengan selai yang melimpah.', 'images/1674453237.9312580429025jpg', NULL, NULL, 'aktif', '2023-01-23 05:53:57', '2023-01-23 05:53:57'),
(24, 'Roti Sisir', 100, 2000, 'Roti sisir sangat enak dikonsumsi dengan minuman dingin maupun hangat.', 'images/1674462257.2238176085255jpg', NULL, NULL, 'aktif', '2023-01-23 08:24:17', '2023-01-23 08:24:17'),
(25, 'Roti Keju', 50, 10000, 'terbuat dari keju', 'images/1674473623.417626752952jpg', NULL, NULL, 'aktif', '2023-01-23 11:27:38', '2023-01-23 11:33:43'),
(26, 'Roti Keju Baru', 30, 12000, 'Baru', 'images/1674473664.4681696587208jpg', NULL, NULL, 'aktif', '2023-01-23 11:34:24', '2023-01-23 11:34:24'),
(27, 'Roti Tawar', 100, 15000, 'Roti Tawar New Varian', 'images/1674474700.770864766695jpg', NULL, NULL, 'aktif', '2023-01-23 11:51:40', '2023-01-23 11:51:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksis`
--

CREATE TABLE `produksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `total_produksi` int(11) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksis`
--

INSERT INTO `produksis` (`id`, `produk_id`, `jumlah_produksi`, `total_produksi`, `tanggal_produksi`, `tanggal_expired`, `created_at`, `updated_at`) VALUES
(1, 20, 2, 24, '2023-01-18', '2023-02-02', '2023-01-17 18:24:16', '2023-01-17 18:24:16'),
(2, 23, 3, 300, '2023-02-01', '2023-03-01', '2023-02-22 11:54:43', '2023-02-22 11:54:43'),
(3, 26, 2, 60, '2023-03-14', '2023-04-14', '2023-03-14 12:16:43', '2023-03-14 12:16:43'),
(4, 25, 3, 150, '2023-03-14', '2023-04-14', '2023-03-14 12:17:02', '2023-03-14 12:17:02'),
(5, 23, 2, 200, '2023-03-14', '2023-04-14', '2023-03-14 12:17:28', '2023-03-14 12:17:28'),
(6, 27, 1, 100, '2023-03-14', '2023-04-14', '2023-03-14 12:18:48', '2023-03-14 12:18:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stoks`
--

INSERT INTO `stoks` (`id`, `bahan_id`, `jumlah`, `total_harga`, `supplier`, `tanggal_beli`, `tanggal_expired`, `created_at`, `updated_at`) VALUES
(1, 5, 12, 100000, 'Wings', '2023-01-25', '2023-02-11', '2023-01-17 05:29:35', '2023-03-14 12:14:29'),
(2, 6, 20, 200000, 'Wings', '2023-03-14', '2024-03-14', '2023-03-14 12:15:11', '2023-03-14 12:15:11'),
(3, 7, 30, 250000, 'Wings', '2023-03-14', '2024-03-14', '2023-03-14 12:15:47', '2023-03-14 12:15:47'),
(4, 8, 15, 300000, 'Wings', '2023-03-14', '2024-03-14', '2023-03-14 12:16:15', '2023-03-14 12:16:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'admin@gmail.com', '2023-01-16 00:33:04', '$2y$10$88wRwQTWkYdaZa.ih/SZ0.O12ceStIPTBxV8Vn3aMouDrBi/Iwpd2', 'admin', 'dyLaL6NUXbmftMCwH4tpEnV0kc79eaZKEfviD4rOWiNPBTH70YZUvNzoYoeu', '2023-01-16 00:33:05', '2023-01-16 00:33:05'),
(5, 'Rini', 'admin1@gmail.com', NULL, '$2y$10$4MU.GKg2H4YxyOjHjm10G.pyT.bmd/cYoawFkbt9MqToMdstCWm5y', 'pelanggan', NULL, '2023-01-16 07:41:57', '2023-01-16 07:41:57'),
(6, 'pelanggan', 'pelanggan@gmail.com', NULL, '$2y$10$NEqc8SEAMuuyjlabQDog7e1fe53s0VAHrhz.0Qc83Hpu8hhBU1ZvG', 'pelanggan', NULL, '2023-02-22 11:38:25', '2023-02-22 11:38:25'),
(7, 'RINI', 'rinikolaka248@gmail.com', NULL, '$2y$10$sAz5hBQl5QAAWiMGAoD59udtswR1iNAUhOaTXlvZNWfoDRqxxvHqy', 'pelanggan', NULL, '2023-02-22 11:38:48', '2023-02-22 11:38:48'),
(8, 'Pimpinan', 'pimpinan@gmail.com', '2023-03-14 16:40:03', '$2y$10$VMD0r.zRuAvrIxvwdZWpIODrP9zy.n5N/s2AQmjtivaajK/zBXDum', 'pimpinan', 'hzijmPbNjEvivMu4RKx7LoTkcRuWgW5bagpxU19gEyjV4yh3YhUuhuK4O8AZ', '2023-03-14 16:40:03', '2023-03-14 16:40:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahans`
--
ALTER TABLE `bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan_produks`
--
ALTER TABLE `bahan_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahan_produks_produk_id_foreign` (`produk_id`),
  ADD KEY `bahan_produks_bahan_id_foreign` (`bahan_id`);

--
-- Indeks untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanans_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanans_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahans`
--
ALTER TABLE `bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bahan_produks`
--
ALTER TABLE `bahan_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_produks`
--
ALTER TABLE `bahan_produks`
  ADD CONSTRAINT `bahan_produks_bahan_id_foreign` FOREIGN KEY (`bahan_id`) REFERENCES `bahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bahan_produks_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
