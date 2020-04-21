const $ = require('jquery');

$(document).ready(function () {

	var flatId =$('#flatId').val();

	// console.log(window.location.host/api/map);

	$.ajax({
		url: window.location.protocol + '//' + window.location.host + '/api/map',
		method: "GET",
		data: {
				id: flatId
			},
		success: function(data, state) {
			console.log(data);
		},
		error: function(request, state, error) {
			console.log(error);
		}
	});
	
});
