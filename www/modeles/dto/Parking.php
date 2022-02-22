<?php
class Parking extends Station
{
    protected $nomParking;
    protected $niveau;
    protected $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Parking constructor.
     * @param $nomParking
     * @param $niveau
     */
    public function __construct($numstation= NULL,$nomParking= NULL, $niveau= NULL,$villestation= NULL,$lieu= NULL)
    {
        parent::__construct($numstation,$villestation,$lieu);
        $this->nomParking = $nomParking;
        $this->niveau = $niveau;
    }


    /**
     * @return mixed
     */
    public function getNomParking()
    {
        return $this->nomParking;
    }

    /**
     * @param mixed $nomParking
     */
    public function setNomParking($nomParking)
    {
        $this->nomParking = $nomParking;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
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
    public function getVillestation()
    {
        return $this->villestation;
    }

    /**
     * @param mixed|null $villestation
     */
    public function setVillestation($villestation)
    {
        $this->villestation = $villestation;
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


}