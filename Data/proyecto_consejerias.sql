-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2023 a las 19:07:34
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
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `codigo` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`codigo`, `password`, `nombre`, `correo`) VALUES
(1010010, 'Login123', 'morita', 'morita@gmail.com'),
(20202020, 'Login123', 'Andre', ''),
(23232323, 'Login123', 'Pescadito', '23232323'),
(1032485485, 'Login123', 'Simon', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigo` int(12) NOT NULL,
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
  `recomendaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigo`, `nombre`, `cabeza`, `familia`, `procedencia`, `personas_vive`, `trabajo`, `interes`, `solicitudes`, `adaptacion`, `intereses_aca`, `grupos`, `movilidad`, `prueba_aca`, `recomendaciones`) VALUES
(21021021, 'Simon', '', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'ninguna', 'a todos', 'ninguna', 'ninguna', 'ninguna'),
(202357866, 'Jose', 'no', 'nada', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `escribir_plan` varchar(200) NOT NULL,
  `asignatura` varchar(15) NOT NULL,
  `codigo_FK` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD KEY `codigo_FK` (`codigo_FK`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`codigo_FK`) REFERENCES `estudiante` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
