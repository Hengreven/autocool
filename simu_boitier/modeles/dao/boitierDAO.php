<?php

include_once "dBConnex.php";

class boitierDAO
{

    public static function recupInfoUtilisateur()
    {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT LOGIN, CODEPIN FROM UTILISATEUR");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($liste)) {
            foreach ($liste as $utilisateur) {
                $unUtilisateur = new Utilisateur();
                $unUtilisateur->hydrate($utilisateur);
                $result[] = $unUtilisateur;
            }
        }
        return $result;
    }

    public static function getNumAbo($unlogin) {
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT NUMABONNE FROM UTILISATEUR WHERE LOGIN = :unuser");
        $requetePrepar->bindParam(":unuser", $unlogin);
        $requetePrepar->execute();
        $numAbo = $requetePrepar->fetch();
        return $numAbo[0];
    }

    public static function verifPIN($unUser, $unPIN)
    {
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

    public static function updateInfoEtatVoiture($etatvehicule, $propretevehicule, $login)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `ETATVEHICULE` = :etatvehicule, `PROPRETEVEHICULE` = :propretevehicule WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = 'AA-123-AA' AND `RESERVER`.`DATERESERVATION` = '2021-01-13'");
        $requetePrepar->bindParam(":etatvehicule", $etatvehicule);
        $requetePrepar->bindParam(":propretevehicule", $propretevehicule);
        $requetePrepar->bindParam(":numAbo", $numAbo);

        $requetePrepar->execute();
    }

    public static function setDateDebut($login) { //YYYY-MM-DD HH:MI:SS
        $now = date('Y-m-d H:i:s');
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `DATEDEBUT` = :now WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = 'AA-123-AA' AND `RESERVER`.`DATERESERVATION` = '2021-01-13'");
        $requetePrepar->bindParam(":now", $now);
        $requetePrepar->bindParam(":numAbo", $numAbo);

        $requetePrepar->execute();

        return $now;
    }
    public static function setDateFin($dateFin, $login) { //YYYY-MM-DD HH:MI:SS
        //$now = date('Y-m-d H:i:s');
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `DATEFIN` = :now WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = 'AA-123-AA' AND `RESERVER`.`DATERESERVATION` = '2021-01-13'");
        $requetePrepar->bindParam(":now", $dateFin);
        $requetePrepar->bindParam(":numAbo", $numAbo);

        $requetePrepar->execute();
    }

    public static function setNbKM($nbkms, $login)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `NBKMS` = `NBKMS` + :nbkms WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = 'AA-123-AA' AND `RESERVER`.`DATERESERVATION` = '2021-01-13'");
        $requetePrepar->bindParam(":nbkms", $nbkms);
        $requetePrepar->bindParam(":numAbo", $numAbo);

        $requetePrepar->execute();
    }

    public static function setMontantResa($montant, $login)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `MONTANTRESA` = :montant WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = 'AA-123-AA' AND `RESERVER`.`DATERESERVATION` = '2021-01-13'");
        $requetePrepar->bindParam(":montant", $montant);
        $requetePrepar->bindParam(":numAbo", $numAbo);

        $requetePrepar->execute();
    }
}
