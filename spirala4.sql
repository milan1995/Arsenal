-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 03:52 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spirala4`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '2854bc6de6d4b29b56f095aeecca316b'),
('almasaodzak', '43175836dbb22370f7888f00c9aae0b3'),
('eminakrehic', '625ac8acc520b7df9e3935fb829cdf8a'),
('harissupic', '52ccad3dc2d55049b3b89ed3eba2df01'),
('husefatkic', 'b0bc6201bc452447002da8e2531ff1cd'),
('irfanprazina', '2854bc6de6d4b29b56f095aeecca316b'),
('milanzuza', '24d15d007cd9621e32635c8c3cdfc248'),
('mujomujic', 'd283587a132faaf2ea2dab40f4c4279c'),
('selmirhasanovic', '5c394a8df84039d4d838d6d3160ba03f'),
('seminpalalic', '029fbca7311282c08293db6a4a86c44f'),
('suljosuljic', '28d83ac04bc713a1dda9c350b5047780'),
('vensadaokanovic', 'e936862469bf4b86cfc2a2d448740a74'),
('zeljkojuric', '1c56a5f018717a2d4e335459619db4c3'),
('rogerfederer', 'e8eeeaf4af9e67cc364cd6e829117725'),
('jackie', '1b03eb7193da940d12174f02e5e39050');

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`username`, `poruka`) VALUES
('admin', 'Prva poruka'),
('admin', 'Prva poruka'),
('admin', 'Poruka'),
('admin', 'poruka12'),
('admin', 'poruka203'),
('milanzuza', 'ne kontam kako odjednom proradi'),
('milanzuza', 'čudna li čuda'),
('admin', 'porukajei'),
('milanzuza', 'Äudna li Äuda'),
('admin', 'asfdgfhghjhgfd');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `datum_rodjenja` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`username`, `ime`, `prezime`, `email`, `datum_rodjenja`) VALUES
('admin', 'Milan', 'Zuza', 'milan.zuza18@gmail.com', '29/12/1995'),
('almasaodzak', 'Almasa', 'Odzak', 'almasaodzak@hotmail.com', '2016-02-10'),
('eminakrehic', 'Emina', 'Krehic', 'eminakrehic@hotmail.com', '2016-12-13'),
('fdsagfds', 'adsf', 'fsdgg', 'fsfdas@cdsa.com', '2017-01-05'),
('harissupic', 'Haris', 'Supic', 'harissupic@live.com', '2016-11-30'),
('husefatkic', 'Huse', 'Fatkic', 'husefatkic@yahoo.com', '2016-12-05'),
('irfanprazina', 'Irfan', 'Prazina', 'ifranprazina@hotmail.com', '2016-12-21'),
('jackie', 'Jack', 'Wilshere', 'jack@is.back', '2017-01-05'),
('milanzuza', 'Milan', 'Zuza', 'milan.zuza18@gmail.com', '2016-02-10'),
('mujomujic', 'Mujo', 'Mujic', 'mujomujic@hotmail.com', '2016-12-08'),
('rogerfederer', 'Roger', 'Federer', 'roger@swiss.army', '2017-01-11'),
('safet', 'Safet', 'Susic', 'safete@sajo.sarajlijo', '2017-01-11'),
('sancez', 'Aleksis', 'Sancez', 'sanzopanza@ars.prvi', '2016-12-01'),
('selmirhasanovic', 'Selmir', 'Hasanovic', 'selmirhasanovic@hotmail.com', '2016-12-16'),
('seminpalalic', 'Semin', 'Palalic', 'seminpalalic@hotmail.com', '2016-12-07'),
('suljosuljic', 'Suljo', 'Suljic', 'suljosuljic@hotmail.com', '2016-11-30'),
('vensadaokanovic', 'Vensada', 'Okanovic', 'vensada.okanovic@hotmail.com', '2016-12-01'),
('zeljkojuric', 'Zeljko', 'Juric', 'zeljkojuric@hmail.com', '2016-12-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `username` (`username`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD KEY `username` (`username`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registracija` (`username`);

--
-- Constraints for table `poruka`
--
ALTER TABLE `poruka`
  ADD CONSTRAINT `poruka_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registracija` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
