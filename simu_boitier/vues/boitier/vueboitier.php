<header>
    <?php include 'vues/vueHaut.php'; ?>
    <style type="text/css">
        @import url('styles/boitier.css');
    </style>


</header>

<main id="boitier">

    <div id="boiteConnex">

        <div id="formulaire">
            <?php $formulaireConnexion->afficherFormulaire() ?>
        </div>

    </div>

</main>
<footer>
</footer>
<?php include 'vues/vueBas.php'; ?>
