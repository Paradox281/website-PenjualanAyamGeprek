-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2024 pada 11.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geprek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `user`, `order_date`, `total`) VALUES
('667de6ceca562', 'kentaaa@gmail.com', '2024-06-27 22:25:18', 13000.00),
('667de8ae28622', 'kentaaa@gmail.com', '2024-06-27 22:33:18', 13000.00),
('667de937e909b', 'kentaaa@gmail.com', '2024-06-27 22:35:35', 13000.00),
('667de9d2e1e97', 'kentaaa@gmail.com', '2024-06-27 22:38:10', 13000.00),
('667dea5c5a5b5', 'kentaaa@gmail.com', '2024-06-27 22:40:28', 13000.00),
('667dea8a805cf', 'kentaaa@gmail.com', '2024-06-27 22:41:14', 13000.00),
('667deaa847b0e', 'kentaaa@gmail.com', '2024-06-27 22:41:44', 13000.00),
('667deab5eb9e1', 'kentaaa@gmail.com', '2024-06-27 22:41:57', 13000.00),
('667dead710e32', 'kentaaa@gmail.com', '2024-06-27 22:42:31', 13000.00),
('667deb827c35d', 'kentaaa@gmail.com', '2024-06-27 22:45:22', 13000.00),
('667debd539e60', 'kentaaa@gmail.com', '2024-06-27 22:46:45', 10000.00),
('667dec496ca21', 'kentaaa@gmail.com', '2024-06-27 22:48:41', 13000.00),
('667dec63b51a9', 'kentaaa@gmail.com', '2024-06-27 22:49:07', 10000.00),
('667decac3912a', 'kentaaa@gmail.com', '2024-06-27 22:50:20', 20000.00),
('667dee07400f6', 'kentaaa@gmail.com', '2024-06-27 22:56:07', 20000.00),
('667df03893bad', 'kentaaa@gmail.com', '2024-06-27 23:05:28', 30000.00),
('667e20aaf38fd', 'kentaaa@gmail.com', '2024-06-28 02:32:10', 13000.00),
('667e5ef059026', 'kentaaa@gmail.com', '2024-06-28 06:57:52', 58000.00),
('667e617e9643c', 'kentaaa@gmail.com', '2024-06-28 07:08:46', 10000.00),
('667e7645041de', 'kentaaa@gmail.com', '2024-06-28 08:37:25', 28000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_belakang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_depan`, `nama_belakang`, `alamat`, `no_telp`, `email`, `password`, `level`) VALUES
(1, 'Kharisma', 'Tio', 'Payakumbuh', '083892103', 'kharismatio@gmail.com', '123456', 'admin'),
(3, 'Kenta', 'kenta', 'Payakumbuh', '08583892128', 'kentaaa@gmail.com', '123456', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `order_id`, `kode_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `jumlah`, `total`, `tanggal`, `email`) VALUES
(17, '667e20aaf38fd', 'T3001', 'Ayam Geprek Terasi', 'Ayam Geprek + Terasi', 13000, 1, 13000, '2024-06-28 02:32:11', 'kentaaa@gmail.com'),
(18, '667e5ef059026', 'T3002', 'Ayam Geprek Original', 'Ayam Geprek + Nasi', 10000, 1, 10000, '2024-06-28 06:57:52', 'kentaaa@gmail.com'),
(19, '667e5ef059026', 'T3003', 'Ayam Geprek Mozarella', 'Ayam Geprek Mozarella + Nasi', 20000, 1, 20000, '2024-06-28 06:57:52', 'kentaaa@gmail.com'),
(20, '667e5ef059026', 'T3001', 'Ayam Geprek Terasi', 'Ayam Geprek + Terasi', 13000, 1, 13000, '2024-06-28 06:57:52', 'kentaaa@gmail.com'),
(21, '667e5ef059026', 'T3304', 'Ayam Geprek Sambal Bawang', 'Ayam Geprek Sambal Bawang + Nasi', 15000, 1, 15000, '2024-06-28 06:57:52', 'kentaaa@gmail.com'),
(22, '667e617e9643c', 'T3002', 'Ayam Geprek Original', 'Ayam Geprek + Nasi', 10000, 1, 10000, '2024-06-28 07:08:46', 'kentaaa@gmail.com'),
(23, '667e7645041de', 'T3304', 'Ayam Geprek Sambal Bawang', 'Ayam Geprek Sambal Bawang + Nasi', 15000, 1, 15000, '2024-06-28 08:37:25', 'kentaaa@gmail.com'),
(24, '667e7645041de', 'T3001', 'Ayam Geprek Terasi', 'Ayam Geprek + Terasi', 13000, 1, 13000, '2024-06-28 08:37:25', 'kentaaa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_produk` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi_produk` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_img_name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `kode_produk`, `nama_produk`, `deskripsi_produk`, `product_img_name`, `qty`, `harga`) VALUES
(6, 'T3001', 'Ayam Geprek Terasi', 'Ayam Geprek + Terasi', 'terasi.jpg', 27, 13000.00),
(7, 'T3002', 'Ayam Geprek Original', 'Ayam Geprek + Nasi', 'images.jpg', 28, 10000.00),
(8, 'T3003', 'Ayam Geprek Mozarella', 'Ayam Geprek Mozarella + Nasi', 'images (1).jpg', 29, 20000.00),
(9, 'T3304', 'Ayam Geprek Sambal Bawang', 'Ayam Geprek Sambal Bawang + Nasi', 'images (2).jpg', 23, 15000.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
