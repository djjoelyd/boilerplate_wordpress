/**
*   @package        common.js
*   @subpackage     Javascript
*   @author         Joel Delane
*   @version        1.0
*
************************************************************************************************************************ **/

requirejs.config({
	baseUrl: "/wp-content/themes/blank/assets/javascripts/",
    paths: {

        'jquery': 'libs/jquery',
        'application': 'application',
        'headerModule' : 'modules/headerModule',
        'sectionModule' : 'modules/sectionModule',
        'footerModule' : 'modules/footerModule',
        'fullHeightModule' : 'modules/fullHeightModule',
		'heroSliderModule' : 'modules/heroSliderModule',
		'slick': 'libs/slick.min',
		'articleModule': 'modules/articleModule',
		'mapModule': 'modules/mapModule',
		'async': 'libs/async'
    },  
    shim: {  
    
	}
});

require([
	
  'application',

], function(App){
	
    var application = new App();
	
});

