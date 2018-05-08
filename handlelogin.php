<?php
    require('Database.php');
    require('AccountSession.php');
    //$email = "test@test.com";
    //$pwd = "test";
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $db = Database::get_instance();
    $email = mysqli_real_escape_string($db->get_connection(), $email);
    $pwd = md5(mysqli_real_escape_string($db->get_connection(), $pwd));
    $res = $db->query("Select player_id, email, password FROM player WHERE email = '$email' and password = '$pwd'");
    $res = $db->to_array($res);
    if(!empty($res)){

        AccountSession::login($email, $res[0]->player_id);
        echo json_encode(array("error"=>false, "description"=>"Login erfolgreich"));
        die();
    }
echo json_encode(array("error"=>true, "description"=>"Login fehlgeschlagen"));
