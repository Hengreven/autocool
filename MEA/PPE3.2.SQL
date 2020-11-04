DROP DATABASE IF EXISTS AUTOCOOL;

CREATE DATABASE IF NOT EXISTS AUTOCOOL;
USE AUTOCOOL;
# -----------------------------------------------------------------------------
#       TABLE : ARRET_DE_TRAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ARRET_DE_TRAM
 (
   CODEARRET VARCHAR(128) NOT NULL  ,
   NOMARRET VARCHAR(128) NULL  ,
   VILLEARRET VARCHAR(128) NULL  
   , PRIMARY KEY (CODEARRET) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DROIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DROIT
 (
   CODEDROIT VARCHAR(128) NOT NULL  ,
   LIBELLEDROIT VARCHAR(128) NULL  
   , PRIMARY KEY (CODEDROIT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   LOGIN VARCHAR(128) NOT NULL  ,
   MDP VARCHAR(128) NULL  ,
   SEXE CHAR(1) NULL  ,
   EMAIL VARCHAR(128) NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  ,
   RUE VARCHAR(128) NULL  ,
   VILLE VARCHAR(128) NULL  ,
   CODEPOSTAL VARCHAR(128) NULL  ,
   DATENAISSANCE DATE NULL  
   , PRIMARY KEY (LOGIN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE_VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_VEHICULE
 (
   CODETYPE VARCHAR(128) NOT NULL  ,
   LIBELLETYPE VARCHAR(128) NULL  
   , PRIMARY KEY (CODETYPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DATE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DATE
 (
   DATERESERVATION DATE NOT NULL  
   , PRIMARY KEY (DATERESERVATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ABONNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ABONNE
 (
   NUMABONNE CHAR(32) NOT NULL  ,
   LOGIN VARCHAR(128) NOT NULL  ,
   NUMPERMIS VARCHAR(128) NULL  ,
   LIEUOBTENTIONPERMIS VARCHAR(128) NULL  ,
   MODEPAIEMENT VARCHAR(128) NULL  ,
   MODEFACTURATION VARCHAR(128) NULL  ,
   TITULAIRECOMPTE VARCHAR(128) NULL  ,
   NUMCOMPTECLE VARCHAR(128) NULL  ,
   NOMBANQUE VARCHAR(128) NULL  ,
   BANQUEGUICHET VARCHAR(128) NULL  ,
   IBAN VARCHAR(128) NULL  ,
   BIC VARCHAR(128) NULL  ,
   JUSTIFICATIFDEDOMICILE BOOL NULL  ,
   SITUATIONASSURANCE BOOL NULL  ,
   DEPOTDEGARANTIE BOOL NULL  ,
   RIB BOOL NULL  ,
   CHEMINDOSSIERABONNE VARCHAR(128) NULL  ,
   MDP VARCHAR(128) NULL  ,
   SEXE CHAR(1) NULL  ,
   EMAIL VARCHAR(128) NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  ,
   RUE VARCHAR(128) NULL  ,
   VILLE VARCHAR(128) NULL  ,
   CODEPOSTAL VARCHAR(128) NULL  ,
   DATENAISSANCE DATE NULL  
   , PRIMARY KEY (NUMABONNE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ABONNE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ABONNE_UTILISATEUR
     ON ABONNE (LOGIN ASC);

# -----------------------------------------------------------------------------
#       TABLE : STATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STATION
 (
   NUMSTATION CHAR(32) NOT NULL  ,
   VILLESTATION VARCHAR(128) NULL  ,
   LIEU VARCHAR(128) NULL  
   , PRIMARY KEY (NUMSTATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULE
 (
   NUMIMMAT VARCHAR(128) NOT NULL  ,
   CODECATEGORIE VARCHAR(128) NOT NULL  ,
   NUMSTATION CHAR(32) NOT NULL  ,
   KILOMETRAGE SMALLINT(1) NULL  ,
   NIVEAUESSENCE SMALLINT(1) NULL  
   , PRIMARY KEY (NUMIMMAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VEHICULE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VEHICULE_CATEGORIE
     ON VEHICULE (CODECATEGORIE ASC);

CREATE  INDEX I_FK_VEHICULE_STATION
     ON VEHICULE (NUMSTATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : TRANCHE_HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TRANCHE_HORAIRE
 (
   CODETRANCHEH VARCHAR(128) NOT NULL  ,
   LIBELLETRANCHEH VARCHAR(128) NULL  
   , PRIMARY KEY (CODETRANCHEH) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TRANCHE_KILOMETRIQUE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TRANCHE_KILOMETRIQUE
 (
   CODETRANCHEKM VARCHAR(128) NOT NULL  ,
   LIBELLETRANCHEKM VARCHAR(128) NULL  
   , PRIMARY KEY (CODETRANCHEKM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARKING
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARKING
 (
   NUMPARKING CHAR(32) NOT NULL  ,
   NUMSTATION CHAR(32) NOT NULL  ,
   NOMPARKING VARCHAR(128) NULL  ,
   NIVEAU SMALLINT(1) NULL  ,
   VILLESTATION VARCHAR(128) NULL  ,
   LIEU VARCHAR(128) NULL  
   , PRIMARY KEY (NUMPARKING) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARKING
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARKING_STATION
     ON PARKING (NUMSTATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   CODECATEGORIE VARCHAR(128) NOT NULL  ,
   CODETYPE VARCHAR(128) NOT NULL  ,
   LIBELLECATEGORIE VARCHAR(128) NULL  
   , PRIMARY KEY (CODECATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CATEGORIE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CATEGORIE_TYPE_VEHICULE
     ON CATEGORIE (CODETYPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : VOIRIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VOIRIE
 (
   NUMVOIRIE CHAR(32) NOT NULL  ,
   NUMSTATION CHAR(32) NOT NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   NBPLACES SMALLINT(1) NULL  ,
   VILLESTATION VARCHAR(128) NULL  ,
   LIEU VARCHAR(128) NULL  
   , PRIMARY KEY (NUMVOIRIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VOIRIE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VOIRIE_STATION
     ON VOIRIE (NUMSTATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : LIGNE_TRAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIGNE_TRAM
 (
   CODELIGNE VARCHAR(128) NOT NULL  ,
   VILLELIGNE VARCHAR(128) NULL  
   , PRIMARY KEY (CODELIGNE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : FORMULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMULE
 (
   CODEFORMULE VARCHAR(128) NOT NULL  ,
   LIBELLEFORMULE VARCHAR(128) NULL  ,
   FRAISADHESION DECIMAL(13,2) NULL  ,
   TARIFMENSUEL DECIMAL(13,2) NULL  ,
   PARTSSOCIALE INTEGER(2) NULL  ,
   DEPOTGARANTIE DECIMAL(13,2) NULL  ,
   CAUTION DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODEFORMULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DF4
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DF4
 (
   NUMABONNE CHAR(32) NOT NULL  ,
   CODEFORMULE VARCHAR(128) NOT NULL  
   , PRIMARY KEY (NUMABONNE,CODEFORMULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DF4
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DF4_ABONNE
     ON DF4 (NUMABONNE ASC);

CREATE  INDEX I_FK_DF4_FORMULE
     ON DF4 (CODEFORMULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : EST_PROCHE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EST_PROCHE
 (
   CODEARRET VARCHAR(128) NOT NULL  ,
   NUMSTATION CHAR(32) NOT NULL  
   , PRIMARY KEY (CODEARRET,NUMSTATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EST_PROCHE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EST_PROCHE_ARRET_DE_TRAM
     ON EST_PROCHE (CODEARRET ASC);

CREATE  INDEX I_FK_EST_PROCHE_STATION
     ON EST_PROCHE (NUMSTATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : DF5
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DF5
 (
   CODEDROIT VARCHAR(128) NOT NULL  ,
   LOGIN VARCHAR(128) NOT NULL  
   , PRIMARY KEY (CODEDROIT,LOGIN) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DF5
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DF5_DROIT
     ON DF5 (CODEDROIT ASC);

CREATE  INDEX I_FK_DF5_UTILISATEUR
     ON DF5 (LOGIN ASC);

# -----------------------------------------------------------------------------
#       TABLE : RESERVER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESERVER
 (
   NUMABONNE CHAR(32) NOT NULL  ,
   NUMIMMAT VARCHAR(128) NOT NULL  ,
   DATERESERVATION DATE NOT NULL  ,
   DATEDEBUT DATETIME NULL  ,
   DATEFIN DATETIME NULL  ,
   NBKMS SMALLINT(1) NULL  ,
   MONTANTRESA REAL(5,2) NULL  ,
   ETATVEHICULE VARCHAR(128) NULL  ,
   PROPRETEVEHICULE VARCHAR(128) NULL  
   , PRIMARY KEY (NUMABONNE,NUMIMMAT,DATERESERVATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RESERVER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RESERVER_ABONNE
     ON RESERVER (NUMABONNE ASC);

CREATE  INDEX I_FK_RESERVER_VEHICULE
     ON RESERVER (NUMIMMAT ASC);

CREATE  INDEX I_FK_RESERVER_DATE
     ON RESERVER (DATERESERVATION ASC);

# -----------------------------------------------------------------------------
#       TABLE : TARIFS_KM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TARIFS_KM
 (
   CODETYPE VARCHAR(128) NOT NULL  ,
   CODETRANCHEKM VARCHAR(128) NOT NULL  ,
   CODEFORMULE VARCHAR(128) NOT NULL  ,
   PRIX DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODETYPE,CODETRANCHEKM,CODEFORMULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TARIFS_KM
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TARIFS_KM_TYPE_VEHICULE
     ON TARIFS_KM (CODETYPE ASC);

CREATE  INDEX I_FK_TARIFS_KM_TRANCHE_KILOMETRIQUE
     ON TARIFS_KM (CODETRANCHEKM ASC);

CREATE  INDEX I_FK_TARIFS_KM_FORMULE
     ON TARIFS_KM (CODEFORMULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPARTIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTIENT
 (
   CODEARRET VARCHAR(128) NOT NULL  ,
   CODELIGNE VARCHAR(128) NOT NULL  
   , PRIMARY KEY (CODEARRET,CODELIGNE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTIENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTIENT_ARRET_DE_TRAM
     ON APPARTIENT (CODEARRET ASC);

CREATE  INDEX I_FK_APPARTIENT_LIGNE_TRAM
     ON APPARTIENT (CODELIGNE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TARIFS_HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TARIFS_HORAIRE
 (
   CODETYPE VARCHAR(128) NOT NULL  ,
   CODETRANCHEH VARCHAR(128) NOT NULL  ,
   CODEFORMULE VARCHAR(128) NOT NULL  ,
   PRIX DECIMAL(13,2) NULL  
   , PRIMARY KEY (CODETYPE,CODETRANCHEH,CODEFORMULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TARIFS_HORAIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TARIFS_HORAIRE_TYPE_VEHICULE
     ON TARIFS_HORAIRE (CODETYPE ASC);

CREATE  INDEX I_FK_TARIFS_HORAIRE_TRANCHE_HORAIRE
     ON TARIFS_HORAIRE (CODETRANCHEH ASC);

CREATE  INDEX I_FK_TARIFS_HORAIRE_FORMULE
     ON TARIFS_HORAIRE (CODEFORMULE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ABONNE 
  ADD FOREIGN KEY FK_ABONNE_UTILISATEUR (LOGIN)
      REFERENCES UTILISATEUR (LOGIN) ;


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


ALTER TABLE DF4 
  ADD FOREIGN KEY FK_DF4_ABONNE (NUMABONNE)
      REFERENCES ABONNE (NUMABONNE) ;


ALTER TABLE DF4 
  ADD FOREIGN KEY FK_DF4_FORMULE (CODEFORMULE)
      REFERENCES FORMULE (CODEFORMULE) ;


ALTER TABLE EST_PROCHE 
  ADD FOREIGN KEY FK_EST_PROCHE_ARRET_DE_TRAM (CODEARRET)
      REFERENCES ARRET_DE_TRAM (CODEARRET) ;


ALTER TABLE EST_PROCHE 
  ADD FOREIGN KEY FK_EST_PROCHE_STATION (NUMSTATION)
      REFERENCES STATION (NUMSTATION) ;


ALTER TABLE DF5 
  ADD FOREIGN KEY FK_DF5_DROIT (CODEDROIT)
      REFERENCES DROIT (CODEDROIT) ;


ALTER TABLE DF5 
  ADD FOREIGN KEY FK_DF5_UTILISATEUR (LOGIN)
      REFERENCES UTILISATEUR (LOGIN) ;


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

