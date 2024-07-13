-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 09:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apl_data_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_delete_mhs`
--

CREATE TABLE `log_delete_mhs` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_insert_mhs`
--

CREATE TABLE `log_insert_mhs` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jlh_saudara_kandung` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_update_mhs`
--

CREATE TABLE `log_update_mhs` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `nim_mhs` char(9) NOT NULL,
  `old_nama_mhs` varchar(25) NOT NULL,
  `new_nama_mhs` varchar(25) NOT NULL,
  `old_tempat_lahir` varchar(25) NOT NULL,
  `new_tempat_lahir` varchar(25) NOT NULL,
  `old_tgl_lahir` date NOT NULL,
  `new_tgl_lahir` date NOT NULL,
  `old_alamat` varchar(100) NOT NULL,
  `new_alamat` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jlh_saudara_kandung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `tempat_lahir`, `tgl_lahir`, `jns_kelamin`, `alamat`, `jlh_saudara_kandung`) VALUES
('201402022', 'Ivan Tandella', 'Deli Tua', '2004-01-28', 'L', 'Jl. Kebun Sayur', 1),
('201402070', 'Tsabitah Muflihza', 'Medan', '2002-12-18', 'P', 'Komplek Tasbih 1', 3),
('201402076', 'Dominique Ametha', 'Medan', '2002-01-01', 'P', 'Kampung Lalang', 0),
('201402103', 'Vanissya Arbashika Putri', 'Medan', '2002-12-12', 'P', 'Jl. Alumunium II', 2),
('201402109', 'Ikhwanul Arif Sitompul', 'Belawan', '2000-05-10', 'L', 'Jl. Agung Setia', 3),
('201402115', 'Trifaliyoka Gusrul', 'Cibubur', '2003-06-09', 'L', 'Jl. Pancing 2', 2),
('201402127', 'Rifqi Alnahwandi Putra', 'Penang', '2001-10-30', 'L', 'Medan Marelan', 1);

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `delete_data_mhs` AFTER DELETE ON `mahasiswa` FOR EACH ROW INSERT INTO log_delete_mhs (id, user, nim, nama_mhs, date) VALUES ('', USER(), old.nim, old.nama_mhs, NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_data_mhs` AFTER INSERT ON `mahasiswa` FOR EACH ROW INSERT INTO log_insert_mhs (id, user, nim, nama_mhs, tempat_lahir, tgl_lahir, jns_kelamin, alamat, jlh_saudara_kandung, date) VALUES ('', USER(), new.nim, new.nama_mhs, new.tempat_lahir, new.tgl_lahir, new.jns_kelamin, new.alamat, new.jlh_saudara_kandung, NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_data_mhs` AFTER UPDATE ON `mahasiswa` FOR EACH ROW INSERT INTO log_update_mhs (id, user, nim_mhs, old_nama_mhs, new_nama_mhs, old_tempat_lahir, new_tempat_lahir, old_tgl_lahir, new_tgl_lahir, old_alamat, new_alamat, date) VALUES ('', USER(), old.nim, old.nama_mhs, new.nama_mhs, old.tempat_lahir, new.tempat_lahir, old.tgl_lahir, new.tgl_lahir, old.alamat, new.alamat, NOW())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_delete_mhs`
--
ALTER TABLE `log_delete_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_insert_mhs`
--
ALTER TABLE `log_insert_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_update_mhs`
--
ALTER TABLE `log_update_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_delete_mhs`
--
ALTER TABLE `log_delete_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_insert_mhs`
--
ALTER TABLE `log_insert_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_update_mhs`
--
ALTER TABLE `log_update_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
