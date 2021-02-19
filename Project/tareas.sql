-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2021 a las 03:24:32
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareas`
--
CREATE DATABASE IF NOT EXISTS `tareas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tareas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE `tarea` (
  `id_tarea` int(4) NOT NULL,
  `nombre_tarea` text NOT NULL,
  `descripcion_tarea` text NOT NULL,
  `prioridad` varchar(6) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre_tarea`, `descripcion_tarea`, `prioridad`, `fecha_registro`, `fecha_fin`, `estado`) VALUES
(26, 'Realizar ejercicio', 'Buscar hora para crear rutina diaria', 'Media', '2021-02-19', '2021-02-19', 'Completado'),
(27, 'Aseo general de la casa', 'Definir cuando empezar con el aseo de la casa', 'Media', '2021-02-19', '2021-02-21', 'Incompleta'),
(28, 'Buscar el desarrollo de materiales con plástico', 'Investigar como realizar materiales con plástico reciclado', 'Alta', '2021-02-19', '2021-03-05', 'Incompleta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
