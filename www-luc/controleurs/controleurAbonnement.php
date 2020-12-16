<?php
//if(!isset($_SESSION['identification']) || !$_SESSION['identification']){

    //$messageErreurConnexion = "Login ou mot de passe incorrect";
    $formulaireAbonnement = new Formulaire('post', 'index.php', 'abonnement', 'abonnement');

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor("Informationns personelles", "<b>Information personelles</b><hr>"), 1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Sexe', 'Sexe :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerSelect('sexe', 'sexe', ''   , ["H","F"] , '',0),1);
    //$formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Rue', 'Rue :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('rue', 'rue', ''   , 1, '',0),1);
    //$formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Téléphone', 'Téléphone :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('telephone', 'telephone', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Civilite', 'Civilité :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('civilite', 'civilite', ''   , 1, '',0),1);
//    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Ville', 'Ville :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('ville', 'ville', ''   , 1, '',0),1);
//  $formulaireAbonnement->ajouterComposantTab();
        
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Email', 'E-mail :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('email', 'email', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Prenom', 'Prénom :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('prenom', 'prenom', ''   , 1, '',0),1);
    //$formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Code postal', 'Code postal :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('code postal', 'code postal', ''   , 1, '',0),1);
//  $formulaireAbonnement->ajouterComposantTab();

        
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Télmobile', 'Tél mobile :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('telmobile', 'telmobile', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Second prenom', 'Second prénom :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('second prenom', 'second prenom', ''   , 1, '',0),1);
//  $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Complément', 'Complément :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('complement', 'complement', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Nom', 'Nom :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('nom', 'nom', ''   , 1, '',0),1);
//  $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Autre contact', 'Autre contact :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('autre contact', 'autre contact', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('DateNaissance', 'Date de naissance :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputDate('datenaissance', 'datenaissance', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor("Informations sur le permis de conduire", "<br><b>Informations sur le permis de conduire</b><hr> "), 1);
    $formulaireAbonnement->ajouterComposantTab();
    

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('NumPermis', 'N° de Permis :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('numpermis', 'numpermis', ''   , 1, '',0),1);
 //   $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('LieuObtention', 'Lieu d`obtention :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('autre contact', 'autre contact', ''   , 1, '',0),1);
//    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Date', 'Date d`obtention :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputDate('dateobtention', 'dateobtention', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor("Informations sur le payement", "<br><b>Informations sur le payement</b><hr> "), 1);
    $formulaireAbonnement->ajouterComposantTab();
    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('ModePaiement', 'Mode de paiement :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerSelect('modepaiement', 'modepaiement', ''   , ["Carte Bancaire","Espece"] , '',0),1);
    //$formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('ModeFacturation', 'Mode de facturation :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputCheckbox('modefacturation', 'email', 'email'   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputCheckbox('modefactuiration', 'courrier', 'courrier'   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Titulaire', 'Titulaire :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('titulaire', 'titulaire', ''   , 1, '',0),1);

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Compte clé', 'Compte clé :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('comptecle', 'comptecle', ''   , 1, '',0),1);

    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Nom banque', 'Nom banque :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('nombanque', 'nombanque', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Banque+Guichet', 'Banque+Guichet :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('banqueguichet', 'banqueguichet', ''   , 1, '',0),1);

    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('IBAN', 'IBAN :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('iban', 'iban', ''   , 1, '',0),1);

    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('BIC', 'BIC :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('bic', 'bic', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();


    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor("Identifiant et mot de passe", "<br><b>Identifiant et mot de passe</b><hr> "), 1);
    $formulaireAbonnement->ajouterComposantTab();

        
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('Identifiant', 'Identifiant :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputTexte('identifiant', 'identifiant', ''   , 1, '',0),1);
    

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('MotDePasse', 'Mot de passe :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputPass('motdepasse', 'motdepasse', ''   , 1, '',0),1);

    
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabelFor('ConfirmerMotDePasse', 'Confirmer mot de passe :'), 1);
    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerInputPass('confirmermotdepasse', 'confirmermotdepasse', ''   , 1, '',0),1);
    $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement-> creerInputSubmit('submitDispo', 'submitDispo', 'Vérifier la disponibilité',""),2);
  //  $formulaireAbonnement->ajouterComposantTab();

    $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement-> creerInputSubmit('submitAbo', 'submitAbo', 'Valider',""),2);
    $formulaireAbonnement->ajouterComposantTab();

    if(isset($_SESSION["erreurId"]) && $_SESSION["erreurId"] == true){
        $formulaireAbonnement->ajouterComposantLigne($formulaireAbonnement->creerLabel($messageErreurConnexion, "messageErreurConnexion"),2);
        $formulaireAbonnement->ajouterComposantTab();
        unset($_SESSION["erreurId"]);
    }
    $formulaireAbonnement->creerFormulaire();
    include_once 'vues/abonnement/vueAbonnement.php';

//}

/*
else{
    $_SESSION['identification']=[];
    $_SESSION['menuPrincipalChampionnat']="equipeConsult";
    header('location: index.php');
}
*/