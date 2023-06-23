-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 00:49:15
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cedcli` varchar(10) NOT NULL,
  `nomcli` varchar(100) NOT NULL,
  `telcli` varchar(10) NOT NULL,
  `dircli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cedcli`, `nomcli`, `telcli`, `dircli`) VALUES
('1', 'Luis', '5465', 'Cra 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `numfac` int(5) NOT NULL,
  `cedcli` varchar(10) NOT NULL,
  `fecfac` datetime NOT NULL,
  `placa_vehiculo` int(11) NOT NULL,
  `cod_mecanico` varchar(10) NOT NULL,
  `cod_almacenista` varchar(10) NOT NULL,
  `estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`numfac`, `cedcli`, `fecfac`, `placa_vehiculo`, `cod_mecanico`, `cod_almacenista`, `estado`) VALUES
(1, '1', '2023-03-08 16:40:31', 123456, '1', '2', 'P'),
(12345, '1', '2023-03-17 00:00:00', 789456, '1', '2', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `numfac` int(5) NOT NULL,
  `repuesto` varchar(100) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `valor_unidad` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`numfac`, `repuesto`, `cantidad`, `valor_unidad`) VALUES
(1, 'a', 1, 1),
(1, 'Aceite', 5, 12000),
(1, 'Aceite', 5, 12000),
(12345, 'Llantas', 4, 400000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `numfac` int(5) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`numfac`, `servicio`, `costo`) VALUES
(1, 'Cambio de Aceite', 35000),
(1, 'Cambio de Aceite', 0),
(1, 'Cambio de Aceite', 0),
(1, 'Cambio de Aceite', 0),
(1, 'asd', 0),
(1, 'asd', 546),
(12345, 'Cambio de llantas', 456),
(12345, '', 0),
(12345, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codusu` varchar(10) NOT NULL,
  `nomusu` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codusu`, `nomusu`, `clave`, `rol`) VALUES
('1', 'mecanico1', '123', 'M'),
('2', 'almacenista1', '123', 'A'),
('3', 'facturador1', '123', 'F');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cedcli`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`numfac`),
  ADD KEY `factura_mecanico` (`cod_mecanico`),
  ADD KEY `factura_almacenista` (`cod_almacenista`),
  ADD KEY `factura_cliente` (`cedcli`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD KEY `repuestos_factura` (`numfac`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD KEY `servicios_factura` (`numfac`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `numfac` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_almacenista` FOREIGN KEY (`cod_almacenista`) REFERENCES `usuarios` (`codusu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_cliente` FOREIGN KEY (`cedcli`) REFERENCES `clientes` (`cedcli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_mecanico` FOREIGN KEY (`cod_mecanico`) REFERENCES `usuarios` (`codusu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_factura` FOREIGN KEY (`numfac`) REFERENCES `factura` (`numfac`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_factura` FOREIGN KEY (`numfac`) REFERENCES `factura` (`numfac`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
