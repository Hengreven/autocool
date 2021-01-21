<?php

$utilisateurs = new Utilisateurs(boitierDAO::recupInfoUtilisateur());
$listeUser = $utilisateurs->getUtilisateurs();

$dateDebut = 0;

$formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('login', 'Qui êtes vous :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerSelect('login', 'login', '', $listeUser), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
$formulaireConnexion->ajouterComposantTab();

if (isset($_POST['login']) && $_POST['login'] != "") {
    $_SESSION['utilisateurConnecte'] = $_POST['login'];
    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('pin', 'Entrer code PIN :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMaxLenght('pin', 'pin', '', 1, 4), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['pin']) && boitierDAO::verifPIN($_SESSION['utilisateurConnecte'], $_POST['pin'])) {
    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('etat_propre_ext', 'Notez l\'état de propreté EXTERIEURE'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexteMinMax('etat_propre_ext', 'etat_propre_ext', '', 1, 'Niveau de propreté', '', 1, 4), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['etat_propre_ext'])) {
    $_SESSION['etat_propre_ext'] = $_POST['etat_propre_ext'];

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('level_damage', 'Importance des dégats :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('level_damage', 'level_damage', '0', false, '0'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('level_damage', 'level_damage', '1', false, '1'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('level_damage', 'level_damage', '2', false, '2'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('level_damage', 'level_damage', '3', false, '3'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('level_damage', 'level_damage', '4', false, '4'), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['level_damage'])) {
    $_SESSION['level_damage'] = $_POST['level_damage'];
    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('takekey', 'takekey', 'Prenez la clé', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

    boitierDAO::updateInfoEtatVoiture($_SESSION['level_damage'], $_SESSION['etat_propre_ext'], $_SESSION['utilisateurConnecte']);

} else if (isset($_POST['takekey'])) {
    $_SESSION['datedebut'] = boitierDAO::setDateDebut($_SESSION['utilisateurConnecte']);
    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('dropkey', 'dropkey', 'Déposer la clé', ''), 2);
    $formulaireConnexion->ajouterComposantTab();


} elseif (isset($_POST['dropkey'])) {
    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('nbkm', 'Nombre de km parcouru :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMaxLenght('nbkm', 'nbkm', '', 1, 4), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['nbkm'])) {
    $_SESSION['nbkm'] = $_POST['nbkm'];
    boitierDAO::setNbKM($_SESSION['nbkm'],$_SESSION['utilisateurConnecte']);

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('settime', ' Heure de dépot :'), 1);

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputDateTime('settime', 'settime'), 2);
    $formulaireConnexion->ajouterComposantTab();
    
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('save', 'save', 'Sauvegarder', 'test()'), 2);
    $formulaireConnexion->ajouterComposantTab();


} else if (isset($_POST['settime'])) {
    $_SESSION['settime'] = $_POST['settime'];
    boitierDAO::setDateFin($_SESSION['settime'],$_SESSION['utilisateurConnecte']);

    var_dump($_SESSION['datedebut']);
    var_dump($_SESSION['settime']);

    $tarif_resa = tarifDAO::calculMontant("S", $_SESSION['datedebut'], $_SESSION['settime'], "LIB", $_SESSION['nbkm']);
    boitierDAO::setMontantResa($tarif_resa,$_SESSION['utilisateurConnecte']);

    header("Location: index.php?menuPrincipal=Accueil");

} else {

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('login', 'Qui êtes vous :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerSelect('login', 'login', '', $listeUser), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();
}

$formulaireConnexion->creerFormulaire();

include_once 'vues/boitier/vueboitier.php';
