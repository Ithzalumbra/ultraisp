-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2018 at 01:59 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysisresult`
--

CREATE TABLE `analysisresult` (
  `id` int(11) NOT NULL,
  `ppm` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `employee_rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `analysisSamples_id` int(11) NOT NULL,
  `analysisType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysissamples`
--

CREATE TABLE `analysissamples` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `temperatureSample` decimal(10,0) NOT NULL,
  `quantitySample` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analysistype`
--

CREATE TABLE `analysistype` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `analysistype`
--

INSERT INTO `analysistype` (`id`, `name`) VALUES
(1, 'Detección micotoxinas'),
(2, 'Detección metales pesados'),
(3, 'Detección marea roja'),
(4, 'Detección bacterias nocivas'),
(5, 'Detección plaguicidas prohibidos');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `particular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usertype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `description`) VALUES
(1, 'Administrador', 'Crea, modifica y elimina los tipos de análisis, da de baja a los usuarios.'),
(2, 'Receptor de muestras', 'Puede ingresar los datos de las muestras recibidas. '),
(3, 'Empresa', 'Puede crear, modificar y dar de baja sus datos. '),
(4, 'Tecnico de laboratorio', 'Puede ver el listado de muestras para análisis y anotar sus\r\nresultados.'),
(5, 'Particular', 'Puede crear, modificar y dar de baja sus datos. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysisresult`
--
ALTER TABLE `analysisresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analysisSamples_id` (`analysisSamples_id`),
  ADD KEY `analysisType_id` (`analysisType_id`),
  ADD KEY `employee_rut` (`employee_rut`);

--
-- Indexes for table `analysissamples`
--
ALTER TABLE `analysissamples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_rut` (`employee_rut`),
  ADD KEY `particular_id` (`user_id`);

--
-- Indexes for table `analysistype`
--
ALTER TABLE `analysistype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `particular_id` (`particular_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysisresult`
--
ALTER TABLE `analysisresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `analysissamples`
--
ALTER TABLE `analysissamples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `analysistype`
--
ALTER TABLE `analysistype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  
  ALTER TABLE `user` ADD `status` BOOLEAN NOT NULL AFTER `email`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
