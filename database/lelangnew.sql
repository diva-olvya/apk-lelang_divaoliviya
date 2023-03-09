-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2023 pada 05.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelangnew`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 7, 43, 4, 200000000),
(2, 6, 39, 1, 190000000),
(4, 7, 43, 2, 175900000),
(5, 2, 1, 2, 132500000),
(6, 1, 35, 3, 98599000),
(8, 5, 38, 3, 232550000),
(9, 4, 37, 4, 225990000),
(10, 12, 46, 1, 180999000),
(11, 9, 40, 1, 50999000),
(12, 8, 42, 1, 347480000),
(13, 12, 46, 3, 182000000),
(14, 8, 42, 3, 330999000),
(15, 9, 40, 2, 55890000),
(16, 8, 42, 4, 350000000),
(17, 11, 36, 5, 82000000),
(18, 5, 38, 5, 235000000),
(19, 6, 39, 4, 180000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) UNSIGNED NOT NULL,
  `status_barang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `photo`, `tgl`, `harga_awal`, `status_barang`) VALUES
(1, 'Mobil Toyota Alphard', 'Mobil Toyota Alphard 2.4 2WDAT, Tahun 2007, No.Pol.Z 1331 UT', 'toyota-alphard-1.jpg', '2023-03-04', 124500000, 1),
(35, 'Mobil TOYOTA AGYA', 'TOYOTA New Agya Model 1.2G Tahun 2021 Warna White Nomor Polisi BB 1125 HC', 'mobil-agya.jpg', '2023-03-04', 94580000, 1),
(36, 'Mobil Daihatsu AYLA', 'Daihatsu Ayla menggunakan Type mesin 998 cc 3-silinder Ayla bertenaga 65 dk di 6.000 rpm dan torsi 88 Nm di 3.600', 'monil_ayla.jpg', '2023-03-04', 80750000, 1),
(37, 'Mobil BMW 320i Sport F30 2014 full original', 'BMW 320i.-Sport line.-F30.-2.0L N32B22 I4 turbochargered', 'mobil_bmw.jpg', '2023-03-05', 220500000, 1),
(38, 'Mobil Lexus-RX-F', 'Lexus rx300 2.0 f-sport SUV - AT White Nova', 'mobil_Lexus-RX-F.jpg', '2023-03-05', 225000000, 1),
(39, 'Mobil Listrik Wuling Air Ev', 'Higlighted Specifications 10.25\" Integrated Floating Widescreen And Smart Start System IP67 Waterproof Baterry', 'mobil_listrik_wuling_air_ev.jpg', '2023-03-05', 138000000, 1),
(40, 'Mobil Pick-Up Mitsubishi L300', 'Mitsubishi L300 Tahun 2012 warna Hitam 53000 km', 'pick_up.jpg', '2023-03-06', 35890000, 1),
(41, 'Mobil Toyota Raize 2022 1.0 G Wagon ', 'Toyota Raize 2022 1.0 G Wagon injeksi langsung Multi-Point Injection Turbocharged', 'toyota-raize.jpg', '2023-03-06', 246999950, 1),
(42, 'Mobil Tua  Klasik', 'Mobil Mercedes-Benz G Class varian 280Ge tahun 1986.', 'Mobil_Klasik_1.jpg', '2023-03-08', 299900000, 1),
(43, 'Mobil Nissan Serena  X AT', '2016 Nissan Serena X AT mesin bensin dengan kode MR20 konfigurasi 4 silinder Warna red-black', 'serena-red-f841.jpg', '2023-03-05', 155900000, 1),
(45, 'Mobil Toyota Kijang  Innova 2.0 G AT', 'Mobil Toyota Kijang  Innova 2.0 G AT tahun 2014 106,334 km warna abu-abu', 'fit-tc-innova-history.jpeg', '2023-03-05', 190990000, 1),
(46, 'Mobil Avanza', 'Mobil toyota  Avanza tahun 2019 warna silver', 'avanza1.jpg', '2023-03-05', 179000000, 1),
(47, 'Mobil Sedan ', 'Mobil sedan tahun 2005 warna merah', 'mobil-sedan.jpg', '2023-03-09', 75999000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` datetime NOT NULL,
  `harga_akhir` int(20) DEFAULT NULL,
  `pelelang` varchar(225) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') CHARACTER SET utf8mb4 NOT NULL,
  `tanggal_akhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `pelelang`, `id_petugas`, `status`, `tanggal_akhir`) VALUES
