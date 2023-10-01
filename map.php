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

