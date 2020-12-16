<?php

class Vehicule {
    use Hydrate;
    private $numimmat; //Numéro d'immatriculation
    private $codecategorie; //code catégorie du véhicule
    private $numstation; //Numéro de la station
    private $kilometrage; //Kilométrage du véhicule
    private $niveauessence; //Niveau d'essence du véhicule

    
    /**
     * Get the value of numimmat
     */ 
    public function getNumimmat()
    {
        return $this->numimmat;
    }
    
    /**
     * Set the value of numimmat
     *
     * @return  self
     */ 
    public function setNumimmat($numimmat)
    {
        $this->numimmat = $numimmat;
        
        return $this;
    }
    
    /**
     * Get the value of codecategorie
     */ 
    public function getCodecategorie()
    {
        return $this->codecategorie;
    }
    
    /**
     * Set the value of codecategorie
     *
     * @return  self
     */ 
    public function setCodecategorie($codecategorie)
    {
        $this->codecategorie = $codecategorie;
        
        return $this;
    }
    
    /**
     * Get the value of numstation
     */ 
    public function getNumstation()
    {
        return $this->numstation;
    }
    
    /**
     * Set the value of numstation
     *
     * @return  self
     */ 
    public function setNumstation($numstation)
    {
        $this->numstation = $numstation;
        
        return $this;
    }
    
    /**
     * Get the value of kilometrage
     */ 
    public function getKilometrage()
    {
        return $this->kilometrage;
    }
    
    /**
     * Set the value of kilometrage
     *
     * @return  self
     */ 
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;
        
        return $this;
    }
    /**
     * Get the value of niveauessence
     */ 
    public function getNiveauessence()
    {
        return $this->niveauessence;
    }
    
    /**
     * Set the value of niveauessence
     *
     * @return  self
     */ 
    public function setNiveauessence($niveauessence)
    {
        $this->niveauessence = $niveauessence;
    
        return $this;
    }
}

?>