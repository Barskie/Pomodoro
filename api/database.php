<?php


require_once __DIR__ .'/vendor/autoload.php';


$con = new MongoDB\Client("mongodb+srv://admin:bardug123@pomodoro.ixsez7h.mongodb.net/?retryWrites=true&w=majority");

$db = $con->pomodoro;


?>