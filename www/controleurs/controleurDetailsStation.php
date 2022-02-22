<?php
if(isset($_GET["station"])){
    $stationSelected = $_SESSION["listeStations"]->chercherStation($_GET["station"]);
}else{
    echo "erreur";
}
$detailsStation = StationDAO::detailsStation($stationSelected);
//var_dump($detailsStation);
if(get_class($detailsStation) == 'Voirie'){
    $formDetailsStation = new Formulaire('','','details','details');
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nom : ',''),$formDetailsStation->creerLabel($detailsStation->getVillestation() . ' - '. $detailsStation->getLieu(),'')),2);
    $formDetailsStation->ajouterComposantTab();


    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Type de station : ',''),$formDetailsStation->creerLabel("Voirie",'')),2);
    $formDetailsStation->ajouterComposantTab();


    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Adresse : ',''),$formDetailsStation->creerLabel($detailsStation->getAdresse(),'')),2);
    $formDetailsStation->ajouterComposantTab();


    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nombres de places totales : ',''),$formDetailsStation->creerLabel($detailsStation->getNbplaces(),'')),2);
    $formDetailsStation->ajouterComposantTab();
    foreach($detailsStation->getCapa() as $uneCapacite){
        $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Nombres de places ' . $uneCapacite['codetype'] . ': ',''),$formDetailsStation->creerLabel($uneCapacite["capacité"],'')),2);
        $formDetailsStation->ajouterComposantTab();
    }

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
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Type de station : ',''),$formDetailsStation->creerLabel("Parking",'')),2);
    $formDetailsStation->ajouterComposantTab();
    $formDetailsStation->ajouterComposantLigne($formDetailsStation->concactComposants($formDetailsStation->creerLabel('Type de parking : ',''),$formDetailsStation->creerLabel($detailsStation->getType(),'')),2);
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