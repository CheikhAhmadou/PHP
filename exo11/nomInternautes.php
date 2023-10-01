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
            if(file_exists("./nomInternautes.txt")){
				
                $lignes = file("nomInternautes.txt");
                $compter = count($lignes);

                for($i=0; $i<$compter; $i++){ // ou foreach ($lignes as $n => $ligne) { echo $ligne."<br />\n";}
}
                    echo nl2br($lignes[$i]);
                }
            }
            else{
                echo "Le fichier que vous essayez de lire n'existe pas !";
            }
        ?>
        <button onclick="window.location.href='deconnexion.php';">Retour</button>   
    </body>
</html>