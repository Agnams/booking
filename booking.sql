-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2021 at 12:18 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `category` int(1) NOT NULL,
  `url` varchar(500) COLLATE utf8_latvian_ci NOT NULL,
  `txt` varchar(500) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `url`, `txt`) VALUES
(6, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/01_viesu-nams.jpg', 'Viesu nams'),
(7, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/02_Terase.jpg', 'Terase'),
(8, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/03_Viesu-nama-dzivojama-istaba-vakara.jpg', 'Viesu nama dzīvojamā istaba vakarā'),
(9, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/04_Virtuve.jpg', 'Virtuve'),
(10, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/05_Virtuve_1.jpg', 'Virtuve'),
(11, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/06_Viesu-nama-dzivojama-istaba.jpg', 'Viesu nama dzīvojamā istaba'),
(12, 1, 'http://www.kosisi.lv/images/galerija/r_viesunams/07_Ieejas-halle.jpg', 'Ieejas halle'),
(13, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/01_brivdienu-maja.jpg', 'Brīvdienu māja'),
(14, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/02_Atputas-zona-ar-kaminu.jpg', 'Atpūtas zona ar kamīnu'),
(15, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/03_Brivdienu-majas-dzivojama-istaba-vakara.jpg', 'Brīvdienu mājas dzīvojamā istaba vakarā'),
(16, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/04_Virtuves-sturis.jpg', 'Virtuves stūris'),
(17, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/05_Dzivojama-istaba-diena.jpg', 'Dzīvojamā istaba dienā'),
(18, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/06_Ar-malku-kurinama-pirts.jpg', 'Ar malku kurināma plīts'),
(19, 2, 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/09_Gulvietas-uz-matraciem-nometnei.jpg', 'Guļvietas uz matračiem nometnei'),
(20, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/1_lapene.jpg', 'Lapene'),
(21, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/2_LAPENE-PIE-DIKA.jpg', 'Lapene no dīķa'),
(22, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/3_LUCISI.jpg', 'Pašu kūpinātas zivis'),
(23, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/4_lapene-ziema.jpg', 'Dīķis ziemā'),
(24, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/5_lapene-interjers-1.jpg', ''),
(25, 3, 'http://www.kosisi.lv/images/galerija/r_lapene/6_vimbas.jpg', 'Svaigi kūpināta vimba'),
(26, 4, 'http://www.kosisi.lv/images/galerija/r_jura/1_OBD2505_hdr.jpg', 'Jūra'),
(27, 4, 'http://www.kosisi.lv/images/galerija/r_jura/2_OBD2507.jpg', ''),
(28, 4, 'http://www.kosisi.lv/images/galerija/r_jura/7_OBD2542_1.jpg', ''),
(29, 4, 'http://www.kosisi.lv/images/galerija/r_jura/9_OBD2504.jpg', ''),
(30, 4, 'http://www.kosisi.lv/images/galerija/r_jura/ABE_8791a.jpg', ''),
(31, 4, 'http://www.kosisi.lv/images/galerija/r_jura/ABE_8796a.jpg', ''),
(32, 4, 'http://www.kosisi.lv/images/galerija/r_jura/ABE_9041.jpg', ''),
(33, 4, 'http://www.kosisi.lv/images/galerija/r_jura/DSCF6628.jpg', ''),
(34, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSCN6856.jpg', ''),
(35, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSC_3198.jpg', ''),
(36, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSC_3200.jpg', ''),
(37, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSC_3203.jpg', ''),
(38, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSC_3207.jpg', ''),
(39, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/DSC_4014.jpg', ''),
(40, 5, 'http://www.kosisi.lv/images/galerija/r_darzs/_OBD2672.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_latvian_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_latvian_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `image`, `price`) VALUES
(1, 'Brīvdienu māja ', 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/01_brivdienu-maja.jpg', 200),
(2, 'Pirts atsevišķi', 'http://www.kosisi.lv/images/galerija/r_brivdienumaja/06_Ar-malku-kurinama-pirts.jpg', 200),
(3, 'Viesu nams pilnībā', 'http://www.kosisi.lv/images/galerija/r_viesunams/01_viesu-nams.jpg', 300),
(4, 'Viesu nama zāle', 'http://www.kosisi.lv/images/galerija/r_viesunams/03_Viesu-nama-dzivojama-istaba-vakara.jpg', 180),
(5, 'Jūras numurs', 'http://www.kosisi.lv/images/galerija/r_viesunams/09_Juras-numura-prieksistaba.jpg', 120),
(6, 'Dienvidu numurs', 'http://www.kosisi.lv/images/galerija/r_viesunams/11_Dienvidu-numura-atseviska-gulamistaba.jpg', 180),
(7, 'Rietumu numurs', 'http://www.kosisi.lv/images/galerija/r_viesunams/14_Rietumu-numura-atseviska-gulamistaba.jpg', 170),
(8, 'Austrumu numurs', 'http://www.kosisi.lv/images/galerija/r_viesunams/16_Austrumu-istaba.jpg', 130),
(9, 'Ziemeļu istaba', 'http://www.kosisi.lv/images/galerija/r_viesunams/17_Ziemelu-istaba.jpg', 120),
(10, 'Vidus istaba', 'http://www.kosisi.lv/images/galerija/r_viesunams/18_Vidus-istaba.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_latvian_ci NOT NULL,
  `checkIn` int(30) NOT NULL,
  `checkOut` int(30) NOT NULL,
  `days` int(2) NOT NULL,
  `adult` int(2) NOT NULL,
  `children` int(2) NOT NULL,
  `kidsBed` int(2) NOT NULL,
  `number` varchar(30) COLLATE utf8_latvian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_latvian_ci NOT NULL,
  `price` int(5) NOT NULL,
  `totalPrice` int(5) NOT NULL,
  `totalBooking` varchar(500) COLLATE utf8_latvian_ci NOT NULL,
  `timeWhen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` int(1) NOT NULL,
  `ip` varchar(20) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `name`, `checkIn`, `checkOut`, `days`, `adult`, `children`, `kidsBed`, `number`, `email`, `price`, `totalPrice`, `totalBooking`, `timeWhen`, `accepted`, `ip`) VALUES
(105, 'Agris', 1613080800, 1613253600, 2, 2, 0, 0, '105376418078', 'agriz1994@inbox.lv', 400, 800, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR', '2021-01-29 16:26:58', 1, '87.110.23.177'),
(106, 'Agris', 1612735200, 1612994400, 3, 4, 0, 0, '105901639829', 'agriz1994@inbox.lv', 400, 1200, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR', '2021-01-29 16:27:52', 1, '87.110.23.177'),
(107, 'Agris', 1612389600, 1612648800, 3, 3, 0, 0, '105901639829', 'agriz1994@inbox.lv', 400, 1200, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR', '2021-01-29 16:31:56', 1, '87.110.23.177'),
(108, 'Agris Namsons', 1612130400, 1612303200, 2, 4, 4, 2, '26454281', 'agris.namsons@gmail.com', 700, 1400, 'Pirts atsevišķi - 200EUR,Viesu nams pilnībā - 300EUR,Dienvidu numurs - 180EUR', '2021-01-29 16:35:58', 1, '87.110.23.177'),
(112, 'Agris Namsons', 1614549600, 1615327200, 9, 3, 0, 0, '105901639829', 'agriz1994@inbox.lv', 200, 1800, 'Brīvdienu māja  - 200EUR', '2021-01-29 18:58:05', 1, '87.110.23.177'),
(113, 'Agris Namsons', 1617224400, 1617483600, 3, 4, 2, 1, '26454281', 'agris.namsons@gmail.com', 710, 2130, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR,Viesu nams pilnībā - 300EUR', '2021-01-29 19:02:51', 1, '87.110.23.177'),
(115, 'Agris', 1611957600, 1612044000, 1, 2, 0, 0, '105376418078', 'agriz1994@inbox.lv', 200, 200, 'Pirts atsevišķi - 200EUR', '2021-01-29 19:11:03', 1, '87.110.23.177'),
(116, 'Agnese', 1615759200, 1615932000, 2, 12, 0, 0, '105041702961', 'agris.namsons@gmail.co', 580, 1160, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR,Viesu nama zāle - 180EUR', '2021-01-29 19:21:32', 1, '87.110.23.177'),
(117, 'Agnese', 1619384400, 1619730000, 4, 2, 0, 0, '105441691400', 'agris.namsons@gmail.com', 580, 2320, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR,Viesu nama zāle - 180EUR', '2021-01-29 19:23:24', 1, '87.110.23.177'),
(118, 'Agris Namsons', 1619125200, 1619211600, 1, 4, 1, 2, '26454281', 'agris.nsamsons@gmail.com', 420, 420, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR', '2021-01-30 10:40:03', 1, '87.110.23.177'),
(125, 'Agris Namsons', 1613340000, 1613426400, 1, 6, 0, 0, '105376418078', 'agriz1994@inbox.lv', 200, 200, 'Brīvdienu māja  - 200EUR', '2021-01-30 11:07:17', 0, '87.110.23.177'),
(132, 'Agris', 1627765200, 1627851600, 1, 2, 0, 0, '105901639829', 'agriz1994@inbox.lv', 200, 200, 'Brīvdienu māja  - 200EUR', '2021-01-30 11:18:28', 0, '87.110.23.177'),
(135, 'Agris Namsons', 1624827600, 1625000400, 2, 3, 2, 1, '26454281', 'agris.namsons@gmail.com', 870, 1740, 'Pirts atsevišķi - 200EUR,Viesu nams pilnībā - 300EUR,Viesu nama zāle - 180EUR,Dienvidu numurs - 180EUR', '2021-01-30 11:31:44', 1, '87.110.23.177'),
(136, 'Agris Namsons', 1624568400, 1624741200, 2, 4, 1, 1, '26454281', 'agris.namsons@gmail.com', 410, 820, 'Brīvdienu māja  - 200EUR,Pirts atsevišķi - 200EUR', '2021-01-30 11:35:37', 1, '87.110.23.177');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
