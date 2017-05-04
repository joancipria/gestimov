-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2017 a las 23:48:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `cod` int(8) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `tel` int(9) NOT NULL,
  `fax` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`cod`, `nom`, `direccion`, `poblacion`, `cp`, `provincia`, `pais`, `tel`, `fax`) VALUES
(46001199, 'IES Sant Vicent Ferrer', 'Parc Salvador Castell, 16', 'Algemesi', 46680, 'Valencia', 'Espanya', 962457820, 962457821),
(46018692, 'IES LLuis Simarro', 'Av. Corts Valencianes s/n', 'Xativa', 46800, 'Valencia', 'Espanya', 962249080, 962249081);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docs`
--

CREATE TABLE `docs` (
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `foto` varchar(50) DEFAULT NULL,
  `dnidoc` varchar(50) DEFAULT NULL,
  `sanitaria` varchar(50) DEFAULT NULL,
  `curriculum` varchar(50) DEFAULT NULL,
  `vfoto` enum('si','no') NOT NULL DEFAULT 'no',
  `vdnidoc` enum('si','no') NOT NULL DEFAULT 'no',
  `vsanitaria` enum('si','no') NOT NULL DEFAULT 'no',
  `vcurriculum` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `docs`
--

INSERT INTO `docs` (`dni`, `foto`, `dnidoc`, `sanitaria`, `curriculum`, `vfoto`, `vdnidoc`, `vsanitaria`, `vcurriculum`) VALUES
('11122233E', './docs/foto/11122233Efoto.jpg', NULL, NULL, NULL, 'si', 'no', 'no', 'no'),
('85212369W', '85212369W', NULL, NULL, NULL, 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `id` varchar(10) NOT NULL,
  `FechaSalida` date NOT NULL,
  `FechaLlegada` date NOT NULL,
  `PaisDestino` varchar(30) NOT NULL,
  `CiudadDestino` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`id`, `FechaSalida`, `FechaLlegada`, `PaisDestino`, `CiudadDestino`) VALUES
('IT1', '2016-06-09', '2016-07-09', 'Italia', 'Reggio'),
('IT2', '2016-07-07', '2016-08-08', 'Italia', 'Milan'),
('IT3', '2016-08-10', '2016-09-12', 'Italia', 'Roma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo_personas`
--

CREATE TABLE `flujo_personas` (
  `fpdni` varchar(9) NOT NULL,
  `fpid` varchar(10) NOT NULL,
  `Activo` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `flujo_personas`
--

INSERT INTO `flujo_personas` (`fpdni`, `fpid`, `Activo`) VALUES
('11122233E', 'IT1', 'si'),
('85212369W', 'IT1', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menores`
--

CREATE TABLE `menores` (
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `nompadre` varchar(20) NOT NULL,
  `apepadre` varchar(50) NOT NULL,
  `dnip` varchar(9) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `poblacion` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechanac` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menores`
--

INSERT INTO `menores` (`dni`, `nompadre`, `apepadre`, `dnip`, `telefono`, `email`, `direccion`, `poblacion`, `cp`, `provincia`, `pais`, `fechanac`) VALUES
('11122233E', 'Vicente', 'Llopis Martinez', '20654781B', 666102589, 'Vicentelm@gmail.com', 'Calle La Reina 10-3-6', 'Xativa', 46800, 'Valencia', 'Espanya', '1968-10-12'),
('85212369W', 'padremenor', 'r', '78541236F', 987963852, 'z', 'z', 'z', 0, 'z', 'z', '1976-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `nom` varchar(15) NOT NULL DEFAULT 'Empty',
  `ape` varchar(50) NOT NULL DEFAULT 'Empty',
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL DEFAULT 000000000,
  `email` varchar(50) NOT NULL DEFAULT 'Empty',
  `direccion` varchar(40) NOT NULL DEFAULT 'Empty',
  `poblacion` varchar(20) NOT NULL DEFAULT 'Empty',
  `cp` int(5) NOT NULL DEFAULT 00000,
  `provincia` varchar(30) NOT NULL DEFAULT 'Empty',
  `pais` varchar(20) NOT NULL DEFAULT 'Empty',
  `fechanac` date NOT NULL DEFAULT '1200-09-05',
  `codcent` int(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`nom`, `ape`, `dni`, `telefono`, `email`, `direccion`, `poblacion`, `cp`, `provincia`, `pais`, `fechanac`, `codcent`) VALUES
('Paco', 'Llopis Martinez', '11122233E', 614002351, 'paco.123@gmail.com', 'Calle La Reina 10-3-6', 'Xativa', 46800, 'Valencia', 'Espanya', '1999-02-15', 46018692),
('Menor', 'q', '85212369W', 987987987, 'q', 'q', 'q', 46800, 'q', 'q', '1998-12-12', 46001199);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `session_id` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `user_name` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_provider_type` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=8 ;


--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `users` (`user_id`, `session_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`) VALUES
(1, NULL, '11122233E', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 'demo@demo.com', 1, 0, 7, 0, NULL, 1422205178, NULL, 1493048004, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
(7, NULL, '85212369W', '$2y$10$zMIJLVMtfvGYrUzbPJHgeOGvQiRdxj/RsfBPsVQRs4MuRImANt942', '58fe2121f1e7a@mailbox92.biz', 1, 0, 1, 0, NULL, 1493049721, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'DEFAULT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `flujo`
--
ALTER TABLE `flujo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flujo_personas`
--
ALTER TABLE `flujo_personas`
  ADD PRIMARY KEY (`fpdni`,`fpid`),
  ADD KEY `fk_fpid` (`fpid`);

--
-- Indices de la tabla `menores`
--
ALTER TABLE `menores`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `codcent` (`codcent`);



--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `fk_dni` FOREIGN KEY (`dni`) REFERENCES `personas` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `flujo_personas`
--
ALTER TABLE `flujo_personas`
  ADD CONSTRAINT `fk_fpdni` FOREIGN KEY (`fpdni`) REFERENCES `personas` (`dni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fpid` FOREIGN KEY (`fpid`) REFERENCES `flujo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menores`
--
ALTER TABLE `menores`
  ADD CONSTRAINT `menores_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `personas` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`codcent`) REFERENCES `centros` (`cod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `personas` (`dni`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
