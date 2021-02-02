<?php
if(isset($_GET["station"])){
    $stationSelected = $_SESSION["listeStations"]->chercherStation($_GET["station"]);
}else{
    echo "erreur";
}
$detailsStation = StationDAO::detailsStation($stationSelected);
if(get_class($detailsStation) == 'Voirie'){
//    var_dump($detailsStation);
    $formDetailsStation = new Formulaire('','','details','details');
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nom : ',''),$formDetailsStation->creerLabel($detailsStation->getVillestation() . ' - '. $detailsStation->getLieu(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Adresse : ',''),$formDetailsStation->creerLabel($detailsStation->getAdresse(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nombres de places : ',''),$formDetailsStation->creerLabel($detailsStation->getNbplaces(),'')),2);
    $formDetailsStation->ajouterComposantTab();

    $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("Liste des arret proches : ",''),2);
    $formDetailsStation->ajouterComposantTab();

    //recuperation des arret proche
    $lstArret = $detailsStation->getArretProche();
    foreach($lstArret as $unArret){
        $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("    - ".$unArret->getVilleArret() . " - " . $unArret->getNomArret() . " - Ligne " . $unArret->getLigneArret(),''),2);
        $formDetailsStation->ajouterComposantTab();
    }

    $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("Liste des véhicules de la station : ",''),2);
    $formDetailsStation->ajouterComposantTab();
    //recuperation des vehicules
    $lstVehicule = $detailsStation->getVehicules();
    foreach($lstVehicule as $unVehicule){
        $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("    - ".$unVehicule->getNumImmat() . " - " . $unVehicule->getLibelleCateg() . " - " . $unVehicule->getKilometrage() . "kms",''),2);
        $formDetailsStation->ajouterComposantTab();
    }
    $formDetailsStation->creerFormulaire();
}else if (get_class($detailsStation)=='Parking'){
//    var_dump($detailsStation);
    $formDetailsStation = new Formulaire('','','details','details');
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nom : ',''),$formDetailsStation->creerLabel($detailsStation->getVillestation() . ' - '. $detailsStation->getLieu(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nom du parking : ',''),$formDetailsStation->creerLabel($detailsStation->getNomParking(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Niveau : ',''),$formDetailsStation->creerLabel($detailsStation->getNiveau(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("Liste des arret proches : ",''),2);
    $formDetailsStation->ajouterComposantTab();
    //recuperation des arret proche
    $lstArret = $detailsStation->getArretProche();
    foreach($lstArret as $unArret){
        $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("    - ".$unArret->getVilleArret() . " - " . $unArret->getNomArret() . " - Ligne " . $unArret->getLigneArret(),''),2);
        $formDetailsStation->ajouterComposantTab();
    }

    $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("Liste des véhicules de la station : ",''),2);
    $formDetailsStation->ajouterComposantTab();
    //recuperation des vehicules
    $lstVehicule = $detailsStation->getVehicules();
    foreach($lstVehicule as $unVehicule){
        $formDetailsStation->ajouterComposantLigne($formDetailsStation->creerLabel("    - ".$unVehicule->getNumImmat() . " - " . $unVehicule->getLibelleCateg() . " - " . $unVehicule->getKilometrage() . "kms",''),2);
        $formDetailsStation->ajouterComposantTab();
    }
    $formDetailsStation->creerFormulaire();
}

include_once "vues/stations/vueDetailsStation.php";