<?php
class Voirie extends Station
{
    protected $adresse;
    protected $nbplaces;

    /**
     * Voirie constructor.
     * @param $adresse
     * @param $nbplaces
     */
    public function __construct($numstation= NULL,$adresse= NULL, $nbplaces= NULL, $villestation= NULL,$lieu= NULL)
    {
        parent::__construct($numstation,$villestation,$lieu);
        $this->adresse = $adresse;
        $this->nbplaces = $nbplaces;
    }

    /**
     * @return mixed|null
     */
    public function getNumstation()
    {
        return $this->numstation;
    }

    /**
     * @param mixed|null $numstation
     */
    public function setNumstation($numstation)
    {
        $this->numstation = $numstation;
    }

    /**
     * @return mixed|null
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed|null $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * @param mixed $nbplaces
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;
    }

    /**
     * @return mixed
     */
    public function getVillestation()
    {
        return $this->villestation;
    }

    /**
     * @param mixed $villestation
     */
    public function setVillestation($villestation)
    {
        $this->villestation = $villestation;
    }


}