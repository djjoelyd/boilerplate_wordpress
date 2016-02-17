/**
*   @package        fullHeightModule.js
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
    var screenHeight;
    var navHeight;

    function FullHeightModule(hi){

        self = this;   
        self.getScreenHeight(); 
		self.screenResize();

    }

    FullHeightModule.prototype.getScreenHeight = function(){

        self.screenHeight = $(window).height();
        self.navHeight = $('#header').outerHeight();
        self.setFullScreenModuleHeight();

    }

    FullHeightModule.prototype.setFullScreenModuleHeight = function(){

        var newHeight = (self.screenHeight - self.navHeight - 40)
        if(newHeight < 400){
            return false;
        }
        $('.full__screen').each(function(index, el) {
            $(this).height(newHeight);   
        });

    }

    FullHeightModule.prototype.screenResize = function(){

        $( window ).resize(function() {
            self.getScreenHeight();
        });
        
    }


    return FullHeightModule;

});