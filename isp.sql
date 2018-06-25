-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-06-2018 a las 01:04:34
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analysisresult`
--

DROP TABLE IF EXISTS `analysisresult`;
CREATE TABLE IF NOT EXISTS `analysisresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppm` int(11) NOT NULL,
  `date_register` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `employee_rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `analysisSamples_id` int(11) NOT NULL,
  `analysisType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `analysisSamples_id` (`analysisSamples_id`),
  KEY `analysisType_id` (`analysisType_id`),
  KEY `employee_rut` (`employee_rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analysissamples`
--

DROP TABLE IF EXISTS `analysissamples`;
CREATE TABLE IF NOT EXISTS `analysissamples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `temperatureSample` decimal(10,0) NOT NULL,
  `quantitySample` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `particular_id` int(11) NOT NULL,
  `employee_rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_rut` (`employee_rut`),
  KEY `particular_id` (`particular_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analysistype`
--

DROP TABLE IF EXISTS `analysistype`;
CREATE TABLE IF NOT EXISTS `analysistype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `category` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `particular`
--

DROP TABLE IF EXISTS `particular`;
CREATE TABLE IF NOT EXISTS `particular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phone`
--

DROP TABLE IF EXISTS `phone`;
CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `particular_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `particular_id` (`particular_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analysisresult`
--
ALTER TABLE `analysisresult`
  ADD CONSTRAINT `analysisresult_ibfk_1` FOREIGN KEY (`analysisSamples_id`) REFERENCES `analysissamples` (`id`),
  ADD CONSTRAINT `analysisresult_ibfk_2` FOREIGN KEY (`analysisType_id`) REFERENCES `analysistype` (`id`),
  ADD CONSTRAINT `analysisresult_ibfk_3` FOREIGN KEY (`employee_rut`) REFERENCES `employee` (`rut`);

--
-- Filtros para la tabla `analysissamples`
--
ALTER TABLE `analysissamples`
  ADD CONSTRAINT `analysissamples_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `analysissamples_ibfk_2` FOREIGN KEY (`employee_rut`) REFERENCES `employee` (`rut`),
  ADD CONSTRAINT `analysissamples_ibfk_3` FOREIGN KEY (`particular_id`) REFERENCES `particular` (`id`);

--
-- Filtros para la tabla `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Filtros para la tabla `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`particular_id`) REFERENCES `particular` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
