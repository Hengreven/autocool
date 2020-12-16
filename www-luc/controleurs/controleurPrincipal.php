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

if(isset($_POST["login"])){
    $utilisateur = new Utilisateur($_POST["login"],$_POST["mdp"]);
    $verification = UtilisateurDAO::verification($utilisateur);
    if($verification == $_POST["login"]){
        $_SESSION["identification"] = true;
        $_SESSION["action"]="accueilConsult";
    }else{
        $_SESSION["erreurId"] = true;
    }
}


var_dump($_POST["var"]);
var_dump($_POST["test"]);

if(isset($_POST["var"]) || isset($_POST["test"])){
    $abonnement = new Abonnement($_POST["sexe"],$_POST["prenom"],$_POST["secondprenom"],$_POST["nom"],$_POST["datenaissance"],$_POST["rue"],$_POST["ville"],$_POST["codepostal"],$_POST["complement"],$_POST["autrecontact"],
    $_POST["tel"],$_POST["email"],$_POST["telmobile"],$_POST["numpermis"],$_POST["lieuobtention"],$_POST["dateobtention"],$_POST["modepaiement"],$_POST["modefacturation"],$_POST["titulaire"],$_POST["comptecle"],
    $_POST["nombanque"],$_POST["banqueguichet"],$_POST["iban"],$_POST["bic"],$_POST["identifiant"],$_POST["motdepasse"],$_POST["confirmmotdepasse"]);

    $verification = UtilisateurDAO::envoie($abonnement);
    if($verification == $_POST["var"] || $verification == $_POST["test"]){
        $_SESSION["abonnement"] = true;
        $_SESSION["action"]="accueilConsult";
    }else{
        $_SESSION["erreurId"] = true;
    }
}




$menuPrincipal = new Menu("action");

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

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){
    //$menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("Abonnement",  "images/abonnement.png" , "Abonnement"));
}else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("Abonnement",  "images/abonnement.png" , "Abonnement"));
}

$menuPrincipal = $menuPrincipal->creerMenu("action",$_SESSION['action']);


include_once dispatcher::dispatch($_SESSION['action']);






