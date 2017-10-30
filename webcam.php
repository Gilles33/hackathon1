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
        $contentWebcam .= '<div>
            <h1>' . $webcam->title.'</h1>
            <iframe width="100%" name="lkr-timelapse-player-iframe" frameborder="0" allowfullscreen="true"
           src="https://api.lookr.com/embed/player/' . $webcam->id . '/day?autoresize=1&amp;referrer=http%3A%2F%2Flocalhost%2Fhackathon%2Fbordeaux-0917-hackathon1%2Findex.php"
           style="border: none;" height="514.6875"></iframe>
           
        </div>';
    }
}

