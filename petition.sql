-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 08 mars 2025 à 22:06
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
  `DatePublic` date NOT NULL,
  `DateFinP` date NOT NULL,
  `PorteurP` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `petition`
--

INSERT INTO `petition` (`IDP`, `Titre`, `Description`, `DatePublic`, `DateFinP`, `PorteurP`, `Email`) VALUES
(1, 'Protection de l\'environnement', 'Pétition pour la protection des espaces verts dans notre ville', '2023-01-15', '2023-12-31', 'Jean Dupont', 'jean.dupont@email.com'),
(2, 'Amélioration des transports publics', 'Pétition pour l\'amélioration de la fréquence des bus dans la région', '2023-02-10', '2023-11-30', 'Marie Martin', 'marie.martin@email.com'),
(3, 'Construction d\'une nouvelle école', 'Pétition pour la construction d\'une nouvelle école primaire dans le quartier', '2023-03-05', '2023-10-15', 'Pierre Richard', 'pierre.richard@email.com');

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
(1, 1, 'barhrouj', 'saad', 'France', '2023-01-20', '10:30:00', 'saad@email.com'),
(2, 1, 'chioua', 'hiba', 'Belgique', '2023-01-22', '14:15:00', 'hiba@email.com'),
(3, 2, 'ahmimes', 'nada', 'France', '2023-02-15', '09:45:00', 'nada@email.com'),
(4, 3, 'alachhab', 'alachhab', 'Suisse', '2023-03-10', '16:20:00', 'alachhab@email.com');

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
  ADD UNIQUE KEY `IDP` (`IDP`,`IDS`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `petition`
--
ALTER TABLE `petition`
  MODIFY `IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `signature`
--
ALTER TABLE `signature`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
