<div>
    <header>
        <?php include 'vues/vueHaut.php'; ?>
    </header>

    <main>
        <?php echo $formFiltre->afficherFormulaire(); ?>
        <?php echo $menuStations; ?>
    </main>
    <footer>
    </footer>
    <?php include 'vues/vueBas.php'; ?>
    </footer>
</div>