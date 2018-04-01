<?php
    require('AccountSession.php');
    require('Reservation.php');
    $date = $_POST['date'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $place = $_POST['place'];
    $date = date_format(new DateTime($date), 'Y-m-d');
    $start = $date . " ". $fromTime;
    $end = $date . " ". $toTime;
    echo Reservation::add(AccountSession::load()->get_id(), $place, $start, $end, 0);

