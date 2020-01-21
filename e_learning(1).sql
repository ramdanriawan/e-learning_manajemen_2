-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 02:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `id` int(6) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','guru','siswa','ortu') NOT NULL,
  `kon_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`id`, `username`, `password`, `level`, `kon_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0),
(28, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', 0),
(598, '8020160022', '749db7652af7bf49aa6df959e0f4b76d', 'siswa', 51),
(599, '082273164206', '5e76d88cc5c68b31bf306f390d251816', 'guru', 83),
(600, 'imeldazulvina', 'd834460bee8ccec7c02d406c80298579', 'siswa', 52),
(601, 'ortu', '469eb28221c8e6d092ddafacb87799bf', 'ortu', 3),
(603, '8020160022', '749db7652af7bf49aa6df959e0f4b76d', 'siswa', 51),
(604, '5E1C2', 'f00da7712d4d8c9124299c735a33650a', 'siswa', 52),
(605, 'ramdan', '889752dcb81b4ad98ad6e36e9db2cd43', 'guru', 84);

-- --------------------------------------------------------

--
-- Table structure for table `m_guru`
--

CREATE TABLE `m_guru` (
  `id` int(6) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_guru`
--

INSERT INTO `m_guru` (`id`, `nip`, `nama`) VALUES
(83, '082273164206', 'Andrean Oscar'),
(84, 'ramdan', 'ramdan');

--
-- Triggers `m_guru`
--
DELIMITER $$
CREATE TRIGGER `hapus_guru` AFTER DELETE ON `m_guru` FOR EACH ROW BEGIN
DELETE FROM m_soal WHERE m_soal.id_guru = OLD.id;
DELETE FROM m_admin WHERE m_admin.level = 'guru' AND m_admin.kon_id = OLD.id;
DELETE FROM tr_guru_mapel WHERE tr_guru_mapel.id_guru = OLD.id;
DELETE FROM tr_guru_tes WHERE tr_guru_tes.id_guru = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_mapel`
--

CREATE TABLE `m_mapel` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mapel`
--

INSERT INTO `m_mapel` (`id`, `nama`, `detail`, `thumbnail`) VALUES
(1, 'AKUTANSI', 'Berikut adalah ujian untuk mata pelajaran akutansi', 'https://cpssoft.com/wp-content/uploads/2019/06/akuntansi-800x305.jpg'),
(2, 'MULTIMEDIA', 'Berikut adalah ujian untuk mata pelajaran multimedia', 'http://blog.sarana-data.com/an-component/media/upload-gambar-artikel/what-is-multimedia1.jpg'),
(3, 'ADMINISTRASI PERKANTORAN', 'Berikut adalah ujian untuk mata pelajaran administrasi perkantoran', 'https://4.bp.blogspot.com/-MEtp9VvafFI/W9FoiNf5MsI/AAAAAAAABxw/vrY-6QbKJfoqr8oTke9bYLRdFyUslCtYgCLcBGAs/s1600/data%2Bweb%2B1.jpg'),
(4, 'TATA NIAGA', 'Berikut adalah ujian untuk mata pelajaran tata niaga', 'https://belajartani.com/wp-content/uploads/2019/11/Mengenal-Tata-Niaga-Per-Jagung-an-Di-Indonesia-Petani-Wajib-Tahu.jpg'),
(5, 'TEKNIK KOMPUTER JARINGAN', 'Berikut adalah ujian untuk mata pelajaran teknik komputer jaringan', 'http://2.bp.blogspot.com/-M6O7KpIIqjM/VzoOPTWkjII/AAAAAAAAAoo/lhp24UxJZOIwtZc-pY-gvtsSxG1AmjYJQCK4B/s1600/Cover%2BPost%2BTKJ.jpg');

--
-- Triggers `m_mapel`
--
DELIMITER $$
CREATE TRIGGER `hapus_mapel` AFTER DELETE ON `m_mapel` FOR EACH ROW BEGIN
DELETE FROM m_soal WHERE m_soal.id_mapel = OLD.id;
DELETE FROM tr_guru_mapel WHERE tr_guru_mapel.id_mapel = OLD.id;
DELETE FROM tr_guru_tes WHERE tr_guru_tes.id_mapel = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_materi`
--

CREATE TABLE `m_materi` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_materi`
--

INSERT INTO `m_materi` (`id`, `id_mapel`, `id_guru`, `materi`) VALUES
(10, 1, 83, '<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<p>tejasidjawijdwiajiawjwiadjiawst</p>\r\ndasdasdasdasdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss'),
(11, 3, 83, '<p>as</p>\r\n'),
(14, 2, 83, 'materi ke 1'),
(15, 2, 83, 'materi ke 2'),
(16, 2, 83, 'materi ke 3'),
(17, 2, 83, 'materi ke 4'),
(18, 2, 83, 'materi ke 5'),
(19, 2, 83, 'materi ke 6'),
(20, 2, 83, 'materi ke 7'),
(21, 2, 83, 'materi ke 8'),
(22, 2, 83, 'materi ke 9'),
(23, 2, 83, 'materi ke 10'),
(24, 2, 83, 'materi ke 11'),
(25, 2, 83, 'materi ke 12'),
(26, 2, 83, 'materi ke 13'),
(27, 2, 83, 'materi ke 14'),
(28, 2, 83, 'materi ke 15'),
(29, 2, 83, 'materi ke 16'),
(30, 2, 83, 'materi ke 17'),
(31, 2, 83, 'materi ke 18'),
(32, 2, 83, 'materi yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasdmateri yang hapalah hapalahasdasdasdasdasdasd'),
(33, 1, 83, '<p>nah ketika ada materi baru maka materi tersebut akan ditampilkan disiniiisidsfisdfdsfsdfsd</p>\r\n'),
(34, 2, 83, 'materi yang hapalah hapalah'),
(35, 2, 83, 'upload/temp/BAB II (KP).docx'),
(36, 2, 83, 'upload/temp/BAB II (KP).docx'),
(37, 1, 83, 'upload/temp/001.pdf'),
(38, 2, 83, 'upload/temp/001.pdf'),
(39, 2, 83, 'upload/temp/001.pdf'),
(40, 4, 83, 'upload/temp/001.pdf'),
(41, 2, 83, 'upload/temp/001.pdf'),
(42, 3, 83, 'upload/temp/BAB II(1).docx');

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `id` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_siswa`
--

INSERT INTO `m_siswa` (`id`, `nama`, `nim`, `jurusan`) VALUES
(51, 'andreanoscar', '8020160022', 'TKJ/TEKNIKINFORMATIKA'),
(52, 'imelda zulvina', '5E1C2', 'AK(AKUTANSI)');

--
-- Triggers `m_siswa`
--
DELIMITER $$
CREATE TRIGGER `hapus_siswa` AFTER DELETE ON `m_siswa` FOR EACH ROW BEGIN
DELETE FROM tr_ikut_ujian WHERE tr_ikut_ujian.id_user = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_soal`
--

CREATE TABLE `m_soal` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL,
  `bobot` int(2) NOT NULL,
  `file` varchar(150) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `jml_benar` int(6) NOT NULL,
  `jml_salah` int(6) NOT NULL,
  `gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_soal`
--

INSERT INTO `m_soal` (`id`, `id_guru`, `id_mapel`, `bobot`, `file`, `tipe_file`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`, `tgl_input`, `jml_benar`, `jml_salah`, `gambar`) VALUES
(1, 83, 1, 1, '', '', '<p>soal 1</p>\r\n', '#####<p>jawaban a</p>\r\n', '#####<p>jawaban b</p>\r\n', '#####<p>jawaban c</p>\r\n', '#####<p>jawaban d</p>\r\n', '', 'A', '0000-00-00 00:00:00', 5, 1, 0),
(2, 83, 1, 1, '', '', '<p>soal 2</p>\r\n', '#####<p>entahlah</p>\r\n', '#####<p>gak tau</p>\r\n', '#####<p>lebih gak tau</p>\r\n\r\n<p>&nbsp;</p>\r\n', '#####<p>ini lebih gak tau lagii</p>\r\n', '', 'A', '0000-00-00 00:00:00', 1, 1, 0),
(3, 83, 2, 1, '', '', 'Soal ke 1', '#####opsi A.1', '#####opsi B.1', '#####opsi C.1', '#####opsi D.1', '#####opsi E.1', 'A', '2020-01-17 23:22:03', 2, 0, 0),
(4, 83, 2, 1, '', '', 'Soal ke 2', '#####opsi A.2', '#####opsi B.2', '#####opsi C.2', '#####opsi D.2', '#####opsi E.2', 'B', '2020-01-17 23:22:03', 0, 2, 0),
(5, 83, 2, 1, '', '', 'Soal ke 3', '#####opsi A.3', '#####opsi B.3', '#####opsi C.3', '#####opsi D.3', '#####opsi E.3', 'E', '2020-01-17 23:22:03', 0, 2, 0),
(6, 83, 2, 1, '', '', 'Soal ke 4', '#####opsi A.4', '#####opsi B.4', '#####opsi C.4', '#####opsi D.4', '#####opsi E.4', 'D', '2020-01-17 23:22:03', 1, 1, 0),
(7, 83, 2, 1, '', '', 'Soal ke 5', '#####opsi A.5', '#####opsi B.5', '#####opsi C.5', '#####opsi D.5', '#####opsi E.5', 'E', '2020-01-17 23:22:03', 0, 2, 0),
(8, 83, 2, 1, '', '', 'Soal ke 6', '#####opsi A.6', '#####opsi B.6', '#####opsi C.6', '#####opsi D.6', '#####opsi E.6', 'C', '2020-01-17 23:22:03', 0, 0, 0),
(9, 83, 2, 1, '', '', 'Soal ke 7', '#####opsi A.7', '#####opsi B.7', '#####opsi C.7', '#####opsi D.7', '#####opsi E.7', 'A', '2020-01-17 23:22:03', 0, 0, 0),
(10, 83, 2, 1, '', '', 'Soal ke 8', '#####opsi A.8', '#####opsi B.8', '#####opsi C.8', '#####opsi D.8', '#####opsi E.8', 'B', '2020-01-17 23:22:03', 0, 0, 0),
(11, 83, 2, 1, '', '', 'Soal ke 9', '#####opsi A.9', '#####opsi B.9', '#####opsi C.9', '#####opsi D.9', '#####opsi E.9', 'B', '2020-01-17 23:22:03', 0, 0, 0),
(12, 83, 2, 1, '', '', 'Soal ke 10', '#####opsi A.10', '#####opsi B.10', '#####opsi C.10', '#####opsi D.10', '#####opsi E.10', 'C', '2020-01-17 23:22:03', 0, 0, 0),
(13, 83, 2, 1, '', '', 'Soal ke 11', '#####opsi A.11', '#####opsi B.11', '#####opsi C.11', '#####opsi D.11', '#####opsi E.11', 'D', '2020-01-17 23:22:03', 0, 0, 0),
(14, 83, 2, 1, '', '', 'Soal ke 12', '#####opsi A.12', '#####opsi B.12', '#####opsi C.12', '#####opsi D.12', '#####opsi E.12', 'E', '2020-01-17 23:22:03', 0, 0, 0),
(15, 83, 2, 1, '', '', 'Soal ke 13', '#####opsi A.13', '#####opsi B.13', '#####opsi C.13', '#####opsi D.13', '#####opsi E.13', 'A', '2020-01-17 23:22:03', 0, 0, 0),
(16, 83, 2, 1, '', '', 'Soal ke 14', '#####opsi A.14', '#####opsi B.14', '#####opsi C.14', '#####opsi D.14', '#####opsi E.14', 'A', '2020-01-17 23:22:03', 0, 0, 0),
(17, 83, 2, 1, '', '', 'Soal ke 15', '#####opsi A.15', '#####opsi B.15', '#####opsi C.15', '#####opsi D.15', '#####opsi E.15', 'D', '2020-01-17 23:22:03', 0, 0, 0),
(18, 83, 2, 1, '', '', 'Soal ke 16', '#####opsi A.16', '#####opsi B.16', '#####opsi C.16', '#####opsi D.16', '#####opsi E.16', 'C', '2020-01-17 23:22:03', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_guru_mapel`
--

CREATE TABLE `tr_guru_mapel` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_guru_mapel`
--

INSERT INTO `tr_guru_mapel` (`id`, `id_guru`, `id_mapel`) VALUES
(38, 83, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_guru_tes`
--

CREATE TABLE `tr_guru_tes` (
  `id` int(6) NOT NULL,
  `id_guru` int(6) NOT NULL,
  `id_mapel` int(6) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(6) NOT NULL,
  `waktu` int(6) NOT NULL,
  `jenis` enum('acak','set') NOT NULL,
  `detil_jenis` varchar(500) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_guru_tes`
--

INSERT INTO `tr_guru_tes` (`id`, `id_guru`, `id_mapel`, `nama_ujian`, `jumlah_soal`, `waktu`, `jenis`, `detil_jenis`, `tgl_mulai`, `terlambat`, `token`, `thumbnail`) VALUES
(1, 83, 1, 'test 321', 1, 120, 'acak', '', '2020-01-01 01:01:00', '2020-01-22 01:01:00', 'ZQSCD', ''),
(2, 83, 1, 'test 321', 1, 120, 'acak', '', '2020-01-01 01:01:00', '2020-01-22 01:01:00', 'CHAAM', ''),
(3, 83, 1, 'ujian 123', 3, 120, 'acak', '', '2020-01-19 08:00:00', '2020-01-21 09:00:00', 'WOZOO', ''),
(4, 83, 2, 'pilihan ganda', 5, 10, 'set', '', '2020-01-19 15:16:00', '2020-01-23 00:00:00', 'JVNMU', ''),
(5, 83, 1, '123456666', 1, 120, 'acak', '', '2020-01-19 07:00:00', '2020-12-25 10:00:00', 'YLEXG', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_ikut_ujian`
--

CREATE TABLE `tr_ikut_ujian` (
  `id` int(6) NOT NULL,
  `id_tes` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(6) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_ikut_ujian`
--

INSERT INTO `tr_ikut_ujian` (`id`, `id_tes`, `id_user`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(44, 5, 49, '110', '110:A', 1, '0.00', '100.00', '2020-01-10 04:30:21', '2020-01-10 04:30:21', 'N'),
(45, 5, 49, '110', '110:A', 1, '0.00', '100.00', '2020-01-10 04:30:24', '2020-01-10 04:30:24', 'N'),
(46, 1, 0, '2', '2:A:N', 1, '100.00', '100.00', '2020-01-18 07:25:51', '2020-01-18 09:25:51', 'N'),
(47, 1, 51, '1', '1::N', 0, '0.00', '0.00', '2020-01-18 07:53:47', '2020-01-18 09:53:47', 'N'),
(48, 4, 51, '3,4,5,6,7', '3:A:N,4:C:N,5:B:N,6:D:N,7:D:N', 2, '40.00', '40.00', '2020-01-19 15:16:42', '2020-01-19 15:26:42', 'N'),
(51, 8, 0, '1,21,2', '1:A:N,21:B:N,2:C:N', 1, '33.33', '33.33', '2020-01-19 17:25:01', '2020-01-19 19:25:01', 'N'),
(52, 2, 51, '1', '1:A:Y', 1, '100.00', '100.00', '2020-01-19 17:29:11', '2020-01-19 19:29:11', 'N'),
(53, 2, 0, '1', '1:A:N', 1, '100.00', '100.00', '2020-01-19 18:19:26', '2020-01-19 20:19:26', 'N'),
(54, 1, 52, '1', '1:A:N', 1, '100.00', '100.00', '2020-01-19 19:24:47', '2020-01-19 21:24:47', 'N'),
(55, 4, 0, '3,4,5,6,7', '3:A:N,4:C:N,5:B:N,6:C:N,7:D:N', 1, '20.00', '20.00', '2020-01-19 19:30:44', '2020-01-19 19:40:44', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kon_id` (`kon_id`),
  ADD KEY `password` (`password`),
  ADD KEY `password_2` (`password`);

--
-- Indexes for table `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_materi`
--
ALTER TABLE `m_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_soal`
--
ALTER TABLE `m_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tr_guru_mapel`
--
ALTER TABLE `tr_guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tr_guru_tes`
--
ALTER TABLE `tr_guru_tes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tr_ikut_ujian`
--
ALTER TABLE `tr_ikut_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tes` (`id_tes`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `m_guru`
--
ALTER TABLE `m_guru`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_materi`
--
ALTER TABLE `m_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `m_siswa`
--
ALTER TABLE `m_siswa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `m_soal`
--
ALTER TABLE `m_soal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tr_guru_mapel`
--
ALTER TABLE `tr_guru_mapel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tr_guru_tes`
--
ALTER TABLE `tr_guru_tes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tr_ikut_ujian`
--
ALTER TABLE `tr_ikut_ujian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_materi`
--
ALTER TABLE `m_materi`
  ADD CONSTRAINT `m_materi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `m_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `m_materi_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `m_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tr_guru_tes`
--
ALTER TABLE `tr_guru_tes`
  ADD CONSTRAINT `tr_guru_tes_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `m_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_guru_tes_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `m_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
