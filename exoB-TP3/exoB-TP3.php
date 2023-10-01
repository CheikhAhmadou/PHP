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
		<h2>Affichage Sièges sociaux</h2>
		<!-- à lire avant de faire l'exercice : https://stackoverflow.com/questions/23740548/how-do-i-pass-variables-and-data-from-php-to-javascript -->
		<div id="mapid" style="height: 500px"></div>
		<?php
			/*try {
				$db = new PDO("pgsql:host=localhost;dbname=XXX", "postgres", "123456");
			}
			catch(PDOException $e) {
				$db = null;
				echo 'ERREUR DB: ' . $e->getMessage();
			}
			if($db) {
				$qry = $db->prepare("SELECT *
									FROM marque");
				$qry->execute();
				$rows = $qry->fetchAll();
				foreach($rows as $row) {
					$nom = trim($row['nom']);
					$lat = trim($row['latitude']);
					$lon = trim($row['longitude']);
					
					// version sans data-lat :
					$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
					// version avec data-*:
					/*$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' data-lat='".$lat."' data-lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";*/ /*
					echo $strRadio;
				}
				$qry->closeCursor();
			}*/
			/* Sans base de données, on remplit à la main.... : */
			$nom="Peugeot"; $lat=48.891944 ; $lon=2.173389;
			$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
			echo $strRadio;
			$nom="Porsche"; $lat=48.834744 ; $lon=9.151104;
			$strRadio = "<div class='center'><input class='myRadio' type='radio' id='".$nom."' name='marque' lat='".$lat."' lon='".$lon."' value='".$nom."'checked><label for='".$nom."'>".$nom."</label></div>";
			echo $strRadio;
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