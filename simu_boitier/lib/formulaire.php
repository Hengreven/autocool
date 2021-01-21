<?php
// Définit le fuseau horaire par défaut à utiliser. Disponible depuis PHP 5.1
date_default_timezone_set('UTC');

class Formulaire
{
	private $method;
	private $action;
	private $nom;
	private $style;
	private $formulaireToPrint;

	private $ligneComposants = array();
	private $tabComposants = array();

	public function __construct($uneMethode, $uneAction, $unNom, $unStyle)
	{
		$this->method = $uneMethode;
		$this->action = $uneAction;
		$this->nom = $unNom;
		$this->style = $unStyle;
	}


	public function concactComposants($unComposant, $autreComposant)
	{
		$unComposant .=  $autreComposant;
		return $unComposant;
	}

	public function ajouterComposantLigne($unComposant, $unNbCols)
	{
		$temp = "<td";
		if ($unNbCols > 1) {
			$temp .= " colspan ='" . $unNbCols . "' ";
		}
		$temp .= ">" . $unComposant . "</td>";
		$this->ligneComposants[] = $temp;
	}

	public function ajouterComposantTab()
	{
		$this->tabComposants[] = $this->ligneComposants;
		$this->ligneComposants = array();
	}

	public function creerLabel($unLabel, $uneClass)
	{
		$composant = "<label class =" . $uneClass . " >" . $unLabel . "</label>";
		return $composant;
	}

	public function creerInputTexteMinMax($unNom, $unId, $uneValue, $required, $placeholder, $readOnly, $min, $max)
	{
		$composant = "<input type = 'number' name = '" . $unNom . "' id = '" . $unId . "' min= '" . $min . "' max= '" . $max . "' ";
		if (!empty($uneValue)) {
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)) {
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1) {
			$composant .= " required ";
		}
		if ($readOnly == 1) {
			$composant .= " readonly ";
		}
		$composant .= "/>";
		return $composant;
	}

	public  function creerTitre($unId, $uneClass, $Texte) {
        $composant = "<h1 id='".$unId."' class='".$uneClass."' ";
        $composant .= ">" . $Texte . "</h1>";
        return $composant;
    }

	public function creerInputNumber($unNom, $unId, $uneValue, $required, $placeholder, $readOnly)
	{
		$composant = "<input type = 'number' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)) {
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)) {
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ($required == 1) {
			$composant .= " required ";
		}
		if ($readOnly == 1) {
			$composant .= " readonly ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputPass($unNom, $unId, $uneValue, $required)
	{
		$composant = "<input type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)) {
			$composant .= "value = '" . $uneValue . "' ";
		}

		if ($required == 1) {
			$composant .= " required ";
		}

		$composant .= "/>";
		return $composant;
	}

	public function creerInputMaxLenght($unNom, $unId, $uneValue, $required, $maxlength)
	{
		$composant = "<input type = 'number' name = '" . $unNom . "' maxlength= '" . $maxlength . "' id = '" . $unId . "' ";
		if (!empty($uneValue)) {
			$composant .= "value = '" . $uneValue . "' ";
		}

		if ($required == 1) {
			$composant .= " required ";
		}

		$composant .= "/>";
		return $composant;
	}

	public function creerLabelFor($unFor,  $unLabel)
	{
		$composant = "<label for='" . $unFor . "'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerSelect($unNom, $unId, $unLabel, $options)
	{
		$composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
		$i = 0;
		$composant .= "<option value=''>Qui êtes-vous ?</option>";
		foreach ($options as $option) {
			$composant .= "<option value = '";
			$tab = $option;
			$composant .= $tab->getLogin();
			$i++;
			$composant .= "'> " . $tab->getLogin();
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}

	public function creerInputRadio($unNom, $unId, $uneValue, $checked, $uneOption)
	{
		$composant = "<input type = 'radio' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = '" . $uneValue . "'";

		if ($checked) {
			$composant .= "checked>";
		} else {
			$composant .= ">";
		}

		$composant .= "<label for='" . $unId . "'>". $uneOption ."</label>";

		return $composant;
	}

    public function creerInputRadioWithIMG($unNom, $unId, $uneValue, $checked, $src, $uneOption)
    {
        $composant = "<label id='".$unId."'><input type = 'radio' name = '" . $unNom . "' value = '" . $uneValue . "'";

        if ($checked) {
            $composant .= "checked>";
        } else {
            $composant .= ">";
        }
        $composant .= "<img src='" .$src. "'><br>".$uneOption."</label>";

        return $composant;
    }

	public function creerInputSubmit($unNom, $unId, $uneValue, $uneFonctionOnClick)
	{
		$composant = "<input type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = '" . $uneValue . "' onclick='$uneFonctionOnClick'/> ";
		return $composant;
	}

	public function creerInputImage($unNom, $unId, $uneSource)
	{
		$composant = "<input type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/> ";
		return $composant;
	}

	public function creerInputDateTime($unNom, $unId) {
		$composant = "<input type='datetime-local' id= '" .$unId . "' ";
		$composant .= "name= '" . $unNom . "' value='" . date('Y-m-d H:i') . "'>";
		return $composant;
	}

	public function creerFormulaire()
	{
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' ><table>";


		foreach ($this->tabComposants as $uneLigneComposants) {
			$this->formulaireToPrint .= "<tr>";
			foreach ($uneLigneComposants as $unComposant) {
				$this->formulaireToPrint .= $unComposant;
			}
			$this->formulaireToPrint .= "</tr>";
		}
		$this->formulaireToPrint .= "</table></form>";
		return $this->formulaireToPrint;
	}


	public function afficherFormulaire()
	{
		echo $this->formulaireToPrint;
	}
}
