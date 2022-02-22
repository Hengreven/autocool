<?php
$listeArret = ArretTramDAO::getLesArret();
$listeCateg = CategorieDAO::getLesCateg();
//var_dump($listeCateg);
$formFiltre = new Formulaire('POST','','filtre','');
$select = $formFiltre->creerSelectArret('filtreArret','filtreArret','',$listeArret);
$selectCateg = $formFiltre->creerSelectCateg('filtreCateg','filtreCateg','',$listeCateg,$_POST["filtreCateg"]);
$formFiltre->ajouterComposantLigne($formFiltre->concactComposants($formFiltre->creerLabel("Arret de tram :","labelArret"),$select),'1');
$formFiltre->ajouterComposantLigne($formFiltre->concactComposants($formFiltre->creerLabel("Categorie :    ","labelArret"),$selectCateg),'1');
$formFiltre->ajouterComposantTab();
$formFiltre->ajouterComposantLigne($formFiltre->creerInputSubmit("submit",'submit','Filtrer','true'),1);
$formFiltre->ajouterComposantTab();
$formFiltre->creerFormulaire();
if(isset($_POST["filtreArret"]) and ($_POST["filtreArret"] != -1 or $_POST["filtreCateg"] != -1)){
    $_SESSION["listeStations"] = new Stations(StationDAO::lesStationsFiltre($_POST["filtreArret"],$_POST["filtreCateg"]));
}
else{
    $_SESSION["listeStations"] = new Stations(StationDAO::lesStations());
}
//$_SESSION["listeStations"] = new Stations(StationDAO::lesStations());
$menuStations = new Menu("listeStations");
foreach($_SESSION["listeStations"]->getStations() as $uneSation){
    $id = $uneSation->getNumstation();
    $Nom = $uneSation->getVilleStation() . "-" . $uneSation->getLieu();
    $menuStations->ajouterComposant($menuStations->creerItemLien($id,$Nom));
}
$menuStations = $menuStations->creerMenuStation();

include_once "vues/stations/vueListeStations.php";