/**
*   @package        articleModule.js
*   @subpackage     Javascript
*   @author         Joel Delane
*   @version        1.0
*
************************************************************************************************************************ **/

define([

  'jquery',

],function($) {

    'use strict';


    var self;

    function ArticleModule(){
		
		
        self = this;
        this.event();

    }

    ArticleModule.prototype.event = function(){
		
		$(".toTop").click(function (event) {
			event.preventDefault()
			$("html, body").animate({scrollTop: 0}, 500);
		});
		
    }

    return ArticleModule;

});