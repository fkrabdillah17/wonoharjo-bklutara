-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Agu 2021 pada 23.31
-- Versi server: 5.7.24
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wonoharjo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `businesses`
--

INSERT INTO `businesses` (`id`, `slug`, `title`, `tag`, `field`, `category`, `description`, `address`, `instagram`, `facebook`, `whatsapp`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'bumdes-wono-sari', 'BUMDES Amanah Rakyat', 'Pemerintah', 'Jasa Umum', 'Usaha Mikro', '<p>Usaha desa dalam peminjaman tenda dan kursi bagi masyarakat yang akan mengadakan acara</p>', 'Sebelah Kantor Desa Wonoharjo, Rw 01 Rt 02 Desa Wonoharjo Kecamatan Girimulya', 'bumdes_amanah_rakyat', 'AmanahRakyat', '82355128859', '1627141330962.png', '2021-07-24 15:42:10', '2021-07-26 16:45:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Potensi Desa', '2021-07-24 15:45:25', '2021-07-24 15:45:25'),
(2, 'Sumber Daya Alam', '2021-07-27 10:44:50', '2021-07-27 10:44:50'),
(3, 'Sumber Daya Manusia', '2021-07-27 10:45:07', '2021-07-27 10:45:07');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `information`
--

INSERT INTO `information` (`id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(4, 'Welcome Slider-Welcome Slide', '1627031273101.jpg', '2021-07-23 09:07:53', '2021-07-23 09:07:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `amount`, `condition`, `source`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Kursi Plastik', '120', 'Baik', 'APBDes', '1627997225565.png', '2021-08-03 13:27:05', '2021-08-03 15:05:45'),
(2, 'Tenda', '2 Set', 'Baik', 'Sumbangan Warga', '1628179575332.png', '2021-08-05 16:06:15', '2021-08-05 16:06:15');

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
(4, '2021_07_12_115404_create_profiles_table', 1),
(5, '2021_07_14_064524_create_news_table', 1),
(6, '2021_07_14_180641_create_businesses_table', 1),
(7, '2021_07_15_225726_create_galleries_table', 1),
(8, '2021_07_17_190252_create_categories_table', 1),
(9, '2021_07_18_012250_create_sub_categories_table', 1),
(10, '2021_07_18_170801_create_monographs_table', 1),
(11, '2021_07_23_143617_create_information_table', 2),
(12, '2021_07_30_234458_create_inventories_table', 3),
(14, '2021_07_30_234733_create_rentals_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monographs`
--

CREATE TABLE `monographs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `monographs`
--

INSERT INTO `monographs` (`id`, `category_id`, `sub_category_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '<p>Utara &nbsp; &nbsp; &nbsp;: Suka Makmur</p><p>Selatan &nbsp;: Lubuk Banyau</p><p>Timur &nbsp; &nbsp; : Giri Mulya</p><p>Barat &nbsp; &nbsp; &nbsp;: Menganyau T</p>', '2021-07-24 15:48:37', '2021-07-24 15:48:37'),
(2, 1, 2, '<p>T. Perkebunan : 2016 Ha</p>', '2021-07-27 10:52:29', '2021-07-27 10:52:29'),
(3, 2, 4, '<p>Karet : 683 Ha</p>', '2021-07-27 10:53:17', '2021-07-27 10:53:17'),
(4, 3, 5, '<p>Kepala Keluarga :</p><p>Laki-Laki &nbsp; &nbsp; &nbsp; : &nbsp;760 KK &nbsp;&nbsp;</p><p>Perempuan &nbsp; : &nbsp;93 &nbsp; KK</p><p>Jumlah Orang</p><p>Laki - Laki &nbsp; &nbsp; : 1349 Org</p><p>Perempuan &nbsp; : 1312 Org</p><p>Total &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 2661 Org</p>', '2021-07-27 11:01:51', '2021-07-27 11:01:51'),
(5, 3, 6, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;L &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; P &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Jmlh</p><p>Islam &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; 1301 &nbsp; &nbsp; 1273 &nbsp; &nbsp; 2574</p><p>Kristen &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; 30 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;22 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;52</p><p>Khatolik &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; 18 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;17 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;35</p><p>Hindu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0</p><p>Budha &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0</p><p>Khonghucu : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0</p>', '2021-07-27 11:06:25', '2021-07-27 11:06:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `slug`, `tag`, `title`, `thumbnail`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, 'sejarah-desa-wonoharjo', 'Berita', 'Sejarah Desa Wonoharjo', '1628479925173.png', '<p>a</p>', 'Administrator', '2021-08-09 03:32:05', '2021-08-09 03:40:55'),
(2, 'kunjungan-bupati-bengkulu-utara', 'Berita', 'Kunjungan Bupati Bengkulu Utara', '1628479986748.png', '<p>l</p>', 'Administrator', '2021-08-09 03:33:06', '2021-08-09 03:33:06');

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
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `tag`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'visimisi', 'Visi Misi Desa Wonoharjo', '<h2><strong>VISI</strong></h2><p>TERWUJUDNYA DESA WONOHARJO YANG RELIGIUS, AMAN, SEHAT, CERDAS, BERDAYA SAING, MANDIRI, BERBUDAYA, SERTA MENYENGGARAKAN PEMERINTAHAN DESA YANG BERSIH DAN BERWIBAWA</p><h2><strong>MISI</strong></h2><ol><li>MEWUJUDKAN MASYARAKAT DESA YANG RELIGIUS</li><li>MEWUJUDKAN KEAMANAN DAN KETERTIBAN DILINGKUNGAN DESA WONOHARJO DENGAN CARA MENJALIN KERJA SAMA DENGAN INSTANSI TERKAIT</li><li>MENINGKATKAN KESADARAN AKAN KESEHATAN, KEBERSIHAN DESA SERTA MENGUSAHAKAN JAMINAN KESEMATAN MASYARAKAT</li><li>MEMBINA MASYARAKAT UNTUK BERPERILAKU CERDAS DALAM MENYIKAPI MASALAH SOSIAL YANG BERKEMBANG</li><li>MEWUJUDKAN DESA WONOHARJO YANG MANDIRI DAN MEMILIKI PENDAPATAN ASLI DAERAH (PAD) YANG LAYAK</li><li>MEWUJUDKAN DAN MENINGKATKAN TATA KELOLA PEMERINTAHAN DESA YANG BAIK</li><li>MENINGKATKAN PELAYANAN PRIMA DAN RAMAH KEPADA MASYARAKAT</li></ol>', '2021-07-24 15:21:57', '2021-07-24 16:10:26'),
(2, 'struktur', 'Struktur Pemerintah Desa Wonoharjo', '1627142177940.png', '2021-07-24 15:56:17', '2021-07-24 15:56:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_reservation_date` date NOT NULL,
  `end_reservation_date` date NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rentals`
--

INSERT INTO `rentals` (`id`, `name`, `telp`, `start_reservation_date`, `end_reservation_date`, `location`, `package`, `payment`, `payment_status`, `rental_status`, `staff`, `created_at`, `updated_at`) VALUES
(1, 'Raden', '0882234447', '2021-08-04', '2021-08-07', 'Girimulya Rw 1', 'Tenda 2 Set', '550000.00', 'Lunas', 'Selesai', 'Administrator Bumdes', '2021-08-03 17:37:39', '2021-08-03 18:37:16'),
(3, 'Raden Ade', '0882234447', '2021-08-16', '2021-08-19', 'Tanjung Anom', 'Tenda 1 Set dan 150 Kursi', '470000.00', 'Lunas', 'Selesai', 'Administrator Bumdes', '2021-08-03 18:08:16', '2021-08-03 18:55:14'),
(4, 'Raden Boy', '0882234447', '2021-08-09', '2021-08-13', 'Waru', 'Tenda 2 Set dan 100 Kursi', '550000.00', 'Lunas', 'Selesai', 'Administrator Bumdes', '2021-08-03 18:13:21', '2021-08-05 15:32:29'),
(5, 'Raden Mas', '0882234447', '2021-09-05', '2021-09-08', 'Palembang', 'Tenda 2 Set dan 100 Kursi', '780000.00', 'Lunas', 'Selesai', 'Administrator Bumdes', '2021-08-05 15:21:22', '2021-08-05 15:32:32'),
(6, 'Raden Kian', '08822323522', '2022-01-05', '2022-01-08', 'Padjajaran', 'Tenda 2 Set', '470000.00', 'Lunas', 'Selesai', 'Administrator Bumdes', '2021-08-05 15:22:24', '2021-08-05 15:32:35'),
(7, 'Raden Roy', '08822323522', '2021-08-02', '2021-08-05', 'Bode', 'Tenda 2 Set dan 100 Kursi', '550000.00', 'Lunas', 'Dalam Penyewaan', 'Administrator Bumdes', '2021-08-08 18:08:31', '2021-08-08 18:08:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Batas Desa', 1, '2021-07-24 15:45:36', '2021-07-24 15:45:36'),
(2, 'Luas Desa', 1, '2021-07-27 10:44:29', '2021-07-27 10:44:29'),
(3, 'Pertanian', 2, '2021-07-27 10:49:17', '2021-07-27 10:49:17'),
(4, 'Perkebunan', 2, '2021-07-27 10:49:26', '2021-07-27 10:49:26'),
(5, 'Jumlah Warga', 3, '2021-07-27 10:50:04', '2021-07-27 10:50:04'),
(6, 'Agama', 3, '2021-07-27 10:50:22', '2021-07-27 10:50:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `slug`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Adminutama', 'administrator-adminutama', '$2y$10$p52TXrW67o2sxtvtSRHeUOjUY/Uu/cOPvbuu52KYYpoC1iDo2dwsi', 0, 'X9jZTQe4eWOM7jfYgIwJF4nzmdhKUwldpOhGhPBRXRjQUJqY1gYhl6hY7GfW', '2021-07-23 07:28:38', '2021-07-23 07:28:38'),
(2, 'Administrator Bumdes', 'Adminbumdes', 'administrator-bumdes-adminbumdes', '$2y$10$3PiBqW2C2BPayr5hEewiveX7SFVWa3yllc5o.mRRGLi6qu/kbxvjG', 2, 'E5o20KAnjjc3Qm7jMTeGrz8vgPhGMCooPkbb7AMD0KKC2PIN2dMQXpDDtcWn', '2021-07-30 18:02:46', '2021-07-30 18:02:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monographs`
--
ALTER TABLE `monographs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monographs_category_id_foreign` (`category_id`),
  ADD KEY `monographs_sub_category_id_foreign` (`sub_category_id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `monographs`
--
ALTER TABLE `monographs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `monographs`
--
ALTER TABLE `monographs`
  ADD CONSTRAINT `monographs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `monographs_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
