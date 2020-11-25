<?php

include_once "dBConnex.php";

class VehiculeDAO {

    public static function lireVehicule() {
        $requetePrepa = DBConnex::getInstance()->prepare("select * from VEHICULE");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);        
        if(!empty($liste)){
            foreach($liste as $vehicule){
                $unVehicule = new Vehicule();
                $unVehicule->hydrate($vehicule);
                $result[] = $unVehicule;
            }
        }
        return $result;
    }
}

?>