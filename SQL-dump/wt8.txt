-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 07:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wt8`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=97 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `tekst`, `autor`, `email`, `vrijeme`) VALUES
(85, 1, 'bb', 'bb', '', '2015-05-24 08:46:59'),
(86, 3, 'Ostavljam komentar  ', 'Haris', 'spahaa@hotmail.com', '2015-05-24 10:34:30'),
(87, 3, 'Ostavljam drugi komentar  ', 'Spaha', '', '2015-05-24 10:36:18'),
(88, 3, '  asd', 'asd', '', '2015-05-24 10:39:14'),
(89, 3, '  asdasdasd', 'asd', '', '2015-05-24 10:39:21'),
(90, 2, 'spahaa  ', 'hare', '', '2015-05-24 10:40:28'),
(91, 2, 'spahaa  ', 'hare', '', '2015-05-24 10:40:54'),
(92, 2, '  aaa', 'aaa', '', '2015-05-24 10:40:58'),
(93, 2, '  asdasd', 'asdasd', '', '2015-05-24 10:41:03'),
(94, 3, '  bbb', 'b', '', '2015-05-24 16:32:56'),
(95, 3, '  bbb', 'b', '', '2015-05-24 16:35:45'),
(96, 1, 'spaha  ', 'hare', '', '2015-05-25 09:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `sifra` char(128) COLLATE utf8_slovenian_ci NOT NULL,
  `tip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `korisnik`, `email`, `sifra`, `tip`) VALUES
(1, 'test_user', 'test@example.com', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) DEFAULT NULL,
  `vrijeme` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`) VALUES
(1, 'Vijest br.1', 'Iudicabit scribentur has eu, et usu eius praesent. Vis corpora maluisset argumentum ex, ea vim agam movet scribentur. Et meis nullam qualisque ius, cum in vocent efficiantur, brute munere vix no. Cu nam fierent torquatos persequeris, justo libris possim eu nam. Simul soleat elaboraret mel et, aeterno deseruisse qui eu.', 'admin', '2015-05-21 06:28:10'),
(2, 'Vijest br.2', 'Admodum delicata eam eu, mel justo incorrupte id. Vim in repudiare honestatis. Sint vocent perfecto te mei, ex mel sint purto propriae, te vero tantas utinam nec. Sea in suas commodo, cetero recteque pro ad, ne aperiri discere vix.', 'admin', '2015-05-21 06:44:11'),
(3, 'Vijest br.3', 'Per prima dolor ullamcorper no, voluptatum constituam quo cu. Nec errem audire consequat no, an sit ornatus quaestio mediocrem, an prima homero nusquam pro. Atqui solet honestatis id usu. Id sit vero euismod nostrum, eum te affert lucilius, laudem scaevola eos no. Sea possim dissentiet cu.', 'korisnik', '2015-05-21 06:57:26');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
