/*
 * jQuery liFixar v 2.0
 *
 * Copyright 2012, Linnik Yura | LI MASS CODE | http://masscode.ru
 * http://masscode.ru/index.php/k2/item/48-lifixar
 * Free to use
 * 
 * 31.01.2013
 */
(function($){
	$.fn.liFixar = function(params){
		var p = $.extend({
			relative:'top',		//Край окна, относительно которого будет фиксироваться блок ('top' или 'bottom')
			fixStart:0			//Отступ от края окна браузера (любое целое число в пикселях)
		}, params);
		return this.each(function(){
			var 
			menu = $(this),
			menuH = menu.outerHeight(),
			menuW = menu.outerWidth(),
			menuTop = menu.offset().top,
			menuLeft = menu.offset().left,
			menuMarginTop = menu.css('margin-top'),
			menuMarginBottom = menu.css('margin-bottom'),
			menuCssLeft = menu.css('left'),
			menuCssRight = menu.css('right'),
			menuCssBottom = menu.css('bottom'),
			menuCssTop = menu.css('top'),
			menuCssPos = menu.css('position'),
			wH = $(window).height(),
			menuClear = $('<div>')
				.hide()
				.addClass('menuClear')
				.css({height:menuH,marginTop:menuMarginTop,marginBottom:menuMarginBottom,position:menuCssPos}),
			fixarDetect = function(){
				if(p.relative == 'bottom'){
					if($(window).scrollTop() + wH < ((menuTop + menuH) + parseFloat(menuMarginBottom)) + parseFloat(p.fixStart)){
						menu.css({left:menuLeft,bottom:(0 + parseFloat(p.fixStart)),position:'fixed'}).addClass('menuFixar');
						menuClear.show();
					}else{
						menu.css({left:menuCssLeft,top:menuCssTop,bottom:menuCssBottom,right:menuCssRight,position:menuCssPos}).removeClass('menuFixar');
						menuClear.hide()
					}
				}else{					
					if($(window).scrollTop() > ((menuTop - parseFloat(menuMarginTop)) - parseFloat(p.fixStart))){
						menu.css({left:menuLeft,top:(0 + parseFloat(p.fixStart)),position:'fixed'}).addClass('menuFixar');
						menuClear.show();
					}else{
						menu.css({left:menuCssLeft,top:menuCssTop,bottom:menuCssBottom,right:menuCssRight,position:menuCssPos}).removeClass('menuFixar');
						menuClear.hide();
					}
				}
			};
			menu.after(menuClear)
			menu.css({width:menuW})
			if(p.relative == 'bottom'){
				menu.addClass('fixarBottom');	
			}
			fixarDetect()
			$(window).on('scroll',function(){
				fixarDetect();
			})
			
		});
	};
})(jQuery);