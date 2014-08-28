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

var getOffset = document.documentElement.getBoundingClientRect ?
	function(elem) {
		return getOffsetRect(elem);
	} :
	function(elem) {
		return getOffsetSum(elem);
	};

function getOffsetSum(elem) {
	var top=0, left=0;

	while(elem) {
		top = top + parseInt(elem.offsetTop, 10);
		left = left + parseInt(elem.offsetLeft, 10);
		elem = elem.offsetParent;
	}

	return {
		top: top,
		left: left
	};
}

function getOffsetRect(elem) {
	var box = elem.getBoundingClientRect();

	var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
	var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

	var clientTop = docEl.clientTop || body.clientTop || 0;
	var clientLeft = docEl.clientLeft || body.clientLeft || 0;

	var top  = box.top +  scrollTop - clientTop;
	var left = box.left + scrollLeft - clientLeft;

	return {
		top: Math.round(top),
		left: Math.round(left)
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
		$body = $('body'),
		global_lang = $('html').attr('lang');

	$('.toggle_sidebar_button').on('click', function(){
		$body.toggleClass('force_show_sidebar');
	});

	// hide sidebar on every click in menu (if small screen)
	$('.sidebar').on('click', 'a', function() {
		$body.removeClass('force_show_sidebar');
	});

	// add anchors
	var main_container = $('.main_container'),
		headers = main_container.find(':header[id]');

	headers.wrapInner('<div class="in" />');
	headers.find('.in').addClass('anchor');

	main_container
		.on('click', ':header[id] .anchor, .anchor[id] pre', function() {
			window.location = '#' + $(this).parent().attr('id');
		});

			// .each(function() {
			// 	var that = $(this),
			// 		path = that.find('.header-path');

			// 	if(path.length) {
			// 		path.before('<span class="anchor_char">¶</span>');
			// 	} else {
			// 		that.append('<span class="anchor_char">¶</span>');
			// 	}
			// })

	// обработка сцец ссылок ./ и ../
	main_container.on('click', 'a', function(event) {
		var that = $(this),
			href = that.attr('href'),
			postfix = '',
			parent = null;

		// #./link
		if(href.indexOf('#./') === 0) {
			event.preventDefault();

			parent = that.parentsUntil('.main_container').last();
			postfix = href.slice(3);

			if(!parent.length) {
				return false;
			}

			if( parent.is(':header') ) {
				header = parent;
			}
			else {
				curr = parent;

				while(true) {
					header = curr.prev();

					if(!header.length) {
						return false;
					}

					if(header.is(':header')) {
						break;
					}

					curr = header;
				}
			}

			if(header.length) {
				window.location = '#' + header.attr('id') + (postfix ? '/'+postfix : '');
			}
		}
		else
		// #(../)+link
		if(href.indexOf('#../') === 0) {
			event.preventDefault();

			var matches = href.match(/^\#(\.\.\/)+/g);
			var count = (matches[0].length - 1) / 3 + 1;
			postfix = href.slice(matches[0].length);

			var curr = that;
			var header = null;
			var level = 0;

			loop:
			while(true) {
				if(level) {
					while(true) {
						header = curr.prev();

						if(!header.length) {
							break loop;
						}

						if(header.is('h'+ level +'[id]')) {
							break;
						}

						curr = header;
					}
				} else {
					parent = curr.parentsUntil('.main_container').last();

					if(!parent.length) {
						break;
					}

					if( parent.is(':header') ) {
						header = parent;
					}
					else {
						curr = parent;

						while(true) {
							header = curr.prev();

							if(!header.length) {
								break loop;
							}

							if(header.is(':header')) {
								break;
							}

							curr = header;
						}
					}

					level = +header[0].tagName.slice(1);

					if(level - count < 1) {
						return false;
					}

					// console.log(header, level, count);
				}

				// console.log(header, level, count);

				if(--count < 1 || !header.length) {
					break;
				}
				
				if(--level < 1) {
					break;
				}

				curr = header;
			}

			if(header.length) {
				window.location = '#' + header.attr('id') + (postfix ? '/'+postfix : '');
			}
		}
	});

	//выбор языка
	(function(){
		var btn = $('#langchoose'),
			bar = $('.lang-chooser').eq(0);

		btn.on('click', function(event) {
			event.preventDefault();

			bar.stop().animate({
				top: bar.css('top') != '-35px' ? -35 : 35
			}, 300);
		});

		$('.lang-chooser a').on('click', function(event) {
			event.preventDefault();

			window.location.href = $(this).attr('href') + window.location.hash;
			btn.trigger('click');
		});
	})();

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
		'callable': 1,
		'mixed': '<a href="http://php.net/manual/ru/language.pseudo-types.php" target="_blank" />'
	};

	// типы переменных делаем ссылками
	$('.code_highlight, pre.inline code').each(function(){
		$('.hljs-keyword', this).each(function(){
			var obj = $(this);
				text = obj.text();

			if(phpTypes[text] === 1) {
				obj.wrap('<a href="http://php.net/manual/'+ global_lang +'/language.types.'+ text +'.php" target="_blank" />');
			}
			else
			if (phpTypes[text]) {
				obj.wrap( phpTypes[text] );
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


	var currLink = null,
		prevLink = null,
		currNavItem = null,
		prevNavItem = null;

	var wrapSidebar = $('.sidebar'),
		wrapSidebarUl = wrapSidebar.children('ul').eq(0),
		wrapContent = $(document);

	(function(){
		var scrollTo = 0;
		var lastPushedLink = '';

		// переход по разделам
		var pushState = $.debounce(500, false, function(){
			if(currLink !== lastPushedLink) {
				history.pushState(null, null, currLink);
				lastPushedLink = currLink;
			}
		});

		var scrollToDo = $.throttle(700, false, function(){
			wrapSidebar.stop().animate({
				scrollTop: scrollTo
			}, 400);
		});

		// тень сайдбара
		var wrapSidebarHasClass = false;
		var wrapSidebarScrollBtn = $.throttle(200, false, function(){
			if(wrapSidebar.scrollTop() >= wrapSidebarUl.height() - wrapSidebar.height()) {
				if(wrapSidebarHasClass) {
					wrapSidebar.removeClass('showbtn');
					wrapSidebarHasClass = false;
				}
			} else {
				if(!wrapSidebarHasClass) {
					wrapSidebar.addClass('showbtn');
					wrapSidebarHasClass = true;
				}
			}
		});

		wrapSidebar.on({
			scroll: function(event) {
				wrapSidebar.stop();
				wrapSidebarScrollBtn();
			},
			mouseenter: function() {
				$body.css('overflow', 'hidden');
			},
			mouseleave: function() {
				$body.css('overflow', '');
			},
		});

		wrapSidebarScrollBtn();

		wrapSidebar.find('.downbtn').on('click', function() {
			scrollTo = wrapSidebar.scrollTop() + 100;
			scrollToDo();
		});

		function setMainhead() {
			console.log('head');
		}

		function setNavActive() {
			console.log('nav');
		}

		$(':header[id], .anchor[id]').waypoint(function() {
			var that = this;

			if(that.tagName.slice(0,1).toLowerCase() === 'h') {
				setMainhead();
			}

			setNavActive();
			pushState();
		}, {offset: -1});
	})();

	// навигация клавиатурой
	(function(){
		function getNavElemV(dir) {
			var curr = currNavItem.parent(),
				next = null;

			while(1) {
				next = curr[dir]();

				if(!next.length) {
					curr = curr.parent('ul').parent('li');

					if(dir === 'prev') {
						next = curr;
						break;
					}

					continue;
				}

				break;
			}

			return next;
		}

		function getNavElemH(dir) {
			var curr = currNavItem.parent(),
				next = null;

			if(dir === 'right') {
				next = curr.children('ul').eq(0).children('li').eq(0);

				if(!next.length) {
					return getNavElemV('next');
				}
			}
			else {
				next = curr.parent('ul').parent('li');

				if(!next.length) {
					return getNavElemV('prev');
				}
			}

			return next;
		}

		function vMove(dir) {
			var next = getNavElemV(dir);
			var url = next.children('a').eq(0).attr('href');

			if(url) {
				window.location = url;
			}
		}

		function hMove(dir) {
			var next = getNavElemH(dir);
			var url = next.children('a').eq(0).attr('href');

			if(url) {
				window.location = url;
			}
		}

		$(document).keydown(function(event) {
			var superKey = event.ctrlKey || event.altKey;

			// left
			if(superKey && event.which === 37) {
				event.preventDefault();
				hMove('left');
			}
			else
			// right
			if(superKey && event.which === 39) {
				event.preventDefault();
				hMove('right');
			}
			else
			// up
			if(superKey && event.which === 38) {
				event.preventDefault();
				vMove('prev');
			}
			else
			// down
			if(superKey && event.which === 40) {
				event.preventDefault();
				vMove('next');
			}
		});
	})();
});