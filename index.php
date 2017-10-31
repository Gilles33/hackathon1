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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-transparent">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <input class="form-control mr-sm-2" type="search" placeholder="City..." aria-label="Search" name="searchCity">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<?php


if (!empty($_POST['searchCity']) && isset($_POST['searchCity']) && $_POST['searchCity'] != 'NULL') {

    ?>

    <section id="currentWeather">
        <h1><?= $cityName ?><span id="weatherId"><?= $weatherId ?></span></h1>
        <p><?= $today ?></p>
        <p><img src='http://openweathermap.org/img/w/<?= $icon ?>'/> <?= $weather ?> : <?= $weatherDescription ?></p>
        <ul>
            <li>Temperature</li>
            <ul>
                <li>Max : <?= $tempMax ?></li>
                <li>Max : <?= $tempMin ?></li>
            </ul>
            <li>Wind : <?= $wind ?> meter/sec</li>
        </ul>
    </section>
    <?php


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

}

    if (isset($forecastTableHead)) {
        echo '<table><tr>';
        foreach ($forecastTableHead as $tableHead) {
            echo '<th>' . $tableHead . '</th>';
        }
        echo '</tr><tr>';
        foreach ($forecastTableData as $tabledata) {
            echo '<td>' . $tabledata . '</td>';
        }
        echo '</tr></table>';
    }
}
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script async type="text/javascript" src="https://api.lookr.com/embed/script/player.js"></script>
<script src="script.js" type="text/javascript"></script>
</body>
</html>