var ContactUs = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
		                lat: 40.114922,
				lng: -88.224860,
			  });
			   var marker = map.addMarker({
		            lat: 40.114922,
					lng: -88.224860,
		            title: 'The National Data Service',
		            infoWindow: {
		                content: "<b>The National Data Service</b><br>Room 4003, NCSA Building<br>1205 W Clark Street<br>Urbana, IL, 61801"
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();
