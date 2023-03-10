-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 mars 2023 à 15:53
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `identifiant` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`identifiant`, `mdp`) VALUES
('admin', '$2y$10$USxGWY2hWVfJidVLPw.VM.BhY0fT5rlRsJKSIRWo5CWJKpDgCjr4i');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `IDAVIS` smallint(6) NOT NULL,
  `TITRE` char(62) NOT NULL,
  `SPE` char(1) DEFAULT '0',
  `PARAG1` varchar(2400) NOT NULL,
  `PARAG2` varchar(2400) NOT NULL,
  `PARAG3` varchar(2400) NOT NULL,
  `BORNEINF` int(11) DEFAULT 0,
  `BORNESUP` int(11) DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`IDAVIS`, `TITRE`, `SPE`, `PARAG1`, `PARAG2`, `PARAG3`, `BORNEINF`, `BORNESUP`) VALUES
(1, 'Totally d?v', '1', 'Un.e vrai SLAMiste. \r\nInventez votre petit monde en c#, tout en ?tant, attirer par le Python qui sommeille au fond de votre disque dur. ', 'Vous danseriez tout aussi bien sur un air de Java pour d?velopper votre site web. Vous pourriez passer des nuits ? coder et ne compter pas vos heures pour d?busquer le bug, le moindre indice et le temps glisse sur vous.\r\n En ?quipe, c?est toujours plus agile. ', 'Votre patience est l?gendaire derri?re votre ?cran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l?informatique : le commerce, la gestion des emplois du temps,? \r\nFace ? des utilisateurs un peu hackers ou pas d?gourdis, vous pouvez ?tre perfectionniste pour ?viter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveaut?s qui pourraient am?liorer votre pratique.\r\n', 20, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

CREATE TABLE `origine` (
  `IDORIGINE` smallint(6) NOT NULL,
  `NOM` char(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `origine`
--

INSERT INTO `origine` (`IDORIGINE`, `NOM`) VALUES
(1, 'G NSI'),
(2, 'STI2DSIN'),
(3, 'STI2DNONSIN'),
(4, 'G MATHS'),
(5, 'STMG'),
(6, 'PROSNRISC'),
(7, 'PROSAUTRE'),
(8, 'PROSNNONRISC'),
(9, 'RECURRENTIUT'),
(10, 'RECURRENTAUTRE'),
(11, 'AUTRE');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `IDQUESTION` smallint(6) NOT NULL,
  `LIBELLE` varchar(1200) NOT NULL,
  `ENJEU` varchar(1200) NOT NULL,
  `IDTYPEQUESTION` int(11) DEFAULT NULL,
  `IDSCOREFERMEE` int(11) DEFAULT NULL,
  `IDSCORECH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`IDQUESTION`, `LIBELLE`, `ENJEU`, `IDTYPEQUESTION`, `IDSCOREFERMEE`, `IDSCORECH`) VALUES
(1, 'Supportez-vous de \"perdre\" du temps ? r?soudre des erreurs', 'mise en jambe', 1, 2, 1),
(2, 'A quel point ?tes-vous ? l\"aise avec les Syst?mes d\"exploitation', 'Approche', 2, 1, 2),
(3, 'D?pannez-vous souvent les probl?mes informatiques de votre famille', 'Approche', 1, 3, 1),
(4, 'Avez-vous d?j? fouin? dans votre PC', 'Approche', 1, 2, NULL),
(5, 'A quel point aimez-vous personnaliser vos projets/r?alisations', 'entamereflexion', 2, 1, 3),
(6, 'A quel point ?tes-vous perfectionniste', 'entamereflexion', 2, 1, 4),
(7, 'A quel point êtes-vous d’une nature patiente ?', 'entamereflexion', 2, 1, 2),
(8, 'Vous ne crachez pas sur le salaire de Dave le dev ?', 'entamereflexion', 1, 4, 1),
(9, 'Try hardeur ?', 'entamereflexion', 1, 5, 1),
(10, 'A quel point supportez-vous d\'être dans l\'urgence ?', 'entamereflexion', 2, 1, 5),
(11, 'Au travail, vous voudriez rester derrière votre ordinateur ?', 'entamereflexion', 1, 2, 1),
(12, 'Vous préférez l’autonomie ?', 'entamereflexion', 1, 6, 1),
(13, 'Vous aimez avoir des privilèges (n\'est-ce pas ? sisi vous aimez ça) ?', 'entamereflexion', 1, 7, 1),
(14, 'Vous aimez travailler en équipe ?', 'entamereflexion', 1, 8, 1),
(15, 'Au travail, vous voudriez vous déplacer plutôt qu’intervenir à distance ?', 'entamereflexion', 1, 3, 1),
(16, 'Plutôt dieu du monde que vous créez et voyez évoluer ?', 'entamereflexion', 2, 1, 3),
(17, 'Vous voulez être celui à qui on demande conseil ?', 'entamereflexion', 1, 3, 1),
(18, 'Partisan du moindre effort ?', 'entamereflexion', 1, 5, 1),
(19, 'Le pouvoir vous attire ?', 'entamereflexion', 1, 3, 1),
(20, 'Vous vous énervez facilement ?', 'entamereflexion', 1, 9, 1),
(21, 'Vous suivez l\'actualité informatique ?', 'entamereflexion', 1, 10, 1),
(22, 'Vous souhaitez marquer votre passage sur le net ?', 'entamereflexion', 1, 4, 1),
(23, 'Vous aimez résoudre des énigmes à la recherche des indices ?', 'entamereflexion', 1, 4, 1),
(24, 'Branleur ?', 'entamereflexion', 1, 5, 1),
(25, 'Vous êtes maniaque ?', 'entamereflexion', 1, 2, 1),
(26, 'Vous adorez être indispensable ?', 'entamereflexion', 1, 11, 1),
(27, 'Gardez-vous facilement votre motivation face à l\'échec ?', 'entamereflexion', 1, 12, 1),
(28, 'Avez-vous déjà ouvert un CMD ?', 'entamereflexion', 1, 11, 1),
(29, 'Vous acceptez d’avoir toujours quelque chose à apprendre ?', 'entamereflexion', 1, 13, 1),
(30, 'Vous n’êtes pas que curieux du numérique ? D’autres domaines peuvent vous intéresser professionnellement ?', 'entamereflexion', 1, 14, 1),
(31, 'Vous aimez innover', 'entamereflexion', 1, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponseassociee`
--

CREATE TABLE `reponseassociee` (
  `IDQUESTION` smallint(6) DEFAULT NULL,
  `IDSONDE` smallint(6) DEFAULT NULL,
  `VALEURRES` smallint(6) DEFAULT 0,
  `VALEURRDEV` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponseassociee`
--

INSERT INTO `reponseassociee` (`IDQUESTION`, `IDSONDE`, `VALEURRES`, `VALEURRDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 1, 1),
(3, 1, 4, 0),
(4, 1, 4, 0),
(5, 1, 0, 1),
(6, 1, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `scorech`
--

CREATE TABLE `scorech` (
  `IDSCORECH` smallint(6) NOT NULL,
  `NBPTMULTRES` int(11) DEFAULT 0,
  `NBPTMULTDEV` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scorech`
--

INSERT INTO `scorech` (`IDSCORECH`, `NBPTMULTRES`, `NBPTMULTDEV`) VALUES
(1, 0, 0),
(2, 1, 1),
(3, 0, 1),
(4, 0, 2),
(5, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `scorefermee`
--

CREATE TABLE `scorefermee` (
  `IDSCOREF` smallint(6) NOT NULL,
  `REP` tinyint(1) DEFAULT NULL,
  `SCOREFRES` int(11) DEFAULT 0,
  `SCOREFDEV` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scorefermee`
--

INSERT INTO `scorefermee` (`IDSCOREF`, `REP`, `SCOREFRES`, `SCOREFDEV`) VALUES
(1, 1, 0, 0),
(2, 1, 2, 4),
(3, 1, 4, 0),
(4, 1, 0, 4),
(5, 2, 1, 1),
(6, 1, 3, 1),
(7, 1, 5, 0),
(8, 1, 2, 3),
(9, 1, -1, -1),
(10, 1, 4, 2),
(11, 1, 3, 0),
(12, 1, 4, 4),
(13, 1, 5, 3),
(14, 1, -1, 3),
(15, 1, 4, -1);

-- --------------------------------------------------------

--
-- Structure de la table `sonde`
--

CREATE TABLE `sonde` (
  `IDSONDE` smallint(6) NOT NULL,
  `IDORIGINE` smallint(6) DEFAULT NULL,
  `ANNEE` int(11) DEFAULT 2023,
  `SEXE` char(1) DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sonde`
--

INSERT INTO `sonde` (`IDSONDE`, `IDORIGINE`, `ANNEE`, `SEXE`) VALUES
(1, 2, 2023, 'N'),
(2, 4, 2023, 'F'),
(3, 5, 2023, 'M');

-- --------------------------------------------------------

--
-- Structure de la table `typequestion`
--

CREATE TABLE `typequestion` (
  `ID` smallint(6) NOT NULL,
  `NOMTYPE` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `typequestion`
--

INSERT INTO `typequestion` (`ID`, `NOMTYPE`) VALUES
(1, 'fermee'),
(2, 'echelle');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`IDAVIS`);

--
-- Index pour la table `origine`
--
ALTER TABLE `origine`
  ADD PRIMARY KEY (`IDORIGINE`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`IDQUESTION`);

--
-- Index pour la table `scorech`
--
ALTER TABLE `scorech`
  ADD PRIMARY KEY (`IDSCORECH`);

--
-- Index pour la table `scorefermee`
--
ALTER TABLE `scorefermee`
  ADD PRIMARY KEY (`IDSCOREF`);

--
-- Index pour la table `sonde`
--
ALTER TABLE `sonde`
  ADD PRIMARY KEY (`IDSONDE`);

--
-- Index pour la table `typequestion`
--
ALTER TABLE `typequestion`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `IDAVIS` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `origine`
--
ALTER TABLE `origine`
  MODIFY `IDORIGINE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `IDQUESTION` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `scorech`
--
ALTER TABLE `scorech`
  MODIFY `IDSCORECH` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `scorefermee`
--
ALTER TABLE `scorefermee`
  MODIFY `IDSCOREF` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `sonde`
--
ALTER TABLE `sonde`
  MODIFY `IDSONDE` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `typequestion`
--
ALTER TABLE `typequestion`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
