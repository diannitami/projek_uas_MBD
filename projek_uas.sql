-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 09.05
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `bayar_dp` decimal(10,0) NOT NULL,
  `id_user` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit_rumah`
--

CREATE TABLE `tbl_unit_rumah` (
  `id_unit` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `nomor_rumah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(0, 'didi', 'didi', 'dida'),
(1, 'Diaaan', 'dian', 'f97de4a9986d216a6e0fea62b0450da9');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `order` (`id_unit`),
  ADD KEY `orderr` (`id_user`),
  ADD KEY `orderrr` (`id_barang`);

--
-- Indeks untuk tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `order detail` (`id_order`);

--
-- Indeks untuk tabel `tbl_unit_rumah`
--
ALTER TABLE `tbl_unit_rumah`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `unit rumah` (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit_rumah` (`id_unit`),
  ADD CONSTRAINT `orderr` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  ADD CONSTRAINT `orderrr` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `order detail` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`);

--
-- Ketidakleluasaan untuk tabel `tbl_unit_rumah`
--
ALTER TABLE `tbl_unit_rumah`
  ADD CONSTRAINT `unit rumah` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
