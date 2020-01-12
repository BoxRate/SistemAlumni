-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 03:33 PM
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
  `Password` varchar(250) NOT NULL,
  `Jenis_Kelamin` varchar(11) NOT NULL,
  `Jurusan` varchar(250) NOT NULL,
  `Tahun_Masuk` int(5) NOT NULL,
  `Tahun_Keluar` int(5) NOT NULL,
  `Tempat_Lahir` varchar(40) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `No_Telepon` varchar(15) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Pekerjaan` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Nim`, `Nama`, `Password`, `Jenis_Kelamin`, `Jurusan`, `Tahun_Masuk`, `Tahun_Keluar`, `Tempat_Lahir`, `Tanggal_Lahir`, `Alamat`, `No_Telepon`, `Email`, `Pekerjaan`, `role`, `image`) VALUES
('1208107010018', 'Rijalul Muna', 'e5a85482d8b9bedbd68c39cb22aea751', 'L', 'Informatika', 2012, 2016, 'Banda Aceh', '1998-10-10', 'Komp Permata Lamyong, Banda Aceh', '08236718991', 'muna@gmail.com', 'Teknologi Informasi', 'Alumni', 'ce583b52689313827ce390e928214436.png'),
('1408107010017', 'Siapa', '', 'L', 'Matematika', 2014, 2019, 'Dimana', '2097-01-06', 'Adadad', '08236718991', 'siapa@gmail.com', 'Apa Aja', 'Alumni', ''),
('1508107010016', 'James Bones', '', 'L', 'Biologi', 2015, 2020, 'Minang', '1997-01-02', 'Dimana Aja', '08236718991', 'james@gmail.com', 'Bapak Rumah Tangga', 'Alumni', ''),
('1508107010017', 'Mina Goroshi', '', 'P', 'Biologi', 2015, 2020, 'Tamiyang', '1997-01-02', 'Dimana Aja', '08236718991', 'minamina@gmail.com', 'IT Telkom', 'Alumni', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `Nama_Jurusan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `Nama_Jurusan`) VALUES
(1, 'Matematika'),
(2, 'Fisika'),
(3, 'Kimia'),
(4, 'Biologi'),
(5, 'Ilmu Kelautan'),
(6, 'Budidaya Perairan'),
(7, 'Informatika'),
(8, 'Statistika'),
(9, 'Farmasi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(14) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Password`, `Email`, `image`, `role`) VALUES
('1608107010018', 'Andika Pratama', 'e5a85482d8b9bedbd68c39cb22aea751', 'apratama918@gmail.com', '5c63e7d4006726662e9a515f750c30f1.png', 'Mahasiswa'),
('1708107010018', 'Andika Pratama', '74b87337454200d4d33f80c4663dc5e5', 'apratama918@gmail.com', '', 'Mahasiswa'),
('1708107010034', 'Budi Gunawan', 'b0baee9d279d34fa1dfd71aadb908c3f', 'apratama918@gmail.com', '7d187b48ca1cb645124d9c8f5451cc4b.jpg', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `p_perkerjaan`
--

CREATE TABLE `p_perkerjaan` (
  `id` int(11) NOT NULL,
  `Nama_Pekerjaan` varchar(250) NOT NULL,
  `Tahun_Masuk` int(11) NOT NULL,
  `Tahun_Keluar` int(11) NOT NULL,
  `Nim` varchar(250) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_perkerjaan`
--

INSERT INTO `p_perkerjaan` (`id`, `Nama_Pekerjaan`, `Tahun_Masuk`, `Tahun_Keluar`, `Nim`, `Keterangan`) VALUES
(1, 'SEO Tokopedia', 2015, 2018, '1208107010018', 'apasiih ini ?');

-- --------------------------------------------------------

--
-- Table structure for table `r_organisasi`
--

CREATE TABLE `r_organisasi` (
  `id` int(11) NOT NULL,
  `Nim` varchar(50) NOT NULL,
  `Tahun_Masuk` int(11) NOT NULL,
  `Tahun_Keluar` int(11) NOT NULL,
  `Nama_Organisasi` varchar(250) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_organisasi`
--

INSERT INTO `r_organisasi` (`id`, `Nim`, `Tahun_Masuk`, `Tahun_Keluar`, `Nama_Organisasi`, `Keterangan`) VALUES
(2, '1208107010018', 2012, 2016, 'BEM', 'apaapapapapaapapapapap');

-- --------------------------------------------------------

--
-- Table structure for table `r_pendidikan`
--

CREATE TABLE `r_pendidikan` (
  `id` int(11) NOT NULL,
  `Nim` varchar(14) NOT NULL,
  `Tahun_Masuk` int(5) NOT NULL,
  `Tahun_Keluar` int(5) NOT NULL,
  `Nama_Instansi` varchar(250) NOT NULL,
  `Kota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_pendidikan`
--

INSERT INTO `r_pendidikan` (`id`, `Nim`, `Tahun_Masuk`, `Tahun_Keluar`, `Nama_Instansi`, `Kota`) VALUES
(1, '1208107010018', 2012, 2017, 'Unsyiah', 'Banda Aceh');

-- --------------------------------------------------------

--
-- Table structure for table `r_penghargaan`
--

CREATE TABLE `r_penghargaan` (
  `id` int(11) NOT NULL,
  `Nim` varchar(14) NOT NULL,
  `Nama_Penghargaan` varchar(250) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_penghargaan`
--

INSERT INTO `r_penghargaan` (`id`, `Nim`, `Nama_Penghargaan`, `Tahun`, `Keterangan`) VALUES
(1, '1208107010018', 'Award', 2015, 'andika pratama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `p_perkerjaan`
--
ALTER TABLE `p_perkerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_organisasi`
--
ALTER TABLE `r_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_penghargaan`
--
ALTER TABLE `r_penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `p_perkerjaan`
--
ALTER TABLE `p_perkerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_organisasi`
--
ALTER TABLE `r_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_penghargaan`
--
ALTER TABLE `r_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
