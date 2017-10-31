<?php
//units=For temperature in Celsius use units=metric
//5128638 is new york ID
if (!empty($_POST['searchCity'])) {

    $urlForecast = "http://api.openweathermap.org/data/2.5/forecast/?q=" . $_POST['searchCity'] . "&lang=en&units=metric&&APPID=c37c40b50020a0babaa686080330ef22";

    $contentsForecast = file_get_contents($urlForecast);
    $climateForecast = json_decode($contentsForecast);
    $forecastTableHead = [];
    $forecastTableDataWeather = [];
    $forecastTableDataTemp =[];
    $forecastTableDataHumidity =[];

    for($i=4; $i <=36 ; $i += 8) {
        $date = strtotime($climateForecast->list[$i]->dt_txt);
        $newFormat = date('d-m-Y', $date);
        $forecastTableHead[] =  $newFormat;
        $forecastTableDataWeather[] = $climateForecast->list[$i]->weather[0]->main . ' : ' . $climateForecast->list[$i]->weather[0]->description;
        $forecastTableDataTemp[] = $climateForecast->list[0]->main->temp;
        $forecastTableDataHumidity[] = $climateForecast->list[0]->main->humidity;
        $forecastTableDataWind[] = $climateForecast->list[0]->wind->speed;
    }
}
