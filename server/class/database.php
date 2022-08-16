<?php
class Database{
    private $bdd;

    private function Open(){
        require_once '../.env.php';
        global $db_server, $db_name, $db_username, $db_password;
        $this->bdd = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $this->bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    public function Insert($date, $temperature, $humidite){
        if($this->bdd == null){
            $this->Open();
        }
        $sql = "INSERT INTO donnees (date, temp, humi) VALUES (?,?,?)";
        $stmt= $this->bdd->prepare($sql);
        $stmt->execute([$date, $temperature, $humidite]);
    }
    public function Lire($_from, $_to){

        if($this->bdd == null){
            $this->Open();
        }
        $_from = new DateTime('@' . $_from);
        $_from->setTimezone(new DateTimeZone('Europe/Paris'));
        $_from = $_from->format('Y-m-d H:i:s');

        $_to = new DateTime('@' . $_to);
        $_to->setTimezone(new DateTimeZone('Europe/Paris'));
        $_to = $_to->format('Y-m-d H:i:s');

        $sql = "SELECT date, temp, humi, FROM donnees WHERE (date >= ? AND date <= ?)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$_from, $_to]);

        return $stmt;
    }

}