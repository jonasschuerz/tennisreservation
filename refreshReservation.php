<?php
require('Back-End/Database.php');
require('Back-End/AccountSession.php');

$db = Database::get_instance();
$returnString = "";
$res = $db->query("SELECT person_id, place, from_Date, to_Date FROM reservations WHERE person_id = ". 0);
$res = $db->to_array($res);
echo print_r($res). "<br>";
foreach ($res as $value){

    echo print_r($value);
}