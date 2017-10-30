<?php
//units=For temperature in Celsius use units=metric
//5128638 is new york ID
//$url = "http://api.openweathermap.org/data/2.5/weather?id=   {IDCITY}  8&lang=en&units=metric&APPID=  {APIKEY}";
if(!empty($_POST)) {

$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $_POST['city'] . "&lang=en&units=metric&APPID=c37c40b50020a0babaa686080330ef22";

$contents = file_get_contents($url);
$climate=json_decode($contents);
//var_dump($climate);

$temp_max=$climate->main->temp_max;
$temp_min=$climate->main->temp_min;
$wind=$climate->wind->speed;
$icon=$climate->weather[0]->icon.".png";
$weather= $climate->weather[0]->main;
$weatherDescription= $climate->weather[0]->description;

//variable lon and lat for cams
$lon =$climate->coord->lon;
$lat =$climate->coord->lat;


$today = date("l jS \of F Y h:i:s A");
$cityname = $climate->name;

echo $cityname . " - " .$today . "<br>";
echo "lon : " . $lon . " - lat : " . $lat . " - " .$today . "<br>";
echo "Weather: " . $weather . " : " . $weatherDescription . "<br>";
echo "Temp Max: " . $temp_max ."&deg;C<br>";
echo "Temp Min: " . $temp_min ."&deg;C<br>";
echo "Wind speed: " . $wind ."<br>";
echo "Wind speed: " . $wind ."<br>";
echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";

}