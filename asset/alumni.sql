-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 01:37 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`Nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
