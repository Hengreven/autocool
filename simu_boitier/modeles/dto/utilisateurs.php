<?php

class Utilisateurs {
    private $utilisateurs = array();

    public function __construct($array){
		if (is_array($array)) {
			$this->utilisateurs = $array;
		}
	}

    /**
     * Get the value of utilisateurs
     */ 
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}


?>