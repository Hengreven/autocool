<?php
if(isset($_GET['menuPrincipalAutocool'])){
	$_SESSION['menuPrincipalAutocool']= $_GET['menuPrincipalAutocool'];
}
else
{
	if(!isset($_SESSION['menuPrincipalAutocool'])){
		$_SESSION['menuPrincipalAutocool']="equipeConsult";
	}
}

if(isset($_POST["login"])){
    $utilisateur = new Utilisateur($_POST["login"],$_POST["mdp"]);
    $verification = UtilisateurDAO::verification($utilisateur);
    if($verification == $_POST["login"]){
        $_SESSION["identification"] = true;
        $_SESSION["menuPrincipalAutocool"]="equipeModif";
    }else{
        $_SESSION["erreurId"] = true;
    }
}






$menuPrincipalAutocool = new Menu("menuPrincipalAutocool");

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("equipeConsult",  "images/equipe.png" , "Equipes"));
}else{
    $menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("equipeModif",  "images/equipe.png" , "Equipes"));
}

$menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("matchConsult",  "images/match.png" , "Matchs"));
$menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("classementConsult",  "images/classement.png" , "Classement"));
$menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("historiqueConsult",  "images/historique.png" , "Historique"));
if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("connexion",  "images/connex.png" , "Connexion"));
}else{
    $menuPrincipalAutocool->ajouterComposant($menuPrincipalAutocool->creerItemImage("connexion",  "images/deconnex.png" , "Deconnexion"));
}

$menuPrincipalAutocool = $menuPrincipalAutocool->creerMenu("menuPrincipalAutocool",$_SESSION['menuPrincipalAutocool']);


include_once dispatcher::dispatch($_SESSION['menuPrincipalAutocool']);






