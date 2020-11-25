<?php
if (isset($_GET['menuPrincipal'])) {
    $_SESSION['menuPrincipal'] = $_GET['menuPrincipal'];
} else {
    if (!isset($_SESSION['menuPrincipal'])) {
        $_SESSION['menuPrincipal'] = "Accueil";
    }
}

$menuPrincipal = new Menu("menuPrincipal");

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("Accueil",  "images/home.png", "Accueil"));

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("AffichageInfosVehicule",  "images/car.jpg", "Infos Vehicule"));

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("Boitier",  "images/boitier_pin.jpg", "Boitier"));

$menuPrincipal = $menuPrincipal->creerMenu("menuPrincipal", $_SESSION['menuPrincipal']);

include_once dispatcher::dispatch($_SESSION['menuPrincipal']);
