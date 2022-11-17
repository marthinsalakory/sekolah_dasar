-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2022 at 07:50 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `pengirim`, `judul`, `file`) VALUES
('6375e185c93c9', 'g5', 'Tugas Kelas 5', '6375e185c8d26.jpg'),
('6375e3af730f9', 'g6', 'materi 6', '6375e3af728a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `pengirim`, `file`, `judul`, `deskripsi`, `jenis`, `nilai`) VALUES
('6375e16b17b3e', 'g5', '6375e16b17288.jpg', 'Tugas kelas 5', 'Tugas kelas 5', 'guru', '0'),
('6375e3c2cfee0', 'g6', '6375e3c2cf982.jpg', 'tugas kelas 6', 'tesss', 'guru', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tv_materi`
-- (See below for the actual view)
--
CREATE TABLE `tv_materi` (
`id` varchar(255)
,`pengirim` varchar(255)
,`judul` varchar(255)
,`file` varchar(255)
,`kode` varchar(255)
,`role` varchar(255)
,`nama` varchar(255)
,`kelas` varchar(255)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tv_tugas`
-- (See below for the actual view)
--
CREATE TABLE `tv_tugas` (
`id` varchar(255)
,`pengirim` varchar(255)
,`file` varchar(255)
,`judul` varchar(255)
,`deskripsi` longtext
,`jenis` varchar(255)
,`nilai` varchar(255)
,`kode` varchar(255)
,`role` varchar(255)
,`nama` varchar(255)
,`kelas` varchar(255)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `kode` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`kode`, `role`, `nama`, `kelas`, `password`) VALUES
('g5', 'guru', 'g5', '5', '$2y$10$ZRsObPM.CGCyZ7HjaQqnjeN9KbLI9Z93wSpedaQhXjr0/lfnViIPe'),
('g6', 'guru', 'g6', '6', '$2y$10$I0aTQhEUrTC.5COmy0xETuV24tuoetg2SFaef4mwitumpkaxfHCny'),
('s5', 'siswa', 's5', '5', '$2y$10$gW9NFh/LNUF5/oqSyuQZdeveNqNJAxgAKi3b5uqYxVbF6yKa/lbeK'),
('s6', 'siswa', 's6', '6', '$2y$10$pfQMxvGSMQxC8FAzBn.8f.LQ.5k91GyWvFjcXwkCuH4njmcuX.uiy');

-- --------------------------------------------------------

--
-- Structure for view `tv_materi`
--
DROP TABLE IF EXISTS `tv_materi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tv_materi`  AS SELECT `materi`.`id` AS `id`, `materi`.`pengirim` AS `pengirim`, `materi`.`judul` AS `judul`, `materi`.`file` AS `file`, `users`.`kode` AS `kode`, `users`.`role` AS `role`, `users`.`nama` AS `nama`, `users`.`kelas` AS `kelas`, `users`.`password` AS `password` FROM (`materi` join `users` on((`materi`.`pengirim` = `users`.`kode`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `tv_tugas`
--
DROP TABLE IF EXISTS `tv_tugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tv_tugas`  AS SELECT `tugas`.`id` AS `id`, `tugas`.`pengirim` AS `pengirim`, `tugas`.`file` AS `file`, `tugas`.`judul` AS `judul`, `tugas`.`deskripsi` AS `deskripsi`, `tugas`.`jenis` AS `jenis`, `tugas`.`nilai` AS `nilai`, `users`.`kode` AS `kode`, `users`.`role` AS `role`, `users`.`nama` AS `nama`, `users`.`kelas` AS `kelas`, `users`.`password` AS `password` FROM (`tugas` join `users` on((`tugas`.`pengirim` = `users`.`kode`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
