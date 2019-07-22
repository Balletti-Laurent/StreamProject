-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 06 Mars 2019 à 11:39
-- Version du serveur :  5.7.25-0ubuntu0.18.10.2
-- Version de PHP :  7.2.15-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `streamProject`
--

-- --------------------------------------------------------

--
-- Structure de la table `103article`
--

CREATE TABLE `103article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `dateannoncement` date NOT NULL,
  `id_103useraccount` int(11) NOT NULL,
  `id_103department` int(11) NOT NULL,
  `id_103typeofstream` int(11) NOT NULL,
  `id_103typeofgame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `103commentary`
--

CREATE TABLE `103commentary` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `id_103article` int(11) NOT NULL,
  `id_103useraccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `103department`
--

CREATE TABLE `103department` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `103department`
--

INSERT INTO `103department` (`id`, `title`) VALUES
(1, 'Ain'),
(2, 'Aisne'),
(3, 'Allier'),
(4, 'Alpes-de-Haute-Provence'),
(5, 'Hautes-Alpes'),
(6, 'Alpes-Maritimes'),
(7, 'Ardèche'),
(8, 'Ardennes'),
(9, 'Ariège'),
(10, 'Aube'),
(11, 'Aude'),
(12, 'Aveyron'),
(13, 'Bouches-du-Rhône'),
(14, 'Calvados'),
(15, 'Cantal'),
(16, 'Charente'),
(17, 'Charente-Maritime'),
(18, 'Cher'),
(19, 'Corrèze'),
(20, 'Corse-du-Sud'),
(21, 'Haute-Corse'),
(22, 'Côte-d\'Or'),
(23, 'Côtes-d\'Armor'),
(24, 'Creuse'),
(25, 'Dordogne'),
(26, 'Doubs'),
(27, 'Drôme'),
(28, 'Eure'),
(29, 'Eure-et-Loir'),
(30, 'Finistère'),
(31, 'Gard'),
(32, 'Haute-Garonne'),
(33, 'Gers'),
(34, 'Gironde'),
(35, 'Hérault'),
(36, 'Ille-et-Vilaine'),
(37, 'Indre'),
(38, 'Indre-et-Loire'),
(39, 'Isère'),
(40, 'Jura'),
(41, 'Landes'),
(42, 'Loir-et-Cher'),
(43, 'Loire'),
(44, 'Haute-Loire'),
(45, 'Loire-Atlantique'),
(46, 'Loiret'),
(47, 'Lot'),
(48, 'Lot-et-Garonne'),
(49, 'Lozère'),
(50, 'Maine-et-Loire'),
(51, 'Manche'),
(52, 'Marne'),
(53, 'Haute-Marne'),
(54, 'Mayenne'),
(55, 'Meurthe-et-Moselle'),
(56, 'Meuse'),
(57, 'Morbihan'),
(58, 'Moselle'),
(59, 'Nièvre'),
(60, 'Nord'),
(61, 'Oise'),
(62, 'Orne'),
(63, 'Pas-de-Calais'),
(64, 'Puy-de-Dôme'),
(65, 'Pyrénées-Atlantiques'),
(66, 'Hautes-Pyrénées'),
(67, 'Pyrénées-Orientales'),
(68, 'Bas-Rhin'),
(69, 'Haut-Rhin'),
(70, 'Rhône'),
(71, 'Haute-Saône'),
(72, 'Saône-et-Loire'),
(73, 'Sarthe'),
(74, 'Savoie'),
(75, 'Haute-Savoie'),
(76, 'Paris'),
(77, 'Seine-Maritime'),
(78, 'Seine-et-Marne'),
(79, 'Yvelines'),
(80, 'Deux-Sèvres'),
(81, 'Somme'),
(82, 'Tarn'),
(83, 'Tarn-et-Garonne'),
(84, 'Var'),
(85, 'Vaucluse'),
(86, 'Vendée'),
(87, 'Vienne'),
(88, 'Haute-Vienne'),
(89, 'Vosges'),
(90, 'Yonne'),
(91, 'Territoire de Belfort'),
(92, 'Essonne'),
(93, 'Hauts-de-Seine'),
(94, 'Seine-Saint-Denis'),
(95, 'Val-de-Marne'),
(96, 'Val-d\'Oise'),
(97, 'Guadeloupe'),
(98, 'Martinique'),
(99, 'Guyane'),
(100, 'La Réunion'),
(101, 'Mayotte');

-- --------------------------------------------------------

--
-- Structure de la table `103role`
--

CREATE TABLE `103role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `103role`
--

