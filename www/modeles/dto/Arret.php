<?php
class Arret
{
    use Hydrate;
    protected $nomArret;
    protected $codeArret;
    protected $villeArret;
    protected $ligneArret;

    /**
     * Arret constructor.
     * @param $nomArret
     * @param $codeArret
     * @param $villeArret
     * @param $ligneArret
     */
    public function __construct($nomArret = NULL, $codeArret= NULL, $villeArret= NULL, $ligneArret= NULL)
    {
        $this->nomArret = $nomArret;
        $this->codeArret = $codeArret;
        $this->villeArret = $villeArret;
        $this->ligneArret = $ligneArret;
    }

    /**
     * @param mixed|null $nomArret
     */
    public function setNomArret($nomArret)
    {
        $this->nomArret = $nomArret;
    }

    /**
     * @param mixed|null $codeArret
     */
    public function setCodeArret($codeArret)
    {
        $this->codeArret = $codeArret;
    }

    /**
     * @param mixed|null $villeArret
     */
    public function setVilleArret($villeArret)
    {
        $this->villeArret = $villeArret;
    }

    /**
     * @param mixed|null $ligneArret
     */
    public function setLigneArret($ligneArret)
    {
        $this->ligneArret = $ligneArret;
    }


    /**
     * @return mixed
     */
    public function getNomArret()
    {
        return $this->nomArret;
    }

    /**
     * @return mixed
     */
    public function getCodeArret()
    {
        return $this->codeArret;
    }

    /**
     * @return mixed
     */
    public function getVilleArret()
    {
        return $this->villeArret;
    }

    /**
     * @return mixed
     */
    public function getLigneArret()
    {
        return $this->ligneArret;
    }


}