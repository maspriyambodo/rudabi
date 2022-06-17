<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0/leaflet.min.css" integrity="sha512-oIQ0EBio8LJupRpgmDsIsvm0Fsr6c3XNHLB7at5xb+Cf6eQuCX9xuX8XXGRIcokNgdqL1ms7nqbQ6ryXMGxXpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    #map{ height: 500px }
</style>
<div class="rounded img-fluid img-thumbnail" id="map"></div>
<script>
    /* https://maps.googleapis.com/maps/api/geocode/json?address=KAB.+BLORA&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c
     *  link example https://leafletjs.com/examples/geojson/example.html */
    var map = L.map('map', {
        closePopupOnClick: false
    }).setView([-1.69378,120.80886], 5);

    var tiles = L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://bimasislam.kemenag.go.id">DITJEN BIMAS ISLAM</a>',
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    }).addTo(map);

    var baseballIcon = L.icon({
        iconUrl: 'baseball-marker.png',
        iconSize: [29, 24],
        iconAnchor: [16, 37],
        popupAnchor: [0, -28]
    });

    function onEachFeature(feature, layer) {
        var popupContent = feature.properties.Provinsi + ' ' + feature.geometry.coordinates;
        var popup;
        popup = layer.bindPopup(
                popupContent, {
                    closeButton: false
                }
        );
        popup.on("popupclose", function (e) {

        });
    }

    fetch("/assets/js/indonesia2.geojson").then
            (
                    res => res.json()
            ).then
            (
                    data => {
                        /* add GeoJSON layer to the map once the file is loaded */
                        L.geoJson(
                                data, {
                                    onEachFeature: onEachFeature
                                }
                        ).addTo(map);
                    }
            );
</script>