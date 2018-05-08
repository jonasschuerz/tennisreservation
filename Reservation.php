<?php

include_once 'Database.php';

class Reservation{
    public static function addReservation($player_id, $place_id, $start, $end, $priority){
        $isValid = json_decode(self::inputIsValid($player_id, $place_id, $start, $end));
        if($isValid->error === true){
            return json_encode($isValid);
        }
        $format = "%d-%m-%Y %H:%i:%s";
        Database::get_instance()->query("INSERT INTO reservation (start, end, init_Date, priority, player_id, place_id) VALUES (STR_TO_DATE('".$start."', '".$format."'), STR_TO_DATE('".$end."', '".$format."'),now(),".$priority .", ". $player_id.", ". $place_id .")");
        return json_encode(array("error"=>"false", "description"=>"Erfolgreich reserviert "));
    }

    public static function updateReservation($reservation_id, $player_id, $place_id, $start, $end, $priority){
        $format = "%d-%m-%Y %H:%i:%s";
        $oldReservation = Database::get_instance()->to_array(Database::get_instance()->query("SELECT place_id, DATE_FORMAT(start, '".$format."') as start, DATE_FORMAT(end, '".$format."') as end FROM reservation WHERE reservation_id=". $reservation_id));
        Database::get_instance()->query("DELETE FROM reservation WHERE reservation_id=".$reservation_id);
        $isValid = json_decode(self::inputIsValid($player_id, $place_id, $start, $end));
        if($isValid->error === true){
            self::addReservation($player_id, $oldReservation[0]->place_id, $oldReservation[0]->start, $oldReservation[0]->end, $priority);
            return json_encode($isValid);
        }
        return self::addReservation($player_id, $place_id, $start, $end, $priority);
    }

    public static function getAllReservations($player_id){
        $db = Database::get_instance();
        $format = "%d-%m-%Y %H:%i:%s";
        $res = $db->to_array($db->query("SELECT reservation_id, place_id, name, DATE_FORMAT(start, '".$format."') as start, DATE_FORMAT(end, '".$format."') as end FROM reservation LEFT JOIN place using(place_id) WHERE player_id = ". $player_id ));
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

    private static function inputIsValid($player_id, $place_id, $start, $end){
        $format = "%d-%m-%Y %H:%i:%s";
        if(!isset($player_id) || !isset($place_id) || !isset($start) || !isset($end) || strlen($start) < 16 || strlen($end) < 16 || strlen($start) > 19 || strlen($end) > 19  ){
            return json_encode(array("error"=>true, "description"=>"fehlerhafte Daten ". !isset($end)));
        }
        $db = Database::get_instance();
        $res = $db->query("SELECT * FROM reservation LEFT JOIN place using(place_id) WHERE '".$place_id."' = place_id AND (( STR_TO_DATE('" .$start ."', '" . $format ."') >= start OR STR_TO_DATE('" . $end ."', '" .$format ."') >= start) And STR_TO_DATE('" .$start."', '" .$format."') < end)");
        $res = $db->to_array($res);
        if(!empty($res[0])){
            return json_encode(array("error"=>true, "description"=>"Zu diesem Zeitpunkt ist dieser Platz schon reserviert"));
        }
        if((strtotime($end)- strtotime($start))/60 < 5){
            return json_encode(array("error"=>true, "description"=>"minimale Reservierungsdauer beträgt 5min"));
        }
        return json_encode(array("error"=>false, "description"=>""));
    }

}