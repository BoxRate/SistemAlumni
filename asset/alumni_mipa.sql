-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 06:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_mipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `Nim` varchar(14) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Tahun_Masuk` int(5) NOT NULL,
  `Tahun_Keluar` int(5) NOT NULL,
  `Tempat_Lahir` varchar(40) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `No_Telepon` varchar(15) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Pekerjaan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Nim`, `Nama`, `Tahun_Masuk`, `Tahun_Keluar`, `Tempat_Lahir`, `Tanggal_Lahir`, `Alamat`, `No_Telepon`, `Email`, `Pekerjaan`) VALUES
('1208107010018', 'Rijalul Muna', 2012, 2016, 'Banda Aceh', '2020-01-16', 'Komp Permata Lamyong, Banda Aceh', '08236718991', 'muna@gmail.com', 'Asus Data Analysis'),
('1508107010017', 'Mina Goroshi', 2015, 2019, 'Tamiyang', '1997-01-02', 'Dimana Aja', '08236718991', 'minamina@gmail.com', 'IT Telkom');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(14) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Password`, `Email`) VALUES
('1608107010018', 'Andika Pratama', 'e5a85482d8b9bedbd68c39cb22aea751', 'apratama918@gmail.com'),
('1708107010018', 'Prinanda Rahmatullah', '74b87337454200d4d33f80c4663dc5e5', 'apratama918@gmail.com'),
('1708107010034', 'Budi Gunawan', 'b0baee9d279d34fa1dfd71aadb908c3f', 'apratama918@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `r_pendidikan`
--

CREATE TABLE `r_pendidikan` (
  `Id_pendidikan` int(11) NOT NULL,
  `Nim` varchar(14) NOT NULL,
  `Tahun_Masuk` int(5) NOT NULL,
  `Tahun_Keluar` int(5) NOT NULL,
  `Nama_Instansi` varchar(250) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_penghargaan`
--

CREATE TABLE `r_penghargaan` (
  `Id_Penghargaan` int(11) NOT NULL,
  `Nim` varchar(14) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `Tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  ADD PRIMARY KEY (`Id_pendidikan`);

--
-- Indexes for table `r_penghargaan`
--
ALTER TABLE `r_penghargaan`
  ADD PRIMARY KEY (`Id_Penghargaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  MODIFY `Id_pendidikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_penghargaan`
--
ALTER TABLE `r_penghargaan`
  MODIFY `Id_Penghargaan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
