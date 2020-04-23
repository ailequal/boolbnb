const $ = require('jquery');
const Handlebars = require('handlebars');


$(document).ready(function () {
    $('#search-bar').keypress(function(event) {
        if(event.which == 13) {
            searchInterface();
            filter();
        }
      });

    $(document).on('click', '#search', function (){
        searchInterface();
        filter();
    });
});



// function
// aggiungere interfaccia ricerca
function searchInterface() {
    $('main').html('');
    var source = $('#menu-template').html();
    var template = Handlebars.compile(source);	
    var context={
        hello: 'hello'
        };
        var html = template(context);
        $('main').append(html);
}


// prendi citta lat e long
function filter() {
    var city = $('#search-bar').val();
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/" + city + ".json?",
        method: "GET",
        data: {
                    limit: 1,
                    key: 'em63COYYAtRKh4NxqgeBdkGNHC8p1is8' 
        },
        success: function (data) {
                if(data.results == 0){
                    alert ('Citta\' non trovata');
                } else {
                    var lat = data.results[0].position.lat;
                    var long = data.results[0].position.lon;
                    search(city, lat, long);
                }

        },
        error: function (request, state, error) {
            console.log(error);
        }
    });
}

// fai la ricerca nel db
function search(city, lat, long) {
    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/search',
        method: "GET",
        data: {
                city: city,
                beds: '',
                rooms: '',
                lat: lat,
                long: long
            },
        success: function(data, state) {

            // aggiungi i flat con info
            var source = $('#flat-template').html();
            var template = Handlebars.compile(source);	
            
            if(data.flats <= 0){
                alert('Spiacenti, non ci sono appartamenti disponiili')
            }
            else{
                for (var i = 0; i < data.flats.length; i++) {
                    var flat = data.flats[i];
                    // console.log(flat.title);
            
                    var context={
                    title: flat.title,
                    city: flat.city,
                    rooms: flat.rooms
                    //   poster: results[i].poster,
                    };
                    var html = template(context);
                    $('main').append(html);
              };
            };
            $('#search-bar').val('');
        },
        error: function(request, state, error) {
            console.log(error);
        }
    });
}





