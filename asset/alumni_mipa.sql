-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 12:11 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Nama`, `Password`, `image`) VALUES
('admin', 'Administrasi', 'admin', ''),
('admin12', 'SEO Tokopedia', 'admin', ''),
('admin2', 'Andika Pratama', 'andika123', '');

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
  `Nama_Pekerjaan` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Nim`, `Nama`, `Password`, `Jenis_Kelamin`, `Jurusan`, `Tahun_Masuk`, `Tahun_Keluar`, `Tempat_Lahir`, `Tanggal_Lahir`, `Alamat`, `No_Telepon`, `Email`, `Pekerjaan`, `Nama_Pekerjaan`, `role`, `image`) VALUES
('1208107010009', 'Prinanda Rahmatullah', 'e5a85482d8b9bedbd68c39cb22aea751', 'L', 'Kimia', 2012, 2017, 'Sabang', '1998-10-10', 'Bakaran Batu', '+6281376077774', 'inovatornusantara@gmail.com', 'Teknologi Informasi', 'Web Developer', 'Alumni', 'be5344e9063fa04e48732a0ab78212e0.jpg'),
('1708107010018', 'Budi Gunawan', '74b87337454200d4d33f80c4663dc5e5', '', 'Informatika', 2017, 2020, '', '0000-00-00', '', '', 'apratama918@gmail.com', 'Scientist', '', 'Alumni', '41f479f46b6705b2a70894b45b7ca6bd.jpg');

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
(5, 'Manajemen Informatika'),
(6, 'Teknik Elektronika'),
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
  `Tahun_Masuk` int(5) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `role` varchar(50) NOT NULL,
  `Jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama`, `Tahun_Masuk`, `Password`, `Email`, `image`, `role`, `Jurusan`) VALUES
('1808001010020', 'Nanta Setiaaaa', 2018, '25f9e794323b453885f5181f1b624d0b', 'inovatornusantara@gmail.com', '', 'Mahasiswa', 'Informatika');

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
(3, 'Web Developer', 2016, 2017, '1608107010009', 'aad'),
(4, 'SEO Tokopedia', 2016, 2020, '1208107010009', 'Tokepedia Cap Jempol');

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
(4, '1208107010009', 2016, 2017, 'BEM', 'BEM MIPA');

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
(3, '1208107010009', 2013, 2016, 'SMA 1 Sabang', 'Sabang'),
(4, '1208107010009', 2010, 2013, 'SMP 1 Sabang', 'Sabang');

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
(4, '1208107010009', 'Lomba Mengaji', 2012, 'Juara 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_organisasi`
--
ALTER TABLE `r_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_penghargaan`
--
ALTER TABLE `r_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
