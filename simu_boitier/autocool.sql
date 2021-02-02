-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 02 fév. 2021 à 11:13
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `autocool`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--

CREATE TABLE `abonne` (
  `NUMABONNE` int(11) NOT NULL,
  `CODEFORMULE` varchar(3) NOT NULL,
  `NUMPERMIS` varchar(20) DEFAULT NULL,
  `LIEUOBTENTIONPERMIS` varchar(20) DEFAULT NULL,
  `MODEPAIEMENT` varchar(20) DEFAULT NULL,
  `MODEFACTURATION` varchar(20) DEFAULT NULL,
  `TITULAIRECOMPTE` varchar(50) DEFAULT NULL,
  `NUMCOMPTECLE` varchar(20) DEFAULT NULL,
  `NOMBANQUE` varchar(20) DEFAULT NULL,
  `BANQUEGUICHET` varchar(20) DEFAULT NULL,
  `IBAN` varchar(20) DEFAULT NULL,
  `BIC` varchar(20) DEFAULT NULL,
  `JUSTIFICATIFDEDOMICILE` tinyint(1) DEFAULT NULL,
  `SITUATIONASSURANCE` tinyint(1) DEFAULT NULL,
  `DEPOTDEGARANTIE` tinyint(1) DEFAULT NULL,
  `RIB` tinyint(1) DEFAULT NULL,
  `CHEMINDOSSIERABONNE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`NUMABONNE`, `CODEFORMULE`, `NUMPERMIS`, `LIEUOBTENTIONPERMIS`, `MODEPAIEMENT`, `MODEFACTURATION`, `TITULAIRECOMPTE`, `NUMCOMPTECLE`, `NOMBANQUE`, `BANQUEGUICHET`, `IBAN`, `BIC`, `JUSTIFICATIFDEDOMICILE`, `SITUATIONASSURANCE`, `DEPOTDEGARANTIE`, `RIB`, `CHEMINDOSSIERABONNE`) VALUES
(2, 'CLA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'COO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'LIB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `CODEARRET` int(11) NOT NULL,
  `CODELIGNE` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `arret_de_tram`
--

CREATE TABLE `arret_de_tram` (
  `CODEARRET` int(11) NOT NULL,
  `NOMARRET` varchar(25) DEFAULT NULL,
  `VILLEARRET` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CODECATEGORIE` varchar(3) NOT NULL,
  `CODETYPE` varchar(50) NOT NULL,
  `LIBELLECATEGORIE` varchar(50) DEFAULT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CODECATEGORIE`, `CODETYPE`, `LIBELLECATEGORIE`, `URL`) VALUES
('BR7', 'L', 'Break 7 places', './images/car-l.png'),
('CI4', 'S', 'City 4 places', './images/car-s.png'),
('PL5', 'M', 'Poly 5 places', './images/car-m.png');

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE `date` (
  `DATERESERVATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`DATERESERVATION`) VALUES
('2021-01-13'),
('2021-01-14');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `CODEDROIT` varchar(3) NOT NULL,
  `LIBELLEDROIT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `est_proche`
--

CREATE TABLE `est_proche` (
  `CODEARRET` int(11) NOT NULL,
  `NUMSTATION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

CREATE TABLE `formule` (
  `CODEFORMULE` varchar(3) NOT NULL,
  `LIBELLEFORMULE` varchar(50) DEFAULT NULL,
  `FRAISADHESION` decimal(13,2) DEFAULT NULL,
  `TARIFMENSUEL` decimal(13,2) DEFAULT NULL,
  `PARTSSOCIALE` int(11) DEFAULT NULL,
  `DEPOTGARANTIE` decimal(13,2) DEFAULT NULL,
  `CAUTION` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`CODEFORMULE`, `LIBELLEFORMULE`, `FRAISADHESION`, `TARIFMENSUEL`, `PARTSSOCIALE`, `DEPOTGARANTIE`, `CAUTION`) VALUES
('CLA', 'CLASSIQUE', '50.00', '10.00', 0, '150.00', '500.00'),
('COO', 'COOPERATIVE', '42.00', '8.00', 500, '0.00', '0.00'),
('LIB', 'LIBERTE', '50.00', '0.00', 0, '150.00', '500.00');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_tram`
--

CREATE TABLE `ligne_tram` (
  `CODELIGNE` varchar(1) NOT NULL,
  `VILLELIGNE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

