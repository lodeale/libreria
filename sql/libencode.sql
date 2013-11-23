-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2013 a las 14:49:39
-- Versión del servidor: 5.1.72
-- Versión de PHP: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libencode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(150) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre_apellido`) VALUES
(4, 'Friedrich Nietzsche'),
(5, 'Alejandro Dolina'),
(6, 'asdfasdfas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(4, 'filosofía'),
(5, 'novelas'),
(6, 'asdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_libro` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `comentario` varchar(130) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_libro` (`id_libro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_libro`, `nombre`, `comentario`, `fecha`, `hora`) VALUES
(2, 2, 5, 'admin', 'Muy buen libro, lo tienen en stock nosierto?', '2013-10-12', '11:20:20'),
(4, 2, 5, 'admin', 'Y no ve que dice ahí en detalle?', '2013-10-12', '11:26:32'),
(31, 2, 5, 'admin', 'aaaa', '2013-10-12', '14:19:50'),
(32, 2, 5, 'admin', 'ccccc', '2013-10-12', '14:21:41'),
(33, NULL, 5, 'anonymo', 'holaaaaaaaaaaaaaaa', '2013-10-13', '11:05:57'),
(36, NULL, 5, 'pepe', 'jamon', '2013-10-13', '11:13:49'),
(37, NULL, 5, 'pipi', 'popo', '2013-10-13', '11:13:56'),
(38, NULL, 5, 'jazmin', 'pero pepe que te pasoooooooooooooooo.... tenes herpes o mal de ojo jajajajjajajajjajajajaja', '2013-10-13', '11:20:37'),
(39, NULL, 5, 'prueba', 'probando hoy', '2013-10-19', '14:19:43'),
(40, 2, 6, 'admin', 'argento', '2013-10-19', '16:03:16'),
(41, 2, 6, 'admin', 'argento', '2013-10-19', '16:03:28'),
(42, 2, 6, 'admin', 'argento', '2013-10-19', '16:07:00'),
(43, 2, 6, 'admin', 'argento', '2013-10-19', '16:07:00'),
(44, 2, 6, 'admin', 'argento', '2013-10-19', '16:07:00'),
(45, 2, 6, 'admin', 'lsldkfjl', '2013-10-19', '16:08:52'),
(46, 2, 6, 'admin', 'mirando futbol', '2013-10-19', '16:14:18'),
(47, 2, 6, 'admin', 'mirando futbol', '2013-10-19', '16:14:22'),
(48, 2, 6, 'admin', 'mirando futbol', '2013-10-19', '16:14:28'),
(49, 2, 6, 'admin', 'mirando futbol', '2013-10-19', '16:14:29'),
(50, NULL, 6, 'asdf', 'asdfasdf', '2013-10-19', '16:27:53'),
(51, NULL, 5, 'anonimo', 'aaaaaaaaaa', '2013-11-09', '11:32:13'),
(52, NULL, 5, 'anonimo', 'aaaaaaaaaa', '2013-11-09', '11:32:18'),
(53, 2, 6, 'admin', 'prueba', '2013-11-09', '15:59:36'),
(54, 2, 6, 'admin', 'prueba', '2013-11-09', '15:59:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `descripcion`) VALUES
(4, 'Centro Editorial de Cultura'),
(5, 'Planeta'),
(6, 'asdfasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `pagina` int(5) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `stock` int(8) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_editorial` (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `descripcion`, `id_categoria`, `id_editorial`, `fecha_emision`, `pagina`, `precio`, `stock`, `imagen`) VALUES
(5, 'El anticristo', 'Friedrich wilhelm nietzsche, filósofo alemán, nacio en rocken , cerca de lutzen, en 1844 y murio en 1900, en weimar. Estudio primero en el colegi ode pforta y después filogoía clásica en la univerdades de bonn y leipzig; en esta ciujdad leyó por prim', 4, 4, '0000-00-00', 126, '10.00', 8, 'elanticristo.jpg'),
(6, 'Cartas Marcada', 'Cartas marcadas es un  libro envuelto en niebla. La cerrazón que cubre las clales de flores se tiende también sobre los capítulos de la novela provocando confusiones y obligándonos a marchar despacio. Por otra parte.', 5, 5, '2012-05-06', 531, '500.00', 12, 'dolin.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_autores`
--

CREATE TABLE IF NOT EXISTS `libros_autores` (
  `id_libro` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  KEY `id_libro` (`id_libro`),
  KEY `id_autor` (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros_autores`
--

INSERT INTO `libros_autores` (`id_libro`, `id_autor`) VALUES
(5, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dni` varchar(12) NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `direccion`, `provincia`, `tel`, `email`, `dni`) VALUES
(1, 'admin', 'admin', 'pc', 'kernel', '234234', 'admin@admin.com', '223423423423');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(140) NOT NULL,
  `privilegio` int(1) NOT NULL,
  `activo` int(1) NOT NULL,
  `id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `privilegio`, `activo`, `id_persona`) VALUES
(2, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD CONSTRAINT `libros_autores_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_autores_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
