-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Décembre 2017 à 10:33
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
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `NUMACTION` smallint(1) NOT NULL,
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMEROCOMMISSION` smallint(1) DEFAULT NULL,
  `LIBELLEACTION` char(32) DEFAULT NULL,
  `MONTANTACTION` int(2) DEFAULT NULL,
  `DATEACTION` date DEFAULT NULL,
  `DUREEACTION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMACTION`),
  KEY `I_FK_ACTION_AMIS` (`NUMAMIS`),
  KEY `I_FK_ACTION_COMMISSION` (`NUMEROCOMMISSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `MONTANTANNUEL` int(3) DEFAULT NULL,
  PRIMARY KEY (`NUMAMIS`),
  KEY `I_FK_AMIS_FONCTION` (`NUMFONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`NUMAMIS`, `NUMFONCTION`, `NOMAMIS`, `PRENOMAMIS`, `ADRESSERUEAMIS`, `ADRESSECOMPLEMENTAMIS`, `ADRESSEVILLEAMIS`, `CODEPOSTALAMIS`, `TELEPHONEAMIS`, `MAILAMIS`, `DATEENTREEAMIS`, `NUMPARRAIN1`, `NUMPARRAIN2`, `Login`, `MDP`, `MONTANTANNUEL`) VALUES
(1, 1, 'Arnaud', 'Florent', 'qqpart', 'qqpart', 'qqpart', '87000', '0215457898', 'Arnaud.florent@florent.com', '2017-11-16', NULL, NULL, '123', '456', NULL),
(2, 2, 'Fourgeaud', 'Killian', '2 rue vers labas', '', 'Icilabas', '54120', '0600000015', 'lalala@hotmail.fr', '2017-12-21', NULL, NULL, 'labas', 'ici', NULL),
(3, 3, 'MonsieurMoi', 'ToujoursMoi', '1 rue moimeme', NULL, 'MoimemeCity', '87549', '0684578458', 'Moimeme@hotmail.fr', '2017-12-11', NULL, NULL, 'moi', 'meme', NULL),
(4, 4, 'Larry', 'Scott', '4 rue du monsieur', NULL, 'Ls City', '63214', '0685214569', 'Ls@hotmail.fr', '2017-12-25', NULL, NULL, 'l', 's', NULL),
(5, 5, 'Snow', 'Man', '6 rue sakai', NULL, 'Sakaiville', '45682', '0512457458', 'Snowman@hotmail.fr', '2017-12-02', NULL, NULL, 'snow', 'man', NULL),
(6, 2, 'Dino', 'Saure', '8 rue dyalongtemps', NULL, 'Dinoville', '84521', '0921542587', 'Dinosaure@hotmail.fr', '2017-12-30', NULL, NULL, 'dino', 'saure', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bureau_commission`
--

CREATE TABLE IF NOT EXISTS `bureau_commission` (
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMEROCOMMISSION` smallint(1) NOT NULL,
  `NUMFONCTION` smallint(1) NOT NULL,
  PRIMARY KEY (`NUMAMIS`,`NUMEROCOMMISSION`),
  KEY `I_FK_BUREAU_COMMISSION_AMIS` (`NUMAMIS`),
  KEY `I_FK_BUREAU_COMMISSION_COMMISSION` (`NUMEROCOMMISSION`),
  KEY `I_FK_BUREAU_COMMISSION_FONCTION` (`NUMFONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `NUMEROCOMMISSION` smallint(1) NOT NULL,
  `LIBELLECOMMISSION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMEROCOMMISSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `NUMFONCTION` smallint(1) NOT NULL AUTO_INCREMENT,
  `NOMFONCTION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMFONCTION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`NUMFONCTION`, `NOMFONCTION`) VALUES
(1, 'Secrétaire'),
(2, 'Secrétaire-Adjoint'),
(3, 'Trésorier'),
(4, 'Trésorier-Adjoint'),
(5, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE IF NOT EXISTS `inviter` (
  `NUMREPAS` smallint(1) NOT NULL,
  `NUMAMIS` smallint(2) NOT NULL,
  `NOMBREPERSONNES` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`NUMREPAS`,`NUMAMIS`),
  KEY `I_FK_INVITER_REPAS` (`NUMREPAS`),
  KEY `I_FK_INVITER_AMIS` (`NUMAMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `NUM_PARAMETRE` smallint(1) NOT NULL,
  `MONTANTCOTISATION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_PARAMETRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMACTION` smallint(1) NOT NULL,
  PRIMARY KEY (`NUMAMIS`,`NUMACTION`),
  KEY `I_FK_PARTICIPER_AMIS` (`NUMAMIS`),
  KEY `I_FK_PARTICIPER_ACTION` (`NUMACTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE IF NOT EXISTS `repas` (
  `NUMREPAS` smallint(1) NOT NULL,
  `HEUREREPAS` time DEFAULT NULL,
  `DATEREPAS` date DEFAULT NULL,
  `PRIXREPAS` int(2) DEFAULT NULL,
  `NBRPLACESREPAS` smallint(1) DEFAULT NULL,
  `LIEUREPAS` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUMREPAS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
