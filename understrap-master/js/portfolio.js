$('#all').on('click', ()=> {
    $('#all').addClass('is-checked');
    $('.portfolio-item').removeClass('hide');
    $('#website, #logo, #ui, #photo, #app').removeClass('is-checked');
});
$('#website').on('click', ()=> {
    $('#website').addClass('is-checked');
    $('.portfolio-item').addClass('hide');
    $('.website-item').removeClass('hide');
    $('#all, #logo, #ui, #photo, #app').removeClass('is-checked');
});
$('#logo').on('click', ()=> {
    $('#logo').addClass('is-checked');
    $('.portfolio-item').addClass('hide');
    $('.logo-item').removeClass('hide');
    $('#all, #website, #ui, #photo, #app').removeClass('is-checked');

});
$('#ui').on('click', ()=> {
    $('#ui').addClass('is-checked');
    $('.portfolio-item').addClass('hide');
    $('.ui-item').removeClass('hide');
    $('#all, #logo, #website, #photo, #app').removeClass('is-checked');
});
$('#photo').on('click', ()=> {
    $('#photo').addClass('is-checked');
    $('.portfolio-item').addClass('hide');
    $('.photo-item').removeClass('hide');
    $('#all, #logo, #website, #ui, #app').removeClass('is-checked');
});
$('#app').on('click', ()=> {
    $('#app').addClass('is-checked');
    $('.portfolio-item').addClass('hide');
    $('.app-item').removeClass('hide');
    $('#all, #logo, #website, #photo, #ui').removeClass('is-checked');
});
