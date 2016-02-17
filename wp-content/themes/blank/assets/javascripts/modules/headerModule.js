/**
*   @package        headerModule.js
*   @subpackage     Javascript
*   @author         Simon Lockyer
*   @version        1.0
*
************************************************************************************************************************ **/

define([

  'jquery',

],function($) {

    'use strict';


    var self;

    function HeaderModule(){
		
		
        self = this;
        this.event();

    }

    HeaderModule.prototype.event = function(){
		
		$('.menu-text, .menu-burger, .menu-items').on('click', function() {
			$('.menu-text, .menu-bg, .menu-items, .menu-burger').toggleClass('fs');
			$('.menu-burger').html() == "<span></span>" ? $('.menu-burger').text('✕') : $('.menu-burger').html('<span></span>');
		});
		
		$('.down').on('click', function(e) {
			e.preventDefault();
			var $nextSection = $(this).closest('section, header').next('section');
			var offset = $nextSection.offset().top - 40;
			
		    $('html, body').animate({
		        scrollTop: offset
		    }, 500);
		});

	    window.addEventListener('scroll', function(e){
			
	        var distanceY = window.pageYOffset || document.documentElement.scrollTop;
	        var shrinkOn = 200;
			var $header = $('#header');
				
	        if (distanceY >= shrinkOn) {
				$header.addClass('smaller');
	        } else {
	            if ($header.hasClass('smaller')) {
	                $header.removeClass('smaller');
	            }
	        }
	    });
		
    }

    return HeaderModule;

});