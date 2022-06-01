<?php

//$from = (new DateTime('@' . $_GET['from']))->format('Y-m-d H:i:s');
$from = new DateTime('@' . $_GET['from']);
$from->setTimezone(new DateTimeZone('Europe/Paris'));
$from = $from->format('Y-m-d H:i:s');

//$to = (new DateTime('@' . $_GET['to']);,)->format('Y-m-d H:i:s');
$to = new DateTime('@' . $_GET['to']);
$to->setTimezone(new DateTimeZone('Europe/Paris'));
$to = $to->format('Y-m-d H:i:s');

$bdd = new PDO('mysql:host=192.168.1.183;dbname=meteo;charset=utf8', 'evelynedheliat', 'Casquette2022!');
$sql = "SELECT * FROM donnees WHERE date >=? AND date <=?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$from, $to]);

$json = array();
while($row = $stmt->fetch()){

    $obj = new \stdClass();
    $obj->date = $row["date"];
    $obj->temperature = $row["temp"];
    $obj->humidite = $row["humi"];
    $json[] = $obj;

    /*
    echo "Date & Heure : ".$row["date"]."<br/>";
    echo "Temperature : ".$row["temp"]."<br/>";
    echo "Humidité : ".$row["humi"]."<br/>";
    */
}

echo json_encode($json);