
<?php
##connenion à  la base de données véhicule

    $host = 'localhost';
    $dbname = 'Vehicules';
    $username = 'postgres';
    $password = 'cheikh';
 
  $db = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

## Tewter la connexion de la base de données
  try{
     $conn = new PDO($db);
     
     if($conn){
      echo "Connecté à $dbname avec succès!";
     }
  }catch (PDOException $e){
     echo $e->getMessage();
     
  }


  
                    ########################## QUESTION 2 -------------------

#1) En utilisant la base de données Véhicules listée ci-dessous, créer un formulaire avec des boutons radio (HTML
///radio button) permettant à l’utilisateur de choisir un lieu (table Lieu).

// Requete pour selectionner la table lieu
$qry = $conn->prepare("select * from lieu");

$qry->execute();

$rows = $qry->fetchAll();

foreach ($rows as $row) {

    $nom = trim($row['noml']);

    $lat = trim($row['latl']);

    $lon = trim($row['longl']);
    
## effiage des noms de lieux avec des boutons radio (HTML)
    $strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
    echo $strRadio;
    $qry->closeCursor();
   
};





                           ########################## QUESTION 2 -------------------

##32) Quand l’utilisateur choisit un lieu (un concessionnaire, en fait), il clique sur le bouton radio (il y a 3 concessionnaires :
//Paris, Bordeaux et Monaco) pour sélectionner un lieu.

//Requete pour selection le nom des personnes et les voitures achetes.
// Cette requete est effectuée en faisant la jointure des tables: Personne, achat, lieu marque et voiture
//Sur cette requete nous regroupé les 5 tables citées précdémment , en selectionnant nomM de table marque, nomP de la table personne, nomV de la table Voiture 
// Et les coordonnées des lieux d'achats qui se repetent 3 fois sur Paris, 4 sur monaco et 1 sur la ville de bordeaux
## Nom allons achiffer les lignes de la requetes sur php avant des les mettre sur une cartes
/*$sth=$conn->prepare("SELECT *from  voiture");
$sth->execute();
$data=$sth->fetchAll();
var_dump($data)*/;

$qry=$conn->prepare(
"SELECT
marque.nom as nomM,
voiture.nom as nomV,
personne.nomP as nomP,
lieu.*
from 
voiture 
INNER JOIN  
achat 
on voiture.idv=achat.idv
INNER JOIN
personne 
on achat.idP=personne.idP
INNER JOIN
lieu 
on achat.idlieu=lieu.idlieu
INNER JOIN 
marque 
on voiture.idM=marque.idM
");
$qry->execute();

//$data=$qry->fetchAll(); POUR AFFICHER LE RESULTAT DE LA REQUETE SUR LA QUESTION2
//var_dump($data);

$rows = $qry->fetchAll();

foreach ($rows as $row) {

    $nom = trim($row['noml']);

    $lat = trim($row['latl']);

    $lon = trim($row['longl']);
    
## effiage des noms de lieux avec des boutons radio (HTML)
    $strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
   echo $strRadio; 

    $qry->closeCursor();
};



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Examen, PHP</title>
        <link rel="stylesheet" href="styles.css">       
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    </head>
    <body>
        <h1>Examen Php, 16/12/2022, Cheikh Ahmadou CASSET</h1>
		<h2>Affichage des lieux d'achats </h2>
		<div id="mapid" style="height: 500px"></div>

<script>
		// AFFICHAGE DE LA CARTE SOUS LEAFLET
			var mymap = L.map('mapid').setView([48, 2], 5);
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 18,
				id: 'mapbox.streets',
				accessToken: 'your.mapbox.access.token'
			}).addTo(mymap);
			
            
			radioCollection = document.getElementsByClassName("myRadio");
			
			for (let index = 0; index < radioCollection.length; index++) {
				const radio = radioCollection[index];
				console.log(radio);
				radio.addEventListener("click", function(evt){
					console.log(evt.target.attributes.lat.nodeValue);
					x = parseInt(evt.target.attributes.lat.nodeValue);
					y = parseInt(evt.target.attributes.lon.nodeValue);
					mymap.eachLayer(function (layer) {
						if (layer._url == "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"){	
						}
						else{
							mymap.removeLayer(layer);
						}
						var marker = L.marker([x, y]).addTo(mymap);
					});
				});	
			}
		</script>  
    </body>
</html>

