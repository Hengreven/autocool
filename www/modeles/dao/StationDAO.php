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
}