<?php


class Abonnement
{


    private $sexe;
    private $prenom;
    private $secondprenom;
    private $nom;
    private $datenaissance;
    private $rue;
    private $ville;
    private $codepostal;
    private $complement;
    private $autrecontact;
    private $tel;
    private $email;
    private $telmobile;

    private $numpermis;
    private $lieuobtention;
    private $dateobtention;

    private $modepaiement;
    private $modefacturation;
    private $titulaire;
    private $comptecle;
    private $nombanque;
    private $banqueguichet;
    private $iban;
    private $bic;

    private $identifiant;
    private $motdepasse;
    private $confirmmotdepasse;

    
public function __construct($sexe,$prenom,$secondprenom,$nom,$datenaissance,$rue,$ville,$codepostal,$complement,
$autrecontact,$tel,$email,$telmobile,$numpermis,$lieuobtention,$dateobtention,$modepaiement,$modefacturation,
$comptecle,$titulaire,$comptecle,$nombanque,$banqueguichet,$iban,$bic,$identifiant,$motdepasse,$confirmmotdepasse){

	$this->sexe=$sexe;
	$this->prenom=$prenom;
	$this->secondprenom=$secondprenom;
	$this->nom=$nom;
	$this->datenaissance=$datenaissance;
	$this->rue=$rue;
	$this->ville=$ville;
	$this->codepostal=$codepostal;
	$this->complement=$complement;
	$this->autrecontact=$autrecontact;
	$this->tel=$tel;
	$this->email=$email;
	$this->telmobile=$telmobile;
	$this->numpermis=$numpermis;
	$this->lieuobtention=$lieuobtention;
	$this->dateobtention=$dateobtention;
	$this->modepaiement=$modepaiement;
	$this->modefacturation=$modefacturation;
	$this->comptecle=$comptecle;
	$this->titulaire=$titulaire;
	$this->nombanque=$nombanque;	
	$this->banqueguichet=$banqueguichet;
	$this->iban=$iban;
	$this->bic=$bic;
	$this->identifiant=$identifiant;
	$this->motdepasse=$motdepasse;
	$this->confirmmotdepasse=$confirmmotdepasse;
}
    

// GETTER ET SETTER

	public function setCodeDroit($codedroit){
		$this->codedroit = $codedroit;
	}

    public function getSexe(){
		return $this->sexe;
	}

	public function setSexe($sexe){
		$this->sexe = $sexe;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getSecondprenom(){
		return $this->secondprenom;
	}

	public function setSecondprenom($secondprenom){
		$this->secondprenom = $secondprenom;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getDatenaissance(){
		return $this->datenaissance;
	}

	public function setDatenaissance($datenaissance){
		$this->datenaissance = $datenaissance;
	}

	public function getRue(){
		return $this->rue;
	}

	public function setRue($rue){
		$this->rue = $rue;
	}

	public function getVille(){
		return $this->ville;
	}

	public function setVille($ville){
		$this->ville = $ville;
	}

	public function getCodepostal(){
		return $this->codepostal;
	}

	public function setCodepostal($codepostal){
		$this->codepostal = $codepostal;
	}

	public function getComplement(){
		return $this->complement;
	}

	public function setComplement($complement){
		$this->complement = $complement;
	}

	public function getAutrecontact(){
		return $this->autrecontact;
	}

	public function setAutrecontact($autrecontact){
		$this->autrecontact = $autrecontact;
	}

	public function getTel(){
		return $this->tel;
	}

	public function setTel($tel){
		$this->tel = $tel;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTelMobile(){
		return $this->telmobile;
	}

	public function setTelmobile($telmobile){
		$this->telmobile = $telmobile;
	}

	public function getNumPermis(){
		return $this->numpermis;
	}

	public function setNumPermis($numpermis){
		$this->numpermis = $numpermis;
	}

	public function getLieuObtention(){
		return $this->lieuobtention;
	}

	public function setLieuobtention($lieuobtention){
		$this->lieuobtention = $lieuobtention;
	}

	public function getDateObtention(){
		return $this->dateobtention;
	}

	public function setDateobtention($dateobtention){
		$this->dateobtention = $dateobtention;
	}

	public function getModePaiement(){
		return $this->modepaiement;
	}

	public function setModePaiement($modepaiement){
		$this->modepaiement = $modepaiement;
	}

	public function getModeFacturation(){
		return $this->modefacturation;
	}

	public function setModeFacturation($modefacturation){
		$this->modefacturation = $modefacturation;
	}

	public function getTitulaire(){
		return $this->titulaire;
	}

	public function setTitulaire($titulaire){
		$this->titulaire = $titulaire;
	}

	public function getCompteCle(){
		return $this->comptecle;
	}

	public function setCompteCle($comptecle){
		$this->comptecle = $comptecle;
	}

	public function getNomBanque(){
		return $this->nombanque;
	}

	public function setNomBanque($nombanque){
		$this->nombanque = $nombanque;
	}

	public function getBanqueGuichet(){
		return $this->banqueguichet;
	}

	public function setBanqueGuichet($banqueguichet){
		$this->banqueguichet = $banqueguichet;
	}

	public function getIban(){
		return $this->iban;
	}

	public function setIban($iban){
		$this->iban = $iban;
	}

	public function getBic(){
		return $this->bic;
	}

	public function setBic($bic){
		$this->bic = $bic;
	}

	public function getIdentifiant(){
		return $this->identifiant;
	}

	public function setIdentifiant($identifiant){
		$this->identifiant = $identifiant;
	}

	public function getMotdepasse(){
		return $this->motdepasse;
	}

	public function setMotdepasse($motdepasse){
		$this->motdepasse = $motdepasse;
	}


    
}