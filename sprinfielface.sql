-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-05-2020 a las 00:01:10
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sprinfielface`
--

-- --------------------------------------------------------



INSERT INTO `muro` (`id`, `name`, `text`, `insertdate`) VALUES
(2, 'Kearney', 'soy kearney el mas maloso y que', '2020-05-05 18:16:49'),
(3, 'Kearney', 'me gusta golpear a los &ntilde;o&ntilde;os tu eres un &ntilde;o&ntilde;o', '2020-05-05 18:21:32'),
(4, 'homero', 'hola amigos', '2020-05-05 18:28:06'),
(5, 'lisa', 'una pregunta que jamas alguien hizo', '2020-05-05 18:31:12'),
(6, 'ALFRED', 'un tipo con estilo y clase', '2020-05-05 18:47:56'),
(9, 'Milhouse', 'bart esta en el bart de moe ', '2020-05-05 19:10:28'),
(12, 'bart', 'milhouse la casa a mil', '2020-05-05 19:13:11'),
(13, 'bart', 'lisa es una &ntilde;o&ntilde;a', '2020-05-06 10:24:05'),
(14, 'lisa', 'bart esta en el bart de moe ', '2020-05-06 17:53:32'),
(15, 'nelson', 'esta lleno de &ntilde;o&ntilde;os', '2020-05-06 18:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--


INSERT INTO `profile` (`id`, `name`, `text`, `insertdate`, `location`, `web`, `email`) VALUES
(1, 'homero', 'soy gordo calvo e infeliz', '2020-05-06 16:11:38', 'profile', '', ''),
(3, 'bart', 'hay caramba', '2020-05-06 16:19:59', 'profile', 'localhost/tripodlycos/edit/www/user/bart/index.html', 'tripodlycos@bart'),
(4, 'ALFRED', 'soy un tipo con estilo ', '2020-05-06 16:24:40', 'profile', '', ''),
(6, 'Kearney', 'un maloso con hijos', '2020-05-06 16:30:31', 'profile', '', ''),
(7, 'Kearney', 'soy un experto couch de vida', '2020-05-06 16:53:35', 'usuario', 'localhost/tripodlycos/couching.php', 'tripodlycos@kearney'),
(8, 'homero', 'el mejor empleado', '2020-05-06 17:09:34', 'usuario', '', ''),
(9, 'bart', 'Un ni&ntilde;o ejemplar', '2020-05-06 17:11:20', 'usuario', '', ''),
(10, 'bart', 'soy bartolomeo algunos me dicen bartolo ', '2020-05-06 17:29:51', 'personal', '', 'bart'),
(11, 'bart', 'Estimado te ofrezco mis servicios de moda y estilo por que te observado y siempre tienes la misma vestimenta', '2020-05-06 17:48:41', 'social', '', 'ALFRED'),
(12, 'homero', 'comente mis calzones', '2020-05-06 18:07:53', 'laboral', '', 'bart'),
(13, 'bart', 'Te tengo como proyecto te ense&ntilde;are a ser menos tonto como couch de vida', '2020-05-06 18:15:05', 'proyectos', '', 'Kearney'),
(14, 'homero', 'el mejor empleado ayer te vi en el bart de Moe en horas de trabajo ', '2020-05-06 18:21:51', 'laboral', '', 'bart'),
(15, 'bart', 'trabajo en recorrer calles', '2020-05-06 19:12:19', 'laboral', '', 'bart'),
(16, 'bart', 'una palabra que debo aprender te cuido tu carro joven', '2020-05-06 21:50:14', 'laboral', '', 'bart'),
(17, 'BARBARA GORDON', 'soy influencer de chicas y damas', '2020-05-06 22:05:25', 'profile', 'localhost/tripodlycos/edit/www/user/BARBARA GORDON/index.php', 'tripodlycos@BARBARA GORDON'),
(18, 'BARBARA GORDON', 'Influencer para damas y chicas en las redes sociales', '2020-05-06 22:07:48', 'usuario', 'localhost/tripodlycos/edit/www/user/BARBARA GORDON/index.php', 'tripodlycos@BARBARA GORDON'),
(19, 'Radioactive Man', 'A luchar por los &ntilde;o&ntilde;os', '2020-05-06 22:10:21', 'profile', '', ''),
(20, 'Radioactive Man', 'El super heroe de los &ntilde;o&ntilde;os', '2020-05-06 22:10:54', 'usuario', '', ''),
(21, 'homero', 'recuerda tu fuiste un &ntilde;ino , pero creo que te comportas como un infante yo creo que eres un &ntilde;o&ntilde;o ', '2020-05-06 22:13:57', 'personal', '', 'Radioactive Man'),
(22, 'lisa', 'una chica lista', '2020-05-06 22:53:57', 'profile', '', ''),
(23, 'lisa', 'lisa una &ntilde;i&ntilde;a lista', '2020-05-06 22:54:35', 'usuario', '', ''),
(24, 'homero', 'hola padre como estas ', '2020-05-06 22:55:17', 'personal', '', 'lisa'),
(25, 'lisa', 'lisa ya nos saludamos esta ma&ntilde;ana en la casa no me molestes', '2020-05-06 22:57:17', 'personal', '', 'homero'),
(26, 'nelson', ' mi lema personal a golpear a los &ntilde;o&ntilde;os', '2020-05-06 23:19:52', 'profile', '', ''),
(27, 'nelson', 'hola amigos no &ntilde;o&ntilde;os ', '2020-05-06 23:20:48', 'usuario', '', ''),
(28, 'Kearney', 'eres experto en couch que es eso kerney', '2020-05-06 23:21:42', 'social', '', 'nelson'),
(29, 'BARBARA GORDON', 'eres una barbara gorda\r\nosea una super gorda', '2020-05-06 23:29:07', 'social', '', 'bart'),
(30, 'bart', 'que comico no soy una gorda soy la sobrina flash gordon', '2020-05-06 18:36:57', 'social', '', 'BARBARA GORDON'),
(31, 'ALFRED', 'soy un hombre con estilo y siempre estoy a la moda', '2020-05-06 23:48:01', 'usuario', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `muro`
--
ALTER TABLE `muro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `muro`
--
ALTER TABLE `muro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
