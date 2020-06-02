-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2020 pada 15.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peramalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`) VALUES
(1, 'Kursi', 76),
(2, 'Sofa', 81),
(3, 'Kasur', 80),
(4, 'Meja', 89),
(5, 'Spring Bed', 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_barang`, `jumlah`) VALUES
(1, 1, 3),
(1, 2, 3),
(2, 4, 5),
(3, 3, 5),
(4, 3, 2),
(5, 1, 2),
(6, 5, 6),
(7, 3, 5),
(8, 2, 6),
(9, 2, 5),
(10, 1, 5),
(11, 1, 2),
(11, 2, 2),
(12, 2, 3),
(12, 1, 3),
(13, 5, 6),
(14, 1, 4),
(15, 4, 3),
(16, 1, 4),
(17, 3, 4),
(18, 5, 2),
(19, 1, 1),
(20, 3, 4),
(21, 4, 3),
(22, 5, 1);

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `addStok` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + OLD.jumlah WHERE id_barang = OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok-NEW.jumlah
 WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `hasil_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tahun`, `bulan`, `hasil_penjualan`) VALUES
(1, 2019, 1, 6),
(2, 2019, 3, 5),
(3, 2019, 2, 5),
(4, 2019, 5, 2),
(5, 2019, 5, 2),
(6, 2019, 4, 6),
(7, 2019, 6, 5),
(8, 2019, 7, 6),
(9, 2019, 8, 5),
(10, 2019, 9, 5),
(11, 2019, 10, 4),
(12, 2019, 11, 6),
(13, 2019, 12, 6),
(14, 2020, 1, 4),
(15, 2020, 2, 3),
(16, 2020, 3, 4),
(17, 2020, 4, 4),
(18, 2020, 5, 2),
(19, 2020, 6, 1),
(20, 2020, 7, 4),
(21, 2020, 8, 3),
(22, 2020, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `bulan` varchar(4) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `bulan`, `tahun`, `hasil`) VALUES
(9, '12', '2020', 1.8406926406926);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
