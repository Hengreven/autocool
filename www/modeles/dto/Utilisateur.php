<?php
class Utilisateur
{
   protected $login;
   protected $codedroit;
   protected $mdp;
   protected $sexe;
   protected $email;
   protected $nom;
   protected $prenom;
   protected $rue;
   protected $ville;
   protected $codepostal;
   protected $datenaissance;

    /**
     * Utilisateur constructor.
     * @param $login
     * @param $codedroit
     * @param $mdp
     * @param $sexe
     * @param $email
     * @param $nom
     * @param $prenom
     * @param $rue
     * @param $ville
     * @param $codepostal
     * @param $datenaissance
     */
    public function __construct($login = NULL ,$mdp = NULL , $codedroit = NULL ,  $sexe = NULL , $email = NULL , $nom = NULL , $prenom = NULL , $rue = NULL , $ville = NULL , $codepostal = NULL , $datenaissance = NULL)
    {
        $this->login = $login;
        $this->codedroit = $codedroit;
        $this->mdp = $mdp;
        $this->sexe = $sexe;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->rue = $rue;
        $this->ville = $ville;
        $this->codepostal = $codepostal;
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getCodedroit()
    {
        return $this->codedroit;
    }

    /**
     * @param mixed $codedroit
     */
    public function setCodedroit($codedroit)
    {
        $this->codedroit = $codedroit;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * @param mixed $codepostal
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }

    /**
     * @return mixed
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * @param mixed $datenaissance
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }



}