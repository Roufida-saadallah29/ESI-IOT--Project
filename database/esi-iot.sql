-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 mars 2023 à 01:16
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esi-iot`
--

-- --------------------------------------------------------

--
-- Structure de la table `possible`
--

CREATE TABLE `possible` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `possible`
--

INSERT INTO `possible` (`id`, `nom`, `image`) VALUES
(1, 'arduino mega', 'arduino mega.jpg'),
(3, 'arduino uno', 'arduino uno.jpg'),
(4, 'Arduino-Nano', 'Arduino-Nano.jpg'),
(5, 'dht 11 humidity_temp sensor', 'dht 11 humidity_temp sensor.jpg'),
(6, 'gas sensors', 'gas sensors.jpg'),
(7, 'hc 05 bluethooth sensor', 'hc 05 bluethooth sensor.jpg'),
(8, 'hc sr04', 'hc sr04.jpg'),
(9, 'heart monitoring sensor', 'heart monitoring sensor.jpg'),
(10, 'stm32-blue-pill', 'stm32-blue-pill.jpg'),
(11, 'soil moisture sensor', 'soil moisture sensor.jpg'),
(12, 'max4466-electret-microphone-module-1465-60-B', 'max4466-electret-microphone-module-1465-60-B.jpg'),
(13, 'raspberry pi 4 model B', 'raspberry pi 4 model B.jpg'),
(14, 'raspberry pi pico', 'raspberry pi pico.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateAchat` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `dateAchat`, `etat`, `quantite`, `image`, `categorie`) VALUES
(10, 'hc 05 bluethooth sensor', '2023-01-04', 'Disponible', 22, 'hc 05 bluethooth sensor.jpg', 'Sensors'),
(11, 'heart monitoring sensor', '2023-01-10', 'Disponible', 28, 'heart monitoring sensor.jpg', 'Sensors'),
(13, 'raspberry pi pico', '2023-01-11', 'Disponible', 60, 'raspberry pi pico.jpg', 'Data Processing'),
(14, 'gas sensors', '2023-01-11', 'Disponible', 20, 'gas sensors.jpg', 'Sensors');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `possible`
--
ALTER TABLE `possible`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `possible`
--
ALTER TABLE `possible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
