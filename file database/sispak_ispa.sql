-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 08:24 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_ispa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G1', 'DEMAM'),
(29, 'G10', 'SUARA SERAK'),
(30, 'G11', 'NYERI DI DADA/SENDI DAN OTOT'),
(31, 'G12', 'INGUS KENTAL BERWARNA KEHIJAUAN ATAU KEKUNINGAN'),
(32, 'G13', 'MUAL / MUNTAH'),
(33, 'G14', 'KELUAR DAHAK BENING, PUTIH, KUNING ATAU HIJAU'),
(34, 'G15', 'BERSIN-BERSIN'),
(35, 'G16', 'MATA BERAIR'),
(21, 'G2', 'BATUK-BATUK'),
(22, 'G3', 'HIDUNG TERSUMBAT/PILEK'),
(23, 'G4', 'SAKIT KEPALA/PUSING'),
(24, 'G5', 'SAKIT TENGGOROKAN/SUSAH MENELAN'),
(25, 'G6', 'SESAK NAPAS'),
(26, 'G7', 'SUARA NAPAS KASAR'),
(27, 'G8', 'NAFSU MAAN BERKURANG/SUSAH MAKAN'),
(28, 'G9', 'BERKURANGNYA INDRA PENGECAP DAN BAU');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_petani`
--

CREATE TABLE `gejala_petani` (
  `kode_petani` varchar(10) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gejala_petani`
--

INSERT INTO `gejala_petani` (`kode_petani`, `kode_gejala`) VALUES
('PS001', 'GJ001'),
('PS001', 'GJ002'),
('PS002', 'GJ002'),
('PS002', 'GJ003'),
('PS002', 'GJ004'),
('PS003', 'GJ001'),
('PS003', 'GJ006'),
('PS003', 'GJ008');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `kode_konsultasi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_pasien` varchar(10) NOT NULL,
  `hasil` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`kode_konsultasi`, `tanggal`, `kode_pasien`, `hasil`, `keterangan`) VALUES
