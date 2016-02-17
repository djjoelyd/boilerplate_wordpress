/**
*   @package        heroSliderModule.js
*   @subpackage     Javascript
*   @author         Joel Delane
*   @version        1.0
*
************************************************************************************************************************ **/

define([
	
	'jquery',
	'slick'

],function($) {

    'use strict';

    var self;

    function heroSliderModule(){

        self = this;

		$('.carousel__list').slick({
			infinite: true,
			dots:true,
			autoplay: true,
			autoplaySpeed: 4000,
			pauseOnHover: false
		});

    }

    heroSliderModule.prototype.func = function(){	
		
    }

    return heroSliderModule;

});