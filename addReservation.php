<?php
    require('Back-End/Database.php');
    require('Back-End/AccountSession.php')
    $date = $_POST['date'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $place = $_POST['place'];
    if(toTime < $fromTime) echo "false";
    $db = Database::get_instance();
    $db->query('INSERT INTO reservation VALUES 
