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
		$doc = $(document),
		$body = $('body'),
		global_lang = $('html').attr('lang');

	$('.toggle_sidebar_button').on('click', function(){
		$body.toggleClass('force_show_sidebar');
	});

	// hide sidebar on every click in menu (if small screen)
	$('.sidebar').on('click', 'a', function() {
		$body.removeClass('force_show_sidebar');
	});

	// ./
	function parseLinkCurr(event) {
		var that = $(this),
			href = that.attr('href'),
			postfix = href.slice(3),
			parent = that.parentsUntil('.main_container').last();

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
			return '#' + header.attr('id') + (postfix ? '/'+postfix : '');
		}
	}

	// ../
	function parseLinkPrev(event) {
		var that = $(this),
			href = that.attr('href'),
			parent = null;

		var matches = href.match(/^\#(\.\.\/)+/g),
			count = (matches[0].length - 1) / 3 + 1,
			postfix = href.slice(matches[0].length);

		var curr = that,
			header = null,
			level = 0;

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
			}

			if(--count < 1 || !header.length) {
				break;
			}
			
			if(--level < 1) {
				break;
			}

			curr = header;
		}

		if(header.length) {
			return '#' + header.attr('id') + (postfix ? '/'+postfix : '');
		}
	}

	$doc
		.on('click', '.method code a', function(event) {
			event.stopPropagation();
		})
		.on('click', ':header[id] .anchor, .anchor[id] pre', function() {
			window.location = '#' + $(this).parent().attr('id');
		})
		// обработка сцец ссылок ./
		.on('click', 'a[href^="#./"]', function(event) {
			event.preventDefault();
			var res = parseLinkCurr.apply(this, [event]);
			if(res) window.location = res;
		})
		// обработка сцец ссылок ../
		.on('click', 'a[href^="#../"]', function(event) {
			event.preventDefault();
			var res = parseLinkPrev.apply(this, [event]);
			if(res) window.location = res;
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

	// подсветка синтаксиса
	(function(){
		$('pre code, .code_highlight').each(function(i, block) {
			hljs.highlightBlock(block);
		});

		var phpTypes = {
			'void': 1,
			'array': 1,
			'boolean': 1,
			'object': 1,
			'string': 1,
			'integer': 1,
			'float': 1,
			'callable': 1,
			'resource': 1,
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
	})();

	var currLink = null,
		prevLink = null,
		currNavItem = null,
		prevNavItem = null,
		currNavLink = null,
		prevNavLink = null;

	var wrapSidebar = $('.sidebar'),
		wrapSidebarUl = wrapSidebar.children('ul').eq(0),
		wrapSidebarBtn = $('.sidebar-downbtn'),
		wrapMain = $('.main_wrap'),
		wrapNavWaypoints = $(':header[id], .anchor[id]'),
		wrapHeadvWaypoints = wrapNavWaypoints.filter(':header'),
		firstHeaderOffset = getOffset(wrapNavWaypoints.get(0)).top;
		// @TODO херед методов
		// wrapHeadvWaypoints = wrapNavWaypoints;

	var wrapMainhead = $('.mainhead').eq(0),
		wrapMainheadDom = wrapMainhead.get(0),
		wrapMainheadTop = parseInt(wrapMainhead.css('top'), 10);
	
	wrapMainhead.on('click', ':header', function() {
		window.location = '#' + $(this).data('id');
	});

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
			}, 200);
		});

		// кнопка сайдбара
		wrapSidebarBtn.on('click', function() {
			scrollTo = wrapSidebar.scrollTop() + 100;
			// scrollToDo();
			wrapSidebar.stop().animate({
				scrollTop: scrollTo
			}, 200);
		});

		var wrapSidebarBtnHasClass = false;
		var wrapSidebarScrollBtn = $.throttle(200, false, function(){
			if(wrapSidebar.scrollTop() >= wrapSidebarUl.height() - wrapSidebar.height()) {
				if(wrapSidebarBtnHasClass) {
					wrapSidebarBtn.removeClass('showbtn');
					wrapSidebarBtnHasClass = false;
				}
			} else {
				if(!wrapSidebarBtnHasClass) {
					wrapSidebarBtn.addClass('showbtn');
					wrapSidebarBtnHasClass = true;
				}
			}
		});

		wrapSidebar.on({
			scroll: function(event) {
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

		var wrapSidebarUlOffset, currNavItemRect, neighbor, neighborRect,
			rectTop, rectBot, winHeight;
			topMarg = 45;

		function setNavActive(header, dir) {
			prevNavLink = currNavLink;
			currNavLink = wrapSidebar.find('a[href="'+ currLink +'"]');

			prevNavItem = currNavItem;
			currNavItem = currNavLink.parent();

			if(prevNavLink) {
				prevNavLink.removeClass('active');
			}

			if(!currNavLink.length) {
				return;
			}

			currNavLink.addClass('active');

			currNavItem
				.children('ul').show()
				.children('li').children('ul').hide();
			currNavItem.parents('li').addBack().siblings('li').children('ul').hide();
			currNavItem.parents('ul').show();

			wrapSidebarUlOffset = wrapSidebarUl.offset();
			currNavItemRect = getOffset(currNavItem.get(0));
			rectTop = currNavItemRect.top - wrapSidebarUlOffset.top;
			rectBot = rectTop + currNavItem.height();
			neighbor = getNavElemV(dir === 'down' ? 'next' : 'prev').get(0);

			if(neighbor) {
				neighborRect = getOffset(neighbor);
				rectTop = Math.min(rectTop, neighborRect.top - wrapSidebarUlOffset.top);
				rectBot = Math.max(rectBot, neighborRect.top - wrapSidebarUlOffset.top + neighbor.clientHeight);
			}

			winHeight = getWindowHeight();
			scrollTo = (rectTop + rectBot - winHeight)/2 + topMarg;
			scrollToDo();
		}

		var headers_by_hash = {};
		function getHeaderByHash(hash, context) {
			if(headers_by_hash[hash]) {
				return headers_by_hash[hash];
			}

			var obj = $(hash.replace(/\//g, '\\/'), context);
			headers_by_hash[hash] = obj;
			return obj;
		}

		function getClearedHeadClone(obj) {
			return obj.clone().removeAttr('id').data('id', obj.attr('id'));

			// @TODO херед методов
			// if(!obj.is('.method')) {
			// 	return obj.clone().removeAttr('id').data('id', obj.attr('id'));
			// }

			// var nav_item = getNavElemH('left').children('a');
			// if(!nav_item.length) {
			// 	return '';
			// }

			// var clone = getHeaderByHash(nav_item.attr('href')).clone();
			// if(!clone.length) {
			// 	return '';
			// }

			// var cloneDom = clone.get(0),
			// 	result = $('<h5 />'),
			// 	method_name = obj.find('code a[href^="#./"]').eq(0).text();

			// $(cloneDom.childNodes[0].childNodes[1]).prepend( cloneDom.childNodes[0].childNodes[0] );
			// clone = $(cloneDom);
			// clone.children('.in').prepend(method_name).appendTo(result);

			// return result;
		}

		function fixCurrHead(dir) {
			if(dir === 'down') {
				var head = (this !== window) ? getClearedHeadClone($(this)) : '';
				wrapMainhead
					.html(head)
					.attr('class', head ? 'mainhead m-float' : 'mainhead m-hidden')
					.css('top', wrapMainheadTop);
			}
			else {
				var currHead,
					currItem = getNavElemPrev().children('a').eq(0);

				if(currItem.length) {
					currHead = getHeaderByHash(currItem.attr('href'));
					if(currHead.length && currHead.is('.method')) {
						currItem = getNavElemH('left', currItem.parent()).children('a').eq(0);
						if(currItem.length) {
							currHead = getHeaderByHash(currItem.attr('href'));
						}
					}

					if(currHead.length) {
						wrapMainhead.html( getClearedHeadClone(currHead) );
						fixPrevHead.apply(this, ['down']);
						return;
					}
				}

				wrapMainhead.html('');
			}
		}

		function fixPrevHead(dir) {
			if(dir === 'down') {
				wrapMainhead
					.attr('class', 'mainhead m-fixed')
					.css('top', getOffset(this).top);
			}
			else {
				if(currLink) {
					var currHead = getHeaderByHash(currLink);

					if(currHead.length && currHead.is('.method')) {
						var currItem = getNavElemH('left', currNavItem).children('a').eq(0);
						if(currItem.length) {
							currHead = getHeaderByHash(currItem.attr('href'));
						}
					}

					if(currHead && getPageScroll().top >= firstHeaderOffset) {
						fixCurrHead.apply(currHead, ['down']);
						return;
					}
				}

				fixCurrHead.apply(null, ['down']);
			}
		}

		var callWaypointByHash = function() {
			var hashObj, hash = window.location.hash;
			if(hash) {
				hashObj = getHeaderByHash(hash);
			}

			if(hashObj && hashObj.length) {
				callbackNavWaypointsDebounce('down', hashObj.get(0));
			}
			else {
				callbackNavWaypointsDebounce('down', wrapHeadvWaypoints.get(0));
			}
		};

		var isCallbackNavWaypointsCalled = false;
		var callbackNavWaypoints = function(dir, elem) {
			isCallbackNavWaypointsCalled = true;

			var that = this;

			if(elem) {
				that = elem;
			}
			
			if(dir === 'up') {
				var upheader = $(that).waypoint('prev').get(0);
				if(upheader) that = upheader;
			}

			prevLink = currLink;
			currLink = '#' + that.id;

			setNavActive(that, dir);
			pushState();
		};

		var callbackNavWaypointsDebounce = $.debounce(50, false, callbackNavWaypoints),
			fixCurrHeadDebounce = $.debounce(50, false, fixCurrHead),
			fixPrevHeadDebounce = $.debounce(50, false, fixPrevHead);

		wrapNavWaypoints.waypoint(callbackNavWaypointsDebounce);

		// wrapHeadvWaypoints.waypoint(fixCurrHeadDebounce);
		// wrapHeadvWaypoints.waypoint(fixPrevHeadDebounce, {
		// 	offset: wrapMainheadTop
		// });

		$win.on('load.waypoints.extra', function() {
			setTimeout(function(){
				if(!isCallbackNavWaypointsCalled) {
					callWaypointByHash();
				}
			}, 100);
		});


		function getNavElemPrev(elem) {
			var curr = currNavItem,
				prev = null,
				sub = null;

			if(elem) {
				curr = elem;
			}

			if(!curr || !curr.length) {
				return $();
			}

			prev = curr.prev();
			if(prev.length) {
				sub = prev.find('li').last();
				if(sub.length) {
					return sub;
				}

				return prev;
			}

			curr = curr.parent('ul').parent('li');
			if(curr.length) {
				return curr;
			}

			return $();
		}

		// навигация клавиатурой
		function getNavElemV(dir, elem) {
			var curr = currNavItem,
				next = $();

			if(elem) {
				curr = elem;
			}

			while(true) {
				if(!curr || !curr.length) break;

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

		function getNavElemH(dir, elem) {
			var curr = currNavItem,
				next = $();

			if(elem) {
				curr = elem;
			}

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

		$doc.keydown(function(event) {
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