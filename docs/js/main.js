var body = document.body,
	docEl = document.documentElement;

function getPageHeight() {
	var scrollHeight = docEl.scrollHeight;
	var clientHeight = docEl.clientHeight;
	
	return Math.max(scrollHeight, clientHeight);
}

function getWindowHeight() {
	return docEl.clientHeight;
}
function getWindowWidth() {
	return docEl.clientWidth;
}

var getPageScroll = (window.pageXOffset !== undefined) ?
	function() {
		return {
			left: pageXOffset,
			top: pageYOffset
		};
	} :
	function() {
		var top = docEl.scrollTop || body && body.scrollTop || 0;
		top -= docEl.clientTop;

		var left = docEl.scrollLeft || body && body.scrollLeft || 0;
		left -= docEl.clientLeft;

		return { top: top, left: left };
	};

function getOffset(domel) {
	var box = domel.getBoundingClientRect();

	var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
	// var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

	var clientTop = docEl.clientTop || body.clientTop || 0;
	// var clientLeft = docEl.clientLeft || body.clientLeft || 0;
	
	var top = Math.round(box.top + scrollTop - clientTop);
	var bottom = top + box.bottom - box.top;
	// var left = box.left + scrollLeft - clientLeft;
	
	return {
		top: top,
		bottom: bottom
	};
}

// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

// Аргументы:
// name
// 	название cookie
// value
// 	значение cookie (строка)
// options
// 	Объект с дополнительными свойствами для установки cookie:
// 	expires
// 		Время истечения cookie. Интерпретируется по-разному, в зависимости от типа:
// 		Число — количество секунд до истечения. Например, expires: 3600 — кука на час.
// 		Объект типа Date — дата истечения.
// 		Если expires в прошлом, то cookie будет удалено.
// 		Если expires отсутствует или 0, то cookie будет установлено как сессионное и исчезнет при закрытии браузера.
// 	path
// 		Путь для cookie.
// 	domain
// 		Домен для cookie.
// 	secure
// 		Если true, то пересылать cookie только по защищенному соединению.
function setCookie(name, value, options) {
	options = options || {};

	var expires = options.expires;

	if (typeof expires == "number" && expires) {
		var d = new Date();
		d.setTime(d.getTime() + expires*1000);
		expires = options.expires = d;
	}
	if (expires && expires.toUTCString) {
		options.expires = expires.toUTCString();
	}

	value = encodeURIComponent(value);

	var updatedCookie = name + "=" + value;

	for(var propName in options) {
		updatedCookie += "; " + propName;
		var propValue = options[propName];
		if (propValue !== true) {
			updatedCookie += "=" + propValue;
		}
	}

	document.cookie = updatedCookie;
}


