<div>
    <header>
        <?php include 'vues/vueHaut.php'; ?>
    </header>

    <main>
        <?php
        foreach ($vehicules->getVehicules() as $vehicule) {
        ?>
            <div id="info_vehicule">
                <h1>Infos du véhicule</h1>
                <p>Numéro d'immatriculation : <?php echo $vehicule->getNumimmat(); ?></p>
                <p>code catégorie du véhicule : <?php echo $vehicule->getCodecategorie(); ?></p>
                <p>Numéro de la station : <?php echo $vehicule->getNumstation(); ?></p>
                <p>Kilométrage du véhicule : <?php echo $vehicule->getKilometrage(); ?></p>
                <p>Niveau d'essence du véhicule : <?php echo $vehicule->getNiveauessence(); ?>%</p>
            </div>
        <?php
        }
        ?>
    </main>
    <footer>
    </footer>
    <?php include 'vues/vueBas.php'; ?>
    </footer>
</div>