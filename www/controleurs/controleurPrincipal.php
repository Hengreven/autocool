<?php
if(isset($_GET['action'])){
	$_SESSION['action']= $_GET['action'];
}
else
{
	if(!isset($_SESSION['action'])){
		$_SESSION['action']="accueilConsult";
	}
}

$menuPrincipal = new Menu("menuPrincipal");

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("accueilConsult",  "images/equipe.png" , "Accueil"));
}else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("accueilUtilisateur",  "images/equipe.png" , "Accueil"));
}
if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion",  "images/connex.png" , "Connexion"));
}else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion",  "images/deconnex.png" , "Deconnexion"));
}

$menuPrincipal = $menuPrincipal->creerMenu("menuPrincipal",$_SESSION['action']);


include_once dispatcher::dispatch($_SESSION['action']);






