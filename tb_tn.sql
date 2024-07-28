-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Jul 2024 pada 23.43
-- Versi server: 8.0.30
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_tn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` text COLLATE utf8mb4_general_ci NOT NULL,
  `harga_barang` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_input` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_barang`, `tgl_input`) VALUES
(27, 'Burger', '10000', '25 August 2022, 13:18'),
(28, 'Sosis Min0', '5000', '25 August 2022, 13:18'),
(29, 'Sosis Jumbo', '5000', '25 August 2022, 13:19'),
(30, 'Stick Daging Sapi', '20000', '25 August 2022, 13:19'),
(31, 'Bakso', '8000', '25 August 2022, 13:20'),
(32, 'asdfasd', '232', '27 June 2024, 12:54'),
(33, 'sdafasd', '23434', '27 June 2024, 12:56'),
(34, 'asdfasd', '3423', '27 June 2024, 12:57'),
(35, 'Sosis Jumbo', '3434343', '27 June 2024, 12:59'),
(44, 'fdasf', '2333', '28 June 2024, 20:07'),
(45, 'fdasf', '34444', '28 June 2024, 20:08'),
(46, 'sosis jumbo', '3333', '28 June 2024, 20:09'),
(47, 'sosis jumbo', '232333', '28 June 2024, 20:14'),
(48, '33423', '34343435', '28 June 2024, 20:17'),
(49, 'sdfasd', '345234', '28 June 2024, 20:17'),
(50, '3434', '232323', '28 June 2024, 20:18'),
(51, 'kodo', '232323', '28 June 2024, 20:18'),
(52, 'fdasf', '4545555', '28 June 2024, 20:19'),
(53, '432423', '34355', '28 June 2024, 20:20'),
(55, 'fdasf', '354545', '28 June 2024, 20:22'),
(56, 'Sosis Jumbo', '34343', '28 June 2024, 20:23'),
(57, 'fdasf', '2333', '28 June 2024, 20:24'),
(58, 'sadfasd4', '444', '28 June 2024, 20:24'),
(59, 'Sosis Jumbo', '3444', '28 June 2024, 20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int NOT NULL,
  `nama_cabang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
(1, 'Limboto'),
(2, 'Telaga Biru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_cart` int NOT NULL,
  `id_cabang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` text COLLATE utf8mb4_general_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_input` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_transaksi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bayar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kembalian` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_cart`, `id_cabang`, `nama_barang`, `harga_barang`, `quantity`, `subtotal`, `tgl_input`, `no_transaksi`, `bayar`, `kembalian`) VALUES
(104, '2', 'Burger', '10000', '4', '40000', '28 June 2024', 'TN280620242113', '49999', '9999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporanku`
--

CREATE TABLE `laporanku` (
  `id_cart` int NOT NULL,
  `id_cabang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` text COLLATE utf8mb4_general_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_input` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_transaksi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bayar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kembalian` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporanku`
--

INSERT INTO `laporanku` (`id_cart`, `id_cabang`, `nama_barang`, `harga_barang`, `quantity`, `subtotal`, `tgl_input`, `no_transaksi`, `bayar`, `kembalian`) VALUES
(91, 'BRG001', 'Burger', '10000', '2', '20000', '25 August 2022', 'AD250820221322', '30000', '2000'),
(92, 'BRG005', 'Bakso', '8000', '1', '8000', '25 August 2022', 'AD250820221322', '30000', '2000'),
(94, 'BRG005', 'Bakso', '8000', '1', '8000', '25 August 2022', 'AD250820221326', '50000', '2000'),
(95, 'BRG004', 'Stick Daging Sapi', '20000', '2', '40000', '25 August 2022', 'AD250820221326', '50000', '2000'),
(96, 'BRG002', 'Sosis Mini', '2000', '5', '10000', '25 August 2022', 'AD250820221327', '30000', '0'),
(97, 'BRG001', 'Burger', '10000', '2', '20000', '25 August 2022', 'AD250820221327', '30000', '0'),
(98, '', 'Sosis Jumbo', '5000', '4', '20000', '27 June 2024', 'TN270620241136', '400000', '380000'),
(99, '2', 'Burger', '10000', '2', '20000', '27 June 2024', 'TN270620241247', '50000', '30000'),
(100, '2', 'Burger', '10000', '2', '20000', '28 June 2024', 'TN280620242042', '400000', '350000'),
(101, '2', 'Burger', '10000', '1', '10000', '28 June 2024', 'TN280620242042', '400000', '350000'),
(102, '2', 'Burger', '10000', '2', '20000', '28 June 2024', 'TN280620242042', '400000', '350000'),
(103, '2', 'Burger', '10000', '1', '10000', '28 June 2024', 'TN280620242042', '35555', '25555');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `cabang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `email`, `password`, `alamat`, `no_telp`, `status`, `cabang`) VALUES
(2, 'arya saleh', 'aryasaleh@gmail.com', '$2y$10$9NvS3uCbbY1Fq8uaZQ3./uGrAA4LP/KHIr6htzOz4V7kStxFC7.Ia', 'jalan gnung pani', '082122530944', 'pegawai', '2'),
(3, 'wahyu', 'wahyu@gmail.com', '$2y$10$S9ROBw0t2X30rQytoUQC8O49LJBB3t8d20MGhfZ253hShONlXO0MO', 'sadfasdfasd', '0343943943', 'admin', ''),
(4, 'aldo', 'aldo@gmail.com', '$2y$10$15IEB1wL2fINmhl4/Mbb/urT0rIGiu341G80pSqKX7IVOLfBCWxpi', 'limboto', '082122530944', 'pegawai', '1'),
(5, 'arif saleh', 'arifsaleh@gmail.com', '$2y$10$VWrfWUnw4RLblgerdcBWVO0gCb.92o5tRr7JIs996K7LhYR2s7bsm', 'jalan gunung pani', '08343452523', 'pegawai', '2'),
(6, 'bayu', 'bayu@gmail.com', '$2y$10$557pKYi0HdA9f0V9l2KUEO334k0uiat5pqHGRT7T/OCk.gkNLzDla', 'bayu', '0909', 'pegawai', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `laporanku`
--
ALTER TABLE `laporanku`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `laporanku`
--
ALTER TABLE `laporanku`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
