(function($){
	
	// check if touch screen
	window.mobileAndTabletcheck = function() {
	  var check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
	  return check;
	}
	var isTouch = window.mobileAndTabletcheck();

	// on document load
	$(document).ready(function(){
		// if mobile device or tablet, do not enable parax functionality.
		if( !isTouch ) {
			paraxFunctionality();
			$(window).scroll(function(){paraxFunctionality();});
		}
		$(window).resize(function(){instaSize();});
		navFunctionality();

		// setTimeout(function(){matchHeight(".rider_post>div");}, 100);
		// $(window).resize(function(){matchHeight(".rider_post>div");});
	});

	// custom functions start here

	function navFunctionality() {
		$("#open-nav").click(function(e){
			e.preventDefault();
			$(".nav-drawer").addClass("open");
		});
		$("#close-nav").click(function(e){
			e.preventDefault();
			$(".nav-drawer").removeClass("open");
		});
	}

	function paraxFunctionality() {
		// take a parax element, grab the parax attribute and make it move accordingly within its div
		// 0 is no motion and 10 is max motion

		// grab all parallax containers and loop through them
		var layers = $(".parallax-back").toArray();
		for( var i = 0; i < layers.length; i++ ) {
			// set current container
			var layer = $(layers[i]);
			var parax = layer.data("parax");
			// error handling
			if(parax > 20){parax = 20;}
			if(parax <= 0){return false;}
			parax = parax*5;
			// upper and lower limits for positioning
			var lowerLimit = 50 - parax;
			// find percentage of scroll distance
			var layerTop = layer.offset().top - $(window).scrollTop();
			var winHeight = $(window).height();

			// when top of layer is at bottom of page, layer is at 0% scroll
			// when bottom of layer is at top of page, layer is at 100% scroll
			// offset scrolldist windowheight
			// offset - scroll = layertop
			// layertop  - windowheight
			var percScrolled = ( winHeight - layerTop )/( layer.height() + winHeight );
			if(percScrolled < 1 && percScrolled > 0) {
				var backPos = percScrolled*parax*2 + lowerLimit;
				if(layer.data("invert")) {
					layer.css("background-position-y", backPos+layer.data("offset")+"%");
				}
				else {
					layer.css("background-position-y", 100-backPos+layer.data("offset")+"%");
				}
			}
			
		}
		
	}

	// match height takes in a jquery selector, grabs all the elements, and matches their heights
function matchHeight(sel) {
		// make sure there are elements that match the selector
	  if( $(sel).length ) {
	  	// send the elements to an array
	  	var elements = $(sel).toArray();
	  	// set max height to first element in array
	  	var max = $(elements[0]).outerHeight();

	  	// loop through array and save the tallest element
	  	for(var i = 1; i < elements.length; i++) {
	  		// grab height of current element
	  		var newHeight = $(elements[i]).outerHeight();
	  		// compare and save
	  		if(max < newHeight) {
	  			max = newHeight;
	  		}
	  	} // end for

	  	max = Math.floor(max) + 1;

	  	// set all to min-height of max-height
	  	for(var i = 0; i < elements.length; i++) {
	  		$(elements[i]).css("min-height", max + "px");
	  	} // end for

	  }// end if sel.length
}



/* Location Finder stuff, prepare yourself
	*/
	function locationFinder() {
		// create map
		map = initMap(33.539, -112.119);
		// create array of markers based on locations in left pane
		markersArray = createMarkers();
		// enable the listener for the left pane
		locationBoxListener();

		// if we are redirected from homepage, we need to do a search on load
		// wait for window to load, then parse url for zip and sort locations
		$(document).ready(function () {
			// check to see if we were passed a variable in the url
			var parameters = window.location.search.substring(1);
			if(parameters.length > 0) {
				// we have a passed parameter, parse the zip out, fill in the input for the zip, and submit the form
				var zip = parameters.substring(parameters.indexOf("=")+1);
				// set the input to the passed zip
				$("#searchInputs input").val(zip);
				// trigger a form submit
				$('#searchInputs').trigger('submit');
			}
		});

		// add drop down trigger to submit form
		$('#searchInputs select').change(function(){
			// check to be sure a zip code is added
			if($("#searchInputs input").val().length == 5)
				$('#searchInputs').trigger('submit');
		});

		// trigger to call onSearchSubmit
		$("#searchInputs").submit(function(e){
			e.preventDefault();
			hideDistance = false;
			onSearchSubmit();
		});

		// add listeners to show all and filter buttons
		$('#filterButton').click(function(){
			$('#searchInputs').trigger('submit');
		});
		$('#showAll').click(function(){
			// pass zip code for 85029 because thats basically the center of Phoenix
			// and distance of 1000 miles
			// then hide distances
			hideDistance = true;
			filterLocations(85029, 1000);
		});

	}
	// used on homepage when the search form is entered
	function zipSearchifier(){
		$(".home .search-form").submit(function(e){
			// prevent default
			e.preventDefault();
			// grab the entered zip and change page
			var newUrl = "/location-finder/?zip=" + $(".home .search-form input").val();
			document.location.href = newUrl;
		});
	}

	// creates a new map with lat and long as center
  function initMap(tLat, tLng) {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: tLat, lng: tLng},
      zoom: 10
    }); 
    return map;
  }

	function createMarkers() {

		// markers will hold all markers needed.
		var markers = new Array();
		// grab all locations
		var elements = $(".locations-box").find(".location");

		for(var i = 0; i < elements.length; i++) {
    	// get the address of the location
    	var latLong = $(elements[i]).find(".location-latLong").html();
    	// convert the address into a lat and long object for google maps
    	var tempPosition = formatLatLong(latLong);
    	// set title to location name
    	var tempTitle = $(elements[i]).find(".location-name").html();

			// create a marker
	    var marker = new google.maps.Marker({
		    position: tempPosition,
		    map: map,
		    title: tempTitle,
		    id: i
		  });

		  // add listener to marker
			marker.addListener('click', function() {
			  // On click of marker, highlight set clicked location to active and scroll to
			  $(".location.active").removeClass("active");
			  $("#location-"+this.id).addClass("active");
			  // stop all pins from bouncing
			  stopPinAnimations();
			  // set the clicked pin to bounce
			  this.setAnimation(google.maps.Animation.BOUNCE);
			  // scroll to the element on the left pane
			  scrollToLocation(this.id);
			});
			// add marker to array
		  markers.push(marker)
		}
		// return array of markers;
		return markers;
	}

	function formatLatLong(address) {
		// remove the parenthesis
		var str = address.substring(1, address.length - 2);
		// split string at the comma
		var res = str.split(",");
		var obj = new google.maps.LatLng(Number(res[0]), Number(res[1]));
		// latitude lives at res[0]
		// longitude lives at res[1]
		// convert to numbers and return
		return obj;
	}

	function filterLocations(passedZip, passedDistance) {
		// ajax call to google api to get location from zip
		$.ajax({
		  url: "http://maps.googleapis.com/maps/api/geocode/json?address=" + passedZip,
		  dataType: "json",
		  data: {
		      format: 'json'
		   },
		  success: function(result){
		        filterHelper(result.results[0].geometry.location, passedDistance);
		    }
		});
	}

	function filterHelper(tlocation, passedDistance) {
		// set locations to 0
		locationsCount = 0;
		// convert lat long to google maps crap
		var tposition = new google.maps.LatLng(tlocation.lat, tlocation.lng);
		// loop through markersArray and set map to null if outside of passed distance from location
		for(var i = 0; i < markersArray.length; i++) {
			// #location-i is the id of the corresponding location box

			// get distance between current point and passed point
			var distance = google.maps.geometry.spherical.computeDistanceBetween(markersArray[i].position, tposition);
			$("#location-" + i).data("distance", distance);
			$("#location-" + i).attr("data-distance", Math.round(distance));
			$("#location-" + i + " .location-distance span").html(Math.round(distance/160.934)/10);
			$("#location-" + i + " .location-distance").show();
			// convert passedDistance from miles to meters
			if(distance > passedDistance*1609.34) {
				markersArray[i].setMap(null);
				$("#location-" + i).hide(500);
			}
			else {
				markersArray[i].setMap(map);
				$("#location-" + i).show(500);
				locationsCount++;
			}
		}
		$("#locationCount").html(locationsCount);
		afterLocationsSorted();
	}

	// fired after locations have been assigned their appropriate distances and filtered
	function afterLocationsSorted(){
			sortByDistance();
			locationBoxListener();
			if(hideDistance) {
				$(".location-distance").hide();
			}
			// update locations-box because the frame buffer gets stuck otherwise
			$(".locations-box").css("background-color", "#004C46");
			setTimeout(function(){$(".locations-box").attr("style", "");},1);
	}
	// sorts the left pane by distance
	function sortByDistance(){
		// grab all the divs to sort
		var locations = $(".locations-box").find(".location");
		// set swapped to true so we enter the loop atleast once
		var swapped = true;
		// while we are swapping, continue the loop
		while(swapped) {
			// set swapped to false to allow for pop out of loop
			swapped = false;
			// loop through the array and bubble sort
			for(var i = 0; i < locations.length-1; i++) {
				// bubble sort
				if($(locations[i]).data("distance") > $(locations[i+1]).data("distance")) {
					// if left is greater than right, swap
					var temp = locations[i];
					locations[i] = locations[i+1];
					locations[i+1] = temp;
					// we swapped
					swapped = true;
				} // end if
			} // end for
		} // end while

		// remove all divs then append them in the correct order
		for(var i = 0; i < locations.length; i++) {
			$(locations[i]).remove();
			$(locations[i]).appendTo( ".locations-box" );
		} // end for
	}
	// whenever the elements from left pane are removed, the listeners must be readded
	function locationBoxListener() {
		// on location click, show the marker on the map
		$(".card-box.location").click(function(){
			// switch clicked location to active
			$(".location.active").removeClass("active");
			$(this).addClass("active");
			// get the location index and then animate the marker
			var index = parseInt($(this).attr("id").substring(9));
			stopPinAnimations();
			markersArray[index].setAnimation(google.maps.Animation.BOUNCE);
			// center map on location
			map.setCenter(markersArray[index].position);
		});
	}

	function stopPinAnimations() {
		for(var i = 0; i < markersArray.length; i++) {
				markersArray[i].setAnimation(null);
			}
	}

	function scrollToLocation(locationID) {
		// scroll the locations div to the selected location
		var element = $("#location-" + locationID);
		// set scroll padding of 15px
		var scroll = element.position().top - 15;
		// scroll distance is relative to locations-box scrollTop
		scroll += $(".locations-box").scrollTop();
		// scroll the left pane and animate it
		$(".locations-box").animate({ scrollTop: scroll + "px" });
	}

	function onSearchSubmit(){
		// event listener for search
		// on submit, grab the passed zip and distance
		var passedAddress = $("#searchInputs input").val();
		var passedDistance =  Number($("#searchInputs select").val());

		// error handling to make sure zip is valid
		if($("#searchInputs input").val().length < 5) {
			alert("Please enter a valid address or zipcode.");
		}
		else {
			filterLocations(passedAddress, passedDistance);
		}
	}


})(jQuery);