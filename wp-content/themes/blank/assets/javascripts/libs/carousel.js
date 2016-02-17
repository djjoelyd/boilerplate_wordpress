/**
*   @package        Carousel.js
*   @subpackage     Javascript
*   @author         Simon Lockyer
*   @copyright      Copyright 2014, simonlockyer.info.
*   @version        1.0
*   
*   @description
*   
*   This is a responsive, touch optimized carousel with options (see below) and callbacks. Still a work in progress but will be stable for projects.
*
*   
*   @usage
*
*	@html
* 
*	<div class="carousel">
*	
*	  <a href="#" class="carousel__next"></a>
*	  <a href="#" class="carousel__prev"></a>
*	  
*	  <ul class="carousel__list">
*	    <li class="carousel__list-item">
*	    	<img src="http://lorempixel.com/1600/500/sports/4/" />
*	    </li>
*	    <li class="carousel__list-item">
*	    	<img src="http://lorempixel.com/1600/500/sports/6/" />
*	    </li>
*	    <li class="carousel__list-item">
*	    	<img src="http://lorempixel.com/1600/500/sports/7/" />
*	    </li>
*	    <li class="carousel__list-item">
*	    	<h1>TEST</h1>
*	    </li>	    
*	  </ul> 
*	   
*	</div>
*
*	@js
*   
*   new Carousel(this.el.find('.carousel-v'), {
*	   speed: 1000,
*	   direction: 'vertical',
*	});
*
* 	@options
*
*	speed: int(default 500)
*	ease: string(default 'linear')
*	activeClass: string(default 'is-active')
*	overflow: string(default 'hidden') - (options 'visible')
*	direction: string(default 'horizontal') - (options 'vertical')
*	beforeMove: function
*	afterMove: function
*
************************************************************************************************************************ **/

