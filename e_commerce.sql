-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 sep. 2021 à 14:25
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID` bigint(20) NOT NULL,
  `NOM` text NOT NULL,
  `PRENOM` text NOT NULL,
  `MAIL` char(32) NOT NULL,
  `ADRESSE` text NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID`, `NOM`, `PRENOM`, `MAIL`, `ADRESSE`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 'Faneva', 'Ima', 'test@gmail.com', 'Antanarivo', '2021-09-23 12:02:53', '2021-09-23 12:02:53');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `ID` bigint(20) NOT NULL,
  `PRODUIT_ID` bigint(20) NOT NULL,
  `CLIENT_ID` bigint(20) NOT NULL,
  `STATUS_PANNIER` tinyint(4) NOT NULL,
  `QUANTITER` int(11) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`ID`, `PRODUIT_ID`, `CLIENT_ID`, `STATUS_PANNIER`, `QUANTITER`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 2, 1, 1, 2, '2021-09-23 12:02:53', '2021-09-23 12:17:56');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID` bigint(20) NOT NULL,
  `TITRE` text NOT NULL,
  `PRIX` text NOT NULL,
  `QTE` bigint(20) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `IMAGE` char(32) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ID`, `TITRE`, `PRIX`, `QTE`, `DESCRIPTION`, `IMAGE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Gouty', '500', 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda sapiente atque quasi. Est quas enim velit tenetur necessitatibus eligendi libero odit ea sint eos. Explicabo omnis nulla earum amet!', 'couverture/1632398314.jpg', '2021-09-23 11:55:26', '2021-09-23 11:58:34'),
(2, 'Salto', '500', 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda sapiente atque quasi. Est quas enim velit tenetur necessitatibus eligendi libero odit ea sint eos. Explicabo omnis nulla earum amet!', 'couverture/1632398325.jpg', '2021-09-23 11:56:32', '2021-09-23 12:17:56'),
(3, 'Bolo', '200', 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda sapiente atque quasi. Est quas enim velit tenetur necessitatibus eligendi libero odit ea sint eos. Explicabo omnis nulla earum amet!', 'couverture/1632398294.jpg', '2021-09-23 11:57:10', '2021-09-23 11:58:14'),
(4, 'Siligoma', '100', 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo assumenda sapiente atque quasi. Est quas enim velit tenetur necessitatibus eligendi libero odit ea sint eos. Explicabo omnis nulla earum amet!', 'couverture/1632398280.jpg', '2021-09-23 11:58:00', '2021-09-23 11:58:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `NOM` varchar(128) NOT NULL,
  `PRENOM` text NOT NULL,
  `MAIL` char(32) NOT NULL,
  `MDP` text NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `NOM`, `PRENOM`, `MAIL`, `MDP`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'admin', 'root', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', '2021-09-23 11:52:44', '2021-09-23 11:52:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `I_FK_COMMANDES_PRODUITS` (`PRODUIT_ID`),
  ADD KEY `I_FK_COMMANDES_CLIENTS` (`CLIENT_ID`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_COMMANDES_CLIENTS` FOREIGN KEY (`CLIENT_ID`) REFERENCES `clients` (`ID`),
  ADD CONSTRAINT `FK_COMMANDES_PRODUITS` FOREIGN KEY (`PRODUIT_ID`) REFERENCES `produits` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
