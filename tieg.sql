-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 juin 2022 à 21:44
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tieg`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande_medicament`
--

DROP TABLE IF EXISTS `commande_medicament`;
CREATE TABLE IF NOT EXISTS `commande_medicament` (
  `id_medica` int NOT NULL,
  `id_fournisseur` int NOT NULL,
  KEY `medica` (`id_medica`),
  KEY `id_fornisseur` (`id_fournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `famile`
--

DROP TABLE IF EXISTS `famile`;
CREATE TABLE IF NOT EXISTS `famile` (
  `id_famile` int NOT NULL,
  `famile` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_famile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `famile`
--

INSERT INTO `famile` (`id_famile`, `famile`) VALUES
(1, 'Antidiabétique,biguanide'),
(3, 'Insuline humaine analogue à action rapide'),
(2, 'Anxiolytique');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adresse` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` int NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `prenom`, `adresse`, `tel`) VALUES
(10, 'mosawi', 'mostafa', 'dakhla', 675643542),
(11, 'dahnini', 'rachid', 'asfi', 645436576),
(3, 'brahimi', 'fatima', 'agadir', 643561671),
(8, 'MORADI', 'KHLID', 'AGADIR', 634562552),
(12, 'kitas', 'ayoub', 'taza', 654345678);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `id_medica` int NOT NULL AUTO_INCREMENT,
  `Terme` varchar(155) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_EX` date NOT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prixUnit` int NOT NULL,
  `Quantite` int NOT NULL,
  `id_type` int NOT NULL,
  `id_famile` int NOT NULL,
  PRIMARY KEY (`id_medica`),
  KEY `type_medica` (`id_type`),
  KEY `id_famile` (`id_famile`)
) ENGINE=MyISAM AUTO_INCREMENT=4554 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id_medica`, `Terme`, `date_EX`, `details`, `prixUnit`, `Quantite`, `id_type`, `id_famile`) VALUES
(4527, 'metformine win 100,comprimé', '2024-06-05', 'PRESENTATION: Boit de 30 \r\ncomprimés sécables \r\nCOMPOSITION: Metformine', 20, 96, 1, 1),
(4528, 'lorazepam pharma 1 mg ,comprimé', '2023-06-19', 'PRESENTATION : Boite de 30', 15, 83, 1, 2),
(4529, 'alprazolam win 0.5 mg,comprimé sécable', '2025-06-02', 'PRESENTATION : Boite de 30COMPOSITION : alprazolam', 31, 295, 1, 2),
(4530, 'APIDRA AOO U :ml,solution injectable', '2026-06-25', 'PRESENTATION :boit de 1 cartouche de 3 ml\r\nCOMPOSITION: Insuline Glulisine', 99, 188, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'Medicament des adultes'),
(2, 'Medicament des jeunes'),
(3, 'Medicament des Bebes'),
(4, 'Medicament des adultes et jeunes');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL,
  `login` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id_vente` int NOT NULL AUTO_INCREMENT,
  `id_medica` int NOT NULL,
  `Quantite_vendue` int NOT NULL,
  `prixTotal` int NOT NULL,
  PRIMARY KEY (`id_medica`,`id_vente`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_vente`, `id_medica`, `Quantite_vendue`, `prixTotal`) VALUES
(3, 4527, 1, 0),
(2, 4527, 2, 0),
(1, 4527, 3, 0),
(3, 4528, 1, 0),
(2, 4528, 2, 0),
(1, 4528, 3, 0),
(2, 4530, 1, 0),
(1, 4530, 2, 0),
(3, 4529, 1, 0),
(2, 4529, 2, 0),
(1, 4529, 3, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
