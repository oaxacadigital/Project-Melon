-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2011 a las 04:23:05
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `melon_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `idarticulo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `p_compra` varchar(15) NOT NULL,
  `p_venta` varchar(15) NOT NULL,
  `existencia` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `proveedor` bigint(20) NOT NULL,
  `categoria` bigint(20) NOT NULL,
  `codigo_art` varchar(15) NOT NULL,
  PRIMARY KEY (`idarticulo`),
  UNIQUE KEY `codigo_art_2` (`codigo_art`),
  KEY `codigo_art` (`codigo_art`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `nombre`, `descripcion`, `p_compra`, `p_venta`, `existencia`, `stock_min`, `proveedor`, `categoria`, `codigo_art`) VALUES
(3, 'TUBO DE 8CM', 'LLEVE SUS TUBOS', '20.00', '27.00', 10, 0, 2, 2, '1273981273'),
(1, 'Tubo de 6cm', 'Marca patito, de pvc', '120.00', '190.00', 80, 5, 2, 2, '1234567891'),
(4, 'contacto de 3 entradas ', 'Es un contacto de 3 entradas xD es mágico ', '45', '50.50', 5, 5, 2, 3, '09328402'),
(7, 'sabritas', 'probando', '10', '20', 80, 0, 2, 1, '123456'),
(6, 'CABLE CAT6E', 'Este es un cable muy chido', '34.00', '88.00', 20, 0, 2, 3, '478320439848'),
(8, 'vasos', 'kbjskjbsjb', '10', '20', 70, 10, 1, 1, '387893'),
(9, 'Plumon', 'Probando', '10', '13', 100, 10, 3, 3, '2gd9b93');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_c` varchar(40) NOT NULL,
  `descripcion` varchar(160) NOT NULL,
  `cat_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre_c`, `descripcion`, `cat_padre`) VALUES
(1, 'Herramientas', 'Para herramientas', NULL),
(2, 'Plomeria', 'para articulos de plomeria', NULL),
(3, 'Electricidad', 'para articulos de lectricidad', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('07472963236212a4bddaeaf82e7f692e', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 1319703604, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf`
--

CREATE TABLE IF NOT EXISTS `conf` (
  `idconf` bigint(20) NOT NULL AUTO_INCREMENT,
  `padre` varchar(80) NOT NULL,
  `atributo` varchar(80) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`idconf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `conf`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE IF NOT EXISTS `credito` (
  `idcredito` bigint(20) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(80) NOT NULL,
  `cantidad_inicial` varchar(15) NOT NULL,
  `cantidad_actual` varchar(15) DEFAULT NULL,
  `f_fincredito` date DEFAULT NULL,
  `f_proxpago` date DEFAULT NULL,
  `cant_proxpago` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idcredito`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `credito`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dev_venta`
--

CREATE TABLE IF NOT EXISTS `dev_venta` (
  `idventa` bigint(20) NOT NULL,
  `idarticulo` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `dev_venta`
--

INSERT INTO `dev_venta` (`idventa`, `idarticulo`, `cantidad`, `total`) VALUES
(6, 8, 10, '200'),
(6, 8, 10, '200'),
(6, 7, 10, '200'),
(6, 7, 10, '200'),
(6, 1, 10, '1900'),
(6, 1, 10, '1900'),
(7, 8, 10, '200'),
(7, 8, 10, '200'),
(7, 7, 10, '200'),
(7, 7, 10, '200'),
(7, 1, 10, '1900'),
(7, 1, 10, '1900'),
(8, 1, 10, '1900'),
(8, 1, 10, '1900'),
(8, 8, 10, '200'),
(8, 8, 10, '200'),
(8, 7, 10, '200'),
(8, 7, 10, '200'),
(9, 7, 10, '200'),
(9, 7, 10, '200'),
(9, 1, 10, '1900'),
(9, 1, 10, '1900'),
(9, 8, 10, '200'),
(9, 8, 10, '200'),
(10, 8, 10, '200'),
(10, 1, 10, '1900'),
(10, 7, 10, '200'),
(11, 1, 10, '1900'),
(11, 7, 10, '200'),
(11, 8, 10, '200'),
(12, 8, 10, '200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `login_attempts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `idpago` bigint(20) NOT NULL AUTO_INCREMENT,
  `idcredito` bigint(20) NOT NULL,
  `cant_previa` varchar(15) NOT NULL,
  `abono` varchar(15) NOT NULL,
  `cant_restante` varchar(15) NOT NULL,
  `f_pago` date NOT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pago`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(80) NOT NULL,
  `direccion` varchar(160) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `contacto` varchar(45) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `razonsocial`, `direccion`, `telefono`, `contacto`) VALUES
(1, 'Mayoristas Asociados Ferreteros', 'Prol de la noria no. 111 col 5 señores', '9511234567', 'Jonh Connor'),
(2, 'Ferreteros del sureste', 'Prol de la noria no. 111 col 5 señores', '9511234567', 'Pedro Picapiedra'),
(3, 'Tienda Loop', '16 de septiembre 608 5 señores oax', '3876387', 'contacro@loop.com'),
(4, 'Gosh y asociados', 'slhsho', '8796876', 'ohosi@kjbhjds.com'),
(5, 'HP ', 'skhgsjsno', '832i98679', 'shvsk@dhdi.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$P$Bck1Ni0EERlXPfGLm2KG7N534n/ipe1', 'contacto@oaxaca-digital.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '0.0.0.0', '2011-10-27 03:19:27', '2011-10-27 02:08:55', '2011-10-27 03:19:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `user_autologin`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` bigint(20) NOT NULL AUTO_INCREMENT,
  `f_venta` date NOT NULL,
  `h_venta` time NOT NULL,
  `subtotal` varchar(15) NOT NULL,
  `iva` varchar(10) NOT NULL,
  `total` varchar(15) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `f_venta`, `h_venta`, `subtotal`, `iva`, `total`) VALUES
(1, '2011-10-19', '12:00:00', '20.00', '3.2', '0'),
(2, '2011-09-13', '20:00:00', '1000.00', '160', '0'),
(3, '2011-10-26', '12:18:00', '423.00', '23.56', '2131'),
(4, '2011-10-27', '00:34:38', '200', '32', '232'),
(5, '2011-10-27', '01:09:49', '2300', '368', '2668'),
(6, '2011-10-27', '01:10:22', '2300', '368', '2668'),
(7, '2011-10-27', '01:11:05', '2300', '368', '2668'),
(8, '2011-10-27', '01:13:01', '2300', '368', '2668'),
(9, '2011-10-27', '01:18:33', '2300', '368', '2668'),
(10, '2011-10-27', '01:21:13', '2300', '368', '2668'),
(11, '2011-10-27', '01:36:44', '2300', '368', '2668'),
(12, '2011-10-27', '01:37:46', '200', '32', '232');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
