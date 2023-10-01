<?php
    //Ouvrir une session
    session_start();

    // création des cookies
    setcookie("nom", $_GET['nom'], time()+120);
    setcookie("prenom", $_GET['prenom'], time()+120);
    setcookie("mdp", $_GET['mdp'], time()+120);

    // création des variables de session
    $_SESSION["nom"] = $_GET['nom'];
    $_SESSION["prenom"] = $_GET['prenom'];
    $_SESSION["password"] = $_GET['mdp'];
?>

<html>
    <body>
        <p> Cliquez sur le bouton ci-dessous pour voir vos identifiants </p>
        <button onclick="window.location.href = 'cookie-MD.php';">Cliquez Ici</button>
    </body>

</html>    