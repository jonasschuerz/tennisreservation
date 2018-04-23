<?php
    require('AccountSession.php');
    if(AccountSession::logout()){
        echo json_encode(array("error"=>false, "description"=>"Logout erfolgreich"));
        die();
    }
    echo json_encode(array("error"=>true, "description"=>"Logout fehlgeschlagen"));
