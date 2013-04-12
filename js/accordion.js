$(document).ready(function(){
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
});