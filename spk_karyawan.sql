-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 10:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_karyawan`
--
CREATE DATABASE IF NOT EXISTS `spk_karyawan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spk_karyawan`;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `kd_cabang` varchar(5) NOT NULL,
  `nm_cabang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kd_cabang`, `nm_cabang`) VALUES
('C-001', 'Biro Usaha Khusus edited'),
('C-002', 'Biro Pemasaran dan Sumber Daya'),
('C-005', 'Biro lintas alam ghaib');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kd_karyawan` varchar(5) NOT NULL,
  `nm_karyawan` varchar(30) NOT NULL,
  `kd_cabang` varchar(5) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kd_karyawan`, `nm_karyawan`, `kd_cabang`, `alt`) VALUES
('123', 'Secretary', 'C-001', 'las vegas'),
('234', 'lazy girl', 'C-001', 'bandung'),
('345', 'Elon musk', 'C-002', 'amerika serikat'),
('567', 'Do everything', 'C-002', 'amerika serikat'),
('K-001', 'SKULL', 'C-005', 'HELL 666'),
('K-002', 'VIRUS', 'C-005', 'Microtic');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kd_kriteria` varchar(4) NOT NULL,
  `nm_kriteria` varchar(20) NOT NULL,
  `tipe` varchar(1) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `nm_kriteria`, `tipe`, `bobot`) VALUES
('k-01', 'Hasil Kerja', 'B', 30),
('k-02', 'Absensi Kehadiran', 'B', 25),
('k-03', 'Perilaku Kerja', 'B', 20),
('k-04', 'Efisiensi Kerja', 'B', 15),
('k-05', 'Waktu Kerja', 'C', 10);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `kd_karyawan` varchar(5) NOT NULL,
  `k_01` int(11) NOT NULL,
  `k_02` int(11) NOT NULL,
  `k_03` int(11) NOT NULL,
  `k_04` int(11) NOT NULL,
  `k_05` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`kd_karyawan`, `k_01`, `k_02`, `k_03`, `k_04`, `k_05`, `id_user`) VALUES
('123', 4, 3, 2, 1, 1, '1'),
('234', 5, 5, 5, 5, 4, '1'),
('345', 5, 4, 5, 3, 4, '1'),
('567', 5, 2, 3, 3, 3, '1'),
('K-001', 4, 2, 4, 4, 1, '2'),
('K-002', 5, 5, 3, 4, 5, '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `password`, `tipe`) VALUES
(1, 'Sandi M Irvan', '222222', 'A'),
(2, 'Gea', '123456', 'U'),
(3, 'skeleton', 'satusampaienam', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
 ADD PRIMARY KEY (`kd_cabang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
