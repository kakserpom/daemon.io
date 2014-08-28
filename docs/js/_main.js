(function() {
		var obj;

		var anchors = {}, href = '';

		$('.sidebar a').each(function() {
			obj = $(this);
			href = obj.attr('href');
			anchors[href.slice(1)] = obj;
		});

		var prevLink = '',
			iter = 0, topStart = 0, topEnd = 0, lnum = 0,
			step = 50,
			headers = {},
			// items = $('.main_container').find('h2, h3, h4, h5');
			// items = $('.main_container').find(':header[id], .anchor[id]');

		prevLink = items.eq(0).attr('id');

		items.each(function() {
			obj = $(this);
			iter = topStart;
			topEnd = getOffset(obj[0]).top ^ 0;
			
			while(iter <= topEnd) {
				lnum = iter / step ^ 0;
				headers['l' + lnum] = prevLink;

				iter += step;
			}

			prevLink = obj.attr('id');
			topStart = topEnd;
		});

		var scrolledTop = 0, scrollTo = 0,
			line = '', link = '',
			activeObj = $(), prevActiveLink = '',
			mainWrap = $(document), //$('.main_wrap'),
			sidebar = $('.sidebar'),
			sidebarUl = sidebar.children('ul').first(),
			sideParent, sideParent2,
			sideRoot,
			sideNext, sidePrev,
			winHeight,
			topMarg = 45;

		var mainhead = $('.mainhead').eq(0),
			mainheadDom = mainhead[0];

		// var lastPushedLink = '';
		// 	pushState = $.debounce(500, false, function(){
		// 		if(link !== lastPushedLink) {
		// 			history.pushState(null, null, '#'+ link);
		// 			lastPushedLink = link;
		// 		}
		// 	});

		// var scrollToDo = $.throttle(700, false, function(){
		// 	sidebar.stop().animate({
		// 		scrollTop: scrollTo
		// 	}, 400);
		// });


		var currHeadTopLimit = 0;

		mainWrap.on('scroll', function() {
			// console.log( getOffset(mainheadDom) );
			var d = currHeadTopLimit - getOffset(mainheadDom).top;

			if(d < 0) {
				mainhead.css('marginTop', d);
			}
		});

		function setMainhead() {
			var currHead = $('.main_wrap #'+ link.replace(/\//g, '\\/')),
				nextHeadNavLink = getNavElemH('right').children('a'),
				nextHead = $('.main_wrap '+ nextHeadNavLink.attr('href').replace(/\//g, '\\/') );
				nextHeadDom = nextHead[0];

			currHeadTopLimit = getOffset(nextHeadDom).top;

			mainhead.css('marginTop', 0).html( currHead.clone() );
			// console.log( 'a', getOffset(nextHeadDom) );
		}

		// @TODO учитывать малую высоту окна и большую высоту секции в навигации
		function setActiveSection() {
			// scrolledTop = getPageScroll().top;
			scrolledTop = mainWrap.scrollTop();
			line = 'l' + (scrolledTop / step ^ 0);
			link = headers[line];

			if(typeof link !== "undefined" && link !== prevActiveLink) {
				if(activeObj) {
					activeObj.removeClass('active');
				}

				if(anchors[link]) {
					activeObj = anchors[link];
					setMainhead();
				}

				if(activeObj) {
					activeObj.addClass('active');
					prevActiveLink = link;

					activeObj.siblings('ul').add(activeObj.parents('ul')).show();

					sideParent = activeObj.parent();
					sideParent2 = sideParent.parent().parent();
					sideParent.siblings('li').find('ul').hide();
					sideParent2.siblings('li').children('ul').hide();
					
					sideRoot = activeObj.parents('li').last();

					sideRoot.addClass('gact')
						.siblings().removeClass('gact');

					sideNext = sideRoot.next();
					sidePrev = sideRoot.prev();

					winHeight = getWindowHeight();


					if(sideNext.length) {
						sideNextRect = sideNext[0].getBoundingClientRect();
						
						if(sideNextRect.bottom > winHeight) {
							scrollTo = sidebar.scrollTop() + sideNext.position().top - sidebar.height();
							// scrollToDo();
						}
					} else {
						scrollTo = sidebarUl.height();
						// scrollToDo();
					}


					if(sidePrev.length) {
						sidePrevRect = sidePrev[0].getBoundingClientRect();
						
						if(sidePrevRect.top < 0) {
							scrollTo = sidebar.scrollTop() + sidePrevRect.top - topMarg;
							// scrollToDo();
						}
					} else {
						scrollTo = 0;
						// scrollToDo();
					}

					scrollToDo();
				}
			}

			pushState();
		}

		mainWrap.on('scroll', setActiveSection);


		// function getNavElemV(dir) {
		// 	var curr = activeObj.parent(),
		// 		next = null;

		// 	while(1) {
		// 		next = curr[dir]();

		// 		if(!next.length) {
		// 			curr = curr.parent('ul').parent('li');

		// 			if(dir === 'prev') {
		// 				next = curr;
		// 				break;
		// 			}

		// 			continue;
		// 		}

		// 		break;
		// 	}

		// 	return next;
		// }

		// function getNavElemH(dir) {
		// 	var curr = activeObj.parent(),
		// 		next = null;

		// 	if(dir === 'right') {
		// 		next = curr.children('ul').eq(0).children('li').eq(0);

		// 		if(!next.length) {
		// 			return getNavElemV('next');
		// 		}
		// 	}
		// 	else {
		// 		next = curr.parent('ul').parent('li');

		// 		if(!next.length) {
		// 			return getNavElemV('prev');
		// 		}
		// 	}

		// 	return next;
		// }

		// function vMove(dir) {
		// 	var next = getNavElemV(dir);
		// 	var url = next.children('a').eq(0).attr('href');

		// 	if(url) {
		// 		window.location = url;
		// 	}
		// }

		// function hMove(dir) {
		// 	var next = getNavElemH(dir);
		// 	var url = next.children('a').eq(0).attr('href');

		// 	if(url) {
		// 		window.location = url;
		// 	}
		// }

		// $(document).keydown(function(event) {
		// 	var superKey = event.ctrlKey || event.altKey;

		// 	// left
		// 	if(superKey && event.which === 37) {
		// 		event.preventDefault();
		// 		hMove('left');
		// 	}
		// 	else
		// 	// right
		// 	if(superKey && event.which === 39) {
		// 		event.preventDefault();
		// 		hMove('right');
		// 	}
		// 	else
		// 	// up
		// 	if(superKey && event.which === 38) {
		// 		event.preventDefault();
		// 		vMove('prev');
		// 	}
		// 	else
		// 	// down
		// 	if(superKey && event.which === 40) {
		// 		event.preventDefault();
		// 		vMove('next');
		// 	}
		// });

		setTimeout(setActiveSection, 1000);

		// // тень сайдбара
		// var sideScrollBtn = $.throttle(200, false, function(){
		// 	if(sidebar.scrollTop() >= sidebarUl.height() - sidebar.height()) {
		// 		sidebar.removeClass('showbtn');
		// 	} else {
		// 		sidebar.addClass('showbtn');
		// 	}
		// });

		// sidebar.on({
		// 	scroll: function(event) {
		// 		sidebar.stop();
		// 		sideScrollBtn();
		// 	},
		// 	mouseenter: function() {
		// 		$body.css('overflow', 'hidden');
		// 	},
		// 	mouseleave: function() {
		// 		$body.css('overflow', '');
		// 	},
		// });
		// sideScrollBtn();


		// sidebar.find('.downbtn').on('click', function() {
		// 	scrollTo = sidebar.scrollTop() + 100;
		// 	scrollToDo();
		// });
	})();