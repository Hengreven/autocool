<?php

class Vehicule {
    use Hydrate;
    private $numimmat; //Numéro d'immatriculation
    private $codecategorie; //code catégorie du véhicule
    private $numstation; //Numéro de la station
    private $kilometrage; //Kilométrage du véhicule
    private $niveauessence; //Niveau d'essence du véhicule

    /**
     * Get the value of num_immat
     */ 
    public function getNum_immat()
    {
        return $this->num_immat;
    }

    /**
     * Get the value of code_cat
     */ 
    public function getCode_cat()
    {
        return $this->code_cat;
    }

    /**
     * Get the value of num_station
     */ 
    public function getNum_station()
    {
        return $this->num_station;
    }

    /**
     * Set the value of num_station
     *
     * @return  self
     */ 
    public function setNum_station($num_station)
    {
        $this->num_station = $num_station;

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
     * Get the value of niveau_essence
     */ 
    public function getNiveau_essence()
    {
        return $this->niveau_essence;
    }

    /**
     * Set the value of niveau_essence
     *
     * @return  self
     */ 
    public function setNiveau_essence($niveau_essence)
    {
        $this->niveau_essence = $niveau_essence;

        return $this;
    }
}

?>