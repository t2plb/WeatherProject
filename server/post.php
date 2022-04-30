<?php

require_once 'database.php';

if (isset($_GET['json'])) {
    $donnees = json_decode($_GET['json'], true);
    $date = new DateTime($donnees['datetime']);
    InsertDonnee($date->format('Y-m-d H:i:s'), $donnees['temp'], $donnees['humi']);
} else {
    if (isset($_GET['date']) && isset($_GET['temp']) && isset($_GET['humi'])) {
        $date = new DateTime($_GET['datetime']);
        InsertDonnee($date->format('Y-m-d H:i:s'), $_GET['temp'], $_GET['humi']);
    } else {
        http_response_code(400);
    }
}