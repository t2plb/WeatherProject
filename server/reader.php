<?php


$bdd = new PDO('mysql:host=192.168.1.183;dbname=meteo;charset=utf8', 'username', 'passwd');
$sql = "SELECT * FROM donnees WHERE date >=? AND date <=?";
$stmt = $bdd->prepare($sql);
$stmt->execute([$_GET['from'], $_GET['to']]);

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