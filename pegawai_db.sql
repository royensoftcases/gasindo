-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 10:34 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_abd`
--

CREATE TABLE `list_abd` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `count_time` double NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_abd`
--

INSERT INTO `list_abd` (`id`, `id_employee`, `date_start`, `count_time`, `keterangan`, `status`) VALUES
(2, 3, '2023-12-08', 1, 'Restitusi', 1),
(3, 5, '2024-01-01', 1, 'Pindah Alamat11', 1),
(4, 5, '2024-01-02', 1, 'Pindah Alamat', 1),
(5, 6, '2024-01-01', 1, 'Cashpooling', 1),
(6, 6, '2024-01-02', 1, 'Cashpooling', 1),
(7, 3, '2023-12-31', 1, 'Cashpooling', 1),
(8, 3, '2024-01-01', 1, 'Cashpooling', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_employee`
--

CREATE TABLE `m_employee` (
  `nip` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `birth_date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_employee`
--

INSERT INTO `m_employee` (`nip`, `name`, `gender`, `phone`, `address`, `birth_date`, `status`) VALUES
(3, 'Roy Marulido Situmorang', 'Male', '085736008631', 'Jalan Kampung Cijengir no B134 Rt 003 Rw 004 Kabupaten Tangerang ', '2014-06-27', 1),
(5, 'endah pita', 'Female', '+6281383094976', 'KAMPUNG CIJENGIR NO 139', '2000-07-14', 1),
(6, 'ajeng', 'Female', '085736008636', 'Tegal Parang Utara', '1986-11-13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_abd`
--
ALTER TABLE `list_abd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_employee`
--
ALTER TABLE `m_employee`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_abd`
--
ALTER TABLE `list_abd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_employee`
--
ALTER TABLE `m_employee`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
