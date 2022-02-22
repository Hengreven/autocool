<?php


class Categorie
{
    use Hydrate;
    protected $codeCategorie;
    protected $codeType;
    protected $libelleCategorie;

    /**
     * Categorie constructor.
     * @param $codeCategorie
     * @param $codeType
     * @param $libelleCategorie
     */
    public function __construct($codeCategorie = NULL, $codeType = NULL , $libelleCategorie = NULL)
    {
        $this->codeCategorie = $codeCategorie;
        $this->codeType = $codeType;
        $this->libelleCategorie = $libelleCategorie;
    }


    /**
     * @return mixed
     */
    public function getCodeCategorie()
    {
        return $this->codeCategorie;
    }

    /**
     * @param mixed $codeCategorie
     */
    public function setCodeCategorie($codeCategorie)
    {
        $this->codeCategorie = $codeCategorie;
    }

    /**
     * @return mixed
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * @param mixed $codeType
     */
    public function setCodeType($codeType)
    {
        $this->codeType = $codeType;
    }

    /**
     * @return mixed
     */
    public function getLibelleCategorie()
    {
        return $this->libelleCategorie;
    }

    /**
     * @param mixed $libelleCategorie
     */
    public function setLibelleCategorie($libelleCategorie)
    {
        $this->libelleCategorie = $libelleCategorie;
    }


}