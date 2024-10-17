-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 04:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `surat_tugas_id` int NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `nama_dsn` varchar(255) NOT NULL,
  `tgl_surat_tugas` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`surat_tugas_id`, `nomor`, `nama_dsn`, `tgl_surat_tugas`, `tujuan`, `transportasi`, `keperluan`) VALUES
(1, '11223344', 'Dimas', '2024-10-16', 'Seminar Nasional', 'Motor', 'Seminar'),
(2, '112233333', 'Samid AAAAA', '2024-10-08', 'Penelitian', 'Kereta', 'Panitia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`surat_tugas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
