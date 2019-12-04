-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2019 a las 23:20:43
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `criptocontigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idpregunta` int(11) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta1` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta2` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta3` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta4` text COLLATE utf8_spanish_ci NOT NULL,
  `correcta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idpregunta`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `respuesta4`, `correcta`) VALUES
(1, '1) Cuál de las siguientes no es una característica del bitcoin     ', 'Es de código Abierto     ', '*Se basa en operaciones matemáticas con números primos     ', 'Las transacciones son irreversibles', 'Es de libre acceso', 2),
(2, '2) ¿En qué se basa la confianza en los bitcoins y su respaldo?   ', 'En nodos de confianza que poseen la autoridad para verificar las transacciones y firmarlas digitalmente dándoles validez.   ', '*En la cadena de bloques, una red de computadoras conectadas que llevan un registro común de transacciones y le brindan seguridad al sistema   ', 'En números únicos predefinidos, que deben ser encontrados mediante complejas operaciones matemáticas', 'En algoritmos criptográficos con llaves de 2048 bits imposibles de descifrar', 2),
(3, '3) ¿Todas las transacciones de bitcoin realizadas son anónimas?  ', 'Verdadero  ', '*Falso  ', '', '', 2),
(7, '4) ¿Como se pueden adquirir los bitcoins? ', 'Como forma de pago por bienes y/o servicios    ', 'Adquiriéndolos en una casa de cambio    ', '*Compitiendo a través de la minería', 'Todas las Anteriores', 4),
(8, '5) La minería es indispensable para el mantenimiento del bitcoin. ¿Por qué?  ', 'Es el proceso por el cual se crean nuevos bitcoins  ', 'Es el proceso por el cual se sincronizan todos los nodos  ', '*Es el proceso por el cual se procesan las transacciones y se garantiza la seguridad de la red', 'Todas las anteriores', 3),
(9, '6) La emisión de bitcoins se detendrá completamente ', '*Al llegar a los 21 millones de bitcoins ', 'Al llegar a los 25 millones de bitcoins ', 'Al llegar a los 27 millones de bitcoins', 'Siempre será posible emitir más bitcoins', 1),
(10, '7) ¿El cryptojacking es?            ', 'Un tipo de malware    ', '*Un ataque en el que se infecta una página web con un script de minería    ', 'Una aplicación potencialmente no deseada que puede perjudicar al usuario', 'Ninguna de las anteriores', 2),
(12, '8) ¿Para qué más se puede utilizar el blockchain?   ', 'Para respaldar otras criptomonedas como Bitcoin cash o Ether   ', 'Para emitir certificados que respalden la autenticidad de una página web   ', 'Para realizar cualquier transacción descentralizada', '*Todas son correctas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `idContenido` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `idresultado` int(11) NOT NULL,
  `usuario` int(20) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `respondio` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`idresultado`, `usuario`, `pregunta`, `respondio`, `puntos`) VALUES
(180, 12, 1, 2, 1),
(181, 12, 2, 2, 1),
(182, 12, 3, 2, 1),
(183, 12, 7, 2, 0),
(184, 12, 8, 2, 0),
(185, 12, 9, 2, 0),
(186, 12, 10, 4, 0),
(187, 12, 12, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `idUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `puntaje` int(11) NOT NULL,
  `administrador` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `idUsuario`, `cedula`, `nombre`, `apellido`, `password`, `puntaje`, `administrador`) VALUES
(10, 'antonio', '11826424', 'Antonio', 'Ruiz', '123456', 0, 0),
(11, 'alexandra', '13167425', 'Alexandra', 'Longart', '123456', 0, 0),
(12, 'admi', '11826424', 'Administrador', 'Admi', '123456', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idpregunta`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`idContenido`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`idresultado`),
  ADD KEY `pregunta` (`pregunta`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `idContenido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idresultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `resultado_ibfk_1` FOREIGN KEY (`pregunta`) REFERENCES `cuestionario` (`idpregunta`),
  ADD CONSTRAINT `resultado_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
