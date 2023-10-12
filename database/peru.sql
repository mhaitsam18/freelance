-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 05:34 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peru`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(0, ''),
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_grup`
--

CREATE TABLE `anggota_grup` (
  `id_anggota_grup` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_join` datetime NOT NULL DEFAULT current_timestamp(),
  `status_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_grup`
--

INSERT INTO `anggota_grup` (`id_anggota_grup`, `id_grup`, `id_user`, `waktu_join`, `status_anggota`) VALUES
(1, 1, 1, '2021-08-29 18:25:33', 1),
(2, 2, 1, '2021-08-30 09:39:31', 1),
(3, 2, 2, '2021-08-30 09:39:31', 3),
(4, 2, 3, '2021-08-30 09:39:31', 3),
(5, 3, 1, '2021-08-30 09:41:57', 1),
(6, 3, 2, '2021-08-30 09:41:57', 3),
(7, 3, 3, '2021-08-30 09:41:57', 3),
(8, 4, 1, '2021-08-30 20:34:55', 1),
(9, 4, 2, '2021-08-30 20:34:55', 3),
(10, 4, 3, '2021-08-30 20:34:55', 3),
(11, 5, 1, '2021-08-30 20:45:58', 1),
(12, 5, 4, '2021-08-30 20:45:58', 3),
(13, 5, 3, '2021-08-30 20:45:58', 3);

-- --------------------------------------------------------

--
-- Table structure for table `calon_pegawai`
--

CREATE TABLE `calon_pegawai` (
  `id_calon` int(11) NOT NULL,
  `id_user_pengirim` int(255) NOT NULL,
  `id_lowongan_pekerjaan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_pegawai`
--

INSERT INTO `calon_pegawai` (`id_calon`, `id_user_pengirim`, `id_lowongan_pekerjaan`) VALUES
(1, 3, 11),
(2, 3, 11),
(3, 5, 12),
(4, 5, 11),
(5, 3, 11),
(6, 3, 11),
(7, 3, 12),
(8, 4, 11),
(9, 3, 1),
(10, 3, 1),
(11, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_user_from`, `id_user_to`, `message`, `time`, `status`, `is_read`) VALUES
(1, 1, 3, 'Halo', '2021-07-27 21:54:00', 1, 1),
(2, 3, 1, 'Halo Juga', '2021-07-27 21:55:00', 1, 1),
(3, 1, 3, 'wah, dibalas', '2021-07-27 21:58:24', 1, 1),
(4, 1, 3, 'wah, berhasil', '2021-07-27 21:58:32', 1, 1),
(5, 1, 3, 'ooke', '2021-07-27 22:14:08', 1, 1),
(6, 3, 1, 'halo koy', '2021-07-27 23:18:10', 1, 1),
(7, 3, 1, 'tes 123<br />\r\n', '2021-07-27 23:18:44', 1, 1),
(8, 1, 3, 'halo Amri', '2021-07-27 23:25:34', 1, 1),
(9, 1, 3, 'kok ga terkirim sih?<br />\r\n', '2021-07-27 23:26:08', 1, 1),
(10, 1, 3, 'tes lagi<br />\r\n', '2021-07-27 23:27:51', 1, 1),
(11, 1, 3, 'oke', '2021-07-27 23:29:46', 1, 1),
(12, 1, 3, 'Apa Hobby Anda', '2021-07-28 09:23:29', 1, 1),
(13, 3, 1, 'Memancing, Koding, Bermain Game', '2021-07-28 17:38:06', 1, 1),
(14, 3, 1, 'Kalau anda?', '2021-07-28 17:38:20', 1, 1),
(15, 1, 4, 'Sayaaang', '2021-07-28 17:40:08', 1, 1),
(16, 1, 4, 'ayabadu by', '2021-07-29 00:47:31', 1, 1),
(17, 4, 1, 'ayabadu tu', '2021-07-29 00:51:18', 1, 1),
(18, 1, 3, 'Assalamu\'alaikum', '2021-07-29 10:08:33', 1, 1),
(19, 1, 4, 'halo', '2021-08-10 14:54:17', 1, 1),
(20, 3, 1, 'Apakah masih membutuhkan Pekerja?', '2021-08-19 17:26:51', 1, 1),
(21, 3, 1, 'HALO', '2021-08-19 17:30:02', 1, 1),
(22, 3, 1, 'Apakah masih membutuhkan Pekerja?', '2021-08-19 18:03:50', 1, 1),
(23, 3, 1, 'ok', '2021-08-21 23:30:06', 1, 1),
(24, 1, 1, 'halo everyone', '2021-08-30 02:10:57', 1, 1),
(25, 1, 1, 'halo', '2021-08-30 02:11:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_grup`
--

CREATE TABLE `chat_grup` (
  `id_chat_grup` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_kirim` datetime NOT NULL DEFAULT current_timestamp(),
  `chat_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_grup`
--

INSERT INTO `chat_grup` (`id_chat_grup`, `id_grup`, `id_user`, `pesan`, `waktu_kirim`, `chat_aktif`) VALUES
(1, 1, 1, 'halo', '2021-08-30 02:20:32', 1),
(2, 1, 1, 'halo', '2021-08-30 02:20:33', 1),
(3, 1, 1, 'halo', '2021-08-30 02:20:34', 1),
(4, 1, 1, 'halo', '2021-08-30 02:20:34', 1),
(5, 1, 1, 'halo everyone', '2021-08-30 02:25:18', 1),
(6, 1, 1, 'halo everyone', '2021-08-30 02:25:20', 1),
(7, 1, 1, 'halo everyone', '2021-08-30 02:25:21', 1),
(8, 1, 1, 'sa', '2021-08-30 02:26:43', 1),
(9, 1, 1, 'sa', '2021-08-30 02:26:43', 1),
(10, 1, 1, 'sa', '2021-08-30 02:26:43', 1),
(11, 1, 1, 'sa', '2021-08-30 02:26:43', 1),
(12, 1, 1, 'tes', '2021-08-30 02:26:53', 1),
(13, 1, 1, 'tes', '2021-08-30 02:26:54', 1),
(14, 1, 1, 'tes', '2021-08-30 02:26:54', 1),
(15, 1, 1, 'tes', '2021-08-30 02:26:55', 1),
(16, 1, 1, 'tes', '2021-08-30 02:26:55', 1),
(17, 1, 1, 'tes', '2021-08-30 02:26:55', 1),
(18, 1, 1, 'tes', '2021-08-30 02:26:55', 1),
(19, 1, 1, 'tes', '2021-08-30 02:27:39', 1),
(20, 1, 1, 'tes', '2021-08-30 02:27:39', 1),
(21, 1, 1, 'tes', '2021-08-30 02:27:40', 1),
(22, 1, 1, 'tes', '2021-08-30 02:27:40', 1),
(23, 1, 1, 'tes', '2021-08-30 02:27:40', 1),
(24, 1, 1, 'tes', '2021-08-30 02:27:41', 1),
(25, 1, 1, 'halo', '2021-08-30 02:29:39', 1),
(26, 1, 1, 'maaf ya ges', '2021-08-30 02:30:24', 1),
(27, 2, 1, 'tes', '2021-08-30 09:39:39', 1),
(28, 3, 1, 'halo alumni2 Telyu!!!', '2021-08-30 09:42:07', 1),
(29, 1, 3, 'apa weyy!! admin khuntul', '2021-08-30 09:43:33', 1),
(30, 3, 4, 'apaa?', '2021-08-30 09:48:56', 1),
(31, 3, 3, 'Apa wey', '2021-08-30 09:48:56', 1),
(32, 1, 1, 'gua ke Toilet dulu mri', '2021-08-30 09:50:43', 1),
(33, 1, 3, 'oke', '2021-08-30 10:24:32', 1),
(34, 3, 3, 'halo?', '2021-08-30 10:24:39', 1),
(35, 1, 3, 'mantap', '2021-08-30 10:26:10', 1),
(36, 3, 3, 'oke jadi', '2021-08-30 10:26:16', 1),
(37, 3, 1, 'jadi gini loh', '2021-08-30 10:26:36', 1),
(38, 3, 4, 'ini grup apaan?', '2021-08-30 10:28:07', 1),
(39, 3, 1, 'ini grup buat elu', '2021-08-30 10:28:28', 1),
(40, 3, 4, 'apa seh?', '2021-08-30 10:28:36', 1),
(41, 3, 4, 'apa weyy', '2021-08-30 10:28:46', 1),
(42, 3, 4, 'kok gitu sih?', '2021-08-30 10:29:08', 1),
(43, 3, 3, 'kok gitu gimana?', '2021-08-30 10:30:43', 1),
(44, 3, 4, 'aneh gitu chatnya', '2021-08-30 10:30:52', 1),
(45, 3, 1, 'anehnya tuh kek gimana?', '2021-08-30 10:31:03', 1),
(46, 5, 3, 'ini grup apaan?', '2021-08-30 20:46:36', 1),
(47, 5, 3, '', '2021-08-30 20:46:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id_cv` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('','Laki-laki','Perempuan') NOT NULL,
  `id_agama` int(11) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `tinggi` int(4) NOT NULL,
  `berat` int(4) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `keahlian` varchar(150) NOT NULL,
  `sd` varchar(150) NOT NULL,
  `smp` varchar(150) NOT NULL,
  `sma` varchar(150) NOT NULL,
  `universitas` varchar(150) NOT NULL,
  `jurusan` varchar(150) NOT NULL,
  `ijazah_sd` varchar(55) NOT NULL,
  `ijazah_smp` varchar(55) NOT NULL,
  `ijazah_sma` varchar(55) NOT NULL,
  `ijazah_universitas` varchar(55) NOT NULL,
  `transkip_sd` varchar(255) NOT NULL,
  `transkip_smp` varchar(255) NOT NULL,
  `transkip_sma` varchar(255) NOT NULL,
  `transkip_kuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id_cv`, `id_user`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `id_agama`, `gol_darah`, `tinggi`, `berat`, `no_telp`, `id_kota`, `alamat`, `status`, `keahlian`, `sd`, `smp`, `sma`, `universitas`, `jurusan`, `ijazah_sd`, `ijazah_smp`, `ijazah_sma`, `ijazah_universitas`, `transkip_sd`, `transkip_smp`, `transkip_sma`, `transkip_kuliah`) VALUES
(2, 2, 'SLAMET SETIADI RIYANTO', 'Cirebon', '1999-08-11', 'Laki-laki', 1, 'B', 169, 60, 2147483647, 1, 'Perumahan GBA Barat', 'Belum Kawin', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 3, 'Muhammad Aulia Amri', 'Jakarta', '2000-04-20', 'Laki-laki', 1, 'A', 171, 78, 2147483647, 42, 'Jl. Malas mandi', 'Belum Kawin', '', 'SD Swasta', 'SMP Swasta', 'SMA Swasta', 'Universitas Swasta', 'S1 Sistem Informasi', 'foto.jpg', 'ijasah.jpg', 'ijasah.jpg', 'ijasah.jpg', 'resize-pas_158.jpg', '', '', ''),
(4, 4, 'Delvira Nur Zahrah', 'Bandung', '1999-09-01', 'Laki-laki', 1, 'B', 165, 78, 878789545, 1, 'jl. pandai ngoding', 'Kawin', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 25, 'Muhammad Haitsam', 'Madinah', '1999-02-18', 'Laki-laki', 1, 'A', 171, 63, 2147483647, 1, 'Jl. Raya Cilamaya', 'Belum Kawin', 'Ngejoki', 'SDN Mekamarmaya I -2011', 'SMPN 1 Cilamaya Wetan - 2014', 'SMAIT Al-Multazam - 2017', 'Telkom Univesity', 'D3 Sistem Informasi - 2021', 'ijasah.jpg', 'ijasah.jpg', 'ijasah.jpg', 'ijasah.jpg', '', '', '', ''),
(6, 26, 'Dodi', 'Madinah', '0000-00-00', '', 0, '', 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 27, 'Rini Sarlita', 'Duri', '2002-03-25', 'Perempuan', 1, 'AB', 156, 43, 2147483647, 206, 'Duri Aja', 'Belum Kawin', 'Pandai Berbahasa Inggris', 'SDN 1 Mobile Legend', 'SMPN 1 Player Unknown Battle Ground', 'SMAN 1 FreeFire', 'Universitas E-Sport', '', '', '', '', '', '', '', '', ''),
(8, 30, 'Muhammad Shibghotul \'Adalah', 'Tangerang', '1999-07-23', 'Laki-laki', 1, 'AB', 156, 90, 2147483647, 34, 'Tangerang', 'Belum Kawin', 'Pandai Berbahasa Inggris', 'SDN 1 Mobile Legend', 'SMPN 1 Player Unknown Battle Ground', 'SMAIT Fathan Mubina', 'Telkom Univesity', 'D3 Sistem Informasi - 2021', 'foto2.jpg', 'ahaitsam1.jpg', 'foto3.jpg', 'resize-pas_1.jpg', '', '', '', ''),
(9, 31, 'Muhammad Shibghotul \'Adalah', 'Tangerang', '1999-07-23', 'Laki-laki', 1, 'AB', 156, 90, 2147483647, 34, 'Tangerang', 'Belum Kawin', 'Pandai Berbahasa Inggris', 'SDN 1 Mobile Legend', 'SMPN 1 Player Unknown Battle Ground', 'SMAIT Fathan Mubina', 'Telkom Univesity', 'D3 Sistem Informasi - 2021', 'foto4.jpg', 'ahaitsam2.jpg', 'foto5.jpg', 'resize-pas_11.jpg', '', '', '', ''),
(10, 32, 'Muhammad Haitsam', 'Madinah', '1999-02-18', 'Laki-laki', 1, 'A', 171, 63, 2147483647, 42, 'Jl. Umayah', 'Belum Kawin', 'Programmer', 'SDN Mekamarmaya I -2011', 'SMPN 1 Cilamaya Wetan - 2014', 'SMAIT Al-Multazam - 2017', 'Telkom Univesity', 'D3 Sistem Informasi - 2021', 'resize-pas_12.jpg', 'resize-pas_13.jpg', 'resize-pas_14.jpg', 'resize-pas_15.jpg', '', '', '', ''),
(23, 45, 'Muhammad Haitsam', 'Madinah', '1999-02-18', 'Laki-laki', 1, 'A', 171, 63, 2147483647, 42, 'Jl. Raya Cilamaya', 'Belum Kawin', 'Programmer', 'SDN Mekamarmaya I -2011', 'SMPN 1 Cilamaya Wetan - 2014', 'SMAIT Al-Multazam - 2017', 'Universitas Padjadjaran', 'Agroteknologi', 'resize-pas_154.jpg', 'resize-pas_155.jpg', 'resize-pas_156.jpg', 'resize-pas_157.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `id_creator` int(11) NOT NULL,
  `waktu_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`, `gambar`, `id_creator`, `waktu_dibuat`, `is_active`) VALUES
(1, 'Maba Telkom', 'default.png', 1, '2021-08-29 18:22:38', 1),
(2, 'Lowongan aja', 'users.png', 1, '2021-08-30 09:39:31', 1),
(3, 'Rombongan Alumni Telyu', '1200px-Telkom_University_Logo_svg.png', 1, '2021-08-30 09:41:57', 1),
(4, 'oke grup', 'default.png', 1, '2021-08-30 20:34:55', 1),
(5, 'oke cek', 'default.png', 1, '2021-08-30 20:45:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenis_pekerjaan` int(11) NOT NULL,
  `jenis_pekerjaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenis_pekerjaan`, `jenis_pekerjaan`) VALUES
(1, 'Apoteker'),
(2, 'Mekanik Motor'),
(3, 'Mekanik Mobil'),
(4, 'Web Developer'),
(5, 'Frontend Developer'),
(6, 'Backend Developer'),
(7, 'Mobile App Developer'),
(8, 'Game Developer'),
(9, 'Database Administator'),
(10, 'Game Tester'),
(11, 'Security Engineer'),
(12, 'Sistem Analis'),
(13, 'Quality Asurance'),
(14, 'IT Support'),
(15, 'IT Staff'),
(16, 'Statistik Analis dan Data Mining'),
(17, 'Artificial Intelligence'),
(18, 'Sopir'),
(19, 'Kondektur'),
(20, 'Kurir'),
(21, 'Pengepakan Paket'),
(22, 'Penulisan Artikel'),
(23, 'Penulisan Blog'),
(24, 'Penulisan Laporan'),
(25, 'Jurnalistik'),
(26, 'Guru Privat SD'),
(27, 'Guru Privat TK / PAUD'),
(28, 'Guru Privat Matematika SMP'),
(29, 'Guru Privat Biologi SMP'),
(30, 'Guru Privat Fisika SMP'),
(31, 'Guru Privat B.Inggris Dasar'),
(32, 'Guru Privat B.Inggris SMP'),
(33, 'Guru Privat Matematika SMA'),
(34, 'Guru Privat Fisika SMA'),
(35, 'Guru Privat Kimia SMA'),
(36, 'Guru Privat Biologi SMA'),
(37, 'Guru Privat Ekonomi SMA'),
(38, 'Guru Privat Sosiologi SMA'),
(39, 'Guru Privat Sejarah SMA'),
(40, 'Guru Privat B.Inggris SMA'),
(41, 'Entry Data'),
(42, 'Mandor Bangunan'),
(43, 'Tukang Bangunan'),
(44, 'Arsitek'),
(45, 'Surveyor'),
(46, 'Pengendalian Mutu (Quality Control)'),
(47, 'Fasilitator'),
(48, 'Periklanan'),
(49, 'Pemasaran Sosial Media'),
(50, 'Pemasaran Afiliasi'),
(51, 'Sales'),
(52, 'SPG (Sales Promotion Girl)'),
(53, 'SPB (Sales Promotion Boy)'),
(54, 'Reseller'),
(55, 'Dropshipper'),
(56, 'Fotografer'),
(57, 'Videografer'),
(58, 'Desain Animasi 3D / 4D'),
(59, 'Desain Grafis'),
(60, 'Desain UI / UX'),
(61, 'Video editor'),
(62, 'Produk Desain'),
(63, 'Desain Interior'),
(64, 'Pelayan Cafe'),
(65, 'Pelayan Rumah Makan (Restoran)'),
(66, 'Juru Masak'),
(67, 'Pembantu Rumah Tangga ');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_jenis_pekerjaan` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pengalaman` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_lowongan`, `id_jenis_pekerjaan`, `id_pendidikan`, `id_pengalaman`, `id_kota`) VALUES
(1, 1, 3, 7, 5, 222),
(2, 2, 12, 7, 4, 222),
(3, 3, 15, 4, 2, 42),
(4, 4, 66, 6, 1, 89),
(5, 5, 4, 6, 2, 42),
(6, 6, 64, 3, 3, 42);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_keahlian`
--

CREATE TABLE `kategori_keahlian` (
  `id_kategori_keahlian` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_keahlian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_keahlian`
--

INSERT INTO `kategori_keahlian` (`id_kategori_keahlian`, `id_kategori`, `id_keahlian`) VALUES
(13, 3, 9),
(14, 3, 10),
(15, 3, 12),
(16, 3, 13),
(17, 3, 19),
(18, 3, 27),
(19, 4, 1),
(20, 4, 2),
(21, 4, 5),
(40, 2, 1),
(41, 2, 3),
(42, 2, 4),
(43, 2, 9),
(44, 2, 10),
(45, 2, 12),
(46, 2, 13),
(47, 2, 15),
(48, 2, 18),
(49, 2, 19),
(50, 2, 21),
(51, 5, 1),
(52, 5, 5),
(53, 5, 9),
(54, 5, 12),
(55, 1, 5),
(56, 6, 3),
(57, 6, 38),
(58, 6, 42);

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `keahlian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `keahlian`) VALUES
(1, 'Mampu berpikir kritis'),
(2, 'Mengetahui Jenis Obat dan Dosis'),
(3, 'Mampu berkomunikasi yang baik'),
(4, 'Menguasai Bahasa Inggris'),
(5, 'Menguasai Berbahasa Jerman'),
(6, 'Menguasai Bahasa Korea Selatan'),
(7, 'Menguasai Bahasa Cina'),
(8, 'Menguasai Bahasa Perancis'),
(9, 'Menguasai Bahasa Pemrograman PHP'),
(10, 'Menguasai Bahasa Pemrograman Phyton '),
(11, 'Menguasai Bahasa Pemrograman C'),
(12, 'Menguasai Bahasa Pemrograman C#'),
(13, 'Menguasai Bahasa Pemrograman Java'),
(14, 'Menguasai Bahasa Pemrograman javascript'),
(15, 'Menguasai Bahasa Pemrograman Kotlin'),
(16, 'Menguasai Bahasa Pemrograman Ruby'),
(17, 'Menguasai Bahasa Pemrograman Matlab'),
(18, 'Menguasai Adobe Photoshop'),
(19, 'Menguasai Adobe Illustrator'),
(20, 'Menguasai Adobe Premiere'),
(21, 'Menguasai Adobe XD'),
(22, 'Menguasai CorelDraw'),
(23, 'Menguasai ArchiCAD'),
(24, 'Menguasai Chief Architect'),
(25, 'Menguasai AutoCAD Architecture'),
(26, 'Menguasai Vectorworks Architecture'),
(27, 'Menguasai bongkar pasang mesin dan sparepart motor'),
(28, 'Menguasai bongkar pasang mesin dan sparepart mobil'),
(29, 'Menguasai Microsoft Office'),
(30, 'Mampu berbicara di depan umum dengan baik'),
(31, 'Menguasai pengetahuan dan wawasan luas terkait lalu lintas'),
(32, 'Mampu menjelaskan materi pelajaran dengan baik dan benar'),
(33, 'Mampu mengawasi dan mengatur dengan baik'),
(34, 'Menguasai pekerjaan konstruksi proyek'),
(35, 'Mampu berpikir kreatif dan imajinatif'),
(36, 'Menguasai industri konstruksi dalam perencanaan'),
(37, 'Menguasai perhitungan pengukuran tanah dan alat survey konstruksi'),
(38, 'Mampu bekerja dalam tim'),
(39, 'Mampu melakukan inpseksi visual terhadap kualitas konstruksi'),
(40, 'mampu mengatasi masalah dan mengambil keputusan yang sulit'),
(41, 'Mampu menganalisis data'),
(42, 'Memasak ');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian_freelance`
--

CREATE TABLE `keahlian_freelance` (
  `id_keahlian_freelance` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `id_keahlian` int(11) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keahlian_freelance`
--

INSERT INTO `keahlian_freelance` (`id_keahlian_freelance`, `id_cv`, `id_keahlian`, `sertifikat`, `tahun`, `keterangan`) VALUES
(6, 3, 6, 'Pantia_Bedah_PA_Muhammad_Haitsam.png', 2018, '');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_lowongan`
--

CREATE TABLE `komentar_lowongan` (
  `id_komentar` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_post` datetime NOT NULL DEFAULT current_timestamp(),
  `komentar` text NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_lowongan`
--

INSERT INTO `komentar_lowongan` (`id_komentar`, `id_lowongan`, `id_user`, `waktu_post`, `komentar`, `aktif`) VALUES
(1, 1, 3, '2021-08-29 02:44:48', 'Lowongannya bagus', 1),
(2, 1, 1, '2021-08-29 03:10:33', 'oke', 1),
(3, 1, 1, '2021-08-29 03:11:20', 'oke', 1),
(6, 1, 3, '2021-08-29 03:26:16', 'cek dulu aja', 1),
(8, 1, 4, '2021-08-30 10:33:12', 'gua mau ikut komen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `kota` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `kota`) VALUES
(1, 1, 'Kota Banda Aceh'),
(2, 1, 'Kota Langsa'),
(3, 1, 'Kota Lhokseumawe'),
(4, 1, 'Kota Sabang'),
(5, 1, 'Kota Subulussalam'),
(6, 2, 'Kota Binjai'),
(7, 2, 'Kota Gunungsitoli'),
(8, 2, 'Kota Medan'),
(9, 2, 'Kota Padang Sidempuan'),
(10, 2, 'Kota Pematang Siantar'),
(11, 2, 'Kota Sibolga'),
(12, 2, 'Kota TanjungBalai'),
(13, 2, 'Kota Tebing Tinggi'),
(14, 8, 'Kota Lubuklinggau'),
(15, 3, 'Kota Bukittinggi'),
(16, 3, 'Kota Padang'),
(17, 3, 'Kota Padang Panjang'),
(18, 3, 'Kota Pariaman'),
(19, 3, 'Kota Payakumbuh'),
(20, 3, 'Kota Sawahlunto'),
(21, 3, 'Kota Solok'),
(22, 8, 'Kota Pagar Alam'),
(23, 8, 'Kota Palembang'),
(24, 8, 'Kota Prabumulih'),
(25, 8, 'Kota Sungai Penuh'),
(26, 6, 'Kota Jambi'),
(27, 5, 'Kota Batam'),
(28, 5, 'Kota Tanjungpinang'),
(29, 10, 'Kota Bandar Lampung'),
(30, 10, 'Kota Metro'),
(31, 9, 'Kota Pangkalpinang'),
(32, 12, 'Kota Cilegon'),
(33, 12, 'Kota Serang'),
(34, 12, 'Kota Tanggerang'),
(35, 12, 'Kota Tanggerang Selatan'),
(36, 7, 'Kota Bengkulu'),
(37, 11, 'Kota Jakarta Pusat'),
(38, 11, 'Kota Jakarta Barat'),
(39, 11, 'Kota Jakarta Selatan'),
(40, 11, 'Kota Jakarta Timur'),
(41, 11, 'Kota Jakarta Utara'),
(42, 13, 'Kota Bandung'),
(43, 13, 'Kota Bekasi'),
(44, 13, 'Kota Bogor'),
(45, 13, 'Kota Cimahi'),
(46, 13, 'Kota Cirebon'),
(47, 13, 'Kota Depok'),
(48, 13, 'Kota Sukabumi'),
(49, 13, 'Kota Tasikmalaya'),
(50, 13, 'Kota Banjar'),
(51, 14, 'Kota Magelang'),
(52, 14, 'Kota Pekalongan'),
(53, 14, 'Kota Salatiga'),
(54, 14, 'Kota Semarang'),
(55, 14, 'Kota Surakarta'),
(56, 14, 'Kota Tegal'),
(57, 15, 'Kota Yogyakarta'),
(58, 16, 'Kota Batu'),
(59, 16, 'Kota Blitar'),
(60, 16, 'Kota Kediri'),
(61, 16, 'Kota Madiun'),
(62, 16, 'Kota Malang'),
(63, 16, 'Kota Mojokerto'),
(64, 16, 'Kota Pasuruan'),
(65, 16, 'Kota Probolinggo'),
(66, 16, 'Kota Surabaya'),
(67, 20, 'Kota Pontianak'),
(68, 20, 'Kota Singkawang'),
(69, 23, 'Kota Banjarbaru'),
(70, 23, 'Kota Banjarmasin'),
(71, 22, 'Kota Palangkaraya'),
(72, 21, 'Kota Balikpapan'),
(73, 21, 'Kota Bontang'),
(74, 21, 'Kota Samarinda'),
(75, 24, 'Kota Tarakan'),
(76, 29, 'Kota Makassar'),
(77, 29, 'Kota Palopo'),
(78, 29, 'Kota Parepare'),
(79, 27, 'Kota Palu'),
(80, 30, 'Kota Baubau'),
(81, 30, 'Kota Kendari'),
(82, 25, 'Kota Bitung'),
(83, 25, 'Kota Kotamobagu'),
(84, 25, 'Kota Manado'),
(85, 25, 'Kota Tomohon'),
(86, 17, 'Kota Denpasar'),
(87, 18, 'Kota Bima'),
(88, 18, 'Kota Mataram'),
(89, 17, 'Kota Kupang'),
(90, 31, 'Kota Ternate'),
(91, 31, 'Kota Tidore Kepulauan'),
(92, 32, 'Kota Ambon'),
(93, 32, 'Kota Tual'),
(94, 33, 'Kota Sorong'),
(95, 34, 'Kota Jayapura'),
(96, 1, 'Kabupaten Aceh Barat Daya'),
(97, 1, 'Kabupaten Aceh Barat'),
(98, 1, 'Kabupaten Aceh Besar'),
(99, 1, 'Kabupaten Aceh Jaya'),
(100, 1, 'Kabupaten Aceh Selatan'),
(101, 1, 'Kabupaten Aceh Singkil'),
(102, 1, 'Kabupaten Aceh Tamiang'),
(103, 1, 'Kabupaten Aceh Tengah'),
(104, 1, 'Kabupaten Aceh Tenggara'),
(105, 1, 'Kabupaten Aceh Timur'),
(106, 1, 'Kabupaten Aceh Utara'),
(107, 1, 'Kabupaten Bener Meriah'),
(108, 1, 'Kabupaten Bireuen'),
(109, 1, 'Kabupaten Gayo Lues'),
(110, 1, 'Kabupaten Nagan Raya'),
(111, 1, 'Pidie Jaya'),
(112, 1, 'Pidie'),
(113, 1, 'Kabupaten Simeulue'),
(114, 3, 'Kabupaten Agam'),
(115, 3, 'Kabupaten Dharmasraya'),
(116, 3, 'Kabupaten Kepulauan Mentawai'),
(117, 3, 'Kabupaten Lima Puluh Kota'),
(118, 3, 'Kabupaten Padang Pariaman'),
(119, 3, 'Kabupaten Pasaman Barat'),
(120, 3, 'Kabupaten Pasaman'),
(121, 3, 'Kabupaten Pesisir Selatan'),
(122, 3, 'Kabupaten sijunjung'),
(123, 3, 'Kabupaten Solok Selatan'),
(124, 3, 'Kabupaten Solok'),
(125, 3, 'Kabupaten Tanah Datar'),
(126, 8, 'Kabupaten Banyuasin'),
(127, 8, 'Kabupaten Empat Lawang'),
(128, 8, 'Kabupaten Lahat'),
(129, 8, 'Kabupaten Muara Enim '),
(130, 8, 'Kabupaten Musi Banyuasin'),
(131, 8, 'Kabupaten Musi Rawas'),
(132, 8, 'Kabupaten Musi Rawas Utara'),
(133, 8, 'Kabupaten Ogan Ilir'),
(134, 8, 'Kabupaten Komering Ilir'),
(135, 8, 'Kabupaten Ogan Komering Ulu Selatan'),
(136, 8, 'Kabupaten Ogan Komering Ulu Timur'),
(137, 8, 'Kabupaten Ogan Komering Ulu'),
(138, 8, 'Kabupaten Penukal Abab Lematang Ilir'),
(139, 2, 'Kabupaten Asahan'),
(140, 2, 'Kabupaten Batubara'),
(141, 2, 'Kabupaten Dairi'),
(142, 2, 'Kabupaten Deli Serdang'),
(143, 2, 'Kabupaten Humbang Hasundutan'),
(144, 2, 'Kabupaten Karo'),
(145, 2, 'Kabupaten Labuhanbatu Selatan'),
(146, 2, 'Kabupaten Labuhanbatu Utara'),
(147, 2, 'Kabupaten Labuhanbatu'),
(148, 2, 'Kabupaten Langkat'),
(149, 2, 'Kabupaten Mandailing Natal'),
(150, 2, 'Kabupaten Nias Barat'),
(151, 2, 'Kabupaten Nias Selatan'),
(152, 2, 'Kabupaten Nias Utara'),
(153, 2, 'Kabupaten Nias'),
(154, 2, 'Kabupaten Padang Lawas Utara'),
(155, 2, 'Kabupaten Padang Lawas'),
(156, 2, 'Kabupaten Pakpak Bharat'),
(157, 2, 'Kabupaten Samosir'),
(158, 2, 'Kabupaten Serdang Bedagai'),
(159, 2, 'Kabupaten Simalungun'),
(160, 2, 'Kabupaten Tapanuli Selatan'),
(161, 2, 'Kabupaten Tapanuli Tengah'),
(162, 2, 'Kabupaten Tapanuli Utara'),
(163, 2, 'Kabupaten Toba Samosir'),
(164, 7, 'Kabupaten Bengkulu Selatan'),
(165, 7, 'Kabupaten Bengkulu Tengah'),
(166, 7, 'Kabupaten Bengkulu Utara'),
(167, 7, 'Kabupaten Kaur'),
(168, 7, 'Kabupaten Kepahiang'),
(169, 7, 'Kabupaten Lebong'),
(170, 7, 'Kabupaten Mukomuko'),
(171, 7, 'Kabupaten Rejang Lebong'),
(172, 7, 'Kabupaten Seluma'),
(173, 6, 'Kabupaten Batanghari'),
(174, 6, 'Kabupaten Bungo'),
(175, 6, 'Kabupaten Kerinci'),
(176, 6, 'Kabupaten Merangin'),
(177, 6, 'Kabupaten Muaro Jambi'),
(178, 6, 'Kabupaten Sarolangun'),
(179, 6, 'Kabupaten Tanjung Jabung Barat'),
(180, 6, 'Kabupaten Tanjung Jabung Timur'),
(181, 6, 'Kabupaten Tebo'),
(182, 9, 'Kabupaten Bangka Barat'),
(183, 9, 'Kabupaten Bangka Selatan'),
(184, 9, 'Kabupaten Bangka Tengah'),
(185, 9, 'Kabupaten Bangka'),
(186, 9, 'Kabupaten Belitung Timur'),
(187, 9, 'Kabupaten Belitung'),
(188, 5, 'Kabupaten Bintan'),
(189, 5, 'Kabupaten Karimun'),
(190, 5, 'Kabupaten Kepulauan Anambas'),
(191, 5, 'Kabupaten Lingga'),
(192, 5, 'Kabupaten Natuna'),
(193, 10, 'Kabupaten Lampung Barat'),
(194, 10, 'Kabupaten Lampung Selatan'),
(195, 10, 'Kabupaten Lampung Tengah'),
(196, 10, 'Kabupaten Lampung Timur'),
(197, 10, 'Kabupaten Lampung Utara'),
(198, 10, 'Kabupaten Mesuji'),
(199, 10, 'Kabupaten Pesawaran'),
(200, 10, 'Kabupaten Pesisir Barat'),
(201, 10, 'Kabupaten Pringsewu'),
(202, 10, 'Kabupaten Tanggamus'),
(203, 10, 'Kabupaten Tulang Bawang Barat'),
(204, 10, 'Kabupaten Tulang Bawang'),
(205, 10, 'Kabupaten Way Kanan'),
(206, 4, 'Kabupaten Bengkalis'),
(207, 4, 'Kabupaten Indragiri Hilir'),
(208, 4, 'Kabupaten Indragiri Hulu'),
(209, 4, 'Kabupaten Kampar'),
(210, 4, 'Kabupaten Kepulauan Meranti'),
(211, 4, 'Kabupaten Kuantan Singingi'),
(212, 4, 'Kabupaten Pelalawan'),
(213, 4, 'Kabupaten Rokan Hilir'),
(214, 4, 'Kabupaten Rokan Hulu'),
(215, 4, 'Kabupaten Siak'),
(216, 12, 'Kabupaten Lebak'),
(217, 12, 'Kabupaten Pandeglang'),
(218, 12, 'Kabupaten Serang'),
(219, 12, 'Kabupaten Tangerang'),
(220, 11, 'Kabupaten Administrasi Kepulauan Seribu'),
(221, 13, 'Kabupaten Bandung Barat'),
(222, 13, 'Kabupaten Bandung'),
(223, 13, 'Kabupaten Bekasi'),
(224, 13, 'Kabupaten Bogor'),
(225, 13, 'Kabupaten Ciamis'),
(226, 13, 'Kabupaten Cianjur'),
(227, 13, 'Kabupaten Cirebon'),
(228, 13, 'Kabupaten Garut'),
(229, 13, 'Kabupaten Indramayu'),
(230, 13, 'Kabupaten Karawang'),
(231, 13, 'Kabupaten Kuningan'),
(232, 13, 'Kabupaten Majalengka'),
(233, 13, 'Kabupaten Pangandaran'),
(234, 13, 'Kabupaten Purwakarta'),
(235, 13, 'Kabupaten Subang'),
(236, 13, 'Kabupaten Sukabumi'),
(237, 13, 'Kabupaten Sumedang'),
(238, 13, 'Kabupaten Tasikmalaya'),
(239, 14, 'Kabupaten Banjarnegara'),
(240, 14, 'Kabupaten Banyumas'),
(241, 14, 'Kabupaten Batang'),
(242, 14, 'Kabupaten Blora'),
(243, 14, 'Kabupaten Boyolali'),
(244, 14, 'Kabupaten Brebes'),
(245, 14, 'Kabupaten Cilacap'),
(246, 14, 'Kabupaten Demak'),
(247, 14, 'Kabupaten Grobogan'),
(248, 14, 'Kabupaten Jepara'),
(249, 14, 'Kabupaten Karanganyar'),
(250, 14, 'Kabupaten Kebumen'),
(251, 14, 'Kabupaten Kendal'),
(252, 14, 'Kabupaten Klaten'),
(253, 14, 'Kabupaten Kudus'),
(254, 14, 'Kabupaten Magelang'),
(255, 14, 'Kabupaten Pati'),
(256, 14, 'Kabupaten Pekalongan'),
(257, 14, 'Kabupaten Pemalang'),
(258, 14, 'Kabupaten Purbalingga'),
(259, 14, 'Kabupaten Purworejo'),
(260, 14, 'Kabupaten Rembang'),
(261, 14, 'Kabupaten Semarang'),
(262, 14, 'Kabupaten Sragen'),
(263, 14, 'Kabupaten Sukoharjo'),
(264, 14, 'Kabupaten Tegal'),
(265, 14, 'Kabupaten Temanggung'),
(266, 14, 'Kabupaten Wonogiri'),
(267, 14, 'Kabupaten Wonosobo'),
(268, 15, 'Kabupaten Bantul'),
(269, 15, 'Kabupaten Gunung Kidul'),
(270, 15, 'Kabupaten Kulon Progo'),
(271, 15, 'Kabupaten Sleman'),
(272, 16, 'Kabupaten Bangkalan'),
(273, 16, 'Kabupaten Banyuwangi'),
(274, 16, 'Kabupaten Blitar'),
(275, 16, 'Kabupaten Bojonegoro'),
(276, 16, 'Kabupaten Bondowoso'),
(277, 16, 'Kabupaten Gresik'),
(278, 16, 'Kabupaten Jember'),
(279, 16, 'Kabupaten Jombang'),
(280, 16, 'Kabupaten Kediri'),
(281, 16, 'Kabupaten Lamongan'),
(282, 16, 'Kabupaten Lumajang'),
(283, 16, 'Kabupaten Madiun'),
(284, 16, 'Kabupaten Magetan'),
(285, 16, 'Kabupaten Malang'),
(286, 16, 'Kabupaten Mojokerto'),
(287, 16, 'Kabupaten Nganjuk'),
(288, 16, 'Kabupaten Ngawi'),
(289, 16, 'Kabupaten Pacitan'),
(290, 16, 'Kabupaten Pamekasan'),
(291, 16, 'Kabupaten Pasuruan'),
(292, 16, 'Kabupaten Ponorogo'),
(293, 16, 'Kabupaten Probolinggo'),
(294, 16, 'Kabupaten Sampang'),
(295, 16, 'Kabupaten Sidoarjo'),
(296, 16, 'Kabupaten Situbondo'),
(297, 16, 'Kabupaten Sumenep'),
(298, 16, 'Kabupaten Trenggalek'),
(299, 16, 'Kabupaten Tuban'),
(300, 16, 'Kabupaten Tulungagung'),
(301, 17, 'Kabupaten Badung'),
(302, 17, 'Kabupaten Bangli'),
(303, 17, 'Kabupaten Buleleng'),
(304, 17, 'Kabupaten Gianyar'),
(305, 17, 'Kabupaten Jembrana'),
(306, 17, 'Kabupaten Karangasem'),
(307, 17, 'Kabupaten Klungkung'),
(308, 17, 'Kabupaten Tabanan'),
(309, 18, 'Kabupaten Bima'),
(310, 18, 'Kabupaten Dompu'),
(311, 18, 'Kabupaten Lombok Barat'),
(312, 18, 'Kabupaten Lombok Tengah'),
(313, 18, 'Kabupaten Lombok Timur'),
(314, 18, 'Kabupaten Lombok Utara'),
(315, 18, 'Kabupaten Sumbawa Barat'),
(316, 18, 'Kabupaten Sumbawa'),
(317, 19, 'Kabupaten Alor'),
(318, 19, 'Kabupaten Belu'),
(319, 19, 'Kabupaten Ende'),
(320, 19, 'Kabupaten Flores Timur'),
(321, 19, 'Kabupaten Kupang'),
(322, 19, 'Kabupaten Lembata'),
(323, 19, 'Kabupaten Malaka'),
(324, 19, 'Kabupaten Manggarai Barat'),
(325, 19, 'Kabupaten Manggarai Timur'),
(326, 19, 'Kabupaten Manggarai'),
(327, 19, 'Kabupaten Nagekeo'),
(328, 19, 'Kabupaten Ngada'),
(329, 19, 'Kabupaten Rote Ndao'),
(330, 19, 'Kabupaten Sabu Raijua'),
(331, 19, 'Kabupaten Sikka'),
(332, 19, 'Kabupaten Sumba Barat Daya'),
(333, 19, 'Kabupaten Sumba Barat'),
(334, 19, 'Kabupaten Sumba Tengah'),
(335, 19, 'Kabupaten Sumba Timur'),
(336, 19, 'Kabupaten Timor Tengah Selatan'),
(337, 19, 'Kabupaten Timor Tengah Utara'),
(338, 20, 'Kabupaten Bengkayang'),
(339, 20, 'Kabupaten Kapuas Hulu'),
(340, 20, 'Kabupaten Kayong Utara'),
(341, 20, 'Kabupaten Ketapang'),
(342, 20, 'Kabupaten Kubu Raya'),
(343, 20, 'Kabupaten Landak'),
(344, 20, 'Kabupaten Melawi'),
(345, 20, 'Kabupaten Mempawah'),
(346, 20, 'Kabupaten Sambas'),
(347, 20, 'Kabupaten Sanggau'),
(348, 20, 'Kabupaten Sekadau'),
(349, 20, 'Kabupaten Sintang'),
(350, 23, 'Kabupaten Balangan'),
(351, 23, 'Kabupaten Banjar'),
(352, 23, 'Kabupaten Barito Kuala'),
(353, 23, 'Kabupaten Hulu Sungai Selatan'),
(354, 23, 'Kabupaten Hulu Sungai Tengah'),
(355, 23, 'Kabupaten Hulu Sungai Utara'),
(356, 23, 'Kabupaten Kotabaru'),
(357, 23, 'Kabupaten Tabalong'),
(358, 23, 'Kabupaten Tanah Bumbu'),
(359, 23, 'Kabupaten Tanah Laut'),
(360, 23, 'Kabupaten Tapin'),
(361, 22, 'Kabupaten Barito Selatan'),
(362, 22, 'Kabupaten Barito Timur'),
(363, 22, 'Kabupaten Barito Utara'),
(364, 22, 'Kabupaten Gunung Mas'),
(365, 22, 'Kabupaten Kapuas'),
(366, 22, 'Kabupaten Katingan'),
(367, 22, 'Kabupaten Kotawaringin Barat'),
(368, 22, 'Kabupaten Kotawaringin Timur'),
(369, 22, 'Kabupaten Lamandau'),
(370, 22, 'Kabupaten Murung Raya'),
(371, 22, 'Kabupaten Pulang Pisau'),
(372, 22, 'Kabupaten Seruyan'),
(373, 22, 'Kabupaten Sukamara'),
(374, 21, 'Kabupaten Berau'),
(375, 21, 'Kabupaten Kutai Barat'),
(376, 21, 'Kabupaten Kutai Kartanegara'),
(377, 21, 'Kabupaten Kutai Timur'),
(378, 21, 'Kabupaten Mahakam Ulu'),
(379, 21, 'Kabupaten Paser'),
(380, 21, 'Kabupaten Penajam Paser Utara'),
(381, 24, 'Kabupaten Bulungan'),
(382, 24, 'Kabupaten Malinau'),
(383, 24, 'Kabupaten Nunukan'),
(384, 24, 'Kabupaten Tana Tidung'),
(385, 28, 'Kabupaten Majene'),
(386, 28, 'Kabupaten Mamasa'),
(387, 28, 'Kabupaten Mamuju'),
(388, 28, 'Kabupaten Mamuju Tengah'),
(389, 28, 'Kabupaten Mamuju Utara'),
(390, 28, 'Kabupaten Polewali Mandar'),
(391, 29, 'Kabupaten Bantaeng'),
(392, 29, 'Kabupaten Majene'),
(393, 29, 'Kabupaten Mamasa'),
(394, 29, 'Kabupaten Mamuju'),
(395, 29, 'Kabupaten Mamuju Tengah'),
(396, 29, 'Kabupaten Mamuju Utara'),
(397, 29, 'Kabupaten Polewali Mandar'),
(398, 29, 'Kabupaten Bantaeng'),
(399, 29, 'Kabupaten Barru'),
(400, 29, 'Kabupaten Bone'),
(401, 29, 'Kabupaten Bulukumba'),
(402, 29, 'Kabupaten Enrekang'),
(403, 29, 'Kabupaten Gowa'),
(404, 29, 'Kabupaten Jeneponto'),
(405, 29, 'Kabupaten Kepulauan Selayar'),
(406, 29, 'Kabupaten Luwu'),
(407, 29, 'Kabupaten Luwu Timur'),
(408, 29, 'Kabupaten Luwu Utara'),
(409, 29, 'Kabupaten Maros'),
(410, 29, 'Kabupaten Pangkajene dan Kepulauan'),
(411, 29, 'Kabupaten Pinrang'),
(412, 29, 'Kabupaten Sidenreng Rappang'),
(413, 29, 'Kabupaten Sinjai'),
(414, 29, 'Kabupaten Soppeng'),
(415, 29, 'Kabupaten Takalar'),
(416, 29, 'Kabupaten Tana Toraja'),
(417, 29, 'Kabupaten Toraja Utara'),
(418, 29, 'Kabupaten Wajo'),
(419, 29, 'Kabupaten Banggai'),
(420, 29, 'Kabupaten Banggai Kepulauan'),
(421, 29, 'Kabupaten Banggai Laut'),
(422, 27, 'Kabupaten Buol'),
(423, 27, 'Kabupaten Donggala'),
(424, 27, 'Kabupaten Morowali'),
(425, 27, 'Kabupaten Morowali Utara'),
(426, 27, 'Kabupaten Parigi Moutong'),
(427, 27, 'Kabupaten Poso'),
(428, 27, 'Kabupaten Sigi'),
(429, 27, 'Kabupaten Tojo Una-Una'),
(430, 27, 'Kabupaten Toli-Toli'),
(431, 30, 'Kabupaten Bombana'),
(432, 30, 'Kabupaten Buton'),
(433, 30, 'Kabupaten Buton Selatan'),
(434, 30, 'Kabupaten Buton Tengah'),
(435, 30, 'Kabupaten Buton Utara'),
(436, 30, 'Kabupaten Kolaka'),
(437, 30, 'Kabupaten Kolaka Timur'),
(438, 30, 'Kabupaten Kolaka Utara'),
(439, 30, 'Kabupaten Konawe Kepulauan'),
(440, 30, 'Kabupaten Konawe Selatan'),
(441, 30, 'Kabupaten Konawe Utara'),
(442, 30, 'Kabupaten Konawe'),
(443, 30, 'Kabupaten Muna'),
(444, 30, 'Kabupaten Muna Barat'),
(445, 30, 'Kabupaten Wakatobi'),
(446, 25, 'Kabupaten Bolaang Mongondow'),
(447, 25, 'Kabupaten Bolaang Mongondow Selatan'),
(448, 25, 'Kabupaten Bolaang Mongondow Timur'),
(449, 25, 'Kabupaten Bolaang Mongondow Utara'),
(450, 25, 'Kabupaten Kepulauan Sangihe'),
(451, 25, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(452, 25, 'Kabupaten Kepulauan Talaud'),
(453, 25, 'Kabupaten Minahasa'),
(454, 25, 'Kabupaten Minahasa Selatan'),
(455, 25, 'Kabupaten Minahasa Tenggara'),
(456, 25, 'Kabupaten Minahasa Utara'),
(457, 32, 'Kabupaten Buru Selatan'),
(458, 32, 'Kabupaten Buru'),
(459, 32, 'Kabupaten Kepulauan Aru'),
(460, 32, 'Kabupaten Maluku Barat Daya'),
(461, 32, 'Kabupaten Maluku Tengah'),
(462, 32, 'Kabupaten Maluku Tenggara Barat'),
(463, 32, 'Kabupaten Maluku Tenggara'),
(464, 32, 'Kabupaten Seram Bagian Barat'),
(465, 32, 'Kabupaten Seram Bagian Timur'),
(466, 31, 'Kabupaten Halmahera Barat'),
(467, 31, 'Kabupaten Halmahera Selatan'),
(468, 31, 'Kabupaten Halmahera Tengah'),
(469, 31, 'Kabupaten Halmahera Timur'),
(470, 31, 'Kabupaten Halmahera Utara'),
(471, 31, 'Kabupaten Kepulauan Sula'),
(472, 31, 'Kabupaten Pulau Morotai'),
(473, 31, 'Kabupaten Pulau Taliabu'),
(474, 34, 'Kabupaten Asmat'),
(475, 34, 'Kabupaten Biak Numfor'),
(476, 34, 'Kabupaten Boven Digoel'),
(477, 34, 'Kabupaten Deiyai'),
(478, 34, 'Kabupaten Dogiyai'),
(479, 34, 'Kabupaten Intan Jaya'),
(480, 34, 'Kabupaten Jayapura'),
(481, 34, 'Kabupaten Jayawijaya'),
(482, 34, 'Kabupaten Keerom'),
(483, 34, 'Kabupaten Kepulauan Yapen'),
(484, 34, 'Kabupaten Lanny Jaya'),
(485, 34, 'Kabupaten Mamberamo Raya'),
(486, 34, 'Kabupaten Mamberamo Tengah'),
(487, 34, 'Kabupaten Mappi'),
(488, 34, 'Kabupaten Merauke'),
(489, 34, 'Kabupaten Mimika'),
(490, 34, 'Kabupaten Nabire'),
(491, 34, 'Kabupaten Nduga'),
(492, 34, 'Kabupaten Paniai'),
(493, 34, 'Kabupaten Pegunungan Bintang'),
(494, 34, 'Kabupaten Puncak Jaya'),
(495, 34, 'Kabupaten Puncak'),
(496, 34, 'Kabupaten Sarmi'),
(497, 34, 'Kabupaten Supiori'),
(498, 34, 'Kabupaten Tolikara'),
(499, 34, 'Kabupaten Waropen'),
(500, 34, 'Kabupaten Yahukimo'),
(501, 34, 'Kabupaten Yalimo'),
(502, 33, 'Kabupaten Fakfak'),
(503, 33, 'Kabupaten Kaimana'),
(504, 33, 'Kabupaten Manokwari'),
(505, 33, 'Kabupaten Manokwari Selatan'),
(506, 33, 'Kabupaten Maybrat'),
(507, 33, 'Kabupaten Pegunungan Arfak'),
(508, 33, 'Kabupaten Raja Ampat'),
(509, 33, 'Kabupaten Sorong'),
(510, 33, 'Kabupaten Sorong Selatan'),
(511, 33, 'Kabupaten Tambrauw'),
(512, 33, 'Kabupaten Teluk Bintuni'),
(513, 33, 'Kabupaten Teluk Wondama');

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `id_kuliah` int(11) NOT NULL,
  `id_cv` int(11) NOT NULL,
  `id_Jenjang_pendidikan` int(11) NOT NULL,
  `universitas` varchar(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `transkip_nilai` varchar(255) NOT NULL,
  `tahun_lulusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuliah`
--

INSERT INTO `kuliah` (`id_kuliah`, `id_cv`, `id_Jenjang_pendidikan`, `universitas`, `fakultas`, `prodi`, `ijazah`, `transkip_nilai`, `tahun_lulusan`) VALUES
(1, 3, 6, 'Telkom University', 'Ilmu Terapan', 'D3 Sistem Informasi', 'ijazah.pdf', 'ijazah.pdf', 2021),
(2, 3, 7, 'Institut Teknologi Bandung', 'Sekolah Teknik Elektro dan Informatika', 'S1 Teknik Informatika', 'default.pdf', 'default.pdf', 2024),
(3, 3, 9, 'Universitas Diponegoro', 'Informatika', 'S3 Informatika', 'Form_Revisi_Sidang_Delvira(1).pdf', 'Form_Revisi_Sidang_Delvira(1)1.pdf', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_perusahaan` int(255) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL,
  `gaji_minimal` float(15,2) NOT NULL,
  `gaji_maksimal` float(15,2) NOT NULL,
  `max_calon_pegawai` int(255) NOT NULL,
  `tgl_buat` date NOT NULL,
  `batas_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_perusahaan`, `judul`, `deskripsi`, `persyaratan`, `gaji_minimal`, `gaji_maksimal`, `max_calon_pegawai`, `tgl_buat`, `batas_tgl`) VALUES
