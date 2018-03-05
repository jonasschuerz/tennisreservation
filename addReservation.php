<?php
    require('Back-End/Database.php');
    require('Back-End/AccountSession.php');
    $date = $_POST['date'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $place = $_POST['place'];
 // $date = "10-02-2021";
 // $fromTime = "18:00";
 // $toTime = "19:00";
  $place = "Platz 1";
    if(empty($place) || empty($date) || empty($fromTime)  || empty($toTime) || $toTime < $fromTime){
        echo "false date";
        die();
    }
    //echo "true date <br>";
    $format = "%d-%m-%Y %H:%i";
    $db = Database::get_instance();
    $fromDate = $date . " ". $fromTime;
    $toDate = $date . " ". $toTime;
    $res = $db->query("SELECT * FROM reservations WHERE '".$place."' = place AND (( STR_TO_DATE('" .$fromDate ."', '" . $format ."') >= from_Date OR STR_TO_DATE('" . $toDate ."', '" .$format ."') >= from_date) And STR_TO_DATE('" .$fromDate."', '" .$format."') < to_Date)");
    $res = $db->to_array($res);
    if(!empty($res[0])){
        echo "false existent";
        die();
    }
    $db->query("INSERT INTO reservations (person_id, place, from_Date, to_Date) VALUES (0, '".$place."',STR_TO_DATE('".$fromDate."', '".$format."'), STR_TO_DATE('".$toDate."', '".$format."'))");
    echo "true";

