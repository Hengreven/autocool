<?php

include_once "dBConnex.php";

class boitierDAO {

    public static function recupInfoUtilisateur() {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT LOGIN, CODEPIN FROM UTILISATEUR");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);        
        if(!empty($liste)){
            foreach($liste as $utilisateur){
                $unUtilisateur = new Utilisateur();
                $unUtilisateur->hydrate($utilisateur);
                $result[] = $unUtilisateur;
            }
        }
        return $result;
    }

    public static function verifPIN($unUser, $unPIN) {
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT CODEPIN FROM UTILISATEUR WHERE login = :unuser");
        $requetePrepar->bindParam(":unuser", $unUser);
        $requetePrepar->execute();

        $codePIN = $requetePrepar->fetch();

        if ($codePIN[0] == $unPIN) {
            return true;
        } else {
            return false;
        }
    }
}

?>