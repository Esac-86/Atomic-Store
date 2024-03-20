-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2024 a las 14:06:11
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
(32, 'Monitor HP 27 Pulgadas', 860000, 'Monitor HP de 27 pulgadas ofrece una resolución Full HD y una frecuencia de actualización de 75Hz. Su diseño ultrafino lo hace ideal para espacios reducidos.', 'http://localhost/atomicstore/admin/img/producto/Monitor_HP_27_Pulgadas_21.png'),
(33, 'Monitor LG 32 Pulgadas', 290000, 'El monitor LG de 32 pulgadas ofrece una impresionante resolución 4K para una experiencia visual nítida y detallada. Perfecto para diseñadores gráficos y amantes del entretenimiento.', 'http://localhost/atomicstore/admin/img/producto/Monitor_LG_32_Pulgadas_11.png'),
(34, 'Monitor LED LG 24 Pulgadas', 570000, 'Monitor IPS Full HD con una frecuencia de actualización de 100Hz. Diseño compacto y elegante.', 'http://localhost/atomicstore/admin/img/producto/Monitor_LED_LG_24_Pulgadas_93.png'),
(35, 'CPU Intel Pentium SSD 120GB', 1600000, 'Procesador Intel Pentium, almacenamiento SSD y rendimiento eficiente.', 'http://localhost/atomicstore/admin/img/producto/CPU_Intel_Pentium_SSD_120GB_13.png'),
(36, 'PC Torre DOOM AMD Ryzen', 5600000, 'Computadora de torre con procesador AMD Ryzen, ideal para juegos y multitarea.', 'http://localhost/atomicstore/admin/img/producto/PC_Torre_DOOM_AMD_Ryzen_17.png'),
(37, 'Memoria RAM Spectrix D41', 270000, 'Diseñada para gamers, esta memoria RAM tiene un elegante color tungsteno gris y una capacidad de 16GB. Ofrece un rendimiento excepcional para tus juegos favoritos.', 'http://localhost/atomicstore/admin/img/producto/Memoria_RAM_Spectrix_D41_11.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
