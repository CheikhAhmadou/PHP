
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
/*$qry = $conn->prepare("select * from lieu");

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
   
};*/





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

/*$qry=$conn->prepare(
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
*/


$conn = pg_connect("host=localhost port=5432 dbname=Vehicules user=postgres password=cheikh");
$result = pg_query($conn, "SELECT ST_AsGeoJSON(geom) as geojson FROM station");
$data = array();
while ($row = pg_fetch_assoc($result)) {
    $data[] = json_decode($row['geojson'], true);
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Leaflet with PHP and PostgreSQL</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
</head>
<body>
  <div id="map" style="height: 400px; width: 100%"></div>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <script>
  var map = L.map('map').setView([51.505, -0.09], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
    maxZoom: 18,
  }).addTo(map);
  <?php foreach ($data as $feature) { ?>
    var marker = L.marker([<?php echo $feature['coordinates'][1] . ', ' . $feature['coordinates'][0]; ?>]).addTo(map);
  <?php } ?>
  </script>
</body>
</html>