INSERT INTO `103role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `103typeofgame`
--

CREATE TABLE `103typeofgame` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `103typeofgame`
--

INSERT INTO `103typeofgame` (`id`, `type`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'MMO'),
(4, 'Stratégie'),
(5, 'Réflexion'),
(6, 'Sport'),
(7, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `103typeofstream`
--

CREATE TABLE `103typeofstream` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `103typeofstream`
--

INSERT INTO `103typeofstream` (`id`, `title`) VALUES
(1, 'Caritatif'),
(2, 'Evenement'),
(3, 'Jouer en équipe'),
(4, 'Multi stream'),
(5, 'Jouer sur un serveur de jeu');

-- --------------------------------------------------------

--
-- Structure de la table `103useraccount`
--

CREATE TABLE `103useraccount` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `streamadress` varchar(50) NOT NULL,
  `id_103role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `103article`
--
ALTER TABLE `103article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `103article_103department0_FK` (`id_103department`),
  ADD KEY `103article_103typeofstream1_FK` (`id_103typeofstream`),
  ADD KEY `103article_103typeofgame2_FK` (`id_103typeofgame`),
  ADD KEY `103article_103useraccount_FK` (`id_103useraccount`);

--
-- Index pour la table `103commentary`
--
ALTER TABLE `103commentary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `103commentary_103article_FK` (`id_103article`),
  ADD KEY `103commentary_103useraccount0_FK` (`id_103useraccount`);

--
-- Index pour la table `103department`
--
ALTER TABLE `103department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `103role`
--
ALTER TABLE `103role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `103typeofgame`
--
ALTER TABLE `103typeofgame`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `103typeofstream`
--
ALTER TABLE `103typeofstream`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `103useraccount`
--
ALTER TABLE `103useraccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `103useraccount_103role_FK` (`id_103role`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `103article`
--
ALTER TABLE `103article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `103commentary`
--
ALTER TABLE `103commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `103department`
--
ALTER TABLE `103department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `103role`
--
ALTER TABLE `103role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `103typeofgame`
--
ALTER TABLE `103typeofgame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `103typeofstream`
--
ALTER TABLE `103typeofstream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `103useraccount`
--
ALTER TABLE `103useraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `103article`
--
ALTER TABLE `103article`
  ADD CONSTRAINT `103article_103department0_FK` FOREIGN KEY (`id_103department`) REFERENCES `103department` (`id`),
  ADD CONSTRAINT `103article_103typeofgame2_FK` FOREIGN KEY (`id_103typeofgame`) REFERENCES `103typeofgame` (`id`),
  ADD CONSTRAINT `103article_103typeofstream1_FK` FOREIGN KEY (`id_103typeofstream`) REFERENCES `103typeofstream` (`id`),
  ADD CONSTRAINT `103article_103useraccount_FK` FOREIGN KEY (`id_103useraccount`) REFERENCES `103useraccount` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `103commentary`
--
ALTER TABLE `103commentary`
  ADD CONSTRAINT `103commentary_103article_FK` FOREIGN KEY (`id_103article`) REFERENCES `103article` (`id`),
  ADD CONSTRAINT `103commentary_103useraccount0_FK` FOREIGN KEY (`id_103useraccount`) REFERENCES `103useraccount` (`id`);

--
-- Contraintes pour la table `103useraccount`
--
ALTER TABLE `103useraccount`
  ADD CONSTRAINT `103useraccount_103role_FK` FOREIGN KEY (`id_103role`) REFERENCES `103role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
