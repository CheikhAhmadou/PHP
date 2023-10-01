<?php
    //On démarre la session
    session_start();

    // On modifie un cookie en dur
    setcookie("prenom", "Emilie", time()+120);

    // on teste les variables de cookies
    if (isset($_COOKIE["nom"], $_COOKIE["prenom"], $_COOKIE["mdp"])) {
        $nom = $_COOKIE["nom"];
        $prenom = $_COOKIE["prenom"];
        $mdp = $_COOKIE["mdp"];

        echo "<h2>Bienvenue !</h2><br />";
        echo "votre nom est: $nom <br />";
        echo "votre prenom est: $prenom <br />";
        echo "votre mot de passe est: $mdp <br />";

        $_COOKIE["prenom"] = "Emilie";
        echo "Après modification du prénom, vous êtes : ".$_COOKIE["prenom"]." ".$nom." et votre mot de passe est ".$mdp."<br />";
    }
    else{
        echo "<h2>Identifiants inconnus.</h2><br />";
    }
 
?>

<html>
    <body>
        <button onclick="window.location.href = 'deconnexion-MD.php';">Déconnexion</button>
    </body>
</html>
