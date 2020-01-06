-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: rfy2.sql.free.fr
-- Généré le : Sam 16 Avril 2016 à 03:48
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `rfy2`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_tortues_couleurs`
--

CREATE TABLE IF NOT EXISTS `table_tortues_couleurs` (
  `id` int(4) NOT NULL auto_increment,
  `couleur` varchar(50) collate utf8_unicode_ci NOT NULL,
  `code_hexa` varchar(6) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `couleur` (`couleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `table_tortues_couleurs`
--

INSERT INTO `table_tortues_couleurs` (`id`, `couleur`, `code_hexa`) VALUES
(1, 'Acajou', '88421D'),
(2, 'Ambre', 'F0C300'),
(3, 'Anthracite', '303030'),
(4, 'Argent', 'CECECE'),
(5, 'Argile', 'EFEFEF'),
(6, 'Beige', 'C8AD7F'),
(7, 'Blanc', 'FFFFFF'),
(8, 'Blanc cassé', 'FEFEE2'),
(9, 'Bleu', '0080FF'),
(10, 'Bois', 'DEB887'),
(11, 'Bordeaux', '6D071A'),
(12, 'Brillant', 'FFFFFF'),
(13, 'Brique', '842E1B'),
(14, 'Bronze', '614E1A'),
(15, 'Brun', '5B3C11'),
(16, 'Cérusé', 'FEFEFE'),
(17, 'Chêne', 'D5B54F'),
(18, 'Cognac', 'BB6144'),
(19, 'Crème', 'FDF1B8'),
(20, 'Cuivre', 'B36700'),
(21, 'Diamant', 'CEE4E6'),
(22, 'Doré', 'FFD700'),
(23, 'Écru', 'FEFEE0'),
(24, 'Fer', '7F7F7F'),
(25, 'Fuchsia', 'FD3F92'),
(26, 'Grenat', '6E0B14'),
(27, 'Gris', '606060'),
(28, 'Ivoire', 'FFFFD4'),
(29, 'Jaunâtre', 'E5E200'),
(30, 'Kraft', 'D5B59C'),
(31, 'Jaune', 'FFFF00'),
(32, 'Kaki', '94812B'),
(33, 'Laiton', 'CEBD75'),
(34, 'Lilas', 'B666D2'),
(35, 'Marine', '03224C'),
(36, 'Marron', '582900'),
(37, 'Mauve', 'D473D4'),
(38, 'Moutarde', 'C7CF00'),
(39, 'Multicolore', ''),
(40, 'Nacre', 'FBF4E2'),
(41, 'Noir', '000000'),
(42, 'Ocre', 'DFAF2C'),
(43, 'Opale', '66CCCC'),
(44, 'Opaque', '4E4E4E'),
(45, 'Or', 'FFD700'),
(46, 'Orange', 'FF7F00'),
(47, 'Paille', 'FEE347'),
(48, 'Palissandre', '863f44'),
(49, 'Rose', 'FD6C9E'),
(50, 'Rosâtre', 'ED8DBD'),
(51, 'Rouge', 'FF0000'),
(52, 'Rouille', '985717'),
(53, 'Roux', 'AD4F09'),
(54, 'Saumon', 'F88E55'),
(55, 'Terre', '8A3324'),
(56, 'Turquoise', '25FDE9'),
(57, 'Transparent', ''),
(58, 'Vert', '008020'),
(59, 'Verdâtre', '01A798'),
(60, 'Violet', '7F00FF');
