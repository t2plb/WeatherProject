<?php

function openDatabase(){

    global $bdd;

    $bdd = new PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', 'toor');
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}

function InsertDonnee($date, $temperature, $humidite){

    global $bdd;

    if($bdd == null){
        openDatabase();
    }
    $sql = "INSERT INTO donnees (date, temp, humi) VALUES (?,?,?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$date, $temperature, $humidite]);
}