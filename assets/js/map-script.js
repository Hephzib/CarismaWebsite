
         function initialize() {
             var latlng = new google.maps.LatLng(13.056870, 80.257430); //based on latitude & longitude, got from your GPS
             var mapOptions = {
                 center: latlng,
                 zoom: 13,
                 mapTypeId: google.maps.MapTypeId.HYBRID, // map is overlay on satellite view
                 mapTypeControlOptions: {
                     style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                     position: google.maps.ControlPosition.TOP_CENTER
                 }   
             };
             var map = new google.maps.Map(document.getElementById('map_container'),
            mapOptions);
             
             //this is marker position code
             var marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 title: "My Position!"
             }); 
         }
