<?php
class UtilisateurDAO{
    
    public static function verification($utilisateur){
        
        $requetePrepa = DBConnex::getInstance()->prepare("select login from utilisateur where LOGIN = :login and  MDP = :mdp");
        $login = $utilisateur->getLogin();
        $mdp = $utilisateur->getMdp();
        
        var_dump($login);
        var_dump($mdp);
       
        $requetePrepa->bindParam(":login", $login);
        $requetePrepa->bindParam(":mdp" , $mdp);
        
        $requetePrepa->execute();
        
        $login = $requetePrepa->fetch();
        return $login[0];
    }


    public static function envoie($abonnement){

        $requetePrepaUtil = DBConnex::getInstance()->prepare('INSERT INTO `utilisateur`(`LOGIN`, `CODEDROIT`,`MDP`, `SEXE`, `EMAIL`, `NOM`, `PRENOM`, `RUE`, `VILLE`, `CODEPOSTAL`, `DATENAISSANCE`) 
        VALUES (:utilisateur,"abn",:mdp,:sexe,:email,:nom,:prenom,:rue,:ville,:codepostal,:datenaissance);');

        $identifiant = $abonnement->setIdentifiant($identifiant);
        $codedroit = $abonnement->setCodeDroit("abn");
        $mdp = $abonnement->setMotDePasse($mdp);
        $sexe = $abonnement->setSexe($sexe);
        $email = $abonnement->setEmail($email);
        $nom = $abonnement->setNom($nom);
        $prenom = $abonnement->setPrenom($prenom);
        $rue = $abonnement->setRue($rue);
        $ville = $abonnement->setVille($ville);
        $codepostal = $abonnement->setCodePostal($codepostal);
        $datenaissance = $abonnement->setDateNaissance($datenaissance);


        $requetePrepaUtil->bindParam(":utilisateur", $utilisateur);
        $requetePrepaUtil->bindParam("abn", $utilisateur);
        $requetePrepaUtil->bindParam(":sexe", $sexe);
        $requetePrepaUtil->bindParam(":email", $email);
        $requetePrepaUtil->bindParam(":nom", $nom);
        $requetePrepaUtil->bindParam(":prenom", $prenom);
        $requetePrepaUtil->bindParam(":rue" , $rue);
        $requetePrepaUtil->bindParam(":ville" , $ville);
        $requetePrepaUtil->bindParam(":codepostal" , $codepostal);
        $requetePrepaUtil->bindParam(":datenaissance" , $datenaissance);

        

        $requetePrepaAbo = DBConnex::getInstance()->prepare('INSERT INTO `abonne`(`CODEFORMULE`, `NUMPERMIS`, `LIEUOBTENTIONPERMIS`, `MODEPAIEMENT`, `MODEFACTURATION`, `TITULAIRECOMPTE`, `NUMCOMPTECLE`, `NOMBANQUE`, `BANQUEGUICHET`, `IBAN`, `BIC`, `JUSTIFICATIFDEDOMICILE`, `SITUATIONASSURANCE`, `DEPOTDEGARANTIE`, `RIB`, `CHEMINDOSSIERABONNE`)
        VALUES ("",:numpermis,:lieuobtention,:modepaiement,:modefacturation,:titulairecompte,:comptecle,:nombanque,:banqueguichet,:iban,:bic,"","","","","");');

        $numpermis = $abonnement->setNumPermis($numpermis);
        $lieuobtention = $abonnement->setLieuObtention($lieuobtention);
        $modepaiement = $abonnement->setModePaiement($modepaiement);
        $modefacturation = $abonnement->setModeFacturation($modefacturation);
        $titulairecompte = $abonnement->setTitulaireCompte($titulairecompte);
        $comptecle = $abonnement->setCompteCle($comptecle);
        $nombanque = $abonnement->setNomBanque($nombanque);
        $banqueguichet = $abonnement->setBanqueGuichet($banqueguichet);
        $iban = $abonnement->setIban($iban);
        $bic = $abonnement->setBic($bic);

        $requetePrepaAbo->bindParam(":numpermis", $numpermis);
        $requetePrepaAbo->bindParam("lieuobtention", $lieuobtention);
        $requetePrepaAbo->bindParam(":modepaiement", $modepaiement);
        $requetePrepaAbo->bindParam(":modefacturation", $modefacturation);
        $requetePrepaAbo->bindParam(":titulairecompte", $titulairecompte);
        $requetePrepaAbo->bindParam(":comptecle", $comptecle);
        $requetePrepaAbo->bindParam(":nombanque" , $nombanque);
        $requetePrepaAbo->bindParam(":banqueguichet" , $banqueguichet);
        $requetePrepaAbo->bindParam(":iban" , $iban);
        $requetePrepaAbo->bindParam(":bic" , $bic);

        

        $requetePrepaUtil->execute();
        $requetePrepaAbo->execute();

        $var = $requetePrepaUtil->fetch();
        $test = $requetePrepaAbo->fetch();
        
        return $test[0];
        return $var[0];


    }

}