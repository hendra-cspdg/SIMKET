-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 03:14 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mongkia2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mitra_bps`
--

CREATE TABLE `mitra_bps` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mitra_bps`
--
ALTER TABLE `mitra_bps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mitra_bps`
--
ALTER TABLE `mitra_bps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `mitra_bps` ADD `kab_id` INT NOT NULL AFTER `updated_by`;
ALTER TABLE `mitra_bps` ADD `pendidikan` INT NULL AFTER `riwayat`;

ALTER TABLE `mitra_bps` ADD `foto` VARCHAR(255) NOT NULL AFTER `pendidikan`;
ALTER TABLE `pegawai` ADD `foto` VARCHAR(255) NOT NULL AFTER `updated_by`;

ALTER TABLE `pegawai` ADD `total_menjadi_mitra` INT NOT NULL DEFAULT '0' AFTER `foto`, ADD `nilai_menjadi_mitra` INT NOT NULL DEFAULT '0' AFTER `total_menjadi_mitra`;
ALTER TABLE `mitra_bps` ADD `total_menjadi_mitra` INT NOT NULL DEFAULT '0' AFTER `foto`, ADD `nilai_menjadi_mitra` INT NOT NULL DEFAULT '0' AFTER `total_menjadi_mitra`;

ALTER TABLE `pegawai` CHANGE `nilai_menjadi_mitra` `nilai_menjadi_mitra` FLOAT(11) NOT NULL DEFAULT '0';
ALTER TABLE `mitra_bps` CHANGE `nilai_menjadi_mitra` `nilai_menjadi_mitra` FLOAT(11) NOT NULL DEFAULT '0';