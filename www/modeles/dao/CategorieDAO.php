<?php


class CategorieDAO
{
    public static function getLesCateg(){
        $result = [];
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT distinct categorie.* from autocool.categorie inner join autocool.vehicule on categorie.CODECATEGORIE = vehicule.CODECATEGORIE;");

        $requetePrepa->execute();
        $tmp = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($tmp)){
            foreach($tmp as $categ){
                $uneCateg = new Categorie();
                $uneCateg->hydrate($categ);
                $result[] = $uneCateg;
            }
        }
        return $result;
    }
}