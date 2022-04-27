<?php

$bdd = new PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', 'toor');
$sql = "SELECT * FROM donnees";
$stmt = $bdd->prepare($sql);
$stmt->execute();

/*
$_GET['id'];
$_GET['from'] -> timestamp à convertir en datetime;
$_GET['to'] -> timestamp à convertir en datetime;
*/

// /reader.php?id=1&from=12587412347&to=1248321574

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

/*
[
    {
        "date":"2022-04-27 19:32:28",
        "temperature":"12",
        "humidite":"50"
    },
    {
        "date":"2022-04-27 19:32:51",
        "temperature":"12",
        "humidite":"50"
    },
    {
        "date":"2022-04-27 19:32:55",
        "temperature":"12",
        "humidite":"50"
    }
]
*/