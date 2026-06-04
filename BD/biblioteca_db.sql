-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-06-2026 a las 23:49:03
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tadmin`
--

DROP TABLE IF EXISTS `tadmin`;
CREATE TABLE IF NOT EXISTS `tadmin` (
  `nAdmin_id` int NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cClave` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `lestado` tinyint DEFAULT '1',
  PRIMARY KEY (`nAdmin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tadmin`
--

INSERT INTO `tadmin` (`nAdmin_id`, `cNombre`, `cClave`, `lestado`) VALUES
(1, 'wduran41', '088812', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tautor`
--

DROP TABLE IF EXISTS `tautor`;
CREATE TABLE IF NOT EXISTS `tautor` (
  `nAutor_id` int NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cApellido` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cNacionalizada` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`nAutor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tautor`
--

INSERT INTO `tautor` (`nAutor_id`, `cNombre`, `cApellido`, `cNacionalizada`) VALUES
(1, 'jrrr', 'Tolkien', 'ingles'),
(2, 'mario', 'puzo', 'italia'),
(3, 'georgue ', 'orwell', 'ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlibro`
--

DROP TABLE IF EXISTS `tlibro`;
CREATE TABLE IF NOT EXISTS `tlibro` (
  `nLibro_id` int NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nAutor_fk` int NOT NULL,
  `nPrograma_fk` int NOT NULL,
  `lEstado` enum('retirado','prestado','disponible') COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`nLibro_id`),
  KEY `fk_libro_autor` (`nAutor_fk`),
  KEY `fk_libro_programa` (`nPrograma_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlibro`
--

INSERT INTO `tlibro` (`nLibro_id`, `cNombre`, `codigo`, `nAutor_fk`, `nPrograma_fk`, `lEstado`) VALUES
(10, 'un enfoquie', 'asd', 3, 1, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprograma`
--

DROP TABLE IF EXISTS `tprograma`;
CREATE TABLE IF NOT EXISTS `tprograma` (
  `nPrograma_id` int NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cFacultad` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `lEstado` tinyint DEFAULT '1',
  PRIMARY KEY (`nPrograma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tprograma`
--

INSERT INTO `tprograma` (`nPrograma_id`, `cNombre`, `cFacultad`, `lEstado`) VALUES
(1, 'sistemas', 'ingeniería ', 1),
(2, 'Ing industrial', 'ingenieria', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

DROP TABLE IF EXISTS `tusuario`;
CREATE TABLE IF NOT EXISTS `tusuario` (
  `nUsuario_id` int NOT NULL AUTO_INCREMENT,
  `cNick` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cClave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lEstado` tinyint DEFAULT '1',
  PRIMARY KEY (`nUsuario_id`),
  UNIQUE KEY `cNick` (`cNick`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nUsuario_id`, `cNick`, `cClave`, `lEstado`) VALUES
(1, 'eminem', 'qwerty', 1),
(12, 'qwe', 'qwe', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vlibro`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vlibro`;
CREATE TABLE IF NOT EXISTS `vlibro` (
`estado_libro` enum('retirado','prestado','disponible')
,`facultad` varchar(45)
,`libro_autor` varchar(45)
,`nLibro_id` int
,`nombre_libro` varchar(200)
,`nombre_programa` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vlibro`
--
DROP TABLE IF EXISTS `vlibro`;

DROP VIEW IF EXISTS `vlibro`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlibro`  AS SELECT `l`.`nLibro_id` AS `nLibro_id`, `l`.`cNombre` AS `nombre_libro`, `a`.`cNombre` AS `libro_autor`, `l`.`lEstado` AS `estado_libro`, `p`.`cNombre` AS `nombre_programa`, `p`.`cFacultad` AS `facultad` FROM ((`tlibro` `l` join `tautor` `a` on((`l`.`nAutor_fk` = `a`.`nAutor_id`))) join `tprograma` `p` on((`l`.`nPrograma_fk` = `p`.`nPrograma_id`)))  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tlibro`
--
ALTER TABLE `tlibro`
  ADD CONSTRAINT `fk_libro_autor` FOREIGN KEY (`nAutor_fk`) REFERENCES `tautor` (`nAutor_id`),
  ADD CONSTRAINT `fk_libro_programa` FOREIGN KEY (`nPrograma_fk`) REFERENCES `tprograma` (`nPrograma_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
