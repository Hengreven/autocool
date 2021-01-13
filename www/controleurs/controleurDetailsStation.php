<?php
if(isset($_GET["station"])){
    $stationSelected = $_SESSION["listeStations"]->chercherStation($_GET["station"]);
    var_dump($stationSelected);
}else{
    echo "erreur";
}
echo $stationSelected;