<div id="conteneur">

    <header>
        <?php include 'vues/vueHaut.php'; ?>
    </header>

    <main>
        <div id='connexion'>
                <div id="boiteConnex">
                    <section id="titre">Veuillez vous identifier</section>
                <?php $formulaireConnexion->afficherFormulaire(); ?>
                </div>
        </div>


    </main>

    <footer>
        <?php include 'vues/vueBas.php'; ?>
    </footer>

</div>
