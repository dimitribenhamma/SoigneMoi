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
-- Structure de la table `personne`
--


CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `specialite` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
)


CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `civilite` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code_postal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) 

CREATE TABLE IF NOT EXISTS `ip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
)

--
-- Déchargement des données de la table 'patient' et `medecin`
-- ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `specialite`, `email`, `password`) VALUES
(1, 'DAVID', 'David', 'GENERALISTE', 'david.david@gmail.com', 'david'),
(2, 'THIERRY', 'Thierry', 'CARDIOLOGUE', 'thierry.thierry@gmail.com', 'thierry'),
(3, 'JEAN', 'Jean', 'CARDIOLOGUE', 'jean.jean@gmail.com', 'jean'),
(4, 'MARC', 'Marc', 'CARDIOLOGUE', 'marc.marc@gmail.com', 'marc'),
(5, 'JULIEN', 'Julien', 'GENERALISTE', 'julien.julien@gmail.com', 'julien')
;

INSERT INTO `patient` (`id`, `civilite`, `nom`, `prenom`, `date`, `code_postal`, `email`, `password`,  `ip`) VALUES
(1, 'Mr', 'ALFRED', 'Alfred', '22/07/1998', '94110', 'alfred.alfred@gmail.com', 'zygote',  '128.0.0.1')
(2, 'Mme', 'JEANNE', 'Jeanne', '22/07/1998', '94110', 'jeanne.jeanne@gmail.com', 'zygote', '128.0.0.2')
(3, 'Mlle', 'CELINE', 'Celine', '94110', '22/07/1998', 'celine.celine@gmail.com', 'zygote', '128.0.0.3')
(4, 'Mr', 'ADAM', 'Adam', '94110', '22/07/1998', 'adam.adam@gmail.com', 'zygote', '128.0.0.4')
(5, 'Mme', 'CHRISTINE', 'Christine', '22/07/1998', '94110', 'christine@gmail.com', 'zygote', '128.0.0.5')
;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
