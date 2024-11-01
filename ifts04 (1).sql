-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2024 a las 02:09:12
-- Versión del servidor: 11.1.2-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ifts04`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_pdf`
--

CREATE TABLE `archivos_pdf` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_subida` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `archivos_pdf`
--

INSERT INTO `archivos_pdf` (`id`, `titulo`, `ruta_archivo`, `usuario_id`, `fecha_subida`) VALUES
(1, 'horario-a-s-nuevo', '../pdf/horarios-sistemas-nuevo-plan-Agosto-2024.pdf', 124, '2024-10-25 23:04:01'),
(2, 'horario-a-s-viejo', '../pdf/horarios-sistemas-plan-viejo-agosto-2024.pdf', 124, '2024-10-25 23:04:54'),
(3, 'horario-d-s', '../pdf/horarios-software-agosto-2024.pdf', 124, '2024-10-25 23:05:01'),
(4, 'FORMULARIO DE INSCRIPCION FINALES', '../pdf/Formulario_de_Inscripcion_a_Finales_error_Siu.pdf', 124, '2024-10-25 23:05:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `asunto` varchar(45) NOT NULL,
  `mensaje` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `asunto`, `mensaje`) VALUES
(23, '', '', '', ''),
(24, 'Maria del Carmen', 'mariadelcarmenacri@gmail.com', 'fff', 'ffff'),
(25, 'Maria del Carmen', 'mariadelcarmenacri@gmail.com', 'fff', 'kkk'),
(26, 'Maria del Carmen', 'mariadelcarmenacri@gmail.com', 'fff', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `usuario`, `password`, `rol`) VALUES
(1, 'Alejandro', '87654321', 'Administrador'),
(2, 'Gabriel', '12345678', 'Administrador'),
(3, 'Gustavo', '11417015', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre_area` varchar(50) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `modificado_por` varchar(30) NOT NULL,
  `accion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre_area`, `mensaje`, `password`, `fecha_publicacion`, `rol`, `estado`, `modificado_por`, `accion`) VALUES
(1, 'Analista de Sistema', 'HOLA, este es un saludo de prueba   integral', '12345678', '2023-11-07 15:06:14', 2, 1, 'Profe', 'publicado'),
(2, 'Analista de Sistema', 'Listo...ya me parece que debería quedar así.', '12345678', '2023-10-19 04:57:34', 2, 1, '', 'publicado'),
(140, 'Desarrollo de software', 'Mejoraron la paginaaaaaaaaaaaa.  ', '12345678', '2023-10-28 00:37:36', 2, 0, 'Profe', 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `password` char(60) DEFAULT NULL,
  `id_rol` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasenia`, `password`, `id_rol`) VALUES
(5, 'editor@editor.com', '', '$2y$10$ma.XyeXWTY/BBHE1QK25XeN9nov/bQed9WNC4xOSd/JgLHOXxMxpi', 2),
(6, 'admin@admin.com', '', '$2y$10$nojQzK6gNMeexVZfb5sp2ulGquZBmcor5S/WXFqsk.vo2K3etqhES', 1),
(7, 'test@test.com', '', '$2y$10$BWs/loLc8XOrzLQPYk4czu.6G.4wj5GLSAlpfsnVXWLnCwx8kimwK', 0),
(124, 'profe@gmail.com', '123', '$2y$12$v56HehtqU1xuHaNcOxeQo.SYTZLv31GM7V5lgGaEV0JPfelgDXP2O', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos_pdf`
--
ALTER TABLE `archivos_pdf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos_pdf`
--
ALTER TABLE `archivos_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos_pdf`
--
ALTER TABLE `archivos_pdf`
  ADD CONSTRAINT `archivos_pdf_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
