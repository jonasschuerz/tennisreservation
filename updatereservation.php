<?php
require('Database.php');
require('AccountSession.php');
require('Reservation.php');
$events = json_decode(stripslashes($_POST['data']));
$playerId = AccountSession::load()->get_id();
$db = Database::get_instance();
$eventsDb = json_decode(Reservation::getAllReservations($playerId));
$miss = 0;
foreach ($eventsDb as $eventDb) {
    $found = false;
    foreach ($events as $event) {
        $place_id = Reservation::getPlaceID($event->place, AccountSession::load()->get_id());
        if ($event->id == $eventDb->id && $event->start == $eventDb->start && $event->end == $eventDb->end && $place_id == $eventDb->place_id){
            $found = true;
            break;
        }
        elseif ($event->id == $eventDb->id){
            $found = true;
            $success = json_decode(Reservation::updateReservation($event->id, AccountSession::load()->get_id(), $place_id, $event->start, $event->end, 0));
            if($success->error == "true"){
                //echo json_encode($success);
                $miss++;
            }
            break;
        }
    }
    if(!$found){
        $db->query("DELETE FROM `reservation` WHERE  reservation_id = " . $eventDb->id);
    }
}

if($miss > 0){
    echo json_encode(array("error"=>true, "description"=>"Bei ". $miss ." Änderungen gab es Probleme."));
}
else echo json_encode(array("error"=>false, "description"=>""));

