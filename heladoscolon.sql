-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2024 a las 20:30:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heladoscolon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre`, `correo`, `contrasena`, `fecha_nacimiento`, `telefono`) VALUES
(5, 'Mario Moreno', 'prueba@gmail.com', '$2y$10$n42u/zran/hJA7nYwHfY/.zmiGurA8X47aR/M3PNO9kDPTf5/xDGK', '2002-01-11', '993867506'),
(6, 'Alan Torres', 'admin@admin.com', '$2y$10$tuBSJ/aX8g6lzl2/tV.xQec6GcfRnJpxzugK/BwnRW/1gxYxUa7kW', '0000-00-00', '991345672');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(4) NOT NULL,
  `nombre_articulo` varchar(150) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `proveedor` varchar(150) DEFAULT NULL,
  `numero_proveedor` bigint(10) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre_articulo`, `cantidad`, `descripcion`, `proveedor`, `numero_proveedor`, `imagen`) VALUES
(3, 'vaso de unicel', 30, 'articulo de unicel en forma de vaso para helado de 400ml', 'Reyma', 9999345500, 'fotosarticulos/2024-10-20-12-25-46_unicel.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dulces`
--

CREATE TABLE `dulces` (
  `id_dulces` int(5) NOT NULL,
  `dulce` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `codigo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dulces`
--

INSERT INTO `dulces` (`id_dulces`, `dulce`, `descripcion`, `precio`, `ruta`, `codigo`) VALUES
(1, 'Merengue', 'Dulce ligero y esponjoso hecho a base de claras de huevo batidas a punto de nieve, mezcladas con azú', '21', 'imagen_dulce/2024-10-20-08-38-07-2024-10-19-07-35-13-mergengue.jpeg', 2112456324),
(2, 'Arrollado', 'Postre enrollado hecho con bizcocho suave, relleno de crema o frutas, y cubierto de chocolate o azúc', '24', 'imagen_dulce/2024-10-20-08-39-40-2024-10-19-07-39-48-arrollado.jpeg', 121345456),
(3, 'Cudrado', 'Delicia en forma de cuadrado, elaborada con capas de galleta o bizcocho, rellena de crema, chocolate', '21', 'imagen_dulce/2024-10-19-09-13-08-cuadrado.jpg', 1213435678),
(4, 'Pionono de crema', ' Postre enrollado de bizcocho suave, relleno de crema pastelera y cubierto con azúcar o chocolate', '24', 'imagen_dulce/2024-10-19-09-14-24-pinono.png', 1145678786),
(5, 'Pionono de yema', 'Postre enrollado de bizcocho suave, relleno de yema de huevo batida y cubierto de azúcar o glaseado', '34', 'imagen_dulce/2024-10-19-09-15-55-pinonono-yema.jpg', 1256454563),
(6, 'Oreja', 'Oreja nueva', '16', 'imagen_dulce/2024-11-19-09-22-51-cosa loca.png', 1215463436),
(7, 'Corbata', 'Postre en forma de lazo, hecho de masa de hojaldre y espolvoreado con azúcar. Crujiente y ligero', '15', 'imagen_dulce/2024-10-19-09-18-03-corbata.jpg', 1180775643),
(8, 'Panatela', 'Bizcocho suave y esponjoso, típicamente empapado en jarabe, ideal para postres o como base para otro', '16', 'imagen_dulce/2024-10-19-09-19-06-panetela.jpeg', 1345376859),
(9, 'Bororo', 'Delicia a base de harina de maíz, dulce y esponjoso, a menudo combinado con leche o frutas', '18', 'imagen_dulce/2024-10-19-09-19-54-bororo.jpg', 1143567843),
(10, 'Chantilly', 'Crema batida ligera y aireada, endulzada y a menudo saborizada con vainilla, perfecta para cubrir pa', '26', 'imagen_dulce/2024-10-19-09-21-36-chantiyi.jpg', 1123356782),
(15, 'Dulce de leche', 'Delicicioso dulce de leche tradicional que trae a tu infancia recordando viejos sabores y llevandote', '50', 'imagen_dulce/2024-11-19-09-25-37-images.jpg', 973664799);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(100) DEFAULT NULL,
  `correo_empleado` varchar(100) DEFAULT NULL,
  `fecha_nacimiento_empleado` date DEFAULT NULL,
  `telefono_empleado` char(10) DEFAULT NULL,
  `dias_trabajo` varchar(255) DEFAULT NULL,
  `horas_trabajo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `correo_empleado`, `fecha_nacimiento_empleado`, `telefono_empleado`, `dias_trabajo`, `horas_trabajo`) VALUES
(2, 'Mario Moreno ', 'mariomoreno20@gmail.com', '1987-04-14', '999311225', 'Lunes,Martes', 'Matutino: 9:00 A.M. - 4:00 P.M.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helados`
--

CREATE TABLE `helados` (
  `id_helados` int(5) NOT NULL,
  `helado` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `codigo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `helados`
--

INSERT INTO `helados` (`id_helados`, `helado`, `descripcion`, `precio`, `ruta`, `codigo`) VALUES
(1, 'Helado de chocolate', 'Rico helado de chocolate, ven y pruebalo', '45', 'imagen_helados/2024-10-19-05-48-39-Chocolate-Sorbet.jpg', 1232145105),
(2, 'Helado de Coco', 'Rico helado de coco, muy dulce y rico', '43', 'imagen_helados/2024-10-19-08-43-25-helado-facil-pina-coco.jpg', 2109898743),
(3, 'Helado de piña', 'Postre helado a base de jugo de piña, agua y azúcar. Refrescante y sin lácteos.', '43', 'imagen_helados/2024-10-19-08-45-38-helado-pina.jpg', 989788765),
(4, 'Helado de Guanabana', 'Postre helado elaborado con pulpa de guanábana, agua y azúcar. Cremoso y refrescante.', '45', 'imagen_helados/2024-10-19-08-46-59-sorbete-guana.jpg', 2127324356),
(5, 'Helado de zapote', 'Postre helado hecho con pulpa de zapote, agua y azúcar. Dulce, exótico y refrescante.', '46', 'imagen_helados/2024-10-19-08-48-16-helado-de-zapote.jpg', 2124516758),
(6, 'Helado de anona', 'Postre helado a base de pulpa de anona, agua y azúcar. Suave, dulce y tropical', '45', 'imagen_helados/2024-10-19-08-54-17-anona.JPG', 2141565474),
(7, 'Helado de platano', 'Postre helado preparado con plátano maduro, agua y azúcar. Cremoso, dulce y refrescante', '43', 'imagen_helados/2024-10-19-08-55-27-sorbete-platano.jpeg', 1343565575),
(8, 'Helado de melon', 'Postre helado hecho con pulpa de melón, agua y azúcar. Ligero, dulce y refrescante', '45', 'imagen_helados/2024-10-19-08-56-40-melon.jpeg', 2121453869),
(9, 'Helado de durazno', ' Postre helado elaborado con pulpa de durazno, agua y azúcar. Suave, dulce y afrutado', '45', 'imagen_helados/2024-10-19-08-57-53-durazno.jpg', 2114543665),
(10, 'Helado de Guayaba', ' Postre helado a base de pulpa de guayaba, agua y azúcar. Aromático, dulce y refrescante', '45', 'imagen_helados/2024-10-19-08-59-09-guayaba.jpg', 1231435678),
(11, 'Helado de Mandarina', 'Postre helado elaborado con jugo de mandarina, agua y azúcar. Cítrico, dulce y refrescante', '45', 'imagen_helados/2024-10-19-09-00-08-mandarina.jpg', 1765635634),
(12, 'Helado de tamarindo', 'Postre helado hecho con pulpa de tamarindo, agua y azúcar. Ácido, dulce y refrescante', '45', 'imagen_helados/2024-10-19-09-01-12-sorbet-de-tamarindo-1-1024x683.jpg', 2124560981),
(13, 'Helado de nance', 'Postre helado elaborado con pulpa de nance, agua y azúcar. Dulce, aromático y refrescante', '45', 'imagen_helados/2024-10-19-09-03-28-nance.jpg', 1906843756),
(14, 'Helado de Fresa', 'Postre helado hecho con puré de fresa, agua y azúcar. Dulce, afrutado y refrescante', '43', 'imagen_helados/2024-10-19-09-05-22-fresa-sor.jpg', 198054738),
(15, 'Helado de limon', 'Postre helado elaborado con jugo de limón, agua y azúcar. Cítrico, refrescante y ligeramente ácido', '43', 'imagen_helados/2024-10-19-09-06-13-helado-limon.jpeg', 109857463),
(16, 'Helado de Pitahaya', 'Postre helado hecho con pulpa de pitahaya, agua y azúcar. Suave, exótico y refrescante', '45', 'imagen_helados/2024-10-19-09-07-21-sorbet-pi.jpeg', 187543037),
(17, 'Helado de ciruela', ' Postre helado elaborado con pulpa de ciruela, agua y azúcar. Dulce, jugoso y refrescante', '45', 'imagen_helados/2024-10-19-09-08-29-ciruela.jpg', 189437532),
(26, 'hela de frambuesa', 'con leche, huevo', '30', 'imagen_helados/2024-11-18-06-52-14-salvador A.jpg', 886680817);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente_pedido` varchar(100) DEFAULT NULL,
  `correo_cliente_pedido` varchar(100) DEFAULT NULL,
  `telefono_cliente_pedido` char(10) DEFAULT NULL,
  `numero_mesa` varchar(100) DEFAULT NULL,
  `metodo_pago` varchar(100) DEFAULT NULL,
  `pedido_cliente_pedido` varchar(255) DEFAULT NULL,
  `comentarios_cantidad` varchar(255) DEFAULT NULL,
  `numero_tarjeta` bigint(100) DEFAULT NULL,
  `nip_tarjeta` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `nombre_cliente_pedido`, `correo_cliente_pedido`, `telefono_cliente_pedido`, `numero_mesa`, `metodo_pago`, `pedido_cliente_pedido`, `comentarios_cantidad`, `numero_tarjeta`, `nip_tarjeta`) VALUES
(14, 'Alan Daniel Torres Fuentes', 'prueba@prueba.com', '9994746543', 'Mesa 5', 'Tarjeta de crédito o debito', 'Dulces: Merengue, Arrollado, Cudrado; Helados: Helado de Fresa, Helado de limon; ', 'Sin mucha azúcar, por favor', 0, 0),
(16, 'José Justin Echeverría', 'megustaelhelado@gmail.com', '9995678456', 'Mesa 10', 'Tarjeta de crédito o debito', 'Dulces: Panatela, Bororo, Chantilly; Helados: Helado de Pitahaya, Helado de ciruela; ', 'Cuiden que el bororo no se caiga del vaso.', 0, 0),
(17, 'Jose Ake Torres', 'joseecheverria573@gmail.com', '9999999999', 'Mesa 7', 'Tarjeta de crédito o debito', 'Dulces: Merengue=2; Helados: Helado de Coco=2; ', 'Una cuchara extra porfavor', 0, 0),
(18, 'Jose Ake Torres', 'odessa.hdez@gmail.com', '9998888888', 'Mesa 10', 'Tarjeta de crédito o debito', 'Dulces: Cudrado=2; Helados: Helado de piña=1, Helado de anona=1; ', 'prueba1', 4152314206860689, 2531),
(19, 'Jose Ake Torres', 'odessa.hdez@gmail.com', '9999998076', 'Mesa 10', 'Tarjeta de crédito o debito', 'Dulces: Pionono de crema=1; Helados: Helado de chocolate=1, Helado de Guanabana=1; ', 'prueba 1', 5267770980650407, 1234),
(20, 'Jose Ake Torres', 'odessa.hdez@gmail.com', '9999878787', 'Mesa 10', 'Tarjeta de crédito o debito', 'Dulces: Pionono de yema=2; Helados: Helado de Guanabana=1, Helado de Guayaba=1; ', 'Prueba 2', 5267770980650407, 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjeta` int(5) NOT NULL,
  `numero_tarjeta` bigint(100) DEFAULT NULL,
  `nip_tarjeta` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id_tarjeta`, `numero_tarjeta`, `nip_tarjeta`) VALUES
(1, 5267770980650407, 1234),
(2, 4152314206860689, 4321),
(3, 4152314264218481, 3142);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `dulces`
--
ALTER TABLE `dulces`
  ADD PRIMARY KEY (`id_dulces`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `helados`
--
ALTER TABLE `helados`
  ADD PRIMARY KEY (`id_helados`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedido_cliente_pedido` (`pedido_cliente_pedido`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dulces`
--
ALTER TABLE `dulces`
  MODIFY `id_dulces` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `helados`
--
ALTER TABLE `helados`
  MODIFY `id_helados` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
