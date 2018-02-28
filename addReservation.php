<?php
    require('Back-End/Database.php');
    require('Back-End/AccountSession.php');
    //$date = $_POST['date'];
    //$fromTime = $_POST['fromTime'];
    //$toTime = $_POST['toTime'];
    //$place = $_POST['place'];
    //Test
    $date = "10-02-2018";
    $fromTime = "17:00";
    $toTime = "20:00";
    $place = "Platz 2";
    if(toTime < $fromTime){
        echo "false date <br>";
        die();
    }
    echo "true date <br>";
    $format = "%d-%m-%Y %H:%i";
    $db = Database::get_instance();
    $fromDate = $date . " ". $fromTime;
    $toDate = $date . " ". $toTime;
    echo $fromDate . "<br>" . $toDate ." <br>";
    $res = $db->query("SELECT * FROM reservations WHERE '".$place."' = place AND NOT ( STR_TO_DATE('" .$fromDate ."', '" . $format ."') <= from_Date AND STR_TO_DATE('" . $toDate ."', '" .$format ."') <= from_date ) AND NOT STR_TO_DATE('" .$fromDate."', '" .$format."') < to_Date");
    echo $res->num_rows . "<br>";
    if($res->num_rows == 1){
        echo "false existent";
        die();
    }
    $db->query("INSERT INTO reservations VALUES (0, '".$place."',STR_TO_DATE('".$fromDate."', '".$format."'), STR_TO_DATE('".$toDate."', '".$format."'))");
    return "true";

