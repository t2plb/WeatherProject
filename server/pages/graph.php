<?php

// Ouvrir BDD
require_once '../database.php';
$sondes = getSondes();

?>

<div class="row">
    <select name="sonde" id="sonde">
        <?php
        /*
         * $data = [
         * 'id' = 1,
         * 'name' = 'chambre'
         * ]
        foreach($sondes as $data){
            echo "<option value=$data['id']">$data['name']</option>";
        }
        */
        ?>
    </select>
</div>
