const $ = require('jquery');

$(document).ready(function () {
	
	$('.street_control').keyup(function() {
		var val = $('.street_control').val();
		
		if (val.length <= 2 ) {
			$(this).next($('.error')).text('indirizzo non valido');
		} else {
			$(this).next($('.error')).text('');
		}
	});

	$('.number_control').keyup(function() {
		var val = $('.number_control').val();
		// console.log('ciao');
		
		if (val.length > 0 && !isNaN(val) == false) {
			$(this).next($('.error')).text('civico non valido');
		} else {
			$(this).next($('.error')).text('');
		}
	});

	$('.city_control').keyup(function() {
		var val = $('.city_control').val();
		// console.log('ciao');
		
		if (val.length <= 0 && isNaN(val) == false) {
			$(this).next($('.error')).text('città non valida');
		} else {
			$(this).next($('.error')).text('');
		}
	});

	$('.zip_control').keyup(function() {
		var val = $('.zip_control').val();
		// console.log('ciao');
		
		if (val.length < 5 || !isNaN(val) == false) {
			$(this).next($('.error')).text('zip non valido');
		} else {
			$(this).next($('.error')).text('');
		}
	});
})



