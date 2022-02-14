-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour interacquizz
CREATE DATABASE IF NOT EXISTS `interacquizz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `interacquizz`;

-- Listage de la structure de la table interacquizz. notes
CREATE TABLE IF NOT EXISTS `notes` (
  `note` float NOT NULL,
  `userid` int(11) NOT NULL,
  `quizzid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table interacquizz.notes : ~0 rows (environ)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- Listage de la structure de la table interacquizz. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `intitule` text NOT NULL,
  `explication` text NOT NULL,
  `quizzid` int(11) NOT NULL,
  `nbquestion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table interacquizz.questions : ~5 rows (environ)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `intitule`, `explication`, `quizzid`, `nbquestion`) VALUES
	(1, 'HTML est l\'acronyme de :', '/', 1, 1);
INSERT INTO `questions` (`id`, `intitule`, `explication`, `quizzid`, `nbquestion`) VALUES
	(2, 'HTML est un langage ...', '/', 1, 2);
INSERT INTO `questions` (`id`, `intitule`, `explication`, `quizzid`, `nbquestion`) VALUES
	(3, 'La version d\'HTML principalement utilisée de nos jours est ...', '/', 1, 3);
INSERT INTO `questions` (`id`, `intitule`, `explication`, `quizzid`, `nbquestion`) VALUES
	(4, 'CSS est :', '/', 2, 1);
INSERT INTO `questions` (`id`, `intitule`, `explication`, `quizzid`, `nbquestion`) VALUES
	(5, 'Question de CSS Bis', '', 2, 2);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Listage de la structure de la table interacquizz. quizz
CREATE TABLE IF NOT EXISTS `quizz` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `intro` text NOT NULL,
  `technoid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table interacquizz.quizz : ~3 rows (environ)
/*!40000 ALTER TABLE `quizz` DISABLE KEYS */;
INSERT INTO `quizz` (`id`, `nom`, `intro`, `technoid`) VALUES
	(1, 'Découverte de l\'HTML', 'Bienvenue dans votre premier QCM !', 1);
INSERT INTO `quizz` (`id`, `nom`, `intro`, `technoid`) VALUES
	(2, 'Découverte du css', 'QCM sur le css', 2);
INSERT INTO `quizz` (`id`, `nom`, `intro`, `technoid`) VALUES
	(4, 'Initiation à la POO', 'Ce QCM permettra de vous évaluer sur la POO avec PHP', 4);
/*!40000 ALTER TABLE `quizz` ENABLE KEYS */;

-- Listage de la structure de la table interacquizz. reponses
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL,
  `contenu` varchar(250) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `questionid` int(11) NOT NULL,
  `quizzid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table interacquizz.reponses : ~16 rows (environ)
/*!40000 ALTER TABLE `reponses` DISABLE KEYS */;
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(1, 'HyperText Module Language', 0, 1, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(2, 'HyperText Markup Language', 1, 1, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(3, 'HyperText Marquable Locution', 0, 1, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(4, 'Aucune de ces propositions n\'est correcte', 0, 1, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(5, 'De programmation', 0, 2, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(6, 'De balisage', 1, 2, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(7, 'Orienté front-end', 1, 2, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(8, 'Orienté back-end', 0, 2, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(9, 'HTML 3.0', 0, 3, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(10, 'HTML 4.0', 0, 3, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(11, 'HTML 5.0', 1, 3, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(12, 'HTML 6.0', 0, 3, 1);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(13, 'Un langage de programmation', 0, 1, 2);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(14, 'Un langage de balisage', 0, 1, 2);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(15, 'L\'acronyme de Cascading Style Sheet', 1, 1, 2);
INSERT INTO `reponses` (`id`, `contenu`, `valide`, `questionid`, `quizzid`) VALUES
	(16, 'Utilisé pour styliser les pages web', 1, 1, 2);
/*!40000 ALTER TABLE `reponses` ENABLE KEYS */;

-- Listage de la structure de la table interacquizz. techno
CREATE TABLE IF NOT EXISTS `techno` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table interacquizz.techno : ~5 rows (environ)
/*!40000 ALTER TABLE `techno` DISABLE KEYS */;
INSERT INTO `techno` (`id`, `nom`) VALUES
	(1, 'html');
INSERT INTO `techno` (`id`, `nom`) VALUES
	(2, 'css');
INSERT INTO `techno` (`id`, `nom`) VALUES
	(3, 'javascript');
INSERT INTO `techno` (`id`, `nom`) VALUES
	(4, 'php');
INSERT INTO `techno` (`id`, `nom`) VALUES
	(5, 'sql');
/*!40000 ALTER TABLE `techno` ENABLE KEYS */;

-- Listage de la structure de la table interacquizz. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Table des utilisateurs';

-- Listage des données de la table interacquizz.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
	(1, 'Yohann', 'MOY', 'ezaezaeza', 'ezazeazeazea');
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
	(2, 'POUILLART', 'Clément', 'clement.p@mail.com', 'azerty123');
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
	(3, 'Pouillart', 'Cl&eacute;ment', 'clement.pouillart@gmail.com', 'azerty123');
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
	(4, 'LEROUX', 'Gary', 'garylele@mail.net', 'azerty123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
