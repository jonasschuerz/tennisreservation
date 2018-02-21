<?php
    require('Back-End/Database.php');
    require('Back-End/AccountSession.php');
    //$email = "test@test.com";
    //$pwd = " ";
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $db = Database::get_instance();
    $email = mysqli_real_escape_string($db->get_connection(), $email);
    $pwd = md5(mysqli_real_escape_string($db->get_connection(), $pwd));
    $res = $db->query("Select email, password FROM users WHERE email = '$email' and password = '$pwd'");
    if($res->num_rows == 1){
        echo "true";
        die();
    }
    echo "false";
