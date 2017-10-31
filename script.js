$(document).ready(function() {
    // background selection
    if($('#weatherId').html() === '800' ){
        $('body').css('background-image', 'url(img/clouds-2117447_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-day-sunny"></i>');
    }
    if($('#weatherId').html() >= 200 && $('#weatherId').html() <= 232 ){
        $('body').css('background-image', 'url(img/flash-2702168_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-storm-showers"></i>');
    }

    if($('#weatherId').html() >= 300 && $('#weatherId').html() <= 321 ){
        $('body').css('background-image', 'url(img/rain-455124_1920.jpg)');
        $('h1, #currentWeather > div, .wi').css('color', 'cornflowerblue');
        $('h1, #currentWeather > div, .wi').css('text-shadow', '2px 2px white');
        $('#weatherIcon').html('<i class="wi wi-sprinkle" style="color : cornflowerblue; text-shadow : 2px 2px white"></i>');

    }

    if($('#weatherId').html() >= 500 && $('#weatherId').html() <= 531 ){
        $('body').css('background-image', 'url(img/rain-2362871_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-rain"></i>');
    }

    if($('#weatherId').html() >= 600 && $('#weatherId').html() <= 622 ){
        $('body').css('background-image', 'url(img/winter-20234_1920.jpg)');
        $('h1, #currentWeather > div, .wi').css('color', 'lightcyan');
        $('#weatherIcon').html('<i class="wi wi-snow" style="color : lightcyan"></i>');
    }

    if($('#weatherId').html() >= 700 && $('#weatherId').html() <= 781){
        $('body').css('background-image', 'url(img/autumn-2822588_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-windy"></i>');
    }

    if($('#weatherId').html() > 800 && $('#weatherId').html() <= 804 ){
        $('body').css('background-image', 'url(img/cloud-1601928_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-cloudy"></i>');
    }

    if($('#weatherId').html() >= 900 && $('#weatherId').html() <= 906 ){
        $('body').css('background-image', 'url(img/park-city-1688712_1920.jpg)');
        $('#weatherIcon').html('<i class="wi wi-meteor"></i>');
    }

    if($('#slideHome').hasClass('active')) {
        $('nav').css('display', 'none');
    }

    $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
        if($('#slideHome').hasClass('active')) {
            $('nav').css('display', 'none');
        } else {

                $('nav').css('display', 'flex');
            }
        
    });

});