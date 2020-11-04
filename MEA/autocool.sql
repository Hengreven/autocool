DROP DATABASE IF EXISTS AUTOCOOL;

CREATE DATABASE IF NOT EXISTS AUTOCOOL;
USE AUTOCOOL;

--
-- Base de données : `autocool`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

DROP TABLE IF EXISTS `abonne`;
CREATE TABLE IF NOT EXISTS `abonne` (
  `NUMABONNE` char(32) NOT NULL,
  `CODEFORMULE` varchar(10) NOT NULL,
  `LOGINNAME` varchar(50) NOT NULL,
  `NUMPERMIS` varchar(128) DEFAULT NULL,
  `LIEUOBTENTIONPERMIS` varchar(128) DEFAULT NULL,
  `MODEPAIEMENT` varchar(128) DEFAULT NULL,
  `MODEFACTURATION` varchar(128) DEFAULT NULL,
  `TITULAIRECOMPTE` varchar(128) DEFAULT NULL,
  `NUMCOMPTECLE` varchar(128) DEFAULT NULL,
  `NOMBANQUE` varchar(128) DEFAULT NULL,
  `BANQUEGUICHET` varchar(128) DEFAULT NULL,
  `IBAN` varchar(128) DEFAULT NULL,
  `BIC` varchar(128) DEFAULT NULL,
  `JUSTIFICATIFDEDOMICILE` tinyint(1) DEFAULT NULL,
  `SITUATIONASSURANCE` tinyint(1) DEFAULT NULL,
  `DEPOTDEGARANTIE` tinyint(1) DEFAULT NULL,
  `RIB` tinyint(1) DEFAULT NULL,
  `CHEMINDOSSIERABONNE` varchar(256) DEFAULT NULL,
  `MDP` varchar(128) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `EMAIL` varchar(128) DEFAULT NULL,
  `NOM` varchar(128) DEFAULT NULL,
  `PRENOM` varchar(128) DEFAULT NULL,
  `RUE` varchar(128) DEFAULT NULL,
  `VILLE` varchar(128) DEFAULT NULL,
  `CODEPOSTAL` varchar(128) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  PRIMARY KEY (`NUMABONNE`),
  KEY `I_FK_ABONNE_FORMULE` (`CODEFORMULE`),
  KEY `I_FK_ABONNE_UTILISATEUR` (`LOGINNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE IF NOT EXISTS `appartient` (
  `CODEARRET` varchar(25) NOT NULL,
  `CODELIGNE` varchar(25) NOT NULL,
  PRIMARY KEY (`CODEARRET`,`CODELIGNE`),
  KEY `I_FK_APPARTIENT_ARRET_DE_TRAM` (`CODEARRET`),
  KEY `I_FK_APPARTIENT_LIGNE_TRAM` (`CODELIGNE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `arret_de_tram`
--

DROP TABLE IF EXISTS `arret_de_tram`;
CREATE TABLE IF NOT EXISTS `arret_de_tram` (
  `CODEARRET` varchar(10) NOT NULL,
  `NOMARRET` varchar(50) DEFAULT NULL,
  `VILLEARRET` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODEARRET`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CODECATEGORIE` varchar(25) NOT NULL,
  `CODETYPE` varchar(25) NOT NULL,
  `LIBELLECATEGORIE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CODECATEGORIE`),
  KEY `I_FK_CATEGORIE_TYPE_VEHICULE` (`CODETYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `DATERESERVATION` date NOT NULL,
  PRIMARY KEY (`DATERESERVATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `CODEDROIT` varchar(4) NOT NULL,
  `LIBELLEDROIT` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODEDROIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `est_proche`
--

DROP TABLE IF EXISTS `est_proche`;
CREATE TABLE IF NOT EXISTS `est_proche` (
  `CODEARRET` varchar(25) NOT NULL,
  `NUMSTATION` char(32) NOT NULL,
  PRIMARY KEY (`CODEARRET`,`NUMSTATION`),
  KEY `I_FK_EST_PROCHE_ARRET_DE_TRAM` (`CODEARRET`),
  KEY `I_FK_EST_PROCHE_STATION` (`NUMSTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `CODEFORMULE` varchar(25) NOT NULL,
  `LIBELLEFORMULE` varchar(25) DEFAULT NULL,
  `FRAISADHESION` decimal(13,2) DEFAULT NULL,
  `TARIFMENSUEL` decimal(13,2) DEFAULT NULL,
  `PARTSSOCIALE` int DEFAULT NULL,
  `DEPOTGARANTIE` decimal(13,2) DEFAULT NULL,
  `CAUTION` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`CODEFORMULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_tram`
--

DROP TABLE IF EXISTS `ligne_tram`;
CREATE TABLE IF NOT EXISTS `ligne_tram` (
  `CODELIGNE` varchar(25) NOT NULL,
  `VILLELIGNE` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CODELIGNE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `NUMPARKING` char(32) NOT NULL,
  `NUMSTATION` char(32) NOT NULL,
  `NOMPARKING` varchar(25) DEFAULT NULL,
  `NIVEAU` smallint DEFAULT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`NUMPARKING`),
  KEY `I_FK_PARKING_STATION` (`NUMSTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `NUMABONNE` char(32) NOT NULL,
  `NUMIMMAT` varchar(25) NOT NULL,
  `DATERESERVATION` date NOT NULL,
  `DATEDEBUT` datetime DEFAULT NULL,
  `DATEFIN` datetime DEFAULT NULL,
  `NBKMS` smallint DEFAULT NULL,
  `MONTANTRESA` double(5,2) DEFAULT NULL,
  `ETATVEHICULE` varchar(128) DEFAULT NULL,
  `PROPRETEVEHICULE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`NUMABONNE`,`NUMIMMAT`,`DATERESERVATION`),
  KEY `I_FK_RESERVER_ABONNE` (`NUMABONNE`),
  KEY `I_FK_RESERVER_VEHICULE` (`NUMIMMAT`),
  KEY `I_FK_RESERVER_DATE` (`DATERESERVATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `NUMSTATION` char(32) NOT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`NUMSTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_horaire`
--

DROP TABLE IF EXISTS `tarifs_horaire`;
CREATE TABLE IF NOT EXISTS `tarifs_horaire` (
  `CODETYPE` varchar(25) NOT NULL,
  `CODETRANCHEH` varchar(25) NOT NULL,
  `CODEFORMULE` varchar(25) NOT NULL,
  `PRIX` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`CODETYPE`,`CODETRANCHEH`,`CODEFORMULE`),
  KEY `I_FK_TARIFS_HORAIRE_TYPE_VEHICULE` (`CODETYPE`),
  KEY `I_FK_TARIFS_HORAIRE_TRANCHE_HORAIRE` (`CODETRANCHEH`),
  KEY `I_FK_TARIFS_HORAIRE_FORMULE` (`CODEFORMULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_km`
--

DROP TABLE IF EXISTS `tarifs_km`;
CREATE TABLE IF NOT EXISTS `tarifs_km` (
  `CODETYPE` varchar(25) NOT NULL,
  `CODETRANCHEKM` varchar(25) NOT NULL,
  `CODEFORMULE` varchar(25) NOT NULL,
  `PRIX` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`CODETYPE`,`CODETRANCHEKM`,`CODEFORMULE`),
  KEY `I_FK_TARIFS_KM_TYPE_VEHICULE` (`CODETYPE`),
  KEY `I_FK_TARIFS_KM_TRANCHE_KILOMETRIQUE` (`CODETRANCHEKM`),
  KEY `I_FK_TARIFS_KM_FORMULE` (`CODEFORMULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tranche_horaire`
--

DROP TABLE IF EXISTS `tranche_horaire`;
CREATE TABLE IF NOT EXISTS `tranche_horaire` (
  `CODETRANCHEH` varchar(25) NOT NULL,
  `LIBELLETRANCHEH` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CODETRANCHEH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tranche_kilometrique`
--

DROP TABLE IF EXISTS `tranche_kilometrique`;
CREATE TABLE IF NOT EXISTS `tranche_kilometrique` (
  `CODETRANCHEKM` varchar(25) NOT NULL,
  `LIBELLETRANCHEKM` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CODETRANCHEKM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

DROP TABLE IF EXISTS `type_vehicule`;
CREATE TABLE IF NOT EXISTS `type_vehicule` (
  `CODETYPE` varchar(10) NOT NULL,
  `LIBELLETYPE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODETYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `LOGINNAME` varchar(50) NOT NULL,
  `CODEDROIT` varchar(50) NOT NULL,
  `MDP` varchar(50) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `RUE` varchar(50) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `CODEPOSTAL` varchar(50) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  PRIMARY KEY (`LOGINNAME`),
  KEY `I_FK_UTILISATEUR_DROIT` (`CODEDROIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `NUMIMMAT` varchar(12) NOT NULL,
  `CODECATEGORIE` varchar(12) NOT NULL,
  `NUMSTATION` char(32) NOT NULL,
  `KILOMETRAGE` int DEFAULT NULL,
  `NIVEAUESSENCE` int DEFAULT NULL,
  PRIMARY KEY (`NUMIMMAT`),
  KEY `I_FK_VEHICULE_CATEGORIE` (`CODECATEGORIE`),
  KEY `I_FK_VEHICULE_STATION` (`NUMSTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voirie`
--

DROP TABLE IF EXISTS `voirie`;
CREATE TABLE IF NOT EXISTS `voirie` (
  `NUMVOIRIE` char(32) NOT NULL,
  `NUMSTATION` char(32) NOT NULL,
  `ADRESSE` varchar(25) DEFAULT NULL,
  `NBPLACES` smallint DEFAULT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`NUMVOIRIE`),
  KEY `I_FK_VOIRIE_STATION` (`NUMSTATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