CREATE TABLE `parking` (
  `NUMPARKING` int(11) NOT NULL,
  `NUMSTATION` int(11) NOT NULL,
  `NOMPARKING` varchar(25) DEFAULT NULL,
  `NIVEAU` smallint(6) DEFAULT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `NUMABONNE` int(11) NOT NULL,
  `NUMIMMAT` varchar(10) NOT NULL,
  `DATERESERVATION` date NOT NULL,
  `DATEDEBUT` datetime DEFAULT NULL,
  `DATEFIN` datetime DEFAULT NULL,
  `NBKMS` smallint(6) DEFAULT NULL,
  `MONTANTRESA` double(5,2) DEFAULT NULL,
  `ETATVEHICULE` varchar(50) DEFAULT NULL,
  `PROPRETEVEHICULE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`NUMABONNE`, `NUMIMMAT`, `DATERESERVATION`, `DATEDEBUT`, `DATEFIN`, `NBKMS`, `MONTANTRESA`, `ETATVEHICULE`, `PROPRETEVEHICULE`) VALUES
(2, 'AA-123-AA', '2021-01-13', '2021-01-27 10:32:38', '2021-01-30 10:32:00', 365, 97.20, '0', '4'),
(2, 'AA-123-AB', '2021-01-13', NULL, NULL, 0, NULL, '1', '2'),
(2, 'AA-123-AB', '2021-01-14', NULL, NULL, 0, NULL, '1', '2'),
(3, 'AA-123-AA', '2021-01-13', NULL, NULL, 0, NULL, '0', '0'),
(4, 'AA-123-AA', '2021-01-13', NULL, NULL, 0, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

CREATE TABLE `station` (
  `NUMSTATION` int(11) NOT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `station`
--

INSERT INTO `station` (`NUMSTATION`, `VILLESTATION`, `LIEU`) VALUES
(1, 'Bordeaux', 'Gare Saint-Jean'),
(3, 'Bordeaux', 'Saint-Croix'),
(4, 'Bordeaux', 'Chartrons'),
(5, 'Bordeaux', 'Cité Mondiale'),
(6, 'Bordeaux', 'Barrière St Médard'),
(7, 'Bordeaux', 'Quinconces'),
(8, 'Bordeaux', 'Tourny'),
(9, 'Bordeaux', 'Jaurès'),
(10, 'Bordeaux', 'Stalingrad'),
(11, 'Bordeaux', 'Gaviniès'),
(12, 'Bordeaux', 'Mériadeck'),
(13, 'Bordeaux', 'Pey Berland'),
(14, 'Bordeaux', 'Musée Aquitaine'),
(15, 'Bordeaux', 'Porte Bourgogne'),
(16, 'Bordeaux', 'Victor Hugo'),
(17, 'Bordeaux', 'Sainte Croix'),
(18, 'Bordeaux', 'Gavinies'),
(19, 'Bordeaux', 'Bergonié'),
(20, 'Bordeaux', 'Nansouty'),
(21, 'Bègles', 'Terres Neuves'),
(22, 'Bègles', 'Mairie'),
(23, 'Mérignac', 'Centre'),
(24, 'Talence', 'Forum'),
(25, 'Talence', 'BEM'),
(26, 'Cenon', 'Gare'),
(27, 'Pessac', 'Gare'),
(28, 'Bordeaux', 'Chartrons'),
(29, 'Bordeaux', 'Cité Mondiale'),
(30, 'Bordeaux', 'Barrière St Médard'),
(31, 'Bordeaux', 'Quinconces'),
(32, 'Bordeaux', 'Tourny'),
(33, 'Bordeaux', 'Jaurès'),
(34, 'Bordeaux', 'Stalingrad'),
(35, 'Bordeaux', 'Gaviniès'),
(36, 'Bordeaux', 'Mériadeck'),
(37, 'Bordeaux', 'Pey Berland'),
(38, 'Bordeaux', 'Musée Aquitaine'),
(39, 'Bordeaux', 'Porte Bourgogne'),
(40, 'Bordeaux', 'Victor Hugo'),
(41, 'Bordeaux', 'Sainte Croix'),
(42, 'Bordeaux', 'Gavinies'),
(43, 'Bordeaux', 'Bergonié'),
(44, 'Bordeaux', 'Nansouty'),
(45, 'Bègles', 'Terres Neuves'),
(46, 'Bègles', 'Mairie'),
(47, 'Mérignac', 'Centre'),
(48, 'Talence', 'Forum'),
(49, 'Talence', 'BEM'),
(50, 'Cenon', 'Gare'),
(51, 'Pessac', 'Gare');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_horaire`
--

CREATE TABLE `tarifs_horaire` (
  `CODETYPE` varchar(3) NOT NULL,
  `CODETRANCHEH` varchar(3) NOT NULL,
  `CODEFORMULE` varchar(3) NOT NULL,
  `PRIX` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tarifs_horaire`
--

INSERT INTO `tarifs_horaire` (`CODETYPE`, `CODETRANCHEH`, `CODEFORMULE`, `PRIX`) VALUES
('L', 'H', 'CLA', '3.00'),
('L', 'H', 'COO', '2.56'),
('L', 'H', 'LIB', '3.70'),
('L', 'J', 'CLA', '36.00'),
('L', 'J', 'COO', '30.80'),
('L', 'J', 'LIB', '45.00'),
('L', 'S', 'CLA', '198.00'),
('L', 'S', 'COO', '170.00'),
('L', 'S', 'LIB', '248.00'),
('M', 'H', 'CLA', '2.70'),
('M', 'H', 'COO', '2.30'),
('M', 'H', 'LIB', '3.38'),
('M', 'J', 'CLA', '32.40'),
('M', 'J', 'COO', '27.60'),
('M', 'J', 'LIB', '40.60'),
('M', 'S', 'CLA', '179.00'),
('M', 'S', 'COO', '152.00'),
('M', 'S', 'LIB', '224.00'),
('S', 'H', 'CLA', '2.40'),
('S', 'H', 'COO', '2.04'),
('S', 'H', 'LIB', '3.00'),
('S', 'J', 'CLA', '28.80'),
('S', 'J', 'COO', '24.50'),
('S', 'J', 'LIB', '36.00'),
('S', 'S', 'CLA', '159.00'),
('S', 'S', 'COO', '135.00'),
('S', 'S', 'LIB', '198.00');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_km`
--

CREATE TABLE `tarifs_km` (
  `CODETYPE` varchar(3) NOT NULL,
  `CODETRANCHEKM` varchar(3) NOT NULL,
  `CODEFORMULE` varchar(3) NOT NULL,
  `PRIX` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tarifs_km`
--

INSERT INTO `tarifs_km` (`CODETYPE`, `CODETRANCHEKM`, `CODEFORMULE`, `PRIX`) VALUES
('L', 'M20', 'CLA', '0.24'),
('L', 'M20', 'COO', '0.21'),
('L', 'M20', 'LIB', '0.30'),
('L', 'M50', 'CLA', '0.40'),
('L', 'M50', 'COO', '0.34'),
('L', 'M50', 'LIB', '0.50'),
('L', 'P20', 'CLA', '0.18'),
('L', 'P20', 'COO', '0.16'),
('L', 'P20', 'LIB', '0.23'),
('M', 'M20', 'CLA', '0.21'),
('M', 'M20', 'COO', '0.18'),
('M', 'M20', 'LIB', '0.27'),
('M', 'M50', 'CLA', '0.35'),
('M', 'M50', 'COO', '0.30'),
('M', 'M50', 'LIB', '0.44'),
('M', 'P20', 'CLA', '0.15'),
('M', 'P20', 'COO', '0.13'),
('M', 'P20', 'LIB', '0.19'),
('S', 'M20', 'CLA', '0.24'),
('S', 'M20', 'COO', '0.21'),
('S', 'M20', 'LIB', '0.30'),
('S', 'M50', 'CLA', '0.35'),
('S', 'M50', 'COO', '0.30'),
('S', 'M50', 'LIB', '0.44'),
('S', 'P20', 'CLA', '0.18'),
('S', 'P20', 'COO', '0.16'),
('S', 'P20', 'LIB', '0.23');

-- --------------------------------------------------------

--
-- Structure de la table `tranche_horaire`
--

CREATE TABLE `tranche_horaire` (
  `CODETRANCHEH` varchar(3) NOT NULL,
  `LIBELLETRANCHEH` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tranche_kilometrique`
--

CREATE TABLE `tranche_kilometrique` (
  `CODETRANCHEKM` varchar(3) NOT NULL,
  `LIBELLETRANCHEKM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

CREATE TABLE `type_vehicule` (
  `CODETYPE` varchar(3) NOT NULL,
  `LIBELLETYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_vehicule`
--

INSERT INTO `type_vehicule` (`CODETYPE`, `LIBELLETYPE`) VALUES
('L', 'Catégorie L'),
('M', 'Catégorie M'),
('S', 'Catégorie S');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `LOGIN` varchar(15) NOT NULL,
  `CODEDROIT` varchar(3) NOT NULL,
  `NUMABONNE` int(11) DEFAULT NULL,
  `MDP` varchar(32) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `EMAIL` varchar(55) DEFAULT NULL,
  `NOM` varchar(25) DEFAULT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `RUE` varchar(50) DEFAULT NULL,
  `VILLE` varchar(50) DEFAULT NULL,
  `CODEPOSTAL` varchar(6) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  `CODEPIN` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`LOGIN`, `CODEDROIT`, `NUMABONNE`, `MDP`, `SEXE`, `EMAIL`, `NOM`, `PRENOM`, `RUE`, `VILLE`, `CODEPOSTAL`, `DATENAISSANCE`, `CODEPIN`) VALUES
('jmazagot', 'adm', 2, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4321),
('ljaymot', 'adm', 3, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3598),
('mdenost', 'adm', 4, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8624);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `NUMIMMAT` varchar(10) NOT NULL,
  `CODECATEGORIE` varchar(3) NOT NULL,
  `NUMSTATION` int(11) NOT NULL,
  `KILOMETRAGE` int(6) DEFAULT NULL,
  `NIVEAUESSENCE` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`NUMIMMAT`, `CODECATEGORIE`, `NUMSTATION`, `KILOMETRAGE`, `NIVEAUESSENCE`) VALUES
('AA-123-AA', 'CI4', 1, 100, 70),
('AA-123-AB', 'PL5', 1, 13500, 80),
('AA-123-AC', 'BR7', 3, 158, 15);

-- --------------------------------------------------------

--
-- Structure de la table `voirie`
--

CREATE TABLE `voirie` (
  `NUMVOIRIE` int(11) NOT NULL,
  `NUMSTATION` int(11) NOT NULL,
  `ADRESSE` varchar(25) DEFAULT NULL,
  `NBPLACES` smallint(6) DEFAULT NULL,
  `VILLESTATION` varchar(25) DEFAULT NULL,
  `LIEU` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`NUMABONNE`),
  ADD KEY `FK_ABONNE_FORMULE` (`CODEFORMULE`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`CODEARRET`,`CODELIGNE`),
  ADD KEY `FK_APPARTIENT_LIGNE_TRAM` (`CODELIGNE`);

--
-- Index pour la table `arret_de_tram`
--
ALTER TABLE `arret_de_tram`
  ADD PRIMARY KEY (`CODEARRET`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CODECATEGORIE`),
  ADD KEY `FK_CATEGORIE_TYPE_VEHICULE` (`CODETYPE`);

--
-- Index pour la table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`DATERESERVATION`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`CODEDROIT`);

--
-- Index pour la table `est_proche`
--
ALTER TABLE `est_proche`
  ADD PRIMARY KEY (`CODEARRET`,`NUMSTATION`),
  ADD KEY `FK_EST_PROCHE_STATION` (`NUMSTATION`);

--
-- Index pour la table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`CODEFORMULE`);

--
-- Index pour la table `ligne_tram`
--
ALTER TABLE `ligne_tram`
  ADD PRIMARY KEY (`CODELIGNE`);

--
-- Index pour la table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`NUMPARKING`),
  ADD KEY `FK_PARKING_STATION` (`NUMSTATION`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`NUMABONNE`,`NUMIMMAT`,`DATERESERVATION`),
  ADD KEY `FK_RESERVER_VEHICULE` (`NUMIMMAT`),
  ADD KEY `FK_RESERVER_DATE` (`DATERESERVATION`);

