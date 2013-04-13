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
	$(window).hashchange(updateHash);
	updateHash();


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