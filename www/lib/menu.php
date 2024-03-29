<?php
class Menu{
	private $style;

	private $composants = array();

	public function __construct($unStyle ){
		$this->style = $unStyle;
	}


	public function ajouterComposant($unComposant){
		$this->composants[] = $unComposant;
	}

	
	
	
	public function creerItemImage($uneValue,$uneImage,$uneEtiquette){
		$composant = array();
		$composant[0] = $uneValue ;
		$composant[1] = $uneImage ;
		$composant[2] = $uneEtiquette ;
		return $composant;
	}
	
	
	
	public function creerMenu($nomMenu , $composantActif){
		$menu = "<ul class = '" .  $this->style . "'>";
		foreach($this->composants as $composant){
			
			if($composant[0] == $composantActif){
				$menu .= "<li class='actif'>";
				$menu .= "<img src = '" . $composant[1] . "' />";
				$menu .= "<br/><span>" . $composant[2] . "</span>";
			}
			else{
				$menu .= "<li>";
				$menu .= "<a href='index.php?$nomMenu=" . $composant[0] . "'>";
				$menu .= "<img src = '" . $composant[1] . "' />";
				$menu .= "</a>";
				$menu .= "<br/><span>" . $composant[2] . "</span>";
			}
			$menu .= "</li>";
			
		}
		$menu .= "</ul>";
		return $menu ;
	}
	

	public function creerItemLien($unLien,$uneValeur){
		$composant = [];
		$composant[1] = $unLien ;
		$composant[0] = $uneValeur ;
		return $composant;
	}

	public function creerMenuStation(){
		$menu = "<ul class = 'listeStations'>";
		foreach($this->composants as $composant){
            $menu .= "<li>";
            $menu .= "<a href='index.php?menuPrincipal=DetailsStation" ;
            $menu .= "&station=" . $composant[1] . "'";
            $menu .= "</a>";
            $menu .= $composant[0] ;
			$menu .= "</li>";
		}
		$menu .= "</ul>";
		return $menu ;
	}
	
	

}