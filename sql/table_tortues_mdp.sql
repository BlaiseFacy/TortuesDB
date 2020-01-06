-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: rfy2.sql.free.fr
-- Généré le : Dim 05 Janvier 2020 à 22:00
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `rfy2`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_tortues_mdp`
--

CREATE TABLE IF NOT EXISTS `table_tortues_mdp` (
  `intitule` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `usage` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `table_tortues_mdp`
--

INSERT INTO `table_tortues_mdp` (`intitule`, `mot_de_passe`, `usage`) VALUES
('codeprix', 'mdp', 'http://rfy2.free.fr?codeprix=mdp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
