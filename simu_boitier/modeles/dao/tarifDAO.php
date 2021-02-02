<?php


class tarifDAO
{

    public static function calculMontant($categ_voiture, $dateDebut, $dateFin, $formuleAbonnement, $distanceKM) {


        $hours = self::getNbHoursBetweenTwoDates($dateDebut, $dateFin);

        $tarif_horaire = self::recupTarifHoraire($categ_voiture, $hours, $formuleAbonnement);
        $tarif_km = self::recupTarifKM($categ_voiture, $distanceKM, $formuleAbonnement);

        $tarif_totale = 0;

        switch ($hours) {
            case ($hours < 24):
                $tarif_totale = $tarif_horaire*$hours;
                break;
            case ($hours < 168 ):
                $tarif_totale = $tarif_horaire*($hours/24);
                break;
            case ($hours >= 168):
                $tarif_totale = $tarif_horaire*($hours/168);
                break;
        }

        $tarif_totale =$tarif_totale + $tarif_km*$distanceKM;

        return $tarif_totale;


    }

    public static function getNbHoursBetweenTwoDates($dateDebut, $dateFin) {
        $date1 = new DateTime($dateDebut);
        $date2 = new DateTime($dateFin);

        $diff = $date2->diff($date1);

        $hours = $diff->h;
        $hours = $hours + ($diff->days*24);

        return $hours;
    }

    public static function recupTarifHoraire($categ_voiture, $hours, $formule) {

        switch ($hours) {
            case ($hours < 24):
                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_horaire` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEH`= 'H' AND `CODEFORMULE`= :formule");
                break;

            case ($hours < 168 ):
                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_horaire` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEH`= 'J' AND `CODEFORMULE`= :formule");
                break;

            case ($hours >= 168):
                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_horaire` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEH`= 'S' AND `CODEFORMULE`= :formule");
                break;
        }

        $requetePrepar->bindParam(":categ_voiture", $categ_voiture);
        $requetePrepar->bindParam(":formule", $formule);
        $requetePrepar->execute();

        $tarif = $requetePrepar->fetch();
        return $tarif[0];
    }

    public static function recupTarifKM($categ_voiture, $nbKm, $formule) {

        switch ($nbKm) {
            case ($nbKm < 50):
                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_km` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEKM`= 'M50' AND `CODEFORMULE`= :formule");
                break;

            case ($nbKm < 200 ):
                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_km` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEKM`= 'M20' AND `CODEFORMULE`= :formule");
                break;

            case ($nbKm >= 200):

                $requetePrepar = DBConnex::getInstance()->prepare("SELECT `PRIX` FROM `tarifs_km` WHERE `CODETYPE`=:categ_voiture AND `CODETRANCHEKM`= 'P20' AND `CODEFORMULE`= :formule");
                break;
        }

        $requetePrepar->bindParam(":categ_voiture", $categ_voiture);
        $requetePrepar->bindParam(":formule", $formule);
        $requetePrepar->execute();

        $tarif = $requetePrepar->fetch();

        return $tarif[0];
    }

    public static function getCodeTypeVehicule()
    {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT CODETYPE, URL FROM CATEGORIE");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        return $liste;
    }

    public static function getFormuleAbonnement()
    {
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT CODEFORMULE, LIBELLEFORMULE FROM FORMULE");
        $requetePrepa->execute();
        $liste = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        return $liste;
    }


}