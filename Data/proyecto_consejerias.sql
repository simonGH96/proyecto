-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 16:55:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_consejerias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad-estudiante`
--

CREATE TABLE `ciudad-estudiante` (
  `id_ciudad` int(10) NOT NULL,
  `ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `codigo` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`codigo`, `password`, `nombre`, `correo`) VALUES
(20202020, 'Login12327245623', 'Andre', 'andreaseg@udistrital.edu.co'),
(1029392438, 'manamana123', 'Manuela', 'manaos@gmail.com'),
(2003578495, 'Beneficiencia25', 'Benefacio', 'benecontra@udistrita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigo` int(12) NOT NULL,
  `ciudad_FK` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cabeza` varchar(3) NOT NULL,
  `familia` varchar(200) NOT NULL,
  `procedencia` varchar(200) NOT NULL,
  `personas_vive` varchar(200) NOT NULL,
  `trabajo` varchar(200) NOT NULL,
  `interes` varchar(200) NOT NULL,
  `solicitudes` varchar(200) NOT NULL,
  `adaptacion` varchar(200) NOT NULL,
  `intereses_aca` varchar(200) NOT NULL,
  `grupos` varchar(200) NOT NULL,
  `movilidad` varchar(200) NOT NULL,
  `prueba_aca` varchar(200) NOT NULL,
  `recomendaciones` varchar(200) NOT NULL,
  `planes_FK` int(10) NOT NULL,
  `semestres` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `escribir_plan` varchar(600) NOT NULL,
  `asignatura` varchar(15) NOT NULL,
  `documento` blob NOT NULL,
  `id_planes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad-estudiante`
--
ALTER TABLE `ciudad-estudiante`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `FOREIGN` (`ciudad_FK`) USING BTREE,
  ADD KEY `planes_FK` (`planes_FK`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_planes`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`planes_FK`) REFERENCES `planes` (`id_planes`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`ciudad_FK`) REFERENCES `ciudad-estudiante` (`id_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
