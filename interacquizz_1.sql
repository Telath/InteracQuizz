-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 04 fév. 2022 à 14:39
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `interacquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `note` float NOT NULL,
  `userid` int(11) NOT NULL,
  `quizzid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(11) NOT NULL,
  `intitule` text NOT NULL,
  `explication` text NOT NULL,
  `quizzid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

CREATE TABLE `quizz` (
  `quizzid` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `introduction` text NOT NULL,
  `technoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `ID` int(11) NOT NULL,
  `contenu` varchar(250) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `questionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

CREATE TABLE `techno` (
  `ID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `session` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `nom`, `prenom`, `email`, `motdepasse`, `role`, `session`) VALUES
(2, 'Faucon', 'remi', 'faucon.remi04@gmail.com', 'sefzss', 0, '2022-02-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD KEY `userid` (`userid`),
  ADD KEY `quizzid` (`quizzid`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`),
  ADD KEY `quizzid` (`quizzid`);

--
-- Index pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`quizzid`),
  ADD KEY `technoid` (`technoid`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `questionid` (`questionid`);

--
-- Index pour la table `techno`
--
ALTER TABLE `techno`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `quizzid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `techno`
--
ALTER TABLE `techno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
