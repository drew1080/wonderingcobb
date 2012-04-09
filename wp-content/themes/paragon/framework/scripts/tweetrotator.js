/*!
 * Tweet Rotator v1.0 - for jQuery 1.5.1
 * <link 2 codecanyon>
 *
 * Copyright 2011, Johan Dorper
 * You need to buy a license if you want use this script.
 * http://codecanyon.net/wiki/buying/howto-buying/licensing/
 *
 * Date: June 04 2011
 
 * Edit the tag variable below.
 * Any questions? hello@johandorper.com OR twitter.com/johandorper

 * Tweet Rotator is a JQuery plugin that lets you easily
 * load in Tweets from Twitter based on a valid Twitter
 * search operator.
 
 * Thx to Fox Junior for the timer Plugin: http://www.foxjunior.eu/
 */
 (function($){
	$.fn.tweetrotator = function(opt) {
		
		var noCache = new Date();
      noCache = noCache.getTime();

		
		var defaults = {
		  operator: "#apple", 					// Operator (Demonstration of operators: http://search.twitter.com/operators)
		  multiple_colors: true,				// Use multiple background color (see stylesheet)
		  direction: "horizontal",				// Which animation, horizontal or vertical
		  tweetlimit: 6,							// Number of tweets to show at startup, max 10.
		  autorotate: true,						// Start auto rotating?
		  idletime: 3, 							// Number of seconds between tweets that popup
		  convertTextlink: true, 				// Automaticly convert text links to HTML? (Handee for bit.ly links)
		  linkHashtags: true,					// Automaticly convert hashtags to URL?
		  linkUsernames: true,					// Automaticly convert uvernames to URL?
		  parameters: "",							// Additional parameters (see the twitter advanced search)
		  default_from_line: "Tweet from ",	// Top line
		  default_time_line: "Posted ",
		  prefix: "color_"
		};
		
		var options = $.extend(defaults, opt);
		
		return this.each(function() {
			var holder = $(this);
			var holder_id = "#" + $(this).attr("id");
			var base_width = holder.width();
			var base_height = holder.height();
			var found_items = 0;
			var active_nav = 0;
			var color_count = 0;
			var max_colors = 6;
			var stopLoop = false;
			var int = false;
			var prefix = options.prefix;
									
			var tag = options.operator;
			var tweetsFromSearch = "http://search.twitter.com/search.json?callback=?&q=" + escape(tag) + options.parameters + "&rpp=" + options.tweetlimit;
			
			// First construct the app
			var construct = function() {
				holder.addClass("tweet_rotator");
				holder.append("<div class='tweet_holder'/>");
				
				load_tweets();
				
			};
			
			// Load tweets from Twitter
			var load_tweets = function() {
				$.getJSON(tweetsFromSearch, function (data) {
				   $.each(data.results, function (key, value) {
				       // Build tweets function
				       build_tweetboxes(value);
				       found_items++;
				   });
				   build_nav();
				   startRotate();
				});
			};
			
			// Add tweets to holder
			var build_tweetboxes = function(tweet) {
				var tweetparent = $("<div class='tweetparent " + current_color() + "' id='tweet_" + found_items + "'></div>");
				var tweetbox = $("<div class='tweetbox'></div>");
				
				tweetbox.append("<span>" + options.default_from_line + "<a target='_blank' href='http://www.twitter.com/" + tweet.from_user + "'>@" + tweet.from_user + "</a></span>");
				tweetbox.append("<p>" + formatTweetMsg(tweet.text) + "</p>");
				tweetbox.append("<em>" + options.default_time_line + formatTime(tweet.created_at) + "</em>");
								
				tweetparent.css( { width: base_width+"px", height: base_height+"px"} );
				tweetparent.append(tweetbox);
				
				$(holder_id + " .tweet_holder").append(tweetparent);
			};
			
			var current_color = function() {
				if(options.multiple_colors == true) {
					if(color_count == 0) {
						color_count++;
						return prefix+color_count;
					} else {
						if(color_count > 0 && color_count < 6) {
							color_count++;
							return prefix+color_count;
						} else {
							color_count = 1;
							return prefix+color_count;
						}
					}
				} else {
					color_count = 1;
					return prefix+color_count;
				}
			};
			
			// Add navigation
			var build_nav = function() {
				var nav = $("<ul class='nav'/>");
				for(var i=0; i<found_items; i++) {
					if(active_nav == i) {
						nav.append("<li class='active' tweet:id='" + i + "' />");
					} else {
						nav.append("<li tweet:id='" + i + "' />");
					}
				}
				holder.append(nav);
				
				// We need to change thins for horizontal mode
				if(options.direction == "horizontal") {
					$(holder_id + " .tweet_holder").css({ height: base_height, width: (found_items * base_width) + "px" });
					$(holder_id + " .tweetparent, " + holder_id + " ul.nav li").css("float","left");
				}
				
				$(holder_id + " .nav li:not(.active)").live('click', function() {
					click_nav($(this));
					
					// After clicking reset timer (if rotating offcourse)
					if(options.autorotate == true) {
						stopLoop = true;
						if(int == false) {
							int = true;
							setTimeout(function() {
								rotate_next();
								startRotate();
								int = false;
							}, (options.idletime * 1000));
						}
					}
				});
			};
			
			// Click action on nav
			var click_nav = function(el) {
				// Set active
				$(holder_id + " .nav li").removeClass("active");
				el.addClass("active");
				
				// Calculate
				if(options.direction == "vertical") {
					var to_item = el.attr("tweet:id");
					if(to_item == 0) {
						$(holder_id + " .tweet_holder").animate({ top: "0px" }, 500);
					} else {
						var new_top = 0 - (to_item * base_height);
						$(holder_id + " .tweet_holder").animate({ top: new_top+"px" }, 500);
					}
				} else {
					// Horizontal mode
					var to_item = el.attr("tweet:id");
					if(to_item == 0) {
						$(holder_id + " .tweet_holder").animate({ left: "0px" }, 600);
					} else {
						var new_left = 0 - (to_item * base_width);
						$(holder_id + " .tweet_holder").animate({ left: new_left+"px" }, 600);
					}
				}
			};
		
			
			// Regular expressions for the URLs
			var formatUrl = function(text) {
				var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
				return text.replace(exp,"<a target='_blank' href='$1'>$1</a>"); 
			};
			
			var formatHashUrl = function(text) {
				var exp = /\#([a-zA-Z]+)([\s|\.\,:]+)*/g;
				return text.replace(exp,"<a target='_blank' href='http://twitter.com/#search?q=%23$1'>#$1 </a>");
			};
			
			var formatUserUrl = function(text) {
				var exp = /\@([a-zA-Z]+)([\s|\.\,:]+)*/g;
				return text.replace(exp,"<a target='_blank' href='http://twitter.com/$1'>@$1 </a>");
			};
			
			// Format URLs in tweet - optional - 
			var formatTweetMsg = function(text) {
					if(options.convertTextlink == true) {
						text = formatUrl(text);
					}
					
					if(options.linkHashtags == true) {
						text = formatHashUrl(text);
					}
		
					if(options.linkUsernames == true) {
						text = formatUserUrl(text);
					}
					
					text = text.replace(/ \<\/a\>/g, "</a> ");
				
				return text;
			};
			
			// Give the tweet a nice timestamp
			var formatTime = function(pastTime) {
				 /* Credits to: Zemanta */
				 var origStamp = Date.parse(pastTime);
				 var curDate = new Date();
				 var currentStamp = curDate.getTime();
				
				 var difference = parseInt((currentStamp - origStamp)/1000);
				
				 if(difference < 0) return false;
				 if(difference <= 60)           return "Seconds ago";
				 if(difference < 3600)          return parseInt(difference/60)+" minutes ago";
				 if(difference <= 1.5*3600)     return "One hour ago";
				 if(difference < 23.5*3600)     return Math.round(difference/3600)+" hours ago";
				 if(difference < 1.5*24*3600)   return "One day ago";
				
				 var dateArr = pastTime.split(' ');
				 return dateArr[4].replace(/\:\d+$/,'')+' '+dateArr[2]+' '+dateArr[1]+(dateArr[3]!=curDate.getFullYear()?' '+dateArr[3]:'');
			};
			
			
			// Auto rotate code
			var startRotate = function () {
			  if(options.autorotate == false) {
				stopLoop = true;
			  } else {
			  	stopLoop = false;
			  }
			  jQuery.fjTimer({ interval: (options.idletime * 1000), repeat: true, tick: function (counter, timerId) {
			      if (stopLoop == true) {
			          timerId.stop();
			      }
						
			      // Check new discussies / reacties
			      if (stopLoop == false) {
			      	rotate_next();
			      }
			  }
			  })
			};
			
			var rotate_next = function() {
				var target = $(holder_id + " ul.nav li.active");
	      	
	      	if(target.next().size() > 0) {
	      		click_nav(target.next());
	      	} else {
	      		click_nav($(holder_id + " ul.nav li").first());	
	      	}	
			};


			/* Execute */
			construct();
		
		});
		
		
	};
})(jQuery);

