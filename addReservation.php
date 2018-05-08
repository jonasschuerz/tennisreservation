<?php
    require('AccountSession.php');
    require('Reservation.php');
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $place = $_POST['place'];
  //  $date = date_format(new DateTime($date), 'Y-m-d');
    $start = $date . " ". $startTime . ":00";
    $end = $date . " ". $endTime. ":00";
    $playerId = AccountSession::load()->get_id();
    $place_id = Reservation::getPlaceID($place, $playerId);
    echo Reservation::addReservation($playerId, $place_id, $start, $end, 0);

