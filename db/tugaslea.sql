-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 01:41 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaslea`
--

-- --------------------------------------------------------

--
-- Table structure for table `eo`
--

CREATE TABLE `eo` (
  `nama_eo` varchar(200) NOT NULL,
  `alamat_eo` varchar(200) NOT NULL,
  `notlp_eo` varchar(13) NOT NULL,
  `email_eo` varchar(200) NOT NULL,
  `username_eo` varchar(100) NOT NULL,
  `password_eo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eo`
--

INSERT INTO `eo` (`nama_eo`, `alamat_eo`, `notlp_eo`, `email_eo`, `username_eo`, `password_eo`) VALUES
('PT. ATIRO LUKI MEDIATAMA', 'Jl. Tanjung Barat Selatan Ray No. 25, Jakarta Selatan', '02122978020', 'atirolukimediatama@gmail.com', 'atiroluki', 'atiroluki');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `nama_event` varchar(200) NOT NULL,
  `nama_eo` varchar(200) NOT NULL,
  `periode_event` varchar(100) NOT NULL,
  `daerah_event` varchar(200) NOT NULL,
  `lokasi_event` varchar(100) NOT NULL,
  `gambar_event` varchar(100) NOT NULL,
  `sponsor_event` varchar(100) NOT NULL,
  `konsep_event` varchar(100) NOT NULL,
  `stand_event` varchar(100) NOT NULL,
  `layout_event` varchar(100) NOT NULL,
  `proposal_event` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`nama_event`, `nama_eo`, `periode_event`, `daerah_event`, `lokasi_event`, `gambar_event`, `sponsor_event`, `konsep_event`, `stand_event`, `layout_event`, `proposal_event`) VALUES
('KAMPAR EXPO 2019', 'PT. ATIRO LUKI MEDIATAMA', '31 Januari-6 Februari 2019', 'Riau', 'Lapangan Merdeka, Bangkinang, Kabupaten Kampar', '5c4b54bf2d5ac.jpg', '5c4b54bf2e395.jpg', '5c4b54bf2f28b.jpg', '5c4b54bf2feae.jpg', '5c4b54bf30b44.jpg', 'https://docs.google.com/presentation/d/e/2PACX-1vQp6gPGe1ic_GN-DTpRKXcUpw_sbb_9E0gorQyF7PkeCckHzeaKwer-28guwdAH5jA5YQ5Tv5ukJ9iy/pub?start=false&loop=false&delayms=3000'),
('SAIL NIAS 2019', 'PT. ATIRO LUKI MEDIATAMA', '29 November-02 Desember 2019', 'Sumatera Utara', 'Nias', '5c4d2ade8d40d.jpg', '5c4d2ade8e096.jpg', '5c4d2ade8eb2f.jpg', '5c4d2ade8f4b7.jpg', '5c4d2ade8fe63.jpg', 'https://docs.google.com/presentation/d/e/2PACX-1vQbBFVSqlAVlgaQS9ncDsddSG0qCrAE06wGliIwVOb06207IWA4NScAljzpynrX58Y6fDbpvj7xF8Zp/pub?start=false&loop=false&delayms=3000');

-- --------------------------------------------------------

--
-- Table structure for table `jenismrkt`
--

CREATE TABLE `jenismrkt` (
  `jenis_marketing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenismrkt`
--

INSERT INTO `jenismrkt` (`jenis_marketing`) VALUES
('Sponsor'),
('Stand');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `nama_marketing` varchar(200) NOT NULL,
  `jenis_marketing` varchar(200) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `harga_marketing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`nama_marketing`, `jenis_marketing`, `nama_event`, `harga_marketing`) VALUES
('Umbul-umbul (10Pcs)', 'Sponsor', 'KAMPAR EXPO 2019', 'Rp. 10.000.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `nama_user` varchar(200) NOT NULL,
  `nama_penyewa` varchar(200) NOT NULL,
  `nama_marketing` varchar(200) NOT NULL,
  `jenis_marketing` varchar(200) NOT NULL,
  `nama_event` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`nama_user`, `nama_penyewa`, `nama_marketing`, `jenis_marketing`, `nama_event`) VALUES
('Hasya Rona Amirahmi', 'bambang', 'Umbul-umbul (10Pcs)', 'Sponsor', 'KAMPAR EXPO 2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama_user` varchar(200) NOT NULL,
  `alamat_user` varchar(200) NOT NULL,
  `notlp_user` varchar(200) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `username_user` varchar(200) NOT NULL,
  `password_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_user`, `alamat_user`, `notlp_user`, `email_user`, `username_user`, `password_user`) VALUES
('Hasya Rona Amirahmi', 'Jl. Lantana', '082110928854', 'hasyarona1711@gmail.com', 'hasyara', 'hasyara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eo`
--
ALTER TABLE `eo`
  ADD PRIMARY KEY (`nama_eo`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`nama_event`),
  ADD KEY `nama_eo` (`nama_eo`);

--
-- Indexes for table `jenismrkt`
--
ALTER TABLE `jenismrkt`
  ADD PRIMARY KEY (`jenis_marketing`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`nama_marketing`),
  ADD UNIQUE KEY `jenis_marketing_2` (`jenis_marketing`),
  ADD KEY `jenis_marketing` (`jenis_marketing`,`nama_event`),
  ADD KEY `nama_event` (`nama_event`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`nama_penyewa`),
  ADD KEY `nama_event` (`nama_event`),
  ADD KEY `nama_user` (`nama_user`),
  ADD KEY `nama_marketing` (`nama_marketing`),
  ADD KEY `jenis_marketing` (`jenis_marketing`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nama_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`nama_eo`) REFERENCES `eo` (`nama_eo`);

--
-- Constraints for table `marketing`
--
ALTER TABLE `marketing`
  ADD CONSTRAINT `marketing_ibfk_1` FOREIGN KEY (`jenis_marketing`) REFERENCES `jenismrkt` (`jenis_marketing`),
  ADD CONSTRAINT `marketing_ibfk_2` FOREIGN KEY (`nama_event`) REFERENCES `event` (`nama_event`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`nama_marketing`) REFERENCES `marketing` (`nama_marketing`),
  ADD CONSTRAINT `pembeli_ibfk_2` FOREIGN KEY (`nama_user`) REFERENCES `user` (`nama_user`),
  ADD CONSTRAINT `pembeli_ibfk_3` FOREIGN KEY (`jenis_marketing`) REFERENCES `jenismrkt` (`jenis_marketing`),
  ADD CONSTRAINT `pembeli_ibfk_4` FOREIGN KEY (`nama_event`) REFERENCES `event` (`nama_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
