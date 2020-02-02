-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2019 a las 19:08:06
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qr-asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `estado_asistencia` int(11) NOT NULL,
  `foto_in` varchar(100) NOT NULL,
  `foto_out` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exit_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombres`, `dni`, `estado_asistencia`, `foto_in`, `foto_out`, `created_at`, `updated_at`, `exit_at`) VALUES
(134, 'MEDINA ZAPATA, JHON F.', '46622539', 0, 'IN-MEDINA ZAPATA, JHON F.-46622539-29062019115639-TkU8X5RnQ8.jpg', 'OUT-MEDINA ZAPATA, JHON F.-46622539-29062019115925-cAkDPm4Rkk.jpg', '2019-06-29 16:56:40', '2019-06-29 16:59:25', '2019-06-29 11:59:25'),
(135, 'MEDINA ZAPATA, JHON F.', '46622539', 0, 'IN-MEDINA ZAPATA, JHON F.-46622539-29062019123914-JzpdWUU0uW.jpg', 'OUT-MEDINA ZAPATA, JHON F.-46622539-29062019124018-TjpRPdARgw.jpg', '2019-06-29 17:39:14', '2019-06-29 17:40:18', '2019-06-29 12:40:18'),
(136, 'MEDINA ZAPATA, JHON F.', '46622539', 0, 'IN-MEDINA ZAPATA, JHON F.-46622539-29062019130922-RjuLTbQHmF.jpg', 'OUT-MEDINA ZAPATA, JHON F.-46622539-29062019131216-qRt47qKAIC.jpg', '2019-06-29 18:09:22', '2019-06-29 18:12:16', '2019-06-29 13:12:16'),
(137, 'MEDINA ZAPATA, JHON F.', '46622539', 0, 'IN-MEDINA ZAPATA, JHON F.-46622539-29062019174805-XfpdjaiDWj.jpg', 'OUT-MEDINA ZAPATA, JHON F.-46622539-29062019183448-kB5iWjO5Kc.jpg', '2019-06-29 22:48:06', '2019-06-29 23:34:48', '2019-06-29 18:34:48'),
(138, 'MEDINA ZAPATA, JHON F.', '46622539', 1, 'IN-MEDINA ZAPATA, JHON F.-46622539-30062019150654-5BTFUSETPL.jpg', NULL, '2019-06-30 20:06:54', '2019-06-30 20:06:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Medina Zapata', 'jhonazsh.17@gmail.com', NULL, '$2y$10$xdASfkkbg4lfunVo5m7xp.iCgV1cdN7CHlloGQBP7SjQ420RQHzhK', NULL, '2019-06-29 22:57:23', '2019-06-29 22:57:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
