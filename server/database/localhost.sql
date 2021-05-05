-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 10.09
-- Versi server: 5.6.38
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting_hima`
--
CREATE DATABASE IF NOT EXISTS `evoting_hima` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `evoting_hima`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jadwal`
--

CREATE TABLE `tabel_jadwal` (
  `id` int(11) NOT NULL,
  `sesi_mulai` varchar(20) NOT NULL,
  `sesi_akhir` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tabel_jadwal`
--

INSERT INTO `tabel_jadwal` (`id`, `sesi_mulai`, `sesi_akhir`) VALUES
(2, '2021-05-05 15:26', '2021-05-05 18:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_paslon`
--

CREATE TABLE `tabel_paslon` (
  `id` int(11) NOT NULL,
  `no_paslon` char(2) NOT NULL,
  `calon_ketum` varchar(50) NOT NULL,
  `calon_waketum` varchar(50) NOT NULL,
  `foto_ketum` varchar(30) NOT NULL,
  `foto_waketum` varchar(30) NOT NULL,
  `jumlah_vote` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tabel_paslon`
--

INSERT INTO `tabel_paslon` (`id`, `no_paslon`, `calon_ketum`, `calon_waketum`, `foto_ketum`, `foto_waketum`, `jumlah_vote`) VALUES
(1, '01', 'Julia Lestari Syahisti', 'Ahmad Naufal', 'paslon.jpg', 'paslon.jpg', '22'),
(2, '02', 'Effendi Syaifullah', 'Alpia', 'paslon.jpg', 'paslon.jpg', '11'),
(3, '03', 'Raudatul Zannah', 'Rahmadi', 'paslon.jpg', 'paslon.jpg', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pemilih`
--

CREATE TABLE `tabel_pemilih` (
  `id` int(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` char(4) NOT NULL,
  `status_vote` varchar(5) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tabel_pemilih`
--

INSERT INTO `tabel_pemilih` (`id`, `username`, `password`, `status_vote`, `fullname`, `job`) VALUES
(1, '20302022', '2022', 'true', 'Oka Rajeb Abdillah', 'Mahasiswa'),
(2, '20302018', '2018', 'true', 'Fitriana', 'Mahasiswa'),
(3, '2030405060', '5060', 'true', 'Abdullah Ardi', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_paslon`
--
ALTER TABLE `tabel_paslon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_pemilih`
--
ALTER TABLE `tabel_pemilih`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_paslon`
--
ALTER TABLE `tabel_paslon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_pemilih`
--
ALTER TABLE `tabel_pemilih`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `hima_ti_admin`
--
CREATE DATABASE IF NOT EXISTS `hima_ti_admin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hima_ti_admin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` char(30) NOT NULL,
  `password` char(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'himati_2021');
--
-- Database: `phpdasar`
--
CREATE DATABASE IF NOT EXISTS `phpdasar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpdasar`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` char(8) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `prodi`) VALUES
(1, 'OKA RAJEB ABDILLAH', '20302020', 'TI'),
(26, 'RICKO FEBRIANTO', '20302044', 'BTP');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
