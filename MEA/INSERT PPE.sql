insert into droit (CODEDROIT, LIBELLEDROIT) value ('adm','administateur');

INSERT INTO autocool.utilisateur (LOGIN, CODEDROIT, NUMABONNE, MDP, SEXE, EMAIL, NOM, PRENOM, RUE, VILLE, CODEPOSTAL, DATENAISSANCE, CODEPIN) VALUES ('jmazagot', 'adm', null, '21232f297a57a5a743894a0e4a801fc3', null, null, null, null, null, null, null, null,1234);

INSERT INTO STATION (VILLESTATION , LIEU)
VALUES
('Bordeaux', 'Chartrons'),
('Bordeaux', 'Cité Mondiale'),
('Bordeaux', 'Barrière St Médard'),
('Bordeaux', 'Quinconces'),
('Bordeaux', 'Tourny'),
('Bordeaux', 'Jaurès'),
('Bordeaux', 'Stalingrad'),
('Bordeaux', 'Gaviniès'),
('Bordeaux', 'Mériadeck'),
('Bordeaux', 'Pey Berland'),
('Bordeaux', 'Musée Aquitaine'),
('Bordeaux', 'Porte Bourgogne'),
('Bordeaux', 'Victor Hugo'),
('Bordeaux', 'Sainte Croix'),
('Bordeaux', 'Gavinies'),
('Bordeaux', 'Bergonié'),
('Bordeaux', 'Nansouty'),
('Bègles', 'Terres Neuves'),
('Bègles', 'Mairie'),
('Mérignac', 'Centre'),
('Talence', 'Forum'),
('Talence', 'BEM'),
('Cenon', 'Gare'),
('Pessac', 'Gare');


INSERT INTO VOIRIE (NUMSTATION, ADRESSE, NBPLACES,VILLESTATION,LIEU)
VALUES
(1, '17 rue Sicard', 2, 'Bordeaux', 'Chartrons'),
(3, '274 Bd Wilson', 2, 'Bordeaux', 'Barrière St Médard'),
(5, 'Tourny', 2, 'Bordeaux', 'Tourny'),
(6, 'place Jean Jaures', 2, 'Bordeaux', 'Jean Jaures'),
(7, 'Stalingrad', 3, 'Bordeaux', 'Stalingrad'),
(8, '37 av Larminat', 2, 'Bordeaux', 'Gaviniès'),
(11, '12 cours Pasteur', 2, 'Bordeaux', 'Musée Aquitaine'),
(12, '11 cours Victor Hugo', 3, 'Bordeaux', 'Porte Bourgogne'),
(14, 'Eglise', 4, 'Bordeaux', 'Saint Croix'),
(15, '37 avenue Gal de Larminat', 5, 'Bordeaux', 'Gavinies'),
(16, 'Cours Argonne', 6, 'Bordeaux', 'Bergonié'),
(17, '244 cours de Yser', 3, 'Bordeaux', 'Nansouty'),
(18, 'allée des Pruniers', 4, 'Bègles', 'Terres Neuves'),
(19, 'angle Camelle/René Cachin', 1, 'Bègles', 'Mairie'),
(20, '14 avenue Mal Leclerc', 2, 'Mérignac', 'Centre'),
(21, 'Place de l Eglise', 3, 'Talence', 'Forum'),
(23, '69 acenue Jean Jaurès', 4, 'Cenon', 'Gare'),
(24, 'devant la gare SNCF', 5, 'Pessac', 'Gare');


INSERT INTO PARKING (NUMSTATION, NOMPARKING,NIVEAU,VILLESTATION,LIEU)
VALUES
(2, 'Parking cité mondiale', -2, 'Bordeaux', 'Cité Mondiale'),
(4, 'Parking terminal bus', 0, 'Bordeaux', 'Quinconces'),
(9, 'Parking CC Mériadeck', 0, 'Bordeaux', 'Mériadeck'),
(10, 'Parking Pey Berland', -3, 'Bordeaux', 'Pey Berland'),
(13, 'Parking Victor Hugo', 4, 'Bordeaux', 'Victor Hugo'),
(22, 'Parking ecole management', 0 ,'Bordeaux', 'BEM');



INSERT INTO TYPE_VEHICULE (CODETYPE, LIBELLETYPE)
VALUES
('S', 'SMALL'),
('M' ,'MEDIUM'),
('L' ,'LARGE');


INSERT INTO CATEGORIE (CODECATEGORIE, CODETYPE, LIBELLECATEGORIE)
VALUES
('BR7', 'L', 'Break 7 places'),
('CI4', 'S', 'City 4 places'),
('PL5', 'M', 'Poly 5 places');


INSERT INTO VEHICULE (NUMIMMAT, CODECATEGORIE,NUMSTATION,KILOMETRAGE,NIVEAUESSENCE)
VALUES
('BP-044-GH','BR7',1,150000,50),
('BP-044-GF','CI4',4,150000,50)









