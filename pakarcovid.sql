-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 07:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakarcovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `password2`, `nama`) VALUES
(7, 'denyganteng', 'adminpkzz', 'admin', 'Moch Deny Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idartikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`idartikel`, `judul`, `gambar`, `info`, `url`, `date`) VALUES
(7, '11 Tahap Kedatangan Vaksin COVID-19 di Indonesia', '6090112f2b97a.png', 'Pemerintah Indonesia berkomitmen agar program vaksinasi COVID-19 dapat berjalan lancar dan berhasil membentuk kekebalan kelompok.\r\n\r\nBentuk komitmen itu ditunjukkan dengan mengupayakan ketersediaan vaksin COVID-19 melalui berbagai diplomasi, baik antarnegara (bilateral) dan banyak negara (multilateral) seperti bersama COVAX Facility.\r\n\r\nHingga 1 Mei 2021, sudah ada 11 tahap kedatangan vaksin di Indonesia dengan total mencapai 65.500.000 dosis berupa bahan baku (bulk) dari Sinovac yang akan diolah oleh PT Bio Farma, dan 8.948.000 dosis vaksin jadi dari Sinovac, AstraZeneca, dan Sinopharm.\r\n\r\nUntuk informasi terkait COVID-19 kunjungi situs resmi Penanganan COVID-19 dan Pemulihan Ekonomi Nasional https://covid19.go.id/ \r\n\r\n#KPCPEN #SayangiIndonesia #JanganAbai | Lindungi Diri Lindungi Negeri', 'https://covid19.go.id/edukasi/masyarakat-umum/11-tahap-kedatangan-vaksin-covid-19-di-indonesia', '2021-05-03 15:05:19'),
(8, '7 Fakta Vaksin COVID-19 Produksi Sinopharm', '6090118126425.png', 'Vaksin COVID-19 buatan Sinopharm tiba pertama kali di Indonesia pada 30 April 2021.\r\n\r\nBerikut 7 fakta yang perlu diketahui tentang Sinopharm, mulai dari jenis vaksin, dosis yang diberikan sampai kedatangannya di Indonesia.\r\n\r\nUntuk informasi terkait COVID-19 kunjungi situs resmi Penanganan COVID-19 dan Pemulihan Ekonomi Nasional https://covid19.go.id/ \r\n\r\n#KPCPEN #SayangiIndonesia #JanganAbai | Lindungi Diri Lindungi Negeri', 'https://covid19.go.id/edukasi/masyarakat-umum/7-fakta-vaksin-covid-19-produksi-sinopharm', '2021-05-03 15:06:41'),
(9, 'Virus Corona dari Cina Diduga Menular Antar Manusia', '609012de149a4.png', 'Direktur Jenderal Pencegahan dan Pengendalian Penyakit, Kemenkes dr. Anung Sugihantono, M.Kes menerima pemberitaan dari pemerintah Cina tentang terjadinya indikasi penularan Virus Corona di Cina atau novel Corona Virus (nCoV) dari manusia ke manusia. Sampai dengan 21 Januari sudah 218 orang warga Cina tertular virus nCoV, dengan 4 kematian.\r\n\r\n\'Ini menjadi perhatian yang serius bagi pemerintah, bukan hanya pemerintah Indonesia tapi juga WHO,\' katanya, Selasa (21/1) di Gedung Kemenkes, Jakarta.\r\n\r\nSiang tadi, lanjut dr. Anung, setelah ada pemberitaan itu, Kemenkes mengundang berbagai pihak termasuk WHO untuk menskenariokan strategi dalam rangka menyiapkan sekaligus mengantisipasi penyebaran nCoV yang ada di Wuhan. Hingga berita ini publikasikan, WHO belum mengambil keputusan tingkat kewaspadaan seperti apa.\r\n\r\n\'Tetapi ada informasi dari WHO bahwa besok Sekjen PBB akan mengundang berbagai pihak yang berkaitan dengan hal ini (masalah nCoV) untuk menentukan langkah lebih lanjut dari kebijakan di bidang kesehatan oleh WHO,\' kata dr. Anung.\r\n\r\nKarakteristik nCoV mirip virus yang memicu Sindrom Pernapasan Akut Berat, atau SARS. Terkait hal itu Kemenkes sudah mengaktifkan kembali 100 RS rujukan Flu Burung yang sudah ada SK Menkes nomor 414 tahun 2007, melalui surat dari Direktorat Jenderal Pelayanan Kesehatan, pada 7 januari 2020 untuk mengupdate kemampuan, logistik, Standar Operasional Prosedur yang ada untuk mengantisipasi hal-hal yang berkaitan dengan kasus nCoV.\r\n', 'https://www.kemkes.go.id/article/view/20012200002/virus-corona-dari-cina-diduga-menular-antar-manusi', '2021-05-03 15:12:30'),
(10, 'Peta Lebaran #DiRumahAja', '60901341793db.png', 'Tidak terasa Lebaran akan segera tiba.\r\n\r\nDengan situasi pandemi COVID-19 yang masih berlangsung, mari rayakan Lebaran dengan tetap asyik #DiRumahAja.\r\n\r\nSilaturahmi harus tetap berjalan secara virtual. Tidak mudik dan hindari kerumunan supaya keluarga lebih aman.\r\n\r\nIngat selalu disiplin protokol kesehatan dan dukung program vaksinasi COVID-19 demi kekebalan kelompok lekas terwujud!\r\n\r\nUntuk informasi terkait COVID-19 kunjungi situs resmi Penanganan COVID-19 dan Pemulihan Ekonomi Nasional https://covid19.go.id\r\n\r\n#KPCPEN #SayangiIndonesia #JanganAbai | Lindungi Diri Lindungi Negeri', 'https://covid19.go.id/edukasi/masyarakat-umum/peta-lebaran-dirumahaja', '2021-05-03 15:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `cfpakar`
--

CREATE TABLE `cfpakar` (
  `kodecfpakar` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `ket` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cfpakar`
--

INSERT INTO `cfpakar` (`kodecfpakar`, `nilai`, `ket`, `date`) VALUES
(1, 0, 'Pasti Tidak', '2020-11-24 08:21:44'),
(2, 0.2, 'Mungkin Tidak', '2020-11-24 08:25:31'),
(3, 0.4, 'Mungkin Iya', '2020-11-24 08:25:44'),
(4, 0.6, 'Kemungkinan Besar Iya', '2020-11-24 08:26:22'),
(5, 0.8, 'Hampir Pasti Iya', '2020-11-24 08:26:41'),
(6, 1, 'Pasti Iya', '2020-11-24 08:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `nodiag` int(11) NOT NULL,
  `iddiagnosa` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `kodegejala` varchar(100) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  `jawab` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`nodiag`, `iddiagnosa`, `user`, `kodegejala`, `gejala`, `jawab`, `date`) VALUES
(7431, 'DGN001', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0.2, '2021-04-27 14:07:17'),
(7432, 'DGN001', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0.4, '2021-04-27 14:07:17'),
(7433, 'DGN001', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-04-27 14:07:17'),
(7434, 'DGN001', 'deny.prtm', 'GC04', 'Batuk Kering', 0, '2021-04-27 14:07:17'),
(7435, 'DGN001', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-04-27 14:07:17'),
(7436, 'DGN001', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-04-27 14:07:17'),
(7437, 'DGN001', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-27 14:07:17'),
(7438, 'DGN001', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-04-27 14:07:17'),
(7439, 'DGN001', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-27 14:07:17'),
(7440, 'DGN001', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-04-27 14:07:17'),
(7441, 'DGN001', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0.8, '2021-04-27 14:07:17'),
(7442, 'DGN001', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-04-27 14:07:17'),
(7443, 'DGN001', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-27 14:07:17'),
(7444, 'DGN001', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-27 14:07:17'),
(7445, 'DGN001', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-04-27 14:07:17'),
(7446, 'DGN001', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-27 14:07:17'),
(7447, 'DGN001', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-04-27 14:07:17'),
(7448, 'DGN001', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-04-27 14:07:17'),
(7449, 'DGN001', 'deny.prtm', 'GC19', 'Diare', 0, '2021-04-27 14:07:17'),
(7450, 'DGN002', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0, '2021-04-27 14:08:47'),
(7451, 'DGN002', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0, '2021-04-27 14:08:47'),
(7452, 'DGN002', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0.2, '2021-04-27 14:08:47'),
(7453, 'DGN002', 'deny.prtm', 'GC04', 'Batuk Kering', 0, '2021-04-27 14:08:47'),
(7454, 'DGN002', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0.6, '2021-04-27 14:08:47'),
(7455, 'DGN002', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-04-27 14:08:47'),
(7456, 'DGN002', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-27 14:08:47'),
(7457, 'DGN002', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-04-27 14:08:47'),
(7458, 'DGN002', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-27 14:08:47'),
(7459, 'DGN002', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-04-27 14:08:47'),
(7460, 'DGN002', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0.8, '2021-04-27 14:08:47'),
(7461, 'DGN002', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0.6, '2021-04-27 14:08:47'),
(7462, 'DGN002', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-27 14:08:47'),
(7463, 'DGN002', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-27 14:08:47'),
(7464, 'DGN002', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0.4, '2021-04-27 14:08:47'),
(7465, 'DGN002', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-27 14:08:47'),
(7466, 'DGN002', 'deny.prtm', 'GC17', 'Perut Mual', 0.6, '2021-04-27 14:08:47'),
(7467, 'DGN002', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-04-27 14:08:47'),
(7468, 'DGN002', 'deny.prtm', 'GC19', 'Diare', 0, '2021-04-27 14:08:47'),
(7469, 'DGN003', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0, '2021-04-27 14:34:54'),
(7470, 'DGN003', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0.4, '2021-04-27 14:34:54'),
(7471, 'DGN003', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0.2, '2021-04-27 14:34:54'),
(7472, 'DGN003', 'deny.prtm', 'GC04', 'Batuk Kering', 0.6, '2021-04-27 14:34:54'),
(7473, 'DGN003', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0.4, '2021-04-27 14:34:54'),
(7474, 'DGN003', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-04-27 14:34:54'),
(7475, 'DGN003', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-27 14:34:54'),
(7476, 'DGN003', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-04-27 14:34:54'),
(7477, 'DGN003', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-27 14:34:54'),
(7478, 'DGN003', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-04-27 14:34:54'),
(7479, 'DGN003', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0.8, '2021-04-27 14:34:54'),
(7480, 'DGN003', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0.6, '2021-04-27 14:34:54'),
(7481, 'DGN003', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-27 14:34:54'),
(7482, 'DGN003', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-27 14:34:54'),
(7483, 'DGN003', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0.4, '2021-04-27 14:34:54'),
(7484, 'DGN003', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-27 14:34:54'),
(7485, 'DGN003', 'deny.prtm', 'GC17', 'Perut Mual', 0.6, '2021-04-27 14:34:54'),
(7486, 'DGN003', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-04-27 14:34:54'),
(7487, 'DGN003', 'deny.prtm', 'GC19', 'Diare', 0, '2021-04-27 14:34:54'),
(7488, 'DGN004', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0, '2021-04-28 14:51:55'),
(7489, 'DGN004', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0.4, '2021-04-28 14:51:55'),
(7490, 'DGN004', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0.2, '2021-04-28 14:51:55'),
(7491, 'DGN004', 'deny.prtm', 'GC04', 'Batuk Kering', 0.6, '2021-04-28 14:51:55'),
(7492, 'DGN004', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0.4, '2021-04-28 14:51:55'),
(7493, 'DGN004', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-04-28 14:51:55'),
(7494, 'DGN004', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-28 14:51:55'),
(7495, 'DGN004', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-04-28 14:51:55'),
(7496, 'DGN004', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-28 14:51:55'),
(7497, 'DGN004', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-04-28 14:51:55'),
(7498, 'DGN004', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-04-28 14:51:55'),
(7499, 'DGN004', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-04-28 14:51:55'),
(7500, 'DGN004', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-28 14:51:55'),
(7501, 'DGN004', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-28 14:51:55'),
(7502, 'DGN004', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-04-28 14:51:55'),
(7503, 'DGN004', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-28 14:51:55'),
(7504, 'DGN004', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-04-28 14:51:55'),
(7505, 'DGN004', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-04-28 14:51:55'),
(7506, 'DGN004', 'deny.prtm', 'GC19', 'Diare', 0, '2021-04-28 14:51:55'),
(7507, 'DGN005', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0, '2021-04-28 14:56:03'),
(7508, 'DGN005', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0, '2021-04-28 14:56:03'),
(7509, 'DGN005', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0.2, '2021-04-28 14:56:03'),
(7510, 'DGN005', 'deny.prtm', 'GC04', 'Batuk Kering', 0.6, '2021-04-28 14:56:03'),
(7511, 'DGN005', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0.4, '2021-04-28 14:56:03'),
(7512, 'DGN005', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-04-28 14:56:03'),
(7513, 'DGN005', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-28 14:56:03'),
(7514, 'DGN005', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-04-28 14:56:03'),
(7515, 'DGN005', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-28 14:56:03'),
(7516, 'DGN005', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-04-28 14:56:03'),
(7517, 'DGN005', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-04-28 14:56:03'),
(7518, 'DGN005', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-04-28 14:56:03'),
(7519, 'DGN005', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-28 14:56:03'),
(7520, 'DGN005', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-28 14:56:03'),
(7521, 'DGN005', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-04-28 14:56:03'),
(7522, 'DGN005', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-28 14:56:03'),
(7523, 'DGN005', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-04-28 14:56:03'),
(7524, 'DGN005', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-04-28 14:56:03'),
(7525, 'DGN005', 'deny.prtm', 'GC19', 'Diare', 0, '2021-04-28 14:56:03'),
(7526, 'DGN006', 'haihalo', 'GC01', 'Hidung Tersumbat', 0, '2021-04-28 18:01:32'),
(7527, 'DGN006', 'haihalo', 'GC02', 'Bersin - Bersin', 0, '2021-04-28 18:01:32'),
(7528, 'DGN006', 'haihalo', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-04-28 18:01:32'),
(7529, 'DGN006', 'haihalo', 'GC04', 'Batuk Kering', 0, '2021-04-28 18:01:32'),
(7530, 'DGN006', 'haihalo', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-04-28 18:01:32'),
(7531, 'DGN006', 'haihalo', 'GC06', 'Sesak Nafas', 0, '2021-04-28 18:01:32'),
(7532, 'DGN006', 'haihalo', 'GC07', 'Sakit Tenggorokan', 0, '2021-04-28 18:01:32'),
(7533, 'DGN006', 'haihalo', 'GC08', 'Nyeri Dada', 0.4, '2021-04-28 18:01:32'),
(7534, 'DGN006', 'haihalo', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-04-28 18:01:32'),
(7535, 'DGN006', 'haihalo', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-04-28 18:01:32'),
(7536, 'DGN006', 'haihalo', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0.4, '2021-04-28 18:01:32'),
(7537, 'DGN006', 'haihalo', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0.8, '2021-04-28 18:01:32'),
(7538, 'DGN006', 'haihalo', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-04-28 18:01:32'),
(7539, 'DGN006', 'haihalo', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-04-28 18:01:32'),
(7540, 'DGN006', 'haihalo', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-04-28 18:01:32'),
(7541, 'DGN006', 'haihalo', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-04-28 18:01:32'),
(7542, 'DGN006', 'haihalo', 'GC17', 'Perut Mual', 0.4, '2021-04-28 18:01:32'),
(7543, 'DGN006', 'haihalo', 'GC18', 'Muntah-Muntah', 0, '2021-04-28 18:01:32'),
(7544, 'DGN006', 'haihalo', 'GC19', 'Diare', 0, '2021-04-28 18:01:32'),
(7545, 'DGN007', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0.4, '2021-05-01 18:14:16'),
(7546, 'DGN007', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0.2, '2021-05-01 18:14:16'),
(7547, 'DGN007', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-05-01 18:14:16'),
(7548, 'DGN007', 'deny.prtm', 'GC04', 'Batuk Kering', 0, '2021-05-01 18:14:16'),
(7549, 'DGN007', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-01 18:14:16'),
(7550, 'DGN007', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-05-01 18:14:16'),
(7551, 'DGN007', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-01 18:14:16'),
(7552, 'DGN007', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-05-01 18:14:16'),
(7553, 'DGN007', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-01 18:14:16'),
(7554, 'DGN007', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-05-01 18:14:16'),
(7555, 'DGN007', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-01 18:14:16'),
(7556, 'DGN007', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-01 18:14:16'),
(7557, 'DGN007', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-01 18:14:16'),
(7558, 'DGN007', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-01 18:14:16'),
(7559, 'DGN007', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-01 18:14:16'),
(7560, 'DGN007', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-01 18:14:16'),
(7561, 'DGN007', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-05-01 18:14:16'),
(7562, 'DGN007', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-05-01 18:14:16'),
(7563, 'DGN007', 'deny.prtm', 'GC19', 'Diare', 0, '2021-05-01 18:14:16'),
(7564, 'DGN008', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0.4, '2021-05-01 18:14:48'),
(7565, 'DGN008', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0.2, '2021-05-01 18:14:48'),
(7566, 'DGN008', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0.4, '2021-05-01 18:14:48'),
(7567, 'DGN008', 'deny.prtm', 'GC04', 'Batuk Kering', 0, '2021-05-01 18:14:48'),
(7568, 'DGN008', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-01 18:14:48'),
(7569, 'DGN008', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-05-01 18:14:48'),
(7570, 'DGN008', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-01 18:14:48'),
(7571, 'DGN008', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-05-01 18:14:48'),
(7572, 'DGN008', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-01 18:14:48'),
(7573, 'DGN008', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-05-01 18:14:48'),
(7574, 'DGN008', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-01 18:14:48'),
(7575, 'DGN008', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-01 18:14:48'),
(7576, 'DGN008', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-01 18:14:48'),
(7577, 'DGN008', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-01 18:14:48'),
(7578, 'DGN008', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-01 18:14:48'),
(7579, 'DGN008', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-01 18:14:48'),
(7580, 'DGN008', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-05-01 18:14:48'),
(7581, 'DGN008', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-05-01 18:14:48'),
(7582, 'DGN008', 'deny.prtm', 'GC19', 'Diare', 0, '2021-05-01 18:14:48'),
(7583, 'DGN009', 'deny.prtm', 'GC01', 'Hidung Tersumbat', 0, '2021-05-01 18:16:31'),
(7584, 'DGN009', 'deny.prtm', 'GC02', 'Bersin - Bersin', 0, '2021-05-01 18:16:31'),
(7585, 'DGN009', 'deny.prtm', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-05-01 18:16:31'),
(7586, 'DGN009', 'deny.prtm', 'GC04', 'Batuk Kering', 0.8, '2021-05-01 18:16:31'),
(7587, 'DGN009', 'deny.prtm', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-01 18:16:31'),
(7588, 'DGN009', 'deny.prtm', 'GC06', 'Sesak Nafas', 0, '2021-05-01 18:16:31'),
(7589, 'DGN009', 'deny.prtm', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-01 18:16:31'),
(7590, 'DGN009', 'deny.prtm', 'GC08', 'Nyeri Dada', 0, '2021-05-01 18:16:31'),
(7591, 'DGN009', 'deny.prtm', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-01 18:16:31'),
(7592, 'DGN009', 'deny.prtm', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-05-01 18:16:31'),
(7593, 'DGN009', 'deny.prtm', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-01 18:16:31'),
(7594, 'DGN009', 'deny.prtm', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-01 18:16:31'),
(7595, 'DGN009', 'deny.prtm', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-01 18:16:31'),
(7596, 'DGN009', 'deny.prtm', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-01 18:16:31'),
(7597, 'DGN009', 'deny.prtm', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-01 18:16:31'),
(7598, 'DGN009', 'deny.prtm', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-01 18:16:31'),
(7599, 'DGN009', 'deny.prtm', 'GC17', 'Perut Mual', 0, '2021-05-01 18:16:31'),
(7600, 'DGN009', 'deny.prtm', 'GC18', 'Muntah-Muntah', 0, '2021-05-01 18:16:31'),
(7601, 'DGN009', 'deny.prtm', 'GC19', 'Diare', 0, '2021-05-01 18:16:31'),
(7602, 'DGN010', 'haihalo', 'GC01', 'Hidung Tersumbat', 0, '2021-05-02 12:51:59'),
(7603, 'DGN010', 'haihalo', 'GC02', 'Bersin - Bersin', 0.6, '2021-05-02 12:51:59'),
(7604, 'DGN010', 'haihalo', 'GC03', 'Demam > 38 Derajat Celcius', 0.4, '2021-05-02 12:51:59'),
(7605, 'DGN010', 'haihalo', 'GC04', 'Batuk Kering', 0, '2021-05-02 12:51:59'),
(7606, 'DGN010', 'haihalo', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-02 12:51:59'),
(7607, 'DGN010', 'haihalo', 'GC06', 'Sesak Nafas', 0, '2021-05-02 12:51:59'),
(7608, 'DGN010', 'haihalo', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-02 12:51:59'),
(7609, 'DGN010', 'haihalo', 'GC08', 'Nyeri Dada', 0, '2021-05-02 12:51:59'),
(7610, 'DGN010', 'haihalo', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-02 12:51:59'),
(7611, 'DGN010', 'haihalo', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-05-02 12:51:59'),
(7612, 'DGN010', 'haihalo', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-02 12:51:59'),
(7613, 'DGN010', 'haihalo', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0.4, '2021-05-02 12:51:59'),
(7614, 'DGN010', 'haihalo', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-02 12:51:59'),
(7615, 'DGN010', 'haihalo', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-02 12:51:59'),
(7616, 'DGN010', 'haihalo', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0.4, '2021-05-02 12:51:59'),
(7617, 'DGN010', 'haihalo', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-02 12:51:59'),
(7618, 'DGN010', 'haihalo', 'GC17', 'Perut Mual', 0, '2021-05-02 12:51:59'),
(7619, 'DGN010', 'haihalo', 'GC18', 'Muntah-Muntah', 0, '2021-05-02 12:51:59'),
(7620, 'DGN010', 'haihalo', 'GC19', 'Diare', 0, '2021-05-02 12:51:59'),
(7621, 'DGN011', 'haihalo', 'GC01', 'Hidung Tersumbat', 0.2, '2021-05-02 12:53:02'),
(7622, 'DGN011', 'haihalo', 'GC02', 'Bersin - Bersin', 0.4, '2021-05-02 12:53:02'),
(7623, 'DGN011', 'haihalo', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-05-02 12:53:02'),
(7624, 'DGN011', 'haihalo', 'GC04', 'Batuk Kering', 0, '2021-05-02 12:53:02'),
(7625, 'DGN011', 'haihalo', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-02 12:53:02'),
(7626, 'DGN011', 'haihalo', 'GC06', 'Sesak Nafas', 1, '2021-05-02 12:53:02'),
(7627, 'DGN011', 'haihalo', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-02 12:53:02'),
(7628, 'DGN011', 'haihalo', 'GC08', 'Nyeri Dada', 1, '2021-05-02 12:53:02'),
(7629, 'DGN011', 'haihalo', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-02 12:53:02'),
(7630, 'DGN011', 'haihalo', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0, '2021-05-02 12:53:02'),
(7631, 'DGN011', 'haihalo', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-02 12:53:02'),
(7632, 'DGN011', 'haihalo', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-02 12:53:02'),
(7633, 'DGN011', 'haihalo', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-02 12:53:02'),
(7634, 'DGN011', 'haihalo', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-02 12:53:02'),
(7635, 'DGN011', 'haihalo', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-02 12:53:02'),
(7636, 'DGN011', 'haihalo', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-02 12:53:02'),
(7637, 'DGN011', 'haihalo', 'GC17', 'Perut Mual', 0, '2021-05-02 12:53:02'),
(7638, 'DGN011', 'haihalo', 'GC18', 'Muntah-Muntah', 0, '2021-05-02 12:53:02'),
(7639, 'DGN011', 'haihalo', 'GC19', 'Diare', 0, '2021-05-02 12:53:02'),
(7640, 'DGN012', 'haihalo', 'GC01', 'Hidung Tersumbat', 0, '2021-05-02 12:55:19'),
(7641, 'DGN012', 'haihalo', 'GC02', 'Bersin - Bersin', 0, '2021-05-02 12:55:19'),
(7642, 'DGN012', 'haihalo', 'GC03', 'Demam > 38 Derajat Celcius', 0.2, '2021-05-02 12:55:19'),
(7643, 'DGN012', 'haihalo', 'GC04', 'Batuk Kering', 0.6, '2021-05-02 12:55:19'),
(7644, 'DGN012', 'haihalo', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0.4, '2021-05-02 12:55:19'),
(7645, 'DGN012', 'haihalo', 'GC06', 'Sesak Nafas', 0, '2021-05-02 12:55:19'),
(7646, 'DGN012', 'haihalo', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-02 12:55:19'),
(7647, 'DGN012', 'haihalo', 'GC08', 'Nyeri Dada', 0, '2021-05-02 12:55:19'),
(7648, 'DGN012', 'haihalo', 'GC09', 'Nyeri Otot atau Kelelahan', 0, '2021-05-02 12:55:19'),
(7649, 'DGN012', 'haihalo', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-05-02 12:55:19'),
(7650, 'DGN012', 'haihalo', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0, '2021-05-02 12:55:19'),
(7651, 'DGN012', 'haihalo', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-02 12:55:19'),
(7652, 'DGN012', 'haihalo', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-02 12:55:19'),
(7653, 'DGN012', 'haihalo', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-02 12:55:19'),
(7654, 'DGN012', 'haihalo', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-02 12:55:19'),
(7655, 'DGN012', 'haihalo', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-02 12:55:19'),
(7656, 'DGN012', 'haihalo', 'GC17', 'Perut Mual', 0, '2021-05-02 12:55:19'),
(7657, 'DGN012', 'haihalo', 'GC18', 'Muntah-Muntah', 0, '2021-05-02 12:55:19'),
(7658, 'DGN012', 'haihalo', 'GC19', 'Diare', 0, '2021-05-02 12:55:19'),
(7659, 'DGN013', 'haihalo', 'GC01', 'Hidung Tersumbat', 0, '2021-05-03 14:49:07'),
(7660, 'DGN013', 'haihalo', 'GC02', 'Bersin - Bersin', 0, '2021-05-03 14:49:07'),
(7661, 'DGN013', 'haihalo', 'GC03', 'Demam > 38 Derajat Celcius', 0, '2021-05-03 14:49:07'),
(7662, 'DGN013', 'haihalo', 'GC04', 'Batuk Kering', 0, '2021-05-03 14:49:07'),
(7663, 'DGN013', 'haihalo', 'GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', 0, '2021-05-03 14:49:07'),
(7664, 'DGN013', 'haihalo', 'GC06', 'Sesak Nafas', 0, '2021-05-03 14:49:07'),
(7665, 'DGN013', 'haihalo', 'GC07', 'Sakit Tenggorokan', 0, '2021-05-03 14:49:07'),
(7666, 'DGN013', 'haihalo', 'GC08', 'Nyeri Dada', 0, '2021-05-03 14:49:07'),
(7667, 'DGN013', 'haihalo', 'GC09', 'Nyeri Otot atau Kelelahan', 0.2, '2021-05-03 14:49:07'),
(7668, 'DGN013', 'haihalo', 'GC10', 'Anosmia atau Berkurangnya Indera Penciuman', 0.6, '2021-05-03 14:49:07'),
(7669, 'DGN013', 'haihalo', 'GC11', 'Ageusia atau Berkurangnya Indera Perasa', 0.8, '2021-05-03 14:49:07'),
(7670, 'DGN013', 'haihalo', 'GC12', 'Ruam Pada Kulit atau Gatal-Gatal', 0, '2021-05-03 14:49:07'),
(7671, 'DGN013', 'haihalo', 'GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', 0, '2021-05-03 14:49:07'),
(7672, 'DGN013', 'haihalo', 'GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', 0, '2021-05-03 14:49:07'),
(7673, 'DGN013', 'haihalo', 'GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', 0, '2021-05-03 14:49:07'),
(7674, 'DGN013', 'haihalo', 'GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', 0, '2021-05-03 14:49:07'),
(7675, 'DGN013', 'haihalo', 'GC17', 'Perut Mual', 0, '2021-05-03 14:49:07'),
(7676, 'DGN013', 'haihalo', 'GC18', 'Muntah-Muntah', 0, '2021-05-03 14:49:07'),
(7677, 'DGN013', 'haihalo', 'GC19', 'Diare', 0, '2021-05-03 14:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kodegejala` varchar(100) NOT NULL,
  `isigejala` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kodegejala`, `isigejala`, `date`) VALUES
('GC01', 'Hidung Tersumbat', '2021-03-11 12:27:50'),
('GC02', 'Bersin - Bersin', '2021-03-11 12:28:01'),
('GC03', 'Demam > 38 Derajat Celcius', '2021-03-11 12:28:09'),
('GC04', 'Batuk Kering', '2021-03-11 12:28:16'),
('GC05', 'Pernah Kontak Erat Dengan Pasien Positif Covid-19', '2021-03-11 12:28:26'),
('GC06', 'Sesak Nafas', '2021-03-11 12:28:43'),
('GC07', 'Sakit Tenggorokan', '2021-03-11 12:28:50'),
('GC08', 'Nyeri Dada', '2021-03-11 12:28:58'),
('GC09', 'Nyeri Otot atau Kelelahan', '2021-03-11 12:29:08'),
('GC10', 'Anosmia atau Berkurangnya Indera Penciuman', '2021-03-11 12:29:17'),
('GC11', 'Ageusia atau Berkurangnya Indera Perasa', '2021-03-11 12:29:28'),
('GC12', 'Ruam Pada Kulit atau Gatal-Gatal', '2021-03-11 12:29:40'),
('GC13', 'Memiliki Kormobid atau penyakit bawaan Diabetes', '2021-03-11 12:29:57'),
('GC14', 'Memiliki Kormobid atau penyakit bawaan Kanker', '2021-03-11 12:30:07'),
('GC15', 'Memiliki Kormobid atau Penyakit Bawaan Hipertensi', '2021-03-11 12:30:15'),
('GC16', 'Memiliki Kormobid atau Penyakit Bawaan Auto Imune', '2021-03-11 12:30:24'),
('GC17', 'Perut Mual', '2021-03-11 12:30:33'),
('GC18', 'Muntah-Muntah', '2021-03-11 12:30:56'),
('GC19', 'Diare', '2021-03-11 12:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `idhasil` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `kodepenyakit` varchar(100) NOT NULL,
  `iddiagnosa` varchar(100) NOT NULL,
  `prediksi` int(11) NOT NULL,
  `ncf` float NOT NULL,
  `pros` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`idhasil`, `user`, `kodepenyakit`, `iddiagnosa`, `prediksi`, `ncf`, `pros`, `date`) VALUES
('HSL001', 'deny.prtm', 'PC01', 'DGN001', 2, 0.52, 52, '2021-04-27 14:07:17'),
('HSL004', 'deny.prtm', 'PC01', 'DGN004', 4, 0.8848, 88.48, '2021-04-28 14:51:55'),
('HSL005', 'deny.prtm', 'PC02', 'DGN005', 4, 0.9232, 92.32, '2021-04-28 14:56:03'),
('HSL006', 'haihalo', 'PC02', 'DGN006', 4, 0.838758, 83.8758, '2021-04-28 18:01:32'),
('HSL007', 'deny.prtm', 'PC01', 'DGN007', 2, 0.4016, 40.16, '2021-05-01 18:14:16'),
('HSL008', 'deny.prtm', 'PC01', 'DGN008', 3, 0.64096, 64.096, '2021-05-01 18:14:48'),
('HSL009', 'deny.prtm', 'PC01', 'DGN009', 1, 0.8, 80, '2021-05-01 18:16:31'),
('HSL010', 'haihalo', 'PC02', 'DGN010', 3, 0.76896, 76.896, '2021-05-02 12:51:59'),
('HSL011', 'haihalo', 'PC01', 'DGN011', 2, 0.3616, 36.16, '2021-05-02 12:53:02'),
('HSL012', 'haihalo', 'PC02', 'DGN012', 4, 0.9232, 92.32, '2021-05-02 12:55:19'),
('HSL013', 'haihalo', 'PC02', 'DGN013', 3, 0.9296, 92.96, '2021-05-03 14:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kodepenyakit` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `solusi` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kodepenyakit`, `nama`, `info`, `solusi`, `date`) VALUES
('PC01', 'Suspek Corona Virus Disease (Covid-19)', 'Mengalami salah satu atau beberapa gejala infeksi saluran pernapasan (ISPA), seperti demam atau riwayat demam dengan suhu di atas 38 derajat Celsius dan salah satu gejala penyakit pernapasan, seperti batuk, sesak napas, sakit tenggorokan, bersin-bersin dan pilek', 'Makan makanan bergizi, Rajin olahraga dan istirahat, Jaga kebersihan lingkungan, Tidak merokok, Minum air putih 8 gelas/hari, Makan makanan yang dimasak sempurna, Lakukan Aktifitas di Rumah dan Menerapkan 5M :\r\nMemakai masker,\r\nMencuci tangan pakai sabun dan air mengalir,\r\nMenjaga jarak,\r\nMenjauhi kerumunan, serta\r\nMembatasi interaksi sosial.', '2021-05-03 14:38:38'),
('PC02', 'Probable Corona Virus Disease (Covid-19)', 'Mengalami gejala pernafasan ISPA berat, namun belum ada hasil pemeriksaan Swab RT-PCR (Reverse transcription-Polymerase Chain Reaction) yang memastikan bahwa dirinya positif COVID-19.', 'Isolasi Mandiri 10 hari dengan ditambah minimal 3 hari setelah tidak ada lagi menunjukkan gejala demam dan gangguan pernapasan. Istirahatlah yang cukup di rumah dan minum air yang cukup. Bila tetap merasa tidak nyaman, keluhan berlanjut, atau disertai dengan kesulitan bernapas (sesak atau napas cepat), segera memeriksakan diri ke fasilitas pelayanan kesehatan (fasyankes). Bila tetap merasa tidak nyaman, keluhan berlanjut, atau disertai dengan kesulitan bernapas (sesak atau napas cepat), segera memeriksakan diri ke fasilitas pelayanan kesehatan (fasyankes). Fasyankes akan melakukan screening pasien dalam pengawasan COVID-19 : Jika memenuhi kriteria pasien dalam pengawasan COVID-19, maka Anda akan dirujuk ke salah satu rumah sakit (RS) rujukan.', '2021-05-03 14:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `idrule` int(11) NOT NULL,
  `kodepenyakit` varchar(100) NOT NULL,
  `kodegejala` varchar(100) NOT NULL,
  `kodecfpakar` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`idrule`, `kodepenyakit`, `kodegejala`, `kodecfpakar`, `idadmin`, `date`) VALUES
(28, 'PC02', 'GC08', 4, 7, '2021-04-20 14:02:05'),
(30, 'PC02', 'GC13', 4, 7, '2021-04-20 14:03:11'),
(31, 'PC02', 'GC12', 4, 7, '2021-04-20 14:03:11'),
(32, 'PC02', 'GC17', 5, 7, '2021-04-20 14:03:11'),
(33, 'PC02', 'GC18', 5, 7, '2021-04-20 14:03:11'),
(36, 'PC01', 'GC03', 6, 7, '2021-04-20 14:03:11'),
(37, 'PC01', 'GC04', 6, 7, '2021-04-20 14:03:11'),
(38, 'PC01', 'GC05', 6, 7, '2021-04-20 14:03:11'),
(39, 'PC01', 'GC01', 5, 7, '2021-04-20 14:03:11'),
(40, 'PC02', 'GC05', 6, 7, '2021-04-20 14:03:11'),
(41, 'PC02', 'GC04', 6, 7, '2021-04-20 14:03:11'),
(42, 'PC02', 'GC09', 4, 7, '2021-04-20 14:03:11'),
(43, 'PC02', 'GC14', 4, 7, '2021-04-20 14:03:11'),
(44, 'PC02', 'GC15', 4, 7, '2021-04-20 14:03:11'),
(46, 'PC02', 'GC10', 6, 7, '2021-04-20 14:03:11'),
(47, 'PC02', 'GC11', 6, 7, '2021-04-20 14:03:11'),
(48, 'PC01', 'GC02', 4, 7, '2021-04-20 14:56:45'),
(49, 'PC01', 'GC07', 5, 7, '2021-04-26 13:01:07'),
(50, 'PC02', 'GC19', 5, 7, '2021-04-26 13:05:01'),
(51, 'PC02', 'GC16', 4, 7, '2021-04-26 13:05:43'),
(52, 'PC02', 'GC06', 5, 7, '2021-04-26 13:06:33'),
(53, 'PC02', 'GC07', 5, 7, '2021-04-26 13:07:39'),
(54, 'PC02', 'GC03', 6, 7, '2021-04-26 13:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `pass2` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` enum('Laki - Laki','Perempuan') NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pass`, `pass2`, `nama`, `gender`, `umur`, `alamat`, `date`) VALUES
('argaprima', 'asdfghjk', 'asdfghjk', 'argalepa', 'Laki - Laki', 20, 'Jl. in dulu aja beb', '2020-11-17 00:31:03'),
('deny.prtm', 'bnmjkliop', 'bnmjkliop', 'Deny Pratama', 'Laki - Laki', 21, 'Jl. sembarang', '2020-10-10 04:24:03'),
('fiandejavu', 'ahmadkofi', 'ahmadkofi', 'Ahmad Kofi', 'Laki - Laki', 21, 'Jl. in dulu aja', '2020-11-17 00:32:11'),
('haihalo', 'halohalo', 'halohalo', 'Halooo', 'Perempuan', 18, 'Jl. Polinema', '2020-11-21 10:29:27'),
('pakarsis', 'qweasdzxc', 'qweasdzxc', 'pakar tes', 'Perempuan', 20, 'Jl. in dulu aja beb', '2020-11-17 16:06:38'),
('testing', 'bnmiopjkl', 'bnmiopjkl', 'Test Program', 'Laki - Laki', 21, 'Jl. sembarang', '2020-11-17 08:02:38'),
('whyoy', 'zxcvbnm,', 'zxcvbnm,', 'woy', 'Laki - Laki', 25, 'Jl. Polinema', '2021-04-20 13:32:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idartikel`);

--
-- Indexes for table `cfpakar`
--
ALTER TABLE `cfpakar`
  ADD PRIMARY KEY (`kodecfpakar`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`nodiag`),
  ADD KEY `user` (`user`),
  ADD KEY `kodegejala` (`kodegejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kodegejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `user` (`user`),
  ADD KEY `kodepenyakit` (`kodepenyakit`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kodepenyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`idrule`),
  ADD KEY `kodepenyakit` (`kodepenyakit`),
  ADD KEY `kodegejala` (`kodegejala`),
  ADD KEY `kodecfpakar` (`kodecfpakar`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cfpakar`
--
ALTER TABLE `cfpakar`
  MODIFY `kodecfpakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `nodiag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7735;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `idrule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`kodegejala`) REFERENCES `gejala` (`kodegejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`kodepenyakit`) REFERENCES `penyakit` (`kodepenyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `fkGejala` FOREIGN KEY (`kodegejala`) REFERENCES `gejala` (`kodegejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`kodepenyakit`) REFERENCES `penyakit` (`kodepenyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`kodecfpakar`) REFERENCES `cfpakar` (`kodecfpakar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rule_ibfk_3` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
