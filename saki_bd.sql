-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2025 at 12:01 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saki_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

DROP TABLE IF EXISTS `lista`;
CREATE TABLE IF NOT EXISTS `lista` (
  `ID` varchar(50) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `ApellidoP` varchar(50) DEFAULT NULL,
  `ApellidoM` varchar(50) DEFAULT NULL,
  `CodigoPostal` varchar(10) DEFAULT NULL,
  `Beso` tinyint(1) DEFAULT NULL,
  `Sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `Edad` int DEFAULT NULL,
  `Contador` int DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lista`
--

INSERT INTO `lista` (`ID`, `Nombre`, `ApellidoP`, `ApellidoM`, `CodigoPostal`, `Beso`, `Sexo`, `Edad`, `Contador`) VALUES
('23105001', 'Ángel Celerino', 'Vázquez', 'Villanueva', '62714', 1, 'Masculino', 23, 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
