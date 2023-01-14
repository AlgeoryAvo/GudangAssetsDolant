-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2022 pada 11.13
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolant_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(255) NOT NULL,
  `nama_kegiatan` varchar(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `nama_pegawai` varchar(250) NOT NULL,
  `tanggal_input` date NOT NULL,
  `kfoto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `kategori`, `lokasi`, `nama_pegawai`, `tanggal_input`, `kfoto`) VALUES
(1, 'Jamal', 'Jamal Laeli', 'C:\\xampp\\htdocs\\DOLANT_LAST', '', '2022-04-20', 'www.jpeg'),
(2, 'Nah', 'Jamal Laeli', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core', '', '2022-04-22', 'WhatsApp_Image_2022-04-27_at_8_45_57_PM.jpeg'),
(3, 'Budddd', 'KisahKU', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core', 'Rasmono', '2022-04-22', 'WhatsApp_Image_2022-04-27_at_8_45_26_PM2.jpeg'),
(7, 'GE', 'Jamal Laeli', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core	', 'Rasmono', '2022-04-22', 'transaksi.png'),
(13, 'FEFEFE', 'Desa Hantu', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core	', 'Sutarman', '2022-04-28', 'transfer1.jpg'),
(22, 'DESA', 'Desa Hantu', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core	', 'Bambang', '2022-05-09', 'transfer.jpg'),
(40, 'REMA', 'Jamal Laeli Remaja', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core	', 'Alge', '2022-11-17', ''),
(46, 'hantu', 'Desa Hantu', 'C:\\xampp\\htdocs\\DOLANT_LAST\\application\\core', '', '2022-11-05', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `jabatan_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `password_pengguna` varchar(250) NOT NULL,
  `pengguna_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `jabatan_pengguna`, `username_pengguna`, `password_pengguna`, `pengguna_status`) VALUES
(1, 'Satria', 'Operator', 'satria', 'satria123', 'Aktif'),
(2, 'Kamui', 'Atasan', 'kamui', 'kamui123', 'Aktif'),
(3, 'Alge', 'Pegawai', 'muna', 'muna123', 'Aktif'),
(4, 'Dima', 'Pegawai', 'dima', 'dima123', 'Aktif'),
(21, 'Garin', 'Pegawai', 'garin', 'garin', 'Aktif'),
(41, 'Bagas', 'Operator', 'bagas', 'bagas', 'Aktif'),
(44, 'Algeori', 'Operator', 'alge', 'alge', 'Aktif'),
(45, 'admin', 'Operator', 'admin', 'admin', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
