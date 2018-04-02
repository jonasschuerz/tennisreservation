<?php
require('AccountSession.php');
require('Reservation.php');
sleep(0.9);
echo Reservation::getAllReservations(AccountSession::load()->get_id());