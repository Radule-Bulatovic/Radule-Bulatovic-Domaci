-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 01:22 AM
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
-- Database: `domaci_zadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartmani`
--

CREATE TABLE `apartmani` (
  `kvadratura` int(11) NOT NULL,
  `IDsobe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `Adresa` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `Broj spratova` int(11) NOT NULL,
  `Kategorija` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `Ime` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `menadzeri`
--

CREATE TABLE `menadzeri` (
  `SSS` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `JMBG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `obicne sobe`
--

CREATE TABLE `obicne sobe` (
  `broj kreveta` int(11) NOT NULL,
  `IDsobe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pomocno osoblje`
--

CREATE TABLE `pomocno osoblje` (
  `Honorar` int(11) NOT NULL,
  `JMBG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `recepcioneri`
--

CREATE TABLE `recepcioneri` (
  `Smjena` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `JMBG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sobe`
--

CREATE TABLE `sobe` (
  `IDsobe` int(11) NOT NULL,
  `Ime hotela` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `JMBG` int(13) NOT NULL,
  `Datum rodjenja` date NOT NULL,
  `Datum zaposlenja` date NOT NULL,
  `Iznos plate` int(11) NOT NULL,
  `Ime hotela` varchar(45) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD KEY `fk_apartmani_soba` (`IDsobe`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Ime`);

--
-- Indexes for table `menadzeri`
--
ALTER TABLE `menadzeri`
  ADD KEY `fk_menadzeri_zaposleni` (`JMBG`);

--
-- Indexes for table `obicne sobe`
--
ALTER TABLE `obicne sobe`
  ADD KEY `fk_obicna_soba_soba` (`IDsobe`);

--
-- Indexes for table `pomocno osoblje`
--
ALTER TABLE `pomocno osoblje`
  ADD KEY `fk_osoblje_zaposleni` (`JMBG`);

--
-- Indexes for table `recepcioneri`
--
ALTER TABLE `recepcioneri`
  ADD KEY `fk_recepcioneri_zaposleni` (`JMBG`);

--
-- Indexes for table `sobe`
--
ALTER TABLE `sobe`
  ADD PRIMARY KEY (`IDsobe`),
  ADD KEY `fk_soba_hotela` (`Ime hotela`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`JMBG`),
  ADD KEY `fk_zaposleni_hotel` (`Ime hotela`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sobe`
--
ALTER TABLE `sobe`
  MODIFY `IDsobe` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartmani`
--
ALTER TABLE `apartmani`
  ADD CONSTRAINT `fk_apartmani_soba` FOREIGN KEY (`IDsobe`) REFERENCES `sobe` (`IDsobe`);

--
-- Constraints for table `menadzeri`
--
ALTER TABLE `menadzeri`
  ADD CONSTRAINT `fk_menadzeri_zaposleni` FOREIGN KEY (`JMBG`) REFERENCES `zaposleni` (`JMBG`);

--
-- Constraints for table `obicne sobe`
--
ALTER TABLE `obicne sobe`
  ADD CONSTRAINT `fk_obicna_soba_soba` FOREIGN KEY (`IDsobe`) REFERENCES `sobe` (`IDsobe`);

--
-- Constraints for table `pomocno osoblje`
--
ALTER TABLE `pomocno osoblje`
  ADD CONSTRAINT `fk_osoblje_zaposleni` FOREIGN KEY (`JMBG`) REFERENCES `zaposleni` (`JMBG`);

--
-- Constraints for table `recepcioneri`
--
ALTER TABLE `recepcioneri`
  ADD CONSTRAINT `fk_recepcioneri_zaposleni` FOREIGN KEY (`JMBG`) REFERENCES `zaposleni` (`JMBG`);

--
-- Constraints for table `sobe`
--
ALTER TABLE `sobe`
  ADD CONSTRAINT `fk_soba_hotela` FOREIGN KEY (`Ime hotela`) REFERENCES `hotel` (`Ime`);

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `fk_zaposleni_hotel` FOREIGN KEY (`Ime hotela`) REFERENCES `hotel` (`Ime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
