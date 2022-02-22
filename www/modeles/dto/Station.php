<?php
class Station
{
    use Hydrate;
    protected $numstation;
    protected $villestation;
    protected $lieu;
    protected $arretProche = array();
    protected $vehicules = array();
    protected $capa = array();

    /**
     * @return array
     */
    public function getCapa()
    {
        return $this->capa;
    }

    /**
     * @param array $capa
     */
    public function setCapa($capa)
    {
        $this->capa = $capa;
    }


    /**
     * @return array
     */
    public function getArretProche()
    {
        return $this->arretProche;
    }

    /**
     * @param array $arretProche
     */
    public function setArretProche($arretProche)
    {
        $this->arretProche = $arretProche;
    }

    /**
     * @return array
     */
    public function getVehicules()
    {
        return $this->vehicules;
    }

    /**
     * @param array $vehicules
     */
    public function setVehicules($vehicules)
    {
        $this->vehicules = $vehicules;
    }



    /**
     * Station constructor.
     * @param $numstation
     * @param $villestation
     * @param $lieu
     */
    public function __construct($numstation = NULL, $villestation = NULL, $lieu = NULL)
    {
        $this->numstation = $numstation;
        $this->villestation = $villestation;
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getNumstation()
    {
        return $this->numstation;
    }

    /**
     * @param mixed $numstation
     */
    public function setNumstation($numstation)
    {
        $this->numstation = $numstation;
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

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }


}