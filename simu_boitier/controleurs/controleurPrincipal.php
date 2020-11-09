<?php
if (isset($_GET['menuPrincipal'])) {
    $_SESSION['menuPrincipal'] = $_GET['menuPrincipal'];
} else {
    if (!isset($_SESSION['menuPrincipal'])) {
        $_SESSION['menuPrincipal'] = "Accueil";
    }
}

$menuPrincipal = new Menu("menuPrincipal");


$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("AffichageInfosVehicule",  "images/equipe.png", "Infos Vehicule"));

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("Accueil",  "images/deconnex.png", "Deconnexion"));


$menuPrincipal = $menuPrincipal->creerMenu("menuPrincipal", $_SESSION['menuPrincipal']);


include_once dispatcher::dispatch($_SESSION['menuPrincipal']);
