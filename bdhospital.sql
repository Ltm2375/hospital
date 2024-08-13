-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-08-2024 a las 22:31:24
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdhospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

DROP TABLE IF EXISTS `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `citaID` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `doctor` varchar(35) DEFAULT NULL,
  `especialidad` varchar(30) DEFAULT NULL,
  `dni` int DEFAULT NULL,
  PRIMARY KEY (`citaID`),
  KEY `dni` (`dni`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`citaID`, `fecha`, `hora`, `motivo`, `estado`, `doctor`, `especialidad`, `dni`) VALUES
(1, '2024-03-10', '09:00:00', 'Consulta de seguimiento', 'Pendiente', 'Dr. Gomez', 'Cardiología', 12345678),
(2, '2024-04-15', '10:30:00', 'Chequeo general', 'Confirmada', 'Dra. Martinez', 'Medicina General', 87654321);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

DROP TABLE IF EXISTS `enfermedades`;
CREATE TABLE IF NOT EXISTS `enfermedades` (
  `enfermedadID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`enfermedadID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`enfermedadID`, `nombre`) VALUES
(1, 'Diabetes'),
(2, 'Hipertensión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedadespaciente`
--

DROP TABLE IF EXISTS `enfermedadespaciente`;
CREATE TABLE IF NOT EXISTS `enfermedadespaciente` (
  `enfermedadPacID` int NOT NULL AUTO_INCREMENT,
  `enfermedadID` int DEFAULT NULL,
  `tratamiento` varchar(100) DEFAULT NULL,
  `diagnostico` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`enfermedadPacID`),
  KEY `enfermedadID` (`enfermedadID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedadespaciente`
--

INSERT INTO `enfermedadespaciente` (`enfermedadPacID`, `enfermedadID`, `tratamiento`, `diagnostico`, `fecha`) VALUES
(1, 1, 'Insulina diaria', 'Diabetes tipo 1', '2024-01-10'),
(2, 2, 'Dieta baja en sal', 'Hipertensión leve', '2024-02-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

DROP TABLE IF EXISTS `historiaclinica`;
CREATE TABLE IF NOT EXISTS `historiaclinica` (
  `historiaClinicaID` int NOT NULL AUTO_INCREMENT,
  `dni` int DEFAULT NULL,
  `enfermedadPacID` int DEFAULT NULL,
  PRIMARY KEY (`historiaClinicaID`),
  KEY `dni` (`dni`),
  KEY `enfermedadPacID` (`enfermedadPacID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historiaclinica`
--

INSERT INTO `historiaclinica` (`historiaClinicaID`, `dni`, `enfermedadPacID`) VALUES
(1, 12345678, 1),
(2, 87654321, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `dni` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `estadoCivil` varchar(15) NOT NULL,
  `seguro` varchar(10) DEFAULT NULL,
  `correo` varchar(35) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombre`, `apellidos`, `sexo`, `fechaNacimiento`, `estadoCivil`, `seguro`, `correo`, `telefono`) VALUES
(12345678, 'Juan', 'Perez', 'Masculino', '1980-01-01', 'Soltero', 'Si', 'juan.perez@example.com', '123456789'),
(87654321, 'Maria', 'Lopez', 'Femenino', '1990-02-02', 'Casada', 'No', 'maria.lopez@example.com', '987654321');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
