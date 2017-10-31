<?php

require 'weather.php';
require 'webcam.php';
require_once 'forecast.php';

?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/weather-icons.css" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-transparent">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php" method="post" name="searchCity">
            <input class="form-control mr-sm-2" type="search" placeholder="City..." aria-label="Search"
                   name="searchCity">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="..." alt="First slide">
        </div>
        <div class="carousel-item">
            <?php
            if (!empty($_POST['searchCity']) && isset($_POST['searchCity']) && $_POST['searchCity'] != 'NULL') {

                ?>
                <section id="currentWeather">
                <div class="row">
                    <div class="col-sm-6">
                        <h1><?= $cityName ?><span id="weatherId"><?= $weatherId ?></span></h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p id="currentDate"><?= $today ?></p>
                    </div>
                </div>
                <div class="row">
                    <div id="weather" class="offset-sm-2 col-sm-4">
                        <p class="text-center" id="weatherIcon"><i class="wi wi-night-sleet"></i></p>
                    </div>
                    <div id="temperature" class="offset-sm-1 col-sm-4">
                        <p class="text-right"><?= $tempMax ?>°</p>
                    </div>
                </div>
                <div class="row">
                    <div id="humidity" class="offset-sm-3 col-sm-3">
                        <p class="text-center"><i class="wi wi-raindrop"></i> <?= $humidity ?></p>
                    </div>
                    <div id="wind" class="col-sm-3">
                        <p class="text-center"><i class="wi wi-strong-wind"></i><?= $wind ?> meter/sec</p>
                    </div>
                </div>
                </section>
                <?php



            }
            if (isset($forecastTableHead)) {
                echo '<table><tr>';
                foreach ($forecastTableHead as $tableHead) {
                    echo '<th>' . $tableHead . '</th>';
                }
                echo '</tr><tr>';
                foreach ($forecastTableDataWeather as $tabledata) {
                    echo '<td>' . $tabledata . '</td>';
                }
                echo '</tr><tr>';
                foreach ($forecastTableDataTemp as $tabledata) {
                    echo '<td>' . $tabledata . '</td>';
                }
                echo '</tr><tr>';
                foreach ($forecastTableDataHumidity as $tabledata) {
                    echo '<td>' . $tabledata . '</td>';
                }
                echo '</tr><tr>';
                foreach ($forecastTableDataWind as $tabledata) {
                    echo '<td>' . $tabledata . '</td>';
                }
                echo '</tr></table>';
            }

            ?>
        </div>
        <div class="carousel-item">
            <?php
            if (!empty($_POST['searchCity']) && isset($_POST['searchCity']) && $_POST['searchCity'] != 'NULL') {
                $resultSearchCity = searchByLatLon($lat, $lon);

                if (isset($resultSearchCity)) {
                    echo $resultSearchCity;
                }
            }

            if (!empty($_POST['region']) && isset($_POST['region']) && $_POST['region'] != 'NULL'){
                $region = $_POST['region'];
                $resultRegion = searchByRegion($region);
                if (isset($resultRegion)){
                    echo $resultRegion;

                }

            }?>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>


<script async type="text/javascript" src="https://api.lookr.com/embed/script/player.js"></script>
<script src="script.js" type="text/javascript"></script>

</body>
</html>