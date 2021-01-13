<?php
class Stations
{
    private $stations = array();

    /**
     * Stations constructor.
     * @param array $stations
     */
    public function __construct(array $stations)
    {
        $this->stations = $stations;
    }

    /**
     * @return array
     */
    public function getStations()
    {
        return $this->stations;
    }

    public function chercherStation($unIdStation){
        $i = 0;
        while($unIdStation != $this->stations[$i]->getNumstation() && $i <count($this->stations)-1){
            $i++;
        }
        if($unIdStation == $this->stations[$i]->getNumstation()){
            return $this->stations[$i];
        }
    }



}