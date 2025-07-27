-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 27. 07 2025 kl. 13:26:43
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusdigitaldb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` enum('tersedia','dipinjam') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `tahun`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Buku Masakan Sushi', 'Tri Yana Putra', 2020, 'Buku yang sangat menginspirasi anda untuk memasak Sushi', '1753095004_c7d61f74d81f5a7fc4e7.jpg', '2025-07-19 11:45:02', '2025-07-21 10:50:04', 'tersedia'),
(2, 'Buku tentang Coklat ', 'Nini Carlina', 2023, 'Buku membahas coklat yang enak dan sangat variasi', '1753094904_ce7c019e8868588a77a1.jpg', '2025-07-19 11:48:16', '2025-07-21 10:48:24', 'tersedia'),
(3, 'Buku Memasak Kue Tradisional', 'Rio De Jenero', 2019, 'Buku yang membantu anda memasak kue sendiri', '1753094828_484f3babb7c92777d304.jpg', '2025-07-19 14:27:20', '2025-07-21 10:47:08', 'tersedia'),
(4, 'Membuat Cake', 'Denny Darko', 2021, 'Buku yang berisi tentang cake Indonesia dan negara lain', '1752938555_14657dbf767179ea30f9.jpg', '2025-07-19 15:22:35', '2025-07-19 15:32:02', 'tersedia'),
(5, 'Memasak ayam', 'Sri Rahayu', 2023, 'Buku memasak berbagai masakan ayam yang enak', '1753614258_951c2fefc659c649485e.png', '2025-07-19 15:36:46', '2025-07-27 11:04:18', 'tersedia'),
(6, 'Buku Kue Tradisional', 'Andreas Marcel', 2018, 'Buku ini merupakan cara pembuatan kue kue Tradisional', '1752939635_8d9690017a5d94396098.jpg', '2025-07-19 15:40:35', '2025-07-19 15:40:35', 'tersedia'),
(7, 'Buku memasak Sushi', 'Lady Gaga', 2024, 'Buku ini tentang cara membuat Sushi', '1752939750_6f972e27cf0a56b601d1.jpg', '2025-07-19 15:42:30', '2025-07-19 15:42:30', 'tersedia'),
(8, 'Buku Dekorasi Kue', 'Murniyati Haugsted', 2025, 'Buku mengenai dekorasi kue yang sangat berguna', '1752939842_7bc27924a193167b705d.jpg', '2025-07-19 15:44:02', '2025-07-19 15:44:02', 'tersedia'),
(9, 'Buku Memasak Sate', 'Maya Rumantir', 1999, 'Buku yang membantu anda untuk membuat sate sendiri dirumah', '1752939920_499a085eab7d13c343b6.png', '2025-07-19 15:45:20', '2025-07-19 15:45:20', 'tersedia'),
(10, 'Buku Membuat Gulai', 'Desy Ratnasari', 2020, 'Buku tentang cara membuat gulai', '1752940024_8891e3a6f97dd082d9b1.png', '2025-07-19 15:47:04', '2025-07-19 15:47:04', 'tersedia'),
(11, 'Buku Masakan Nasi Kuning', 'Kaj Nielsen', 2021, 'Buku tetang memasak nasi kuning', '1752940121_01bdf8206392713200c5.png', '2025-07-19 15:48:41', '2025-07-19 15:48:41', 'tersedia'),
(12, 'Buku Memasak Kue', 'Sarah Sechan', 2021, 'Buku tentang membuat kue kue enak', '1752940207_18b5adfa57cb966d3ab1.jpg', '2025-07-19 15:50:07', '2025-07-19 15:50:07', 'tersedia'),
(13, 'Buku mengolah memasak ', 'Sisca Sisca', 2020, 'Buku mengolah masakan yang nikmat', '1752944063_4e62aa8ae82ff2eb871f.jpg', '2025-07-19 15:51:29', '2025-07-19 16:54:23', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `lama_hari` int(11) DEFAULT NULL,
  `biaya_per_hari` decimal(10,2) DEFAULT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user_id`, `buku_id`, `jumlah`, `lama_hari`, `biaya_per_hari`, `total_biaya`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 5, 11, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(2, 5, 5, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(3, 5, 1, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(4, 5, 1, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(5, NULL, 10, 1, 3, 5000.00, 15000.00, '2025-07-21', NULL, 'dipinjam'),
(6, 5, 10, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(7, 5, 5, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(8, 5, 14, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(9, 5, 8, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(10, 5, 7, NULL, NULL, NULL, NULL, '2025-07-21', NULL, 'dipinjam'),
(11, 5, 9, NULL, NULL, NULL, NULL, '2025-07-27', NULL, 'dipinjam'),
(12, 5, 12, NULL, NULL, NULL, NULL, '2025-07-27', NULL, 'dipinjam'),
(13, 5, 13, NULL, NULL, NULL, NULL, '2025-07-27', NULL, 'dipinjam');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(5, 'user1', '$2y$10$NIrksAQn6sFIkZMAyDNM9OH61j5RvcYOpHPdJ2PID1Thk4VZx9qrK', 'user'),
(7, 'admin', '$2y$10$HsvlvrQwfaFUQEHaberyMOWZIKOx8udL9BBLT6ldQArdAAYntUFvS', 'admin');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tilføj AUTO_INCREMENT i tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
