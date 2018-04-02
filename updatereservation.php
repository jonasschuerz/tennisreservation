<?php
require('Database.php');
require('AccountSession.php');
require('Reservation.php');
$events = json_decode(stripslashes($_POST['data']));
$playerId = AccountSession::load()->get_id();
$db = Database::get_instance();
foreach ($events as $key => $event) {
    $res = $db->query("SELECT reservation_id, place_id, name, start, end FROM reservation LEFT JOIN place using(place_id)");// WHERE player_id = " . $playerId);
    $res = $db->to_array($res);
    $found = false;
    foreach ($res as $row) {
        if ($event->id == $row->reservation_id && $event->start == $row->start && $event->end == $row->end && $event->place_id == $row->place_id) {
            $found = true;
            break;
        }
        else if ($event->id == $row->reservation_id) { //date or place must changed -> new insert
            $found = true;
            $db->query("DELETE FROM `reservation` WHERE reservation_id = ". $event->id);
            $value = Reservation::add($playerId, $row->place_id, substr($event->start, 0, -3), substr($event->end, 0, -3), 0);
            if(json_decode($value)->error == true){
                Reservation::add($playerId, $row->place_id,substr($row->start, 0, -3), substr($row->end, 0, -3), 0 );
            }
            break;
        }
    }
    if(!$found){
        $db->query("DELETE FROM `reservation` WHERE  reservation_id = " . $event->id);
    }
}
echo json_encode(array("error"=>false, "description"=>""));