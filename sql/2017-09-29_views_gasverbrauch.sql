-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 29. Sep 2017 um 13:27
-- Server-Version: 5.7.19-0ubuntu0.16.04.1-log
-- PHP-Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tobi`
--

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_verbrauch_jahr`
--
DROP VIEW IF EXISTS `v_verbrauch_jahr`;
CREATE TABLE `v_verbrauch_jahr` (
`jahr` int(4)
,`verbrauch` decimal(15,4)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_verbrauch_monat`
--
DROP VIEW IF EXISTS `v_verbrauch_monat`;
CREATE TABLE `v_verbrauch_monat` (
`jahr` int(4)
,`monat` int(2)
,`verbrauch` decimal(15,4)
);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `v_verbrauch_tag`
--
DROP VIEW IF EXISTS `v_verbrauch_tag`;
CREATE TABLE `v_verbrauch_tag` (
`jahr` int(4)
,`monat` int(2)
,`tag` int(2)
,`wochentag` varchar(9)
,`verbrauch` decimal(15,4)
);

-- --------------------------------------------------------

--
-- Struktur des Views `v_verbrauch_jahr`
--
DROP TABLE IF EXISTS `v_verbrauch_jahr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_verbrauch_jahr`  AS  select year(`gas`.`datum`) AS `jahr`,(max((`gas`.`zaehlerstand` / 10)) - min((`gas`.`zaehlerstand` / 10))) AS `verbrauch` from `gas` group by year(`gas`.`datum`) order by year(`gas`.`datum`) ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_verbrauch_monat`
--
DROP TABLE IF EXISTS `v_verbrauch_monat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_verbrauch_monat`  AS  select year(`gas`.`datum`) AS `jahr`,month(`gas`.`datum`) AS `monat`,(max((`gas`.`zaehlerstand` / 10)) - min((`gas`.`zaehlerstand` / 10))) AS `verbrauch` from `gas` group by year(`gas`.`datum`),month(`gas`.`datum`) order by year(`gas`.`datum`) ;

-- --------------------------------------------------------

--
-- Struktur des Views `v_verbrauch_tag`
--
DROP TABLE IF EXISTS `v_verbrauch_tag`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_verbrauch_tag`  AS  select year(`gas`.`datum`) AS `jahr`,month(`gas`.`datum`) AS `monat`,dayofmonth(`gas`.`datum`) AS `tag`,dayname(`gas`.`datum`) AS `wochentag`,(max((`gas`.`zaehlerstand` / 10)) - min((`gas`.`zaehlerstand` / 10))) AS `verbrauch` from `gas` group by year(`gas`.`datum`),month(`gas`.`datum`),dayofmonth(`gas`.`datum`),dayname(`gas`.`datum`) order by year(`gas`.`datum`) ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
