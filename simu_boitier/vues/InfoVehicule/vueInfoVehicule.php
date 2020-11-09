<div>
    <header>
        <?php include 'vues/vueHaut.php'; ?>
    </header>

    <main>
    <?php
    foreach ($vehicules as $key) {
    
        echo "<div id=\"info_vehicule\">";
        // <h1>Infos du véhicule</h1>
        // <p>Numéro d'immatriculation : <?php echo $vehicule->getNum_immat();</p>
        // <p>code catégorie du véhicule : </p>
        // <p>Numéro de la station : </p>
        // <p>Kilométrage du véhicule : </p>
        // <p>Niveau d'essence du véhicule : </p>
        echo "</div>";
    }
    ?>
    </main>
    <footer>
    </footer>
        <?php include 'vues/vueBas.php'; ?>
    </footer>
</div>

