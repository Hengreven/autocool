DROP DATABASE IF EXISTS autocool;

CREATE DATABASE IF NOT EXISTS autocool;
USE autocool;
# -----------------------------------------------------------------------------
#       TABLE : ARRET_DE_TRAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ARRET_DE_TRAM
 (
   CODEARRET INTEGER NOT NULL AUTO_INCREMENT ,
   NOMARRET VARCHAR(25) NULL  ,
   VILLEARRET VARCHAR(25) NULL
   , PRIMARY KEY (CODEARRET) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : DROIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DROIT
 (
   CODEDROIT VARCHAR(3) NOT NULL  ,
   LIBELLEDROIT VARCHAR(50) NULL
   , PRIMARY KEY (CODEDROIT) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   LOGIN VARCHAR(15) NOT NULL  ,
   CODEDROIT VARCHAR(3) NOT NULL  ,
   NUMABONNE INTEGER NULL  ,
   MDP VARCHAR(32) NULL  ,
   SEXE CHAR(1) NULL  ,
   EMAIL VARCHAR(55) NULL  ,
   NOM VARCHAR(25) NULL  ,
   PRENOM VARCHAR(25) NULL  ,
   RUE VARCHAR(50) NULL  ,
   VILLE VARCHAR(50) NULL  ,
   CODEPOSTAL VARCHAR(6) NULL  ,
   DATENAISSANCE DATE NULL  
   , PRIMARY KEY (LOGIN) 
 ) 
 ENGINE = InnoDB;


# -----------------------------------------------------------------------------
#       TABLE : TYPE_VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_VEHICULE
 (
   CODETYPE VARCHAR(3) NOT NULL  ,
   LIBELLETYPE VARCHAR(50) NULL
   , PRIMARY KEY (CODETYPE) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : DATE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DATE
 (
   DATERESERVATION DATE NOT NULL  
   , PRIMARY KEY (DATERESERVATION) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : ABONNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ABONNE
 (
   NUMABONNE INTEGER NOT NULL AUTO_INCREMENT ,
   CODEFORMULE VARCHAR(3) NOT NULL  ,
   NUMPERMIS VARCHAR(20) NULL  ,
   LIEUOBTENTIONPERMIS VARCHAR(20) NULL  ,
   MODEPAIEMENT VARCHAR(20) NULL  ,
   MODEFACTURATION VARCHAR(20) NULL  ,
   TITULAIRECOMPTE VARCHAR(50) NULL  ,
   NUMCOMPTECLE VARCHAR(20) NULL  ,
   NOMBANQUE VARCHAR(20) NULL  ,
   BANQUEGUICHET VARCHAR(20) NULL  ,
   IBAN VARCHAR(20) NULL  ,
   BIC VARCHAR(20) NULL  ,
   JUSTIFICATIFDEDOMICILE BOOL NULL  ,
   SITUATIONASSURANCE BOOL NULL  ,
   DEPOTDEGARANTIE BOOL NULL  ,
   RIB BOOL NULL  ,
   CHEMINDOSSIERABONNE VARCHAR(255) NULL
   , PRIMARY KEY (NUMABONNE) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : STATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STATION
 (
   NUMSTATION INTEGER NOT NULL AUTO_INCREMENT ,
   VILLESTATION VARCHAR(25) NULL  ,
   LIEU VARCHAR(25) NULL  
   , PRIMARY KEY (NUMSTATION) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULE
 (
   NUMIMMAT VARCHAR(10) NOT NULL  ,
   CODECATEGORIE VARCHAR(3) NOT NULL  ,
   NUMSTATION INTEGER NOT NULL  ,
   KILOMETRAGE SMALLINT NULL  ,
   NIVEAUESSENCE SMALLINT NULL  
   , PRIMARY KEY (NUMIMMAT) 
 ) 
 ENGINE = InnoDB;


# -----------------------------------------------------------------------------
#       TABLE : TRANCHE_HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TRANCHE_HORAIRE
 (
   CODETRANCHEH VARCHAR(3) NOT NULL  ,
   LIBELLETRANCHEH VARCHAR(50) NULL
   , PRIMARY KEY (CODETRANCHEH) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : TRANCHE_KILOMETRIQUE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TRANCHE_KILOMETRIQUE
 (
   CODETRANCHEKM VARCHAR(3) NOT NULL  ,
   LIBELLETRANCHEKM VARCHAR(50) NULL
   , PRIMARY KEY (CODETRANCHEKM) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : PARKING
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARKING
 (
   NUMPARKING INTEGER NOT NULL AUTO_INCREMENT ,
   NUMSTATION INTEGER NOT NULL  ,
   NOMPARKING VARCHAR(25) NULL  ,
   NIVEAU SMALLINT NULL  ,
   VILLESTATION VARCHAR(25) NULL  ,
   LIEU VARCHAR(25) NULL  
   , PRIMARY KEY (NUMPARKING) 
 ) 
 ENGINE = InnoDB;



# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   CODECATEGORIE VARCHAR(3) NOT NULL  ,
   CODETYPE VARCHAR(50) NOT NULL  ,
   LIBELLECATEGORIE VARCHAR(50) NULL
   , PRIMARY KEY (CODECATEGORIE) 
 ) 
 ENGINE = InnoDB;



# -----------------------------------------------------------------------------
#       TABLE : VOIRIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VOIRIE
 (
   NUMVOIRIE INTEGER NOT NULL AUTO_INCREMENT ,
   NUMSTATION INTEGER NOT NULL  ,
   ADRESSE VARCHAR(25) NULL  ,
   NBPLACES SMALLINT NULL  ,
   VILLESTATION VARCHAR(25) NULL  ,
   LIEU VARCHAR(25) NULL  
   , PRIMARY KEY (NUMVOIRIE) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : LIGNE_TRAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIGNE_TRAM
 (
   CODELIGNE VARCHAR(1) NOT NULL  ,
   VILLELIGNE VARCHAR(50) NULL
   , PRIMARY KEY (CODELIGNE) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : FORMULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMULE
 (
   CODEFORMULE VARCHAR(3) NOT NULL  ,
   LIBELLEFORMULE VARCHAR(50) NULL  ,
   FRAISADHESION DECIMAL(13,2) NULL  ,
   TARIFMENSUEL DECIMAL(13,2) NULL  ,
   PARTSSOCIALE INTEGER NULL  ,
   DEPOTGARANTIE DECIMAL(13,2) NULL  ,
   CAUTION DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODEFORMULE) 
 ) 
 ENGINE = InnoDB;

# -----------------------------------------------------------------------------
#       TABLE : EST_PROCHE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EST_PROCHE
 (
   CODEARRET INTEGER NOT NULL  ,
   NUMSTATION INTEGER NOT NULL  
   , PRIMARY KEY (CODEARRET,NUMSTATION) 
 ) 
 ENGINE = InnoDB;


# -----------------------------------------------------------------------------
#       TABLE : RESERVER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESERVER
 (
   NUMABONNE INTEGER NOT NULL  ,
   NUMIMMAT VARCHAR(10) NOT NULL  ,
   DATERESERVATION DATE NOT NULL  ,
   DATEDEBUT DATETIME NULL  ,
   DATEFIN DATETIME NULL  ,
   NBKMS SMALLINT NULL  ,
   MONTANTRESA REAL(5,2) NULL  ,
   ETATVEHICULE VARCHAR(50) NULL  ,
   PROPRETEVEHICULE VARCHAR(50) NULL
   , PRIMARY KEY (NUMABONNE,NUMIMMAT,DATERESERVATION) 
 ) 
 ENGINE = InnoDB;



# -----------------------------------------------------------------------------
#       TABLE : TARIFS_KM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TARIFS_KM
 (
   CODETYPE VARCHAR(3) NOT NULL  ,
   CODETRANCHEKM VARCHAR(3) NOT NULL  ,
   CODEFORMULE VARCHAR(3) NOT NULL  ,
   PRIX DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODETYPE,CODETRANCHEKM,CODEFORMULE) 
 ) 
 ENGINE = InnoDB;



# -----------------------------------------------------------------------------
#       TABLE : APPARTIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTIENT
 (
   CODEARRET INTEGER NOT NULL  ,
   CODELIGNE VARCHAR(3) NOT NULL
   , PRIMARY KEY (CODEARRET,CODELIGNE) 
 ) 
 ENGINE = InnoDB;



# -----------------------------------------------------------------------------
#       TABLE : TARIFS_HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TARIFS_HORAIRE
 (
   CODETYPE VARCHAR(3) NOT NULL  ,
   CODETRANCHEH VARCHAR(3) NOT NULL  ,
   CODEFORMULE VARCHAR(3) NOT NULL  ,
   PRIX DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODETYPE,CODETRANCHEH,CODEFORMULE) 
 ) 
 ENGINE = InnoDB;




# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE UTILISATEUR 
  ADD FOREIGN KEY FK_UTILISATEUR_DROIT (CODEDROIT)
      REFERENCES DROIT (CODEDROIT) ;


ALTER TABLE UTILISATEUR 
  ADD FOREIGN KEY FK_UTILISATEUR_ABONNE (NUMABONNE)
      REFERENCES ABONNE (NUMABONNE) ;


ALTER TABLE ABONNE 
  ADD FOREIGN KEY FK_ABONNE_FORMULE (CODEFORMULE)
      REFERENCES FORMULE (CODEFORMULE) ;


ALTER TABLE VEHICULE 
  ADD FOREIGN KEY FK_VEHICULE_CATEGORIE (CODECATEGORIE)
      REFERENCES CATEGORIE (CODECATEGORIE) ;


ALTER TABLE VEHICULE 
  ADD FOREIGN KEY FK_VEHICULE_STATION (NUMSTATION)
      REFERENCES STATION (NUMSTATION) ;


ALTER TABLE PARKING 
  ADD FOREIGN KEY FK_PARKING_STATION (NUMSTATION)
      REFERENCES STATION (NUMSTATION) ;


ALTER TABLE CATEGORIE 
  ADD FOREIGN KEY FK_CATEGORIE_TYPE_VEHICULE (CODETYPE)
      REFERENCES TYPE_VEHICULE (CODETYPE) ;


ALTER TABLE VOIRIE 
  ADD FOREIGN KEY FK_VOIRIE_STATION (NUMSTATION)
      REFERENCES STATION (NUMSTATION) ;


ALTER TABLE EST_PROCHE 
  ADD FOREIGN KEY FK_EST_PROCHE_ARRET_DE_TRAM (CODEARRET)
      REFERENCES ARRET_DE_TRAM (CODEARRET) ;


ALTER TABLE EST_PROCHE 
  ADD FOREIGN KEY FK_EST_PROCHE_STATION (NUMSTATION)
      REFERENCES STATION (NUMSTATION) ;


ALTER TABLE RESERVER 
  ADD FOREIGN KEY FK_RESERVER_ABONNE (NUMABONNE)
      REFERENCES ABONNE (NUMABONNE) ;


ALTER TABLE RESERVER 
  ADD FOREIGN KEY FK_RESERVER_VEHICULE (NUMIMMAT)
      REFERENCES VEHICULE (NUMIMMAT) ;


ALTER TABLE RESERVER 
  ADD FOREIGN KEY FK_RESERVER_DATE (DATERESERVATION)
      REFERENCES DATE (DATERESERVATION) ;


ALTER TABLE TARIFS_KM 
  ADD FOREIGN KEY FK_TARIFS_KM_TYPE_VEHICULE (CODETYPE)
      REFERENCES TYPE_VEHICULE (CODETYPE) ;


ALTER TABLE TARIFS_KM 
  ADD FOREIGN KEY FK_TARIFS_KM_TRANCHE_KILOMETRIQUE (CODETRANCHEKM)
      REFERENCES TRANCHE_KILOMETRIQUE (CODETRANCHEKM) ;


ALTER TABLE TARIFS_KM 
  ADD FOREIGN KEY FK_TARIFS_KM_FORMULE (CODEFORMULE)
      REFERENCES FORMULE (CODEFORMULE) ;


ALTER TABLE APPARTIENT 
  ADD FOREIGN KEY FK_APPARTIENT_ARRET_DE_TRAM (CODEARRET)
      REFERENCES ARRET_DE_TRAM (CODEARRET) ;


ALTER TABLE APPARTIENT 
  ADD FOREIGN KEY FK_APPARTIENT_LIGNE_TRAM (CODELIGNE)
      REFERENCES LIGNE_TRAM (CODELIGNE) ;


ALTER TABLE TARIFS_HORAIRE 
  ADD FOREIGN KEY FK_TARIFS_HORAIRE_TYPE_VEHICULE (CODETYPE)
      REFERENCES TYPE_VEHICULE (CODETYPE) ;


ALTER TABLE TARIFS_HORAIRE 
  ADD FOREIGN KEY FK_TARIFS_HORAIRE_TRANCHE_HORAIRE (CODETRANCHEH)
      REFERENCES TRANCHE_HORAIRE (CODETRANCHEH) ;


ALTER TABLE TARIFS_HORAIRE 
  ADD FOREIGN KEY FK_TARIFS_HORAIRE_FORMULE (CODEFORMULE)
      REFERENCES FORMULE (CODEFORMULE) ;

