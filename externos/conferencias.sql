-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2014 a las 07:39:30
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE IF NOT EXISTS `conferencias` (
  `id_conferencia` int(11) NOT NULL AUTO_INCREMENT,
  `ponente` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_ponente` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `costo` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_conferencia`),
  KEY `id_conferencia` (`id_conferencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `conferencias`
--

INSERT INTO `conferencias` (`id_conferencia`, `ponente`, `descripcion_ponente`, `fecha`, `costo`) VALUES
(1, 'Denise Dresser', 'Es una reconocida académica, periodista, politóloga y escritora mexicana. Denise es columnista de la revista Proceso, editorialista del periódico Reforma, y participa en la edición semanal de Reporte Índigo con su sección Código Dreseer. Es especialista en ciencias políticas; profesora en el Instituto Tecnológico Autónomo de México (ITAM) donde ha impartido cursos de política comparada y política mexicana contemporánea desde 1991', '2014-05-09 17:30:00', 250),
(2, 'Beto Castillo', 'Licenciado en Ciencias de la Comunicación egresado del Tec de Monterrey donde se graduó con mención honorífica. Fue director para Disney Special Events Group donde escribió y dirigió varios eventos en Brasil, Puerto Rico, Panamá, Inglaterra y México.', '2014-05-09 11:30:00', 250),
(3, 'Carlos Oliver Llanera Trejo', 'Ing. Eléctrico con maestría en Administración de Negocios con enfoque en Finanzas. Trabajó para Cummins generation technologies desde el 2005 hasta finales del 2013. Pasando de ingeniero en manufactura hasta convertirse en lider en excelencia operativo. ', '2014-05-07 10:50:00', 250),
(4, 'L.O.S. Sueños', 'Son una asociación encargada de empoderar a los jóvenes de México a través de conferencias, talleres, foros y actividades sociales para que puedan realizar sus proyectos de vida. ', '2014-05-07 08:50:00', 250),
(5, 'L.O.S. Sueños', 'Son una asociación encargada de empoderar a los jóvenes de México a través de conferencias, talleres, foros y actividades sociales para que puedan realizar sus proyectos de vida. ', '2014-05-08 12:30:00', 250),
(6, 'L.O.S. Sueños', 'Son una asociación encargada de empoderar a los jóvenes de México a través de conferencias, talleres, foros y actividades sociales para que puedan realizar sus proyectos de vida. ', '2014-05-09 08:00:00', 250),
(7, 'Jonathan Heath', 'Tiene acumulado 30 años de experiencia en el análisis de la economía mexicana y sus perspectivas, tiempo durante el cual fue el Economista Principal de México para varias instituciones financieras globales y consultorías internacionales. Empezó su carrera profesional construyendo modelos macroeconométricos para el Gobierno Mexicano y Wharton Econometrics. ', '2014-05-07 15:50:00', 250),
(8, 'Alejandro Camino: Softtek ', 'Con más de 20 años de experiencia trabajando para proveedores de soluciones de TI, Alejandro Camino, ha dirigido el departamento de Marketing y Comunicación Global desde mayo del 2006. En su puesto actual es responsable del manejo de la comunicación corporativa a través de los Estados Unidos, Latinoamérica, Europa y Asia. ', '2014-05-08 16:20:00', 250),
(9, 'Fernando Botella', 'Consultor de Formación y desarrollo, y speaker profesional. Es Licenciado en Ciencias Biológicas por la Universidad de Valencia, Máster en Dirección y Administración de Empresas por ICADE y Coach Ejecutivo Diplomado por EEC (Escuela Europea de Coaching). ', '2014-02-25 18:00:00', 250);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
