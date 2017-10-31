<?php
//units=For temperature in Celsius use units=metric
//5128638 is new york ID
if (!empty($_POST)) {

    $urlForecast = "http://api.openweathermap.org/data/2.5/forecast/?q=" . $_POST['city'] . "&lang=en&units=metric&&APPID=c37c40b50020a0babaa686080330ef22";

    $contentsForecast = file_get_contents($urlForecast);
    $climateForecast = json_decode($contentsForecast);
    $forecastTableHead = [];
    $forecastTableData = [];

    for($i=4; $i <=36 ; $i += 8) {
        $date = strtotime($climateForecast->list[$i]->dt_txt);
        $newFormat = date('d-m-Y', $date);
        $forecastTableHead[] =  $newFormat;
        $forecastTableData[] = $climateForecast->list[$i]->weather[0]->main . ' : ' . $climateForecast->list[$i]->weather[0]->description;
    }
}
