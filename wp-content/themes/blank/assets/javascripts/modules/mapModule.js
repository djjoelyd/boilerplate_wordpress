/**
*   @package        mapModule.js
*   @subpackage     Javascript
*   @author         Joel Delane
*   @version        1.0
*
************************************************************************************************************************ **/

define([

  	'jquery',
	'async!https://maps.google.com/maps/api/js?sensor=false'

],function($, GoogleMaps) {

    'use strict';

    var self;

    function MapModule(){
		
		
        self = this;
        this.event();

    }

    MapModule.prototype.event = function(){
		
		if($('#map').length){
			
			google.maps.Map.prototype.setCenterWithOffset= function(latlng, offsetX, offsetY) {
			    var map = this;
			    var ov = new google.maps.OverlayView();
			    ov.onAdd = function() {
			        var proj = this.getProjection();
			        var aPoint = proj.fromLatLngToContainerPixel(latlng);
			        aPoint.x = aPoint.x+offsetX;
			        aPoint.y = aPoint.y+offsetY;
			        map.setCenter(proj.fromContainerPixelToLatLng(aPoint));
			    }; 
			    ov.draw = function() {}; 
			    ov.setMap(this); 
			};
			
			var latlng = new google.maps.LatLng(51.521784, -0.102601);
			var map = new google.maps.Map(document.getElementById("map"), {
	            zoom: 16,
				center: latlng,
	            panControl: false,
	            zoomControl: false,
	            scaleControl: false,
				draggable: false,
				scrollwheel: false,
				disableDoubleClickZoom: true,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			var marker = new google.maps.Marker({
			    position: latlng,
			    map: map,
				icon: '../wp-content/themes/blank/assets/images/map-marker.png',
			    title: 'BOILERPLATE'
			});
			map.setCenterWithOffset(latlng, -275, -30);
			if ($(window).width() <= 450){
				map.setCenterWithOffset(latlng, 0, -175);
			}
			
		}
    }

    return MapModule;

});