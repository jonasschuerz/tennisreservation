<?php
require('Database.php');
require('AccountSession.php');
require('Reservation.php');
$events = json_decode(stripslashes($_POST['data']));
$personId = AccountSession::load()->get_id();
$db = Database::get_instance();
foreach ($events as $key => $event) {
    $res = $db->query("SELECT person_id, place, from_Date, to_Date, id FROM reservations WHERE person_id = " . $personId);
    $res = $db->to_array($res);
    $found = false;
    foreach ($res as $row) {
        if ($event->id == $row->id && $event->start == $row->from_Date && $event->end == $row->to_Date && $event->place == $row->place) {
            $found = true;
            break;
        }
        else if ($event->id == $row->id) { //date or place must changed -> new insert
            $found = true;
            $value = Reservation::add($row->person_id, $event->place, substr($event->start, 0, -3), substr($event->end, 0, -3), 0);
            if(json_decode($value)->error == false){
                $db->query("DELETE FROM `reservations` WHERE id = ". $event->id);
            }
            break;
        }
    }
    if(!$found){
        $db->query("DELETE FROM `reservations` WHERE  id = " . $event->id);
    }
}
echo json_encode(array("error"=>false, "description"=>""));