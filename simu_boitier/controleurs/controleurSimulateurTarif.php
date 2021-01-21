<?php

$message_erreur = "";
$tarif = 0;
$hours = 0;
$formulaireTarif = new Formulaire('post', '', 'fTarif', 'connexion');

$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerTitre('', '', "Choix du véhicule :"), 3);
$formulaireTarif->ajouterComposantTab();

//Choisir catégorie voiture
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadioWithIMG('categ_voiture', 'categ_voiture', 'S', false, './images/car-s.png', "S"), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadioWithIMG('categ_voiture', 'categ_voiture', 'M', false, './images/car-m.png',"M"), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadioWithIMG('categ_voiture', 'categ_voiture', 'L', false, './images/car-l.png',"L"), 1);
$formulaireTarif->ajouterComposantTab();

$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerTitre('', '', "Durée de location"), 3);
$formulaireTarif->ajouterComposantTab();

//Choisir départ
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerLabelFor('start', ' Départs :'), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputDateTime('start', 'start'), 2);
$formulaireTarif->ajouterComposantTab();

//Choisir retour
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerLabelFor('end', ' Retour :'), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputDateTime('end', 'end'), 2);
$formulaireTarif->ajouterComposantTab();

$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerTitre('', '', "Formule d'abonnement :"), 3);
$formulaireTarif->ajouterComposantTab();

//Choisir formule d'abonnement
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadio('formule_abonnement', 'formule_abonnement', 'COO', false, 'Coopérative'), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadio('formule_abonnement', 'formule_abonnement', 'CLA', false, 'Classique'), 1);
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputRadio('formule_abonnement', 'formule_abonnement', 'LIB', false, 'Liberté'), 1);
$formulaireTarif->ajouterComposantTab();

$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerTitre('', '', "Distance (km) :"), 3);
$formulaireTarif->ajouterComposantTab();

//Insérer nombre km
$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputMaxLenght('nbkm', 'nbkm', '', 1, 4), 3);
$formulaireTarif->ajouterComposantTab();

$formulaireTarif->ajouterComposantLigne($formulaireTarif->creerInputSubmit('submitConnex', 'submitConnex', 'Je calcule', ''), 3);
$formulaireTarif->ajouterComposantTab();

$formulaireTarif->creerFormulaire();

if (isset($_POST['categ_voiture']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['formule_abonnement']) && isset($_POST['nbkm'])) {
    $categ_voiture = $_POST['categ_voiture'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $formule_abonnement = $_POST['formule_abonnement'];
    $nbkm = $_POST['nbkm'];

    //Vérifie si la date de départ est plus ancienne que la date de dépôt
    if ($start < $end) {
        if (is_numeric($nbkm) && $nbkm > 0) {
            $hours = tarifDAO::getNbHoursBetweenTwoDates($start, $end);
            $tarif = tarifDAO::calculMontant($categ_voiture, $start, $end, $formule_abonnement, $nbkm);

        } else {
            $message_erreur = "Veuillez renseigner un nombre valide";
        }

    } else {
        $message_erreur = "Veuillez renseigner une date de début inférieur à celle de dépôt";

    }

}




include_once 'vues/simu_tarif/vueSimuTarif.php';