/**
*   @package        sectionModule.js
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

    function SectionModule(){


        self = this;
        this.func();

    }

    SectionModule.prototype.func = function(){
		
		$('p.button.more').hover(
			function () {
				$(this).addClass('animated infinite');
			},
			function () {
				$(this).removeClass('animated infinite');
			}
		);
		
    }


    return SectionModule;

});