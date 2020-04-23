const $ = require('jquery');
const Handlebars = require('handlebars');


$(document).ready(function () {
    var hiddenCity = $('#city').val();
    filter(hiddenCity);

    $(document).on('click', '.filter', function () {
        $('.flats').html('');
        var rooms = $('#rooms').val();
        var beds = $('#beds').val();
        var radius = $('#radius').val();
        $.ajax({
            url: "https://api.tomtom.com/search/2/search/" + hiddenCity + ".json?",
            method: "GET",
            data: {
                limit: 1,
                key: 'em63COYYAtRKh4NxqgeBdkGNHC8p1is8'
            },
            success: function (data) {
                if (data.results == 0) {
                    alert('Citta\' non trovata');
                } else {
                    var lat = data.results[0].position.lat;
                    var long = data.results[0].position.lon;
                    advanced(hiddenCity, lat, long, beds, rooms, radius);
                }

            },
            error: function (request, state, error) {
                console.log(error);
            }
        });
    });

});

// prendi citta lat e long
function filter(city) {
    // ricerca solo per citta' con 20 radius
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/" + city + ".json?",
        method: "GET",
        data: {
            limit: 1,
            key: 'em63COYYAtRKh4NxqgeBdkGNHC8p1is8'
        },
        success: function (data) {
            if (data.results == 0) {
                alert('Citta\' non trovata');
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
            lat: lat,
            long: long
        },
        success: function (data, state) {

            // aggiungi i flat con info
            var source = $('#flat-template').html();
            var template = Handlebars.compile(source);

            if (data.flats <= 0) {
                alert('Spiacenti, non ci sono appartamenti disponiili')
            }
            else {
                for (var i = 0; i < data.flats.length; i++) {
                    var flat = data.flats[i];

                    var context = {
                        title: flat.title,
                        city: flat.city,
                        rooms: flat.rooms
                    };
                    var html = template(context);
                    $('.flats').append(html);
                };
            };
            $('#search-bar').val('');
        },
        error: function (request, state, error) {
            console.log(error);
        }
    });
}

// ricerca avanzata
function advanced(city, lat, long, beds, rooms, radius) {
    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/search/advanced',
        method: "GET",
        data: {
            city: city,
            lat: lat,
            long: long,
            beds: beds,
            rooms: rooms,
            radius: radius
        },
        success: function (data, state) {

            // aggiungi i flat con info
            var source = $('#flat-template').html();
            var template = Handlebars.compile(source);
            if (data.flats <= 0) {
                alert('Spiacenti, non ci sono appartamenti disponiili')
            }
            else {
                for (var i = 0; i < data.flats.length; i++) {
                    var flat = data.flats[i];

                    var context = {
                        title: flat.title,
                        city: flat.city,
                        rooms: flat.rooms
                    };
                    var html = template(context);
                    $('.flats').append(html);
                };
            };
            $('#search-bar').val('');
        },
        error: function (request, state, error) {
            console.log(error);
        }
    });
}



