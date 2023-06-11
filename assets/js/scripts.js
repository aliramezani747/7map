const defultLocation = [35.7222,51.3311];
const defultZoom = [15];

const map = L.map('map').setView(defultLocation , defultZoom );

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom : 19,
    attribution: '7learn.ac <a href="http://www.7learn.com/">7Map Project</a>'
}).addTo(map);

//map set veiw
//map.setView([29.592,52.573] , defultZoom );

//show and pin market
var marker = L.marker(defultLocation).addTo(map).bindPopup("7Learn Office1").openPopup();
//var marker = L.marker([35.7122,51.3381]).addTo(map).bindPopup("7Learn Office2");
//map.on ('popupopen' , function(){
//alert ('poUp opend!');
//});

//get view Bound information
//var northLine = map.getBounds().getNorth(); //khat shomali
//var westLine = map.getBounds().getWest();   //khat gharbi
//var southLine = map.getBounds().getSouth(); //khat jonoobi
//var eastLine = map.getBounds().getEast();   //khat sharghi

//Use Map Event

map.on ('dblclick' , function(event){
    //alert(event.latlng.lat +","+ event.latlng.lng);
    //L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
    L.marker(event.latlng).addTo(map);
    $('.modal-overlay').fadeIn(500);
    $('#lat-display').val(event.latlng.lat);
    $('#lng-display').val(event.latlng.lng);
    $('#l-type').val(0);
    $('#l-title').val('');
});

setTimeout(function(){},3000);


//find current location (at first use shekan.ir)
var current_position, current_accuracy
map.on('locationfound', function(e){
    if (current_position){
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy;
    current_position = L.maker(e.latlng).addTo(map)
    .bindPopup(" دقت تقریبی: " +radius+ " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);
}); 
map.on('locationerror', function(e){
});

//wrap map.locate in a function
function locate(){
    map.locate({setView: true, maxZoom: defultZoom});
}
//call locate every 5 seconds ... forever
//setInterval(locate, 5000);


    $(document).ready(function() {

        $('form#addLocationForm').submit(function(e){
            //e.pereventDefault(); // perevent form submiting
            var resualtTag = form.find('.ajax-resualt');
                $.ajax({
                    url: form.att('action'),
                    method : form.attr('method'),
                    data : form.serialize(),
                    success: function(response) {
                        resualtTag.html(response)
                    }
                });
        });

            $('.modal-overlay .close').click(function() {
                $('.modal-overlay').fadeOut();
                var form = $(this);
                
            });
        });