(1, 4, 'Dicari HRD', 'HRD adalah', 'Harus Kaya', 4000000.00, 10000000.00, 3, '2021-07-24', '2022-04-24'),
(2, 4, 'Sistem Analis :)', 'Menganalisa', 'Muka ga pas pasan', 0.00, 0.00, 3, '2021-07-24', '2021-07-26'),
(3, 4, 'Tenaga IT', 'Proyek', 'Di bawah umur', 0.00, 0.00, 50, '2021-07-24', '2021-08-07'),
(4, 4, 'Internship', 'Oke', 'Oke', 0.00, 0.00, 15, '2021-07-24', '2021-07-31'),
(5, 4, 'Programmin', 'Membangun Sebuah Website Yang Bagus', 'Tekun, Rajin Belajar', 0.00, 0.00, 2, '2021-07-28', '2021-07-29'),
(6, 4, 'Barista', 'Menjadi Barista', 'Tinggi > 160 cm', 800000.00, 2000000.00, 3, '2021-05-09', '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak/Belum Tamat SD'),
(2, 'Tamat SD/Sederajat'),
(3, 'Tamat SLTP/Sederajat'),
(4, 'Tamat SLTA/Sederajat'),
(5, 'Tamat D1/D2'),
(6, 'Tamat Akademi/D3'),
(7, 'Tamat D4/S1'),
(8, 'Tamat S2'),
(9, 'Tamat S3');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id_pengalaman` int(11) NOT NULL,
  `pengalaman` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id_pengalaman`, `pengalaman`) VALUES
