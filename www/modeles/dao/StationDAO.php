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

    public static function detailsStation(Station $uneStation){
        $requetePrepaVoirie = DBConnex::getInstance()->prepare("SELECT * FROM VOIRIE WHERE numstation = :numstation");
        $numStation = $uneStation->getNumstation();
        $requetePrepaVoirie->bindParam("numstation",$numStation);
        $requetePrepaVoirie->execute();
        $tmpVoirie = $requetePrepaVoirie->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($tmpVoirie)){
            $voirie = new Voirie();
            $voirie->hydrate($tmpVoirie[0]);
            //TODO : get arret proche;
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
                return $parking;
            }else{
                return 'erreur';
            }
        }
    }
}