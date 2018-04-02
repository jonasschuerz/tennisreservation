<?php
require('AccountSession.php');
require('Reservation.php');
echo Reservation::getAllPlaces(AccountSession::load()->get_id());