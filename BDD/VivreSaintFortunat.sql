-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 13 déc. 2024 à 13:24
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `VivreSaintFortunat`
--

-- --------------------------------------------------------

--
-- Structure de la table `Adherent`
--

CREATE TABLE `Adherent` (
  `id_adherent` int NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type_adhesion` enum('Individuel','Famille','Mineur') NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Adherent`
--

INSERT INTO `Adherent` (`id_adherent`, `nom`, `prenom`, `email`, `type_adhesion`, `mot_de_passe`, `date_inscription`, `image`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'Individuel', 'motdepasse1', '2024-12-10 12:58:52', NULL),
(2, 'Durand', 'Marie', 'marie.durand@example.com', 'Individuel', 'motdepasse2', '2024-12-10 12:58:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `id_admin` int NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`id_admin`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'Admin', 'Principal', 'admin@example.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `Evenement`
--

CREATE TABLE `Evenement` (
  `id_evenement` int NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `date_evenement` date NOT NULL,
  `id_type` int NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Evenement`
--

INSERT INTO `Evenement` (`id_evenement`, `titre`, `description`, `lieu`, `date_evenement`, `id_type`, `date_ajout`, `image`) VALUES
(1, 'Festival de Musique', 'Un grand festival pour tous les amateurs de musique.', 'Lyon', '2024-12-15', 3, '2024-12-10 13:58:52', 'img-event1'),
(2, 'Randonnée Montagne', 'Une randonnée pour explorer les paysages de la région.', 'Grenoble', '2024-12-20', 4, '2024-12-10 13:58:52', 'img-event2'),
(3, 'Journée Culturelle', 'Un événement pour découvrir des œuvres locales.', 'Saint-Fortunat', '2024-12-10', 1, '2024-12-10 13:58:52', 'img-event3'),
(4, 'Visite Patrimoine', 'Découverte des monuments historiques de la région.', 'Clermont-Ferrand', '2024-12-18', 5, '2024-12-10 13:58:52', 'img-event4'),
(5, 'Atelier de Découverte', 'Atelier interactif pour petits et grands.', 'Annecy', '2024-12-12', 2, '2024-12-10 13:58:52', 'img-event5'),
(6, 'test', 'test', 'test', '2024-12-13', 1, '2024-12-13 11:23:26', 'testimage'),
(7, 'Sport', 'Sport', 'Sport', '2024-12-13', 6, '2024-12-13 11:56:09', 'Sport'),
(8, 'Sport', 'Sport', 'Sport', '2024-12-13', 6, '2024-12-13 14:15:37', 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `Participation`
--

CREATE TABLE `Participation` (
  `id_participation` int NOT NULL,
  `id_evenement` int NOT NULL,
  `id_adherent` int NOT NULL,
  `date_participation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Participation`
--

INSERT INTO `Participation` (`id_participation`, `id_evenement`, `id_adherent`, `date_participation`) VALUES
(1, 1, 1, '2024-12-10 13:58:52'),
(2, 2, 2, '2024-12-10 13:58:52'),
(3, 3, 1, '2024-12-10 13:58:52');

-- --------------------------------------------------------

--
-- Structure de la table `Preference`
--

CREATE TABLE `Preference` (
  `id_preference` int NOT NULL,
  `id_adherent` int NOT NULL,
  `id_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Preference`
--

INSERT INTO `Preference` (`id_preference`, `id_adherent`, `id_type`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 4),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `TypeEvenement`
--

CREATE TABLE `TypeEvenement` (
  `id_type` int NOT NULL,
  `nom_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `TypeEvenement`
--

INSERT INTO `TypeEvenement` (`id_type`, `nom_type`) VALUES
(1, 'Culture'),
(2, 'Découverte'),
(3, 'Musique'),
(4, 'Randonnée'),
(5, 'Patrimoine'),
(6, 'Sport');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Adherent`
--
ALTER TABLE `Adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `Participation`
--
ALTER TABLE `Participation`
  ADD PRIMARY KEY (`id_participation`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- Index pour la table `Preference`
--
ALTER TABLE `Preference`
  ADD PRIMARY KEY (`id_preference`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `TypeEvenement`
--
ALTER TABLE `TypeEvenement`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Adherent`
--
ALTER TABLE `Adherent`
  MODIFY `id_adherent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Evenement`
--
ALTER TABLE `Evenement`
  MODIFY `id_evenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Participation`
--
ALTER TABLE `Participation`
  MODIFY `id_participation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Preference`
--
ALTER TABLE `Preference`
  MODIFY `id_preference` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `TypeEvenement`
--
ALTER TABLE `TypeEvenement`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `TypeEvenement` (`id_type`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Participation`
--
ALTER TABLE `Participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `Evenement` (`id_evenement`) ON DELETE CASCADE,
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Preference`
--
ALTER TABLE `Preference`
  ADD CONSTRAINT `preference_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE CASCADE,
  ADD CONSTRAINT `preference_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `TypeEvenement` (`id_type`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
