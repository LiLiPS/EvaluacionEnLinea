-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 05:53:45
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
(1, 1, 1),
(10, 3, 1),
(11, 5, 3),
(12, 5, 1),
(13, 5, 5),
(14, 1, 2),
(15, 5, 2);

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
(3, 'Matemáticas'),
(4, 'Geografía'),
(5, 'IA Sistemas expertos'),
(7, 'Prueba'),
(8, 'Inteligencia artificial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_alumno`
--

CREATE TABLE `examen_alumno` (
  `id_examen_alumno` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `resultado` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_alumno`
--

INSERT INTO `examen_alumno` (`id_examen_alumno`, `id_aplicacion`, `id_usuario`, `id_examen`, `fecha`, `resultado`) VALUES
(14, 7, 1, 7, '2020-12-15 00:00:00', 61.3333),
(15, 7, 3, 7, '2020-12-15 00:00:00', 45.3333),
(16, 8, 5, 4, '2020-12-14 19:44:09', 40),
(20, 13, 1, 8, '2020-12-14 22:51:56', 93.3333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_grupo`
--

CREATE TABLE `examen_grupo` (
  `id_examen_grupo` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_grupo`
--

INSERT INTO `examen_grupo` (`id_examen_grupo`, `id_examen`, `id_grupo`, `fecha`, `hora_inicio`, `hora_fin`) VALUES
(1, 3, 1, '2020-12-02', '04:00:00', '05:00:00'),
(4, 5, 1, '2020-12-14', '19:00:00', '22:00:00'),
(7, 7, 1, '2020-12-14', '18:40:00', '20:40:00'),
(8, 4, 2, '2020-12-14', '19:42:00', '21:42:00'),
(12, 4, 1, '2020-12-14', '21:49:00', '23:49:00'),
(13, 8, 1, '2020-12-14', '22:24:00', '23:24:00');

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
(1, 2, 'Inteligencia Artificial 8:45'),
(2, 2, 'Inteligencia Artificial 10:30'),
(3, 4, 'Programación lógica y funcional 7:00'),
(4, 4, 'Programación lógica y funcional 8:45'),
(5, 4, 'Sistemas Operativos 10:30'),
(6, 2, 'Programación Web 12:15');

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
(5, 4, 'pregunta 3', 'espero,las,tenga'),
(11, 5, '¿Qué es una red semántica? ', 'esquema,representación,conocimiento,conceptos '),
(12, 5, '¿Qué es un sistema experto?', 'sistema,experto,ciencia,aprendizaje,simulan'),
(13, 5, '¿Qué es el Módulo de Adquisición del Conocimiento?', 'interface,experto,humano,conocimiento,base'),
(14, 5, '¿Qué es la Base de hechos?', 'memoria,trabajo,datos,sistema'),
(15, 5, '¿Qué es el Módulo de justificación?', 'razonamiento,explica,conclusión'),
(19, 7, '¿Funciona?', 'si,eso,espero,ojala,yes'),
(20, 7, '¿Sí funcionó?', 'ya,veremos,en,un,momento'),
(21, 7, 'pregunta 3', 'espero,las,tenga'),
(22, 8, 'pregunta 1', 'palabra,clave,muy,importante'),
(23, 8, 'pregunta 2', 'debe,tener,estas,palabras'),
(24, 8, 'pregunta 3', 'espero,las,tenga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_alumno`
--

CREATE TABLE `respuesta_alumno` (
  `id_respuesta_alumno` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta_alumno`
--

INSERT INTO `respuesta_alumno` (`id_respuesta_alumno`, `id_examen`, `id_pregunta`, `id_usuario`, `respuesta`) VALUES
(70, 7, 19, 1, 'si ojalá yes no sé'),
(71, 7, 20, 1, 'ya veremos en un momento'),
(72, 7, 21, 1, 'espero las hola'),
(73, 7, 19, 3, 'si no se yes '),
(74, 7, 20, 3, 'no aun no funciona'),
(75, 7, 21, 3, 'ya no se '),
(76, 4, 3, 5, 'no tengo idea'),
(77, 4, 4, 5, 'si no se bye'),
(78, 4, 5, 5, 'ya lo que sea'),
(91, 8, 22, 1, 'es muy importante que tenga las palabras clave'),
(92, 8, 23, 1, 'debe de tener todas estas palabras'),
(93, 8, 24, 1, 'espero que tenga chocolate');

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
(1, 2, 'Liliana', 'Parada', 'Sánchez', 'lilips', '1234', 16240612),
(2, 1, 'Gerardo', 'Carpio', 'Flores', 'gerardo', '1234', 123),
(3, 2, 'Alan', 'Avila', 'Rocha', 'alan', '1234', 16240484),
(4, 1, 'Martha', 'Rocha', 'Pérez', 'martha', '1234', 1680),
(5, 2, 'Ana', 'Sánchez', 'Candelas', 'ana', '1234', 16240528);

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
  ADD KEY `id_examen` (`id_examen`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

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
  MODIFY `id_alumno_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `examen_alumno`
--
ALTER TABLE `examen_alumno`
  MODIFY `id_examen_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `examen_grupo`
--
ALTER TABLE `examen_grupo`
  MODIFY `id_examen_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `respuesta_alumno`
--
ALTER TABLE `respuesta_alumno`
  MODIFY `id_respuesta_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `examen_alumno_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`),
  ADD CONSTRAINT `examen_alumno_ibfk_3` FOREIGN KEY (`id_aplicacion`) REFERENCES `examen_grupo` (`id_examen_grupo`);

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
