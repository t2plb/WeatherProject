<?php

function openDatabase(){

    global $bdd;

    $bdd = new PDO('mysql:host=192.168.1.183;dbname=meteo;charset=utf8', 'username', 'passwd');
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

function LireDonnee($from, $to){

    global $bdd;

    if($bdd == null){
        openDatabase();
    }
    $sql = "SELECT date, temp, humi, FROM donnees WHERE (date >= ? AND date <= ?)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$from, $to]);

    return $stmt;
}