-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 juil. 2024 à 17:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_clients`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE `archives` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `statut` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `archives`
--

INSERT INTO `archives` (`id`, `nom`, `email`, `numero`, `statut`) VALUES
(28, 'Mira SISSOKO', 'mira@gmail.com', '58899664', 'Client'),
(29, 'Aissa DIOUF', 'aissa@gmail.com', '589663', 'Client'),
(30, 'Tina MARIKO', 'tintin@gmail.com', '78996221', 'Client'),
(31, 'Fadima  Tall', 'fadima@gmail.com', '6584863', 'Admin'),
(27, 'Mira SISSOKO', 'mira@gmail.com', '58899664', 'Client'),
(30, 'Amina DIAW', 'aminadiaw@gmail.com', '78962422', 'Admin'),
(33, 'Fatima N\'DIAYE', 'fatima@gmail.com', '78523669', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `statut` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `email`, `adresse`, `numero`, `sexe`, `statut`) VALUES
(15, 'Mbenda FALL', 'mbenda@gmail.com', 'hlm', '89624233', 'Féminin', 'Actif'),
(16, 'modou Fall', 'modou@gmail.com', 'hlm', '55598882', 'Masculin', 'Actif'),
(17, 'Hadja Balde', 'hadja@gmail.com', 'Mermoz', '555632', 'Féminin', 'Actif'),
(18, 'Marie N\'DIAYE', 'marie@gmail.com', 'Liberté 2', '47898962', 'Féminin', 'Inactif'),
(19, 'Mbayang DIOP', 'mbayang@gmail.com', 'sc3', '7885222', 'Féminin', 'Actif'),
(20, 'Abou DIAO', 'abou@gmail.com', 'Liberté 2', '88601563', 'Masculin', 'Inactif'),
(21, 'Mariam Dia', 'mariam@gmail.com', 'LIZ', '78962163', 'Féminin', 'Inactif'),
(22, 'Fatoumata Sylla', 'fatou@gmail.com', 'Mermoz', '788993025', 'Féminin', 'Inactif'),
(23, 'Balla BEYE', 'balla@gmail.com', 'sc3', '895522369', 'Masculin', 'Actif'),
(24, 'Matina TALL', 'matina@gmail.com', 'Mermoz', '458696321', 'Féminin', 'Inactif'),
(25, 'Amadou BEYE', 'amadou@gmail.com', 'Liberté 2', '59663244', 'Masculin', 'Inactif'),
(26, 'Abou TALL', 'aboutall@gmail.com', 'sc6', '85489962', 'Masculin', 'Actif'),
(31, 'Tina MARIKO', 'tintin@gmail.com', 'Liberté 6', '78996221', 'Féminin', 'Actif'),
(32, 'Aminata TRAORE', 'aminatatraore@gmail.com', 'Liberté 2', '7896521566', 'Féminin', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `statut` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `numero`, `pwd`, `statut`) VALUES
(26, 'Ndeye Faniang', 'Wade', 'faniang@gmail.com', '78256663', '$2y$10$pL9JqF0tMMQmidvmrjgGYO4VigSpNMU7lugm56CKr5Lf9BkLYiSoK', 'super admin'),
(27, 'Mouhammadane', 'MBOUP', 'mouhammadane@gmail.com', '785251623', '$2y$10$PqeHqhO.bohyHBQEbto77Oh9AZ3lWWpMVKVbdN/J0.UQ536Kp.z/.', 'super admin'),
(28, 'Rokhaya', 'SECK', 'rokhaya@gmail.com', '87415154', '$2y$10$fAUMnXy0s4SHB7SONUnQNuTY.To/Z1FL8dAKqJ6HEspjzqHqBkWKG', 'admin'),
(29, 'Salima', 'N\'DIAYE', 'salimandiaye@gmail.com', '6584863', '$2y$10$InDkScBHJalziOfTnQFoKeb5Rv78alMZOUtc1pnRCsEOaqYyeAbBu', 'super admin'),
(32, 'Amina', 'DIAW', 'aminadiaw@gmail.com', '57896123', '$2y$10$lojNxcq/4YHv3Bn4KpmbkePVNyNHWAcoL3OP8xOWaU5vsbReSgyFy', 'super admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
