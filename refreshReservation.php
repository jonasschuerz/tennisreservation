<?php
require('Back-End/Database.php');
require('Back-End/AccountSession.php');
//setlocale(LC_TIME, "de_DE"); //lokal nicht installiert
$db = Database::get_instance();
$returnString = "";
$res = $db->query("SELECT person_id, place, from_Date, to_Date, id FROM reservations WHERE person_id = ". 0 ." order by from_Date");
if($res->num_rows == 0){
    echo "";
    die();
}
$res = $db->to_array($res);
$objects = array();
foreach ($res as $value){
    $date = substr($value->from_Date, 0, 10);
    $timestamp = strtotime(substr($value->from_Date, 0, 10));
    $from = substr($value->from_Date, 11, 5);
    $to = substr($value->to_Date, 11, 5);
    array_push($objects, array('id' => $value->id, 'date' =>$date,'fromTime' => $from,'toTime' => $to,'place' => $value->place));
}
echo json_encode($objects);