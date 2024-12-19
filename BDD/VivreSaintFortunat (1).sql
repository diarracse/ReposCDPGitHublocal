-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 19 déc. 2024 à 21:07
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

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
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type_adhesion` enum('Individuel','Famille','Mineur') NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Adherent`
--

INSERT INTO `Adherent` (`id_adherent`, `nom`, `prenom`, `email`, `type_adhesion`, `mot_de_passe`, `date_inscription`, `image`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'Individuel', 'motdepasse1', '2024-12-10 13:58:52', NULL),
(2, 'Durand', 'Marie', 'marie.durand@example.com', 'Individuel', 'motdepasse2', '2024-12-10 13:58:52', NULL),
(4, 'Lemine', 'Sophie', 'sophie.lemine@example.com', 'Mineur', 'motdepasse4', '2024-12-16 12:58:52', NULL),
(5, 'Gavine', 'Paul', 'paul.gavine@example.com', 'Individuel', 'motdepasse5', '2024-12-16 12:58:52', NULL),
(6, 'Ferrier', 'Jean-Christophe', 'jeanchrist.ferrier@example.com', 'Individuel', 'motdepasse6', '2024-12-16 12:58:52', NULL),
(7, 'Perrier', 'Capucine', 'capucine.perrier@example.com', 'Individuel', 'motdepasse7', '2024-12-16 19:51:02', NULL),
(8, 'Allirol', 'Marc', 'marc.allirol@example.com', 'Mineur', 'motdepasse8', '2024-12-16 18:28:32', NULL),
(10, 'trigon', 'pablo', 'pablotrigon@gmail.com', 'Individuel', '$2y$10$Pk/Tza1REhSZlNxhxd04jutXbCun2jtgoaXmpE.I1Y4Qv.131PCmu', '2024-12-16 21:32:37', NULL),
(12, 'testttt', 'testtt', 'testttt@yettt.com', 'Mineur', '$2y$10$sFl3X.FG4a2quE9ikhNVS.3rryE1WtpJlJcQVOzSDfaWRmdq/qOhG', '2024-12-16 21:39:22', NULL),
(13, 'testttttt', 'testttttt', 'tetstttt@gmail.com', 'Famille', '$2y$10$/obsgTEERuXMyrRf1WdzR.9TOYV3S7tdHs307XPqJRFaS.kWY.VKm', '2024-12-16 21:40:47', NULL),
(14, 'tetsttttt', 'txvvdgg', 'gyvfch@gmail.com', 'Mineur', '$2y$10$RVRw3qKXK/AD2Awm0tMvCe0TLOIsZf3pn7GjYp0U4gJVIS7SyTk/e', '2024-12-16 21:42:31', NULL),
(15, 'aaaaaa', 'aaaaaa', 'aaaaa@gmail.com', 'Mineur', '$2y$10$V/lez7GrzTYNiJfuJyHs6.16vcG.kt4jah5pZMFqLuQL7Bw6T98iC', '2024-12-16 21:44:49', NULL),
(16, 'Maia', 'Doryan', 'dpoododo@pamap.com', 'Individuel', '$2y$10$Y/7sHGdcuym1KtU/pxX1k.0ulFpQFTs273Pv3vJX1N4gzVVsTP4Oi', '2024-12-18 17:16:20', NULL),
(17, 'jerome', 'martin', 'afafafaf@moa.ocm', 'Famille', '$2y$10$w7wNrLhks57exqDZOsL9m.9SA9.FpoCMmzF6iCWEq0z3JXx4kAKSy', '2024-12-18 17:49:12', NULL),
(18, 'Maia', 'Doryan', 'doryan.maia@gmail.com', 'Individuel', '$2y$10$ksJOZwS.m.5bZpwPqO6ln.L7O0y8xaNXOlya7IBBMwCXUxaiXYTOO', '2024-12-19 10:28:31', NULL),
(19, 'pablo', 'escobar', 'a@z.com', 'Famille', '$2y$10$IvCF6DQUZsm93.R/a6xpy.FsB/uthCk7rvGQSJ1zoe9tRWOSjLb6q', '2024-12-19 11:47:05', NULL),
(20, 'jean', 'pierre', 'jean@gmail.com', 'Individuel', '$2y$10$S5W5d8pfs82VVc.A0WLJq.AfxEDfbY.BbmcG7wLbtMSg5y9wvBGRi', '2024-12-19 12:08:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`id_admin`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'Admin', 'Principal', 'admin@example.com', '$2y$10$sZyMzfYlcRnw4HgIMtXUrOkTYfLdzGbhzxCVZgu.Eyot32/W/Mxia');

-- --------------------------------------------------------

--
-- Structure de la table `Evenement`
--

CREATE TABLE `Evenement` (
  `id_evenement` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `date_evenement` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Evenement`
--

INSERT INTO `Evenement` (`id_evenement`, `titre`, `description`, `lieu`, `date_evenement`, `id_type`, `date_ajout`, `image`) VALUES
(1, 'Le Horizon Vibes Festival', 'Le Horizon Vibes Festival est un événement musical incontournable qui se déroule chaque été dans un cadre naturel exceptionnel, entre montagnes verdoyantes et lac cristallin. Pendant trois jours, ce festival mêle harmonieusement électro, pop, rock et folk, en accueillant des artistes internationaux et des talents émergents sur plusieurs scènes en plein air. Conçu comme une expérience immersive, il propose des installations artistiques, des espaces de détente écoresponsables et des animations interactives, créant une atmosphère festive et conviviale où musique, nature et innovation se rencontrent pour offrir des souvenirs inoubliables aux festivaliers.', 'Lyon', '2024-12-22', 3, '2024-12-10 13:58:52', 'img-event1.jpg'),
(2, 'Randonnée de la Bastille', 'La randonnée des Crêtes de la Bastille à Grenoble est une escapade incontournable pour les amoureux de nature et de panoramas époustouflants. Nichée au cœur des Alpes, cette balade offre un parcours varié qui mêle sentiers boisés, falaises impressionnantes et vues spectaculaires sur la ville et les massifs environnants, comme la Chartreuse et le Vercors. Accessible en téléphérique depuis le centre-ville ou à pied pour les plus sportifs, cette randonnée est idéale pour une journée de déconnexion en pleine nature. Tout au long du chemin, des espaces de pique-nique et des panneaux d’information permettent de découvrir la faune, la flore et l’histoire de ce site emblématique, offrant ainsi une expérience enrichissante pour tous les niveaux de randonneurs.', 'Grenoble', '2024-12-20', 4, '2024-12-10 13:58:52', 'img-event2.jpg'),
(3, 'Journée Culturelle', 'Une journée culturelle à Saint-Fortunat est une immersion dans l’histoire et le charme d’un village au riche patrimoine, niché au cœur de la campagne. En flânant dans ses ruelles pavées bordées de maisons en pierre, vous découvrirez des trésors architecturaux comme son église romane du XIIe siècle, magnifiquement préservée, et ses fontaines pittoresques. Les amateurs d’art apprécieront les galeries locales et les ateliers d’artisans, où tradition et créativité se rencontrent. Des visites guidées et des expositions ponctuelles enrichissent l’expérience, permettant de plonger dans l’histoire de ce lieu empreint d’authenticité. Entre culture et détente, Saint-Fortunat offre une escapade inoubliable pour les curieux en quête de découvertes et de sérénité.', 'Saint-Fortunat', '2024-12-25', 1, '2024-12-10 13:58:52', 'img-event3.jpg'),
(4, 'Visite Patrimoine', 'Une visite du patrimoine de Clermont-Ferrand est un voyage fascinant à travers l’histoire et l’architecture unique de cette ville volcanique. Dominée par la majestueuse cathédrale gothique en pierre de lave noire, la ville dévoile un mélange harmonieux de monuments anciens et de quartiers animés. En arpentant la place de Jaude ou les ruelles du centre historique, vous découvrirez des trésors tels que la basilique romane Notre-Dame-du-Port, classée au patrimoine mondial de l’UNESCO, et les hôtels particuliers du XVIIe siècle. Les musées, comme le musée Bargoin ou le musée d’Art Roger-Quilliot, enrichissent cette escapade culturelle. Entre patrimoine, gastronomie locale et ambiance chaleureuse, Clermont-Ferrand séduit par son authenticité et son dynamisme.', 'Clermont-Ferrand', '2024-12-18', 5, '2024-12-10 13:58:52', 'img-event4.jpg'),
(5, 'Atelier de Découverte', 'Un atelier découverte à Annecy est une expérience enrichissante qui allie créativité, partage et exploration dans un cadre enchanteur. Qu’il s’agisse d’un atelier culinaire autour des spécialités savoyardes, d’une initiation à la peinture inspirée par les paysages du lac ou d’une session de poterie artisanale, chaque activité vous plonge dans l’univers authentique et artistique de la région. Guidés par des experts passionnés, les participants apprennent des techniques uniques tout en s’immergeant dans l’ambiance conviviale d’Annecy. L’atelier est souvent ponctué de moments d’échanges, avec une vue imprenable sur le lac ou les montagnes, rendant cette expérience aussi inspirante que mémorable.', 'Annecy', '2024-12-12', 2, '2024-12-10 13:58:52', 'img-event5.jpg'),
(7, 'Sport à Saint-Fortunat', 'Un événement sportif à Saint-Fortunat est une occasion unique de combiner effort, convivialité et immersion dans un cadre naturel exceptionnel. Que ce soit une course à pied à travers les sentiers vallonnés, un tournoi de pétanque sur la place du village ou une randonnée collective, chaque activité met en valeur la beauté de ce lieu préservé. Organisé dans une ambiance chaleureuse, l’événement rassemble sportifs amateurs et confirmés, ainsi que les habitants, pour partager des moments de dépassement de soi et de plaisir. Des stands de produits locaux et des animations familiales complètent la journée, offrant une expérience sportive et festive qui laisse des souvenirs impérissables.', 'Sport', '2024-12-13', 6, '2024-12-13 11:56:09', 'img-event6.jpg'),
(11, 'Festival des Légendes d’Auvergne', 'Le Festival des Légendes d’Auvergne invite petits et grands à plonger dans l’univers enchanteur des contes et mythes locaux, à travers des spectacles, des ateliers interactifs et des expositions. Au programme : des récits captivants racontés par des conteurs de renom, des ateliers de fabrication de marionnettes et de masques inspirés des créatures fantastiques auvergnates, et des projections de films autour des légendes du Massif Central. Des artisans locaux présentent également leurs créations, mêlant tradition et imaginaire, dans un marché artisanal unique. Une expérience culturelle immersive qui ravive l’héritage oral et artistique de la région.', 'Château de Murol', '2025-06-14', 1, '2024-12-19 19:49:07', 'cha-Ateau-murol.jpg'),
(23, 'Rencontres Artistiques du Puy de Lumière', 'Les Rencontres Artistiques du Puy de Lumière célèbrent la création contemporaine dans un décor naturel et patrimonial unique. Installations lumineuses, performances de danse et concerts acoustiques transforment les abords du Puy de Dôme en une scène artistique éphémère. Des ateliers de photographie nocturne et des conférences sur le lien entre art et nature enrichissent cette expérience hors du commun. La soirée se clôture chaque jour par un spectacle sons et lumières projeté sur le volcan endormi, offrant un hommage visuel à la richesse culturelle et naturelle de l’Auvergne.', 'Puy de Dôme', '2025-08-09', 1, '2024-12-19 20:03:56', 'la-cathe-Adrale-Puy-lumiere.jpg'),
(24, 'Explor’Volcan', 'Explor’Volcan est une immersion fascinante au cœur des mystères volcaniques de l’Auvergne. Cet événement propose des randonnées guidées sur les flancs des volcans endormis, des ateliers interactifs pour comprendre la formation des cratères et des projections en plein air de documentaires captivants sur l’histoire géologique de la région. Les participants peuvent également s’initier à la géologie en manipulant des échantillons de roches volcaniques et en réalisant des expériences scientifiques adaptées à tous les âges. Une opportunité unique d’apprendre tout en s’émerveillant devant les paysages spectaculaires du Massif Central.', 'Vulcania, Saint-Ours-les-Roches', '2025-06-21', 2, '2024-12-19 20:13:06', 'vulcania-partez-en-exploration.jpg'),
(25, 'Voyage au Cœur des Saveurs d’Auvergne', 'Voyage au Cœur des Saveurs d’Auvergne est une invitation à découvrir les trésors gastronomiques et les savoir-faire ancestraux de la région. Ce parcours sensoriel propose des ateliers de dégustation, des démonstrations de fabrication de fromages et de charcuteries, ainsi que des visites de fermes locales. Les visiteurs peuvent participer à des jeux interactifs sur l’histoire des produits emblématiques de l’Auvergne et repartir avec leurs propres créations, comme du beurre fait maison ou des confitures artisanales. Le tout se déroule dans une ambiance conviviale, entre marchés gourmands et animations musicales traditionnelles.', 'Parc des Volcans d’Auvergne, Orcival', '2025-07-07', 2, '2024-12-19 20:17:06', 'auvergne-puy-de-dome-massif-du-sancy-p.soissons-aura-tourisme.1600px.jpg'),
(26, 'Symphonies sous les Étoiles', 'Symphonies sous les Étoiles est une expérience musicale unique, où la magie de la musique classique se mêle à la beauté du ciel étoilé de l’Auvergne. Chaque soirée débute par un concert en plein air, mettant en vedette des orchestres et des solistes renommés, dans un cadre naturel enchanteur. Les spectateurs, confortablement installés sur des plaids ou des transats, peuvent ensuite profiter d’une séance d’observation astronomique guidée, en écoutant des morceaux inspirés par l’univers et les étoiles. Une harmonie parfaite entre art et nature, qui ravit les mélomanes et les rêveurs.', 'Plateau de Gergovie', '2024-10-05', 3, '2024-12-19 20:21:47', 'clap-swing-jazz-et-tsigane-petit-concert-explique-pour-les-493707.jpg'),
(27, 'Festival Auvergne Électro Fusion', 'Le Festival Auvergne Électro Fusion célèbre la musique électronique et ses multiples influences dans un décor spectaculaire. Pendant deux jours, des DJs et des producteurs internationaux se succèdent sur plusieurs scènes, proposant des sets mêlant électro, techno, et musiques traditionnelles revisitées. Des ateliers d’initiation à la création musicale et des espaces immersifs avec des installations lumineuses interactives permettent au public de vivre une expérience sensorielle totale. Le festival met également en avant des artistes locaux, offrant une vitrine à la scène musicale émergente de la région.', 'Base de loisirs du Lac Chambon', '2025-08-09', 3, '2024-12-19 20:24:39', 'festival-electro-auvergne.jpg'),
(28, 'Randonnée Nocturne des Volcans', 'La Randonnée Nocturne des Volcans est une aventure unique qui permet aux participants de découvrir les paysages spectaculaires de l’Auvergne sous un angle inédit. Après le coucher du soleil, les randonneurs partent pour une balade guidée à la lueur des lampes frontales, explorant les cratères, les lacs volcaniques et les forêts sombres. En chemin, des pauses permettent d’écouter des histoires sur la géologie locale et la faune nocturne, tandis que le ciel étoilé offre un spectacle à couper le souffle. Une expérience à la fois sportive et mystique, idéale pour les amoureux de la nature en quête d’aventure.', 'Puy de Dôme', '2025-07-04', 4, '2024-12-19 20:26:47', 'rando-volcan.jpg'),
(29, 'Les Sentiers du Patrimoine en Auvergne', 'Les Sentiers du Patrimoine en Auvergne proposent une série de randonnées guidées à travers les villages pittoresques et les sites historiques de la région. Chaque parcours permet de découvrir des lieux emblématiques, tels que des églises romanes, des châteaux médiévaux et des villages de caractère, tout en profitant des paysages vallonnés des Monts du Cantal et du Livradois-Forez. Des guides passionnés partagent l’histoire locale, l’architecture et les traditions, rendant chaque étape de la randonnée à la fois une découverte culturelle et un plaisir visuel.', 'Monts du Cantal', '2025-06-21', 4, '2024-12-19 20:28:55', 'gr400-tour-du-volcan-cantalien-credit-RIEGER-Bertrand-HEMIS.jpg'),
(30, 'Défi Nature des Gorges de l’Ardèche', 'Le Défi Nature des Gorges de l’Ardèche est une compétition sportive combinant trail, kayak et escalade dans un cadre naturel d’exception. Les participants traversent les sentiers escarpés, pagayent sur les eaux limpides de la rivière et gravissent les falaises emblématiques des gorges. Cet événement est ouvert aux sportifs confirmés comme aux amateurs, avec des parcours adaptés à tous les niveaux. En parallèle, des initiations gratuites aux sports de plein air sont proposées pour les spectateurs. Une journée sportive et conviviale au cœur d’un paysage à couper le souffle.', 'Vallon-Pont-d’Arc', '2024-06-15', 6, '2024-12-19 20:36:19', 'a-m.dupont-adt07-pont-d-arc-bateliers-janv-2027-2-1-.jpg'),
(31, 'Trail des Cévennes Ardéchoises', 'Le Trail des Cévennes Ardéchoises propose un défi sportif unique à travers les paysages sauvages et authentiques de l’Ardèche. Les coureurs empruntent des sentiers qui serpentent entre villages de caractère, châtaigneraies et sommets offrant des vues panoramiques sur les Cévennes. Plusieurs distances sont proposées, du parcours découverte au trail longue distance, pour permettre à chacun de vivre cette aventure à son rythme. L’événement se termine par une fête conviviale avec des produits locaux, récompensant l’effort dans une ambiance chaleureuse et festive.', 'Les Vans', '2024-07-06', 6, '2024-12-19 20:38:43', 'ce-Avenne-ardeche.jpeg'),
(32, 'Les Journées Médiévales de l’Ardèche', 'Les Journées Médiévales de l’Ardèche plongent les visiteurs dans l’histoire fascinante de la région, avec des reconstitutions, des animations et des découvertes interactives. Organisé dans un village médiéval, cet événement propose des visites guidées de châteaux, des démonstrations de métiers d’époque, des spectacles de chevalerie et des marchés d’artisans. Les visiteurs peuvent également participer à des ateliers pour apprendre à manier l’épée, tirer à l’arc ou confectionner des objets médiévaux. Une expérience immersive et festive qui ravive le patrimoine historique de l’Ardèche.', 'Balazuc', '2025-01-25', 5, '2024-12-19 20:40:44', 'ardeche-medievale.jpg'),
(42, 'Festival des Métiers Ancestraux de l’Auvergne', 'Le Festival des Métiers Ancestraux de l’Auvergne est une célébration vivante du patrimoine artisanal et des savoir-faire traditionnels. Tout au long de l’événement, des artisans locaux démontrent leurs techniques ancestrales : de la fabrication de la laine au tissage, en passant par la forge et la poterie. Les visiteurs peuvent participer à des ateliers, essayer eux-mêmes ces métiers d’autrefois et en apprendre davantage sur l’histoire de ces pratiques. Des visites guidées permettent également de découvrir les anciennes fermes et moulins de la région, offrant une perspective unique sur le patrimoine rural de l’Auvergne.', 'Saint-Nectaire', '2024-10-07', 5, '2024-12-19 21:42:07', 'metier-ancestrale-auvergne.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Participation`
--

CREATE TABLE `Participation` (
  `id_participation` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL,
  `date_participation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Participation`
--

INSERT INTO `Participation` (`id_participation`, `id_evenement`, `id_adherent`, `date_participation`) VALUES
(1, 1, 1, '2024-12-10 13:58:52'),
(2, 2, 2, '2024-12-10 13:58:52'),
(3, 3, 1, '2024-12-10 13:58:52'),
(4, 3, 20, '2024-12-19 17:47:38'),
(5, 42, 20, '2024-12-19 21:56:53'),
(6, 4, 20, '2024-12-19 21:56:59');

-- --------------------------------------------------------

--
-- Structure de la table `Preference`
--

CREATE TABLE `Preference` (
  `id_preference` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Evenement`
--
ALTER TABLE `Evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `Participation`
--
ALTER TABLE `Participation`
  MODIFY `id_participation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Preference`
--
ALTER TABLE `Preference`
  MODIFY `id_preference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `TypeEvenement`
--
ALTER TABLE `TypeEvenement`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
