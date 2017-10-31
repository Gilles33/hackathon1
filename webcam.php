<?php
/**
 * Created by PhpStorm.
 * User: bizou
 * Date: 30/10/17
 * Time: 16:56
 */

require 'vendor/autoload.php';

function searchByLatLon($lat, $lon){
    // These code snippets use an open-source library.
    $responseSearchCity = Unirest\Request::get("https://webcamstravel.p.mashape.com/webcams/list/nearby=$lat,$lon,10/limit=4?lang=en&show=webcams%3Aimage%2Clocation",
        array(
            "X-Mashape-Key" => "mhI3aqNyYCmshXxH511ZuzUDE6gsp1cUcRIjsnYb44AeFvHCbk"
        )
    );

    $jsonSearchCity = $responseSearchCity->raw_body;
    $contentSearchCity = json_decode($jsonSearchCity);
    $webcamsSearchCity = $contentSearchCity->result->webcams;

    $contentWebcamSearchCity ='<div class="row content-webcams">';

    foreach ($webcamsSearchCity as $webcam){
        if (preg_match("/:/i", $webcam->title)){
            $titleTab = explode(':', $webcam->title);
            $title = $titleTab[1];
        }else{
            $title = $webcam->title;
        }
        $contentWebcamSearchCity.= '<div class="col-xs-3"><div class="card" style="width: 20rem;">
            <iframe width="100%" name="lkr-timelapse-player-iframe" frameborder="0" allowfullscreen="true"

           src="https://api.lookr.com/embed/player/' . $webcam->id . '/day?autoresize=0&amp;referrer=http%3A%2F%2Flocalhost%2Fhackathon%2Fbordeaux-0917-hackathon1%2Findex.php"
           style="border: none;"></iframe>
            <div class="card-body">
                <h4 class="card-title">' . $title . '</h4>
                <form action="index.php" method="post" name="region">
                    <button class="btn btn-primary" type="submit" name="region" value="' . $webcam->location->region_code . '">Voir la Région</button></form>
                </div>
            </div></div>';

    }
    $contentWebcamSearchCity.= '</div>';
    return $contentWebcamSearchCity;
}


function searchByRegion($region){
    // These code snippets use an open-source library.
    $responseRegion = Unirest\Request::get("https://webcamstravel.p.mashape.com/webcams/list/region=$region/limit=4?lang=en&show=webcams%3Aimage%2Clocation",
        array(
            "X-Mashape-Key" => "mhI3aqNyYCmshXxH511ZuzUDE6gsp1cUcRIjsnYb44AeFvHCbk"
        )
    );
    $jsonRegion = $responseRegion->raw_body;
    $contentRegion = json_decode($jsonRegion);
    $webcamsRegion = $contentRegion->result->webcams;

    $contentWebcamRegion ='<div class="row content-webcams">';

    foreach ($webcamsRegion as $webcam){
        if ($webcam->status == 'active'){

            $contentWebcamRegion .= '<div class="col-sm6"><div class="card" style="width: 20rem;">
            <iframe width="100%" name="lkr-timelapse-player-iframe" frameborder="0" allowfullscreen="true"
           src="https://api.lookr.com/embed/player/' . $webcam->id . '/day?autoresize=0&amp;referrer=http%3A%2F%2Flocalhost%2Fhackathon%2Fbordeaux-0917-hackathon1%2Findex.php"
           style="border: none;"></iframe>
            <div class="card-body">
                <h4 class="card-title">' . $webcam->title . '</h4>
                <form action="index.php" method="post" name="searchCity">
                    <button class="btn btn-primary" type="submit" name="searchCity" value="' . $webcam->location->city . '">Voir la Ville</button></form>
                    </div>
                </div>
            </div>';
        }
    }

    $contentWebcamRegion .= '</div>';
    return $contentWebcamRegion;
}