(1, 'Internship'),
(2, 'Fresh Graduate'),
(3, '> 1 tahun'),
(4, '> 2 tahun'),
(5, '> 5 tahun'),
(6, '> 10 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_lowongan`
--

CREATE TABLE `permintaan_lowongan` (
  `id_permintaan` int(11) NOT NULL,
  `id_user_pengirim` int(255) NOT NULL,
  `id_lowongan_pekerjaan` int(255) NOT NULL,
  `no_registrasi` varchar(128) NOT NULL,
  `waktu_melamar` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `surat_lamar` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_lowongan`
--

INSERT INTO `permintaan_lowongan` (`id_permintaan`, `id_user_pengirim`, `id_lowongan_pekerjaan`, `no_registrasi`, `waktu_melamar`, `status`, `surat_lamar`) VALUES
(1, 3, 2, 'P-001', '2021-07-26 00:12:46', 'Diterima', 'suratlamar.jpg'),
(2, 3, 3, 'P-002', '2021-07-26 00:12:54', 'Pending', 'suratlamar.jpg'),
(3, 3, 4, 'P-003', '2021-07-26 00:13:08', 'Pending', 'suratlamar.jpg'),
(4, 4, 1, 'P-004', '2021-07-28 17:39:25', 'Ditolak', ''),
(8, 3, 1, 'P-005', '2021-08-09 23:19:46', 'Jalur undangan', '');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'Apakah masih membutuhkan Pekerja?'),
(2, 'Kapan hasil tesnya diumumkan?');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `email_perusahaan` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `deskripsi_perusahaan` text NOT NULL,
  `akte_pendirian_usaha` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `surat_izin_usaha_perdagangan` varchar(255) NOT NULL,
  `is_valid` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_profil`, `id_user`, `pin`, `nama_perusahaan`, `email_perusahaan`, `no_tlp`, `deskripsi_perusahaan`, `akte_pendirian_usaha`, `npwp`, `surat_izin_usaha_perdagangan`, `is_valid`, `catatan`) VALUES
(2, 2, '', 'Bina Prestasi', 'binaprestasi@gmail.com', '2147483647', 'Membina Siswa Berprestasi', '212.jpg', '212.jpg', 'A2.png', 1, 'coba'),
(4, 1, '96e79218965eb72c92a549dd5a330112', 'Bakoye Coorporation', 'bakoyecrp@gmail.com', '1234567890', 'Ini merupakan perusahaan yang dibangun pada tahun 2011 dan Memiliki Semangat Kerja Tinggi', 'bg-masthead2.jpg', 'bg-signup1.jpg', 'demo-image-011.jpg', 1, ''),
(5, 46, 'e10adc3949ba59abbe56e057f20f883e', 'Olga Corp', 'olgapaurenta11@gmail.com', '082117503125', 'oke', 'BA_Revisi_Agustus_2021_an_6701180040_SLAMET_SETIADI_RIYANTO3.pdf', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id_portofolio` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pengalaman` text NOT NULL,
  `paklaring` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `id_user`, `tahun`, `pengalaman`, `paklaring`) VALUES
(33, 3, 2021, 'Nguli', 'surat_paklaring.jpg'),
(34, 3, 2017, 'Pegawai kantin', 'surat_paklaring.jpg'),
(36, 25, 2021, 'PT. Aero Systems Indonesia', 'surat_paklaring.jpg'),
(37, 25, 2018, 'Direktur PT. Haifa Nida Wisata', 'surat_paklaring.jpg'),
(38, 3, 2019, 'Support System', 'ahaitsam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatewra Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Bengkulu'),
(8, 'Sumatera Selatan '),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Lampung'),
(11, 'DKI Jakarta '),
(12, 'Banten'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'DIY Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Timur'),
(22, 'Kalimantan Tengah'),
(23, 'Kalimantan Selatan'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Gorontalo	'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Barat'),
(29, 'Sulawesi Selatan'),
(30, 'Sulawesi Tenggara'),
(31, 'Maluku Utara'),
(32, 'Maluku'),
(33, 'Papua Barat'),
(34, 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `rekruitasi`
--

CREATE TABLE `rekruitasi` (
  `id_rekruitasi` int(11) NOT NULL,
  `id_user_penerima` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `waktu_rekruitasi` datetime NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekruitasi`
--

INSERT INTO `rekruitasi` (`id_rekruitasi`, `id_user_penerima`, `id_lowongan`, `waktu_rekruitasi`, `status`) VALUES
(1, 26, 1, '2021-08-09 12:40:29', 'dibatalkan'),
(2, 4, 1, '2021-08-09 12:45:42', 'Belum dikonfirmasi'),
(3, 25, 1, '2021-08-09 13:04:54', 'Belum dikonfirmasi'),
(4, 3, 1, '2021-08-09 22:10:50', 'diterima'),
(5, 3, 1, '2021-08-09 23:17:59', 'diterima'),
(6, 3, 6, '2021-08-09 23:25:40', 'ditolak'),
(7, 3, 6, '2021-08-09 23:27:03', 'Belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_anggota_grup`
--

CREATE TABLE `status_anggota_grup` (
  `id_status_anggota_grup` int(11) NOT NULL,
  `status_anggota_grup` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_anggota_grup`
--

INSERT INTO `status_anggota_grup` (`id_status_anggota_grup`, `status_anggota_grup`) VALUES
(1, 'Creator'),
(2, 'Admin'),
(3, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_permintaan_lowongan` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_permintaan_lowongan`, `status`, `waktu`, `keterangan`) VALUES
(7, 22, 'Lamaran dipending', '2021-07-26 00:13:08', '0'),
(8, 1, 'Lamaran diterima', '2021-07-28 09:21:57', '0'),
(9, 5, 'Lamaran dipending', '2021-07-28 17:39:25', 'Dalam proses penyeleksian data'),
(10, 6, 'Lamaran dipending', '2021-08-02 11:01:27', 'Dalam proses penyeleksian data'),
(13, 6, 'Lamaran dipending', '2021-08-06 21:51:04', 'Dalam proses penyeleksian data'),
(14, 4, 'Lamaran ditolak', '2021-08-09 21:26:10', 'Maaf, kami belum dapat menerima Anda dikarenakan sudah penuh'),
(15, 7, 'Lamaran dipending', '2021-08-09 22:55:24', 'Dalam proses penyeleksian data'),
(16, 8, 'Lamaran dipending', '2021-08-09 23:19:46', 'Undangan diterima'),
(17, 1, 'Lamaran diterima', '2021-08-10 10:44:56', 'Silahkan bisa menghubungi Perusahaan(Client) yang bersangkutan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(128) NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Bakoye Corporation', 'bakoyecrp@gmail.com', 'default.png', '$2y$10$1xcUtZ2d9hiqoyP9bKRnxuh3/MsnjGmw9MP/C3hQ1qKX6DBt5XbX.', 3, 1, 2147483647),
(2, 'Bina Prestasi', 'binaprestasi@gmail.com', 'default.png', '$2y$10$2PnNiMsqWsoV5TxAxm.2juYlItGdlqjl73WKp6dzqHC13mNG9cGhC', 3, 1, 2147483647),
(3, 'Muhammad Aulia Amri', 'amri@gmail.com', 'default.png', '$2y$10$S/QWVhpTL.Lvot0zDFG5puYTVqEZKJcJO5yRRN1uFHAORwv6DyLDC', 2, 1, 0),
(4, 'delviranz', 'delvira.nz1@gmail.com', 'default.png', '$2y$10$cHnO/0lRdIXeLkZoNEDlOuWunwM9chV/xaN55XlyQC9FiWmmUkMpi', 2, 1, 2147483647),
(5, 'Bakoye Uye', 'bakoyeuye@gmail.com', 'default.png', '$2y$10$lGhUCXplohIr8AY/y.2ISeEGdOoAuSgeM95jeKKtwS8EboXg0Z3Wm', 2, 1, 2147483647),
(6, 'Admin free', 'admin@gmail.com', '2121.jpg', '$2y$10$ddN08134rzFDZ08ewistB.kQJiN09PDYn..Yb593ojBwK8131AKfy', 1, 1, 0),
(7, 'Alvino Dicky', 'alvinodick@gmail.com', 'default.jpg', '$2y$10$opsI2l8E/R9btFcZg7O3geXgKhe1dErft3h9itpenok2TJpuOw7hG', 2, 1, 2147483647),
(8, 'Paulus Raul Gonzales', 'paulus@gmail.com', 'default.jpg', '$2y$10$x7IuIBvr9c2LRUaqbCm54er/Tv6SYFeTavprQflTV8g9D7Cx3wPQi', 2, 1, 2147483647),
(9, 'suan', 'suan@gmail.com', 'default.jpg', '$2y$10$azg9yenabz2MU//f3OBRJOj2GvEfwRuiQb0bAbb8o/BhEs1Slbilq', 2, 0, 1617406290),
(10, 'hasanudinn', 'hasanudin@gmail.comm', 'default.jpg', '$2y$10$bK1O8H726dQwuwMfEjA24uyWeH.va5jePl.W8rOxZy.RqbhgvpJk2', 2, 0, 1617406387),
(20, 'Alvino', 'alvinodicky548@gmail.com', 'default.jpg', '$2y$10$YE7V80RKG6RIPVv9VgphPO/bSLnfhf8PNYKGa52X4eUYJC2vwzjpy', 2, 1, 1617462582),
(21, 'Slamet', 'aan.gasir@gmail.com', 'default.png', '$2y$10$B7ulVx9nB02QK6JMGNPAvetyxDoc6UAYxxMdiq4vyEd4Jupm7vbtu', 2, 1, 1617544222),
(22, 'siap.corp', 'siap@gmail.com', 'default.png', '$2y$10$.QpHtM36oLQBygRglYE3P.h8wCpi0YiDszzChXhHpHzFJ2ScORaEm', 3, 1, 1617544350),
(23, 'amri', 'amri.aulia82@gmail.com', 'default.png', '$2y$10$hyNaD3XRtfLDvECCv9ZeFuprOR1GQ4q2FF8y6Ahv0iDiWqwSTpJTy', 3, 1, 1618553361),
(24, 'fajar', 'aan.gasir2@gmail.com', 'default.png', '$2y$10$HxqXrct4mRmJVF5nvt.2vOu4yhcjAck6XDcnr8QmD/PoEDEPNQi9W', 2, 0, 1623332433),
(25, 'mhaitsam18', 'haitsam01@gmail.com', 'scan.jpg', '$2y$10$dyBpGBbjokeswfNbDCtGmOs9vLqrTaYDlKSNDzKr4weLxp.EdIvhS', 2, 1, 1625928813),
(26, 'isam18', 'mhaitsam17@gmail.com', 'default.png', '$2y$10$VAY0tFA6nQhPRw9AhyPps.Px6kwZgAu6Kr9bU4JLdcZnEaiFjZyT6', 2, 0, 1625929092),
(27, 'Rini Sarlita', 'riniastkepsarlita@gmail.com', 'default.png', '$2y$10$DbcBU6qB1TiZ495NI.akwuGg5XJypI9oz4X3Zr23LKnjzDBBz4Sz6', 2, 1, 1628265180),
(31, 'Muhammad Shibghotul \'Adalah', 'shibghotul7@yahoo.com', 'default.png', '$2y$10$Y1RBORHVV9PqX/5gmAsf1OGO7ihRzF9frPPaRgEvlDJB54U1GsMwy', 2, 1, 1628267898),
(32, 'Haitsam', 'mhaitsam18@gmail.com', 'default.png', '$2y$10$jgA/5RkwHDr5.v6P6nu2T.aFzl1bprGe7jmVQ0Ih6V2UqQfy9uVou', 2, 0, 1628268156),
(45, 'mhaitsam', 'haitsam03@gmail.com', 'default.png', '$2y$10$JB5b6o6LGWmmPT1OhULGReE5TJOSy4v.lCOCOfr6724ITCgU2mFuW', 2, 0, 1628595084),
(46, 'olgapaurenta', 'olgapaurenta11@gmail.com', 'default.png', '$2y$10$SCvrDecCsfOXQkHl3j6Died.Qsteq9BqAWsLznvz9Nfmw.L7g9uvy', 3, 1, 1629699578);

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
(8, 1, 2),
(9, 1, 9);

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
(8, 'Buat Lowongan'),
(9, 'DataMaster');

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
(13, 2, 'History lamar gawe', 'Freelance', '', 1),
(14, 3, 'Buat Lowongan', 'asdjawfjawo', '', 1),
(15, 2, 'Edit Profil', 'Freelance/editprofil', 'fas fa-fw fa-user', 1),
(16, 2, 'Edit Password', 'Freelance/editpass', 'fas fa-fw fa-key', 1),
(17, 1, 'Data Perusahaan', 'admin/perusahaan', 'fas fa-fw fa-building', 1),
(18, 9, 'Data Pertanyaan Umum', 'DataMaster/pertanyaan', 'fas fa-fw fa-question', 1);

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
(3, 'amermrcl@gmail.com', '0', 1617421455),
(4, 'aan.gasir@gmail.com', '3xDneQPSTLOHVSOj17vaUeCNqvhEAADYFJBWgKC4rE8=', 1623332433),
(5, 'haitsam03@gmail.com', 'KLT+nDB/mqG5xvDI3Bi0tafbJJuMZhBvebf2IFsBRK8=', 1625928813),
(6, 'mhaitsam18@gmail.com', 'kUZGvfXTWH5LoUCUu48Zgf4gN7zC83u9D4EEcSO0g3U=', 1625929092),
(7, 'riniastkepsarlita@gmail.com', 'ACa1DX6iSnZ8kO+FYos+ig/F+h74joT6040kbEFGnKM=', 1628265310),
(8, 'shibghotul7@yahoo.com', 'zxtWtyPHQnPw+hRro41q+LGkHQmMRYll1x3FtxuF5ZQ=', 1628267836),
(9, 'shibghotul7@yahoo.com', '+N4ICpaNT51jy0QGg6gRQWemhd02xdmuHjMstUaRPOY=', 1628267898),
(10, 'mhaitsam18@gmail.com', 'pkJVMJ5mpkZDFrVnk2v/EvCrT22NickP4TWSjb9s3Fc=', 1628268156),
(11, 'haitsam03@gmail.com', 'XLssnz4h1Mh75dnxumqwtIo38RJn87tcZhoDIkRKOJM=', 1628592244),
(12, 'haitsam03@gmail.com', '6LiQWnLXm3ENDK5XKamOjUWIlDtpKjjkf9oviiEmULc=', 1628592374),
(13, 'haitsam03@gmail.com', '2RLC2cvpReCX8k8yxe2NP2kIBo//D5R7gEyAAfunyuE=', 1628592922),
(14, 'haitsam03@gmail.com', 'PcbKQurrla4ia6yC0SVrIrgJGxWaPGR+bqN/eu1lkrg=', 1628593175),
(15, 'haitsam03@gmail.com', 'sQFxHM174XGQahcZyybF2QPFyeQuZfuywfLxIyyaq8M=', 1628593433),
(16, 'haitsam03@gmail.com', 'ELIaChMIcY/Vsj6lP7xndaXAuvhSoH/RCn0Fm55tw3M=', 1628593588),
(17, 'haitsam03@gmail.com', 'J3S2o3GkRX42dwDlQsZXhNz0Y7zn3BVBj/UeVYjS+zk=', 1628593832),
(18, 'haitsam03@gmail.com', 'x9eRGvLAxlG2cBiwdFp+Va9Zxp5rtCbg6zMmFBWW0Fg=', 1628593900),
(19, 'haitsam03@gmail.com', 'g3qAFzGPYsLOWy9K5tjH710xUeJbu28bSBJZ/cXrus0=', 1628594068),
(20, 'haitsam03@gmail.com', 'iHQxb0YDLx/TGWgA717tr19PKxuK5IekZwtypgdkPL8=', 1628594597),
(21, 'haitsam03@gmail.com', '1aZWU5u9L0qUKLFvO77hVhL5WDDC62uRU4qICNezepA=', 1628594679),
(22, 'haitsam03@gmail.com', '1xk1B1UiWRI3eGTAIyqL9fd/4kRQWSlcwGR8XxjbHiM=', 1628594889),
(23, 'haitsam03@gmail.com', 'DDYS7kISgCRrw9n4ei13gsUwWcEOYKp/yISlmIdpUmg=', 1628595084);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `anggota_grup`
--
ALTER TABLE `anggota_grup`
  ADD PRIMARY KEY (`id_anggota_grup`);

--
-- Indexes for table `calon_pegawai`
--
ALTER TABLE `calon_pegawai`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_grup`
--
ALTER TABLE `chat_grup`
  ADD PRIMARY KEY (`id_chat_grup`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_cv`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_jenis_pekerjaan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_keahlian`
--
ALTER TABLE `kategori_keahlian`
  ADD PRIMARY KEY (`id_kategori_keahlian`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `keahlian_freelance`
--
ALTER TABLE `keahlian_freelance`
  ADD PRIMARY KEY (`id_keahlian_freelance`);

--
-- Indexes for table `komentar_lowongan`
--
ALTER TABLE `komentar_lowongan`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`id_kuliah`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indexes for table `permintaan_lowongan`
--
ALTER TABLE `permintaan_lowongan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD UNIQUE KEY `no_registrasi` (`no_registrasi`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_portofolio`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `rekruitasi`
--
ALTER TABLE `rekruitasi`
  ADD PRIMARY KEY (`id_rekruitasi`);

--
-- Indexes for table `status_anggota_grup`
--
ALTER TABLE `status_anggota_grup`
  ADD PRIMARY KEY (`id_status_anggota_grup`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anggota_grup`
--
ALTER TABLE `anggota_grup`
  MODIFY `id_anggota_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `calon_pegawai`
--
ALTER TABLE `calon_pegawai`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chat_grup`
--
ALTER TABLE `chat_grup`
  MODIFY `id_chat_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  MODIFY `id_jenis_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_keahlian`
--
ALTER TABLE `kategori_keahlian`
  MODIFY `id_kategori_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `keahlian_freelance`
--
ALTER TABLE `keahlian_freelance`
  MODIFY `id_keahlian_freelance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `komentar_lowongan`
--
ALTER TABLE `komentar_lowongan`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `kuliah`
--
ALTER TABLE `kuliah`
  MODIFY `id_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permintaan_lowongan`
--
ALTER TABLE `permintaan_lowongan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_portofolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rekruitasi`
--
ALTER TABLE `rekruitasi`
  MODIFY `id_rekruitasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_anggota_grup`
--
ALTER TABLE `status_anggota_grup`
  MODIFY `id_status_anggota_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
