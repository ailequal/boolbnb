const $ = require('jquery');

$(document).ready(function () {
	$(document).on('click', '#submit', function() {
		console.log('ciao');
		// $.ajax({
		// 	url: "https://flynn.boolean.careers/exercises/api/holidays",
		// 	method: "GET",
		// 	data: {
		// 			year: 2018,
		// 			month: 0
		// 		},
		// 	success: function(data, state) {
		// 		console.log(data);
		// 	},
		// 	error: function(request, state, error) {
		// 		console.log(error);
		// 	}
		// });
	});
});


