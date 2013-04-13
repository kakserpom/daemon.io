$(function(){
	$('.accordion h2 > a').click(function(){
		var ablock = $(this).closest('div').find('.accordion-content');
		var section = $(this).closest('section');
		var pos = $('section').index(section);
		var opened = $('.accordion .opened');
		if (ablock.get(0) !== opened.get(0)) {
			opened.removeClass('opened').slideUp();
			ablock.addClass('opened').slideDown({'complete': function() {
				if (pos > 0) {
					var scrollTo = ablock.offset().top - 220;
				} else {
					var scrollTo = 0;
				}
			 	$('html, body').animate({scrollTop:scrollTo}, 500, 'easeInSine');
			}});
		}
	});
	var updateHash = function() {
		$('.accordion h2 > a[href="'+document.location.hash+'"]').click();
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
		header.addClass('pseudofixed');
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
		header.removeClass('pseudofixed');
		header.css('top', 0);
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
});