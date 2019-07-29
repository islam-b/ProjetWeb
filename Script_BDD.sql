-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 17 jan. 2019 à 22:32
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--
CREATE DATABASE IF NOT EXISTS `tdw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tdw`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ecole` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_reponse_to` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_comment`),
  KEY `commentaire_ibfk_2` (`id_user`),
  KEY `commentaire_ibfk_3` (`id_ecole`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `id_user`, `id_ecole`, `comment`, `date`, `is_reponse_to`) VALUES
(18, 9, 18, 'Une trés bonne ecole', '2019-01-16 14:53:42', 0),
(19, 11, 19, 'Cette ecole d\'electronique est super', '2019-01-16 16:06:20', 0),
(20, 9, 20, 'les etudiants de l\'esi ont un bon niveau', '2019-01-16 16:07:21', 0),
(21, 11, 20, 'This is a comment', '2019-01-16 16:23:42', 0),
(22, 12, 20, 'oui c vrai', '2019-01-16 16:24:22', 20),
(23, 11, 20, 'nouveau', '2019-01-16 16:38:38', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) CHARACTER SET armscii8 NOT NULL,
  `type` varchar(256) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `wilaya` varchar(256) NOT NULL,
  `commune` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `telephone` varchar(256) NOT NULL,
  `en_ligne` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_ecole`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id_ecole`, `nom`, `type`, `categorie`, `wilaya`, `commune`, `adresse`, `telephone`, `en_ligne`) VALUES
(18, 'Ecole Superieure de Commerce', 'univ', 'Commerce et finance', 'Oran', 'Es-Senia', '50 Rue des martyrs', '031 56 25 70', 1),
(19, 'Ecole Superieure d Electronique', 'univ', 'Electronique', 'Boumerdes', 'Boumerdes-centre', '3500 Rue de la liberte', '035 56 25 70', 1),
(20, 'Ecole Supeerieure d Informatique', 'univ', 'Informatique', 'Alger', 'Oued Smar', '68 rue de la gare.', '023 56 25 70', 1),
(21, 'Ecole Supeerieure d Agronomie', 'univ', 'Agronomie', 'Oued', 'Djamaa', '30 Rue des dunes', '026 56 25 70', 1),
(22, 'Ecole Supeerieure Veeteerinaire', 'univ', 'Veeternaire', 'Tizi-ouzou', 'Freha', '10 Rue des oliviers.', '025 56 25 70', 1),
(23, 'Institue Superieure de commerce.', 'univ', 'Commerce et finance', 'Bejaia', 'Akbou', '20 Rue de la montagne.', '032 56 25 70', 1),
(24, 'Institue d hootellerie et restauration', 'prof', 'Hootellerie', 'Tizi-Ouzou.', 'Es-Senia', '50 Rue des martyrs.', '021 56 25 78', 1),
(25, 'Institue des metiers de plomberie et chauffage', 'prof', 'Plomberie', 'Setif', 'El-Eulma', '50 Rue de la liberte.', '021 56 25 78', 1),
(26, 'Institue de mecanique', 'prof', 'Mecanique', 'Blida', 'Soumaa', ' 50 Rue de la gare.', '021 56 25 70', 1),
(27, 'Institue d hygiene et se?curite', 'prof', ' Commerce et finance', 'Alger', 'Alger', '50 Rue des dunes.', '021 56 25 70', 1),
(28, 'Ecole El-Falah', 'second', '', 'Mostaganem', 'Mostaganem', '50 Rue de la liberte.', '021 56 25 70', 1),
(29, 'Mostaganem', 'second', '', 'Constantine', 'Ibn-Badis', '50 Rue des martyrs.', '021 56 25 70', 1),
(30, 'Ecole Madrassati', 'moy', '', 'Alger', 'Hussein-Dey', '50 Rue de la gare.', '021 56 25 70', 1),
(31, 'Ecole El-Nadjah', 'moy', '', 'Constantine', 'Ibn-Badis', '50 Rue des oliviers.', '021 56 25 70', 1),
(32, 'Ecole El-Nadjihine', 'pri', '', 'Bouira', 'Lakhdaria', ' 50 Rue des dunes.', '021 56 25 70', 1),
(33, 'Ecole Madrassati', 'pri', '', 'Alger', 'Hussein-Dey', '50 Rue des oliviers.', '021 56 25 70', 1),
(34, 'Ecole Les Poussins', 'mat', '', 'Ecole Les Poussins', 'Dar-El-Beida', '50 Rue de la liberte?.', '021 56 25 70', 1),
(35, 'Ecole Madrassati', 'mat', '', 'Alger', 'Hussein-Dey.', '50 Rue des martyrs.', '021 56 25 70', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `nom_formation` varchar(100) DEFAULT NULL,
  `id_ecole` int(11) NOT NULL,
  PRIMARY KEY (`id_formation`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `id_type`, `nom_formation`, `id_ecole`) VALUES
(2, 3, 'Microsoft Word', 20),
(8, 7, 'Adobe PS', 20),
(9, 3, 'Office Excel', 20),
(11, 7, 'After effects', 20),
(12, 8, 'PHP', 20),
(13, 9, 'Cours de base electricite', 19),
(14, 9, 'Electricite avance', 19),
(15, 10, 'ELECF', 19);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `primaryColor` varchar(10) NOT NULL,
  `secondaryColor` varchar(10) NOT NULL,
  `textColor` varchar(10) NOT NULL,
  `font` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `titre`, `primaryColor`, `secondaryColor`, `textColor`, `font`) VALUES
(1, 'fantasy', '#e1f4fd', '#042f75', '#517906', 'Calibri'),
(11, 'Calibri', '#e2f9d5', '#165622', '#000000', 'Times New Roman');

-- --------------------------------------------------------

--
-- Structure de la table `types_formation`
--

DROP TABLE IF EXISTS `types_formation`;
CREATE TABLE IF NOT EXISTS `types_formation` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(100) NOT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `prixHT` int(11) NOT NULL,
  `taxe` int(11) DEFAULT NULL,
  `id_ecole` int(11) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types_formation`
--

INSERT INTO `types_formation` (`id_type`, `nom_type`, `volume`, `prixHT`, `taxe`, `id_ecole`) VALUES
(3, 'Bureautique', '50 heures', 18500, 17, 20),
(7, 'Infographie', '70 heures', 19000, 17, 20),
(8, 'Developpement', '50', 23000, 18, 20),
(9, 'Electricite', '40', 15000, 18, 19),
(10, 'Electonics', '90', 21000, 19, 19);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `is_employee` int(11) NOT NULL DEFAULT '0',
  `Role` varchar(30) NOT NULL DEFAULT 'Utilisateur',
  `allow_comment` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nom`, `prenom`, `is_employee`, `Role`, `allow_comment`) VALUES
(9, 'islam', 'windows10', 'BOUAYACHE', 'Mohamed islam', 18, 'Administrateur', 1),
(11, 'admin', 'admin', 'Administrateur', 'Administrateur', 0, 'Administrateur', 1),
(12, 'mossab', 'mossab', 'DJERADI', 'Moussab', 20, 'Employee', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
