-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 03:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Company`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employe_Data`
--

CREATE TABLE `Employe_Data` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `rank` varchar(45) DEFAULT NULL,
  `hours_worked` int(11) DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `overtime_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employe_Data`
--

INSERT INTO `Employe_Data` (`ID`, `Name`, `adress`, `rank`, `hours_worked`, `payment`, `overtime_hours`) VALUES
(1, 'Mohamed Abdelfatah', 'Giza', 'Manager', 10, 400, 0),
(2, 'Omar Mahmoud', 'EL-Marg', 'Worker', 10, 360, 2),
(3, 'Hassan Saber', 'Cairo', 'Worker', 10, 360, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employe_Data`
--
ALTER TABLE `Employe_Data`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
