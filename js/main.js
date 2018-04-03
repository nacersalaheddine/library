($(document).ready(function () {
var $nav = $("div#topnav").children();
$("div#menu a.icon").click(function(){

$("div#menu").toggleClass("responsive");
});

$nav.click(function(){

    $nav.removeClass("active");
    $(this).addClass("active");
});





}));
