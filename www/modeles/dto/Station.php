<?php
class Station
{
    use Hydrate;
    protected $numstation;
    protected $villestation;
    protected $lieu;

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