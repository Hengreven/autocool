<?php
class StationDAO
{
    public static function lesStations(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT * FROM STATION order by villestation");

        $requetePrepa->execute();
        $tmp = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($tmp)){
            foreach($tmp as $station){
                $uneStation = new Station();
                $uneStation->hydrate($station);
                $result[] = $uneStation;
            }
        }
        return $result;
    }

    public static function lesStationsFiltre($arret,$categ){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("select distinct station.* from station inner join est_proche ep on station.NUMSTATION = ep.NUMSTATION inner join vehicule v on station.NUMSTATION = v.NUMSTATION where (v.CODECATEGORIE = :code_categ OR :code_categ = -1) and (ep.CODEARRET = :code_arret or :code_arret = -1)");
        $requetePrepa->bindParam("code_categ",$categ);
        $requetePrepa->bindParam("code_arret",$arret);
        $requetePrepa->execute();
        $tmp = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($tmp)){
            foreach($tmp as $station){
                $uneStation = new Station();
                $uneStation->hydrate($station);
                $result[] = $uneStation;
            }
        }
        return $result;
    }

    public static function detailsStation(Station $uneStation){
        $requetePrepaVoirie = DBConnex::getInstance()->prepare("SELECT * FROM VOIRIE WHERE numstation = :numstation");
        $numStation = $uneStation->getNumstation();
        $requetePrepaVoirie->bindParam("numstation",$numStation);
        $requetePrepaVoirie->execute();
        $tmpVoirie = $requetePrepaVoirie->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($tmpVoirie)){
            $voirie = new Voirie();
            $voirie->hydrate($tmpVoirie[0]);

            //recup des arret de tram proches
            $requetePrepaArretProche = DBConnex::getInstance()->prepare("SELECT NOMARRET,VILLEARRET,appartient.CODELIGNE FROM arret_de_tram , appartient,ligne_tram,est_proche WHERE appartient.CODEARRET = arret_de_tram.CODEARRET AND appartient.CODELIGNE = ligne_tram.CODELIGNE AND arret_de_tram.CODEARRET = est_proche.CODEARRET AND NUMSTATION = :numstation");
            $requetePrepaArretProche->bindParam("numstation",$numStation);
            $requetePrepaArretProche->execute();
            $tmpArretTram = $requetePrepaArretProche->fetchAll(PDO::FETCH_ASSOC);
            $lstArret = [];
            if(!empty($tmpArretTram)){
                foreach($tmpArretTram as $arret) {
                    $unArret = new Arret();
                    $unArret->hydrate($arret);
                    $unArret->setLigneArret($arret['CODELIGNE']);
                    $lstArret[] = $unArret;
                }
            }
            $voirie->setArretProche($lstArret);


            $requetePrepaVehicules = DBConnex::getInstance()->prepare("select NUMIMMAT, KILOMETRAGE, NIVEAUESSENCE, LIBELLECATEGORIE from vehicule,categorie where NUMSTATION=:numstation AND vehicule.CODECATEGORIE = categorie.CODECATEGORIE");
            $requetePrepaVehicules->bindParam("numstation",$numStation);
            $requetePrepaVehicules->execute();
            $tmpVehicules = $requetePrepaVehicules->fetchAll(PDO::FETCH_ASSOC);
            $lstVehicules = [];
            if(!empty($tmpVehicules)){
                foreach($tmpVehicules as $vehicule){
                    $unVehicule = new Voiture();
                    $unVehicule->hydrate($vehicule);
                    $unVehicule->setLibelleCateg($vehicule["LIBELLECATEGORIE"]);
                    $lstVehicules[] = $unVehicule;
                }
            }
            $voirie->setVehicules($lstVehicules);
            $requetePrepaCapa = DBConnex::getInstance()->prepare("select codetype,capacité from capacité,voirie where capacité.numvoirie = voirie.numvoirie  and numstation=:numstation");
            $requetePrepaCapa->bindParam("numstation",$numStation);


            $requetePrepaCapa->execute();
            $tmpCapaS = $requetePrepaCapa->fetchAll(PDO::FETCH_ASSOC);
            $voirie->setCapa($tmpCapaS);

            $requetePrepaCapa = DBConnex::getInstance()->prepare("select sum(capacité) as total from capacité,voirie where capacité.numvoirie = voirie.numvoirie  and numstation=:numstation");
            $requetePrepaCapa->bindParam("numstation",$numStation);
            $requetePrepaCapa->execute();

            $tmpCapaTotale = $requetePrepaCapa->fetch(PDO::FETCH_ASSOC);

            $voirie->setNbplaces($tmpCapaTotale['total']);
            return $voirie;
        }else{
            $requetePrepaParking = DBConnex::getInstance()->prepare("SELECT * FROM PARKING WHERE numstation = :numstation");
            $numStation = $uneStation->getNumstation();
            $requetePrepaParking->bindParam("numstation",$numStation);
            $requetePrepaParking->execute();
            $tmpParking = $requetePrepaParking->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($tmpParking)){
                $parking = new Parking();
                $parking->hydrate($tmpParking[0]);
                $requetePrepaArretProche = DBConnex::getInstance()->prepare("SELECT NOMARRET,VILLEARRET,appartient.CODELIGNE FROM arret_de_tram , appartient,ligne_tram,est_proche WHERE appartient.CODEARRET = arret_de_tram.CODEARRET AND appartient.CODELIGNE = ligne_tram.CODELIGNE AND arret_de_tram.CODEARRET = est_proche.CODEARRET AND NUMSTATION = :numstation");
                $requetePrepaArretProche->bindParam("numstation",$numStation);
                $requetePrepaArretProche->execute();
                $tmpArretTram = $requetePrepaArretProche->fetchAll(PDO::FETCH_ASSOC);
                $lstArret = [];
                if(!empty($tmpArretTram)){
                    foreach($tmpArretTram as $arret) {
                        $unArret = new Arret();
                        $unArret->hydrate($arret);
                        $unArret->setLigneArret($arret['CODELIGNE']);
                        $lstArret[] = $unArret;
                    }
                }
                $parking->setArretProche($lstArret);


                $requetePrepaVehicules = DBConnex::getInstance()->prepare("select NUMIMMAT, KILOMETRAGE, NIVEAUESSENCE, LIBELLECATEGORIE from vehicule,categorie where NUMSTATION=:numstation AND vehicule.CODECATEGORIE = categorie.CODECATEGORIE");
                $requetePrepaVehicules->bindParam("numstation",$numStation);
                $requetePrepaVehicules->execute();
                $tmpVehicules = $requetePrepaVehicules->fetchAll(PDO::FETCH_ASSOC);
                $lstVehicules = [];
                if(!empty($tmpVehicules)){
                    foreach($tmpVehicules as $vehicule){
                        $unVehicule = new Voiture();
                        $unVehicule->hydrate($vehicule);
                        $unVehicule->setLibelleCateg($vehicule["LIBELLECATEGORIE"]);
                        $lstVehicules[] = $unVehicule;
                    }
                }
                $parking->setVehicules($lstVehicules);
                return $parking;
            }else{
                return 'erreur';
            }
        }
    }
}