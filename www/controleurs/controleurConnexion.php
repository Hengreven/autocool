<?php
if(!isset($_SESSION['identification']) || !$_SESSION['identification']){

    $messageErreurConnexion = "Login ou mot de passe incorrect";
    $formulaireConnexion = new Formulaire('post', 'index.php', 'connexion', 'connexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('identifiant', 'Identifiant :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', ''   , 1, '',0),1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputPass('mdp', 'mdp', '' ,1),1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider',""),2);
    $formulaireConnexion->ajouterComposantTab();

    if(isset($_SESSION["erreurId"]) && $_SESSION["erreurId"] == true){
        $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"),2);
        $formulaireConnexion->ajouterComposantTab();
        unset($_SESSION["erreurId"]);
    }
    $formulaireConnexion->creerFormulaire();
    include_once 'vues/connexion/vueConnexion.php';

}
else{
    $_SESSION['identification']=[];
    $_SESSION['menuPrincipalChampionnat']="equipeConsult";
    header('location: index.php');
}

