-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2014 a las 09:36:51
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wibuks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_asignaturas`
--

CREATE TABLE IF NOT EXISTS `wi_asignaturas` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(120) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_cursos`
--

CREATE TABLE IF NOT EXISTS `wi_cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_libros`
--

CREATE TABLE IF NOT EXISTS `wi_libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `fecha_dreacion` date NOT NULL,
  `editorial` varchar(120) NOT NULL,
  `anyo` int(4) NOT NULL,
  `tipo` int(1) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `localidad` varchar(120) NOT NULL,
  `lib_telefono` int(11) NOT NULL,
  `lib_mail` varchar(120) NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_usuarios`
--

CREATE TABLE IF NOT EXISTS `wi_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(120) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `fecha_registro` date NOT NULL,
  `role` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `ip_registro` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
