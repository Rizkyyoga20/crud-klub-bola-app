-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 07:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepak_bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(6) NOT NULL,
  `nama_klub_1` varchar(100) NOT NULL,
  `nama_klub_2` varchar(100) NOT NULL,
  `gol_klub_1` varchar(5) NOT NULL,
  `gol_klub_2` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_klub_1`, `nama_klub_2`, `gol_klub_1`, `gol_klub_2`, `tanggal`) VALUES
('1', 'Persib', 'Arema', '2', '0', '2023-07-20'),
('2', 'Arema', 'Persija', '3', '2', '2023-07-24'),
('3', 'Persija', 'Persib', '2', '3', '2023-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id_klub` varchar(16) NOT NULL,
  `nama_klub` varchar(100) NOT NULL,
  `asal_kota` varchar(100) NOT NULL,
  `poin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id_klub`, `nama_klub`, `asal_kota`, `poin`) VALUES
('1', 'Persib', 'Bandung', '6'),
('2', 'Arema', 'Malang', '3'),
('3', 'Persija', 'Jakarta', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
