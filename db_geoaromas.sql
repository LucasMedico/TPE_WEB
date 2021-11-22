-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 08:14:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_geoaromas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria` varchar(30) NOT NULL,
  `aptovegan` varchar(5) NOT NULL,
  `package` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria`, `aptovegan`, `package`) VALUES
('carbones', 'si', '5u'),
('recipientes', 'si', '1u'),
('sahumerios', 'si', '6u'),
('sales', 'si', '100g'),
('velas', 'no', '1u');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `producto`, `precio`, `detalle`, `categoria`) VALUES
(1, 'Sahumerios de lavanda', 350, 'sahumerio de lavanda lorem lorem lorem lorem lorem lorem', 'sahumerios'),
(2, 'Sahumerios de lavanda', 350, 'sahumerio de lavanda lorem lorem lorem lorem lorem lorem', 'sahumerios'),
(3, 'Sahumerios de rosas', 350, 'sahumerio de rosas lorem lorem lorem lorem lorem lorem', 'sahumerios'),
(4, 'Carbones', 320, 'carbones para sahumar lorem lorem lorem lorem lorem lorem', 'carbones'),
(5, 'Sal hierbas naturales ', 300, 'sales aromaticas para baño lorem lorem lorem lorem lorem lorem', 'sales'),
(6, 'Sal body&home naturales ', 300, 'sales aromaticas para baño lorem lorem lorem lorem lorem', 'sales'),
(7, 'Recipiente  ', 430, 'recipientes para sahumar lorem lorem lorem lorem lorem lorem', 'recipientes'),
(8, 'Vela aromatica bosque', 250, 'velas aromaticas lorem lorem lorem lorem lorem', 'velas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `esAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `usuario`, `contraseña`, `esAdmin`) VALUES
(4, 'sofiax', '$2y$10$STdGz2ZqI4Pc/kk5YZjU..wc3/CQ00r6WJ6sarwqoO7jbhlu7s6iS', 1),
(5, 'lucas1', '$2y$10$iPe8nAA.1nj/e9tywoU1beYrbfuj9/WJhUiit8OSZxiT5HbOYnTY.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `fk_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
