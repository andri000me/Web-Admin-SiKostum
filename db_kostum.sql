-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 02:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kostum`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `label_alamat` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` text NOT NULL,
  `kota` text NOT NULL,
  `kecamatan` text NOT NULL,
  `desa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `label_alamat`, `alamat`, `provinsi`, `kota`, `kecamatan`, `desa`) VALUES
(1, 3, 'alamat rumah', 'jl.apa', '', 'malang', '', ''),
(2, 3, 'alamat kos', 'jl. jalan', '', 'malang', '', ''),
(3, 4, 'toko1', 'ini alamat toko 1', '', 'kota toko', '', ''),
(4, 5, 'toko2', 'ini alamat toko 2', '', 'kota toko 2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `jumlah_denda` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_kostum` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_sewa`, `id_kostum`, `jumlah`) VALUES
(1, 1, 1, 2);

--
-- Triggers `detail`
--
DELIMITER $$
CREATE TRIGGER `pesan_kostum` AFTER INSERT ON `detail` FOR EACH ROW INSERT INTO log SET id_detail = NEW.id_detail, tgl_log=NOW(), status_log = 'pesan'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_ktp` text NOT NULL,
  `status` enum('menunggu','valid','tidak valid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `id_user`, `foto_ktp`, `status`) VALUES
(1, 2, 'fotoktp1.jpg', 'valid'),
(2, 3, 'fotoktp2.jpg', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Adat '),
(2, 'Cosplay '),
(3, 'Manca Negara'),
(4, 'Pahlawan'),
(5, 'Profesi'),
(6, 'bla');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `suka` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_detail`, `komentar`, `suka`) VALUES
(1, 3, 1, 'bagus banget', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `kostum`
--

CREATE TABLE `kostum` (
  `id_kostum` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_kostum` varchar(50) NOT NULL,
  `jumlah_kostum` int(11) NOT NULL,
  `harga_kostum` int(11) NOT NULL,
  `deskripsi_kostum` text NOT NULL,
  `foto_kostum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostum`
--

INSERT INTO `kostum` (`id_kostum`, `id_kategori`, `id_tempat`, `nama_kostum`, `jumlah_kostum`, `harga_kostum`, `deskripsi_kostum`, `foto_kostum`) VALUES
(1, 1, 1, 'kostum1', 1, 1000, 'bla bla', 'profile.jpg'),
(2, 1, 3, 'kostum toko 2', 2, 50000, 'deskripis kostum toko 2', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `tgl_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_log` enum('pesan','valid','ambil','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_detail`, `tgl_log`, `status_log`) VALUES
(1, 1, '2019-05-19 13:56:20', 'pesan');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `bukti_sewa` text NOT NULL,
  `status_sewa` enum('proses','batal','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_user`, `id_alamat`, `tgl_transaksi`, `tgl_sewa`, `tgl_kembali`, `bukti_sewa`, `status_sewa`) VALUES
(1, 3, 1, '2019-05-21 05:27:33', '2019-05-19', '2019-05-21', 'profile.jpg', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_sewa`
--

CREATE TABLE `tempat_sewa` (
  `id_tempat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `slogan_tempat` varchar(50) NOT NULL,
  `deskripsi_tempat` varchar(150) NOT NULL,
  `foto_tempat` text NOT NULL,
  `status_tempat` enum('buka','tutup') NOT NULL,
  `izin` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_sewa`
--

INSERT INTO `tempat_sewa` (`id_tempat`, `id_user`, `id_alamat`, `nama_tempat`, `no_rekening`, `slogan_tempat`, `deskripsi_tempat`, `foto_tempat`, `status_tempat`, `izin`) VALUES
(1, 2, 1, 'galeri sevie', '', 'halo', 'halo', 'galeri_sevie.jpg', 'buka', 'ya'),
(2, 4, 3, 'Gading Kostum', '75674674', 'slogan toko1', 'deskripsi toko 1', 'gading_kostum.jpg', 'buka', 'tidak'),
(3, 5, 4, 'tempat sewa ', '646747478', 'slogan toko 2', 'deskripisi toko 2', 'tempat.jpg', 'buka', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_user` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('Admin','Tempat Sewa','Penyewa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_kelamin`, `email`, `no_hp`, `foto_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'P', 'admin@gmail.com', '082139799778', 'admin.jpg', 'admin', 'admin', 'Admin'),
(2, 'toko', 'P', 'toko@gmail.com', '082139799778', 'fotouser1.jpg', 'toko', 'toko', 'Tempat Sewa'),
(3, 'user', 'L', 'user@gmail.com', '082139799778', 'fotouser2.jpg', 'user', 'user', 'Penyewa'),
(4, 'toko1', 'P', 'toko1@gmail.com', '0821345678', 'profile.jpg', 'toko1', 'toko1', 'Tempat Sewa'),
(5, 'toko2', 'L', 'toko2@gmail.com', '0812345678', 'profile.jpg', 'toko2', 'toko2', 'Tempat Sewa'),
(6, 'user2', 'P', 'user2@gmail.com', '86876896', 'profile.jpg', 'user2', 'user2', 'Penyewa'),
(7, 'mitaw', 'P', 'mitaw@gmail.com', '082134678', 'fotouser1.jpg', 'mitaw', 'mitaw', 'Penyewa'),
(8, 'taw', 'L', 'taw@gmail.com', '082139799778', 'photo.png', 'taw', 'taw', 'Penyewa'),
(9, 'haha', 'P', 'haha@gmail.com', '07854213', 'photo.png', 'haha', 'haha', 'Penyewa'),
(10, 'hshs', 'L', 'mita@gmail.com', '494676', 'photo.png', 'miy', 'miy', 'Penyewa'),
(11, 'hshs', 'L', 'mita@gmail.com', '494676', 'photo.png', 'miy', 'miy', 'Penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id_kostum` (`id_kostum`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`),
  ADD KEY `identitas_ibfk_1` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `kostum`
--
ALTER TABLE `kostum`
  ADD PRIMARY KEY (`id_kostum`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_ibfk_1` (`id_detail`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_alamat` (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tempat_sewa`
--
ALTER TABLE `tempat_sewa`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_alamat` (`id_alamat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kostum`
--
ALTER TABLE `kostum`
  MODIFY `id_kostum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tempat_sewa`
--
ALTER TABLE `tempat_sewa`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_kostum`) REFERENCES `kostum` (`id_kostum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `identitas`
--
ALTER TABLE `identitas`
  ADD CONSTRAINT `identitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kostum`
--
ALTER TABLE `kostum`
  ADD CONSTRAINT `kostum_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kostum_ibfk_3` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_sewa` (`id_tempat`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_alamat`) REFERENCES `alamat` (`id_alamat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempat_sewa`
--
ALTER TABLE `tempat_sewa`
  ADD CONSTRAINT `tempat_sewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempat_sewa_ibfk_2` FOREIGN KEY (`id_alamat`) REFERENCES `alamat` (`id_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
