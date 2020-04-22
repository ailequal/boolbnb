const $ = require('jquery');

$(document).ready(function () {
	
	// $('.street_control').keyup(function() {
	// 	var val = $('.street_control').val();
		
	// 	if (val.length <= 2 ) {
	// 		$(this).next($('.error')).text('indirizzo non valido');
	// 	} else {
	// 		$(this).next($('.error')).text('');
	// 	}
	// });

	// $('.number_control').keyup(function() {
	// 	var val = $('.number_control').val();
	// 	// console.log('ciao');
		
	// 	if (val.length > 0 && !isNaN(val) == false) {
	// 		$(this).next($('.error')).text('civico non valido');
	// 	} else {
	// 		$(this).next($('.error')).text('');
	// 	}
	// });

	// $('.city_control').keyup(function() {
	// 	var val = $('.city_control').val();
	// 	// console.log('ciao');
		
	// 	if (val.length <= 0 && isNaN(val) == false) {
	// 		$(this).next($('.error')).text('città non valida');
	// 	} else {
	// 		$(this).next($('.error')).text('');
	// 	}
	// });

	// $('.zip_control').keyup(function() {
	// 	var val = $('.zip_control').val();
	// 	// console.log('ciao');
		
	// 	if (val.length < 5 || !isNaN(val) == false) {
	// 		$(this).next($('.error')).text('zip non valido');
	// 	} else {
	// 		$(this).next($('.error')).text('');
	// 	}
	// 	if($('.error').text().length == 0){
	// 		// ajax
	// 	}
	// 	else{
	// 		alert('controlla tutti i campi indirizzo');
	// 	}
	// });

	document.getElementById('submit').disabled = true;
	
	$(document).on('click', '.btn', function () {
		var street = $('.street').val();
		var streetNumber = $('.street-number').val();
		var city = $('.city').val();
		var cap = $('.cap').val();
		var search = street + "%20" + streetNumber + "%20" + city + "%20" + cap;
		$.ajax({
		    url: "https://api.tomtom.com/search/2/search/" + search + ".json?",
		    method: "GET",
		    data: {
						limit: 1,
						key: 'em63COYYAtRKh4NxqgeBdkGNHC8p1is8' 
		    },
		    success: function (data) {
					if(data.results == 0){
						alert ('controlla i campi dell\'indirizzo, non sono corretti');
					} else {

						document.getElementById('submit').disabled = false;
						var lat = data.results[0].position.lat;
						var long = data.results[0].position.lon;
						$('.lat').val(lat);
						$('.long').val(long);
						
							// mappa
						var address = [long, lat];
	
						tt.setProductInfo('<test>', '<beta>');
						var map= tt.map({
								key: 'RtqGWkFeMT3SHtv3t8oHCVrLAsAtxPLP',
								container: 'map',
								style: 'tomtom://vector/1/basic-main',
								center: address,
								zoom: 15
						});
						var marker = new tt.Marker().setLngLat(address).addTo(map);
						var popupOffsets = {
							top: [0, 0],
							bottom: [0, -70],
							'bottom-right': [0, -70],
							'bottom-left': [0, -70],
							left: [25, -35],
							right: [-25, -35]
						}
						
						var addressFull = data.results[0].address.freeformAddress;
				
						var popup = new tt.Popup({
							offset: popupOffsets
						}).setHTML("<b>" + addressFull + "</b>");
						marker.setPopup(popup).togglePopup();
					}

		    },
		    error: function (request, state, error) {
		        console.log(error);
		    }
		});
	});

	
});




