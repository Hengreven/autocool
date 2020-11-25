<?php
if(isset($_GET['menuPrincipal'])){
	$_SESSION['menuPrincipal']= $_GET['menuPrincipal'];
}
else
{
	if(!isset($_SESSION['menuPrincipal'])){
		$_SESSION['menuPrincipal']="accueilConsult";
	}
}

//si on essaye de se connecter
if(isset($_POST["login"])){
    $utilisateur = new Utilisateur($_POST["login"],$_POST["mdp"]);
    $verification = UtilisateurDAO::verification($utilisateur);
    if($verification["login"] == $_POST["login"]){
        $_SESSION["identification"] = true;
        $_SESSION["droit"] = $verification["CODEDROIT"];
        $_SESSION["menuPrincipal"]="accueilUtilisateur";
    }else{
        $_SESSION["erreurId"] = true;
    }
}

$menuPrincipal = new Menu("menuPrincipal");

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("accueilConsult",  "images/equipe.png" , "Accueil"));
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion",  "images/connex.png" , "Connexion"));
}else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("accueilUtilisateur",  "images/equipe.png" , "Accueil"));
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion",  "images/deconnex.png" , "Deconnexion"));
}

$menuPrincipal = $menuPrincipal->creerMenu("menuPrincipal",$_SESSION['menuPrincipal']);


include_once dispatcher::dispatch($_SESSION['menuPrincipal']);






