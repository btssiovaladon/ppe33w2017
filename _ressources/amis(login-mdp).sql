-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Novembre 2017 à 11:12
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppeamis`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMFONCTION` smallint(1) DEFAULT NULL,
  `NOMAMIS` char(32) DEFAULT NULL,
  `PRENOMAMIS` char(32) DEFAULT NULL,
  `ADRESSERUEAMIS` char(32) DEFAULT NULL,
  `ADRESSECOMPLEMENTAMIS` char(32) DEFAULT NULL,
  `ADRESSEVILLEAMIS` char(32) DEFAULT NULL,
  `CODEPOSTALAMIS` char(32) DEFAULT NULL,
  `TELEPHONEAMIS` char(10) DEFAULT NULL,
  `MAILAMIS` char(32) DEFAULT NULL,
  `DATEENTREEAMIS` date DEFAULT NULL,
  `NUMPARRAIN1` smallint(2) DEFAULT NULL,
  `NUMPARRAIN2` smallint(2) DEFAULT NULL,
  `Login` varchar(30) DEFAULT NULL,
  `MDP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`NUMAMIS`),
  KEY `I_FK_AMIS_FONCTION` (`NUMFONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`NUMAMIS`, `NUMFONCTION`, `NOMAMIS`, `PRENOMAMIS`, `ADRESSERUEAMIS`, `ADRESSECOMPLEMENTAMIS`, `ADRESSEVILLEAMIS`, `CODEPOSTALAMIS`, `TELEPHONEAMIS`, `MAILAMIS`, `DATEENTREEAMIS`, `NUMPARRAIN1`, `NUMPARRAIN2`, `Login`, `MDP`) VALUES
(1, 1, 'Arnaud', 'Florent', 'qqpart', 'qqpart', 'qqpart', '87000', '0215457898', 'Arnaud.florent@florent.com', '2017-11-16', NULL, NULL, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
