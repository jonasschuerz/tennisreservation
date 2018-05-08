<?php
require('AccountSession.php');
require('Reservation.php');
$res =  json_decode(Reservation::getAllReservations(AccountSession::load()->get_id()));
foreach ($res as $event){
    $event->start = date('Y-m-d H:i', strtotime($event->start));
    $event->end = date('Y-m-d H:i', strtotime($event->end));
}
echo json_encode($res);