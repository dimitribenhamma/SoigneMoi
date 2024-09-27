-- Hôte : 127.0.0.1:3306
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `médecin`
--


CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `specialite` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Structure de la table `patient`
--


CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `civilite` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code_postal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Structure de la table `secretaire`
--

CREATE TABLE IF NOT EXISTS `secretaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `secretaire` varchar(25) DEFAULT 'SECRETAIRE',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Structure de la table `ip`
--


CREATE TABLE IF NOT EXISTS `ip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table 'patient' `medecin` et `secretaire`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `email`, `password`, `specialite`) VALUES
(1, 'DAVID', 'David', 'david.david@gmail.com', 'david', 'PNEUMOLOGUE'),
(2, 'THIERRY', 'Thierry', 'thierry.thierry@gmail.com', 'thierry', 'PNEUMOLOGUE'),
(3, 'JEAN', 'Jean', 'jean.jean@gmail.com', 'jean', 'NEUROLOGUE'),
(4, 'MARC', 'Marc', 'marc.marc@gmail.com', 'marc', 'NEUROLOGUE'),
(5, 'JULIEN', 'Julien', 'julien.julien@gmail.com', 'julien', 'PNEUMOLOGUE')
;

INSERT INTO `patient` (`id`, `civilite`, `nom`, `prenom`, `code_postal`, `email`, `password`, `date`, `ip`) VALUES
(1, 'Mr', 'ALFRED', 'Alfred', '93 500', 'alfred.alfred@gmail.com', 'zygote', '22/07/1998', '128:0:0:1')
(2, 'Mme', 'JEANNE', 'Jeanne', '93 500', 'jeanne.jeanne@gmail.com', 'zygote', '22/07/1998', '128:0:0:2')
(3, 'Mlle', 'CELINE', 'Celine', '93 500', 'celine.celine@gmail.com', 'zygote', '22/07/1998', '128:0:0:3')
(4, 'Mr', 'ADAM', 'Adam', '93 500', 'adam.adam@gmail.com', 'zygote', '22/07/1998', '128:0:0:4')
(5, 'Mme', 'CHRISTINE', 'Christine', '93 500', 'christine@gmail.com', 'zygote', '22/07/1998', '128:0:0:5')
;

INSERT INTO `secretaire` (`id`, `nom`, `prenom`, `secretaire`) VALUES
(1, 'ELISE', 'Elise', ''),
(2, 'JUSTINE', 'Justine', ''),
(3, 'VIRGINIE', 'Virginie', ''),
;

COMMIT;