--
-- Index pour la table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`NUMSTATION`);

--
-- Index pour la table `tarifs_horaire`
--
ALTER TABLE `tarifs_horaire`
  ADD PRIMARY KEY (`CODETYPE`,`CODETRANCHEH`,`CODEFORMULE`),
  ADD KEY `FK_TARIFS_HORAIRE_TRANCHE_HORAIRE` (`CODETRANCHEH`),
  ADD KEY `FK_TARIFS_HORAIRE_FORMULE` (`CODEFORMULE`);

--
-- Index pour la table `tarifs_km`
--
ALTER TABLE `tarifs_km`
  ADD PRIMARY KEY (`CODETYPE`,`CODETRANCHEKM`,`CODEFORMULE`),
  ADD KEY `FK_TARIFS_KM_TRANCHE_KILOMETRIQUE` (`CODETRANCHEKM`),
  ADD KEY `FK_TARIFS_KM_FORMULE` (`CODEFORMULE`);

--
-- Index pour la table `tranche_horaire`
--
ALTER TABLE `tranche_horaire`
  ADD PRIMARY KEY (`CODETRANCHEH`);

--
-- Index pour la table `tranche_kilometrique`
--
ALTER TABLE `tranche_kilometrique`
  ADD PRIMARY KEY (`CODETRANCHEKM`);

