<?php

$bdd = new PDO('mysql:host=192.168.1.183;dbname=meteo;charset=utf8', 'username', 'password');
$sql = "SELECT * FROM donnees";
$stmt = $bdd->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch()){
    echo "Date & Heure : ".$row["date"]."<br/>";
    echo "Temperature : ".$row["temp"]."<br/>";
    echo "Humidité : ".$row["humi"]."<br/>";
}