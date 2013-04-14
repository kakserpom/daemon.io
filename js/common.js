/**
 *  jQuery.observeHashChange (Version: 1.0)
 *  http://finnlabs.github.com/jquery.observehashchange/
 **/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.i.h=2(i){$(a).w("d.h",i);s x};$.f=2(j){4 5=$.y({},$.f.r,j);9(m()){l()}v{t(5)}};4 1=c;4 b=c;4 3=0;$.f.r={3:D};2 m(){s E a.k!==\'C\'}2 l(){1=7.6.8;a.k=n}2 n(e,B){4 g=1;1=7.6.8;$(a).q("d.h",{u:g,o:1})}2 t(5){9(1==c){1=7.6.8}9(b!=c){z(b)}9(3!=5.3){b=A(p,5.3);3=5.3}}2 p(){9(1!=7.6.8){4 g=1;1=7.6.8;$(a).q("d.h",{u:g,o:1})}}$.f()})(d);',41,41,'|locationHash|function|interval|var|opts|location|document|hash|if|window|functionStore|null|jQuery||observeHashChange|oldHash|hashchange|fn|options|onhashchange|nativeVersion|isHashChangeEventSupported|onhashchangeHandler|after|checkLocationHash|trigger|defaults|return|setIntervalVersion|before|else|bind|this|extend|clearInterval|setInterval|data|undefined|500|typeof'.split('|'),0,{}))
/*!
 *  Syntax Highlighting based on 'Snippet' by SteamDev (http://steamdev.com/snippet)
 *  http://syntaxhighlight.in v1.0.0
 *  Date: Sunday Jan 1, 2012
 *  version for JQuery
 */
$(function(){function a(b){top.consoleRef=window.open("","myconsole","width=600,height=300,left=50,top=50,menubar=0,toolbar=0,location=0,status=0,scrollbars=1,resizable=1");top.consoleRef.document.writeln("<html><head><title>Snippet :: Code View :: "+location.href+'</title></head><body bgcolor=white onLoad="self.focus()"><pre>'+b+"</pre></body></html>");top.consoleRef.document.close()}$(".snippet-container").each(function(b){$(this).find("a.snippet-text").click(function(){var d=$(this).parents(".snippet-wrap").find(".snippet-formatted");var c=$(this).parents(".snippet-wrap").find(".snippet-textonly");d.toggle();c.toggle();if(c.is(":visible")){$(this).html("html")}else{$(this).html("text")}return false});$(this).find("a.snippet-window").click(function(){var c=$(this).parents(".snippet-wrap").find(".snippet-textonly").html();a(c);$(this).blur();return false})});$(".snippet-toggle").each(function(b){$(this).click(function(){$(this).parents(".snippet-container").find(".snippet-wrap").toggle()})})});
$(function(){
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