(1, 35, '2023-03-04 19:27:00', NULL, NULL, 3, 'dibuka', '2023-03-10 22:30:00'),
(2, 1, '2023-03-04 20:20:00', NULL, NULL, 2, 'dibuka', '2023-03-11 10:20:00'),
(4, 37, '2023-03-08 20:25:00', NULL, NULL, 2, 'dibuka', '2023-03-17 20:30:00'),
(5, 38, '2023-03-07 20:29:00', 235000000, 'annisa lutfiana', 2, 'ditutup', '2023-03-11 14:30:00'),
(6, 39, '2023-03-08 20:29:00', 190000000, 'Hilyatus zahro', 2, 'ditutup', '2023-03-15 20:30:00'),
(7, 43, '2023-03-08 09:13:00', NULL, NULL, 3, 'dibuka', '2023-03-15 09:13:00'),
(8, 42, '2023-03-07 09:14:00', 350000000, 'Dwi putra ramadhan', 3, 'ditutup', '2023-03-11 23:59:00'),
(9, 40, '2023-03-04 09:56:00', 55890000, 'Shinta niasari', 3, 'ditutup', '2023-03-07 09:56:00'),
(11, 36, '2023-03-05 10:11:00', NULL, NULL, 3, 'dibuka', '2023-03-11 15:00:00'),
(12, 46, '2023-03-05 12:58:00', 182000000, 'Amjad Balqis', 2, 'ditutup', '2023-03-07 12:58:00'),
(13, 41, '2023-03-05 12:58:00', NULL, NULL, 2, 'ditutup', '2023-03-05 14:42:00'),
(14, 45, '2023-03-09 05:18:00', NULL, NULL, 2, 'dibuka', '2023-03-15 05:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas'),
(3, 'masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `id_level`) VALUES
(1, 'Hilyatus zahro', 'hilya', '$2y$10$e4YndzAyzJXcS9KU.7QihenB.PkdF9h9plc/bqDuOaXi7yqGxXqMa', '082273615476', 3),
(2, 'Shinta niasari', 'shinta', '$2y$10$e4YndzAyzJXcS9KU.7QihenB.PkdF9h9plc/bqDuOaXi7yqGxXqMa', '085567871123', 3),
(3, 'Amjad Balqis', 'balqis', '$2y$10$e4YndzAyzJXcS9KU.7QihenB.PkdF9h9plc/bqDuOaXi7yqGxXqMa', '086543123567', 3),
(4, 'Dwi putra ramadhan', 'putra', '$2y$10$qFdi2xPROqttRl6LEJa9yOo/KQiInwb1l14zJdwezNA3hMPwaayrS', '081453267732', 3),
(5, 'annisa lutfiana', 'annisa', '$2y$10$eGx0j.Xx.zz24MTCmKqXZOon9ZohsfHTmqaBrjX8v7DsmYsaH/3zi', '085423167895', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'diva oliviya mayantika', 'diva', '$2y$10$zUR5HaFwIkhZXMTlXMLMseZumcr3W2utFgGucB48wQFBzRYD1pI0G', 1),
(2, 'dwi khusnul khotimah', 'dwik', '$2y$10$8Y3MQ3wfIGMZ6p0NlP6lNuSk.5CCE8DddcTj0lfhzudL1FZetksIW', 2),
(3, 'ririn novita  sari', 'ririn', '$2y$10$EUaraMbfWAQxSBaXYN3RnuO90WOqsCUfXwccdS21mBgc1EBBLR8Jq', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `password` (`password`),
  ADD KEY `telp` (`telp`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD CONSTRAINT `tb_masyarakat_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
