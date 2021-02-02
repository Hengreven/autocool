<?php

class Vehicules {
    private $vehicules = array();

    public function __construct($array){
		if (is_array($array)) {
			$this->vehicules = $array;
		}
	}

    /**
     * Get the value of vehicules
     */ 
    public function getVehicules()
    {
        return $this->vehicules;
    }
}


?>