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

        var wifi = null
        if ($('#wifi').is(":checked")) {
            wifi = 'wifi';
        }

        var smoking = null
        if ($('#smoking').is(":checked")) {
            smoking = 'smoking';
        }

        var parking = null
        if ($('#parking').is(":checked")) {
            parking = 'parking';
        }

        var swimmingPool = null
        if ($('#swimming-pool').is(":checked")) {
            swimmingPool = 'swimming_pool';
        }

        var breakfast = null
        if ($('#breakfast').is(":checked")) {
            breakfast = 'breakfast';
        }

        var view = null
        if ($('#view').is(":checked")) {
            view = 'view';
        }

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
                    advanced(lat, long, beds, rooms, radius, wifi, smoking, parking, swimmingPool, breakfast, view);
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
            if (data.flats.length > 0 || data.flatsPromo.length > 0) {
                if (data.flats <= 0) {

                } else {
                    // ordiare i data.flats per distance
                    data.flats.sort(function (a, b) {
                        return a.distance - b.distance;
                    })

                    for (var i = 0; i < data.flats.length; i++) {
                        var source = $('#flat-template').html();
                        var template = Handlebars.compile(source);
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
                if (data.flatsPromo <= 0) {

                } else {
                    // ordiare i data.flats per distance
                    data.flatsPromo.sort(function (a, b) {
                        return a.distance - b.distance;
                    })

                    for (var i = 0; i < data.flatsPromo.length; i++) {
                        var source = $('#flatPromo-template').html();
                        var template = Handlebars.compile(source);
                        var flatPromo = data.flatsPromo[i];
                        var context = {
                            title: flatPromo.title,
                            city: flatPromo.city,
                            rooms: flatPromo.rooms
                        };
                        var html = template(context);
                        $('.flatsPromo').append(html);
                    };
                };
            } else {
                alert('nessun risultato');
            }

            // aggiungi i flat con info
            $('#search-bar').val('');
        },
        error: function (request, state, error) {
            console.log(error);
        }
    });
}

// ricerca avanzata
function advanced(lat, long, beds, rooms, radius, wifi, smoking, parking, swimmingPool, breakfast, view) {
    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/search/advanced',
        method: "GET",
        data: {
            lat: lat,
            long: long,
            beds: beds,
            rooms: rooms,
            radius: radius,
            wifi: wifi,
            smoking: smoking,
            parking: parking,
            swimmingPool: swimmingPool,
            breakfast: breakfast,
            view: view
        },
        success: function (data, state) {

            if (data.flats <= 0) {
                alert('Spiacenti, non ci sono appartamenti disponiili')
            } else {

                // ordiare i data.flats per distance
                data.flats.sort(function (a, b) {
                    return a.distance - b.distance;
                })

                for (var i = 0; i < data.flats.length; i++) {
                    var source = $('#flat-template').html();
                    var template = Handlebars.compile(source);
                    var flat = data.flats[i];

                    var context = {
                        title: flat.title,
                        city: flat.city,
                        rooms: flat.rooms,
                        rooms: flat.beds
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
