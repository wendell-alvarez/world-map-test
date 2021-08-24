$(".red-font").hide();

var mymap = L.map('mapid').setView([parseFloat(geoplugin_latitude()), parseFloat(geoplugin_longitude())], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

function getAllMarkers(){
    $.get( "/get_markers", function( data ) {
        for (let i = 0, len = data.length; i < len; i++) {
            createMarkers(data[i]);
        }
    });
}

getAllMarkers();

function createMarkers(val){

    var coor = JSON.parse(val.lat_lng);

    var geojsonFeature = {
        "type": "Feature",
            "properties": {},
            "geometry": {
                "type": "Point",
                "coordinates": [coor.lat, coor.lng]
        }
    }

    var marker;

    L.geoJson(geojsonFeature, {
        pointToLayer: function(feature, latlng){
            marker = L.marker(coor, {
                riseOnHover: true,
                draggable: true,
                markerId: val.id,
            }).bindPopup("<input type='button' value='Delete this marker' class='btn btn-danger delete-marker'/>");

            marker.on("popupopen", onPopupOpen);
            return marker;
        }
    }).addTo(mymap);
}

function onMapClick(e) {
    saveMarker(JSON.stringify(e.latlng));
}

function saveMarker(val){
    $.ajax({
        url: "/save_marker" ,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        } ,
        type: "POST",
        data: {
            lat_lng: val
        } ,
        success: function (response) {
            getAllMarkers();
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

function onPopupOpen() {
    var tempMarker = this;
    var markerId = this.defaultOptions.markerId;

    $(".delete-marker:visible").click(function () {
        $.get( "/remove_marker/"+markerId, function( data ) {
            mymap.removeLayer(tempMarker);
        });
    });
}

mymap.on('click', onMapClick);

$("#submitCoor").on('click',function(){
    //Check If Coordinates is valid

    $.get( "http://www.geoplugin.net/extras/location.gp?lat="
        +$("#latitude").val()
        +"&lon="+$("#longitude").val()
        +"&format=json", function( data ) {

        
        if(data == "Incorrect latitude/longitude parameters" ){
            $(".red-font").show();
        }else{
            var json_data = JSON.parse(data)
                val = {
                    lat: $("#latitude").val(),
                    lng: $("#longitude").val()
                }

                saveMarker(JSON.stringify(val));
                goToSubmitedCoor(val.lat,val.lng);
                $(".red-font").hide();
        }

    });
});

function goToSubmitedCoor(lat,lng){
    mymap.setView([parseFloat(lat), parseFloat(lng)], 25);
}

$("#current_location").html(geoplugin_city()+","+geoplugin_regionName()+", "+geoplugin_countryName());