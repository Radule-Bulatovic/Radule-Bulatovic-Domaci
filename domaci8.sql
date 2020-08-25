-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaci8`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`) VALUES
(1, 'Podgorica'),
(2, 'Niksic'),
(3, 'Bar'),
(4, 'Budva'),
(5, 'Tivat'),
(6, 'Kotor'),
(7, 'Pljevlja'),
(8, 'Berane'),
(9, 'Cetinje');

-- --------------------------------------------------------

--
-- Table structure for table `podnosilac`
--

CREATE TABLE `podnosilac` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `jmbg` int(11) NOT NULL,
  `grad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `podnosilac`
--

INSERT INTO `podnosilac` (`id`, `ime`, `prezime`, `jmbg`, `grad_id`) VALUES
(1, 'Marko', 'Markovic', 2147483647, 4),
(2, 'Petar', 'Petrovic', 1233241312, 1),
(3, 'Janko', 'Jankovic', 1213412312, 3),
(4, 'Sloba', 'Radanovic', 2147483647, 5),
(5, 'Ronaldinho', 'Mijovic', 2147483647, 2),
(8, 'Pero', 'Eskobar', 123561231, 6);

-- --------------------------------------------------------

--
-- Table structure for table `primjedba`
--

CREATE TABLE `primjedba` (
  `id` int(11) NOT NULL,
  `opis` text NOT NULL,
  `slika_putanja` varchar(255) NOT NULL,
  `podnosilac_id` int(11) NOT NULL,
  `grad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `primjedba`
--

INSERT INTO `primjedba` (`id`, `opis`, `slika_putanja`, `podnosilac_id`, `grad_id`) VALUES
(1, 'Nagomilano smece na plazi, molim nadlezne da reaguju', './resources/images/1.jpg', 1, 4),
(2, 'Putujuci iz Bara ka Podgorici primjetio sam veliko zagadjenje rijeke', './resources/images/2.jpg', 3, 1),
(3, 'Htio sam sa Mesijem da podjem na Adu Bojanu kako bi se opustio nakon poraza protiv PSG-a, ali smo na zalost zatekli veliko zagadjenje, nikada vise necu doci', './resources/images/3.jpg', 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podnosilac`
--
ALTER TABLE `podnosilac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_podnosilac_grad` (`grad_id`);

--
-- Indexes for table `primjedba`
--
ALTER TABLE `primjedba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_primjedba_grad` (`grad_id`),
  ADD KEY `fk_primjedba_podnosilac` (`podnosilac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `podnosilac`
--
ALTER TABLE `podnosilac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `primjedba`
--
ALTER TABLE `primjedba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `podnosilac`
--
ALTER TABLE `podnosilac`
  ADD CONSTRAINT `fk_podnosilac_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`);

--
-- Constraints for table `primjedba`
--
ALTER TABLE `primjedba`
  ADD CONSTRAINT `fk_primjedba_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `fk_primjedba_podnosilac` FOREIGN KEY (`podnosilac_id`) REFERENCES `podnosilac` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
