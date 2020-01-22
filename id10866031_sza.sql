-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-01-2020 a las 09:41:41
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id10866031_sza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bideojokoak`
--

CREATE TABLE `bideojokoak` (
  `bideojokoa` varchar(200) NOT NULL,
  `likes` int(200) NOT NULL,
  `dislikes` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bideojokoak`
--

INSERT INTO `bideojokoak` (`bideojokoa`, `likes`, `dislikes`) VALUES
('Minecraft', 7, 6),
('League of Legends', 4, 5),
('Sea of Thieves', 2, 1),
('Portal 2', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `deiturak` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `pass`, `deiturak`) VALUES
('palagon001@ikasle.ehu.eus', '12345', 'Pablo Alagon'),
('pablo@gmail.com', '1234', 'Pablo Bi'),
('pabl2o@gmail.com', '123', 'Pablo Bi'),
('pabl23o@gmail.com', '1234', 'Pablo BIBI'),
('', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
