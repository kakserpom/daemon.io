$(function(){
    $('.accordion h2 > a').click(function(){
        var ablock = $(this).closest('div').find('.accordion-content');
        var opened = $('.accordion .opened');
        
        if(ablock.get(0) !== opened.get(0))
        {
            opened.removeClass('opened').slideUp();
            ablock.addClass('opened').slideDown();
        }
        return false;
    });
    return;
	var header = $('header').addClass('pseudofixed'),
	win = $(window);
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
});