-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 06:13 PM
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
-- Database: `islam1`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `access` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `access`) VALUES
(1, 'Admin'),
(3, 'Ustadz'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `juz`
--

CREATE TABLE `juz` (
  `id_juz` int(11) NOT NULL,
  `juz` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `juz`
--

INSERT INTO `juz` (`id_juz`, `juz`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `kajian`
--

CREATE TABLE `kajian` (
  `id` int(11) NOT NULL,
  `id_ustadz` varchar(12) NOT NULL,
  `nama_ustadz` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tempat_kajian` varchar(250) NOT NULL,
  `tanggal_kajian` date NOT NULL,
  `waktu` time NOT NULL,
  `materi_kajian` varchar(50) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kajian`
--

INSERT INTO `kajian` (`id`, `id_ustadz`, `nama_ustadz`, `email`, `tempat_kajian`, `tanggal_kajian`, `waktu`, `materi_kajian`, `gambar`, `is_active`) VALUES
(8, '3', 'popo', 'avatardiva@gmail.com', 'ccc', '2020-03-14', '23:59:00', 'adwd', 'blogging-blur-business-communication-261662.jpg', 1),
(9, '4', 'ustadz', 'ustadz@gmail.com', 'asdadsasd', '2020-06-05', '20:36:00', 'asdasdasd', '', 1),
(10, '4', 'ustadz', 'ustadz@gmail.com', 'asdasd23', '2020-07-03', '17:43:00', 'asdasdasda', '', 1),
(11, '4', 'ustadz', 'ustadz@gmail.com', 'asdasdasd2341', '2020-06-18', '18:15:00', 'qweqwe', '', 1),
(12, '4', 'ustadz', 'ustadz@gmail.com', '234asd', '2020-06-13', '18:20:00', 'asdasd', '', 1),
(13, '4', 'ustadz', 'ustadz@gmail.com', 'asdasd', '2020-06-17', '21:31:00', 'asdasdasd', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontakus`
--

CREATE TABLE `kontakus` (
  `id_k` int(11) NOT NULL,
  `namae` varchar(50) NOT NULL,
  `nohp` int(11) NOT NULL,
  `imil` varchar(40) NOT NULL,
  `kritik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontakus`
--

INSERT INTO `kontakus` (`id_k`, `namae`, `nohp`, `imil`, `kritik`) VALUES
(4, 'sad', 123123, 'adadwqd@gmail.com', 'asdasdasdasd'),
(5, 'Krisna', 822222222, 'kris@gmail.com', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `materi_islami`
--

CREATE TABLE `materi_islami` (
  `id_materi_islami` int(11) NOT NULL,
  `id_ustadz` varchar(12) NOT NULL,
  `nama_penulis` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `konten` varchar(5000) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `materi_islami`
--

INSERT INTO `materi_islami` (`id_materi_islami`, `id_ustadz`, `nama_penulis`, `email`, `judul`, `konten`, `tanggal_buat`) VALUES
(17, '', '', '', 'adadwwd', '<p>dadadadawdadaadaddawawdawd</p>', '2020-03-30 06:57:32'),
(18, '3', 'popo', 'avatardiva@gmail.com', 'adwwd', '<p>aadwadawdadawdwdawwdad</p>', '2020-03-30 07:02:42'),
(19, '4', 'ustadz', 'ustadz@gmail.com', 'asdasdasd', '<p>asdasdasdasd</p>', '2020-06-01 10:37:21'),
(20, '4', 'ustadz', 'ustadz@gmail.com', 'asdadsasda', '<p>asdadasdasd</p>', '2020-06-01 10:40:44'),
(21, '4', 'ustadz', 'ustadz@gmail.com', 'asdasd', '<p>2423432sadasdasd</p>', '2020-06-01 11:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email`, `name`, `subject`, `message`) VALUES
(7, 'admin@gmail.com', 'admin', 'asssa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(8, 'ustadz@gmail.com', 'ustadz', 'sdad', '2242323'),
(9, 'admin@gmail.com', 'asdasd', 'asdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `murottal`
--

CREATE TABLE `murottal` (
  `id_murottal` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `qori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `murottal`
--

INSERT INTO `murottal` (`id_murottal`, `judul`, `file`, `qori`) VALUES
(7, 'Al Fatihah', '001-Al-Fatihah.mp3', 'Misyari Rashid Al Afasy'),
(8, 'Al Baqarah', 'Al Baqarah.mp3', 'Misyari Rashid Al Afasy');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `country` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `country`) VALUES
(1, 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `quran_id`
--

CREATE TABLE `quran_id` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `nomor_ayat` int(11) DEFAULT NULL,
  `ayat` text,
  `arti_ayat` text,
  `latin` text
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `quran_id`
--

INSERT INTO `quran_id` (`id`, `id_surat`, `nomor_ayat`, `ayat`, `arti_ayat`, `latin`) VALUES
(0, 1, 1, 'بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ', 'Dengan nama Allah Yang Maha Pengasih, Maha Penyayang.', 'bismillāhir-raḥmānir-raḥīm'),
(1, 1, 2, 'اَلْحَمْدُ لِلّٰهِ رَبِّ الْعٰلَمِيْنَۙ', 'Segala puji bagi Allah, Tuhan seluruh alam,', 'al-ḥamdu lillāhi rabbil-\'ālamīn'),
(2, 1, 3, 'الرَّحْمٰنِ الرَّحِيْمِۙ', 'Yang Maha Pengasih, Maha Penyayang,', 'ar-raḥmānir-raḥīm'),
(3, 1, 4, 'مٰلِكِ يَوْمِ الدِّيْنِۗ', 'Pemilik hari pembalasan.', 'māliki yaumid-dīn'),
(4, 1, 5, 'اِيَّاكَ نَعْبُدُ وَاِيَّاكَ نَسْتَعِيْنُۗ', 'Hanya kepada Engkaulah kami menyembah dan hanya kepada Engkaulah kami mohon pertolongan.', 'iyyāka na\'budu wa iyyāka nasta\'īn'),
(5, 1, 6, 'اِهْدِنَا الصِّرَاطَ الْمُسْتَقِيْمَ ۙ', 'Tunjukilah kami jalan yang lurus,', 'ihdinaṣ-ṣirāṭal-mustaqīm'),
(6, 1, 7, 'صِرَاطَ الَّذِيْنَ اَنْعَمْتَ عَلَيْهِمْ ەۙ غَيْرِ الْمَغْضُوْبِ عَلَيْهِمْ وَلَا الضَّاۤلِّيْنَ', '(yaitu) jalan orang-orang yang telah Engkau beri nikmat kepadanya; bukan (jalan) mereka yang dimurkai, dan bukan (pula jalan) mereka yang sesat.', 'ṣirāṭallażīna an\'amta \'alaihim gairil-magḍụbi \'alaihim wa laḍ-ḍāllīn');

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id_surah` int(11) NOT NULL,
  `surah` varchar(15) NOT NULL,
  `arti_surah` varchar(50) NOT NULL,
  `jumlah_ayat` int(3) NOT NULL,
  `jenis_surah` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id_surah`, `surah`, `arti_surah`, `jumlah_ayat`, `jenis_surah`) VALUES
(1, 'Al Fatihah', 'Pembuka', 7, 'Makkiyah');

-- --------------------------------------------------------

--
-- Table structure for table `tafsir`
--

CREATE TABLE `tafsir` (
  `id_tafsir` int(11) NOT NULL,
  `id_ustadz` varchar(12) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `judul_tafsir` varchar(100) NOT NULL,
  `isi_tafsir` mediumtext NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tafsir`
--

INSERT INTO `tafsir` (`id_tafsir`, `id_ustadz`, `penulis`, `email`, `judul_tafsir`, `isi_tafsir`, `tanggal_buat`) VALUES
(10, '3', 'popo', 'avatardiva@gmail.com', 'abababa', '<p>dwdwdwdwddwdw</p>', '2020-03-30 07:03:30'),
(11, '3', 'popo', 'avatardiva@gmail.com', 'xxawd', '<p>awdawda</p>', '2020-03-30 07:07:22'),
(12, '4', 'ustadz', 'ustadz@gmail.com', 'asdasda', '<p>asdasdasdas</p>', '2020-06-01 10:40:53'),
(13, '4', 'ustadz', 'ustadz@gmail.com', 'asdasd', '<p>asdasd</p>', '2020-06-20 15:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name_user` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `facebook` varchar(40) DEFAULT NULL,
  `twitter` varchar(40) DEFAULT NULL,
  `github` varchar(40) DEFAULT NULL,
  `instagram` varchar(40) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_login` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name_user`, `email`, `country`, `image`, `password`, `facebook`, `twitter`, `github`, `instagram`, `role_id`, `is_active`, `is_login`, `date_created`) VALUES
(8, 'admin', 'admin@gmail.com', 'Indonesia', '4d8bbfe9e330bdb4e2631fa2c30a2c93.jpg', '$2y$10$BrPJw9meJK16/P0qyXSHQOQ1DGa4oHDTY/6j8sE6jgHU0QVFgg/zy', 'pramudya.alamsyah', 'compramudya', '', 'dipa_kun09', 1, 1, 0, 1580947868),
(23, 'pramudya', 'pramudyaalamsyah@gmail.com', 'Indonesia', 'default.jpg', '$2y$10$VEvItQcH9m6hfYKSIa4JJuD48Jw4VB9n9d50rdRIRfblG0WgP0Xmi', 'pramudya.alamsyah', 'compramudya', '', 'dipa_kun09', 2, 1, 0, 1585551121),
(24, 'popo', 'avatardiva@gmail.com', 'Indonesia', 'default.jpg', '$2y$10$TV6Lpauy5u3x5TtX/EdfsOD9bVpL9hrjODV/3ydcY5lttFzHn.kN2', 'pramudya.alamsyah', 'compramudya', '', 'dipa_kun09', 3, 1, 0, 1585551277),
(25, 'admin2', 'admin2@gmail.com', 'Indonesia', 'default.jpg', '$2y$10$8rVw/tUUJKafMsvMJy1BYust.1eW7N0wzCM0zuo8OHDu5nxoFPCNG', NULL, NULL, NULL, NULL, 1, 1, 0, 1591007651),
(26, 'ustadz', 'ustadz@gmail.com', 'Indonesia', 'default.jpg', '$2y$10$qPoVbzPDuTDbRH828kIY8u7UjY5hVYDUGsGcrnYdb/KFEVB3pkR4u', NULL, NULL, NULL, NULL, 3, 1, 0, 1591007751),
(27, 'member', 'member@gmail.com', 'Indonesia', 'default.jpg', '$2y$10$fsQSkJia4gNw5XxDxfYCTuUxmsOuJjY6nl/pF69LhRhCucc4D.wyi', NULL, NULL, NULL, NULL, 2, 1, 0, 1591008196);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 4),
(5, 1, 5),
(8, 1, 8),
(9, 2, 2),
(10, 2, 5),
(15, 3, 3),
(16, 3, 5),
(23, 3, 8),
(24, 2, 8),
(25, 2, 7),
(26, 2, 6),
(29, 4, 2),
(30, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Ustadz'),
(4, 'Menu'),
(5, 'Al Quran');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 4, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(2, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(3, 1, 'Dashboard', 'administrator', 'fas fa-fw fa-tachometer-alt', 1),
(4, 2, 'My Profile', 'user', 'fas fa-fw fa-address-card', 1),
(5, 1, 'Access', 'administrator/role', 'fas fa-fw fa-key', 1),
(6, 1, 'Message', 'administrator/contact', 'fas fa-fw fa-comments', 1),
(7, 1, 'List Member', 'user/member', 'fas fa-fw fa-list', 1),
(12, 3, 'Profil Ustadz', 'ustadz', 'fas fa-fw fa-edit', 1),
(14, 5, 'Quran', 'quran', 'fas fa-fw fa-quran', 1),
(15, 5, 'Murottal Quran', 'quran/murottal', 'fas fa-fw fa-volume-up', 1),
(18, 6, 'Hadist', 'hadist', 'fas fa-fw fa-book', 1),
(19, 6, 'Cari Hadist', 'hadist/cari', 'fas fa-fw fa-search', 1),
(20, 6, 'Tafsir Hadist', 'hadist/tafsir', 'fas fa-fw fa-book-open', 1),
(21, 7, 'Daftar Fiqih', 'fiqih', 'fas fa-fw fa-gavel', 1),
(23, 1, 'List Ustadz', 'administrator/data_ustadz', 'fas fa-fw fa-list', 1),
(26, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(35, 2, 'Changed Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(38, 3, 'Dashboard Saya', 'ustadz/dashboard', 'fas fa-fw fa-chalkboard', 1),
(39, 3, 'Kelola Kajian', 'ustadz/kajian', 'fas fa-fw fa-calendar-alt', 1),
(40, 3, 'Kelola Materi Islami', 'ustadz/materi_islami', 'fas fa-fw fa-layer-group', 1),
(41, 3, 'Kelola Tafsir', 'ustadz/tafsir', 'fas fa-fw fa-book-open', 1),
(42, 2, 'Tafsir', 'user/tafsir', 'fas fa-fw fa-book-open', 1),
(43, 2, 'Materi Islami', 'user/materi_islami', 'fas fa-fw fa-print', 1),
(44, 2, 'Jadwal Kajian', 'user/kajian', 'fas fa-fw fa-calendar-alt', 1),
(45, 1, 'Pesan Contact Us', 'administrator/contactuss', 'fas fa-fw fa-comments', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ustadz`
--

CREATE TABLE `ustadz` (
  `id_ustadz` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `keahlian` varchar(50) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ustadz`
--

INSERT INTO `ustadz` (`id_ustadz`, `name`, `email`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `keahlian`, `negara`, `alamat`, `password`, `foto`, `is_active`, `date_created`) VALUES
(3, 'popo', 'avatardiva@gmail.com', '09433', 'tdwdawd', '2020-03-20', 'adawdaw', 'Indonesia', 'fwfwfw', '$2y$10$TV6Lpauy5u3x5TtX/EdfsOD9bVpL9hrjODV/3ydcY5lttFzHn.kN2', 'smp-3.jpg', 1, 1585551277),
(4, 'ustadz', 'ustadz@gmail.com', '123123123123', 'asdasdasdasd', '2020-06-17', 'asdasdasd', 'Indonesia', 'asdasdasda', '$2y$10$qPoVbzPDuTDbRH828kIY8u7UjY5hVYDUGsGcrnYdb/KFEVB3pkR4u', '', 1, 1591007751);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juz`
--
ALTER TABLE `juz`
  ADD PRIMARY KEY (`id_juz`);

--
-- Indexes for table `kajian`
--
ALTER TABLE `kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakus`
--
ALTER TABLE `kontakus`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `materi_islami`
--
ALTER TABLE `materi_islami`
  ADD PRIMARY KEY (`id_materi_islami`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murottal`
--
ALTER TABLE `murottal`
  ADD PRIMARY KEY (`id_murottal`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quran_id`
--
ALTER TABLE `quran_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id_surah`);

--
-- Indexes for table `tafsir`
--
ALTER TABLE `tafsir`
  ADD PRIMARY KEY (`id_tafsir`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ustadz`
--
ALTER TABLE `ustadz`
  ADD PRIMARY KEY (`id_ustadz`),
  ADD UNIQUE KEY `email` (`name`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `juz`
--
ALTER TABLE `juz`
  MODIFY `id_juz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kajian`
--
ALTER TABLE `kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kontakus`
--
ALTER TABLE `kontakus`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi_islami`
--
ALTER TABLE `materi_islami`
  MODIFY `id_materi_islami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `murottal`
--
ALTER TABLE `murottal`
  MODIFY `id_murottal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id_surah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tafsir`
--
ALTER TABLE `tafsir`
  MODIFY `id_tafsir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ustadz`
--
ALTER TABLE `ustadz`
  MODIFY `id_ustadz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
