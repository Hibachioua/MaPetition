-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 mars 2025 à 16:23
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `petition`
--

-- --------------------------------------------------------

--
-- Structure de la table `petition`
--

CREATE TABLE `petition` (
  `IDP` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `DatePublic` datetime DEFAULT NULL,
  `DateFinP` date NOT NULL,
  `PorteurP` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `petition`
--

INSERT INTO `petition` (`IDP`, `Titre`, `Description`, `DatePublic`, `DateFinP`, `PorteurP`, `Email`) VALUES
(1, 'Soutien à la protection des forêts', 'Cette pétition vise à protéger nos forêts menacées par la déforestation.', '2025-03-01 00:00:00', '2025-06-01', 'Association Verte', 'contact@associationverte.org'),
(2, 'Pour une éducation gratuite pour tous', 'Nous demandons un accès à l’éducation gratuite et de qualité pour tous les enfants.', '2025-03-05 09:00:00', '2025-09-01', 'Coalition pour l’éducation', 'coalition@education.org'),
(3, 'Lutte contre le changement climatique', 'Nous exigeons des actions concrètes pour lutter contre le changement climatique.', '2025-03-10 15:30:00', '2025-12-01', 'Eco-Activistes', 'info@ecoactivistes.org'),
(4, 'Droits des animaux', 'Signez pour mettre fin aux abus envers les animaux dans notre pays.', '2025-03-12 11:45:00', '2025-07-15', 'Amis des Animaux', 'contact@amisdesanimaux.org'),
(5, 'Accès à l’eau potable', 'Chaque personne a le droit d’avoir accès à l’eau potable.', '2025-03-15 08:00:00', '2025-08-01', 'Water for All', 'info@waterforall.org');

-- --------------------------------------------------------

--
-- Structure de la table `signature`
--

CREATE TABLE `signature` (
  `IDS` int(11) NOT NULL,
  `IDP` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Pays` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signature`
--

INSERT INTO `signature` (`IDS`, `IDP`, `Nom`, `Prenom`, `Pays`, `Date`, `Heure`, `Email`) VALUES
(1, 1, 'Barhrouj', 'Saad', 'Maroc', '2025-03-12', '10:00:00', 'saad.barhrouj@example.com'),
(2, 2, 'Ahmimes', 'Nada', 'France', '2025-03-12', '10:15:00', 'nada.ahmimes@example.com'),
(3, 3, 'Chioua', 'Hiba', 'Belgique', '2025-03-12', '10:30:00', 'hiba.chioua@example.com'),
(4, 4, 'Iabakriman', 'Kaoutar', 'Canada', '2025-03-12', '10:45:00', 'kaoutar.iabakriman@example.com'),
(5, 5, 'Khalis', 'Hicham', 'Suisse', '2025-03-12', '11:00:00', 'hicham.khalis@example.com'),
(6, 1, 'Ela Kadaoui', 'Nassim', 'Maroc', '2025-03-12', '11:15:00', 'nassim.elakadaoui@example.com'),
(7, 5, 'barhrouj', 'saad', 'maroc', '2025-03-12', '16:03:00', 'saad@ami.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `petition`
--
ALTER TABLE `petition`
  ADD PRIMARY KEY (`IDP`);

--
-- Index pour la table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`IDS`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `IDP` (`IDP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `petition`
--
ALTER TABLE `petition`
  MODIFY `IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `signature`
--
ALTER TABLE `signature`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `signature_ibfk_1` FOREIGN KEY (`IDP`) REFERENCES `petition` (`IDP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
