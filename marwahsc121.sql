-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2024 pada 12.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marwahsc121`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `atlet`
--

CREATE TABLE `atlet` (
  `id_atlet` int(3) NOT NULL,
  `nama_atlet` varchar(32) NOT NULL,
  `umur` int(2) NOT NULL,
  `email` text NOT NULL,
  `kelas` text NOT NULL,
  `nation` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `atlet`
--

INSERT INTO `atlet` (`id_atlet`, `nama_atlet`, `umur`, `email`, `kelas`, `nation`) VALUES
(1, 'Fachrurrazi', 20, 'silverzzenn@gmail.com', 'Air Rifle Match', 'Aceh'),
(2, 'Cowo Sop Sepongken', 500, 'ilhamdigits@gmail.com', 'Air Pistol', 'Batam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(101, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `atlet`
--
ALTER TABLE `atlet`
  ADD PRIMARY KEY (`id_atlet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
