<?php

include_once 'Database.php';

class Reservation{
    public static function add($person_id, $place, $start, $end, $priority){
        $format = "%Y-%m-%d %H:%i";
        if(empty($person_id) || empty($place) || empty($start) || empty($end)  || strlen($start) != 16 || strlen($end) != 16|| date($format, strtotime($start)) >= date($format, strtotime($end))){
            echo json_encode(array("error"=>true, "description"=>"fehlerhafte Daten"));
            die();
        }
        $db = Database::get_instance();
        $res = $db->query("SELECT * FROM reservations WHERE '".$place."' = place AND (( STR_TO_DATE('" .$start ."', '" . $format ."') >= from_Date OR STR_TO_DATE('" . $end ."', '" .$format ."') >= from_date) And STR_TO_DATE('" .$start."', '" .$format."') < to_Date)");
        $res = $db->to_array($res);
        if(!empty($res[0])){
            echo json_encode(array("error"=>true, "description"=>"Zu diesem Zeitpunkt ist dieser Platz schon reserviert"));
            die();
        }
        if((strtotime($end)- strtotime($start))/60 < 5){
            echo json_encode(array("error"=>true, "description"=>"minimale Reservierungsdauer beträgt 5min"));
            die();
        }
        $db->query("INSERT INTO reservations (person_id, place, from_Date, to_Date,  priority) VALUES (".$person_id.", '".$place."',STR_TO_DATE('".$start."', '".$format."'), STR_TO_DATE('".$end."', '".$format."'),".$priority .")");
        return json_encode(array("error"=>false, "description"=>"Erfolgreich reserviert"));
    }
}