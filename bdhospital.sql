-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-08-2024 a las 03:31:34
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`citaID`, `fecha`, `hora`, `motivo`, `estado`, `doctor`, `especialidad`, `dni`) VALUES
(1, '2024-08-10', '09:30:00', 'Chequeo general', 'Atendida', 'Dr. Juan Pérez', 'Medicina General', 12345678),
(2, '2024-08-10', '09:30:00', 'Chequeo general', 'Atendida', 'Dr. Juan Pérez', 'Medicina General', 12345678),
(3, '2024-08-11', '14:00:00', 'Dolor abdominal', 'Pendiente', 'Dra. María López', 'Gastroenterología', 87654321),
(4, '2024-08-11', '14:00:00', 'Dolor abdominal', 'Pendiente', 'Dra. María López', 'Gastroenterología', 87654321),
(5, '2024-08-12', '11:15:00', 'Revisión de presión', 'Atendida', 'Dr. Carlos García', 'Cardiología', 12312312),
(6, '2024-08-12', '11:15:00', 'Revisión de presión', 'Atendida', 'Dr. Carlos García', 'Cardiología', 12312312),
(7, '2024-08-13', '08:45:00', 'Control prenatal', 'Atendida', 'Dra. Ana Martínez', 'Ginecología', 45645645),
(8, '2024-08-13', '08:45:00', 'Control prenatal', 'Atendida', 'Dra. Ana Martínez', 'Ginecología', 45645645),
(9, '2024-08-14', '10:30:00', 'Evaluación de alergias', 'Pendiente', 'Dr. Luis Ramírez', 'Alergología', 78978978),
(10, '2024-08-14', '10:30:00', 'Evaluación de alergias', 'Pendiente', 'Dr. Luis Ramírez', 'Alergología', 78978978);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

DROP TABLE IF EXISTS `enfermedades`;
CREATE TABLE IF NOT EXISTS `enfermedades` (
  `enfermedadID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`enfermedadID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`enfermedadID`, `nombre`) VALUES
(1, 'Diabetes'),
(2, 'Hipertensión'),
(3, 'Asma'),
(4, 'Artritis'),
(5, 'Gastritis');

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
  `historiaClinicaID` int NOT NULL,
  PRIMARY KEY (`enfermedadPacID`),
  KEY `enfermedadID` (`enfermedadID`),
  KEY `historiaClinicaID` (`historiaClinicaID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `enfermedadespaciente`
--

INSERT INTO `enfermedadespaciente` (`enfermedadPacID`, `enfermedadID`, `tratamiento`, `diagnostico`, `fecha`, `historiaClinicaID`) VALUES
(1, 1, 'Insulina', 'Diabetes tipo 2', '2024-01-01', 1),
(2, 2, 'Enalapril', 'Hipertensión', '2024-01-15', 1),
(3, 2, 'Salbutamol', 'Asma leve', '2024-02-01', 1),
(4, 4, 'Ibuprofeno', 'Artritis reumatoide', '2024-02-15', 1),
(5, 5, 'Omeprazol', 'Gastritis crónica', '2024-03-01', 1),
(6, 1, 'Insulina', 'Diabetes tipo 1', '2024-01-05', 2),
(7, 2, 'Amlodipino', 'Hipertensión', '2024-01-20', 2),
(8, 3, 'Budesonida', 'Asma moderada', '2024-02-05', 2),
(9, 4, 'Metotrexato', 'Artritis psoriásica', '2024-02-20', 2),
(10, 5, 'Ranitidina', 'Gastritis erosiva', '2024-03-05', 2),
(11, 1, 'Metformina', 'Diabetes tipo 2', '2024-01-10', 3),
(12, 2, 'Losartán', 'Hipertensión', '2024-01-25', 3),
(13, 3, 'Montelukast', 'Asma crónica', '2024-02-10', 3),
(14, 4, 'Sulfasalazina', 'Artritis juvenil', '2024-02-25', 3),
(15, 5, 'Pantoprazol', 'Gastritis aguda', '2024-03-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

DROP TABLE IF EXISTS `historiaclinica`;
CREATE TABLE IF NOT EXISTS `historiaclinica` (
  `historiaClinicaID` int NOT NULL AUTO_INCREMENT,
  `dni` int DEFAULT NULL,
  PRIMARY KEY (`historiaClinicaID`),
  KEY `dni` (`dni`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `historiaclinica`
--

INSERT INTO `historiaclinica` (`historiaClinicaID`, `dni`) VALUES
(1, 12345678),
(2, 23456789),
(3, 34567890);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombre`, `apellidos`, `sexo`, `fechaNacimiento`, `estadoCivil`, `seguro`, `correo`, `telefono`) VALUES
(12345678, 'Juan', 'Pérez', 'Masculino', '1980-01-01', 'Soltero', 'SIS', 'juan.perez@example.com', '987654321'),
(23456789, 'María', 'López', 'Femenino', '1985-02-02', 'Casada', 'ESSALUD', 'maria.lopez@example.com', '987654322'),
(34567890, 'Carlos', 'García', 'Masculino', '1990-03-03', 'Divorciado', NULL, 'carlos.garcia@example.com', '987654323');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
