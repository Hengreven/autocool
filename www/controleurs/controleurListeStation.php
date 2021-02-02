<?php
$_SESSION["listeStations"] = new Stations(StationDAO::lesStations());
$menuStations = new Menu("listeStations");
foreach($_SESSION["listeStations"]->getStations() as $uneSation){
    $id = $uneSation->getNumstation();
    $Nom = $uneSation->getVilleStation() . "-" . $uneSation->getLieu();
    $menuStations->ajouterComposant($menuStations->creerItemLien($id,$Nom));
}
$menuStations = $menuStations->creerMenuStation();

include_once "vues/stations/vueListeStations.php";