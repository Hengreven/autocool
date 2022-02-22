<?php
class ArretTramDAO
{
    public static function getLesArret(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT at.* FROM autocool.EST_PROCHE inner join autocool.arret_de_tram at on at.codearret = EST_PROCHE.codearret");

        $requetePrepa->execute();
        $tmp = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($tmp)){
            foreach($tmp as $arret){
                $unArret = new Arret();
                $unArret->hydrate($arret);
                $result[] = $unArret;
            }
        }
        return $result;
    }
}