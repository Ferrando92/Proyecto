-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2014 a las 17:55:48
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Volcado de datos para la tabla `wi_asignaturas`
--

INSERT INTO `wi_asignaturas` (`id_asignatura`, `descripcion`, `id_curso`) VALUES
(10, 'Conocimiento del medio natural', 1),
(11, 'Educación artística', 1),
(12, 'Educación física', 1),
(13, 'Lengua castellana y literatura', 1),
(14, 'Lengua cooficial ', 1),
(15, 'Literatura', 1),
(16, 'Lengua extranjera', 1),
(17, 'Matemáticas', 1),
(18, 'Educación musical ', 1),
(19, 'Conocimiento del medio natural', 2),
(20, 'Educación artística', 2),
(21, 'Educación física', 2),
(22, 'Lengua castellana y literatura', 2),
(23, 'Lengua cooficial ', 2),
(24, 'Literatura', 2),
(25, 'Lengua extranjera', 2),
(26, 'Matemáticas', 2),
(27, 'Educación musical ', 2),
(28, 'Conocimiento del medio natural', 3),
(29, 'Educación artística', 3),
(30, 'Educación física', 3),
(31, 'Lengua castellana y literatura', 3),
(32, 'Lengua cooficial ', 3),
(33, 'Literatura', 3),
(34, 'Lengua extranjera', 3),
(35, 'Matemáticas', 3),
(36, 'Educación musical ', 3),
(37, 'Conocimiento del medio natural', 4),
(38, 'Educación artística', 4),
(39, 'Educación física', 4),
(40, 'Lengua castellana y literatura', 4),
(41, 'Lengua cooficial ', 4),
(42, 'Literatura', 4),
(43, 'Lengua extranjera', 4),
(44, 'Matemáticas', 4),
(45, 'Educación musical ', 4),
(46, 'Conocimiento del medio natural', 5),
(47, 'Educación artística', 5),
(48, 'Educación física', 5),
(49, 'Lengua castellana y literatura', 5),
(50, 'Lengua cooficial ', 5),
(51, 'Literatura', 5),
(52, 'Lengua extranjera', 5),
(53, 'Matemáticas', 5),
(54, 'Educación musical ', 5),
(55, 'Conocimiento del medio natural', 6),
(56, 'Educación artística', 6),
(57, 'Educación física', 6),
(58, 'Lengua castellana y literatura', 6),
(59, 'Lengua cooficial ', 6),
(60, 'Literatura', 6),
(61, 'Lengua extranjera', 6),
(62, 'Matemáticas', 6),
(63, 'Educación musical ', 6),
(64, 'Ciencias de la Naturaleza', 7),
(65, 'Ciencias Sociales', 7),
(66, 'Educación Física', 7),
(67, 'Educación Plástica y Visual', 7),
(68, 'Lengua Castellana y Literatura', 7),
(69, 'Matemáticas', 7),
(70, 'Música', 7),
(71, 'Inglés', 7),
(72, '2ª Lengaua', 7),
(73, 'Francés', 7),
(74, 'Alemán', 7),
(75, 'Tecnología', 7),
(76, 'Educación Física', 7),
(77, 'Religion', 7),
(78, 'Optativa', 7),
(79, 'Ciencias de la Naturaleza', 7),
(80, 'Ciencias Sociales', 7),
(81, 'Educación Física', 7),
(82, 'Educación Plástica y Visual', 7),
(83, 'Lengua Castellana y Literatura', 7),
(84, 'Matemáticas', 7),
(85, 'Música', 7),
(86, 'Inglés', 7),
(87, '2ª Lengaua', 7),
(88, 'Francés', 7),
(89, 'Alemán', 7),
(90, 'Tecnología', 7),
(91, 'Educación Física', 7),
(92, 'Religion', 7),
(93, 'Optativa', 7),
(94, 'Ciencias de la Naturaleza', 8),
(95, 'Ciencias Sociales', 8),
(96, 'Educación Física', 8),
(97, 'Educación Plástica y Visual', 8),
(98, 'Lengua Castellana y Literatura', 8),
(99, 'Matemáticas', 8),
(100, 'Música', 8),
(101, 'Inglés', 8),
(102, '2ª Lengaua', 8),
(103, 'Francés', 8),
(104, 'Alemán', 8),
(105, 'Tecnología', 8),
(106, 'Educación Física', 8),
(107, 'Religion', 8),
(108, 'Optativa', 8),
(109, 'Biología y Geología', 9),
(110, 'Ciencias Sociales', 9),
(111, 'Educación Física', 9),
(112, 'Educación Plástica y Visual', 9),
(113, 'Lengua Castellana y Literatura', 9),
(114, 'Matemáticas', 9),
(115, 'Música', 9),
(116, 'Inglés', 9),
(117, '2ª Lengaua', 9),
(118, 'Francés', 9),
(119, 'Alemán', 9),
(120, 'Tecnología', 9),
(121, 'Educación Física', 9),
(122, 'Religion', 9),
(123, 'Optativa', 9),
(124, 'Física y Química', 9),
(125, 'Educación para la Ciudadanía', 9),
(126, 'Biología y Geología', 10),
(127, 'Ciencias Sociales', 10),
(128, 'Educación Física', 10),
(129, 'Educación Plástica y Visual', 10),
(130, 'Lengua Castellana y Literatura', 10),
(131, 'Matemáticas', 10),
(132, 'Música', 10),
(133, 'Inglés', 10),
(134, '2ª Lengaua', 10),
(135, 'Francés', 10),
(136, 'Alemán', 10),
(137, 'Tecnología', 10),
(138, 'Educación Física', 10),
(139, 'Religion', 10),
(140, 'Optativa', 10),
(141, 'Física y Química', 10),
(142, 'Educación para la Ciudadanía', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_cursos`
--

CREATE TABLE IF NOT EXISTS `wi_cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `wi_cursos`
--

INSERT INTO `wi_cursos` (`id_curso`, `descripcion`) VALUES
(1, '1º Primaria'),
(2, '2º Primaria'),
(3, '3º Primaria'),
(4, '4º Primaria'),
(5, '5º Primaria'),
(6, '6º Primaria'),
(7, '1º E.S.O.'),
(8, '2º E.S.O.'),
(9, '3º E.S.O.'),
(10, '4º E.S.O.'),
(11, '1º Bachillerato'),
(12, '2º Bachillerato'),
(13, 'Ciclos Formativos de Grado Medio'),
(14, 'Ciclos Formativos de Grado Superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_libros`
--

CREATE TABLE IF NOT EXISTS `wi_libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `editorial` varchar(120) DEFAULT NULL,
  `anyo` int(4) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `id_asignatura` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `localidad` varchar(120) NOT NULL,
  `lib_telefono` int(11) DEFAULT NULL,
  `lib_mail` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `wi_libros`
--

INSERT INTO `wi_libros` (`id_libro`, `id_usuario`, `titulo`, `descripcion`, `isbn`, `fecha_creacion`, `editorial`, `anyo`, `tipo`, `id_asignatura`, `id_curso`, `localidad`, `lib_telefono`, `lib_mail`) VALUES
(1, 12, 'Testeo', 'Esto es un test', '', '0000-00-00', '', 0, 0, 0, 0, '', 0, ''),
(2, 12, 'test', 'testeo', NULL, '2014-05-12', NULL, NULL, NULL, NULL, NULL, 'Valencia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_mensajes`
--

CREATE TABLE IF NOT EXISTS `wi_mensajes` (
  `id_mensaje` int(200) NOT NULL AUTO_INCREMENT,
  `id_user_1` int(200) NOT NULL,
  `id_user_2` int(200) NOT NULL,
  `descripcion` varchar(3000) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_provincias`
--

CREATE TABLE IF NOT EXISTS `wi_provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_provincias`
--

INSERT INTO `wi_provincias` (`id_provincia`, `provincia`) VALUES
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almería'),
(1, 'Álava'),
(33, 'Asturias'),
(5, 'Ávila'),
(6, 'Badajoz'),
(7, 'Balears, Illes'),
(8, 'Barcelona'),
(48, 'Bizkaia'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(39, 'Cantabria'),
(12, 'Castellón'),
(51, 'Ceuta'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'Coruña, A'),
(16, 'Cuenca'),
(20, 'Gipuzkoa'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(27, 'Lugo'),
(25, 'Lleida'),
(28, 'Madrid'),
(29, 'Málaga'),
(52, 'Melilla'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(34, 'Palencia'),
(35, 'Palmas, Las'),
(36, 'Pontevedra'),
(26, 'Rioja, La'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(49, 'Zamora'),
(50, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_usuarios`
--

CREATE TABLE IF NOT EXISTS `wi_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(120) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `fecha_registro` date NOT NULL,
  `role` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  `ip_registro` varchar(32) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `poblacion` varchar(120) DEFAULT NULL,
  `fb_id` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `wi_usuarios`
--

INSERT INTO `wi_usuarios` (`id_usuario`, `nombre_completo`, `mail`, `username`, `password`, `fecha_registro`, `role`, `estado`, `ip_registro`, `telefono`, `poblacion`, `fb_id`) VALUES
(1, 'Sergio Ferrando', 'test@wibuks.com', 'Ferrando92', '1234', '2014-04-10', 0, 1, '1212121', 666194163, NULL, NULL),
(2, 'Test', 'tester@wibuks.com', 'test', 'test', '2014-04-10', 1, 1, '2222', 666029384, NULL, NULL),
(3, 'yyyyyyyy', 'sergio@adlemons.com', 'yyyyyyyyyyy', '0', '2014-04-11', 1, 0, '0', 0, 'yyyyyyyyy', NULL),
(4, 'Paco', 'pepe@jfjf.com', 'Pepe', '0', '2014-04-11', 1, 0, '', 66636363, 'Valencia', NULL),
(5, 'Jota', 'tejudo@tejas.tejas', 'Tejas', '0', '2014-04-11', 1, 0, '127.0.0.1', 888494949, 'Valencia', NULL),
(6, 'hhhhhhhhh', 'hhhhhhhhhhh', 'hhhhhhhhhhh', 'hhhhhhhhhhh', '2014-04-11', 1, 0, '127.0.0.1', 0, 'hhhhhhhhhh', NULL),
(7, 'Juan Luis', 'jluis@gmail.com', 'JJluis90', 'test', '2014-04-11', 0, 0, '127.0.0.1', 666458474, 'Barselona', NULL),
(8, 'Paco', 'tests', 'Test', 'ststst', '2014-04-11', 0, 0, '127.0.0.1', 0, 'ststst', NULL),
(9, 'Sergio', 'eeeeeeee', 'sferrando2', 'dddddddd', '2014-05-06', 0, 0, '::1', 0, 'Valencia', NULL),
(41, 'Amparo Lopez', 'ferrandolopez@hotmail.com', 'Amparo', '5a105e8b9d40e1329780d62ea2265d8a', '2014-05-14', 0, 1, '::1', NULL, NULL, '10202739696585928'),
(42, 'Alba Pérez Guillén', 'alba93malilla@hotmail.com', NULL, '5a105e8b9d40e1329780d62ea2265d8a', '2014-05-14', 0, 1, '::1', NULL, NULL, '10203589641922788'),
(43, 'Sergio Ferrando Lopez', 'sferrando.92@gmail.com', NULL, '3fde6bb0541387e4ebdadf7c2ff31123', '2014-05-14', 0, 1, '::1', 44444, 'Valencia', '10202708696333263'),
(44, 'Sergio Ferrando', 'sergio@adlemons.com', 'ferrando92', '3fde6bb0541387e4ebdadf7c2ff31123', '2014-05-15', 0, 0, '::1', 666194163, 'Valencia', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
