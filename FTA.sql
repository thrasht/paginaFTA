-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2016 a las 20:34:14
-- Versión del servidor: 10.0.21-MariaDB
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `FTA`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `available` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `type_id`, `name`, `cost`, `discount`, `available`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cloud Ibox II', 3500.00, 0, 13, '-Potente receptor satelital HD linux con avanzadas funciones en red y multimedia\r\n\r\n-Gran calidad al mejor precio\r\n\r\n-Soporta imagenes en SD HD y 3D', 'cloud.jpg', '0000-00-00 00:00:00', '2016-04-08 01:30:37'),
(2, 1, 'Dreambox 500s', 1500.00, 0, 15, 'Decodificador', 'dreambox_dm7000_550.jpg', '0000-00-00 00:00:00', '2016-04-08 00:00:38'),
(3, 1, 'Skybox F5s', 2000.00, 0, 20, 'Decofificador con SO Linux. 128MB de memoria RAM. IKS Azul y Rojo.', 'skybox.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Openbox X5', 1700.00, 0, 5, '1 mes gratis del servicio preferido por el cliente.', 'openbox.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'Servicio IKS Azul', 100.00, 0, 1001, '-Paquete Universe\r\n\r\n-Pagos por evento', 'azul.png', '0000-00-00 00:00:00', '2016-04-08 01:30:28'),
(6, 2, 'Servicio IKS Rojo USA', 125.00, 0, 1003, 'Satélite 110, 119, 129\r\nMás de 500 canales en películas, series, ppvs, xxx.', 'rojo usa.png', '0000-00-00 00:00:00', '2016-04-08 01:30:37'),
(7, 2, 'asd', 100.00, 0, 0, 'asd', 'IMG_4318.JPG', '2016-04-07 09:55:42', '2016-04-07 09:55:42'),
(9, 1, 'asd', 100.00, 0, 100, 'asd', 'IMG_4319.JPG', '2016-04-07 10:21:48', '2016-04-07 10:21:48'),
(10, 2, 'asd', 123.00, 0, 321, 'adasd', '15.jpg', '2016-04-07 10:41:13', '2016-04-07 10:41:13'),
(11, 2, 'ad', 123.00, 0, 123, 'asd', 'rojo usa.png', '2016-04-07 10:56:46', '2016-04-07 10:56:46'),
(13, 2, 'asd', 123.00, 0, 321, 'adasd', 'IMG_4297.JPG', '2016-04-07 11:00:26', '2016-04-07 11:00:26'),
(14, 2, 'asdsad', 0.00, 0, 0, 'asdsa', 'IMG_4510.jpg', '2016-04-08 01:31:40', '2016-04-08 01:31:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articleTypes`
--

CREATE TABLE IF NOT EXISTS `articleTypes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `articleTypes`
--

INSERT INTO `articleTypes` (`id`, `name`) VALUES
(1, 'Productos'),
(2, 'Servicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` bigint(20) unsigned NOT NULL,
  `description` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `description`, `position`, `imagen`) VALUES
(2, 'Promo 2', 2, 'banner2.jpg'),
(3, 'Promo 3', 3, 'banner3.jpg'),
(8, '', 0, 'banner.JPG'),
(9, 'gfdfg', 0, 'banner.jpg'),
(10, '', 0, 'banner.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `article_id`, `amount`) VALUES
(3, 7, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(10) unsigned NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(3, 'Omnis tenetur quia.', 'Aut eum magni vel rerum autem.'),
(4, 'Aliquid et rerum natus et.', 'Quo blanditiis eveniet dicta officia molestiae.'),
(5, 'Et sint nobis.', 'Autem nisi commodi nostrum sapiente.'),
(6, 'Quis corrupti.', 'Cumque quis aut quos est distinctio dolore magni.'),
(7, 'Aut.', 'Nobis error sed repudiandae.'),
(8, 'Sunt adipisci optio.', 'Velit maxime porro quasi magni. In eaque culpa et. Maiores sed sit ut ducimus.'),
(9, 'Ipsam labore.', 'Dolores quae sunt ut qui. Quia eos ea placeat id eos natus dolorem.'),
(10, 'Reprehenderit.', 'Alias vel earum illum.'),
(11, 'Aut dolor enim neque est.', 'Deleniti odio et cum voluptas.'),
(12, 'Et laboriosam aut.', 'Est non ullam non inventore. Iure dolor minima vel.'),
(13, 'Ut voluptatem maxime quo.', 'Et facere voluptatem animi error ducimus.'),
(14, 'Esse ullam.', 'Impedit ex architecto veniam animi labore nemo.'),
(15, 'Dolores.', 'Sint labore magnam rerum consequatur sit repellat.'),
(16, 'Neque est.', 'Natus vero aliquid ducimus distinctio iusto et.'),
(17, 'Et eos delectus illo.', 'Et sunt eum odit cum ut tempore distinctio et. Esse dolor eum est impedit.'),
(18, 'Quas adipisci.', 'Voluptatem et culpa libero occaecati quidem quia voluptates.'),
(19, 'Ad a.', 'Et atque modi iure enim fugiat voluptas dolores.'),
(20, 'Quis qui deleniti et in.', 'Quam atque sed qui est dolore soluta.'),
(21, 'Consequatur in.', 'Harum quo et nostrum consequatur quisquam.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `reply` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inbox`
--

INSERT INTO `inbox` (`id`, `name`, `email`, `subject`, `message`, `seen`, `reply`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'asd@asd.c', 'asdasd', 'asdasd', 1, 'respuesta', '2016-02-12 02:11:21', '2016-04-06 01:01:37'),
(2, 'asd', 'asd@asd.c', 'asd', 'asdasd', 1, NULL, '2016-02-27 07:46:11', '2016-04-07 09:54:06'),
(3, 'asd', 'eduardomhdz@gmail.com', 'asdsd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare enim a leo venenatis, fringilla ornare tortor pellentesque. Ut convallis convallis dui, vel lobortis tortor pellentesque in. Curabitur interdum sollicitudin porttitor. Nullam semper luctus massa quis posuere. Sed sit amet ipsum libero. Praesent massa dolor, ultricies non accumsan eget, dictum in sem. Quisque porttitor rhoncus neque sit amet pharetra. Morbi laoreet in urna in luctus. Praesent vel ipsum id magna tempor pulvinar vel dictum ipsum. Etiam egestas commodo sollicitudin. Morbi posuere iaculis tellus vitae rhoncus. Phasellus tincidunt auctor mauris, eu semper augue aliquet sit amet. Morbi sagittis ligula vel nisi rhoncus lobortis. Morbi massa arcu, iaculis et convallis quis, tincidunt quis metus. Proin varius convallis lectus. ', 1, 'Esto es una respuesta', '2016-04-06 01:04:19', '2016-04-06 01:09:13'),
(4, 'asdasd|', 'asd@asd.c', 'asdas', 'mensaje del miercoles', 1, NULL, '2016-04-07 04:04:24', '2016-04-07 04:04:52'),
(5, 'asd', 'asd@asd.com', 'adasd', 'asdasd', 1, 'qwerty', '2016-04-07 07:27:54', '2016-04-07 09:54:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_04_171906_create_users_table', 1),
('2015_03_04_172343_create_articleTypes_table', 2),
('2015_03_04_172517_create_articles_table', 3),
('2015_03_04_172605_create_inbox_table', 4),
('2015_03_04_172729_create_faqs_table', 5),
('2015_03_04_172855_create_sells_table', 6),
('2015_03_04_173057_create_sellDescript_table', 7),
('2014_10_12_100000_create_password_resets_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellDescript`
--

CREATE TABLE IF NOT EXISTS `sellDescript` (
  `sell_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `subTotal` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sellDescript`
--

INSERT INTO `sellDescript` (`sell_id`, `article_id`, `amount`, `subTotal`) VALUES
(2, 5, 2, 200.00),
(2, 1, 2, 5000.00),
(2, 3, 3, 6000.00),
(3, 1, 3, 7500.00),
(3, 6, 3, 375.00),
(4, 5, 1, 100.00),
(5, 1, 1, 2500.00),
(6, 6, 4, 500.00),
(7, 1, 1, 2500.00),
(8, 1, 1, 2500.00),
(8, 2, 1, 1500.00),
(10, 2, 10, 15000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sellTotal` double(8,2) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0',
  `cancel` tinyint(1) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sells`
--

INSERT INTO `sells` (`id`, `user_id`, `created_at`, `updated_at`, `sellTotal`, `image`, `comments`, `shipping`, `tracking`, `status_id`, `cancel`, `seen`) VALUES
(2, 7, '2016-03-04 12:01:43', '2016-04-08 00:45:27', 11200.00, 'mem_desc.jpeg', 'asdas', 'UPS', '8998928918', 5, 0, 0),
(3, 7, '2016-03-12 10:46:09', '2016-04-08 01:30:37', 7875.00, 'IMG_4509.jpg', 'asd', NULL, NULL, 2, 1, 2),
(4, 7, '2016-03-14 09:43:43', '2016-04-08 01:30:28', 100.00, 'mem_desc.jpeg', 'adasd', NULL, NULL, 2, 1, 2),
(5, 7, '2016-03-14 09:47:27', '2016-04-08 00:44:20', 2500.00, '5.png', 'dasdas', 'Estafeta', '32131231231', 5, 0, 0),
(6, 7, '2016-03-14 10:20:04', '2016-04-08 01:02:43', 500.00, 'IMG_4510.jpg', 'adasd', 'Estafeta', '8998928918', 5, 0, 2),
(7, 7, '2016-03-14 10:20:18', '2016-04-07 23:58:43', 2500.00, 'mem_desc.jpeg', 'asdasdasdad\r\nadasd\r\ndassd', NULL, NULL, 2, 1, 0),
(8, 7, '2016-04-07 04:07:29', '2016-04-07 23:55:06', 4000.00, 'exumer disk.jpeg', 'adasd', 'DHL', '123123123123', 5, 0, 0),
(9, 7, '2016-04-07 23:24:19', '2016-04-07 23:54:27', 0.00, NULL, NULL, NULL, NULL, 0, 1, 0),
(10, 7, '2016-04-07 23:24:42', '2016-04-08 00:00:38', 15000.00, NULL, NULL, NULL, NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(0, 'Pedido realizado, esperando autorización'),
(1, 'Pedido autorizado, esperando pago'),
(2, 'Pago realizado, esperando autorización'),
(3, 'Pago autorizado, esperando envío'),
(4, 'Envío realizado'),
(5, 'Pedido finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `street` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `user`, `email`, `password`, `type`, `street`, `number`, `zipcode`, `city`, `state`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'ad', 'dsd', 'sasdas', 0, '', '', '', NULL, NULL, NULL, NULL, '2016-01-28 11:24:02', '2016-01-28 11:24:02'),
(3, 'asd', 'adasd', 'dsddsa', 'dasda', 1, '', '', '', NULL, NULL, NULL, NULL, '2016-01-28 11:25:11', '2016-01-28 11:25:11'),
(4, 'asd', 'adasdeq', 'dsddsaewq', '$2y$10$E6BZ0BZo4cmBp0m3wfnROeZ4Ne1YcVMGk5GxYlwEQmxbm2Yu/bo5W', 1, '', '', '', NULL, NULL, NULL, NULL, '2016-01-28 11:29:24', '2016-01-28 11:29:24'),
(5, 'aasd', 'asd', 'asd@asd.c', '$2y$10$6X3yLFZaFbxtuD7YJLvK4eJveqGozB4yApxYddRh/SJJ.KnPZpKgy', 1, '', '', '', NULL, NULL, NULL, 'rQvTTvfPhqZhOdcivDQGSzg67Q4uZFzUxMXUFjO6AGoMwFFCP1967jOtZzhx', '2016-02-06 05:26:54', '2016-02-27 06:34:35'),
(7, 'Eduardo', 'thrasht', 'deathmetal_pantera@hotmail.com', '$2y$10$8Jg65V5B.r.nHDZG8Ci7LufZ0a.T7fqNy3l5pBiHuon4p/mZvpqnS', 1, 'Avenida de las luces', '123', '898990', 'soledad de graciano Sánchez', 'San Wicho', '1231231231', 'JJCwKoaIl3NNXbq4NghpdK8f0hnG9bxEX7t85acRh3JY1toQ4r7S3ZYP7R6t', '2016-02-27 07:33:35', '2016-04-07 08:38:05'),
(8, 'Fel', 'hades', 'asdf@qwerty.com', '$2y$10$ReUXWO62VwLa6tcFxragEOK7pR8lqkbydlpQjD5dGlGRkAQvnDueC', 1, '', '', '', NULL, NULL, NULL, 's7eNhgslcW6ylmN0Kd3u5djPfjxdwdjBboIY16SQV7YJBGzZsEkM3NB2GILZ', '2016-03-08 10:57:05', '2016-03-08 10:57:56'),
(9, 'Eduardo', 'edmon', 'eduardomhdz@gmail.com', '$2y$10$tJgJoUnhhJBcfaOukPehPO704CHQL86H/6AnqcF.yuNH8rSReoEhy', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Yv2jPX45zhKZDCI4Rl9rMTHznYZCjB2rDtJ0ILbkFEV8MEyqb1Tu8rJaYgJu', '2016-03-18 01:08:59', '2016-04-07 11:40:26'),
(10, 'Alberto', 'Albert', 'albert@hotmail.cocm', '$2y$10$Wx0oQ0vA9U2BBBrkEV7ym.WEicpjExi/SHg4OyvdmV/LYqRHPnjDG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:38:38', '2016-04-07 08:38:38'),
(11, 'Alberto', 'Albertin', 'albert@hotmail.com', '$2y$10$1KNPAu8p/yApatp0WRCnFOWa6U5.2NEC9GDuaE5I5Ulqc8cE4fLuy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:40:35', '2016-04-07 08:40:35'),
(12, 'Alberto', 'Albertano', 'albert@hotmail.co', '$2y$10$OFNopJy276U.vQ9SeKvnrOzZKikCNN0wmvAHQ95CL6mAyptyIcDzi', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:43:24', '2016-04-07 08:43:24'),
(13, 'Alberto', 'Albertanoasd', 'albert@hotmail.coasd', '$2y$10$xVPj5GrRm5ABXRPt0fMkf.4AtKpomO/Ek6QuVaTVh.TExilcFedBm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:46:42', '2016-04-07 08:46:42'),
(14, 'Alberto', 'Albertanoasdasd', 'albert@hotmail.coasdasd', '$2y$10$J.XtFhJnsaP.9XSn3dJxwObGOugMVRNXtpzEGqoMgeISGZO4lq0be', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:48:02', '2016-04-07 08:48:02'),
(15, 'Alberto', 'Albertanoasdasdasd', 'albert@hotmail.coasdasdasd', '$2y$10$oYHTSMJBQs06UmrhVszev.prlQsXr/EUv5KU38y6vCoRCIE9QwOTu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:49:13', '2016-04-07 08:49:13'),
(16, 'Alberto', 'Albertasdq', 'eduardo.mhdz@gmail.comaa', '$2y$10$1DJ5QZg.0bUWZWK1I1DWYelJDuqddGBZo56ph.jaCCy/vxId2mfJG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-07 08:50:08', '2016-04-07 08:50:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_type_id_foreign` (`type_id`);

--
-- Indices de la tabla `articleTypes`
--
ALTER TABLE `articleTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `sellDescript`
--
ALTER TABLE `sellDescript`
  ADD KEY `selldescript_sell_id_foreign` (`sell_id`),
  ADD KEY `selldescript_article_id_foreign` (`article_id`);

--
-- Indices de la tabla `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sells_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `articleTypes`
--
ALTER TABLE `articleTypes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `articleTypes` (`id`);

--
-- Filtros para la tabla `sellDescript`
--
ALTER TABLE `sellDescript`
  ADD CONSTRAINT `selldescript_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `selldescript_sell_id_foreign` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`);

--
-- Filtros para la tabla `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
