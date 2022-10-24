-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 01:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weightedproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `namaalternatif` varchar(50) NOT NULL,
  `nilairatarata` varchar(100) DEFAULT NULL,
  `Absensi` varchar(100) DEFAULT NULL,
  `AktifOrganisasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`namaalternatif`, `nilairatarata`, `Absensi`, `AktifOrganisasi`) VALUES
('Ferdy', '61-80', 'Jarang hadir', 'Aktif'),
('Hendry', '81-100', 'Selalu Hadir', 'Aktif'),
('Rivaldo', '81-100', 'Hadir', 'Sangat Aktif'),
('Udin', '81-100', 'Selalu Hadir', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kodekriteria` varchar(2) NOT NULL,
  `namakriteria` varchar(20) NOT NULL,
  `bobotkriteria` int(2) NOT NULL,
  `tipekriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kodekriteria`, `namakriteria`, `bobotkriteria`, `tipekriteria`) VALUES
('C1', 'nilai rata-rata', 5, 'benefit'),
('C2', 'Absensi', 4, 'benefit'),
('C3', 'Aktif Organisasi', 3, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `namasubkriteria` varchar(20) NOT NULL,
  `bobot` int(2) NOT NULL,
  `kodekriteria` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`namasubkriteria`, `bobot`, `kodekriteria`) VALUES
('1-20', 1, 'C1'),
('21-40', 2, 'C1'),
('41-60', 3, 'C1'),
('61-80', 4, 'C1'),
('81-100', 5, 'C1'),
('Selalu Hadir', 5, 'C2'),
('Hadir', 3, 'C2'),
('Jarang hadir', 1, 'C2'),
('Sangat Aktif', 5, 'C3'),
('Aktif', 3, 'C3'),
('Tidak Aktif', 1, 'C3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`namaalternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kodekriteria`),
  ADD KEY `tipekriteria` (`tipekriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD KEY `kodekriteria` (`kodekriteria`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kodekriteria`) REFERENCES `kriteria` (`kodekriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
