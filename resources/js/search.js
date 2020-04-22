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
                    $('main').html('');
                    var source = document.getElementById("entry-template").innerHTML;
                    var template = Handlebars.compile(source);
										
										
										var context = {
											// title: album.title,
											// author: album.author,
											// year: album.year,
											// path: album.poster,
										};
										var html = template(context);
										$('main').append(html);

                },
                error: function(request, state, error) {
                    console.log(error);
                }
            });
    });
});
