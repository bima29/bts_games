-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2024 pada 10.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bts_games`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`) VALUES
(1, 'contoh 1', 'Banner-1.png', 'contoh 1'),
(2, 'contoh 2', 'Banner-2.png', 'contoh 2'),
(3, 'contoh 3', 'Banner-3.png', 'contoh 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_code` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `games`
--

INSERT INTO `games` (`id`, `image`, `game_name`, `game_code`, `category`, `type`, `description`) VALUES
(1, '1734943264_Logo_FourtaDev.png', 'Game A', 'GA1200', 'Action', 'PC', 'Game dengan aksi cepat dan intens'),
(2, 'download_(2).jpeg', 'Game B', 'GB1200', 'Adventure', 'Mobile', 'Game dengan petualangan dan eksplorasi'),
(3, 'download_(3).jpeg', 'Game C', 'GC1500', 'Puzzle', 'PC', 'Game teka-teki yang menantang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `game_categories`
--

CREATE TABLE `game_categories` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` enum('PC','Mobile','Console') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `game_categories`
--

INSERT INTO `game_categories` (`id`, `nama_kategori`, `deskripsi`, `jenis`) VALUES
(1, 'Action', 'Game dengan aksi cepat dan intens', 'PC'),
(2, 'Adventure', 'Game dengan petualangan dan eksplorasi', 'Mobile'),
(3, 'Puzzle', 'Game teka-teki yang menantang', 'PC'),
(4, 'RPG', 'Game dengan elemen role-playing', 'Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_perdana`
--

CREATE TABLE `kartu_perdana` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `kode_item` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartu_perdana`
--

INSERT INTO `kartu_perdana` (`id`, `nama_item`, `kode_item`, `jenis`) VALUES
(2, 'Indosat Ooredoo', 'im3', 'Mobile'),
(4, 'Smartfren', 'sm', 'Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `gameid` varchar(50) NOT NULL,
  `game_code` varchar(50) NOT NULL,
  `game_name` varchar(100) NOT NULL,
  `topup_amount` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `ponsel` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `gameid`, `game_code`, `game_name`, `topup_amount`, `satuan`, `price`, `order_date`, `buyer_name`, `ponsel`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, '085608744330', 'i10', 'Game A', 1200, '', '50000.00', '2024-12-20', 'Renaldi Gionanda yulian', '', 'success', '2024-12-20 05:17:55', '2024-12-20 05:17:55'),
(16, 1, '085608744330', 'i10', 'Game A', 1200, '', '50000.00', '2024-12-20', 'Renaldi Gionanda yulian', '', 'success', '2024-12-20 07:16:45', '2024-12-20 07:16:45'),
(17, 1, '324234', 'i10', 'Game A', 1200, '', '50000.00', '2024-12-21', 'Renaldi Gionanda yulian', '', 'success', '2024-12-20 21:30:29', '2024-12-20 21:30:29'),
(18, 1, '085608744330', 'i10', 'Game A', 1200, '', '50000.00', '2024-12-21', 'Renaldi Gionanda yulian', '', 'success', '2024-12-20 21:34:11', '2024-12-20 21:34:11'),
(19, 1, '085608744330', 'i10', 'Game A', 1200, '', '50000.00', '2024-12-21', 'Renaldi Gionanda yulian', '', 'success', '2024-12-20 21:47:52', '2024-12-20 21:47:52'),
(28, 1, '08666656', 'sm25', 'Smartfren', 3, '', '26000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'pending', '2024-12-22 23:07:56', '2024-12-22 23:07:56'),
(30, 1, '08078097', 'sm25', 'Smartfren', 3, '', '26000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'success', '2024-12-22 23:29:24', '2024-12-22 23:29:24'),
(31, 1, '0863787837', 'sm25', 'Smartfren', 3, 'GB (30 Hari)', '26000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'success', '2024-12-23 01:03:52', '2024-12-23 01:03:52'),
(32, 1, '08666656', 'sm25', 'Smartfren', 3, 'GB (30 Hari)', '26000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'success', '2024-12-23 02:02:06', '2024-12-23 02:02:06'),
(33, 1, 'auwduwaud', 'i10', 'Game A', 13213, 'Diamond', '99999999.99', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'success', '2024-12-23 02:05:30', '2024-12-23 02:05:30'),
(34, 1, '08079707', 'i10', 'Game A', 1200, 'Diamond', '50000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'pending', '2024-12-23 02:13:24', '2024-12-23 02:13:24'),
(35, 1, '08079707', 'i10', 'Game A', 1200, 'Diamond', '50000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'pending', '2024-12-23 02:13:45', '2024-12-23 02:13:45'),
(36, 1, '090', 'i10', 'Game A', 1200, 'Diamond', '50000.00', '2024-12-23', 'Renaldi Gionanda yulian', '0863787837', 'pending', '2024-12-23 02:24:07', '2024-12-23 02:24:07'),
(37, 100, '085608744330', 'i10', 'Game C', 1000, 'Diamond', '25000.00', '2024-12-23', 'Ahmad', '085608744330', 'pending', '2024-12-23 02:39:47', '2024-12-23 02:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_gateway_config`
--

CREATE TABLE `payment_gateway_config` (
  `id` int(11) NOT NULL,
  `server_key` varchar(255) NOT NULL,
  `client_key` varchar(255) NOT NULL,
  `is_production` tinyint(1) NOT NULL,
  `is_sanitized` tinyint(1) NOT NULL,
  `is_3ds` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_gateway_config`
--

INSERT INTO `payment_gateway_config` (`id`, `server_key`, `client_key`, `is_production`, `is_sanitized`, `is_3ds`, `created_at`, `updated_at`) VALUES
(1, 'SB-Mid-server-zP5fpm0QXIclz94TP-gdE4Rn', 'SB-Mid-client-2f6BL5UtmrXFuSo6', 1, 1, 1, '2024-12-19 14:54:07', '2024-12-23 08:54:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `game_code` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `nominal` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `game_category` varchar(100) NOT NULL,
  `game_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `price_list`
--

INSERT INTO `price_list` (`id`, `product_name`, `product_code`, `game_code`, `price`, `nominal`, `unit`, `game_category`, `game_type`) VALUES
(1, 'Game A', 'i10', 'GA1200', '50000.00', 1200, 'Diamond', 'Action', 'PC'),
(2, 'Game B', 'i10', 'GB1200', '100000.00', 1200, 'Cash', 'Adventure', 'Mobile'),
(4, 'Game C', 'i10', 'GD1000', '25000.00', 1000, 'Diamond', 'RPG', 'Mobile'),
(8, 'Game A', 'i10', 'awd', '99999999.99', 13213, 'Diamond', 'Action', 'PC'),
(9, 'Game A', 'i10', 'Aspir', '14321215.00', 213213, 'Diamond', 'Action', 'PC'),
(10, 'Game A', 'asa', 'GA1200', '453543.00', 3453, 'Diamond', 'Action', 'PC'),
(11, 'Indosat Ooredoo', 'i30', 'im3', '30000.00', 3000, 'Pulsa', 'pulsa', 'Mobile'),
(12, 'Indosat Ooredoo', 'i30', 'im3', '30000.00', 5, 'GB (30 Hari)', 'paket_data', 'Mobile'),
(13, 'Indosat Ooredoo', 'i25', 'im3', '25000.00', 25000, 'Pulsa', 'pulsa', 'Mobile'),
(14, 'Smartfren', 'sm30', 'sm', '31000.00', 30000, 'Pulsa', 'pulsa', 'Mobile'),
(15, 'Smartfren', 'sm25', 'sm', '26000.00', 3, 'GB (30 Hari)', 'paket_data', 'Mobile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Memiliki akses penuh ke sistem	', '2024-12-12 17:07:53', '2024-12-12 17:07:53'),
(2, 2, 'pengurus', 'Memiliki akses untuk mengelola data tertentu	', '2024-12-12 17:07:53', '2024-12-12 17:07:53'),
(3, 3, 'user', 'Memiliki akses terbatas untuk penggunaan sistem', '2024-12-12 17:07:53', '2024-12-12 20:25:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `full_name`, `profile_picture`, `role_id`, `created_at`, `updated_at`, `login_at`) VALUES
(1, 'renaldi', 'renaldi123@gmail.com', '0863787837', '10c248a4d6e01b5ebaef47ac64bd822593e194cc', 'Renaldi Gionanda yulian', 'download.jpeg', 1, '2024-12-12 19:05:53', '2024-12-23 08:40:31', '2024-12-23 08:40:31'),
(8, 'user', 'user@user.com', '009808098', '12dea96fec20593566ab75692c9949596833adc9', 'User', 'default.jpg', 3, '2024-12-16 14:25:20', '2024-12-20 09:15:53', '2024-12-20 09:15:53'),
(100, '', '', '', '', '', '', 0, '2024-12-23 08:37:52', '2024-12-23 08:37:52', NULL);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `prevent_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Deletion of user data is not allowed';
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartu_perdana`
--
ALTER TABLE `kartu_perdana`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_item` (`kode_item`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `payment_gateway_config`
--
ALTER TABLE `payment_gateway_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kartu_perdana`
--
ALTER TABLE `kartu_perdana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `payment_gateway_config`
--
ALTER TABLE `payment_gateway_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
