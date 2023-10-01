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
    $dbname = 'Vehicules';
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


#REQUETE AVEC QUERY
#1-Requete sur la table carburant

/*$carburant = $conn->query('SELECT* FROM carburant ');
if($carburant === false){
   die('Erreur SQL');
}
$carburant = $carburant->fetchAll();
echo'<pre>';
print_r(($carburant));
echo'</pre>'*/;

###2-Requete avec Query sur la table voiture et FetchALL()

/*$sth=$conn->prepare("SELECT *from  voiture");
$sth->execute();
$data=$sth->fetchAll();
var_dump($data)*/;

# 6.Requete avec Fetch()

/*$sth=$conn->prepare("SELECT *from  voiture");
$sth->execute();
$data=$sth->fetchAll();
var_dump($data)*/;

##3-Requete avec Prepare sur la table marque 
/*++$sql = "SELECT nom FROM marque;";
$qry= $conn->query($sql);
$qry->execute();
$data=$qry->fetchAll();
var_dump($data)*/;

##4-requete avec Prepare sur la table marque 
/*$marque = $conn->query('SELECT* FROM marque ');
if($marque === false){
   die('Erreur SQL');
}
#$marque = $marque->fetchAll(PDO:: FETCH_BOTH);
#$marque = $marque->fetchAll(PDO:: FETCH_ASSOC) ; pour generer un tableau associatif
$marque = $marque->fetchAll();
echo'<pre>';
print_r(($marque));
echo'</pre>'*/;

#  5.Requete avec le foreach
##4-requete avec Prepare sur la table marque 
/*$marque = $conn->query('SELECT* FROM marque ');
if($marque === false){
   die('Erreur SQL');
}
$marque = $marque->fetchAll();
#$marque = $marque->fetchAll(PDO:: FETCH_OBJ);
foreach($marque as $marque){
   echo $marque['nom'] . "\t";
   echo $marque ['pays'] . "\t";
   echo '<br>';
}*/


# Requete avec le trim sur la table marque 
/*$qry = $conn->prepare("select * from marque where pays IN ('Allemagne', 'France')");
$qry->execute();
$rows = $qry->fetchAll();
foreach($rows as $row) 
{
$nom = trim($row['nom']);
$lat = trim($row['latitude']);
$lon = trim($row['longitude']);
echo "<input type='radio' name='marque' data- lat='".$lat."' data-long='".$lon."'
value='".$nom."'>".$nom."</input>";
}*/


//// UPDATE DATABASE 
// Table Voiture : mettre à jour les valeurs : nom et nbcv de l'id 2 
/*$nom=222;
$nbcv=8;
$PDOStatement = $conn->prepare("UPDATE voiture SET nom = :nom, nbcv = :nbcv WHERE idv=2");

$PDOStatement->bindParam(":nom", $nom);
$PDOStatement->bindParam(":nbcv", $nbcv);
$PDOStatement->execute()*/;


## UNE REQUETES POUR AFFICHER LES INFORMATIONS DE TROIS TABLES;

/*$sth=$conn->prepare("SELECT  
a.nom,
c.nom
from voiture a 
INNER join  
marque c
on a.idm=c.idm");
$sth->execute();
$data=$sth->fetchAll();
var_dump($data)*/;

//// /////MENU DEROULANT EFFICHANT LE NOM DES VOITURE EST DES MARQUES 

/*$sthM = $conn->query('SELECT DISTINCT voiture.nom AS nomV, marque.nom AS nomM FROM voiture
INNER JOIN marque ON voiture.idm = marque.idm');
$sthM = $db->prepare('SELECT DISTINCT voiture.nom AS nomV, marque.nom AS nomM FROM voiture
INNER JOIN marque ON voiture.idm = marque.idm');
$sthM -> execute();
$resultat = $sthM -> fetchAll();
echo '<form action="" method="post">
<label for="marque-select">Choisissez une Marque:</label>
<select name="M" id="M-select">';
foreach ($sthM as $row) {
            echo '<option value="bd">'.$row['nomm'].' '.$row['nomv'].'</option>';
};
echo '</select>
</form>';*/

/// AJOUTER SUR LA REQUETE PRECEDENTE LE NOMBRE DE VOITURE nbc
/*$sthM = $conn->query('SELECT DISTINCT voiture.nom AS nomV, marque.nom AS nomM,voiture.nbcv AS nbre  FROM voiture
INNER JOIN marque ON voiture.idm = marque.idm');
$sthM = $db->prepare('SELECT DISTINCT voiture.nom AS nomV, marque.nom AS nomM FROM voiture
INNER JOIN marque ON voiture.idm = marque.idm');
$sthM -> execute();
$resultat = $sthM -> fetchAll();
echo '<form action="" method="post">
<label for="marque-select">Choisissez une Marque, une voiture et le nombre de cv:</label>
<select name="C" id="C-select">';
foreach ($sthM as $row) {
            echo '<option value="bd">'.$row['nomm'].' '.$row['nomv']. ' '.$row['nbre'].'</option>';
};
echo '</select>
</form>';*/

///AFFICHER LES POINTS DES LIEU DE LA TABLE LIEU

/* Sans base de données, on remplit à la main.... : */
/*$nom="Peugeot"; $lat=48.891944 ; $lon=2.173389;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
echo $strRadio;
$nom="Porsche"; $lat=48.834744 ; $lon=9.151104;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
echo $strRadio;
$nom="Ferrari"; $lat=44.5320039 ; $lon=10.8640228;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
echo $strRadio;*/

/*$nomL="Paris"; $latL=48.8857888 ; $lonL=2.3085129;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nomL."' name='marque' lat='".$latL."' lon='".$lonL."' value='".$nomL."'checked><label for='".$nomL."'>".$nomL."</label></div>";
echo $strRadio;
$nomL="Bordeaux"; $latL=44.7901088 ; $lonL=-0.6507181;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nomL."' name='marque' lat='".$latL."' lon='".$lonL."' value='".$nomL."'checked><label for='".$nomL."'>".$nomL."</label></div>";
echo $strRadio;
$nomL="Monaco"; $latL=43.7341621 ; $lonL=7.4172523;
$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nomL."' name='marque' lat='".$latL."' lon='".$lonL."' value='".$nomL."'checked><label for='".$nomL."'>".$nomL."</label></div>";
echo $strRadio;*/

/// AVEC LA BASE DE DONNEE : UNE REQUETE POUR AFFICHER LES MARQUES AVEC LEUR COORDONNEES lat Long

/*$qry = $conn->prepare("select * from marque");

$qry->execute();

$rows = $qry->fetchAll();

foreach ($rows as $row) {

    $nom = trim($row['nom']);

    $lat = trim($row['latitude']);

    $lon = trim($row['longitude']);
    

    $strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
    echo $strRadio;
    $qry->closeCursor();
   
};*/

$stmt = $conn->prepare("SELECT * FROM marque WHERE nom = :Ferrari");
$stmt->bindParam(':Ferrari', $nom);
$stmt->execute();
$result = $stmt->fetch();
echo $result['nom'];



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

