-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2024 a las 04:01:53
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
-- Base de datos: `revecoin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_debito`
--

CREATE TABLE `credito_debito` (
  `id_metodo` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_tarjeta` varchar(20) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `codigo_cvv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `credito_debito`
--

INSERT INTO `credito_debito` (`id_metodo`, `id_usuario`, `numero_tarjeta`, `fecha_vencimiento`, `codigo_cvv`) VALUES
(3, 3, '123123', '3029-12-21', 123),
(1, 2, '123134234', '2045-03-30', 123),
(1, 1, '601400000071137720', '2026-09-29', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id`, `nombre`) VALUES
(1, 'Crédito'),
(2, 'Débito'),
(3, 'Paypal'),
(4, 'BinancePay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedero`
--

CREATE TABLE `monedero` (
  `usuario_id` int(11) NOT NULL,
  `dinero_acumulado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `inversion` int(11) NOT NULL,
  `ganancias` varchar(3) NOT NULL,
  `tareas` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `inversion`, `ganancias`, `tareas`) VALUES
(1, 'Bronce', 66, '2', 0.73),
(2, 'Plata', 150, '5', 1.66),
(3, 'Oro', 300, '10', 3.33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `comision` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `plan` int(11) DEFAULT NULL,
  `metodo_pago` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `email`, `telefono`, `contraseña`, `plan`, `metodo_pago`, `status`) VALUES
(1, 'Ana Mota', 'anavirgm@outlook.com', '04121716029', '$2y$10$JZQr6q3nsyXDB9vCJejRaucGNmSekCckPgwHr02nU14RGSjX43gx.', 1, 1, 1),
(2, 'Ana Mota', 'anamotv.l@gmail.com', '1234', '$2y$10$4VDQ6ce9NOYgpHgK3gRUzuvLim5C3VD05aiKbliak2h5UjaBISszO', 2, 1, 1),
(3, 'Jesus Suarez', 'aa@aa', '1234', '$2y$10$HOPu2eHz/3vCwnWs5nuDEexPXu91gPVUgKpsThqtekVWzzv0aSHNa', 3, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `credito_debito`
--
ALTER TABLE `credito_debito`
  ADD UNIQUE KEY `numero_tarjeta` (`numero_tarjeta`),
  ADD KEY `id_metodo` (`id_metodo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedero`
--
ALTER TABLE `monedero`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `plan` (`plan`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credito_debito`
--
ALTER TABLE `credito_debito`
  ADD CONSTRAINT `id_metodo` FOREIGN KEY (`id_metodo`) REFERENCES `metodos_pago` (`id`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `monedero`
--
ALTER TABLE `monedero`
  ADD CONSTRAINT `monedero_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `metodo_pago` FOREIGN KEY (`metodo_pago`) REFERENCES `metodos_pago` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`plan`) REFERENCES `planes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
