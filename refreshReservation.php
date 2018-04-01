<?php
require('Database.php');
require('AccountSession.php');
sleep(0.9);
$db = Database::get_instance();
$returnString = "";
$personId = AccountSession::load()->get_id();
$res = $db->query("SELECT person_id, place, from_Date, to_Date, id FROM reservations WHERE person_id = ". $personId );
if($res->num_rows == 0){
    echo "";
    die();
}
$res = $db->to_array($res);
$objects = array();
foreach ($res as $value){
    $timestamp = strtotime(substr($value->from_Date, 0, 10));
    $from = $value->from_Date;
    $to = $value->to_Date;
    array_push($objects, array('id'=> $value->id,'title' => $value->place, 'allDay' => false, 'start'=> $value->from_Date, 'end' => $value->to_Date));
}
echo json_encode($objects);