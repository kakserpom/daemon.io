/**
 *  jQuery.observeHashChange (Version: 1.0)
 *
 *  http://finnlabs.github.com/jquery.observehashchange/
 *
 *  Copyright (c) 2009, Gregor Schmidt, Finn GmbH
 **/
(function($) {
  $.fn.hashchange = function(fn) {
	$(window).bind("jQuery.hashchange", fn);
	return this;
  };

  $.observeHashChange = function(options) {
	var opts = $.extend({}, $.observeHashChange.defaults, options);
	if (isHashChangeEventSupported()) {
	  nativeVersion();
	}
	else {
	  setIntervalVersion(opts);
	}
  };

  var locationHash = null;
  var functionStore = null;
  var interval = 0;

  $.observeHashChange.defaults = {
	interval : 500
  };

  function isHashChangeEventSupported() {
	return "onhashchange" in window;
  }

  function nativeVersion() {
	locationHash = document.location.hash;
	window.onhashchange = onhashchangeHandler;
  }

  function onhashchangeHandler(e, data) {
	var oldHash = locationHash;
	locationHash = document.location.hash;
	$(window).trigger("jQuery.hashchange", {before: oldHash, after: locationHash});
  }

  function setIntervalVersion(opts) {
	if (locationHash == null) {
	  locationHash = document.location.hash;
	}
	if (functionStore != null) {
	  clearInterval(functionStore);
	}
	if (interval != opts.interval) {
	  functionStore = setInterval(checkLocationHash, opts.interval); 
	  interval = opts.interval;
	}
  }

  function checkLocationHash() {
	if (locationHash != document.location.hash) {
	  var oldHash = locationHash;
	  locationHash = document.location.hash;
	  $(window).trigger("jQuery.hashchange", {before: oldHash, after: locationHash});
	}
  }

  $.observeHashChange();
})(jQuery);
/*!
 *  Syntax Highlighting based on 'Snippet' by SteamDev (http://steamdev.com/snippet)
 *  http://syntaxhighlight.in v1.0.0
 *  Date: Sunday Jan 1, 2012
 *  version for JQuery
 */
$(function(){function a(b){top.consoleRef=window.open("","myconsole","width=600,height=300,left=50,top=50,menubar=0,toolbar=0,location=0,status=0,scrollbars=1,resizable=1");top.consoleRef.document.writeln("<html><head><title>Snippet :: Code View :: "+location.href+'</title></head><body bgcolor=white onLoad="self.focus()"><pre>'+b+"</pre></body></html>");top.consoleRef.document.close()}$(".snippet-container").each(function(b){$(this).find("a.snippet-text").click(function(){var d=$(this).parents(".snippet-wrap").find(".snippet-formatted");var c=$(this).parents(".snippet-wrap").find(".snippet-textonly");d.toggle();c.toggle();if(c.is(":visible")){$(this).html("html")}else{$(this).html("text")}return false});$(this).find("a.snippet-window").click(function(){var c=$(this).parents(".snippet-wrap").find(".snippet-textonly").html();a(c);$(this).blur();return false})});$(".snippet-toggle").each(function(b){$(this).click(function(){$(this).parents(".snippet-container").find(".snippet-wrap").toggle()})})});
$(function(){
	$('.twit_box').css('display','block');
	var doc = $(document);
	var win = $(window);
	var handler = function(){
		var top = $(this).scrollTop();
		if (top > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
		if (top + 30 < doc.height() - win.height()) {
			$('.scrolldown').fadeIn();	
		} else {
			$('.scrolldown').fadeOut();
		}
	};
	$(window).scroll(handler);
	handler();
			
	$('.scrollup').click(function(){
		var to = win.scrollTop() - win.height()*0.6 ;
		$("html, body").animate({ scrollTop: to > 0 ? to : 0}, 500);
		return false;
	});

	$('.scrolldown').click(function(){
		var to = win.scrollTop() + win.height()*0.6;
		var dh = doc.height();
		$("html, body").animate({ scrollTop: to > dh ? dh : to}, 500);
		return false;
	});

	$('.accordion h2 > a').click(function(){
		var ablock = $(this).closest('div').find('.accordion-content');
		var section = $(this).closest('section');
		var pos = $('section').index(section);
		var opened = $('.accordion .opened');
		if (ablock.get(0) !== opened.get(0)) {
			opened.removeClass('opened').slideUp();
			ablock.addClass('opened').slideDown({'complete': function() {
				$('html, body').animate({
					scrollTop: pos === 0 ? 0: -35 + section.prev().offset().top
				}, 500, 'easeInSine');
			}});
		}
	});

	var loaded = false;
	var updateHash = function() {
		$('.accordion h2 > a[href="'+document.location.hash+'"]').click();

		$('a.headinglink').each(function() {
			$(this).attr('name', '');
		});
		var link = $('a.headinglink[href="'+document.location.hash+'"]');
		if (!link.length) {
			loaded = true;
			return;
		}
		if (!loaded) {
			$("html, body").scrollTop(link.offset().top - 80);
			loaded = true;
			return;
		}
		$("html, body").animate({ scrollTop: link.offset().top - 80}, 500);
	};
	if (typeof ($(window).hashchange) !== 'undefined') {
		$(window).hashchange(updateHash);
	}
	updateHash();

	var OSName="Unknown OS";
	if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
	if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
	if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
	if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";

	$.browser = {};
	$.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
	$.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
	$.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
	$.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
	var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
	var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
	var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
	var is_safari = navigator.userAgent.indexOf("Safari") > -1;
	var is_Opera = navigator.userAgent.indexOf("Presto") > -1;
	if ((is_chrome)&&(is_safari)) {is_safari=false;}

	if (OSName === 'MacOS' && $.browser.webkit && is_chrome) {
		$('html > head').append($('<style>.caption p {font-weight: bold;}</style>'));
	}


	var header = $('header'),
	win = $(window),
	activated = false;
	activateScrollListener = function () {
		if (activated) {
			return;
		}
		activated = true;
		header.css('position', 'absolute');
		win.scroll(function(){
			var pos = win.scrollTop();
			if (pos < 0) {
				pos = 0;
			}
			var by = $(document).height();
			var wy = win.height();
			if (pos > by - wy) {
				pos = by - wy;
			}
			header.css('top', pos);
		}).trigger('scroll');
	},
	deactivateScrollListener = function() {
		if (!activated) {
			return;
		}
		activated = false;
		header.css({'position': 'fixed', 'top': 0});
		win.unbind('scroll');
	},
	onresize = function() {
		if ($(window).width() < 1020) {
			activateScrollListener();
		} else {
			deactivateScrollListener();
		}
	};
	onresize();
	$(window).resize(onresize);

	$('.copysnippet').on('click', function() {
		$(this).select();
	});
	setInterval(function() {
		$('a.addthis_button_twitter').attr('href', 'javascript:void(0)');
	}, 1000);
	setInterval(function() {
		$('div.at-quickshare').css({'position':'fixed', 'left':'30px', 'top':'50px'});
	}, 50);
});