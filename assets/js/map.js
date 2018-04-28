jQuery(document).ready(function(){
	google.maps.event.addDomListener(window, 'load', init);
	function init() {
		var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			center: new google.maps.LatLng(parseFloat(fromPHP.mapLatitude), parseFloat(fromPHP.mapLongitude)),


			styles: [
				{"featureType":"water","elementType":"geometry","stylers":[{"color":"#d9d9d9"},{"lightness":0}]},
				{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f6f6f6"},{"lightness":0}]},
				{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":0}]},
				{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":0},{"weight":0.15}]},
				{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":0}]},
				{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":0}]},
				{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f6f6f6"},{"lightness":0}]},
				{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#d9d9d9"},{"lightness":0}]},
				{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#ffffff"},{"lightness":0}]},
				{"elementType":"labels.text.fill","stylers":[{"saturation":30},{"color":fromPHP.accentColor},{"lightness":30}]},
				{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},
				{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f6f6f6"},{"lightness":0}]},
				{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#f6f6f6"},{"lightness":0}]},
				{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#f6f6f6"},{"lightness":0},{"weight":1.5}]}
			]
		};
		var mapElement = document.getElementById('map');
		var maps		= new google.maps.Map(mapElement, mapOptions);
		var marker 		= new google.maps.Marker( {
			position: 	new google.maps.LatLng(parseFloat(fromPHP.mapLatitude), parseFloat(fromPHP.mapLongitude)),
			setMap: map,
			title: ""
		});
	}
	jQuery.noConflict(true);
})
