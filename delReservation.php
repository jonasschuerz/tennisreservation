<?php
    require('Back-End/Database.php');
    $ticked = $_POST['isTicked'];
    $db = Database::get_instance();
    foreach ($ticked as $tick){
        $db->query("DELETE FROM `reservations` WHERE id = ". $tick);
    }
    echo print_r($ticked);