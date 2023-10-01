<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ex. B, TP3, PHP</title>
        <link rel="stylesheet" href="styles.css">       
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    </head>
    <body>
        <h1>exercice B, TP3</h1>
		<h2>Affichage des noms de lieux </h2>
		<!-- à lire avant de faire l'exercice : https://stackoverflow.com/questions/23740548/how-do-i-pass-variables-and-data-from-php-to-javascript -->
		<div id="mapid" style="height: 500px"></div>

<?php
##connecter la base de données

    $host = 'localhost';
    $dbname = 'BASE_MGM';
    $username = 'postgres';
    $password = 'cheikh';
 
  $db = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
   
  try{
     $conn = new PDO($db);
     
     if($conn){
      echo "Connecté à $dbname avec succès!";
     }
  }catch (PDOException $e){
     echo $e->getMessage();
  }

///AFFICHER LES DONNEES SUR LES EVENEMENTS
$qry = $conn->prepare("select type_even as type, date_even as date* from evenement");

$qry->execute();

//$data=$qry->fetchAll();
//var_dump($data);
$rows = $qry->fetchAll();

foreach ($rows as $row) {

    $nom = trim($row['type_even']);

    $lat = trim($row['coord_xe']);

    $lon = trim($row['coord_ye']);
    

    $strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
    echo $strRadio;
    $qry->closeCursor();
};
/*echo '<form action="" method="post">
<label for="marque-select">Choisissez une Marque:</label>
<select name="M" id="M-select">';
foreach ($sthM as $row) {
            echo '<option value="bd">'.$row['type'].' '.$row['date'].'</option>';
};
echo '</select>
</form>';*/


?>

<script>
		// pour effacer les markers : https://stackoverflow.com/questions/9912145/leaflet-how-to-find-existing-markers-and-delete-markers
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

