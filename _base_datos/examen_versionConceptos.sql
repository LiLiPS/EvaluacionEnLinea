-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2020 a las 07:12:04
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_grupo`
--

CREATE TABLE `alumno_grupo` (
  `id_alumno_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno_grupo`
--

INSERT INTO `alumno_grupo` (`id_alumno_grupo`, `id_usuario`, `id_grupo`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id_examen`, `nombre`) VALUES
(1, 'Examen unidad 1 A'),
(2, 'Examen unidad 1 B'),
(3, 'Matemáticas'),
(4, 'Geografía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_alumno`
--

CREATE TABLE `examen_alumno` (
  `id_examen_alumno` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `resultado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_alumno`
--

INSERT INTO `examen_alumno` (`id_examen_alumno`, `id_usuario`, `id_examen`, `fecha`, `resultado`) VALUES
(1, 2, 4, '2020-12-09 00:00:00', 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_grupo`
--

CREATE TABLE `examen_grupo` (
  `id_examen_grupo` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_grupo`
--

INSERT INTO `examen_grupo` (`id_examen_grupo`, `id_examen`, `id_grupo`) VALUES
(1, 3, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_usuario`, `nombre`) VALUES
(1, 2, 'Inteligencia Artificial 845'),
(2, 2, 'Inteligencia Artificial 1030');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `palabras_clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `id_examen`, `pregunta`, `palabras_clave`) VALUES
(1, 3, '¿Funciona?', 'si,eso,espero,ojala,yes'),
(2, 3, '¿Sí funcionó?', 'ya,veremos,en,un,momento'),
(3, 4, 'pregunta 1', 'palabra,clave,muy,importante'),
(4, 4, 'pregunta 2', 'debe,tener,estas,palabras'),
(5, 4, 'pregunta 3', 'espero,las,tenga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_alumno`
--

CREATE TABLE `respuesta_alumno` (
  `id_respuesta_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta_alumno`
--

INSERT INTO `respuesta_alumno` (`id_respuesta_alumno`, `id_examen`, `id_pregunta`, `id_usuario`, `respuesta`) VALUES
(1, 3, 1, 2, 'no lo sé'),
(2, 3, 2, 2, 'vamo a ver'),
(3, 4, 3, 2, 'palabra clave muy importante'),
(4, 4, 4, 2, 'debe hola como estas palabras'),
(5, 4, 5, 2, 'espero ya no se ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Docente'),
(2, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `no_control` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre`, `apellido_paterno`, `apellido_materno`, `usuario`, `contrasenia`, `no_control`) VALUES
(1, 1, 'Liliana', 'Parada', 'Sánchez', 'lilips', '1234', 16240612),
(2, 2, 'Gerardo', 'Carpio', 'Flores', 'gerardo', '1234', 123),
(3, 2, 'Alan', 'Avila', 'Rocha', 'alan', '1234', 16240484),
(4, 1, 'Martha', 'Rocha', 'Pérez', 'martha', '1234', 1680);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_examen_grupo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_examen_grupo` (
`id_examen` int(11)
,`nombre` varchar(30)
,`id_grupo` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_examen_grupo`
--
DROP TABLE IF EXISTS `vista_examen_grupo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_examen_grupo`  AS  select `id_examen` AS `id_examen`,`nombre` AS `nombre`,`examen_grupo`.`id_grupo` AS `id_grupo` from (`examen` join `examen_grupo` on(`id_examen` = `examen_grupo`.`id_examen`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  ADD PRIMARY KEY (`id_alumno_grupo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`);

--
-- Indices de la tabla `examen_alumno`
--
ALTER TABLE `examen_alumno`
  ADD PRIMARY KEY (`id_examen_alumno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `examen_grupo`
--
ALTER TABLE `examen_grupo`
  ADD PRIMARY KEY (`id_examen_grupo`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `respuesta_alumno`
--
ALTER TABLE `respuesta_alumno`
  ADD PRIMARY KEY (`id_respuesta_alumno`),
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  MODIFY `id_alumno_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `examen_alumno`
--
ALTER TABLE `examen_alumno`
  MODIFY `id_examen_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `examen_grupo`
--
ALTER TABLE `examen_grupo`
  MODIFY `id_examen_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuesta_alumno`
--
ALTER TABLE `respuesta_alumno`
  MODIFY `id_respuesta_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  ADD CONSTRAINT `alumno_grupo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `alumno_grupo_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `examen_alumno`
--
ALTER TABLE `examen_alumno`
  ADD CONSTRAINT `examen_alumno_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `examen_alumno_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`);

--
-- Filtros para la tabla `examen_grupo`
--
ALTER TABLE `examen_grupo`
  ADD CONSTRAINT `examen_grupo_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`),
  ADD CONSTRAINT `examen_grupo_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`);

--
-- Filtros para la tabla `respuesta_alumno`
--
ALTER TABLE `respuesta_alumno`
  ADD CONSTRAINT `respuesta_alumno_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`),
  ADD CONSTRAINT `respuesta_alumno_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id_pregunta`),
  ADD CONSTRAINT `respuesta_alumno_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
