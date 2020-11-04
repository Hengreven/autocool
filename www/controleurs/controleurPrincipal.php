<?php
if(isset($_GET['menuPrincipalChampionnat'])){
	$_SESSION['menuPrincipalChampionnat']= $_GET['menuPrincipalChampionnat'];
}
else
{
	if(!isset($_SESSION['menuPrincipalChampionnat'])){
		$_SESSION['menuPrincipalChampionnat']="equipeConsult";
	}
}

if(isset($_POST["login"])){
    $utilisateur = new Utilisateur($_POST["login"],$_POST["mdp"]);
    $verification = UtilisateurDAO::verification($utilisateur);
    if($verification == $_POST["login"]){
        $_SESSION["identification"] = true;
        $_SESSION["menuPrincipalChampionnat"]="equipeModif";
    }else{
        $_SESSION["erreurId"] = true;
    }
}






$menuPrincipalChampionnat = new Menu("menuPrincipalChampionnat");

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("equipeConsult",  "images/equipe.png" , "Equipes"));
}else{
    $menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("equipeModif",  "images/equipe.png" , "Equipes"));
}

$menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("matchConsult",  "images/match.png" , "Matchs"));
$menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("classementConsult",  "images/classement.png" , "Classement"));
$menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("historiqueConsult",  "images/historique.png" , "Historique"));
if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("connexion",  "images/connex.png" , "Connexion"));
}else{
    $menuPrincipalChampionnat->ajouterComposant($menuPrincipalChampionnat->creerItemImage("connexion",  "images/deconnex.png" , "Deconnexion"));
}

$menuPrincipalChampionnat = $menuPrincipalChampionnat->creerMenu("menuPrincipalChampionnat",$_SESSION['menuPrincipalChampionnat']);


include_once dispatcher::dispatch($_SESSION['menuPrincipalChampionnat']);






