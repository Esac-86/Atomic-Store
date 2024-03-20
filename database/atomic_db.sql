-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 16:44:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atomic_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_datos`
--

CREATE TABLE `registro_datos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cedula` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `codigo` int(20) NOT NULL,
  `preferencias` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_datos`
--

INSERT INTO `registro_datos` (`id`, `nombre`, `telefono`, `cedula`, `email`, `direccion`, `ciudad`, `codigo`, `preferencias`, `fecha`) VALUES
(1, '0', '3014054340', 2465665, 'Chads@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, ',dn', '2023-10-03 00:00:00'),
(2, '0', '3014054338', 544444, 'adsonare@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'f', '2023-10-03 17:36:59'),
(3, '0', '35735735', 0, 'jkhughchfcv@sexooooo.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'dd', '2023-10-03 17:38:14'),
(4, '0', 'eeee', 0, 'Chads@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'eee', '2023-10-03 17:39:22'),
(5, '0', 'www', 0, 'omarandres943@gmail.com', 'www', 'www', 0, 'www', '2023-10-03 17:39:48'),
(6, '0', 'fd', 0, 'omarandres943@gmail.com', 'www', 'www', 0, 'f', '2023-10-03 05:41:44'),
(7, '0', 'w', 0, 'camilo2@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'w', '2023-10-03 05:42:19'),
(8, '0', 'dd', 0, 'camilo2@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'dd', '2023-10-03 23:42:39'),
(9, '0', 'e', 0, 'omarandres943@gmail.com', 'www', 'www', 0, 'e', '2023-10-03 17:43:29'),
(10, '0', 'q', 0, 'camilo2@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'qq', '2023-10-03 17:43:59'),
(11, '0', 'sgn', 0, 'camilo2@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'dg', '0000-00-00 00:00:00'),
(12, '0', '3014054340', 234566789, 'Chads@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'rr', '2023-10-03 11:49:23'),
(13, '0', '3014054338', 0, 'adsonare@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'v', '2023-10-03 10:50:22'),
(14, '0', 'www', 0, 'jkhughchfcv@sexooooo.com', 'Clle 24 # 06-5', 'w', 856010, 'v', '2023-10-03 10:52:25'),
(15, '0', 'aa', 0, 'adsonare@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'ss', '2023-10-03 10:53:37'),
(16, 'Miguel', '3014054340', 34677573, 'Chads@gmail.com', 'Clle 24 # 06-5', 'Aguazul', 856010, 'si', '2023-10-03 10:54:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--

CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` int(10) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` int(8) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(20, 'La pc2', 8116464, 'te', 'http://localhost/atomicstore/admin/img/producto/La_pc2_52.png'),
(21, 'Alienware', 4164874, 'ssuuuuuu', 'http://localhost/atomicstore/admin/img/producto/Alienware_46.jpg'),
(23, 'La super pc gamer', 9413433, 'www', 'http://localhost/atomicstore/admin/img/producto/La_super_pc_gamer_29.jpg'),
(26, 'Acer nitro 15', 3500, 'Core i5 11th\r\nNvidia Geforce gtx 1860', 'http://localhost/atomicstore/admin/img/producto/Acer_nitro_15_25.jpg'),
(27, 'Asus Rog', 6500, 'Core i7 12th\r\nNvidia Geforce RTX 3060\r\n1TB SSD\r\n16 RAM', 'http://localhost/atomicstore/admin/img/producto/Asus_Rog_46.png'),
(28, 'MSI Katana 15p', 4860, 'Core i5 12th\r\nNvidia Geforce GTX 1860\r\n255TB SSD\r\n8 RAM', 'http://localhost/atomicstore/admin/img/producto/MSI_Katana_15p_39.jpg'),
(29, 'Torre CPU gamer', 4000, 'Ryzen 5 5600g\r\nNvidia Geforce GTX 1860\r\n512TB SSD\r\n12 RAM', 'http://localhost/atomicstore/admin/img/producto/Torre_CPU_gamer_82.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `email` varchar(500) NOT NULL,
  `direccion` varchar(10) NOT NULL,
  `ciudad` varchar(55) NOT NULL,
  `codigo` int(10) NOT NULL,
  `preferencias` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`ID`, `nombre`, `telefono`, `cedula`, `email`, `direccion`, `ciudad`, `codigo`, `preferencias`, `fecha`) VALUES
(26, '12345678910', '', '2023-05-18 16:5', 'omarandres@gmail.com', '5000000', 'pendiente', 0, '', '2023-10-03 00:00:00'),
(27, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'user/hcamargog@sena.edu.co', '1000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(28, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'omarandres943@gmail.com', '5000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(29, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'user/hcamargog@sena.edu.co', '15000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(30, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'omarandres943@gmail.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(31, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'omarandres943@gmail.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(32, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'omarandres943@gmail.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(33, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'omarandres943@gmail.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(34, 'tjgpfrgk646joa7que5ki1r5fd', '', '2023-05-18 10:0', 'user/hcamargog@sena.edu.co', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(35, 'sjjcbina0bsmoikojepdfhra9e', '', '2023-05-19 07:2', 'jkhughchfcv@sexooooo.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(36, 'sjjcbina0bsmoikojepdfhra9e', '', '2023-05-19 07:2', 'jkhughchfcv@sexooooo.com', '9000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(37, '17td7bm53tk1c3mjh760se27cm', '', '2023-05-19 11:3', 'uwu@gmail.com', '7000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(38, 't6s9vju3sa0f6sklnoquugogcf', '', '2023-05-30 06:3', 'ddddd@ttt', '1000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(39, '53mhha4hbrfhn7sfced8otmsd3', '', '2023-07-05 10:5', 'sleepeds1@gmail.com', '6000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(40, '53mhha4hbrfhn7sfced8otmsd3', '', '2023-07-05 10:5', 'sleepeds1@gmail.com', '6000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(41, '53mhha4hbrfhn7sfced8otmsd3', '', '2023-07-05 11:0', 'sleepeds1@gmail.com', '6000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(42, '53mhha4hbrfhn7sfced8otmsd3', '', '2023-07-05 11:0', 'sleepeds1@gmail.com', '6000000', 'Pendiente', 0, '', '2023-10-03 00:00:00'),
(43, '53mhha4hbrfhn7sfced8otmsd3', '', '2023-07-05 11:1', 'sleepeds1@gmail.com', '6000000', 'Pendiente', 0, '', '2023-10-03 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_clave` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_email` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`) VALUES
(1, 'Admin', 'Admin', 'Admin', '$2y$10$4YXsBkAVjEHG1mwATFRZUO3xAUH26xFnanOEf7wZTCBr4iYsNTpJG', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_datos`
--
ALTER TABLE `registro_datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_datos`
--
ALTER TABLE `registro_datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `tblventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
