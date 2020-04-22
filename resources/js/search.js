const $ = require('jquery');
const Handlebars = require('handlebars');

$(document).ready(function () {
    $(document).on('click', '#search', function (){
            var city = $('#search-bar').val();
            $.ajax({
                url: window.location.protocol + '//' + window.location.host + '/api/search',
                method: "GET",
                data: {
                        city: city
                    },
                success: function(data, state) {
                    console.log(data);
                },
                error: function(request, state, error) {
                    console.log(error);
                }
            });
    });
});
