function geolocate()
            {
        		
                navigator.geolocation.getCurrentPosition(
                successfunction, errorfunction
            );
            }
            
            function errorfunction(error){
                console.log(error);
            }
            function successfunction(position){
                myLatitude = position.coords.latitude;
                myLongitude = position.coords.longitude;
                getAddress();
            }
            
            function loadScript() {
                var script = document.createElement("script");
                script.src = "http://www.google.com/jsapi?key=AIzaSyAvajCWmG5DIB7dQdPOQ9jJ_plCOjSpiZA&callback=loadMaps";
                script.type = "text/javascript";
                document.getElementsByTagName("head")[0].appendChild(script);
            }
            
            function loadMaps() 
            {
                google.load("maps", "3", {
                    "callback" : showMap,
                    other_params: "sensor=false"
                });
            }
            
            function showMap()
            {
            	var styles = [
            	      		{
            	      		 stylers: [
            	      		{ hue: "#00ffe6" },
            	      		{ saturation: -20 }
            	      		]
            	      		},{
            	      		 featureType: "road",
            	      		 elementType: "geometry",
            	      		 stylers: [
            	      		{ lightness: 100 },
            	      		{ visibility: "simplified" }
            	      		]
            	      		},{
            	      		 featureType: "road",
            	      		elementType: "labels",
            	      		 stylers: [
            	      		{ visibility: "off" }
            	      		]
            	      		}
            	      		];

            	var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
                document.getElementById("map").style.display = "block";
    
                var mapOptions = {
                    zoom: 2,
                    center : new google.maps.LatLng(0, 0),
                    mapTypeId: google.maps.MapTypeId.HYBRID //On indique qu'il s'agit d'une "carte routiÃ¨re"
                };
            
                map = new google.maps.Map(document.getElementById("map"), mapOptions);
                //Associate the styled map with the MapTypeId and set it to display.  
       		 	map.mapTypes.set('map_style', styledMap);  
       			map.setMapTypeId('map_style'); 
            }
            
            function getAddress()
            {
                var latlng = new google.maps.LatLng(myLatitude, myLongitude);
                geocoder = new google.maps.Geocoder();
                geoOptions = {
                    "latLng" : latlng
                };
                geocoder.geocode( geoOptions, function(results, status) {
                    /* Si les coordonnées ont pu être geolocalisées */
                    if (status == google.maps.GeocoderStatus.OK) {
                        var address = results[0].formatted_address;
                        centerMap(map, latlng, 15);
                        addMarker(map, address, latlng);
                        document.getElementById("address").innerHTML = address;
                    } else {
                        alert("Les nouvelles coordonnées n'ont pu être géocodées avec succès.");
                    }
                });
            }
            
            function centerMap(map, coords, zoom)
            {
                map.panTo(coords);
                map.setZoom(zoom);
            }
            
            function addMarker(map, body, location) {
                var marker = new google.maps.Marker({
                    map : map, 
                    position : location,
                    animation: google.maps.Animation.DROP,
                    draggable : false
                });
                marker.setTitle("C'est la qu'j'habite !!!");
                var infowindow = new google.maps.InfoWindow( {
                    content : body
                });
                new google.maps.event.addListener(marker, "click", function() {
                    infowindow.open(map, marker);
                });
            }
            