<?php
    require('AccountSession.php');
    require('Reservation.php');
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $place = $_POST['place'];
    $date = date_format(new DateTime($date), 'Y-m-d');
    $start = $date . " ". $startTime;
    $end = $date . " ". $endTime;
    $playerId = AccountSession::load()->get_id();
    $place_id = Reservation::getPlaceID($place, $playerId);
    echo Reservation::add($playerId, $place_id, $start, $end, 0);

