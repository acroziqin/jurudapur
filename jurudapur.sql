-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2019 pada 11.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurudapur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dapur`
--

CREATE TABLE `dapur` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dapur`
--

INSERT INTO `dapur` (`id`, `nama`, `alamat`, `rating`, `deskripsi`, `kuota`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Bu Sri', NULL, NULL, 'Dapur berpengalaman, banyak menu pilihan dan harga terjangkau. Cocok buat kamu yang cari kateringan low budget dengan variasi menu yang bermacam-macam.', 100, 'Lowokwaru', NULL, NULL),
(2, 'Bu Rini', NULL, NULL, 'Dapur berpengalaman dan harga terjangkau banget cocok buat kamu yang cari kateringan low budget.', NULL, '', NULL, NULL),
(3, 'Aufar', NULL, NULL, 'Dapur spesialis jajan-jajan yang berpengalaman dan terjangkau.', NULL, '', NULL, NULL),
(4, 'Pak Angga', NULL, NULL, 'Dapur berpengalaman dengan masakan yang berkelas.', NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi`
--

CREATE TABLE `isi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_makanan`
--

CREATE TABLE `isi_makanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_isi` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kue`
--

CREATE TABLE `kue` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dapur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kue`
--

INSERT INTO `kue` (`id`, `nama`, `harga`, `jenis`, `id_dapur`, `created_at`, `updated_at`) VALUES
(1, 'Tarches', 2500, 'Basah Manis', 1, NULL, NULL),
(2, 'Bolu Sakura', 2500, 'Basah Manis', 1, NULL, NULL),
(3, 'Lapis Mawar', 2500, 'Basah Manis', 1, NULL, NULL),
(4, 'Sus', 2500, 'Basah Manis', 1, NULL, NULL),
(5, 'Sus Buah', 2500, 'Basah Manis', 1, NULL, NULL),
(6, 'Kue Tok', 3000, 'Basah Manis', 1, NULL, NULL),
(7, 'Lumpur', 2500, 'Basah Manis', 1, NULL, NULL),
(8, 'Bikang', 2500, 'Basah Manis', 1, NULL, NULL),
(9, 'Brownis', 2500, 'Basah Manis', 1, NULL, NULL),
(10, 'Proll Tape', 2500, 'Basah Manis', 1, NULL, NULL),
(11, 'Pie Buah', 3000, 'Basah Manis', 1, NULL, NULL),
(12, 'Pie Brownis', 3000, 'Basah Manis', 1, NULL, NULL),
(13, 'Paste', 3000, 'Basah Gurih', 1, NULL, NULL),
(14, 'Lemper', 2000, 'Basah Gurih', 1, NULL, NULL),
(15, 'Lumpia', 2500, 'Basah Gurih', 1, NULL, NULL),
(16, 'Risoles', 2500, 'Basah Gurih', 1, NULL, NULL),
(17, 'Sosis Solo', 2500, 'Basah Gurih', 1, NULL, NULL),
(18, 'Risol Mayo', 3000, 'Basah Gurih', 1, NULL, NULL),
(19, 'Gabin Gurih', 3000, 'Basah Gurih', 1, NULL, NULL),
(20, 'Macharoni', 3000, 'Basah Gurih', 1, NULL, NULL),
(21, 'Tahu Fantasi', 3000, 'Basah Gurih', 1, NULL, NULL),
(22, 'Sosis Solo', 2000, NULL, 3, NULL, NULL),
(23, 'Pastel', 2000, NULL, 3, NULL, NULL),
(24, 'Mayo', 2000, NULL, 3, NULL, NULL),
(25, 'Sus', 2000, NULL, 3, NULL, NULL),
(26, 'Donat Coklat', 2000, NULL, 3, NULL, NULL),
(27, 'Donat Gula', 2000, NULL, 3, NULL, NULL),
(28, 'Lumpur', 2000, NULL, 3, NULL, NULL),
(29, 'Bolu Kukus', 2000, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_isi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jenis` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dapur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `kode_isi`, `harga`, `jenis`, `id_dapur`, `created_at`, `updated_at`) VALUES
(1, 'Paket A', '1011', 6000, 'Nasi Bungkus', 1, NULL, NULL),
(2, 'Paket B', '10111', 7000, 'Nasi Bungkus', 1, NULL, NULL),
(3, 'Paket C', '10111', 7000, 'Nasi Bungkus', 1, NULL, NULL),
(4, 'Paket D', '10111', 8500, 'Nasi Bungkus', 1, NULL, NULL),
(5, 'Paket E', '1011101', 12000, 'Nasi Bungkus', 1, NULL, NULL),
(6, 'Paket A', NULL, 8000, 'Hemat Foam', 1, NULL, NULL),
(7, 'Paket B', '010011', 11500, 'Hemat Foam', 1, NULL, NULL),
(8, 'Paket C', '1110', 8000, 'Hemat Foam', 1, NULL, NULL),
(9, 'Paket D', '1101', 11500, 'Hemat Foam', 1, NULL, NULL),
(10, 'Paket A', '1110', 13000, 'Hemat Foam', 1, NULL, NULL),
(11, 'Paket B', '1011', 13000, 'Hemat Kotak', 1, NULL, NULL),
(12, 'Paket C', '111', 13000, 'Hemat Kotak', 1, NULL, NULL),
(13, 'Nasi Rendang', '1111', 15500, 'Happy Komplit', 1, NULL, NULL),
(14, 'Nasi Rames', '10111', 15500, 'Happy Komplit', 1, NULL, NULL),
(15, 'Nasi Uduk', '111', 15500, 'Happy Komplit', 1, NULL, NULL),
(16, 'Nasi Urap', '11011', 15500, 'Happy Komplit', 1, NULL, NULL),
(17, 'Nasi Kuning', '1101111', 19500, 'Happy Komplit', 1, NULL, NULL),
(18, 'Paket 10 Orang', NULL, 205000, 'Tumpeng', 1, NULL, NULL),
(19, 'Paket 20 Orang', NULL, 205000, 'Tumpeng', 1, NULL, NULL),
(20, 'Paket 30', NULL, 550000, 'Tumpeng', 1, NULL, NULL),
(21, 'Paket 1', '0100000000010001000', 5500, 'Nasi Bungkus', 2, NULL, NULL),
(22, 'Paket 2', '0100000000010001000', 7500, 'Nasi Bungkus', 2, NULL, NULL),
(23, 'Paket 3', '010000000001010001000', 8000, 'Nasi Bungkus', 2, NULL, NULL),
(24, 'Paket 4', '010100010000000001000', 7000, 'Nasi Bungkus', 2, NULL, NULL),
(25, 'Paket 5', '010100010000000001000', 8000, 'Nasi Bungkus', 2, NULL, NULL),
(26, 'Paket 6', '0100000000011000', 9500, 'Nasi Bungkus', 2, NULL, NULL),
(27, 'Paket Hemat', '0', 7000, 'Nasi Foam', 2, NULL, NULL),
(28, 'Paket 1', '01000000000100010000001000', 9000, 'Nasi Foam', 2, NULL, NULL),
(29, 'Nasi Geprek', '100000000011', 10000, 'Nasi Foam', 2, NULL, NULL),
(30, 'Paket 2', '01000000000100010000010001', 12000, 'Nasi Kotak', 2, NULL, NULL),
(31, 'Paket 3', '010000000001000100000100011', 14000, 'Nasi Kotak', 2, NULL, NULL),
(32, 'Paket 4', '0100000000010001000001000111', 15000, 'Nasi Kotak', 2, NULL, NULL),
(33, 'Paket 5', '01000000000100010000010001111', 17000, 'Nasi Kotak', 2, NULL, NULL),
(34, 'Paket 10 Orang', '', 185000, 'Tumpeng', 2, NULL, NULL),
(35, 'Paket 1', '1110', 7000, 'Nasi Bungkus', 4, NULL, NULL),
(36, 'Paket 2', '111', 9000, 'Nasi Bungkus', 4, NULL, NULL),
(37, 'Paket 3', '111', 10000, 'Nasi Bungkus', 4, NULL, NULL),
(38, 'Paket 4', '111', 9000, 'Nasi Bungkus', 4, NULL, NULL),
(39, 'Paket 5', '111', 10000, 'Nasi Bungkus', 4, NULL, NULL),
(40, 'Paket 6', '111', 10000, 'Nasi Bungkus', 4, NULL, NULL),
(51, 'Paket 7', '111', 11000, 'Nasi Bungkus', 4, NULL, NULL),
(52, 'Paket 8', '111', 13000, 'Nasi Bungkus', 4, NULL, NULL),
(53, 'Paket 9', '111', 14000, 'Nasi Bungkus', 4, NULL, NULL),
(54, 'Paket 10', '1110000', 14000, 'Nasi Bungkus', 4, NULL, NULL),
(55, 'Paket 11', '111', 16000, 'Nasi Bungkus', 4, NULL, NULL),
(56, 'Paket 1', '11110', 15000, 'Nasi Kotak', 4, NULL, NULL),
(57, 'Paket 2', '11111', 17000, 'Nasi Kotak', 4, NULL, NULL),
(58, 'Paket 1', '11110', 15000, 'Nasi Foam', 4, NULL, NULL),
(59, 'Paket 2', '11111', 17000, 'Nasi Foam', 4, NULL, NULL),
(60, 'Nasi Putih 10 Orang', '', 185000, 'Tumpeng', 4, NULL, NULL),
(61, 'Nasi Kuning 10 Orang', '', 195000, 'Tumpeng', 4, NULL, NULL),
(62, 'Nasi Putih 20 Orang', NULL, 500000, 'Tumpeng', 4, NULL, NULL),
(63, 'Nasi Kuning 20 Orang', NULL, 550000, 'Tumpeng', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_07_060813_create_dapur_table', 1),
(4, '2019_01_07_061208_create_makanan_table', 1),
(5, '2019_01_07_061709_create_isi_table', 1),
(6, '2019_01_07_061836_create_kue_table', 1),
(7, '2019_01_07_061952_create_minuman_table', 1),
(8, '2019_01_07_062051_create_tambahan_table', 1),
(9, '2019_01_07_062152_create_isi_makanan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dapur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id`, `nama`, `harga`, `jenis`, `id_dapur`, `created_at`, `updated_at`) VALUES
(1, 'Es Teler', 5500, 'Es Cup Sedang', 1, NULL, NULL),
(2, 'Es Kopyor Sintetis', 4500, 'Es Cup Sedang', 1, NULL, NULL),
(3, 'Aneka Jus', 5500, 'Es Cup Sedang', 1, NULL, NULL),
(4, 'Aneka Kolak', 4500, 'Es Cup Sedang', 1, NULL, NULL),
(5, 'Dawet', 4500, 'Es Cup Sedang', 1, NULL, NULL),
(6, 'Es Buah', 5500, 'Es Cup Sedang', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id` int(11) NOT NULL,
  `dapur` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `ongkos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id`, `dapur`, `lokasi`, `ongkos`) VALUES
(1, 'Blimbing', 'Blimbing', 0),
(2, 'Blimbing', 'Kedungkandang', 19800),
(3, 'Blimbing', 'Klojen', 9800),
(4, 'Blimbing', 'Lowokwaru', 11600),
(5, 'Blimbing', 'Sukun', 15800),
(6, 'Kedungkandang', 'Blimbing', 19600),
(7, 'Kedungkandang', 'Kedungkandang', 0),
(8, 'Kedungkandang', 'Klojen', 14400),
(9, 'Kedungkandang', 'Lowokwaru', 26800),
(10, 'Kedungkandang', 'Sukun', 17400),
(11, 'Klojen', 'Blimbing', 9800),
(12, 'Klojen', 'Kedungkandang', 13800),
(13, 'Klojen', 'Klojen', 0),
(14, 'Klojen', 'Lowokwaru', 14400),
(15, 'Klojen', 'Sukun', 8200),
(16, 'Lowokwaru', 'Blimbing', 12000),
(17, 'Lowokwaru', 'Kedungkandang', 26600),
(18, 'Lowokwaru', 'Klojen', 13200),
(19, 'Lowokwaru', 'Lowokwaru', 0),
(20, 'Lowokwaru', 'Sukun', 20600),
(21, 'Sukun', 'Blimbing', 16000),
(22, 'Sukun', 'Kedungkandang', 17000),
(23, 'Sukun', 'Klojen', 7000),
(24, 'Sukun', 'Lowokwaru', 17400),
(25, 'Sukun', 'Sukun', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('achmadchoirurroziqin@gmail.com', '$2y$10$5X1t/CEKwskmzrfRHgvmYeMsT6mOvhvJZDeZwv6VXVjOpoB58XVbG', '2019-01-09 18:52:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambahan`
--

CREATE TABLE `tambahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_dapur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` blob,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `jenis_kelamin`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niqizor', 'roziqin@jurudapur.com', NULL, '$2y$10$rsYEsXr4Bsf9iJ5guWXVYe3cxSPM5zBOC5U1J6Kfv8VdaL/1S/AJK', 'Jl. Melati', '081234', 'laki-laki', 0x756c43316d493832416f506d7a787931366e553979636e4f46486d62424b7450376a53706d4f73732e706e67, 'Gjsue6sDnAFJ3nVEmB97hnD2DWjysAEDOcqkvXedI1n6ClCzDMnrj8Y4qCcG', '2019-01-06 23:28:45', '2019-01-11 02:52:39'),
(9, 'Achmad', 'achmad@jurudapur.com', NULL, '$2y$10$VF0GXi6lG3VfxmdwDDP8XuQZRhKuhDkLwAmAax7QqZpJ/ncEXjqG.', NULL, NULL, NULL, 0x4a6e766743376a4f704851326538513665796962615354303455335a4143513674463644577a37302e706e67, 'IzLkKlqUc6HfLsRMbNMHuRk7NbvcqEVyDBmdDFkFRuprPntN47B9ClAeNGUI', '2019-01-07 08:14:04', '2019-01-10 19:40:15'),
(10, 'Choirur', 'choirur@jurudapur.com', NULL, '$2y$10$kqp.gHe2yd/TVN8AaS4QleqUf4HB5xCYcf78oW/w/EkvUoGML5sou', NULL, NULL, NULL, NULL, 'ZrcDHXna24N4AediNVBwDPfmKq5YmfIaRi2FQNl5DE1w1Rcu06u5xYU6YcWu', '2019-01-07 08:15:11', '2019-01-10 09:42:22'),
(11, 'Choirur', 'hoirur@jurudapur.com', NULL, '$2y$10$Kd48viaCYuu8YeMw9V0PGe22PtPkdI8kygL2F9VQDu9KMHn2//Vbi', NULL, NULL, NULL, NULL, 'ISs4rPKB1oVSfkhzX4xecGTf89pmFNdot8xNznoTNKGZs5WeuUW53pK2cKFe', '2019-01-07 08:15:57', '2019-01-07 08:15:57'),
(12, 'Ilham', 'ilham@jurudapur.com', NULL, '$2y$10$POJMU3BJVggM3YCcEEWvv.ERZate.48Y6LSQ5VybaVM5bD9wmE6xq', NULL, NULL, NULL, NULL, 'KGdYqJE7WiqJcf1ZhBKGLRDjhwbtvddPzptTUatOfhss6l08jfGvOmxYGa0K', '2019-01-07 08:27:14', '2019-01-07 08:27:14'),
(13, 'Ach', 'ach@jurudapur.com', '2019-01-07 08:31:00', '$2y$10$oLYh.dgS0vb.KzRcfszvdu2M1uik5EhWYz7/N9fnYhoudKdk7ilqe', NULL, NULL, NULL, NULL, 'VhsI4NKMiHnTHolyfJG7MVwCl5TxdBDmheoxlZZPKEoMZS4SYOuV5P1mdb8N', '2019-01-07 08:28:28', '2019-01-07 08:31:00'),
(14, 'Chm', 'chm@jurudapur.com', '2019-01-07 08:37:13', '$2y$10$ZXbDDDUsTAfTgjS1ceHIr.O9UKXf6RwcfUx73T8M2cFyUfH1Bchj2', NULL, NULL, NULL, NULL, 'xpvSterA8HZ86QYedJK0PPS5EZ3hUD8BdAm2bpfoTb79N7YGjBtVHlpOhHdj', '2019-01-07 08:36:58', '2019-01-07 08:37:13'),
(15, 'Hma', 'hma@jurudapur.com', '2019-01-07 08:42:09', '$2y$10$62Yb5budcRoQ4rZ5bvR7Q.jI99qtRdOgQ50F9uXFFBC7tODAJNqm.', NULL, NULL, NULL, NULL, 'JhU5Ta5I9RWxdaP6FNK0tqRRZp57ST5rHA54QI4uQ5wWcoV3Cz01mraXO2cN', '2019-01-07 08:41:49', '2019-01-07 08:42:09'),
(16, 'Mad', 'mad@jurudapur.com', NULL, '$2y$10$qz/7VOfSmPn1O9fYaNHUhOw8XRaV6D0X4nhILVR.HdGMAib/VBnTq', NULL, NULL, NULL, NULL, 'VYcoBsYenXac9oe1t6srXjAvKnLmglvJwMqRSYTmRSUmcYXiih6z6bPxJzE9', '2019-01-07 19:05:47', '2019-01-07 19:05:47'),
(37, 'ACR', 'afd@ju.com', NULL, '$2y$10$PUo1PfOUnOdbU/2v3YrmQOzTQLGoNBjXaMDoFdBuhX8Y1sB4/1xRC', NULL, NULL, NULL, NULL, NULL, '2019-01-09 06:50:57', '2019-01-09 06:50:57'),
(38, 'Juru', 'juru@jurudapur.com', NULL, '$2y$10$MFci8oxObmBBFcl3RlqnVeOoIQyjHYqj5I3ZqIHa9gyt.ksxKEA9.', NULL, NULL, NULL, NULL, 'X67PJDJk4ApDnpB8H0q5RsL03eE8HTv8MRPQHkGbYgsyDYbNhHzfqRNZVSql', '2019-01-09 16:27:05', '2019-01-09 16:27:05'),
(40, 'Halo', 'achmadchoirurroziqin@jurudapurl.com', NULL, '$2y$10$dBcy3.q8HgCKeQI8u0j8AeQ6S2bsErl0Ne//RlQ3Izat8gR2yOfm2', NULL, NULL, NULL, NULL, NULL, '2019-01-09 16:56:42', '2019-01-09 16:56:42'),
(41, 'Danang', 'achmadchoirurroziqin@gmail.com', NULL, '$2y$10$iNlBznf6DCa4w6fTFnhBjeUPMR82rzCaBllETeQufUMq45YKaBouu', NULL, NULL, NULL, NULL, NULL, '2019-01-10 09:59:06', '2019-01-10 09:59:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dapur`
--
ALTER TABLE `dapur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `isi`
--
ALTER TABLE `isi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `isi_makanan`
--
ALTER TABLE `isi_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dapur` (`id_dapur`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dapur` (`id_dapur`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dapur` (`id_dapur`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tambahan`
--
ALTER TABLE `tambahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dapur` (`id_dapur`);

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
-- AUTO_INCREMENT untuk tabel `dapur`
--
ALTER TABLE `dapur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `isi`
--
ALTER TABLE `isi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `isi_makanan`
--
ALTER TABLE `isi_makanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kue`
--
ALTER TABLE `kue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tambahan`
--
ALTER TABLE `tambahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kue`
--
ALTER TABLE `kue`
  ADD CONSTRAINT `kue_ibfk_1` FOREIGN KEY (`id_dapur`) REFERENCES `dapur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`id_dapur`) REFERENCES `dapur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `minuman_ibfk_1` FOREIGN KEY (`id_dapur`) REFERENCES `dapur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tambahan`
--
ALTER TABLE `tambahan`
  ADD CONSTRAINT `tambahan_ibfk_1` FOREIGN KEY (`id_dapur`) REFERENCES `dapur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