$(function(){
	var $win = $(window),
		global_lang = $('html').attr('lang');

	$('.toggle_sidebar_button').on('click', function(){
		$('body').toggleClass('force_show_sidebar');
	});

	// hide sidebar on every click in menu (if small screen)
	$('.sidebar').find('a').on('click', function(){
		$('body').removeClass('force_show_sidebar');
	});

	// add anchors
	$.each($('.main_container').find('h1,h2,h3,h4,h5,h6'), function(key, item){
		if ($(item).attr('id')) {
			$(item).addClass('anchor');
			$(item).append($('<span class="anchor_char">¶</span>'));
			$(item).on('click', function(){
				window.location = '#' + $(item).attr('id');
			});
		}
	});

	// remove <code> tag inside of <pre>
	// $.each($('pre > code'), function(key, item) {
	// 	$(item).parent().html($(item).html());
	// });

	$('pre code, .code_highlight').each(function(i, block) {
		hljs.highlightBlock(block);
	});

	var phpTypes = {
		'array': 1,
		'boolean': 1,
		'object': 1,
		'string': 1,
		'integer': 1,
		'float': 1,
		'callable': 1
	};

	$('.code_highlight, pre.inline code').each(function(){
		$('.hljs-keyword', this).each(function(){
			var obj = $(this);
				text = obj.text();

			if(phpTypes[text] === 1) {
				obj.wrap('<a href="http://php.net/manual/'+ global_lang +'/language.types.'+ text +'.php" target="_blank" />');
			} else
			if (text === 'mixed') {
				obj.wrap('<a href="http://php.net/manual/ru/language.pseudo-types.php" target="_blank" />');
			}
		});

		var that = $(this),
			html = that.html();

		// псевдотипы: url
		if(html.toLowerCase().indexOf('$') !== -1) {
			html = html.replace(/(\(|,)\s(url)\s/g, "$1 <a href=\"#development/pseudotypes/$2\"><span class=\"hljs-keyword\">$2</span></a> ");
			that.html(html);
		}
	});

	$('.hljs-class .hljs-title a').addClass('hljs-title');


	(function() {
		var obj;

		var anchors = {}, href = '';

		$('.sidebar a').each(function() {
			obj = $(this);
			href = obj.attr('href');
			anchors[href.slice(1)] = obj;
		});

		var prevLink = '',
			iter = 0, topStart = 0, topEnd = 0,
			step = 50,
			headers = {},
			items = $('.main_container').find('h2, h3, h4, h5');

		prevLink = items.eq(0).attr('id');

		items.each(function() {
			obj = $(this);
			iter = topStart;
			topEnd = obj.offset().top - 30;

			while(iter < topEnd) {
				headers['l' + (iter / step ^ 0)] = prevLink;

				iter += step;
			}

			prevLink = obj.attr('id');
			topStart = topEnd;
		});

		var scrolledTop = 0, scrollTo = 0,
			line = '', link = '',
			activeObj = $(), prevActiveLink = '',
			mainWrap = $('.main_wrap'),
			sidebar = $('.sidebar'),
			sidebarUl = sidebar.children('ul').first(),
			sideParent, sideParent2,
			sideRoot,
			sideNext, sidePrev,
			winHeight,
			topMarg = 45;

		var pushState = $.debounce(500, false, function(){
			history.pushState(null, null, '#'+ link);
		});

		var scrollToDo = $.throttle(700, false, function(){
			sidebar.stop().animate({
				scrollTop: scrollTo
			}, 400);
		});

		function setActiveSection() {
			// scrolledTop = getPageScroll().top;
			scrolledTop = mainWrap.scrollTop();
			line = 'l' + (scrolledTop / step ^ 0);
			link = headers[line];

			if(typeof link !== "undefined" && link !== prevActiveLink) {
				activeObj.removeClass('active');
				activeObj = anchors[link];

				if(activeObj) {
					activeObj.addClass('active');
					prevActiveLink = link;

					activeObj.siblings('ul').add(activeObj.parents('ul')).show();

					sideParent = activeObj.parent();
					sideParent2 = sideParent.parent().parent();
					sideParent.siblings('li').find('ul').hide();
					sideParent2.siblings().children('ul').hide();

					sideRoot = activeObj.parents('li').last();

					sideRoot.addClass('gact')
						.siblings().removeClass('gact');

					sideNext = sideRoot.next();
					sidePrev = sideRoot.prev();

					winHeight = getWindowHeight();

					if(sidePrev.length) {
						sidePrevRect = sidePrev[0].getBoundingClientRect();
						
						if(sidePrevRect.top < 0) {
							scrollTo = sidebar.scrollTop() + sidePrevRect.top - topMarg;
							scrollToDo();
						}
					} else {
						scrollTo = 0;
						scrollToDo();
					}

					if(sideNext.length) {
						sideNextRect = sideNext[0].getBoundingClientRect();
						
						if(sideNextRect.bottom > winHeight) {
							scrollTo = sidebar.scrollTop() + sideNext.position().top - sidebar.height();
							scrollToDo();
						}
					} else {
						scrollTo = sidebarUl.height();
						scrollToDo();
					}
				}
			}

			pushState();
		}

		mainWrap.on('scroll', setActiveSection);

		setTimeout(setActiveSection, 1000);

		// тень сайдбара
		var sideScrollBtn = $.throttle(200, false, function(){
			if(sidebar.scrollTop() >= sidebarUl.height() - sidebar.height()) {
				sidebar.removeClass('showbtn');
			} else {
				sidebar.addClass('showbtn');
			}
		});

		sidebar.on('scroll', sideScrollBtn);
		sideScrollBtn();


		sidebar.find('.downbtn').on('click', function() {
			scrollTo = sidebar.scrollTop() + 100;
			scrollToDo();
		});
	})();
});