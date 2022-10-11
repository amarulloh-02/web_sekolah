-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 08:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `tgl_berita` datetime DEFAULT NULL,
  `des_berita` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `tgl_berita`, `des_berita`, `id_user`) VALUES
(5, 'Hari libur nasional', '2022-09-26 16:10:48', '<p>Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Amet Et In Delectus Laboriosam Harum Consequatur Nam Dolore Cum Rem Consequuntur. Quisquam Aliquid Nostrum Excepturi Nulla Ipsum Esse Non Maxime Eum, Sapiente Dolores Aspernatur Laudantium Nesciunt Velit Libero Cupiditate Exercitationem Officiis Eos Corporis? Magnam Dolores Enim Doloremque, Accusantium Deserunt Maxime Aspernatur Fuga Officia Nesciunt Placeat Animi Dicta Dolorem Dolore Consequuntur Dolor Earum Nisi Ad Veniam Eius Facilis Voluptate. Incidunt, Reiciendis? Numquam Quia Minima Cum Id Debitis, Libero Nihil Praesentium Dignissimos Dolorum Sequi Officiis Ducimus Consequuntur Voluptas Necessitatibus Quos Dolorem Impedit, Dolore Temporibus Velit Rerum Doloremque Fuga Dicta Sit! Ex, Porro Tempora.</p>\r\n', 4),
(6, 'Penetapan waktu Ujian Nasional (UN)', '2022-09-26 16:25:09', '<p><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet et in delectus laboriosam harum consequatur nam dolore cum rem consequuntur.</strong></p>\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(100) DEFAULT NULL,
  `foto_ekstra` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `foto_ekstra`) VALUES
(2, 'Futsal', 'bb.png'),
(3, 'Basket', 'aa.png'),
(4, 'Volley', 'testing.png');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) DEFAULT NULL,
  `foto_fasilitas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `foto_fasilitas`) VALUES
(2, 'Lapangan Sepak Bola', 'aa.png'),
(3, 'Lab. Komputer', 'bb.png'),
(4, 'Musholla Nurul Yaqin', 'berita.png');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `nama_galeri` varchar(30) DEFAULT NULL,
  `foto_galeri` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_galeri`, `foto_galeri`) VALUES
(1, 'Study Tour Bandung', 'berita.png'),
(2, 'Peresmian Pendopo', 'aa1.png'),
(3, 'Pembukaan Ruangan Alphabet Inc', 'testing.png');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `jk_guru` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pelajaran` int(11) DEFAULT NULL,
  `foto_guru` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jk_guru`, `tgl_lahir`, `id_jabatan`, `id_pelajaran`, `foto_guru`) VALUES
(1, 'Abdul', 'Laki-Laki', '1998-03-03', 1, 2, 'berita.png'),
(2, 'Geza', 'Laki-Laki', '2022-09-20', 1, 6, 'aa.png'),
(4, 'Amar', 'Laki-Laki', '2022-10-04', 2, 1, 'bb.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Guru'),
(2, 'Kepala Sekolah'),
(3, 'Wakil Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `tgl_kegiatan` date DEFAULT NULL,
  `des_kegiatan` text DEFAULT NULL,
  `tgl_post` datetime DEFAULT NULL,
  `foto_kegiatan` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tgl_kegiatan`, `des_kegiatan`, `tgl_post`, `foto_kegiatan`, `id_user`) VALUES
(2, 'Acara Maulid Nabi Muhammad SAW', '2022-09-28', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet et in delectus laboriosam harum consequatur nam dolore cum rem consequuntur. Quisquam aliquid nostrum excepturi nulla ipsum esse non maxime eum, sapiente dolores aspernatur laudantium nesciunt velit libero cupiditate exercitationem officiis eos corporis? Magnam dolores enim doloremque, accusantium deserunt maxime aspernatur fuga officia nesciunt placeat animi dicta dolorem dolore consequuntur dolor earum nisi ad veniam eius facilis voluptate. Incidunt, reiciendis? Numquam quia minima cum id debitis, libero nihil praesentium dignissimos dolorum sequi officiis ducimus consequuntur voluptas necessitatibus quos dolorem impedit, dolore temporibus velit rerum doloremque fuga dicta sit! Ex, porro tempora.</p>\r\n', '2022-09-28 09:38:29', 'berita.png', 4),
(3, 'Gotong royong dalam rangka kebersihan dunia', '2022-09-28', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet et in delectus laboriosam harum consequatur nam dolore cum rem consequuntur. Quisquam aliquid nostrum excepturi nulla ipsum esse non maxime eum, sapiente dolores aspernatur laudantium nesciunt velit libero cupiditate exercitationem officiis eos corporis?</p>\r\n', '2022-09-28 09:50:05', 'aa.png', 4),
(4, 'Seminar tentang IT', '2022-09-27', '<p>consequuntur dolor earum nisi ad veniam eius facilis voluptate. Incidunt, reiciendis? Numquam quia minima cum id debitis, libero nihil praesentium dignissimos dolorum sequi officiis ducimus consequuntur voluptas necessitatibus quos dolorem impedit, dolore temporibus velit rerum doloremque fuga dicta sit! Ex, porro tempora.</p>\r\n', '2022-09-28 09:51:03', 'testing.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(3, 'Bahasa Inggris'),
(4, 'IPA'),
(5, 'IPS'),
(6, 'Teknologi Informasi dan Komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama_pengurus` varchar(30) DEFAULT NULL,
  `jk_pengurus` varchar(10) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `foto_pengurus` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama_pengurus`, `jk_pengurus`, `id_jabatan`, `foto_pengurus`) VALUES
(1, 'Fiqih', 'Laki-Laki', 1, 'berita.png'),
(2, 'Shanti', 'Perempuan', 3, 'testing.png');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama_saran` varchar(100) DEFAULT NULL,
  `email_saran` varchar(30) DEFAULT NULL,
  `telp_saran` varchar(15) DEFAULT NULL,
  `pesan_saran` text DEFAULT NULL,
  `tgl_saran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nama_saran`, `email_saran`, `telp_saran`, `pesan_saran`, `tgl_saran`) VALUES
(1, 'amar', 'amar@gmail.com', '088801150010', '<p>Pengembangan pada web perlu diperbagus</p>\r\n', '2022-09-28 13:49:34'),
(2, 'test', 'test@gmail.com', '085693350822', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet et in delectus laboriosam harum consequatur nam dolore cum rem consequuntur. Quisquam aliquid nostrum excepturi nulla ipsum esse non maxime eum, sapiente dolores aspernatur laudantium nesciunt velit libero cupiditate exercitationem officiis eos corporis? Magnam dolores enim doloremque, accusantium deserunt maxime aspernatur fuga officia nesciunt placeat animi dicta dolorem dolore consequuntur dolor earum nisi ad veniam eius facilis voluptate. Incidunt, reiciendis? Numquam quia minima cum id debitis, libero nihil praesentium dignissimos dolorum sequi officiis ducimus consequuntur voluptas necessitatibus quos dolorem impedit, dolore temporibus velit rerum doloremque fuga dicta sit! Ex, porro tempora.</p>\r\n', '2022-09-28 13:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `akses` enum('ADMIN','PIMPINAN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `akses`) VALUES
(1, 'Geza', 'pimpinan', 'e10adc3949ba59abbe56e057f20f883e', 'PIMPINAN'),
(4, 'amar', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
