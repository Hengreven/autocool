<?php

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

    public static function recupDateReservation($login, $immat)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT DATERESERVATION FROM RESERVER WHERE NUMABONNE = :numAbo AND NUMIMMAT = :immat");
        $requetePrepa->bindParam(":numAbo", $numAbo);
        $requetePrepa->bindParam(":immat", $immat);
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        return $liste;

    }

    public static function recupNumImmat($login)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT DISTINCT NUMIMMAT FROM RESERVER WHERE NUMABONNE = :numAbo");
        $requetePrepa->bindParam(":numAbo", $numAbo);
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        return $liste;

    }


    /* Fonctions get */

    public static function getNumAbo($unlogin)
    {
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT NUMABONNE FROM UTILISATEUR WHERE LOGIN = :unuser");
        $requetePrepar->bindParam(":unuser", $unlogin);
        $requetePrepar->execute();
        $numAbo = $requetePrepar->fetch();

        return $numAbo['NUMABONNE'];
    }

    public static function getCodeFormuleForAbo($login)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT CODEFORMULE FROM ABONNE WHERE NUMABONNE = :numAbo");
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->execute();

        $codeFormule = $requetePrepar->fetch();
        return $codeFormule[0];
    }

    public static function getCodeType($immat)
    {
        $requetePrepar = DBConnex::getInstance()->prepare("SELECT CODETYPE FROM `CATEGORIE` WHERE CODECATEGORIE = (SELECT CODECATEGORIE FROM `VEHICULE` WHERE vehicule.NUMIMMAT = :numimmat);");
        $requetePrepar->bindParam(":numimmat", $immat);

        $requetePrepar->execute();

        $codeType = $requetePrepar->fetch();

        return $codeType[0];
    }

    /*Fonction pour vérifier le code pin */

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

    /*Fonction d'update*/

    public static function updateInfoEtatVoiture($etatvehicule, $propretevehicule, $login, $dateReservation, $immat)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `ETATVEHICULE` = :etatvehicule, `PROPRETEVEHICULE` = :propretevehicule WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = :immat AND `RESERVER`.`DATERESERVATION` = :dateReservation");
        $requetePrepar->bindParam(":etatvehicule", $etatvehicule);
        $requetePrepar->bindParam(":propretevehicule", $propretevehicule);
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->bindParam(":immat", $immat);
        $requetePrepar->bindParam(":dateReservation", $dateReservation);

        $requetePrepar->execute();
    }

    public static function setDateDebut($login, $dateReservation, $immat)
    {
        $now = date('Y-m-d H:i:s');
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `DATEDEBUT` = :now WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = :immat AND `RESERVER`.`DATERESERVATION` = :dateReservation");
        $requetePrepar->bindParam(":now", $now);
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->bindParam(":immat", $immat);
        $requetePrepar->bindParam(":dateReservation", $dateReservation);

        $requetePrepar->execute();

        return $now;
    }

    public static function setDateFin($dateFin, $login, $dateReservation, $immat)
    {
        $numAbo = self::getNumAbo($login);

        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `DATEFIN` = :now WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = :immat AND `RESERVER`.`DATERESERVATION` = :dateReservation");
        $requetePrepar->bindParam(":now", $dateFin);
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->bindParam(":immat", $immat);
        $requetePrepar->bindParam(":dateReservation", $dateReservation);

        $requetePrepar->execute();
    }

    public static function setNbKM($nbkms, $login, $dateReservation, $immat)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `NBKMS` = `NBKMS` + :nbkms WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = :immat AND `RESERVER`.`DATERESERVATION` = :dateReservation");
        $requetePrepar->bindParam(":nbkms", $nbkms);
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->bindParam(":immat", $immat);
        $requetePrepar->bindParam(":dateReservation", $dateReservation);

        $requetePrepar->execute();
    }

    public static function setMontantResa($montant, $login, $dateReservation, $immat)
    {
        $numAbo = self::getNumAbo($login);
        $requetePrepar = DBConnex::getInstance()->prepare("UPDATE `RESERVER` SET `MONTANTRESA` = :montant WHERE `RESERVER`.`NUMABONNE` = :numAbo AND `RESERVER`.`NUMIMMAT` = :immat AND `RESERVER`.`DATERESERVATION` = :dateReservation");
        $requetePrepar->bindParam(":montant", $montant);
        $requetePrepar->bindParam(":numAbo", $numAbo);
        $requetePrepar->bindParam(":immat", $immat);
        $requetePrepar->bindParam(":dateReservation", $dateReservation);

        $requetePrepar->execute();
    }

}