define([
  'jquery',
  'underscore',
], function($, _){

	function Carousel(carousel, settings){

		this.settings = {
			speed : 500,
			ease: 'linear',
			activeClass: 'is-active',
    		overflow: 'hidden',
    		direction: 'horizontal',
    		beforeMove: function(){},
    		afterMove: function(){},
		};

		if(settings) _.extend(this.settings, settings);

		this.flag = false;
		this.curr = 0;
		this.height = 0;
		this.$container = $(carousel);
		this.$list = $(carousel).find('ul');
		this.$items = $(carousel).find('li');
		this.$images = $(carousel).find('img');
		this.imagesLoaded = 0;

		this.count = this.$items.length;

		this.$items.eq(-1).prependTo(this.$list);

		this.init();

		return this;

	}

	Carousel.prototype = {

		init: function(){

			if(this.$images.length === 0 ||  this.imagesLoaded === this.$images.length){
				this.resize();
			    this.events();
			    this.drag();
			    this.afterMove();
			}
			else{
				this.preloadImages();
				return;
			}
		},

		preloadImages: function(){

			var that = this;
			var $image = $(this.$images[this.imagesLoaded]);
			var img = new Image();
			img.src =  $image.attr('src');

			img.onload = function(){
				if($image.height() > that.height){
					that.height = $image.height();
				}
				that.imagesLoaded++;
				that.init();
			};

		},

		resize: function(){

			this.height = (!this.height === 0) ? this.$items.eq(0).height() : this.height;
			this.width = this.$container.width();
			this.outerWidth = this.count * this.width;
			this.outerHeight = this.count * this.height;


			if(this.settings.direction==='vertical'){

				this.$container.addClass('is-vertical');

				this.$container.css({ height: this.height });
				this.$list.css({ width: this.outerHeight, marginTop: - this.height });
				this.$items.css({ width: this.width, height: this.height });

			}
			else{

				this.$container.css({ height: this.height, overflow: this.settings.overflow });
				this.$list.css({ width: this.outerWidth, marginLeft: - this.width });
				this.$items.css({ width: this.width, height: this.height });

			}			

		},

		events: function(){

			var self = this;

			this.$container.find('.carousel__prev').click(function (e) {
		        self.move('left');
		        e.preventDefault();
		    });

		    this.$container.find('.carousel__next').click(function (e) {
		        self.move('right');
		        e.preventDefault();
		    });

		    $(window).resize(function(){
		    	self.resize();
		    }).trigger('resize');	
		
		},

		findClosest: function(){

			var distanceX = Math.abs(Math.min(this.$list.offset().left, 0)) - this.width;
			var distanceY = Math.abs(this.$list.offset().top - this.height);
			var isVertical = (this.settings.direction==='vertical');

			if(
				(!isVertical && distanceX >= this.width/4) || 
				(isVertical && distanceY >= this.height/4)
			){
				return 'right';
			}
			else if(
				(!isVertical && distanceX <= -this.width/4) ||  
				(isVertical && distanceY <= this.height/4)
			){
				return 'left';
			}
			else{
				return '';
			}

		},

		move: function(dir) {

			if(this.flag){
				return false;
			}

			var self = this,
				top = 0,
				left = (dir === 'right') ? - self.width : + self.width;

			if(this.settings.direction==='vertical'){
				left = 0;
				top = (dir === 'right') ? - self.height : + self.height;
			}

			if(dir === ''){
				self.$list.animate({'left': '0', 'top' : '0'}, function(){
					self.$list.css({'left': '', 'top': ''});
				});
				return false;
			}

			self.beforeMove();

	        this.$list.animate({
	            left: left,
	            top: top
	        }, this.settings.speed, this.settings.ease, function () {
	        	if(dir == 'right') {
	        		self.curr++;
	        		self.$list.find('li:first-child').appendTo(self.$list);
	        	}
	        	else{
	        		self.curr--;
	        		self.$list.find('li:last-child').prependTo(self.$list);
	        	}

	        	self.curr = (self.curr > self.count-1) ? 0 : self.curr;
	        	self.curr = (self.curr < 0) ? self.count-1 : self.curr;

	            self.$list.css({'left': '', 'top': ''});
	            self.afterMove();
	        });
	    },

	    beforeMove: function(){

	    	this.flag = true;

	    	this.$items.removeClass(this.settings.activeClass);

	    },

	    afterMove: function(){

	    	this.flag = false;

    		this.$list.find('li').eq(1).addClass(this.settings.activeClass);

    		if(_.isFunction(this.settings.afterMove)){
    			this.settings.afterMove.call(this);
    		}

	    },

	    drag: function(){

	    	var that = this,
	    		self;

	    	function Drag($el){

                self = this;
                self.$el = that.$list;
                self.currX = 0;
                self.currY = 0;
                self.startX = 0;
                self.startY = 0;
                self.swipeLength = 0;
                self.swipeDirection = 0;
                self.dragging = false;
                self.init();
            }
        
            Drag.prototype = {

            	init: function(){

	                // Bind Events  
	                self.$el
	                .addClass('is-draggable noselect')
	                .on('touchstart mousedown', self.dragStart)
	                .on('touchmove mousemove', self.dragMove)
	                .on('touchend mouseup', self.dragEnd)
	                .on('touchcancel mouseleave', self.dragEnd)
	                .find('*').on('dragstart', function(event) { event.preventDefault(); });

            	},

            	dragStart: function(event){

	                var touches;

	                if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined ) {
	                    touches = event.originalEvent.touches[0];
	                }

	                self.startX = self.currX = touches !== undefined ? touches.pageX : event.clientX;
	                self.startY = self.currY = touches !== undefined ? touches.pageY : event.clientY;

	                self.dragging = true;
            	},

            	dragMove: function(event){

	                var curLeft, swipeDirection, positionOffset, touches;

	                touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

	                if (self.dragging){

	                    self.$el.addClass('is-dragging');

	                    self.curX = touches !== undefined ? touches[0].pageX : event.clientX;
	                    self.curY = touches !== undefined ? touches[0].pageY : event.clientY;

	                    self.swipeLengthY = Math.round(Math.sqrt( Math.pow(self.curY - self.startY, 2)));
	                    self.swipeLengthX = Math.round(Math.sqrt( Math.pow(self.curX - self.startX, 2)));

	                    swipeDirection = self.dragDirection();


	                    if (event.originalEvent !== undefined && self.swipeLength > 4) {
	                        event.preventDefault();
	                    }

	                    positionOffsetX = -1 * (self.curX > self.startX ? -1 : 1);
	                    positionOffsetY = -1 * (self.curY > self.startY ? -1 : 1);

	                    if(that.settings.direction==='vertical'){
	                    	self.$el.css({'top' :  (self.swipeLengthY*positionOffsetY) });
	                    }
	                    else{
							self.$el.css({'left' :  (self.swipeLengthX*positionOffsetX) });
	                    }

               		}

            	},


            	dragEnd: function(event) {

	                if(self.dragging){

	                    self.dragging = false;
	                    self.$el.removeClass('is-dragging');
	                    that.move(that.findClosest());

	                }

	            },
				
				dragDirection: function(){

	                var xDist, yDist, r, swipeAngle;

	                xDist = self.startX - self.currX;
	                yDist = self.startY - self.currY;
	                r = Math.atan2(yDist, xDist);


	                swipeAngle = Math.round(r * 180 / Math.PI);

	                if (swipeAngle < 0) {
	                    swipeAngle = 360 - Math.abs(swipeAngle);
	                }
	                if ((swipeAngle <= 45) && (swipeAngle >= 0)) {
	                    return 'left';
	                }
	                if ((swipeAngle <= 360) && (swipeAngle >= 315)) {
	                    return 'right';
	                }
	                if ((swipeAngle >= 135) && (swipeAngle <= 225)) {
	                    return 'right';
	                }

	                return 'vertical';

            	}

            };

            new Drag();
	    }
		
	};

	return Carousel;

});