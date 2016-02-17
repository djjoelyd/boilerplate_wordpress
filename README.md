# Wordpress Boilerplate - 2016 #

Wordpress boilerplate using Grunt and Require.js.

## Authors ##

* Joel Delane

## Setup ##

* Clone the repository

```
git clone *url*
```

* Install the dependecies in the theme (blank) folder

```
npm install
```

* Run the grunt file

```
grunt watch
```

This will mamanage the compiling of the SASS. The JavaScript compile will be done prior to deployment - there is no need for dev testing.

* Once you have setup your wordpress db, please activate all the plugins to work with the Multiple Contact Blocks on the page templates.

## Front End Technologies ##

### JS Dependicies ###

- [**jQuery**](https://code.jquery.com/)
- [**RequireJS**](http://requirejs.org/)
- [**Modernizer**](https://modernizr.com/)
- [**Google Maps**](https://developers.google.com/maps/documentation/javascript/)
- [**Slick Slider**](http://kenwheeler.github.io/slick/)
- [**Carousel.js**](#)

### NPM Dependicies ###
- [**Grunt**](http://gruntjs.com)
- [**grunt-autoprefixer**](https://github.com/nDmitry/grunt-autoprefixer)
- [**grunt-contrib-concat**](https://github.com/gruntjs/grunt-contrib-concat)
- [**grunt-contrib-jshint**](https://github.com/gruntjs/grunt-contrib-jshint)
- [**grunt-contrib-sass**](https://github.com/gruntjs/grunt-contrib-sass)
- [**grunt-contrib-uglify**](https://github.com/gruntjs/grunt-contrib-uglify)
- [**grunt-contrib-watch**](https://github.com/gruntjs/grunt-contrib-watch)
- [**grunt-contrib-requirejs**](https://github.com/gruntjs/grunt-contrib-requirejs)

### CSS ###
The SASS is written using a BEM patturn for more information visit: https://en.bem.info


### JS ###

The JavaScript is written using a modular patturn for more information visit: http://addyosmani.com/resources/essentialjsdesignpatterns/book/#modulepatternjavascript

The JavasScript is scructured using RequireJS. Please see: http://requirejs.org/docs/start.html for more information.

### Fonts ###

- Google Fonts

### Plugins ###

- Advanced Custom Fields: [https://en-gb.wordpress.org/plugins/advanced-custom-fields/](https://en-gb.wordpress.org/plugins/advanced-custom-fields/)
- Akismet: [https://en-gb.wordpress.org/plugins/akismet/](https://en-gb.wordpress.org/plugins/akismet/)
- Better Wordpress Minify: [https://en-gb.wordpress.org/plugins/bwp-minify/](https://en-gb.wordpress.org/plugins/bwp-minify/)
- Column Shortcodes: [https://en-gb.wordpress.org/plugins/column-shortcodes/](https://en-gb.wordpress.org/plugins/column-shortcodes/)
- Contact Form 7: [https://en-gb.wordpress.org/plugins/contact-form-7/](https://en-gb.wordpress.org/plugins/contact-form-7/)
- Custom Post Type UI: [https://en-gb.wordpress.org/plugins/custom-post-type-ui/](https://en-gb.wordpress.org/plugins/custom-post-type-ui/)
- Display Widgets: [https://en-gb.wordpress.org/plugins/display-widgets/](https://en-gb.wordpress.org/plugins/display-widgets/)
- Jetpack: [https://en-gb.wordpress.org/plugins/jetpack/](https://en-gb.wordpress.org/plugins/jetpack/)
- Limit Login Attempts: [https://en-gb.wordpress.org/plugins/limit-login-attempts/](https://en-gb.wordpress.org/plugins/limit-login-attempts/)
- Multiple Conent Blocks: [https://github.com/trendwerk/multiple-content-blocks](https://github.com/trendwerk/multiple-content-blocks)
- Preloader: [https://en-gb.wordpress.org/plugins/the-preloader/](https://en-gb.wordpress.org/plugins/the-preloader/)
- Yoast SEO: [https://en-gb.wordpress.org/plugins/wordpress-seo/](https://en-gb.wordpress.org/plugins/wordpress-seo/)


## Deployment ##

The main point for front end deployment is the compiling of the JavaScript.

### RequireJS ###

Execute the grunt require js grunt task.
```
grunt compile
```

Remove the script tags in the `footer.php` under the comment line `<!-- Dev Script links-->`
Uncomment the lines ```<!-- Live script links 
	<script src="./assets/javascripts/dist/libs/require.js"></script>
	<script  src="./assets/javascripts/dist/common.js"></script>
   	-->```
