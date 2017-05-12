-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2017 a las 14:10:17
-- Versión del servidor: 5.5.54-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `huge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE IF NOT EXISTS `centros` (
  `cod` int(8) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `poblacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `provincia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(9) NOT NULL,
  `fax` int(9) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`cod`, `nom`, `direccion`, `poblacion`, `cp`, `provincia`, `pais`, `tel`, `fax`) VALUES
(46001199, 'IES Sant Vicent Ferrer', 'Parc Salvador Castell, 16', 'Algemesi', 46680, 'Valencia', 'Espanya', 962457820, 962457821),
(46018692, 'IES LLuis Simarro', 'Av. Corts Valencianes s/n', 'Xativa', 46800, 'Valencia', 'Espanya', 962249080, 962249081),
(46025040, 'IES Abastos', 'Cl ALBERIQUE 18 ', 'Valencia', 46008, 'Valencia', 'Espanya', 963820831, 963820832);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros_consorcios`
--

CREATE TABLE IF NOT EXISTS `centros_consorcios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cod_cent` int(8) NOT NULL,
  `cod_cons` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `centro_ibfk_1` (`cod_cent`),
  KEY `consorcio_ibfk_1` (`cod_cons`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `centros_consorcios`
--

INSERT INTO `centros_consorcios` (`id`, `cod_cent`, `cod_cons`) VALUES
(1, 46001199, 1),
(2, 46018692, 1),
(3, 46025040, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consorcios`
--

CREATE TABLE IF NOT EXISTS `consorcios` (
  `cod` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `consorcios`
--

INSERT INTO `consorcios` (`cod`, `nom`) VALUES
(1, 'L''Alqueria Projectes Educatius'),
(2, 'La Ribera Movilitat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `doc_dni` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_foto` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_sanitaria` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_cv` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_banco` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_carta` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_appform` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  `doc_salida` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has the file, 0 if not',
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE IF NOT EXISTS `flujo` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FechaSalida` date NOT NULL,
  `FechaLlegada` date NOT NULL,
  `PaisDestino` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CiudadDestino` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE IF NOT EXISTS `flujo_personas` (
  `fpdni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `fpid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Activo` enum('si','no') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fpdni`,`fpid`),
  KEY `fk_fpid` (`fpid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `flujo_personas`
--

INSERT INTO `flujo_personas` (`fpdni`, `fpid`, `Activo`) VALUES
('85212369W', 'IT1', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menores`
--

CREATE TABLE IF NOT EXISTS `menores` (
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `nompadre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apepadre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dnip` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `poblacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `provincia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechanac` date NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE IF NOT EXISTS `personas` (
  `nom` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `ape` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL DEFAULT '0',
  `direccion` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `poblacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `cp` int(5) NOT NULL DEFAULT '0',
  `provincia` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `pais` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Empty',
  `fechanac` date NOT NULL DEFAULT '1200-09-05',
  `codcent` int(8) NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `codcent` (`codcent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`nom`, `ape`, `dni`, `telefono`, `direccion`, `poblacion`, `cp`, `provincia`, `pais`, `fechanac`, `codcent`) VALUES
('Paco', 'Llopis Martinez', '11122233E', 614002351, 'Calle La Reina 10-3-6', 'Xativa', 46800, 'Valencia', 'Espanya', '1999-02-15', 46018692),
('Empty', 'Empty', '12345678E', 0, 'Empty', 'Empty', 0, 'Empty', 'Empty', '1200-09-05', 46025040),
('Joan', 'Moreno Teodoro', '20863920E', 622451790, 'Carrer San Isidre 20', 'Algemesí', 46800, 'Valencia', 'Espanya', '1997-05-03', 46018692),
('Antonio', 'Rosado Aguado', '85212369W', 987987987, 'Calle Mº Concepción Nº32', 'Benicull', 46800, 'Valencia', 'Espanya', '1998-12-12', 46018692);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `session_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`) VALUES
(1, 'm7u7n62vf2l2smhsjdr1gblh53', '11122233E', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 'demo@demo.com', 1, 0, 7, 0, NULL, 1422205178, NULL, 1494581774, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
(2, '8fcikcopnorg9ht81r9a4l1pr1', '20863920E', '$2y$10$zMIJLVMtfvGYrUzbPJHgeOGvQiRdxj/RsfBPsVQRs4MuRImANt942', 'joancipria@gmail.com', 1, 0, 2, 0, NULL, 1493049731, NULL, 1494585054, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
(7, 'qntti2t3a9ktsq4hmpja0np3l1', '85212369W', '$2y$10$zMIJLVMtfvGYrUzbPJHgeOGvQiRdxj/RsfBPsVQRs4MuRImANt942', '58fe2121f1e7a@mailbox92.biz', 1, 0, 1, 1, NULL, 1493049721, NULL, 1494598098, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
(8, NULL, '12345678E', '$2y$10$9wcBkqxm7uTRob9zGygn3O2nHpXld0GitjSBqGhoYg5jIFVQnF6F.', '59117ce7041ec@mailbox92.biz', 0, 0, 1, 0, NULL, 1494318395, NULL, NULL, 0, NULL, '8f99bdd94ec4651f4632bbe9ea13e120cf7a09e1', NULL, NULL, 'DEFAULT');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `centros_consorcios`
--
ALTER TABLE `centros_consorcios`
  ADD CONSTRAINT `centro_ibfk_1` FOREIGN KEY (`cod_cent`) REFERENCES `centros` (`cod`) ON UPDATE CASCADE,
  ADD CONSTRAINT `consorcio_ibfk_1` FOREIGN KEY (`cod_cons`) REFERENCES `consorcios` (`cod`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `personas` (`dni`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
