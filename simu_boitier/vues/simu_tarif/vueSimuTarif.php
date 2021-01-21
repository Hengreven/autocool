<header>
    <?php include 'vues/vueHaut.php'; ?>
    <style type="text/css">
        @import url('styles/simu.css');
    </style>


</header>

<main>
    <div>
        <?php
        if ($tarif == 0) {
            ?>

            <div id="formulaire">
                <?php $formulaireTarif->afficherFormulaire() ?>
                <p class="message_erreur"><?php echo $message_erreur ?></p>
            </div>

            <?php
        } else {
            ?>
            <div class="tarif_css">
                <h2>Mon Trajet</h2>
                <h1><?php echo $tarif ?> €</h1>
                <p>Votre voiture pendant <?php echo $hours ?> h, trajet de <?php echo $nbkm ?> kilomètres</p>
                <h3>Service "tout compris" !</h3>

            </div>

            <?php
        }
        ?>

    </div>


</main>
<footer>
</footer>
<?php include 'vues/vueBas.php'; ?>
