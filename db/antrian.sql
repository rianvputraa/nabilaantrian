-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 08:33 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_antrian`
--

CREATE TABLE `client_antrian` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_antrian`
--

INSERT INTO `client_antrian` (`id`, `client`, `nama_dokter`) VALUES
(14, 1, 'Dr. Nabilah Abdurrahman'),
(15, 2, 'drg. Atikah Bahar'),
(16, 3, 'drg. Ari Airin');

-- --------------------------------------------------------

--
-- Table structure for table `data_antrian`
--

CREATE TABLE `data_antrian` (
  `id` int(11) NOT NULL,
  `no_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `counter` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `waktu` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(15) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `poliklinik` varchar(30) NOT NULL,
  `ruangan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `poliklinik`, `ruangan`) VALUES
(1, 'Dr. Nabilah Abdurrahman ', 'Skincare', 1),
(2, 'drg. Ari Airin', 'Dokter Gigi A', 3),
(4, 'drg. Atikah Bahar', 'Dokter Gigi B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_historydaftar`
--

CREATE TABLE `tbl_historydaftar` (
  `id_history` int(15) NOT NULL,
  `id_pendaftaran` varchar(15) NOT NULL,
  `counter` int(15) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `poliklinik` varchar(30) NOT NULL,
  `no_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `bulan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_historydaftar`
--

INSERT INTO `tbl_historydaftar` (`id_history`, `id_pendaftaran`, `counter`, `nama_dokter`, `poliklinik`, `no_pasien`, `nama_pasien`, `alamat`, `waktu`, `bulan`) VALUES
(1, 'P0001', 1, 'Dr. Nabilah Abdurrahman ', 'Skincare', 'N0002', 'Abdullah', 'Jl. Cisangkan', '2017-10-27', 'November'),
(2, 'P0001', 3, 'drg. Ari Airin', 'Dokter Gigi', 'N0004', 'Abdel', 'Jl. Sangkuriang', '2017-10-27', 'October'),
(3, 'P0001', 2, 'drg. Atikah Bahar', 'Dokter Gigi', 'N0003', 'Abdillah', 'Jl. Cisangkan Permai', '2017-10-27', 'October'),
(4, 'P0001', 1, 'Dr. Nabilah Abdurrahman ', 'Skincare', 'N0003', 'Abdillah', 'Jl. Cisangkan Permai', '2017-10-27', 'October'),
(5, 'P0001', 3, 'drg. Ari Airin', 'Dokter Gigi', 'N0002', 'Abdullah', 'Jl. Cisangkan', '2017-10-28', 'October'),
(6, 'P0002', 3, 'drg. Ari Airin', 'Dokter Gigi', 'N0003', 'Abdillah', 'Jl. Cisangkan Permai', '2017-10-28', 'October');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(15) NOT NULL,
  `no_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `poliklinik` varchar(30) NOT NULL,
  `waktu` timestamp(2) NOT NULL DEFAULT CURRENT_TIMESTAMP(2) ON UPDATE CURRENT_TIMESTAMP(2)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `no_pasien`, `nama_pasien`, `alamat`, `nama_dokter`, `poliklinik`, `waktu`) VALUES
(44, 'N0002', 'Abdullah', 'Jl. Cisangkan', 'Dr. Nabilah Abdurrahman', 'Skincare', '2017-10-20 23:36:08.43'),
(45, 'N0003', 'Abdillah', 'Jl. Cisangkan Permai', 'drg. Ari Airin', 'Dokter Gigi', '2017-10-20 23:28:06.97'),
(46, 'N0004', 'Abdel', 'Jl. Sangkuriang', 'drg. Atikah Bahar', 'Dokter Gigi', '2017-10-20 23:36:08.48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` varchar(15) NOT NULL,
  `no_pendaftaran` int(11) NOT NULL,
  `counter` int(20) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `poliklinik` varchar(30) NOT NULL,
  `no_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `waktu` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekamedis`
--

CREATE TABLE `tbl_rekamedis` (
  `id_rekamedis` int(15) NOT NULL,
  `no_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `waktu` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `waktu` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_user`, `akses`, `waktu`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', '2017-10-27 21:40:15.763198'),
(2, 'monitor', '08b5411f848a2581a41672a759c87380', 'Monitor', 'monitor', '2017-10-20 23:02:40.108684'),
(3, 'nabilaabd', 'd22af4180eee4bd95072eb90f94930e5', 'Dr. Nabilah Abdurrahman ', 'dokter', '2017-11-05 04:00:41.084356'),
(4, 'atikahbahar', '1d3a9cca164340f6f7ba5af240a72e9d', 'drg. Atikah Bahar', 'dokter', '2017-11-05 04:30:46.695191'),
(5, 'ariairin', '0c87bd4a9f5149fed602afa91d3aa064', 'drg. Ari Airin', 'dokter', '2017-10-20 19:43:44.558391'),
(6, 'ariairin', '0c87bd4a9f5149fed602afa91d3aa064', 'drg. Ari Airin', 'admin', '2017-11-05 04:30:59.076765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_antrian`
--
ALTER TABLE `client_antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `nama_dokter` (`nama_dokter`);

--
-- Indexes for table `data_antrian`
--
ALTER TABLE `data_antrian`
  ADD KEY `id` (`id`),
  ADD KEY `counter` (`counter`),
  ADD KEY `no_pasien` (`no_pasien`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD UNIQUE KEY `nama_dokter` (`nama_dokter`),
  ADD UNIQUE KEY `ruangan` (`ruangan`);

--
-- Indexes for table `tbl_historydaftar`
--
ALTER TABLE `tbl_historydaftar`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `nama_dokter` (`nama_dokter`,`no_pasien`),
  ADD KEY `no_pasien` (`no_pasien`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `no_pasien` (`no_pasien`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`) USING BTREE,
  ADD KEY `nama_dokter` (`nama_dokter`),
  ADD KEY `counter` (`counter`);

--
-- Indexes for table `tbl_rekamedis`
--
ALTER TABLE `tbl_rekamedis`
  ADD PRIMARY KEY (`id_rekamedis`),
  ADD KEY `no_pasien` (`no_pasien`),
  ADD KEY `nama_pasien` (`nama_pasien`,`nama_dokter`),
  ADD KEY `nama_dokter` (`nama_dokter`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_antrian`
--
ALTER TABLE `client_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_historydaftar`
--
ALTER TABLE `tbl_historydaftar`
  MODIFY `id_history` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_rekamedis`
--
ALTER TABLE `tbl_rekamedis`
  MODIFY `id_rekamedis` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_antrian`
--
ALTER TABLE `client_antrian`
  ADD CONSTRAINT `client_antrian_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `tbl_dokter` (`nama_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_antrian_ibfk_2` FOREIGN KEY (`client`) REFERENCES `tbl_dokter` (`ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_antrian`
--
ALTER TABLE `data_antrian`
  ADD CONSTRAINT `data_antrian_ibfk_2` FOREIGN KEY (`no_pasien`) REFERENCES `tbl_pasien` (`no_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_historydaftar`
--
ALTER TABLE `tbl_historydaftar`
  ADD CONSTRAINT `tbl_historydaftar_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `tbl_dokter` (`nama_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_historydaftar_ibfk_3` FOREIGN KEY (`no_pasien`) REFERENCES `tbl_pasien` (`no_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rekamedis`
--
ALTER TABLE `tbl_rekamedis`
  ADD CONSTRAINT `tbl_rekamedis_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `tbl_dokter` (`nama_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rekamedis_ibfk_2` FOREIGN KEY (`no_pasien`) REFERENCES `tbl_pasien` (`no_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
