-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2021 pada 12.46
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kereta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `tgl_sampai` datetime NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kereta`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_sampai`, `kelas`, `harga`, `status`) VALUES
(1, 'EXPRESS 110', 4, 1, '2021-01-04 17:39:00', '2021-01-05 17:39:00', 'EKSEKUTIF', '300000', 0),
(2, 'EXPRESS', 1, 4, '2021-01-05 18:58:00', '2021-01-06 18:58:00', 'EKONOMI', '350000', 0),
(3, 'KRL', 5, 6, '2021-01-28 06:33:00', '2021-01-28 08:35:00', 'EKSEKUTIF', '6000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kursi` int(11) NOT NULL,
  `bagian` varchar(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id`, `id_jadwal`, `kursi`, `bagian`, `status`) VALUES
(1, 3, 1, 'a', 0),
(2, 3, 2, 'a', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `no_pembayaran` varchar(255) NOT NULL,
  `no_tiket` varchar(100) NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_pembayaran`, `no_tiket`, `total_pembayaran`, `bukti`, `status`) VALUES
(1, 'AC2461', 'T001', '300000', NULL, 0),
(2, 'AC2462', 'T002', '350000', NULL, 0),
(3, 'AC2463', 'T003', '900000', NULL, 0),
(4, 'AC2464', 'T004', '900000', 'T_Dashbord_Admin.PNG', 2),
(5, 'AC2465', 'T005', '300000', 'webinar1.PNG', 2),
(6, 'AC2466', 'T006', '600000', 'webinar11.PNG', 2),
(7, 'AC2467', 'T007', '600000', 'webinar12.PNG', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `gerbong` int(11) DEFAULT NULL,
  `bagian` varchar(5) DEFAULT NULL,
  `kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`id`, `nomor_tiket`, `nama`, `no_identitas`, `gerbong`, `bagian`, `kursi`) VALUES
(1, 'T001', 'Akbar Fauzi', '2312414141312', NULL, NULL, NULL),
(2, 'T002', 'Dodoy', '2312414141312', NULL, NULL, NULL),
(3, 'T003', 'Akbar Fauzi', '2312414141312', 2, 'b', 19),
(4, 'T003', 'Ramandani', '32464645746', 1, 'a', 14),
(5, 'T003', 'Budi ', '56764744858', 1, 'a', 3),
(6, 'T004', 'Akbar Fauzi', '2312414141312', 1, 'a', 1),
(7, 'T004', 'Ramandani', '32464645746', 1, 'a', 2),
(8, 'T004', 'Budi ', '56764744858', 1, 'b', 3),
(9, 'T005', 'Akbar Fauzi', '2312414141312', 3, 'a', 21),
(10, 'T006', 'Rianti', '2312414141312', 2, 'a', 20),
(11, 'T006', 'Feri', '32464645746', 3, 'a', 10),
(12, 'T007', 'Akbar Fauzi', '2312414141312', 1, 'a', 8),
(13, 'T007', 'Ramandani', '32464645746', 3, 'a', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE `stasiun` (
  `id` int(11) NOT NULL,
  `nama_stasiun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id`, `nama_stasiun`) VALUES
(1, 'CIREBON'),
(4, 'SUMEDANG'),
(5, 'KARAWANG'),
(6, 'JAKARTA'),
(7, 'BANDUNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `nomor_tiket`, `tanggal`, `id_jadwal`, `nama_pemesan`, `email`, `no_telepon`, `alamat`) VALUES
(1, 'T001', '0000-00-00 00:00:00', 1, 'Akbar Fauzi', 'akbarfauzi14@gmail.com', '0892929292934', 'seroja'),
(2, 'T002', '2021-01-02 06:59:10', 2, 'dodoy', 'dodoy@gmail.com', '0828281141', 'makasar'),
(3, 'T003', '2021-01-03 04:57:17', 1, 'Akbar Fauzi', 'akbarfauzi14@gmail.com', '0892929292934', 'seroja'),
(4, 'T004', '2021-01-03 05:28:22', 1, 'Akbar Fauzi', 'akbarfauzi14@gmail.com', '0892929292934', 'seroja'),
(5, 'T005', '2021-01-03 05:58:56', 1, 'Akbar Fauzi', 'akbarfauzi14@gmail.com', '0892929292934', 'seroja'),
(6, 'T006', '2021-01-03 06:40:15', 1, 'Rianti', 'rianti@gmail.com', '0892929292934', 'jakarta'),
(7, 'T007', '2021-01-03 08:05:46', 1, 'Akbar Fauzi', 'akbarfauzi14@gmail.com', '0892929292934', 'Jln.Seroja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
