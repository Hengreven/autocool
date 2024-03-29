<?php


$formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('pin', 'Entrer code PIN :'), 1);
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMaxLenght('pin', 'pin', '', 1, 4), 1);
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
$formulaireConnexion->ajouterComposantTab();


if (isset($_POST['pin']) && $_POST['pin'] == 1234) {

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('etat_propre_ext', 'Notez l\'état de propreté EXTERIEURE'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexteMinMax('etat_propre_ext', 'etat_propre_ext', '', 1, 'Niveau de propreté', '', 1, 4), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['etat_propre_ext'])) {

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('new_damage', 'Avez-vous de nouveaux dégats à signaler ? :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('new_damage', 'new_damage', 'oui', false, 'OUI'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputRadio('new_damage', 'new_damage', 'non', false, 'NON'), 1);    
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else if (isset($_POST['new_damage'])) {

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Prenez la clé', ''), 2);
    $formulaireConnexion->ajouterComposantTab();

} else {

    $formulaireConnexion = new Formulaire('post', '', 'fConnexion', 'connexion');

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('pin', 'Entrer code PIN :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMaxLenght('pin', 'pin', '', 1, 4), 1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex', 'submitConnex', 'Valider', ''), 2);
    $formulaireConnexion->ajouterComposantTab();
}

$formulaireConnexion->creerFormulaire();

include_once 'vues/accueil/vueAccueil.php';
