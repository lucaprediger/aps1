$(document).ready(function () {

    /* MAIN MENU */
    $('#main-menu > li:has(ul.sub-menu)').addClass('parent');
    $('ul.sub-menu > li:has(ul.sub-menu) > a').addClass('parent');

    $('#menu-toggle').click(function () {
        $('#main-menu').slideToggle(300);
        return false;
    });

    $(window).resize(function () {
        if ($(window).width() > 700) {
            $('#main-menu').removeAttr('style');
        }
    });

});

function changeUrl(numPg) {
    var site = "";
    switch (numPg){
        case 0:
            site = "view/pages/cadPessoa.php";
            break;
        case 1:
            site = "view/pages/cadUsuarioForm.php";
            break;
        case 2:
            site = "eventCalendar/index.php";
            break;
    }
    document.getElementsByName('pagina')[0].src = site;
}