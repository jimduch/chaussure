-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mars 2021 à 09:10
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chausseur`
--

-- --------------------------------------------------------

--
-- Structure de la table `chaussure`
--

CREATE TABLE `chaussure` (
  `id` int(11) NOT NULL,
  `modele` varchar(40) NOT NULL,
  `prix` smallint(4) NOT NULL,
  `pointure` smallint(4) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chaussure`
--

INSERT INTO `chaussure` (`id`, `modele`, `prix`, `pointure`, `description`) VALUES
(1, 'charentaise', 35, 45, 'pantoufle confortable          \r\n'),
(2, 'ranger', 135, 44, 'chaussure militaire          \r\n'),
(3, 'dr martens', 120, 43, 'chaussure de securité          \r\n'),
(4, 'nike air max', 125, 43, 'basket confortable          \r\n'),
(5, 'pantoufle de verre', 95, 35, 'chaussure de cendrillon          \r\n'),
(6, 'bottine', 50, 45, '          special pluie\r\n');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chaussure`
--
ALTER TABLE `chaussure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chaussure`
--
ALTER TABLE `chaussure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
