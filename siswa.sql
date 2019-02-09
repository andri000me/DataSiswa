-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2018 pada 12.51
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(2, 'Dian F. Arif', 'dian', '911f6332e7f90b94b87f15377263995c'),
(170404, 'Iqbal Kurniawan', 'iqbal', 'ff9c63f843b11f9c3666fe46caaddea8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Jombang'),
(2, 'Malang'),
(3, 'Surabaya'),
(4, 'Blitar'),
(5, 'Jember'),
(6, 'Tuban'),
(7, 'Gresik'),
(8, 'Banyuwangi'),
(9, 'Kediri'),
(10, 'Mojokerto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajar`
--

CREATE TABLE `pelajar` (
  `NIS` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `kota_asal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajar`
--

INSERT INTO `pelajar` (`NIS`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `kota_asal`) VALUES
(90501, 'Iqbal K Perdana', '2001-05-09', 'Laki-laki', 'Laut Tawar', 2),
(92890, 'Ricky Platin', '2000-06-12', 'Laki-laki', 'Lidah Kulon', 3),
(101000, 'Muhammad Rasyad Bisma', '2000-10-10', 'Laki-laki', 'Sawojajar 2', 2),
(170400, 'Dian F. Arif', '2000-04-17', 'Laki-laki', 'Jl. Danau Laut Tawar IV G5A-2', 2),
(201100, 'Hapsari Anindhita Putri Mufidha', '2000-11-20', 'Perempuan', 'Edelweys', 1),
(270301, 'Mufadilla Dwi Mulyasari', '2001-03-27', 'Perempuan', 'Sawojajar', 3),
(310895, 'Aliyaturrosyida', '1995-08-31', 'Perempuan', 'Embong Malang', 3),
(980922, 'Akbar', '2018-04-05', 'Laki-laki', 'Cangar', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `kota_asal` (`kota_asal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170405;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `pelajar_ibfk_1` FOREIGN KEY (`kota_asal`) REFERENCES `kota` (`id_kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
