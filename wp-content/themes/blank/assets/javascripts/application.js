/**
 *   @package        application.js
 *   @subpackage     Javascript
 *   @author         Joel Delane
 *   @version        1.0
 *
 ************************************************************************************************************************ **/

define([

    'jquery',
    'headerModule',
    'sectionModule',
    'footerModule',
    'fullHeightModule',
    'heroSliderModule',
    'articleModule',
    'mapModule',

], function($, HeaderModule, SectionModule, FooterModule, FullHeightModule, HeroSliderModule, ArticleModule, MapModule) {

    function Application() {


        var headerModule = new HeaderModule();
        var sectionModule = new SectionModule();
        var footerModule = new FooterModule();
        var fullHeightModule = new FullHeightModule();
        var heroSliderModule = new HeroSliderModule();
        var articleModule = new ArticleModule();
        var mapModule = new MapModule();

        return this;

    }

    return Application;

});