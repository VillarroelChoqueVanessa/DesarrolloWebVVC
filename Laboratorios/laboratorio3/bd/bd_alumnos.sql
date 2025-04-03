-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2025 a las 05:04:13
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
-- Base de datos: `bd_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(100) DEFAULT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `cu` varchar(15) NOT NULL,
  `sexo` char(1) NOT NULL CHECK (`sexo` in ('M','F')),
  `codigocarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `fotografia`, `nombres`, `apellidos`, `cu`, `sexo`, `codigocarrera`) VALUES
(3, NULL, 'Veniam eius anim co', 'Ab non anim nisi num', 'Quis dolores cu', 'M', 2),
(4, NULL, 'Ad earum eos volupt', 'Distinctio Aute eiu', 'Delectus explic', 'F', 3),
(5, NULL, 'Corporis voluptatem ', 'Cumque aliquam sit ', 'Duis sapiente n', 'M', 3),
(6, NULL, 'Magnam corrupti qui', 'Sunt nulla et dolore', 'Sint eos volupt', 'F', 2),
(7, NULL, 'Aut distinctio Occa', 'Qui dolore deserunt ', 'Deleniti sapien', 'M', 1),
(8, NULL, 'Asperiores reprehend', 'Asperiores nisi temp', 'Magna id est iu', 'M', 3),
(9, NULL, 'Est saepe et qui atq', 'Eligendi laborum Re', 'Distinctio Elit', 'F', 4),
(10, NULL, 'Sed aut sit rem do s', 'Incidunt est conseq', 'Accusamus nulla', 'M', 2),
(11, NULL, 'Quibusdam dolorem re', 'Explicabo Saepe aut', 'Animi nobis eos', 'F', 4),
(12, NULL, 'Irure consequatur qu', 'Reiciendis vero temp', 'Autem modi cupi', 'M', 3),
(13, '67edf0e83f306.png', 'Exercitationem ipsa', 'Provident nihil mag', 'Excepteur tempo', 'F', 3),
(14, '67edf0e841b1f.png', 'Et vel fuga Volupta', 'Est reiciendis quia', 'Sint proident s', 'M', 1),
(15, '', 'Eligendi voluptatibu', 'Aut nulla qui omnis ', 'Dolorem officia', 'M', 3),
(16, '', 'Ea ad laboriosam ut', 'Nulla consectetur id', 'Vero incidunt o', 'F', 3),
(17, '', 'Illo harum consequat', 'Et consequatur Labo', 'Quia est quis o', 'F', 2),
(18, '', 'Id alias qui quo ex', 'Deleniti commodi off', 'Dolor optio et ', 'F', 3),
(19, '', 'Autem dolorem anim a', 'Quia quo obcaecati e', 'Ducimus enim fa', 'M', 2),
(20, '', 'Odit non error numqu', 'Nisi vitae quia esse', 'Et nostrud eius', 'F', 1),
(21, '', 'Minus temporibus sed', 'Eum laborum laudanti', 'Iste id labore ', 'M', 1),
(22, '', 'Expedita dolore cum ', 'Dignissimos dolor au', 'Laboris dolore ', 'F', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `codigo` int(11) NOT NULL,
  `carrera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codigo`, `carrera`) VALUES
(1, 'Ingeniería de Sistemas'),
(2, 'Ingeniería en Telecomunicaciones'),
(3, 'Ingeniería del Gas y Petróleo'),
(4, 'Ingeniería Eléctrica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cu` (`cu`),
  ADD KEY `codigocarrera` (`codigocarrera`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`codigocarrera`) REFERENCES `carreras` (`codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