--
-- Index pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  ADD PRIMARY KEY (`CODETYPE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`LOGIN`),
  ADD KEY `FK_UTILISATEUR_DROIT` (`CODEDROIT`),
  ADD KEY `FK_UTILISATEUR_ABONNE` (`NUMABONNE`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`NUMIMMAT`),
  ADD KEY `FK_VEHICULE_CATEGORIE` (`CODECATEGORIE`),
  ADD KEY `FK_VEHICULE_STATION` (`NUMSTATION`);

--
-- Index pour la table `voirie`
--
ALTER TABLE `voirie`
  ADD PRIMARY KEY (`NUMVOIRIE`),
  ADD KEY `FK_VOIRIE_STATION` (`NUMSTATION`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonne`
--
ALTER TABLE `abonne`
  MODIFY `NUMABONNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `arret_de_tram`
--
ALTER TABLE `arret_de_tram`
  MODIFY `CODEARRET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parking`
--
ALTER TABLE `parking`
  MODIFY `NUMPARKING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `station`
--
ALTER TABLE `station`
  MODIFY `NUMSTATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `voirie`
--
ALTER TABLE `voirie`
  MODIFY `NUMVOIRIE` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD CONSTRAINT `FK_ABONNE_FORMULE` FOREIGN KEY (`CODEFORMULE`) REFERENCES `formule` (`CODEFORMULE`);

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `FK_APPARTIENT_ARRET_DE_TRAM` FOREIGN KEY (`CODEARRET`) REFERENCES `arret_de_tram` (`CODEARRET`),
  ADD CONSTRAINT `FK_APPARTIENT_LIGNE_TRAM` FOREIGN KEY (`CODELIGNE`) REFERENCES `ligne_tram` (`CODELIGNE`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_CATEGORIE_TYPE_VEHICULE` FOREIGN KEY (`CODETYPE`) REFERENCES `type_vehicule` (`CODETYPE`);

--
-- Contraintes pour la table `est_proche`
--
ALTER TABLE `est_proche`
  ADD CONSTRAINT `FK_EST_PROCHE_ARRET_DE_TRAM` FOREIGN KEY (`CODEARRET`) REFERENCES `arret_de_tram` (`CODEARRET`),
  ADD CONSTRAINT `FK_EST_PROCHE_STATION` FOREIGN KEY (`NUMSTATION`) REFERENCES `station` (`NUMSTATION`);

--
-- Contraintes pour la table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `FK_PARKING_STATION` FOREIGN KEY (`NUMSTATION`) REFERENCES `station` (`NUMSTATION`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `FK_RESERVER_ABONNE` FOREIGN KEY (`NUMABONNE`) REFERENCES `abonne` (`NUMABONNE`),
  ADD CONSTRAINT `FK_RESERVER_DATE` FOREIGN KEY (`DATERESERVATION`) REFERENCES `date` (`DATERESERVATION`),
  ADD CONSTRAINT `FK_RESERVER_VEHICULE` FOREIGN KEY (`NUMIMMAT`) REFERENCES `vehicule` (`NUMIMMAT`);

--
-- Contraintes pour la table `tarifs_horaire`
--
ALTER TABLE `tarifs_horaire`
  ADD CONSTRAINT `tarifs_horaire_ibfk_1` FOREIGN KEY (`CODEFORMULE`) REFERENCES `formule` (`CODEFORMULE`),
  ADD CONSTRAINT `tarifs_horaire_ibfk_2` FOREIGN KEY (`CODETYPE`) REFERENCES `type_vehicule` (`CODETYPE`);

--
-- Contraintes pour la table `tarifs_km`
--
ALTER TABLE `tarifs_km`
  ADD CONSTRAINT `tarifs_km_ibfk_1` FOREIGN KEY (`CODEFORMULE`) REFERENCES `formule` (`CODEFORMULE`),
  ADD CONSTRAINT `tarifs_km_ibfk_2` FOREIGN KEY (`CODETYPE`) REFERENCES `type_vehicule` (`CODETYPE`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`NUMABONNE`) REFERENCES `abonne` (`NUMABONNE`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
