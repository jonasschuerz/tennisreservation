<?php

include_once 'Database.php';

class Reservation{
    public static function add($player_id, $place_id, $start, $end, $priority){
        $format = "%Y-%m-%d %H:%i";
        if(empty($player_id) || empty($place_id) || empty($start) || empty($end)  || strlen($start) != 16 || strlen($end) != 16|| date($format, strtotime($start)) >= date($format, strtotime($end))){
            echo json_encode(array("error"=>true, "description"=>"fehlerhafte Daten"));
            die();
        }
        $db = Database::get_instance();
        $res = $db->query("SELECT * FROM reservation LEFT JOIN place using(place_id) WHERE '".$place_id."' = place_id AND (( STR_TO_DATE('" .$start ."', '" . $format ."') >= start OR STR_TO_DATE('" . $end ."', '" .$format ."') >= start) And STR_TO_DATE('" .$start."', '" .$format."') < end)");
        $res = $db->to_array($res);
        if(!empty($res[0])){
            echo json_encode(array("error"=>true, "description"=>"Zu diesem Zeitpunkt ist dieser Platz schon reserviert"));
            die();
        }
        if((strtotime($end)- strtotime($start))/60 < 5){
            echo json_encode(array("error"=>true, "description"=>"minimale Reservierungsdauer beträgt 5min"));
            die();
        }
        $db->query("INSERT INTO reservation (start, end, init_Date, priority, player_id, place_id) VALUES (STR_TO_DATE('".$start."', '".$format."'), STR_TO_DATE('".$end."', '".$format."'),now(),".$priority .", ". $player_id.", ". $place_id .")");
        return json_encode(array("error"=>false, "description"=>"Erfolgreich reserviert"));
    }

    public static function getAllReservations($player_id){
        $db = Database::get_instance();
        $res = $db->to_array($db->query("SELECT reservation_id, place_id, name, start, end FROM reservation LEFT JOIN place using(place_id) WHERE player_id = ". $player_id ));
        $objects = array();
        foreach ($res as $value){
            array_push($objects, array('id'=> $value->reservation_id, 'place_id'=>$value->place_id,'title' => $value->name, 'allDay' => false, 'start'=> $value->start, 'end' => $value->end));
        }
        return json_encode($objects);
    }
    public static function getAllPlaces($player_id){
        $db = Database::get_instance();
        $res = $db->to_array($db->query("SELECT place_id, place.name FROM place LEFT JOIN club using(club_id) JOIN player using(club_id) WHERE player_id = ". $player_id ));
        $objects = array();
        foreach ($res as $value){
            array_push($objects, array('place_id'=>$value->place_id, 'name' => $value->name));
        }
        return json_encode($objects);
    }

    public static function getPlaceID($name, $player_id){
        $db = Database::get_instance();
        return $db->to_array($db->query("SELECT place_id FROM place WHERE club_id = (SELECT club_id FROM player WHERE player_id = ". $player_id .") AND name = '". $name."'"))[0]->place_id;
    }
}