-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2018 a las 02:19:01
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `profesorcontactosac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--
create database profesorcontactosac;
  
CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `estado`) VALUES
(1, 'Juan', 'Perez', 'juan.perez@gmail.com', '987654321', 'Lima', 1),
(2, 'Juan', 'Garcia', 'juan.garcia@gmail.com', '987654321', 'Lima', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `precio` double NOT NULL,
  `profesor_idprofesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombre`, `estado`, `precio`, `profesor_idprofesor`) VALUES
(1, 'Matematicas', '1', 100, 1),
(2, 'Razonamiento Matematico', '1', 100, 2),
(3, 'Razonamiento Verbal', '1', 100, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `factura_idfactura` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `factura_idfactura`, `curso_idcurso`, `cantidad`, `precio`) VALUES
(1, 1, 1, '1', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `forma` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `alumno_idalumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha`, `total`, `forma`, `estado`, `alumno_idalumno`) VALUES
(1, '2018-06-01', '100', 'Efectivo', 1, 1),
(2, '2018-06-06', '300', 'Efectivo', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idprofesor`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`, `rol`) VALUES
(1, 'Ronald', 'Cordova Lopez', 'rcordova', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'ronal.cordova@gmail.com', 'admin'),
(2, 'Leonardo', 'Leon', 'lleon', '$2y$10$yBYmd/Gy2xfZXTHmAhQff.nBXeNsY2T6ELd8r3HeImKt5mxjOzIGG', 'leonardo.leon@gmail.com', 'user'),
(3, 'Miguel', 'Acuna', 'macuna', '$2y$10$66iuEnraX/TCu9Jc7eLY4OWKs0l6ZWK3iy3/M2MSItK6epH5.HIHG', 'miguel.acuna@gmail.com', 'user'),
(4, 'Alexis ', 'Arribasplata', 'alexis1', '$2y$10$k1GvkSe2cvMpbjBvv7wHzOGH6S2FLwXKmcglmK4JaPbBAKdNHGS8G', 'alexis.arribasplata@gmail.com', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`,`profesor_idprofesor`),
  ADD KEY `fk_curso_profesor1` (`profesor_idprofesor`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`,`factura_idfactura`,`curso_idcurso`),
  ADD KEY `fk_factura_has_curso_factura` (`factura_idfactura`),
  ADD KEY `fk_factura_has_curso_curso1` (`curso_idcurso`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`,`alumno_idalumno`),
  ADD KEY `fk_factura_alumno1` (`alumno_idalumno`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idprofesor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_profesor1` FOREIGN KEY (`profesor_idprofesor`) REFERENCES `profesor` (`idprofesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_factura_has_curso_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_has_curso_factura` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_alumno1` FOREIGN KEY (`alumno_idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
