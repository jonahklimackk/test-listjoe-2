function addError(elem_name,text)
{
    elem = $('[name=' + elem_name + ']');
    coor = elem.offset();
    id = 'err' + Math.round(Math.random()*1000)
    $('body').append('<div class=form_error id=' + id + '><div class=rect></div><div class=text>' + text + '</div></div>')
    $('#' + id).css({
        'left':coor.left + $(elem).width() + 40,
        'top':coor.top
    }).show()
}

$(document).ready(function(){
    $('[data-submit]').click(function(){
        form = $(this).attr('data-submit');
        $('.' + form).submit();
    })
})