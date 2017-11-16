-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 16 nov. 2017 à 08:52
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppeamis`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `NUMACTION` smallint(1) NOT NULL,
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMEROCOMMISSION` smallint(1) DEFAULT NULL,
  `LIBELLEACTION` char(32) DEFAULT NULL,
  `MONTANTACTION` int(2) DEFAULT NULL,
  `DATEACTION` date DEFAULT NULL,
  `DUREEACTION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
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
  `NUMPARRAIN2` smallint(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `amis`
--

INSERT INTO `amis` (`NUMAMIS`, `NUMFONCTION`, `NOMAMIS`, `PRENOMAMIS`, `ADRESSERUEAMIS`, `ADRESSECOMPLEMENTAMIS`, `ADRESSEVILLEAMIS`, `CODEPOSTALAMIS`, `TELEPHONEAMIS`, `MAILAMIS`, `DATEENTREEAMIS`, `NUMPARRAIN1`, `NUMPARRAIN2`) VALUES
(1, 1, 'Arnaud', 'Florent', 'qqpart', 'qqpart', 'qqpart', '87000', '0215457898', 'Arnaud.florent@florent.com', '2017-11-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bureau_commission`
--

CREATE TABLE `bureau_commission` (
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMEROCOMMISSION` smallint(1) NOT NULL,
  `NUMFONCTION` smallint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE `commission` (
  `NUMEROCOMMISSION` smallint(1) NOT NULL,
  `LIBELLECOMMISSION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `NUMFONCTION` smallint(1) NOT NULL,
  `NOMFONCTION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE `inviter` (
  `NUMREPAS` smallint(1) NOT NULL,
  `NUMAMIS` smallint(2) NOT NULL,
  `NOMBREPERSONNES` smallint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `NUM_PARAMETRE` smallint(1) NOT NULL,
  `MONTANTCOTISATION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------



--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `NUMAMIS` smallint(2) NOT NULL,
  `NUMACTION` smallint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE `repas` (
  `NUMREPAS` smallint(1) NOT NULL,
  `HEUREREPAS` time DEFAULT NULL,
  `DATEREPAS` date DEFAULT NULL,
  `PRIXREPAS` int(2) DEFAULT NULL,
  `NBRPLACESREPAS` smallint(1) DEFAULT NULL,
  `LIEUREPAS` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`NUMACTION`),
  ADD KEY `I_FK_ACTION_AMIS` (`NUMAMIS`),
  ADD KEY `I_FK_ACTION_COMMISSION` (`NUMEROCOMMISSION`);

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`NUMAMIS`),
  ADD KEY `I_FK_AMIS_FONCTION` (`NUMFONCTION`);

--
-- Index pour la table `bureau_commission`
--
ALTER TABLE `bureau_commission`
  ADD PRIMARY KEY (`NUMAMIS`,`NUMEROCOMMISSION`),
  ADD KEY `I_FK_BUREAU_COMMISSION_AMIS` (`NUMAMIS`),
  ADD KEY `I_FK_BUREAU_COMMISSION_COMMISSION` (`NUMEROCOMMISSION`),
  ADD KEY `I_FK_BUREAU_COMMISSION_FONCTION` (`NUMFONCTION`);

--
-- Index pour la table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`NUMEROCOMMISSION`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`NUMFONCTION`);

--
-- Index pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD PRIMARY KEY (`NUMREPAS`,`NUMAMIS`),
  ADD KEY `I_FK_INVITER_REPAS` (`NUMREPAS`),
  ADD KEY `I_FK_INVITER_AMIS` (`NUMAMIS`);

--
-- Index pour la table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`NUM_PARAMETRE`);



--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`NUMAMIS`,`NUMACTION`),
  ADD KEY `I_FK_PARTICIPER_AMIS` (`NUMAMIS`),
  ADD KEY `I_FK_PARTICIPER_ACTION` (`NUMACTION`);

--
-- Index pour la table `repas`
--
ALTER TABLE `repas`
  ADD PRIMARY KEY (`NUMREPAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
