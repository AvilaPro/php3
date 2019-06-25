-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2019 a las 06:26:49
-- Versión del servidor: 5.7.17
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cadif1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesores`
--

CREATE TABLE `asesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tabla que guarda datos de los asesores';

--
-- Volcado de datos para la tabla `asesores`
--

INSERT INTO `asesores` (`id`, `nombre`, `correo`, `telefono`) VALUES
(1, 'eduardo', 'ed@gmail.com', '4245142978'),
(2, 'darwist', 'da@hotmail.com', '04141234567'),
(3, 'marbelys', 'mar@gmail.com', '04127654321'),
(4, 'jose', 'jos@cadif1.com', '04141472589'),
(5, 'andrea', 'and@gmail.com', '04122586941'),
(6, 'miguel', 'mig@outllook.es', '04127412365'),
(7, 'jenny', 'jen@gmail.com', '04242564789'),
(8, 'admin', 'mejiasavilaeduardo@gmail.com', '2512536045'),
(9, 'emma', 'qwe@gmail.com', '04241472587'),
(10, 'admin', 'zxc@gmail.com', '04241472587'),
(11, 'maria', 'maria@g.com', '04121592634');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_curso`
--

CREATE TABLE `asesor_curso` (
  `id` int(10) NOT NULL,
  `idasesor` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor_curso`
--

INSERT INTO `asesor_curso` (`id`, `idasesor`, `idcurso`) VALUES
(1, 1, 8),
(2, 1, 2),
(3, 2, 12),
(4, 3, 9),
(5, 4, 15),
(6, 5, 2),
(7, 6, 5),
(8, 9, 10),
(9, 6, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `nombre`, `precio`) VALUES
(1, 'lop1', 1500),
(2, 'html1', 2500),
(3, 'css1', 2500),
(4, 'javascript1', 3500),
(5, 'angular1', 4500),
(6, 'ionic1', 4500),
(7, 'typescript', 3500),
(8, 'git', 2500),
(9, 'poo1', 2500),
(10, 'electronica', 4500),
(11, 'lop2', 2700),
(12, 'php1', 3500),
(13, 'php2', 3500),
(14, 'php3', 3500),
(15, 'dbd1', 3500),
(16, 'dbd2', 3500),
(17, 'mysql1', 4500),
(18, 'laravel', 5000),
(19, 'electronica2', 7000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idestudiantes` int(11) NOT NULL,
  `cedula` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombre`, `apellido`, `edad`, `fecha_nacimiento`) VALUES
(1, 'eduardo', 'mejias', 31, '1988-02-21'),
(2, 'marbelys', 'guedez', 31, '1987-08-14'),
(3, 'luis', 'castro', 31, '1988-03-24'),
(4, 'jose', 'rivas', 28, '1992-10-10'),
(5, 'admin', 'Mejias', 21, '1995-05-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesores`
--
ALTER TABLE `asesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asesor_curso`
--
ALTER TABLE `asesor_curso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idestudiantes`),
  ADD UNIQUE KEY `est_ced` (`cedula`),
  ADD UNIQUE KEY `idestudiantes` (`idestudiantes`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesores`
--
ALTER TABLE `asesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `asesor_curso`
--
ALTER TABLE `asesor_curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idestudiantes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
