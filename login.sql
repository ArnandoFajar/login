-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2022 pada 06.04
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrower`
--

CREATE TABLE `borrower` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(6) NOT NULL,
  `usia` int(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tgl_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `borrower`
--

INSERT INTO `borrower` (`id_user`, `nama_user`, `tgl_lahir`, `jk`, `usia`, `agama`, `tgl_registrasi`) VALUES
(365, 'WINDA RISKI ', '1990-01-12', 'Wanita', 28, 'Islam', '2019-09-16'),
(366, 'BAYU KESUMA', '1990-12-01', 'Pria', 28, 'Islam', '2019-09-16'),
(367, 'MAISAROH', '0000-00-00', '', 0, '', '2019-09-17'),
(368, 'MASRIFAH', '1966-06-13', 'Wanita', 53, 'Islam', '2019-09-17'),
(369, 'BU ATUN', '1956-11-10', 'Wanita', 63, 'Islam', '2019-09-17'),
(370, 'NISA', '1983-01-07', 'Wanita', 0, 'Islam', '2019-09-17'),
(371, 'SUBADI', '1981-05-12', 'Pria', 38, 'Islam', '2019-09-17'),
(372, 'LILI AINI', '1986-03-15', 'Wanita', 33, 'Islam', '2019-09-17'),
(373, 'SOBRI PUTRA', '1988-11-11', 'Pria', 30, 'Islam', '2019-09-17'),
(374, 'YULIA', '1985-07-29', 'Wanita', 34, 'Islam', '2019-09-17'),
(375, 'DEWI SARTIKA ', '1985-01-22', 'Wanita', 34, 'Islam', '2019-09-17'),
(376, 'DINA MARISSA', '1992-09-01', 'Wanita', 27, 'Islam', '2019-09-17'),
(377, 'ELYANA', '1979-03-10', 'Wanita', 40, 'Islam', '2019-09-17'),
(378, 'ERSIMAYANI', '1975-07-20', 'Wanita', 44, 'Islam', '2019-09-17'),
(379, 'ZANARIYAH', '1971-04-02', 'Wanita', 48, 'Islam', '2019-09-17'),
(380, 'FITRIA', '1984-05-11', 'Wanita', 35, 'Islam', '2019-09-17'),
(381, 'RUSMAN R', '1960-01-22', 'Pria', 59, 'Islam', '2019-09-17'),
(382, 'RISA HARTATI', '1983-10-30', 'Wanita', 35, 'Islam', '2019-09-17'),
(383, 'DELIAWATI', '1975-12-28', 'Wanita', 43, 'Islam', '2019-09-17'),
(384, 'NENG DAHLIA', '1990-04-03', 'Wanita', 29, 'Islam', '2019-09-17'),
(385, 'DITA YANI ', '1995-01-20', 'Wanita', 24, 'Islam', '2019-09-17'),
(386, 'FITRI YANI', '1978-04-10', 'Wanita', 41, 'Islam', '2019-09-17'),
(387, 'TRIASTUTI', '1979-01-05', 'Wanita', 40, 'Islam', '2019-09-17'),
(388, 'UMI YANTI', '1964-06-15', 'Wanita', 55, 'Islam', '2019-09-17'),
(389, 'AGUS PUTRA JAYA', '1989-08-16', 'Pria', 30, 'Islam', '2019-09-17'),
(390, 'YUDHISTIRA', '1986-06-12', 'Pria', 33, 'Islam', '2019-09-17'),
(391, 'PUTRI MURTI', '1991-06-04', 'Wanita', 28, 'Islam', '2019-09-17'),
(392, 'KRISSTANTI', '1982-10-12', 'Wanita', 36, 'Islam', '2019-09-17'),
(393, 'FUJI ANGGANI', '1987-06-27', 'Wanita', 32, 'Islam', '2019-09-17'),
(394, 'RINA AGUSTINA', '1986-08-16', 'Wanita', 33, 'Islam', '2019-09-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `aktif`) VALUES
(1, 'arnando', 'arnando@gmail.com', 'arnando', 'Y'),
(2, 'arnando', 'arnando@gmail.com', 'arnando', 'Y'),
(3, 'arnando', 'arnando@gmail.com', 'arnando', 'Y'),
(4, 'arnando1', 'arnando1@gmail.com', '123456', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
