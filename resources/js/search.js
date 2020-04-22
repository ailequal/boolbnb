const $ = require('jquery');
const Handlebars = require('handlebars');


$(document).ready(function () {
    $('#search-bar').keypress(function(event) {
        if(event.which == 13) {
          search();
        }
      });
    $(document).on('click', '#search', function (){
        search();
    });
});

// function
function search() {
    var city = $('#search-bar').val();
    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/search',
        method: "GET",
        data: {
                city: city
            },
        success: function(data, state) {
            $('main').html('');
            var source = $('#entry-template').html();
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