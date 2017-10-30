<?php
require_once 'weather.php'
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


</body>
</html>