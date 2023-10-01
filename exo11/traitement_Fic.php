<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            session_start();
            // on vérifie si le fichier txt existe
            /*if(file_exists("./nomInternautes.txt")){
                echo "Traitement en cours... <br/>";
            }
            else{
                fopen("nomInternautes.txt", "w");
            }*/

            if(isset($_GET["nom"], $_GET["prenom"]) && !empty($_GET["nom"])&& !empty($_GET["prenom"])){
                $nom = $_GET["nom"];
                $prenom = $_GET["prenom"];

                $ecriture = fopen("./nomInternautes.txt", "a+");
                $couple = $nom.",".$prenom."\n";
                if(fwrite($ecriture,$couple)){
                    echo "Informations enregistrées avec succès !";
                }
                else{
                    echo "Oups... Erreur d'enregistrement !<br />";
                }
				fclose($ecriture);
            }
        ?>
        <br /><br />
        <button onclick="window.location.href ='nomInternautes.php';">Afficher le contenu du ficher</button>   
        <br /><br />
        <button onclick="window.location.href ='deconnexion.php';">Retour</button>   
    </body>
</html>
