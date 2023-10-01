<?php
##connecter la base de données

try {
    $db = new
    PDO("pgsql:host=localhost;port=5432;dbname=Vehicules",
    "postgres", "cheikh");
    echo 'Connexion OK !!<br />';
    }
    catch(PDOException $e) {
    $db = null;
    echo 'ERREUR Base de données: ' . $e->getMessage();

    }
    
?>