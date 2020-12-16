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
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT CODEPIN FROM UTILISATEUR WHERE login = 'jmazagot'");
        $requetePrepar->bindParam(":unuser", $unUser);
        var_dump($requetePrepar->fetch());
        $requetePrepar->execute();

        $codePIN = $requetePrepar->fetch();

        // var_dump($codePIN);
        // var_dump("Salut");
        // var_dump($unPIN);

        if ($codePIN == $unPIN) {
            return true;
        } else {
            return false;
        }
    }
}

?>