(12, '2020-04-17', '10', 'P3', 'Berdasarkan gejala yang anda pilih,  anda didiagnosa terserang penyakit PNEUMONIA dengan presentas 66.66 %.');

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `kode_pakar` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`kode_pakar`, `nama`, `username`, `password`) VALUES
('PK001', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pasien`, `username`, `password`, `nama`, `jenis_kelamin`, `alamat`, `telp`) VALUES
(9, '123', '202cb962ac59075b964b07152d234b70', 'Geni', 'Perempuan', 'pasir pengaraian', '081215454858'),
(10, 'sobri', '202cb962ac59075b964b07152d234b70', 'saw', 'Laki Laki', 'pasir pengaraian', '081215454858');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(10) NOT NULL DEFAULT '',
  `nama_penyakit` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `pengobatan` text,
  `probabilitas` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `deskripsi`, `pengobatan`, `probabilitas`) VALUES
('P1', 'EPIGLOTITIS', 'Epiglotitis adalah pembengkakan dan peradangan pada epiglotis. Epiglotis merupakan katup berbentuk daun yang berfungsi menutupi trakea (batang tenggorokan) agar tidak dimasuki makanan atau cairan pada saat kita menelan. Katup tersebut terletak di belakang pangkal lidah.', 'Rajin cuci tangan dengan air dan sabun, Menghindari peralatan makanan dengan orang lain, jaga pola makan, hindari/berhenti nerokok, cukup istirahat, Asupan cairan lewat infus untuk mencukupi kebutuhan tubuh sampai anda bisa kembali menelan.', 0.5),
('P2', 'BRONKITIS', '\r\nBronkitis adalah infeksi pada saluran pernapasan utama dari paru-paru atau bronkus yang menyebabkan terjadinya peradangan atau inflamasi pada saluran tersebut. Kondisi ini termasuk sebagai salah satu penyakit pernapasan. Bronkitis dapat disebabkan karena virus, partikel seperti debu, asap, polusi udara maupun asap rokok.\r\nGejala awalnya adalah batuk. Pada awal batuk tidak berdahak, setelah dua atau tiga hari batuk akan disertai dahak. Pada awal dahak berwarna putih, lama kelamaan akan berwarna kuning atau hijau bahkan sampai merah. Selain itu muncul rasa sesak pada pernapasan, bunyi napas mengi dan bengek, sakit kepala, wajah nampak memerah.', 'Berikan antibiotik jika penyebabnya oleh bakteri yang ditunjukkan oleh dahak berwarna kuning, hijau dan demam tinggi terus. Apabila penyebabnya virus atau partikel polusi tidak dapat diberi antibiotic. Berikan anak paracetamol atau ibuprofen untuk meredakan demam, Berikan anak obat tets hidung saline, Tidak memberikan anak obat batuk supresan, Biarkan anak mendapatkan waktu tidur yang cukup. Berikan anak vaksinasi sesuai jadwal imunisasi, Berikan anak banyak cairan untuk mencegah dehidrasi. Menjaga lingkungan agar tetap bersih terhindar dari debu', 0.8),
('P3', 'PNEUMONIA', 'Pneumonia atau dikenal juga dengan istilah paru-paru basah adalah infeksi yang memicu inflamasi pada kantong-kantong udara di salah satu atau kedua paru-paru. Pada pengidap pneumonia, sekumpulan kantong-kantong udara kecil di ujung saluran pernapasan dalam paru-paru akan membengkak dan dipenuhi cairan.\r\nGejala pneumonia suhu badan tinggi dan berkeringat, bibir dan kuku lama-kelamaan membiru, denyut jantung cepat, nyeri di dada, mengeluarkan lendir berwarna hijau ketika batuk, menggigil, terasa letih dan lesu,', 'Gizi yang cukup, imunisasi, menerapkan perilaku hidup sehat dan bersih, melakukan X-Ray, Memberikan antibiotik pada selang infus, Menyemprotkan larutan air asin (saline).', 0.6),
('P4', 'COMMON COLD', 'Common cold adalah suatu infeksi atau peradangan kataralis pada mukosa hidung yang sering menjalar ke tenggorokan hingga sampai ke nasofaring, tonsil, laring, faring sehingga pada common cold sering juga ditemui adanya tanda dan gejala dari faringitis akut, tonsilitis akut, laringitis dan bahkan campuran dari ketiga infeksi di atas.', 'mengoleskan balsem, Mengonsumsi permen yang mengandung menthol dan berkumur dengan air garam, mengonsumsi suplemen Zinc dan vitamin c .', 0.6),
('P5', 'ILI (INFLUEZA LIKE ILLNES', 'Influenza disebabkan oleh 3 tipe virus yaitu virus influenza A, B dan C. Penularan influenza biasanya terjadi karena kontak langsung dengan penderita. Selain itu dapat terjadi jika menghirup virus flu. Beberapa gejala influenza yaitu demam kadang-kadang lebih dari 380 celcius, gemetar dan berkeringat, sakit kepala sering bertambah parah jika berada ditempat terang, hidung tersumbat, gatal tenggorokan, rasa panas di dada, batuk kering, hidung berair, nyeri dan sakit otot, kelelahan dan merasa lemas, diare dan muntah', 'Berikan anak obat-obatan seperti asetaminofen, aspirin, paracetamol atau ibuprofen untuk meredakan demam, Berikan anak obat tets hidung saline, Biarkan anak mendapatkan waktu tidur atau istirahat yang cukup, mengkonsumsi makanan yang banyak mengandung gizi yang diperlukan tubuh, banyak minum air putih Berikan anak banyak cairan untuk mencegah dehidrasi. Untuk pencegahan dapat dilakukan dengan pemberian vaksin.', 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `kode_penyakit` varchar(10) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `probabilitas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`kode_penyakit`, `kode_gejala`, `probabilitas`) VALUES
('AL003', 'GJ003', 0.2),
('AL004', 'GJ004', 0.4),
('AL005', 'GJ005', 0.3),
('AL006', 'GJ009', 0.5),
('AL007', 'GJ006', 0.9),
('AL005', 'GJ007', 0.1),
('AL003', 'GJ008', 0.3),
('AL004', 'GJ010', 0.3),
('AL006', 'GJ004', 0.5),
('AL007', 'GJ007', 0.2),
('AL007', 'GJ001', 0.6),
('AL002', 'GJ001', 0.2),
('AL002', 'GJ003', 0.8),
('$kode', 'GJ005', 0.1),
('$kode', 'GJ008', 0.1),
('', 'GJ005', 0.2),
('', 'GJ008', 0.2),
('', 'GJ007', 0.2),
('AL001', 'GJ005', 0.1),
('AL001', 'GJ008', 0.1),
('P1', 'G1', 0.8),
('P1', 'G2', 0.7),
('P1', 'G3', 0.7),
('P2', 'G4', 0.6),
('P2', 'G5', 0.7),
('P2', 'G6', 0.8),
('P2', 'G7', 0.7),
('P3', 'G10', 0.7),
('P3', 'G11', 0.5),
('P3', 'G16', 0.8),
('P3', 'G8', 0.8),
('P3', 'G9', 0.5),
('P4', 'G13', 0.6),
('P4', 'G14', 0.5),
('P5', 'G1', 0.8),
('P5', 'G15', 0.7),
('P6', 'G12', 0.5),
('P6', 'G16', 0.8),
('P6', 'G17', 0.9),
('P6', 'G18', 0.8),
('P7', 'G13', 0.6),
('P7', 'G19', 0.8),
('P7', 'G20', 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `v_rule`
--

CREATE TABLE `v_rule` (
  `kode_penyakit` varchar(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `nama_gejala` text,
  `probabilitas` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`kode_konsultasi`);

--
-- Indexes for table `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`kode_pakar`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pasien`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `kode_konsultasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kode_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
