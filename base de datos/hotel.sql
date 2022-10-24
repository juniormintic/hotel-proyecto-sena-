-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2018 a las 05:53:57
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `idagencia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`idagencia`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'la merced', 'cll5 # 9-66', 3125227604),
(2, 'sfdsvbb', 'Mz  L torre 4 apt 101', 3199298388),
(3, 'errfgdfsdsfghfd', 'Mz  L torre 4 apt 101', 3300000000),
(4, 'esdfgffghfhdgfd', 'Mz  L torre 4 apt 101', 435432454345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idhabitacion` int(11) NOT NULL,
  `tipohabitacion` varchar(100) NOT NULL,
  `minibar` varchar(100) NOT NULL,
  `jacuzzi` varchar(100) NOT NULL,
  `idhotel` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idhabitacion`, `tipohabitacion`, `minibar`, `jacuzzi`, `idhotel`, `idtipo`) VALUES
(1, 'suite ', 'si', 'si', 1, 1),
(2, 'suite presidecial', 'si', 'si', 1, 2),
(3, 'efdgfbgfdv', 'no', 'no', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `idhotel` int(11) NOT NULL,
  `nombrehotel` varchar(100) NOT NULL,
  `direccionhotel` varchar(100) NOT NULL,
  `cantidadpiezas` int(100) NOT NULL,
  `telefono` double NOT NULL,
  `aconstru` date NOT NULL,
  `categoria` int(11) NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`idhotel`, `nombrehotel`, `direccionhotel`, `cantidadpiezas`, `telefono`, `aconstru`, `categoria`, `ciudad`) VALUES
(1, 'el paso', 'cll 9 #3-33', 2, 3152457852, '2000-08-02', 3, 'cucuta'),
(2, 'paisitas', 'cll 5 #3-44', 1, 3162547852, '2002-08-28', 3, 'bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'edinson', 'duran', 'cll 16 #6-36', 3125227604),
(2, 'carlos ', 'laverde', 'cll 6 #6-66', 3118411222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `preciohab` int(10) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechatermino` date NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idagencia` int(11) NOT NULL,
  `idhab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `preciohab`, `fechainicio`, `fechatermino`, `idpersona`, `idagencia`, `idhab`) VALUES
(1, 80000, '2018-08-09', '2018-08-14', 1, 1, 2),
(2, 50000, '2018-12-15', '2018-12-19', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `login` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(155) NOT NULL,
  `perfil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `login`, `pass`, `nombre`, `apellido`, `perfil`) VALUES
(1, 'daniel', '123', 'edinson', 'duran', 'administrador'),
(2, 'cesar bolado', '1369259', 'cesar', 'bolado', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohab`
--

CREATE TABLE `tipohab` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipohab`
--

INSERT INTO `tipohab` (`idtipo`, `nombre`) VALUES
(1, 'presidencial'),
(2, 'motel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`idagencia`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idhabitacion`),
  ADD KEY `idhotel` (`idhotel`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`idhotel`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idagencia` (`idagencia`),
  ADD KEY `idhab` (`idhab`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipohab`
--
ALTER TABLE `tipohab`
  ADD PRIMARY KEY (`idtipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`idhotel`) REFERENCES `hoteles` (`idhotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habitaciones_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipohab` (`idtipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idhab`) REFERENCES `habitaciones` (`idhabitacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`idagencia`) REFERENCES `agencia` (`idagencia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
