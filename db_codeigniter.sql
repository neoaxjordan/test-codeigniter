-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-09-2021 a las 19:24:18
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_codeigniter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_orden`
--

DROP TABLE IF EXISTS `tb_orden`;
CREATE TABLE IF NOT EXISTS `tb_orden` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_orden`
--

INSERT INTO `tb_orden` (`id`, `estado`) VALUES
(10, 1),
(20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_orden_detalle`
--

DROP TABLE IF EXISTS `tb_orden_detalle`;
CREATE TABLE IF NOT EXISTS `tb_orden_detalle` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orden_id` int(11) NOT NULL,
  `producto_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_orden_detalle`
--

INSERT INTO `tb_orden_detalle` (`id`, `orden_id`, `producto_descripcion`, `cantidad`, `estado`) VALUES
(2, 10, 'Prueba 456', 2, 1),
(3, 10, 'Prueba 789', 5, 1),
(5, 20, 'WW', 70, 1),
(6, 10, 'QEW', 55, 1),
(7, 10, 'YEAH', 90, 1),
(8, 20, 'YIP', 18, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
