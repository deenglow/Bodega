-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2018 a las 08:34:52
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionbodegas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idBodega` int(4) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `nombreContacto` varchar(15) NOT NULL,
  `fechaFundacion` date NOT NULL,
  `hasRestaurante` varchar(2) NOT NULL,
  `hasHotel` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idBodega`, `direccion`, `nombre`, `email`, `telefono`, `nombreContacto`, `fechaFundacion`, `hasRestaurante`, `hasHotel`) VALUES
(2, 'alemania', 'bodega2', 'asd', '945222222', 'asdasd', '1999-02-12', 'si', 'si'),
(3, 'portugal', 'bodega3', 'bodega3@email.es', '945232323', 'jose', '0000-00-00', '0', '0'),
(4, 'eeuu', 'bodega4', 'xxx', '945878787', 'jhon Smith', '1999-04-03', 'si', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinos`
--

CREATE TABLE `vinos` (
  `idVino` int(4) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `tipo` varchar(6) NOT NULL,
  `porcentajeAlcohol` varchar(2) NOT NULL,
  `idBodega` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`idVino`, `nombre`, `descripcion`, `anio`, `tipo`, `porcentajeAlcohol`, `idBodega`) VALUES
(2, 'vino1', 'muy caro', '2000', 'tinto', '10', 2),
(4, 'vino1', 'carisimo', '2018', 'blanco', '0', 3),
(9, 'sss', 'sss', '1000', 'sss', '10', 2),
(10, 'vino1', 'amargo', '1984', 'blanco', '5', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idBodega`);

--
-- Indices de la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`idVino`),
  ADD KEY `idBodega` (`idBodega`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBodega` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `idVino` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD CONSTRAINT `vinos_ibfk_1` FOREIGN KEY (`idBodega`) REFERENCES `bodegas` (`idBodega`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
