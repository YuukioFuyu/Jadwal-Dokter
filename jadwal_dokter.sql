-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 02:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_dokter`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` mediumint(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `status`) VALUES
(1, 'Prof. Yuukio Fuyu Ph.D.', 0),
(2, 'dr. Zainun, Sp P', 1),
(3, 'dr. M. Rizal, SpA, IBCLC	', 1),
(4, 'dr. Dwi Purnomo.S,MS,Med, SpA 	', 1),
(5, 'dr. M Navis Qulyuby, Sp.A.M.Kes	', 1),
(6, 'dr. Doni Priyo Widodo,SpPD	', 1),
(7, 'dr. M Iza Indramanto,SpPD	', 1),
(8, 'dr. Cicilia Diah P, SpPD	', 1),
(9, 'dr. Yulianti K, Sp.M	', 1),
(10, 'dr. Oscar Hari B, Sp M	', 1),
(12, 'dr. Hj. Nurlaeli, Sp. P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` mediumint(9) NOT NULL,
  `poli` mediumint(9) NOT NULL,
  `dokter` mediumint(9) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` varchar(12) NOT NULL,
  `jam_selesai` varchar(12) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` mediumint(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama`, `status`) VALUES
(1, 'PARU', 1),
(2, 'ANAK', 1),
(3, 'PENYAKIT DALAM', 1),
(4, 'MATA', 1),
(5, 'KANDUNGAN', 1),
(6, 'UROLOGI', 1),
(7, 'BEDAH ORTHOPEDI', 1),
(8, 'THT', 1),
(9, 'JANTUNG', 1),
(10, 'BEDAH UMUM', 1),
(11, 'REHAB MEDIS', 1),
(12, 'SARAF', 1),
(13, 'KECANTIKAN', 1),
(14, 'GIGI', 1),
(15, 'UMUM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
