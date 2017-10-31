$(document).ready(function() {
    if($('#weatherId').html() === '800' ){
        $('body').css('background-image', 'url(img/clouds-2117447_1920.jpg)');
    }
    if($('#weatherId').html() >= 200 && $('#weatherId').html() <= 232 ){
        $('body').css('background-image', 'url(img/flash-2702168_1920.jpg)');
    }

    if($('#weatherId').html() >= 300 && $('#weatherId').html() <= 321 ){
        $('body').css('background-image', 'url(img/rain-455124_1920.jpg)');
    }

    if($('#weatherId').html() >= 500 && $('#weatherId').html() <= 531 ){
        $('body').css('background-image', 'url(img/rain-2362871_1920.jpg)');
    }

    if($('#weatherId').html() >= 600 && $('#weatherId').html() <= 622 ){
        $('body').css('background-image', 'url(img/winter-20234_1920.jpg)');
    }

    if($('#weatherId').html() >= 700 && $('#weatherId').html() <= 781){
        $('body').css('background-image', 'url(img/autumn-2822588_1920.jpg)');
    }

    if($('#weatherId').html() > 800 && $('#weatherId').html() <= 804 ){
        $('body').css('background-image', 'url(img/cloud-1601928_1920.jpg)');
    }

    if($('#weatherId').html() >= 900 && $('#weatherId').html() <= 906 ){
        $('body').css('background-image', 'url(img/park-city-1688712_1920.jpg)');
    }

});