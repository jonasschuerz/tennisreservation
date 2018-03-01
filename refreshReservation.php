<?php
require('Back-End/Database.php');
require('Back-End/AccountSession.php');

$db = Database::get_instance();
$returnString = "";
$res = $db->query("SELECT person_id, place, from_Date, to_Date FROM reservations WHERE person_id = ". 0);
$res = $db->to_array($res);
//echo print_r($res). "<br>";
foreach ($res as $value){
//    echo print_r($value);
    $date = substr($value->from_Date, 0, 10);
    $from = substr($value->from_Date, 11, 5);
    $to = substr($value->to_Date, 11, 5);
    $res = $res . '<tr> <td> <div class="field"> <p class="control"> <div class="b-checkbox is-dark"> <input id="checkbox" class="styled" type="checkbox"> 
                    <label for="checkbox"> </label> </div> </p> </div> </td>
                    <td> '.$date.'</td>
                    <td> '. $from .'</td>
                    <td> '. $to .'</td>
                    <td> '.$value->place .'</td> </tr>';
}
echo $res;