jQuery.extend({
	fjFunctionQueue: function(funcToQue) {
		if (funcToQue == null) {
			if (jQuery.fjFunctionQueue.queue != null && jQuery.fjFunctionQueue.queue.queue.length > 0) {
				if (jQuery.fjFunctionQueue.queue.running) {
					jQuery.fjTimer({
						interval: jQuery.fjFunctionQueue.queue.properties.interval,
						tick: function(counter, timer) {
							var func = jQuery.fjFunctionQueue.queue.queue.shift();
							try {
								jQuery.fjFunctionQueue.queue.properties.onTick(jQuery.fjFunctionQueue.queue.index, func);
								jQuery.fjFunctionQueue.queue.index++;
							} catch (e) {
								jQuery.fjFunctionQueue();
								throw e;
							}
							if (jQuery.fjFunctionQueue.queue.queue.length > 0) {
								jQuery.fjFunctionQueue();
							} else {
								jQuery.fjFunctionQueue.queue.running = false;
								jQuery.fjFunctionQueue.queue.index = 0;
								jQuery.fjFunctionQueue.queue.properties.onComplete();
							}
						}
					});
				} else {
					jQuery.fjFunctionQueue.queue.running = true;
					jQuery.fjFunctionQueue();
				}
			}
		} else {
			if (jQuery.fjFunctionQueue.queue == null) {
				jQuery.fjFunctionQueue.queue = {index: 0, running: false, queue:[], properties: {interval: 1, onComplete: function(){}, onStart: function(){}, autoStart: true, onTick: function(counter, func) {func();}}};
			}
			var isEmptyArray = jQuery.fjFunctionQueue.queue.queue.length == 0;
			if (jQuery.isFunction(funcToQue)) {
				jQuery.fjFunctionQueue.queue.queue.push(funcToQue);
			} else if (jQuery.isArray(funcToQue)) {
				for(var i = 0; i < funcToQue.length; i++) {
					jQuery.fjFunctionQueue.queue.queue.push(funcToQue[i]);
				}
			} else {
				jQuery.fjFunctionQueue.queue.properties = jQuery.extend(jQuery.fjFunctionQueue.queue.properties, funcToQue);
			}
			if (isEmptyArray && jQuery.fjFunctionQueue.queue.queue.length > 0 && !jQuery.fjFunctionQueue.queue.running && jQuery.fjFunctionQueue.queue.properties.autoStart) {
				jQuery.fjFunctionQueue.queue.running = true;
				jQuery.fjFunctionQueue.queue.properties.onStart();
				jQuery.fjFunctionQueue.queue.running = false;
				jQuery.fjFunctionQueue();
			}
		}
	},
	fjTimer : function(properties) {
	    properties = jQuery.extend({interval: 10, tick: function(){}, repeat: false, random :false, onComplete: function(){}, step: 1}, properties);
	    var counter = 0;
	    var timer = new function() {
	    	this.timerId = null;
	    	this.stop = function() {
	    		clearInterval(this.timerId);
	    	}
	    }
	    timer.timerId = setInterval(function() {
	    	try {
	    		properties.tick(counter, timer);
	    		counter+=properties.step;
	    	} catch (e) {
	    		alert(e);
	    	}
	    	if (properties.repeat !== true && ((properties.repeat * properties.step) <= counter || properties.repeat === false)) {
	    		timer.stop();
	    		properties.onComplete();
	    	}
	    }, properties.interval);
	},
	fjTimerEach: function(properties) {
		var ___array = properties.array;
		var ___callback = properties.tick;
		properties.repeat = ___array.length;
		if (properties.step != null) {
			properties.repeat = Math.ceil(___array.length / parseInt(properties.step, 10));
		}
		properties.tick = function(counter, timer) {
			___callback(counter, ___array[counter]);
		}
		jQuery.fjTimer(properties);
	}
});