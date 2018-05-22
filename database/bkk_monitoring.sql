-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 06:10 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkk_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(3) NOT NULL,
  `nama_modul` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `urutan` int(3) NOT NULL,
  `status` enum('admin','user') NOT NULL DEFAULT 'admin',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `urutan`, `status`, `aktif`) VALUES
(32, 'Data Mutasi', '?module=mutasi', 7, 'user', 'N'),
(27, 'Transaksi Aset', '?module=transaksiaset', 9, 'admin', 'N'),
(25, 'Laporan', '?module=laporan', 89, 'admin', 'Y'),
(24, 'Tanda Terima', '?module=tandaterima', 6, 'admin', 'N'),
(23, 'History Aset', '?module=history', 5, 'admin', 'N'),
(22, 'Data Karyawan', '?module=karyawan', 90, 'admin', 'N'),
(20, 'Manajeman Modul', '?module=modul', 1, 'admin', 'Y'),
(21, 'Data User', '?module=user', 2, 'user', 'Y'),
(19, 'Data Aset', '?module=aset', 3, 'user', 'N'),
(33, 'Tahun Ajaran', '?module=tahunajaran', 3, 'admin', 'Y'),
(34, 'Data Siswa', '?module=siswa', 4, 'user', 'Y'),
(35, 'Perusahaan', '?module=perusahaan', 12, 'user', 'Y'),
(36, 'Data Pembimbing', '?module=pembimbing', 91, 'user', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(5) NOT NULL,
  `nama_perusahaan` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(5) NOT NULL,
  `nama_tahun` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `nama_tahun`, `keterangan`, `aktif`) VALUES
(20182, 'Semester Genap 2018/2019', '2018/2019', 'Tidak'),
(20181, 'Semester Ganjil 2018/2019', '2018/2019', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_session` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@gmail.com', 'admin', 'N', 'h531ou9dadstcc9i4dl43ha8a4'),
('aman', 'bb620da4ab487ecd4c7691d36756d7d6', 'Aman Sentosa', 'sentosa@gmail.com', 'user', 'N', 'irbs6qetgkfmvj8ecqrdkgga61'),
('untung', 'c5a42d9667c760e1b7c064e25536e570', 'Untung Slamet', 'slamet@gmail.com', 'user', 'N', 'qplcg296j71ut5t0qjm7urlua1'),
('puji', 'f3bab21fe648634117ba2e1d70b09740', 'Puji Lestari', 'puji@yahoo.com', 'user', 'N', '3o8e5eqr5min7imshj7dsu7es1'),
('toni', 'beb6fde0ff21a3c1b2dc48e223c58f09', 'Toni Blangkon', 'toni@gmail.com', 'user', 'N', 'ub54p73n01esb320va3eeon0u4'),
('tyo', '202cb962ac59075b964b07152d234b70', 'tyo', 'herry081288@gmail.com', 'user', 'N', '75rp28cbrg63qmml0u752olhtu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20183;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
