const GoogleMaps = function(el, coords) {
    const gm = window.google && window.google.maps;

    if (!gm) return;
    
    const map = new gm.Map(el);
    const bounds = new gm.LatLngBounds();
    const infoWindow = new gm.InfoWindow();
    
    for (let coord in coords) {
        placeMarker(coords[coord]);
    }
    
    map.fitBounds(bounds);
    
    const idleListener = gm.event.addListener(map, 'idle', function() {
        if (map.getZoom() > 19) map.setZoom(19);
        gm.event.removeListener(idleListener);
    });
    
    
    if (infoWindow) {
        gm.event.addListener(map, 'click', function() {
            infoWindow.close();
        });
    }

    
    function placeMarker(loc) {
        const marker = new gm.Marker({
            map: map,
            position: {
                lat: Number(loc.latitude),
                lng: Number(loc.longitude),
            },
        });
        
        if (infoWindow) {
            gm.event.addListener(marker, 'click', function() {
                infoWindow.close(); 
                infoWindow.setContent(infoWindowTemplate(loc));
                infoWindow.open(map, marker);
            });
        }

        bounds.extend(marker.position);
    }
    
    
    function infoWindowTemplate(data) {
        const text = data.location_name;
        const link = data.location_link;
        
        const content = link 
            ? '<a href="'+ link +'">' + text + '</a>' 
            : text;
        
        return '<div class="google-map-infowindow-content">' + content + '</div>';
    }

    // Define polygon coordinates here
    const polygonCoords = [
        { lat: 14.85639, lng: 120.76458 },
        // Add more vertices here to define the boundary
    ];

    // Create and display the polygon
    const polygon = new gm.Polygon({
        paths: polygonCoords,
        strokeColor: '#FF0000', // Outline color
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000', // Fill color
        fillOpacity: 0.35,
        map: map,
    });
};

window.googleMapInit = function() {
    const el = document.getElementById('google-map');
    const coords = JSON.parse(document.getElementById('google-maps-coords').innerHTML);
    
    GoogleMaps(el, coords);
};
