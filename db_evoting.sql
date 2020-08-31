-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2020 at 11:40 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `level` enum('administrator','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `id_fakultas`, `level`) VALUES
(1, 'admin', '$2y$10$vXweJwTP9X6BrdQ/QHSiTOKLdrkzvNq09qJhxOOKNnbIXOE5XP6zq', 0, 'administrator'),
(15, 'pendidikan', '$2y$10$JR/IHpxrJ2GCykCUX6QEYOFG/C3rFr3gHVLRwUBtKEuRz2KEbOeMC', 4, 'operator'),
(16, 'kelautan', '$2y$10$JcfrOOlLXboAkddt28Y2kOWo9koDc59P1k8ArXdFBxLs/PHW.EZby', 5, 'operator'),
(17, 'kedokteran', '$2y$10$JBvuLLsvbI3RdFBjRQo8b.7y29M6pyxNkBtPt7f3xCVrld383nlm2', 6, 'operator'),
(18, 'teknik', '$2y$10$ktUR84j.7WTmDMUmb.7pe.TOQ2XT6lS/ZA01Zm2QECQwnENkpUfvG', 7, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon`
--

CREATE TABLE `tb_calon` (
  `id_calon` int(11) NOT NULL,
  `calon_presma` varchar(20) NOT NULL,
  `calon_wakil_presma` varchar(20) NOT NULL,
  `visi_misi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `video` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calon`
--

INSERT INTO `tb_calon` (`id_calon`, `calon_presma`, `calon_wakil_presma`, `visi_misi`, `gambar`, `video`) VALUES
(7, 'Saya', 'Kamu', 'Saya dan kamu menjadi satu', '218f16ea0f59bed40eb43118695ebe60.jpg', '4a7bc59043b47de832875cd554c6e9e6.mp4'),
(8, 'Kamu', 'Dia', 'Kalian selingkuh', '715199f9fbc2fbaa15efdefa22a67131.jpg', '0789ab46371a660a916586ff09df9867.mp4'),
(9, 'Dia', 'Siapa', 'Siapa saja deh', '1729403924f1d5189410ef993eeb6ef0.jpg', '6626fc382275ab651284380264f3ad35.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(4, 'Pendidikan'),
(5, 'kelautan'),
(6, 'Kedokteran'),
(7, 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_suara`
--

CREATE TABLE `tb_hasil_suara` (
  `id_hasil` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil_suara`
--

INSERT INTO `tb_hasil_suara` (`id_hasil`, `id_pemilih`, `id_calon`) VALUES
(12, 110, 8),
(14, 91, 7),
(15, 112, 9),
(16, 115, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nim` int(9) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilih`
--

INSERT INTO `tb_pemilih` (`id_pemilih`, `id_fakultas`, `nim`, `nama`, `email`, `password`) VALUES
(91, 4, 201552001, 'Eka Saputra', 'ekza97@gmail.com', '$2y$10$Q3OdC8edm0S.RW5weF9ZbOmExVR.yclkkojF4Nm7ttp0eOlZ7mS0O'),
(110, 5, 201552002, 'COBA saja', 'eka56572@gmail.com', '$2y$10$KDPfPr9jfzhqe.kuxBfWXegqxVpIAHjipWwi.SsL0mCjf/YDZY5dS'),
(112, 6, 202065001, 'ASASF', 'admin@gmail.com', '$2y$10$8bJd1TdRh7UrnQSMhhYmJeonLYWBU.SAO6w5e4DSjP0ykEg6JHL2e'),
(114, 7, 202065002, 'Suharni, S.Pd,SD', 'nuryadieko1@gmail.com', '$2y$10$KDPfPr9jfzhqe.kuxBfWXegqxVpIAHjipWwi.SsL0mCjf/YDZY5dS'),
(115, 7, 201865001, 'Tes', 'tes@gmail.com', '$2y$10$1ai1oNExWYHMpxawQmQiZOKsu67Oz1GwQ7lPZ/yNVPFiYsk.Jaera');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilihan`
--

CREATE TABLE `tb_pemilihan` (
  `id_pemilihan` int(11) NOT NULL,
  `mulai_pemilihan` int(11) NOT NULL,
  `akhir_pemilihan` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilihan`
--

INSERT INTO `tb_pemilihan` (`id_pemilihan`, `mulai_pemilihan`, `akhir_pemilihan`, `status`) VALUES
(1, 1598866044, 1598952444, 'nonaktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_calon`
--
ALTER TABLE `tb_calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_hasil_suara`
--
ALTER TABLE `tb_hasil_suara`
  ADD PRIMARY KEY (`id_hasil`),
  ADD UNIQUE KEY `ID_pemilih_2` (`id_pemilih`),
  ADD KEY `ID_pemilih` (`id_pemilih`),
  ADD KEY `ID_calon` (`id_calon`);

--
-- Indexes for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD UNIQUE KEY `NIM` (`nim`);

--
-- Indexes for table `tb_pemilihan`
--
ALTER TABLE `tb_pemilihan`
  ADD PRIMARY KEY (`id_pemilihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_calon`
--
ALTER TABLE `tb_calon`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hasil_suara`
--
ALTER TABLE `tb_hasil_suara`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_pemilihan`
--
ALTER TABLE `tb_pemilihan`
  MODIFY `id_pemilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
