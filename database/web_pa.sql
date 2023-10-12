-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 04:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id_cv` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `bln_lahir` varchar(15) NOT NULL,
  `thn_lahir` int(5) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `tinggi` int(4) NOT NULL,
  `berat` int(4) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `sd` varchar(150) NOT NULL,
  `smp` varchar(150) NOT NULL,
  `sma` varchar(150) NOT NULL,
  `universitas` varchar(150) NOT NULL,
  `jurusan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id_cv`, `id`, `nama`, `tempat_lahir`, `tgl_lahir`, `bln_lahir`, `thn_lahir`, `jenis_kelamin`, `agama`, `gol_darah`, `tinggi`, `berat`, `no_telp`, `kota`, `provinsi`, `alamat`, `status`, `sd`, `smp`, `sma`, `universitas`, `jurusan`) VALUES
(2, 0, 'SLAMET SETIADI RIYANTO', 'Cirebon', '11081999', '', 0, 'Laki - laki', 'Islam', 'B', 169, 60, 2147483647, 'Kab.Bandung', 'Jawa Barat', 'Perumahan GBA Barat', 'Belum Nikah', '', '', '', '', ''),
(3, 0, 'JASON RANTI', 'JAKARTA', '11081995', '', 0, 'Laki - laki', 'Yahudi', 'A', 171, 78, 2147483647, 'Jakarta Utara', 'DKI jakarta', 'Jl. Malas mandi', 'Nikah', '', '', '', '', ''),
(4, 0, 'Haryanto', 'Bandung', '21', 'Maret', 1971, 'Laki - laki', 'Islam', 'B', 165, 78, 878789545, 'indramayu', 'Jawa Barat', 'jl. pandai ngoding', 'Nikah', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(3) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Bakoye Corp', 'bakoyecrp@gmail.com', 'default.png', '$2y$10$VTwlrrIs3rjyUj13aNW6o.Gme5YmzybMDs1qLN5nzJ1dYMTnMbt3.', 3, 1, 2147483647),
(2, 'Bina Prestasi', 'binaprestasi@gmail.com', 'default.png', '$2y$10$2PnNiMsqWsoV5TxAxm.2juYlItGdlqjl73WKp6dzqHC13mNG9cGhC', 3, 1, 2147483647),
(3, 'Slamet Setiadi Riyanto', 'slametsr@gmail.com', 'default.png', '$2y$10$S/QWVhpTL.Lvot0zDFG5puYTVqEZKJcJO5yRRN1uFHAORwv6DyLDC', 2, 0, 0),
(4, 'Muhammad Aulia Amri', 'amri@gmail.com', 'default.png', '$2y$10$cHnO/0lRdIXeLkZoNEDlOuWunwM9chV/xaN55XlyQC9FiWmmUkMpi', 2, 1, 2147483647),
(5, 'Bakoye Uye', 'bakoyeuye@gmail.com', 'default.png', '$2y$10$lGhUCXplohIr8AY/y.2ISeEGdOoAuSgeM95jeKKtwS8EboXg0Z3Wm', 2, 1, 2147483647),
(6, 'Admin free', 'admin@gmail.com', 'A21.png', '$2y$10$ddN08134rzFDZ08ewistB.kQJiN09PDYn..Yb593ojBwK8131AKfy', 1, 1, 0),
(7, 'Alvino Dicky', 'alvinodick@gmail.com', 'default.jpg', '$2y$10$opsI2l8E/R9btFcZg7O3geXgKhe1dErft3h9itpenok2TJpuOw7hG', 2, 1, 2147483647),
(8, 'Paulus Raul Gonzales', 'paulus@gmail.com', 'default.jpg', '$2y$10$x7IuIBvr9c2LRUaqbCm54er/Tv6SYFeTavprQflTV8g9D7Cx3wPQi', 2, 1, 2147483647),
(9, 'suan', 'suan@gmail.com', 'default.jpg', '$2y$10$azg9yenabz2MU//f3OBRJOj2GvEfwRuiQb0bAbb8o/BhEs1Slbilq', 2, 0, 1617406290),
(10, 'hasanudinn', 'hasanudin@gmail.comm', 'default.jpg', '$2y$10$bK1O8H726dQwuwMfEjA24uyWeH.va5jePl.W8rOxZy.RqbhgvpJk2', 2, 0, 1617406387),
(20, 'Alvino Dicky', 'alvinodicky548@gmail.com', 'default.jpg', '$2y$10$YE7V80RKG6RIPVv9VgphPO/bSLnfhf8PNYKGa52X4eUYJC2vwzjpy', 2, 1, 1617462582),
(21, 'Slamet Setiadi Riyanto', 'aan.gasir@gmail.com', 'default.png', '$2y$10$B7ulVx9nB02QK6JMGNPAvetyxDoc6UAYxxMdiq4vyEd4Jupm7vbtu', 2, 1, 1617544222),
(22, 'siap.corp', 'siap@gmail.com', 'default.png', '$2y$10$.QpHtM36oLQBygRglYE3P.h8wCpi0YiDszzChXhHpHzFJ2ScORaEm', 3, 1, 1617544350);

-- --------------------------------------------------------

--
-- Table structure for table `user_acces_menu`
--

CREATE TABLE `user_acces_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_acces_menu`
--

INSERT INTO `user_acces_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 3, 3),
(6, 1, 3),
(7, 1, 4),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(58) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu`) VALUES
(1, 'admin'),
(2, 'freelance'),
(3, 'perusahaan'),
(4, 'menu'),
(5, 'Test'),
(6, 'Test 2'),
(7, 'Test 3'),
(8, 'Buat Lowongan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Freelancer'),
(3, 'Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Profil Admin', 'Admin', 'fas fa-fw fa-user-alt', 1),
(3, 4, 'Menu Management', 'Menu', 'fab fa-fw fa-buffer', 1),
(4, 4, 'Sub Menu Management', 'menu/submenu', 'fab fa-fw fa-buffer', 1),
(5, 2, 'Profil', 'Freelance', 'fas fa-fw fa-user-alt', 1),
(6, 1, 'Cari Lowongan', 'Admin/carilowongan', 'fab fa-fw fa-buffer', 1),
(7, 3, 'Buat Lowongan', 'Perusahaan', 'fab fa-fw fa-buffer', 1),
(8, 1, 'Role', 'Admin/role', 'fab fa-fw fa-buffer', 1),
(9, 1, 'Edit Profil', 'Admin/editprofil', 'fas fa-fw fa-user-alt', 1),
(10, 1, 'Edit Password', 'Admin/editpass', 'fas fa-fw fa-key', 1),
(11, 3, 'Buat Lowongan', 'Perusahaan', '', 1),
(12, 1, 'Penerimaan Lowongan', 'Admin', '', 1),
(13, 2, 'History lamar gawe', 'Freelance', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'amermrcl@gmail.com', '0', 1617421455);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_cv`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
