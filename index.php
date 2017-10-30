<?php
require_once 'weather.php';
require 'webcam.php';
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oui Project</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="city">Enter a city</label>
    <input type="text" placeholder="City..." name="city">
    <input type="submit" value="Search">
</form>

<?php if (!empty($_POST)) { ?>
    <section id="currentWeather">
        <h1><?= $cityName ?></h1>
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
}

if(isset($contentWebcam)) {
    echo $contentWebcam;
}


?>

<script async type="text/javascript" src="https://api.lookr.com/embed/script/player.js"></script>
</body>
</html>