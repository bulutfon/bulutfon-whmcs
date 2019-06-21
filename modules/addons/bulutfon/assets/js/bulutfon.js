var tabs = $('ul.client-tabs').not('.dont-inject')
tabs.append('<li class="tab bulutfon-tab"><a href="#">Bulutfon</a></li>')
$('ul.client-tabs').on('click', '.bulutfon-tab', function(e) {
    e.preventDefault();
    $('ul.client-tabs li').removeClass('active');
    $(this).addClass('active');
    $('.tab-pane.active').html(' ')
})