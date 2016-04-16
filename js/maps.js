var map;
var autocomplete;
var input;

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	  center: {lat: -34.397, lng: 150.644},
	  zoom: 8
	});
}

$(function() {
	input = document.getElementById('searchbox');
	autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map);

	autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
	      window.alert("Autocomplete's returned place contains no geometry");
	      return;
	    }

	    // If the place has a geometry, then present it on a map.
	    if (place.geometry.viewport) {
	      map.fitBounds(place.geometry.viewport);
	    } else {
	      map.setCenter(place.geometry.location);
	      map.setZoom(17);  // Why 17? Because it looks good.
	    }


	});
});