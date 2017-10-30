<?php
/**
 * Created by PhpStorm.
 * User: bizou
 * Date: 30/10/17
 * Time: 16:56
 */

require 'vendor/autoload.php';
require 'weather.php';

// These code snippets use an open-source library.
$response = Unirest\Request::get("https://webcamstravel.p.mashape.com/webcams/list/nearby=$lat,$lon,10?lang=en&show=webcams%3Aimage%2Clocation",
    array(
        "X-Mashape-Key" => "mhI3aqNyYCmshXxH511ZuzUDE6gsp1cUcRIjsnYb44AeFvHCbk"
    )
);

$json = $response->raw_body;
$content = json_decode($json);

$webcams = $content->result->webcams;

$contentWebcam ='';


foreach ($webcams as $webcam){
    if ($webcam->status == 'active'){
        $contentWebcam .= '
            <h1>' . $webcam->title .'</h1>
            <a name="lkr-timelapse-player"
           data-id="' . $webcam->id . '"
           data-play="day"
           href="https://lookr.com/' . $webcam->id . '"
           target="_blank">Nom de la ville</a>
        ';
    }
}
