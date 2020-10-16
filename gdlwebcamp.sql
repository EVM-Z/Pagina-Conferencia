-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2020 a las 23:58:41
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'admin', 'Eliseo', '$2y$12$/IPKG0FQCIHxGejrRh0kjuMj/nauIjDF3x.nvoqHLP1TFnNUY.rE2', '0000-00-00 00:00:00', 1),
(5, 'admin22222', 'Eliseo2VMZ', '$2y$12$s5xGxZrT/SWuox42x/BCyexNMRFrfHpqyiANb.yZSPzR3gTPGWz0O', '2020-03-18 14:43:06', 0),
(6, 'admin3', 'Eliseo3', '$2y$12$f2Bb9vzIO5B70hi6XcrOKuOez792hKtkzDlQcIBEiH72HeLEPTAlu', '0000-00-00 00:00:00', 0),
(7, 'admin4', 'Eliseo4', '$2y$12$6wfX4rq3mSL7q99Ph51INuxGlA3orWRlsmdndy5CP10c1Yi/1ds62', '0000-00-00 00:00:00', 0),
(8, 'admin5', 'Eliseo5', '$2y$12$sPxR/Mk/mqyb/AuMPrpmCu64h.SYeEyMKZO76XTz4fg5Lfc.KRcOW', '0000-00-00 00:00:00', 0),
(12, 'admin6', 'Eliseo6', '$2y$12$Z3jWGZlO98fegN7vkFanouIx/a6r0UpAtk9T864fXwD4BAvYDklzq', '0000-00-00 00:00:00', 0),
(13, 'admin7', 'Eliseo7', '$2y$12$dIwlouh7/1NwTwYAW7Q/lenSNbdUYu3r4z2ID0thKqDFfT9vB3E7q', '0000-00-00 00:00:00', 0),
(15, 'admin8', 'Eliseo8', '$2y$12$9mA.by0LYGEKtmAlynOrQukbYmivIdU5qrQzGM7mQ7IfpZZbB1Qxu', '0000-00-00 00:00:00', 0),
(21, 'admin9', 'Eliseo9', '$2y$12$qPipz2jXk.8owCdIGElY0OPsnQoHGZGJ4uTsFv.KgDcTr0Ew/UkBG', '0000-00-00 00:00:00', 0),
(22, 'admin10', 'Eliseo10', '$2y$12$RMokacp9xQFQhp7aMKe7X.o5U3nzR.X11WZGnbU/.lVGSsdkg02vu', '0000-00-00 00:00:00', 0),
(23, 'admin11', 'Eliseo11', '$2y$12$RvF8dsMrQEp1.7AX32zSGu3xLkHKfw4MbtzwXe/SnJhEFaxzVCgFC', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', '0000-00-00 00:00:00'),
(2, 'Conferencias', 'fa-comment', '0000-00-00 00:00:00'),
(3, 'Talleres', 'fa-code', '0000-00-00 00:00:00'),
(4, 'Workshop', 'far fa-building', '2020-07-02 18:28:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(2, 'Responsive Web Design', '2016-12-09', '22:00:00', 1, 2, 'taller_01', '0000-00-00 00:00:00'),
(4, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(5, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', '0000-00-00 00:00:00'),
(6, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(7, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(8, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(9, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(15, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', '0000-00-00 00:00:00'),
(16, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(17, 'Como crear una tienda online que venda millones en pocos día', '2016-12-10', '10:00:00', 2, 6, 'conf_04', '0000-00-00 00:00:00'),
(18, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(19, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(22, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(24, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14', '0000-00-00 00:00:00'),
(25, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15', '0000-00-00 00:00:00'),
(26, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(28, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(29, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(30, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(31, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'invitado2.jpg'),
(3, 'Gregoria', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'Ada-Lovelace.jpg'),
(4, 'Susana', 'Rivera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!', 'invitado6.jpg'),
(19, 'Eliseo', 'VM', 'Hello', 'IMG-20190522-WA0013.jpg'),
(20, 'Steve', 'Jobs', 'Apple', 'work-5382501_1920.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiqueta'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `ID_registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`ID_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(1, 'Eliseo', 'VM', 'elyzeo.vm@gmail.com', '2020-02-18 16:29:14', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(2, 'Eliseo', 'VM', 'elyzeo.vm@gmail.com', '2020-02-18 16:33:55', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(3, 'Eliseo', 'VM', 'elyzeo.vm@gmail.com', '2020-02-18 17:45:37', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(4, 'EVM', 'EVM', 'elyzeo.vm@gmail.com', '2020-02-18 17:46:53', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":3,\"etiquetas\":3}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 3, '63.900000000000006', 1),
(5, 'Eliseo', 'VM', 'elyzeo.vm@gmail.com', '2020-02-19 15:21:47', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":2,\"etiquetas\":2}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '52.6', 1),
(6, 'EVM', 'VM', 'elyzeo.vm@gmail.com', '2020-02-19 17:05:06', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(7, 'Eliseo', 'VM', 'elyzeo.vm@gmail.com', '2020-02-19 17:05:28', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":2,\"etiquetas\":2}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '52.6', 0),
(8, '', '', '', '2020-07-28 21:48:44', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":2}', '{\"eventos\":[\"7\",\"8\",\"9\",\"15\"]}', 2, '138.3', 0),
(9, 'Eliseo2', 'VM2', 'elyzeo.vm@gmail.com', '2020-09-17 14:06:12', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"1\"},\"camisas\":1}', '{\"eventos\":[\"2\",\"8\",\"9\",\"5\",\"17\",\"18\"]}', 2, '136.3', 1),
(10, 'Eliseo3', 'VM3', 'elyzeo.vm@gmail.com', '2020-09-18 10:11:27', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"1\"},\"camisas\":1}', '{\"eventos\":[\"2\",\"8\",\"9\",\"4\",\"5\",\"17\",\"18\",\"19\",\"12\"]}', 2, '136.3', 1),
(11, 'Eliseo4', 'VM4', 'elyzeo.vm@gmail.com', '2020-09-23 06:44:01', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"2\"},\"pase_2dias\":{\"cantidad\":\"3\"},\"camisas\":1}', '{\"eventos\":[\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 3, '278.3', 1),
(12, '5', '5', 'elyzeo.vm@gmail.com', '2020-09-25 12:20:16', '{\"un_dia\":{\"cantidad\":\"5\"},\"pase_completo\":{\"cantidad\":\"5\"},\"pase_2dias\":{\"cantidad\":\"5\"},\"camisas\":5}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 3, '681.5', 1),
(13, '10', '10', 'elyzeo.vm@gmail.com', '2020-09-25 12:58:24', '{\"un_dia\":{\"cantidad\":\"10\"},\"pase_completo\":{\"cantidad\":\"10\"},\"pase_2dias\":{\"cantidad\":\"10\"},\"camisas\":10}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 3, '1363', 1),
(14, '13', '13', 'elyzeo.vm@gmail.com', '2020-09-25 22:45:24', '{\"un_dia\":{\"cantidad\":\"13\"},\"pase_completo\":{\"cantidad\":\"13\"},\"pase_2dias\":{\"cantidad\":\"13\"},\"camisas\":13}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"22\",\"24\",\"26\"]}', 3, '1771.9', 1),
(15, '20', '20', 'elyzeo.vm@gmail.com', '2020-09-25 23:20:41', '{\"un_dia\":{\"cantidad\":\"20\"},\"pase_completo\":{\"cantidad\":\"20\"},\"pase_2dias\":{\"cantidad\":\"20\"},\"camisas\":20,\"etiquetas\":20}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 2, '2726', 1),
(16, '40', '40', 'elyzeo.vm@gmail.com', '2020-09-30 12:45:10', '{\"un_dia\":{\"cantidad\":\"40\"},\"pase_completo\":{\"cantidad\":\"40\"},\"pase_2dias\":{\"cantidad\":\"40\"},\"camisas\":40,\"etiquetas\":40}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 3, '5452', 1),
(17, '123', '123', 'elyzeo.vm@gmail.com', '2020-10-02 15:48:15', '{\"un_dia\":{\"cantidad\":\"123\"},\"pase_completo\":{\"cantidad\":\"123\"},\"pase_2dias\":{\"cantidad\":\"123\"},\"camisas\":123,\"etiquetas\":123}', '{\"eventos\":[\"10\",\"2\",\"7\",\"8\",\"9\",\"4\",\"5\",\"6\",\"17\",\"18\",\"19\",\"12\",\"13\",\"14\",\"15\",\"16\",\"30\",\"31\",\"28\",\"29\",\"22\",\"24\",\"25\",\"26\"]}', 1, '16764.9', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
