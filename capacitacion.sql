-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2020 a las 22:59:16
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capacitacion`
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
  `correcta` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idpregunta`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `respuesta4`, `correcta`, `curso`) VALUES
(1, '1) Cuál de las siguientes no es una característica del bitcoin      ', 'Es de código Abierto      ', 'Se basa en operaciones matemáticas con números primos      ', 'Las transacciones son irreversibles', 'Es de libre acceso', 2, 1),
(2, '2) ¿En qué se basa la confianza en los bitcoins y su respaldo?    ', 'En nodos de confianza que poseen la autoridad para verificar las transacciones y firmarlas digitalmente dándoles validez.    ', '*En la cadena de bloques, una red de computadoras conectadas que llevan un registro común de transacciones y le brindan seguridad al sistema    ', 'En números únicos predefinidos, que deben ser encontrados mediante complejas operaciones matemáticas', 'En algoritmos criptográficos con llaves de 2048 bits imposibles de descifrar', 2, 1),
(3, '3) ¿Todas las transacciones de bitcoin realizadas son anónimas?    ', 'Verdadero    ', '*Falso', '', '', 2, 1),
(7, '4) ¿Como se pueden adquirir los bitcoins? ', 'Como forma de pago por bienes y/o servicios    ', 'Adquiriéndolos en una casa de cambio    ', '*Compitiendo a través de la minería', 'Todas las Anteriores', 4, 1),
(8, '5) La minería es indispensable para el mantenimiento del bitcoin. ¿Por qué?  ', 'Es el proceso por el cual se crean nuevos bitcoins  ', 'Es el proceso por el cual se sincronizan todos los nodos  ', '*Es el proceso por el cual se procesan las transacciones y se garantiza la seguridad de la red', 'Todas las anteriores', 3, 1),
(9, '6) La emisión de bitcoins se detendrá completamente ', '*Al llegar a los 21 millones de bitcoins ', 'Al llegar a los 25 millones de bitcoins ', 'Al llegar a los 27 millones de bitcoins', 'Siempre será posible emitir más bitcoins', 1, 1),
(10, '7) ¿El cryptojacking es?            ', 'Un tipo de malware    ', '*Un ataque en el que se infecta una página web con un script de minería    ', 'Una aplicación potencialmente no deseada que puede perjudicar al usuario', 'Ninguna de las anteriores', 2, 1),
(12, '8) ¿Para qué más se puede utilizar el blockchain?   ', 'Para respaldar otras criptomonedas como Bitcoin cash o Ether   ', 'Para emitir certificados que respalden la autenticidad de una página web   ', 'Para realizar cualquier transacción descentralizada', '*Todas son correctas', 4, 1),
(13, 'Que es limite?', 'Es Matematica', 'Es Fisica', '', '', 1, 4),
(14, 'En donde se aplica  limite?', 'Matematica', 'Fisica', '', '', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `titulo`, `descripcion`, `profesor`) VALUES
(1, 'Criptomonedas', 'Sepa todo sobre las Criptomonedas', 12),
(4, 'Límite ', 'Curso de Limite', 17),
(5, 'Teorema de Pitagoras', 'Sepa todo sobre el Teorema de Pitagoras', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `idContenido` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`idContenido`, `titulo`, `contenido`, `curso`) VALUES
(14, 'Que es Limite  ', '<p>El Limite es...</p>\r\n\r\n<p><img alt=\"\" src=\"img/criptomoneda.png\" style=\"height:339px; width:510px\" /></p>\r\n', 4),
(16, 'Definicion', '<p>Una&nbsp;criptomoneda,&nbsp;criptodivisa&nbsp;(del ingl&eacute;s&nbsp;cryptocurrency) o&nbsp;criptoactivo&nbsp;es un medio digital de<img alt=\"\" src=\"img/quees.png\" style=\"float:right; height:180px; width:321px\" />&nbsp;intercambio que utiliza&nbsp;criptograf&iacute;a&nbsp;fuerte para asegurar las transacciones controlar la creaci&oacute;n de unidades adicionales y verificar la transferencia de activos.? Las criptomonedas son un tipo de&nbsp;divisa alternativa&nbsp;y de&nbsp;moneda digital. Existe controversia respecto a que las criptomonedas tienen que ser de&nbsp;control descentralizado&nbsp;o monedas centralizadas por los&nbsp;bancos centrales&nbsp;u otra entidad.</p>\r\n\r\n<p>El control de cada moneda funciona a trav&eacute;s de una&nbsp;base de datos descentralizada, usualmente una&nbsp;cadena de bloques&nbsp;(en ingl&eacute;s&nbsp;blockchain), que sirve como una base de datos de transacciones financieras p&uacute;blica.</p>\r\n\r\n<p>La primera criptomoneda que empez&oacute; a operar fue el&nbsp;bitcoin&nbsp;en 20094? y, desde entonces, han aparecido muchas otras con diferentes caracter&iacute;sticas y protocolos como&nbsp;Litecoin,&nbsp;Ethereum,&nbsp;Ripple,&nbsp;Dogecoin.</p>\r\n', 1),
(17, 'Caracteristicas', '<ul>\r\n	<li>Descentralizaci&oacute;n: No est&aacute;n vinculadas a ning&uacute;n organismo gubernamental ni financiero.<img alt=\"\" src=\"img/caracteristicas.jpg\" style=\"float:right; height:456px; width:425px\" /></li>\r\n	<li>Operabilidad: No estar reguladas bajo ning&uacute;n mercado oficial hace que se pueda operar con ellas durante los 7 d&iacute;as de la semana y las 24 horas del d&iacute;a.</li>\r\n	<li>Miner&iacute;a y Blockchain: En las monedas fiduciarias se imprimen billetes y se acu&ntilde;an monedas, pero en el caso de las criptomonedas el sistema es muy diferente. Las monedas virtuales se crean a trav&eacute;s de la miner&iacute;a. Un sistema en el que los individuos, mineros, a trav&eacute;s de la tecnolog&iacute;a&nbsp;blockchain&nbsp;(cadenas de bloques), validan transacciones a trav&eacute;s de la resoluci&oacute;n de problemas matem&aacute;ticos a cambio de su recompensa, la&nbsp;criptomoneda.</li>\r\n	<li>Transparencia: Todas las transacciones se &ldquo;registran en un libro&rdquo; compartido (tecnolog&iacute;a blockchain) imposible de manipular.</li>\r\n</ul>\r\n', 1),
(18, 'Definición de Teorema de Pitagoras', '<p>La definici&oacute;n del Teorema de Pitagoras es....</p>\r\n', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `idvaluacion` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `cantidadpreguntas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`idvaluacion`, `usuario`, `curso`, `puntaje`, `cantidadpreguntas`) VALUES
(3, 19, 4, 1, 2),
(4, 19, 1, 5, 8),
(5, 18, 1, 6, 8),
(6, 18, 4, 2, 2);

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
(274, 18, 13, 1, 1),
(275, 18, 14, 1, 1);

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
(12, 'admi', '11826424', 'Administrador', 'Admi', '123456', 4, 1),
(17, 'pedro', '123456', 'Pedro', 'Rodriguez', '123456', 4, 1),
(18, 'carlos', '12346', 'Carlos', 'Rodriguez', '123456', 0, 0),
(19, 'petra', '123456', 'Petra', 'Rodriguez', '123456', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idpregunta`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`idContenido`,`curso`) USING BTREE,
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`idvaluacion`);

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
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `idContenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `idvaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idresultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `informacion_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

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
