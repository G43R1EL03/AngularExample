-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2023 at 10:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practica-laboratorio1`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nivel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `foto`, `nivel`) VALUES
(5, 'Gabriel', 'Rodríguez', 'gabriel.rodriguez11@utp.ac.pa', '$2y$10$2aR/KTPpEygJAz5ysqzbNOsqsjEgiUcbYXJtf5LKP6srYsLeZnsK6', NULL, NULL),
(6, 'Federico', 'Tejedor', 'federico.tejedor@utp.ac.pa', '$2y$10$pyVh1Ps9jHPGbwqapP/jWOmPqvED7OSsI86QuXmFy9Gpdkur6UwYG', NULL, NULL),
(7, 'Hidekel', 'Rodríguez', 'ghr200003@gmail.com', '$2y$10$t7.KJafJYtwvtgKUjEqZBO1rokgF4Boctzk95hkM3DYzV/FOfLt8W', NULL, NULL),
(8, 'G', 'R', 'grodriguez201365@gmail.com', '$2y$10$ht9qQRRiOCmSG55RXSyqQueewTkfUTwz4oB3adX78G.swnkp71Y7y', NULL, NULL),
(9, 'Hidekel', 'Rodríguez', 'hidekel.rodriguez@utp.ac.pa', '$2y$10$admaQ4Nb.8jSAfiREuoNu.XfBRzBHGinnzdFkulJ1lviepk5X4E2i', NULL, NULL),
(10, 'H', 'R', 'hide@gmail.com', '$2y$10$DcfcGhYx8sW6LU6KfHCZBu9Rsab8Rccg6PMtL0ZMQxyV01vbChJbq', NULL, NULL),
(11, 'E', 'R', 'e.r@utp.ac.pa', '$2y$10$utLbwbGz1bR4pSt2NQFPUuBpSmi9L3QIjD/Y5z.UDW8nvzcSa4Ci6', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
