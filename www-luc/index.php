<?php
require 'lib/autoLoader.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Autocool</title>
    <style type="text/css"> @import url('styles/main.css');</style>
    <script type="text/javascript" src="assets/jquery-3.5.1.min.js"></script>
</head>
<body>
<?php
include_once 'controleurs/controleurPrincipal.php';
?>
</body>
</html>